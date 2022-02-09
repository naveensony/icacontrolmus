@extends('layouts.app')
@section('title') Chat with Student @endsection
@section('custom_css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<style>
.checked {
  color: #00aeef !important;
}
a.forum-item-title {
    display: -moz-inline-stack;
	padding-right: 15px;
	color: #00aeef !important;
}

.link-btn {
    background-color: #00aeef;
    border-color: #00aeef;
    color: #ffffff;
    display: block;
    font-weight: bold;
    margin: 8px 0;
    padding: 6px;
    text-align: center;
}
.link-btn:hover {
    background-color: #039cd5;
    border-color: #039cd5;
    color: #ffffff;
}
.forum-item.active .checked {
    color: #00aeef !important;
}
.unchecked {
    color: #999  !important;
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

				<!--<div class="forum-title">
					<div class="pull-right forum-desc">
						<samll>Total posts: 320,800</samll>
					</div>
					<h3>Teachers</h3>
				</div>-->
				@if($teachers->isNotEmpty())
				@foreach($teachers as $teacher)	
				<div class="forum-item active">
					<div class="row">
						<div class="col-md-8">
							<a class="forum-avatar" href="#">
								@php
									$newavt=str_replace("@{{THUMBNAILMASK}}","avatarSize",$teacher->teacherId->avatar);
									
								@endphp
								
								
									<img src="http://ceo.musikalessons.com/uploads/TeachersModel/{{$teacher->teacherId->id}}/avatar/{{$newavt}}" class="img-circle" alt="image">
								
							</a>
							<a href="" class="forum-item-title">{{$teacher->firstName}} {{$teacher->lastName}} </a>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star unchecked"></span>
								<span class="fa fa-star unchecked"></span>
								<span class="fa fa-star unchecked"></span>
							
							<div class="forum-sub-title"><strong>Teacher Instruments: </strong>
							@foreach($teacherName as $data)
								@if($data->teacherId==$teacher->teacherId->remoteTeacherId)
									{{$data->instruments}}
								@endif
							@endforeach
							</div>
							
						</div>
						
						<div class="col-md-2" style="text-align: center;">
							
								<a href="{{route('messageWithTeacher')}}"  class="link-btn" >View Messages</a>
							
						</div>
						<div class="col-md-2 " style="text-align: center;">
							
								<a href=""  class="link-btn" > Profile Link</a>
							
						</div>
						<!--<div class="col-md-1 forum-info">
							<span class="views-number">
								140
							</span>
							<div>
								<small>Posts</small>
							</div>
						</div>-->
					</div>
				</div>
				@endforeach	
				@endif
				

			</div>
		</div>
	</div>
	</div>

  


@endsection


<script>

</script>