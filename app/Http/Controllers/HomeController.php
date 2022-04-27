<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
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
        return view('home.deneme',[
            'data'=>$data
        ]);
    }

    public function package(){
        return view('home.deneme2');
    }
    /*deneme---*/
}
