<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Profile;
use App\Models\UserCode;
use App\Models\Subscriber;
use Illuminate\Support\Str;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use App\Mail\SendTwoFactorCodeMail;
use App\Models\Grant;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;

class LoginController extends AuthController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    private function username(): string
    {
        return 'email';
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  Request $request
     * @return Response
     */

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Please enter your email address',
            'email.email' => 'Please enter a valid email address',
            'password.required' => 'Please enter your password',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->input('remember', false);

        if (Auth::attempt($credentials, $remember)) {
            // Authentication passed...
            if (auth()->user()->email_verified_at == null || auth()->user()->is_mfa_verified == false) {
                Auth::logout();
                return back()->with(['email_not_verified' => 'Your email is not verified yet']);
            }
            $user = Auth::user();
            $this->updateSession($request, $user);
            $this->updateLogActivity($user);
            return redirect()->intended($this->redirectPath());
        }

        $this->logLogin($request, 'invalid');

        return $this->sendFailedLoginResponse($request)->withErrors([
            'email' => 'Invalid login credentials. Please try again.',
        ]);
    }


    // ...
    /**
     * Redirect the user to the two factor authentication page.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    protected function redirectToTwoFactor(Request $request)
    {
        return redirect()->route('website.auth.two_factor');
    }

    public function twofactor(Request $request)
    {
        // Get the stored user ID from the session
        $userId = $request->session()->get('two_factor_user_id');
        $user = User::find($userId);

        $usercode = DB::table('user_codes')->where('user_id', $userId)->first();

        if ($request->code !== $usercode->code) {
            return redirect()
                ->route('website.auth.two_factor')
                ->withInput()
                ->withErrors(['code' => 'Invalid authentication code']);
        }

        // Check if the code is expired
        $codeExpiresAt = Carbon::parse($usercode->expires_at);
        if (Carbon::now()->greaterThanOrEqualTo($codeExpiresAt)) {
            // Delete the expired code
            DB::table('user_codes')->where('user_id', $userId)->delete();
            return redirect()
                ->route('website.auth.two_factor')
                ->withInput()
                ->withErrors(['code' => 'Two-factor authentication code has expired']);
        }

        $this->updateLogActivity($user);
        Auth::login($user);
        // Remove the user code after successful authentication
        DB::table('user_codes')->where('user_id', $userId)->delete();

        // Remove the stored user ID from the session
        $request->session()->forget('two_factor_user_id');

        // regular check
        $this->regularCheck();

        return redirect()->intended();
    }

    private function sendTwoFactorCode(Request $request)
    {
        // Get the stored user ID from the session
        $userId = $request->session()->get('two_factor_user_id');
        $user = User::find($userId);

        $code = rand(1000, 9999);

        $generatedCode = UserCode::updateOrCreate(
            ['user_id' => $userId],
            ['code' => $code, 'expires_at' => Carbon::now()->addMinutes(5)]
        );

        if (!empty($generatedCode)) {
            $details = [
                'title' => 'Mail from ' . env('APP_NAME'),
                'code' => $code
            ];

            Mail::to($user->email)->send(new SendTwoFactorCodeMail($details));

            return $this->redirectToTwoFactor($request);
        }
    }

    protected function updateSession($request, $user)
    {
        // Check if the user has an active session ID
        if ($user && $user->session_id !== Session::getId()) {
            // Log out the user from the other session
            Auth::logoutOtherDevices($request->password);
            // Update the session ID in the database
            $user->session_id = Session::getId();
            $user->save();
        }
    }

    protected function updateLogActivity($user)
    {
        // Update logged_in_at
        $user->update(
            [
                'logged_in_at' => Carbon::now(),
                'is_mfa_verified' => true,
            ]
        );
        log_activity('Login', $user->fullname . ' logged in.');
        // regular check
        $this->regularCheck();
    }

    public function regularCheck()
    {
        $now = Carbon::now()->toDateString();
        $grants = Grant::where('status', 2)
            ->where('deadline_at', '<', $now)
            ->get();

        foreach ($grants as $grant) {
            $grant->update(['status' => 5]);
        }

        $current_date = Carbon::now();
        $subscribers = null;
        $subscription = null;
        if (auth()->user()) {
            $subscribers = Subscriber::where('user_id', auth()->user()->id)->first();
            // $profiles = Profile::where('user_id', auth()->user()->id)->first();
            $subscription = Subscription::where('user_name', auth()->user()->email)->first();
        }

        if (isset($subscription) && $current_date > $subscription->expired_at && $subscribers) {
            // todo: if subscription expired then first try to create new order if failed then make 'is_active' = false
            $subscribers->update(['is_active' => false]);
            // $profiles->update(['is_active' => false]);
        }
    }

    public function showTwoFactorForm()
    {
        return view('website.auth.twofactor');
    }


    private function sendLoginResponse(Request $request)
    {
        $user = Auth::user();

        // notify message
        if ($user->getAttribute('logged_in_at')) {
            notify()->info(
                'Info',
                'Last time you logged in was ' . $user->logged_in_at->diffForHumans(),
                'far fa-clock spin animated rotateIn animated',
                8000
            );
        } else {
            notify()->info(
                'Welcome',
                'Hi ' . $user->fullname . '. Welcome to ' . config('app.name'),
                'far fa-bell shake animated',
                8000
            );
        }

        // // Store the user ID in the session
        // $request->session()->put('two_factor_user_id', $user->id);

        // $code = rand(1000, 9999);

        // // Use the stored user ID from the session
        // $userId = $request->session()->get('two_factor_user_id');
        // $generatedCode = UserCode::updateOrCreate(
        //     ['user_id' => $userId],
        //     ['code' => $code, 'expires_at' => Carbon::now()->addMinutes(5)]
        // );

        // if (!empty($generatedCode)) {
        //     $details = [
        //         'title' => 'Mail from ' . env('APP_NAME'),
        //         'code' => $code
        //     ];
        //     Mail::to(auth()->user()->email)->send(new SendTwoFactorCodeMail($details));
        //     return $this->redirectToTwoFactor($request);
        // }

        // // Check if the user has already logged in using the correct 2FA code
        // $usercode = UserCode::where('user_id', $user->id)->first();
        // if (!$usercode || $usercode->code !== $request->code) {
        //     return redirect('/login')->with('error', 'Invalid authentication code');
        // }

        // // Remove the user code after successful authentication
        // $usercode->delete();

        // get the intended URL or default to home page
        $previousUrl = $request->session()->pull('url.intended', url('/'));

        // Check if the previous URL contains 'subscribe'
        if (Str::contains($previousUrl, 'subscribe')) {
            // Extract SKU from the previous URL
            $urlParts = parse_url($previousUrl);
            $queryParams = [];
            if (isset($urlParts['query'])) {
                parse_str($urlParts['query'], $queryParams);
            }
            $sku = isset($queryParams['sku']) ? $queryParams['sku'] : null;

            // Build the URL with the SKU
            $url = route('customer-subscribe', ['sku' => $sku]);
        } else {
            // Redirect to the intended URL or home page
            $url = $previousUrl;
        }

        // if ajax (can be from a login modal)
        if (request()->ajax()) {
            return json_response(['redirect' => config('app.url') . $url]);
            /*---------------------------------------------------------*/

            $filters = Profile::where('user_id', $user->id)->first() && Profile::where('user_id', $user->id)->first()->interests ? Profile::where('user_id', $user->id)->first()->interests->pluck('id')->toArray() : [];

            $this->regularCheck();

            $name = $user->firstname;
            return redirect($url)->with('success', ' Welcome back ' . $name);
        }
    }

    /**
     * Get the failed login response instance.
     *
     * @param Request $request
     * @param string  $message
     * @return JsonResponse|RedirectResponse
     */
    private function sendFailedLoginResponse(Request $request, $message = '')
    {
        $errors = [$this->username() => strlen($message) > 2 ? $message : trans('auth.failed')];

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()
            ->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }

    /**
     * Log the user out of the application.
     *
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function logout(Request $request)
    {
        Auth::guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
    }
}
