<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isPlayer
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
        $user = User::find($request->player_id);
        if($user && $user->id == Auth::user()->id) {
            return $next($request);
        }
        return redirect()->back()->with('error', "Ce personnage ne vous appartient pas");
    }
}
