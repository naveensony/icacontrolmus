@extends('layouts.app')
@section('custom_css')
<style>
.ibox-title{
	
 cursor: pointer !important;	
}

textarea {	
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;	
width: 90%;}
</style>
<link rel="stylesheet" href="{!! asset('css/jquery.alerts.css') !!}" />
@endsection

@section('prospective_js')
<script src="{{ asset('js/jquery_abox.js') }}"></script>
<script src="{{ asset('js/jquery.alerts.js') }}"></script>
@endsection
@section('content')

<div class="wrapper wrapper-content animated fadeIn">
<div class="row paddingzero">
<div class="col-lg-10">
@if (session('status'))
	<div class="alert alert-success">
		{!! session('status') !!}
	</div>
@elseif ($req_student[0]['msg']!="")
	<div class="alert alert-success">
		{!! $req_student[0]['msg'] !!}
	</div>	
@endif 
</div>
<div class="col-lg-10">
@if (session('thaeading') && session('tmsg') )
	<div class="alert alert-info">
		<h3>{{session('thaeading')}}</h3>
		<p>{!! session('tmsg') !!}</p>
	</div>
@elseif ($req_student[0]['thaeading']!="" && $req_student[0]['tmsg']!="")
	<div class="alert alert-info">
		<h3>{{$req_student[0]['thaeading']}}</h3>
		<p>{!! $req_student[0]['tmsg'] !!}</p>
	</div>	
@endif 
</div>
			
</div>

<div class="row">

<div class="text-center"><h1>Request form for Student  </h1></div>

</div>
<br>
	
        <div class="row faq">
		@php	
			$strStudent= "student";
			$strThis = "this"; 
		@endphp
		@if($req_student[0]['uknownmsg']!='')
			<div class="col-lg-12">
				<div class="ibox">
					<div class="ibox-title" style="background-color:#deeaf8">
						<h5>NOTICE: THIS REQUEST IS ON HOLD </h5>
						<div class="ibox-tools">
							<a class="">
								<i class="fa fa-chevron-up"></i>
							</a>
						</div>
					</div>
					<div class="ibox-content">
						<p>{!! $req_student[0]['uknownmsg'] !!} </p>
					</div>
				</div>
			</div>
		@else
			@if($req_student[0]['not_inserted_request']>0)
				@if($req_student[0]['not_inserted_request']>1)
					@php $strStudent= "students.";
					$strThis = "these."; @endphp
				@endif
				<div class="col-lg-12">
					<div class="ibox">
						<div class="ibox-title" style="background-color:#deeaf8">
							<h5>Following requests rejected because you already requested {{$strStudent}} <a href="{{route('viewProspective')}}" target="_blank">Click</a> to view other unassigned  Musika students</h5>
							
						</div>
						<div class="ibox-content">
							<p>{!! $req_student[0]['not_inserted_requests']!!} </p>
						</div>
					</div>
				</div>
			@endif
			@if($req_student[0]['inserted_request']>0)
				@php $s = ""; $sthis="this"; @endphp
				@if($req_student[0]['inserted_request']>1)
					@php $s = "s"; $sthis="any of these"; @endphp
				@endif
				<div class="col-lg-12">
					<div class="ibox">
						<div class="ibox-title" style="background-color:#deeaf8">
							<h5>Your request has been submitted successfully! </h5>
							<div class="ibox-tools">
								<a class="">
									<i class="fa fa-chevron-up"></i>
								</a>
							</div>
						</div>
						<div class="ibox-content">
							
							<p><strong>{!!  $req_student[0]['inserted_requests'] !!} </strong></p>
							<!--<p>If you are selected to teach {{$sthis}}  Musika client{{$s}}  you will then receive an email with the full contact info. We will also notify you if  {{$sthis}}   Musika client{{$s}}   get{{$s}} assigned to a different Musika teacher and is therefore unavailable. We  encourage all teachers to <a href="{{ route('assignments') }}" target="_blank" title="{{ route('assignments') }}">view  Musika's teacher assignment process</a> to get a better idea how Musika makes  its assignments. You can also <a href="{{route('viewProspective')}}" target="_blank" title="{{route('viewProspective')}}">view other unassigned  Musika students</a> that can be requested. Thanks again!
							</p>-->
							<p>Thanks for requesting! If you are selected to teach {{$sthis}}  Musika client{{$s}}, you will receive an email with their full contact info. We encourage all teachers to <a href="{{ route('assignments') }}" target="_blank" title="{{ route('assignments') }}">view Musika's teacher assignment process</a> to get a better idea how Musika makes its assignments. We will also notify you if  {{$sthis}}  Musika client{{$s}}  get{{$s}} assigned to a different Musika teacher for in-person lessons. 
							</p>
							<p>Due to the overwhelming response we receive for online clients (generally 50+ teachers) we will no longer be able to notify those not selected for those requests. We will, however, note your interest in receiving online students and keep you in mind for future clients. You can also <a href="{{route('viewProspective')}}" target="_blank" title="{{route('viewProspective')}}">view other unassigned  Musika students</a> that can be requested. Thanks again!
							</p>
							<p>The Musika Administration</p>
							
							
						</div>
					</div>
				</div>	
			@endif	
		@endif		
        </div>


   

    
</div>


@endsection
@section('custom_js')
<script>
/* $('.ibox-title').on('click', function () {
		
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
    }); */
	</script>
@endsection