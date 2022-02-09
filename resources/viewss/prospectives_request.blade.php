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

.table_col {
    /* display: block; 
    width: 75px; */
	 margin-right: 8px;
}
hr {
	margin-bottom: 6px !important;
    margin-top: 6px !important;
}


.ck-button {
   /* margin:4px;*/
    background-color:#EFEFEF;
    border-radius:4px;
    border:1px solid #00aeef;
    overflow:auto;
    float:left;
}

.ck-button:hover {
   /* margin:4px;*/
    background-color:#EFEFEF;
    border-radius:4px;
    border:1px solid #00aeef;
    overflow:auto;
    float:left;
    color:#00aeef;
}

.ck-button label {
    float:left;
	margin-bottom: 0;
	-webkit-touch-callout: none; /* iOS Safari */
    -webkit-user-select: none;   /* Chrome/Safari/Opera */
    -khtml-user-select: none;    /* Konqueror */
    -moz-user-select: none;      /* Firefox */
    -ms-user-select: none;       /* Internet Explorer/Edge */
    user-select: none;
	
}

.ck-button label span {
    text-align:center;
    padding:3px 0px;
    display:block;
}

.ck-button label input {
    position:absolute;
    top:-20px;
}

.ck-button  input:checked + span {
    background-color:#00aeef;
    color:#fff;
}

.clsIframe{
	width:600px;
	height:400px
}
@media screen and (min-width: 767px) {
	.ck-button label {
		width:7em;
		-webkit-touch-callout: none; /* iOS Safari */
		-webkit-user-select: none;   /* Chrome/Safari/Opera */
		-khtml-user-select: none;    /* Konqueror */
		-moz-user-select: none;      /* Firefox */
		-ms-user-select: none;       /* Internet Explorer/Edge */
		user-select: none;
	}
	

}
@media  screen    and (max-device-width : 667px) 
    
{ 
.clsIframe{
	width:250px;
	height:300px
}
}

#map-canvas {
  position: relative;
  height: 400px;
  width: 100%;
  margin: 0px;
  padding: 0px;
  z-index: 1002;
  display: none;
}
#close-map {
  display: none ;
}
.blk > li {
    margin-top: 20px;
}
.txt-fade {
    color: #a4a6a8;
}
textarea {
    width: 50%;
}	
.gm-style .place-card {display:none}

 .loader-modal
{
	position: fixed;
	z-index: 999;
	height: 100%;
	width: 100%;
	top: 0;
	left: 0;
	background-color: Black;
	filter: alpha(opacity=60);
	opacity: 0.6;
	-moz-opacity: 0.8;
}
.loader-modal .center
{
	z-index: 1000;
	margin: 300px auto;
	padding: 10px;
	width: 80px;
	background-color: White;
	border-radius: 10px;
	filter: alpha(opacity=100);
	opacity: 1;
	-moz-opacity: 1;
}
.loader-modal .center img
{
	height: 60px;
	width: 60px;
}
#map-canvas {background: transparent url({{asset('img/ajax-loader2.gif')}}) no-repeat center center;}
</style>
<link rel="stylesheet" href="{!! asset('css/jquery.alerts.css') !!}" />
<link rel="stylesheet" href="{{asset('css/jquery-confirm.min.css')}}">
@endsection

@section('prospective_js')
<script src="{{ asset('js/jquery_abox.js') }}"></script>
<script src="{{ asset('js/jquery.alerts.js') }}"></script>

@endsection
@section('content')

<div class="wrapper wrapper-content animated fadeIn">

<div class="row">

<div class="text-center"><h1>Write Message to Student </h1></div>

</div>
<br>
	<form id="requestForm" name="requestForm" method="post" action="{{route('prospectives_send_request')}}" onsubmit="return validateNewForm(this);">
	{{csrf_field()}}
        <div class="row faq" id="lastchild">
			@php $cnt_student = 1; @endphp
			<div id="chklastchild">
			@foreach($results as $student)
               <div class="col-lg-12 mydiv" id="hide_student_{{$cnt_student}}">
                <div class="ibox">
                    <div class="ibox-title" style="background-color:#deeaf8">
                        <h5>ID#: {{ $student['student_key']}}</h5>
                        <div class="ibox-tools">
                           
							<a  href="javascript:void(0)" studentid=
							"{{$student['student_id']}}"  studentkey="{{$student['student_key']}}" studentPst="{{$student['student_id']}}"
							
							class="btn btn-danger btn-sm remove_student">Remove this student from the list</a>
                                
                           
                        </div>
                    </div>
                    <div class="ibox-content">
						<input type="hidden" value="{{$student['student_key']}}" name="student_key[]">
                        <input type="hidden" value="{{$student['student_key']}}" name="student_k{{$student['studentKey']}}">
						<input type="hidden" value="{{$student['student_id']}}" name="student_id[]">
						<input type="hidden" value="{{$student['instrument']}}" name="instrumnt{{$student['student_id']}}">
						@php 
							$level = ['Novice','Advanced Beginner','Intermediate','Advanced Intermediate','Advanced'];
						@endphp
						<p><strong> Instrument:</strong> {{$student['instrument']}}</p>
						<p><strong> Level:</strong> @if(array_key_exists($student['experience_level'],$level))  {{$level[$student['experience_level']]}}  @else  {{$student['experience_level']}} @endif</p>
						<p><strong> Age:</strong> {{$student['age']}}  </p>
						<p><strong> Lesson Length:</strong> {{$student['lesson_length']}}  </p>
						<p><strong> Special Notes:</strong> {{$student['notes_special']}} </p>
                        <p><strong> Lesson Location:</strong> <?php //echo $student['location']; ?>
						
						@if($student['lessons']['is_home'])
							@php
								$zipcode = $student['lessons']['teacher_zcode'];
								$student_zipcode = $student['lessons']['zipCode'];
							@endphp
							@if($zipcode==$student_zipcode)
								@php 
									$home_txt = "Student’s Home, <i>Student is in same zip code as yours.</i>";
									$home_txt2 = "At student’s home in $student_zipcode. <i>Student is in same zip code as yours.</i>";
								@endphp
							@else
								@php 
									$dist = $student['lessons']['home_distance'];
									$home_txt = "Student’s Home, <i>This student is approx. $dist miles from your home in $zipcode.</i>";
									$home_txt2 = "At student’s home in $student_zipcode. <i>This area is approx. $dist miles from your home in $zipcode.</i> ";		
								@endphp
							@endif
							@php
								 $home_txt2 .= "</br></br><a href='#'><b>Update Your 	Travel Areas </b></a> </br>
									<iframe class='clsIframe' frameborder='0' style='border:0' src='https://www.google.com/maps/embed/v1/place?q=$student_zipcode&zoom=12&key=AIzaSyAhS-J8suntAEflTrK_4h7rGFPSqoFFL_s' allowfullscreen>
									</iframe> 
									</br>
									</br>";
							
							@endphp
							
						@else
							@php $home_txt = ""; $home_txt2 = ""; @endphp		
						@endif
						@if($student['lessons']['is_studio'])
							@php  
								$cnt_studios = $student['lessons']['cnt_studios'];
								$dist = $student['lessons']['studio_distance'];
								$travel_radius = $student['lessons']['travel_radius'];
								$student_zipcode = $student['lessons']['travel_zip'];
								$st_key = $student['studentKey'];
							@endphp
							@if($cnt_studios==0)
								@php	
									$studio_txt = "Your Studio, <i>You have not marked any studio location. </i>";
							
									$studio_txt2 = "<span class='s_msg2_$st_key'>Teacher’s Studio/home within $travel_radius miles of $student_zipcode. <i> You have not marked any studio location. </i> </span>";
								@endphp		
							@else
								@if($travel_radius >= $dist)
									@php	
										$studio_txt = "Your Studio, <i>Your studio falls within travel distance ($travel_radius miles) mentioned by student. </i>";
								
										$studio_txt2 = "<span class='s_msg2_$st_key'>Teacher’s Studio/home within $travel_radius miles of $student_zipcode. <i> Your studio falls within travel distance ($travel_radius miles) mentioned by student. </i></span>";
									@endphp	
								@else
									@php	
										$studio_txt = "Your Studio, <i>Your studio does not fall within travel distance ($travel_radius miles) mentioned by student. </i>";
								
										$studio_txt2 = "<span class='s_msg2_$st_key'>Teacher’s Studio/home within $travel_radius miles of $student_zipcode. <i> Your studio does not fall within travel distance ($travel_radius miles) mentioned by student.</i> </span>";
									@endphp	
								@endif
							@endif	
							@php	
								$studio_txt2 .= "</br></br><a onclick='show_studio_map($st_key,111);'  style=' color: #337ab7;text-decoration: none;'><b> Update Your Studio Locations</b></a>
								</br></br>
								<div class='clsIframe' style='display:none' id='map-canvas_$st_key'></div> 
								</br>";
							
							@endphp
						@else
							@php $studio_txt = ""; $studio_txt2 =""; @endphp		
						@endif
						@if($student['lessons']['is_online'])
							@php
								$online_txt = "Online";
								$online_txt2 = "Online";
							@endphp	
						@else
							@php $online_txt = ""; $online_txt2 = ""; @endphp
						@endif
						
						@php	
							$arr_location = 
							[['value'=>'home','desc'=>$home_txt,'desc2'=>$home_txt2], ['value'=>'studio','desc'=>$studio_txt,'desc2'=>$studio_txt2],
							['value'=>'online','desc'=>$online_txt,'desc2'=>$online_txt2]];
							
						@endphp
						<?php //echo "<pre>"; print_r($arr_location); exit; ?>
							<ul>
								@if($student['student_data']['lessonLoc_choice1']!='')
								@php $ch1 = $arr_location[$student['student_data']['lessonLoc_choice1']]; @endphp
									<li><strong>1st Choice: </strong>  
										<?php echo $ch1['desc2']; ?>
									</li>
								@endif
								@if($student['student_data']['lessonLoc_choice2']!='')
								@php $ch2 = $arr_location[$student['student_data']['lessonLoc_choice2']]; @endphp
									<li><strong>2nd Choice: </strong> 
										<?php echo $ch2['desc2']; ?>
									</li>
								@endif
								@if($student['student_data']['lessonLoc_choice3']!='')
								@php $ch3 = $arr_location[$student['student_data']['lessonLoc_choice3']]; @endphp
									<li><strong>3rd Choice: </strong> 
										<?php echo $ch3['desc2']; ?>
									</li>
								@endif	
							</ul>
						</p>
                        <p><strong> Available Lesson Start Times:</strong> {{$student['lessons_times']}}  </p>
						<p><strong><u> Requesting Steps:- </u></strong> </p>
						<p >
						   <ol class="blk" style="/*background-color:#F6FFE5*/">
								<li><h5><strong> Where can you provide lessons?  </strong></h5>
									<p>
									
									@if($student['student_data']['lessonLoc_choice1']!='')
									@php $ch1 = $arr_location[$student['student_data']['lessonLoc_choice1']]; 
									$st_key = $student['studentKey'];	@endphp
										@if($student['lessons']['cnt_studios']==0 && $ch1['value']=='studio') 
											@php 
												$chk_disable = 'disabled'; 
												$chk_class = 'txt-fade'; 
											@endphp
										@else
											@php $chk_disable = ''; 
											$chk_class = ''; @endphp	
										@endif
										<input id="lessonloc" name="lessonloc{{$student['studentKey']}}[]" value="{{$ch1['value']}}" type="checkbox"  @if($ch1['value']=='studio') class="markup_{{$st_key}}"  onclick="check_location('{{$student['studentKey']}}','chk');" @endif {{$chk_disable}} />
										<span class="{{$chk_class}} @if($ch1['value']=='studio') msgEnable_{{$st_key}} @endif"> <strong>1st Choice: </strong> <span class="@if($ch1['value']=='studio') s_msg1_{{$st_key}} @endif">{!! $ch1['desc'] !!} </span>
										 </span>
										<span>@if($ch1['value']=='studio') <a onclick='check_location({{$st_key}},111);'  style=' color: #337ab7;text-decoration: none;display:none'><b> 1Update Your Studio Locations</b></a> @endif</span>	
										 </br>
									@endif
									@if($student['student_data']['lessonLoc_choice2']!='')
									@php $ch2 = $arr_location[$student['student_data']['lessonLoc_choice2']]; 
									$st_key = $student['studentKey']; @endphp
										@if($student['lessons']['cnt_studios']==0 && $ch2['value']=='studio') 
											@php 
												$chk_disable = 'disabled'; 
												$chk_class = 'txt-fade'; 
											@endphp
										@else
											@php $chk_disable = '';
											$chk_class = ''; @endphp	
										@endif
										<input id="lessonloc" name="lessonloc{{$student['studentKey']}}[]" value="{{$ch2['value']}}" type="checkbox" @if($ch2['value']=='studio') class="markup_{{$st_key}}" onclick="check_location('{{$student['studentKey']}}','chk');" @endif {{$chk_disable}} /> <span class="{{$chk_class}} @if($ch2['value']=='studio') msgEnable_{{$st_key}} @endif"> <strong>2nd Choice: </strong><span class="@if($ch2['value']=='studio') s_msg1_{{$st_key}} @endif">  {!! $ch2['desc']; !!} </span> </span> 
										
										<span>@if($ch2['value']=='studio') <a onclick='check_location({{$st_key}},111);'  style=' color: #337ab7;text-decoration: none;display:none'><b> 2Update Your Studio Locations</b></a> @endif</span>
										</br>
									@endif		
									@if($student['student_data']['lessonLoc_choice3']!='')
									@php $ch3 = $arr_location[$student['student_data']['lessonLoc_choice3']]; 
									$st_key = $student['studentKey']; @endphp
										@if($student['lessons']['cnt_studios']==0 && $ch3['value']=='studio') 
											@php 
												$chk_disable = 'disabled'; 
												$chk_class = 'txt-fade'; 
											@endphp
										@else
											@php $chk_disable = '';
											$chk_class = ''; @endphp	
										@endif
										<input id="lessonloc" name="lessonloc{{$student['studentKey']}}[]" value="{{$ch3['value']}}" type="checkbox" @if($ch3['value']=='studio') class="markup_{{$st_key}}" onclick="check_location('{{$student['studentKey']}}','chk');"  @endif {{$chk_disable}} /> 
										<span class="{{$chk_class}} @if($ch3['value']=='studio') msgEnable_{{$st_key}} @endif"><strong>3rd Choice: </strong> <span class="@if($ch3['value']=='studio') s_msg1_{{$st_key}} @endif">{!! $ch3['desc']; !!}</span></span> 
										<span>@if($ch3['value']=='studio') <a onclick='check_location({{$st_key}},111);'  style=' color: #337ab7;text-decoration: none;display:none'><b> 3Update Your Studio Locations</b></a> @endif</span>
										
									@endif	
									</p>
								
								</li>
								
								<li><h5><strong> Can you provide lessons on day time requested by student?   </strong> </h5>
									
									<p><input id="provide_lesson1_{{$student['studentKey']}}" name="provide_lesson{{$student['studentKey']}}" value="yes" type="radio" onclick="showDaysTime('{{$student['studentKey']}}');" > Yes
									<input id="provide_lesson2_{{$student['studentKey']}}" name="provide_lesson{{$student['studentKey']}}" value="no" type="radio" onclick="showDaysTime('{{$student['studentKey']}}');"  > No
									</p>
									<div align="left" style="display:none" id="days_time{{$student['studentKey']}}">
										<label>  									 Please enter the days and times you are available.
										</label><br>
										<textarea name="day_time_request{{$student['studentKey']}}" id="day_time_request{{$student['studentKey']}}" cols="" rows="3"></textarea>	
									</div>
								</li>
							@if(trim($student['student_data']['notes_special'])!="")	
								<li><h5><strong> Can you accommodate the special request of:   </strong> <i>{{$student['student_data']['notes_special']}}</i></h5>
									<p><input id="rdolocation1_{{$student['studentKey']}}" name="rdolocation{{$student['studentKey']}}" value="yes" type="radio"  onclick="hideArea('{{$student['studentKey']}}')" > Yes
									<input id="address" name="rdolocation{{$student['studentKey']}}" value="no" type="radio" onclick="hideArea('{{$student['studentKey']}}')"> No
									<input id="address" name="rdolocation{{$student['studentKey']}}" value="partial" type="radio" onclick="hideArea('{{$student['studentKey']}}')"> Partially 	
									</p>

									<div align="left" style="display:none" id="sp_request_{{$student['studentKey']}}">
										<label> Please explain which part of special request you can not accommodate.
										</label><br>
										<textarea name="special_request{{$student['studentKey']}}" id="special_request{{$student['studentKey']}}" cols="" rows="3"></textarea>	
									</div>
									
								</li>
							@endif	
								 {{--<li><h5><strong>Message to student  </strong> </h5>
									<div align="left">		 
										<textarea name="send_msg{{$student['studentKey']}}" id="send_msg{{$student['studentKey']}}" rows="6" cols=""></textarea>	
									</div>
								</li>--}}
								
								<li><h5><strong>Do you have any special comments for Musika?  </strong> </h5>
									<p><input name="comment{{$student['studentKey']}}" value="Yes" type="radio"  onclick="showHideArea('{{$student['studentKey']}}')" /> Yes
									<input  name="comment{{$student['studentKey']}}" value="No" type="radio" onclick="showHideArea('{{$student['studentKey']}}')" /> No 
									</p>
									<div align="left" style="display:none" id="sp_comment_{{$student['studentKey']}}">
										<label> Comment
										</label><br> 
										<textarea name="special_coment{{$student['studentKey']}}" id="special_coment{{$student['studentKey']}}" rows="3" cols=""></textarea>	
									</div>
								</li>
								
								<li><h5><strong>Reconfirm the contractual Non-Solicitation Clause.</strong></h5>
									<input name="iagree[]" value="{{$student['iagreeId']}}" type="hidden" checked="checked">
									<p><input name="nonsolicitation[]" value="nonsolicitation_{{$student['iagreeId']}}" type="checkbox"><strong> Non Solicitation: </strong> I hereby reconfirm my contract that states during the term of my contract with Musika and for two years after I stop working with Musika, if I circumvent the Musika billing system by removing this student or any other student(s) given to me from the Musika program, that I must pay a legal monetary penalty of $5,000 per student.</p>
								</li>
								
							</ol>
						</p>
                    </div>
                </div>
            </div>
			@php $cnt_student++; @endphp
			@endforeach
			</div>
			<div class="col-lg-12">
                <div class="ibox">
				<input name="stdId" autocomplete="off" type="hidden" id="stdId" value="{{$std_ids['stdIds']}}" />
				<input name="stdKey" autocomplete="off" type="hidden" id="stdKey" value="{{$std_ids['stdKeys']}}" />
				<input name="seenPop"  autocomplete="off"type="hidden" id="seenPop" value="0" />
				<input name="idNumPst" autocomplete="off" id="idNumPst" type="hidden" value="{{$std_ids['chkStudentId']}}" />
				<input type="submit" name="button2" class="btn btn-primary loading open-circle" value="Send Request">
				</div>
			</div>	
        </div>
	
		<!--<input type="submit" name="button2" id="button2" value="Make Request " style="background-color: #fdda">-->
	</form>

   

    
            </div>
<!--<div id="myModal" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel" style="display: none;">
  <div class="modal-dialog">
	<div class="modal-content">
		<a id = 'close-map'  onclick='close_map()'></a>      
		<div class="modal-body">
			<a id="map-canvas"></a> 
		</div>
	</div>
  </div>
</div>
-->
<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">Open Modal</button> -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
        <h4 class="modal-title">Please check if your studio location marked on the map are correct. You can also update studio location if required.</h4>
      </div>
      <div class="modal-body">
		<span class="each_tips"><b>Instructions: place pins for your own home studio locations, if applicable.</b></span>
		<ul class="list-unstyled">
		<li>1. Zoom in/out using +/- on the left side of the map.</li>
		<li> </li>
		<li>2. Locate the cross streets of your studio. </li>
		<li>3. Double click on the map to place a studio pin.</li>
		<li>4. To remove a studio pin, right click the placed pin.</li>
		</ul>
        <div id="map-canvas"></div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div class="loader-modal" style="display: none">
	<div class="center">
		<img alt="" src="{{asset('img/ajax-loader2.gif')}}" />
	</div>
</div>

@endsection
@section('custom_js')
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyAhS-J8suntAEflTrK_4h7rGFPSqoFFL_s"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"> </script>
 <script src="{{asset('js/jquery-confirm.min.js')}}"></script>
<script>

function removeValue(list, value) {
  return list.replace(new RegExp(",?" + value + ",?"), function(match) {
      var first_comma = match.charAt(0) === ',',
          second_comma;
      if (first_comma &&
          (second_comma = match.charAt(match.length - 1) === ',')) {
        return ',';
      }
      return '';
    });
};




$(".remove_student").click(function(){
	
	var countdiv = $(".mydiv").length;
	if(countdiv==1)
	{
		var redir=confirm("This is the only student selected. If you remove this student you'll be taken back to the Available Students page.");
		if(redir)
		{
			window.location.href="{{url('/prospectives#div-focus')}}";
		}
	}
	else
		{
			var c=confirm("Are you sure you wish to remove this student from your requests?");
				if(c)
				{
					
					var stdId = $("#stdId").val();
					$("#stdId").val(removeValue(stdId,$(this).attr('studentid')));
					var stdKey = $("#stdKey").val();
					$("#stdKey").val(removeValue(stdKey,$(this).attr('studentkey')));
					var idNumPst = $("#idNumPst").val();
					$("#idNumPst").val(removeValue(idNumPst,$(this).attr('studentPst')));
					$(this).parent().parent().parent().parent().remove();		
				}
		}
});

function validateNewForm(stdForm){
	//
	var tEmail=$("#email").val();

	var noPop=0;

	var stdId= document.getElementById("stdId").value;
	//var stdKey= document.getElementById("stdKey").value;
	var std_array=stdId.split(",");
	//var std_key=stdKey.split(",");
	var part_num=0;
	var allChecked =1;
	// JS TO CHECK IF ANY OF THE CHECKBOXES ARE CHECKED - BEGINS
	var countChecked = 0;
	var nonsolChecked = 0;
		var checkBox = document.getElementsByName('iagree[]');
		var totalCheckboxes = document.getElementsByName('iagree[]').length;
		var nonsol = document.getElementsByName('nonsolicitation[]');
		var countnonsol = document.getElementsByName('nonsolicitation[]').length;
		
		if(totalCheckboxes!=0){
			for(var i=0; i<totalCheckboxes; i++){
				if(checkBox[i].checked == true){
					countChecked = countChecked+1;
				}
			}
		}
		
		if(countnonsol!=0){
			for(var i=0; i<countnonsol; i++){
				if(nonsol[i].checked == true){
					nonsolChecked = nonsolChecked+1;
				}
			}
		}
	if(!countChecked){
		jAlert('You must agree to the terms by selecting at least anyone of the listed checkboxes to proceed further.', 'Alert Dialog');
		
		return false;
	}
	//console.log(std_array.length); 
	while (part_num < std_array.length)
	{
		 //alert(part_num);
	var studentK = "student_k" + std_array[part_num];//std_key[part_num];
	//var iagree = document.getElementsByName("iagree[]")[0];
	var studentKe= document.getElementsByName(studentK);
	var studentKey= studentKe[0].value;
	
	//console.log(part_num+' '+studentKey);
	
	//var txta_comment = document.getElementsByName("txta_comment" + std_array[part_num])[0];
	//var txta_not_accommodate = document.getElementsByName("txta_not_accommodate" + std_array[part_num])[0];
		var studentId = std_array[part_num];
		
		var favorite = [];
		$.each($("input[name='lessonloc"+studentId+"[]']:checked"), function(){
			favorite.push($(this).val());
		});
		//console.log(favorite);  //return false;
		if (favorite && favorite.length == 0) {
			jAlert('You should select at least one choice option of lesson location for student '+ studentKey + '.', 'Alert Dialog');
			$( "#provide_lesson1_"+studentId ).focus();
			return false;
		}
		var provide_lesson = $('input[name=provide_lesson'+studentId+']:checked').val();
		if(provide_lesson== "yes" || provide_lesson== "no"){
			if(($('textarea[name=day_time_request'+studentId+']').val()).trim()==''){
				jAlert('Please enter the day and time for your availability. ', 'Alert Dialog');
				$( "#provide_lesson1_"+studentId ).focus();
				return false;
			}
		}else{
			jAlert('You should select Yes or No to provide lessons on day time requested by student '+ studentKey + '.', 'Alert Dialog');
			$( "#provide_lesson1_"+studentId ).focus();
			return false;
		}
		
		var rdolocation = $('input[name=rdolocation'+studentId+']:checked').val();
		
		console.log(rdolocation);
		if($("input[name=rdolocation" + studentId + "]").length > 0 ){
			if(rdolocation=='yes' || rdolocation=='no' || rdolocation=='partial'){
				if(rdolocation=='partial' && ($('textarea[name=special_request'+studentId+']').val()).trim()==''){
					jAlert('Please explain what special requests you are not able to accommodate for student '+ studentKey + '.', 'Alert Dialog');
					$( "#special_request"+studentId ).focus();
					return false;
					
				}
				
			}else{
				jAlert('You should select Yes or No or Partially  to accommodate the special request for student '+ studentKey + '.', 'Alert Dialog');
				$( "#rdolocation1_"+studentId ).focus();
				return false;
			}
		}
		
		
		/* if(($('textarea[name=send_msg'+studentId+']').val()).trim()==''){
			jAlert('You should enter a short message for student '+ studentKey + '.', 'Alert Dialog');
			$( "#send_msg"+studentId ).focus();
			return false;
		} */
		
		
		var comment = $('input[name=comment'+studentId+']:checked').val();
		if(comment=='Yes' || comment=='No' ){
			if(comment=='Yes' && ($('textarea[name=special_coment'+studentId+']').val()).trim()==''){
				jAlert('Please enter special comment you would like to tell musika for student '+ studentKey + '.', 'Alert Dialog');
				$( "#special_coment"+studentId ).focus();
				return false;
				
			}
		}else{
			jAlert('You should select Yes or No for any special comments for Musika', 'Alert Dialog');
			$( "#rdolocation1_"+studentId ).focus();
			return false;
		}
		
		//day_time_request
		if(nonsol[part_num].checked == false){
			jAlert('You must agree to non-solicitation clause for student '+ studentKey + '.', 'Alert Dialog');
			nonsol[part_num].focus();
			return false;
		}

		part_num++;
	} // end of while
	
	return true;
}

function show_studio_map(s_id,val){
	
	$('#map-canvas_'+s_id).toggle();
	
	if($('input:checkbox[name=update_studio]').is(':checked')){
		//console.log('checked');
		$("#map-canvas2").css('display','block');
	}else{
		//console.log('un-checked');
		$("#map-canvas2").css('display','none');
	}
}
function showHideArea(sid){
	
	if($('input[name=comment'+sid+']:checked').val()=="Yes"){
		$("#sp_comment_"+sid).css('display','block');
	}else if($('input[name=comment'+sid+']:checked').val()=="No"){
		$("#sp_comment_"+sid).css('display','none');
	}
}
function showDaysTime(sid){
	
	if($('input[name=provide_lesson'+sid+']:checked').val()=="yes"){
		$("#days_time"+sid).css('display','block');
	}else if($('input[name=provide_lesson'+sid+']:checked').val()=="no"){
		$("#days_time"+sid).css('display','block');
	}else{
		$("#days_time"+sid).css('display','none');
	}
}
function hideArea(sid){
	
	if($('input[name=rdolocation'+sid+']:checked').val()=="partial"){
		$("#sp_request_"+sid).css('display','block');
	}else {
		$("#sp_request_"+sid).css('display','none');
	}
}
//function view_map( num )
$( document ).ready(function() {
	
	var ids = [];
	$.each($("input[name='student_id[]']"), function(){
		ids.push($(this).val());
	});
	
	window.loc_markers = new Array;
	window.loc_map_markers = new Array;
	window.loc_map = new Array;
	var arr_data = [];
	var teacher_studio_loc = <?php echo $teacher_studio_loc; ?>;
	console.log(ids);		
	if(teacher_studio_loc['studio'][0]){
		var teacher_lat = teacher_studio_loc['studio'][0]['lat']; 
		var teacher_long = teacher_studio_loc['studio'][0]['lng']; 
	}else{
		var teacher_lat = teacher_studio_loc['zipcode']['lat']; 
		var teacher_long = teacher_studio_loc['zipcode']['lng'];
	}

		
	var latitude = 40.725568 ;
	var longitude = -73.998208; 

	// alert('latitude : ' + teacher_lat + ' longitude : ' + teacher_long); 

	var teacherLatlng = new google.maps.LatLng( teacher_lat, teacher_long);
	var myLatlng = new google.maps.LatLng( latitude, longitude );

	var distance = 32186; // 20 miles in metres

	var mapOptions = {
		zoom: 10,
		center: teacherLatlng,
		mapTypeControl: false,
		streetViewControl: false,
		fullscreenControl:false,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		disableDoubleClickZoom: true
	  };
	$.each(ids, function (index, stu_id) {
		var map = new google.maps.Map(document.getElementById('map-canvas_'+stu_id), mapOptions);
		loc_map.push(map);
	var locations = [];
	for (i = 0; i < teacher_studio_loc['studio'].length; i++) { 
		var latitude = teacher_studio_loc['studio'][i]['lat'];
		var longitude = teacher_studio_loc['studio'][i]['lng'];
		locations[i] = new google.maps.LatLng(latitude, longitude);
	}	
	/* var locations = [
		new google.maps.LatLng(teacher_lat, teacher_long),
		new google.maps.LatLng(latitude, longitude)
		// and additional coordinates, just add a new item
	]; */

	//return false;
	locations.forEach(function (studio_location) {
		var marker = new google.maps.Marker({
			position: studio_location,
			map: map
		});	

		loc_map_markers.push(marker);
		
		
		google.maps.event.addListener(marker, 'rightclick', function(event) {
			//console.log(event);
			
			getpos = marker.getPosition();
			var latitde = getpos.lat();
			var longitde = getpos.lng();
			//console.log(latitde,longitde);
			//return false;
			//console.log(latitude+' '+longitude);
			
			var csrf_token = $("input[name=_token]").val();
			$.ajax({
				url: "<?php echo url('/prospectives/deleteStudioLocation') ?>",
				data: {
					lat:latitde,
					lng:longitde,
					s_id:'',
					student_ids:ids,
					_token: csrf_token
				},
				type: 'POST',
				dataType: 'json',
				beforeSend: function () {
					$(".loader-modal").show();
				},
				complete: function () {
					$(".loader-modal").hide();
				},
				success: function(response){
					
					$.each(loc_map_markers, function( key,location_obj ) {
						//console.log(location_obj);
						getposition = location_obj.getPosition();
						var lat_location = getposition.lat();
						var lng_location = getposition.lng();
						
						//console.log(lat_location,lng_location);
						if(lat_location==latitde && longitde==lng_location){
							location_obj.setMap(null);
						}
					});
					
					if(response['status'] == 'true'){
						$.each(ids, function (index, stu_id) {
							$(".s_msg1_"+stu_id).html(response['res'][stu_id]['studio_msg1']);
							$(".s_msg2_"+stu_id).html(response['res'][stu_id]['studio_msg2']);
							
							if(response['deleteStatus']=='All'){
								//location.reload(true);
								$(".msgEnable_"+stu_id).addClass("txt-fade");
								$(".markup_"+stu_id).attr('disabled', 'disabled');
							}
						});
					}
				}
			});
		});
	});
	
	google.maps.event.addListener(map, 'dblclick', function(event) {
		
		loc_map
		$.each(loc_map, function( key,map_obj ) {
			marker = new google.maps.Marker({
				map: map_obj,
				draggable: true,
				position: event.latLng
			});
			
			loc_markers.push(marker);
		});	
			
		
		//loc_map_markers.push(marker);	
		
		//console.log(loc_markers);
		//return false;
		pos = marker.getPosition();
		var latitude = pos.lat();
		var longitude = pos.lng();
		var csrf_token = $("input[name=_token]").val();
		$.ajax({
			url: "<?php echo url('/prospectives/saveStudioLocation') ?>",
			data: {
				lat:latitude,
				lng:longitude,
				s_id:'',
				student_ids:ids,
				_token: csrf_token
			},
			type: 'POST',
			dataType: 'json',
			success: function(response){
				//console.log(response);
				
				if(response['status'] == 'true' && response['res'] != ''){
					
					$.each(ids, function (index, stu_id) {
						//console.log(response['res'][value]['studio_msg1']);
						$(".msgEnable_"+stu_id).removeClass("txt-fade");
						$(".s_msg1_"+stu_id).html(response['res'][stu_id]['studio_msg1']);
						$(".s_msg2_"+stu_id).html(response['res'][stu_id]['studio_msg2']);
						$(".markup_"+stu_id).removeAttr("disabled");
					});
					
				}
				if(response['status'] == 'false'){
					//marker.setMap(null);
					//loc_markers.splice(loc_markers.indexOf(marker), 1);
					get_pos = marker.getPosition();
					var latitude = get_pos.lat();
					var longtitude = get_pos.lng();
					$.each(loc_markers, function( key,loc_object ) {
					//console.log(location_obj);
						get_position = loc_object.getPosition();
						var lat_location = get_position.lat();
						var lng_location = get_position.lng();
						
						//console.log(latitde,longitde,lat_location,lng_location);
						if(lat_location==latitude && longtitude==lng_location){
							loc_object.setMap(null);
							//obj.setMap(null);
							//loc_markers.splice(loc_markers.indexOf(loc_object), 1);
						}
					});
					
					
					$.alert({ title: 'Alert!', content: response['res']});
				}
				
			}
		});	
		//markers
		$.each(loc_markers, function( key,obj ) {
			//console.log(obj);
			google.maps.event.addListener(obj, 'rightclick', function(event) {
				//console.log(event);
				
				getpos = obj.getPosition();
				var latitde = getpos.lat();
				var longitde = getpos.lng();
				//console.log(latitude+' '+longitude);
				
				
				//return false;
				var csrf_token = $("input[name=_token]").val();
				$.ajax({
					url: "<?php echo url('/prospectives/deleteStudioLocation') ?>",
					data: {
						lat:latitde,
						lng:longitde,
						s_id:'',
						student_ids:ids,
						_token: csrf_token
					},
					type: 'POST',
					dataType: 'json',
					beforeSend: function () {
						$(".loader-modal").show();
					},
					complete: function () {
						$(".loader-modal").hide();
					},
					success: function(response){
						//console.log(response);
						
						//obj.setMap(null);
						//loc_markers.splice(loc_markers.indexOf(obj), 1);
							
						$.each(loc_markers, function( key,loc_obj ) {
						//console.log(location_obj);
							get_position = loc_obj.getPosition();
							var lat_location = get_position.lat();
							var lng_location = get_position.lng();
							
							//console.log(latitde,longitde,lat_location,lng_location);
							if(lat_location==latitde && longitde==lng_location){
								loc_obj.setMap(null);
								//obj.setMap(null);
								//loc_markers.splice(loc_markers.indexOf(loc_obj), 1);
							}
						});	
						
						
						if(response['status'] == 'true'){
							$.each(ids, function (index, stu_id) {
								$(".s_msg1_"+stu_id).html(response['res'][stu_id]['studio_msg1']);
								$(".s_msg2_"+stu_id).html(response['res'][stu_id]['studio_msg2']);
								
								if(response['deleteStatus']=='All'){
									//location.reload(true);
									$(".msgEnable_"+stu_id).addClass("txt-fade");
									$(".markup_"+stu_id).attr('disabled', 'disabled');
								}
							
							});
						}
					
					}
				});
			});
		});
		
		console.log(loc_markers.length);
		
	});
});	
	
	

});



function check_location(s_id,val){
	return false;
	//alert(s_id);
	
	if(val=='chk' && (!$('input:checkbox[name=lessonloc'+s_id+'[]]').is(':checked'))){
		return false;
	}
	
	var csrf_token = $("input[name=_token]").val();
	$.ajax({
		url: "<?php echo url('/prospectives/checkStudioLocation') ?>",
		data: {
			s_id:s_id,
			_token: csrf_token
		},
		type: 'POST',
		dataType: 'json',
		beforeSend: function () {
			$(".loader-modal").show();
		},
		complete: function () {
			$(".loader-modal").hide();
		},
		success: function(response){
			console.log(response);
			
			var ids = [];
			$.each($("input[name='student_id[]']"), function(){
				ids.push($(this).val());
			});	
			//ids.join(',');
			window.markers = new Array;
			var studentId = response['s_id'];
			if(response['studio'][0]){
			  var teacher_lat = response['studio'][0]['lat']; 
			  var teacher_long = response['studio'][0]['lng']; 
			}else{
			   var teacher_lat = response['zipcode']['lat']; 
			  var teacher_long = response['zipcode']['lng'];
			}
		  
				
			var latitude = 40.725568 ;
			var longitude = -73.998208; 

			// alert('latitude : ' + teacher_lat + ' longitude : ' + teacher_long); 

			var teacherLatlng = new google.maps.LatLng( teacher_lat, teacher_long);
			var myLatlng = new google.maps.LatLng( latitude, longitude );

			var distance = 32186; // 20 miles in metres

			var mapOptions = {
				zoom: 10,
				center: teacherLatlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				disableDoubleClickZoom: true
			  };
			
			var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
			
			google.maps.event.addListenerOnce(map, 'idle', function(){
				$("#myModal").modal();
				$('#map-canvas').css('display','inline-block');	
			});
			 
			/* var marker = new google.maps.Marker({
				position : teacherLatlng,
				map : map,
				title : 'Edward'
			 }) ; */
		
		
			var locations = [];
			for (i = 0; i < response['studio'].length; i++) { 
				var latitude = response['studio'][i]['lat'];
				var longitude = response['studio'][i]['lng'];
				locations[i] = new google.maps.LatLng(latitude, longitude);
			}	
			/* var locations = [
				new google.maps.LatLng(teacher_lat, teacher_long),
				new google.maps.LatLng(latitude, longitude)
				// and additional coordinates, just add a new item
			]; */
		
		//return false;
		locations.forEach(function (studio_location) {
			var marker = new google.maps.Marker({
				position: studio_location,
				map: map
			});
			
			google.maps.event.addListener(marker, 'rightclick', function(event) {
				console.log(event);
				
				getpos = marker.getPosition();
				var latitde = getpos.lat();
				var longitde = getpos.lng();
				//console.log(latitude+' '+longitude);
				
				var csrf_token = $("input[name=_token]").val();
				$.ajax({
					url: "<?php echo url('/prospectives/deleteStudioLocation') ?>",
					data: {
						lat:latitde,
						lng:longitde,
						s_id:studentId,
						student_ids:ids,
						_token: csrf_token
					},
					type: 'POST',
					dataType: 'json',
					beforeSend: function () {
						$(".loader-modal").show();
					},
					complete: function () {
						$(".loader-modal").hide();
					},
					success: function(response){
						//console.log(response);
						marker.setMap(null);
						if(response['status'] == 'true'){
							$.each(ids, function (index, stu_id) {
								$(".s_msg1_"+stu_id).html(response['res'][stu_id]['studio_msg1']);
								$(".s_msg2_"+stu_id).html(response['res'][stu_id]['studio_msg2']);
								
								if(response['deleteStatus']=='All'){
									//location.reload(true);
									$(".msgEnable_"+stu_id).addClass("txt-fade");
									$(".markup_"+stu_id).attr('disabled', 'disabled');
								}
							});
						}
						
					}
				});

			});
		});	  
			
		google.maps.event.addListener(map, 'dblclick', function(event) {
			
			marker = new google.maps.Marker({
				map: map,
				draggable: true,
				position: event.latLng
			});
			
			markers.push(marker);
			
			
			
			pos = marker.getPosition();
			var latitude = pos.lat();
			var longitude = pos.lng();
			var csrf_token = $("input[name=_token]").val();
			$.ajax({
				url: "<?php echo url('/prospectives/saveStudioLocation') ?>",
				data: {
					lat:latitude,
					lng:longitude,
					s_id:studentId,
					student_ids:ids,
					_token: csrf_token
				},
				type: 'POST',
				dataType: 'json',
				success: function(response){
					//console.log(response);
					
					if(response['status'] == 'true' && response['res'] != ''){
						
						$.each(ids, function (index, stu_id) {
							//console.log(response['res'][value]['studio_msg1']);
							$(".msgEnable_"+stu_id).removeClass("txt-fade");
							$(".s_msg1_"+stu_id).html(response['res'][stu_id]['studio_msg1']);
							$(".s_msg2_"+stu_id).html(response['res'][stu_id]['studio_msg2']);
							$(".markup_"+stu_id).removeAttr("disabled");
						});
						
					}
					if(response['status'] == 'false'){
						marker.setMap(null);
						markers.splice(markers.indexOf(marker), 1);
						$.alert({ title: 'Alert!', content: response['res']});
					}
					
				}
			});	
			
			$.each(markers, function( key,obj ) {
				console.log(obj);
				google.maps.event.addListener(obj, 'rightclick', function(event) {
					console.log(event);
					
					getpos = obj.getPosition();
					var latitde = getpos.lat();
					var longitde = getpos.lng();
					//console.log(latitude+' '+longitude);
					
					var csrf_token = $("input[name=_token]").val();
					$.ajax({
						url: "<?php echo url('/prospectives/deleteStudioLocation') ?>",
						data: {
							lat:latitde,
							lng:longitde,
							s_id:studentId,
							student_ids:ids,
							_token: csrf_token
						},
						type: 'POST',
						dataType: 'json',
						beforeSend: function () {
							$(".loader-modal").show();
						},
						complete: function () {
							$(".loader-modal").hide();
						},
						success: function(response){
							//console.log(response);
							obj.setMap(null);
							markers.splice(markers.indexOf(obj), 1);
							
							if(response['status'] == 'true'){
								$.each(ids, function (index, stu_id) {
									$(".s_msg1_"+stu_id).html(response['res'][stu_id]['studio_msg1']);
									$(".s_msg2_"+stu_id).html(response['res'][stu_id]['studio_msg2']);
									
									if(response['deleteStatus']=='All'){
										//location.reload(true);
										$(".msgEnable_"+stu_id).addClass("txt-fade");
										$(".markup_"+stu_id).attr('disabled', 'disabled');
									}
								
								});
							}
							
							
						}
					});
				});
			});
			
			
			
			//
			
			
			console.log(markers.length);
			
			//listen(marker);
			
		});
		
		 //
		
		//console.log(markers);
		
		/*   var circle = {
            strokeColor: '#FF0000',
            strokeOpacity: 0.7,
            strokeWeight: 1,
            fillColor: '#FF0000',
            fillOpacity: 0.35,
            map: map,
            center: teacherLatlng,
            radius: distance
          }; */

		//teacher_Circle = new google.maps.Circle(circle);

		google.maps.event.addListener(map, 'center_changed', function() {
      // 3 seconds after the center of the map has changed, pan back to the marker.
            window.setTimeout(function() {
            map.panTo(marker.getPosition());
              }, 3000);
          });
			
			
		},
		error: function(e){
		}
	}); 
	
	return false;
}

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
	

$(".clsIframe").ready( function() { 
	$(".clsIframe").contents().find("#mapDiv").css('display', 'none');
});

	</script>
@endsection