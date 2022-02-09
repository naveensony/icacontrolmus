<div id="footer_myModal" class="modal fade" role="dialog">
  <div class="modal-dialog footer-popup">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">You have not lessons logged in past 45 days for below students.</h4>-->
      </div>
      <div class="modal-body" style="padding: 20px 10px 20px 10px;">
		<div class="table-responsive" style="border: 0px">
		@php  $cnt_admission_data = 0; $cnt_prosective_data = 0; @endphp
		
		@if($admission_data->isNotEmpty())
			@php  $cnt_admission_data = 1; @endphp 
			@endif
		
		@foreach($admission_data as $students)
			@php        $row=(!empty($students->name->lastName)?($students->name->packageStudent=='Y'&& $students->name->lastName[0]!='-'?'- ':"").$students->name->firstName."  ":"");
			@endphp
		
		
			<p><span style="/*color:#00aeef;*/">{{--You have not logged any entries in the past 45 days for the {{$row}}. Please log entries (lessons, cancellations, other, etc) or submit a termination request if {{$row}} {{$students->name->lastName}} has stopped lessons.--}}
			
			@if(!empty($l_records))
				@php $ldate = $l_records->lessonDate;  @endphp
				<span style="color:red"><strong>URGENT:</strong></span>	
				The last entry date you have logged for <strong>{{$row}} {{$students->name->lastName}} ({{$students->instName->instrumentName}})</strong> lessons was on <strong>{{$ldate}}</strong>. Please review your entry to make sure you have not forgotten to log (lessons, cancellations, other, etc) for <strong>{{$row}} {{$students->name->lastName}}</strong>
			@else
				@php $ldate = ""; @endphp
				<span style="color:red"><strong>URGENT:</strong></span>	You have not logged any entry for 656 5656 (Piano).
			@endif
			
			To remove this temporary account access restriction, log entries for <strong>{{$row}} {{$students->name->lastName}}</strong>  on or after <strong>{{date('Y-m-d', strtotime("-45 days"))}}</strong> or submit a termination request. This will notifying us that <strong>{{$row}} {{$students->name->lastName}}</strong> wishes to stop lessons.
			
			</span></p>
		
		
		
			<div style="margin-top: 35px; text-align: center;" >
				<a class="btn btn-primary" href="{{url('/terminateLessons')}}?stu_id={{$students->admissionId}}" style="margin-right: 10px;margin-bottom: 10px;" >Terminate Student</a>
				<a class="btn btn-primary" href="{{url('/invoice')}}/{{$students->admissionId}}" style="margin-right: 10px;margin-bottom: 10px;" >View entries</a>
				<a class="btn btn-primary" href="JavaScript:void(0)" onclick="close_popup();" style="margin-bottom: 10px;" >Submit entry</a>
			</div>
		
		@endforeach	
		
		@if($prospective_students->isNotEmpty() && $admission_data->isEmpty())
			@php  $cnt_prosective_data = 1; @endphp
		<p><h4><span style="/*color:#00aeef;*/"> Scheduled date for intro lesson has passed please update status for below student. </span></h4></p>	
		  <table class="table table-striped">
			 <thead>
				<tr>
				   <th >Name</th>
				   <!--<th >Instrument</th>-->
				   <th >Action</th>
				</tr>
			 </thead>
			 <tbody>
				@foreach($prospective_students as $unrstudent)
				@if(!is_null($unrstudent->prospectiveStudent))	
				<tr>
				   <td>
					  @php
					  $row2=(!empty($unrstudent->prospectiveStudent->lastName)?($unrstudent->prospectiveStudent->packageStudent=='Y'&&$unrstudent->prospectiveStudent->lastName[0]!='-'?'- ':"").$unrstudent->prospectiveStudent->firstName."  ":"").$unrstudent->prospectiveStudent->lastName;
					  @endphp
					  {{$row2}}
				   </td>
				   {{--<td class="inst">{{$unrstudent->instrument->instrumentName}}</td>--}}
				   <td>
				   {{--<a class="link-btn-new" href="{{url('getStatus').'?sid='.$unrstudent->pro_status->statusId.'&pid='.$unrstudent->prospectiveStudent->studentId}}" >Change Status</a>--}}
				   <div class="action_link"><a class="btn btn-primary" href="JavaScript:void(0)" onclick="close_popup();" >OK</a></div>
				   </td>
				   
				</tr>
				@endif	
				@endforeach			
			 </tbody>
		  </table>
		@endif
		
	   </div>
	   <!--<p style=" margin: 30px 0 0px;">Please you should be submit the new entry or terminate the account for above students.</p>-->
	  </div>
      <div class="modal-footer">
        
       
      </div>
    </div>

  </div>
</div>

<div id="warning_myModal" class="modal fade" role="dialog">
	<div class="modal-dialog footer-popup">
    <!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
			</div>
			<div class="modal-body" style="padding: 20px 10px 20px 10px;">
				@if($admission_data->isNotEmpty())
					@foreach($admission_data as $students)
				<div class="table-responsive" style="border: 0px">
					<p><h4><span style="color:red">Warning:</span>  Before proceeding to the link you must log entries (lessons, cancellations, other, etc) or submit a termination request for {{$row}} {{$students->name->lastName}} if they has stopped lessons.<br>
					
					
					</h4></p>
					<p> 
						<div style="margin-top: 35px; text-align: center;" >
							<a class="btn btn-primary" href="{{url('/terminateLessons')}}?stu_id={{$students->admissionId}}" style="margin-right: 10px;margin-bottom: 10px;" >Terminate Student</a>
							<a class="btn btn-primary" href="{{url('/invoice')}}/{{$students->admissionId}}" style="margin-right: 10px;margin-bottom: 10px;" >View entries</a>
							<a class="btn btn-primary" style="margin-bottom: 10px;" href="JavaScript:void(0)" onclick="close_warning_popup();" >Submit entry</a>
						</div>
					</p>
					<!--<p> <div style="margin-top: 35px; text-align: center;" ><a class="btn btn-primary" href="JavaScript:void(0)" onclick="close_warning_popup();" >Ok</a></div></p>-->
				</div>
					@endforeach
				@elseif($prospective_students->isNotEmpty() && $admission_data->isEmpty())
				<div class="table-responsive" style="border: 0px">
					<p><h4><span style="color:red">Warning:</span> Before proceeding to the link you must update status of intro lesson for {{$row2}}. </h4></p>
					<p> <div style="margin-top: 35px; text-align: center;" ><a class="btn btn-primary" href="JavaScript:void(0)" onclick="close_warning_popup();" >Ok</a></div></p>
				</div>
				@endif
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div> 

<div class="footer">
    <div class="pull-right">
      
    </div>
    <div>
        <strong>Copyright11</strong> &copy; 2001 - {{date('Y')}} Musika All Rights Reserved
    </div>
</div>


<script>
$(document).ready(function(){
	

	
	// $(window).scrollTop(0);
	var url = "{{Request::path()}}";
	console.log(url);
	//console.log(url.indexOf('invoice') !== -1);
	@if (Request::path() == 'new-submit-entry' && $cnt_admission_data==10000)
		$("#footer_myModal").hide();
	@elseif(Request::path() == 'terminateLessons' && $cnt_admission_data==1)
		$("#side-menu li:not(#is_enable)").click(function(){
			$("#warning_myModal").modal();
		});
		$("#side-menu a:not(#is_enable a)").css({"color":"#888888", cursor: "default"}).click(function(e) {
			e.preventDefault();
		});
		$("#footer_myModal").hide();
	@elseif(Request::path() == 'getStatus' && $cnt_prosective_data==1111111)
		$("#side-menu li:not(#is_enable)").click(function(){
			$("#warning_myModal").modal();
		});
		$("#side-menu a").css({"color":"#888888", cursor: "default"}).click(function(e) {
			e.preventDefault();
		});	
		$("#footer_myModal").hide();
	@elseif(strpos(Request::path(), 'invoice/') !== false)
		$("#side-menu li:not(#is_enable)").click(function(){
			$("#warning_myModal").modal();
		});
		$("#side-menu a:not(#is_enable a)").css({"color":"#888888", cursor: "default"}).click(function(e) {
			e.preventDefault();
		});	
		$("#footer_myModal").hide();
	@else	
		var log_lesson  = "{{$is_result}}";
		var prospective_result  = "{{$prospective_result}}";
		console.log(log_lesson);
		if(log_lesson=="Yes"){
			
			/* $("#side-menu li:not(#is_enable)").click(function(){
				$("#warning_myModal").modal({
					backdrop: 'static',
					keyboard: false
				});
			});
			$("#side-menu a:not(#is_enable a)").css({"color":"#888888", cursor: "default"}).click(function(e) {
				e.preventDefault();
			}); 
			$("#footer_myModal").modal({
				backdrop: 'static',
				keyboard: false
			});   */
		}else if(prospective_result=="Yes"){
			/* $("#side-menu li:not(#is_enable)").click(function(){
				$("#warning_myModal").modal({
					backdrop: 'static',
					keyboard: false
				});
			});
			$("#side-menu a").css({"color":"#888888", cursor: "default"}).click(function(e) {
				e.preventDefault();
			}); 
			$("#footer_myModal").modal({
				backdrop: 'static',
				keyboard: false
			});  */
		}else{
			$("#side-menu a").css({"color":"", cursor: ""}).unbind();	
		}
	@endif
		
});

function close_popup(){
	$("#footer_myModal").modal('hide');
}
function close_warning_popup(){
	$("#warning_myModal").modal('hide');
}
</script>
