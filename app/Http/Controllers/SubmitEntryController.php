<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException;

use App\Teacher;
use App\Zipcode;
use App\MakeRequest;
use App\TeacherName;
use App\User;
use App\Admission;
use App\StudentName;
use App\Connection;
use App\Instrument;
use App\LessonRecord;
use App\Package;
use App\Lesson;
use App\ProspectiveStudent;
use App\ProspectiveStatus;
use Illuminate\Support\Facades\Auth;
use Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\PsTeachersFirstLogin;
use App\CitiesFilterSmall;
use App\Newrate;
use App\StudentGfrate;
use App\Gfrate;
use App\Counter;
use App\Email;
use Redirect;
use App\Mail\RegistrationFollowUps;
use App\Models\Admission as ModelsAdmission;
use App\Models\Gfrate as ModelsGfrate;
use App\Models\Instrument as ModelsInstrument;
use App\Models\Lesson as ModelsLesson;
use App\Models\LessonRecord as ModelsLessonRecord;
use App\Models\Newrate as ModelsNewrate;
use App\Models\Package as ModelsPackage;
use App\Models\StudentGfrate as ModelsStudentGfrate;
use App\Models\StudentName as ModelsStudentName;
use App\Models\TeacherName as ModelsTeacherName;
use App\Models\User as ModelsUser;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Str;	

class SubmitEntryController extends Controller
{
	public function view(Request $request)
	{
		//dd('ddd');
		//echo Auth::id();
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();	
		$idNum = $user->teacherId->remoteTeacherId;
		$instruments=ModelsInstrument::where('instrumentName','=','Adjustment')->get();
		$ad = $instruments[0]->id;
		$admissions=ModelsAdmission::where('teacherId','=',$idNum)->where('instrumentId','!=',$ad)->where('dateOut','=','0000-00-00')->count();
		//dd($admissions);
		$studentData = [];
		$instInfo = [];
		$student_ins = [];
		if ($admissions>0) {
			$stu_data= DB::connection('mysqlsystem')->select("SELECT A.*, S.*, I.* FROM admissions A INNER JOIN studentNames S ON A.studentId=S.studentId INNER JOIN instruments I ON A.instrumentId=I.instrumentId WHERE A.teacherId = '".$idNum."' AND A.instrumentId!='".$ad."' AND A.dateOut = '0000-00-00' AND S.registered!=0 ORDER BY S.lastName ASC, S.firstName ASC, A.dateIn ASC");
			foreach($stu_data as $row)
			{
				//if (!$row['registered']) continue;->where('admissionId',)
				 $row->name = (!empty($row->lastName)?($row->packageStudent=='Y'&&$row->lastName[0]!='-'?'- ':"").$row->lastName.", ":"").$row->firstName;
				$row->school = $row->afterSchool=='Y'?1:0;
				//$i = count($studentData); 
				$instInfo[$row->instrumentId] = $row->instrumentName;
				$student_ins[$row->studentId]['ins_id'] = $row->instrumentId;
				$student_ins[$row->studentId]['ins_name'] = $row->instrumentName;
				$row->first_lesson = 0; // Set zero for all cases. 
				//$studentData[$i] = $row;
				array_push($studentData,$row);
				
			}
		}
		
		
		$lessonRecords=ModelsLessonRecord::with('hasStudentName')->with('hasInsturmentName')->with('hasrate')->where("lessonDate",">", Carbon::now()->subMonths(12))->where('teacherId','=',$idNum)->orderBy('lessonDate', 'DESC')->get();
		$lessonCal = [];
		
		foreach($lessonRecords as $record)
		{
			//dd($record);
			if(!is_null($record->hasStudentName) && !is_null($record->hasInsturmentName))
			{
				$is_adj = $record->hasInsturmentName->instrumentName=='Adjustment'?1:0;
				$delon = $is_adj?0:1;
					
				switch ($record->sameDayCancel) {
					case "Y": $lessontype = "St. Same Day Cancel"; $lessonColor = "#b7bfc8"; $lessonTypeId = 6; break;
					case "y": $lessontype = "St. Same Day Makeup Cancel"; $lessonColor = "#b7bfc8"; $lessonTypeId = 7; break;
					case "A": $lessontype = "Te. Cancel"; $delon = 0; $lessonColor = "#b7bfc8"; $lessonTypeId = 10; break;
					case "a": $lessontype = "St. Advance Cancel"; $delon = 0; $lessonColor = "#b7bfc8"; $lessonTypeId = 8; break;
					case "V": $lessontype = "Vacation"; $lessonColor = "#a6f2e3"; $lessonTypeId = 12; break;
					case "R": $lessontype = "Te. Makeup Lesson Cancel"; $delon = 0; $lessonColor = "#b7bfc8"; $lessonTypeId = 11; break;
					case "r": $lessontype = "St. Makeup Advance Cancel"; $delon = 0; $lessonColor = "#b7bfc8"; $lessonTypeId = 9; break;
					case "M": $lessontype = "Makeup"; $lessonColor = "#99e4ff"; $lessonTypeId = 5; break;
					case "N": $lessontype = "Introductory"; $lessonColor = "#99e4ff"; $lessonTypeId = 0; break;
					case "O": $lessontype = "Other"; $lessonColor = "#a6f2e3"; $lessonTypeId = 13; break;
					case "1": case "2": case "3": case "4":
						$lessontype = "Regular + ";
						$xt = $record->sameDayCancel*15;
						$lessontype .= "$xt makeup  (".($record->lessonDuration-$xt)." min base)";
						$lessonColor = "#99e4ff";
						$lessonTypeId = $record->sameDayCancel;
						break;
					default:
						if ($record->hasInsturmentName->instrumentName=='Adjustment') 
						{ $lessontype = "Adjustment"; }
						else {
							$lessontype = "Regular";
							if ($record->lessonDuration>$record->hasrate->lessonDuration)
								$lessontype .= " + ".($record->lessonDuration-$record->hasrate->lessonDuration)." extra";
						}
						$lessonColor = "#99e4ff";
						$lessonTypeId = "";
						break;
				}
				//echo $lessontype.'</br></br>'; 00aeef 708090 1ab394
				//$data['is_success'] = true; e2e6e9
				$data['id'] = $record->lessonId;
				$data['start'] = $record->lessonDate;
				$data['title'] = $lessontype;
				$data['data']['studentId'] = $record->hasStudentName->studentId;
				$data['data']['student'] = $record->hasStudentName->firstName.' '.$record->hasStudentName->lastName;
				$data['data']['instrumentId'] = $record->hasInsturmentName->instrumentId;
				$data['data']['instrument'] = $record->hasInsturmentName->instrumentName;
				$data['data']['color_code'] = $lessonColor;
				$data['data']['lessonTypeId'] = $lessonTypeId;
				$data['data']['sameDayCancelComment'] = $record->sameDayCancelComment;
				$data['data']['comment'] = $record->comment;
				$data['color'] = $lessonColor;
				$data['imageurl'] = 'https://teachers.musikalessons.com/img/basket-20.png';
				$data['data']['edit_image'] = 'https://teachers.musikalessons.com/img/edit-icons.png';
				array_push($lessonCal,$data);
			}
		}
		//echo "<pre>";
		//print_r($lessonCal);
		$retdata = [['is_success' => true, 'id' => '1','start' => '2018-07-03', 'title' => 'Lesson + 15 minutes additional make-up time','data' => ['student'=>'student 1'],'color'=>'#00aeef'],['is_success' => true, 'id' => '6','start' => '2018-07-04', 'title' => 'Student cancelled on same day of regularly scheduled lesson.','data' => ['student'=>'student 1'],'color'=>'#708090'],['is_success' => true, 'id' => '12','start' => '2018-07-07', 'title' => 'Vacation day - I did not teach this student because of my or students','data' => ['student'=>'student 2'],'color'=>'#1ab394']];
		$lesson_data = json_encode($lessonCal);
		//echo "<pre>";
		
		if(isset($request->stu_id)){
			$student_id =  $request->stu_id;
			if(array_key_exists($student_id,$student_ins)){
				$ins_data = $student_ins[$student_id];
			}else{
				$ins_data = [];
			}
			 $adm_data=ModelsAdmission::where('studentId','=',$student_id)->first();
			if(!empty($adm_data)){
				$adm_id = $adm_data->admissionId;
			}else{
				$adm_id = "";
			} 
			


			//print_r($ins_data);die;
			return view('submitNewEntry',compact('lesson_data','studentData','instInfo','student_id','ins_data','adm_id'));
		}else{
			$student_id = "";
			return view('submitNewEntry',compact('lesson_data','studentData','instInfo','student_id'));
		}
		
	}
	
    public function view_calendar()
	{
		//dd('ddd');
		//echo Auth::id();
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();	
		$idNum = $user->teacherId->remoteTeacherId;
		$instruments=ModelsInstrument::where('instrumentName','=','Adjustment')->get();
		$ad = $instruments[0]->id;
		$admissions=ModelsAdmission::where('teacherId','=',$idNum)->where('instrumentId','!=',$ad)->where('dateOut','=','0000-00-00')->count();
		//dd($admissions);
		$studentData = [];
		$instInfo = [];
		if ($admissions>0) {
			$stu_data= DB::connection('mysqlsystem')->select("SELECT A.*, S.*, I.* FROM admissions A INNER JOIN studentNames S ON A.studentId=S.studentId INNER JOIN instruments I ON A.instrumentId=I.instrumentId WHERE A.teacherId = '".$idNum."' AND A.instrumentId!='".$ad."' AND A.dateOut = '0000-00-00' AND S.registered!=0 ORDER BY S.lastName ASC, S.firstName ASC, A.dateIn ASC");
		
			foreach($stu_data as $row)
			{
				//if (!$row['registered']) continue;->where('admissionId',)
				 $row->name = (!empty($row->lastName)?($row->packageStudent=='Y'&&$row->lastName[0]!='-'?'- ':"").$row->lastName.", ":"").$row->firstName;
				$row->school = $row->afterSchool=='Y'?1:0;
				//$i = count($studentData);
				$instInfo[$row->instrumentId] = $row->instrumentName;
				$row->first_lesson = 0; // Set zero for all cases. 
				//$studentData[$i] = $row;
				array_push($studentData,$row);
				
			}
		}
		
		
		$lessonRecords=ModelsLessonRecord::with('hasStudentName')->with('hasInsturmentName')->with('hasrate')->where("lessonDate",">", Carbon::now()->subMonths(12))->where('teacherId','=',$idNum)->orderBy('lessonDate', 'DESC')->get();
		$lessonCal = [];
		
		foreach($lessonRecords as $record)
		{
			//dd($record);
			if(!is_null($record->hasStudentName) && !is_null($record->hasInsturmentName))
			{
				$is_adj = $record->hasInsturmentName->instrumentName=='Adjustment'?1:0;
				$delon = $is_adj?0:1;
					
				switch ($record->sameDayCancel) {
					case "Y": $lessontype = "St. Same Day Cancel"; $lessonColor = "#b7bfc8"; $lessonTypeId = 6; break;
					case "y": $lessontype = "St. Same Day Makeup Cancel"; $lessonColor = "#b7bfc8"; $lessonTypeId = 7; break;
					case "A": $lessontype = "Te. Cancel"; $delon = 0; $lessonColor = "#b7bfc8"; $lessonTypeId = 10; break;
					case "a": $lessontype = "St. Advance Cancel"; $delon = 0; $lessonColor = "#b7bfc8"; $lessonTypeId = 8; break;
					case "V": $lessontype = "Vacation"; $lessonColor = "#a6f2e3"; $lessonTypeId = 12; break;
					case "R": $lessontype = "Te. Makeup Lesson Cancel"; $delon = 0; $lessonColor = "#b7bfc8"; $lessonTypeId = 11; break;
					case "r": $lessontype = "St. Makeup Advance Cancel"; $delon = 0; $lessonColor = "#b7bfc8"; $lessonTypeId = 9; break;
					case "M": $lessontype = "Makeup"; $lessonColor = "#99e4ff"; $lessonTypeId = 5; break;
					case "N": $lessontype = "Introductory"; $lessonColor = "#99e4ff"; $lessonTypeId = 0; break;
					case "O": $lessontype = "Other"; $lessonColor = "#a6f2e3"; $lessonTypeId = 13; break;
					case "1": case "2": case "3": case "4":
						$lessontype = "Regular + ";
						$xt = $record->sameDayCancel*15;
						$lessontype .= "$xt makeup  (".($record->lessonDuration-$xt)." min base)";
						$lessonColor = "#99e4ff";
						$lessonTypeId = $record->sameDayCancel;
						break;
					default:
						if ($record->hasInsturmentName->instrumentName=='Adjustment') 
						{ $lessontype = "Adjustment"; }
						else {
							$lessontype = "Regular";
							if ($record->lessonDuration>$record->hasrate->lessonDuration)
								$lessontype .= " + ".($record->lessonDuration-$record->hasrate->lessonDuration)." extra";
						}
						$lessonColor = "#99e4ff";
						$lessonTypeId = "";
						break;
				}
				//echo $lessontype.'</br></br>'; 00aeef 708090 1ab394
				//$data['is_success'] = true; e2e6e9
				$data['id'] = $record->lessonId;
				$data['start'] = $record->lessonDate;
				$data['title'] = $lessontype;
				$data['data']['studentId'] = $record->hasStudentName->studentId;
				$data['data']['student'] = $record->hasStudentName->firstName.' '.$record->hasStudentName->lastName;
				$data['data']['instrumentId'] = $record->hasInsturmentName->instrumentId;
				$data['data']['instrument'] = $record->hasInsturmentName->instrumentName;
				$data['data']['color_code'] = $lessonColor;
				$data['data']['lessonTypeId'] = $lessonTypeId;
				$data['data']['sameDayCancelComment'] = $record->sameDayCancelComment;
				$data['data']['comment'] = $record->comment;
				$data['color'] = $lessonColor;
				$data['imageurl'] = 'https://teachers.musikalessons.com/img/basket-20.png';
				$data['data']['edit_image'] = 'https://teachers.musikalessons.com/img/edit-icons.png';
				array_push($lessonCal,$data);
			}
		}
		//echo "<pre>";
		//print_r($lessonCal);
		$retdata = [['is_success' => true, 'id' => '1','start' => '2018-07-03', 'title' => 'Lesson + 15 minutes additional make-up time','data' => ['student'=>'student 1'],'color'=>'#00aeef'],['is_success' => true, 'id' => '6','start' => '2018-07-04', 'title' => 'Student cancelled on same day of regularly scheduled lesson.','data' => ['student'=>'student 1'],'color'=>'#708090'],['is_success' => true, 'id' => '12','start' => '2018-07-07', 'title' => 'Vacation day - I did not teach this student because of my or students','data' => ['student'=>'student 2'],'color'=>'#1ab394']];
		$lesson_data = json_encode($lessonCal);
		
		//print_r($retdata);
		//die;
		return view('submit-entry',compact('lesson_data','studentData','instInfo'));
	}
	public function calendar()
	{
		return view('calendar');
	}
	public function checkDuplicateValue(Request $request)
	{
	
		//die;
		$now = Carbon::now();
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();	
		$idNum = $user->teacherId->remoteTeacherId;
		
		
		$log['teacherId'] = $idNum;
		$log['lesson_type'] = $request->event_id;
		$log['lesson_date'] = $request->startdate;
		$log['studentId'] = $request->studentId;
		$log['instrumentId'] = $request->instrumentId;
		$log['txta_same_regular'] = $request->txta_same_regular;
		$log['txta_same_makeup'] = $request->txta_same_makeup;
		$log['reason'] = $request->reason;
		Log::info($log);
		
		$toomanycancels = 0;
		$chkCancel = 0;
		$semnames = ["Fall","Spring","Summer"];
		define("LATE_DAY",12);
		
		$lType = $request->event_id;
		$lessonName = $request->lessonName;
		$startdate = $request->startdate;
		$sid = $request->studentId;
		$sname = $request->studentname;
		$iid = $request->instrumentId;
		$inst = $request->instrument;
		$txta_same_regular = $request->txta_same_regular;
		$txta_same_makeup = $request->txta_same_makeup;
		$entryYear = $request->entryYear;
		$entryDay = $request->entryDay;
		$entryMonth = $request->entryMonth;
		$other_reason = $request->reason;
		
		$sameDayCancellation = ($lType==6||$lType==7)?1:0;
		$isMakeup = $lType==5?1:0;
		$needsMakeup = $lType==8?1:($lType==10?2:0);
		$needsResched = $lType==9?1:($lType==11?2:0);
		$isVac = ($lType==12)?1:0;
		$isOther = $lType==13?1:0;
		$outp = "";
		
		//die;
		$tch = ModelsTeacherName::where('teacherId','=',$idNum)->first();
		$tch->name = $tch->firstName.(!empty($tch->lastName)?" ".$tch->lastName:'');
		//echo $tch->name; die;
		$admission_info=ModelsAdmission::with('name')->with('instName')->where('teacherId','=',$idNum)->where('studentId','=',$sid)->where('instrumentId','=',$iid)->get();
		//echo $admission_info->count(); die;
		//dd($admission_info);
		
		$admissionId = $admission_info[0]->admissionId;
		
		$isPackage = $admission_info[0]->name->packageStudent=='Y'?1:0;
		$studentName=(!empty($admission_info[0]->name->lastName)?($isPackage&&$admission_info[0]->name->lastName[0]!='-'?'- ':"").$admission_info[0]->name->lastName.", ":"");
		$studentName.=$admission_info[0]->name->firstName;
		$Level = $admission_info[0]->name->rate_id;	
		
		$instrumentName=$admission_info[0]->instName->instrumentName;
		
		
		$mtime = $admission_info[0]->makeupTime;
		$baseDur = $admission_info[0]->lessonDuration;
		$duration = $baseDur;
		$rate = $admission_info[0]->teacherRate;
		$add = 0;	// amt of extra time to add in mins
		$basePkg = 1;
		$sects = $baseDur/15;	// # of 15-min intervals in base lesson duration

		if ($lType<5) {$add = $lType*15; if (intval($sects)>0) $basePkg += $lType/$sects; }

		//We get...

		$baseSP = sprintf("%.2f",$admission_info[0]->studentPrice);
		$baseAmt = ($isVac||$needsMakeup||$needsResched||$isOther)?0:$baseSP;	// price based on entry type
		$baseRate15 = ($sects!=0?$baseAmt/$sects:0);	// the "base rate" for a 15-min interval
		$duration += $add; 
		$xtra = $add/15;
		
		if ($isVac||$needsMakeup||$needsResched||$isOther) $duration = 0;
		$amountDue = $baseAmt+$baseRate15*$xtra;
		
		// NORMALIZE TO 35, 50, 68

		if ($baseAmt==35&&$baseDur==30) {
			if ($duration==45) $amountDue = 50;
			else if ($duration==60) $amountDue = 68;
			else if ($duration>60) $amountDue = 68+17*($duration-60)/15;
		}
		else if ($baseAmt==50&&$baseDur==45) {
			if ($duration==60) $amountDue = 68;
			else if ($duration==90) $amountDue = 100;
			else if ($duration>60) $amountDue = 68+17*($duration-60)/15;
		}
		$amountDue = sprintf("%.2f",$amountDue);
		/* echo $amountDue.' ';
		echo $admission_info[0]->rate_in_use.' ';
		echo 'price_'.$baseDur.'_'.($xtra*15).' ';
		echo 'price_'.$baseDur.' '; */
		if($admission_info[0]->rate_in_use=='new'){

			if($admission_info[0]->lessonLoc != 'online')
			{ 
				$Level = $Level; //$sql = "Select * from newrate where  Level = $Level";
			}
			else 
			{ 
				$Level = 99; //$sql = "Select * from newrate where  Level = 99"; 
			}
			$temprate=ModelsNewrate::where('Level','=',$Level)->first()->toArray();
			if($xtra > 0 ) { $amountDue = $temprate['price_'.$baseDur.'_'.($xtra*15)]; }
			else { $amountDue = $temprate['price_'.$baseDur]; }

			if ($isVac||$needsMakeup||$needsResched||$isOther) { $amountDue = 0; }

		}
		//$gfrate=Gfrate::all();
		
		if( $admission_info[0]->rate_in_use=='old' ){	
			$gfrate_row=ModelsStudentGfrate::where('studentId','=',$sid)->get();
			$gfrateCount = $gfrate_row->count();
			//echo $startdate.'-'.strtotime("$startdate"); die;
			if($gfrateCount ==  1 ){
	
				$ltimestamp = strtotime($startdate);
				
				$firstOct2017 = strtotime("2017-10-01");
				
				if($ltimestamp >= $firstOct2017 ){
					$temprate=ModelsGfrate::where('Level','=',$gfrate_row[0]->rates_id)->first()->toArray();
					//$temprateCount = count($temprate);
					
					if(!empty($temprate)){
						if($xtra > 0 ) { $amountDue = $temprate['price_'.$baseDur.'_'.($xtra*15)]; }
						elseif($temprate['price_'.$baseDur]) { $amountDue = $temprate['price_'.$baseDur]; }
						
						if ($isVac||$needsMakeup||$needsResched||$isOther) {  $amountDue = 0; }
					}	else {
						//echo "no row";
					}	
				}
			}
		}	
	
		/** If gfrate type has been updated in admissions then use it **/

		if($admission_info[0]->rate_in_use!='new' &&  $admission_info[0]->rate_in_use!='old' ){

			$temprate=ModelsGfrate::where('Level','=',$admission_info[0]->rate_in_use)->first()->toArray();
			//$temprateCount = count($temprate);	
			if(!empty($temprate)){
				if($xtra > 0 ) { $amountDue = $temprate['price_'.$baseDur.'_'.($xtra*15)]; }
				elseif($temprate['price_'.$baseDur]) { $amountDue = $temprate['price_'.$baseDur]; }
			
				if ($isVac||$needsMakeup||$needsResched||$isOther) { $amountDue = 0; }
			}
		}
		//echo $amountDue;
		//die;
		
		$baseAmtT = sprintf("%.2f", ($rate/60)*$baseDur);
		$amount = sprintf("%.2f", ($rate/60)*$duration);
		$firstduration = $admission_info[0]->firstlessonDuration;
		$firstrate = $admission_info[0]->fl_teacherRate;
		$firstamountdue = $admission_info[0]->fl_studentPrice;
		
		$the_ldate = $startdate;
		//echo $admissionId;
		$alterId=ModelsLessonRecord::where('admissionId','=',$admissionId)->where('lessonDate','=',$the_ldate)->count();
		//echo $alterId; die;
		if ($alterId<0) {
			// TODO: error out
		}
		else if ($alterId==0) {
			$firstLesson=ModelsLessonRecord::where('admissionId','=',$admissionId)->orderBy('lessonDate','asc')->take(1)->get();
			
			if(!$firstLesson->isEmpty()) {
				$fullDate = strtotime($the_ldate);
				$fl_date = $firstLesson[0]->lessonDate; 
				
				$fl_date = $fl_date!='0000-00-00'?strtotime($fl_date):0;

				if($fullDate<$fl_date) {

					$msg="You cannot submit an entry with a date earlier than the introductory lesson.<br>\n";
					$msg.="If you made a mistake, and ".$firstLesson[0]->lessonDate." is not the date of this student's introductory lesson, you must first delete all entries for that student.<br>\n";
					$msg.="Then, you must submit that student's introductory lesson, then you may enter the rest of the subsequent entries in any order.<br>\n";
					
					$json = json_encode(['status'=>'false','msg'=>$msg]);
					Log::info('Message for this Lesson Entry: '.$msg);
					return $json;
				}
			}
			else {
				if ($lType!=0) {
					$msg = "You cannot enter a cancellation if you haven't had the introductory lesson yet.<br>\n";
					$msg .= "You must have your first lesson before any cancellations can be logged.<br>\n";
					$json = json_encode(['status'=>'false','msg'=>$msg]);
					Log::info('Message for this Lesson Entry: '.$msg);
					return $json;
				}

				$amountDue = $firstamountdue;
				$duration = $firstduration;
				$amount = sprintf("%.2f", $firstrate*$duration/60);
				$sameDayCancellation = 8;
				$basePkg = 1;
			}
			
			
			
			//echo $duration.' '.$needsMakeup.' '; 
			$remind = 0;
			$sameDayCancelComment  = "";
			$isAdvance = ($needsMakeup||$needsResched||$isOther)?1:0;

			$submitDate = strtotime($the_ldate);
			//echo $needsMakeup; die;
			//echo date('m',strtotime($startdate));
			///echo date('d',strtotime($startdate));
			//echo date('Y',strtotime($startdate));
			
			if (!checkDate($entryMonth,$entryDay,$entryYear)) {

				$msg="Invalid Date Submission<br>";
				$msg.="The date you have entered:<br>";
				$msg.=$startdate."<br>";
				$msg.="is not a valid Date. Please check your date submission<br>";
				$json = json_encode(['status'=>'false','msg'=>$msg]);
				Log::info('Message for this Lesson Entry: '.$msg);
				return $json;
			}
			
			if ($isAdvance&&strtotime("+21 day", Carbon::now()->timestamp)<$submitDate) {

				$msg="Invalid Date Submission<br>";
				$msg.="The date you have entered:<br>";
				$msg.=$startdate."<br>";
				$msg.="is in the <b>future</b> and cannot be accepted as a valid advance cancellation. Please check your date submission<br>";
				$json = json_encode(['status'=>'false','msg'=>$msg]);
				Log::info('Message for this Lesson Entry: '.$msg);
				return $json;
			}
			else if (!$isAdvance&&time()<$submitDate) {

				$msg="Invalid Date Submission<br>";
				$msg.="The date you have entered:<br>";
				$msg.=$startdate."<br>";
				$msg.="is in the <b>future</b> and cannot be accepted as a valid lesson. Please check your date submission<br>";
				$json = json_encode(['status'=>'false','msg'=>$msg]);
				Log::info('Message for this Lesson Entry: '.$msg);
				return $json;
			}
			
			//echo $needsMakeup.'<br>'; 
			
			if ($lType<6) {
				if ($lType>0&&$lType<5) //echo "Make-up time taken: ".($lType*15)." min<br />\n";	// minus x*15 makeup minutes
				$sameDayCancellation = 10+$lType;
				if ($isMakeup) { $sameDayCancellation = 7; }
			}
			else if ($sameDayCancellation) {
				if ($lType == 6) { $sameDayCancelComment = trim($txta_same_regular); }
				else if ($lType == 7) {
					$sameDayCancelComment = trim($txta_same_makeup);
					$sameDayCancellation = 10;	// same day makeup cancel
				}
			}
			else if ($needsMakeup) {
				$remind |= 1;	// activate makeup time popup on load
				$sameDayCancellation = 2*$needsMakeup;	// advanced notice
				//UPDATE admissions SET makeupTime=(makeupTime+$baseDur) WHERE admissionId='$admissionId' LIMIT 1;
				//echo $admissionId.' '.$baseDur;
				$xrows=ModelsAdmission::where('admissionId',$admissionId)->increment('makeupTime', $baseDur);
				//print_r($xrows);
				if(!$xrows)
				{
					$query = "UPDATE admissions SET makeupTime=(makeupTime+$baseDur) WHERE admissionId='$admissionId'";
					Mail::raw("THE QUERY: $query\nTHE ERROR: the_err\nxrows = 0 || -1\n", function ($message){
							$message->from('musika@musikalessons.com')->to('scottbrady@musikalessons.com', 'musika')->subject('Musika error (ADDLESSON add makeup error)');
						});	
					// write mail function
					$msg = "There was a problem adding a lesson to the student's makeup time. This error is being forwarded to the webmaster.<br />\n";
					$json = json_encode(['status'=>'false','msg'=>$msg]);
					Log::info('Message for this Lesson Entry: '.$msg);
					return $json;
				}
				
			}
			else if ($needsResched) {
				$sameDayCancellation = 3*$needsResched;
			}
			else if ($isVac) {
				$sameDayCancellation = 5;
			}
			else if ($isOther) {	// other (give a reason)
				$sameDayCancellation = 9;
			}
			$sameDayIns = 'N';
			
			//echo $sameDayCancellation;
			//die;
			switch ($sameDayCancellation) {
				case 1: $sameDayIns = 'Y'; break;	// st same day cancel
				case 2: $sameDayIns = 'a'; $chkCancel = 2; break;	// st advance cancel
				case 4: $sameDayIns = 'A'; $chkCancel = 1; break;	// te cancel
				case 3: $sameDayIns = 'r'; break;	// st advance makeup cancel (reschedule)
				case 6: $sameDayIns = 'R'; break;	// te makeup cancel (reschedule)
				case 5: $sameDayIns = 'V'; break;	// vacation
				case 7: $sameDayIns = 'M'; break;	// makeup
				case 8: $sameDayIns = 'n'; break;	// intro
				case 9: $sameDayIns = 'O'; break;	// other
				case 10: $sameDayIns = 'y'; break;	// st same day makeup cancel
				case 11: case 12: case 13: case 14: $sameDayIns = ''.($sameDayCancellation-10); break;	// lesson + makeup time
			}
			//echo $sameDayIns; die;
			$sems = [];
			$sems[2006] = [
				[strtotime("2005-09-05"),strtotime("2006-01-31")],
				[strtotime("2006-02-01"),strtotime("2006-06-18")],
				[strtotime("2006-06-19"),strtotime("2006-09-09")]
			];
			$sems[2007] = [
				[strtotime("2006-09-10"),strtotime("2007-01-31")],
				[strtotime("2007-02-01"),strtotime("2007-06-16")],
				[strtotime("2007-06-17"),strtotime("2007-09-03")]
			];
			$sems[2008] = [
				[strtotime("2007-09-04"),strtotime("2008-01-31")],
				[strtotime("2008-02-01"),strtotime("2008-06-15")],
				[strtotime("2008-06-16"),strtotime("2008-09-01")]
			];
			$sems[2009] = [
				[strtotime("2008-09-02"),strtotime("2009-01-31")],
				[strtotime("2009-02-01"),strtotime("2009-06-18")],
				[strtotime("2009-06-19"),strtotime("2009-09-07")]
			];
			$sems[2010] = [
				[strtotime("2009-09-08"),strtotime("2010-01-31")],
				[strtotime("2010-02-01"),strtotime("2010-06-18")],
				[strtotime("2010-06-19"),strtotime("2010-09-06")]
			];
			$sems[2011] = [
				[strtotime("2010-09-07"),strtotime("2011-01-31")],
				[strtotime("2011-02-01"),strtotime("2011-06-18")],
				[strtotime("2011-06-19"),strtotime("2011-09-05")]
			];
			$sems[2012] = [
				[strtotime("2011-09-06"),strtotime("2012-01-31")],
				[strtotime("2012-02-01"),strtotime("2012-06-18")],
				[strtotime("2012-06-19"),strtotime("2012-09-03")]
			];
			$sems[2013] = [
				[strtotime("2012-09-04"),strtotime("2013-01-31")],
				[strtotime("2013-02-01"),strtotime("2013-06-18")],
				[strtotime("2013-06-19"),strtotime("2013-09-08")]
			];
			$sems[2014] = [
				[strtotime("2013-09-09"),strtotime("2014-01-31")],
				[strtotime("2014-02-01"),strtotime("2014-06-18")],
				[strtotime("2014-06-19"),strtotime("2014-09-08")]
			];
			$sems[2015] = [
				[strtotime("2014-09-09"),strtotime("2015-01-31")]
			];


			
			$paid = ['N','n','Y','y','M','1','2','3','4'];
			
			
			//die;
			$entry_enums = [
					'N'	=>	'NRM',
					'n'	=>	'INT',
					'Y'	=>	'SDR',
					'y'	=>	'SDM',
					'A'	=>	'TRC',
					'a'	=>	'ADR',
					'R'	=>	'TMC',
					'r'	=>	'ADM',
					'M'	=>	'MKP',
					'V'	=>	'VAC',
					'O'	=>	'OTH',
					'T'	=>	'TRM',
					'1'	=>	'N15',
					'2'	=>	'N30',
					'3'	=>	'N45',
					'4'	=>	'N60'
				];
		
			
			$fw=ModelsLessonRecord::where('teacherId','=',$idNum)->count();
			
			//print_r($admission_info[0]->name); die;
			
			//echo count($admission_info[0]->name); die;
			if (!empty($admission_info[0]->name)) {
				//echo $sameDayCancellation;
				//die;
				//echo $admission_info[0]->name->is_upgraded;
				$packageStudent = $admission_info[0]->name->packageStudent;
				$packageRemaining = $admission_info[0]->name->packageRemaining;
				$packagefirstname = $admission_info[0]->name->firstName;
				$packagelastname = ($packageStudent=='Y'&&$admission_info[0]->name->lastName[0]!='-'?'- ':"").$admission_info[0]->name->lastName;
				$packageaccountpayee = $admission_info[0]->name->accountPayee;
				$packageemail = $admission_info[0]->name->email;
				
				$reason = ($isOther?$request->reason:"");
				//die;
				$lessonRecord = new ModelsLessonRecord();
				$lessonRecord->teacherId = $idNum;
				$lessonRecord->studentId = $sid;
				$lessonRecord->instrumentId = $iid;//Carbon::now()->timestamp;
				$lessonRecord->lessonDuration = $duration;
				$lessonRecord->lessonDate = $the_ldate;
				$lessonRecord->amount = $amount;
				$lessonRecord->admissionId = $admissionId;
				$lessonRecord->amountDue = $amountDue;
				$lessonRecord->sameDayCancelComment = $sameDayCancelComment;
				$lessonRecord->edited_comment = '';
				$lessonRecord->comment = $reason;
				$lessonRecord->sameDayCancel = $sameDayIns;
				$lessonRecord->dateEntered = Carbon::now();
				
				if($lessonRecord->save())
				{
					//echo $alterId = $lessonRecord->id;
					//die;Synapse msteam
					 if ($fw<1) {
						//mail("Musika <contracts@musikalessons.com>","First lesson logged by ".$tch['name'],"Teacher ".$tch['name']." has logged their first entry.",$headers.EOL.EOL);scottbrady@musikalessons.com
						$techerName = $tch->name;
						//$emails = ['scottbrady@musikalessons.com', 'nlee@musikalessons.com'];
						$emails = ['contracts@musikalessons.com'];
						/* Mail::raw("Teacher $techerName has logged their first entry.", function ($message) use($techerName,$emails){
							$message->from('musika@musikalessons.com')->to($emails, 'musika')->subject('First lesson logged by '.$techerName);
						}); */
						
						if (empty($tch->zipCode)) $remind |= 4;

					}
					$new_id = -1;
					if ($admission_info[0]->name->is_upgraded=='Y') {
						
						$comment = (!empty($sameDayCancelComment))?trim($sameDayCancelComment):($isOther?trim($request->reason):"");
						
						$lesson = new ModelsLesson();
						$lesson->admissions_id = $admissionId;
						$lesson->duration = $duration;
						$lesson->taught_on = $iid;//Carbon::now()->timestamp;
						$lesson->teacher_paid = $amount;
						$lesson->lesson_price = $amountDue;
						$lesson->entry_type = $entry_enums[$sameDayIns];
						$lesson->comment = $comment;
						$lesson->entered_on = Carbon::now()->timestamp;
						$lesson->old_id = $alterId;
						if($lesson->save())
						{
							 $new_id = $lesson->id;
						}
					}
					
					if($packageStudent == "Y" && $lType<8) {
						
						if ($admission_info[0]->name->is_upgraded=='Y') {
							
							$pkg_d=ModelsPackage::where('admissions_id','=',$admissionId)->where('package_start','<=',Carbon::now()->timestamp)->where('package_end','=',0)->orderBy('package_start','DESC')->get();
							$pkg_n = $pkg_d->count();
							if ($pkg_n>0) {
								
								if ($pkg_d[0]->package_start==0) { 
									$packageStart = Carbon::now()->timestamp; 
								}else {
									$packageStart = $pkg_d[0]->package_start;
								}

								//	$pq .= " WHERE packages_id=".$pkg_d['packages_id'];
								$tmp_r=ModelsPackage::where('packages_id',$pkg_d[0]->packages_id)->update([
										  'duration_used'=> DB::raw('duration_used+'.$duration), 
										  'package_start' => $packageStart
										]);
								$tmp_r=ModelsLesson::where('lessons_id',$new_id)->update([
										  'packages_id' => $pkg_d[0]->packages_id
										]);		
								
							}
						}
						$oldPkg = $packageRemaining;
						$packageRemaining -= $basePkg;
						$urows=ModelsStudentName::where('studentId',$sid)->update(['packageRemaining' => $packageRemaining ]);
						if($urows)
						{
							if($oldPkg>=0&&$packageRemaining<0) {
								$sendTo = "accounting@musikalessons.com";

								$how = -$packageRemaining;

								$num_in = $oldPkg+$how;

								$message = "The package started ".sprintf("%.02f",$oldPkg)." lessons way through a $num_in length lesson entered for ".$startdate.".";

								$subject = "Package Counter Reached $packageRemaining";

								$message .= "<p>On ".$startdate." a new package of 8 lessons (".$baseDur." min each) started for " .$packagefirstname. " " .$packagelastname. " with the account payee as " .$packageaccountpayee. ". $message</p><br /><br />\n<p>$baseSP</p>\n";
							}
						}
						else
						{
							$msg = "";
							/*$the_err = mysql_error();
							if (!defined("DEBUG_MAIL"))
								mail("webmaster@musikalessons.com","Musika error (ADDLESSON update error)",
									"THE QUERY: $uquery\nTHE ERROR: $the_err\nurows = 0 || -1 ($urows)\n","From: Musika <contact@musikalessons.com>".EOL.EOL);
							
							else $msg .= "<b>Error</b>: $the_err, urows: $urows<br />\n";*/
							$uquery = "UPDATE studentNames SET packageRemaining='$packageRemaining' WHERE studentId='$sid';";
							Mail::raw("THE QUERY: $uquery\nTHE ERROR: the_err\nurows = 0 || -1\n", function ($message){
								$message->from('musika@musikalessons.com')->to('webmaster@musikalessons.com', 'musika')->subject('Musika error (ADDLESSON update error)');
							});	

							$msg .= "There was a problem updating this student's package. This error is being forwarded to the webmaster.<br />\n";
							//$json = json_encode(['status'=>'false','msg'=>$msg]);
							Log::info('Message for this Lesson Entry: '.$msg);
							//return $json;
						}
					}
					if ($add>0) {
						$mrows=ModelsAdmission::where('admissionId',$admissionId)->decrement('makeupTime', $add);
						if(!$mrows)
						{
							// mail function
							$mquery = "UPDATE admissions SET makeupTime=(makeupTime-$add) WHERE admissionId='$admissionId';";
							Mail::raw("THE QUERY: $mquery\nTHE ERROR: the_err\nurows = 0 || -1\n", function ($message){
								$message->from('musika@musikalessons.com')->to('scottbrady@musikalessons.com', 'musika')->subject('Musika error (ADDLESSON update makeup error)');
							});	
							
							$msg = "There was a problem subtracting time from the student's makeup time. This error is being forwarded to the webmaster.<br />\n";
							$json = json_encode(['status'=>'false','msg'=>$msg]);
							Log::info('Message for this Lesson Entry: '.$msg);
							return $json;
						}
					}
					if ($lType==5||$lType==7) {
						$rrows=ModelsAdmission::where('admissionId',$admissionId)->decrement('makeupTime', $baseDur);
						if(!$rrows)
						{
							// mail function
							$rquery = "UPDATE admissions SET makeupTime=(makeupTime-$baseDur) WHERE admissionId='$admissionId';";
							Mail::raw("THE QUERY: rquery\nTHE ERROR: the_err\nurows = 0 || -1\n", function ($message){
								$message->from('musika@musikalessons.com')->to('scottbrady@musikalessons.com', 'musika')->subject('Musika error (ADDLESSON minus makeup error)');
							});	
							
							$msg = "There was a problem subtracting a lesson from the student's makeup time. This error is being forwarded to the webmaster.<br />\n";
							$json = json_encode(['status'=>'false','msg'=>$msg]);
							Log::info('Message for this Lesson Entry: '.$msg);
							return $json;
						}
					}
					
				}
				else {

					//$the_err = mysql_error();
					$msg = "There was a problem adding the entry. This error is being forwarded to the webmaster.<br />\n";
					
					$query = "(teacherId, studentId, instrumentId, lessonDuration, lessonDate, amount, admissionId, amountDue)('$idNum', '$sid', '$iid', '$duration', '$the_ldate', '$amount','$admissionId', '$amountDue',)";
					Mail::raw("THE QUERY: $query\nTHE ERROR: the_err\nurows = 0 || -1\n", function ($message){
						$message->from('musika@musikalessons.com')->to('scottbrady@musikalessons.com', 'musika')->subject('Musika error (ADDLESSON insert error)');
					});	

					$json = json_encode(['status'=>'false','msg'=>$msg]);
					Log::info('Message for this Lesson Entry: '.$msg);
					return $json;
				}
				
				$thisMon = $now->format('m');
				$thisYr = $now->format('Y');
				$thisDay = $now->format('d').' ';
				$lesson_ts = strtotime($startdate).' ';
				$the_first = strtotime($thisYr.'-'.$thisMon.'-01');
				
				$last_month = strtotime("-1 month",$the_first);
			
				if(in_array($sameDayIns,$paid) && (($thisDay>LATE_DAY&&$lesson_ts<$the_first) ||($lesson_ts<$last_month)))
				{
					$this->lateMail($sid,$tch->name,$startdate,$idNum, Carbon::now()->timestamp, $duration);
				}
				$msg="Data Saved Successfully";
			}
			else
			{
				/* $the_err = mysql_error();*/
				$query = "SELECT * FROM studentNames WHERE studentId='$sid';";
				Mail::raw("THE QUERY: $query\nTHE ERROR: the_err\nurows = 0 || -1\n", function ($message){
					$message->from('musika@musikalessons.com')->to('scottbrady@musikalessons.com', 'musika')->subject('Musika error (ADDLESSON select error)');
				});	

				$msg = "There was a problem searching the database. This error is being forwarded to the webmaster.<br />\n";
				$json = json_encode(['status'=>'false','msg'=>$msg]);
				Log::info('Message for this Lesson Entry: '.$msg);
				return $json;

			}
			if ($chkCancel>0) {
				$theld = strtotime($startdate);
				if (isset($sems[date('Y',strtotime($startdate))])) {
					$ldarr = $sems[date('Y',strtotime($startdate))];
					$chkit = -1;
					$ldi = -1; while (++$ldi<count($ldarr)) {
						if ($theld>=$ldarr[$ldi][0]&&$theld<=$ldarr[$ldi][1]) {
							$chkit = $ldi;
							break;
						}
					}
					if ($chkit==-1) {
						if (isset($sems[date('Y',strtotime($startdate))+1])) {
							$ldarr = $sems[date('Y',strtotime($startdate))+1];
							$ldi = -1; while (++$ldi<count($ldarr)) {
								if ($theld>=$ldarr[$ldi][0]&&$theld<=$ldarr[$ldi][1]) {
									$chkit = $ldi;
									break;
								}
							}
						}
					}
					//echo $chkit.' as';
					if ($chkit>-1) {
						$semmon0 = date('m',$ldarr[$chkit][0]);
						if ($semmon0==6) { $remind = 0; }
						if ($chkCancel==1) {
							
							if ($semmon0==6) if ($remind&1) $remind -= 1;

							$ldr = DB::connection('mysqlsystem')->select("SELECT * FROM lessonRecords WHERE admissionId='".$admissionId."' AND lessonDate>='".date('Y-m-d',$ldarr[$chkit][0])."' AND lessonDate<='".date('Y-m-d',$ldarr[$chkit][1])."' AND ASCII(sameDayCancel)=".ord('A')." GROUP BY lessonId");
							 $ldn = count($ldr);
							
							if ($ldn>2) {
								if ($semmon0==6) {/*$remind |= 128;*/}
								else {
									$remind |= 8;
									$toomanycancels |= 1;
									$em= "<div style='font-size:10pt;'>
									<p>
									Dear ".$tch->name.",<br />
									<br />
									Greetings!
									I wanted to touch base with you because I received a notice from the Musika records system that you have exceeded your allowed number of cancellations (2) for the semester for ".$studentName.".
									As a teacher myself, I understand that sometimes cancellations are unavoidable (ie. sickness), but also please keep in mind that you are professionally committed by contract (and it is Musika's policy/guarantee to our clients as well) to keep cancellations within the allowed two per semester.
									Thank you for understanding our concern with regards to cancellations and keeping them to an absolute minimum for the rest of the semester.
									I hope everything else is going well with ".$admission_info[0]->name->firstName."'s lessons, and let me know if there's anything else you'd like me to do for you.
									</p>
									<p>
									All the best,<br /><br />
									<b style='font-size:10pt; font-family:Times New Roman, serif;'>E. Scott Brady</b><br />
									<span style='font-size:18pt; font-family:Monotype Corsiva, fantasy; color:blue;'>Musika</span> | <span style='font-size:10pt; font-family:Arial, Helvetica, sans-serif;'>Founder & Director</span><br />
									<a style='font-size:10pt; font-family:Arial, Helvetica, sans-serif;' href='http://system.musikalessons.com'>system.musikalessons.com</a><br />
									<span style='font-size:10pt; font-family:Arial, Helvetica, sans-serif;'>Toll-free: (877) 687-4524</span>
									</p>
									</div>";
									$msg = $em;
									$json = json_encode(['status'=>'false','msg'=>$msg]);
									Log::info('Message for this Lesson Entry: '.$msg);
									return $json;	
								}		
							}
						}
						else if ($chkCancel==2) {
							if ($semmon0==6) if ($remind&1) $remind -= 1;
							$ldr = DB::connection('mysqlsystem')->select("SELECT * FROM lessonRecords WHERE admissionId='".$admissionId."' AND lessonDate>='".date('Y-m-d',$ldarr[$chkit][0])."' AND lessonDate<='".date('Y-m-d',$ldarr[$chkit][1])."' AND ASCII(sameDayCancel)=".ord('a')." GROUP BY lessonId");
							$ldn = count($ldr);
							if ($ldn>2) {
								$tnum = $ldn;
								if ($semmon0==6) {/*$remind |= 128;*/}
								else {
									$toomanycancels |= 2;
									$remind |= 16;
									$em = "<div style='font-size:10pt;'>
									<p>
									Dear ".($isPackage?$admission_info[0]->name->accountPayee:"parents of ".$studentName).",<br />
									<br />
									Greetings!
									I hope ".$admission_info[0]->name->firstName."'s ".$instrumentName." lessons with ".$tch->name." are going well.
									My name is E. Scott Brady, Founder & Director for Musika, and I wanted to touch base with you regarding your Musika lessons.
									I received a notice from the Musika records system that you have exceeded your allowed number of cancellations (2) for the semester for ".$admission_info[0]->name->firstName.".
									It would be wonderful if you could keep cancellations to an absolute minimum for the rest of the semester.
									I understand that sometimes cancellations are unavoidable (ie. sickness), but please have ".$admission_info[0]->name->firstName." make-up these cancelled lessons if you have not done so already.
									Thank you for understanding our concern regarding cancellations, and I hope everything else is going well with ".$admission_info[0]->name->firstName."'s lessons.
									Let me know if there's anything else you'd like me to do for you.
									</p>
									<p>
									All the best,<br /><br />
									<b style='font-size:10pt; font-family:Times New Roman, serif;'>E. Scott Brady</b><br />
									<span style='font-size:18pt; font-family:Monotype Corsiva, fantasy; color:blue;'>Musika</span> | <span style='font-size:10pt; font-family:Arial, Helvetica, sans-serif;'>Founder & Director</span><br />
									<a style='font-size:10pt; font-family:Arial, Helvetica, sans-serif;' href='http://system.musikalessons.com'>system.musikalessons.com</a><br />
									<span style='font-size:10pt; font-family:Arial, Helvetica, sans-serif;'>Toll-free: (877) 687-4524</span>
									</p>
									</div>";
									
									$tot = 0;
									$xtra = "<div>\n";

									$ldi = -1; while (++$ldi<count($ldarr)) {
										$ldr = DB::connection('mysqlsystem')->select("SELECT * FROM lessonRecords WHERE admissionId='".$admissionId."' AND lessonDate>='".date('Y-m-d',$ldarr[$ldi][0])."' AND lessonDate<='".date('Y-m-d',$ldarr[$ldi][1])."' AND ASCII(sameDayCancel)=".ord('a')." GROUP BY lessonId");
										$ldn = count($ldr);
										$xtra .= $semnames[$ldi]." student cancellations: $ldn<br />\n"; if ($ldn>0) $tot += $ldn;
										
										$ldr = DB::connection('mysqlsystem')->select("SELECT * FROM lessonRecords WHERE admissionId='".$admissionId."' AND lessonDate>='".date('Y-m-d',$ldarr[$chkit][0])."' AND lessonDate<='".date('Y-m-d',$ldarr[$chkit][1])."' AND ASCII(sameDayCancel)=".ord('A')." GROUP BY lessonId");
										$ldn = count($ldr);
										$xtra .= $semnames[$ldi]." teacher cancellations: $ldn<br />\n"; if ($ldn>0) $tot += $ldn;
										$xtra .= "<br />\n";
									}
									
									//$mtq = "SELECT makeupTime FROM admissions WHERE admissionId='$admissionId';";
									$mtd=ModelsAdmission::where('admissionId','=',$admissionId)->first();
									$mt = $mtd->makeupTime;
									
									$left = $mt<=0?0:($baseDur>0?sprintf("%.02f",$mt/$baseDur):0);
									$pdone = $mt<=0?100:sprintf("%.02f",100*(1-$mt/($tot*$baseDur)));
									$xtra .= "Total cancellations for ".date('Y',strtotime($startdate)).": $tot<br />\n";
									$xtra .= "Make-up time remaining: $mt min<br />\n";
									$xtra .= "Make-up lessons due: $left<br />\n";
									$xtra .= "%age done: $pdone%\n";
									$xtra .= "</div>\n";
									
									$msg = $em.$xtra;
									
									$json = json_encode(['status'=>'false','msg'=>$msg]);
									Log::info('Message for this Lesson Entry: '.$msg);
									return $json;
								}	
							}
						}
						
					}
					
					
				}
			}
			//echo $msg;
			$json = json_encode(['status'=>'true','lessonId'=>$alterId,'msg'=>$msg]);
			Log::info('Message for this Lesson Entry: '.$msg);
			return $json;
		}
		else
		{
			$msg = "An entry for this date has already been entered and can't be re-recorded. You can find this entry in your \"approved lessons\" file or \"awaiting lessons\" file. The links to these files can be found on the left side of this screen.\n\nThank you,\nThe Musika Administration";
			$json = json_encode(['status'=>'false','msg'=>$msg]);
			Log::info('Message for this Lesson Entry: '.$msg);
			return $json;
		}
	
		
		/* $json = json_encode(array('lType'=>$lType,'lessonType'=>$lessonName,'startdate'=>$startdate,'sname'=>$sname));

		return $json; */
		
		die;
		//return view('calendar');
	}
	public function lateMail($sid,$teacherName, $startdate, $idNum, $curDate, $len)
	{
		$thestudent = ModelsStudentName::where('studentId',$sid)->first();
		$studentName = $thestudent->firstName." ".$thestudent->lastName;
		
		/* $msg =  "<p>".$teacherName." entered a late lesson date of ".$startdate." for ".$studentName." ($len minutes)</p>\n";
		$msg .= "<p><a href='http://system.musikalessons.com/update/control.php?page=student&amp;id=".$thestudent['studentId']."'>view info for $studentName</a> ("." late entry submitted ".date('m/d/Y',$curDate).")</p>\n";
		$sub="Late lesson entry by ".$teacherName."";
		$from="Musika";
		$fromEmail="contact@musikalessons.com";
		$to="Musika";*/
		$emailAdd="synapse235@gmail.com";//"accounting@musikalessons.com"; 
		
		Mail::raw("Hi Musika, \n\n $teacherName entered a late lesson date of $startdate for $studentName ($len minutes). \n\n View info (  http://system.musikalessons.com/update/control.php?page=student&amp;id=".$sid." ) for $studentName ("." late entry submitted ".date('m/d/Y',$curDate).") \n\n From:\n Musika Lessons\n\n", function ($message) use($teacherName,$emailAdd){
			$message->from('contact@musikalessons.com', 'Musika')->to($emailAdd, 'Musika')->subject('Late lesson entry by '.$teacherName);
		});
		if (Mail::failures()){
			dd('Mail Fail');			
		}
		
	}
	public function getInstrument(Request $request)
	{
		$stuId = $request->sname;
		$admissions=ModelsAdmission::with('name')->where('studentId','=',$stuId)->first();
		$instId =  $admissions->instrumentId;
		$change_location =  $admissions->name->change_location;
		$instruments=ModelsInstrument::where('instrumentId','=',$instId)->get()->toArray();
		
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();	
		$teacherId = $user->teacherId->remoteTeacherId;
		
		$fw=ModelsLessonRecord::where('teacherId','=',$teacherId)->where('studentId','=',$stuId)->count();
		
		//dd($fw);
		//echo "<pre>";
		//print_r($instruments);
		$data['ins'] = $instruments;
		$data['change_location'] = $change_location;
		$data['lessonCnt'] = $fw;
		//print_r($data);
		$json = json_encode($data);
		return $json;
		die;
		//return view('calendar');
	}
	public function referral()
	{
		return view('referral');
	}
	
	public function sendEmailForChangedLessonLoc(Request $request){
		$event_id = $request->event_id;
		$startdate = $request->startdate;
		$studentId = $request->studentId;
		$instrumentId = $request->instrumentId;
		
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();	
		$teacherName = $user->teacherId->firstName.' '.$user->teacherId->lastName;
		$teacherId = $user->teacherId->remoteTeacherId;
		
		
		$studentDetails = ModelsStudentName::where('studentId',$studentId)->first();
		$studentName = $studentDetails->firstName.' '.$studentDetails->lastName;
		
		//teacher disagree the first log lesson for this student because student changed the lesson location during registration
		$emailAdd = "synapse235@gmail.com";
		Mail::raw("Hi Musika  \n\n Teacher ($teacherName) disagree the first log lesson for this student ($studentName) because $studentName was changed the lesson location during registration  \n\n From:\n Musika Lessons\n\n", function ($message) use($teacherName,$emailAdd){
			$message->from('musika@musikalessons.com', 'Musika')->to($emailAdd, 'Musika')->subject('Disagree for changed lesson location ');
		});
		if (Mail::failures()){
			dd('Mail Fail');			
		}
		
		die;
	}
	
	public function post_referral(Request $request)
	{
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();	
		$sname = $request->sname;
		$phone = $request->phone;
		
		$techaerName = $user->teacherId->firstName." ".$user->teacherId->lastName;
		// $emails = ['scottbrady@musikalessons.com', 'nlee@musikalessons.com'];
		// Mail::send('emails.referrel', [
		// 	'sname' => $request->sname,
		// 	'phone' => $request->phone,
		// 	'techaerName'=>$techaerName
		// 	], function ($m) use ($techaerName,$emails){
		// 	$m->from('musika@musikalessons.com','Musikalessons')->to($emails,$techaerName)
		// 	->subject('Student referral')
		// 	->sender('musika@musikalessons.com','Musikalessons')
		// 	->replyTo('musika@musikalessons.com','Musikalessons');
		// 	});

			$emailIds = ['naveensony02@gmail.com'];
				$details = [
					'sname' => $request->sname,
			'phone' => $request->phone,
			'techaerName'=>$techaerName
				];
				
				Mail::to('naveensony02@gmail.com')->send(new \App\Mail\Referrel($details));
		$msg = "Thank you for submitting this form. We will contact this student as soon as possible.";
		return view('referral',compact('msg'));
	}
	
}
