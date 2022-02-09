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
use DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\PsTeachersFirstLogin;
use App\CitiesFilterSmall;
use App\Newrate;
use App\Counter;
use App\Email;
use App\Mail\RegistrationFollowUps;
use App\Models\CitiesFilterSmall as ModelsCitiesFilterSmall;
use App\Models\Connection as ModelsConnection;
use App\Models\Counter as ModelsCounter;
use App\Models\Newrate as ModelsNewrate;
use App\Models\ProspectiveStatus as ModelsProspectiveStatus;
use App\Models\ProspectiveStudent as ModelsProspectiveStudent;
use App\Models\PsTeachersFirstLogin as ModelsPsTeachersFirstLogin;
use App\Models\User as ModelsUser;
use Illuminate\Support\Str;
class ChangeStatusController extends Controller
{
  
  function getStatus(Request $request)
  {
	if ($request->has('pid')) {
		$pid = $request->pid;
		$sid = $request->sid;
		$user = ModelsUser::where('id', Auth::id())->with('teacherId')->first();
		$prospective_students = ModelsConnection::with('prospectiveStudent', 'instrument', 'pro_status')->where('teacherid', $user->teacherId->remoteTeacherId)->where('prospectiveId', $pid)->where('dateInitInformed', '0000-00-00 00:00:00')->first();
		if (is_null($prospective_students)) {
			return redirect('home')->with('status', 'Provided student ID do not belongs to any students please Check!');
		}

		$status = ModelsProspectiveStatus::where('statusType', 0)->orWhere('statusType', 4)->orderBy('order', 'ASC')->orderBy('statusId', 'ASC')->get();
		return view('change_status', compact('status', 'sid', 'prospective_students'));
	}
	else {
		abort(404);
	}
}	
	function rates_by_rate_id($id){
			$getprice = ModelsNewrate::where('Level', $id)->first()->toArray();
			return $getprice;
		}
	
	function get_local_phone($id){
		$getPhone = ModelsCitiesFilterSmall::where('zip_code', $id)->first(['phone']);
		if (empty($getPhone) || is_null($getPhone)) {
			$phone['phone'] = '877-687-4524';
		}
		else {
			return $phone['phone'] = $getPhone->phone;
		}
	}

	
	public function updateStatus(Request $request)
	{
		//intro_sh_date
		if($request->stat==4){
			//echo $request->sh_date.'';
			//echo strtotime('27-02-2019');
			$intro_sh_date = $request->sh_date;
		}
		else{
			$intro_sh_date = NULL;
		}
		
		//echo $intro_sh_date; die;	
		 $cid = $request->cid; //die;
		$user = ModelsUser::where('id', Auth::id())->with('teacherId')->first();
		$admission = ModelsConnection::with('prospectiveStudent', 'instrument', 'pro_status')->where('teacherid', $user->teacherId->remoteTeacherId)->where('connectId', $request->cid)->where('dateInitInformed', '0000-00-00 00:00:00')->first();

		if (is_null($admission)) {
			return redirect('home')->with('status', 'Invalid student or Invalid ID. Please try again.!');
		}

		$status = ModelsProspectiveStatus::where('statusId', $request->stat)->first();

		

		$emad = "exit@musikalessons.com";
		$from = "Musika";
		$tid=$user->teacherId->remoteTeacherId;
		$fromEmail = "forward@musikalessons.com";
		$to = "Forward - Indicator";
		$emailAdd = "followups@musikalessons.com";
		$tname = $user->teacherId->firstName . ' ' . $user->teacherId->lastName;
		$sub = "Your Music Lessons with " . $tname;
		$accountPayee = $admission->prospectiveStudent->accountPayee;
		$fullname = $admission->prospectiveStudent->firstName . ' ' . $admission->prospectiveStudent->lastName;
		$stat = $request->stat;
		$isPackage = ($admission->prospectiveStudent->packageStudent == 'Y') ? 1 : 0;
		$thank = 0;
		$arrDT = Array(
			"DTO",
			"DTS",
			"DTI"
		);
		$now = time();
		$isLower = ($admission->prospectiveStudent->stateId == 'TX' || $admission->prospectiveStudent->stateId == 'FL') ? 1 : ($admission->prospectiveStudent->stateId == 'PA' || $admission->prospectiveStudent->stateId == 'IL' ? 2 : 0);
		$pkgPrices = [[35, 50, 68], [28, 42, 56], [35, 50, 68]];
		$prices = ['price_30' => $pkgPrices[$isLower == 1 ? 1 : 0][0], 'price_45' => $pkgPrices[$isLower == 1 ? 1 : 0][1], 'price_60' => $pkgPrices[$isLower == 1 ? 1 : 0][2]];

		
		if (Str::lower($admission->prospectiveStudent->lessonLoc) != 'online' && $admission->prospectiveStudent->rates_id != null) {
		$prices = $this->rates_by_rate_id($admission->prospectiveStudent->rates_id);
		}

		if (Str::lower($admission->prospectiveStudent->lessonLoc) == 'online') {
		$prices = $this->rates_by_rate_id(99);
		}
		$phone = $this->get_local_phone($admission->prospectiveStudent->zipCode);
		
		if ($request->stat==999) 
		{
			if ($admission->prospectiveStudent->had_lesson)
			{	
				return back()->with("status","You've already notified us about teaching ".$admission->prospectiveStudent->fisrstName."an introductory lesson.");
			}
			else if (empty($request->introplus)) 
			{	
			
			return back()->with("status","You have chosen to notify Musika about teaching ".$admission->prospectiveStudent->fisrstName."an introductory lesson. So we can better proceed with the next phase of the registration process for this student, please  select which best describes this student's demeanor.");
			}
			else {
				
					$teacher_id = $user->teacherId->remoteTeacherId;
					$student_id = $admission->prospectiveStudent->studentId;
					$ps_teachers_first_login=new ModelsPsTeachersFirstLogin();
					$ps_teachers_first_login->teacher_id=$teacher_id;	
					$ps_teachers_first_login->student_id=$student_id;
					$ps_teachers_first_login->save();	
					$email = $admission->prospectiveStudent->email;
					//print_r($email);
				//die;	
					$is_update_student=ModelsProspectiveStudent::where('studentId',$student_id)->update([
					'had_lesson'=>1,
					'tocall_intro'=>$now,
					'tocall_intro_called'=>0,
					'in_trash'=>'N',
					
					
					]);
					
					if ($is_update_student>0) {
						$thankyou_note_heading="Thanks for letting us know you've had a lesson with this student!";
						$thankyou_note_message="Please note this did not submit a lesson for payment.
						This simply indicates to us here in the office that we need to follow up with the client and get them registered with you.
						Once the student has officially registered with you, they will appear in the dropdown window labeled
						&quot;student name&quot; in the page &quot;Submit a New Entry,&quot; and then you can enter the initial 
						lesson and get paid";
						
						$sendIt = 2;
						$introplus = trim($request->introplus);
						if (empty($email)) {
							//$emailIds = ['scottbrady@musikalessons.com', 'nlee@musikalessons.com'];
							//$emailIds = ['students@musikalessons.com'];
							// $emailIds = ['synapse235@gmail.com'];
							// Mail::send('emails.first_lesson_email', [
							// 'teacher_name' => $tname,
							// 'student_name'=>$fullname,
							// 'Account_Payee'=>$admission->prospectiveStudent->accountPayee,
							// 'Phone'=>$admission->prospectiveStudent->phone,
							// 'Phone2'=>$admission->prospectiveStudent->phone2,
							// 'Phone3'=>$admission->prospectiveStudent->phoneCel
							// ], function ($m) use ($fullname,$emailIds) {
							// $m->to($emailIds, 'Musika')
							// ->subject('Had first lesson, missing email')
							// ->sender('musika@musikalessons.com', 'Musika Lessons')
							// ->returnPath('anonymous@server1.musikalessons.com')
							// ->replyto('scottbrady@musikalessons.com', 'Musika Lessons');
							// });
							$emailIds = ['naveensony02@gmail.com'];
				$details = [
							'teacher_name' => $tname,
							'student_name'=>$fullname,
							'Account_Payee'=>$admission->prospectiveStudent->accountPayee,
							'Phone'=>$admission->prospectiveStudent->phone,
							'Phone2'=>$admission->prospectiveStudent->phone2,
							'Phone3'=>$admission->prospectiveStudent->phoneCel
				];
				
				Mail::to('naveensony02@gmail.com')->send(new \App\Mail\FirstLessonEmail($details));
							if (Mail::failures())
							{	
								$thankyou_note_message=$thankyou_note_message."  Also, This student ($fullname) doesn't have an email. Please call them as soon as possible for this info.";
							}
					  }else{
							$prices['30'] = $prices['price_30'];
							$prices['45'] = $prices['price_45'];
							$prices['60'] = $prices['price_60'];
							$followup_type = "emails.update_status_emails.registration_followups";
							// if(strtotime($admission->prospectiveStudent->dateEntered) <  1496729343)
							// {
							// 	$followup_type = "emails.update_status_emails.registration_followups_noslash";  // non strike through
							// }	
						//$estuff=Email::where('ekey',$followup_type)->first();
							$syb='Followup - '.$admission->prospectiveStudent->firstName.' lessons with'.$user->teacherId->firstName;
							$emailIds = ['scottbrady@musikalessons.com', 'nlee@musikalessons.com'];
							$email = "synapse235@gmail.com";
							// Mail::send($followup_type, [
							// 't_firstname'=>$user->teacherId->firstName,
							// 't_lastname'=>$user->teacherId->lastName,
							// 'STUDENT' => $admission->prospectiveStudent,
							// 'insName'=>$admission->instrument->instrumentName,
							// 'key'=> explode('-',$admission->prospectiveStudent->idNum),
							// 'RATES'=>$prices,
							// 'PHONE'=>$phone
							// ], function ($m) use ($syb,$email,$accountPayee,$emailAdd) {
							// $m->from($emailAdd,'Musika Music Lessons ')->to($email,$accountPayee)
							// ->subject("$syb")
							// ->sender('musika@musikalessons.com', 'Musika Lessons')
							// ->returnPath('anonymous@server1.musikalessons.com')
							// ->replyto($emailAdd)
							// ->bcc('accounting@musikalessons.com')
							// ->setContentType('text/html');
							// });
							$emailIds = ['naveensony02@gmail.com'];
							$details = [
							't_firstname'=>$user->teacherId->firstName,
							't_lastname'=>$user->teacherId->lastName,
							'STUDENT' => $admission->prospectiveStudent,
							'insName'=>$admission->instrument->instrumentName,
							'key'=> explode('-',$admission->prospectiveStudent->idNum),
							'RATES'=>$prices,
							'PHONE'=>$phone
							];
				
				

				if(strtotime($admission->prospectiveStudent->dateEntered) <  1496729343)
							{
								$followup_type = "emails.update_status_emails.registration_followups_noslash";  // non strike through
								Mail::to('naveensony02@gmail.com')->send(new \App\Mail\RegistrationFollowupsNoslash($details,$syb));
							}
							else{
								$followup_type = "emails.update_status_emails.registration_followups";
								Mail::to('naveensony02@gmail.com')->send(new \App\Mail\RegistrationFollowups($details,$syb));
							}
							if (!Mail::failures())
							{
								$thank = 1;
								$counter = ModelsCounter::updateOrCreate(
								['page' => $_SERVER['PHP_SELF']],
								['hits' => +1]);
							}
						}
					
					$ur=ModelsConnection::where('connectId',$cid)->update(
					[
						'dateInitInformed'=>date("Y-m-d H:i:s",$now),
						'status'=>0,
						'intro_sh_date'=>$intro_sh_date,
						'intro_comment'=>'On '.date("m/d @ h:i a",$now).' teacher said student is '.$introplus.','.$cid
					]);
					
					if ($ur<1) {
						Mail::raw("Musika Error (updating teacher new first lesson) connectId = $cid", function ($message){
							$message->from('forward@musikalessons.com')->to('accounting@musikalessons.com','Musika Error!');
						});
					}
				}else if ($is_update_student==0) {
						}
				 else{
					Mail::raw("Musika Error (send teacher new first lesson) connectId = $cid", function ($message) {
					$message->from('forward@musikalessons.com')->to('accounting@musikalessons.com','Musika Error!');
				});
				}
		$state = $admission->prospectiveStudent->stateId;
		$pkgPrices = [[35,50,68],[28,42,56],[35,50,68]];
		$sub = "Your Music Lessons with ".$tname;
		if($admission->prospectiveStudent->metros_id > 0){
		$emailIds = ['scottbrady@musikalessons.com', 'nlee@musikalessons.com'];
		/* Mail::send('emails.update_status_emails.initial_lesson_indicate',[
		'isPackage'=>$isPackage,
		'fullname'=>$fullname,
		'prices'=>$prices,
		'isLower'=>$isLower,
		'tname'=>$tname
		],function($m) use ($sub,$emailIds) {
			$m->from('followups@musikalessons.com','Muskia')->to($emailIds,'Musika')
			->subject($sub);
		}); */
}
		if ($thank) {
			return redirect('home')->with(['status'=>"Thank you for your submission. It has been sent to Musika",'thaeading'=>$thankyou_note_heading,'tmsg'=>$thankyou_note_message]);		
		}
		else
		{
			return redirect('home')->with(['status'=>"There was an error in sending your submission",'thaeading'=>$thankyou_note_heading,'tmsg'=>$thankyou_note_message]);	
		}			

	}
}else {

	//die;
	$is_update_status=ModelsConnection::where('connectId',$cid)->update(['status'=>$request->stat,'intro_sh_date'=>$intro_sh_date]);
		if ($is_update_status<0) {
			$msg = "There was a problem updating the status of your prospective student.go back and try again";
			Mail::raw("Musika error (PS update one status error)", function ($message) {
					$message->to('accounting@musikalessons.com');
			});
			return back()->with('status',$msg);
		}	
		else if ($is_update_status>0) 
			{
				if($request->stat==4 && $intro_sh_date!=''){
					//$emails = ['scottbrady@musikalessons.com', 'nlee@musikalessons.com'];
					$name = $admission->prospectiveStudent->firstName.' '.$admission->prospectiveStudent->lastName;
					
					if($admission->prospectiveStudent->age=='adult'){
						$titleHeading = "Dear $name";
					}
					else{
						$titleHeading = "Dear parent of $name";
					}
					$emails = ['synapse235@gmail.com'];//$admission->prospectiveStudent->email;//
					$instrumentName = $admission->instrument->instrumentName;
					$temp = explode('-',$admission->prospectiveStudent->idNum);
					
		$aTag_redirect_link = 'https://system.musikalessons.com/register.html?id='.$temp[0];
					/**Mail::raw("$titleHeading,\n\n We have noticed that your trail lesson for $instrumentName has been scheduled with teacher $tname on $intro_sh_date. \n\n Please do let us know your feedback once you have the lesson. \n\n From:\n Musika Lessons\n\n", function ($message) use($tname,$name,$instrumentName,$emails){
						$message->from('musika@musikalessons.com', 'Musika')->to($emails, 'musika')->subject('Subject: Scheduled '.$instrumentName.' trail lesson for '.$name.' with '.$tname);
					}); **/
					Mail::send('emails.trial_lesson', [
										'titleHeading' => $titleHeading,
										'tname'=>$tname,
										'aTag_redirect_link'=>$aTag_redirect_link,
										'PHONE'=>$phone
										], function ($message) use($tname,$name,$instrumentName,$emails){
						$message->from('musika@musikalessons.com', 'Musika Lessons')->to($emails, 'musika')->subject('Scheduled '.$instrumentName.' trail lesson for '.$name.' with '.$tname);
					});
					if (Mail::failures()){
						dd('Mail Fail');			
					}
				}
				
				$is_update_laststatus_date=ModelsConnection::where('connectId',$cid)->update([
				'lastStatus'=>date('Y-m-d H:i:s',$now)
				]);
					if ($is_update_laststatus_date>0) {
						if (in_array($status->statusName,$arrDT))
							{
								if($status->statusName=='DTI')
										{
										$dt_extra="The teacher indicated you are interested in a different instrument. Please let us know what instrument you are interested in and I will consult with my director to make a successful match this time around.";
										}
								if($status->statusName=='DTO' && !empty($request->reason.$status->statusId))
								{
									$name='reason'.$status->statusId;
									$dt_extra="Please let us know what needs to change so that I can work closely with my director to make a successful match this time around.  DTO - reason:".$request->input($name);
								}
					
								$dtSubj="Student requesting different teacher".$fullname;
								//$emailIds = ['scottbrady@musikalessons.com', 'nlee@musikalessons.com'];
								//$emailIds = ['students@musikalessons.com'];
								$emailIds = ['synapse235@gmail.com'];
								Mail::send('emails.update_status_emails.teacher_change_status',[
								'TEACHER_NAME'=>$tname,
								'ACCOUNT_PAYEE'=>$admission->prospectiveStudent->accountPayee,
								'DATE_INFORMED'=>date("n/d",$now),
								'STUDENT_NAME'=>$fullname,
								'DT_EXTRA'=>$dt_extra
								],function($message) use($isPackage,$admission,$fullname,$emailIds){
									if(!$isPackage){
											$replytext=$admission->prospectiveStudent->accountPayee;
										}else{
											$replytext=$admission->prospectiveStudent->name;
										}
									$message->to($emailIds,'Forward - Requests')
									->subject("Student requesting different teacher $fullname")
									->sender('musika@musikalessons.com', 'Musika Lessons')
									->returnPath('anonymous@server1.musikalessons.com')
									->replyto($admission->prospectiveStudent->email, $replytext);
								});
								if (Mail::failures()){
									//dd('Mail Fail');			
								}
							}	
					return redirect('home')->with("status","You have successfully updated the status of <strong> ".$admission->prospectiveStudent->firstName.' '.$admission->prospectiveStudent->lastName." </strong> and notification is being sent to Musika.");
				}else {
					$old_St=$admission->pro_status->statusDesc;
					$new_St=$status->statusDesc;
					return back()->with('status',"email=$emad,	tid=$tid,cid= $cid,	old status=$old_St,	new Status=$new_St");
					}
		}else{
			return back()->with('status',"We notice you left the status the same");
		}
	}
}

	public function reminderStatus()
	{
		//$admission = Connection::where('intro_sh_date','!=',NULL)->get();
		
		$currentdata = date('Y-m-d');
		
		$prospective_students = ModelsConnection::with(['prospectiveStudent' =>
		function ($query)
		{
		$query->where(['is_connected' => 1, 'had_lesson' => 0]);
		}
		])->where('intro_sh_date','>=',$currentdata)->where('dateInitInformed', '0000-00-00 00:00:00')->get();
		dd($prospective_students);
		if(!$prospective_students->isEmpty()){
			
			foreach($prospective_students as $data){
				
				$name = $data->prospectiveStudent->firstName.' '.$data->prospectiveStudent->lastName;
				$emails = ['synapse235@gmail.com']; //$data->prospectiveStudent->email
				$intro_sh_date = $data->intro_sh_date;
				Mail::raw("Hi $name, \n\n Status :  I spoke to student/parent and set up a first lesson date. \n\n From:\n Musika Lessons\n\n", function ($message) use($intro_sh_date,$emails){
					$message->from('musika@musikalessons.com')->to($emails, 'musika')->subject('First lesson  Date '.$intro_sh_date);
				});
				if (Mail::failures()){
					dd('Mail Fail');			
				}
			}
				
		}
		
		
		die;
	}	

}//class end

