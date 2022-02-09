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
use App\Models\ProspectiveStudent as ModelsProspectiveStudent;
use App\Models\StudentName as ModelsStudentName;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Auth;
use App\ProspectiveStudent;
class ViewStudentController extends Controller
{
 

	public function view($studentid)
	{
			$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
			$student_details=ModelsStudentName::withCount('hasLesson','approveLesson')->with(['hasAdmission.instName','hasLesson'=>function($query){
				
				$query->orderBy('lessonDate', 'DESC');
				
			}])->where('studentId',$studentid)->first();
								
			
			//dd($student_details);
		
			
			return view('viewStudent',compact('student_details'));
	}
	
	public function viewNewStudent($studentid)
	{
			$student_details=ModelsProspectiveStudent::with('instName')->where('studentId',$studentid)->first();
			//dd($student_details);
						
			return view('view_prospective_Students',compact('student_details'));
	}
	public function viewAwaitingStudent($studentid)
	{
			$student_details=ModelsProspectiveStudent::with('instName')->where('studentId',$studentid)->first();
			//dd($student_details);
						
			return view('view_Awaiting_Students',compact('student_details'));
	}
}
