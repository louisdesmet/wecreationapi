<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Order;
use App\User;
use App\EventSkillUser;
use App\EventSkill;
use App\Skill;
use App\Message;

class GeneralController extends Controller
{

    public function subscribeSkill(Request $request)
    {
        $eventSkill = EventSkill::find($request->eventSkillId);
        $eventSkill->users()->syncWithoutDetaching([$request->userId]);
    }

    public function accept(Request $request)
    {
        $eventUser = EventSkillUser::where('user_id', $request->user)->where('event_skill_id', $request->eventSkill['id'])->first();
        $eventUser->accepted = 1;
        $eventUser->save();

        $message = new Message;
        $message->notification = 1;
        $message->recipient_id = $request->user;
        $message->message = "De project leider " . $request->leader . " heeft je aanvraag voor " . $request->eventSkill['hours'] . " uur " . $request->eventSkill['skill']['name'] . " goedgekeurd voor het event " . $request->eventName . ".";
        $message->seen = 0;
        $message->save();
    }

    public function decline(Request $request)
    {
        $eventUser = EventSkillUser::where('user_id', $request->user)->where('event_skill_id', $request->eventSkill)->delete();
    }

    public function present(Request $request)
    {
        $leader = User::find($request->leader);
        $user = User::find($request->user);

        if($leader->credits >= $request->credits && $request->credits) {
            $leader->credits = $leader->credits - $request->credits;
            $leader->save();
            $user->credits = $user->credits + $request->credits;
            $user->save();
            $eventUser = EventSkillUser::where('user_id', $request->user)->where('event_skill_id', $request->eventSkill)->first();
            $eventUser->present = 1;
            $eventUser->save();
        } else {
            $eventUser = EventSkillUser::where('user_id', $request->user)->where('event_skill_id', $request->eventSkill)->first();
            $eventUser->present = 1;
            $eventUser->save();
        }

    }

    public function completeEvent(Request $request)
    {
        $event = Event::find($request->event);
        $event->completed_at = date('d-m-y h:i:s');
        $event->save();
       

    }

    public function notPresent(Request $request)
    {
        $eventUser = EventSkillUser::where('user_id', $request->user)->where('event_skill_id', $request->eventSkill)->delete();
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

    public function likeEvent(Request $request)
    {
        $user = User::find($request->user);
        $user->events()->syncWithoutDetaching($request->event); 
    }

    public function likeActivity(Request $request)
    {
        $user = User::find($request->user);
        $user->activities()->syncWithoutDetaching($request->activity);
    }

    public function likeBusiness(Request $request)
    {
        $user = User::find($request->user);
        $user->businesses()->syncWithoutDetaching($request->business);
    }

    public function likeUser(Request $request)
    {
        $user = User::find($request->liker['id']);
        $user->givenLikes()->syncWithoutDetaching($request->user);

        $message = new Message;
        $message->notification = 1;
        $message->recipient_id = $request->user;
        $message->message = $request->liker['name'] . " vind je profiel leuk.";
        $message->seen = 0;
        $message->save();
    }

}