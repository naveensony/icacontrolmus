<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\LoginAttempt;
use Illuminate\Http\Request;
use Input;
use App\Teacher;
use App\TeacherName;
use App\Admission;
use App\StudentName;
use App\Connection;
use App\Instrument;
use App\LessonRecord;
use App\Models\Admission as ModelsAdmission;
use App\Models\Connection as ModelsConnection;
use App\Models\Instrument as ModelsInstrument;
use App\Models\LessonRecord as ModelsLessonRecord;
use App\Models\LoginAttempt as ModelsLoginAttempt;
use App\Models\User as ModelsUser;
use App\ProspectiveStudent;
use App\ProspectiveStatus;
use Carbon\Carbon;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   // protected $redirectTo = '/home';
	
	public function authenticated(Request $request)
	{
	  if (Auth::check())
	  {
		//$_POST['email'].' true'; die;
		$current_date = date('Y-m-d H:i:s'); 
		ModelsUser::where('id', Auth::id())->update(['dateLastLogin' => $current_date]);
		
		$user = ModelsUser::where('id',Auth::id())->with('teacherId')->first(); 
		
		$loginAttempt = new ModelsLoginAttempt();
		$loginAttempt->ip = $request->ip();
		$loginAttempt->status = 'pass';
		$loginAttempt->attempt_time = $current_date;
		$loginAttempt->user = $request->email;
		$loginAttempt->save();
			
		$istrument = ModelsInstrument::where('instrumentName','Adjustment')->first();
		if(!empty($istrument)){
			$instrId = $istrument->instrumentId;
		}else{
			$instrId ='';
		}	
		
		$admission=ModelsAdmission::with(['name'=> function ($query) {
		$query->orderBy('lastName', 'ASC');},'instName'])->where('teacherid',$user->teacherId->remoteTeacherId)->where('instrumentId','!=',$instrId)->where('dateOut','0000-00-00')->get();
		$admissionIds = [];
		foreach($admission as $res){
			$admissionIds[] = $res->admissionId;
		}
		
		$expDate = Carbon::now()->subDays(45);
		
		$lesssonRecord=ModelsLessonRecord::with('hasStudentName','hasInsturmentName','hasrate')->where('teacherid',$user->teacherId->remoteTeacherId)->where('sameDayCancel','!=','T')->where('lessonDate','>',$expDate)->whereIn('admissionId',$admissionIds)->groupBy('admissionId')->get();
		$l_adm_id = [];
		foreach($lesssonRecord as $lesson_data){
			$l_adm_id[] = $lesson_data->admissionId;
		}
	
		$res_ad_ids=array_diff($admissionIds,$l_adm_id);
		
		$admission_data=ModelsAdmission::with(['name'=> function ($query) {
		$query->orderBy('lastName', 'ASC');},'instName'])->where('teacherid',$user->teacherId->remoteTeacherId)->where('instrumentId','!=',$instrId)->whereIn('admissionId',$res_ad_ids)->where('dateOut','0000-00-00')->where('tr_terminate_date',null)->take(1)->get();

		
		
		$cur_date = Carbon::now()->format('Y-m-d');
	
		$prospective_students=ModelsConnection::with('prospectiveStudent','instrument','pro_status')->where('teacherid',$user->teacherId->remoteTeacherId)->where('dateInitInformed','0000-00-00 00:00:00')->where('intro_sh_date','<',$cur_date)->take(1)->get();
		
		if(count($admission_data)>0){
			
			$stud_id = $admission_data[0]->name->studentId;
			return redirect()->route('new-submit-entry',['stu_id'=>$stud_id]); //redirect('/new-submit-entry');
		}elseif(count($prospective_students)>0){
			$sid = $prospective_students[0]->pro_status->statusId;
			$pid = $prospective_students[0]->prospectiveStudent->studentId;
			return redirect()->route('getStatus',['sid'=>$sid,'pid'=>$pid]);
		}else{
			return redirect('/home');
		}
		
		
		//return redirect::route('/home');
	  }
	}
	protected function sendFailedLoginResponse(Request $request)
	{
		$current_date = date('Y-m-d H:i:s'); 
		$loginAttempt = new ModelsLoginAttempt();
		$loginAttempt->ip = $request->ip();//$_SERVER['REMOTE_ADDR'];
		$loginAttempt->status = 'fail';
		$loginAttempt->attempt_time = $current_date;
		$loginAttempt->user = $request->email;
		$loginAttempt->save();
		
		return back()->withInput()->withErrors(['email'=>'These credentials do not match our records.','password'=>'Passwords are case-sensitive.']);
		
	}
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	// $user = \DB::table('users')->get();
    	// dd($user);
    	// $new_user = ModelsUser::create([
    	// 	'name' => 'testuser1',
    	// 	'email' => 'testuser1@ex.com',
    	// 	'password' => \Hash::make('1234'),
    	// ]);

        $this->middleware('guest', ['except' => 'logout']);
    }

	
}
