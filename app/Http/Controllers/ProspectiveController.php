<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Teacher;
use App\Zipcode;
use App\ZIPCodes;
use App\MakeRequest;
use App\TeacherName;
use App\User;
use App\Admission;
use App\StudentName;
use App\Connection;
use App\Instrument;
use App\TeachersPolygon;
use App\LessonRecord;
use App\StudentLatLong;
use App\TeachersToStudio;
use App\Studio;
use App\ZipBoundaries;
use App\ProspectiveStudent;
use App\ProspectiveStatus;
use Illuminate\Support\Facades\Auth;
use App\MessageUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\PsTeachersFirstLogin;
use App\CitiesFilterSmall;
use App\Newrate;
use App\Counter;
use App\Email;
use Illuminate\Support\Facades\Redirect;
use App\Mail\RegistrationFollowUps;
use App\Models\CitiesFilterSmall as ModelsCitiesFilterSmall;
use App\Models\Connection as ModelsConnection;
use App\Models\Instrument as ModelsInstrument;
use App\Models\MakeRequest as ModelsMakeRequest;
use App\Models\MessageUser as ModelsMessageUser;
use App\Models\Newrate as ModelsNewrate;
use App\Models\ProspectiveStatus as ModelsProspectiveStatus;
use App\Models\ProspectiveStudent as ModelsProspectiveStudent;
use App\Models\PsTeachersFirstLogin as ModelsPsTeachersFirstLogin;
use App\Models\StudentLatLong as ModelsStudentLatLong;
use App\Models\Studio as ModelsStudio;
use App\Models\Teacher as ModelsTeacher;
use App\Models\TeacherName as ModelsTeacherName;
use App\Models\TeachersPolygon as ModelsTeachersPolygon;
use App\Models\TeachersToStudio as ModelsTeachersToStudio;
use App\Models\User as ModelsUser;
use App\models\Zipcode as ModelsZipcode;
use App\models\ZIPCodes as ModelsZIPCodes;
use Illuminate\Support\Str;	



class ProspectiveController extends Controller
{
	public function __construct(){

		$this->last_error="";
		$this->last_time=0;  
		$this->units="m";
		$this->decimals = 2;
	}
	
    public function getProspective() 
	{
		
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();	
		$instrument=ModelsInstrument::where('is_active','Y')->get();	
		$profile_completenss = $user->teacherId->profile_completenss;
		$teacherId = $user->teacherId->id;
		
		//dd($user);
		
		if($user->teacherId->teachesHome=='yes'){
			$lessonLoc[] = 0;
		}
		if($user->teacherId->teachesStudio=='yes'){
			$lessonLoc[] = 1;
		}
		if($user->teacherId->teachesOnline=='yes'){
			$lessonLoc[] = 2;
		}
		
		
		
		$subscriptions = DB::connection('mysqlsystem')->table('teacher_subscriptions')->select('instruments_id')->where('teachers_Id', $user->teacherId->remoteTeacherId)->get();
		$ins =array();
		foreach($subscriptions as $s){ $ins[]=$s->instruments_id;}
		//zip_boundaries teachesHome teachesStudio teachesOnline
		
		 
		$input_data = [];
		 $input_data['lstInstr'] = [10];
		$input_data['s_location'] = $lessonLoc;
		$input_data['s_location_miles'] = 20;
		$input_data['s_zip'] = $user->teacherId->postalCode;
		$input_data['s_location_zipt'] = $user->teacherId->postalCode; 
		
		
		/* echo "<pre>"; 
		print_r($ins);
		die; */
		//$metros = $this->getProspectiveStudents($input_data);
		
		/* foreach($metros['CSTUDENTS'] as $val){
			$student_zip = $val[0]['zipCode'];
			
			$zipboundaries = ZipBoundaries::where('zip',$student_zip)->first();
		
			if(count($zipboundaries)>0){
				$overlap_boundary = $this->checkOverlapTravelBoundary($zipboundaries->boundary_points,$teacherId);
				
				if($overlap_boundary){
					echo "overlaped_".$val[0]['zipCode'].' '.$val[0]['idNum'].' <> ';
				}
			}
			
		}
		die; */
		//$student_zip = 10001; zip_boundaries
		/* echo "<pre>";
		print_r($metros);
		die; */
		return view('prospectives',compact('instrument','profile_completenss','ins','input_data'));
	}
	
	public function checkOverlapTravelBoundary($boundary_points,$teacherId){
		$teachersPolygons = ModelsTeachersPolygon::where('teacherId',$teacherId)->get()->toArray();
		//dd($teachersPolygons);
		//echo "<pre>";
		//print_r($boundary_points);  //die;
		foreach($teachersPolygons as $data){
			$polygon = $data['polygon']; // $teachersPolygons[6]['polygon'];//
			$polygon = str_replace(" ","", $polygon);
			$polygon = explode(")(", $polygon);
			foreach($polygon as $k => $v){
					$temp = str_replace("(","", $v);
					$polygon[$k] = str_replace(")","", $temp);
			}
			foreach($polygon as $k => $v){
					$polygon[$k] = explode(",", $v);
			}
			$points = explode("|", $boundary_points);
			//print_r($points);
			//echo count($points).' ';
			foreach($points as $point){ 
				$p = explode(',', $point); 
				//print_r($p);
				//print_r($polygon);
				
				if($this->pointInPolygon($p, $polygon)){ 
					return true;	
				} 
			}
			
		}
		//dd($teachersPolygons);
		die;
	}
	
	public function pointInPolygon($point, $polygon){//http://alienryderflex.com/polygon/
     $return = false;
     foreach($polygon as $k=>$p){
        if(!$k) $k_prev = count($polygon)-1;
        else $k_prev = $k-1;

        if(($p[1]< $point[1] && $polygon[$k_prev][1]>=$point[1] || $polygon[$k_prev][1]< $point[1] && $p[1]>=$point[1]) && ($p[0]<=$point[0] || $polygon[$k_prev][0]<=$point[0])){
           if($p[0]+($point[1]-$p[1])/($polygon[$k_prev][1]-$p[1])*($polygon[$k_prev][0]-$p[0])<$point[0]){
              $return = !$return;
           }
        }
     }
     return $return;
  }
	
	
	public function musika_alert(){
		return view('errors.musika_alert');
	}
	public function musika_error(){
		return view('errors.musika_error');
	}
	
	
	
	public function zipValidate(Request $request)
	{
		//echo "hello";
		$validate_zip=$request->validate_zip;
		
		$zipcode=ModelsZipcode::where('zipcode',$validate_zip)->get();
		//echo count($zipcode);
		if(count($zipcode)>0)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}	
		//die;
		
	}
	
	public function searchProspective(Request $request) 
	{
	
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$profile_completenss = $user->teacherId->profile_completenss;
		//echo "hello";
		

		$input_data = array();
		
		$instr = $request->input('lstInstr');
		$location = $request->input('s_location');
		$sMiles=$request->s_location_miles;
		$sZip=$request->s_zip;
		$s_location_zipt=$request->s_location_zipt;
		
		 $this->validate($request, [
				's_zip' =>'exists:mysqlsystem.zipcodes,zipcode',
				's_location_zipt' =>'exists:mysqlsystem.zipcodes,zipcode'
			]);
		 
		
		$input_data['lstInstr'] = $request->input('lstInstr');
		$input_data['s_location'] = $request->input('s_location');
		$input_data['s_location_miles'] = $request->s_location_miles;
		$input_data['s_zip'] = $request->s_zip;
		$input_data['s_location_zipt'] = $request->s_location_zipt;
		//echo "<pre>";
		//print_r($location); 
		//print_r($input_data); die;
		$prospectiveStd = [];
		$metros = [];
		switch (((in_array(0,$location)) && (in_array(1,$location)))?2:$location[0]) 
		{
			case 0:
				
				//echo "0"; //die;
				if((isset($sZip)) && (isset($sMiles)))
				{
					
					$zipArr = array_keys($this->get_zips_in_range($sZip,$sMiles));
					array_push($zipArr,$sZip);
					
					if((in_array(2,$location))){
						
						$prospectiveStd=ModelsProspectiveStudent::where('lessonLoc','LIKE',"%home%")->whereIn('zipCode', $zipArr)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'))->whereIn('instr', $instr)->orWhere(function($query){
 
						 $query->where('is_home','N')->where('is_studio','N')->where('lessonLoc','')->where('is_connected',0)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'));
						 
						 })->orWhere(function($query1) use($instr){
							$query1->where('lessonLoc','LIKE',"%online%")->whereIn('instr', $instr)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'));	
						 })->get()->toArray();
						 
						 //dd($prospectiveStd);
						 //(is_home='N' && is_studio='N' && lessonLoc='' && S.instr IN (1,3,4) && S.is_connected=0 && S.dateEntered>=DATE_SUB(CURDATE(),INTERVAL 375 DAY))
						/* */	
							
					}
					else
					{
						$prospectiveStd=ModelsProspectiveStudent::where('lessonLoc','LIKE',"%home%")->whereIn('zipCode', $zipArr)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'))->whereIn('instr', $instr)->get()->toArray();
						//dd($prospectiveStd);
					}
						
					//echo "<pre>";
					//print_r($prospectiveStd);
					//dd($prospectiveStd); 
				}
			break;
			
			case 1:
				//echo "1"; //die;
				if(((isset($s_location_zipt)) && (!empty($s_location_zipt))))
				{
					$tStudioZip = array_keys($this->get_zips_in_range($s_location_zipt,$sMiles));
					array_push($tStudioZip,$s_location_zipt);
					if((in_array(2,$location))){
						
						$prospectiveStd=ModelsProspectiveStudent::where('lessonLoc','LIKE',"%studio%")->whereIn('studio_zip', $tStudioZip)->where('is_connected',0)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'))->whereIn('instr', $instr)->orWhere(function($query) use($instr){
 
						 $query->where('is_home','N')->where('is_studio','N')->where('lessonLoc','')->where('is_connected',0)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'))->whereIn('instr', $instr);
						 
						 })->orWhere(function($query1) use($instr,$tStudioZip){
							$query1->where('lessonLoc','LIKE',"%online%")->whereIn('studio_zip', $tStudioZip)->where('is_connected',0)->whereIn('instr', $instr)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'));	
						 })->get()->toArray();
						 /**/
						 //dd($prospectiveStd);
					}
					else
					{
						$prospectiveStd=ModelsProspectiveStudent::where('lessonLoc','LIKE',"%studio%")->whereIn('studio_zip', $tStudioZip)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'))->where('is_connected',0)->whereIn('instr', $instr)->get()->toArray();
						//dd($prospectiveStd);
					}
				}
			
			break;
			case 2:
			//echo "2"; //die;
				if(((in_array(0,$location)) || (in_array(1,$location)))){
					
					if((isset($sZip)) && (isset($sMiles)))
					{
						$zipArr = array_keys($this->get_zips_in_range($sZip,$sMiles));
						array_push($zipArr,$sZip);
					}
					
					
					
					if(((isset($s_location_zipt)) && (!empty($s_location_zipt)) && (count($zipArr)>0)))
					{
						$tStudioZip = array_keys($this->get_zips_in_range($s_location_zipt,$sMiles));
						array_push($tStudioZip,$s_location_zipt);
						//print_r($tStudioZip); die;
						if((in_array(2,$location))){
							
							$prospectiveStd=ModelsProspectiveStudent::where('lessonLoc','LIKE',"%studio%")->whereIn('studio_zip', $tStudioZip)->where('is_connected',0)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'))->whereIn('instr', $instr)->orWhere(function($query) use($zipArr,$instr){
 
							$query->where('lessonLoc','LIKE',"%home%")->whereIn('zipCode', $zipArr)->where('is_connected',0)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'))->whereIn('instr', $instr);
						 
							})->orWhere(function($query1) use($instr){
								
							$query1->where('is_home','N')->where('is_studio','N')->where('lessonLoc','')->whereIn('instr', $instr)->where('is_connected',0)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'));	
								
							})->orWhere(function($query2) use($instr){
								
							$query2->where('lessonLoc','LIKE',"%online%")->whereIn('instr', $instr)->where('is_connected',0)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'));	
								
							})->get()->toArray();
							//dd($prospectiveStd);
						}
						else
						{
							$prospectiveStd=ModelsProspectiveStudent::where('lessonLoc','LIKE',"%studio%")->whereIn('studio_zip', $tStudioZip)->where('is_connected',0)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'))->whereIn('instr', $instr)->orWhere(function($query) use($zipArr,$instr){
 
							$query->where('lessonLoc','LIKE',"%home%")->whereIn('zipCode', $zipArr)->where('is_connected',0)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'))->whereIn('instr', $instr);
						 
							})->get()->toArray();
							//dd($prospectiveStd);
							
						}
						
					}
				
				}else if(in_array(2,$location)){
					$prospectiveStd=ModelsProspectiveStudent::where('lessonLoc','LIKE',"%online%")->where('is_connected',0)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'))->whereIn('instr', $instr)->orWhere(function($query) use($instr){ 
					
						$query->where('is_home','N')->where('is_studio','N')->where('lessonLoc','')->whereIn('instr', $instr)->where('is_connected',0)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'));	
								
					})->get()->toArray();
					
					//dd($prospectiveStd);
						
				} 
			break;
		}
		//die;
		//echo "<pre>";
		$request = [];
		$idNum_count = [];
		if(count($prospectiveStd)>0)
		  {
			$gcount = array();
			//$request = array();
			//$idNum_count = array();
			foreach($prospectiveStd as $proStd)
			{
				$idnum = explode('-',$proStd['idNum']);
				$proStd['idNum'] =  $idnum[0];
				array_push($request,$proStd);
				//echo $proStd['idNum'];
				
				if(array_key_exists($proStd['idNum'],$idNum_count))
				{
					$idNum_count[$idnum[0]] += 1;
				}
				else
				{
					$idNum_count[$idnum[0]] = 1;
				}
			}
		}		
		$combines = Array();
		//echo "<pre>";
		//print_r($idNum_count);
		//print_r($request);
		$val = 0;
		$tinst = '';
		$tidNum = '';	
		if (sizeof($request)) {
			$c = -1; $rCnt=-1; while (++$c<count($request)) {
				
				//echo $request[$c]['idNum'].' ';
				
				if (array_key_exists($request[$c]['idNum'], $idNum_count)) {
					$resCnt['idnumber'] = $request[$c]['idNum'];
					$resCnt['group_count'] = $idNum_count[$request[$c]['idNum']];
				}
				
				$request[$c]['group_count']=($resCnt['group_count']>1)?$resCnt['group_count']:0;
				
				$currTinstr=empty($currTinstr)?$request[$c]['instr']:$tinst;

				$currTidNum=empty($currTinstr)?$request[$c]['idNum']:$tidNum;
				
				if($currTinstr==$request[$c]['instr'] && $currTidNum==$request[$c]['idNum'])
				{
					continue;
				}
				else
				{
					//groupBy(DB::raw("SUBSTRING_INDEX(cars.name, '/', 1)")
					//where(DB::raw("substr('name', 1, strpos('name', '_'))"), '=', 'kelvin');
					if ($request[$c]['group_count']>1)
					{
						$stdId = $request[$c]['studentId'];
						//$prospective_students= DB::select( DB::raw($qry) );
						$prospective_students= ModelsProspectiveStudent::selectRaw("prospective_students.id,prospective_students.studentId,prospective_students.idNum,prospective_students.city,prospective_students.stateId,prospective_students.studio_distance as s_distance,prospective_students.studio_zip,prospective_students.lessonLen,prospective_students.lessonStartMon,prospective_students.lessonStartTue,prospective_students.lessonStartWed,prospective_students.lessonStartThu,prospective_students.lessonStartFri,prospective_students.lessonStartSat,prospective_students.lessonStartSun,prospective_students.iLevel as s_level,prospective_students.age,prospective_students.lessonLoc,prospective_students.lessonLoc_choice1,prospective_students.lessonLoc_choice2,prospective_students.lessonLoc_choice3,prospective_students.zipCode,prospective_students.addressL1,UNIX_TIMESTAMP(prospective_students.dateEntered) AS entered_on,if(LOWER(prospective_students.lessonLoc) LIKE '%studio%',REPLACE(SUBSTRING_INDEX(SUBSTRING_INDEX(prospective_students.lessonLoc, ':', 2), ':', -1),' miles',''),0) AS studio_distance,if(lower(prospective_students.lessonLoc) LIKE '%home%',1,0) is_home, if(lower(prospective_students.lessonLoc) LIKE '%studio%',1,0) is_studio, if(lower(prospective_students.lessonLoc) LIKE '%Online%',1,0) is_online, if((lower(prospective_students.lessonLoc) LIKE '%home%' && lower(prospective_students.lessonLoc) LIKE '%studio%') ,1,0) is_both, if(prospective_students.iLevel = '0', 'Novice',IF((prospective_students.iLevel = '1'), 'Advanced Beginner',IF((prospective_students.iLevel = '2'),'Intermediate',IF((prospective_students.iLevel = '3'), 'Advanced Intermediate',IF(prospective_students.iLevel = '4', 'Advanced', prospective_students.iLevel))))) as iLevel, instruments.instrumentName AS instrument_name, prospective_students.lessonLoc_choice1, prospective_students.lessonLoc_choice2, prospective_students.lessonLoc_choice3,studentNotes")
						->rightJoin('instruments','instruments.instrumentId','=','prospective_students.instr')->where('prospective_students.is_connected','0')->where(DB::raw("SUBSTRING_INDEX(prospective_students.idNum, '-', 1)"), '=', $request[$c]['idNum'])->where('prospective_students.instr',$request[$c]['instr'])->orderBy('prospective_students.studentId','asc')->get()->toArray();
					}
					else
					{
						$stdId = $request[$c]['studentId'];
						//$prospective_students= DB::select( DB::raw($qry) );
						$prospective_students= ModelsProspectiveStudent::selectRaw("prospective_students.id,prospective_students.studentId,prospective_students.idNum,prospective_students.city,prospective_students.stateId,prospective_students.studio_distance as s_distance,prospective_students.studio_zip,prospective_students.lessonLen,prospective_students.lessonStartMon,prospective_students.lessonStartTue,prospective_students.lessonStartWed,prospective_students.lessonStartThu,prospective_students.lessonStartFri,prospective_students.lessonStartSat,prospective_students.lessonStartSun,prospective_students.iLevel as s_level,prospective_students.age,prospective_students.lessonLoc,prospective_students.lessonLoc_choice1,prospective_students.lessonLoc_choice2,prospective_students.lessonLoc_choice3,prospective_students.zipCode,prospective_students.addressL1,UNIX_TIMESTAMP(prospective_students.dateEntered) AS entered_on,if(LOWER(prospective_students.lessonLoc) LIKE '%studio%',REPLACE(SUBSTRING_INDEX(SUBSTRING_INDEX(prospective_students.lessonLoc, ':', 2), ':', -1),' miles',''),0) AS studio_distance,if(lower(prospective_students.lessonLoc) LIKE '%home%',1,0) is_home,if(lower(prospective_students.lessonLoc) LIKE '%studio%',1,0) is_studio, if(lower(prospective_students.lessonLoc) LIKE '%Online%',1,0) is_online, if((lower(prospective_students.lessonLoc) LIKE '%home%' && lower(prospective_students.lessonLoc) LIKE '%studio%') ,1,0) is_both, if(prospective_students.iLevel = '0', 'Novice',IF((prospective_students.iLevel = '1'), 'Advanced Beginner',IF((prospective_students.iLevel = '2'),'Intermediate',IF((prospective_students.iLevel = '3'), 'Advanced Intermediate',IF(prospective_students.iLevel = '4', 'Advanced', prospective_students.iLevel))))) as iLevel, instruments.instrumentName AS instrument_name, prospective_students.lessonLoc_choice1, prospective_students.lessonLoc_choice2, prospective_students.lessonLoc_choice3,studentNotes ")
						->rightJoin('instruments','instruments.instrumentId','=','prospective_students.instr')->where('prospective_students.is_connected','0')->where('prospective_students.studentId',$request[$c]['studentId'])->orderBy('prospective_students.studentId','asc')->get()->toArray();
					}
				}
				//WHERE S.is_connected=0  && S.studentId=259876 ORDER BY S.studentId ASC
				
				//$prospective_students=ProspectiveStudent::with('instName')->where('is_connected','0')->where('studentId',$request[$c]['studentId'])->orderBy('studentId','ASC')->get()->toArray();
				
				foreach($prospective_students as $k=>$v) $prospective_students[$k]['tmp_address'] = $this->make_tmp_address($prospective_students[$k]['addressL1']);
				
				$tinst=$request[$c]['instr'];

				$tidNum=$request[$c]['idNum'];
				
				if (count($prospective_students)>0) {$rCnt++;
					$s_id = $prospective_students[0]['studentId'];
					$lessonLoc = $prospective_students[0]['lessonLoc'];
					$zipcde = $prospective_students[0]['zipCode'];
					$msg = $this->getDistanceMessageForLessonLoc($s_id,$lessonLoc,$zipcde);
					$prospective_students[0]['home_text'] = $msg['home_txt'];
					$prospective_students[0]['studio_txt'] = $msg['studio_txt'];	
					$metros['CSTUDENTS'][$rCnt] = $prospective_students;

				}
				
				//echo $request[$c]['studentId'].',';
				//die;
				
			}
		}
		
		//echo "<pre>";
		//print_r($metros); 
		//die;
		return view('prospectives',compact('metros','input_data','profile_completenss'));
		//die;
		//return view('prospectives');
	}
	
	public function getProspectiveStudents($input_data) 
	{
	
		//echo "<pre>";
		//print_r($input_data); //die;
	
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$profile_completenss = $user->teacherId->profile_completenss;
		//echo "hello";
		

		//$input_data = array();
		
		$instr = $input_data['lstInstr'];
		$location = $input_data['s_location'];
		$sMiles = $input_data['s_location_miles'];
		$sZip = $input_data['s_zip'];
		$s_location_zipt = $input_data['s_location_zipt'];
		
		
		/* $input_data['lstInstr'] = $request->input('lstInstr');
		$input_data['s_location'] = $request->input('s_location');
		$input_data['s_location_miles'] = $request->s_location_miles;
		$input_data['s_zip'] = $request->s_zip;
		$input_data['s_location_zipt'] = $request->s_location_zipt; */
		
		$prospectiveStd = [];
		$metros = [];
		switch (((in_array(0,$location)) && (in_array(1,$location)))?2:$location[0]) 
		{
			case 0:
				
				//echo "0"; //die;
				if((isset($sZip)) && (isset($sMiles)))
				{
					
					$zipArr = array_keys($this->get_zips_in_range($sZip,$sMiles));
					array_push($zipArr,$sZip);
					
					if((in_array(2,$location))){
						
						$prospectiveStd=ModelsProspectiveStudent::where('lessonLoc','LIKE',"%home%")->whereIn('zipCode', $zipArr)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'))->whereIn('instr', $instr)->orWhere(function($query){
 
						 $query->where('is_home','N')->where('is_studio','N')->where('lessonLoc','')->where('is_connected',0)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'));
						 
						 })->orWhere(function($query1) use($instr){
							$query1->where('lessonLoc','LIKE',"%online%")->whereIn('instr', $instr)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'));	
						 })->get()->toArray();
						 
						 //dd($prospectiveStd);
						 //(is_home='N' && is_studio='N' && lessonLoc='' && S.instr IN (1,3,4) && S.is_connected=0 && S.dateEntered>=DATE_SUB(CURDATE(),INTERVAL 375 DAY))
						/* */	
							
					}
					else
					{
						$prospectiveStd=ModelsProspectiveStudent::where('lessonLoc','LIKE',"%home%")->whereIn('zipCode', $zipArr)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'))->whereIn('instr', $instr)->get()->toArray();
						//dd($prospectiveStd);
					}
						
					//echo "<pre>";
					//print_r($prospectiveStd);
					//dd($prospectiveStd); 
				}
			break;
			
			case 1:
				//echo "1"; //die;
				if(((isset($s_location_zipt)) && (!empty($s_location_zipt))))
				{
					$tStudioZip = array_keys($this->get_zips_in_range($s_location_zipt,$sMiles));
					array_push($tStudioZip,$s_location_zipt);
					if((in_array(2,$location))){
						
						$prospectiveStd=ModelsProspectiveStudent::where('lessonLoc','LIKE',"%studio%")->whereIn('studio_zip', $tStudioZip)->where('is_connected',0)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'))->whereIn('instr', $instr)->orWhere(function($query) use($instr){
 
						 $query->where('is_home','N')->where('is_studio','N')->where('lessonLoc','')->where('is_connected',0)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'))->whereIn('instr', $instr);
						 
						 })->orWhere(function($query1) use($instr,$tStudioZip){
							$query1->where('lessonLoc','LIKE',"%online%")->whereIn('studio_zip', $tStudioZip)->where('is_connected',0)->whereIn('instr', $instr)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'));	
						 })->get()->toArray();
						 /**/
						 //dd($prospectiveStd);
					}
					else
					{
						$prospectiveStd=ModelsProspectiveStudent::where('lessonLoc','LIKE',"%studio%")->whereIn('studio_zip', $tStudioZip)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'))->where('is_connected',0)->whereIn('instr', $instr)->get()->toArray();
						//dd($prospectiveStd);
					}
				}
			
			break;
			case 2:
			//echo "2"; //die;
				if(((in_array(0,$location)) || (in_array(1,$location)))){
					
					if((isset($sZip)) && (isset($sMiles)))
					{
						$zipArr = array_keys($this->get_zips_in_range($sZip,$sMiles));
						array_push($zipArr,$sZip);
					}
					
					
					
					if(((isset($s_location_zipt)) && (!empty($s_location_zipt)) && (count($zipArr)>0)))
					{
						$tStudioZip = array_keys($this->get_zips_in_range($s_location_zipt,$sMiles));
						array_push($tStudioZip,$s_location_zipt);
						//print_r($tStudioZip); die;
						if((in_array(2,$location))){
							
							$prospectiveStd=ModelsProspectiveStudent::where('lessonLoc','LIKE',"%studio%")->whereIn('studio_zip', $tStudioZip)->where('is_connected',0)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'))->whereIn('instr', $instr)->orWhere(function($query) use($zipArr,$instr){
 
							$query->where('lessonLoc','LIKE',"%home%")->whereIn('zipCode', $zipArr)->where('is_connected',0)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'))->whereIn('instr', $instr);
						 
							})->orWhere(function($query1) use($instr){
								
							$query1->where('is_home','N')->where('is_studio','N')->where('lessonLoc','')->whereIn('instr', $instr)->where('is_connected',0)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'));	
								
							})->orWhere(function($query2) use($instr){
								
							$query2->where('lessonLoc','LIKE',"%online%")->whereIn('instr', $instr)->where('is_connected',0)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'));	
								
							})->get()->toArray();
							//dd($prospectiveStd);
						}
						else
						{
							$prospectiveStd=ModelsProspectiveStudent::where('lessonLoc','LIKE',"%studio%")->whereIn('studio_zip', $tStudioZip)->where('is_connected',0)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'))->whereIn('instr', $instr)->orWhere(function($query) use($zipArr,$instr){
 
							$query->where('lessonLoc','LIKE',"%home%")->whereIn('zipCode', $zipArr)->where('is_connected',0)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'))->whereIn('instr', $instr);
						 
							})->get()->toArray();
							//dd($prospectiveStd);
							
						}
						
					}
				
				}else if(in_array(2,$location)){
					$prospectiveStd=ModelsProspectiveStudent::where('lessonLoc','LIKE',"%online%")->where('is_connected',0)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'))->whereIn('instr', $instr)->orWhere(function($query) use($instr){ 
					
						$query->where('is_home','N')->where('is_studio','N')->where('lessonLoc','')->whereIn('instr', $instr)->where('is_connected',0)->where('dateEntered', '>=',DB::raw('DATE_SUB(CURDATE(), INTERVAL 180 DAY)'));	
								
					})->get()->toArray();
					
					
						
				} 
			break;
		}
		//dd($prospectiveStd);
		//die;
		$request = [];
		$idNum_count = [];
		if(count($prospectiveStd)>0)
		  {
			$gcount = array();
			//$request = array();
			//$idNum_count = array();
			foreach($prospectiveStd as $proStd)
			{
				$idnum = explode('-',$proStd['idNum']);
				$proStd['idNum'] =  $idnum[0];
				array_push($request,$proStd);
				//echo $proStd['idNum'];
				
				if(array_key_exists($proStd['idNum'],$idNum_count))
				{
					$idNum_count[$idnum[0]] += 1;
				}
				else
				{
					$idNum_count[$idnum[0]] = 1;
				}
			}
		}		
		$combines = Array();
		//echo "<pre>";
		//print_r($idNum_count);
		//print_r($request);
		$val = 0;
		$tinst = '';
		$tidNum = '';	
		if (sizeof($request)) {
			$c = -1; $rCnt=-1; while (++$c<count($request)) {
				
				//echo $request[$c]['idNum'].' ';
				
				if (array_key_exists($request[$c]['idNum'], $idNum_count)) {
					$resCnt['idnumber'] = $request[$c]['idNum'];
					$resCnt['group_count'] = $idNum_count[$request[$c]['idNum']];
				}
				
				$request[$c]['group_count']=($resCnt['group_count']>1)?$resCnt['group_count']:0;
				
				$currTinstr=empty($currTinstr)?$request[$c]['instr']:$tinst;

				$currTidNum=empty($currTinstr)?$request[$c]['idNum']:$tidNum;
				
				if($currTinstr==$request[$c]['instr'] && $currTidNum==$request[$c]['idNum'])
				{
					continue;
				}
				else
				{
					//groupBy(DB::raw("SUBSTRING_INDEX(cars.name, '/', 1)")
					//where(DB::raw("substr('name', 1, strpos('name', '_'))"), '=', 'kelvin');
					if ($request[$c]['group_count']>1)
					{
						$stdId = $request[$c]['studentId'];
						//$prospective_students= DB::select( DB::raw($qry) );
						$prospective_students= ModelsProspectiveStudent::selectRaw("prospective_students.id,prospective_students.studentId,prospective_students.idNum,prospective_students.city,prospective_students.stateId,prospective_students.studio_distance as s_distance,prospective_students.studio_zip,prospective_students.lessonLen,prospective_students.lessonStartMon,prospective_students.lessonStartTue,prospective_students.lessonStartWed,prospective_students.lessonStartThu,prospective_students.lessonStartFri,prospective_students.lessonStartSat,prospective_students.lessonStartSun,prospective_students.iLevel as s_level,prospective_students.age,prospective_students.lessonLoc,prospective_students.zipCode,prospective_students.addressL1,UNIX_TIMESTAMP(prospective_students.dateEntered) AS entered_on,if(LOWER(prospective_students.lessonLoc) LIKE '%studio%',REPLACE(SUBSTRING_INDEX(SUBSTRING_INDEX(prospective_students.lessonLoc, ':', 2), ':', -1),' miles',''),0) AS studio_distance,if(lower(prospective_students.lessonLoc) LIKE '%home%',1,0) is_home, if(lower(prospective_students.lessonLoc) LIKE '%studio%',1,0) is_studio, if(lower(prospective_students.lessonLoc) LIKE '%Online%',1,0) is_online, if((lower(prospective_students.lessonLoc) LIKE '%home%' && lower(prospective_students.lessonLoc) LIKE '%studio%') ,1,0) is_both, if(prospective_students.iLevel = '0', 'Novice',IF((prospective_students.iLevel = '1'), 'Advanced Beginner',IF((prospective_students.iLevel = '2'),'Intermediate',IF((prospective_students.iLevel = '3'), 'Advanced Intermediate',IF(prospective_students.iLevel = '4', 'Advanced', prospective_students.iLevel))))) as iLevel, instruments.instrumentName AS instrument_name, prospective_students.lessonLoc_choice1, prospective_students.lessonLoc_choice2, prospective_students.lessonLoc_choice3,studentNotes")
						->rightJoin('instruments','instruments.instrumentId','=','prospective_students.instr')->where('prospective_students.is_connected','0')->where(DB::raw("SUBSTRING_INDEX(prospective_students.idNum, '-', 1)"), '=', $request[$c]['idNum'])->where('prospective_students.instr',$request[$c]['instr'])->orderBy('prospective_students.studentId','asc')->get()->toArray();
					}
					else
					{
						$stdId = $request[$c]['studentId'];
						//$prospective_students= DB::select( DB::raw($qry) );
						$prospective_students= ModelsProspectiveStudent::selectRaw("prospective_students.id,prospective_students.studentId,prospective_students.idNum,prospective_students.city,prospective_students.stateId,prospective_students.studio_distance as s_distance,prospective_students.studio_zip,prospective_students.lessonLen,prospective_students.lessonStartMon,prospective_students.lessonStartTue,prospective_students.lessonStartWed,prospective_students.lessonStartThu,prospective_students.lessonStartFri,prospective_students.lessonStartSat,prospective_students.lessonStartSun,prospective_students.iLevel as s_level,prospective_students.age,prospective_students.lessonLoc,prospective_students.zipCode,prospective_students.addressL1,UNIX_TIMESTAMP(prospective_students.dateEntered) AS entered_on,if(LOWER(prospective_students.lessonLoc) LIKE '%studio%',REPLACE(SUBSTRING_INDEX(SUBSTRING_INDEX(prospective_students.lessonLoc, ':', 2), ':', -1),' miles',''),0) AS studio_distance,if(lower(prospective_students.lessonLoc) LIKE '%home%',1,0) is_home,if(lower(prospective_students.lessonLoc) LIKE '%studio%',1,0) is_studio, if(lower(prospective_students.lessonLoc) LIKE '%Online%',1,0) is_online, if((lower(prospective_students.lessonLoc) LIKE '%home%' && lower(prospective_students.lessonLoc) LIKE '%studio%') ,1,0) is_both, if(prospective_students.iLevel = '0', 'Novice',IF((prospective_students.iLevel = '1'), 'Advanced Beginner',IF((prospective_students.iLevel = '2'),'Intermediate',IF((prospective_students.iLevel = '3'), 'Advanced Intermediate',IF(prospective_students.iLevel = '4', 'Advanced', prospective_students.iLevel))))) as iLevel, instruments.instrumentName AS instrument_name, prospective_students.lessonLoc_choice1, prospective_students.lessonLoc_choice2, prospective_students.lessonLoc_choice3,studentNotes")
						->rightJoin('instruments','instruments.instrumentId','=','prospective_students.instr')->where('prospective_students.is_connected','0')->where('prospective_students.studentId',$request[$c]['studentId'])->orderBy('prospective_students.studentId','asc')->get()->toArray();
					}
				}
				//WHERE S.is_connected=0  && S.studentId=259876 ORDER BY S.studentId ASC
				
				//$prospective_students=ProspectiveStudent::with('instName')->where('is_connected','0')->where('studentId',$request[$c]['studentId'])->orderBy('studentId','ASC')->get()->toArray();
				
				foreach($prospective_students as $k=>$v) $prospective_students[$k]['tmp_address'] = $this->make_tmp_address($prospective_students[$k]['addressL1']);
				
				$tinst=$request[$c]['instr'];

				$tidNum=$request[$c]['idNum'];
				//print_r($prospective_students);
				if (count($prospective_students)>0) {$rCnt++;
					
					$s_id = $prospective_students[0]['studentId'];
					$lessonLoc = $prospective_students[0]['lessonLoc'];
					$zipcde = $prospective_students[0]['zipCode'];
					$msg = $this->getDistanceMessageForLessonLoc($s_id,$lessonLoc,$zipcde);
					$prospective_students[0]['home_text'] = $msg['home_txt'];
					$prospective_students[0]['studio_txt'] = $msg['studio_txt'];
					$metros['CSTUDENTS'][$rCnt] = $prospective_students;
					//print_r($prospective_students);
					
					
				}
				
				//echo $request[$c]['studentId'].',';
				
				
			}//die;lessonLoc
		}
		
		//echo "<pre>";
		//print_r($metros);
		//die;
		return $metros;
		
		//return view('prospectives',compact('metros','input_data','profile_completenss'));
		
	}
	
	public function getDistanceMessageForLessonLoc($s_id,$lessonLoc,$zipcde){
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacher_zcode = $user->teacherId->postalCode;
		//$s_id = $request->s_id;
		//$p_student = ProspectiveStudent::where('studentId', $s_id)->first(); 
		if($lessonLoc!=''){
			if(preg_match("/Home/i", $lessonLoc)){
				$lessons['is_home'] = true;
				$lessons['zipCode'] = str_pad($zipcde, 5, '0', STR_PAD_LEFT);
			}else {
				$lessons['is_home'] = false;
			}
			if(preg_match("/Studio/i", $lessonLoc)){
				$lessons['is_studio'] = true;
				$tmp = explode(':',$lessonLoc);
				$travel_zip = explode('|',$tmp[(sizeof($tmp)-1)]);
				$lessons['travel_zip'] = $travel_zip[0];
				$tmp2 = explode(' ',$tmp[sizeof($tmp)-2]);
				$lessons['travel_radius'] = $tmp2[0];
			}else {
				$lessons['is_studio'] = false;
			}
			
			
			if(isset($lessons['is_home']) && $lessons['is_home']!=''){
				//echo "test";
				//$radiusRes = $this->radius_search($lessons['zipCode']);
				//$lessons['home_radius'] = $radiusRes;
				
				$distace_res = $this->getDistaneByLatLong($s_id,'Home',str_pad($zipcde, 5, '0', STR_PAD_LEFT));
				//$lessons['home_distance'] = $distace_res;
				
				if($teacher_zcode==$zipcde){
					$home_txt = "Student is in same zip code as yours.";
				}else{
					$home_txt = "This student is approx. $distace_res miles from your home in $zipcde.";
				}
				
			}else{
				//$lessons['home_radius'] = [];
				$home_txt = '';
			}
			
			if(isset($lessons['is_studio']) && $lessons['is_studio']!=''){
			
				$CntTeachersStudio=ModelsTeachersToStudio::with('studio')->where('teacherId',$user->teacherId->id)->count();
				$lessons['cnt_studios'] = $CntTeachersStudio;
				
				$distace_res = $this->getDistaneByLatLong($s_id,'Studio',str_pad($zipcde, 5, '0', STR_PAD_LEFT));
				$lessons['studio_distance'] = $distace_res;
				
				
				$cnt_studios = $lessons['cnt_studios'];
				$dist = $lessons['studio_distance'];
				$travel_radius = $lessons['travel_radius'];
				$student_zipcode = $lessons['travel_zip'];
				
				if($cnt_studios==0){
					$studio_txt = "You have not marked any studio location. ";
					
					//$studio_txt2 = "Teacher’s Studio/home within $travel_radius miles of $student_zipcode. <i> You have not marked any studio location. </i>";
				}else{
					if($travel_radius >= $dist){
						$studio_txt = "Your studio falls within travel distance ($travel_radius miles) mentioned by student. ";
						
						//$studio_txt2 = "Teacher’s Studio/home within $travel_radius miles of $student_zipcode. <i> Your studio falls within travel distance ($travel_radius miles) mentioned by student. </i>";
					}else{
						$studio_txt = "Your studio does not fall within travel distance ($travel_radius miles) mentioned by student. ";
									
						//$studio_txt2 = "Teacher’s Studio/home within $travel_radius miles of $student_zipcode. <i> Your studio does not fall within travel distance ($travel_radius miles) mentioned by student.</i>";
					}
				}
					
			}else{
				$studio_txt = '';
			}
	
		}else{
			$studio_txt = '';
			$home_txt = '';
		}
		
		$data['home_txt'] = $home_txt;
		$data['studio_txt'] = $studio_txt;
		
		return $data;
		
		
	}
	
	
	public function get_zips_in_range($zip, $range)
	{
		//$this->chronometer();                     // start the clock 
       //echo $this->units;
		$details = $this->get_zip_point($zip);  // base zip details
		//echo "<pre>";
		$d_latt = $details->lattitude;
		$d_long = $details->longitude;
		if (empty($details)) return; 
		$return = array();
		$zipcodes=ModelsZipcode::where('zipcode', '<>' , $zip)->get();
				
		if(count($zipcodes)==0)
		{
			return false;
		}
		else
		{
			foreach($zipcodes as $zcodes)
			{
				$zip_lat = $zcodes->lattitude;
				$zip_long = $zcodes->longitude;
				$zip_code = $zcodes->zipcode;
				$dist = $this->calculate_mileage($d_latt,$zip_lat,$d_long,$zip_long);
				if ($this->units == 'k') $dist = $dist * 1.609344; 
				if ($dist <= $range) { 
				   $return[str_pad($zip_code, 5, "0", STR_PAD_LEFT)] = round($dist, $this->decimals); 
				} 
			} 
			return $return;
		}
		
	}
	
	public function calculate_mileage($lat1, $lat2, $lon1, $lon2) { 
  
      // used internally, this function actually performs that calculation to 
      // determine the mileage between 2 points defined by lattitude and 
      // longitude coordinates.  This calculation is based on the code found 
      // at http://www.cryptnet.net/fsp/zipdy/ 
        
      // Convert lattitude/longitude (degrees) to radians for calculations 
      $lat1 = deg2rad($lat1); 
      $lon1 = deg2rad($lon1); 
      $lat2 = deg2rad($lat2); 
      $lon2 = deg2rad($lon2); 
       
      // Find the deltas 
      $delta_lat = $lat2 - $lat1; 
      $delta_lon = $lon2 - $lon1; 
     
      // Find the Great Circle distance  
      $temp = pow(sin($delta_lat/2.0),2) + cos($lat1) * cos($lat2) * pow(sin($delta_lon/2.0),2); 
      $distance = 3956 * 2 * atan2(sqrt($temp),sqrt(1-$temp)); 

      return $distance; 
   } 
	
	public function get_zip_point($zip) { 
		//return $zip;
      // This function pulls just the lattitude and longitude from the 
      // database for a given zip code. 
       
	   $zipcode=ModelsZipcode::where('zipcode',$zip)->get();
	   if(count($zipcode)>0)
	   {
		  return $zipcode[0]; 
	   }
	   else
	   {
		   return false;
	   }
           
   }
   
   public function make_tmp_address($address){

			/* THIS GENERATES TEMP ADDRESS */
			//echo $address;
			$tmpx = explode(' ',$address);
			
			if(is_numeric($tmpx[0]) && count($tmpx) > 1){

				switch(strlen($tmpx[0])){

					case 1:

							$tstart = 1;

							$tend = 200;

							$tmpadd = "between 1 & 200";

						break;

					case 2:

							$tstart = 1;

							$tend = 200;

							$tmpadd = "between 1 & 200";

						break;

					case 3:

							$tstart = floor($tmpx[0]/100)*100-99;

							$tend = $tstart+199;

							$tmpadd = "between {$tstart} & {$tend}";

						break;

					case 4:

							$tstart = floor($tmpx[0]/100)*100-99;

							$tend = $tstart+199;

							$tmpadd = "between {$tstart} & {$tend}";

						break;

					case 5:

							$tstart = floor($tmpx[0]/100)*100-99;

							$tend = $tstart+199;

							$tmpadd = "between {$tstart} & {$tend}";

						break;

					case 6:

							$tstart = floor($tmpx[0]/100)*100-99;

							$tend = $tstart+199;

							$tmpadd = "between {$tstart} & {$tend}";

						break;

					default:

							$tmpadd = '';

						break;

				}

				array_shift($tmpx);

				$tmpadd .= ' '.implode(' ',$tmpx);

			

			}else{

				if(count($tmpx) > 1){
					array_shift($tmpx);

					$tmpadd = implode(' ',$tmpx);

				}else
				{
					$tmpadd = $address;
				}
					

			}
			if($tmpadd==""){
				$res = $tmpadd;
			}
			else{
				$res = $tmpadd.',';
			}
			
		return $res;

	}
	
	public function prospectives_request(Request $request)
	{
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacher_zcode = $user->teacherId->postalCode;
		//dd($user);
		
		//echo "<pre>"; Array ( [0] => 261839 [1] => NY1220HZTUNJ-1 [2] => 261885 )
		//				Array ( [0] => 261839 [1] => NY1220HZTUNJ-1 [2] => 261885 ) 
		$profile_completenss = $user->teacherId->profile_completenss;
		if($profile_completenss=='Incomplete'){
			return Redirect::route('viewProspective');
			//$instrument=Instrument::where('is_active','Y')->get();	
			//return view('prospectives',compact('instrument','profile_completenss'));
		}
		if(isset($request->prospectiveStudentIds)){
			//$prosStuIds = base64_decode($request->prospectiveStudentIds);
			$chkStudentIds = explode('|',$request->prospectiveStudentIds);
		}
		else{
			$chkStudentIds = $request->input('chkStudentId');
		}
		
		//print_r($chkStudentIds);	
		//print_r($request->input('chkStudentId'));
		//die;
		$stdKeys = array();
		$stdIds = array();

		$lessons = array();
		$instruments_id = "";
		$i= 0;
		$student_key = array();
		$location_zip =array();
		$location_zip1 = array();
		$student_id =array();
		$postVals='';
		
		$fail_post_iagree=(isset($_POST['fail_post_iagree']))?unserialize($_POST['fail_post_iagree']):array();
		$Fullbody = "";
		$totalRec=0;
		$student_data = array();
		$results = array();
		$res =array();
		//for($s =0; $s<sizeof($request->input('chkStudentId'));$s++)
		for($s =0; $s<sizeof($chkStudentIds);$s++)
		{
			//$stdId = $_POST['chkStudentId'][$s] ;
			$stdId = $chkStudentIds[$s] ;
			$students_key = array();	
			$students_id = array();	
			$student_id = array();	
			$experience_level = array();	
			$age = array();	
			$lesson_length = array();	
			$notes_special = array();	
			$lessons_times = array();
			
			
			if (preg_match("/-/", $stdId)) {
				$idNum=explode("-",$stdId);
				$stdId=$idNum[0];
				$where="WHERE substring_index(idNum,'-',1)='{$idNum[0]}'";
				
				$prospective_students= ModelsProspectiveStudent::selectRaw("studentId AS students_id, firstName AS firstname, lastName AS lastname,addressL1 AS addressL1, addressL2 AS addressL2,  city, stateId AS state_prefix, instr AS 	instruments_id, lessonLoc AS lesson_location, iLevel AS experience_level, idNum AS ikey, age, lessonLen AS lesson_length, lessonNotes AS notes_availability, studentNotes AS notes_special, lessonStartMon, lessonStartTue, lessonStartWed, lessonStartThu, lessonStartFri, lessonStartSat, zipCode AS zip, lessonStartSun")->where(DB::raw("SUBSTRING_INDEX(prospective_students.idNum, '-', 1)"), '=', $idNum[0])->get()->toArray();
				
				foreach($prospective_students as $data)
				{
					array_push($student_data, $data);
				}
				
				
			}
			else
			{
				$prospective_students= ModelsProspectiveStudent::selectRaw("studentId AS students_id, firstName AS firstname, lastName AS lastname,addressL1 AS addressL1, addressL2 AS addressL2,  city, stateId AS state_prefix, instr AS 	instruments_id, lessonLoc AS lesson_location, iLevel AS experience_level, idNum AS ikey, age, lessonLen AS lesson_length, lessonNotes AS notes_availability, lessonLoc_choice1, lessonLoc_choice2, lessonLoc_choice3,  studentNotes AS notes_special, lessonStartMon, lessonStartTue, lessonStartWed, lessonStartThu, lessonStartFri, lessonStartSat, zipCode AS zip, lessonStartSun")->where('studentId', $stdId)->orWhere('combine_id', $stdId)->get()->toArray();
				if(empty($prospective_students)){
					return Redirect::route('viewProspective')->with('status', 'Unfortunately this student is no longer available. We recommend checking e-mails from Musika daily as students tend to get matched quickly. If you would like to browse through the available students in the system please search using below form.');
					
					//return redirect('http://devteacher.musikalessons.com/musika_error');
				}
				array_push($student_data, $prospective_students[0]);
			}
			
			 $num_rows = count($prospective_students);
			
			$i=0;
			$total =0;
			$lesson_time = [];
			$radiusRes = [];
			foreach($prospective_students as $student)
			{
				//echo "<pre>";
				//print_r($student);
				
				$lessons_text = '';
				$location = "";
				$checkedRdBtn=""; // postback radio button value
				$textboxValPstNtAccomodate=""; // postback text box value
				$textboxValPstComment=""; // postback text box value
				
				if((!empty($fail_post_iagree)) && (count($fail_post_iagree)>0))
				{
					$postVar=explode("_",$fail_post_iagree['iagree'][$totalRec]);
					
					$radioBtnPstBack=strtolower($fail_post_iagree["rdolocation".$postVar[1]]);		
		
				if(!empty($fail_post_iagree["txta_not_accommodate".$postVar[1]]))
					$textboxValPstNtAccomodate=htmlentities($fail_post_iagree["txta_not_accommodate".$postVar[1]]);
				
				if(!empty($fail_post_iagree["txta_comment".$postVar[1]]))
					$textboxValPstComment=htmlentities($fail_post_iagree["txta_comment".$postVar[1]]);
				}
				
				$instrument=ModelsInstrument::where('instrumentId',$student['instruments_id'])->first();
				//print_r($instrument->instrumentName);
				$student['instrument'] = $instrument->instrumentName;
				if($instruments_id=="") $instruments_id = $student['instruments_id'];
				
				//echo $student['lesson_location'];
				//echo "<pre>";
				if(preg_match("/Home/i", $student['lesson_location'])){
					$lessons['is_home'] = true;
					$lessons['zipCode'] = str_pad($student['zip'], 5, '0', STR_PAD_LEFT);
				}else {
					$lessons['is_home'] = false;
				}
				if(preg_match("/Studio/i", $student['lesson_location'])){
					$lessons['is_studio'] = true;
					$tmp = explode(':',$student['lesson_location']);
					$travel_zip = explode('|',$tmp[(sizeof($tmp)-1)]);
					$lessons['travel_zip'] = $travel_zip[0];
					$tmp2 = explode(' ',$tmp[sizeof($tmp)-2]);
					$lessons['travel_radius'] = $tmp2[0];
				}else {
					$lessons['is_studio'] = false;
				}
				if(preg_match("/Online/i", $student['lesson_location'])){
					$lessons['is_online'] = true;
				}else {
					$lessons['is_online'] = false;
				}
				
				
				$lessons['is_both'] = false;
				if($lessons['is_home']==true && $lessons['is_studio']==true) 
				{ $lessons['is_both'] = true; }
				if ($lessons['is_both'] )
				{
					 $location = "Either at ";
				}
				else
				{
					if ($lessons['is_home'] )
					{
						$location = "<b>ONLY</b> at  ";
					}
				}
				if ($lessons['is_home'] )
				{
				$location .= " the student's home in " .$this->make_tmp_address($student['addressL1']).' '.$student['city']. ", ". $student['state_prefix']. ", ". str_pad($student['zip'], 5, '0', STR_PAD_LEFT) ;
				
				}
				if ($lessons['is_both'] )
				{
					$location .=' or ';
				}
				if ($lessons['is_studio'] )
				{
					if ($lessons['is_both'] )
					{
				$location .=' student can travel to a Musika teacher\'s studio/home (Musika does not provide teaching facilities) that is within '. $lessons['travel_radius'] . '  Mile of zip code  ' . $lessons['travel_zip']   .". <br><br>";

					}
				else
				{
				$location .='Student can only travel to a Musika teacher\'s studio/home (Musika does not provide teaching facilities) that is within '. $lessons['travel_radius'] . '  Mile of zip code  ' . $lessons['travel_zip']   .". <br><br>";

				}

				$location.=" <span style='font-weight:bold; text-decoration:underline; color:red'>NOTE: if you are requesting this student to come to you, you <em>MUST</em> state how far (in miles only) your studio/home is located from ".  str_pad($student['zip'], 5, '0', STR_PAD_LEFT) . ". </span>";

				}
				if (!($lessons['is_studio']))	$location.= ". <br><br>";
				$location .= " Go to <a href='http://maps.google.com/?q=".  str_pad($student['zip'], 5, '0', STR_PAD_LEFT) . "' target='_blank' style='text-decoration: underline; color:#002366;'> Google Map</a>. ";

				if (! ($lessons['is_studio'] ))
				{
				$location .= "You MUST determine whether the location will work for you or not. ";
				}
				$location .= "You may not request this student if you have not mapped it and determined if it is in your range.";
				
				//print_r($lessons);
				//die;
				//echo $location."<br>";
				
				$lessons_text1[$i] = $location;
				//$location_zip1[$i] = $location_zip;
				//$student_key[$i] = $student['ikey'];
				//$students_key[$i] = $student['ikey'];
				//$students_id[$i] = $student['students_id'];
				$student_id = $student['students_id'];
				$experience_level = $student['experience_level'];
				$age = $student['age'];
				$notes_availability[$i] = $student['notes_availability'];
				$notes_special = $student['notes_special'];
				$lesson_length = $student['lesson_length'];
				//$total += (int)$student['lesson_length'];
				$lesson_start = array();
				//$total += (int)$student['lesson_length'];
				
				if($student['lessonStartMon'] != '') {
					$lesson_start[] = 'Monday: '.$student['lessonStartMon'];
					//$lesson_time['Monday'] = $this->exist_time($student['lessonStartMon']);
					//print_r($lesson_time);
				}
				if($student['lessonStartTue'] != ''){ 
					$lesson_start[] = 'Tuesday: '.$student['lessonStartTue'];
					//$lesson_time['Tuesday'] = $this->exist_time($student['lessonStartTue']);
					//print_r($lesson_time);
				}	
				if($student['lessonStartWed'] != ''){ 
					$lesson_start[] = 'Wednesday: '.$student['lessonStartWed'];
					//$lesson_time['Wednesday'] = $this->exist_time($student['lessonStartWed']);
				}
				if($student['lessonStartThu'] != ''){ 
					$lesson_start[] = 'Thursday: '.$student['lessonStartThu'];
					//$lesson_time['Thursday'] = $this->exist_time($student['lessonStartThu']);
				}
				if($student['lessonStartFri'] != ''){ 
					$lesson_start[] = 'Friday: '.$student['lessonStartFri'];
					//$lesson_time['Friday'] = $this->exist_time($student['lessonStartFri']);
				}	
				if($student['lessonStartSat'] != ''){ 
					$lesson_start[] = 'Saturday: '.$student['lessonStartSat'];
					//$lesson_time['Saturday'] = $this->exist_time($student['lessonStartSat']);
				}	
				if($student['lessonStartSun'] != ''){ 
					$lesson_start[] = 'Sunday: '.$student['lessonStartSun'];
					//$lesson_time['Sunday'] = $this->exist_time($student['lessonStartSun']);
				}	
				
				$lessons_times = implode(', ',$lesson_start);
				if(isset($lessons['is_home']) && $lessons['is_home']!=''){
					//echo "test";
					//$radiusRes = $this->radius_search($lessons['zipCode']);
					//$lessons['home_radius'] = $radiusRes;
					
					$distace_res = $this->getDistaneByLatLong($student_id,'Home',str_pad($student['zip'], 5, '0', STR_PAD_LEFT));
					$lessons['home_distance'] = $distace_res;
					
				}else{
					//$lessons['home_radius'] = [];
					$lessons['home_distance'] = '';
				}
				
				
				if(isset($lessons['is_studio']) && $lessons['is_studio']!=''){
					//echo "test";
					//$radiusRes = $this->radius_search($lessons['travel_zip']);
					//$lessons['radius'] = $radiusRes;
					
					$CntTeachersStudio=ModelsTeachersToStudio::with('studio')->where('teacherId',$user->teacherId->id)->count();
					$lessons['cnt_studios'] = $CntTeachersStudio;
					
					$distace_res = $this->getDistaneByLatLong($student_id,'Studio',str_pad($student['zip'], 5, '0', STR_PAD_LEFT));
					$lessons['studio_distance'] = $distace_res;
						
				}else{
					$lessons['cnt_studios'] = '';
					$lessons['radius'] = [];
					$lessons['studio_distance'] = '';
				}
				$lessons['teacher_zcode'] = $teacher_zcode;
				
				
				//echo "<pre>";
				//print_r($lessons);
				//die;
				/* $location_zip = array_unique($location_zip1);
				if(sizeof($location_zip) ==1) 
				{
				$location_zip1 = $location_zip;
				} */
				

				
				
				
				
				/* foreach($lesson_mon_time as $key => $val){
					print_r($val);
				} */
				
				
				$lessons_text1 = array_unique($lessons_text1);		
				$lessons_txt = implode (', ', $lessons_text1);
				
				 $student_key = $student['ikey'];
				//$student_ids = implode(', ', $student_id); 
						
			
				$lessonstxt = implode(' & ', $lessons_text1);			
						$lessonstxt .=" <br><br><span style='font-weight:bold; text-decoration:underline; color:red'>NOTE: if you are requesting this student to come to you, you <em>MUST</em> state how far (in miles only) your home/studio is located from ";
						$lessonstxt .='</span>';	
				
				$ival = array(1 => 'One student',2 => 'Two students back to back ', 3 => 'Three students back to back ', 4 => 'Four students back to back ', 5 => 'Five students back to back ');

				$i = $i+1;
				
			   $studentKey=($num_rows>1)?$stdId.$i:$stdId;
			   
			   $iagreeId=$student_id."_".$studentKey;
			   
				///echo 'abc '.$student_key;
				$res['student_key'] = $student_key;
				$res['studentKey'] = $studentKey;
				$res['student_id'] = $student_id;
				 $res['instrument'] = $student['instrument'];
				$res['experience_level'] = $experience_level;
				$res['location'] = $location;
				$res['age'] = $age;
				$res['lesson_length'] = $lesson_length;
				$res['lessons_times'] = $lessons_times;
				$res['notes_special'] = $notes_special;
				$res['textboxValPstComment'] = $textboxValPstComment;
				$res['textboxValPstNtAccomodate'] = $textboxValPstNtAccomodate;
				$res['iagreeId'] = $iagreeId; 
				$res['lessons'] = $lessons; 
				$res['student_data'] = $student; 
				//$res['lesson_timimg'] = $lesson_time; 
				
				//getStudioLocation
				
				array_push($results,$res);
				
				//$stukey = implode(',',$studentKey);
				$stdIds[] = $studentKey;
				$stdKeys[] = $student_key;
			
			}
		}
		
		$teacher_studio_loc = $this->getStudioLocation();
		
		//echo "<pre>";
		//print_r($teacher_studio_loc); 
		//print_r($results); 
		//die;
		//die;
		//echo "<pre>";
		$std_ids['stdIds'] = implode(',',$stdIds);
		$std_ids['stdKeys'] = implode(',',$stdKeys);
		$std_ids['chkStudentId'] = implode(',',$chkStudentIds);
		//print_r($hidden_data); 
		//die;
		return view('prospectives_request',compact('results','std_ids','teacher_studio_loc'));
	}
	
	public function checkStudioLocation(Request $request){
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacher_zcode = $user->teacherId->postalCode;
		$s_id = $request->s_id;
		
		$TeachersToStudio=ModelsTeachersToStudio::with('studio')->where('teacherId',$user->teacherId->id)->get();
		$studioLoc = [];
		//dd($TeachersToStudio);
		foreach($TeachersToStudio as $studio_data)
		{
			$data['lat'] = number_format($studio_data->studio->lat, 6);
			$data['lng'] = number_format($studio_data->studio->lng, 6);
			array_push($studioLoc,$data);
		}
		$t_zipcode = ModelsZIPCodes::where('ZipCode',$teacher_zcode)->first();
		if(!empty($t_zipcode)){
			$val['lat'] = number_format($t_zipcode->Latitude, 6);
			$val['lng'] = number_format($t_zipcode->Longitude, 6);
		}else{
			$val['lat'] = 40.725568 ;
			$val['lng'] = -73.998208; 
		}
		$location['zipcode'] = $val;
		$location['studio'] = $studioLoc;
		$location['s_id'] = $s_id;
		//$location['studio_txt'] = $studio_txt;
		//$location['studio_txt2'] = $studio_txt2;
		//print_r($val);
		//print_r($location);
		//die;
		return json_encode($location);
		//die;
	}
	
	public function getStudioLocation(){
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacher_zcode = $user->teacherId->postalCode;
		//$s_id = $request->s_id;
		
		$TeachersToStudio=ModelsTeachersToStudio::with('studio')->where('teacherId',$user->teacherId->id)->get();
		$studioLoc = [];
		//dd($TeachersToStudio);
		foreach($TeachersToStudio as $studio_data)
		{
			$data['lat'] = number_format($studio_data->studio->lat, 6);
			$data['lng'] = number_format($studio_data->studio->lng, 6);
			array_push($studioLoc,$data);
		}
		$t_zipcode = ModelsZIPCodes::where('ZipCode',$teacher_zcode)->first();
		if(!empty($t_zipcode)){
			$val['lat'] = number_format($t_zipcode->Latitude, 6);
			$val['lng'] = number_format($t_zipcode->Longitude, 6);
		}else{
			$val['lat'] = 40.725568 ;
			$val['lng'] = -73.998208; 
		}
		$location['zipcode'] = $val;
		$location['studio'] = $studioLoc;
		//$location['s_id'] = $s_id;
		
		//echo "<pre>";
		//print_r($location);
		//die;
		return json_encode($location);
		//die;
	}
	
	public function getDistaneByLatLong($student_id,$lessonLoc,$zcode){
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacher_zcode = $user->teacherId->postalCode;
		//$lessonLoc = "Studio";
		//echo $student_id.' '.$lessonLoc.' '.$zcode;    die;
		$t_zipcode = ModelsZIPCodes::where('ZipCode',$teacher_zcode)->first();
		$s_zipcode = ModelsZIPCodes::where('ZipCode',$zcode)->first();
		//dd($zipcode);'261899'
		
		$latlng = ModelsStudentLatLong::where('studentId',$student_id)->first();
		
		$TeachersToStudio=ModelsTeachersToStudio::with('studio')->where('teacherId',$user->teacherId->id)->get();
		//dd($TeachersToStudio);
		
		// if lesson location home and not empty lat long from this table StudentLatLong
		if($lessonLoc == "Home" || ($lessonLoc == "Studio" && $TeachersToStudio->isEmpty())){
			if($t_zipcode!=$s_zipcode){	
				$lat1 = $t_zipcode->Latitude;
				$long1 = $t_zipcode->Longitude; 
				if(!empty($latlng)){
					$lat2 = $latlng->lat;
					$long2 = $latlng->lng;
				}else{
					$lat2 = $s_zipcode->Latitude;
					$long2 = $s_zipcode->Longitude;
				}
				
				$theta = $long1 - $long2;
				$miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
				$miles = acos($miles);
				$miles = rad2deg($miles);
				$miles = $miles * 60 * 1.1515;
				$distance = number_format($miles, 2, '.', ',');
				return $distance;
				
			}else{
				$distance = 0;
				return $distance;
			}	
		}else if($lessonLoc == "Studio" && $TeachersToStudio->isNotEmpty()){
			if(!empty($latlng)){
				$lat2 = $latlng->lat;
				$long2 = $latlng->lng;
			}else{
				$lat2 = $s_zipcode->Latitude;
				$long2 = $s_zipcode->Longitude;
			}
			$dist = [];
			foreach($TeachersToStudio as $studio_data)
			{
				$lat1 = $studio_data->studio->lat;
				$long1 = $studio_data->studio->lng;
					
				$theta = $long1 - $long2;
				$miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
				$miles = acos($miles);
				$miles = rad2deg($miles);
				$miles = $miles * 60 * 1.1515;
				$dist[] = number_format($miles, 2, '.', ',');
			}
			sort($dist);
			$distance = $dist[0];
			return $distance;
		}else{
			$distance = 0;
			return $distance;
		}
		
		//exit;
		
	}
	
	public function getMessageForLessons($s_id){
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacher_zcode = $user->teacherId->postalCode;
		//$s_id = $request->s_id;
		$p_student = ModelsProspectiveStudent::where('studentId', $s_id)->first(); 
		if(!empty($p_student)){
			if(preg_match("/Studio/i", $p_student->lessonLoc)){
				$lessons['is_studio'] = true;
				$tmp = explode(':',$p_student->lessonLoc);
				$travel_zip = explode('|',$tmp[(sizeof($tmp)-1)]);
				$lessons['travel_zip'] = $travel_zip[0];
				$tmp2 = explode(' ',$tmp[sizeof($tmp)-2]);
				$lessons['travel_radius'] = $tmp2[0];
			}else {
				$lessons['is_studio'] = false;
			}
			
			if(isset($lessons['is_studio']) && $lessons['is_studio']!=''){
			
				$CntTeachersStudio=ModelsTeachersToStudio::with('studio')->where('teacherId',$user->teacherId->id)->count();
				$lessons['cnt_studios'] = $CntTeachersStudio;
				
				$distace_res = $this->getDistaneByLatLong($s_id,'Studio',str_pad($p_student->zipCode, 5, '0', STR_PAD_LEFT));
				$lessons['studio_distance'] = $distace_res;
					
			}else{
				$lessons['cnt_studios'] = '';
				$lessons['studio_distance'] = '';
			}
			
			$cnt_studios = $lessons['cnt_studios'];
			$dist = $lessons['studio_distance'];
			$travel_radius = $lessons['travel_radius'];
			$student_zipcode = $lessons['travel_zip'];
			
			if($cnt_studios==0){
				$studio_txt = "Your Studio, <i>You have not marked any studio location. </i>";
				
				$studio_txt2 = "Teacher’s Studio/home within $travel_radius miles of $student_zipcode. <i> You have not marked any studio location. </i>";
			}else{
				if($travel_radius >= $dist){
					$studio_txt = "Your Studio, <i>Your studio falls within travel distance ($travel_radius miles) mentioned by student. </i>";
					
					$studio_txt2 = "Teacher’s Studio/home within $travel_radius miles of $student_zipcode. <i> Your studio falls within travel distance ($travel_radius miles) mentioned by student. </i>";
				}else{
					$studio_txt = "Your Studio, <i>Your studio does not fall within travel distance ($travel_radius miles) mentioned by student. </i>";
								
					$studio_txt2 = "Teacher’s Studio/home within $travel_radius miles of $student_zipcode. <i> Your studio does not fall within travel distance ($travel_radius miles) mentioned by student.</i>";
				}
			}
			
		}else{
			$studio_txt = '';
			$studio_txt2 = '';
		}
		
		$data['studio_txt'] = $studio_txt;
		$data['studio_txt2'] = $studio_txt2;
		
		return $data;
		
		
	}
	
	public function saveStudioLocation(Request $request){
		//echo $request->lat.' ';
		//echo $request->lng.' ';
		$student_id = $request->s_id;
		$student_ids = $request->student_ids;
		
		
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacherId = $user->teacherId->id;
		$remote_teacherId = $user->teacherId->remoteTeacherId;
		$latitute = round($request->lat,4);
		$longitude = round($request->lng,4);		
		//$url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$latitute,$longitude&key=AIzaSyAhS-J8suntAEflTrK_4h7rGFPSqoFFL_s&sensor=false";
		$url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$latitute,$longitude&key=AIzaSyBLMdrLGHcA-XoEx53h298M2jU7L2dBrR8&sensor=false";
		//echo "https://maps.googleapis.com/maps/api/geocode/json?latlng=$latitute,$longitude&key=AIzaSyAhS-J8suntAEflTrK_4h7rGFPSqoFFL_s&sensor=false";
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_ENCODING, "");
		$curlData = curl_exec($curl);
		//print_r($curlData);
		curl_close($curl);
		$response = json_decode($curlData);
		if($response->status=="OK")
		{	
			foreach($response->results[0]->address_components as $res)
			{
				if($res->types[0]=="postal_code")
				{
					$postalCode = $res->long_name;
				}
			}
		}
		else{
			$postalCode = '0';
		}	
		//echo $postalCode; 
		if($latitute=='' && $longitude ==''){
			$json = json_encode(['status'=>'true']);
				return $json;
				exit;
		}
		
		$TeachersToStudio=ModelsTeachersToStudio::with('studio')->where('teacherId',$user->teacherId->id)->get();
		
		$cnt_studio = $TeachersToStudio->count();
		
		if($cnt_studio > 7){
			$json = json_encode(['status'=>'false','res'=>'You can not add more than eight studio locations']);
			return $json;
		}
		//die;
		
		
		if($TeachersToStudio->isEmpty()){
			//echo "empty";
			$Teachers = ModelsTeacher::where('remoteTeacherId',$remote_teacherId)->update(['teachesStudio'=>'yes']);
		}
		
		//die;
		$Studios = new ModelsStudio();
		$Studios->lat = $latitute;
		$Studios->lng = $longitude;
		$Studios->postalCode = $postalCode;
		if($Studios->save())
		{
			$new_id = $Studios->id;
			$TeachersToStudios = new ModelsTeachersToStudio();
			$TeachersToStudios->teacherId = $user->teacherId->id;
			$TeachersToStudios->studioId = $new_id;
			if($TeachersToStudios->save())
			{
				
				foreach($student_ids as $sid){
					$msg = $this->getMessageForLessons($sid);
					
					$data[$sid]['studio_msg1'] = $msg['studio_txt'];
					$data[$sid]['studio_msg2'] = $msg['studio_txt2'];
					
				}
		
				
				$json = json_encode(['status'=>'true','res'=>$data]);
				return $json;
			}	
		}
		exit;
		
	}
	
	public function deleteStudioLocation(Request $request){
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacherId = $user->teacherId->id;
		$student_id = $request->s_id;
		$student_ids = $request->student_ids;
		$remote_teacherId = $user->teacherId->remoteTeacherId;
		
		$latitute = round($request->lat,4);
		$longitude = round($request->lng,4);
		$ts = ModelsTeachersToStudio::where('teacherId',$user->teacherId->id)->get();
		$cnt = $ts->count();
		foreach($ts as $val){
			$studios = ModelsStudio::where('id', $val->studioId)->get();
				foreach($studios as $data){
					if($data->lat== $latitute || $data->lng == $longitude){
						ModelsTeachersToStudio::where('studioId',$data->id)->delete();
						ModelsStudio::where('id', $data->id)->delete();
						
						if($cnt==1){
							$Teachers = ModelsTeacher::where('remoteTeacherId',$remote_teacherId)->update(['teachesStudio'=>'no']);
							$allStudioDelete = 'All'; 
						}else{
							$allStudioDelete = '';
						}
						foreach($student_ids as $sid){
							
							$msg = $this->getMessageForLessons($sid);
							$result[$sid]['studio_msg1'] = $msg['studio_txt'];
							$result[$sid]['studio_msg2'] = $msg['studio_txt2'];
							
						}
						$json = json_encode(['status'=>'true','deleteStatus'=>$allStudioDelete,'res'=>$result]);
						return $json;
					} else {
					}
				}
		}
		exit;
	}
	
	public function radius_search($zipcode){
		//echo $zipcode.' '.$distance;
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		
		$teacher_zcode = $user->teacherId->postalCode;
		
		$zipcode = ModelsZIPCodes::where('ZipCode',$zipcode)->first();
		
		if(!empty($zipcode)){
			$lat = $zipcode->Latitude;
			$lng = $zipcode->Longitude;
			//dd($zipcode);
			$locations = ModelsZIPCodes::selectRaw("ZipCode, ( 3958*3.1415926*SQRT(($lat-Latitude)*($lat-Latitude) + cos($lat/57.29578)*cos(Latitude/57.29578)*($lng-Longitude)*($lng-Longitude))/180*0.62137 ) as dist, City ")
			->whereRaw("PrimaryRecord = 'P' and  ZipCode=$teacher_zcode")
			//->whereRaw("(3958*3.1415926*SQRT(($lat-Latitude)*($lat-Latitude) + cos($lat/57.29578)*cos(Latitude/57.29578)*($lng-Longitude)*($lng-Longitude))/180*0.62137) < $distance AND PrimaryRecord = 'P' and  ZipCode=$teacher_zcode")
			->orderBy("dist")
			->first();
			
			//dd($locations);
			if(!empty($locations)){
				$data['zipcode'] =  $locations->ZipCode;
				$data['dist'] =  $locations->dist;
				$data['city'] =  $locations->City;
			}else{
				$data = [];
			}
		}else{
			$data = [];
		}	
		
		return $data;
		//die;
	}
	
	public function exist_time($lesson_day_time){
		
		$time_arr = ['7:00AM'=>'7:00 - 7:30AM',
			'7:30AM'=>'7:30 - 8AM',
			'8:00AM'=>'8 - 8:30AM',
			'8:30AM'=>'8:30 - 9AM',
			'9:00AM'=>'9 - 9:30AM',
			'9:30AM'=>'9:30 - 10AM',
			'10:00AM'=>'10 - 10:30AM',
			'10:30AM'=>'10:30 - 11AM',
			'11:00AM'=>'11 - 11:30AM',
			'11:30AM'=>'11:30 - 12PM',
			'12:00PM'=>'12 - 12:30PM',
			'12:30PM'=>'12:30 - 1PM',
			'1:00PM'=>'1 - 1:30PM',
			'1:30PM'=>'1:30 - 2PM',
			'2:00PM'=>'2 - 2:30PM',
			'2:30PM'=>'2:30 - 3PM',
			'3:00PM'=>'3 - 3:30PM',
			'3:30PM'=>'3:30 - 4PM',
			'4:00PM'=>'4 - 4:30PM',
			'4:30PM'=>'4:30 - 5PM',
			'5:00PM'=>'5 - 5:30PM',
			'5:30PM'=>'5:30 - 6PM',
			'6:00PM'=>'6 - 6:30PM',
			'6:30PM'=>'6:30 - 7PM',
			'7:00PM'=>'7 - 7:30PM',
			'7:30PM'=>'7:30 - 8PM',
			'8:00PM'=>'8 - 8:30PM',
			'8:30PM'=>'8:30 - 9PM'];
		
		$lesson_time = explode(' - ',$lesson_day_time);
			
		foreach($time_arr as $key => $val){
			$current_time = $key;
			if(trim($lesson_time[0])!=''){
				$start_time = $lesson_time[0];
			}else{
				$start_time = '7:00AM';
			}
			if(trim($lesson_time[1])!=''){
				$end_time = $lesson_time[1];
			}else{
				$end_time = '9:00PM';
			}
			
			$date1 = Carbon::createFromFormat('H:i a', $current_time);
			$date2 = Carbon::createFromFormat('H:i a', $start_time);
			$date3 = Carbon::createFromFormat('H:i a', $end_time);
			if ($date1 >= $date2 && $date1 < $date3)
			{
			   $lesson_timimg[]=$val;
			}
		}
		
		return $lesson_timimg;
		
	}
	
	public function prospectives_send_request(Request $request)
	{
		//dd(Carbon::now()->timestamp);
	   /*  echo "<pre>";
		print_r($_POST);
		die; */  
		
		$student_key = $request->input('student_key');
		$student_id = $request->input('student_id');
		$iagree = $request->input('iagree');
		$nonsolicitation = $request->input('nonsolicitation');
		$stdId=$request->stdId;
		$stdKey=$request->stdKey;
		$seenPop=$request->seenPop;
		$idNumPst=$request->idNumPst;
		
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		
		$teacherName=ModelsTeacherName::where('teacherId',$user->teacherId->remoteTeacherId)->first();
		$idNum=$user->teacherId->remoteTeacherId;
		//echo $user->teacherId->remoteTeacherId;
		/* if($teacherName->agree_bcg=='no')
		{
			return Redirect::route('backgroundcheck');
		}
		else
		{ */
			$uknownState = array();
			$uknownTime = array();
			$uknownconnectId = array();
			$emad = array();
			$tid = array();
			$cid = array();
			  
			$i=0;$j=0;
			$timeDif =0;
			$current_time = time();
			$hours_past = strtotime('-24 hours',$current_time);
			
			$students= ModelsConnection::selectRaw("connections.prospectiveId AS prospectiveId,connections.connectId AS connectId,connections.instId AS instId,connections.dateMade AS dateMade,connections.status AS status, prospective_students.firstName AS firstName, prospective_students.lastName AS lastName,  prospective_students.studentId AS pid")
						->rightJoin('prospective_students','connections.prospectiveId','=','prospective_students.studentId')->where('connections.teacherId',$idNum)->where('connections.dateInitInformed','0000-00-00 00:00:00')->where(DB::raw('UNIX_TIMESTAMP(connections.dateMade)'),'<',$hours_past)->where('connections.status', '<', 1)->get()->toArray();
			
			//dd($students);
			foreach($students as $row)
			{
				$timeDif = (time()- strtotime($row["dateMade"]))/(60*60);
				if ($timeDif >= 24)
				{
					$uknownState[] = $row["firstName"] . " ". $row["lastName"];
					$uknownconnectId[] = "<a href='javascript:document.f".$j.".submit();'> Click here to update status of ". $row["firstName"] . " ". $row["lastName"] . "</a>";
					$emad[] = "<input type=hidden name=emad value='".strtolower($teacherName->email)."'>\n";
					$tid[] = "<input type=hidden name=tid value='".$idNum."'>\n";
					$cid[] = "<input type=hidden name=cid value='".$row["connectId"]."'>\n";
					$pid[] = "<input type=hidden name=pid value='".$row["pid"]."'>\n";
					$csrftoken[] = csrf_field()."\n";
					$uknownTime[] = intval($timeDif);
					$j++;
				}
				$i++;
				$on_hold_request_ids[]= $row["connectId"];	
			}
			
			$strStudent= "student";
			$strThis = "this";

			if(count($uknownState)>1)
			{
				 $strStudent= "students";
				 $strThis = "these";
			} 
			$uknownmsg= "";
				

			if(sizeof($uknownState))
			{
				$uknownmsg.= '<br>In order for us to consider you for '. $strThis .'  '. $strStudent .'  you must first inform us of your status with the '. $strStudent .' that have already been assigned to you. <br><br> ';

				for($i=0;$i<sizeof($emad);$i++)
				{
					$uknownmsg .= "<form action='".route('viewProspectiveStatus')."' method=post name=f$i> ##not_inserted_request ##inserted_request ##on_hold_request_ids ##to_be_posted_ids ". $emad[$i] . $tid[$i] . $cid[$i]. $uknownconnectId[$i] . $csrftoken[$i] .$pid[$i].'</form>';
				}
			}
			
						
			
			
			//$uknownmsg= "";
			$req_student = array();
			$student_id =array();
			
			if (isset($student_id)) 
			{
				$inserted_request = array();
				$not_inserted_request = array();
				$student_id =$iagree;
				//print_r($student_id); die;
				for($i=0;$i<count($student_id);$i++)
				{
					$idArray = explode("_",$student_id[$i]);
					$std=$idArray[0];
					$inputBox=$idArray[1];
					//$txta_comment = $request->input('txta_comment'.$inputBox);
					//$rdolocation = $request->input('rdolocation'.$inputBox);
					//$txta_not_accommodate = $request->input('txta_not_accommodate'.$inputBox);
					
					$message = '';
					
					$instrumnt = $request->input('instrumnt'.$inputBox);
					$lessonloc = $request->input('lessonloc'.$inputBox);
					$lessonlocation = implode(',',$lessonloc);
					$l_location = implode('|',$lessonloc);
					//print_r($lessonloc);
					if(count($lessonloc)==1 && $lessonloc[0]=='home'){
						$message .= "$instrumnt teacher is available for trial lesson at your home. <br><br>";
					}else if(count($lessonloc)==1 && $lessonloc[0]=='studio'){
						$message .= "$instrumnt teacher is available for trial lesson in studio.  <br><br>";
					}else if(count($lessonloc)==1 && $lessonloc[0]=='online'){
						$message .= "$instrumnt teacher is available online for trial lesson. <br><br>";
					}else{
						$message .= "$instrumnt teacher available for trial lesson - '$l_location'. <br><br>";
					}
					
					//die;
					
					
					$provide_lesson = $request->input('provide_lesson'.$inputBox);
					$day_time_request = $request->input('day_time_request'.$inputBox);
					
					$message .=  "Day time: ".$day_time_request." <br><br>";
				if($request->has('rdolocation'.$inputBox)){	
					$rdolocation = $request->input('rdolocation'.$inputBox);
					if($rdolocation=="partial"){
						$special_request = $request->input('special_request'.$inputBox);
						$comment_sp_request = $request->input('special_request'.$inputBox);
						$sp_request = "Partially";
					}else{
						$special_request = "";
						$comment_sp_request = "none";
						$sp_request = $request->input('rdolocation'.$inputBox);
					}
				}else{
					$rdolocation = "";
					$special_request = "";
					$comment_sp_request = "";
					$sp_request = "";
				}
					
					if($sp_request=="yes"){
						$message .= "Teacher can fully accommodate your request.<br><br>";
					}else if($sp_request=="no"){
						$message .= "Teacher can not accommodate your request.<br><br>";
					}else if($sp_request=="Partially"){
						$message .= "Teacher can Partially accommodate your request. <br>";
						$message .= "Comment from teacher: ".$comment_sp_request." <br><br>";
					
					}
					
					$send_msg = '';//$request->input('send_msg'.$inputBox);
					
					$message .= "Message from teacher: ".$send_msg;
					
					$is_special_comment = $request->input('comment'.$inputBox);
					if($is_special_comment=="Yes"){
						$special_coment = $request->input('special_coment'.$inputBox);	
					}else{
						$special_coment = "";
					}
					
					//echo $message; die;
					
					/*Piano teacher available for trail lesson on your Home/Studio/Online.

					Day time: 

					Teacher can fully accomodate your request: Yes/NO/Partially
					Comment from teacher : 

					Message from teacher: */
					
					
					
					$make_request=ModelsMakeRequest::where('teacherId',$idNum)->where('idNum',$std)->get();
					//dd($make_request);
					$rn = count($make_request);
					
					$prospective_res = ModelsProspectiveStudent::where('studentId',$std)->first();  
					//dd($prospective_res);
					$sname = $prospective_res->firstName.' '.$prospective_res->lastName;
					$phone = $this->get_local_phone($prospective_res->zipCode);
					//print_r($rn);
					if($rn<1)
					{
						
						$tName = $teacherName->firstName.' '.$teacherName->lastName; 
						$url = 'http://students.musikalessons.com/public/messagefromTeacher/'.$std.'/'.$idNum;
						//$message = 'You have re';
						
						// $emailIds = ['synapse235@gmail.com'];
						// Mail::send('emails.msg_requested', [
						// 'accountType' => 'Musika',
						// 'StudentName' => $sname,
						// 'Email'=>'synapse235@gmail.com',
						// 'TeacherName'=>$tName,
						// 'Message'=>$message,
						// 'url'=>$url,
						// 'PHONE'=>$phone
						// ], function ($m) use ($emailIds,$tName){
						// $m->from('musika@musikalessons.com','Musikalessons')->to($emailIds,'Musika')
						// ->subject('Requested Message from Teacher about the Musika Lesson.')
						// ->sender('musika@musikalessons.com','Musikalessons')
						// ->replyTo('musika@musikalessons.com','Musikalessons');
						// });
						$emailIds = ['naveensony02@gmail.com'];
				$details = [
					'accountType' => 'Musika',
						'StudentName' => $sname,
						'Email'=>'synapse235@gmail.com',
						'TeacherName'=>$tName,
						'Message'=>$message,
						'url'=>$url,
						'PHONE'=>$phone
				];
				
				Mail::to('naveensony02@gmail.com')->send(new \App\Mail\MsgRequested($details));
						
						$messageUser = new ModelsMessageUser();
						$messageUser->msg_from = 'Teacher';
						$messageUser->student_type = 'Prospective';
						$messageUser->to_id = 261914;//$std;
						$messageUser->from_id = 35;//$idNum;
						$messageUser->message = $message;
						$messageUser->flag_new_msg = 1;
						//$messageUser->save();
						//die; 261914/35
						
						$makeRequest = new ModelsMakeRequest();
						$makeRequest->teacherId = $idNum;
						$makeRequest->idNum = $std;
						$makeRequest->requestDate = Carbon::now()->timestamp;
						$makeRequest->accommodate = $rdolocation;
						$makeRequest->comments = $special_request;
						$makeRequest->lessonloc = $lessonlocation;
						$makeRequest->provide_lesson = $provide_lesson;
						$makeRequest->comment_provide_lesson = $day_time_request;
						$makeRequest->msg_to_student = $send_msg;
						$makeRequest->is_special_comment = $is_special_comment;
						$makeRequest->special_comment = $special_coment;

						if($makeRequest->save())
						{
							$prospectiveStd=ModelsProspectiveStudent::where('studentId', $std)->orWhere('combine_id', $std)->get()->toArray();
							$stdkey ="";
							foreach($prospectiveStd as $ikeys)
							{
							$stdkey .= $ikeys['idNum'];
							}
							 $inserted_request[] = $stdkey;
						}
						else
						{
							$prospectiveStd=ModelsProspectiveStudent::where('studentId', $std)->orWhere('combine_id', $std)->get()->toArray();
							$stdkey ="";
							 foreach($prospectiveStd as $ikeys)
								{
								$stdkey .= $ikeys['idNum'];
								}
							 $not_inserted_request[] = $stdkey;
						}
					}
					else{
						$prospectiveStd=ModelsProspectiveStudent::where('studentId', $std)->orWhere('combine_id', $std)->get()->toArray();
						$stdkey ="";
						 foreach($prospectiveStd as $ikeys)
							{
							$stdkey .= $ikeys['idNum'];
							}
						 $not_inserted_request[] = $stdkey;
					}
				}
				$not_inserted_requests = implode("<br>",$not_inserted_request);
				$inserted_requests = implode("<br>",$inserted_request);
				
				if($uknownmsg!="")
				{
					$uknownmsg = str_replace("##not_inserted_request","<input type='hidden' name='not_inserted_request' value='".implode(",",$not_inserted_request)."' >",$uknownmsg) ;
					$uknownmsg = str_replace("##inserted_request","<input type='hidden' name='inserted_request' value='".implode(",",$inserted_request)."' >",$uknownmsg) ;
					$uknownmsg = str_replace("##on_hold_request_ids","<input type='hidden' name='on_hold_request_ids' value='".$idNumPst."' >",$uknownmsg) ;
					$uknownmsg = str_replace("##to_be_posted_ids","<input type='hidden' name='to_be_posted_ids' value='".implode(",",$on_hold_request_ids)."' >",$uknownmsg) ;
				}
				else
				{
					if(count($not_inserted_request)>0)
					{
						if(count($not_inserted_request)>1)
						{
							//echo $strStudent= "students.";
							//echo $strThis = "these.";
						}
					}
					if(count($inserted_request)>0) 
					{
					$s="";
					$sthis="this";

						if(count($inserted_request)>1)
						{
							//echo $s = "s";
							//echo $sthis="any of these";
						}
					}		
				}
				$res['uknownmsg'] = $uknownmsg;
				$res['not_inserted_requests'] = $not_inserted_requests;
				$res['inserted_requests'] = $inserted_requests;
				$res['not_inserted_request'] = count($not_inserted_request);
				$res['inserted_request'] = count($inserted_request);
				$res['msg'] = "";
				$res['thaeading'] = "";	
				$res['tmsg'] = "";
				array_push($req_student,$res);
				
			}	
						
		//echo "<pre>";				
		//print_r($req_student);	
		//}
		//die;
		return view('prospectives_send_request',compact('req_student'));
		
	}
	public function backgroundcheck()
	{
		return view('backgroundcheck');
	}
	
	function viewProspectiveStatus(Request $request)
	{
		if ($request->has('pid')) {
			$pid = $request->pid;
			$sid = "";
			$arr = [];
			$arr['not_inserted_request'] = $request->not_inserted_request;
			$arr['inserted_request'] = $request->inserted_request;
			$arr['to_be_posted_ids'] = $request->to_be_posted_ids;
			$arr['emad'] = $request->emad;
			$arr['tid'] = $request->tid;
			$arr['cid'] = $request->cid;
			$arr['msg'] = "";
			$user = ModelsUser::where('id', Auth::id())->with('teacherId')->first();
			$prospective_students = ModelsConnection::with('prospectiveStudent', 'instrument', 'pro_status')->where('teacherid', $user->teacherId->remoteTeacherId)->where('prospectiveId', $pid)->where('dateInitInformed', '0000-00-00 00:00:00')->first();
			if (is_null($prospective_students)) {
				return Redirect::route('prospectives_send_request')->with('status', 'Provided student ID do not belongs to any students please Check!');
			}

			$status = ModelsProspectiveStatus::where('statusType', 0)->orWhere('statusType', 4)->orderBy('order', 'ASC')->orderBy('statusId', 'ASC')->get();
			return view('viewProspectiveStatus', compact('status','sid','arr', 'prospective_students'));
		}
		else {
			abort(404);
		}
	}
	
	public function updateProspective(Request $request)
	{
		$not_inserted_request = $request->not_inserted_request;
		$inserted_request = $request->inserted_request;
		$to_be_posted_ids = $request->to_be_posted_ids;
		$emad = $request->emad;
		$tid = $request->tid;
		//$cid = $request->cid;
		$sid = "";
		$arr = [];
		$arr['not_inserted_request'] = $request->not_inserted_request;
		$arr['inserted_request'] = $request->inserted_request;
		$arr['to_be_posted_ids'] = $request->to_be_posted_ids;
		$arr['emad'] = $request->emad;
		$arr['tid'] = $request->tid;
		$arr['cid'] = $request->cid;
		
		
		
		$cid = $request->cid;
		
		$user = ModelsUser::where('id', Auth::id())->with('teacherId')->first();
		$admission = ModelsConnection::with('prospectiveStudent', 'instrument', 'pro_status')->where('teacherid', $user->teacherId->remoteTeacherId)->where('connectId', $request->cid)->where('dateInitInformed', '0000-00-00 00:00:00')->first();
		
		//dd($user);
		if (is_null($admission)) {
			return Redirect::route('prospectives_send_request')->with('status', 'Invalid student or Invalid ID. Please try again.!');
		}

		$status = ModelsProspectiveStatus::where('statusId', $request->stat)->first();

		$status_view = ModelsProspectiveStatus::where('statusType', 0)->orWhere('statusType', 4)->orderBy('order', 'ASC')->orderBy('statusId', 'ASC')->get();
		//if($emad=""){
			$emad = "exit@musikalessons.com";	
		//}
		
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
					$prospective_students = $admission;
					$status = $status_view;
					$arr['msg'] = "You've already notified us about teaching ".$admission->prospectiveStudent->fisrstName."an introductory lesson.";
					return view('viewProspectiveStatus', compact('status','sid','arr', 'prospective_students'));
					//return back()->with("status","You've already notified us about teaching ".$admission->prospectiveStudent->fisrstName."an introductory lesson.");
				}
			else if (empty($request->introplus)) 
			{	
				$prospective_students = $admission;
				$status = $status_view;
				$arr['msg'] = "You have chosen to notify Musika about teaching ".$admission->prospectiveStudent->fisrstName."an introductory lesson. So we can better proceed with the next phase of the registration process for this student, please  select which best describes this student's demeanor.";
				return view('viewProspectiveStatus', compact('status','sid','arr', 'prospective_students'));
				//return back()->with("status","You have chosen to notify Musika about teaching ".$admission->prospectiveStudent->fisrstName."an introductory lesson. So we can better proceed with the next phase of the registration process for this student, please  select which best describes this student's demeanor.");
			}
			else { 
				
					$teacher_id = $user->teacherId->remoteTeacherId;
					$student_id = $admission->prospectiveStudent->studentId;
					$ps_teachers_first_login=new ModelsPsTeachersFirstLogin();
					$ps_teachers_first_login->teacher_id=$teacher_id;	
					$ps_teachers_first_login->student_id=$student_id;
					$ps_teachers_first_login->save();	
					$email = $admission->prospectiveStudent->email;
					
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
							$emailIds = ['scottbrady@musikalessons.com', 'nlee@musikalessons.com'];
							/* Mail::send('emails.first_lesson_emai', [
							'teacher_name' => $tname,
							'student_name'=>$fullname,
							'Account_Payee'=>$admission->prospectiveStudent->accountPayee,
							'Phone'=>$admission->prospectiveStudent->phone,
							'Phone2'=>$admission->prospectiveStudent->phone2,
							'Phone3'=>$admission->prospectiveStudent->phoneCel
							], function ($m) use ($fullname,$emailIds) {
							$m->to($emailIds, $fullname)
							->subject('Had first lesson, missing email')
							->sender('musika@musikalessons.com', 'Musikalessons')
							->returnPath('musika@musikalessons.com')
							->replyTo('musika@musikalessons.com', 'Musikalessons');
							});
							if (Mail::failures())
							{	
								$thankyou_note_message=$thankyou_note_message."  Also, This student ($fullname) doesn't have an email. Please call them as soon as possible for this info.";
							} */
					  }else{
							$prices['30'] = $prices['price_30'];
							$prices['45'] = $prices['price_45'];
							$prices['60'] = $prices['price_60'];
							$followup_type = "emails.update_status_emails.registration_followups";
							if(strtotime($admission->prospectiveStudent->dateEntered) <  1496729343)
							{
								$followup_type = "emails.update_status_emails.registration_followups_noslash";  // non strike through
							}	
						//$estuff=Email::where('ekey',$followup_type)->first();
							$syb='Followup - '.$admission->prospectiveStudent->firstName.' lessons with'.$user->teacherId->firstName;
							$emailIds = ['scottbrady@musikalessons.com', 'nlee@musikalessons.com'];
							/* Mail::send($followup_type, [
							't_firstname'=>$user->teacherId->firstName,
							't_lastname'=>$user->teacherId->lastName,
							'STUDENT' => $admission->prospectiveStudent,
							'insName'=>$admission->instrument->instrumentName,
							'key'=> explode('-',$admission->prospectiveStudent->idNum),
							'RATES'=>$prices,
							'PHONE'=>$phone
							], function ($m) use ($syb,$emailIds) {
							$m->from('musika@musikalessons.com','Musika Music Lessons ')->to($emailIds)
							->subject("$syb")
							->sender('musika@musikalessons.com', 'Musikalessons')
							->returnPath('musika@musikalessons.com')
							->setContentType('text/html');
							});
							if (!Mail::failures())
							{
								$thank = 1;
								$counter = Counter::updateOrCreate(
								['page' => $_SERVER['PHP_SELF']],
								['hits' => +1]);
							} */
						}
					
					$ur=ModelsConnection::where('connectId',$cid)->update(
					[
						'dateInitInformed'=>date("Y-m-d H:i:s",$now),
						'status'=>0,
						'intro_comment'=>'On '.date("m/d @ h:i a",$now).' teacher said student is '.$introplus.','.$cid
					]);
					
					if ($ur<1) {
						Mail::raw("Musika Error (updating teacher new first lesson) connectId = $cid", function ($message){
							$message->from('musika@musikalessons.com')->to('accounting@musikalessons.com','Musika Error!');
						});
					}
				}else if ($is_update_student==0) {
						}
				 else{
					Mail::raw("Musika Error (send teacher new first lesson) connectId = $cid", function ($message) {
					$message->from('musika@musikalessons.com')->to('accounting@musikalessons.com','Musika Error!');
				});
				}
		$state = $admission->prospectiveStudent->stateId;
		$pkgPrices = [[35,50,68],[28,42,56],[35,50,68]];
		$sub = "Your Music Lessons with ".$tname;
		if($admission->prospectiveStudent->metros_id > 0){
		/**
		Mail::send('emails.update_status_emails.initial_lesson_indicate',[
		'isPackage'=>$isPackage,
		'fullname'=>$fullname,
		'prices'=>$prices,
		'isLower'=>$isLower,
		'tname'=>$tname
		],function($m) use ($sub) {
			$m->from('musika@musikalessons.com','Musika')->to('synapse235@gmail.com','Musika')
			->subject($sub);
		});**/
}

	$uknownState = [];
			$uknownTime = [];
			$uknownconnectId = [];
			$aemad = [];
			$atid = [];
			$acid = [];
			$apid = [];
			$req_student = array();	
			$unkowncount = 0; 
			$i=0;$j=0;
			$timeDif =0;
			$current_time = time();
			$hours_past = strtotime('-24 hours',$current_time);
			
			$students= ModelsConnection::selectRaw("connections.prospectiveId AS prospectiveId,connections.connectId AS connectId,connections.instId AS instId,connections.dateMade AS dateMade,connections.status AS status, prospective_students.firstName AS firstName, prospective_students.lastName AS lastName,  prospective_students.studentId AS pid")
						->rightJoin('prospective_students','connections.prospectiveId','=','prospective_students.studentId')->where('connections.teacherId',$tid)->where('connections.dateInitInformed','0000-00-00 00:00:00')->where(DB::raw('UNIX_TIMESTAMP(connections.dateMade)'),'<',$hours_past)->where('connections.status', '<', 1)->get()->toArray();
			foreach($students as $row)
			{
			if($row['status']<1)
			{	
				$timeDif = (time()- strtotime($row["dateMade"]))/(60*60);
				if ($timeDif >= 24)
				{
					$uknownState[] = $row["firstName"] . " ". $row["lastName"];
					$uknownconnectId[] = "<a href='javascript:document.f".$j.".submit();'> Click here to update status of ". $row["firstName"] . " ". $row["lastName"] . "</a>";
					$aemad[] = "<input type=hidden name=emad value='".$emad."'>\n";
					$atid[] = "<input type=hidden name=tid value='".$tid."'>\n";
					$acid[] = "<input type=hidden name=cid value='".$row["connectId"]."'>\n";
					$apid[] = "<input type=hidden name=pid value='".$row["pid"]."'>\n";
					$csrftoken[] = csrf_field()."\n";
					$uknownTime[] = intval($timeDif);
					$j++;
				}
			}	
				$i++;
				//$on_hold_request_ids[]= $row["connectId"];	
			}
			$unkowncount = $unkowncount + count($uknownState);
			
			$strStudent= "student";
			$strThis = "this";

			if(count($uknownState)>1)
			{
				 $strStudent= "students";
				 $strThis = "these";
			} 
			$uknownmsg= "";
				

			if(sizeof($uknownState))
			{
				$uknownmsg.= '<strong>Please update Following "' . $strStudent . '" also </strong><br> ';

				for($i=0;$i<sizeof($emad);$i++)
				{
					$uknownmsg .= "<form action='".route('viewProspectiveStatus')."' method=post name='f$i'> 
			<input type='hidden' name='not_inserted_request' value='".$not_inserted_request ."'>
			<input type='hidden' name='inserted_request' value='".$inserted_request ."'>". $aemad[$i] . $atid[$i] . $acid[$i]. $uknownconnectId[$i]. $csrftoken[$i] .$apid[$i] ."</form>";
				}
			}
			$res['uknownmsg'] = $uknownmsg;
			$res['not_inserted_requests'] = $not_inserted_request;
			$res['inserted_requests'] = $inserted_request;
			if($not_inserted_request==""){
				$res['not_inserted_request'] = 0;	
			}else{
				$res['not_inserted_request'] = 1;
			}
			if($inserted_request==""){
				$res['inserted_request'] = 0;	
			}else{
				$res['inserted_request'] = 1;
			}
	
		if ($thank) {
			//return Redirect::route('prospectives_send_request')->with(['status'=>"Thank you for your submission. It has been sent to Musika",'thaeading'=>$thankyou_note_heading,'tmsg'=>$thankyou_note_message]);
			$res['msg'] = "Thank you for your submission. It has been sent to Musika";	
			$res['thaeading'] = $thankyou_note_heading;	
			$res['tmsg'] = $thankyou_note_message;	
		}
		else
		{
			//return Redirect::route('prospectives_send_request')->with(['status'=>"There was an error in sending your submission",'thaeading'=>$thankyou_note_heading,'tmsg'=>$thankyou_note_message]);
			$res['msg'] = "There was an error in sending your submission";	
			$res['thaeading'] = $thankyou_note_heading;	
			$res['tmsg'] = $thankyou_note_message;		
		}
		array_push($req_student,$res);
		return view('prospectives_send_request',compact('req_student'));		

	}
}else {
			
	$is_update_status=ModelsConnection::where('connectId',$cid)->update(['status'=>$request->stat]);
	
		if ($is_update_status<0) {
			$msg = "There was a problem updating the status of your prospective student.go back and try again";
			/* Mail::raw("Musika error (PS update one status error)", function ($message) {
					$message->to('accounting@musikalessons.com');
			});
			$prospective_students = $admission;
			$status = $status_view;
			$arr['msg'] = $msg;
			return view('viewProspectiveStatus', compact('status','sid','arr', 'prospective_students')); */
			//return back()->with('status',$msg);
		}	
		else if ($is_update_status>0) 
			{
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
								$emailIds = ['scottbrady@musikalessons.com', 'nlee@musikalessons.com'];
								/* Mail::send('emails.update_status_emails.teacher_change_status',[
								'TEACHER_NAME'=>$tname,
								'ACCOUNT_PAYEE'=>$admission->prospectiveStudent->accountPayee,
								'DATE_INFORMED'=>date("n/d",$now),
								'STUDENT_NAME'=>$fullname,
								'DT_EXTRA'=>$dt_extra
								],function($message) use($isPackage,$admission,$fullname,$emailIds){
									if(!$isPackage){
										$replyto=$admission->prospectiveStudent->accountPayee;
										}else{
											$replyto=$admission->prospectiveStudent->email;
											}
									$message->to($emailIds,'Forward - Requests')
									->subject("Student requesting different teacher $fullname")
									->sender('musika@musikalessons.com', 'Musika')
									->returnPath('musika@musikalessons.com');
								});
								if (Mail::failures()){
									//dd('Mail Fail');			
								} */
							}

			$uknownState = [];
			$uknownTime = [];
			$uknownconnectId = [];
			$aemad = [];
			$atid = [];
			$acid = [];
			$apid = [];
			$req_student = array();	
			$unkowncount = 0; 
			$i=0;$j=0;
			$timeDif =0;
			$current_time = time();
			$hours_past = strtotime('-24 hours',$current_time);
			
			$students= ModelsConnection::selectRaw("connections.prospectiveId AS prospectiveId,connections.connectId AS connectId,connections.instId AS instId,connections.dateMade AS dateMade,connections.status AS status, prospective_students.firstName AS firstName, prospective_students.lastName AS lastName,  prospective_students.studentId AS pid")
						->rightJoin('prospective_students','connections.prospectiveId','=','prospective_students.studentId')->where('connections.teacherId',$tid)->where('connections.dateInitInformed','0000-00-00 00:00:00')->where(DB::raw('UNIX_TIMESTAMP(connections.dateMade)'),'<',$hours_past)->where('connections.status', '<', 1)->get()->toArray();
			foreach($students as $row)
			{
			if($row['status']<1)
			{	
				$timeDif = (time()- strtotime($row["dateMade"]))/(60*60);
				if ($timeDif >= 24)
				{
					$uknownState[] = $row["firstName"] . " ". $row["lastName"];
					$uknownconnectId[] = "<a href='javascript:document.f".$j.".submit();'> Click here to update status of ". $row["firstName"] . " ". $row["lastName"] . "</a>";
					$aemad[] = "<input type=hidden name=emad value='".$emad."'>\n";
					$atid[] = "<input type=hidden name=tid value='".$tid."'>\n";
					$acid[] = "<input type=hidden name=cid value='".$row["connectId"]."'>\n";
					$apid[] = "<input type=hidden name=pid value='".$row["pid"]."'>\n";
					$csrftoken[] = csrf_field()."\n";
					$uknownTime[] = intval($timeDif);
					$j++;
				}
			}	
				$i++;
				//$on_hold_request_ids[]= $row["connectId"];	
			}
			$unkowncount = $unkowncount + count($uknownState);
			
			$strStudent= "student";
			$strThis = "this";

			if(count($uknownState)>1)
			{
				 $strStudent= "students";
				 $strThis = "these";
			} 
			$uknownmsg= "";
				

			if(sizeof($uknownState))
			{
				$uknownmsg.= '<strong>Please update Following "' . $strStudent . '" also </strong><br> ';

				for($i=0;$i<sizeof($emad);$i++)
				{
					$uknownmsg .= "<form action='".route('viewProspectiveStatus')."' method=post name='f$i'> 
			<input type='hidden' name='not_inserted_request' value='".$not_inserted_request ."'>
			<input type='hidden' name='inserted_request' value='".$inserted_request ."'>". $aemad[$i] . $atid[$i] . $acid[$i]. $uknownconnectId[$i]. $csrftoken[$i] .$apid[$i] ."</form>";
				}
			}
			$res['uknownmsg'] = $uknownmsg;
			$res['not_inserted_requests'] = $not_inserted_request;
			$res['inserted_requests'] = $inserted_request;
			if($not_inserted_request==""){
				$res['not_inserted_request'] = 0;	
			}else{
				$res['not_inserted_request'] = 1;
			}
			if($inserted_request==""){
				$res['inserted_request'] = 0;	
			}else{
				$res['inserted_request'] = 1;
			}	
			
			$res['msg'] = "You have successfully updated the status of <strong> ".$admission->prospectiveStudent->firstName.' '.$admission->prospectiveStudent->lastName." </strong> and notification is being sent to Musika.";
			$res['thaeading'] = "";	
			$res['tmsg'] = "";
			//print_r($res);
			//die;
			array_push($req_student,$res);
					return view('prospectives_send_request',compact('req_student'));	
					//return Redirect::route('prospectives_send_request')->with("status","You have successfully updated the status of <strong> ".$admission->prospectiveStudent->firstName.' '.$admission->prospectiveStudent->lastName." </strong> and notification is being sent to Musika.");
				}else {
					$old_St=$admission->pro_status->statusDesc;
					$new_St=$status->statusDesc;
					return back()->with('status',"email=$emad,	tid=$tid,cid= $cid,	old status=$old_St,	new Status=$new_St");
					}
		}else{
			$prospective_students = $admission;
			$status = $status_view;
			$arr['msg'] = "We notice you left the status the same";
			return view('viewProspectiveStatus', compact('status','sid','arr', 'prospective_students'));
			//return back()->with('status',"We notice you left the status the same");
		}
	}
		

		//return view('updateProspective');
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
	public function assignments()
    {
		return view('assignments');
	}	
		
}
