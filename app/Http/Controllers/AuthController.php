<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // Show login page
    public function showLogin()
    {
        return view('login');
    }

    // Handle login submission
    public function login(Request $request)
    {
        // 1️⃣ Validate & normalize input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $email = Str::lower(trim($request->email));
        $password = $request->password;
        $key = $email . '|' . $request->ip();

        // 2️⃣ Check rate limiter / lockout
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            return back()->with('error', "Too many login attempts. Try again in $seconds seconds.");
        }

        // 3️⃣ Attempt login
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // ✅ Successful login
            RateLimiter::clear($key);
            $request->session()->regenerate();
            return redirect('/dashboard')->with('success', 'Welcome back!');
        }

        // 4️⃣ Failed login → increment attempts
        RateLimiter::hit($key, 60); // lockout for 60 sec after 5 attempts
        $remaining = 5 - RateLimiter::attempts($key);

        return back()->with('error', "Invalid email or password. $remaining attempts remaining.");
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Logged out successfully.');
    }
}

?>
