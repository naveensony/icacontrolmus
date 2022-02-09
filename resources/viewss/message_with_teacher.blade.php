@extends('layouts.app')
@section('title') Chat with Student @endsection
@section('custom_css')
<style>
.right {
    /*float: right !important;*/
    margin-right: 0 !important;
}
.message-input{
	height:55px !important;
	top: 99px !important;
	margin-top: 100px;
}
.forum-container, .forum-post-container {
    padding: 5px !important;
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
			<div class="ibox-content forum-post-container" style=" height: 550px;">
				<div class="forum-post-info">
					<h4><span class="text-navy"><i class="fa fa-globe"></i> General discussion</span> - Teacher Name - <span class="text-muted">Free talks</span></h4>
				</div>
				<div class="media">
					<a class="forum-avatar" href="#">
						<img src="img/a1.jpg" class="img-circle" alt="image">
						<!--<div class="author-info">
							<strong>Posts:</strong> 542<br>
							<strong>Joined:</strong> April 11.2015<br>
						</div>-->
					</a>
					<div class="media-body">
						<h4 class="media-heading">Teacher Name</h4>
						Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.
					</div>
				</div>
				<div class="media">
					<!--<a class="forum-avatar " href="#">
						<img src="img/a2.jpg" class="img-circle" alt="image">
						<div class="author-info">
							<strong>Posts:</strong> 32<br>
							<strong>Joined:</strong> Dec 11.2015<br>
						</div>
					</a>-->
					<div class="media-body right">
						<h4 class="media-heading">Student Name</h4>
						Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old 
						
					</div>
				</div>
				<div class="media">
					<a class="forum-avatar" href="#">
						<img src="img/a3.jpg" class="img-circle" alt="image">
						<!--<div class="author-info">
							<strong>Posts:</strong> 543<br>
							<strong>Joined:</strong> June 21.2015<br>
						</div>-->
					</a>
					<div class="media-body">
						<h4 class="media-heading">Teacher Name</h4>
						Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old
						
					</div>
				</div>
				<div class="ibox-content forum-post-container" >
					<div class="form-group">
						<input type="text" style="width: 92%;" class="form-control message-input" id="message" name="message" placeholder="Enter message text"><input class="btn btn-primary" style="float:right; margin-top: -34px;" type="button" name="submit" value="Send" onclick="send_msg();" />
					</div>	
				</div>
				
			</div>
		</div>
	</div>
</div>
  


@endsection


<script>

</script>