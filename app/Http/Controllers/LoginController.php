<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomUser;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login', [
            'title' => 'Login'
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect()->intended('/dashboard');
        } else {
            $user = CustomUser::where('email', $request->email)->first();

            if ($user) {
                return redirect()->back()->withErrors([
                    'password' => 'The password you entered is invalid'
                ]);
            } else {
                return redirect()->back()->withErrors([
                    'email' => 'The email you entered is invalid'
                ]);
            }
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
