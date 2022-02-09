<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;
use App\Teacher;
use App\TeacherName;
use App\User;
use App\TeacherInstrument;
use App\TeachersToInstrument;
use App\TeachersPolygon;
use App\TeachersToStudio;
use App\SpotlightQuestion;
use App\TeacherSpotlight;
use App\OnlineTeachers1;
use App\OnlineTeachers2;
use App\Style;
use App\TeachersToStyle;
use App\TeachersImgCDN;
use App\TeachersTimeTable;
use App\TeachersPhoto;
use App\Video;
use App\Zipcode;
use App\Studio;
use App\Admission;
use App\StudentName;
use App\Connection;
use App\Instrument;
use Validator;
use Image;
use Cloudder;
use App\LessonRecord;
use App\ProspectiveStudent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Email;
use App\Mail\RegistrationFollowUps;
use App\Models\OnlineTeachers1 as ModelsOnlineTeachers1;
use App\Models\OnlineTeachers2 as ModelsOnlineTeachers2;
use App\Models\SpotlightQuestion as ModelsSpotlightQuestion;
use App\Models\State as ModelsState;
use App\Models\Studio as ModelsStudio;
use App\Models\Style as ModelsStyle;
use App\Models\Teacher as ModelsTeacher;
use App\Models\TeacherInstrument as ModelsTeacherInstrument;
use App\Models\TeacherName as ModelsTeacherName;
use App\Models\TeacherPaymentMethod as ModelsTeacherPaymentMethod;
use App\Models\TeachersImgCDN as ModelsTeachersImgCDN;
use App\Models\TeachersPhoto as ModelsTeachersPhoto;
use App\Models\TeachersPolygon as ModelsTeachersPolygon;
use App\Models\TeacherSpotlight as ModelsTeacherSpotlight;
use App\Models\TeachersTimeTable as ModelsTeachersTimeTable;
use App\Models\TeachersToInstrument as ModelsTeachersToInstrument;
use App\Models\TeachersToStudio as ModelsTeachersToStudio;
use App\Models\TeachersToStyle as ModelsTeachersToStyle;
use App\Models\User as ModelsUser;
use App\Models\Video as ModelsVideo;
use App\Models\Zipcode as ModelsZipcode;
use Illuminate\Contracts\Filesystem\Filesystem;
use Carbon\Carbon;
use App\State;
use App\TeacherPaymentMethod;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
class TeacherprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		
		$teacher_profile=ModelsTeacherName::with('yourState')->where('teacherId',$user->teacherId->remoteTeacherId)->first();
		
		$statename=ModelsState::all();	
		return view('teacher_profile',compact('teacher_profile','statename'));
    }
	
	public function updatePassword(Request $request)
	{
		$at=$this->validate($request, [
			'password' => 'required|confirmed'
		]);
	/* 	echo $request->id.' - ';
		echo Auth::id().' - '; */
		/* echo $request->password.'<br>';
		echo $oldPwd = Hash::make('1234').'<br>';
		
		echo $newPwd = bcrypt($request->password).'<br>';
		if(Hash::make('1234') == bcrypt($request->password)){
			echo "true";
		}
		else{
			echo "false";
		}
		die; */
		
		//echo $request->password;
		//die;
		
		$is_user_updated=ModelsUser::where('id',Auth::id())->update([
		 'passwordHash'=>md5($request->password),
		 'password'=>Hash::make($request->password)
		]);
		
		if($is_user_updated)
		{
			$is_password_update=ModelsTeacherName::where('teacherId',$request->id)->update([
			'password'=>$request->password
			]);
			//print_r($is_password_update); die;
			if($is_password_update)
			{
				return back()->with('status','Password has been updated successfully');	
			}
			else
			{
				return back()->with('status','New password cannot be the same as previously used password.
');
			}
		}
		else
		{
			return back()->with('status','Something went wrong');	
		}
	}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		//dd(TeacherName::where('teacherId',$id)->get());
		$at=$this->validate($request, [
		'first_name'=>'required',
		'last_name'=>'required',
		'phone'=>'required|min:7|numeric',
		'email' =>'unique:mysqlsystem.teacherNames,email,'.$id.',teacherId',
		'city'=>'required',
		'zip' => 'required|regex:/\b\d{5}\b/'
       ],[
		'phone.required'    => 'Phone number is required. Phone number must be 7 digits without special characters.',
		'phone.numeric'    => 'Phone number must be 7 digits without special characters.',
		'phone.min'    => 'Phone number must be 7 digits without special characters.',
		'city.required'    => 'City is required',
		'zip.required'    => 'ZipCode is required',
		'zip.regex'    => 'The ZipCode should be in valid format.'
	   ]);
	   if($at==null)
	   {
		   $this->validate($request, [
		     'email' => [
                Rule::unique('User')->ignore(Auth::id())
				]
			]);	
	   }
		$is_profile_update=ModelsTeacherName::where('teacherId',$id)->update([
		'firstName'=>$request->first_name,
		'lastName'=>$request->last_name,
		'email'=>$request->email,
		'addressL1'=>$request->add1,
		'addressL2'=>$request->add2,
		'city'=>$request->city,
		'stateId'=>$request->state,
		'zipCode'=>$request->zip,
		'phone'=>$request->phone
		]);
		if($is_profile_update)
		{
			$fullname = $request->first_name.' '.$request->last_name;
			$address = $request->add1.' '.$request->add2;
			//$emailIds = ['scottbrady@musikalessons.com', 'nlee@musikalessons.com'];
			$emailIds = ['musika@musikalessons.com'];
			// Mail::send('emails.account_success', [
			// 'accountType' => 'Musika',
			// 'Name' => $fullname,
			// 'Email'=>$request->email,
			// 'Address'=>$address,
			// 'City'=>$request->city,
			// 'State'=>$request->state,
			// 'ZipCode'=>$request->zip,
			// 'Phone'=>$request->phone
			// ], function ($m) use ($fullname,$emailIds){
			// $m->from('musika@musikalessons.com','Musikalessons')->to($emailIds,'Musika')
			// ->subject('Teacher has updated profile information.')
			// ->sender('musika@musikalessons.com','Musikalessons')
			// ->replyTo('musika@musikalessons.com','Musikalessons');
			// });

			$emailIds = ['naveensony02@gmail.com'];
				$details = [
					'accountType' => 'Musika',
			'Name' => $fullname,
			'Email'=>$request->email,
			'Address'=>$address,
			'City'=>$request->city,
			'State'=>$request->state,
			'ZipCode'=>$request->zip,
			'Phone'=>$request->phone
				];
				
				Mail::to('naveensony02@gmail.com')->send(new \App\Mail\Accountsuccess($details));
			
			$emailId2 = $request->email;
			// Mail::send('emails.account_success', [
			// 'accountType' => 'Teacher',
			// 'fName' => $request->first_name,
			// 'lName' => $request->last_name,
			// 'Email'=>$request->email,
			// 'Address'=>$address,
			// 'City'=>$request->city,
			// 'State'=>$request->state,
			// 'ZipCode'=>$request->zip,
			// 'Phone'=>$request->phone
			// ], function ($m) use ($fullname,$emailId2){
			// $m->from('musika@musikalessons.com','Musikalessons')->to($emailId2,$fullname)
			// ->subject('Your profile information has been updated.')
			// ->sender('musika@musikalessons.com','Musikalessons')
			// ->replyTo('musika@musikalessons.com','Musikalessons');
			// });

			$emailIds = ['naveensony02@gmail.com'];
				$details = [
				'accountType' => 'Teacher',
			'fName' => $request->first_name,
			'lName' => $request->last_name,
			'Email'=>$request->email,
			'Address'=>$address,
			'City'=>$request->city,
			'State'=>$request->state,
			'ZipCode'=>$request->zip,
			'Phone'=>$request->phone
				];
				Mail::to('naveensony02@gmail.com')->send(new \App\Mail\Accountsuccessteacher($details));

				$is_teacher_update=ModelsTeacher::where('userId',Auth::id())->update([
				'firstName'=>$request->first_name,
				'lastName'=>$request->last_name,
				'postalCode'=>$request->zip
				]);
				if($is_teacher_update)
				{
						$is_user_updated=ModelsUser::where('id',Auth::id())->update([
						'login'=>$request->email,
						'email'=>$request->email,
						'firstName'=>$request->first_name,
						'lastName'=>$request->last_name
						]);
						if($is_user_updated)
						{
							return back()->with('status','Your account information has beet updated successfully.');	
						}
						else
						{
							return back()->with('status','Your account information has been updated successfully.');	
						}
				}
				else
				{
					return back()->with('status','Your account information has been updated successfully.');
				}
		}
		else
		{
				return back()->with('status','Your account information has been updated successfully.');	
		}
		// foreach($_POST as $key=>value)
		// {
			// TeacherName::where('teacherId',$id)->updaet([
				// $key=>$value
			// ]);
		// }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
		public function profileTest()
	{ 
		        $user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teaches['teacher_id'] = $user->teacherId->remoteTeacherId;
		$teaches['avatar'] = $user->teacherId->avatar;
		$teaches['teachesHome'] = $user->teacherId->teachesHome;
		$teaches['teachesStudio'] = $user->teacherId->teachesStudio;
		$teaches['teachesOnline'] = $user->teacherId->teachesOnline;
		$teaches['aboutTeacher'] = $user->teacherId->aboutTeacher;
		$teaches['experience'] = $user->teacherId->experience;
		$teaches['methodsUsed'] = $user->teacherId->methodsUsed;
		$teaches['lessonsStyle'] = $user->teacherId->lessonsStyle;
		if($user->teacherId->agesTought!='')
		{		
			$agestVal = explode(';',$user->teacherId->agesTought);
			$teaches['agesTought1'] = $agestVal[0];
			$teaches['agesTought2'] = $agestVal[1];
		}
		else
		{
			$teaches['agesTought1'] = '';
			$teaches['agesTought2'] = '';
		}
		if($user->teacherId->levelTought!='')
		{
			$levelVal = explode(';',$user->teacherId->levelTought);
			$teaches['levelTought1'] = $levelVal[0];
			$teaches['levelTought2'] = $levelVal[1];
		}
		else
		{
			$teaches['levelTought1'] = '';
			$teaches['levelTought2'] = '';
		}	
		//dd($teaches);
		$teaches['db_degrees'] = $user->teacherId->degrees;
		$teaches['db_training'] = $user->teacherId->training;
		if($user->teacherId->degrees!='')
		{
			$degreeVal1 = explode('</p>',$user->teacherId->degrees);
			$degrees=[];
			for($i=0;$i<(count($degreeVal1)-1);$i++)
			{	
				$degreeVal2 = explode('<p>',$degreeVal1[$i]);
				array_push($degrees,$degreeVal2[1]);
			}
			$teaches['degrees'] = $degrees;
		}
		else
		{
			$teaches['degrees'] = $user->teacherId->degrees;
		}
		if($user->teacherId->training!='')
		{
			$trainingVal1 = explode(', ',$user->teacherId->training);
			$training=[];
			for($i=0;$i<(count($trainingVal1));$i++)
			{	
				$trainingVal2 = explode(': ',$trainingVal1[$i]);
				$value['TeachersModeltraining'] = $trainingVal2[0];
				$value['degreeSchoolName'] = $trainingVal2[1];
				array_push($training,$value);
			}
			$teaches['training'] = $training;	
		}
		else
		{
			$teaches['training'] = $user->teacherId->training;
		}
		$instruments=ModelsTeacherInstrument::all();
		$TeachersToInstruments = ModelsTeachersToInstrument::where('teacherId',$user->teacherId->id)->get();
		foreach($TeachersToInstruments as $inst_data){
			$insturmentIds[] = $inst_data->instrumentId;
		}
		$OnlineTeachers = ModelsOnlineTeachers1::where('teacher_id',$user->teacherId->id)->first();
		//dd($OnlineTeachers);
		$stylesList=ModelsStyle::all();
		//dd($stylesList);
		$teachersToStyle = ModelsTeachersToStyle::where('teacherId',$user->teacherId->id)->get();
		foreach($teachersToStyle as $style_data){
			$TeacherStyleIds[] = $style_data->styleId;
		}
		//print_r($TeacherStyleIds); die;
		$TeachersPolygons=ModelsTeachersPolygon::where('teacherId',$user->teacherId->id)->get();
		$TeachersToStudio=ModelsTeachersToStudio::with('studio')->where('teacherId',$user->teacherId->id)->get();
		//dd($TeachersToStudio);
		$studioLoc = [];
		foreach($TeachersToStudio as $studio_data)
		{
			$data['lat'] = $studio_data->studio->lat;
			$data['lng'] = $studio_data->studio->lng;
			array_push($studioLoc,$data);
		}
		$StudioLocation = json_encode($studioLoc);
		$poly_data=[];
		foreach($TeachersPolygons as $data)
		{
			$val1 = explode(')',$data->polygon);
			$poly_location=[];
			for($i=0;$i<(count($val1)-1);$i++)
			{	
				$val2 = explode('(',$val1[$i]);
				$val3 = explode(', ',$val2[1]);
				$locs['latitude'] = $val3[0];
				$locs['longitude'] = $val3[1];
				array_push($poly_location,$locs);
			}
			$polygon_data['Id'] = $data->Id; 
			$polygon_data['teacherId'] = $data->teacherId; 
			$polygon_data['daysAvailable'] = $data->daysAvailable; 
			$polygon_data['polygon'] = $poly_location; 
			array_push($poly_data,$polygon_data);
		}
		$TeacherPolygonsData = json_encode($poly_data);
		// print_r($poly_data);	
		//die;
		//dd($TeacherPolygonsData);
		$teacher_profile=ModelsTeacherName::with('yourState')->where('teacherId',$user->teacherId->remoteTeacherId)->first();
		//echo $teacher_profile->zipCode;
		$Zipcodes=ModelsZipcode::where('zipcode',$teacher_profile->zipCode)->first();
		//echo $Zipcodes->latitude.' '.$Zipcodes->longitude;
		//die;
		$latlon['lat'] = $Zipcodes->latitude;
		$latlon['lng'] = $Zipcodes->longitude;
		$teachersTimeTable = ModelsTeachersTimeTable::where('teachers_id',$user->teacherId->id)->first();
		$timeTableresult = unserialize($teachersTimeTable->teachers_table);
		//
		$weeks = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
		$hours = ['01am'=>'A','02am'=>'B','03am'=>'C','04am'=>'D','05am'=>'E','06am'=>'F','07am'=>'G','08am'=>'H','09am'=>'I','10am'=>'J','11am'=>'K','12am'=>'L','01pm'=>'M','02pm'=>'N','03pm'=>'O','04pm'=>'P','05pm'=>'Q','06pm'=>'R','07pm'=>'S','08pm'=>'T','09pm'=>'U','10pm'=>'V','11pm'=>'W','12pm'=>'X'];
		//print_r($hours); die;
		foreach($weeks as $week_result)
		{
			foreach($hours as $key => $value){
				//echo $key.' '. $value;
				if($week_result=='Sunday')
				{
				  	$table_data[$value.'01'] = $timeTableresult[$week_result][$key]['Home'];
				  	$table_data[$value.'02'] = $timeTableresult[$week_result][$key]['Studio'];	
				  	$table_data[$value.'03'] = $timeTableresult[$week_result][$key]['Online'];	
				}
				if($week_result=='Monday')
				{
				  	$table_data[$value.'04'] = $timeTableresult[$week_result][$key]['Home'];
				  	$table_data[$value.'05'] = $timeTableresult[$week_result][$key]['Studio'];	
				  	$table_data[$value.'06'] = $timeTableresult[$week_result][$key]['Online'];	
				}
				if($week_result=='Tuesday')
				{
				  	$table_data[$value.'07'] = $timeTableresult[$week_result][$key]['Home'];
				  	$table_data[$value.'08'] = $timeTableresult[$week_result][$key]['Studio'];	
				  	$table_data[$value.'09'] = $timeTableresult[$week_result][$key]['Online'];	
				}
				if($week_result=='Wednesday')
				{
				  	$table_data[$value.'10'] = $timeTableresult[$week_result][$key]['Home'];
				  	$table_data[$value.'11'] = $timeTableresult[$week_result][$key]['Studio'];	
				  	$table_data[$value.'12'] = $timeTableresult[$week_result][$key]['Online'];	
				}
				if($week_result=='Thursday')
				{
				  	$table_data[$value.'13'] = $timeTableresult[$week_result][$key]['Home'];
				  	$table_data[$value.'14'] = $timeTableresult[$week_result][$key]['Studio'];	
				  	$table_data[$value.'15'] = $timeTableresult[$week_result][$key]['Online'];	
				}
				if($week_result=='Friday')
				{
				  	$table_data[$value.'16'] = $timeTableresult[$week_result][$key]['Home'];
				  	$table_data[$value.'17'] = $timeTableresult[$week_result][$key]['Studio'];	
				  	$table_data[$value.'18'] = $timeTableresult[$week_result][$key]['Online'];	
				}
				if($week_result=='Saturday')
				{
				  	$table_data[$value.'19'] = $timeTableresult[$week_result][$key]['Home'];
				  	$table_data[$value.'20'] = $timeTableresult[$week_result][$key]['Studio'];	
				  	$table_data[$value.'21'] = $timeTableresult[$week_result][$key]['Online'];	
				}
			} 
			//print_r($timeTableresult['Tuesday']);
		}
		$schedule_data = $table_data;
		$spotlightQuestion = ModelsSpotlightQuestion::all();
		$teacherSpotlight = ModelsTeacherSpotlight::where('teacherId',$user->teacherId->id)->orderBy('qid','ASC')->get();
		if(!$teacherSpotlight->isEmpty())
		{	
			$arr_ans = [];
			foreach($teacherSpotlight as $ans)
			{
				array_push($arr_ans,$ans->answer);
			}
			$all_ans = implode(',',$arr_ans);
		}
		else
		{
			$all_ans = '';
		}
		$teachersPhotos = ModelsTeachersPhoto::where('teacherId',$user->teacherId->id)->get();
		$VideoInfo1 = ModelsVideo::where('id',$user->teacherId->videoId)->first();
		$VideoInfo2 = ModelsVideo::where('id',$user->teacherId->videoId2)->first();
		//dd($VideoInfo2);
		//print_r($timeTableresult[$week_result]); 11565 $user->teacherId->id
		//die;
		return view('test',compact('latlon','instruments','insturmentIds','TeacherPolygonsData','StudioLocation','teaches','stylesList','TeacherStyleIds','schedule_data','spotlightQuestion','teacherSpotlight','teachersPhotos','VideoInfo1','VideoInfo2','OnlineTeachers','all_ans'));
	}
	public function TeritoryLocations(Request $request)
	{
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacherId = $user->teacherId->id;
		$mapLocations = $request->mapLocations;
		$weekdays = $request->input('weekdays');
		$teachesHome = $request->teachesHome;
		$teachesStudio = $request->teachesStudio;
		$online_lessons = $request->online_lessons;
		$days = implode(',',$weekdays);
		$polygonLoc = '';
		foreach($mapLocations as $location){
			$polygonLoc .= '('.$location['latitude'].', '.$location['longitude'].')';
		}
		//echo $polygonLoc;
		$Teachers = ModelsTeacher::where('remoteTeacherId',$teacherId)->update(['teachesHome'=>$teachesHome,'teachesStudio'=>$teachesStudio]);
		//$Teachers = Teacher::where('remoteTeacherId',$teacherId)->update(['teachesHome'=>$teachesHome,'teachesStudio'=>$teachesStudio]);
		$TeachersPolygons = new ModelsTeachersPolygon();
		$TeachersPolygons->teacherId = $teacherId;
		$TeachersPolygons->daysAvailable = $days;
		$TeachersPolygons->polygon = $polygonLoc;
		if($TeachersPolygons->save())
		{
			$json = json_encode(['status'=>'true']);
			return $json;
		}
		die;
	}
	public function StudiosLocations(Request $request)
	{
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacherId = $user->teacherId->remoteTeacherId;
		$latitute = round($request->latitute,4);
		$longitude = round($request->longitude,4);		
		$url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=$latitute,$longitude&sensor=false";
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_ENCODING, "");
		$curlData = curl_exec($curl);
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
		$teachesHome = $request->teachesHome;
		$teachesStudio = $request->teachesStudio;
		$online_lessons = $request->online_lessons;
		$Teachers = ModelsTeacher::where('remoteTeacherId',$teacherId)->update(['teachesHome'=>$teachesHome,'teachesStudio'=>$teachesStudio]);
		if($latitute=='' && $longitude ==''){
			$json = json_encode(['status'=>'true']);
				return $json;
				exit;
		}
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
				$json = json_encode(['status'=>'true']);
				return $json;
			}	
		}
		exit;
	}
	public function RemoveStudiosLocations(Request $request)
	{
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacherId = $user->teacherId->remoteTeacherId;
		$latitute = $request->latitute;
		$longitude = $request->longitude;
		$ts = ModelsTeachersToStudio::where('teacherId',$user->teacherId->id)->get();
		foreach($ts as $s){
			$studios = ModelsStudio::where('id', $s->studioId)->get();
				foreach($studios as $ss){
					if($ss->lat== $latitute || $ss->lng == $longitude){
						ModelsTeachersToStudio::where('studioId',$ss->id)->delete();
						ModelsStudio::where('id', $ss->id)->delete();
						$json = json_encode(['status'=>'true']);
						return $json;
					} else {
					}
				}
		}
		exit;
	}
	public function teachSection(Request $request){
		//Session::set('postProfile', 'true');
		//echo Session::get('postProfile');
		//$request->session()->put('postProfile', 'abc');
		//Session::put('postProfile', 'abc');
		//echo $value = $request->session()->get('postProfile');
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacherId = $user->teacherId->id;
		$remote_id = $user->teacherId->remoteTeacherId;
		$email = $user->email;
		$teachesHome = $request->teachesHome;
		$teachesStudio = $request->teachesStudio;
		$online_lessons = $request->online_lessons;
		$checkOnlineLessons = $request->checkOnlineLessons;
		if($teachesHome){
			ModelsTeacher::where('id',$teacherId)->update(['teachesHome'=>$teachesHome]);
		}
		if($teachesStudio){
			ModelsTeacher::where('id',$teacherId)->update(['teachesStudio'=>$teachesStudio]);
		}
		if($checkOnlineLessons){
			ModelsTeacher::where('id',$teacherId)->update(['teachesOnline'=>$checkOnlineLessons]);
		}
		if($checkOnlineLessons=='yes'){
			//echo $online_lessons;die;
			$TeachersToInstruments = ModelsTeachersToInstrument::where('teacherId',$user->teacherId->id)->get();
			$insId = [];
			$OnlineTeachersData = [];
			foreach($TeachersToInstruments as $teacherIns)
			{
				array_push($insId,$teacherIns->instrumentId);
				$field['teacher_id'] = $teacherId;
				$field['remote_id'] = $remote_id;
				$field['instrument_id'] = $teacherIns->instrumentId;
				$field['email'] = $email;
				if($online_lessons==0)
				{
					$field['is_active'] = $online_lessons;
				}
				array_push($OnlineTeachersData,$field);
			}
			//print_r($OnlineTeachersData);
			//die;
			$OnlineTeachers1 = ModelsOnlineTeachers1::where('teacher_id',$teacherId)->orderBy('id','ASC')->get();
			$onlineInsId = [];
			foreach($OnlineTeachers1 as $data)
			{
				array_push($onlineInsId,$data->instrument_id);
			}
			$OnlineTeachers2 = ModelsOnlineTeachers2::where('teacher_id',$teacherId)->get();
			if($OnlineTeachers1->isEmpty())
			{	
				$insertOnlineTeachers1 = ModelsOnlineTeachers1::insert($OnlineTeachersData);
				if($OnlineTeachers2->isEmpty())
				{
					$insertOnlineTeachers2 = ModelsOnlineTeachers2::insert($OnlineTeachersData);
				}
				else
				{
					$deleteOnlineTeachers2 = ModelsOnlineTeachers2::where('teacher_id',$teacherId)->delete();
					$insertOnline_Teachers2 = ModelsOnlineTeachers2::insert($OnlineTeachersData);
				}
			}
			else
			{
				$result1=array_diff($insId,$onlineInsId);
				$result2=array_diff($onlineInsId,$insId);
				if(empty($result1) && empty($result2))
				{
					if($online_lessons!=$OnlineTeachers1[0]->is_active)
					{
						ModelsOnlineTeachers1::where('teacher_id',$teacherId)->update(['is_active'=>$online_lessons]);
						ModelsOnlineTeachers2::where('teacher_id',$teacherId)->update(['is_active'=>$online_lessons]);
					}
					//echo "matched";
				}
				else
				{
					ModelsOnlineTeachers1::where('teacher_id',$teacherId)->delete();
					ModelsOnlineTeachers2::where('teacher_id',$teacherId)->delete();
					ModelsOnlineTeachers1::insert($OnlineTeachersData);
					ModelsOnlineTeachers2::insert($OnlineTeachersData);
				}
			}
			//$Teachers = 	Teacher::where('id',$teacherId)->update(['teachesHome'=>$teachesHome,'teachesStudio'=>$teachesStudio]);
		}	elseif($checkOnlineLessons=='no'){
			ModelsOnlineTeachers1::where('teacher_id',$teacherId)->delete();
			ModelsOnlineTeachers2::where('teacher_id',$teacherId)->delete();
		}
		die;
	}
	public function profile(Request $request)
    {
		//if()
		//$value = session()->get('postProfile');
		//$value = session('postProfile');
		//echo $value.'hello';
		//print_r($_SESSION);
        $user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
	
		
		
		$teaches['teacher_id'] = $user->teacherId->remoteTeacherId;
		$teaches['firstName'] = $user->teacherId->firstName;
		$teaches['lastName'] = $user->teacherId->lastName;
		$teaches['postalCode'] = $user->teacherId->postalCode;
		$teaches['avatar'] = $user->teacherId->avatar;
		$teaches['urlName'] = $user->teacherId->urlName;
		$teaches['teachesHome'] = $user->teacherId->teachesHome;
		$teaches['teachesStudio'] = $user->teacherId->teachesStudio;
		$teaches['teachesOnline'] = $user->teacherId->teachesOnline;
		$teaches['aboutTeacher'] = $user->teacherId->aboutTeacher;
		$teaches['experience'] = $user->teacherId->experience;
		$teaches['methodsUsed'] = $user->teacherId->methodsUsed;
		$teaches['lessonsStyle'] = $user->teacherId->lessonsStyle;
		$teaches['profileApprove'] = $user->teacherId->profileApprove;
		$teaches['accountApprove'] = $user->teacherId->accountApprove;
		
		if($user->teacherId->agesTought!='')
		{		
			$agestVal = explode(';',$user->teacherId->agesTought);
			$teaches['agesTought1'] = $agestVal[0];
			$teaches['agesTought2'] = $agestVal[1];
		}
		else
		{
			$teaches['agesTought1'] = '';
			$teaches['agesTought2'] = '';
		}
		if($user->teacherId->levelTought!='')
		{
			$levelVal = explode(';',$user->teacherId->levelTought);
			$teaches['levelTought1'] = $levelVal[0];
			$teaches['levelTought2'] = $levelVal[1];
		}
		else
		{
			$teaches['levelTought1'] = '';
			$teaches['levelTought2'] = '';
		}	
		//dd($teaches);
		$teaches['db_degrees'] = $user->teacherId->degrees;
		$teaches['db_training'] = $user->teacherId->training;
		
		/* if($request->ip()=="121.242.47.194")
		{
			
		}  */
		if($user->teacherId->degrees!='' && $user->dateAdded>='2019-03-26' )
		{
			$degreeVal1 = explode('</p>',$user->teacherId->degrees);
			$degrees=[];
			for($i=0;$i<(count($degreeVal1)-1);$i++)
			{	
				$degreeVal2 = explode('<p>',$degreeVal1[$i]);
				if(isset($degreeVal2[1]))
				{
					array_push($degrees,$degreeVal2[1]);
				}
				else
				{
					$degrees='';
				}
			}
			$teaches['degrees'] = $degrees;
		}
		else
		{
			$teaches['degrees'] = $user->teacherId->degrees;
		}
		//echo $user->teacherId->training;
		//echo "<pre>";
		//print_r($teaches['degrees']);
		//die;
			
		if($user->teacherId->training!='' && $user->dateAdded>='2019-03-26' )
		{
			$trainingVal1 = explode(', ',$user->teacherId->training);
			$training=[];
			for($i=0;$i<(count($trainingVal1));$i++)
			{	
				$trainingVal2 = explode(': ',$trainingVal1[$i]);
				if(isset($trainingVal2[0]))
				{
					if(isset($trainingVal2[1])){
						$value['TeachersModeltraining'] = trim($trainingVal2[0]);
						$value['degreeSchoolName'] = $trainingVal2[1];
					}else{
						$value['TeachersModeltraining'] = trim($trainingVal2[0]);
						$value['degreeSchoolName'] = '';
					}
					//print_r($value);
					array_push($training,$value);
				}
				else
				{
					$training='';
				}
				//die;
			}
			$teaches['training'] = $training;	
		}
		else
		{
			$teaches['training'] = $user->teacherId->training;
		}
		
		if($user->dateAdded>='2019-03-26'){
			 $teaches['training'] = $teaches['training'];
			 $teaches['degrees'] = $teaches['degrees'];
			 $teaches['newUser'] = 'yes';
		}
		else{
			$teaches['newUser'] = 'no';
			$teaches['training'] = $user->teacherId->training;
			$teaches['degrees'] = $user->teacherId->degrees;
		}
		//echo $user->dateAdded;
		
		
		$instruments=ModelsTeacherInstrument::all();
		$TeachersToInstruments = ModelsTeachersToInstrument::where('teacherId',$user->teacherId->id)->get();
		foreach($TeachersToInstruments as $inst_data){
			$insturmentIds[] = $inst_data->instrumentId;
		}
		//print_r($insturmentIds);
		$OnlineTeachers = ModelsOnlineTeachers1::where('teacher_id',$user->teacherId->id)->first();
		//dd($OnlineTeachers);
		$stylesList=ModelsStyle::all();
		//dd($stylesList);
		$teachersToStyle = ModelsTeachersToStyle::where('teacherId',$user->teacherId->id)->get();
		foreach($teachersToStyle as $style_data){
			$TeacherStyleIds[] = $style_data->styleId;
		}
		//print_r($TeacherStyleIds); die;
		$TeachersPolygons=ModelsTeachersPolygon::where('teacherId',$user->teacherId->id)->get();
		$TeachersToStudio=ModelsTeachersToStudio::with('studio')->where('teacherId',$user->teacherId->id)->get();
		//dd($TeachersToStudio);
		$studioLoc = [];
		foreach($TeachersToStudio as $studio_data)
		{
			$data['lat'] = $studio_data->studio->lat;
			$data['lng'] = $studio_data->studio->lng;
			array_push($studioLoc,$data);
		}
		$StudioLocation = json_encode($studioLoc);
		//echo "<pre>";
		///print_r($studioLoc);
		//die;
		$poly_data=[];
		foreach($TeachersPolygons as $data)
		{
			$val1 = explode(')',$data->polygon);
			$poly_location=[];
			for($i=0;$i<(count($val1)-1);$i++)
			{	
				$val2 = explode('(',$val1[$i]);
				$val3 = explode(', ',$val2[1]);
				$locs['latitude'] = $val3[0];
				$locs['longitude'] = $val3[1];
				array_push($poly_location,$locs);
			}
			$polygon_data['Id'] = $data->Id; 
			$polygon_data['teacherId'] = $data->teacherId; 
			$polygon_data['daysAvailable'] = $data->daysAvailable; 
			$polygon_data['polygon'] = $poly_location; 
			array_push($poly_data,$polygon_data);
		}
		$TeacherPolygonsData = json_encode($poly_data);
		// echo "<pre>";
		// print_r($poly_data);	
		//die;
		//dd($TeacherPolygonsData);
		$teacher_profile=ModelsTeacherName::with('yourState')->where('teacherId',$user->teacherId->remoteTeacherId)->first();
		//echo $teacher_profile->zipCode;
		$Zipcodes=ModelsZipcode::where('zipcode',$teacher_profile->zipCode)->first();
		//echo $Zipcodes->latitude.' '.$Zipcodes->longitude;
		//die;
		$latlon['lat'] = $Zipcodes->latitude;
		$latlon['lng'] = $Zipcodes->longitude;
		$teachersTimeTable = ModelsTeachersTimeTable::where('teachers_id',$user->teacherId->id)->first();
		/* echo "test";
		if($teachersTimeTable==''){
			echo "sdsdv";
		}
		print_r($teachersTimeTable);
		die; */
		if($teachersTimeTable!='')
		{
			$timeTableresult = unserialize($teachersTimeTable->teachers_table);
			//
			$weeks = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
			$hours = ['01am'=>'A','02am'=>'B','03am'=>'C','04am'=>'D','05am'=>'E','06am'=>'F','07am'=>'G','08am'=>'H','09am'=>'I','10am'=>'J','11am'=>'K','12am'=>'L','01pm'=>'M','02pm'=>'N','03pm'=>'O','04pm'=>'P','05pm'=>'Q','06pm'=>'R','07pm'=>'S','08pm'=>'T','09pm'=>'U','10pm'=>'V','11pm'=>'W','12pm'=>'X'];
			//print_r($hours); die;
			foreach($weeks as $week_result)
			{
				foreach($hours as $key => $value){
					//echo $key.' '. $value;
					if($week_result=='Sunday')
					{
						$table_data[$value.'01'] = $timeTableresult[$week_result][$key]['Home'];
						$table_data[$value.'02'] = $timeTableresult[$week_result][$key]['Studio'];	
						$table_data[$value.'03'] = $timeTableresult[$week_result][$key]['Online'];	
					}
					if($week_result=='Monday')
					{
						$table_data[$value.'04'] = $timeTableresult[$week_result][$key]['Home'];
						$table_data[$value.'05'] = $timeTableresult[$week_result][$key]['Studio'];	
						$table_data[$value.'06'] = $timeTableresult[$week_result][$key]['Online'];	
					}
					if($week_result=='Tuesday')
					{
						$table_data[$value.'07'] = $timeTableresult[$week_result][$key]['Home'];
						$table_data[$value.'08'] = $timeTableresult[$week_result][$key]['Studio'];	
						$table_data[$value.'09'] = $timeTableresult[$week_result][$key]['Online'];	
					}
					if($week_result=='Wednesday')
					{
						$table_data[$value.'10'] = $timeTableresult[$week_result][$key]['Home'];
						$table_data[$value.'11'] = $timeTableresult[$week_result][$key]['Studio'];	
						$table_data[$value.'12'] = $timeTableresult[$week_result][$key]['Online'];	
					}
					if($week_result=='Thursday')
					{
						$table_data[$value.'13'] = $timeTableresult[$week_result][$key]['Home'];
						$table_data[$value.'14'] = $timeTableresult[$week_result][$key]['Studio'];	
						$table_data[$value.'15'] = $timeTableresult[$week_result][$key]['Online'];	
					}
					if($week_result=='Friday')
					{
						$table_data[$value.'16'] = $timeTableresult[$week_result][$key]['Home'];
						$table_data[$value.'17'] = $timeTableresult[$week_result][$key]['Studio'];	
						$table_data[$value.'18'] = $timeTableresult[$week_result][$key]['Online'];	
					}
					if($week_result=='Saturday')
					{
						$table_data[$value.'19'] = $timeTableresult[$week_result][$key]['Home'];
						$table_data[$value.'20'] = $timeTableresult[$week_result][$key]['Studio'];	
						$table_data[$value.'21'] = $timeTableresult[$week_result][$key]['Online'];	
					}
				} 
				//print_r($timeTableresult['Tuesday']);
			}
			$schedule_data = $table_data;
		}
		else{
			$schedule_data = '';
		}
		$spotlightQuestion = ModelsSpotlightQuestion::all();
		$teacherSpotlight = ModelsTeacherSpotlight::where('teacherId',$user->teacherId->id)->orderBy('qid','ASC')->get();
		if(!$teacherSpotlight->isEmpty())
		{	
			$arr_ans = [];
			foreach($teacherSpotlight as $ans)
			{
				array_push($arr_ans,$ans->answer);
			}
			$all_ans = implode(',',$arr_ans);
		}
		else
		{
			$all_ans = '';
		}
		$teachersPhotos = ModelsTeachersPhoto::where('teacherId',$user->teacherId->id)->get();
		$VideoInfo1 = ModelsVideo::where('id',$user->teacherId->videoId)->first();
		$VideoInfo2 = ModelsVideo::where('id',$user->teacherId->videoId2)->first();
		//dd($VideoInfo2);
		//print_r($timeTableresult[$week_result]); 11565 $user->teacherId->id
		//die;
		
		//$myIP = $request->ip();
		$chkProfileLevel = $this->checkProfileLevel($user->teacherId);
		$teaches['profile_completenss'] = $chkProfileLevel;
		//echo $chkProfileLevel;
		//die;
		$error_msg = [];
		if($TeachersToInstruments->count()==0){
			$error_msg['instrument'] = 0;
		}
		if($teachersToStyle->count()==0){
			$error_msg['style'] = 0;
		}
		/* if($teaches['db_degrees'] == ''){
			$error_msg['degrees'] = 0;
		} */
		//echo $teaches['db_training'].'hello';
		if($teaches['db_training'] == ''){
			$error_msg['training'] = 0;
		}
		if($teaches['avatar'] == ''){
			$error_msg['avatar'] = 0;
		}
		if($teaches['aboutTeacher'] == ''){
			$error_msg['aboutTeacher'] = 0;
		}
		elseif(strlen($teaches['aboutTeacher'])<500){
			$error_msg['aboutTeacher'] = 1;
		}
		if($teaches['experience'] == ''){
			$error_msg['experience'] = 0;
		}
		elseif(strlen($teaches['experience'])<500){
			$error_msg['experience'] = 1;
		}
		if($teaches['methodsUsed'] == ''){
			$error_msg['methodsUsed'] = 0;
		}
		elseif(strlen($teaches['methodsUsed'])<500){
			$error_msg['methodsUsed'] = 1;
		}
		if($teaches['lessonsStyle'] == ''){
			$error_msg['lessonsStyle'] = 0;
		}
		elseif(strlen($teaches['lessonsStyle'])<500){
			$error_msg['lessonsStyle'] = 1;
		}
		if( $teaches['teachesHome']=='' && $teaches['teachesStudio']=='' && count($OnlineTeachers)==0){
			$error_msg['homestudios_msg1'] = 0;
		}
		else{
			if($teaches['teachesHome']==''){
			$error_msg['teachesHomeMsg'] = 0;
			}
			if($teaches['teachesStudio']==''){
				$error_msg['teachesStudioMsg'] = 0;
			}
			
			if(count(array($OnlineTeachers))==0  && $teaches['teachesOnline'] ==''){
				$error_msg['OnlineTeacherMsg'] = 0;
			}
		}
		if(  $schedule_data == '' || !in_array( 1 ,$schedule_data ) ){
			$error_msg['teacherSchedule'] = 0;
		}
		if($teaches['teachesHome']=='yes' && $TeachersPolygons->count()==0){
			$error_msg['homeLocationMsg'] = 0;
		}
		if($teaches['teachesStudio']=='yes' && $TeachersToStudio->count()==0){
			$error_msg['studioLocationMsg'] = 0;
		}
		//echo "<pre>";
		//print_r($poly_data);
		//print_r($TeachersToStudio->count());
		//die;
		//$OnlineTeachers->count()!=1 &&
		return view('profile',compact('latlon','instruments','insturmentIds','TeacherPolygonsData','StudioLocation','teaches','stylesList','TeacherStyleIds','schedule_data','spotlightQuestion','teacherSpotlight','teachersPhotos','VideoInfo1','VideoInfo2','OnlineTeachers','all_ans','error_msg'));
    }
	public function checkProfileLevel($teacher){
		$arr_profile_level = array('hasstudio'=> 0, 'hasboundary'=> 0, 'mainprofile' => 0 , 'aboutme'=> 0, 'experience'=> 0 , 'method'=> 0, 
		                           'lessonsstyle'=> 0,'additionalphoto'=> 0, 'review'=> 0 , 'performancevideo'=> 0, 'welcomevideo'=> 0, 'hasblog'=>0);
		$basic = array('hasstudio'=> 1, 'hasboundary'=> 1, 'mainprofile' => 1 , 'aboutme'=> 1, 'experience'=> 1, 'method'=> 1, 
		                           'lessonsstyle'=> 1,'additionalphoto'=> 0, 'review'=> 0 , 'performancevideo'=> 0, 'welcomevideo'=> 0, 'hasblog'=>0);
	    $preferred = array('hasstudio'=> 1, 'hasboundary'=> 1, 'mainprofile' => 1 , 'aboutme'=> 1, 'experience'=> 1, 'method'=> 1, 
		                           'lessonsstyle'=> 1,'additionalphoto'=> 2, 'review'=> 4 , 'performancevideo'=> 1 , 'welcomevideo'=> 0, 'hasblog'=>0);
        $select = array('hasstudio'=> 1, 'hasboundary'=> 1, 'mainprofile' => 1 , 'aboutme'=> 1, 'experience'=> 1, 'method'=> 1, 
		                           'lessonsstyle'=> 1,'additionalphoto'=> 2, 'review'=> 6 , 'performancevideo'=> 1 , 'welcomevideo'=> 1, 'hasblog'=>0);
		$elite = array('hasstudio'=> 1, 'hasboundary'=> 1, 'mainprofile' => 1 , 'aboutme'=> 1, 'experience'=> 1, 'method'=> 1, 
		                           'lessonsstyle'=> 1,'additionalphoto'=> 2, 'review'=> 8 , 'performancevideo'=> 1 , 'welcomevideo'=> 1, 'hasblog'=>0);
		//echo "<pre>";
		//print_r($teacher);
		$teachesStudio = $teacher->teachesStudio;
		//$studios = $teacher->getStudiosOfCurrentTeacher();
		$markers = array();
		$TeachersToStudio=ModelsTeachersToStudio::with('studio')->where('teacherId',$teacher->id)->get();
		//dd($TeachersToStudio);
		$studioLoc = [];
		foreach($TeachersToStudio as $studio_data)
		{
			$markers[] = array('latLng' => array('lat' => $studio_data->studio->lat, 'lng' => $studio_data->studio->lng));
		}
       /*  $studios = $teacher->studios;
        foreach ($studios as $studio) {
            $markers[] = array('latLng' => array('lat' => $studio->lat, 'lng' => $studio->lng));
        } */
        $studios = $markers;
		if($teachesStudio && count($studios) > 0){
			$arr_profile_level['hasstudio'] = 1;
		}
		$teachesHome = $teacher->teachesHome;
		//$boundary = $teacher->getPolygon();
		$resultCount=ModelsTeachersPolygon::where('teacherId',$teacher->id)->count();
		if($teachesHome && $resultCount > 0 ){
			$arr_profile_level['hasboundary'] = 1;
		}
		if($arr_profile_level['hasstudio'] == 1 || $arr_profile_level['hasboundary'] == 1 || $teacher->teachesOnline == 'yes'){
			$arr_profile_level['hasstudio'] = 1;
			$arr_profile_level['hasboundary'] = 1;
		}
		$hasProfilePic = $teacher->avatar;
		if($hasProfilePic){
			$arr_profile_level['mainprofile'] = 1;
		}
		$hasAboutMe = $teacher->aboutTeacher;
		if(strlen($hasAboutMe) > 499 ){
			$arr_profile_level['aboutme'] = 1;
		}
		$hasExperience = $teacher->experience;
		if(strlen($hasExperience) > 499 ){
			$arr_profile_level['experience'] = 1;
		}
		$hasMethod = $teacher->methodsUsed;
		if(strlen($hasMethod) > 499 ){
			$arr_profile_level['method'] = 1;
		}
		$hasStyle = $teacher->lessonsStyle;
		if(strlen($hasStyle) > 499 ){
			$arr_profile_level['lessonsstyle'] = 1;
		}
		$teachersPhotosCount = ModelsTeachersPhoto::where('teacherId',$teacher->id)->count();		
		if($teachersPhotosCount > 1){
			$arr_profile_level['additionalphoto'] = $teachersPhotosCount;
		}else{
			$arr_profile_level['additionalphoto'] = $teachersPhotosCount;
		}
  	    $url = 'http://musika.reziew.com/api/1/review/average.json?sku[]=' . $teacher->id;
		  
		$context = stream_context_create(
										  array('http' => array('method' => 'GET',) )
										 );
		$output = file_get_contents($url, false, $context);
		//$temp = '{"' . $sku . '": {"average":0 , "count":0 } }' ;
		//dd($output);
		if($output == "[]"){
		 $hasReview= 0;	
		}
		else {
			
			$output = json_decode($output);
			foreach( $output as $value)
					{
					   $hasReview = $value->count;
					}
		}
		if($hasReview > 0){
			$arr_profile_level['review'] = $hasReview;
		}
		$hasPerformanceVideo = $teacher->videoId;
		if($hasPerformanceVideo > 0){
			$arr_profile_level['performancevideo'] = 1;
		}
		$hasWelcomeVideo = $teacher->videoId2;
		if($hasWelcomeVideo > 0){
			$arr_profile_level['welcomevideo'] = 1;
		}
		/* 
		 $sql = "Select  * from ceomusikalessons_blogsDB.wp_usermeta where meta_key = 'description' and  meta_value like '%".$teacher->urlName."%'";
	     $connection = Yii::app()->db;
         $command = $connection->createCommand( $sql );
         $result = $command->queryAll();
		 if(count($result) == 1){
			 $arr_profile_level['hasblog'] = 1;
		 } */
		 
		 
		
		 
		$arr_profile_level['hasblog'] = 0;		
		$flag = false;
		
		//$arr_profile_level['review'] = 6;
		
		
		foreach($arr_profile_level as $k => $v){
			if($v >= $elite[$k]){$flag = true;} else {$flag = false; break;}
		}
		if($flag == true) {  
			$chkProfileLevel = 'Elite'; 
		}else{
			$chkProfileLevel = '';
		}
		if($chkProfileLevel==''){
			$flag = false;
			foreach($arr_profile_level as $k => $v){ 
				if($v >= $select[$k]){ $flag = true; } else { $flag = false; break; }
			}
			if($flag == true)  {  
				$chkProfileLevel = 'Select'; 
			}else{
				$chkProfileLevel = '';
			}
		}	
		if($chkProfileLevel==''){
			$flag = false;
			foreach($arr_profile_level as $k => $v){
				if($v >= $preferred[$k]){ $flag = true; } else { $flag = false; break; }
			}
			if($flag == true)  {  
				$chkProfileLevel = 'Preferred'; 
			}else{
				$chkProfileLevel = '';
			}
		}
		if($chkProfileLevel==''){
			$flag = false;
			foreach($arr_profile_level as $k => $v){
				if($v >= $basic[$k]){$flag = true;} else {$flag = false; break;}
			}
			if($flag == true)  {  
				$chkProfileLevel = 'Basic';
			}
			else { 
				$chkProfileLevel = 'Incomplete'; 
			}
		}	
		/* echo "<pre>"; 
		print_r($arr_profile_level);
		echo $chkProfileLevel;
		die; */
		 
		 $teachers = ModelsTeacher::where('remoteTeacherId',$teacher->remoteTeacherId)->update(['profile_completenss'=>$chkProfileLevel]);
		 
		 return $chkProfileLevel;
		 //die;
	}
	public function deletePolygon(Request $request)
	{
		$polygonId = $request->polygonId;
		$teacherId = $request->teacherId;
		$TeachersPolygons = ModelsTeachersPolygon::where('Id', '=', $polygonId)->where('teacherId', '=', $teacherId)->delete();
		if($TeachersPolygons)
		{
			$json = json_encode(['status'=>'true']);
			return $json;
		}
		die;
	}
	public function updateInstrument(Request $request){
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacherId = $user->teacherId->id;
		$instrumentIds = $request->instrumentIds;
		$inst = explode(',',$instrumentIds);
		ModelsTeachersToInstrument::where('teacherId', '=', $teacherId)->delete();
		foreach($inst as $inst_id)
		{
			$TeachersToInstruments = new ModelsTeachersToInstrument();
			$TeachersToInstruments->teacherId = $teacherId;
			$TeachersToInstruments->instrumentId = $inst_id;
			if($TeachersToInstruments->save())
			{
				 $new_id = $TeachersToInstruments->id;
			}
		}
		if($new_id)
		{
			$json = json_encode(['status'=>'true']);
			return $json;
		}
		die;
	}
	public function updateTeritoryLocationsDays(Request $request){
		$polyIds = $request->input('polyIds');
		$teacherIds = $request->input('teacherIds');
		$weekdays = $request->input('weekdays');
		//echo $days = implode(',',$weekdays);
		//print_r($teacherIds);
		//print_r($polyIds);
		//print_r($weekdays);
		//die;
		for($i=0; $i<count($polyIds); $i++){
			//echo $teacherIds[$i];
			if($weekdays[$i]!=''){
				ModelsTeachersPolygon::where('Id',$polyIds[$i])->update(['daysAvailable'=>$weekdays[$i]]);
			}
		}
		$json = json_encode(['status'=>'true']);
		return $json;
		/* if($TeachersPolygons)
		{
			$json = json_encode(['status'=>'true']);
			return $json;
		} */
		die;
	}
	public function updateRangeSlider(Request $request){
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacherId = $user->teacherId->remoteTeacherId;
		$fromRange1 = $request->fromRange1;
		$toRange1 = $request->toRange1;
		$fromRange2 = $request->fromRange2;
		$toRange2 = $request->toRange2;
		$agesTought = $fromRange1.';'.$toRange1;
		$levelTought = $fromRange2.';'.$toRange2;
		$teachers = ModelsTeacher::where('remoteTeacherId',$teacherId)->update(['agesTought'=>$agesTought,'levelTought'=>$levelTought]);
		if($teachers)
		{
			$json = json_encode(['status'=>'true']);
			return $json;
		}
		die;
	}
	public function updateStyles(Request $request){
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacherId = $user->teacherId->id;
		$styleIds = $request->styleId;
		$styleId = explode(',',$styleIds);
		/* echo "<pre>";
		print_r($styleId);
		die; */
		ModelsTeachersToStyle::where('teacherId', '=', $teacherId)->delete();
		foreach($styleId as $style_id)
		{
			$TeachersToStyles = new ModelsTeachersToStyle();
			$TeachersToStyles->teacherId = $teacherId;
			$TeachersToStyles->styleId = $style_id;
			if($TeachersToStyles->save())
			{
				 $new_id = $TeachersToStyles->id;
			}
		}
		if($new_id)
		{
			$json = json_encode(['status'=>'true']);
			return $json;
		}
		die;
	}
	public function updateDegreeAward(Request $request){
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacherId = $user->teacherId->remoteTeacherId;
		$training = $request->training;
		$degrees = $request->awardValue;
		$teachers = ModelsTeacher::where('remoteTeacherId',$teacherId)->update(['training'=>$training,'degrees'=>$degrees]);
		if($teachers)
		{
			$json = json_encode(['status'=>'true']);
			return $json;
		}
		die;
	}
	public function updateProfileImage(Request $request){
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacherId = $user->teacherId->remoteTeacherId;
		$tid = $user->teacherId->id;
		/* $validator = Validator::make($request->all(), [
			'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);
		if($validator->fails())
		{
			return response()->json($validator->messages(),200);
		} */
		
		if($user->teacherId->avatar!=''){
			$oldImageData = explode('{{THUMBNAILMASK}}',$user->teacherId->avatar);
		}
		else{
			$oldImageData[0] = '';
			$oldImageData[1] = '';
		}
		
		
		//$oldImage = $oldImageData[0].'proportionResize'.$oldImageData[1];
		//$res = Storage::disk('ftp')->delete('/'.$tid.'/avatar/'.$oldImage);
		
		
		$file = $request->hasfile('avatar');
		if($file){
			$input = $request->all();
			$imageName = explode('.',$request->avatar->getClientOriginalName());
			$ext = $request->avatar->getClientOriginalExtension();
			$input['avatar'] = time().'_'.$imageName[0].'.{{THUMBNAILMASK}}.'.$request->avatar->getClientOriginalExtension();
			
			$input['avatar1'] = time().'_'.$imageName[0].'.original.'.$request->avatar->getClientOriginalExtension();
			$input['avatar2'] = time().'_'.$imageName[0].'.autoCrop.'.$request->avatar->getClientOriginalExtension();
			$input['avatar3'] = time().'_'.$imageName[0].'.proportionResize.'.$request->avatar->getClientOriginalExtension();
			$input['avatar4'] = time().'_'.$imageName[0].'.admin.'.$request->avatar->getClientOriginalExtension();
			$input['avatar5'] = time().'_'.$imageName[0].'.avatarSize.'.$request->avatar->getClientOriginalExtension();
			$input['avatar6'] = time().'_'.$imageName[0].'.meetWidget.'.$request->avatar->getClientOriginalExtension();
			
			//$input['avatar1'] = time().'.'.$request->avatar->getClientOriginalExtension();
			//echo public_path('images').'/'.$input['avatar1'];
			//echo url('public/images').'/'.$input['avatar1'];
			//echo "<pre>";
			//print_r($input);
			
			$img = ModelsImage::make($request->avatar->getRealPath());
			
			
			//$request->avatar->move(public_path('images'), $input['avatar2']);
			//$request->avatar->move(public_path('images'), $input['avatar3']);
			
			/* $img->resize(190, 220, function ($constraint) {
				$constraint->aspectRatio();
			})->save(public_path('/thumbnail').'/'.$input['avatar1']); */
			
			$firstimage = $request->avatar->move(public_path('images'), $input['avatar1']);
		
			$data = getimagesize(public_path('/images').'/'.$input['avatar1']);
			
			$height = $data[1];
			
			if($data[0]<1024){
				$width = $data[0];
			}
			else{
				$width = 1024;
			} 
			//echo $width;
			
			
			$img->resize($width,null, function ($constraint) {
				$constraint->aspectRatio();
			})->save(public_path('/images').'/'.$input['avatar2']);
			$img->resize($width,null, function ($constraint) {
				$constraint->aspectRatio();
			})->save(public_path('/images').'/'.$input['avatar3']); 
			
			$img->resize(260,null, function ($constraint) {
				$constraint->aspectRatio();
			})->save(public_path('/images').'/'.$input['avatar5']); 
			
			$img->resize(80,null, function ($constraint) {
				$constraint->aspectRatio();
			})->save(public_path('/images').'/'.$input['avatar6']); 
			
			$img->resize(60, 60, function ($constraint) {
				$constraint->aspectRatio();
			})->save(public_path('/images').'/'.$input['avatar4']);
			
			
			//die;
			//$destinationPath = public_path('/images');
			//$image->move($destinationPath, $input['imagename']);
			config(['filesystem.ftp.root'=>'public_html/uploads/TeachersModel']);
			
			//File upload on musikalessons live server
			
			$otherServer = Storage::disk('ftp')->put('/'.$tid.'/avatar/'.$input['avatar1'], fopen(public_path('images').'/'.$input['avatar1'], 'r+'));
			$otherServer = Storage::disk('ftp')->put('/'.$tid.'/avatar/'.$input['avatar2'], fopen(public_path('images').'/'.$input['avatar2'], 'r+'));
			$otherServer = Storage::disk('ftp')->put('/'.$tid.'/avatar/'.$input['avatar3'], fopen(public_path('images').'/'.$input['avatar3'], 'r+'));
			$otherServer = Storage::disk('ftp')->put('/'.$tid.'/avatar/'.$input['avatar4'], fopen(public_path('images').'/'.$input['avatar4'], 'r+'));
			$otherServer = Storage::disk('ftp')->put('/'.$tid.'/avatar/'.$input['avatar5'], fopen(public_path('images').'/'.$input['avatar5'], 'r+'));
			$otherServer = Storage::disk('ftp')->put('/'.$tid.'/avatar/'.$input['avatar6'], fopen(public_path('images').'/'.$input['avatar6'], 'r+'));
			
			// Image delete from musikalessons live server
			if(Storage::disk('ftp')->exists('/'.$tid.'/avatar/'.$oldImageData[0].'original'.$oldImageData[1])){
				Storage::disk('ftp')->delete('/'.$tid.'/avatar/'.$oldImageData[0].'original'.$oldImageData[1]);
			}
			if(Storage::disk('ftp')->exists('/'.$tid.'/avatar/'.$oldImageData[0].'autoCrop'.$oldImageData[1])){
				Storage::disk('ftp')->delete('/'.$tid.'/avatar/'.$oldImageData[0].'autoCrop'.$oldImageData[1]);
			}
			if(Storage::disk('ftp')->exists('/'.$tid.'/avatar/'.$oldImageData[0].'proportionResize'.$oldImageData[1])){
				Storage::disk('ftp')->delete('/'.$tid.'/avatar/'.$oldImageData[0].'proportionResize'.$oldImageData[1]);
			}
			if(Storage::disk('ftp')->exists('/'.$tid.'/avatar/'.$oldImageData[0].'admin'.$oldImageData[1])){
				Storage::disk('ftp')->delete('/'.$tid.'/avatar/'.$oldImageData[0].'admin'.$oldImageData[1]);
			}
			if(Storage::disk('ftp')->exists('/'.$tid.'/avatar/'.$oldImageData[0].'avatarSize'.$oldImageData[1])){
				Storage::disk('ftp')->delete('/'.$tid.'/avatar/'.$oldImageData[0].'avatarSize'.$oldImageData[1]);
			}
			if(Storage::disk('ftp')->exists('/'.$tid.'/avatar/'.$oldImageData[0].'meetWidget'.$oldImageData[1])){
				Storage::disk('ftp')->delete('/'.$tid.'/avatar/'.$oldImageData[0].'meetWidget'.$oldImageData[1]);
			}
			
			// Current image delete from new teachers server
			
			//dd($otherServer); 
			$image_name = $request->file('avatar')->getRealPath();
			$options = array();
			$tags = array();
			$files=Cloudder::upload(public_path('images').'/'.$input['avatar1'], null,$options,$tags);
			$result[$tid] = Cloudder::getResult();
			//dd($result);
			$teachers_array_info = serialize($result); 
			//Upload File to external server
			$TeachersImgCDNs = new ModelsTeachersImgCDN();
			$TeachersImgCDNs->teachers_id = $tid;
			$TeachersImgCDNs->teachers_array_info = $teachers_array_info;
			if($TeachersImgCDNs->save())
			{
				 $new_id = $TeachersImgCDNs->id;
			}
			
			if(file_exists(public_path('/images').'/'.$input['avatar1'])){ 
				File::delete(public_path('/images').'/'.$input['avatar1']);
			} 
			if(file_exists(public_path('/images').'/'.$input['avatar2'])){ 
				File::delete(public_path('/images').'/'.$input['avatar2']);
			} 	
			if(file_exists(public_path('/images').'/'.$input['avatar3'])){ 
				File::delete(public_path('/images').'/'.$input['avatar3']);
			} 
			if(file_exists(public_path('/images').'/'.$input['avatar4'])){ 
				File::delete(public_path('/images').'/'.$input['avatar4']);
			} 	
			if(file_exists(public_path('/images').'/'.$input['avatar5'])){ 
				File::delete(public_path('/images').'/'.$input['avatar5']);
			} 	
			if(file_exists(public_path('/images').'/'.$input['avatar6'])){ 
				File::delete(public_path('/images').'/'.$input['avatar6']); 
			} 	
			
			//echo "<pre>";
			//print_r($files);
			$teachers = ModelsTeacher::where('remoteTeacherId',$teacherId)->update(['avatar'=>$input['avatar']]);
			if($teachers)
			{
				$json = json_encode(['status'=>'true','imgurl'=> "https://musikalessons.com/uploads/TeachersModel/".$tid.'/avatar/'.$input['avatar5'],'avatar'=>$input['avatar']]);
				return $json;
			}
		}
		//print_r($file);
		die;
	}
	public function deleteProfilePhoto(Request $request){
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacherId = $user->teacherId->remoteTeacherId;
		$profileName = $request->imageName;
		$newavt=str_replace("{{THUMBNAILMASK}}","avatarSize",$profileName);
		// if(file_exists(public_path('images').'/'.$newavt)){
			// echo "exist"; // unlink(public_path('images/my-profile.jpeg'));
		// }else{
		  // echo "File does not exists.";
		// }
		$teachers = ModelsTeacher::where('remoteTeacherId',$teacherId)->update(['avatar'=>'']);
		if($teachers)
		{
			if(\File::exists(public_path('images').'/'.$newavt)){
			  \File::delete(public_path('images').'/'.$newavt);
			}
			$json = json_encode(['status'=>'true']);
			return $json;
		}
		die;
	}
	public function updatePersonalDesc(Request $request)
	{
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacherId = $user->teacherId->remoteTeacherId;
		$aboutTeacher = $request->aboutTeacher;
		$experience = $request->experience;
		$methodsUsed = $request->methodsUsed;
		$lessonsStyle = $request->lessonsStyle;
		$teachers = ModelsTeacher::where('remoteTeacherId',$teacherId)->update(['aboutTeacher'=>$aboutTeacher,'experience'=>$experience,'methodsUsed'=>$methodsUsed,'lessonsStyle'=>$lessonsStyle]);
		if($teachers)
		{
			$json = json_encode(['status'=>'true']);
			return $json;
		}
		die;
	}
	public function teacherSchedule(Request $request){
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacherId = $user->teacherId->id;
		$scheduleTime = $request->input('scheduleTime');
		$weeks = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
		$chkVal=[];
		foreach($scheduleTime as $data)
		{
			$num = $data['index'];
			$val = $data['value'];
			$title = $data['title'];
			$week = $data['week'];
			$hso = $data['hso'];
			if( $title=='A' ) { 
				if($hso == 'home') { $value[$week]['01am']['Home'] = $val; } 
				if($hso == 'studio') { $value[$week]['01am']['Studio'] = $val; } 
				if($hso == 'online') { $value[$week]['01am']['Online'] = $val; } 
			}
			if(  $title=='B' ) {  
				if($hso == 'home') { $value[$week]['02am']['Home'] = $val; }
				if($hso == 'studio') { $value[$week]['02am']['Studio'] = $val; }
				if($hso == 'online') { $value[$week]['02am']['Online'] = $val; }
			}
			if(  $title=='C' ) {  
				if($hso == 'home') { $value[$week]['03am']['Home'] = $val; }
				if($hso == 'studio') { $value[$week]['03am']['Studio'] = $val; }
				if($hso == 'online') { $value[$week]['03am']['Online'] = $val; }
			}
			if(  $title=='D' ) {  
				if($hso == 'home') { $value[$week]['04am']['Home'] = $val; }
				if($hso == 'studio') { $value[$week]['04am']['Studio'] = $val; }
				if($hso == 'online') { $value[$week]['04am']['Online'] = $val; }
			}
			if(  $title=='E' ) {  
				if($hso == 'home') { $value[$week]['05am']['Home'] = $val; }
				if($hso == 'studio') { $value[$week]['05am']['Studio'] = $val; }
				if($hso == 'online') { $value[$week]['05am']['Online'] = $val; }
			}
			if(  $title=='F' ) {  
				if($hso == 'home') { $value[$week]['06am']['Home'] = $val; }
				if($hso == 'studio') { $value[$week]['06am']['Studio'] = $val; }
				if($hso == 'online') { $value[$week]['06am']['Online'] = $val; }
			}
			if(  $title=='G' ) {  
				if($hso == 'home') { $value[$week]['07am']['Home'] = $val; } 
				if($hso == 'studio') { $value[$week]['07am']['Studio'] = $val; } 
				if($hso == 'online') { $value[$week]['07am']['Online'] = $val; } 
			}
			if(  $title=='H' ) {  
				if($hso == 'home') { $value[$week]['08am']['Home'] = $val; }
				if($hso == 'studio') { $value[$week]['08am']['Studio'] = $val; }
				if($hso == 'online') { $value[$week]['08am']['Online'] = $val; }
			}
			if(  $title=='I' ) {  
				if($hso == 'home') { $value[$week]['09am']['Home'] = $val; }
				if($hso == 'studio') { $value[$week]['09am']['Studio'] = $val; }
				if($hso == 'online') { $value[$week]['09am']['Online'] = $val; }
			}
			if(  $title=='J' ) {  
				if($hso == 'home') { $value[$week]['10am']['Home'] = $val; }
				if($hso == 'studio') { $value[$week]['10am']['Studio'] = $val; }
				if($hso == 'online') { $value[$week]['10am']['Online'] = $val; }
			}
			if(  $title=='K' ) {  
				if($hso == 'home') { $value[$week]['11am']['Home'] = $val; }
				if($hso == 'studio') { $value[$week]['11am']['Studio'] = $val; }
				if($hso == 'online') { $value[$week]['11am']['Online'] = $val; }
			}
			if(  $title=='L' ) {  
				if($hso == 'home') { $value[$week]['12am']['Home'] = $val; }
				if($hso == 'studio') { $value[$week]['12am']['Studio'] = $val; }
				if($hso == 'online') { $value[$week]['12am']['Online'] = $val; }
			}
			if(  $title=='M' ) {  
				if($hso == 'home') { $value[$week]['01pm']['Home'] = $val; }
				if($hso == 'studio') { $value[$week]['01pm']['Studio'] = $val; }
				if($hso == 'online') { $value[$week]['01pm']['Online'] = $val; }
			}
			if(  $title=='N' ) {  
				if($hso == 'home') { $value[$week]['02pm']['Home'] = $val; }
				if($hso == 'studio') { $value[$week]['02pm']['Studio'] = $val; }
				if($hso == 'online') { $value[$week]['02pm']['Online'] = $val; }
			}
			if(  $title=='O' ) {  
				if($hso == 'home') { $value[$week]['03pm']['Home'] = $val; }
				if($hso == 'studio') { $value[$week]['03pm']['Studio'] = $val; }
				if($hso == 'online') { $value[$week]['03pm']['Online'] = $val; }
			}
			if(  $title=='P' ) {  
				if($hso == 'home') { $value[$week]['04pm']['Home'] = $val; }
				if($hso == 'studio') { $value[$week]['04pm']['Studio'] = $val; }
				if($hso == 'online') { $value[$week]['04pm']['Online'] = $val; }
			}
			if(  $title=='Q' ) {  
				if($hso == 'home') { $value[$week]['05pm']['Home'] = $val; }
				if($hso == 'studio') { $value[$week]['05pm']['Studio'] = $val; }
				if($hso == 'online') { $value[$week]['05pm']['Online'] = $val; }
			}
			if(  $title=='R' ) {  
				if($hso == 'home') { $value[$week]['06pm']['Home'] = $val; }
				if($hso == 'studio') { $value[$week]['06pm']['Studio'] = $val; }
				if($hso == 'online') { $value[$week]['06pm']['Online'] = $val; }
			}
			if(  $title=='S' ) {  
				if($hso == 'home') { $value[$week]['07pm']['Home'] = $val; }
				if($hso == 'studio') { $value[$week]['07pm']['Studio'] = $val; }
				if($hso == 'online') { $value[$week]['07pm']['Online'] = $val; }
			}
			if(  $title=='T' ) {  
				if($hso == 'home') { $value[$week]['08pm']['Home'] = $val; }
				if($hso == 'studio') { $value[$week]['08pm']['Studio'] = $val; }
				if($hso == 'online') { $value[$week]['08pm']['Online'] = $val; }
			}
			if(  $title=='U' ) {  
				if($hso == 'home') { $value[$week]['09pm']['Home'] = $val; }
				if($hso == 'studio') { $value[$week]['09pm']['Studio'] = $val; }
				if($hso == 'online') { $value[$week]['09pm']['Online'] = $val; }
			}
			if(  $title=='V' ) {  
				if($hso == 'home') { $value[$week]['10pm']['Home'] = $val; }
				if($hso == 'studio') { $value[$week]['10pm']['Studio'] = $val; }
				if($hso == 'online') { $value[$week]['10pm']['Online'] = $val; }
			}
			if(  $title=='W' ) {  
				if($hso == 'home') { $value[$week]['11pm']['Home'] = $val; }
				if($hso == 'studio') { $value[$week]['11pm']['Studio'] = $val; }
				if($hso == 'online') { $value[$week]['11pm']['Online'] = $val; }
			}
			if(  $title=='X' ) {  
				if($hso == 'home') { $value[$week]['12pm']['Home'] = $val; }
				if($hso == 'studio') { $value[$week]['12pm']['Studio'] = $val; }
				if($hso == 'online') { $value[$week]['12pm']['Online'] = $val; }
			}
		}
		//print_r($value);
		//die;
		$teachers_table = serialize($value);
		$tid_encode = md5($teacherId);
		$countResult = ModelsTeachersTimeTable::where('teachers_id',$teacherId)->count();
		if($countResult==0)
		{
			$TeachersTimeTables = new ModelsTeachersTimeTable();
			$TeachersTimeTables->teachers_id = $teacherId;
			$TeachersTimeTables->tid_encode = $tid_encode;
			$TeachersTimeTables->teachers_table = $teachers_table;
			if($TeachersTimeTables->save())
			{
				$json = json_encode(['status'=>'true','msg'=>'Schedule Table Saved successfully']);
				return $json;
			}
		}
		else
		{
			$TeachersTimeTables = ModelsTeachersTimeTable::where('teachers_id',$teacherId)->update(['teachers_table'=>$teachers_table]);
			if($TeachersTimeTables)
			{
				$json = json_encode(['status'=>'true','msg'=>'Schedule Table Update Successfully']);
				return $json;
			}
			else
			{
				$json = json_encode(['status'=>'true','msg'=>'No change in schedule time']);
				return $json;
			}
		}
		die;
	}
	public function spotlightAnswer(Request $request){
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacherId = $user->teacherId->id;
		$answer = $request->answer;
		$val = explode('<~>',$answer);
		//echo "<pre>";
		//print_r($val);
		$question = ModelsSpotlightQuestion::all();
		$i=0;
		$data=[];
		foreach($val as $ans)
		{
			$field['qid'] = $question[$i]->Id;
			$field['answer'] = $ans;
			$field['teacherId'] = $teacherId;
			array_push($data,$field);
		$i++;	
		}
		//print_r($data);
		//Coder::insert($data);
		 $countResult = ModelsTeacherSpotlight::where('teacherId',$teacherId)->count();
		//die;
		if($countResult==0)
		{
			$teacherSpotlights = ModelsTeacherSpotlight::insert($data);
			if($teacherSpotlights)
			{
				$json = json_encode(['status'=>'true','msg'=>'Answers Saved successfully']);
				return $json;
			} 
		}
		else
		{
			ModelsTeacherSpotlight::where('teacherId', '=', $teacherId)->delete();
			$teacherSpotlights1 = ModelsTeacherSpotlight::insert($data);
			if($teacherSpotlights1)
			{
				$json = json_encode(['status'=>'true','msg'=>'Answers Update Successfully']);
				return $json;
			}
		}
	}
	public function uploadGalleryImage (Request $request){
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacherId = $user->teacherId->id;
		$file = $request->hasfile('upload_files');
		if($file){
			$input = $request->all();
			$imageName = explode('.',$request->upload_files->getClientOriginalName());
			//print_r($imageName);
			$ext = $request->upload_files->getClientOriginalExtension();
			//$input['upload_files'] = substr(sha1($imageName[0]), 0, 7 . rand(0, 1000)).'.'.$request->upload_files->getClientOriginalExtension();
			$pic_local      = substr(sha1($imageName[0]), 0, 7 . rand(0, 1000)).'.'.$request->upload_files->getClientOriginalExtension();
            $pic_tumb_local = "thumb." . substr(sha1($imageName[0]), 0, 7 . rand(0, 1000)).'.'.$request->upload_files->getClientOriginalExtension();
			$img = Image::make($request->upload_files->getRealPath());
			$img->resize(210,245, function ($constraint) {
				$constraint->aspectRatio();
			})->save(public_path('/photos').'/'.$pic_tumb_local);
			$res = $request->upload_files->move(public_path('photos'), $pic_local);
			
			$otherServer = Storage::disk('ftpGallery')->put($pic_local, fopen(public_path('photos').'/'.$pic_local, 'r+'));
			
			$otherServer1 = Storage::disk('ftpGallery')->put($pic_tumb_local, fopen(public_path('photos').'/'.$pic_tumb_local, 'r+'));
			
			$teachersPhotos = new ModelsTeachersPhoto();
			$teachersPhotos->teacherId = $teacherId;
			$teachersPhotos->image = $pic_local;
			if($teachersPhotos->save())
			{
				 //$new_id = $teachersPhotos->id;
				$json = json_encode(['status'=>'true','img'=>$pic_tumb_local,'id'=>$teachersPhotos->id]);
				return $json;
			}
		}
		die;
	}
	public function deleteGalleryPhoto(Request $request){
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacherId = $user->teacherId->remoteTeacherId;
		$image_id = $request->image_id;
		$res = ModelsTeachersPhoto::where('id',$image_id)->first();
		$photo = $res->image;
		$thumbPhoto = 'thumb.'.$res->image;
		$TeachersPhotos = ModelsTeachersPhoto::where('id',$image_id)->delete();
		if($TeachersPhotos)
		{
			if(\File::exists(public_path('photos').'/'.$photo)){
			  \File::delete(public_path('photos').'/'.$photo);
			}
			if(\File::exists(public_path('photos').'/'.$thumbPhoto)){
			  \File::delete(public_path('photos').'/'.$thumbPhoto);
			}
			$json = json_encode(['status'=>'true']);
			return $json;
		} 
		die;
	}
	public function uploadWelcomeVideo(Request $request){
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacherId = $user->teacherId->id;
		if($request->hasfile('video')){
			$file= true;
			$imageName = explode('.',$request->video->getClientOriginalName());
			//print_r($request->video->getClientOriginalName());
			//die; 
			$ext = $request->video->getClientOriginalExtension();
			$videoName = $request->video->getClientOriginalName();
			$video_local = substr(sha1($imageName[0] . rand(0, 100)), 0, 7).'.'.$request->video->getClientOriginalExtension();
			$video_path = '/uploads/videos/'.$video_local;
			
			$res = $request->video->move(public_path('videos'), $video_local);
			
			$otherServer = Storage::disk('ftpVideos')->put($video_local, fopen(public_path('videos').'/'.$video_local, 'r+'));
			
			$videoId = $user->teacherId->videoId;
			$Video_title='Welcome';
		}
		else if($request->hasfile('video2')){
			$file= true;
			$imageName = explode('.',$request->video2->getClientOriginalName());
			//print_r($request->video->getClientOriginalName());
			//die;
			$ext = $request->video2->getClientOriginalExtension();
			$videoName = $request->video2->getClientOriginalName();
			$video_local = substr(sha1($imageName[0] . rand(0, 100)), 0, 7).'.'.$request->video2->getClientOriginalExtension();
			$video_path = '/uploads/videos/'.$video_local;
			
			$res = $request->video2->move(public_path('videos'), $video_local);
			
			$otherServer = Storage::disk('ftpVideos')->put($video_local, fopen(public_path('videos').'/'.$video_local, 'r+'));
			
			$videoId = $user->teacherId->videoId2;
			$Video_title='Lesson';
		}
		//echo 
		if($file){
			$input = $request->all();
			$video_exist = ModelsVideo::where('id',$videoId)->count();
			if($video_exist==0){
				$Videos = new ModelsVideo();
				$Videos->playlistId = 1;
				$Videos->poster = '';
				$Videos->title = $videoName;
				$Videos->description = 'Description';
				$Videos->type = 'File';
				$Videos->youtubeUrl = '';
				$Videos->file = $video_path;
				$Videos->created = Carbon::now();
				$Videos->updated = Carbon::now();
				if($Videos->save())
				{
					$new_id = $Videos->id;
					if($Video_title=='Welcome')
					{
						$teachers = ModelsTeacher::where('id',$teacherId)->update(['videoId'=>$new_id]);
					}
					else if($Video_title=='Lesson')
					{
						$teachers = ModelsTeacher::where('id',$teacherId)->update(['videoId2'=>$new_id]);
					}
					if($teachers)
					{
						$json = json_encode(['status'=>'true','videoId'=>$videoId,'title'=>$videoName,'video_path'=>$video_local]);
						return $json;
					}
				}
			}
			else
			{
				$Videos = ModelsVideo::where('id',$videoId)->update(['title'=>$videoName,'type'=>'File','youtubeUrl'=>'','file'=>$video_path,'updated'=>Carbon::now()]);
				if($Videos)
				{
					$json = json_encode(['status'=>'true','videoId'=>$videoId,'title'=>$videoName,'video_path'=>$video_local]);
					return $json;
				}
			}
		} 
		die;
	}	
	public function updateVideoInfo(Request $request){
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacherId = $user->teacherId->id;
		$videoType = $request->videoType;
		$youtubeLink = $request->youtubeLink;
		$videoType2 = $request->videoType2;
		$youtubeLink2 = $request->youtubeLink2;
		if($videoType=='Youtube' && $youtubeLink!='')
		{
			$videoId = $user->teacherId->videoId;
			$video_exist = ModelsVideo::where('id',$videoId)->count();
			if($video_exist==0){
				$Videos = new ModelsVideo();
				$Videos->playlistId = 1;
				$Videos->poster = '';
				$Videos->title = 'Youtube video';
				$Videos->description = 'Description';
				$Videos->type = $videoType;
				$Videos->youtubeUrl = $youtubeLink;
				$Videos->file = '';
				$Videos->created = Carbon::now();
				$Videos->updated = Carbon::now();
				if($Videos->save())
				{
					$new_id = $Videos->id;
					$teachers = ModelsTeacher::where('id',$teacherId)->update(['videoId'=>$new_id]);
					if($teachers)
					{
						//$json = json_encode(['status'=>'true']);
						//return $json;
					}
				}
			}
			else
			{
				$Videos = ModelsVideo::where('id',$videoId)->update(['title'=>'Youtube video','type'=>$videoType,'youtubeUrl'=>$youtubeLink,'file'=>'','updated'=>Carbon::now()]);
				if($Videos)
				{
					//$json = json_encode(['status'=>'true']);
					//return $json;
				}
			}
		}
		if($videoType2=='Youtube' && $youtubeLink2!='')
		{			
			$videoId2 = $user->teacherId->videoId2;
			$video_exist = ModelsVideo::where('id',$videoId2)->count();
			if($video_exist==0){
				$Videos = new ModelsVideo();
				$Videos->playlistId = 1;
				$Videos->poster = '';
				$Videos->title = 'Youtube video';
				$Videos->description = 'Description';
				$Videos->type = $videoType2;
				$Videos->youtubeUrl = $youtubeLink2;
				$Videos->file = '';
				$Videos->created = Carbon::now();
				$Videos->updated = Carbon::now();
				if($Videos->save())
				{
					$new_id = $Videos->id;
					$teachers = ModelsTeacher::where('id',$teacherId)->update(['videoId2'=>$new_id]);
					if($teachers)
					{
						//$json = json_encode(['status'=>'true']);
						//return $json;
					}
				}
			}
			else
			{
				$Videos = ModelsVideo::where('id',$videoId2)->update(['title'=>'Youtube video','type'=>$videoType2,'youtubeUrl'=>$youtubeLink2,'file'=>'','updated'=>Carbon::now()]);
				if($Videos)
				{
					//$json = json_encode(['status'=>'true']);
					//return $json;
				}
			}
		}
		$this->checkProfileLevel($user->teacherId);
		if($videoType=='Youtube' && $youtubeLink=='' && $videoType2=='Youtube' && $youtubeLink2=='')
		{
			$json = json_encode(['status'=>'true','msg'=>'No Change']);
			return $json;
		}
		else
		{
			$json = json_encode(['status'=>'true','msg'=>'Link update successfully']);
			return $json;
		}
		die;
	}
	public function deleteVideo(Request $request){
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacherId = $user->teacherId->id;
		$video_id = $request->video_id;
		$fieldName = $request->field;
		$res = ModelsVideo::where('id',$video_id)->first();
		if($res->type == 'File')
		{
			$fileName = explode('/uploads/videos/',$res->file);
			if(\File::exists(public_path('videos').'/'.$fileName[1])){
			  \File::delete(public_path('videos').'/'.$fileName[1]);
			} 
		}
		$Videos = ModelsVideo::where('id',$video_id)->delete();
		if($Videos)
		{
			$teachers = ModelsTeacher::where('id',$teacherId)->update([$fieldName=>0]);
			if($teachers)
			{
				$json = json_encode(['status'=>'true']);
				return $json;
			}
		} 
		die;
	}
	public function imgRotate(Request $request){
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacherId = $user->teacherId->id;
		$img_rotate_angle = $request->angle.' ';
		$alias = $user->teacherId->urlName;
		
		$data = array(
					'img_rotate_angle' => $img_rotate_angle,
					'alias' => $alias
				);

		$verify = curl_init();
		curl_setopt($verify, CURLOPT_URL, "https://www.musikalessons.com/teachers/simple/rotate/");
		curl_setopt($verify, CURLOPT_POST, true);
		curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
		$val = curl_exec($verify);
		//$captcha_success=json_decode($val);
		
		//print_r($val);
		
		$json = json_encode(['status'=>'true']);
		return $json;
		
		/* if ($captcha_success->success==false) {
			
			exit;
		} */
		
		
		die;
	}
	
	public function support()
	{
		 return view('support');
	}
	public function support_request(Request $request)
	{
		//echo "sdfgsd";
		$at=$this->validate($request, [
			'full_name'=>'required',
			'phone'=>'required|min:7|numeric',
			'email' =>'required|email',
			'message'=>'required',
		   ],[
			'phone.required'    => 'Phone number is required. Phone number must be 7 digits without special characters.',
			'phone.numeric'    => 'Phone number must be 7 digits without special characters.',
			'phone.min'    => 'Phone number must be 7 digits without special characters.',
			'message.required'    => 'Message is required'
		   ]);
		 $emailIds = ['scottbrady@musikalessons.com', 'nlee@musikalessons.com']; //['rockingteamf@gmail.com'];  
		 $fullname = $request->full_name;
		//  Mail::send('emails.support', [
		// 	'fName' => $request->full_name,
		// 	'Email'=>$request->email,
		// 	'Message'=>$request->message,
		// 	'Phone'=>$request->phone
		// 	], function ($m) use ($fullname,$emailIds){
		// 	$m->from('musika@musikalessons.com','Musikalessons')->to('musika@musikalessons.com','Musika')
		// 	->subject('Request information for support.')
		// 	->sender('musika@musikalessons.com','Musikalessons')
		// 	->replyTo('musika@musikalessons.com','Musikalessons');
		// 	});  
		$details = [
			'fName' => $request->full_name,
			'Email'=>$request->email,
			'Message'=>$request->message,
			'Phone'=>$request->phone
			];
			Mail::to('naveensony02@gmail.com')->send(new \App\Mail\Support($details));
		//die;
		if (Mail::failures()) {
			return back()->with('status','Request not sent.');
		}
		else{
			return back()->with('status','Request has been sent successfully.');
		}

		 
		 
	}

	public function getHashPwd(Request $request){
		
		$password =  Hash::make($request->pwd);
		$json = json_encode(['status'=>'true','password'=>$password]);
		return $json;
		//die;
	}
	
	public function updateTecherIds(Request $request){
		$teacher=ModelsTeacher::orderBy('id','DESC')->get();
		
		$tcount = ModelsTeacher::count();
		$techcount = ModelsTeacherName::count();
		echo "<pre>";
		echo "Teachers : ".$tcount.' teacherNames : '.$techcount.'<br>';
		
		foreach($teacher as $val){
			$remoteTeacherId[] = $val->remoteTeacherId; 
			$userId = $val->userId;
			echo "update `teacherNames` set musika_id = $userId where `teacherId` = ".$val->remoteTeacherId.';<br>';	
		}
		
		//print_r($t_id);
		echo '<br><br> TeacherNames table <br>';
		$teacherNames = ModelsTeacherName::whereNotIn('teacherId',$remoteTeacherId)->get();
		$teacherNamesCount = ModelsTeacherName::whereIn('teacherId',$remoteTeacherId)->count();
		echo "Matched : ".$teacherNamesCount.'<br>';
		echo "Not Matched : ".$teacherNames->count();
		echo '<br>';
		$res = [];
		foreach($teacherNames as $tdata){
			$r['teacherId'] = $tdata->teacherId;
			$r['firstName'] = $tdata->firstName;
			$r['email'] = $tdata->email;
			array_push($res,$r);
			
			echo "update `teacherNames` set musika_id = '-1' where `teacherId` = ".$r['teacherId'].';<br>';
		}
		//print_r($res);
		
		
		/* $tName=TeacherName::orderBy('teacherId','DESC')->get();
		foreach($tName as $val){
			$tId[] = $val->teacherId; 
		}
		//User::where('id',Auth::id())->with('teacherId')->first();
		$Teac = Teacher::whereNotIn('remoteTeacherId',$tId)->get();
		$teacherCount = Teacher::whereIn('remoteTeacherId',$tId)->count();
		echo '<br><br> Teacher table <br>';
		echo "Matched : ".$teacherCount.'<br>';
		echo "Not Matched : ".$Teac->count();
		echo '<br>';
		//echo $teachers = Teacher::whereNotIn('remoteTeacherId',$teacherId)->count();
		
		//$teachers = TeacherName::where('teacherId','76')->update(['musika_id'=>'0']);
		$result=[];
		foreach($Teac as $data){
			$r['id'] = $data->id;
			$r['userId'] = $data->userId;
			$r['remoteTeacherId'] = $data->remoteTeacherId;
			$r['firstName'] = $data->firstName;
			
			$user = User::where('id',$r['userId'])->first();
			
			$r['email'] = $user->email;
			
			array_push($result,$r);
		} 
		print_r($result);*/
		
		die;
	}
	
	public function checkLaravelPwd(){
		//echo "dsd";->where('id', '<', 1000)->where('id', '>=', 15000)->where('id', '<', 15500)
		//$user=User::with('teacherId')->get();
		//$te = Teacher::count();
		$remoteId = [];
		$userId = [];
		$idPwd = [];
		//$userCnt = $user->count();
		//echo $user[0]->id.'<br>';
		//echo 'User table cnt = '.$userCnt.'; Teachers table cnt = '.$te.'<br><br>';
		//die;
		/* foreach($user as $data){
				array_push($remoteId, $data->teacherId->remoteTeacherId);
				array_push($userId, $data->id);
				
				//$val['remoteId']=$data->teacherId->remoteTeacherId;
				//$val[$data->teacherId->remoteTeacherId]=$data->password;
				//array_push($idPwd, $val);
		} */
		//echo "<pre>";
		//print_r($remoteId);die;
		//Hash::make($request->pwd);
		
		$testRemoteId = [22395];			//[17585,17587,17588,17589,17590,17591,17592,17593,17594,17595,17596,17597,17598,17599,17600,17601,17602,17603,17604,17605,17606,17607,17608,17609,17610,17611,17612];
		//print_r($testRemoteId);die;
		$teachernames = ModelsTeacherName::whereIn('teacherId',$testRemoteId)->get();
		//echo  $teacherCnt = $teachernames->count();
		//dd($teachernames);
		//die;
		$pwd=[];
		foreach($teachernames as $t_data){
			
			$credentials = ['email' => $t_data->email, 'password' => $t_data->password];

			if (Auth::attempt($credentials)) {
				// Authentication passed...
				//echo "true ".$t_data->musika_id.' '.$t_data->email.' '.$t_data->password.'<br>';
			}
			else{
				echo "false ".$t_data->musika_id.' '.$t_data->email.' '.$t_data->password.'<br>';
			}
			
		}
		//print_r($pwd);
		
		
		
		
		die;
	}
	
	public function paymentMethod()
    {
        $user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacherId = $user->teacherId->remoteTeacherId;
		$teacher_profile=ModelsTeacherName::with('yourState')->where('teacherId',$user->teacherId->remoteTeacherId)->first();
		//dd($teacher_profile);
		$statename=ModelsState::all();
		
		$payment_info = ModelsTeacherPaymentMethod::where('teacherId',$teacherId)->first();
		//dd($payment_info);
		return view('payment_method',compact('teacher_profile','statename','payment_info'));
    }
	public function submitPaymentMethod(Request $request)
    {
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacherId = $user->teacherId->remoteTeacherId;
		$teacherName = $user->teacherId->firstName.' '.$user->teacherId->lastName;
		$e_sign_date = Carbon::now();
		//echo $request->payout_method; die;
		if($request->payout_method=="Direct Deposit"){
			$at=$this->validate($request, [
			'payout_method'=>'required',
			'type_of_account'=>'required',
			'accont_holder_name'=>'required',
			'routing_no'=>'required|numeric|confirmed',
			'routing_no_confirmation' => '',
			'account_no'=>'required|numeric|confirmed',
			'account_no_confirmation' => '',
			'bank_name'=>'required',
			'chk_confirmation'=>'required',
			'e_sign'=>'required'
		   ],[
			'payout_method.required'    => 'Please select payout method.',
			'type_of_account.required'    => 'Please select type of account.',
			'accont_holder_name.required'    => "Account holder's name is required.",
			'routing_no.required'    => 'Routing number is required.',
			'routing_no.numeric'    => 'Routing number must be only digits without special characters.',
			'routing_no.confirmed'    => 'Routing number confirmation does not match.',
			'account_no.required'    => 'Account number is required.',
			'account_no.numeric'    => 'Account number must be only digits without special characters.',
			'account_no.confirmed'    => 'Account number confirmation does not match.',
			'bank_name.required'    => 'Bank Name is required',
			'chk_confirmation.required'    => 'Please check authorization check box.',
			'e_sign.required'    => 'E-Signature is required'
		   ]);
		   
		   
		   $cnt_result = ModelsTeacherPaymentMethod::where('teacherId',$teacherId)->count();
		   //dd($cnt_result);
		   if($cnt_result){
				ModelsTeacherPaymentMethod::where('teacherId',$teacherId)->update([
				'payout_method'=>$request->payout_method,
				'type_of_account'=>$request->type_of_account,
				'accont_holder_name'=>$request->accont_holder_name,
				'routing_no'=>$request->routing_no,
				'account_no'=>$request->account_no,
				'bank_name'=>$request->bank_name,
				'e_sign'=>$request->e_sign,
				'e_sign_date'=>$e_sign_date
				]); 
		   }else{
			    $PaymentMethod = new ModelsTeacherPaymentMethod();
				$PaymentMethod->teacherId = $teacherId;
				$PaymentMethod->payout_method = $request->payout_method;
				$PaymentMethod->type_of_account = $request->type_of_account;
				$PaymentMethod->accont_holder_name = $request->accont_holder_name;
				$PaymentMethod->routing_no = $request->routing_no;
				$PaymentMethod->account_no = $request->account_no;
				$PaymentMethod->bank_name = $request->bank_name;
				$PaymentMethod->e_sign = $request->e_sign;
				$PaymentMethod->e_sign_date = $e_sign_date;
				$PaymentMethod->save();
		   }
		 
			//$emailIds = ['scottbrady@musikalessons.com', 'nlee@musikalessons.com'];
			$emailIds = ['synapse235@gmail.com'];//['rockingteamf@gmail.com'];
				//  Mail::send('emails.payment_method_info', [
				// 'teacherName' => $teacherName,
				// 'payout_method' => $request->payout_method,
				// 'type_of_account'=>$request->type_of_account,
				// 'accont_holder_name'=>$request->accont_holder_name,
				// 'routing_no'=>$request->routing_no,
				// 'account_no'=>$request->account_no,
				// 'bank_name'=>$request->bank_name,
				// 'e_sign'=>$request->e_sign,
				// 'e_sign_date'=>$e_sign_date
				// ], function ($m) use ($emailIds){
				// $m->from('musika@musikalessons.com','Musikalessons')->to('synapse235@gmail.com','Musika')
				// ->subject('Payment method information')
				// ->sender('musika@musikalessons.com','Musikalessons')
				// ->replyTo('musika@musikalessons.com','Musikalessons');
				// });  
				//die;
				// if (Mail::failures()) {
				// 	return back()->with('status','Mail not sent.');
				// }
				$emailIds = ['naveensony02@gmail.com'];
				$details = [
					'teacherName' => $teacherName, 
				'payout_method' => $request->payout_method,
				'type_of_account'=>$request->type_of_account,
				'accont_holder_name'=>$request->accont_holder_name,
				'routing_no'=>$request->routing_no,
				'account_no'=>$request->account_no,
				'bank_name'=>$request->bank_name,
				'e_sign'=>$request->e_sign,
				'e_sign_date'=>$e_sign_date,
				'title' => 'hi',
				'body' => 'hello'
				];
				Mail::to('naveensony02@gmail.com')->send(new \App\Mail\PaymentMethod($details));
				return back()->with('status','Your payment information has been updated successfully.');
		
		   
		}
		else if($request->payout_method=="Payment by Mail")
		{
			$at=$this->validate($request, [
			'addressL1'=>'required',
			'city'=>'required',
			'state'=>'required',
			'zipcode'=>'required|regex:/\b\d{5}\b/'
		   ],[
			'address.required'    => 'Address is required.',
			'city.required'    => 'City is required.',
			'state.required'    => 'State name is required.',
			'zipcode.required'    => 'ZipCode number is required.',
			'zipcode.regex'    => 'ZipCode number should be valid format.'
		   ]);
		   
		   
		   $cnt_result = ModelsTeacherPaymentMethod::where('teacherId',$teacherId)->count();
		   if($cnt_result){
			   ModelsTeacherPaymentMethod::where('teacherId',$teacherId)->update([
				'payout_method'=>$request->payout_method,
				'addressL1'=>$request->addressL1,
				'addressL2'=>$request->addressL2,
				'city'=>$request->city,
				'state'=>$request->state,
				'zipcode'=>$request->zipcode
				]); 
		   }else{
			   $PaymentMethod = new ModelsTeacherPaymentMethod();
				$PaymentMethod->teacherId = $teacherId;
				$PaymentMethod->payout_method = $request->payout_method;
				$PaymentMethod->addressL1 =$request->addressL1;
				$PaymentMethod->addressL2 =$request->addressL2;
				$PaymentMethod->city = $request->city;
				$PaymentMethod->state = $request->state;
				$PaymentMethod->zipcode = $request->zipcode;
				$PaymentMethod->save();
		   }
			
			$emailIds = ['synapse235@gmail.com'];//['rockingteamf@gmail.com'];
			//  Mail::send('emails.payment_method_info', [
			// 'teacherName' => $teacherName,
			// 'payout_method' => $request->payout_method,
			// 'addressL1' => $request->addressL1,
			// 'addressL2'=>$request->addressL2,
			// 'city'=>$request->city,
			// 'state'=>$request->state,
			// 'zipcode'=>$request->zipcode
			// ], function ($m) use ($emailIds){
			// $m->from('musika@musikalessons.com','Musikalessons')->to('synapse235@gmail.com','Musika')
			// ->subject('Payment method information')
			// ->sender('musika@musikalessons.com','Musikalessons')
			// ->replyTo('musika@musikalessons.com','Musikalessons');
			// });  
			// //die;
			// if (Mail::failures()) {
			// 	return back()->with('status','Mail not sent.');
			// }
			
			$emailIds = ['naveensony02@gmail.com'];
				$details = [
					'teacherName' => $teacherName, 
				'payout_method' => $request->payout_method,
				'addressL1' => $request->addressL1,
				'addressL2'=>$request->addressL2,
				'city'=>$request->city,
				'state'=>$request->state,
				'zipcode'=>$request->zipcode,

				
				];
				Mail::to('naveensony02@gmail.com')->send(new \App\Mail\PaymentMethod($details));
				return back()->with('status','Your payment information has been updated successfully.');
			return back()->with('status','Your address information has been updated successfully.');
				
		}else{
			return back()->with('status','something wrong...');
		} 
	
    }
	
	
	
}