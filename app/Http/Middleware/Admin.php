<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if (Auth::user() && Auth::user()->admin == true) {
            return $next($request);
        }
        return redirect()->route('dashboard')->with('error',"Vous n'êtes pas administrateur");
    }
}
