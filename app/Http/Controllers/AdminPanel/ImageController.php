<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Package;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pid)
    {
        $package = Package::find($pid);
        $image = DB::table('images')->where('package_id',$pid)->get();
        $dataSettings = Setting::first();
        return view('admin.image.index',[
            'image'=>$image,'package'=>$package,'cal'=>0,
            'dataSetting'=>$dataSettings
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$pid)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$pid)
    {
        $data = new Image();
        $data->package_id=$pid;
        $data->title=$request->title;
        $data->slider_text=$request->slider_text;
        if($request->file('image')){
            $data->image=$request->file('image')->store('images');
        }

        $data->save();
        return redirect()->route('admin_image_index',['pid'=>$pid]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $slider=Package::where('category_id',99)->get();
        $image = DB::table('images')->where('package_id',99)->get();
        $data = Image::find($id);

        return redirect()->route('admin_mainStyleSetting',[
            'slider'=>$slider,
            'image'=>$image,
            'cal'=>0,
            'showImage'=>$data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id,)
    {
        $data = Image::find($id);
        $data->title = $request->title;
        $data->slider_text = $request->slider_text;
        if ($request->file('image')){
            $data->image=$request->file('image')->store('images');
        }
        $data->save();
        $showImage=Image::find($id);
        return redirect()->route('admin_mainStyleSetting_show',[
            'id'=>$showImage
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pid,$id)
    {
        $data=Image::find($id);
        if ($data->image && Storage::disk('public')->exists($data->image)){
            Storage::delete($data->image);
        }

        if($data->package_id==99){
            $data->delete();
            return redirect()->route('admin_mainStyleSetting');
        }else{
            $data->delete();
            return redirect()->route('admin_image_index',['pid'=>$pid]);
        }

    }
}
