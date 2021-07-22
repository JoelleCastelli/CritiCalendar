<?php

namespace App\Http\Middleware;

use App\Models\Campaign;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CanAccessCampaign
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $campaign = Campaign::find($request->campaign_id);
        if($campaign) {
            $userCanAccess = false;
            if($campaign->owner->id == Auth::user()->id)
                $userCanAccess = true;
            if(!$userCanAccess) {
                foreach ($campaign->characters as $character) {
                    if($character->player->id == Auth::user()->id) {
                        $userCanAccess = true;
                        break;
                    }
                }
            }

            if ($userCanAccess) return $next($request);
        }


        return redirect()->route('campaigns')->with('error', "Vous ne faites pas partie de cette campagne");
    }
}
