@extends('layouts.app')
 
<style>
.ibox-content p{
	
	line-height: 2;
    margin: 2px 14px 10px 11px;
}
.cent{
	
margin-top: -8px;
}

.item-list{
	margin-bottom: -5px;
    padding: 10px 15px;
	display: block;
}

.irs-from, .irs-to, .irs-single {
    background: #00aeef !important;
}
	
.irs-diapason {
    background: #00aeef none repeat scroll 0 0 !important;	
}
.irs-from::after, .irs-to::after, .irs-single::after {
    border-color: #00aeef transparent transparent !important;
}
    /* CSS styles used by custom infobox template */
        .customInfobox {
           /* background-color: rgba(0,0,0,0.5);
            color: white;
            max-width: 200px;
            border-radius: 10px;
            font-size:12px;
            pointer-events:auto !important; */
			padding: 0px;
        }
		.customInfobox .title {
			/* font-size: 14px;
			font-weight: bold;
			margin-bottom: 5px; */
		}
        a.customInfoboxCloseButton:link, a.customInfoboxCloseButton:visited {
            color: white;
            text-decoration: none;
            position: absolute;
            top: 0px;
            right:10px;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight:bold;
            font-size:14px;
        }
	div.col-md-1{
		padding-right: 5px; !important;
	}

	.submit_btn {
		background: #00aeef none repeat scroll 0 0;
		border: 0 none;
		color: #fff;
		cursor: pointer;
		display: inline-block;
		font-size: 18px;
		font-weight: 400;
		line-height: 19px;
		padding: 12px 20px;
		position: relative;
		text-align: center;
		text-decoration: none;
		text-transform: uppercase;
	}
	.savebutton {
		 margin-right: 0;
		padding-top: 25px;
		text-align: center;
	}	
	.navbar-fixed-bottom {
		border-width: 1px 0 0;
		bottom: 0;
		margin-bottom: 0;
	}
	.required {
		color:red;
	}
</style>
@section('link_css')
<link rel="stylesheet" href="{{asset('css/jquery-confirm.min.css')}}">
 <link href="{{asset('css/plugins/ionRangeSlider/ion.rangeSlider.css')}}" rel="stylesheet">
 <link href="{{asset('css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">
 <link href="{{asset('css/plugins/nouslider/jquery.nouislider.css')}}" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="{{asset('css/YouTubePopUp.css')}}">
 <style>
.jconfirm-box.jconfirm-hilight-shake.jconfirm-type-default.jconfirm-type-animated {
    width: 110%;
}
div.jc-bs3-container.container{
	padding-right: 22px !important;
	padding-left: 0px !important;
}
@media (hover:none) {
    /* No hover support */
}
/* 
div.jconfirm-content-pane.no-scroll
{
	 height: 35px !important;
} */
.jconfirm .jconfirm-box div.jconfirm-title-c {
    font-size: 17px !important;
 }
 .click-polygon
 {
	background-color: #00aeef;
    border-color: #00aeef;
    color: #ffffff;
 }
 .each_question_details {
    display: none;
}
</style>
@endsection 
@section('content')

<div class="wrapper wrapper-content animated fadeInRight">

		
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
			 <h2></h2>
            </div>
			 
            
			
         </div>
      </div>
	  </div>
	  
	   <div class="row">
                <div class="col-lg-12 "><!--col-lg-offset-1-->
                    <div class="ibox">
                        <div class="ibox-content">
						<div class="row">
						
					<!--	<p>
	<a class="bla-1" href="https://www.youtube.com/watch?v=RuvA4b_2pk0">This YouTube video with autoplay</a> and
	<a class="bla-2" href="https://www.youtube.com/watch?v=RuvA4b_2pk0">This YouTube video without autoplay</a>
</p>-->
						
						<div class="d-inline">
						  <h3><span class="fa-stack fa-1x">
  <i class="fa fa-circle fa-stack-2x"></i>
  <strong class="fa-stack-1x text-default" style="color:white">1</strong>
</span> Select profile headshot:<span class="required">*</span></h3>
</div>					
					
						<div class="col-md-3" style="width: !important">
							<div class="ibox-content text-center" style="border-style: none; !important">
                                <div class="m-b-sm">
									@if(Auth::check() )
									@php
										$avatar=App\User::with('teacherId')->where('id',Auth::id())->first();
										$newavt=str_replace("@{{THUMBNAILMASK}}","avatarSize",$avatar->teacherId->avatar);
									@endphp
									<img alt="image" width="210px"  src="https://www.musikalessons.com/uploads/TeachersModel/{{$avatar->teacherId->id}}/avatar/{{$newavt}}">	
									@else
									<img alt="image" width="210px"  src="{{url('img\profile.png')}}">
									 @endif
                                </div>
								<p class="font-bold">@if(Auth::check()){{ Auth::user()->firstName }} {{ Auth::user()->lastName }}@endif</p>

                                <div class="text-center">
                                    <a class="btn btn-xs btn-white"><i class="fa fa-edit"></i> Edit </a>
                                    <a class="btn btn-xs btn-primary"><i class="fa fa-trash"></i> Delete</a>
                                </div>
                            </div>
						</div>
						<div class="col-md-9">
							<p><strong style="color:red">IMPORTANT:</strong> Your profile photo is a very important element to your profile. Please read the following tips before uploading:</p>  
							<ul class="list-group">
							<li class="item-list"><strong>1. Close-up photos. Use a full color, high quality headshot.</strong></li>
							 <li class="item-list"> <strong>2. Photo of Just You. Use a solo shot without other people.</strong></li>
							<li class="item-list"> <strong> 3. Clear Photo. Avoid low quality, blurry, or poor contrast photos.</strong></li>
							<li class="item-list"> <strong> 4. Dress for Success. Dress as you would to a first lesson with a new client (business casual).</strong></li>
							<li class="item-list"> <strong> 5. Smile! Avoid photos that make you appear intimidating, angry, goofy, bored, etc. </strong> </li>    
							<!-- <li class="item-list"><input type="button" class="btn btn-primary" value="Choose a Photo"> </li> --> 
						</ul>	
				  
						</div>
						</div>
				<hr>			
			<div class="row">
			  <h3><span class="fa-stack fa-1x">
  <i class="fa fa-circle fa-stack-2x"></i>
  <strong class="fa-stack-1x text-default" style="color:white">2</strong>
</span> Instruments you can teach:<span class="required">*</span></h3>
			
<div class="col-md-4">
<input value="1" id="instruments_0" type="checkbox" name="instruments[]" /> <label for="instruments_0">Piano</label><br/>
<input value="2" id="instruments_1" type="checkbox" name="instruments[]" /> <label for="instruments_1">Guitar</label><br/>
<input value="3" id="instruments_2" type="checkbox" name="instruments[]" /> <label for="instruments_2">Voice</label><br/>
<input value="4" id="instruments_3" type="checkbox" name="instruments[]" /> <label for="instruments_3">Violin</label><br/>
<input value="7" id="instruments_4" type="checkbox" name="instruments[]" /> <label for="instruments_4">Cello</label><br/>
<input value="8" id="instruments_5" type="checkbox" name="instruments[]" /> <label for="instruments_5">Viola</label><br/>
<input value="9" id="instruments_6" type="checkbox" name="instruments[]" /> <label for="instruments_6">Trumpet</label><br/>
<input value="10" id="instruments_7" type="checkbox" name="instruments[]" /> <label for="instruments_7">Trombone</label><br/>
<input value="11" id="instruments_8" type="checkbox" name="instruments[]" /> <label for="instruments_8">Saxophone</label><br/>
<input value="12" id="instruments_9" type="checkbox" name="instruments[]" /> <label for="instruments_9">Flute</label><br/>
<input value="13" id="instruments_10" type="checkbox" name="instruments[]" /> <label for="instruments_10">Clarinet</label><br/>
<input value="14" id="instruments_11" type="checkbox" name="instruments[]" /> <label for="instruments_11">Drums</label><br/>

<input value="15" id="instruments_12" checked="checked" type="checkbox" name="instruments[]" /> <label for="instruments_12">Bass Guitar</label><br/>
<input value="16" id="instruments_13" type="checkbox" name="instruments[]" /> <label for="instruments_13">Organ</label><br/>
</div>
<div class="col-md-4">
<input value="17" id="instruments_14" type="checkbox" name="instruments[]" /> <label for="instruments_14">Synthesizer</label><br/>
<input value="18" id="instruments_15" type="checkbox" name="instruments[]" /> <label for="instruments_15">Harp</label><br/>
<input value="19" id="instruments_16" type="checkbox" name="instruments[]" /> <label for="instruments_16">Accordion</label><br/>
<input value="20" id="instruments_17" type="checkbox" name="instruments[]" /> <label for="instruments_17">Harmonica</label><br/>
<input value="21" id="instruments_18" type="checkbox" name="instruments[]" /> <label for="instruments_18">Lap Steel Guitar</label><br/>
<input value="22" id="instruments_19" type="checkbox" name="instruments[]" /> <label for="instruments_19">Banjo</label><br/>
<input value="23" id="instruments_20" type="checkbox" name="instruments[]" /> <label for="instruments_20">Ukulele</label><br/>
<input value="24" id="instruments_21" type="checkbox" name="instruments[]" /> <label for="instruments_21">Mandolin</label><br/>
<input value="25" id="instruments_22" type="checkbox" name="instruments[]" /> <label for="instruments_22">Recorder</label><br/>


<input value="26" id="instruments_23" type="checkbox" name="instruments[]" /> <label for="instruments_23">Lute</label><br/>
<input value="28" id="instruments_24" type="checkbox" name="instruments[]" /> <label for="instruments_24">Electric Violin</label><br/>
<input value="29" id="instruments_25" type="checkbox" name="instruments[]" /> <label for="instruments_25">Fiddle</label><br/>
<input value="30" id="instruments_26" type="checkbox" name="instruments[]" /> <label for="instruments_26">Double Bass</label><br/>
<input value="31" id="instruments_27" type="checkbox" name="instruments[]" /> <label for="instruments_27">Euphonium</label><br/>
<input value="32" id="instruments_28" type="checkbox" name="instruments[]" /> <label for="instruments_28">French Horn</label><br/>
</div>
<div class="col-md-4">
<input value="33" id="instruments_29" type="checkbox" name="instruments[]" /> <label for="instruments_29">Tuba</label><br/>
<input value="38" id="instruments_30" type="checkbox" name="instruments[]" /> <label for="instruments_30">Piccolo</label><br/>
<input value="39" id="instruments_31" type="checkbox" name="instruments[]" /> <label for="instruments_31">Mallet Percussion</label><br/>
<input value="40" id="instruments_32" type="checkbox" name="instruments[]" /> <label for="instruments_32">Orchestral Percussion</label><br/>
<input value="41" id="instruments_33" type="checkbox" name="instruments[]" /> <label for="instruments_33">Shakuhachi</label><br/>
<input value="42" id="instruments_34" type="checkbox" name="instruments[]" /> <label for="instruments_34">Oboe</label><br/>


<input value="43" id="instruments_35" type="checkbox" name="instruments[]" /> <label for="instruments_35">Bassoon</label><br/>
<input value="44" id="instruments_36" type="checkbox" name="instruments[]" /> <label for="instruments_36">English Horn</label><br/>
<input value="45" id="instruments_37" type="checkbox" name="instruments[]" /> <label for="instruments_37">Conga</label><br/>
<input value="46" id="instruments_38" type="checkbox" name="instruments[]" /> <label for="instruments_38">Latin Percussion</label><br/>
<input value="100" id="instruments_39" type="checkbox" name="instruments[]" /> <label for="instruments_39">Music</label><br/>
<input value="101" id="instruments_40" type="checkbox" name="instruments[]" /> <label for="instruments_40">Keyboard</label><br/>
<input value="102" id="instruments_41" type="checkbox" name="instruments[]" /> <label for="instruments_41">Electric Guitar</label><br/>
<input value="103" id="instruments_42" type="checkbox" name="instruments[]" /> <label for="instruments_42">Djembe</label><br/>
<input value="104" id="instruments_43" type="checkbox" name="instruments[]" /> <label for="instruments_43">Classical Guitar</label><br/>
<input value="105" id="instruments_44" type="checkbox" name="instruments[]" /> <label for="instruments_44">Acoustic Guitar</label>	

</div>			
</div>			
							
	<hr>						
        <div class="row">
			  <h3><span class="fa-stack fa-1x">
  <i class="fa fa-circle fa-stack-2x"></i>
  <strong class="fa-stack-1x text-default" style="color:white">3</strong>
</span> Ages you can teach:<span class="required">*</span></h3></br>

			<div class="col-md-4">
		 
				<div id="ionrange_1"></div>
		   <input type="hidden" name="fromRange1" id="fromRange1">
		   <input type="hidden" name="toRange1" id="toRange1">
	  </div>
	  </div>
					  
					  
<hr>						
        <div class="row">
			  <h3><span class="fa-stack fa-1x">
  <i class="fa fa-circle fa-stack-2x"></i>
  <strong class="fa-stack-1x text-default" style="color:white">4</strong>
</span> Levels you can teach:<span class="required">*</span></h3></br>


			
			<div class="col-md-4">
		 
			<div id="ionrange_2"></div>
			<input type="hidden" name="fromRange2" id="fromRange2">
		   <input type="hidden" name="toRange2" id="toRange2">
                           
                      </div>
                      </div>
					  
					  <a name="step1" class="btn btn-primary" style="float: right;" value="step1" onclick="saveRangeSlider();">Save Your Changes</a>
					  <hr>
	 <div class="row">
			  <h3><span class="fa-stack fa-1x">
  <i class="fa fa-circle fa-stack-2x"></i>
  <strong class="fa-stack-1x text-default" style="color:white">5</strong>
</span> Styles you can teach:<span class="required">*</span></h3></br>


			
			<div class="col-md-4">
		 				  
	 <input value="1" id="styles_0" type="checkbox" name="styles[]" /> <label for="styles_0">Classical</label><br/>
<input value="2" id="styles_1" type="checkbox" name="styles[]" /> <label for="styles_1">Jazz</label><br/>
<input value="3" id="styles_2" type="checkbox" name="styles[]" /> <label for="styles_2">Pop</label><br/>
<input value="4" id="styles_3" type="checkbox" name="styles[]" /> <label for="styles_3">Rock</label><br/>
<input value="5" id="styles_4" type="checkbox" name="styles[]" /> <label for="styles_4">Blues</label><br/>
<input value="6" id="styles_5" type="checkbox" name="styles[]" /> <label for="styles_5">Folk</label><br/>
<input value="7" id="styles_6" type="checkbox" name="styles[]" /> <label for="styles_6">Country</label><br/>
<input value="8" id="styles_7" type="checkbox" name="styles[]" /> <label for="styles_7">R&B</label><br/>
<input value="9" id="styles_8" type="checkbox" name="styles[]" /> <label for="styles_8">Gospel</label><br/>
<input value="10" id="styles_9" type="checkbox" name="styles[]" /> <label for="styles_9">Musical Theater</label><br/>
</div>
<div class="col-md-4">
<input value="11" id="styles_10" type="checkbox" name="styles[]" /> <label for="styles_10">Opera</label><br/>
<input value="12" id="styles_11" type="checkbox" name="styles[]" /> <label for="styles_11">Latin</label><br/>
<input value="13" id="styles_12" type="checkbox" name="styles[]" /> <label for="styles_12">Funk</label><br/>
<input value="14" id="styles_13" type="checkbox" name="styles[]" /> <label for="styles_13">Hip Hop</label><br/>
<input value="15" id="styles_14" type="checkbox" name="styles[]" /> <label for="styles_14">Electronic</label><br/>
<input value="16" id="styles_15" type="checkbox" name="styles[]" /> <label for="styles_15">Flamenco</label><br/>
<input value="17" id="styles_16" type="checkbox" name="styles[]" /> <label for="styles_16">Salsa</label><br/>
<input value="18" id="styles_17" type="checkbox" name="styles[]" /> <label for="styles_17">Showtunes</label><br/>
<input value="19" id="styles_18" type="checkbox" name="styles[]" /> <label for="styles_18">Spirituals</label><br/>
<input value="22" id="styles_19" type="checkbox" name="styles[]" /> <label for="styles_19">Reggae</label><br/>
<input value="23" id="styles_20" type="checkbox" name="styles[]" /> <label for="styles_20">Merengue</label><br/>
<input value="24" id="styles_21" type="checkbox" name="styles[]" /> <label for="styles_21">Latin Jazz</label><br/>
</div>
<div class="col-md-4">
<input value="25" id="styles_22" type="checkbox" name="styles[]" /> <label for="styles_22">Swing</label><br/>
<input value="26" id="styles_23" type="checkbox" name="styles[]" /> <label for="styles_23">New Age</label><br/>
<input value="27" id="styles_24" type="checkbox" name="styles[]" /> <label for="styles_24">Samba</label><br/>
<input value="28" id="styles_25" type="checkbox" name="styles[]" /> <label for="styles_25">Bossa Nova</label><br/>
<input value="29" id="styles_26" type="checkbox" name="styles[]" /> <label for="styles_26">Soul</label><br/>
<input value="30" id="styles_27" type="checkbox" name="styles[]" /> <label for="styles_27">Marching Band</label><br/>
<input value="31" id="styles_28" type="checkbox" name="styles[]" /> <label for="styles_28">Punk</label><br/>
<input value="32" id="styles_29" type="checkbox" name="styles[]" /> <label for="styles_29">Mariachi</label><br/>
<input value="33" id="styles_30" type="checkbox" name="styles[]" /> <label for="styles_30">Avant-garde</label>   
</div> 				  
</div> 		
<hr>
<div class="row">
 <div class="col-md-12">
<div class="alert alert-success"><strong>You may not put any personal contact information (e.g. phone number, website, etc.) in the following sections.</strong></div>
</div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
	   <h3><span class="fa-stack fa-1x">
		<i class="fa fa-circle fa-stack-2x"></i>
		<strong class="fa-stack-1x text-default" style="color:white">6</strong>
		</span> Degrees and Education:<span class="required">*</span>

		<br><br>
			<span style="color:#a94442; font-size:12px">
				<b>Instructions:</b> Include up to five (5) degrees/certificates in list format.
			</span>

		</h3>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		   <select class="form-control" name="TeachersModeltraining" id="TeachersModeltraining" onchange="getDesc();" >
				<option value="">Select degree and education</option>
				<option value="1">Course Work</option>
				<option value="2">Professional Certificate</option>
				<option value="3">Teaching Certificate</option>
				<option value="4">Associate Degree</option>
				<option value="5">Bachelor Degree</option>
				<option value="6">Graduate Degree</option>
				<option value="7">Master Degree</option>
				<option value="8">Doctoral Degree</option>
				<option value="other">other</option>
			</select>
		</div>
	</div>
	<div class="col-md-6">
	</div>
	<div id="addDesc">
	</div>	
                                
</div>
  <hr>		
					
	    <div class="row">
			<div class="col-md-12">
			   <h3><span class="fa-stack fa-1x">
				<i class="fa fa-circle fa-stack-2x"></i>
				<strong class="fa-stack-1x text-default" style="color:white">7</strong>
				</span> Awards and Achievements:<span class="required">*</span><br><br>
				<span style="color:#a94442; font-size:12px">
				   <b>Instructions:</b> Highlight up to five (5) awards in list format.
				</span></h3>
			</div>
			<div class="col-md-6" id="TextBoxesGroup">
				<div class="form-group">
					<input type="text" name="award1" class="form-control" maxlength="100">
				</div>
				<div class="form-group">
					<input type="text" name="award2" class="form-control" maxlength="100">
				</div>
				<div class="form-group">
					<input type="text" name="award2" class="form-control" maxlength="100">
				</div>
				<div class="form-group">
					<input type="text" name="award2" class="form-control" maxlength="100">
				</div>
				<div class="form-group" id="TextBoxDiv1">
					<input type="text" name="award3" class="form-control" maxlength="100">
				</div>
			</div>
			<!-- <div class="col-md-2">
				<div class="form-group">
					<button class="btn btn-primary" id="addButton" ><strong>Add More</strong></button>
				</div>
				<div class="form-group">
					<button class="btn btn-primary" id="removeButton" ><strong>Remove Text Box</strong></button>
				</div>
			</div>
			<div class="col-md-4">
			</div> -->
			<!--<div class="col-md-12">		  
				<p id="addAcheiveDesc"> 					
				</p>
			</div> -->

		</div>
	
    <!------------------Custom html by v ---------------------------------->
	    <hr><br>
		<div class="row">
			<div class="col-md-12">

			<div class="each_catagory">

				<span class="fa-stack fa-1x">
				<i class="fa fa-circle fa-stack-2x"></i>
				<strong class="fa-stack-1x text-default" style="color:white">8</strong>
				</span>
				Where you can teach: *
				<br>

				<p class="each_details">
				<span class="each_location">
				<strong>In student's homes: </strong> <input value="yes" onclick="$(&quot;#tmap&quot;).show();google.maps.event.trigger($(&quot;#main-map&quot;)[0], &quot;resize&quot;);" checked="checked" name="teachesHome" id="teachesHome" type="radio"> Yes
				<input value="no" onclick="$(&quot;#tmap&quot;).hide();" name="teachesHome" id="teachesHome" type="radio"> No
				</span>
				</p>
				<p class="each_details">	
				<span class="each_location">  
                 				
				<strong>In my own studio:</strong>  <input value="yes"  name="teachesStudio" id="teachesStudio" type="radio"> Yes  <input value="no"  checked="checked" name="teachesStudio" id="teachesStudio" type="radio">  No 
				</span>
				</p>
				<p class="each_details">	
				<span class="each_location">
				<input id="online_lessons" name="online_lessons" value="1" checked="" onclick="disable_online()" type="checkbox"><label class="online_label" for="online_lessons"> &nbsp;&nbsp;<strong id="strtag">Online lessons</strong>&nbsp;</label>
				</span>
				</p>                   
			</div>


			</div>

		</div>
		<hr>
		<br>
		<!--------------------section Map----------------->
		
	<div id="tmap" class="each_catagory" style="display: block;">
			<span class="fa-stack fa-1x">
			<i class="fa fa-circle fa-stack-2x"></i>
			<strong class="fa-stack-1x text-default" style="color:white">9</strong>
			</span>
			Teritory Locations Map:
	<span style="color:#a94442; font-size:12px">
                               <a href="javascript:void(0)"><b> Watch how it's done </b>
							   </a>
                            </span>

      
    <div class="each_details">
        <span style="color:#a94442; font-size:12px">Instructions: Place multiple pins to define the areas you are willing to travel to for home lessons.</span>
        <ul class="list-unstyled">

            <li>1. Click on the map to drop separate pins along your travel boundaries. </li>
            <li>2. Then click on the first pin you dropped and the area will be defined. </li>
            <li>3. Right click or use Reset button to remove territory. You can also click on trash icon on the territory.</li>
            <li>4. Click on territory to update your availability days. </li>
        </ul>

        <div class="lock-box">
		
		<div style="position:relative;  height:500px;">
			<div id='myMap' style="position:relative; "></div>
			<input class="" type="button" id="drawPolygon" value="Draw Polygon" onclick="DrawPolygon()" style="position:absolute;left:10px;top:10px; border-radius: 5px;padding: 4px 12px;" />
		</div>
		<br>
        <div id="territory-availability0" style="display:block;background-color:#7FFF00;height:60px" class="polygonblock">
		  
            <div>What day of the week are you in this area?</div>
            <div style="float:left;margin-top:3px">
                <input id="day01" name="day0[]" value="1" type="checkbox"> Sunday
                <input id="day02" name="day0[]" value="2" type="checkbox"> Monday
                <input id="day03" name="day0[]" value="3" type="checkbox"> Tuesday
                <input id="day04" name="day0[]" value="4" checked="" type="checkbox"> Wednesday
                <input id="day05" name="day0[]" value="5" checked="" type="checkbox"> Thursday
                <input id="day06" name="day0[]" value="6" type="checkbox"> Friday
                <input id="day07" name="day0[]" value="7" type="checkbox"> Saturday
                <input name="path0" value="(40.760221686628135, -74.00064468383789)(40.74799824533301, -74.00751113891602)(40.730829619377616, -74.00888442993164)(40.704808107004034, -74.01437759399414)(40.704027304487816, -74.00304794311523)(40.72874827270402, -73.97180557250977)(40.75085925217422, -73.96699905395508)"
                    id="tpath0" type="hidden">
                <input name="id0" value="1199" id="id0" type="hidden">
                <input name="delid0" value="" id="delid0" type="hidden">
            </div>

            <div style="float:right;margin-right:10px">
                <button type="button" class="btn btn-default btn-sm" style="margin-left:5px" onclick="delpoly(delid0)">
																<span class="glyphicon glyphicon-trash"></span> 
															</button>
            </div>
        </div>
		
        <br>

		
		
		
		
        <span id="spnMsg"></span>
        <button class="submit_btn" id="reset-lines" type="button" style="display:none">Reset</button>
        <input id="showData" name="polygon" value="" type="hidden">
        <input id="dayAvailable" name="dayAvailable" value="" type="hidden">
        <input name="numpolygon" value="2" type="hidden">
        <div class="error"></div>
        </div>
        </div>
        </div>
		<hr>
		</br>
		<div class="row">
		
			<div class="col-md-12">
			   <h3><span class="fa-stack fa-1x">
				<i class="fa fa-circle fa-stack-2x"></i>
				<strong class="fa-stack-1x text-default" style="color:white">10</strong>
				</span> Photo Gallery:<span class="required">*</span><br>
				</h3>
			</div>
			<div class="col-md-12">
				<div class="each_catagory">
				<p class="each_details">
					<strong>Select Image </strong> <input type="file" name="pic"> 
					Required file types are: <span class="required">*.jpg, *.gif, *.png, *.jpeg</span>
					
				</p>
				</div>
			</div>

		</div>
		<hr>
		</br>
		<div class="row">
			<div class="col-md-12">
			   <h3><span class="fa-stack fa-1x">
				<i class="fa fa-circle fa-stack-2x"></i>
				<strong class="fa-stack-1x text-default" style="color:white">11</strong>
				</span> Upload A Welcome Video <span class="required">*</span><br>
				</h3>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<strong>Select video type:  </strong>
				   <select class="form-control" name="TeachersModeldegrees" id="TeachersModeldegrees" onchange="getAchievementsDesc();">
						<option value="0">You Tube Video</option>
						<option value="1">Upload file</option>

					</select>
				</div>
				<div class="form-group">
					<strong>Insert your youtube link:  </strong>
				   <input type="text" class="form-control" name="link" >
				</div>
				<div class="form-group">
					<div id="js-video-preview" class="vid-img-icon" style="margin-top: 10px;">
						<a class="vid-icon vid-pop-show12" href="javascript:void(0)" title="SampleVideo_1280x720_10mb.mp4">
						<a id="removeVideo" class="vid-rem-icon" href="javascript:void(0)">Remove</a>
					</div>
				</div>
			</div>
			<div class="col-md-6">
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<strong>Note: Please click on "SAVE YOUR CHANGES" after you have selected video. Please play your video after it is uploaded to make sure it was successful.</br>
					Note: Please enter full YouTube link only e.g. https://www.youtube.com... </strong>
				</div>
			</div>
		</div>
		<hr>
		</br>
		<div class="row">
			<div class="col-md-12">
			   <h3><span class="fa-stack fa-1x">
				<i class="fa fa-circle fa-stack-2x"></i>
				<strong class="fa-stack-1x text-default" style="color:white">12</strong>
				</span> Upload A Performance Or Lesson Video: <span class="required">*</span><br>
				</h3>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<strong>Select video type:  </strong>
				   <select class="form-control" name="TeachersModeldegrees" id="TeachersModeldegrees" onchange="getAchievementsDesc();">
						<option value="0">You Tube Video</option>
						<option value="1">Upload file</option>
					</select>
				</div>
				<div class="form-group">
					<strong>Insert your youtube link:  </strong>
				   <input type="text" class="form-control" name="link" >
				</div>
			
			</div>
			<div class="col-md-6">
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<strong>Note: Please click on "SAVE YOUR CHANGES" after you have selected video. Please play your video after it is uploaded to make sure it was successful.</br>
					Note: Please enter full YouTube link only e.g. https://www.youtube.com... </strong>
				</div>
			</div>
		</div>
		<hr>
		</br>
		<div class="row">
			<div class="col-md-12">
			   <h3><span class="fa-stack fa-1x">
				<i class="fa fa-circle fa-stack-2x"></i>
				<strong class="fa-stack-1x text-default" style="color:white">13</strong>
				</span> About Me:<span class="required">*</span><br><br>
				<span style="color:#a94442; font-size:12px">
				   <b>Instructions:</b> Do NOT copy/paste from your resume or another website. In the first person (use "I"), Write 5 to 7 sentences focusing on your musical background, education, and teaching studio.
				</span></h3>
			</div>
			<div class="col-md-12">
				<div class="form-group">
				<strong>Example: </strong> I'm a passionate and motivated instructor who loves working with students and sharing my love of music.  In 2007, I graduated from Indiana University with a Bachelor of Arts degree in Piano Performance.  Performing all over the world has been one of the greater experiences of my life as a musician, and I've had the opportunity to play both at the Avery Fischer Hall in New York, as well as touring the United Kingdom as several performances as the principle pianist with the Brighton Philharmonic Orchestra.
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
				   <textarea name="esd" rows="4" cols="110" class="form-control" >38. Kartikeya 5 days ago Edit Attach Delete Link We have extracted zip code from provided XLS and updated our local db now there are only 171 record where zip is missing. Please find attached export of our local table for your reference,. Please confirm if it is fine to update the data on live database,. In some rows we noticed more than one zip so we took the first zip code. CitiesFilterSmall_April_22.xls Scott’s freab- “Scott”</textarea>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
				<span style="color:red">A minimum of 500 characters is required.</span>
				</div>
			</div>
		</div>
		
		<hr>
		</br>
		<div class="row">
			<div class="col-md-12">
			   <h3><span class="fa-stack fa-1x">
				<i class="fa fa-circle fa-stack-2x"></i>
				<strong class="fa-stack-1x text-default" style="color:white">14</strong>
				</span> My Experience:<span class="required">*</span><br><br>
				<span style="color:#a94442; font-size:12px">
				   <b>Instructions:</b> Write 5 to 7 sentences focusing on your teaching experience and love of teaching.
				</span></h3>
			</div>
			<div class="col-md-12">
				<div class="form-group">
				<strong>Example: </strong> My teaching experience dates back to my college days, as I began teaching private lessons part time 8 years ago, and have been consistently teaching students in my home studio for the last 5 years.  Encouraging regular practice on a consistent schedule is one of the key points I like to emphasize for younger students, as it tends to help the student progress and gain a passion for the instrument.  I've also found that a combination of classical and modern music can go a long way in helping students enjoy the piano and motivate them to practice and continue to learn.  If a student isn't having fun in their lessons, then I'm not doing my job!  My students are encouraged to enter competitions and recitals, as well as work on composing their own original material, so they can feel good about their accomplishments and stay motivated to learn.  I'm always looking to bring on new students of all ages!
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
				   <textarea name="esd" rows="4" cols="110" class="form-control" >38. Kartikeya 5 days ago Edit Attach Delete Link We have extracted zip code from provided XLS and updated our local db now there are only 171 record where zip is missing. Please find attached export of our local table for your reference,. Please confirm if it is fine to update the data on live database,. In some rows we noticed more than one zip so we took the first zip code. CitiesFilterSmall_April_22.xls Scott’s freab- “Scott”</textarea>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
				<span style="color:red">A minimum of 500 characters is required.</span>
				</div>
			</div>
		</div>
		<hr>
		</br>
		<div class="row">
			<div class="col-md-12">
			   <h3><span class="fa-stack fa-1x">
				<i class="fa fa-circle fa-stack-2x"></i>
				<strong class="fa-stack-1x text-default" style="color:white">15</strong>
				</span> My Methods:<span class="required">*</span><br><br>
				<span style="color:#a94442; font-size:12px">
				   <b>Instructions:</b> Please write 4 to 5 sentences about any methods, practices, or philosophies you use when teaching. If you create your own custom lesson plans or materials, be sure to note this too.
				</span></h3>
			</div>
			<div class="col-md-12">
				<div class="form-group">
				<strong>Example: </strong> For beginning students who are children, I typically start with Hal Leonard's Essential Elements.  Once the student has progressed to have a grasp of the fundamentals, I will begin to introduce solo repertoire appropriate for their first recital performance.  For adults,  I try to find out what the student is interested in, and guide my instruction accordingly to keep the lessons engaging and fun, no matter their ability level.
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
				   <textarea name="esd" rows="4" cols="110" class="form-control" >38. Kartikeya 5 days ago Edit Attach Delete Link We have extracted zip code from provided XLS and updated our local db now there are only 171 record where zip is missing. Please find attached export of our local table for your reference,. Please confirm if it is fine to update the data on live database,. In some rows we noticed more than one zip so we took the first zip code. CitiesFilterSmall_April_22.xls Scott’s freab- “Scott”</textarea>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
				<span style="color:green">You have entered the minimum characters required; however you can add more if you like.</span>
				</div>
			</div>
		</div>
		<hr>
		</br>
		<div class="row">
			<div class="col-md-12">
			   <h3><span class="fa-stack fa-1x">
				<i class="fa fa-circle fa-stack-2x"></i>
				<strong class="fa-stack-1x text-default" style="color:white">16</strong>
				</span> My Teaching Style:<span class="required">*</span><br><br>
				<span style="color:#a94442; font-size:12px">
				   <b>Instructions:</b> Please write 4 to 5 sentences explaining how you approach teaching. Make sure to convey your love of teaching!
				</span></h3>
			</div>
			<div class="col-md-12">
				<div class="form-group">
				<strong>Example: </strong> Nothing is more rewarding than seeing one of my students develop a passion for music!  Therefore, it's important that each student progresses at his or her own pace.  I encourage this by setting realistic goals for my students at each lesson. Acknowledging accomplishments helps fuel a students desire to progress, and makes students eager to learn more.  By trying to find out what inspires the student, I can successfully tailor my instruction to their wants and needs..
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
				   <textarea name="esd" rows="4" cols="110" class="form-control" >38. Kartikeya 5 days ago Edit Attach Delete Link We have extracted zip code from provided XLS and updated our local db now there are only 171 record where zip is missing. Please find attached export of our local table for your reference,. Please confirm if it is fine to update the data on live database,. In some rows we noticed more than one zip so we took the first zip code. CitiesFilterSmall_April_22.xls Scott’s freab- “Scott”</textarea>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
				<span style="color:green">You have entered the minimum characters required; however you can add more if you like.</span>
				</div>
			</div>
		</div>
		<hr>
		</br>
		<div class="row">
			<div class="col-md-12">
			   <h3><span class="fa-stack fa-1x">
				<i class="fa fa-circle fa-stack-2x"></i>
				<strong class="fa-stack-1x text-default" style="color:white">17</strong>
				</span> Teacher Spotlight Question:<span class="required">*</span><br><br>
				<span style="color:#a94442; font-size:12px">
				   Answer any of these questions and they will be added to a group that will be featured on our landing pages, home page and social media pages. This will greatly increase the chances students view your profile and request you as a teacher. 
				</span></h3></br>
			</div>
			<div class="col-md-12">
				<div class="form-group">
				<strong>What advice do you have about practicing effectively? </strong> </br>
				<span  style="color:#00aeef;cursor:pointer" onclick="$('#each_details_1').toggle();" >Edit</span>
				   <div id="each_details_1" class="each_details" style="display: none;"><textarea name="esd" rows="5" cols="110" class="form-control">My ideal practice session starts out with slower stretch exercises to loosen up my fingers, hands, wrists and arms (the older I get the more this becomes a priority for my guitar playing). Once warmed-up I typically "noodle" for a bit to help me "connect" with whichever guitar/pedals/amp I'm playing that day. Next I will oftentimes work on familiar material (sometimes my band's songs) before working on anything that is more technically or mentally challenging. I constantly rotate exercises or routines from day to day as I tend to get bored easily. That being said I do try to revisit (in subsequent practices) anything that proves to be challenging as I am always pushing myself to be a better musician.</textarea></div>
				</div>
				<div class="form-group">
				<strong>How do I know if my child is ready to start lessons? </strong> </br>
				<span  style="color:#00aeef;cursor:pointer" onclick="$('#each_details_2').toggle();"  >Edit</span>
					<div id="each_details_2" class="each_details" style="display: none;"><textarea name="esd" rows="5" cols="110" class="form-control">My ideal practice session starts out with slower stretch exercises to loosen up my fingers, hands,</textarea></div>
				</div>
				<div class="form-group">
				<strong>When will I start to see results? </strong> </br>
				<span  style="color:#00aeef;cursor:pointer" onclick="$('#each_details_3').toggle();" >Answer this question. </span>
					<div id="each_details_3" class="each_details" style="display: none;"><textarea name="esd" rows="5" cols="110" class="form-control"></textarea></div>
				</div>
				<div class="form-group">
				<strong>Did you have a teacher that inspired you to go into music? How did they inspire you? </strong> </br>
				<span  style="color:#00aeef;cursor:pointer" onclick="$('#each_details_4').toggle();" >Edit</span>
					<div id="each_details_4" class="each_details" style="display: none;"><textarea name="esd" rows="5" cols="110" class="form-control">test</textarea></div>
				</div>
				<div class="form-group">
				<strong>Why did you choose your primary instrument?</strong> </br>
				<span  style="color:#00aeef;cursor:pointer" onclick="$('#each_details_5').toggle();" >Answer this question.</span>
					<div id="each_details_5" class="each_details" style="display: none;"> <textarea name="esd" rows="5" cols="110" class="form-control"></textarea></div>
				</div>
				<div class="form-group">
				<strong>What musical accomplishments are you most proud of? </strong> </br>
				<span  style="color:#00aeef;cursor:pointer" onclick="$('#each_details_6').toggle();">Answer this question.</span>
					<div id="each_details_6" class="each_details" style="display: none;"> <textarea name="esd" rows="5" cols="110" class="form-control"></textarea></div>
				</div>
				<div class="form-group">
				<strong>Have any of your students won awards or been selected for special honors? How have they succeeded? </strong> </br>
				<span  style="color:#00aeef;cursor:pointer" onclick="$('#each_details_7').toggle();">Answer this question.</span>
					<div id="each_details_7" class="each_details" style="display: none;"> <textarea name="esd" rows="5" cols="110" class="form-control"></textarea></div>
				</div>
				<div class="form-group">
				<strong>What do you think is the hardest thing to master on your instrument? </strong> </br>
				<span  style="color:#00aeef;cursor:pointer" onclick="$('#each_details_8').toggle();" >Answer this question.</span>
					<div id="each_details_8" class="each_details" style="display: none;"> <textarea name="esd" rows="5" cols="110" class="form-control"></textarea></div>
				</div>
				<div class="form-group">
				<strong>Do you use specific teaching methods or books? (Ex: Alfred, Bastion, Suzuki, Hal Leonard) Why did you choose them if you did?</strong> </br>
				<span  style="color:#00aeef;cursor:pointer" onclick="$('#each_details_9').toggle();">Answer this question.</span>
					<div id="each_details_9" class="each_details" style="display: none;"> <textarea name="esd" rows="5" cols="110" class="form-control"></textarea></div>
				</div>
				<div class="form-group">
				<strong>What does a normal practice session look like for you? </strong> </br>
				<span  style="color:#00aeef;cursor:pointer" onclick="$('#each_details_10').toggle();">Answer this question.</span>
					<div id="each_details_10" class="each_details" style="display: none;"> <textarea name="esd" rows="5" cols="110" class="form-control"></textarea></div>
				</div>
				<div class="form-group">
				<strong>If you have a Music Degree, what is it in (Performance, Education, Musicology, Theory, Composition, etc) and why did you choose that degree?</strong> </br>
				<span  style="color:#00aeef;cursor:pointer" onclick="$('#each_details_11').toggle();">Answer this question.</span>
					<div id="each_details_11" class="each_details" style="display: none;"> <textarea name="esd" rows="5" cols="110" class="form-control"></textarea></div>
				</div>
				<div class="form-group">
				<strong>What is your dream piece to perform and why? </strong> </br>
				<span  style="color:#00aeef;cursor:pointer" onclick="$('#each_details_12').toggle();">Answer this question.</span>
					<div id="each_details_12" class="each_details" style="display: none;"> <textarea name="esd" rows="5" cols="110" class="form-control"></textarea></div>
				</div>
				<div class="form-group">
				<strong>If you weren't a musician what do you think you'd be doing instead? </strong> </br>
				<span  style="color:#00aeef;cursor:pointer" onclick="$('#each_details_13').toggle();">Answer this question</span>
					<div id="each_details_13" class="each_details" style="display: none;"> <textarea name="esd" rows="5" cols="110" class="form-control"></textarea></div>
				</div>
				<div class="form-group">
				<strong>What is your favorite style/genre of music to play and why? </strong> </br>
				<span  style="color:#00aeef;cursor:pointer" onclick="$('#each_details_14').toggle();">Answer this question.</span>
					<div id="each_details_14" class="each_details" style="display: none;"> <textarea name="esd" rows="5" cols="110" class="form-control"></textarea></div>
				</div>
				<div class="form-group">
				<strong>If you play more than one instrument, how did you decide to start playing the second? (Or 3rd, 4th, 5th, etc)!</strong> </br>
				<span  style="color:#00aeef;cursor:pointer" onclick="$('#each_details_15').toggle();" >Answer this question.</span>
					<div id="each_details_15" class="each_details" style="display: none;"> <textarea name="esd" rows="5" cols="110" class="form-control"></textarea></div>
				</div>
				<div class="form-group">
				<strong>Does music run in your family? Tell us a little about your musical family members. </strong> </br>
				<span  style="color:#00aeef;cursor:pointer" >Answer this question.</span>
				</div>
				<div class="form-group">
				<strong>When did you decide to become a professional musician? Was it a gradual decision or was there a defining moment for you?  </strong> </br>
				<span  style="color:#00aeef;cursor:pointer" >Answer this question.</span>
				</div>
				
			</div>
		</div>
		<hr>
		</br>
		<div class="row">
			<div class="col-md-12">
			   <h3><span class="fa-stack fa-1x">
				<i class="fa fa-circle fa-stack-2x"></i>
				<strong class="fa-stack-1x text-default" style="color:white">18</strong>
				</span> Teacher Schedule:<span class="required">*</span><br><br>
				</h3>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-1"><strong>Sun </strong></div>
			<div class="col-md-1"><strong>Mon </strong></div>
			<div class="col-md-1"><strong>Tue </strong></div>
			<div class="col-md-1"><strong>Wed </strong></div>
			<div class="col-md-1"><strong>Thu </strong></div>
			<div class="col-md-1"><strong>Fri </strong></div>
			<div class="col-md-1"><strong>Sat </strong></div>
			<div class="col-md-4"></div>	
		</div>
		<div class="row">
			<div class="col-md-8"><strong><hr> </strong></div><div class="col-md-4"></div>
		</div>	
		<div class="row">
			<div class="col-md-1"><strong>7 AM </strong></div>
			<div class="col-md-1"><input id="G01" class="css-checkbox" type="checkbox"> Home <input id="G01" class="css-checkbox" type="checkbox"> Studio <input id="G01" class="css-checkbox" type="checkbox"> Online</div>
			<div class="col-md-1"><input id="G01" class="css-checkbox" type="checkbox"> Home <input id="G01" class="css-checkbox" type="checkbox"> Studio <input id="G01" class="css-checkbox" type="checkbox"> Online</div>
			<div class="col-md-1"><input id="G01" class="css-checkbox" type="checkbox"> Home <input id="G01" class="css-checkbox" type="checkbox"> Studio <input id="G01" class="css-checkbox" type="checkbox"> Online</div>
			<div class="col-md-1"><input id="G01" class="css-checkbox" type="checkbox"> Home <input id="G01" class="css-checkbox" type="checkbox"> Studio <input id="G01" class="css-checkbox" type="checkbox"> Online</div>
			<div class="col-md-1"><input id="G01" class="css-checkbox" type="checkbox"> Home <input id="G01" class="css-checkbox" type="checkbox"> Studio <input id="G01" class="css-checkbox" type="checkbox"> Online</div>
			<div class="col-md-1"><input id="G01" class="css-checkbox" type="checkbox"> Home <input id="G01" class="css-checkbox" type="checkbox"> Studio <input id="G01" class="css-checkbox" type="checkbox"> Online</div>
			<div class="col-md-1"><input id="G01" class="css-checkbox" type="checkbox"> Home <input id="G01" class="css-checkbox" type="checkbox"> Studio <input id="G01" class="css-checkbox" type="checkbox"> Online</div>
			<div class="col-md-4"></div>	
		</div>
		<div class="row">
			<div class="col-md-8"><strong><hr> </strong></div><div class="col-md-4"></div>
		</div>
		<div class="row">
			<div class="col-md-1"><strong>8 AM </strong></div>
			<div class="col-md-1"><input id="G01" class="css-checkbox" type="checkbox"> Home <input id="G01" class="css-checkbox" type="checkbox"> Studio <input id="G01" class="css-checkbox" type="checkbox"> Online</div>
			<div class="col-md-1"><input id="G01" class="css-checkbox" type="checkbox"> Home <input id="G01" class="css-checkbox" type="checkbox"> Studio <input id="G01" class="css-checkbox" type="checkbox"> Online</div>
			<div class="col-md-1"><input id="G01" class="css-checkbox" type="checkbox"> Home <input id="G01" class="css-checkbox" type="checkbox"> Studio <input id="G01" class="css-checkbox" type="checkbox"> Online</div>
			<div class="col-md-1"><input id="G01" class="css-checkbox" type="checkbox"> Home <input id="G01" class="css-checkbox" type="checkbox"> Studio <input id="G01" class="css-checkbox" type="checkbox"> Online</div>
			<div class="col-md-1"><input id="G01" class="css-checkbox" type="checkbox"> Home <input id="G01" class="css-checkbox" type="checkbox"> Studio <input id="G01" class="css-checkbox" type="checkbox"> Online</div>
			<div class="col-md-1"><input id="G01" class="css-checkbox" type="checkbox"> Home <input id="G01" class="css-checkbox" type="checkbox"> Studio <input id="G01" class="css-checkbox" type="checkbox"> Online</div>
			<div class="col-md-1"><input id="G01" class="css-checkbox" type="checkbox"> Home <input id="G01" class="css-checkbox" type="checkbox"> Studio <input id="G01" class="css-checkbox" type="checkbox"> Online</div>
			<div class="col-md-4"></div>	
		</div>
		<div class="row">
			<div class="col-md-8"><strong><hr> </strong></div><div class="col-md-4"></div>
		</div>
		<div class="row">
			<div class="col-md-1"><strong>9 AM </strong></div>
			<div class="col-md-1"><input id="G01" class="css-checkbox" type="checkbox"> Home <input id="G01" class="css-checkbox" type="checkbox"> Studio <input id="G01" class="css-checkbox" type="checkbox"> Online</div>
			<div class="col-md-1"><input id="G01" class="css-checkbox" type="checkbox"> Home <input id="G01" class="css-checkbox" type="checkbox"> Studio <input id="G01" class="css-checkbox" type="checkbox"> Online</div>
			<div class="col-md-1"><input id="G01" class="css-checkbox" type="checkbox"> Home <input id="G01" class="css-checkbox" type="checkbox"> Studio <input id="G01" class="css-checkbox" type="checkbox"> Online</div>
			<div class="col-md-1"><input id="G01" class="css-checkbox" type="checkbox"> Home <input id="G01" class="css-checkbox" type="checkbox"> Studio <input id="G01" class="css-checkbox" type="checkbox"> Online</div>
			<div class="col-md-1"><input id="G01" class="css-checkbox" type="checkbox"> Home <input id="G01" class="css-checkbox" type="checkbox"> Studio <input id="G01" class="css-checkbox" type="checkbox"> Online</div>
			<div class="col-md-1"><input id="G01" class="css-checkbox" type="checkbox"> Home <input id="G01" class="css-checkbox" type="checkbox"> Studio <input id="G01" class="css-checkbox" type="checkbox"> Online</div>
			<div class="col-md-1"><input id="G01" class="css-checkbox" type="checkbox"> Home <input id="G01" class="css-checkbox" type="checkbox"> Studio <input id="G01" class="css-checkbox" type="checkbox"> Online</div>
			<div class="col-md-4"></div>	
		</div>
		<div class="row">
			<div class="col-md-8"><strong><hr> </strong></div><div class="col-md-4"></div>
		</div>
		<div class="row">
			<div class="col-md-1"><strong>10 AM </strong></div>
			<div class="col-md-1"><input id="G01" class="css-checkbox" type="checkbox"> Home <input id="G01" class="css-checkbox" type="checkbox"> Studio <input id="G01" class="css-checkbox" type="checkbox"> Online</div>
			<div class="col-md-1"><input id="G01" class="css-checkbox" type="checkbox"> Home <input id="G01" class="css-checkbox" type="checkbox"> Studio <input id="G01" class="css-checkbox" type="checkbox"> Online</div>
			<div class="col-md-1"><input id="G01" class="css-checkbox" type="checkbox"> Home <input id="G01" class="css-checkbox" type="checkbox"> Studio <input id="G01" class="css-checkbox" type="checkbox"> Online</div>
			<div class="col-md-1"><input id="G01" class="css-checkbox" type="checkbox"> Home <input id="G01" class="css-checkbox" type="checkbox"> Studio <input id="G01" class="css-checkbox" type="checkbox"> Online</div>
			<div class="col-md-1"><input id="G01" class="css-checkbox" type="checkbox"> Home <input id="G01" class="css-checkbox" type="checkbox"> Studio <input id="G01" class="css-checkbox" type="checkbox"> Online</div>
			<div class="col-md-1"><input id="G01" class="css-checkbox" type="checkbox"> Home <input id="G01" class="css-checkbox" type="checkbox"> Studio <input id="G01" class="css-checkbox" type="checkbox"> Online</div>
			<div class="col-md-1"><input id="G01" class="css-checkbox" type="checkbox"> Home <input id="G01" class="css-checkbox" type="checkbox"> Studio <input id="G01" class="css-checkbox" type="checkbox"> Online</div>
			<div class="col-md-4"></div>	
		</div>
		<hr>
		<div class="row">
			<div class="savebutton">
				<button id="save-teacher" class="submit_btn" type="button">SAVE YOUR CHANGES</button>
			</div>
		</div>
		<!----------------------------------------------->
                              
<!---------------------------------------------------------------------->

   
   </div>

</div>
</div>
</div>
</div>

@section('scripts')

  <script src="{{ asset('js/plugins/nouslider/jquery.nouislider.min.js')}}"></script>
 <script src="{{asset('js/plugins/ionRangeSlider/ion.rangeSlider.min.js')}}"></script>
 <script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=Aipg-wNL6BOU70PIhj7IY1iosSWzMBKnnpDqw9P8uPnbTkSetwTKg4KdFkQdj3ej' async defer></script>

<script src="{{asset('js/jquery-confirm.min.js')}}"></script>

<script type="text/javascript" src="{{asset('js/YouTubePopUp.jquery.js')}}"></script>


	<script type="text/javascript">
		$(function(){
			$("a.bla-1").YouTubePopUp();
			$("a.bla-2").YouTubePopUp( { autoplay: 0 } ); // Disable autoplay
		});
	</script>
  <script>
    var counter = 2;
    $("#addButton").click(function () {
	if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
	}   
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter).addClass("form-group");
	newTextBoxDiv.after().html('<input type="text" class="form-control" maxlength="100" name="textbox' + counter + 
	      '" id="textbox' + counter + '" value="" >');
	newTextBoxDiv.appendTo("#TextBoxesGroup");
	counter++;
     });
   $("#removeButton").click(function () {
	if(counter==1){
          $.alert({ title: 'Alert!', content: 'No more textbox to remove!',});
          return false;
       }   
        
	counter--;
			
        $("#TextBoxDiv" + counter).remove();
			
     });

/* 
$("#ionrange_1").ionRangeSlider({
    type: "double",
    min: 10,
    max: 50,
    from: 10,
	to: 20,
	type: 'double',
	step: 1,
	prettify: false,
	hasGrid: true,
	onFinish: function(data){
            var value = data.fromNumber;
			console.log(value);
            $("#SomeValue").val(value);
        }
});  */
	
  $("#ionrange_1").ionRangeSlider({
            min: 3,
            max: 80,
            type: 'double',
             maxPostfix: "+",
            prettify: false,
            hasGrid: true,
			onFinish: function(data){
				//var value = data.fromNumber;
				$("#fromRange1").val(data.fromNumber);
				$("#toRange1").val(data.toNumber);
			}
        });
		
$("#ionrange_2").ionRangeSlider({
            values: [
                "beginner", "Intermediat", "advanced"
             
            ],
            type: 'double',
            hasGrid: true,
			onFinish: function(data){
				//var value = data.fromNumber;
				$("#fromRange2").val(data.fromNumber);
				$("#toRange2").val(data.toNumber);
			}
        });

function saveRangeSlider(){
		var fromRange1 = $("#fromRange1").val();
		var toRange1 = $("#toRange1").val();
		var fromRange2 = $("#fromRange2").val();
		var toRange2 = $("#toRange2").val();
		console.log(fromRange1+' '+toRange1+' '+fromRange2+' '+toRange2);
		
		/* var csrf_token = $("input[name=_token]").val();
		$.ajax({
			url: "<?php echo url('/updateRangeSlider') ?>",
			data: {
				fromRange1:fromRange1,
				toRange1:toRange1,
				fromRange2:fromRange2,
				toRange2:toRange2,
				_token: csrf_token
			},
			type: 'POST',
			dataType: 'json',
			success: function(response){
				if(response.status=='true')
				{
					$.alert({ title: 'Alert!', content: 'Polygon Delete Successfully!',});
				}
				
			},
			error: function(e){
				console.log(e.responseText);
			}
		}); */
		
		return false;
	}		
		</script>
		
		
		<script>
		function getDesc()
		{	
			var teachersModeltraining = $("#TeachersModeltraining").val();
			//alert(teachersModeltraining);
			if(teachersModeltraining==1)
			{
				htmlDesc = '<div class="col-md-12">	<div class="col-md-6" style="padding-left: 0px; !important"><div class="form-group"><input type="text" name="award1" class="form-control" maxlength="100"></div></div>	</div>	<div class="col-md-12">	<p style="margin: 2px 14px 10px 0px; !important">  Coursework is work performed by students or trainees for the purpose of learning. Coursework may be specified and assigned by teachers, or by learning guides in self-taught courses</p></div>';
			}
			else if(teachersModeltraining=='other')
			{
				htmlDesc = '<div class="col-md-12"><textarea name="othertTeachersModeltraining" id="othertTeachersModeltraining" class="form-control" rows="2" cols="50" > </textarea></div>';
			}
			else
			{
				htmlDesc = '<div class="col-md-12">	<div class="col-md-6" style="padding-left: 0px; !important"><div class="form-group"><input type="text" name="award1" class="form-control" maxlength="100"></div></div>	</div>	<div class="col-md-12">	<p style="margin: 2px 14px 10px 0px; !important">  Coursework is work performed by students or trainees for the purpose of learning. Coursework may be specified and assigned by teachers, or by learning guides in self-taught courses</p></div>';
			}
			$("#addDesc").html(htmlDesc);
			return false;
		}
		function getAchievementsDesc()
		{	
			var TeachersModeldegrees = $("#TeachersModeldegrees").val();
			//alert(teachersModeltraining);
			if(TeachersModeldegrees=='other')
			{
				htmlDesc = '<textarea name="othertTeachersModeltraining" id="othertTeachersModeltraining" class="form-control" rows="2" cols="50" > </textarea>';
			}
			else
			{
				htmlDesc = "Each year, the Academy of Management recognizes four outstanding individuals, who have made significant contributions to the field of management through their service, research, innovative teaching methods, breakthrough developments, and more over the course of their career.";
			}
			$("#addAcheiveDesc").html(htmlDesc);
			return false;
		}
		
		</script>

<script type="text/javascript">
			
	var map, isDrawing, polygon, lastMousePoint, eventIds = [];
	var defaultColor = 'blue';
	var hoverColor = 'red';
	var mouseDownColor = 'purple';
	//var infoboxTemplate = '<div class="customInfobox"><div class="title">{title}</div>{description}</div>';
	var infoboxTemplate = '<div class="customInfobox">{description}</div>';
	var infobox, tooltip;
    var tooltipTemplate = '<div style="height:20px;color:red; text-align:center"><b>{title}</b></div>';
      function GetMap()
      {
		var lat = <?php echo $latlon['lat']; ?>  
		var lng = <?php echo $latlon['lng']; ?>  
		map = new Microsoft.Maps.Map('#myMap', {});
		
		//  var polygon = Microsoft.Maps.TestDataGenerator.getPolygons(1, map.getBounds());
		var center = map.getCenter();
        //Define a title and description for the infobox.
        var title = 'Edit';
        var description = '<a href="javascript:closeInfobox()" ><img src="https://teachers.musikalessons.com/img/icons8-trash-30.png" align="left" style="margin-right:5px;"/></a>';
        //Some HTML to add a close button to the infobox.
        var closeButton = '<a href="javascript:closeInfobox()" class="customInfoboxCloseButton">X</a>';
       
		
        //Create array of locations to form a ring.
		
		var arrLatLong = [{latitude:"38.502569856264735", longitude:"-121.49393774785001"}, {latitude:"38.503644558651935", longitude:"-121.49393774785001"}, {latitude:"38.503644558651935", longitude:"-121.48569800175626"}, {latitude:"38.503644558651935", longitude:"-121.47745825566251"}, {latitude:"38.503644558651935", longitude:"-121.46921850956876"}, {latitude:"38.503644558651935", longitude:"-121.46097876347501"}, {latitude:"38.49827088635385", longitude:"-121.46235205449064"}, {latitude:"38.49289681316097", longitude:"-121.46509863652189"}, {latitude:"38.48644739617284", longitude:"-121.46647192753751"}, {latitude:"38.4810724410726", longitude:"-121.46921850956876"}, {latitude:"38.4756970851332", longitude:"-121.47059180058439"}, {latitude:"38.47032132837209", longitude:"-121.47333838261564"}, {latitude:"38.502569856264735", longitude:"-121.49393774785001"}];
		//console.log(arrLatLong);
		
		var locations = [];
		for (i = 0; i < arrLatLong.length; i++) { 
			var latitude = arrLatLong[i]['latitude'];
			var longitude = arrLatLong[i]['longitude'];
			locations[i] = new Microsoft.Maps.Location(latitude, longitude);
		}
		//console.log(locations);
        // var exteriorRing = [
            // new Microsoft.Maps.Location(28.69742562706177, 77.28520202636714),
            // new Microsoft.Maps.Location(28.69742562706177, 77.28726196289058),
            // new Microsoft.Maps.Location(28.69742562706177, 77.29275512695308),
            // new Microsoft.Maps.Location(28.696221013553405, 77.30236816406246),
            // new Microsoft.Maps.Location(28.696221013553405, 77.31404113769527),
            // new Microsoft.Maps.Location(28.69561870160026, 77.31953430175777),
            // new Microsoft.Maps.Location(28.692607089847144, 77.32159423828121),
            // new Microsoft.Maps.Location(28.689595391452478, 77.31884765624996),
            // new Microsoft.Maps.Location(28.68477649382112, 77.3154144287109),
            // new Microsoft.Maps.Location(28.67634288936202, 77.30580139160152),
            // new Microsoft.Maps.Location(28.69742562706177, 77.28520202636714)
        // ];
		
		
		 var exteriorRing = locations;
		
		
		//console.log(exteriorRing);
        //Create a polygon
        var polygon = new Microsoft.Maps.Polygon(exteriorRing, {
            fillColor: 'rgba(0, 255, 0, 0.5)',
            strokeColor: 'red',
            strokeThickness: 2
        });
		
		
		
            var loc = new Microsoft.Maps.Location(lat, lng);
            //Add a pushpin at the user's location.
            var pin = new Microsoft.Maps.Pushpin(loc);
         
		map.entities.push(polygon);
		map.entities.push(pin);
		    //Center the map on the user's location.
		map.setView({ center: loc });
		 
		 //Pass the title and description into the template and pass it into the infobox as an option.
		 //console.log(loc);
		 var polyFirstLocation = new Microsoft.Maps.Location(arrLatLong[0]['latitude'], arrLatLong[0]['longitude']);
		
		infobox = new Microsoft.Maps.Infobox(polyFirstLocation, {
            title: 'Click to edit',
			visible: false
        });
        //Assign the infobox to a map instance.
        infobox.setMap(map);
		
	
		tooltip = new Microsoft.Maps.Infobox(polygon.getLocations(), {
			visible: false,
			showPointer: false,
			showCloseButton: false,
			offset: new Microsoft.Maps.Point(-75, 10)
		});
		tooltip.setMap(map);		
		
		var centroid;
		Microsoft.Maps.loadModule('Microsoft.Maps.SpatialMath', function () {
			/* var polygon = Microsoft.Maps.TestDataGenerator.getPolygons(1, map.getBounds(), null, 0.5, null, true);
			map.entities.push(polygon); */
			centroid = new Microsoft.Maps.Pushpin(Microsoft.Maps.SpatialMath.Geometry.centroid(polygon), { icon: 'https://teachers.musikalessons.com/img/basket-20.png' });
			map.entities.push(centroid);
			
			Microsoft.Maps.Events.addHandler(centroid, 'click', function () {
				$.confirm({
					title: 'Confirm!',
					content: 'Are you sure you want to delete the Area',
					buttons: {
						formSubmit: {
							text: 'Submit',
							btnClass: 'btn-blue',
							action: function () {
								map.entities.remove(centroid);
								map.entities.remove(polygon);
							}
						},
						cancel: function () {
							 //map.entities.remove(polygon);
						},
					}
				});	
			});
		
		});
        Microsoft.Maps.Events.addHandler(polygon, 'mouseover', function () {
		
			infobox.setOptions({
                /* location: polygon.getLocations(),
                htmlContent: tooltipTemplate.replace('{title}', 'Click to edit'), */
                visible: true
            });
		});
		Microsoft.Maps.Events.addHandler(polygon, 'mouseout', closeInfobox);
		
		/* Microsoft.Maps.Events.addHandler(pin, 'mouseover', function (e) {
            e.target.setOptions({ color: hoverColor });
        }); 
		polygon.getLocations()
        Microsoft.Maps.Events.addHandler(pin, 'mousedown', function (e) {
            e.target.setOptions({ color: mouseDownColor });
        });

        Microsoft.Maps.Events.addHandler(pin, 'mouseout', function (e) {
            e.target.setOptions({ color: defaultColor });
        });	*/
			
		
		Microsoft.Maps.Events.addHandler(polygon, 'click', function () {
            //Remove the polygon from the map as the drawing tools will display it in the drawing layer.
				$.confirm({
					title: 'What day of the week are you in this area?',
					content: '' +
					'<form action="" class="formName">' +
					'<div class="form-group">' +
					'<input id="day11" class="weekday1" name="day1[]" value="1"  type="checkbox" checked > Sun &nbsp;<input id="day12" class="weekday1" name="day1[]" value="2" type="checkbox" checked> Mon &nbsp;<input class="weekday1" id="day13" name="day1[]" value="3" type="checkbox"> Tues &nbsp; <input id="day14" class="weekday1" name="day1[]" value="4" type="checkbox"> Wed &nbsp;<input class="weekday1" id="day15" name="day1[]" value="5"  type="checkbox"> Thurs &nbsp;<input class="weekday1" id="day16" name="day1[]" value="6"  type="checkbox"> Fri &nbsp;<input class="weekday1" id="day17" name="day1[]" value="7" type="checkbox"> Sat' +
					'</div>' +
					'</form>',
					buttons: {
						formSubmit: {
							text: 'Submit',
							btnClass: 'btn-blue',
							action: function () {
								var final1 = [];
								$('.weekday1:checked').each(function(){        
									var values = $(this).val();
									//final1 += values;
									 final1.push(values);
								});
								if(final1=='')
								{
									$.alert({ title: 'Alert!', content: 'Please select at least one checkbox!',});
									return false;
								}
								
								var csrf_token = $("input[name=_token]").val();
								$.ajax({
									url: "<?php echo url('/TeritoryLocations') ?>",
									data: {
										type: 'new',
										mapLocations:arr,
										weekdays:final1,
										_token: csrf_token
									},
									type: 'POST',
									dataType: 'json',
									success: function(response){
										//console.log(response);
										
									},
									error: function(e){
										console.log(e.responseText);
									}
								}); 
							}
						},
						cancel: function () {
							
							 //map.entities.remove(polygon);
						},
					}
				});	
           // tools.edit(polygon);
        });
		
    }

	function closeTooltip() {
        //Close the tooltip and clear its content.
        tooltip.setOptions({
            visible: false
        });
    }
	function closeInfobox() {
        infobox.setOptions({
            visible: false
        });
    }
	function changeCursor3(e) { 
		map.getRootElement().style.cursor = 'crosshair';
	}
	function changeDefaultCursor(e) { 
		map.getRootElement().style.cursor = 'default';
	}
	function changeGrabCursor(e) { 
		map.getRootElement().style.cursor = 'grabbing';
	}
	function changeCursor2(e) { 
		map.getRootElement().style.cursor = 'pointer';
	}
	function revertCursor(e) { 
		map.getRootElement().style.cursor = 'url("https://teachers.musikalessons.com/img/icons8-pencil-40.png"), move';
	}
	
	  function DrawPolygon(){
		//Clear existing shapes
		//map.entities.clear();

		//Add mouse down event to start drawing.
		Microsoft.Maps.Events.addHandler(map, 'mouseover', changeGrabCursor);	
		if(eventIds=='')
		{
			$("#drawPolygon").addClass("click-polygon");
			eventIds.push(Microsoft.Maps.Events.addHandler(map, 'mousedown', startDrawing));
		}
		console.log(eventIds); 
	  }
	  function startDrawing(e)
	  {
		polygon = new Microsoft.Maps.Polygon([e.location, e.location], { fillColor: 'rgba(0,255,255,0.2)',strokeColor: '#00aeef',strokeThickness: 2 });
		console.log(polygon);
		map.entities.push(polygon);
		map.setOptions({ disablePanning: true, disableZooming: true });
		//Add mouse events for the rest of the mouse events.
		eventIds.push(Microsoft.Maps.Events.addHandler(map, 'mouseup', stopDrawing));
		eventIds.push(Microsoft.Maps.Events.addHandler(map, 'mousemove', mouseMoved));
   	  }
	  function mouseMoved(e)
	  {
		//If we simply add a coordinate for each mouse move we could end up with too much data.
		//We can add a check to make sure the mouse has moved a couple of pixels before capturing a new coordinate.
		//alert('fsaf');
		if (lastMousePoint)
		{
			var dx = lastMousePoint.x - e.point.x;
			var dy = lastMousePoint.y - e.point.y;
			var d = Math.sqrt(dx * dx + dy * dy);
			//I'm checking that the mouse has moved at least 5 pixels.
			//If it hasn't then I ignore the event. This significantly reduces the size of the generated polygon.
			if(d <= 5)
			{
				return;
			}
		}
		var locs = polygon.getLocations();
		//Replace last coordinate of polygon as polygon automatically close the ring.
		locs[locs.length-1] = e.location;
		polygon.setLocations(locs);
		lastMousePoint = e.point;
	  }
	  function stopDrawing(e)
	  {
		//Remove mouse events.
		alert('test');
		Microsoft.Maps.Events.addHandler(map, 'mousemove', changeDefaultCursor);
		for(var i=0;i<eventIds.length;i++){
			Microsoft.Maps.Events.removeHandler(eventIds[i]);
		}
		eventIds = [];
		//re-enable panning and zooming.
		map.setOptions({ disablePanning: false, disableZooming: false });
		//Close the polygon
		var locs = polygon.getLocations();
		console.log(locs[0]['latitude']);
		var arr = [];
		for (i = 0; i < locs.length; i++) { 
			var latitude = locs[i]['latitude'];
			var longitude = locs[i]['longitude'];
			arr.push({"latitude" : latitude,"longitude" : longitude,});
			//arr.push(locs[i]['latitude']);
		  //console.log(arr[i])
		}
		//console.log(arr);
		$.confirm({
			title: 'What day of the week are you in this area?',
			content: '' +
			'<form action="" class="formName">' +
			'<div class="form-group">' +
			'<input id="day11" class="weekday1" name="day1[]" value="1"  type="checkbox" > Sun &nbsp;<input id="day12" class="weekday1" name="day1[]" value="2" type="checkbox" > Mon &nbsp;<input class="weekday1" id="day13" name="day1[]" value="3" type="checkbox"> Tues &nbsp; <input class="weekday1" id="day14" name="day1[]" value="4" type="checkbox"> Wed &nbsp;<input class="weekday1" id="day15" name="day1[]" value="5"  type="checkbox"> Thurs &nbsp;<input class="weekday1" id="day16" name="day1[]" value="6"  type="checkbox"> Fri &nbsp;<input class="weekday1" id="day17" name="day1[]" value="7" type="checkbox"> Sat' +
			'</div>' +
			'</form>',
			buttons: {
				formSubmit: {
					text: 'Submit',
					btnClass: 'btn-blue',
					action: function () {
						var final1 = [];
						$('.weekday1:checked').each(function(){        
							var values = $(this).val();
							//final1 += values;
							 final1.push(values);
						});
						if(final1=='')
						{
							$.alert({ title: 'Alert!', content: 'Please select at least one checkbox!',});
							return false;
						}
						
						var csrf_token = $("input[name=_token]").val();
						$.ajax({
							url: "<?php echo url('/TeritoryLocations') ?>",
							data: {
								type: 'new',
								mapLocations:arr,
								weekdays:final1,
								_token: csrf_token
							},
							type: 'POST',
							dataType: 'json',
							success: function(response){
								//console.log(response);
								
							},
							error: function(e){
								console.log(e.responseText);
							}
						}); 
					}
				},
				cancel: function () {
					
					 map.entities.remove(polygon);
				},
			}
		});	
		locs.push(locs[0]);
		polygon.setLocations(locs);
		$("#drawPolygon").removeClass("click-polygon"); 
		//Do something with the polygon locations (locs)
	  }
	/*  var arr = [
			"Hi",
			"Hello",
			"Bonjour"
		];

	// append new value to the array
	arr.push("Hola"); */

    </script>
		
@endsection
@endsection

