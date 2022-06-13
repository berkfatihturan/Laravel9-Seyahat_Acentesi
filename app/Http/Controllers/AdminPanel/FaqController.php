<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Package;
use App\Models\Setting;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Faq::all();
        $dataSettings = Setting::first();
        return view('admin.faq.index',[
            'data'=>$data,
            'dataSetting'=>$dataSettings
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataSettings = Setting::first();
        return view('admin.faq.create',[
            'dataSetting'=>$dataSettings
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Faq();
        $data->question = $request->question;
        $data->answer = $request->answer;
        $data->status = $request->status;
        $data->save();
        return redirect('admin/faq');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Faq::find($id);
        $dataSettings = Setting::first();
        return view('admin.faq.edit',[
            'data'=>$data,
            'dataSetting'=>$dataSettings
        ]);
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
        $data = Faq::find($id);
        $data->question = $request->question;
        $data->answer = $request->answer;
        $data->status = $request->status;
        $data->save();
        return redirect('admin/faq');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Faq::find($id);
        $data->delete();
        return redirect('admin/faq');
    }
}
