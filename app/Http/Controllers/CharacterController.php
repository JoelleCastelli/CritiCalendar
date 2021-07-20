<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    function details(Request $request)
    {
        $character = Character::where('campaign_id', $request->campaign_id)->where('player_id', $request->player_id)->first();
        return view('characters.details', ['character' => $character]);
    }
}
