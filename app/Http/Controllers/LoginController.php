<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;




class LoginController extends Controller
{
    public function signUp(Request $request)
    {

        $user = new User();

        // Set user attributes
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');
        $user->email_verified_at = null;
        $user->email_verification_token = null;

        $user->save();


        return redirect()->route('showlogin')->with('success', 'Data telah Terdaftar');
    }

    public function signIn(Request $request)
    {

        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'username' => 'username tidak match',
        ])->onlyInput('username');

    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }


    //tambahkan script di bawah ini 
    public function handleProviderCallback(Request $request)
    {
        try {

            $user_google = Socialite::driver('google')->user();

            // Check if the user already exists in the database based on the email provided by Google
            $user = User::where('email', $user_google->getEmail())->first();

            if ($user) {

                // If the user exists, log in the user
                Auth::login($user, true);

            } else {

                // If the user does not exist, create a new user and log in with the new account
                $user = User::create([
                    'email' => $user_google->getEmail(),
                    'username' => $user_google->getName(),
                    'name' => $user_google->getName(),
                    'phone' => 0,
                    'password' => bcrypt('password'),
                    // Set a default password (you may adjust this as needed)
                    'email_verified_at' => now(),
                    // Mark the email as unverified initially
                    'email_verification_token' => Str::random(60),

                ]);

                Auth::login($user, true);

                // Dispatch an event to send the verification email
                event(new Registered($user));
            }

            return redirect('/dashboard');
        } catch (\Exception $e) {

            // Handle any exceptions that may occur during the process
            return redirect()->route('showlogin')->with('error', 'Terjadi kesalahan saat login dengan Google.');
        }

    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }

        return redirect('/');
    }
}