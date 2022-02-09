<!DOCTYPE html>
@extends('layouts.app')
@section('link_css')
<link href="{{asset('js/plugins/2.1.1/fullcalendar.css')}}" rel='stylesheet' >
<link href="{{asset('js/plugins/2.1.1/fullcalendar.print.css')}}" rel='stylesheet' media='print'>
 <style>
#myModal label {
    display: inline-block;
    font-weight: 500;
    margin-bottom: 5px;
    max-width: 100%;
}
.form-horizontal label {
	
	margin-left: 15px;
	 font-weight: 700;
}
#myModal1 .modal-body {
    padding: 20px 30px 0px;
}
/*.form-control, .single-line {
	width: 94% !important;
	margin-left: 14px;
}*/

.fc-view-container *, .fc-view-container *::before, .fc-view-container *::after {
	padding: 1px;
}

.jconfirm-box.jconfirm-hilight-shake.jconfirm-type-default.jconfirm-type-animated {
    width: 115%;
}
div.jc-bs3-container.container{
	padding-right: 45px !important;
	padding-left: 0px !important;
}
@media (hover:none) {
    /* No hover support */
}
.lessonClass {
    background-color: #00aeef !important;
}
.canceledClass {
    background-color: #708090 !important;
}
.myClass {
    background-color: #1ab394 !important;
}

@media screen and (min-width: 320px) and (max-width: 767px) {
	.modal-body {
		padding: 20px 5px 0px 5px;
	}
	.ibox {
    	margin-bottom: 0px;
	}
	h5 {
		  font-size: 14px !important; 
	}
	h2 {
		font-size: 21px !important;
	}
	.ibox-title {
		padding: 15px 7px 7px !important;
	}
}

@media screen and (min-width: 320px) and (max-width: 340px) {
	.fc .fc-button-group > * {
		margin: 0 0 -28px 232px;
	}
}
@media screen and (min-width: 341px) and (max-width: 374px) {
	.fc .fc-button-group > * {
		margin: 0 0 -28px 272px;
	}
}
@media screen and (min-width: 375px) and (max-width: 767px) {
	.fc .fc-button-group > * {
		margin: 0 0 -28px 324px;
	}
}

.fc-event {
    border-radius: 0px !important;
	font-family: sans-serif !important;
}
	
	
.fc-state-default {  
    border-color: #fff !important;
}
.loader-modal
{
	position: fixed;
	z-index: 999;
	height: 100%;
	width: 100%;
	top: 0;
	left: 0;
	background-color: Black;
	filter: alpha(opacity=60);
	opacity: 0.6;
	-moz-opacity: 0.8;
}
.loader-modal .center
{
	z-index: 1000;
	margin: 300px auto;
	padding: 10px;
	width: 118px;
	background-color: White;
	border-radius: 10px;
	filter: alpha(opacity=100);
	opacity: 1;
	-moz-opacity: 1;
}
.loader-modal .center img
{
	height: 100px;
	width: 100px;
}
<!-- 
 @media screen and (min-width: 320px) and (max-width: 767px) and (hover: none) {
    a:hover { color: inherit; }
} 708090-->
 </style>

@endsection
<!-- <link href='../fullcalendar.css' rel='stylesheet' />
<link href='../fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='../lib/moment.min.js'></script>
<script src='../lib/jquery.min.js'></script>
<script src='../fullcalendar.min.js'></script>
<script src='../fullcalendar.js'></script>       

-->

@section('content')
<div class="row wrapper border-bottom white-bg page-heading hideMobile">
   <div class="col-sm-8">
      <h2>Submit New Entry</h2>
   </div>
   <div class="col-sm-4">
     
   </div>
</div>
<div class="wrapper wrapper-content calendar-margin">
	<div class="row animated fadeInDown">
        <div class="col-lg-12">
			<div class="ibox float-e-margins" id="mobileClass"><!-- collapsed-->
				<div class="ibox-title">
					<h5> <i class="fa fa-hand-o-down"></i> Submission Guidelines <small style="color:red"><strong> ( Under no circumstances may you submit an entry until you have read the instructions below )</strong></small></h5>
					<div class="ibox-tools">
						<a class="collapse-link">
							<i class="fa fa-chevron-up"></i>
						</a>
			  
					</div>
				</div>
				<div id="gu" class="ibox-content">
													
				<p><b>1.</b> Be accurate so your invoices to Musika are accurate</p>
				<p><b>2.</b> All entries for a specific month must be submitted by the last day of the month. (Ex. All June entries must be entered by June 30<sup>th</sup>.) If a couple of entries are a few days late this is OK, but any longer will adversely affect the administration.</p>
				<p><b>3.</b> You must submit in the fields below the date of your initial 30 minute lesson FIRST for any new student. Once you have submitted a entry, make sure that it has been recorded in the database by checking your entries awaiting approval page. Your cookie may have timed out, thus losing the submission.</p>
				<p><b>4. </b>Once the student has confirmed they wish to have your services, they will appear in the dropdown window labeled "Student Name" below, and you can then enter the lesson and get paid.</p>
				<p><b>5. </b>Each and every week must have an entry for each student; a lesson, cancellation, or Musika vacation.</p>
				<!-- p>When doing lessons which have been extended to cover makeup time due, you MUST confirm with a parent before doing so. Do not just teach a longer lesson without the parents being aware of it.</p -->
				<p><b>6.</b> Please note that for any adult students who need makeup(s)- you must do FULL makeup lessons. The options that allow lessons plus additional makeup time will automatically be disabled for any adult student. For any child student, any type of makeup lesson (including lessons plus additional makeup time) will be accepted.</p>

				
													
				</div>
			</div>
		</div>
	</div>
							<!--<div class="row animated fadeInDown">
						     <form role="form" class="form-horizontal">
							<div class="col-lg-6">
							   <div class="form-group">
                                    <label for="exampleInputEmail2" class="form-label">Select Student</label>
                                   <select class="form-control" name="sname" id="sname" onchange="getInstrumentname()" >
                                        <option value="">--</option>
										@foreach($studentData as $students)
										<option value="{{$students->studentId}}"  >{{$students->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>
								<div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword2" >Select Instrument</label>
                                   <select class="form-control" name="lessonInput" id="inst" >
                                        <option value="">--</option>
										<?php //while (list($i,$n)=each($instInfo)) echo "\t\t\t<option value='$i'>$n</option>\n"; ?>
                                        
                                    </select>	
                                </div>
                                </div>
								 </form>
								</div>-->
								
								
    <div class="row animated fadeInDown">
        <div class="col-lg-3">
			<div class="ibox float-e-margins">
                <div class="ibox-content" style="padding: 15px 8px 20px 8px;">
                    <div id='external-events'>
						<h5>1. Select Student</h5>
                        <div class="form-group"> 
							<select class="form-control" name="sname" id="sname" onchange="getInstrumentname()" >
								<option value="">--</option>
								@foreach($studentData as $students)
								<option value="{{$students->studentId}}"  >{{$students->name}}</option>
								@endforeach
							</select>
						</div>
						<div ></div>
						<h5>2. Select Instrument</h5>
                        <div class="form-group" id="loading"> 
							<select class="form-control" name="lessonInput" id="inst" >
								<option value="">--</option>
							</select>
						</div>
                    </div>
                </div>
            </div>
            <div class="ibox float-e-margins hideMobile">
                <div class="ibox-title">
                    <h5><!--Saved Entry--></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                     
                    </div>
                </div>
                <div class="ibox-content">
                    <div id='external-events'>
                        <p>Drag a entry and drop into callendar.</p>
						<strong>Lesson</strong>
						<div id="0" data-value='0' class='external-event btn-primary'>Lesson taught (Use this to submit introductory lessons for payment as well.) </div>
                        <div id="1" data-value='1' class='external-event btn-primary'>Lesson + 15 minutes additional make-up time</div>
                        <div id="2" data-value='2' class='external-event btn-primary'>Lesson + 30 minutes additional make-up time</div>
                        <div id="3" data-value='3' class='external-event btn-primary'>Lesson + 45 minutes additional make-up time</div>
                        <div id="4" data-value='4' class='external-event btn-primary'>Lesson + 60 minutes additional make-up time</div>
                        <div id="5" data-value='5' class='external-event btn-primary'> Make-up lesson</div>
						<br>
						<strong>Student Cancellations </strong>
                        <div id="6" value="6" class='external-event navy-bg' style="background-color: #708090; !important">Student cancelled on same day of regularly scheduled lesson.</div>
                        <div id="7" value="7" class='external-event navy-bg' style="background-color: #708090; !important">Student cancelled on same day of make-up lesson.</div>
                        <div id="8" value="8" class='external-event navy-bg' style="background-color: #708090; !important">Student cancelled 24 hours or more in advance of regularly scheduled lesson.</div>
                        <div id="9" value="9" class='external-event navy-bg' style="background-color: #708090; !important">Student cancelled 24 hours or more in advance of make-up lesson.</div>
						<br>
						<strong>Teacher cancellations</strong>
						 <div id="10" value="10" class='external-event navy-bg' style="background-color: #708090; !important">I cancelled the regularly scheduled lesson.</div>
                        <div id="11" value="11" class='external-event navy-bg' style="background-color: #708090; !important"> I cancelled a make-up lesson.</div>
						<br>
						<strong>Musika vacation day</strong>
                        <div id="12" value="12" class='external-event navy-bg'>Vacation day - I did not teach this student because of my or student's vacation.</div>
						<br>
						<strong>Other</strong>
                        <div id="13" value="13" class='external-event navy-bg'>Other (Use this for situations when other choices do not apply)</div>
						<br>
						<strong>Student wishes to terminate lessons for good.</strong>
                        <div id="14" value="14" class='navy-bg' style="  border-radius: 2px; cursor: pointer;margin-bottom: 5px; padding: 5px 10px;"><a href="{{route('terminate-student')}}" style="color:#fff;">Student wants to stop taking lessons.</a></div>
                    
                     
                    </div>
                </div>
            </div>
     
        </div>
        <div class="col-lg-9">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>3. Select Day</h5>
                    <!--<div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>-->
                </div>
                <div class="ibox-content mobile-padding">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Submit New Entry (<span id="event_date"></span>)</h4>
      </div>
      <div class="modal-body">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
					<form method="post" action="" onsubmit="return newEntry();" class="form-horizontal">
					<input type="hidden" name="hidden_event_date" id="hidden_event_date" >
					    <div class="form-group">
					   <div class="text-left"><h4>Select Student</h4></div>
                              
                          <div class="col-12">
							
                           <select class="form-control" name="stuName" id="sname" onchange="getInstrumentNamePopup()" >
								<option value="">--</option>
								@foreach($studentData as $students)
								<option value="{{$students->studentId}}"  >{{$students->name}}</option>
								@endforeach
							</select>
						   </div>
                          </div>
					
                       <div class="form-group">
					   <div class="text-left"><h4>Select Instrument</h4></div>
                              
                          <div class="col-12">
							
                             <select class="form-control" name="insName" id="inst_pop" >
                                        <option value="">--</option>
										<?php //while (list($i,$n)=each($instInfo)) echo "\t\t\t<option value='$i'>$n</option>\n"; ?>
                                        
                                    </select>	         
                           </div>
                          </div>
					
                     <div class="form-group">
					<div class="text-left"><h4>Lesson <small>(Please read all options before making your selection)</small></h4></div>
                              
                       <div class="col-sm-12">
                       <div><label>
					   <input  value="0" id="lReg" name="lessonType" onChange="hideArea()" type="radio" checked="checked" lessonTitle="Lesson taught (Use this to submit introductory lessons for payment as well.)"> Lesson taught (Use this to submit introductory lessons for payment as well.)
						</label></div>
                       <div><label>
					   <input value="1" id="lReg15" name="lessonType" onChange="hideArea()" type="radio" lessonTitle="Lesson + 15 minutes additional make-up time">  Lesson + 15 minutes additional make-up time
						</label></div>
					 <div><label>
					   <input value="2" id="lReg30" name="lessonType" onChange="hideArea()" type="radio" lessonTitle="Lesson + 30 minutes additional make-up time">  Lesson + 30 minutes additional make-up time
						</label></div>
						
						 <div><label>
					   <input value="3" id="lReg45" name="lessonType" onChange="hideArea()" type="radio" lessonTitle="Lesson + 45 minutes additional make-up time">  Lesson + 45 minutes additional make-up time
						</label></div>
						
						 <div><label>
					   <input value="4" id="lReg60" name="lessonType" onChange="hideArea()" type="radio" lessonTitle="Lesson + 60 minutes additional make-up time">  Lesson + 60 minutes additional make-up time
						</label></div>
						
						 <div><label>
					   <input value="5" id="lMakeup" name="lessonType" onChange="hideArea()" type="radio" lessonTitle="Make-up lesson"> Make-up lesson
						</label></div>
                                </div>
                                </div>
								
					<div class="hr-line-dashed"></div>
                                <div class="form-group">
								<div class="text-left"><h4>Student cancellations <small>(Enter the date of the lesson that was cancelled, not the date the parent or student informed you of the cancellation)</small></h4></div>
                              
                       <div class="col-sm-12">
                       <div><label>
					   <input value="6" id="lcReg" name="lessonType" onChange="hideArea()" type="radio" lessonTitle="Student cancelled on same day of regularly scheduled lesson"> Student cancelled on same day of regularly scheduled lesson
						</label>
							<div id="blk6" style="display: none;">
								<div align="left"><label>Please describe in detail when, how & who cancelled this lesson. Thank you very much.</label></div>
								<div><textarea class="form-control" name="txta_same_regular" id="txta_same_regular" ></textarea></div>
							</div>
						</div>
                       <div><label>
					   <input value="7" id="lcMakeup" onChange="hideArea()" name="lessonType" type="radio" lessonTitle="Student cancelled on same day of make-up lesson">  Student cancelled on same day of make-up lesson.
						</label>
							<div id="blk7" style="display: none;">
								<div align="left"><label>Please describe in detail when, how & who cancelled this lesson. Thank you very much.</label></div>
								<div><textarea class="form-control" name="txta_same_makeup" id="txta_same_makeup"  ></textarea></div>
							</div>
						</div>
					 <div><label>
					   <input value="8" id="lc24Reg" name="lessonType" onChange="hideArea()" type="radio" lessonTitle="Student cancelled 24 hours or more in advance of regularly scheduled lesson"> Student cancelled 24 hours or more in advance of regularly scheduled lesson.
						</label></div>
						
						 <div><label>
					   <input value="9" id="lc24Makeup" name="lessonType" onChange="hideArea()" type="radio" lessonTitle="Student cancelled 24 hours or more in advance of make-up lesson">  Student cancelled 24 hours or more in advance of make-up lesson.

						</label></div>
						
				
                                </div>
                                </div>		

		<div class="hr-line-dashed"></div>
                                <div class="form-group">
								<div class="text-left"><h4>Teacher cancellations <small>(Enter the date of the lesson that was cancelled, not the date you informed the parent or student of the cancellation.)</small></h4></div>
                              
                       <div class="col-sm-12">
                       <div><label>
					   <input  value="10" id="lctReg" name="lessonType" onChange="hideArea()" type="radio" lessonTitle="I cancelled the regularly scheduled lesson"> I cancelled the regularly scheduled lesson.
						</label></div>
                       <div><label>
					   <input value="11" id="lctMakeup" name="lessonType" onChange="hideArea()" type="radio" lessonTitle="I cancelled a make-up lesson"> I cancelled a make-up lesson.
						</label></div>
					
						
				
                                </div>
                                </div>										
								
                               
                             	<div class="hr-line-dashed"></div>
                                <div class="form-group">
								<div class="text-left"><h4>Musika vacation day</h4></div>
                              
                       <div class="col-sm-12">
                       <div><label>
					   <input  value="12" id="lVac" name="lessonType" onChange="hideArea()" type="radio" lessonTitle="Vacation day - I did not teach this student because of my or student's vacation."> Vacation day - I did not teach this student because of my or student's vacation.
						</label></div>
                      
					
						
				
                                </div>
                                </div>	
								
								                      	<div class="hr-line-dashed"></div>
                                <div class="form-group">
								<div class="text-left"><h4>Other</h4></div>
                              
                       <div class="col-sm-12">
                       <div><label>
					   <input  value="13" id="lOther" name="lessonType" onChange="hideArea()" type="radio" lessonTitle="Other"> Other (Use this for situations when other choices do not apply)
						</label></div>
                      
					
						
				
                                </div>
								<p>Please fill in reason below.</p>
						<textarea class="form-control" name="other_reason" id="other_reason"></textarea>		
                                </div>	    


	                      	<div class="hr-line-dashed"></div>
                                <div class="form-group">
								<div class="text-left"><h4>Student wishes to terminate lessons for good.</h4></div>
                              
                       <div class="col-sm-12">
                       <div><label>
					   <input  value="14" id="terminate" name="lessonType" type="radio"> Student wants to stop taking lessons.
						</label></div>
                      
					
						
				
                                </div>
								
                                </div>									
                  <div class="hr-line-dashed"></div>
                       <div class="form-group">
                          <div class="col-sm-12" id="clickEvent">
							<input class="btn btn-primary" value="Submit" type="submit">
                           </div>
                          </div>
				 <div class="hr-line-dashed"></div>
                       <div class="form-group">
                          <div class="col-sm-12">
							<p>
							<strong>Important Reminder:</strong> (link opens in new window/tab)
<small><a href="{{route('referral')}}" >Inform Musika about your Musika student's referral (e.g. friend, relative, or sibling)</a></small>
							</p>
                           </div>
                          </div>		  
                            </form>
                        </div>
                    </div>
               
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="student_lesson">Submit New Entry</h4>
      </div>
      <div class="modal-body">
            
					<form method="get" class="form-horizontal">
				                      		
                  <div class="text-center">
                       <div class="form-group">
                          <div class="col-sm-12">
						  <div class="form-group">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <!--<button class="btn btn-white" id="removeBtn" data-dismiss="modal" type="button">Cancel</button>-->
                                        <button class="btn btn-primary" type="button" data-dismiss="modal">Submit</button>
                                    </div>
                                </div>
							
                           </div>
                          </div>
						  </div>
				 <div class="hr-line-dashed"></div>
                       <div class="form-group">
                          <div class="col-sm-12">
							<p id="lession_text">
							<!--<strong>Important Reminder:</strong> (link opens in new window/tab)
<small><a href="#" >Inform Musika about your Musika student's referral (e.g. friend, relative, or sibling)</a></small>-->
							</p>
                           </div>
                          </div>		  
                            </form>
               
      </div>
     
    </div>

  </div>
</div>
<div class="loader-modal" style="display: none">
	<div class="center">
		<img alt="" src="{{asset('img/ajax-loader2.gif')}}" />
	</div>
</div>
@endsection
@section('scripts')
<!--<script src="{{asset('js/plugins/2.1.1/moment.min.js')}}"></script>
<script src="{{asset('js/plugins/2.1.1/jquery.min.js')}}"></script>-->
<script src="{{asset('js/plugins/fullcalendar/moment.min.js')}}"></script>
<script src="{{asset('js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/plugins/2.1.1/fullcalendar.min.js')}}"></script>
<!--<script src="{{asset('js/plugins/fullcalendar/fullcalendar.min.js')}}"></script>-->
<script src="{{asset('js/plugins/2.1.1/fullcalendar.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/jquery-confirm.min.css')}}">
<script src="{{asset('js/jquery-confirm.min.js')}}"></script>
<script>
function newEntry()
{
	var stuName = $('select[name="stuName"]').find(":selected").val();
	var insName = $('select[name="insName"]').find(":selected").val();
	var lessonType = $('input[name=lessonType]:checked').val();
	var lessontitle = $('input[name=lessonType]:checked').attr('lessonTitle');
	var stu_name = $('select[name="stuName"]').find(":selected").text();
	var ins_Name = $('select[name="insName"]').find(":selected").text();
	//alert(stu_name+' '+ins_Name);	
	//return false;
	var hidden_event_date = $("#hidden_event_date").val();
	if(stuName=="")
	{
		$.alert({ title: 'Alert!', content: 'Please select the Student!',});
		return false;
	}
	if(insName=="")
	{
		$.alert({ title: 'Alert!', content: 'Please select the Instrument!',});
		return false;
	}
	if(lessonType=="" || lessonType== undefined)
	{
		$.alert({ title: 'Alert!', content: 'Please select the lesson Type',});
		return false;
	}
	var txta_same_regular = $("#txta_same_regular").val();
	var txta_same_makeup = $("#txta_same_makeup").val();
	var other_reason = $("#other_reason").val();
	if((lessonType=='6' && txta_same_regular=='') || (lessonType=='7' && txta_same_makeup=='')){
		$.alert('Please describe in detail when, how & who cancelled this lesson. Thank you very much.');
		return false;
	}else if(lessonType=='13' && other_reason=='')
	{
		$.alert('Please fill in reason.');
		return false;
	}
	if(lessonType=='14')
	{
		window.location.href = "<?php echo route('terminate-student'); ?>";
		return false;
	}
	if(lessonType>=0 && lessonType<6)
	{
		var lessonColor = "#00aeef";
	}
	else if(lessonType>=6 && lessonType<12)
	{
		var lessonColor = "#708090";
	}
	else
	{
		var lessonColor = "#1ab394";
	}

	$.confirm({
		title: 'Confirm!',
		content: 'Do you want to submit the "'+lessontitle+'" for "'+stu_name+' and '+ins_Name+'" on date "'+hidden_event_date+'"?',
		buttons: {
			formSubmit: {
				text: 'Submit',
				btnClass: 'btn-blue',
				action: function () {
					var csrf_token = $("input[name=_token]").val();
					$.ajax({
						url: "<?php echo url('/checkDuplicateValue') ?>",
						data: {
							type: 'new',
							event_id:lessonType,
							lessonName:'',
							startdate:hidden_event_date,
							studentId:stuName,
							studentname:'',
							instrumentId:insName,
							instrument:'',
							txta_same_regular:txta_same_regular,
							txta_same_makeup:txta_same_makeup,
							reason:other_reason,
							_token: csrf_token
						},
						type: 'POST',
						dataType: 'json',
						success: function(response){
							//console.log(response);
							if(response.status=='false')
							{
								$.alert({ title: 'Alert!', content: response.msg});
								
							}
							else if(response.status=='true')
							{
								var lesson_id = response.lessonId;
								$.alert({ title: 'Alert!', content: response.msg});
								
								var originalEventObject = $(this).data('eventObject');
								// we need to copy it, so that multiple events don't have a reference to the same object
								var copiedEventObject = $.extend({}, originalEventObject);
								
								// assign it the date that was reported
								copiedEventObject.title = lessontitle;
								copiedEventObject.start = hidden_event_date;
								copiedEventObject.id = lesson_id;
								copiedEventObject.color = lessonColor;
								copiedEventObject.data = {studentId:stuName,student: stu_name, instrumentId: insName, instrument:ins_Name, color_code:"",lessonTypeId:lessonType },
								//console.log(copiedEventObject.id);
								$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
							}
							$("#myModal").modal("hide");
						},
						error: function(e){
							console.log(e.responseText);
						}
					}); 
				}
			},
			cancel: function () {
				
			},
		}
		
	});
	return false;
}
function edit_entry()
{
	$("#myModal").modal("hide");
	return false;
}
function delete_entry(lessonId)
{
	
	$.confirm({
		title: 'Confirm!',
		content: "Do you want to delete this lesson?",
			buttons: {
			confirm: function () {
				var csrf_token = $("input[name=_token]").val();
			$.ajax({
				url: "<?php echo url('/invoice/deletelesson') ?>",
				data: {
					lessonId:lessonId,
					_token: csrf_token
				},
				type: 'POST',
				dataType: 'json',
				success: function(response){
				if(response.status=='true')
					{
						$.alert({ title: 'Alert!', content: 'Lesson deleted successfully!',});
						$("#myModal").modal("hide");
						location.reload();
					} else {
						$.alert({ title: 'Alert!', content:'Apparently, lessonId '+lessonId+' either doesn\'t exist or has already been approved. Please try again',});
					}
				},
				error: function(e){
				}
			});
			},
			cancel: function () {	
			},	
		}
	});
	return false;
}

function fun()
{
	
	var lessonInput = $("#inst").val();
	alert('ddf'+lessonInput);
	return false;
}

function hideArea() {

	var radio= document.getElementsByName('lessonType');

	var i = -1; while (++i < radio.length) {

		if (radio[i].checked) {

			if (radio[i].value==6) document.getElementById("blk6").style.display = "block";

			else document.getElementById("blk6").style.display = "none";

			if (radio[i].value==7) document.getElementById("blk7").style.display = "block";

			else document.getElementById("blk7").style.display = "none";

		}

	}

}


function getInstrumentname()
{
	var sname = $("#sname").val();
	//alert(sname);
	//return false;
	//$('#loading').html('<img src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif"> loading...');
	var csrf_token = $("input[name=_token]").val();
	$.ajax({
		url: "<?php echo url('/getInstrument') ?>",
		data: {
			sname: sname,
			_token: csrf_token
		},
		type: 'POST',
		dataType: 'json',
		beforeSend: function () {
			$(".loader-modal").show();
		},
		complete: function () {
			$(".loader-modal").hide();
		},
		success: function(response){
			console.log(response);
			var inst_html = '<select class="form-control" name="insName" id="inst"><option value="">--</option>';
			$.each(response, function(i, item) {
				inst_html += '<option value="'+item.instrumentId+'">'+item.instrumentName+'</option>';
			});
			 inst_html += '</select>';
			$("#inst").html(inst_html);
			//$("#loading").html(inst_html);
			//$("#inst_pop").html(inst_html);
		
		},
		error: function(e){
			console.log(e.responseText);
		}
	});
}


function getInstrumentNamePopup()
{
	//var sname = $("#sname").val();
	var stuName = $('select[name="stuName"]').find(":selected").val();
	//alert(stuName);
	//return false;
	var csrf_token = $("input[name=_token]").val();
	$.ajax({
		url: "<?php echo url('/getInstrument') ?>",
		data: {
			sname: stuName,
			_token: csrf_token
		},
		type: 'POST',
		dataType: 'json',
		success: function(response){
			console.log(response);
			var inst_html = '<select class="form-control" name="insName" id="inst"><option value="">--</option>';
			$.each(response, function(i, item) {
				inst_html += '<option value="'+item.instrumentId+'">'+item.instrumentName+'</option>';
			});
			 inst_html += '</select>';
			//$("#inst").html(inst_html);
			$("#inst_pop").html(inst_html);
		
		},
		error: function(e){
			console.log(e.responseText);
		}
	});
}


function confirmDelete(lessonId){
	
}


	$(document).ready(function() {
	
	//$('#calendar div.fc-button-group button.fc-month-button').css('display', 'none');	
				
		window.mobilecheck = function() {
		  var check = false;
		  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
		  return check;
		};
		
		if(window.mobilecheck())
		{
			$("#mobileClass").addClass("collapsed");
		}
		
		$('#external-events div.external-event').each(function() {

            // store data so the calendar knows to render an event upon drop
            $(this).data('event', {
                title: $.trim($(this).text()), // use the element's text as the event title
                stick: true, // maintain when user navigates (see docs on the renderEvent method)
				eventOverlap: false,
				overlap: false // HAS NO EFFECT - WORKS IN FULLCALENDAR BUT NOT SCHEDULER
            });
			
			var eventObject = {
				title: $.trim($(this).text()) // use the element's text as the event title
			};
			
			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);
			
            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });

        });
		var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
		
		if( $(window).width() < 765 ) {
			   <?php  $view = 'vertMonth'; ?>
		} else {
			   <?php  $view = 'month'; ?>
		}
		
		
		var lessonEntries = <?php echo $lesson_data; ?>;/* [
				{ id: '6', resourceId: 'b', start: '2018-06-03', title: 'Lesson + 15 minutes additional make-up time',  data : {student : 'student 1' } },
				{ id: '7', resourceId: 'c', start: '2018-06-04', title: 'Lesson + 30 minutes additional make-up time',  data : {student : 'student 1' } },
				{ id: '8', resourceId: 'd', start: '2018-06-05', title: 'Lesson + 45 minutes additional make-up time',  data : {student : 'student 2' } }
			]; */
		//console.log(lessonEntries);	
		if(window.mobilecheck())
		{
			console.log('mobile');
			$calenderView = '';
		}
		else
		{
			console.log('desktop');
			$calenderView = 'month,vertMonth';
		}
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next',
				center: 'title',
				right: $calenderView
			},
			buttonText: {
				month: 'Month',
				vertMonth: 'List Month',
			}, //vertWeek vertWeek: 'List Week',
			defaultView: window.mobilecheck() ? 'vertMonth' : 'month',
			dayRender: function( date, cell ) { 
			// Get the current view     
				var view = $('#calendar').fullCalendar('getView');

				// Check if the view is the new vertWeek - 
				// in case you want to use different views you don't want to mess with all of them
				if (view.name == 'vertWeek') {
					// Hide the widget header - looks wierd otherwise
					$('.fc-widget-header').hide();

					// Remove the default day number with an empty space. Keeps the right height according to your font.
					$('.fc-day-number').html('<div class="fc-vertweek-day">&nbsp;</div>');

					// Create a new date string to put in place  
					var this_date = date.format('ddd, MMM Do');

					// Place the new date into the cell header. 
					cell.append('<div class="fc-vertweek-header"><div class="fc-vertweek-day">'+this_date+'</div></div>');
				}
				if (view.name == 'vertMonth') {
					// Hide the widget header - looks wierd otherwise
					$('.fc-widget-header').hide();

					// Remove the default day number with an empty space. Keeps the right height according to your font.
					$('.fc-day-number').html('<div class="fc-vertweek-day">&nbsp;</div>');

					// Create a new date string to put in place  
					var this_date = date.format('ddd, MMM Do');

					// Place the new date into the cell header. 
					cell.append('<div class="fc-vertweek-header"><div class="fc-vertweek-day">'+this_date+'</div></div>');
				}
				var today = $.fullCalendar.moment();
				var end = $.fullCalendar.moment().add(7, 'days');
				//console.log(date+' '+today.get('date')+' '+today);
				if (date > today) {
					cell.css("background", "#e8e8e8");
				 }
			},
			editable: false,
			//eventLimit: true,
			eventOverlap: false,
			droppable: true, // this allows things to be dropped onto the calendar !!!
			dayClick: function(date, jsEvent, view) {
				var sname = $( "#sname option:selected" ).text();
				var inst = $( "#inst option:selected" ).text();
				var snameId = $("#sname").val();
				var instId = $("#inst").val();
				//alert(sname+'test');
				if(snameId=="" && instId==""){
					///alert('Please select the Student and Instrument');
					$.alert({
						title: 'Alert!',
						content: 'Please select the Student and Instrument!',
					});
					return false;
				}
				else
				{
					if(snameId!=""){
						 $('select[name^="stuName"]').val(snameId);
					}
					else
					{
						$.alert({ title: 'Alert!', content: 'Please select the Student!',});
						return false;
					}
					if(instId!=""){
						//$('select[name^="insName"]').val(instId);
						var inst_html = '<select class="form-control" name="insName" id="inst"><option value="'+instId+'">'+inst+'</option>';
						inst_html += '</select>';
						$("#inst_pop").html(inst_html);
					}
					else
					{
						$.alert({ title: 'Alert!', content: 'Please select the Instrument!',});
						return false;
					}
					$("#event_date").html(date.format('Do MMM, YYYY'));
					$("#hidden_event_date").val(date.format('YYYY-MM-DD'));
					//
					if ($("input[name='lessonType']").is(':checked')) {
					   //alert('checked!'+$("input[name='lessonType']").val());
					   $('input:radio[name="lessonType"]').prop('checked', false);
					} 
					
					$("#other_reason").val('');
					$("#txta_same_regular").val('');
					$("#txta_same_makeup").val('');
					document.getElementById("blk6").style.display = "none";
					document.getElementById("blk7").style.display = "none";
					
					var hideButton = ' <input class="btn btn-primary" value="Submit" type="submit">';
					$("#clickEvent").html(hideButton);
					$("#myModal").modal("show");
				}	
			},
			/* eventDragStop: function(event, jsEvent, ui, view) {			
				console.log(event);
				$('#calendar').fullCalendar('removeEvents', event.id);
							
			}, */
			eventMouseover: function(calEvent, jsEvent) {
				//console.log(calEvent);
				var tooltip = '<div class="tooltipevent" style="width:200px; padding: 6px; text-align:center; background:'+calEvent.data.color_code+'; color: #00000; position:absolute; z-index:10001;">' + calEvent.title + '</br> for <strong>'+calEvent.data.student+'<strong></div>';
				$("body").append(tooltip);
				$(this).mouseover(function(e) {
					$(this).css('z-index', 10000);
					$('.tooltipevent').fadeIn('500');
					$('.tooltipevent').fadeTo('10', 1.9);
				}).mousemove(function(e) {
					$('.tooltipevent').css('top', e.pageY + 10);
					$('.tooltipevent').css('left', e.pageX + 20);
				});
			},
			eventMouseout: function(calEvent, jsEvent) {
				 $(this).css('z-index', 8);
				 $('.tooltipevent').remove();
			},
			drop: function(date, event) { // this function is called when something is dropped
				console.log(event);
				//var lessonValue = $('.navy-bg').data('value');//$('.external-event').attr("value"); //$('.external-event navy-bg').attr('value'); //
				//alert(lessonValue);
		
				var title = event.target.textContent;
				var lessonName = event.target.textContent;
				var start = date.format();
				var event_id = this.id;
				
				var today = moment().startOf('day');
				var dropDate = moment(date).startOf('day');
				
				
				var sname = $( "#sname option:selected" ).text();
				var s_id = $("#sname").val();
				var inst = $( "#inst option:selected" ).text();
				var instId = $("#inst").val();
				if(s_id=="" && instId ==""){
					//alert('Please select the student and instrument');
					$.alert({ title: 'Alert!', content: 'Please select the student and instrument!',});
					return false;
				}
				else if(instId =="")
				{
					//alert('Please select the instrument');
					$.alert({ title: 'Alert!', content: 'Please select the instrument!',});
					return false;
				}
				/* else if (dropDate >= today)
				{
					$.alert({ title: 'Alert!', content: 'An event in the future cannot be added!',});
					//alert("An event in the future cannot be added.");
					return false;
				} */
				if(event_id=='6')
				{
					var level = 'Please describe in detail when, how & who cancelled this lesson. Thank you very much';
					var textRegularType = '';
					var textMakeupType = 'display:none';					
					var textotherType = 'display:none';	
					//$("td.fc-event-container a").css( "background-color", "#00aeef !important");	
				}
				else if(event_id=='7')
				{
					var level = 'Please describe in detail when, how & who cancelled this lesson. Thank you very much';
					var textRegularType = 'display:none';
					var textMakeupType = '';
					var textotherType = 'display:none';	
				}
				else if(event_id=='13')
				{
					var level = 'Please fill in reason below.';
					var textRegularType = 'display:none';
					var textMakeupType = 'display:none';
					var textotherType = '';	
				}
				else
				{
					var level = '';
					var textRegularType = 'display:none';
					var textMakeupType = 'display:none';
					var textotherType = 'display:none';
				}
				$.confirm({
					title: 'Confirm!',
					content: '' +
					'<form action="" class="formName">' +
					'<div class="form-group">' +
					'<label>Do you want to submit the "'+lessonName+'" for "'+sname+' and '+inst+'" on date "'+start+'"? </br></br>'+level+'</label>' +
					'<textarea style="'+textRegularType+';" class="txta_same_regular form-control" required />' +
					'<textarea style="'+textMakeupType+';" class="txta_same_makeup form-control" required />' +
					'<textarea style="'+textotherType+';" class="txta_same_other form-control" required />' +
					'</div>' +
					'</form>',
					buttons: {
						formSubmit: {
							text: 'Submit',
							btnClass: 'btn-blue',
							action: function () {
								var txta_same_regular = this.$content.find('.txta_same_regular').val();
								var txta_same_makeup = this.$content.find('.txta_same_makeup').val();
								var txta_same_other = this.$content.find('.txta_same_other').val();
								if((event_id=='6' && txta_same_regular=='') || (event_id=='7' && txta_same_makeup=='') ){
									$.alert('Please describe in detail when, how & who cancelled this lesson. Thank you very much');
									return false;
								}
								else if(event_id=='13' && txta_same_other=='')
								{
									$.alert('Please fill in reason below.');
									return false;
								}
								
								if(event_id>=0 && event_id<6)
								{
									var lessonColor = "#00aeef";
								}
								else if(event_id>=6 && event_id<12)
								{
									var lessonColor = "#708090";
								}
								else
								{
									var lessonColor = "#1ab394";
								}
									
								//eventsAdded.push(newEvent);
								var csrf_token = $("input[name=_token]").val();
								$.ajax({
									url: "<?php echo url('/checkDuplicateValue') ?>",
									data: {
										type: 'new',
										event_id:event_id,
										lessonName:lessonName,
										startdate:start,
										studentId:s_id,
										studentname:sname,
										instrumentId:instId,
										instrument:inst,
										txta_same_regular:txta_same_regular,
										txta_same_makeup:txta_same_makeup,
										reason:txta_same_other,
										_token: csrf_token
									},
									type: 'POST',
									dataType: 'json',
									success: function(response){
										console.log(response);
										if(response.status=='false')
										{
											$.alert({ title: 'Alert!', content: response.msg});
											$('#calendar').fullCalendar('removeEvents', event_id);
										}
										else if(response.status=='true')
										{
											var lesson_id = response.lessonId;
											$.alert({ title: 'Alert!', content: response.msg});
											
											var originalEventObject = $(this).data('eventObject');
											// we need to copy it, so that multiple events don't have a reference to the same object
											var copiedEventObject = $.extend({}, originalEventObject);
											
											// assign it the date that was reported
											copiedEventObject.start = date;
											copiedEventObject.id = lesson_id;
											copiedEventObject.color = lessonColor;
											copiedEventObject.data = {studentId:s_id,student: sname, instrumentId: instId, instrument:inst, color_code:"",lessonTypeId:event_id },
											//console.log(copiedEventObject.id);
											$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
											
											location.reload();
											
										}
								
									
									},
									error: function(e){
										console.log(e.responseText);
									}
								}); 
							}
						},
						cancel: function () {
							$('#calendar').fullCalendar('removeEvents', event_id);
						},
					}
					
				});
				//alert(lesson_id);
				// retrieve the dropped element's stored Event Object
				
				
				// is the "remove after drop" checkbox checked?
				if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}
				//$('.fc-event-container a').attr('id','lesson'+event_id);
			
			},
			events: lessonEntries,
			eventRender: function(event, element, view) {
				//console.log(event);
				//event.className ='lessonClass';
			 	element.find('.fc-title').prepend( event.data.student+" for ");
			 	//element.find('.fc-title').prepend("<img src='" + event.data.edit_image +"' width='16' height='16'><img src='" + event.imageurl +"' width='16' height='16'>");
				element.find('.fc-title').prepend("`edit or delete` ");
			/*	element.append("<div style='position:absolute;bottom:13px;right:12px' ><button type='button' id='btnDeleteEvent' class='btn btn-block btn-primary btn-flat'>X</button></div>" );
				element.find("#btnDeleteEvent").click(function(){
					//var answer = confirm("You want to delete the lesson?");
					//if (answer) {
						$('#calendar').fullCalendar('removeEvents',event._id);
					//}
					
			    }); */
				
				
				
			},
			eventClick: function (event) {
                //console.log(event.title);
                console.log(event);
				var sname = $( "#sname option:selected" ).text();
				var inst = $( "#inst option:selected" ).text();
				$('select[name^="stuName"]').val(event.data.studentId);
				//$('select[name^="insName"]').val(event.data.instrumentId);
				var inst_html = '<select class="form-control" name="insName" id="inst"><option value="'+event.data.instrumentId+'">'+event.data.instrument+'</option>';
				inst_html += '</select>';
				$("#inst_pop").html(inst_html);
					
				$("#event_date").html(moment(event.start).format('Do MMM, YYYY'));
				//$("input[name=optionsRadios][value=" + event.title + "]").attr('checked', 'checked');
				$('input:radio[name="lessonType"][value="'+event.data.lessonTypeId+'"]').prop( "checked", true );
				//alert(event.id);
				
				$("#other_reason").val('');
				
				if(event.data.lessonTypeId==6){
					$("#txta_same_regular").val(event.data.sameDayCancelComment);
					document.getElementById("blk6").style.display = "block";
				}
				else{
					$("#txta_same_regular").val('');
					document.getElementById("blk6").style.display = "none";
				}
				if(event.data.lessonTypeId==7){
					$("#txta_same_makeup").val(event.data.sameDayCancelComment);
					document.getElementById("blk7").style.display = "block";
				}
				else{
					$("#txta_same_makeup").val('');
					document.getElementById("blk7").style.display = "none";
				}
				
				if(event.data.lessonTypeId==13){
					$("#other_reason").val(event.data.comment);
				}
				else{
					$("#other_reason").val('');
				}
					
				var hideButton = ' <a href="#" class="btn btn-primary" onclick="edit_entry();"> Update</a> <a href="#" class="btn btn-danger" onclick="delete_entry('+event.id+');"> Delete</a>';
				$("#clickEvent").html(hideButton);
                $('#myModal').modal('show');
            }
			
		});
		
	});

</script>
@endsection