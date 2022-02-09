@extends('layouts.app')
@section('title') Chat with Student @endsection
@section('custom_css')
<style>
.chat-users, .chat-statistic {
    margin-left: 0px !important;
}
.chat-user{
	padding: 3px 10px !important;
}
.chat-user:hover {
    background-color: #2f4050;
    color: white;
}
.chat-user-name {
    padding: 5px !important;
}
.chat-message {
    padding: 2px 20px !important;
}
.chat-discussion {
    height: 450px !important;
}
.chat-user-heading {
    border-bottom: 1px solid #e7eaec;
    padding: 8px 10px;
}
.chat-user-name-heading {
    padding: 10px;
}

.active {
    background-color: #2f4050;
    color: white;
}

.message-input{
	height:70px !important
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

@media screen and (min-width: 768px) {
	.msg-fifty{
		width: 50%;
	}
	.msg-seventy{
		width: 70%;
	}
	.msg-eightyfive{
		width: 80%;
	}
}
</style>
@endsection
@section('content')

 
        <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-10">
                    <h2>Messages</h2>
                  
                </div>
             
            </div>
     
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox chat-view">

				<div class="ibox-title">
					<div class="pull-right text-muted"><strong> <span id="sname"></span></strong></div>
					 Student:<strong> {{$msg_data['stuName']}}</strong>
				</div>
			<!-- https://teachers.musikalessons.com/img/profile.png -->
				<div class="ibox-content">

					<div class="row">
						
						<div class="col-md-10 ">
							<div class="chat-discussion" id="chat-discussion">
								<!--<div class="loader-modal" >
									<div class="center">
										<img alt="" src="{{asset('img/Spinner-1s-200px.gif')}}" />
									</div>
								</div>
								https://teachers.musikalessons.com/img/profile.png
								-->
							@php
								$newavt=str_replace("@{{THUMBNAILMASK}}","avatarSize",$user->teacherId->avatar);
							@endphp
						@foreach($message_user as $res)
							@if($res->msg_from=="Teacher")	
								<div class="chat-message left"><img class="message-avatar" src="http://ceo.musikalessons.com/uploads/TeachersModel/{{$user->teacherId->id}}/avatar/{{$newavt}}" alt="" ><div class="message <?php 
						if(strlen($res->message)<=57){
							echo 'msg-fifty';
						}else if(strlen($res->message)<=107){
							echo 'msg-seventy';
						}else if(strlen($res->message)<=130){
							echo 'msg-eightyfive';
						} ?>"  ><a class="message-author"> {{$msg_data['teacherName']}} </a><span class="message-date"> {{\Carbon\Carbon::parse($res->msg_time)->format('F d, Y h:i:s A')}}</span><span class="message-content">{{$res->message}}</span></div></div>
							@else
								<div class="chat-message left"><div class="message <?php 
						if(strlen($res->message)<=57){
							echo 'msg-fifty';
						}else if(strlen($res->message)<=107){
							echo 'msg-seventy';
						}else if(strlen($res->message)<=130){
							echo 'msg-eightyfive';
						} ?>"  ><a class="message-author"> {{$msg_data['stuName']}} </a><span class="message-date">{{\Carbon\Carbon::parse($res->msg_time)->format('F d, Y h:i:s A')}} </span><span class="message-content">{{$res->message}}</span></div></div>
							@endif
						@endforeach	
								
							</div>
							<div class="chat-message-form">
								<div class="form-group">
									<input type="hidden" name="stu_id" id="stu_id" value="{{$msg_data['studentId']}}" />
									<input type="hidden" name="student_type" id="student_type" value="{{$msg_data['student_type']}}" />
									<textarea style="width: 92%;" class="form-control message-input" id="message" name="message" placeholder="Enter message text"></textarea><input class="btn btn-primary" style="float:right; margin-top: -35px;" type="button" name="submit" value="Send" onclick="send_msg();" />
								</div>
							</div>
						</div>
						<div class="col-md-2">
						{{--<div class="chat-users">

								<div class="users-list">
									<div class="chat-user-heading" >
										<div class="chat-user-name-heading">
											<strong>Prospective Students</strong>
										</div>
									</div>
								@if($prospectiveStudent->isNotEmpty())
								@foreach($prospectiveStudent as $students)
									
									<div class="chat-user" id="sid_{{$students->studentId}}">
										<a href="#" onclick="showMessage('{{$students->studentId}}','Prospective')">
										<!--<img class="chat-avatar" src="https://teachers.musikalessons.com/img/profile.png" alt="" >-->
										<div class="chat-user-name">
											{{$students->firstName}} {{$students->lastName}}
										</div>
										</a>
									</div>
								@endforeach	
								@endif
									<div class="chat-user-heading" >
										<div class="chat-user-name-heading">
											<strong>Registered Students</strong>
										</div>
									</div>
								@if($admission->isNotEmpty())
								@foreach($admission as $students)
									@php									$row=(!empty($students->name->lastName)?($students->name->packageStudent=='Y'&&$students->name->lastName[0]!='-'?'- ':"").$students->name->firstName."  ":"").$students->name->lastName;
									@endphp
									<div class="chat-user" id="sid_{{$students->name->studentId}}">
										<a href="#" onclick="showMessage('{{$students->name->studentId}}','Registered')">
										<!--<img class="chat-avatar" src="https://teachers.musikalessons.com/img/profile.png" alt="" >-->
										<div class="chat-user-name">
											{{$row}}
										</div>
										</a>
									</div>
								@endforeach	
								@endif	

								</div>

							</div>--}}
						</div>

					</div>
					<!--<div class="row">
						<div class="col-lg-12">
							<div class="chat-message-form">

								<div class="form-group">

									<textarea class="form-control message-input" name="message" placeholder="Enter message text"></textarea>
								</div>

							</div>
						</div>
					</div>-->


				</div>
			</div>
        </div>
    </div>
</div>
     
     
  


@endsection

@section('scripts')
<script>
$("#chat-discussion").animate({
  scrollTop: $('#chat-discussion')[0].scrollHeight - $('#chat-discussion')[0].clientHeight
}, 1000);
function showMessage(studentId,student_type){
	//alert(studentId);
	var csrf_token = $("input[name=_token]").val();
	$.ajax({
		url: "<?php echo url('/getMessagebyStudent') ?>",
		data: {
			studentId:studentId,
			student_type:student_type,
			_token: csrf_token
		},
		type: 'POST',
		dataType: 'json',
		beforeSend: function () {
			//$(".loader-modal").show();
		},
		complete: function () {
			//$(".loader-modal").hide();
		},
		success: function(response){
		//console.log(response);
			if(response.status=='true')
			{
				$(".chat-user").removeClass('active');
				$("#stu_id").val(studentId);
				$("#student_type").val(student_type);
				$("#sname").html('Student Name : '+response.student_name);
				$("#sid_"+studentId).addClass('active');
				
				//console.log(response.msgs.length);
				var chat_discussion = '';
				if(response.msgs.length>0){
					$.each( response.msgs, function( key, value ) {
						//console.log("msg_id: " + value.message );
						if(value.msg_from == 'Teacher'){
							chat_discussion += '<div class="chat-message left"><img class="message-avatar" src="https://teachers.musikalessons.com/img/profile.png" alt="" ><div class="message"><a class="message-author"> '+response.teacherName+' </a><span class="message-date">'+value.msg_time+' </span><span class="message-content">'+value.message+'</span></div></div>';
						}else{
							chat_discussion += '<div class="chat-message right"><img class="message-avatar" src="https://teachers.musikalessons.com/img/profile.png" alt="" ><div class="message"><a class="message-author"> '+response.student_name+' </a><span class="message-date">'+value.msg_time+' </span><span class="message-content">'+value.message+'</span></div></div>';
						}
						
							
					});
					$(".chat-discussion").html(chat_discussion);
				}else{
					$(".chat-discussion").html('');
				}
				//console.log(response.student_name);
			}
		},
		error: function(e){
		}
	});
	
}
function send_msg(){
	var stu_id = $("#stu_id").val();
	var message = $("#message").val();
	var stu_type = $("#student_type").val();
	
	
	var phone = new RegExp("\\+?\\(?\\d*\\)? ?\\(?\\d+\\)?\\d*([\\s./-]\\d{2,})+", "g" );
	message = message.replace(phone, " *** ");
	//var email = new RegExp("/[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/", "igm" );
	var email = new RegExp('/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,6}))$/', "gi" );
	var emailExp = message.match(/([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9._-]+)/gi);
	message = message.replace(emailExp, " *** ");
	
	/* var emailExp1 = message.match(/([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+)/gi);
	console.log(emailExp1);
	
	var res = emailExp1.match(/dot/g);
	console.log(res); */
	
	//console.log(message);
	
	if(message==''){
		alert('Please enter the text in message box');
		return false;
	}
	//return false;
	var csrf_token = $("input[name=_token]").val();
	$.ajax({
		url: "<?php echo url('/saveMessagebyTeacher') ?>",
		data: {
			stu_id:stu_id,
			message:message,
			stu_type:stu_type,
			_token: csrf_token
		},
		type: 'POST',
		dataType: 'json',
		success: function(response){
			//console.log(response);
			if(response.status=='true')
			{
				var chat_msg = '<div class="chat-message left"><img class="message-avatar" src="https://teachers.musikalessons.com/img/profile.png" alt="" ><div class="message"><a class="message-author"> test test </a><span class="message-date">YYYY-MM-DD H:i:s </span><span class="message-content">'+message+'</span></div></div>';
				
				$(".chat-discussion").append(chat_msg);
				$("#message").val('');
				
				/* $(".chat-user").removeClass('active');
				$("#sname").html('Student Name : '+response.student_name);
				$("#sid_"+studentId).addClass('active'); */
				//console.log(response.student_name);
			}
		},
		error: function(e){
		}
	});
}
</script>
@endsection