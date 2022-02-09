<?php

namespace App\Http\Controllers\control;

use App\Http\Controllers\Controller;
use App\Models\control\metros;
use App\Models\control\teacher as ControlTeacher;
use App\Models\control\teacher_subscriptions;
use App\models\Instrument;
use App\Models\system\TeacherNames;
use App\models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        if(session('user') != null)
        {
            $var['staff'] = Session::get('user')->staff_id;
            $config['num_links'] = 5;
        $config['page_query_string'] = TRUE;

        if($request->has('searchwords'))
      {
        $vars['teachers'] = TeacherNames::select('teacherId AS teachers_id', 'firstName as firstname', 'lastName as lastname', 'email', 'addressL1 AS address', 'addressL2 AS address2', 'city', 'stateId AS state', 'zipCode AS zip', 'status', 'social', 'instruments', 'phone AS phone_day', 'phone2 AS phone_eve', 'phone3 AS phone_cel', 'musika_id')
        ->where('firstname', 'Like', '%' . $request->searchwords . '%')->orwhere('lastname', 'Like', '%' . $request->searchwords . '%')->orderby('firstname','asc')->orderby('lastname','asc')->paginate(50)->appends(['search' => $request->search_words]);
      }
      else
      {
        $vars['teachers'] = TeacherNames::select('teacherId AS teachers_id', 'firstName as firstname', 'lastName as lastname', 'email', 'addressL1 AS address', 'addressL2 AS address2', 'city', 'stateId AS state', 'zipCode AS zip', 'status', 'social', 'instruments', 'phone AS phone_day', 'phone2 AS phone_eve', 'phone3 AS phone_cel', 'musika_id')
        ->orderby('firstname','asc')->orderby('lastname','asc')->paginate(50);
    
      }
        $vars['searchwords'] = $request->searchwords;
      
        //$this->pagination->initialize($config);
      
      
       //$this->load->view('customers/list', $vars);

        $class = 'customer';
        return view('teacher.index',compact('class','vars'));




            
        }
        else{
            Session::flash('message','invalid credentials');
            return  redirect()->route('control.loginpage');
        }
    }

    public function searchmetro(Request $request)
    {
      
        if(session('user') != null)
        {
            
		$vars['instruments'] = Instrument::where('is_active','Y')->limit(20)->get();
		$vars['metros'] = metros::orderby('name','asc')->get();
		
		if($request->instrument != '' && $request->metro != '')
		{
            
            $vars['teachers'] = teacher_subscriptions::where('instruments_id',$request->instrument)
            ->where('metros_id',$request->metro)->where('status','active')
			->join('teacherNames','teacherNames.teacherId', '=','teacher_subscriptions.teachers_id')
			->select('teacherNames.teacherId AS teachers_id', 'teacherNames.firstName AS firstname', 'teacherNames.lastName AS lastname')
			->get();
			
			
			
			
			
		}
        $meto = $request->metro;
        $instrumens = $request->instrument;
	
        
            $class = 'new_application';
            return view('teacher.searchmetro',compact('class','vars','meto','instrumens'));
        }
        else
        {
            Session::flash('message','invalid credentials');
            return  redirect()->route('control.loginpage');
        }
    
    }
}
