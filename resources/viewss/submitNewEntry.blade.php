<!DOCTYPE html>

@extends('layouts.app')
@section('title') Submit Entry  @endsection
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
	
	margin-left: 20px;
	 font-weight: inherit;
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
		padding: 9px 7px 7px !important;
	}
	
	.form-control, .single-line {
		padding: 5px 12px !important;
	}
}
@media screen and (min-width: 1024px) {
	.year-width{
		width: 10%;
	}
	.inst-width{
		width: 11%;
	}
	.student-width{
		width: 20%;
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
	width: 80px;
	background-color: White;
	border-radius: 10px;
	filter: alpha(opacity=100);
	opacity: 1;
	-moz-opacity: 1;
}
.loader-modal .center img
{
	height: 60px;
	width: 60px;
}
hr{
	margin-bottom: 5px;
    margin-top: 15px;
}


.link-btn {
    background-color: #00aeef;
    border-color: #00aeef;
    color: #ffffff;
    padding: 6px;
	font-weight: bold;
    display: block;
    margin: 8px 0;
    text-align: center;
}
.link-btn:hover {
	background-color: #039cd5;
    border-color: #039cd5;
    color: #ffffff;
} 
.personal tr td:nth-child(1) {
    width: 25% !important;
}
.set-width tr td:nth-child(1) {
    width: 20% !important;
}
@media screen and (min-width: 768px) and (max-width: 1024px) {
	.col-sm-2 {
		width: 25%;
	}
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
   <div class="col-sm-12">
      <h2>Submit New Entry</h2>
   </div>
   <div class="col-sm-2">
   {{-- @if(isset($adm_id) && $adm_id!="")
		<div class="title-action" style="padding-top: 0px !important;">
			<a class="link-btn" href="{{url('/terminateLessons')}}?stu_id={{$adm_id}}" >Terminate Student</a>
		</div>
		@endif --}}
	</div>
	<div class="col-sm-10">
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
				<p><b>3.</b> You must submit in the fields below the date of your initial 30 minute lesson FIRST for any new student. Once you have submitted an entry, make sure that it has been recorded in the database by checking your entries awaiting approval page. Your cookie may have timed out, thus losing the submission.</p>
				<p><b>4. </b>Once the student has confirmed they wish to have your services, they will appear in the dropdown window labeled "Student Name" below, and you can then enter the lesson and get paid.</p>
				<p><b>5. </b>Each and every week must have an entry for each student; a lesson, cancellation, or Musika vacation.</p>
				<!-- p>When doing lessons which have been extended to cover makeup time due, you MUST confirm with a parent before doing so. Do not just teach a longer lesson without the parents being aware of it.</p -->
				<!--<p><b>6.</b> Please note that for any adult students who need makeup(s)- you must do FULL makeup lessons. The options that allow lessons plus additional makeup time will automatically be disabled for any adult student. For any child student, any type of makeup lesson (including lessons plus additional makeup time) will be accepted.</p>-->

				
													
				</div>
			</div>
		</div>
	</div>
								
	@php 
		
		$monthNames = ["Jan", "Feb", "Mar", "Apr","May", "Jun", "Jul", "Aug","Sep", "Oct", "Nov", "Dec"];
	@endphp	
    <div class="row animated fadeInDown">
        <div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5> Step 1: Select the date of the entry, student, and instrument</h5>
				</div>
                <div class="ibox-content">
                    <form method="post" action="" onsubmit="return newEntry();" class="form-horizontal">
					<input type="hidden" name="hidden_event_date" id="hidden_event_date" >
					    
						<div class="form-group">
						<div class="col-sm-12">
							<div class="col-sm-1" style="padding-right: 11px; padding-left: 0px;">
								<div class="text-left"><h4>Month</h4></div>
								<select class="form-control" name="month" id="month" >
								@php $mnow = date('m'); for($i=1;$i<13;$i++){ @endphp	
									<option value="<?php echo sprintf("%02d", $i) ?>" @if($mnow==$i) selected @endif>{{$monthNames[$i-1]}}</option>
								@php } @endphp		
								</select>	         
							</div>
							<div class="col-sm-1" style="padding-left: 4px; padding-right: 13px;">
								<div class="text-left"><h4>Day</h4></div>
								<select class="form-control" name="day" id="day" >
								@php $dnow = date('d'); for($i=1;$i<=31;$i++){ @endphp
								<option value="<?php echo sprintf("%02d", $i) ?>" @if($dnow==$i) selected @endif><?php echo sprintf("%02d", $i) ?></option>
								@php } @endphp
								</select>	         
							</div>
							<div class="col-sm-2 year-width" style="padding-left: 2px;">
								<div class="text-left"><h4>Year</h4></div>
								<select class="form-control" name="year" id="year" >
								@php $ynow = date('Y'); for($i=date('Y');$i>2005;$i--){ @endphp
								<option value="{{$i}}" @if($ynow==$i) selected @endif >{{$i}}</option>
								@php } @endphp
								</select>	         
							</div>
							
							<div class="col-sm-3 student-width">
								<div class="text-left"><h4>Student Name</h4></div>
								<select class="form-control" name="stuName" id="sname" onchange="getInstrumentNamePopup()" @if($student_id!="") disabled @endif>
									<option value="">--</option>
									@foreach($studentData as $students)
									<option value="{{$students->studentId}}"  @if($student_id==$students->studentId) selected @endif >{{$students->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="col-sm-2 inst-width" style="padding-left: 0px;">
								<div class="text-left"><h4>Instrument</h4></div>
								<select class="form-control" name="insName" id="inst_pop" >
								<option value="">--</option>
								@if(isset($ins_data) && !empty($ins_data))
									
								<?php //print_r($ins_data); ?>
								<option value="{{$ins_data['ins_id']}}" selected >{{$ins_data['ins_name']}} </option>
								@endif
								</select>	         
							</div>
						</div>
						</div>
					<div class="form-group">	<br>	
						<h3> Step 2: Select entry type <small style="font-size: 68%;"><strong> (Please read all options before making your selection)</strong></small></h3>
						<hr>
					</div>	
					
                     <div class="form-group">
					
                              
                       <div class="col-sm-12">
					   <div class="text-left"><h4>Lesson <small>(Please read all options before making your selection)</small></h4></div>
                       <div><label>
					   <input  value="0" id="lReg" name="lessonType" onChange="hideArea()" type="radio" lessonTitle="Lesson taught (Use this to submit introductory lessons for payment as well.)"> Lesson taught (Use this to submit the introductory lesson along with all regular lessons.)
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
								
                              
                       <div class="col-sm-12">
					   <div class="text-left"><h4>Student cancellations <small>(Enter the date of the lesson that was cancelled, not the date the parent or student informed you of the cancellation)</small></h4></div>
                       <div><label>
					   <input value="6" id="lcReg" name="lessonType" onChange="hideArea()" type="radio" lessonTitle="Student cancelled on same day of regularly scheduled lesson"> Student cancelled on same day of regularly scheduled lesson
						</label>
							<div id="blk6" style="display: none;">
								<div align="left"><label>Please describe in detail when, how & whom cancelled this lesson. Thank you very much.<br> Please note, by submitting a same day cancellation you are indicating the student should be charged. If you do not wish to charge the student, please enter this date as an "other" entry instead.
								<textarea class="form-control" name="txta_same_regular" id="txta_same_regular" ></textarea></label></div>
							</div>
						</div>
                       <div><label>
					   <input value="7" id="lcMakeup" onChange="hideArea()" name="lessonType" type="radio" lessonTitle="Student cancelled on same day of make-up lesson">  Student cancelled on same day of make-up lesson.
						</label>
							<div id="blk7" style="display: none;">
								<div align="left"><label>Please describe in detail when, how & who cancelled this lesson. Thank you very much.
								<textarea class="form-control" name="txta_same_makeup" id="txta_same_makeup"  ></textarea></label></div>
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
								
                              
                       <div class="col-sm-12">
					   <div class="text-left"><h4>Teacher cancellations <small>(Enter the date of the lesson that was cancelled, not the date you informed the parent or student of the cancellation.)</small></h4></div>
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
								
                       <div class="col-sm-12">
					   <div class="text-left"><h4> Vacation day</h4></div>
                       <div><label>
					   <input  value="12" id="lVac" name="lessonType" onChange="hideArea()" type="radio" lessonTitle="Vacation day - I did not teach this student because of my or student's vacation."> Vacation day - I did not teach this student because of my or student's vacation.
						</label></div>
                      
					
						
				
                                </div>
                                </div>	
								
								                      	<div class="hr-line-dashed"></div>
                                <div class="form-group">
								
                              
                       <div class="col-sm-12">
					   <div class="text-left"><h4>Other</h4></div>
                       <div><label>
					   <input  value="13" id="lOther" name="lessonType" onChange="hideArea()" type="radio" lessonTitle="Other"> Other (Use this for situations when other choices do not apply)
						</label></div>
                      
					
						<p>Please fill in reason below.</p>
						<textarea class="form-control" name="other_reason" id="other_reason"></textarea>		
                                </div>
				
                                </div>
									    


						<div class="hr-line-dashed"></div>
						<div class="form-group">
					
							<div class="col-sm-12">
							<div class="text-left"><h4>Student wishes to terminate lessons for good.</h4></div>
								<div><label>
								<input  value="14" id="terminate" name="lessonType" type="radio"> Student wants to stop taking lessons.
								</label></div>
							</div>
								
						</div>									
						<div class="hr-line-dashed"></div>
						<div class="form-group">
                          <div class="col-sm-12" id="clickEvent">
							<input type="hidden" name="is_change_loc" id="is_change_loc">
							<input type="hidden" name="lessonCnt" id="lessonCnt">
							<input class="btn btn-primary"  value="Submit" type="submit">
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
	
	//return false;
	var stuName = $('select[name="stuName"]').find(":selected").val();
	var insName = $('select[name="insName"]').find(":selected").val();
	var lessonType = $('input[name=lessonType]:checked').val();
	var lessontitle = $('input[name=lessonType]:checked').attr('lessonTitle');
	var stu_name = $('select[name="stuName"]').find(":selected").text();
	var ins_Name = $('select[name="insName"]').find(":selected").text();
	//alert(stu_name+' '+ins_Name);	
	//return false; 2018-12-31
	var entryMonth = $("#month").val();
	var entryDay = $("#day").val();
	var entryYear = $("#year").val();
	
	var event_date = entryYear+'-'+entryMonth+'-'+entryDay;
	
	//console.log(stuName+' '+insName+' '+lessonType+' '+lessontitle+' '+stu_name+' '+ins_Name+' '+event_date);
	
	var is_change_loc = $("#is_change_loc").val();
	var lessonCnt = $("#lessonCnt").val();
	
	
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
	if(lessonType=='6' && txta_same_regular==''){
		$.alert('If you select "'+lessontitle+'" you MUST give a reason as to why you selected it');
		return false;
	}
	else if(lessonType=='7' && txta_same_makeup=='')
	{
		$.alert('If you select "'+lessontitle+'" you MUST give a reason as to why you selected it');
		return false;
	}
	else if(lessonType=='13' && other_reason=='')
	{
		$.alert('If you select "Other" you MUST give a reason as to why you selected it. If you select "Other" to request a week waiver, please enter the reason for the week waiver in the box.');
		return false;
	}
	if(lessonType=='14')
	{
		window.location.href = "<?php echo route('terminate-student'); ?>";
		return false;
	}

	if(is_change_loc=='Yes' && lessonCnt==0){
		//$.alert({ title: 'Alert!', content: 'This student was changed the lesson location during registration.',});
		$.confirm({
			title: 'Confirm!',
			content: 'This student was changed the lesson location during registration.',
				buttons: {
				confirm: function () {
					$("input[type='submit']").attr('disabled','disabled');
					var csrf_token = $("input[name=_token]").val();
					$.ajax({
						url: "<?php echo url('/checkDuplicateValue') ?>",
						data: {
							type: 'new',
							event_id:lessonType,
							lessonName:'',
							startdate:event_date,
							studentId:stuName,
							studentname:'',
							instrumentId:insName,
							instrument:'',
							txta_same_regular:txta_same_regular,
							txta_same_makeup:txta_same_makeup,
							reason:other_reason,
							entryYear:entryYear,
							entryDay:entryDay,
							entryMonth:entryMonth,
							_token: csrf_token
						},
						type: 'POST',
						dataType: 'json',
						success: function(response){
							console.log(response);
							if(response.status=='false')
							{
								$("input[type='submit']").removeAttr("disabled")
								$.alert({ title: 'Alert!', content: response.msg});
								
							}
							else if(response.status=='true')
							{
								window.location = "<?php echo url('/invoice?which=1'); ?>";
								//var lesson_id = response.lessonId;
								//$.alert({ title: 'Alert!', content: response.msg});
							}	
							
						},
						error: function(e){
							console.log(e.responseText);
						}
					}); 
				},
				cancel: function () {
					$("input[type='submit']").attr('disabled','disabled');
					var csrf_token = $("input[name=_token]").val();
					$.ajax({
						url: "<?php echo url('/sendEmailForChangedLessonLoc'); ?>",
						data: {
							event_id:lessonType,
							startdate:event_date,
							studentId:stuName,
							instrumentId:insName,
							_token: csrf_token
						},
						type: 'POST',
						dataType: 'json',
						success: function(response){
							console.log(response);
							
							
						},
						error: function(e){
							console.log(e.responseText);
						}
					}); 
				},	
			}
		}); 
	}else{
		$("input[type='submit']").attr('disabled','disabled');
		var csrf_token = $("input[name=_token]").val();
		$.ajax({
			url: "<?php echo url('/checkDuplicateValue') ?>",
			data: {
				type: 'new',
				event_id:lessonType,
				lessonName:'',
				startdate:event_date,
				studentId:stuName,
				studentname:'',
				instrumentId:insName,
				instrument:'',
				txta_same_regular:txta_same_regular,
				txta_same_makeup:txta_same_makeup,
				reason:other_reason,
				entryYear:entryYear,
				entryDay:entryDay,
				entryMonth:entryMonth,
				_token: csrf_token
			},
			type: 'POST',
			dataType: 'json',
			success: function(response){
				console.log(response);
				if(response.status=='false')
				{
					$("input[type='submit']").removeAttr("disabled")
					$.alert({ title: 'Alert!', content: response.msg});
					
				}
				else if(response.status=='true')
				{
					window.location = "<?php echo url('/invoice?which=1'); ?>";
					//var lesson_id = response.lessonId;
					//$.alert({ title: 'Alert!', content: response.msg});
				}	
				
			},
			error: function(e){
				console.log(e.responseText);
			}
		}); 
	}
	
		
				
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
			$.each(response.ins, function(i, item) {
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
		beforeSend: function () {
			$(".loader-modal").show();
		},
		complete: function () {
			$(".loader-modal").hide();
		},
		success: function(response){
			console.log(response);
			var inst_html = '<select class="form-control" name="insName" id="inst"><option value="">--</option>';
			$.each(response.ins, function(i, item) {
				inst_html += '<option value="'+item.instrumentId+'">'+item.instrumentName+'</option>';
			});
			 inst_html += '</select>';
			//$("#inst").html(inst_html);
			$("#inst_pop").html(inst_html);
			$("#is_change_loc").val(response.change_location);
			$("#lessonCnt").val(response.lessonCnt);
		
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
		
		
		
	});

</script>
@endsection