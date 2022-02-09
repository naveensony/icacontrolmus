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
.set-width tr td:nth-child(1) {
    width: 20% !important;
}
@media screen and (min-width: 768px) and (max-width: 1024px) {
	.col-sm-2 {
		width: 25%;
	}
}
</style>
@endsection
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-12">
		<h2>Details of Student <strong>{{$student_details->firstName}} {{$student_details->lastName}}</strong></h2>
	</div>
	<div class="col-sm-2">
		<div class="title-action" style="padding-top: 0px; !important">
			<a class="link-btn" href="{{ route('new-submit-entry') }}" >Submit New Entry</a>
		</div>
		<div class="title-action" style="padding-top: 0px !important;">
			<a class="link-btn" href="{{url('/invoice')}}/{{$student_details->hasAdmission->admissionId}}" >View Entries</a>
		</div>
		<div class="title-action" style="padding-top: 0px !important;">
			<a class="link-btn" href="{{url('/terminateLessons')}}?stu_id={{$student_details->hasAdmission->admissionId}}" >Terminate Student</a>
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
                  <td>Instrument</td>
                  <td>{{$student_details->hasAdmission->instName->instrumentName}}</td>
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
  <div class ="row paddingzero">
    <div class="col-sm-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Additional Details</h5>
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
                </tr>
              </thead>
              <tbody class="set-width">
                <?php $estEarn=0;?>								 
                @foreach($student_details->hasLesson as $lessonRecord)
                <?php $estEarn+=$lessonRecord->amount; ?>
                @if($loop->first)
                <tr>
                  <td>Last Entry Submitted</td>
                  @if($lessonRecord->lessonDate!='0000-00-00')
                  <td>{{ date("m/d/Y",strtotime($lessonRecord->lessonDate))}}</td>
                </tr>
                @endif
                @endif
                @endforeach
                <tr>
                  <td>First Entry logged for</td>
                  <td>{{ date("m/d/Y",strtotime($student_details->hasAdmission->dateIn))}}</td>
                </tr>
                <tr>
                  <td>Lesson Duration</td>
                  <td>{{$student_details->hasAdmission->lessonDuration}}</td>
                </tr>
                <tr>
                  <td>Total Entries logged</td>
                  <td>{{$student_details->has_lesson_count}}</td>
                </tr>
                <tr>
                  <td>Approved Entries</td>
                  <td>{{$student_details->approve_lesson_count}}</td>
                </tr>
                <tr>
                  <td>Awaiting Approval</td>
                  <td>{{($student_details->has_lesson_count-$student_details->approve_lesson_count)}}</td>
                </tr>
                <tr>
                  <td>Rate/Hour</td>
                  <td>{{ '$'.sprintf("%.2f", $student_details->hasAdmission->teacherRate) }}</td>
                </tr>
                <tr>
                  <td>Est. Earnings*</td>
                  <td>{{ '$'.sprintf("%.2f", $estEarn)}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
		<div class="ibox-content">
			<!--<div class="alert alert-info alert-dismissable">
				<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				<strong>Note:</strong> Earnings do not reflect guaranteed amounts. It is based on your submissions and is subject to approval by Musika.
			</div>-->
		</div>
      </div>
    </div>
  </div>
 
</div>





@endsection
