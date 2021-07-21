<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Campaign;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class EventController extends Controller
{
    public Campaign $campaign;
    public Event $event;


    function display(Request $request)
    {
        $campaign = Campaign::Find($request->campaign_id);
        $event = Event::Find($request->event_id);
        return view('events.save', ['event' => $event, 'campaign' => $campaign]);
    }

    function saveEvent(EventRequest $request)
    {
        if (isset($request->event_id)) {
            $event = Event::find($request->event_id);
            $msg = "La session a été mise à jour";
        } else {
            $event = new Event();
            $msg = "La session a été créée";
            $event->id = Str::uuid();
        }

        $event->title = $request->title;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->place = $request->place;
        $event->URL = $request->URL;
        $event->place = $request->place;
        $event->recap = $request->recap;
        $event->campaign_id = $request->campaign_id;
        $save = $event->save();

        if($save)
            return redirect()->route('save_event', ['campaign_id' => $request->campaign_id, 'event_id' => $event->id])->with('success', $msg);
        else
            return redirect()->route('save_event', ['campaign_id' => $request->campaign_id])->with('error', "Oops ! Problème avec la bdd"); 

    }
}
