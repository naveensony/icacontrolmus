@extends('layouts.app')
@section('title') Trial Lesson  @endsection
@section('custom_css')
<style>
.text-center1 {
    margin-left: 262px;
}
.ibox {
	
    margin-bottom: 0px !important;
}

</style>
@endsection
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-sm-10">
      <h2>Tell Musika you met a new student</h2>
   </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">

		<form class="form-horizontal" name="dataDisplay" method="post" action="{{url('updateStatus')}}" onsubmit="return chkForm(this);">
         {{csrf_field()}}

   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins" >
            <!--<div class="ibox-title">
			
            </div>-->
            <div class="ibox-content" style="height: 110%">
				<p><h3 style="color:red"><strong>Important:</strong> this function doesn't submit a lesson for payment. Under no circumstances should you use this form unless you have actually met the student and given the introductory lesson. Do NOT use this form if you've only made a phone call.</h3></p>
				  <p>
				  <h5> This indicates to us here in the office that we need to follow up with the client and get them registered with you. Once the student has officially registered with you they will appear in the dropdown window labeled "student name" in the function "Submit a New Entry," and then you can enter the initial lesson and get paid. </h5>
				  </p><br/>
				@if($count>0)
                  <div class="form-group">
                     <label class="col-md-2 control-label">Choose a student:</label>
                     <div class="col-md-6">
                        <select  class="form-control" name='cid' onclick='checkVis(this.selectedIndex,"introinfo");' onchange='checkVis(this.selectedIndex,"introinfo");'>
                           <option></option>
                           @foreach($prospective_students as $student)
                           @if(!is_null($student->prospectiveStudent))
                           <option value="{{$student->connectId}}" @if(isset($connectId) && $connectId==$student->prospectiveStudent->studentId) selected  @endif >{{$student->prospectiveStudent->firstName}} {{$student->prospectiveStudent->lastName}}</option>
                           @endif
                           @endforeach
                        </select>
                     </div>
					
                  </div>
                  <div id="introinfo">
                     <p>So we can better proceed with the next phase of the registration process for this student, please select which best describes this student's demeanor.</p>
                     <input type='hidden' name='introplus' value='' />
                     <label><input type='radio' name='introplus' value='interested scheduled' /> Student/parent seemed interested in continuing and the next lesson date is scheduled</label><br />
                     <label><input type='radio' name='introplus' value='interested not scheduled' /> Student/parent seemed interested in continuing, but no next lesson date was scheduled</label><br />
                     <label><input type='radio' name='introplus' value='not interested' /> Student/parent are not interested in continuing; that is what they told me directly</label><br />
                     <label><input type='radio' name='introplus' value='unsure' /> Student/parent seemed unsure about continuing</label>
                  </div>
                  <div class="text-center">
                     <input type="submit" class="btn btn-primary" name="buttonName" value="submit" style="">
                  </div>
				@endif  
				<input type='hidden' name='stat' value='999' />
				<input type='hidden' name='emad' value='edwardscottbrady@gmail.com' />
				<input type='hidden' name='sent' value='1' />
         </div>
      </div>
   </div>
</form>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
function checkVis(cb, elId) {
	var el = document.getElementById(elId);
	if (!el) return false;
	if (cb) {el.style.display = ''; dataDisplay.fullname2.selectedIndex = 0; dataDisplay.fullname2.disabled = 1;}
	else {el.style.display = 'none'; dataDisplay.fullname2.disabled = 0;}
	return true;
}
function chkForm(f) {
	if (f.cid.selectedIndex==0) {
		alert("Please choose a student before continuing.");
		return false;
	}
	var is_reasoned = 0;
	var j = -1; while (++j<f.introplus.length) {
		if (f.introplus[j].checked) {is_reasoned = 1; break;}
	}
	if (is_reasoned)
		return confirm("You have chosen to notify Musika about teaching "+f.cid.options[f.cid.selectedIndex].text+" an introductory lesson. Is this accurate?");
	else {
		alert("You have chosen to notify Musika about teaching "+f.cid.options[f.cid.selectedIndex].text+" an introductory lesson. So we can better proceed with the next phase of the registration process for this student, please select which best describes this student's demeanor.");
		return false;
	}
}
window.onload = function() {
	window.status='Musika Teacher {{$tname}}';
	checkVis(document.forms['dataDisplay'].cid.selectedIndex,"introinfo");
	return true;
}
</script>
@endsection

