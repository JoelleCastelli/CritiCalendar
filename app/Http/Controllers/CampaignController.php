<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Theme;
use Illuminate\Http\Request;

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
}
