<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Faq;
use App\Models\Image;
use App\Models\Message;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Package;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public static function maincategorylist(){

        return Category::where('parent_id','=',0)->where('id','!=',99)->where('status','=','True')->with('children')->get();
    }

    public function index(){
        $data = Package::where('status','=','True')->get();
        $dataNavImage=Package::where('category_id', '=', 99)->get();
        $CategoryList = Category::all();
        $dataCategory = Category::where('parent_id', '=', 0)->where('status','=','True')->limit(4)->get();
        $dataSettings = Setting::first();
        return view('home.index',[
            'data'=>$data,
            'CategoryList'=>$CategoryList,
            'dataCategory'=>$dataCategory,
            'dataSettings'=>$dataSettings,
            'page'=>"home",
            'dataNavImage'=>$dataNavImage,
            'cnt'=>0,
        ]);
    }

    /*deneme*/
    public function search(Request $request){
        $dataSettings = Setting::first();
        $data = Package::where('start_date','>=',$request->start_date)

            ->where('status','=','True')
            ->where('category_id','=',$request->category_id)
            ->where('num_people','>=',($request->mum_people_adult+$request->mum_people_children))
            ->get();
        return view('home.search-list',[
            'data'=>$data,
            'dataSettings'=>$dataSettings,
            'page'=>"search",
        ]);
    }

    public function list(){
        $data = Package::where('status','=','True')->get();
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
        $dataComment= Comment::where('package_id', '=', $pid)->where('status','True')->get();
        return view('home.package',[
            'data'=>$data,
            'counter'=>0,
            'counter2'=>0,
            'pack'=>$pack,
            'dataSettings'=>$dataSettings,
            'page'=>"package",
            'dataComment'=>$dataComment,
        ]);
    }

    public function categorypackage($id,$slug){
        $category=Category::find($id);
        $data = Package::where('category_id','=',$id)->where('status','=','True')->get();
        $dataSettings = Setting::first();
        return view('home.search-list',[
            'data'=>$data,
            'category'=>$category,
            'dataSettings'=>$dataSettings,
            'page'=>"list",
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
        $data = Package::all();
        $dataSettings = Setting::first();
        return view('home.about',[
            'data'=>$data,
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

    public function faq(){
        $data= Faq::all();
        $dataSettings = Setting::first();
        return view('home.faq',[
            'data'=>$data,
            'dataSettings'=>$dataSettings,
            'page'=>"faq",
        ]);
    }

    public function packagecomment(Request $request){
        $data = new Comment();
        $data->user_id = Auth::id();
        $data->package_id = $request->input('package_id');
        $data->subject=$request->input('subject');
        $data->comment=$request->input('comment');
        $data->rate=$request->input('rate');
        $data->ip=request()->ip();
        $data->save();

        return redirect()->route('home_package',['pid'=>$request->input('package_id')])->with('info','Your comment has been sent , Thank You. ');
    }



    /*deneme---*/
}
