<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=User::all();
        $dataSetting = Setting::first();
        return view('admin.user.index',[
            'data'=>$data,
            'dataSetting'=>$dataSetting,

        ]);
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
        $data = User::find($id);
        $roles=Role::all();
        return view('admin.user.show',[
            'data'=>$data,
            'roles'=>$roles,
        ]);
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

    public function addRole(Request $request, $id)
    {
        $data = new RoleUser();
        $data->user_id=$id;
        $data->role_id=$request->role;
        if (RoleUser::where('role_id','=',$data->role_id)->where('user_id','=',$data->user_id)->first()==null){
            $data->save();
            return redirect(route('admin_user_show',['id'=>$id]));
        }else{
            return redirect()->route('admin_user_show',['id'=>$id])->with('error','You Alrady Have This Role');
        }



    }

    public function deleteRole($rid,$uid)
    {
        $data = User::find($uid);
        if(RoleUser::where('role_id','=','1')->count() <= 1 && $rid==1){
            return redirect()->route('admin_user_show',['id'=>$uid])->with('error','Must Have At Least One Admin');
        }else{
            $data->roles()->detach($rid);
            return redirect(route('admin_user_show',['id'=>$uid]));
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $data->roles()->detach();
        $data->delete();
        return "ok";
    }
}
