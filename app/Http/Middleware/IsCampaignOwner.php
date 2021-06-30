<?php

namespace App\Http\Middleware;

use App\Models\Campaign;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsCampaignOwner
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
        if (Auth::user() && Campaign::find($request->campaign_id)->owner->id == Auth::user()->id) {
            return $next($request);
        }
        return redirect()->route('campaigns')->with('error',"Vous n'êtes pas propriétaire de cette campagne");
    }
}
