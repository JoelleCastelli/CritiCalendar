<?php

namespace App\Http\Controllers;

use App\Http\Requests\InviteRequest;
use App\Mail\InvitationEmail;
use App\Models\Campaign;
use App\Models\Character;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
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

    function sendInvite(InviteRequest $request) {

        if($request->email === Auth::user()->email) {
            return redirect()->route('details_campaign', ['campaign_id' => $request->campaign_id])
                ->with('error', "Vous ne pouvez pas vous inviter vous-même !");
        }
        // Create invitation
        $invitation = new Invitation();

        // Check if invitation has already been sent
        $existingInvitation = $invitation->where([
            ['email', '=', $request->email],
            ['campaign_id', '=', $request->campaign_id]
        ])->first();

        if($existingInvitation) {
            return redirect()->route('details_campaign', ['campaign_id' => $request->campaign_id])
                ->with('error', "L'invitation a déjà été envoyée à ".$request->email);
        } else {
            // Create invitation
            $invitation->email = $request->email;
            $invitation->campaign_id = $request->campaign_id;
            if(User::firstWhere('email', $request->email))
                $invitation->user_id = User::firstWhere('email', $request->email)->id;
            $invitation->save();

            // Send invitation email
            $details = [
                'campaign' => Campaign::find($request->campaign_id),
            ];
            \Mail::to($request->email)->send(new InvitationEmail($details));

            return redirect()->route('details_campaign', ['campaign_id' => $request->campaign_id])
                ->with('success', "L'invitation a été envoyée à ".$request->email);
        }
    }

    function sendInviteAgain(Request $request) {
        $details = [
            'campaign' => Campaign::find($request->campaign_id),
        ];
        \Mail::to($request->email)->send(new InvitationEmail($details));

        return redirect()->route('details_campaign', ['campaign_id' => $request->campaign_id])
            ->with('success', "L'invitation a été envoyée une nouvelle fois à ".$request->email);
    }

    function deleteInvite(Request $request) {
        $invitation = Invitation::where('email', $request->email)->where('campaign_id', $request->campaign_id)->first();
        $invitation->delete();

        return redirect()->route('details_campaign', ['campaign_id' => $request->campaign_id])
            ->with('success', "L'invitation a de ".$request->email." a bien été supprimée");
    }
}
