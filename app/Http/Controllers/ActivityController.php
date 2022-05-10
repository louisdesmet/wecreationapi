<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\Http\Resources\Activity as ActivityRes;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ActivityRes::collection(Activity::with("users")->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        $activity = new Activity;
        $activity->name = $request->input('name');
        $activity->description = $request->input('desc');
        $activity->date = $request->input('date');
        $activity->time = $request->input('time');
        $activity->ticketlink = $request->input('ticketlink');
        $activity->location = $request->input('location');
        $activity->lat = $request->input('lat');
        $activity->lng = $request->input('lng');
        $activity->user_id = $request->input('user');
        

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/activities');
            $image->move($destinationPath, $name);
            $activity->image = $name;
        } else {
            $activity->image = "noimage.jpg";
        }
        $activity->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $activity = Activity::find($id);
        $activity->name = $request->input('name');
        $activity->location = $request->input('location');
        $activity->date = $request->input('date');
        $activity->lat = $request->input('lat');
        $activity->lng = $request->input('lng');
        $activity->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
