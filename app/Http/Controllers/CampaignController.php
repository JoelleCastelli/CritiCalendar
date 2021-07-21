<?php

namespace App\Http\Controllers;

use App\Http\Requests\CampaignRequest;
use App\Models\Campaign;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Character;

class CampaignController extends Controller
{
    function index()
    {
        $ownedCampaigns = Campaign::where('master_id', Auth::user()->id)->paginate(5);
        $characters = Auth::user()->characters()->paginate(5); // get all characters linked to the connected user
        return view('campaigns.list', ['ownedCampaigns' => $ownedCampaigns, 'characters' => $characters]);
    }

    function createNewCampaign()
    {
        $themes = Theme::all();
        $themesArray = [];
        foreach ($themes as $theme)
            $themesArray[$theme->id] = $theme->name;
        return view('campaigns.new', ['themes' => $themesArray]);
    }

    public function saveCampaign(CampaignRequest $request)
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
        // Delete associated items
        if($campaign->sessions)
            foreach ($campaign->sessions as $session) $session->delete();
        if($campaign->characters)
            foreach ($campaign->characters as $character) $character->delete();
        if($campaign->invitations)
            foreach ($campaign->invitations as $invitation) $invitation->delete();
        $campaign->delete();
        return redirect()->route('campaigns')->with('success', 'La campagne a été supprimée');
    }

    function details(Request $request) {
        $campaign = Campaign::find($request->campaign_id);

        if(Auth::user()->id == $campaign->master_id)
            return view('campaigns.details', ['campaign' => $campaign]);
        else
            return view('campaigns.details-not-owner', ['campaign' => $campaign]);
    }

    function removeCharacter(Request $request) {
        $character = Character::find($request->character_id);
        $character->delete();

        return redirect()->route('details_campaign', ['campaign_id' => $request->campaign_id])
            ->with('success', "Le personnage a bien été supprimé");
    }
}
