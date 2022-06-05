<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Package;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class AdminHomeController extends Controller
{
    public function index(){

        $dataSettings = Setting::first();

        if ($dataSettings==null){
            $dataSettings = new Setting();
            $dataSettings->company ='Your Company';
            $dataSettings->title = 'Project Title';
            $dataSettings->save();
            $dataSettings = Setting::first();
        }

        return view('admin.index',[
            'dataSetting'=>$dataSettings
        ]);
    }

    public function setting(){

        $data=Setting::first();

        if ($data==null){
            $data = new Setting();
            $data->company ='Your Company';
            $data->title = 'Project Title';
            $data->save();
            $data = Setting::first();
        }

        return view("admin.setting",[
            'data' => $data
        ]);
    }

    public function settingUpdate(Request $request){

        $id= $request->input('id');
        $data = Setting::find($id);

        $data->title = $request->input('title');
        $data->keywords = $request->input('keywords');
        $data->description = $request->input('description');
        $data->company = $request->input('company');
        $data->address = $request->input('address');
        $data->phone = $request->input('phone');
        $data->fax = $request->input('fax');
        $data->email = $request->input('email');
        $data->smtpserver = $request->input('smtpserver');
        $data->smtpemail = $request->input('smtpemail');
        $data->smtppassword = $request->input('smtppassword');
        $data->smtpport = $request->input('smtpport');
        $data->facebook = $request->input('facebook');
        $data->instagram = $request->input('instagram');
        $data->twitter = $request->input('twitter');
        $data->youtube = $request->input('youtube');
        $data->youtube = $request->input('');
        $data->aboutus = $request->input('aboutus');
        $data->contact = $request->input('contact');
        $data->references = $request->input('references');
        if ($request->file('icon')){
            $data->icon = $request->file('icon')->store('images');
        }
        $data->status = $request->input('status');
        $data->save();

        return redirect()->route('admin_setting');
    }

    /* -login- */

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function loginAdmincheck(Request $request){
        $credentials = $request->validate([
            'email'=>['required','email'],
            'password'=>['required'],
        ]);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->withErrors([
           'error'=>'The provided credentials do not match our record.',
        ])->onlyInput('email');
    }

    /*deneme*/

    public function mainStyleSetting(){
        $slider=Package::where('category_id',99)->get();
        $image = DB::table('images')->where('package_id',99)->get();
        return view('admin.main-style-setting',[
            'slider'=>$slider,
            'image'=>$image,
            'cal'=>0,
        ]);
    }

    public function mainStyleSetting_Show($id){
        $img=Image::find($id);
        return view('admin.main-style-setting_show',[
            'img'=>$img,
        ]);
    }

    public function mainStyleSetting_Store(Request $request,$pid){
        $data = new Image();
        $data->package_id=$pid;
        $data->title=$request->title;
        $data->slider_text=$request->slider_text;
        if($request->file('image')){
            $data->image=$request->file('image')->store('images');
        }

        $data->save();
        return redirect()->route('admin_mainStyleSetting');
    }

}
