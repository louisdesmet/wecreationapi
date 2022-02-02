<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\EventSkill;
use App\EventSkillUser;
use App\Http\Resources\Event as EventRes;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EventRes::collection(Event::with('event_skill.skill', 'event_skill.users', 'project.leader')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event;
        $event->name = $request->input('name');
        $event->description = $request->input('desc');
        $event->location = $request->input('location');
        $event->date = $request->input('date');
        $event->time = '10 uur';
        $event->credits = 0;
        $event->lat = 51.035;
        $event->lng = 3.7168;
        $event->project_id = $request->input('project');
        $event->save();

        foreach($request->input('freeData') as $data) {
            $eventSkill = new EventSkill;
            $eventSkill->event_id = $event->id;
            $eventSkill->skill_id = $data['skill'];
            $eventSkill->amount = $data['amount'];
            $eventSkill->hours = $data['hours'];
            $eventSkill->paid = 0;
            $eventSkill->save();
        }

        foreach($request->input('paidData') as $data) {
            $eventSkill = new EventSkill;
            $eventSkill->event_id = $event->id;
            $eventSkill->skill_id = $data['skill'];
            $eventSkill->amount = $data['amount'];
            $eventSkill->hours = $data['hours'];
            $eventSkill->credits = $data['credits'];
            $eventSkill->paid = 1;
            $eventSkill->save();
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $event->name = $request->input('name');
        $event->location = $request->input('location');
        $event->date = $request->input('date');
        $event->credits = $request->input('credits');
        $event->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $eventSkills = EventSkill::where('event_id', $id)->get();
        foreach($eventSkills as $eventSkill) {
            EventSkillUser::where('event_skill_id', $eventSkill->id)->delete();
           

        }
        foreach($eventSkills as $eventSkill) {
            $eventSkill->delete();

        }
        
        $event = Event::find($id);
        $event->delete();
    }
}
