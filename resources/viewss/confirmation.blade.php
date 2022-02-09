@extends('layouts.app')
@section('title') Terminate Student  @endsection
<style>

.ibox-content p{

	

	line-height: 2;

    margin: 2px 14px 10px 11px;

}

.ibox {

	

    margin-bottom: 0px !important;

}

.floatLeft{
	float:left;
}
.question{
	
}
.q-1,.q-2{
	width:100%;
}

.mb-10{
	margin-bottom:10px;
}
.qa-2-section,.error,.qa-3-section,.qa-4-section,.Retention_Warning{
	display:none;
}
.Retention_Warning{
	color: #a94442;
}
</style>

@section('content')



<div id="wrapper">

	<div class="wrapper wrapper-content">
		<div class="row"> 
			 <div class="col-lg-10"></div>
		</div>
		<div class="row"> 
				
		<div class="col-lg-10">

	  <div class="ibox float-e-margins">
		<div class="ibox-title">
			<h5>Confirmation</h5>
		</div>
		<div class="ibox-content">
			 

		 {{csrf_field()}}

		
		 <div class="row mb-10">
			  <div class="col-sm-12">
			   <div class="col-xs-12 col-md-12">
				<p class="question floatLeft">Thank you for letting us know about <strong>{{$student_name}}</strong> stopping lessons. We will review your submission, and get back to you if we have any further questions. </p>
			   </div>
			</div>
	     </div>
		</div>
	  </div>

   </div>
   
   
		</div>
	</div>
</div>



@endsection






