<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\User;

class GeneralController extends Controller
{
    
    public function subscribe(Request $request)
    {
        $event = Event::find($request->event_id);
        $event->users()->attach([$request->user_id => ['hours' => $request->hours]]);
    }

    public function events($id)
    {
        
        $user = User::find($id);
        return $user->events()->get();

    }


}
