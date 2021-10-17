<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserStateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check() && (auth()->user()->state != 'Active')){
            
            Auth::guard('web')->logout();
            
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('system.login')->withErrors("Your Account is suspended, please contact Admin.");

        }

        return $next($request);
    }
}
