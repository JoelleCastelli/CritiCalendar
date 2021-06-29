<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    function index()
    {
        $campaigns = Campaign::paginate(50);
        return view('campaigns', ['campaigns' => $campaigns]);
    }
}
