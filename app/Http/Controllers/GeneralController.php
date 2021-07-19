<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Order;
use App\User;
use App\EventUser;
use App\EventSkill;
use App\Skill;

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
        
        $event = Event::find($eventUser->event_id);       

        $user = User::find($eventUser->user_id);

        $totalSkillHours = 0;
        $totalSkillValue = 0;
        if($event->skill) {
            foreach(json_decode($event->skill) as $eventSkill) {
                foreach(Skill::all() as $skill) {
                    $totalSkillHours += $eventSkill->hours;
                    $calc = $eventSkill->hours * $skill->value;
                    $totalSkillValue += $calc;
                }
            }
    
            $totalGenaralValue = $event->hours - $totalSkillValue;
            $totalGeneralHours = $event->hours - $totalSkillHours;
            
            $generalValue = $totalGenaralValue / $totalGeneralHours;
    
            $user->credits = $user->credits + ($eventUser->hours * $generalValue);
            $user->save();
        } else {
            $user->credits += $eventUser->hours;
            $user->save();
        }
     

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

    public function verifyOrder(Request $request)
    {
        $order = Order::find(intval($request->order));
        $order->accepted = 1;
        $order->save();
    }

}