<?php

namespace App\Http\Controllers;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login', [
            'title' => 'Login'
        ]);
    }

    public function login()
    {
    }

    public function logout()
    {
    }
}
