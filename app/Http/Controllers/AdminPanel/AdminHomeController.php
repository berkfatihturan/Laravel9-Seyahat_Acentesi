<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{

    public function index(){
        return view('admin.index');
    }

}