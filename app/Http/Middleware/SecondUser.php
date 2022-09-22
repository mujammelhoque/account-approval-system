<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SecondUser
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
            if(auth()->user()->access_roll == 2 || auth()->user()->access_roll == 1){
                return $next($request);
        }
        return redirect('login')->with('error',"You don't have admin access.");
    }
}
