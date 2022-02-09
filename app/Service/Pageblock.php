<?php

namespace App\Service;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
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
use App\models\Admission as ModelsAdmission;
use App\models\Connection as ModelsConnection;
use App\models\Instrument as ModelsInstrument;
use App\models\LessonRecord as ModelsLessonRecord;
use App\Models\User as ModelsUser;
use App\ProspectiveStudent;
use App\ProspectiveStatus;
use Carbon\Carbon;

class Pageblock
{
	public function checkPageBlock(){
		
		$current_date = date('Y-m-d H:i:s'); 
		ModelsUser::where('id', Auth::id())->update(['dateLastLogin' => $current_date]);
		
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();  
			
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

		//dd($admission_data);
		
		$cur_date = Carbon::now()->format('Y-m-d');
	
		$prospective_students=ModelsConnection::with('prospectiveStudent','instrument','pro_status')->where('teacherid',$user->teacherId->remoteTeacherId)->where('dateInitInformed','0000-00-00 00:00:00')->where('intro_sh_date','<',$cur_date)->take(1)->get();
		
		if(count($admission_data)>0){
			$stud_id = $admission_data[0]->name->studentId;
			//return redirect()->route('new-submit-entry',['stu_id'=>$stud_id]); //redirect('/new-submit-entry');
			return ['page_name'=>"new-submit-entry",'s_id'=>$stud_id,'pid'=>null];
		}elseif(count($prospective_students)>0){
			$sid = $prospective_students[0]->pro_status->statusId;
			$pid = $prospective_students[0]->prospectiveStudent->studentId;
			//return redirect()->route('getStatus',['sid'=>$sid,'pid'=>$pid]);
			return ['page_name'=>'getStatus','s_id'=>$sid,'pid'=>$pid];
		}else{
			//return redirect('/home');
			return ['page_name'=>"home",'s_id'=>null,'pid'=>null];
		}
	}	
}
