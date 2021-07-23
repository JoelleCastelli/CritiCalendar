<?php

namespace App\Http\Middleware;

use App\Models\Character;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isCharacter
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
        $character = Character::find($request->character_id);
        if($character && $character->player->id == Auth::user()->id) {
            return $next($request);
        }
        return redirect()->back()->with('error', "Ce personnage ne vous appartient pas");
    }
}
