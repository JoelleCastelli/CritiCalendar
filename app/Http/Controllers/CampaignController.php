<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Theme;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
