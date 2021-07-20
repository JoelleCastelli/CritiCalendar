<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    function index()
    {
        $invitations = Invitation::where([
            ['email', '=', Auth::user()->email],
            ['accepted', '=', false]
        ])->get();

        return view('invitations.list', ['invitations' => $invitations]);
    }
}
