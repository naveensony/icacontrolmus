@extends('layouts.app')
@section('title') Chat with Student @endsection
@section('custom_css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<style>
.checked {
  color: #00aeef !important;
}
a.forum-item-title1 {
    display: -moz-inline-stack !important;
	padding-right: 80px;
	margin-top: 8px;
	color: #00aeef !important;
	font-size: 16px;
}
.unchecked {
    color: #999  !important;
}
ul{
    margin-top: 15px !important;
}

.ibox {
    margin-bottom: 0 !important;
}

.ibox-title{
	min-height: 40px;
    padding: 0 15px;
}
.badge:hover {
    background-color: #0db2ef !important;
    color: #f9f9f9 !important;
}

.forum-item {
	margin: 4px 0 !important;
    padding: 0 0 20px !important;
}

.forum-item .forum-sub-title {
    margin-left: 0px !important;
    margin-top: 8px !important;
}
.notification {
  position: absolute;
  top: 2px;
  /*right: -10px;*/
  padding: 3px 6px;
  border-radius: 50%;
  background: red;
  color: white;
}	
</style>
@endsection
@section('content')

 
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-10">
		<h2>Messages</h2>
	  
	</div>
 
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="wrapper wrapper-content animated fadeInRight">
			<div class="ibox-content forum-container">
			
				
				@foreach($msg_time as $key => $row)
				@if(array_key_exists($key, $student_res))
				<div class="forum-item active">
					<div class="row">
						<div class="col-md-8">
						
							<a href="" class="forum-item-title1" >{{$student_res[$key]['firstName']}} {{$student_res[$key]['lastName']}}</a>
							<a href="{{url('/messages')}}/Prospective_{{$student_res[$key]['studentId']}}"  style="padding-left:10px;" class="link-btn badge badge-secondary" >Messages  @if($cnt_notification[$key]>=1) <span class="notification">{{$cnt_notification[$key]}} </span>
							@endif
							</a>
							<a style="padding-left:10px; margin-left: 20px;" class="link-btn badge badge-secondary" onclick="viewStudent('{{$student_res[$key]['studentId']}}')" >View student details</a>
							
							<a style="padding-left:10px; margin-left: 20px;" class="link-btn badge badge-secondary" href="{{route('chatroom')}}" >Chat Room</a>
							
							@if($message_user[$key]['message']!='')
							<div class="forum-sub-title t_inst">
								<strong>{{\Carbon\Carbon::parse($message_user[$key]['msg_time'])->format('F d, Y h:i:s A')}}: </strong>&nbsp;&nbsp;&nbsp;
								{{$message_user[$key]['message']}} 
							</div>
							@endif
							<div id="div_collapse_{{$student_res[$key]['studentId']}}" style="display: none;">
								<ul>
									<li><strong>Email :</strong>&nbsp; {{$student_res[$key]['email']}}</li>
									<li><strong>Address :</strong> &nbsp; {{$student_res[$key]['addressL1']}} {{$student_res[$key]['addressL2']}}, {{$student_res[$key]['city']}}, {{$student_res[$key]['stateId']}}  </li>
									<li><strong>Zip Code :</strong> &nbsp; {{$student_res[$key]['zipCode']}} </li>
									<li><strong>Telephone :</strong> &nbsp; {{$student_res[$key]['phone']}} </li>
									<li><strong>Age :</strong> &nbsp; {{$student_res[$key]['age']}}</li>
									<li><strong>Instrument :</strong> &nbsp; </li>
									<li><strong>Lesson Length : </strong> &nbsp;{{$student_res[$key]['lessonLen']}}</li>
									<li><strong>Student Notes : </strong> &nbsp; {{$student_res[$key]['studentNotes']}}</li>
									<li><strong>Lesson Location : </strong> &nbsp; {{$student_res[$key]['lessonLoc']}}</li>
									<li><strong>Lesson Timing &nbsp;&nbsp; Mon : </strong> &nbsp; {{$student_res[$key]['lessonStartMon']}} | <strong>Tue : </strong> &nbsp; 12:30PM - 2:00PM</li>
								</ul>	
							</div>	
						</div>
					</div>
				</div>
				@endif
				@endforeach
			</div>
			
			<div class="row faq">
				<!--<div class="col-lg-12">
					<div class="ibox-title" style="min-height: 50px;padding: 15px 15px;">
						<h5>Prospective Students</h5>
					</div>
				</div>	-->	
						
				
			</div>	
		
		
		
		
			
		</div>
	</div>
	</div>

  


@endsection


@section('custom_js')
<script>

 function viewStudent(sid){
    $("#div_collapse_"+sid).toggle();
	return false;
  }

$('.tab-collapse').on('click', function () {
		
        $(this).css('cursor','pointer');
          var ibox = $(this).closest('div.ibox');
        var button = $(this).find('i');
        var content = ibox.children('.ibox-content');
        content.slideToggle(200);
        button.toggleClass('fa-chevron-up').toggleClass('fa-chevron-down');
        ibox.toggleClass('').toggleClass('border-bottom');
        setTimeout(function () {
            ibox.resize();
            ibox.find('[id^=map-]').resize();
        }, 50);
    });
</script>
@endsection