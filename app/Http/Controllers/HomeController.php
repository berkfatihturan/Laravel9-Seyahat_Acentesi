<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Package;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data = Package::all();
        $dataCategory = Category::where('parent_id', '=', 0)->limit(4)->get();
        return view('home.index',[
            'data'=>$data, 'dataCategory'=>$dataCategory
        ]);
    }

    /*deneme*/
    public function search(Request $request){
        $data = Package::where('start_date','>=',$request->start_date)->get();
        return view('home.search-list',[
            'data'=>$data
        ]);
    }

    public function list(){
        $data = Package::all();
        return view('home.search-list',[
            'data'=>$data
        ]);
    }

    public function package($pid){
        $pack= Package::find($pid);
        $data = DB::table('images')->where('package_id',$pid)->get();
        return view('home.deneme2',[
            'data'=>$data,
            'counter'=>0,
            'counter2'=>0,
            'pack'=>$pack,
        ]);
    }
    /*deneme---*/
}
