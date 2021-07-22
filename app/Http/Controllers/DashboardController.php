<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Character;
use App\Models\Event;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function index()
    {
        $nextSession = '';
        foreach(Auth::user()->characters as $character) {
            $events = $character->campaign->events;
            foreach ($events as $event) {
                if($event->start > now() && $event->start < $nextSession) {
                    $nextSession = $event;
                }
            }
        }

        $data = [
            'gmCount' => Campaign::where('master_id', Auth::user()->id)->count(),
            'charactersCount' => Auth::user()->characters->count(),
            'invitationsCount' => Invitation::where('user_id', Auth::user()->id)->count(),
            //'nextSession' => Event::where('user_id', Auth::user()->id)->count(),
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
