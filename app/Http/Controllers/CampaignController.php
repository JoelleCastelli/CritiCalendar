<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Invitation;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\InvitationEmail;

class CampaignController extends Controller
{
    function index()
    {
        $ownedCampaigns = Campaign::where('master_id', Auth::user()->id)->get();
        return view('campaigns.list', ['ownedCampaigns' => $ownedCampaigns]);
    }

    function createNewCampaign()
    {
        $themes = Theme::all();
        $themesArray = [];
        foreach ($themes as $theme)
            $themesArray[$theme->id] = $theme->name;
        return view('campaigns.new', ['themes' => $themesArray]);
    }

    public function saveCampaign(Request $request)
    {
        if(isset($request->campaign_id)) {
            $campaign = Campaign::find($request->campaign_id);
            $msg = "La campagne a été mise à jour";
        } else {
            $campaign = new Campaign;
            $msg = "La nouvelle campagne a été créée";
        }
        $campaign->name = $request->name;
        $campaign->description = $request->description;
        $campaign->theme_id = $request->theme_id;
        $campaign->master_id = Auth::id();
        $campaign->save();
        return redirect()->route('campaigns')->with('success', $msg);
    }

    function updateCampaign(Request $request) {
        $campaign = Campaign::find($request->campaign_id);
        $themes = Theme::all();
        $themesArray = [];
        foreach ($themes as $theme)
            $themesArray[$theme->id] = $theme->name;
        return view('campaigns.update', ['campaign' => $campaign, 'themes' => $themesArray]);
    }

    function deleteCampaign(Request $request) {
        $campaign = Campaign::find($request->campaign_id);
        foreach ($campaign->sessions as $session) $session->delete();
        $campaign->delete();
        return redirect()->route('campaigns')->with('success', 'La campagne a été supprimée');
    }

    function details(Request $request) {
        $campaign = Campaign::find($request->campaign_id);
        return view('campaigns.details', ['campaign' => $campaign]);
    }

    function sendInvite(Request $request) {
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
}
