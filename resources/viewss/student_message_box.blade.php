
@extends('layouts.login_app')

@section('title') Login  @endsection

@section('custom_css')
<style>
body { 
  background-color: #FFFFFF !important;
}
.b_color:focus {
border-color: #1c84c6 !important;	
}
.btn-link {
    color: #337ab7 !important;
}
.btn-link:hover {
    color: #039cd5 !important;  /* 039cd5  00aeef*/
	text-decoration: underline;
}

.middle-box {
    padding-top: 80px;
	z-index: 0;
}

.chat-users, .chat-statistic {
    margin-left: 0px !important;
}
.chat-user{
	padding: 3px 10px !important;
}
.ins_header {
    background: #f5f5f5 none repeat scroll 0 0;
    padding: 30px 0 0px;
}
</style>
@endsection
@section('content')
<div class="ins_header">
	<div class="container text-center">
		<h1 class="purple">Message Box</h1>
		<!--<h4 class="weight300">What Would You Like to Learn? Pick your favorite instrument.</h4>-->
	</div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox chat-view">

				<div class="ibox-title">
					<div class="pull-right text-muted"><strong> <span id="sname"></span></strong></div>
					 Teachers
				</div>
				<div class="ibox-content">

					<div class="row">
						<div class="col-md-3">
							<div class="chat-users">

								<div class="users-list">
									
									<div class="chat-user" >
										<a href="#" >
										<img class="chat-avatar" src="https://teachers.musikalessons.com/img/profile.png" alt="" >
										<div class="chat-user-name">
											 Teacher 1
										</div>
										</a>
									</div>
							
									<div class="chat-user">
										<a href="#" >
										<img class="chat-avatar" src="https://teachers.musikalessons.com/img/profile.png" alt="" >
										<div class="chat-user-name">
											Teacher 2
										</div>
										</a>
									</div>
								
								   <!--
									<div class="chat-user">
										<span class="pull-right label label-primary">Online</span>
										<img class="chat-avatar" src="https://teachers.musikalessons.com/img/profile.png" alt="" >
										<div class="chat-user-name">
											<a href="#">Michael Smith</a>
										</div>
									</div>
									-->

								</div>

							</div>
						</div>
						<div class="col-md-9 ">
							<div class="chat-discussion">
								<!--<div class="loader-modal" >
									<div class="center">
										<img alt="" src="{{asset('img/Spinner-1s-200px.gif')}}" />
									</div>
								</div>-->
								
							</div>
							<div class="chat-message-form">
								<div class="form-group">
									<input type="hidden" name="stu_id" id="stu_id" value="" />
									<input type="hidden" name="student_type" id="student_type" value="" />
									<textarea style="width: 92%;" class="form-control message-input" id="message" name="message" placeholder="Enter message text"></textarea><input class="btn btn-primary" style="float:right; margin-top: -35px;" type="button" name="submit" value="Send" onclick="send_msg();" />
								</div>
							</div>
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