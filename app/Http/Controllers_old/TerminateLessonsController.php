<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Teacher;
use App\TeacherName;
use App\User;
use App\Admission;
use App\StudentName;
use App\Connection;
use App\Instrument;
use App\LessonRecord;
use App\ProspectiveStudent;
use App\ProspectiveStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\PsTeachersFirstLogin;
use App\CitiesFilterSmall;
use App\Newrate;
use App\Counter;
use App\Email;
use App\Mail\RegistrationFollowUps;
use App\Models\Admission as ModelsAdmission;
use App\Models\LessonRecord as ModelsLessonRecord;
use App\Models\User as ModelsUser;
use Illuminate\Support\Str;
class TerminateLessonsController extends Controller
{
	public function terminatStudent(Request $request)
	{
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		
		$termiante_students = ModelsAdmission::with(['name'=> function ($query) {
		$query->orderBy('lastName', 'ASC');},'instName'])->where('teacherid',$user->teacherId->remoteTeacherId)->where('dateOut','0000-00-00')->get();
		
		//$lesssonRecord=LessonRecord::where('teacherid',$user->teacherId->remoteTeacherId)->orderBy('lessonDate','desc')->groupBy('studentId')->get();
		
		$lessonRecord = ModelsLessonRecord::select('studentId',DB::raw('count(*) as total'))->where('teacherId',$user->teacherId->remoteTeacherId)->groupBy('studentId')->get();
		//dd($lessonRecord);
		/**
		$activeUsers = \DB::table('todolists')
    ->select('user_id', \DB::raw('count(*) as total'))
    ->whereYear('created_at', '=', 2016)->whereMonth('created_at', '=', 4)
    ->groupBy('user_id')
    ->orderBy('total', 'desc')
    ->get();
	**/
		$final_arr = array();
		foreach($lessonRecord as $record){	
			$final_arr[$record->studentId] = $record->total;
			
		}
		
		$records = $final_arr;
		
		foreach($termiante_students as $t){
			if(isset($final_arr[$t->studentId])){
				$t->lcount = $final_arr[$t->studentId];
			} else{
				$t->lcount=0;
			}
		}
		
		if(isset($request->stu_id)){
			$student_id =  $request->stu_id; 
			return view('terminate_lessons',compact('termiante_students','student_id','user','records'));
		}
		else
		{
			return view('terminate_lessons',compact('termiante_students','user','records'));
		}
	}
	
	/*public function confirmation(Request $request){
		
		$student_name = $request->student_name;
		$reason = $request->reason;
		
		
		return view('confirmation',compact('student_name'));
	}*/
	
	public function confirmation(Request $request)
	{
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$termiante_students=ModelsAdmission::with(['name'=> function ($query) {
		$query->orderBy('lastName', 'ASC');},'instName','teacherInfo'])->where('teacherid',$user->teacherId->remoteTeacherId)->where('dateOut','0000-00-00')->where('admissionId',$request->alterId)->first();
		//dd($termiante_students);
		$tname=$termiante_students->teacherInfo->firstName.' '.$termiante_students->teacherInfo->lastName;
		$sname=$termiante_students->name->firstName.' '.$termiante_students->name->lastName;
		$semail=$termiante_students->name->email;
		$lesson_length=$termiante_students->lessonDuration;
		$alterId=$request->alterId;
		$termination_reason=$request->reason;
		
		$adm = ModelsAdmission::where('teacherid',$user->teacherId->remoteTeacherId)->where('dateOut','0000-00-00')->where('admissionId',$request->alterId)->update([
		'tr_terminate_date'=> date('y-m-d h:m:s'),
		'tr_terminate_reason'=>$termination_reason
		]);
		
		
		
		//die;
		if(is_null($termiante_students))
		{
			return redirect('home')->with('status','Somthing went wrong with Admission Id Please try Again! Thank you');
		}
		//$emailIds = ['scottbrady@musikalessons.com', 'nlee@musikalessons.com'];
		//$emailIds = ['synapse235@gmail.com'];
		// Mail::send('emails.terminate.terminate_lesson',[
		// 'tname'=>$tname,
		// 'student_name'=>$sname,
		// 'student_email'=>$semail,
		// 'termination_reason'=>$termination_reason
		// ],function($message) use($sname,$emailIds){
		// 	$message->from('forward@musikalessons.com','Musika')
		// 	->to($emailIds)
		// 	->subject("Student $sname Requesting Termination")
		// 	->sender('musika@musikalessons.com', 'Musika')
		// 	->returnPath('anonymous@server1.musikalessons.com')
		// 	->replyTo('edwardscottbrady@gmail.com', 'Musika');
		// });
		// if(!Mail::failures())
		// {
		// 	Mail::send('emails.terminate.terminate_link',[
		// 	'tname'=>$tname,
		// 	'student_name'=>$sname,
		// 	'student_email'=>$semail,
		// 	'lesson_length'=>$lesson_length,
		// 	'termination_reason'=>$termination_reason,
		// 	'alterId'=>$alterId
		// 	],function($message)  use($sname,$emailIds){
		// 	$message->from('forward@musikalessons.com','Musika')
		// 	->to($emailIds)
		// 	->subject("Student $sname Requesting Termination (extra info)")
		// 	->sender('musika@musikalessons.com', 'Musika')
		// 	->returnPath('anonymous@server1.musikalessons.com')
		// 	->replyTo('edwardscottbrady@gmail.com', 'Musika');
		// 	});
		// 	if(!Mail::failures())
		// 	{ 
		// 		//return redirect('home')->with('status','Thank you for your submission. It has been received by Musika.');
		// 		$student_name = $request->student_name;
		// 		return view('confirmation',compact('student_name'));
				
		// 	}
		//}
		//else
		//{
			return back()->with('status','You have not chosen a student about whom to notify Musika of early termination');
		//}
	}
}