<?php

namespace App\Http\Controllers\control;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Newapplication extends Controller
{
    public function index()
    {
        if(session('user') != null)
        {
            $class = 'new_application';
            return view('system.new_application',compact('class'));
        }
        else{
            Session::flash('message','invalid credentials');
            return  redirect()->route('control.loginpage');
        }
    }
}
