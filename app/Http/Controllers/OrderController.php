<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\Product;
use App\Message;
use App\Http\Resources\Order as OrderRes;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OrderRes::collection(Order::with('product.business', 'user')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::find($request->input('product'));
        $user = User::find($request->input('user'));

        if($product->amount > 0 && $user->credits >= $product->price) {

            $order = new Order;
            $order->product_id = $request->input('product');
            $order->user_id = $request->input('user');
            $order->save();    
            $product->amount -= 1;
            $product->save(); 
            $user->credits -= $product->price;
            $user->save();

            $message = new Message;
            $message->notification = 1;
            $message->recipient_id = $request->input('business_user');
            $message->message =  $user->name . " wilt een " . $product->name . " kopen voor " . $product->price . " credits.";
            $message->save();

            return $order;
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
