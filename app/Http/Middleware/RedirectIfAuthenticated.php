<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(Auth::user()->usertype == 'admin') {
                return redirect()->route('home');
            }
            elseif(Auth::user()->usertype == 'student') {
                return redirect()->route('dashboard');
            }
            //return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
