@extends('layouts.app')
@section('custom_css')

<style>
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
</style>
@endsection
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-sm-12">
      <h2>Details of Student <strong>{{$student_details->firstName}} {{$student_details->lastName}} </strong></h2>
   </div>
   <div class="col-sm-2">
		<div class="title-action" style="padding-top: 0px !important;">
			<a class="link-btn" href="{{url('/trialLesson')}}?stuId={{$student_details->studentId}}" >Indicate Trial Lesson</a>
		</div>
   </div>
   <div class="col-sm-10">
	</div>
</div>
<div class="wrapper wrapper-content">
   <div class ="row paddingzero">
      <div class="col-sm-6">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5>Basic Details</h5>
               <div class="ibox-tools">
                  <a class="collapse-link">
                  <i class="fa fa-chevron-up"></i>
                  </a>
               </div>
            </div>
            <div class="ibox-content">
               <div class="table-responsive">
                  <table class="table table-striped">
                     <thead>
                     </thead>
                     <tbody class="personal">
                        <tr>
                           <td>First Name</td>
                           <td>{{(empty($student_details->firstName))?'--':$student_details->firstName}}</td>
                        </tr>
                        <tr>
                           <td>Last Name</td>
                           <td>{{$student_details->lastName}}</td>
                        </tr>
                        <tr>
                           <td>Email</td>
                           <td><a style="text-decoration: underline;" href="mailto:{{$student_details->email}}">{{$student_details->email}}</a></td>
                        </tr>
                        <tr>
                           <td>Telephone</td>
                           <td>{{$student_details->phone}}</td>
                        </tr>
						   <tr>
                           <td>Telephone2</td>
                           <td>{{$student_details->phone2}}</td>
                        </tr>
						   <tr>
                           <td>Cell Phone</td>
                           <td>{{$student_details->phoneCel}}</td>
                        </tr>
                        <tr>
                           <td>Instrument</td>
                           <td>{{$student_details->instName->instrumentName}}</td>
                        </tr>
                        <tr>
                           <td>Experience Level</td>
						   
						   @if($student_details->iLevel==0)
							  <td>Novice</td>
						  
							@elseif($student_details->iLevel==1)
							 <td>Advance Beginner</td>
						 
							 @elseif($student_details->iLevel==2)
							 <td>Intermediate</td>
						 
							 @elseif($student_details->iLevel==3)
							 <td>Advance Intermediate</td>
						 
						  @elseif ($student_details->iLevel==4)
							 <td>Advanced</td>
						 @else
							 <td>{{$student_details->iLevel}}</td>
						 @endif
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <div class="col-sm-6">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5>Address Details</h5>
               <div class="ibox-tools">
                  <a class="collapse-link">
                  <i class="fa fa-chevron-up"></i>
                  </a>
               </div>
            </div>
            <div class="ibox-content">
               <div class="table-responsive">
                  <table class="table table-striped">
                     <thead>
                     </thead>
                     <tbody class="personal">
                        <tr>
                           <td>Address Line 1</td>
                           <td>{{$student_details->addressL1}}</td>
                        </tr>
                        <tr>
                           <td>Address Line 2</td>
                           <td>{{$student_details->addressL2}}</td>
                        </tr>
                        <tr>
                           <td>City</td>
                           <td>{{$student_details->city}}</td>
                        </tr>
                        <tr>
                           <td>State</td>
                           <td>{{$student_details->stateId}}</td>
                        </tr>
                        <tr>
                           <td>Zip Code</td>
                           <td>{{$student_details->zipCode}}</td>
                        </tr>
                     
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection