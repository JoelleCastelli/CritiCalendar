<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CharacterController extends Controller
{

    function index(Request $request)
    {
        $characters = Character::where('player_id', Auth::user()->id)->paginate(5);
        return view('characters.list', ['characters' => $characters]);
    }

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

    public function delete(Request $request) // quit the campaign
    {
        $character = Character::Find($request->character_id);
        $character->delete();
        return redirect()->route('campaigns')->with('success', 'Votre partipation a bien été retirée');
    }
}
