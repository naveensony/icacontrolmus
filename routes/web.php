<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\Http\Controllers\control\CustomerController;
use App\Http\Controllers\control\DashboardController;
use App\Http\Controllers\control\LinkController;
use Illuminate\Support\Facades\Hash;
use App\Models\TeacherName;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\control\LoginController as ControlLoginController;
use App\Http\Controllers\control\Newapplication;
use App\Http\Controllers\control\ProspectiveController;
use App\Http\Controllers\control\SettingsController;
use App\Http\Controllers\control\StudentsController;
use App\Http\Controllers\control\TeacherController;

//use Auth;

Route::get('/why-choose-musika', function () {
    return view('whychoose');
});
Route::get('/how-lesson', function () {
    return view('howlessons');
});
Route::get('/rates', function () {
    return view('rates');
});
Route::get('/risk-free-trail', function () {
    return view('riskfreetrail');
});
Route::get('/contact-us', function () {
    return view('contact');
});
Route::get('/about-us', function () {
    return view('about');
});
Route::get('/metros', function () {
    return view('metros');
});
Route::get('/faqq', function () {
    return view('faq');
});
Route::get('/instruments', function () {
    return view('instruments');
});
Route::get('/online-music', function () {
    return view('onlinemusic');
});
Route::get('/instructor-area', function () {
    return view('instructorarea');
});
Route::get('/teacher-search', function () {
    return view('teachersearch');
});
Route::get('/blog', function () {
    return view('blog');
});
Route::get('/teaching-opportunities', function () {
    return view('teachingopportunities');
});

Route::get('/', function () {
	return view('index');
});

/////system musica///

////////////////////

///////control musica////

Route::get('/control/loging_in', function () {
	return view('control.loging_in');
});
Route::get('/control/clock_in', function () {
	return view('control.clock_in');
})->name('control.clock_in');
Route::get('/control/login', [ControlLoginController::class, 'loginpage'])->name('control.loginpage');
Route::post('/control/login', [ControlLoginController::class, 'index'])->name('control.login');
Route::get('/control/logout', [ControlLoginController::class, 'logout'])->name('control.logout');


Route::get('/control/dashboard', [ControlLoginController::class, 'dashboard'])->name('control.dashboard');

Route::get('/control/new_application', [Newapplication::class, 'index'])->name('control.new_application');
Route::get('/control/prospective', [ProspectiveController::class, 'index'])->name('control.prospective');
Route::get('/control/student', [StudentsController::class, 'index'])->name('control.student');
Route::get('/control/links', [LinkController::class, 'index'])->name('control.links');

Route::get('/control/control/customer', [CustomerController::class, 'index'])->name('control.control.customer');
Route::get('/control/control/dashboard', [DashboardController::class, 'index'])->name('control.control.dashboard');
Route::get('/control/control/student', [StudentsController::class, 'controlindex'])->name('control.control.student');
Route::get('/control/control/teacher', [TeacherController::class, 'index'])->name('control.control.teacher');
Route::get('/control/control/search_metro', [TeacherController::class, 'searchmetro'])->name('control.control.searchmetro');
Route::post('/control/control/search_metro', [TeacherController::class, 'searchmetro'])->name('control.control.searchmetrosearch');
Route::get('/control/control/ip_manager', [SettingsController::class, 'ipmanager'])->name('control.control.ipmanager');
Route::get('/control/control/instruments', [SettingsController::class, 'instruments'])->name('control.control.instruments');


///////////////


Route::get('/test/{userid?}',function($userid){
	$passowrd=TeacherName::where('teacherId',$userid)->first(['password','firstName','lastName']);
	dd(Hash::make($passowrd->password));
	$al=['fname'=>$passowrd->firstName,'lname'=>$passowrd->lastName,'laravel_pwd'=>Hash::make($passowrd->password)];
	dd($al);
});

Route::post('/prosstd', function(){
	return "df";	
})->middleware('AutotLogin');


Route::get('applgn/{key}', function($key){
	$auto_login_key = base64_decode($key);//decrypt($key,'your secret key');
	$teacher_res=TeacherName::where('autologin_key',$auto_login_key)->first();
	//dd($teacher_res);

	if($teacher_res){
		$user=User::where('id',$teacher_res->musika_id)->first();
		//dd($user);
		if($user){
			  Auth::login($user); // login user automatically
			  return redirect('/profile');
		}else {
			 return redirect('/musikanotfound');
		}

	}else{
		return redirect('/musikanotfound');
	}
	//die;
});

Route::get('availablestudents/{key}', function($key){
	$auto_login_key = base64_decode($key);//decrypt($key,'your secret key');
	$teacher_res=TeacherName::where('autologin_key',$auto_login_key)->first();
	//dd($teacher_res);

	if($teacher_res){
		$user=User::where('id',$teacher_res->musika_id)->first();
		//dd($user);
		if($user){
			  Auth::login($user); // login user automatically
			  return redirect('/prospectives');
		}else {
			 return redirect('/musikanotfound');
		}

	}else{
		return redirect('/musikanotfound');
	}
	//die;
});


//VDRTUWlQSHVzQkd3dFlPZVY3OEI=
//https://devteacher.musikalessons.com/applgn/ODZBNERaWTJlZmtVUGx0T1dLbjI=
//https://devteacher.musikalessons.com/applgn/ODZBNERaWTJlZmtVUGx0T1dLbjI=

Route::get('/musikanotfound', 'ProspectiveController@musika_alert')->name('musikanotfound');
Route::get('/musika_error', 'ProspectiveController@musika_error')->name('musika_error');


Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Test mail title',
        'body' => 'test mail body'
    ];
   
    Mail::to('naveensony02@gmail.com')->send(new \App\Mail\MyTestMail($details));
   
    dd("Email is Sent.");
});
/* from edward account :- https://teachers.musikalessons.com/prosstd?XGiQb=ZWR3YXJkc2NvdHRicmFkeUBnbWFpbC5jb20=&reqids=MjYxODMyfDI2MTgzOQ==

from Pejmana account :- https://teachers.musikalessons.com/prosstd?XGiQb=ZWR3YXJkc2NvdHRicmFkeUBnbWFpbC5jb20=&reqids=MjYxODMyfDI2MTgzOQ== */


//Route::get('/updateProspective', 'HomeController@updateProspective')->name('changeStatus');



Route::post('/getHashPwd', 'TeacherprofileController@getHashPwd')->name('getHashPwd');
Route::get('/updateTecherIds', 'TeacherprofileController@updateTecherIds');
Route::get('/support', 'TeacherprofileController@support')->name('support');
Route::get('/checkLaravelPwd', 'TeacherprofileController@checkLaravelPwd');
Route::post('/support_request', 'TeacherprofileController@support_request');
Route::get('/studentMessageBox', 'ChatBoxController@studentMessageBox')->name('studentMessageBox');

Auth::routes();

Route::middleware(['auth'])->group(function () {
	
	Route::get('/new-submit-entry','SubmitEntryController@view')->name('new-submit-entry');
	Route::get('/getStatus', 'ChangeStatusController@getStatus')->name('getStatus');
	Route::get('/terminateLessons','TerminateLessonsController@terminatStudent')->name('terminate-student');
	
	
	
	Route::get('/invoice/{admissionId}', 'InvoiceController@invoiceAsPerAdmission')->name('invoice');
	Route::get('/invoice/{admissionId}/{month}/{year}', 'InvoiceController@invoiceAsPerAdmission')->name('invoice');
	Route::get('/invoice/{month}/{year}', 'InvoiceController@invoice')->name('invoice');
	Route::post('/checkDuplicateValue','SubmitEntryController@checkDuplicateValue')->name('checkDuplicateValue');
	
	Route::post('/updateStatus', 'ChangeStatusController@updateStatus');
	
});

  // below routing are accessible after login into website 
Route::middleware(['auth'])->group(function () {
	
//Route::get('/', 'HomeController@index')->name('main');	
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

Route::post('/saveTerminateLessons','TerminateLessonsController@saveTerminateLessons');

Route::post('/confirmation','TerminateLessonsController@confirmation');

Route::get('/invoice', 'InvoiceController@invoice')->name('invoice');
Route::post('/invoice/deletelesson', 'InvoiceController@deleteLesson')->name('dellesson');
//Route::get('/invoice/{which}', 'InvoiceController@invoice')->name('invoice');


Route::get('/trialLesson', 'NewTrailLessonController@getprocpetiveStudent')->name('trail-lesson');
Route::get('/review', 'HomeController@getReview')->name('review');
Route::post('/reviewdelete', 'HomeController@requestForReviewDeletion')->name('requestForReviewDeletion');

//Route::get('/calendar','SubmitEntryController@calendar')->name('calendar');
Route::get('/MapTest','SubmitEntryController@calendar')->name('calendar');

Route::post('/getInstrument','SubmitEntryController@getInstrument');
Route::post('/post_referral','SubmitEntryController@post_referral');
Route::post('/sendEmailForChangedLessonLoc','SubmitEntryController@sendEmailForChangedLessonLoc')->name('sendEmailForChangedLessonLoc');
Route::get('/referral','SubmitEntryController@referral')->name('referral');
Route::get('/prospectives','ProspectiveController@getProspective')->name('viewProspective');
Route::post('/prospectives/zipValidate','ProspectiveController@zipValidate');
Route::post('/prospectives','ProspectiveController@searchProspective')->name('searchProspective');
Route::post('/prospectives/prospectives_request','ProspectiveController@prospectives_request')->name('prospectives_request');
Route::get('/prospectives/prospectives_request','ProspectiveController@prospectives_request')->name('prospectives_request');
Route::post('/prospectives/prospectives_send_request','ProspectiveController@prospectives_send_request')->name('prospectives_send_request');
Route::post('/prospectives/updateProspective','ProspectiveController@updateProspective');
Route::post('/prospectives/viewProspectiveStatus','ProspectiveController@viewProspectiveStatus')->name('viewProspectiveStatus');
//Route::get('/prospectives/viewProspectiveStatus','ProspectiveController@viewProspectiveStatus')->name('viewProspectiveStatus');
Route::get('/prospectives/backgroundcheck','ProspectiveController@backgroundcheck')->name('backgroundcheck');
Route::post('/prospectives/checkStudioLocation','ProspectiveController@checkStudioLocation');
Route::post('/prospectives/saveStudioLocation','ProspectiveController@saveStudioLocation');
Route::post('/prospectives/deleteStudioLocation','ProspectiveController@deleteStudioLocation');
Route::get('/assignments', 'ProspectiveController@assignments')->name('assignments');

Route::get('/allLessons/{admissionId}', 'InvoiceController@allLessons')->name('allLessons');
Route::get('/viewStudent/{admissionId}', 'ViewStudentController@view')->name('viewStudent');
Route::get('/viewNewStudent/{admissionId}', 'ViewStudentController@viewNewStudent')->name('viewNewStudent');
Route::get('/viewAwaitingStudent/{admissionId}', 'ViewStudentController@viewAwaitingStudent')->name('viewAwaitingStudent');
Route::get('/faq', 'HomeController@handbook')->name('handbook');
Route::resource('account', 'TeacherprofileController');
Route::get('/profile', 'TeacherprofileController@profile')->name('profile');
Route::get('/paymentMethod', 'TeacherprofileController@paymentMethod')->name('paymentMethod');
Route::post('/submitPaymentMethod', 'TeacherprofileController@submitPaymentMethod')->name('submitPaymentMethod');
Route::get('/profile/test', 'TeacherprofileController@profileTest');
Route::post('/TeritoryLocations', 'TeacherprofileController@TeritoryLocations')->name('TeritoryLocations');
Route::post('/deletePolygon', 'TeacherprofileController@deletePolygon')->name('deletePolygon');
Route::post('/updateTeritoryLocationsDays', 'TeacherprofileController@updateTeritoryLocationsDays');
Route::post('/StudiosLocations', 'TeacherprofileController@StudiosLocations');
Route::post('/RemoveStudiosLocations', 'TeacherprofileController@RemoveStudiosLocations');
Route::post('/updateRangeSlider', 'TeacherprofileController@updateRangeSlider');
Route::post('/updateStyles', 'TeacherprofileController@updateStyles');
Route::post('/updateDegreeAward', 'TeacherprofileController@updateDegreeAward');
Route::post('/updateProfileImage', 'TeacherprofileController@updateProfileImage');
Route::post('/deleteProfilePhoto', 'TeacherprofileController@deleteProfilePhoto');
Route::post('/updatePersonalDesc', 'TeacherprofileController@updatePersonalDesc');
Route::post('/teacherSchedule', 'TeacherprofileController@teacherSchedule');
Route::post('/spotlightAnswer', 'TeacherprofileController@spotlightAnswer');
Route::post('/uploadGalleryImage', 'TeacherprofileController@uploadGalleryImage');
Route::post('/deleteGalleryPhoto', 'TeacherprofileController@deleteGalleryPhoto');
Route::post('/uploadWelcomeVideo', 'TeacherprofileController@uploadWelcomeVideo');
Route::post('/updateVideoInfo', 'TeacherprofileController@updateVideoInfo');
Route::post('/deleteVideo', 'TeacherprofileController@deleteVideo');
Route::post('/teachSection', 'TeacherprofileController@teachSection');
Route::post('/updatepassword/{id}', 'TeacherprofileController@updatePassword')->name('updatepassword');
Route::post('/updateInstrument', 'TeacherprofileController@updateInstrument')->name('updateInstrument');
Route::post('/imgRotate', 'TeacherprofileController@imgRotate');
Route::get('/helpvideo/requesting-students', 'HelpVideoController@helpVideo_requestStudent')->name('requesting-student');
Route::get('/helpvideo/submitting-intro-lesson', 'HelpVideoController@helpVideo_introLesson')->name('intro-lesson');
Route::get('/helpvideo/change-student-status', 'HelpVideoController@helpVideo_changeStatus')->name('change-status');
Route::get('/helpvideo/logging-lessons', 'HelpVideoController@helpVideo_logggingLessons')->name('logging-lessons');


Route::get('/reminderStatus', 'ChangeStatusController@reminderStatus');
Route::get('/messages/{sid}', 'ChatBoxController@view')->name('messages');
Route::post('/getMessagebyStudent', 'ChatBoxController@getMessagebyStudent');
Route::post('/saveMessagebyTeacher', 'ChatBoxController@saveMessagebyTeacher');
Route::get('/studentsList', 'ChatBoxController@studentRequested')->name('studentsList');
Route::get('/messageBox/{studentId}', 'ChatBoxController@messageBox')->name('messageBox');

Route::get('/messageWithTeacher', 'ChatBoxController@messageWithTeacher')->name('messageWithTeacher');
Route::get('/chatroom', 'ChatBoxController@chatroom')->name('chatroom');
  });	
	// Display all SQL executed in Eloquent
Event::listen('illuminate.query', function($query)
{
    var_dump($query);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
///
// DB_CONNECTION=mysql
// DB_HOST=203.134.206.32
// DB_PORT=3306
// DB_DATABASE=musikalessons
// DB_USERNAME=musikalessons_live
// DB_PASSWORD=VHiYEMLBeWoAc9gG