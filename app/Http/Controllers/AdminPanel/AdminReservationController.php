<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Reservation;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status)
    {
        $reservation = Reservation::where('status','=',$status)->get();
        $dataSettings = Setting::first();
        return view('admin.reservation.index',[
            'R_status'=>$status,
            'reservation'=>$reservation,
            'dataSetting'=>$dataSettings,
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return "why are you here ?";
        $reservation = Reservation::find($id);
        $dataSettings = Setting::first();
        return view('admin.reservation.show',[
            'data'=>$reservation,
            'dataSetting'=>$dataSettings,
        ]);
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

        $data =Reservation::find($id);
        $data->note = $request->input('note');
        $data->status = $request->input('status');
        $data->save();

        return redirect(route('admin_reservation_show',['id'=>$data->id]));
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

    public function cancel($id,$status)
    {
        $data = Reservation::find($id);
        $data->status="Cancelled";
        $data->save();
        return redirect()->route('admin_reservation_index',['status'=>$status]);
    }
}
