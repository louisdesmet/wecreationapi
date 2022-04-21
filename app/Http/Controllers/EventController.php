<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\EventSkill;
use App\EventSkillUser;
use App\Http\Resources\Event as EventRes;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EventRes::collection(Event::with('users', 'event_skill.skill', 'event_skill.users', 'project.leader', 'group')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'image' => 'image|mimes:jpg,png,jpeg',
        ]);

        $event = new Event;
        $event->name = $request->input('name');
        $event->description = $request->input('desc');
        $event->location = $request->input('location');
        $event->date = $request->input('date');
        $event->time = $request->input('time');
        $event->credits = 0;
        $event->lat = $request->input('lat');
        $event->lng = $request->input('lng');
        $event->project_id = $request->input('project');
        $event->image = "noimage.jpg";
        $event->save();

        $group = new Group;
        $group->name = $event->name;
        $group->event_id = $event->id;
        $group->save();

        foreach(json_decode($request->input('freeData')) as $data) {

            $eventSkill = new EventSkill;
            $eventSkill->event_id = $event->id;
            $eventSkill->skill_id = $data->skill;
            $eventSkill->amount = $data->amount;
            $eventSkill->hours = $data->hours;
            $eventSkill->paid = 0;
            $eventSkill->save();
        }

        foreach(json_decode($request->input('paidData')) as $data) {
            $eventSkill = new EventSkill;
            $eventSkill->event_id = $event->id;
            $eventSkill->skill_id = $data->skill;
            $eventSkill->amount = $data->amount;
            $eventSkill->hours = $data->hours;
            $eventSkill->credits = $data->credits;
            $eventSkill->paid = 1;
            $eventSkill->save();
        }

        

  

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/events');
            $image->move($destinationPath, $name);
            $event->image = $name;
            $event->save();
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
  
        /*$this->validate($request, [
            'image' => 'image|mimes:jpg,png,jpeg',
        ]);*/

        $event = Event::find($id);

        $event->name = $request->input('name');
        $event->description = $request->input('desc');
        $event->location = $request->input('location');
        $event->date = $request->input('date');
        $event->time = $request->input('time');
        $event->credits = 0;
        $event->lat = $request->input('lat');
        $event->lng = $request->input('lng');
        $event->image = "noimage.jpg";
        $event->save();

        foreach($request->input('freeData') as $data) {
            if(isset($data['eventSkill'])) {
                $eventSkill = EventSkill::find($data['eventSkill']);
            } else {
                $eventSkill = new EventSkill;
            }
            $eventSkill->event_id = $event->id;
            $eventSkill->skill_id = $data['skill'];
            $eventSkill->amount = $data['amount'];
            $eventSkill->hours = $data['hours'];
            $eventSkill->paid = 0;
            $eventSkill->save();
        }

        foreach($request->input('paidData') as $data) {
            if(isset($data['eventSkill'])) {
                $eventSkill = EventSkill::find($data['eventSkill']);
            } else {
                $eventSkill = new EventSkill;
            }
            $eventSkill->event_id = $event->id;
            $eventSkill->skill_id = $data['skill'];
            $eventSkill->amount = $data['amount'];
            $eventSkill->hours = $data['hours'];
            $eventSkill->credits = $data['credits'];
            $eventSkill->paid = 1;
            $eventSkill->save();
        }

        

  

       /* if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/events');
            $image->move($destinationPath, $name);
            $event->image = $name;
            $event->save();
        }*/
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
