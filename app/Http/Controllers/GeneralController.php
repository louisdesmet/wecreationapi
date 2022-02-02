<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Order;
use App\User;
use App\EventSkillUser;
use App\EventSkill;
use App\Skill;

class GeneralController extends Controller
{

    public function subscribeSkill(Request $request)
    {
        /*$eventSkill = new EventSkillUser;
        $eventSkill->event_skill_id = $request->input('event_skill_id');
        $eventSkill->user_id = $request->input('user_id');
        $eventSkill->save();*/
        $eventSkill = EventSkill::find($request->eventSkillId);
        $eventSkill->users()->syncWithoutDetaching([$request->userId]);

    }

    public function accept(Request $request)
    {
        $eventUser = EventSkillUser::where('user_id', $request->userId)->where('event_skill_id', $request->eventSkillId)->first();
        $eventUser->accepted = 1;
        $eventUser->save();
    }

    public function present(Request $request)
    {
        $leader = User::find($request->leader);
        $user = User::find($request->userId);

        if($leader->credits >= $request->credits && $request->credits) {
            $leader->credits = $leader->credits - $request->credits;
            $leader->save();
            $user->credits = $user->credits + $request->credits;
            $user->save();
            $eventUser = EventSkillUser::where('user_id', $request->userId)->where('event_skill_id', $request->eventSkillId)->first();
            $eventUser->present = 1;
            $eventUser->save();
        } else {
            $eventUser = EventSkillUser::where('user_id', $request->userId)->where('event_skill_id', $request->eventSkillId)->first();
            $eventUser->present = 1;
            $eventUser->save();
        }

        
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