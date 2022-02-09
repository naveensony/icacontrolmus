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
use App\Models\Connection as ModelsConnection;
use App\Models\Instrument as ModelsInstrument;
use App\Models\Review as ModelsReview;
use App\Models\User as ModelsUser;
use App\ProspectiveStudent;
use App\ProspectiveStatus;
use Illuminate\Support\Facades\Auth;
use App\Review;
use DB;
use Carbon\Carbon;
use App\Service\Pageblock;
use Illuminate\Support\Facades\Mail;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
		/* $pageblock =  new Pageblock();
		
		$blockresult = $pageblock->checkPageBlock();
		
		print_r($blockresult);
		die; */
		/*
			Auth:id()= Current User Id;
			teacherId= Relation on Teachers Table;
			Des-> Find the teacherid of current authenticated user;
		*/	
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		//dd($user); //debug $user
		/* Get Admission(Registered Student) with student table and instrument table 
		remoteTeacherId = get data from other database useing this id, please find Teacher Model App/Teacher
		*/
		
		$istrument = ModelsInstrument::where('instrumentName','Adjustment')->first();
		if(!empty($istrument)){
			$instrId = $istrument->instrumentId;
		}else{
			$instrId ='';
		}
		
		$admission=ModelsAdmission::with(['name'=> function ($query) {
		$query->orderBy('lastName', 'ASC');},'instName'])->where('teacherid',$user->teacherId->remoteTeacherId)->where('instrumentId','!=',$instrId)->where('dateOut','0000-00-00')->get();
		
		/* 
		$expDate = Carbon::now()->subDays(45);
		
		 */
		//dd($admission); //debug $admission 
		$awaiting_students=ModelsConnection::with('prospectiveStudent','instrument','pro_status')->where('teacherid',$user->teacherId->remoteTeacherId)->where('dateInitInformed','>','0000-00-00 00:00:00')->get();
		//dd($awaiting_students);
		
		$prospective_students=ModelsConnection::with('prospectiveStudent','instrument','pro_status')->where('teacherid',$user->teacherId->remoteTeacherId)->where('dateInitInformed','0000-00-00 00:00:00')->get();
		//dd($prospective_students);
		/* echo "</pre>";
		print_r($awaiting_students);
		print_r($awaiting_students);
		print_r($prospective_students);
		
		die; */
		$log_lesson_45 = '';
		$admission_data = ''; 
	     return view('home',compact('admission','awaiting_students','prospective_students','log_lesson_45','admission_data'));
    }
	public function dashboard()
    {
		return view('dashboard');
	}
	public function handbook()
    {
		return view('handbook');
	}
	public function newMail()
	{
		 return view('newMail');
	}		
	public function getReview()
	{
		//phpinfo();die;
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$urlName = $user->teacherId->urlName;
		$sku =$user->teacherId->id; //; //3574;4245;// 
		//$sku = 12318;
		$cSession = curl_init(); 
		curl_setopt($cSession,CURLOPT_URL,'http://musika.reziew.com/api/1/review/list.json?sku=' . $sku .'&order=desc');
		curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($cSession,CURLOPT_HEADER, false); 
		$output=curl_exec($cSession);
	    $temp = array( $sku => array( 'average' => 0 , 'count' => 0) );
		$r = json_decode($output,1);
		//echo "<pre>";
		//$res = json_decode($output);
		//echo count($res->reviews);
		//print_r($res->reviews);
		$reviews=ModelsReview::where('teacherId',$sku)->where('approved',1)->get();
		if(count($reviews)>0){
			$db_reviews = $reviews;
		}else{
			$db_reviews = [];
		}
			
		//if($request->ip()=="52.191.208.186")
		//{	
			/* echo count($db_reviews);
			dd($db_reviews);
			die; */
		//}  
		
		if( $db_reviews == '[]')
		{
			$msg="No reviews have been left yet.";
			return view('review',compact('msg','urlName'));
		}
		else
		{
			curl_close($cSession);
			$r = json_decode($output,1);
			return view('review',compact('r','urlName','db_reviews'));
		}
	}
	public function requestForReviewDeletion (Request $request)
	{
		if($request->ajax())
		{	
			$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
			$tname=$user->firstName.' '.$user->lastName;
			$temail=$user->email;
			$htf=$request->ht;
			
			//echo $htf;
			//die;
			$ht=preg_replace('~>\s*\n\s*<~', '><', $htf);
			//$emailIds = ['scottbrady@musikalessons.com', 'nlee@musikalessons.com'];
			$emailIds = ['synapse235@gmail.com'];
			// Mail::send('emails.request_reivew_delete', [
			// 				'tname' => $tname,
			// 				'temail' => $temail,   //$temail,
			// 				'ht'=>$ht
			// 				], function ($m) use ($temail,$tname,$emailIds){
			// 				$m->from('musika@musikalessons.com','Musika Music Lessons')->to($emailIds)
			// 				->subject('Request For Delete Review')
			// 				->sender('musika@musikalessons.com', 'Musika')
			// 				->replyTo('edwardscottbrady@gmail.com', 'Musika');
			// 				});
			$emailIds = ['naveensony02@gmail.com'];
				$details = [
				'tname' => $tname,
			    'temail' => $temail,   
			     'ht'=>$ht
				];
				
				Mail::to('naveensony02@gmail.com')->send(new \App\Mail\RequestReviewDelete($details));
				if (!Mail::failures())
					{
						return response()->json(['msg','Your delete request has been submitted successfully']);
						die;
					}	
				else
				{
					return response()->json(['msg','Somthing went wrong. Please try Again!']);
					die;
				}
		}
	}
	
	
}