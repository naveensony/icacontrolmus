<?php

namespace App\Http\Controllers\control;

use App\Http\Controllers\Controller;
use App\Models\system\StudentNames;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentsController extends Controller
{
    public function index()
    {
        if(session('user') != null)
        {
            $class = 'student';
            return view('system.students',compact('class'));
        }
        else{
            Session::flash('message','invalid credentials');
            return  redirect()->route('control.loginpage');
        }
    }

    public function controlindex()
    {
        if(session('user') != null)
        {
            $class = 'student';
            $students = StudentNames::orderby('firstname','asc')->orderby('lastname','asc')->paginate(20);
            
            return view('students.index',compact('students'));
        }
        else{
            Session::flash('message','invalid credentials');
            return  redirect()->route('control.loginpage');
        }
    }
}
