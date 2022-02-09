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
use App\Models\State as ModelsState;
use App\Models\TeacherName as ModelsTeacherName;
use App\Models\User as ModelsUser;
use App\ProspectiveStudent;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;
use App\State;
class ProfileController extends Controller
{
    public function show()
	{
		$user=ModelsUser::where('id',Auth::id())->with('teacherId')->first();
		$teacher_profile=ModelsTeacherName::with('yourState')->where('teacherId',$user->teacherId->remoteTeacherId)->first();
		//dd($teacher_profile);
		$statename=ModelsState::all();	
		
		return view('teacher_profile',compact('teacher_profile','statename'));
		
	}
	
	
}
