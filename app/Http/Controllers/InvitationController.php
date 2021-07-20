<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Character;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    function index()
    {
        $invitations = Invitation::where([
            ['email', '=', Auth::user()->email],
            ['accepted', '=', false]
        ])->paginate(5);

        return view('invitations.list', ['invitations' => $invitations]);
    }

    function acceptInvitation(Request $request) {
        // Accept invitation
        $invitation = Invitation::find($request->invitation_id);
        if($invitation->email != Auth::user()->email) {
            return redirect()->route('invitations_list')
                ->with('error', "Vous ne pouvez pas accepter une invitation qui
                n'est pas liée à votre adresse e-mail");
        }

        $invitation->accepted = true;
        $invitation->save();

        // Create character
        $character = new Character();
        $character->player_id = Auth::user()->id;
        $character->campaign_id = Campaign::find($invitation->campaign_id)->id;
        $character->save();

        return redirect()->route('invitations_list')
            ->with('success', "L'invitation a bien été acceptée");
    }

    function declineInvitation (Request $request) {
        // Delete invitation
        $invitation = Invitation::find($request->invitation_id);
        if($invitation->email != Auth::user()->email) {
            return redirect()->route('invitations_list')
                ->with('error', "Vous ne pouvez pas refuser une invitation qui
                n'est pas liée à votre adresse e-mail");
        }
        $invitation->delete();
        return redirect()->route('invitations_list')
            ->with('success', "L'invitation a bien été refusée");
    }
}
