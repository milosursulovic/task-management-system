<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->is('/')) {
            if (auth()->check()) {
                return redirect('/dashboard');
            } else {
                return redirect('/login');
            }
        }

        if (($request->is('login') || $request->is('register')) && auth()->check()) {
            return redirect('/dashboard');
        }

        if (($request->is('dashboard') || $request->is('tasks/*') || $request->is('users') || $request->is('users/*')) && !auth()->check()) {
            return redirect('/login');
        }

        return $next($request);
    }
}
