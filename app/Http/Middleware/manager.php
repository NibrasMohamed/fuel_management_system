<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class manager
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
        if (!Auth::check() || (!auth()->user()->hasRole('Admin') && !auth()->user()->hasRole('Manager'))) {
            if (!Auth::check()) {
                return redirect('/register');
            }
            if(auth()->user()->hasRole('User')){
                return redirect('/request-token');
            }
            
            return redirect('/access-denied');
        }else{
            return $next($request);
        }
    }
}
