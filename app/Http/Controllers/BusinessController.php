<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;
use App\Product;
use App\User;
use App\Http\Resources\Business as BusinessRes;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BusinessRes::collection(Business::with('products', 'users')->get());
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

        $business = new Business;
        $business->name = $request->input('name');
        $business->type = $request->input('type');
        $business->description = $request->input('desc');
        $business->location = $request->input('location');
        $business->lat = $request->input('lat');
        $business->lng = $request->input('lng');
        $business->image = "noimage.jpg";
        $business->save();

        $user = User::find($request->input('user'));

        if($request->input('type') === "business") {
            $user->roles()->syncWithoutDetaching([
                3 => ['business_id' => $business->id]
            ]);
        } else {
            $user->roles()->syncWithoutDetaching([
                4 => ['business_id' => $business->id]
            ]);
        }

        foreach(json_decode($request->input('freeData')) as $data) {
            $product = new Product;
            $product->business_id = $business->id;
            $product->name = $data->name;
            $product->description = $data->desc;
            $product->price = $data->price;
            if($request->input('type') === "business") {
                $product->amount = $data->stock;
            }
            if($request->input('type') === "service") {
                $product->date = $data->date;
                $product->start_hour = $data->starthour;
                $product->end_hour = $data->endhour;
            }
            $product->picture = "noimage.jpg";
            $product->save();
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/businesses');
            $image->move($destinationPath, $name);
            $business->image = $name;
            $business->save();
        }

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
        $business = Business::find($id);
        $business->name = $request->input('name');
        $business->type = $request->input('type');
        $business->description = $request->input('desc');
        $business->location = $request->input('location');
        $business->lat = $request->input('lat');
        $business->lng = $request->input('lng');
        $business->save();

        foreach($request->input('freeData') as $data) {
            if(isset($data['product'])) {
                $product = Product::find($data['product']);
            } else {
                $product = new Product;
            }
            $product->business_id = $business->id;
            $product->name = $data['name'];
            $product->description = $data['desc'];
            $product->price = $data['price'];
            if($request->input('type') === "business") {
                $product->amount = $data['stock'];
            }
            if($request->input('type') === "service") {
                $product->date = $data['date'];
                $product->start_hour = $data['starthour'];
                $product->end_hour = $data['endhour'];
            }  
            if(!$product->picture) {
                $product->picture = "noimage.jpg";
            }
            $product->save();
        }
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

    public function addimage(Request $request)
    {

        $this->validate($request, [
            'image' => 'image|mimes:jpg,png,jpeg',
        ]);

        $business = Business::find($request->input('businessid'));

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/businesses');
            $image->move($destinationPath, $name);
            $business->image = $name;
            $business->save();
        }

    }
}
