<?php

namespace App\Http\Controllers\control;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProspectiveController extends Controller
{
    public function index()
    {
        if(session('user') != null)
        {
            $class = 'prospective';
            return view('system.prospective_search',compact('class'));
        }
        else{
            Session::flash('message','invalid credentials');
            return  redirect()->route('control.loginpage');
        }
    }
}
