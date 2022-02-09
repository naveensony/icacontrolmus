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
use App\Message;
use App\MessageUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\MakeRequest;
use App\Models\Admission as ModelsAdmission;
use App\Models\Instrument as ModelsInstrument;
use App\Models\MakeRequest as ModelsMakeRequest;
use App\Models\MessageUser as ModelsMessageUser;
use App\Models\ProspectiveStudent as ModelsProspectiveStudent;
use App\Models\StudentName as ModelsStudentName;
use App\Models\TeacherName as ModelsTeacherName;
use App\Models\User as ModelsUser;
use App\ProspectiveStudent;
class ChatBoxController extends Controller
{
 
	public function studentMessageBox(){
		return view('student_message_box');
	}
	
	public function studentRequested(){
		
		//$prospectiveStudent=ProspectiveStudent::with('instName')->where('idNum','like','NY0517FQLZUN%')->get();
		//dd($prospectiveStudent);
		
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacherId = $user->teacherId->remoteTeacherId;
		$istrument = ModelsInstrument::where('instrumentName','Adjustment')->first();
		if(!empty($istrument)){
			$instrId = $istrument->instrumentId;
		}else{
			$instrId ='';
		}
		
		$admission=ModelsAdmission::with(['name'=> function ($query) {
			$query->orderBy('studentId', 'desc');
		},'instName'])->where('teacherid',$user->teacherId->remoteTeacherId)->where('instrumentId','!=',$instrId)->where('dateOut','0000-00-00')->get();
		
		
		$makeRequest = ModelsMakeRequest::where(['teacherId'=>$teacherId])->get();
		foreach($makeRequest as $data){
			$arr_stuid[] = $data->idNum;
			$message_user[$data->idNum] = ModelsMessageUser::where(['student_type'=>'Prospective','from_id'=>$data->idNum,'to_id'=>$teacherId])->orderBy('msg_time', 'DESC')->get();

			$cnt_notification[$data->idNum] = ModelsMessageUser::where(['student_type'=>'Prospective','from_id'=>$data->idNum,'to_id'=>$teacherId,'flag_new_msg'=>1])->orderBy('msg_time', 'DESC')->count();	
		}
		//echo "<pre>";
		//print_r($cnt_notification);
		//dd($message_user[$data->idNum]);
		$msg_time = array();
		foreach ($message_user[$data->idNum] as $key => $row)
		{
			//print_r($row);
			$from_id = $row['from_id'];
			$msg_time[$key] = $row['msg_time'];
		} 
		//array_multisort($msg_time, SORT_DESC, $message_user);
		
		
		arsort($msg_time);
		
		//print_r($message_user);
		
		$prospectiveStudent=ModelsProspectiveStudent::whereIn('studentId',$arr_stuid)->get()->toArray();
		foreach($prospectiveStudent as $data){
			$student_res[$data['studentId']] = $data;
		}
		//dd($student_res);
		//die;
		
		return view('student_request', compact('prospectiveStudent','message_user','msg_time','student_res','cnt_notification'));
	}
	
	public function messageBox($studentId){
		//$studentId; 
		$makeRequest = ModelsMakeRequest::where(['idNum'=>$studentId])->get();
		foreach($makeRequest as $data){
			$arr_teacherIds[] = $data->teacherId;
		}
		
		$teacherName = ModelsTeacherName::whereIn('teacherId',$arr_teacherIds)->get();
		//($teacherName);
		
		$teachers=ModelsUser::whereHas('teacherId', function($query) use($arr_teacherIds){
			$query->whereIn('remoteTeacherId',$arr_teacherIds);
		})->with('teacherId')->get();
		
		
		//dd($teachers);
 		return view('messageBox',compact('teacherName','teachers'));
	}
	public function messageWithTeacher(){
		return view('message_with_teacher');
	}
	
	
	public function view($sid)
	{
		//echo $sid;
		//die;
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacherId = $user->teacherId->remoteTeacherId;
		$teacherName = $user->teacherId->firstName.' '.$user->teacherId->lastName;
		
		$val = explode('_',$sid);
		//$s_type = $val[0];
		//$s_id = $val[1];
		
		$studentId = $val[1];//$request->studentId;
		$student_type = $val[0]; //$request->student_type;
		//die;
		if($student_type == 'Registered'){
			$studentName=ModelsStudentName::where('studentId',$studentId)->first();
			$stuName = $studentName->firstName.' '.$studentName->lastName;
		}else if($student_type == 'Prospective'){
			$studentName=ModelsProspectiveStudent::where('studentId',$studentId)->first();
			$stuName = $studentName->firstName.' '.$studentName->lastName;
		}
		
	
		$message_user = ModelsMessageUser::where(['student_type'=>$student_type,'from_id'=>$teacherId,'to_id'=>$studentId])->orWhere(function($query) use($student_type,$teacherId,$studentId){
			$query->where(['student_type'=>$student_type,'from_id'=>$studentId,'to_id'=>$teacherId]);
		})->get();
		
		ModelsMessageUser::where(['student_type'=>'Prospective','from_id'=>$studentId,'to_id'=>$teacherId])->update(['flag_new_msg'=>0]);
		
		$msg_data['studentId'] = $studentId;
		$msg_data['student_type'] = $student_type;
		$msg_data['stuName'] = $stuName;
		$msg_data['teacherName'] = $teacherName;
		
		//echo $stuName;
		//dd($message_user);
		//die;
		return view('chat_box',compact('user','message_user','msg_data'));
	}
	public function getMessagebyStudent(Request $request){
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacherId = $user->teacherId->remoteTeacherId;
		$teacherName = $user->teacherId->firstName.' '.$user->teacherId->lastName;
		$studentId = $request->studentId.' ';
		$student_type = $request->student_type;
		//die;
		if($student_type == 'Registered'){
			$studentName=ModelsStudentName::where('studentId',$studentId)->first();
			$stuName = $studentName->firstName.' '.$studentName->lastName;
		}else if($student_type == 'Prospective'){
			$studentName=ModelsProspectiveStudent::where('studentId',$studentId)->first();
			$stuName = $studentName->firstName.' '.$studentName->lastName;
		}
		
	
		$message_user = ModelsMessageUser::where(['student_type'=>$student_type,'from_id'=>$teacherId,'to_id'=>$studentId])->orWhere(function($query) use($student_type,$teacherId,$studentId){
			$query->where(['student_type'=>$student_type,'from_id'=>$studentId,'to_id'=>$teacherId]);
		})->get();
		
		$makeRequest = ModelsMakeRequest::where(['teacherId'=>$teacherId,'idNum'=>$studentId])->first();
		//dd($makeRequest);
		
		$json = json_encode(['status'=>'true','student_name'=>$stuName,'teacherName'=>$teacherName,'msgs'=>$message_user]);
		return $json;
	}
	public function saveMessagebyTeacher(Request $request){
		
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		return $user->teacherId;
		//dd($user->teacherId);
		$teacherId = $user->teacherId->remoteTeacherId;
		$stu_id = $request->stu_id;
		$stu_type = $request->stu_type;
		$message = $request->message;
		
		$messageUser = new ModelsMessageUser();
		$messageUser->msg_from = 'Teacher';
		$messageUser->student_type = $stu_type;
		$messageUser->to_id = $stu_id;
		$messageUser->from_id = $teacherId;
		$messageUser->message = $message;
		$messageUser->flag_new_msg = 1;
		if($messageUser->save())
		{
			
			//$emailIds = ['scottbrady@musikalessons.com', 'nlee@musikalessons.com'];
			//$emailIds = ['musika@musikalessons.com']; 
			// $emailIds = ['synapse235@gmail.com'];
			// Mail::send('emails.msg_invitation', [
			// 'accountType' => 'Musika',
			// 'StudentName' => 'synapse5',
			// 'Email'=>'synapse235@gmail.com',
			// 'TeacherName'=>'Scott Brady',
			// 'Message'=>$message
			// ], function ($m) use ($emailIds){
			// $m->from('musika@musikalessons.com','Musikalessons')->to($emailIds,'Musika')
			// ->subject('Message from this Teacher about the Musika Lesson.')
			// ->sender('musika@musikalessons.com','Musikalessons')
			// ->replyTo('musika@musikalessons.com','Musikalessons');
			// });
			$emailIds = ['naveensony02@gmail.com'];
				$details = [
				'accountType' => 'Musika',
			'StudentName' => 'synapse5',
			'Email'=>'synapse235@gmail.com',
			'TeacherName'=>'Scott Brady', 
			'Message'=>$message
				];
				
				Mail::to('naveensony02@gmail.com')->send(new \App\Mail\MsgInvitation($details));
			
			if (Mail::failures()) {
				//return back()->with('status','Request not sent.');
					$json = json_encode(['status'=>'false','message'=>'Request not sent.']);
				return $json;
			}
			
			$json = json_encode(['status'=>'true','message'=>$message]);
			return $json;
		}
		
	}
	
	public function chatroom()
    {
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$tname = $user->teacherId->firstName.' '.$user->teacherId->lastName;
		$passwordMD5 = 'musikasystemalert';
		$webmasterid= 12923;
		$user = array('webmasterid'=>$webmasterid, 'password'=>$passwordMD5 , 'username'=>$tname, 'gender'=>'male', 'startRoom'=>20766, 'role'=>'user', 'image'=>base64_encode('https://html5-chat.com/img/avatars/m/13.svg'));
			
		$json = json_encode($user);

		$encoded = file_get_contents("https://jwt.html5-chat.com/protect/".base64_encode($json));
		//echo "test";
		//print_r($encoded);
		//die;
        return view('chatroom',compact('encoded'));
    }
	
}
