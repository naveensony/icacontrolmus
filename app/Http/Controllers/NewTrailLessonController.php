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
use App\Models\Connection as ModelsConnection;
use App\Models\User as ModelsUser;
use App\ProspectiveStudent;
use App\ProspectiveStatus;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;

class NewTrailLessonController extends Controller
{
  
	public function getprocpetiveStudent(Request $request)
	{
		//echo $request->stuId; die;
		$user = ModelsUser::where('id', Auth::id())->with('teacherId')->first();
		$prospective_students = ModelsConnection::with(['prospectiveStudent' =>
		function ($query)
		{
		$query->where(['is_connected' => 1, 'had_lesson' => 0]);
		}
		])->where('teacherid', $user->teacherId->remoteTeacherId)->where('dateInitInformed', '0000-00-00 00:00:00')->get();
		
		//dd($prospective_students); //studentId
/* 		if(isset($request->stuId))
		{
			if($prospective_students->prospectiveStudent->studentId == $request->stuId)
			{
				echo $student->connectId; die;
			}
		} */
		
		$count = 0;
		$tname=$user->firstName.' '.$user->lastName;
		foreach($prospective_students as $s)
		{
			if (!is_null($s->prospectiveStudent))
			{
			$count++;
			}
		}
		if(isset($request->stuId))
		{
			$connectId = $request->stuId;
			return view('newMail', compact('prospective_students', 'count','tname','connectId'));
		}
		else
		{
			return view('newMail', compact('prospective_students', 'count','tname'));
		}
   }
}
