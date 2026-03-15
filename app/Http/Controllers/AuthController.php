<?php
/*
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login'); // points to resources/views/auth/login.blade.php
    }

    // Handle login attempt
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // login successful
            return redirect()->intended('/dashboard');
        }

        // login failed
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }
}

*/
////


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view('login');
    }
    
    /*
    public function login(Request $request)
    {
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)){
            return redirect('/dashboard');
        }

        return back()->with('error','Invalid email or password');
    }
    */

            public function login(Request $request)
            {
                $request->validate([
                    'email' => 'required|email',
                    'password' => 'required|min:6'
                ]);

                $credentials = $request->only('email','password');

                if(Auth::attempt($credentials)){
                    $request->session()->regenerate();
                    return redirect('/dashboard');
                }

                return back()->with('error','Invalid email or password');
            }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
?>
