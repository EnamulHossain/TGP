<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\WelcomeEmail;
use App\Mail\WelcomeEmailToAdmin;
use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;

class RegisterController extends AuthController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Handle a registration request for the application.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'confirmed',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'
            ],
        ], [
            'email.required' => 'Email is required.',
            'email.email' => 'Email is invalid.',
            'email.unique' => 'Email is already taken.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.regex' => 'Password must be at least 8 characters long and must contain at least one number (0-9), one uppercase letter (A-Z), and one lowercase letter (a-z).',
        ]);

        // Get store key from env config
        $STORE_KEY = env("STORE_KEY");
        // Encrypting data
        $storeHash = Crypt::encryptString($request->password, $STORE_KEY);
        
        $user = $this->create([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        event(new Registered($user));
        $user->update([
            'store_hash' => $storeHash
        ]);

        // Auth::guard()->login($user);
        $this->logLogin(request(), 'registered');

        // log_activity('User Registered', $user->fullname . ' registered as a new user.', $user);
        // Send an email to the user
        Mail::to($user->email)->send(new WelcomeEmail($user));

        // Send an email to the admin
        Mail::to('tech@promero.com')->send(new WelcomeEmailToAdmin($user));

        return redirect('/')->with('signupSuccess', 'Successfully signed up. Please verify your email to log in!');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

    protected function create(array $data)
    {
        $email_verification_token = Str::random(32);

        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'email_verification_token' => $email_verification_token,
        ]);

        $role = Role::find(1);
        $user->roles()->attach([$role->id]);

        return $user;
    }

    public function verifyEmail($token)
    {
        $user = User::where('email_verification_token', $token)->first();

        if ($user) {
            $user->email_verification_token = null;
            $user->email_verified_at = now();
            $user->is_mfa_verified = 1;
            $user->save();

            return redirect()->route('website.login')->with('success', 'Your email has been verified. You can now login.');
        }

        return redirect('/')->with('error', 'Invalid verification token.');
    }
}
