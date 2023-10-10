<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class headOffice
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
        if (!Auth::check() || !auth()->user()->hasRole('Admin') && !auth()->user()->hasRole('Head-Office')) {
            if (!Auth::check()) {
                redirect('/register');
            }

            if(auth()->user()->hasRole('User')){
                return redirect('/request-token');
            }
            
            return redirect('/access-denied');
        }else if(auth()->user()->hasRole('User')){
            return redirect('/request-token');
        }else{
            return $next($request);
        }
    }
}
