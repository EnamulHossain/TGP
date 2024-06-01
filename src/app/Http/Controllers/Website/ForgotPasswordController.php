<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\Crypt;

class ForgotPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showForgetPasswordForm()
    {
        return view('website.auth.forgetPassword');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $token = Str::random(64);

            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            Mail::send('website.auth.emailforgetPassword', ['token' => $token, 'firstname' => $user->firstname, 'email' => $user->email], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Reset Password');
            });
        }

        return back()->with('message', 'Password reset link is sent to your email successfully.');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showResetPasswordForm($token)
    {
        return view('website.auth.forgetPasswordLink', ['token' => $token]);
    }

    public function showChangePasswordForm()
    {
        return view('website.auth.changePassword');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
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

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)->first();

        // Get store key from env config
        $STORE_KEY = env("STORE_KEY");
        // Encrypting data
        $STORE_KEY = env("STORE_KEY");
        $storeHash = Crypt::encryptString($request->password, $STORE_KEY);

        // Update the user's password
        $user->update(
            [
                'password' => Hash::make($request->password),
                'store_hash' => $storeHash
            ]
        );

        Auth::login($user);

        $createSubscriptionController = new CreateSubscriptionController();
        $createSubscriptionController->updateCustomer($user->email, $request->password);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect('/')->with('success', 'Your password has been changed successfully!');
    }

    public function submitChangePasswordForm(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users',
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

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withInput()->with('error', 'Invalid email!');
        }

        // Check if the provided old password matches the user's current password
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withInput()->with('error', 'Invalid old password!');
        }

        // Get store key from env config
        $STORE_KEY = env("STORE_KEY");
        // Encrypting data
        $STORE_KEY = env("STORE_KEY");
        $storeHash = Crypt::encryptString($request->password, $STORE_KEY);

        // Update the user's password
        $user->update(
            [
                'password' => Hash::make($request->password),
                'store_hash' => $storeHash
            ]
        );

        Auth::login($user);

        $createSubscriptionController = new CreateSubscriptionController();
        $createSubscriptionController->updateCustomer($user->email, $request->password);

        return redirect('/my-plan')->with('message', 'Your password has been changed successfully!.');
    }
}
