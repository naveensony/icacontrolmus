<?php

namespace App\Http\Controllers\control;

use App\Http\Controllers\Controller;
use App\Models\control\access_ips;
use App\models\Instrument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller 
{
    public function ipmanager()
    {
        if(session('user') != null)
        {
            

        $vars = array();
        $var['staff'] = Session::get('user')->staff_id;
        $vars['ips'] = access_ips::limit(20)->get();

            $class = 'link';
            return view('settings.ip_manager',compact('class','vars'));
        }
        else{
            Session::flash('message','invalid credentials');
            return  redirect()->route('control.loginpage');
        }
    }

    public function instruments()
    {
        if(session('user') != null)
        {
            

            
            $vars = array();
    
            $vars['instruments'] = Instrument::where('is_active','Y')->limit(20)->get();
            
            
            $class = 'link';
            return view('settings.instruments',compact('class','vars'));
        }
        else{
            Session::flash('message','invalid credentials');
            return  redirect()->route('control.loginpage');
        }
    }
}
