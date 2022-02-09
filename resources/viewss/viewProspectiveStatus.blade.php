@extends('layouts.app')

@section('custom_css')
<style>
ul label{
	font-weight: 500 !important;
}
.todo-list {
    font-size: 13px !important;
    
}
.title-action a{
	 text-decoration: underline;
 }
</style>
@endsection
@section('content')

 
  <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-10">
                    <h2>Inform Musika of any changes in this student's situation using this form. </h2>
                  
                </div>
                <div class="col-sm-2">
                    <div class="title-action">
                        <a href="{{url('/')}}">Back to students</a>
                    </div>
                </div>
            </div>
	<div class="wrapper wrapper-content">
	<div class="row paddingzero">
<div class="col-lg-10">
@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
@elseif ($arr['msg']!="" )
	<div class="alert alert-success">
		{{ $arr['msg'] }}
	</div>	
@endif 
</div>			
</div>	
		<div class="row  paddingzero">
			<form action="{{url('prospectives/updateProspective')}}" method='post' onsubmit="return chkForm(this)">
	 {{csrf_field()}}
      <div class="col-lg-12">
                <div class="ibox-content">
                    <h2 class="four">Change Status</h2>
                        
     
          
            
                    <ul class="todo-list m-t">
				<li>
				  <div class="table-responsive">
                <table class="table table-striped">
              
               
							<thead>
							<tr>
							<th>Name</th>
							<th>Instr.</th>
							<th>Last Status</th>
							</tr>
						
							</thead>
								<tbody class="personal">
								<tr>
								<td class="status">
								<a href="{{url('viewNewStudent')}}/{{$prospective_students->prospectiveStudent->studentId}}" data-toggle="tooltip" data-placement="bottom" title="View profile for student {{$prospective_students->prospectiveStudent->firstName.' '.$prospective_students->prospectiveStudent->lastName}}">{{$prospective_students->prospectiveStudent->firstName.' '.$prospective_students->prospectiveStudent->lastName}}</a>
								</td>
								<td>{{$prospective_students->instrument->instrumentName}}</td>
								@if(isset($prospective_students->pro_status))	
	<td class="status">{{str_replace("Teacher","I",$prospective_students->pro_status->statusDesc)}}</td>@else
		<td class="status">
			<div class="text-center"><span style="color:red">Unknown</div>
		</td>
		@endif
								</tr>
								</tbody>
						</table>		
            </div>
				</li>
				<div class="hr-line-dashed"></div> 
				 <li>
                           <label><input type='radio' name='stat' id='statintro' value='999' onclick="do_showhide('introinfo',this.checked)"/> 
						 I have taught this student an introductory lesson</label>
						
						 <ul class="todo-list m-t col-md-10" id="introinfo">
							<li> <p>So we can better proceed with the next phase of the registration process for this student, please select which best describes this student's demeanor.</p><input type='hidden' name='introplus' value='' /></li>
							 <li>
							<label><input type='radio' name='introplus' value='interested scheduled' /> Student/parent seemed interested in continuing and the next lesson date is scheduled</label>
							<label><input type='radio' name='introplus' value='interested not scheduled' /> Student/parent seemed interested in continuing, but no next lesson date was scheduled</label>
							<label><input type='radio' name='introplus' value='not interested' /> Student/parent are not interested in continuing; that is what they told me directly</label>
							<label><input type='radio' name='introplus' value='unsure'/> Student/parent seemed unsure about continuing</label>
							 </li>
							
						 </ul>
						
				</li>
				
				
				@php $pd['name']=$prospective_students->prospectiveStudent->firstName.' '.$prospective_students->prospectiveStudent->lastName;
				@endphp
				
				
                        @foreach($status as $state)
						  <li>
                          <label> <input value="{{$state->statusId}}" {{($state->statusId==$sid)?'checked':''}}   onclick="do_showhide('introinfo',document.getElementById('statintro').checked);"  name="stat" aria-label="Single radio One" type="radio">
						   {{str_replace("Teacher","I",$state->statusDesc)}}</label>
						 @if($state->statusName=='DTO')
							 @php $dtoId = $state->statusId @endphp
							   <ul class="todo-list m-t">
						<li><label>Enter the reason in the box:<textarea class="form-control" name="reason{{$state->statusId}}" size="40"></textarea></label></li>
								</ul>
						   @endif
						   
                         
						</li>
					@endforeach	
						
                    </ul>
					<div class="hr-line-dashed"></div> 
					<div class="text-center">
					<input  class="btn btn-primary" type="submit" value="submit">
					
					<div class="hr-line-dashed"></div> 
					<p>
					<strong>CONTRACT REMINDER:</strong> Making side arrangements to teach this lead or any other(s) outside the Musika program for the purpose of circumventing the Musika payment system, during your contract and for 2 years after you stop teaching with Musika, will result in a $5,000 penalty/acquisition fee per student. </p>
					
					
                </div>
				<input name="emad" value="{{$arr['emad']}}" type="hidden">
				<input name="tid" value="{{$arr['tid']}}" type="hidden">
				<input name="temp_cid" value="{{$arr['cid']}}" type="hidden">
				<input name="not_inserted_request" value="{{$arr['not_inserted_request']}}" type="hidden">
				<input name="inserted_request" value="{{$arr['inserted_request']}}" type="hidden">
				<input type='hidden' name='cid' value="{{$prospective_students->connectId}}">
				<input type='hidden' name='sent' value='1'>
				
            </div>
		</div>
  		
     </form>
  </div>
  

@endsection
@section('custom_js')
<script>
function trim(str) { return trimR(trimL(str)); }
function trimL(str) {
	var i = -1; while (++i<str.length) { if (str.charCodeAt(i)>32) break; }
	return str.substr(i);
}
function trimR(str) {
	var i = str.length; while (--i>=0) { if (str.charCodeAt(i)>32) break; }
	return str.substring(0,i+1);
}
function chkForm(f) {
	var i = -1; while (++i<f.stat.length) if (f.stat[i].checked) {
		if (f.stat[i].value==999) {
			var is_reasoned = 0;
			var j = -1; while (++j<f.introplus.length) {
				if (f.introplus[j].checked) {is_reasoned = 1; break;}
			}
			if (is_reasoned)
				return confirm("You have chosen to notify Musika about teaching {{$pd['name']}} an introductory lesson. Is this accurate?");
			else {
				alert("You have chosen to notify Musika about teaching {{$pd['name']}} an introductory lesson. So we can better proceed with the next phase of the registration process for this student, please select which best describes this student's demeanor.");
				return false;
			}
		}
		else if (f.stat[i].value=={{$dtoId}}) {
	if (trim(f['reason{{$dtoId}}'].value)=='')
				{
					alert("You must input a reason before continuing."); return false;}
		} 
		return true;
	}
	alert("You must select a status before continuing.");
	return false;
}





 function do_showhide(id, b) {
	var el = document.getElementById(id);
	el.style.display = b?'':'none';
}
$(document).ready(function(){

 
 do_showhide('introinfo',document.getElementById('statintro').checked); return(true);
	


});
</script>
@endsection
