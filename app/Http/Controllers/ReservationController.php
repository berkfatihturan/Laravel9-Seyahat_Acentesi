<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Package;
use App\Models\Reservation;
use App\Models\Setting;
use App\Models\User;
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
        $user = User::find(Auth::id());
        $reservation = Reservation::where('user_id','=',Auth::id())->orderBy('updated_at','DESC')->get();
        $dataSettings = Setting::first();
        return view('home.user.reservation',[
            'reservation'=>$reservation,
            'user'=>$user,
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
        $date_max=now()->format('Y-m-d');

        return view('home.reservation',[
            'pack'=>$pack,
            'date_max'=>$date_max,
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

        $data->address = $request->input('address');
        $data->id_number = $request->input('tcnumber');
        $data->email = $request->input('email');
        $data->phone_number = $request->input('phone_number');

        $data->note = $request->input('note');
        $data->ip = request()->ip();
        $data->save();


        return redirect()->route('reservation_index')->with('info','Your reservation request has been sent successfully , Thank You. ');
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

    public function cancel($id)
    {
        $data = Reservation::find($id);
        $data->status="Cancelled";
        $data->save();
        return redirect()->route('reservation_index');
    }
}
