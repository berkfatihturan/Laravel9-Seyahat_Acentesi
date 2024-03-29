<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Package;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataSettings = Setting::first();

        return view('home.user.index',[
            'dataSettings'=>$dataSettings,
            'page'=>'User'
        ]);
    }

    public function comments()
    {
        $dataSettings = Setting::first();
        $comments = Comment::where('user_id','=',Auth::id())->orderBy('updated_at', 'DESC')->get();

        return view('home.user.comments',[
            'dataSettings'=>$dataSettings,
            'page'=>'comment',
            'comments'=>$comments,
            'info'=>"",
        ]);
    }

    public function commentDestroy($id)
    {
        $data = Comment::find($id);
        $data->delete();
        return redirect(route('userpanel_comments'));
    }

    public function commentUpdate(Request $request, $id)
    {
        $data =Comment::find($id);
        $data->status = "New";

        $data->subject=$request->input('subject');
        $data->comment=$request->input('comment');
        $data->rate=$request->input('rate');
        $data->ip=request()->ip();
        $data->save();

        return redirect()->route('userpanel_comments')->with('info','Your comment has been updated');

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
        //
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


    public function mypackage(){

        $data = Package::where('user_id','=',Auth::id())->get();

        $dataSettings = Setting::first();

        return view('home.user.myPackage',[
            'pack'=>$data,

            'dataSettings'=>$dataSettings,
            'page'=>"mypackage"
        ]);
    }
}
