<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\User;
use App\EventUser;
use App\EventSkill;

class GeneralController extends Controller
{
    
    public function subscribe(Request $request)
    {
        $event = Event::find($request->event_id);
        $event->users()->attach([$request->user_id => ['hours' => $request->hours]]);
    }

    public function subscribeSkill(Request $request)
    {
        $eventSkill = new EventSkill;
        $eventSkill->event_id = $request->input('event_id');
        $eventSkill->skill_id = $request->input('skill_id');
        $eventSkill->user_id = $request->input('user_id');
        $eventSkill->hours = $request->input('hours');
        $eventSkill->save();
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

    public function trade(Request $request)
    {   
        $user = User::find(intval($request->user_id));
        $user->credits = $user->credits + $request->amount;
        $user->save();
        $loggedUser = User::find($request->loggedUser);
        $loggedUser->credits = $loggedUser->credits - $request->amount;
        $loggedUser->save();
    }

}
