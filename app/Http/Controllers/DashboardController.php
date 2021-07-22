<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Character;
use App\Models\Event;
use App\Models\Invitation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function index()
    {
        foreach (Auth::user()->characters as $character) {
            $campaignsId[] = $character->campaign->id;
        }
        if(!empty($campaignsId)) {
            $nextSession = Event::whereIn('id', $campaignsId)
                ->whereDate('start', '>=', Carbon::now()->format('Y-m-d\TH:i'))
                ->orderBy('start')->first();
        }

        $data = [
            'gmCount' => Campaign::where('master_id', Auth::user()->id)->count(),
            'charactersCount' => Auth::user()->characters->count(),
            'invitationsCount' => Invitation::where('user_id', Auth::user()->id)->count(),
            'nextSession' => $nextSession ?? null,
        ];

        $adminData = [
            'totalUsers' => User::all()->count(),
            'totalCampaigns' => Campaign::all()->count(),
            'totalCharacters' => Character::all()->count(),
            'totalSessions' => Event::all()->count(),
        ];

        return view('dashboard', ['data' => $data, 'adminData' => $adminData]);
    }
}
