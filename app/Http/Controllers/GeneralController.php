<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\User;
use App\EventUser;

class GeneralController extends Controller
{
    
    public function subscribe(Request $request)
    {
        $event = Event::find($request->event_id);
        $event->users()->attach([$request->user_id => ['hours' => $request->hours]]);
    }

    public function accept(Request $request)
    {
        $eventUser = EventUser::find($request->id);
        $eventUser->accepted = 1;
        $eventUser->save();
    }

    public function verify(Request $request)
    {
        $eventUser = EventUser::find($request->id);
        $eventUser->present = 1;
        $eventUser->save();
    }

    public function events($id)
    {       
        $user = User::find($id);
        return $user->events()->with('users')->get();
    }

}
