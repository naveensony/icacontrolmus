<?php

namespace App\Http\Controllers\control;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LinkController extends Controller
{
    public function index()
    {
        if(session('user') != null)
        {
            $class = 'link';
            return view('system.links',compact('class'));
        }
        else{
            Session::flash('message','invalid credentials');
            return  redirect()->route('control.loginpage');
        }
    }
}
