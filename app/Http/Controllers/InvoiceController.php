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
use App\Models\Admission as ModelsAdmission;
use App\Models\LessonRecord as ModelsLessonRecord;
use App\Models\StudentName as ModelsStudentName;
use App\Models\User as ModelsUser;
use App\ProspectiveStudent;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;
//use Carbon\Carbon;
class InvoiceController extends Controller
{
   	public function invoice(Request $rquest)
	{
		$now = time();
		$mon = 0; 
	if (isset($rquest->month)) $mon = intval($rquest->month);
	$yr = date('Y',$now); 
	if (isset($rquest->year)) $yr = intval($rquest->year);
	$ys = $yr; $ext_ym = "";	
			if ($mon>0&&$mon<13) {
			$ys .= '-'.sprintf('%02d',$mon);
			$ext_ym = $ys;
			$nm = $mon; 
			$ny = $yr;
			if ($nm>12) {
				$nm = $nm-12;
				++$ny;
			}
			$nm = sprintf('%02d',$nm);;
			$ext_ym = "$ny-$nm";
		}
		else {
			//$ys .= '-01';
			$ext_ym = "$ys";
		}
		
		
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();	
		
		
		$lesssonRecord=ModelsLessonRecord::with('hasStudentName','hasInsturmentName','hasrate')->where('teacherid',$user->teacherId->remoteTeacherId)->where('sameDayCancel','!=','T')->where('lessonDate','like',$ext_ym.'%')->orderBy('lessonDate','desc')->get();
		//dd($lesssonRecord);
		
		//echo $ext_ym.' ';//die;where('lessonDate','like',$ext_ym.'%')->
		$past_6months_date = Carbon::now()->subMonths(6)->format('Y-m-d');
		$lesssonRecord_approved=ModelsLessonRecord::where('teacherid',$user->teacherId->remoteTeacherId)->where('sameDayCancel','!=','T')->where("lessonDate",">", $past_6months_date)->where('approveDate','>','0000-00-00')->orderBy('lessonDate','desc')->count();
		
		$lesssonRecord_all=ModelsLessonRecord::where('teacherid',$user->teacherId->remoteTeacherId)->where('sameDayCancel','!=','T')->where("lessonDate",">", $past_6months_date)->orderBy('lessonDate','desc')->count();
		
		if($rquest->which==1)
		{
			$lesssonRecord=ModelsLessonRecord::with('hasStudentName','hasInsturmentName','hasrate')->where('teacherid',$user->teacherId->remoteTeacherId)->where('sameDayCancel','!=','T')->where('approveDate','=','0000-00-00')->where('lessonDate','like',$ext_ym.'%')->orderBy('lessonDate','desc')->get();
		}
		if($rquest->which==2)
		{
			$lesssonRecord=ModelsLessonRecord::with('hasStudentName','hasInsturmentName','hasrate')->where('teacherid',$user->teacherId->remoteTeacherId)->where('sameDayCancel','!=','T')->where('approveDate','>','0000-00-00')->where('lessonDate','like',$ext_ym.'%')->orderBy('lessonDate','desc')->get();
		} 
		
		
		
		return view('invoice',compact('lesssonRecord','lesssonRecord_all','lesssonRecord_approved'));
	}
	public function invoiceAsPerAdmission($admissonId,Request $rquest)
	{
			$now = time();
	$mon = 0; 
	if (isset($rquest->month)) $mon = intval($rquest->month);
	$yr = date('Y',$now); 
	if (isset($rquest->year)) $yr = intval($rquest->year);
	$ys = $yr; $ext_ym = "";	
			if ($mon>0&&$mon<13) {
			$ys .= '-'.sprintf('%02d',$mon);
			$ext_ym = $ys;
			$nm = $mon; 
			$ny = $yr;
			if ($nm>12) {
				$nm = $nm-12;
				++$ny;
			}
			$nm = sprintf('%02d',$nm);;
			$ext_ym = "$ny-$nm";
		}
		else {
			//$ys .= '-01';
			$ext_ym = "$ys";
		}
		$now = time();
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();	
		$lesssonRecord=ModelsLessonRecord::with('hasStudentName','hasInsturmentName','hasrate')->where('teacherid',$user->teacherId->remoteTeacherId)->where('sameDayCancel','!=','T')->where('admissionId',$admissonId)->where('lessonDate','like',$ext_ym.'%')->orderBy('lessonDate','desc')->get();
		
		$past_6months_date = Carbon::now()->subMonths(6)->format('Y-m-d');
		$lesssonRecord_count=ModelsLessonRecord::where('teacherid',$user->teacherId->remoteTeacherId)->where('sameDayCancel','!=','T')->where('admissionId',$admissonId)->where("lessonDate",">", $past_6months_date)->orderBy('lessonDate','desc')->count();
		
		$lesssonRecord_approved=ModelsLessonRecord::where('teacherid',$user->teacherId->remoteTeacherId)->where('sameDayCancel','!=','T')->where('admissionId',$admissonId)->where('approveDate','>','0000-00-00')->where("lessonDate",">", $past_6months_date)->orderBy('lessonDate','desc')->count();
		
		$lesssonRecord_student=ModelsLessonRecord::with('hasStudentName','hasInsturmentName','hasrate')->where('teacherid',$user->teacherId->remoteTeacherId)->where('sameDayCancel','!=','T')->where('admissionId',$admissonId)->where('lessonDate','like',$ext_ym.'%')->first();
		
		
		//dd($lesssonRecord_student);
		if($rquest->which==1)
		{
				$lesssonRecord=ModelsLessonRecord::with('hasStudentName','hasInsturmentName','hasrate')->where('teacherid',$user->teacherId->remoteTeacherId)->where('sameDayCancel','!=','T')->where('approveDate','=','0000-00-00')->where('admissionId',$admissonId)->where('lessonDate','like',$ext_ym.'%')->orderBy('lessonDate','desc')->get();
		}
		if($rquest->which==2)
		{
			$lesssonRecord=ModelsLessonRecord::with('hasStudentName','hasInsturmentName','hasrate')->where('teacherid',$user->teacherId->remoteTeacherId)->where('sameDayCancel','!=','T')->where('approveDate','>','0000-00-00')->where('admissionId',$admissonId)->where('lessonDate','like',$ext_ym.'%')->orderBy('lessonDate','desc')->get();
		}
		//echo $lesssonRecord_count;
		//dd($lesssonRecord);
		
		return view('invoice_as_per_admission',compact('lesssonRecord','lesssonRecord_count','lesssonRecord_approved','lesssonRecord_student','user'));
	}
	
	public function getDatabyMonth(Request $rquest)
	{
	$now = time();
	$mon = 0; if (isset($rquest->month)) $mon = intval($rquest->month);
	$yr = date('Y',$now); if (isset($rquest->year)) $yr = intval($rquest->year);	
	if ($mon>0&&$mon<13) {
	$ys .= '-'.sprintf('%02d',$mon).'-01';
	$ext_ym = $ys;
	$nm = $mon+1; $ny = $yr;
	if ($nm>12) {
		$nm = $nm-12;
		++$ny;
	}
	
	$ext_ym .= "$ny-$nm-01";
}
else {
	$ys .= '-01-01';
	$ext_ym = "$ys";
}
	}
	public function deleteLesson(Request $rquest){
		$lesssonRecord=ModelsLessonRecord::where('lessonId',$rquest->lessonId)->where('approveDate','=','0000-00-00')->get();
		if($lesssonRecord->isEmpty()){
			$json = json_encode(['status'=>'false','message'=> 'Lesson not found']);
			return $json;
		}
		$lessonId = $lesssonRecord[0]->lessonId ;
		$admissionId = $lesssonRecord[0]->admissionId ;
		$studentId = $lesssonRecord[0]->studentId ; 
		$admission = ModelsAdmission::where('admissionId',$admissionId)->get();
		if($lesssonRecord->isEmpty()){
			$json = json_encode(['status'=>'false','message'=> 'Error selecting teacher rate.']);
			return $json;
		}
		$makeupTime=$admission[0]->makeupTime;
		$rate=$admission[0]->teacherRate;
		$baseDur=$admission[0]->lessonDuration;
		// bit 0 = package, bit 1 = makeup time
		$lbits = Array();
		$lbits['N'] = 1;	// normal lesson
		$lbits['n'] = 1;	// intro lesson
		$lbits['M'] = 3;	// makeup lesson
		$lbits['1'] = 3;	// lesson + 15 makeup
		$lbits['2'] = 3;	// lesson + 30 makeup
		$lbits['3'] = 3;	// lesson + 45 makeup
		$lbits['4'] = 3;	// lesson + 60 makeup
		$lbits['Y'] = 1;	// student same day cancel
		$lbits['y'] = 3;	// student same day makeup cancel
		$lbits['a'] = 2;	// student advance cancel
		$lbits['A'] = 2;	// teacher cancel
		$lbits['r'] = 0;	// student advance makeup cancel
		$lbits['R'] = 0;	// teacher makeup cancel
		$lbits['V'] = 4;	// musika vacation
		$lbits['O'] = 4;	// other
		$addBack = 0;
		$pkgBack = 0;
		$dur = $lesssonRecord[0]->lessonDuration;
		$mark = $lesssonRecord[0]->sameDayCancel;
		$bits = $lbits[$mark];
		if ($mark=='n') {	// INTRO LESSON ***ALWAYS*** ADDS 1 BACK TO PKG
			$pkgBack = 1;
		}
		else if (is_numeric($mark)) {	// lesson + makeup time
			$pkgBack = sprintf("%.02f",$dur/$baseDur);
			$addBack = $mark*15;
		}
		else if ($bits==2) {	// advance cancel
			$addBack = -$baseDur;
		}
		else {
			if (($bits&1)>0) $pkgBack = sprintf("%.02f",$dur/$baseDur);	// affects package counter
			if (($bits&2)>0) $addBack = $dur;	// affects makeup time
		}
		$student = ModelsStudentName::where('studentId',$studentId)->get();
		$packageStudent=$student[0]->packageStudent;
		$packageRemaining=$student[0]->packageRemaining;
		if($packageStudent=="Y") {
		$s = ModelsStudentName::where('studentId',$studentId)->update(['packageRemaining'=>($packageRemaining+$pkgBack)]);	
		}
		$a = ModelsAdmission::where('admissionId',$admissionId)->update(['makeupTime'=>($makeupTime+$addBack)]);	
		ModelsLessonRecord::where('lessonId',$rquest->lessonId)->delete();
		$json = json_encode(['status'=>'true']);
		return $json;
	}
}