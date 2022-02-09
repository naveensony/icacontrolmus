<?php

namespace App\Http\Controllers\control;

use App\Http\Controllers\Controller;
use App\Models\control\Staff;
use App\Models\system\Cc_declined;
use App\Models\system\Connections;
use App\Models\system\Inquiries;
use App\Models\system\LessonRecords;
use App\Models\system\MakeRequest;
use App\Models\system\Prospective_students;
use App\Models\system\Registrations;
use App\Models\system\StudentNames;
use App\Models\system\TeacherNames;
use App\Models\system\Tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function loginpage()
    {

        return view('control.login');
    }
    public function index(Request $request)
    {
        
        if($request->username )  
        {
            //$this->load->model('Staff');
            //$staff_member = $this->Staff->read(array('username' => $this->input->post('username'), 'password' => $this->input->post('password')));
            $staff_member = Staff::where('username',$request->username)->where('password',$request->password)->first();
            //print_r($result);
            
            if($staff_member == FALSE)
            {
                Session::flash('message','invalid credentials');
                return  redirect()->route('control.loginpage');
            }
            else
            {




                session(['staff_username' => $request->username]);
                session(['staff_password' => $request->password]);
                session(['user' => $staff_member]);
                return redirect()->route('control.dashboard');
            }

        }
        
        return  redirect()->route('control.loginpage');
    }

    public function loging_in()
    {
        $this->load->view('control/loging_in');
    }

    public function clock_in()
    {
        $this->load->view('control/clock_in');
    }

    public function logout()
    {
        Session::flush();
        return  redirect()->route('control.loginpage');
    }

    public function dashboard()
    {
        if(session('user') != null)
        {
            $inquiries = Inquiries::select('*')->where('sent_on','0')->where('is_duplicate','N')->count();
            $to_call = Inquiries::select('*')->where('sent_on','>=','0')->where('is_duplicate','N')->where('called_on','0')->count();
            $prospectives = Prospective_students::select('*')->where('email','!=','webmaster@musikalessons.com')->where('is_sent','N')->count();
            $assignments  = MakeRequest::select('*')
            ->rightjoin('prospective_students as p','makeRequest.idNum','p.studentId')
            ->where('p.studentId','<>','null')
            ->where('makeRequest.idNum','<>','null')
            ->where('makeRequest.status','<>',3)->count();
            $billing = StudentNames::select('*')
            ->leftjoin('admissions','studentNames.studentId','admissions.studentId')
            ->where('studentNames.registered','=',1)->where('studentNames.packageStudent','=','Y')
            ->where('studentNames.afterSchool','=','N')->where('studentNames.packageRemaining','<',0)->count();

            $waiting_regs = Array();

            $regs = Registrations::where('is_registered','0')->where('whynot',0)->where('is_complete','Y')->get();
            //dd($reg);
            //$regs = $db->fetch_rows("SELECT R.* FROM registrations R WHERE is_registered = '0' AND whynot = 0 AND is_complete = 'Y'");
            $r = count($regs);
            foreach($regs as $regsf) 
            {
                
                $tmp = TeacherNames::select('*')
                ->rightjoin('connections as C','teacherNames.teacherId','C.teacherId')
                ->where('C.prospectiveId',$regsf->students_id)->first();
                
		          if (!empty($tmp)) 
                    {
                        
                    if (($tmp->rate_home<=0||$tmp->rate_studio<=0)&&!isset($waiting_regs[$tmp->teacherId])) 
                    $waiting_regs[$tmp->teacherId] = $tmp;
                     }
                  
            }
            $NORATE_REGS = $waiting_regs;
            if (empty($NORATE_REGS)) {
                $NORATE_REGS = null;
           }

           
        $billing = StudentNames::select('*')
        ->leftjoin('admissions as A','studentNames.studentId','A.studentId')
        ->where('studentNames.registered',1)->where('studentNames.packageStudent','Y')
        ->where('studentNames.afterSchool','N')->where('studentNames.packageRemaining','<',0)->distinct()
        ->count('studentNames.studentId');

	$tmp = Cc_declined::WHERE('fourth','!=','0000-00-00 00:00:00')->count();
	$tmp2 = Cc_declined::all()->count();
	$tmp3 = Connections::wherein('status',[1,25])->count();
    $billingg = [
        'billing' => $billing,
        'declined_all_four' => $tmp,
        'declined_total' => $tmp2,
        'intros_to_charge' => $tmp3
    ];
    
    $contested = Array('open'=>0,'need_action'=>0);
	$tkts_tmp = Tickets::where('is_closed',0)->where('stub_type','entry')->groupBy('respective_id')->get();
	$open = count($tkts_tmp);
	$tkts_tmp = Tickets::where('m_edit','')->where('stub_type','entry')->groupBy('respective_id')->get();
	$need_action1 = count($tkts_tmp);
	$ct = 0;
	$tkts_tmp = Tickets::WHERE('is_closed',0)->where('stub_type','entry')->groupBy('respective_id')->get();
	$i = -1; 
    foreach($tkts_tmp as $tkts_tmpp) 
    {
		$lid = $tkts_tmpp->respective_id;
		$tkt_temp = Tickets::WHERE('respective_id','$lid')->where('stub_type','entry')->count('xid');
		if ($tkt_temp>3) $ct++;
	}
    $contested['open'] = $open;
	$contested['need_action'] += $need_action1;
	$contested['need_action'] += $ct;
	
	$entriess = Array();
	$entries = LessonRecords::WHERE('sameDayCancel','O')->where('approveDate','0000-00-00')->count();
	$tmp = LessonRecords::WHERE('sameDayCancelComment','!=','')->where('edited_comment','=','')->count();
	$entriess['total_others'] = $entries;
    $entriess['to_approve'] = $tmp;

   

    

    // $tto_call = admissions::from( 'admissions as A' )
    // ->LEFTJOIN('teacherNames as T','T.teacherId','A.teacherId') 
    // ->LEFTJOIN('studentNames as S','S.studentId','A.studentId') 
    // ->LEFTJOIN('lessonRecords as L','A.admissionId','L.admissionId')
    // ->whereDate('A.dateIn','>=','2008-05-01')
    // ->where('A.dateIn','<',Carbon::now()->subDays(16)) 
    // ->where('A.dateOut','=','0000-00-00') 
    // ->where('A.instrumentId','!=',34)->count();
    // ->SELECT COUNT(*) FROM lessonRecords L WHERE A.admissionId = L.admissionId)=0 ".
	// 	"GROUP BY A.admissionId ORDER BY A.dateIn DESC, S.lastName ASC, S.firstName ASC, T.lastName ASC, T.firstName ASC;"
	// );

    $ato_call = Connections::from( 'connections as C' )
    ->LEFTJOIN('teacherNames as T','T.teacherId','C.teacherId')
	->LEFTJOIN('prospective_students as S','S.studentId','C.prospectiveId')
	->LEFTJOIN('prospective_status as PS','PS.statusId','C.status')
	->whereDate('C.dateMade','>','2008-06-03 00:00:01')->where('C.teacher_called_on',0)
    ->select('C.connectId', 'PS.statusDesc AS status_descr',
    'S.studentId', 'S.firstName AS s_firstname', 'S.lastName AS s_lastname',
    'T.firstName AS t_firstname', 'T.lastName AS t_lastname', 'T.teacherId',
    'T.phone AS t_phone', 'T.phone2 AS t_phone2', 'T.phone3 AS t_phone3',
    'T.had_first AS had_first')->orderBy('C.teacherId', 'ASC')->count();
		
	
    $connections = Connections::from( 'connections as C' )
    ->LEFTJOIN('prospective_students as S','S.studentId','C.prospectiveId') 
    ->LEFTJOIN('teacherNames as T','T.teacherId','C.teacherId') 
    ->LEFTJOIN('instruments as I','I.instrumentId','S.instr')
    ->LEFTJOIN('prospective_status as PS','PS.statusId','C.status') 
    ->WHERE('S.tocall_intro','>',0)
    ->whereNotIn('C.status',[1,25])
    ->SELECT('C.connectId','S.idNum','PS.statusDesc AS status_descr','C.intro_comment','UNIX_TIMESTAMP(C.dateInitInformed) AS first_days','UNIX_TIMESTAMP(C.followup_1) AS second_days','UNIX_TIMESTAMP(C.followup_2) AS third_days','UNIX_TIMESTAMP(C.followup_3) AS fourth_days','S.studentId','S.firstName AS s_firstname','S.lastName AS s_lastname','S.accountPayee AS p_name','T.firstName AS t_firstname','T.lastName AS t_lastname','T.teacherId','I.instrumentName AS instrument_name','S.phone AS s_phone','S.phone2 AS s_phone2','S.phoneCel AS s_phone3','C.status','S.tocall_intro_called')
    ->ORDERBY('C.dateInitInformed')->count();
	

	$connections_to_call = Connections::from( 'connections as C' )
		->LEFTJOIN('prospective_students as S','S.studentId','C.prospectiveId')
		->LEFTJOIN('teacherNames as T','T.teacherId','C.teacherId')
		->LEFTJOIN('instruments as I','I.instrumentId','S.instr')
		->LEFTJOIN('prospective_status as PS','PS.statusId','C.status')
		->WHERE('S.tocall_intro','>',0)->WHERE('S.tocall_intro_called',0)
        ->whereNotIn('C.status',[1,25])
        ->ORDERBY('C.dateInitInformed ASC')->count();
	
    

	// $num_connections = count($connections);
	// if ($num_connections>0) {
	// 	$i = -1; 
    //     while (++$i<$num_connections)
	// 		list($connections[$i]['key'],$connections[$i]['key_num']) = explode('-',$connections[$i]['idNum']);
	// }
    $nc_call = $connections;
	$NC_TO_CALL = $connections_to_call;

        $class = 'dashboard';
            return view('system.tasks',compact('inquiries','to_call','prospectives','assignments','billing','NORATE_REGS','billingg','contested','entriess','ato_call','nc_call','NC_TO_CALL','class'));
        }
        else
        {
            Session::flash('message','invalid credentials');
            return  redirect()->route('control.loginpage');
            
        }
    }
}
