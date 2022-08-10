<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transfer;
use App\Message;
use App\Http\Resources\Transfer as TransferRes;
use Illuminate\Support\Facades\DB;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TransferRes::collection(Transfer::with('user')->get());
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
        $amount = intval($request->input('amount'));
        $user = User::find($request->input('user'));

        if($user->credits >= $amount) {

            $transfer = new Transfer;
            $transfer->user_id = $request->input('user');
            $transfer->amount = $amount;
            $transfer->accepted = 0;
            $transfer->buy = 0;
            $transfer->save();
            $user->credits -= $amount;
            $user->save();

            $message = new Message;
            $message->notification = 1;
            $message->recipient_id = $user->id;
            $message->message = "Je vroeg aan om " . $request->input('amount') . " credits om te ruilen voor " . $request->input('amount') . " euro.";
            $message->seen = 0;
            $message->save();

            return $transfer;
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
