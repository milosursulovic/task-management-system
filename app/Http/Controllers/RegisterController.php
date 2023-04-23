<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomUser;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('register', [
            'title' => 'Register'
        ]);
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = CustomUser::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }
}
