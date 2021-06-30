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
        $campaign = new Campaign;
        $campaign->name = $request->name;
        $campaign->description = $request->description;
        $campaign->theme_id = Auth::id();
        $campaign->master_id = Auth::id();
        $campaign->save();
        return redirect()->route('campaigns');
    }
}
