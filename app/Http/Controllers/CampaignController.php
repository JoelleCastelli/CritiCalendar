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
        $campaigns = Campaign::paginate(50);
        return view('campaigns.list', ['campaigns' => $campaigns]);
    }

    function createNewCampaign()
    {
        $themes = Theme::all();
        $themesArray = [];
        foreach ($themes as $theme)
            $themesArray[$theme->id] = $theme->name;
        return view('campaigns.new-campaign', ['themes' => $themesArray]);
    }

    public function saveCampaign(Request $request)
    {
        $campaign = isset($request->campaign_id) ? Campaign::find($request->campaign_id) : new Campaign;
        $campaign->name = $request->name;
        $campaign->description = $request->description;
        $campaign->theme_id = $request->theme_id;
        $campaign->master_id = Auth::id();
        $campaign->save();
        return redirect()->route('campaigns');
    }

    function updateCampaign(Request $request) {
        $campaign = Campaign::find($request->campaign_id);
        $themes = Theme::all();
        $themesArray = [];
        foreach ($themes as $theme)
            $themesArray[$theme->id] = $theme->name;
        return view('campaigns.update-campaign', ['campaign' => $campaign, 'themes' => $themesArray]);
    }
}
