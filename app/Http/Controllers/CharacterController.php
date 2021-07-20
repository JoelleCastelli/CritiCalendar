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

    function update(Request $request)
    {
        $update = Character::where('id', $request->character_id)->update($request->except(['_token', 'character_id']));
        $character = Character::Find($request->character_id);
        if($update)
            return redirect()->route('my-character', ['campaign_id' =>  $character->campaign_id, 'player_id' =>  $character->player_id,])->with('success', 'Votre personnage a bien été modifié');
        else
            return redirect()->route('my-character', ['campaign_id' =>  $character->campaign_id, 'player_id' =>  $character->player_id,])->with('error', 'Oops ! Votre personnage n\'a pas pu être été modifié');

    }
}
