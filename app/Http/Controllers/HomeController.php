<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Message;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use App\Models\Package;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data = Package::all();
        $dataCategory = Category::where('parent_id', '=', 0)->limit(4)->get();
        $dataSettings = Setting::first();
        return view('home.index',[
            'data'=>$data,
            'dataCategory'=>$dataCategory,
            'dataSettings'=>$dataSettings,
            'page'=>"home"
        ]);
    }

    /*deneme*/
    public function search(Request $request){
        $dataSettings = Setting::first();
        $data = Package::where('start_date','>=',$request->start_date)->get();
        return view('home.search-list',[
            'data'=>$data,
            'dataSettings'=>$dataSettings,
            'page'=>"search",
        ]);
    }

    public function list(){
        $data = Package::all();
        $dataSettings = Setting::first();
        return view('home.search-list',[
            'data'=>$data,
            'dataSettings'=>$dataSettings,
            'page'=>"list",
        ]);
    }

    public function package($pid){
        $pack= Package::find($pid);
        $dataSettings = Setting::first();
        $data = DB::table('images')->where('package_id',$pid)->get();
        return view('home.package',[
            'data'=>$data,
            'counter'=>0,
            'counter2'=>0,
            'pack'=>$pack,
            'dataSettings'=>$dataSettings,
            'page'=>"package",
        ]);
    }

    public function references(){
        $dataSettings = Setting::first();
        return view('home.references',[
            'dataSettings'=>$dataSettings,
            'page'=>"references",
        ]);
    }

    public function about(){
        $dataSettings = Setting::first();
        return view('home.about',[
            'dataSettings'=>$dataSettings,
            'page'=>"about",

        ]);
    }

    public function contact(){
        $dataSettings = Setting::first();
        return view('home.contact',[
            'dataSettings'=>$dataSettings,
            'page'=>"contact",
        ]);
    }

    public function storemessage(Request $request){
        $data = new Message();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->subject = $request->input('subject');
        $data->message = $request->input('message');
        $data->ip = request()->ip();
        $data->save();

        return redirect()->route('contact')->with('info','Your message has been sent , Thank You. ');
    }



    /*deneme---*/
}
