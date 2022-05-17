<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Package;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use function GuzzleHttp\Promise\all;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $appends =[
        'getParentsTree'
    ];

    public static function getParentsTree($package,$title){
        if ($package->category_id == 0){
            return $title;
        }

        $parent= Package::find($package->category_id);
        $title = $parent->title . ' > ' .$title;
        return PackageController::getParentsTree($parent,$title);
    }



    public function index()
    {
        $data = Package::all();
        $dataSettings = Setting::first();
        return view('admin.package.index',[
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
        $data = Category::all();
        $dataSettings = Setting::first();
        return view('admin.package.create',[
            'data'=>$data,
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
        $data = new Package();
        $data->category_id= $request->category_id;
        $data->user_id=0;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->descriptions = $request->descriptions;
        $data->detail=$request->detail;
        $data->nights=$request->nights;
        $data->price = $request->price ;
        $data->start_date = $request->start_date;
        $data->end_date= $request->end_date ;
        $data->tax = $request->tax ;
        if ($request->file('image')){
            $data->image=$request->file('image')->store('images');
        }
        $data->status = $request->status;
        $data->save();
        return redirect('admin/package');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package,$id)
    {
        $data = Package::find($id);
        $dataSettings = Setting::first();
        return view('admin.package.show',[
            'data'=>$data,
            'dataSetting'=>$dataSettings
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package,$id)
    {
        $data = Package::find($id);
        $dataList = Category::all();
        $dataSettings = Setting::first();
        return view('admin.package.edit',[
            'data'=>$data,'dataList'=>$dataList,
            'dataSetting'=>$dataSettings
        ]);
    }

    /**
     * Updata the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package,$id)
    {
        $data = Package::find($id);
        $data->category_id= $request->category_id;
        $data->user_id=0;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->descriptions = $request->descriptions;
        $data->nights=$request->nights;
        $data->detail=$request->detail;
        $data->price = $request->price ;
        $data->start_date = $request->start_date;
        $data->end_date= $request->end_date ;
        $data->tax = $request->tax ;
        if ($request->file('image')){
            $data->image=$request->file('image')->store('images');
        }
        $data->status = $request->status;
        $data->save();
        return redirect('admin/package');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package,$id)
    {
        $data= Package::find($id);
        if($data->image && Storage::disk('public')->exists($data->image)){
            Storage::delete($data->image);
        }

        /*$collection = Image::where('package_id', '$id')->get(['*']);
        Image::destroy(collect($collection));*/

        /*Image delete */
        Image::where('package_id', '=', $id)->delete();

        $data->delete();
        return redirect('admin/package');
    }

}
