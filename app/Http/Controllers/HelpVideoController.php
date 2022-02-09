<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpVideoController extends Controller
{
   public function helpVideo_introLesson()
	{
		return view('Submitting_Intro_Lesson');
	}
	public function helpVideo_changeStatus()
	{
		return view('change_student_status');
	}
	public function helpVideo_logggingLessons()
	{
		return view('loggging_lessons');
	}
	public function helpVideo_requestStudent()
	{
		return view('video_requesting_students');
	}
}
