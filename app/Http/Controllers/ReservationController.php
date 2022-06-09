<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Package;
use App\Models\Reservation;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Reservation::where('user_id','=',Auth::user()->id);
        $dataSettings = Setting::first();
        return view('home.user.reservation',[
            'data'=>$data,
            'dataSettings'=>$dataSettings,
            'page'=>'reservation',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pid)
    {
        $pack=Package::find($pid);

        return view('home.reservation',[
            'pack'=>$pack,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$pid)
    {
        $data = new Reservation();
        $data->user_id = Auth::user()->id;
        $data->package_id = $pid;
        $data->start_date = $request->input('start_date');
        $data->person = $request->input('person');
        $data->price = $request->input('price');
        $data->amount = $request->input('amount');
        $data->note = $request->input('note');
        $data->ip = request()->ip();
        $data->save();

        return redirect()->route('reservation_create',['pid'=>$data->package_id])->with('info','Your message has been sent , Thank You. ');
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
    public function update(Request $request,$pid,$res)
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
