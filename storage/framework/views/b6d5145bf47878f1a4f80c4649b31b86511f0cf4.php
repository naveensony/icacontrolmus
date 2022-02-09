 
<?php $__env->startSection('title'); ?> Profile  <?php $__env->stopSection(); ?>
<?php $__env->startSection('link_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/jquery-confirm.min.css')); ?>">
 <link href="<?php echo e(asset('css/plugins/ionRangeSlider/ion.rangeSlider.css')); ?>" rel="stylesheet">
 <link href="<?php echo e(asset('css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css')); ?>" rel="stylesheet">
 <link href="<?php echo e(asset('css/plugins/nouslider/jquery.nouislider.css')); ?>" rel="stylesheet">
 <link href="<?php echo e(asset('css/plugins/steps/jquery.steps.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/plugins/jasny/jasny-bootstrap.min.css')); ?>" rel="stylesheet"> 
 <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/videopopup.css')); ?>" media="screen" />
 <style>
 video {
    height: auto !important;
    width: 100% !important;
}
.delete-gallery {
    background: #00aeef none repeat scroll 0 0;
    cursor: pointer;
    height: 25px;
    position: absolute;
    right: 0;
    text-align: center;
    top: 0;
    width: 25px;
}
.ibox-content p{
	line-height: 2;
    margin: 2px 14px 10px 11px;
}
.cent{
margin-top: -8px;
}
.item-list{
	 /* margin-bottom: -5px;  */
    padding: 0px 15px !important;
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
		padding-right: 3px; !important;
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
.mob-badge .badge {
    border: 1px solid #999;
    border-radius: 3px;
    margin-top: 10px;
}	
.bg-blue {
    background-color: #67c8ff;
}
.badge {
    border: 1px solid #999;;
    border-radius: 0;
    color: #000;
    font-size: 18px;
    font-weight: 400;
    line-height: 19px;
    margin-right: 1px;
    padding: 12px 20px;
    position: relative;
    text-align: center;
    text-decoration: none;
}
.bg-purpel {
    background-color: #6c116c;
}
.bg-red {
    background-color: red;
}
.bold {
    font-weight: bold;
}
.mob-badge .badge.bg-purpel {
    color: #fff !important;
}
.mob-badge .badge.bg-red {
    color: #fff !important;
}
.blue-heading-table thead th {
    background-color: #00aeef !important;
    border-bottom: medium none #fff !important;
    border-color: #fff !important;
    color: #fff;
}
.blue {
    color: #00aeef;
}
</style>
 <style>
 .modal.in .modal-dialog {
    background: #fff none repeat scroll 0 0;
    transform: translate(0px, 0px);
}
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
	background-color: #676a6c;
    border-color: #676a6c;
    color: #ffffff;
 }
 .stop-polygon
 {
	background-color: #00aeef;
    border-color: #00aeef;
    color: #ffffff;
 }
 .each_question_details {
    display: none;
}
.hide_schedule{
	display:none;
}
@media  screen and (min-width: 320px) and (max-width: 767px) {
	/*.ibox-content {
         padding: 0px 0px 0px 0px !important;
    }*/
	.wizard > .content > .body
	{
		float: left;
		/* position: absolute; */
		width: 100%;
		/* height: 95%; */
		padding: 5.5%;
	}
	/* #page-wrapper{
		 padding: 0 0px !important;
	} */
	.tabs-container .panel-body {
		padding: 0px !important; 
	}
	.input-group-addon {   padding: 6px 6px !important; }
	.form-group {
		margin-right: 5px !important;
		margin-left: 5px !important;
	}
	a.vid-rem-icon {
		top: 2px !important;
		margin-left: 50px !important;
	}
	#closer_videopopup {
		right: 4% !important;
	}
	video {
		top: 54% !important;
	}
}
@media  screen and (min-width: 768px){
	p.notice-tag {
		margin: -10px 14px 10px -12px; !important;
	}
}
.vid-img-icon {
    display: inline-block;
    margin: 0;
    padding: 5px 80px 5px 0;
    position: relative;
}
 a.vid-icon {
    background: rgba(0, 0, 0, 0) url("https://teachers.musikalessons.com/img/vid-img-icon.png") no-repeat scroll left 6px;
    color: #00aeef;
    display: inline-block;
    font-size: 14px;
    line-height: 20px;
    margin: 0;
    min-height: 35px;
    padding: 10px 0 0 50px;
}
 a.vid-rem-icon {
    /* background: rgba(0, 0, 0, 0) url("https://teachers.musikalessons.com/img/vid-remove-icon.png") no-repeat scroll 10px 5px; */
    border-left: 1px solid #ffc7c7;
    color: #ff0000;
    display: inline-block;
    font-size: 13px;
   /*  height: 24px;
    line-height: 24px; */
    margin: 0 20px;
    padding: 0 0 0 5px;
    position: absolute;
    /* right: 0;*/
    top: 12px;
}
 a.vid-icon span {
    color: #4a4a4a;
    display: block;
}
.step-button{
	background: #eee none repeat scroll 0 0;
	border-color: #aaa;
    color: #aaa;
}
.step-button:hover{
	background: #eee none repeat scroll 0 0;
    border-color: #aaa;
	color: #aaa;
}	
</style>
<style>
/* The container */
.checkbox-container {
    /* display: block;*/
    position: relative;
    padding-left: 21px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 13px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
	font-family: "open sans","Helvetica Neue",Helvetica,Arial,sans-serif;
}
/* Hide the browser's default checkbox */
.checkbox-container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}
/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 16px;
    width: 16px;
    background-color: #fff;
	border:1px solid;
}
/* On mouse-over, add a grey background color */
.checkbox-container:hover input ~ .checkmark {
    background-color: #ccc;
}
/* When the checkbox is checked, add a blue background */
.checkbox-container input:checked ~ .checkmark {
    background-color: #2196F3;
}
/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}
/* Show the checkmark when checked */
.checkbox-container input:checked ~ .checkmark:after {
    display: block;
}
/* Style the checkmark/indicator */
.checkbox-container .checkmark:after {
    left: 4px;
    top: 0px;
    width: 3px;
    height: 9px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
*::before, *::after {
	 box-sizing: unset !important;
}
#selectAllChkbx label{
	font-weight: unset !important;
}
#selectAllChkbx .col-md-1 {
    width: 10%;
}
.weeks-per .col-md-1 {
    width: 10%;
}
 .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 8px 2px !important;
 }
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
.required-text{
	color: red;
    font-size: 12px;
    padding-left: 5px;
}
.loader 
{
 position: fixed;
 left: 0px;
 top: 0px;
 width: 100%;
 height: 100%;
 z-index: 9999;
 background: url('<?php echo e(asset('img/ajax-loader2.gif')); ?>') 50% 50% no-repeat rgb(249,249,249);
}	
.fa-stack {
    height: 2.3em !important;
}

.overlay{position: absolute;left: 0; top: 0; right: 0; bottom: 0;z-index: 2;background-color: rgba(255,255,255,0.8);}
.overlay-content {
	position: absolute;
	transform: translateY(-50%);
	 -webkit-transform: translateY(-50%);
	 -ms-transform: translateY(-50%);
	top: 50%;
	left: 0;
	right: 0;
	text-align: center;
	color: #555;
}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/YouTubePopUp.css')); ?>">
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('content'); ?>
<div class="loader">
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox">
				
				<?php  
					/* if(!empty($_COOKIE['myCookie'])){ 
						echo $_COOKIE['myCookie']; 
						setcookie('myCookie', '', 1);
					}  */
				?>
				<?php if(!empty($error_msg)  ): ?>
					<script type="text/javascript">
					window.onbeforeunload = function () {
					  window.scrollTo(0, 0);
					}
					</script>		
				 <div class="ibox-content">
					<div class="alert alert-danger">
					<?php if(!empty($_COOKIE['myCookie']) && $_COOKIE['myCookie'] == 'profileUpdate'): ?>
					<b>Error: Your profile changes have been saved.</b>
					<?php setcookie('myCookie', '', 1); ?>
					<?php else: ?>
					<b>Incomplete/Error:</b>
					<?php endif; ?>
					<br/><br/>
					<ul>  <?php if(isset($error_msg['instrument']) && $error_msg['instrument']==0): ?> <li> You must select at least 1 instrument. </li> <?php endif; ?> 
					 <?php if(isset($error_msg['style']) && $error_msg['style']==0): ?> <li> You must select at least 1 style.</li> <?php endif; ?>
					 <?php if(isset($error_msg['training']) && $error_msg['training']==0): ?> <li> Degrees and Education can not be blank.</li> <?php endif; ?>
					 <?php if(isset($error_msg['avatar']) && $error_msg['avatar']==0): ?> <li>You did not upload a profile picture. A profile picture is required.</li> <?php endif; ?>
					 <?php if(isset($error_msg['aboutTeacher']) && $error_msg['aboutTeacher']==0): ?> <li>You must enter at least 500 characters in About me.</li> 
					 <?php elseif(isset($error_msg['aboutTeacher']) && $error_msg['aboutTeacher']==1): ?>
						 <li>You should enter at least 500 characters in About me</li> 
					 <?php endif; ?>
					 <?php if(isset($error_msg['experience']) && $error_msg['experience']==0): ?> <li>You must enter at least 500 characters in Experience.</li> 
					 <?php elseif(isset($error_msg['experience']) && $error_msg['experience']==1): ?>
						 <li>You should enter at least 500 characters in Experience</li> 
					 <?php endif; ?>
					 <?php if(isset($error_msg['methodsUsed']) && $error_msg['methodsUsed']==0): ?> <li>You must enter at least 500 characters in Methods.</li> 
					 <?php elseif(isset($error_msg['methodsUsed']) && $error_msg['methodsUsed']==1): ?>
						 <li>You should enter at least 500 characters in Methods</li>
					 <?php endif; ?>
					 <?php if(isset($error_msg['lessonsStyle']) && $error_msg['lessonsStyle']==0): ?> <li>You must enter at least 500 characters in Teaching style.</li> 
					 <?php elseif(isset($error_msg['lessonsStyle']) && $error_msg['lessonsStyle']==1): ?>
						 <li>You should enter at least 500 characters in Teaching style.</li>
					 <?php endif; ?>
					 <?php if(isset($error_msg['homestudios_msg1']) && $error_msg['homestudios_msg1']==0): ?> <li>Please select where you can teach.</li> <?php endif; ?>
					 <?php if(isset($error_msg['teacherSchedule']) && $error_msg['teacherSchedule']==0): ?> <li>You must select at least 1 Teacher Schedule.</li> <?php endif; ?>
					 <?php if(isset($error_msg['homeLocationMsg']) && $error_msg['homeLocationMsg']==0): ?> <li>You have selected "Yes" to teaching in home lessons. Therefore you must either 1) create at travel boundary, or 2) change your selection to "No" for teaching in home lessons.</li> <?php endif; ?>
					 <?php if(isset($error_msg['studioLocationMsg']) && $error_msg['studioLocationMsg']==0): ?> <li>You have selected "Yes" to teaching in your studio. Therefore you must either 1) mark your studio location, or 2) change your selection to "No" for teaching in your studio.</li> <?php endif; ?>
					 <?php if(isset($error_msg['teachesHomeMsg']) && $error_msg['teachesHomeMsg']==0): ?> <li>Please select "Yes" or "No" for teaching in home lessons.</li> <?php endif; ?>
					 <?php if(isset($error_msg['teachesStudioMsg']) && $error_msg['teachesStudioMsg']==0): ?> <li>Please select "Yes" or "No" for teaching in your studio.</li> <?php endif; ?>
					 <?php if(isset($error_msg['OnlineTeacherMsg']) && $error_msg['OnlineTeacherMsg']==0): ?> <li>Please select "Yes" or "No" for online lesson of teach section.</li> <?php endif; ?>
					 </ul>
					</div>
				</div>
				<?php else: ?>
					<?php if(!empty($_COOKIE['myCookie']) && $_COOKIE['myCookie'] == 'profileUpdate'): ?>
					<div class="ibox-content">
						<div class="alert alert-info alert-success">
						<b>Your profile have been saved. Note: It may take up to 24 hours for the changes to be seen on your public profile.</b><br/>
						</div>
					</div>
					<script type="text/javascript">
					window.onbeforeunload = function () {
					 // window.scrollTo(0, 0);
					}
					</script>
					<?php setcookie('myCookie', '', 1); ?>
					<?php endif; ?>	
				<?php endif; ?>
				<div class="ibox-content wizard-big">
					<form id="form" >
					<fieldset>
						<?php if($teaches['profileApprove']==1 && $teaches['accountApprove']==1): ?>
						<div class="row">
							<div class="alert alert-info">
							<h3>GET 5X MORE STUDENTS WITH REVIEWS</h3></br>
							Reviews are key to attracting new students so be sure to share your profile link
							</br>
							<strong><a href="https://www.musikalessons.com/teachers/<?php echo e($teaches['urlName']); ?>" > https://www.musikalessons.com/teachers/<?php echo e($teaches['urlName']); ?> </a> </strong></br>
							where people can write you a review. Any of your past or current students can write review and they don’t have to be a Musika student. Aim for 10+ reviews.</br>
							</div>
						</div>
						<?php endif; ?>
					
						<div class="row">
							<?php 
								$completenss = ['Incomplete'=>'Incomplete','Basic'=>'70%','Preferred'=>'80%','Select'=>'90','Elite'=>'100'];
								$profileCmp = $teaches['profile_completenss'];
							?>
							<b>Name:</b> <?php echo e($teaches['firstName']); ?>  <?php echo e($teaches['lastName']); ?>  &nbsp;&nbsp;&nbsp;&nbsp;<b>Zip Code:</b> <?php echo e($teaches['postalCode']); ?>

							</br>
							
							<b>Your Profile Completeness:</b> <b style="color:#6c116c"><?php echo e($completenss[$profileCmp]); ?></b> <span class="name_zip1"><a id="what-does-it-mean" data-toggle="modal" data-target="#table-modal">What does it mean?</a></span>
						</div>
						<div class="row">
							<div class="mob-badge">
								<a data-toggle="modal" data-target="#table-modal">
								<div class="col-md-2 col-md-offset-1  <?php if($teaches['profile_completenss']=='Incomplete' ): ?> bold bg-red <?php else: ?> bg-blue <?php endif; ?>  badge">Incomplete</div>
								<div class="col-md-2 <?php if($teaches['profile_completenss']=='Basic' ): ?> bold bg-purpel <?php else: ?> bg-blue <?php endif; ?> badge">70%</div>
								<div class="col-md-2  <?php if($teaches['profile_completenss']=='Preferred' ): ?> bold bg-purpel <?php else: ?> bg-blue <?php endif; ?> badge">80%</div>
								<div class="col-md-2  <?php if($teaches['profile_completenss']=='Select' ): ?> bold bg-purpel <?php else: ?> bg-blue <?php endif; ?> badge">90%</div>
								<div class="col-md-2  <?php if($teaches['profile_completenss']=='Elite' ): ?> bold bg-purpel <?php else: ?> bg-blue <?php endif; ?> badge">100%</div>
								</a>
							</div>
						</div>
						<br/>
						<div class="row">
								<div class="d-inline">
								<h3><span class="fa-stack fa-1x" >
								<i class="fa fa-circle fa-stack-2x"></i>
								<strong class="fa-stack-1x text-default" style="color:white">1</strong>
									</span> Select profile headshot:<span class="required required-text">* required</span></h3><span id="lineBreak"><span>
								</div>
								<div class="col-md-3" style="width: !important">
									<div class="text-center" style="border-style: none; !important">
										<!--<a onclick="rotateimg()"><i class="glyphicon glyphicon-repeat white" style="top:7px"></i></a>
										<span id="rotoate_message" style="display:none;font-wight:bold;color:#fff">&nbsp; <a class="btn btn-primary" onclick="saveAvatar();"> Click here to save your rotation.</a> <br></span>-->
										<input type="hidden" name="img_rotate_angle" id="img_rotate_angle" >
										<div class="m-b-sm">
										<?php if(Auth::check() ): ?>
											<?php
												$avatar=App\Models\User::with('teacherId')->where('id',Auth::id())->first();
												$newavt=str_replace("@{{THUMBNAILMASK}}","avatarSize",$avatar->teacherId->avatar);
											?>
											<?php if($avatar->teacherId->avatar!=''): ?>
												<img id="profileimage"  alt="image" width="190px"  src="https://musikalessons.com/uploads/TeachersModel/<?php echo e($avatar->teacherId->id); ?>/avatar/<?php echo e($newavt); ?>">
												<input type="hidden" name="oldImagePath" id="oldImagePath" value="<?php echo e($newavt); ?>">
												
											<?php else: ?>
												<img id="profileimage"  alt="image" width="190px"  src="<?php echo e(url('img/profile.png')); ?>">
											<?php endif; ?>	
										<?php else: ?>
											<img id="profileimage" alt="image" width="190px"  src="<?php echo e(url('img/profile.png')); ?>">
										 <?php endif; ?>
										</div>
										
										<div class="text-center" id="rotoate_message" style="display:none;font-wight:bold;color:#fff">
											<br>
											<a class="btn btn-xs btn-primary" onclick="saveAvatar();"> Click here to save your rotation.</a><p></p>
										</div>
										<div class="text-center" id="profilebyPageLoad">
										<?php if($teaches['avatar']!=''): ?>
											<a class="btn btn-xs btn-white" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit" ></i> Edit </a>
											<a class="btn btn-xs btn-primary" onclick="deleteProfile('<?php echo e($teaches['avatar']); ?>');"><i class="fa fa-trash"></i> Delete</a>
											
											<a onclick="rotateimg()" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-repeat white"></i> Rotate</a>
										<?php else: ?>
											<a name="step1" class="btn btn-primary" value="step6" data-toggle="modal" data-target="#myModal" >Add Photo</a>	
										<?php endif; ?>
										</div>
										<div class="text-center" id="profilebyAjax">
										</div>
									</div>
								</div>
								<div class="col-md-9">
									<p class="notice-tag"><strong style="color:red">IMPORTANT:</strong> Your profile photo is a very important element to your profile. Please read the following tips before uploading:</p>  
									<ul class="list-group" style="margin: 5px; !important">
									<li class="item-list"><strong>1. Close-up photos. Use a full color, high quality headshot.</strong></li>
									 <li class="item-list"> <strong>2. Photo of Just You. Use a solo shot without other people.</strong></li>
									<li class="item-list"> <strong> 3. Clear Photo. Avoid low quality, blurry, or poor contrast photos.</strong></li>
									<li class="item-list"> <strong> 4. Dress for Success. Dress as you would to a first lesson with a new client (business casual).</strong></li>
									<li class="item-list"> <strong> 5. Smile! Avoid photos that make you appear intimidating, angry, goofy, bored, etc. </strong> </li>    
									<!-- <li class="item-list"><input type="button" class="btn btn-primary" value="Choose a Photo"> </li> --> 
								</ul>	
								</div>
							</div>
						</fieldset>
						<fieldset>
							<br>
							<div class="row">
							<h3><span class="fa-stack fa-1x" >
							<i class="fa fa-circle fa-stack-2x"></i>
								<strong class="fa-stack-1x text-default" style="color:white">2</strong>
								</span> Instruments you can teach:<span class="required required-text">* required</span></h3>
							<div class="col-sm-12">
							<?php 
							$insIds = '';
							if(isset($insturmentIds))
								$insIds = implode(',',$insturmentIds);  
							?>
							<?php $__currentLoopData = $instruments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ins_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="col-xs-6 col-md-3"><label class="checkbox-container"> <?php echo e($ins_data->name); ?><input value="<?php echo e($ins_data->id); ?>" id="instruments_0" type="checkbox" name="instruments[]" <?php if(isset($insturmentIds) && in_array($ins_data->id, $insturmentIds)): ?>
							<?php echo e("checked"); ?> <?php endif; ?> /> <span class="checkmark"></span> </label></div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
							<!--<label class="checkbox-container">Select All Home <input id="allHome" type="checkbox"><span class="checkmark"></span> </label>   firststep() -->
							</div>
							<!--<div class="col-sm-12">
								<a name="step1" class="btn btn-primary" style="float: right;" value="step1" onclick="profileUpdate();" >Save Your Changes</a>	
							</div>-->
							</div>	
						</fieldset>
						<fieldset>
		<div class="row">
			<div class="col-md-12" style="padding-left: 0px !important;">
			   <h3><span class="fa-stack fa-1x" >
				<i class="fa fa-circle fa-stack-2x"></i>
				<strong class="fa-stack-1x text-default" style="color:white">3</strong>
				</span> Where you can teach:<span class="required required-text">* required</span><br></h3>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-10">
				<div class="tab-map">
					<div class="">
						<div id="tab-1" class="tab-pane active">
							<div class="panel-body">
								<fieldset class="form-horizontal">
				<div class="col-md-12" style="padding-left: 0px;">	
					
					<div class="col-md-3" style="padding-left: 0px; padding-right: 0px;"><strong>In student's homes: </strong> </div>
					<div class="col-md-3"  style="padding-left: 0px;"><input value="yes"  name="teachesHome" id="teachesHome" type="radio" onclick="teacherMap()" <?php if($teaches['teachesHome']=="yes"){ echo "checked='checked'"; $styleHome="block";} ?>> Yes
					<input value="no" name="teachesHome" id="teachesHome" type="radio" onclick="teacherMap()" <?php if($teaches['teachesHome']=="no"){ echo "checked='checked'"; $styleHome="none";} ?>> No </div>
				</div>
				<div class="col-md-12" style="padding-left: 0px;">		
					<div class="col-md-3"  style="padding-left: 0px; padding-right: 0px;"><strong>In my own studio:</strong> </div> 
					<div class="col-md-3"  style="padding-left: 0px;"><input value="yes"  name="teachesStudio" id="teachesStudio" type="radio" onclick="teachesStudioMap()" <?php if($teaches['teachesStudio']=="yes"){ echo "checked='checked'";  $styleStudio="block";} ?>> Yes  
					<input value="no" name="teachesStudio" id="teachesStudio" type="radio" onclick="teachesStudioMap()" <?php if($teaches['teachesStudio']=="no"){ echo "checked='checked'"; $styleStudio="none";} ?>>  No </div>
				</div>
				<div class="col-md-12" style="padding-left: 0px;">	
					<div class="col-md-3"  style="padding-left: 0px; padding-right: 0px;"><strong>Online lessons:</strong></div>  
					<div class="col-md-3"  style="padding-left: 0px;"><input value="yes"  name="online_lessons" id="online_lessons" type="radio"  <?php if($teaches['teachesOnline']=="yes"){ echo "checked='checked'";  } ?> > Yes  
					<input value="no" name="online_lessons" id="online_lessons" type="radio"  <?php if($teaches['teachesOnline']=="no"){ echo "checked='checked'";  } ?> >  No </div>
				</div>
								</fieldset>
							</div>
						</div>
						<div id="tab-2" class="">
							<div class="panel-body">
								<fieldset class="form-horizontal">
			<div id="tmap" class="each_catagory" style="display: <?php if(isset($styleHome)): ?><?php echo e($styleHome); ?> <?php else: ?> none <?php endif; ?>">
			<h4>Teritory Locations Map:</h4>
			<span style="color:#a94442; font-size:12px">
			   <a href="javascript:void(0)" class="vid-pop-show2"><b> Watch how it's done </b>
			   </a>
			</span>
			<div class="each_details">
				<span style="color:#a94442; font-size:13px">Instructions: Draw a teaching area.</span>
				<ul class="list-unstyled">
					<li>1. Click on 'Draw a teaching area' to draw your teaching area. </li>
					<li>2. You can click on trash icon to delete the teaching area. </li>
					<li>3. Click on teaching area to update your availability days or delete teaching area. </li>
				</ul>
				<div class="lock-box">
				<div style="position:relative;  height:550px;">
					<div id='myMap' style="position:relative; "> 
					
						<div class="overlay">
							<div class="overlay-content"><img src="<?php echo e(asset('img/ajax-loader2.gif')); ?>" alt="Loading..."/>
							</div>
						</div>
					</div>
					<input class="" type="button" id="drawPolygon" value="Draw a teaching area" onclick="DrawPolygon()" style="position:absolute;left:35%;top:10px; border-radius: 5px;padding: 4px 12px;" />
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
								</fieldset>
							</div>
						</div>
						<div id="tab-3" class="">
							<div class="panel-body">
								<fieldset class="form-horizontal">
			<div class="col-md-12">
			</div>
			<div id="smap" class="each_catagory" style="display: <?php if(isset($styleStudio)): ?><?php echo e($styleStudio); ?> <?php else: ?> none <?php endif; ?> ">
				<h4>Studio Locations Map:</h4>
				<div class="each_details">
					<span style="color:#a94442; font-size:13px">Instructions: place pins for your own home studio locations, if applicable.</span>
					<ul class="list-unstyled">
						<li>1. Zoom in/out using +/- on the left side of the map. </li>
						<li>2. Locate the cross streets of your studio.  </li>
						<li>3. Double click on the map to place a studio pin.</li>
						<li>4. To remove a studio pin, click the placed pin. </li>
					</ul>
					<div class="lock-box">
					<div style="position:relative;  height:550px;">
						<div id='studioMap' style="position:relative; ">
							<div class="overlay">
								<div class="overlay-content"><img src="<?php echo e(asset('img/ajax-loader2.gif')); ?>" alt="Loading..."/>
								</div>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
								</fieldset>
							</div>
						</div>
					</div>
				</div>
			</div>
			<p></p>
			<!--<div class="col-sm-12">
				<p></p>
				<div class="col-sm-10"></div>
				<div class="col-sm-1" style=" min-height: 0px !important;">
				<a id="prevInsideStep" class="btn btn-primary step-button" style="float: right;"  >Previous </a></div>
				<div class="col-sm-1" style=" min-height: 0px !important;">
				<a id="nextInsideStep" class="btn btn-primary" style="float: right;"  >Next </a></div>
			</div>-->
		</div>	
		<!--<div class="col-sm-12">
			<a name="step1" class="btn btn-primary" style="float: right;" value="step1" onclick="secondstep();" >Save Your Changes</a>	
		</div>-->
		</fieldset>
		<fieldset>
			<div class="row">
			<h3><span class="fa-stack fa-1x" >
			<i class="fa fa-circle fa-stack-2x"></i>
			<strong class="fa-stack-1x text-default" style="color:white">4</strong>
				</span> Ages you can teach:<span class="required required-text">* required</span></h3></br>
				<div class="col-md-4">
					 <div id="ionrange_1"></div>
					 <input type="hidden" name="fromRange1" id="fromRange1">
						<input type="hidden" name="toRange1" id="toRange1">
				   </div>
		  </div>
		  </br>
		<div class="row">
		  <h3><span class="fa-stack fa-1x" >
				<i class="fa fa-circle fa-stack-2x"></i>
				<strong class="fa-stack-1x text-default" style="color:white">5</strong>
				</span> Levels you can teach:<span class="required required-text">* required</span></h3></br>
			<div class="col-md-4">
				<div id="ionrange_2"></div>
				<input type="hidden" name="fromRange2" id="fromRange2">
				<input type="hidden" name="toRange2" id="toRange2">
			</div>
		</div>
		</br>
		<!--<div class="col-sm-12">
			<a name="step1" class="btn btn-primary" style="float: right;" value="step1" onclick="saveRangeSlider();" >Save Your Changes</a>	
		</div>-->
		</fieldset>
		<fieldset>
	 <div class="row" style="padding-left: 0px !important;">
	  <h3><span class="fa-stack fa-1x" >
		<i class="fa fa-circle fa-stack-2x"></i>
  <strong class="fa-stack-1x text-default" style="color:white">6</strong>
		</span> Styles you can teach:<span class="required required-text">* required</span></h3></br>
		<div class="col-sm-12">
		<?php 
		$styleIds = '';
		if(isset($TeacherStyleIds) ) $styleIds = implode(',',$TeacherStyleIds);
		?>
		<?php $__currentLoopData = $stylesList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $style_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="col-xs-6 col-md-3"><label class="checkbox-container"><?php echo e($style_data->name); ?><input value="<?php echo e($style_data->id); ?>" id="styles_0" type="checkbox" name="styles[]" <?php if(isset($TeacherStyleIds) && in_array($style_data->id, $TeacherStyleIds)): ?>
			<?php echo e("checked"); ?> <?php endif; ?> /> <span class="checkmark"></span> </label></div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div> 
		</div>
		<!-- 
		<div class="col-sm-12">
			<a name="step1" class="btn btn-primary" style="float: right;" value="step1" onclick="profileUpdate();" >Save Your Changes</a>	
		</div>
		-->
		<!-- fourthstep()-->
		</fieldset>
		<fieldset>
<div class="row">
	<div class="col-md-12" style="padding-left: 0px !important;">
	   <h3><span class="fa-stack fa-1x" >
		<i class="fa fa-circle fa-stack-2x"></i>
  <strong class="fa-stack-1x text-default" style="color:white">7</strong>
		</span> Degrees and Education:<span class="required required-text">* required</span>
		<br>
			<span style="color:#a94442; font-size:12px">&nbsp;
				<b>Instructions:</b> Include up to five (5) degrees/certificates in list format.
			</span>
		</h3>
	</div>
	<?php if($teaches['newUser']=='no'): ?>
		<?php $count=1;  ?>
		<div class="col-md-12">
			<!--<textarea name="teacherTraining" id="teacherTraining" class="form-control" ></textarea>-->
			<textarea class="form-control" cols="80" id="teacherTraining" name="teacherTraining" rows="20" ><?php echo e($teaches['training']); ?>

			</textarea>
		</div>
	<?php else: ?>
		<div id="TextBoxesGroup"> 
		<?php $count=1;  ?>
		<?php if($teaches['training']!=''): ?>
		<?php $__currentLoopData = $teaches['training']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div id="TextBoxDiv<?php echo e($count); ?>" class="col-md-12">
			<div class="col-md-4" >
				<div class="form-group">
				   <select class="form-control" name="TeachersModeltraining<?php echo e($count); ?>" id="TeachersModeltraining<?php echo e($count); ?>" onchange="getDesc(<?php echo e($count); ?>);" >
						<option value="">Select degree and education</option>
						<option value="Course Work" <?php if($data['TeachersModeltraining']=="Course Work"): ?><?php echo e("selected"); ?> <?php endif; ?> >Course Work</option>
						<option value="Professional Certificate" <?php if($data['TeachersModeltraining']=="Professional Certificate"): ?><?php echo e("selected"); ?> <?php endif; ?>>Professional Certificate</option>
						<option value="Teaching Certificate" <?php if($data['TeachersModeltraining']=="Teaching Certificate"): ?><?php echo e("selected"); ?> <?php endif; ?>>Teaching Certificate</option>
						<option value="Associate Degree" <?php if($data['TeachersModeltraining']=="Associate Degree"): ?><?php echo e("selected"); ?> <?php endif; ?>>Associate Degree</option>
						<option value="Bachelor Degree" <?php if($data['TeachersModeltraining']=="Bachelor Degree"): ?><?php echo e("selected"); ?> <?php endif; ?>>Bachelor Degree</option>
						<option value="Graduate Degree" <?php if($data['TeachersModeltraining']=="Graduate Degree"): ?><?php echo e("selected"); ?> <?php endif; ?>>Graduate Degree</option>
						<option value="Master Degree" <?php if($data['TeachersModeltraining']=="Master Degree"): ?><?php echo e("selected"); ?> <?php endif; ?>>Master Degree</option>
						<option value="Doctoral Degree" <?php if($data['TeachersModeltraining']=="Doctoral Degree"): ?><?php echo e("selected"); ?> <?php endif; ?>>Doctoral Degree</option>
						<option value="other" <?php if($data['TeachersModeltraining']=="other"): ?><?php echo e("selected"); ?> <?php endif; ?>>Other</option>
					</select>
				</div>
			</div>
			<div id=""> <!-- addDesc<?php echo e($count); ?> -->
				<div class="col-md-6" style="padding-left: 0px; !important">
					<div class="form-group"><input type="text" name="degreeSchoolName<?php echo e($count); ?>" id="degreeSchoolName<?php echo e($count); ?>" class="form-control" maxlength="100" placeholder="Name of School" value="<?php echo e($data['degreeSchoolName']); ?>">
					</div>
				</div>	
			</div>
		</div>
		<?php $degreeCnt = $count; $count++;  ?> 
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php else: ?>
		<div id="TextBoxDiv<?php echo e($count); ?>" class="col-md-12">
			<div class="col-md-4" >
				<div class="form-group">
				   <select class="form-control" name="TeachersModeltraining<?php echo e($count); ?>" id="TeachersModeltraining<?php echo e($count); ?>" onchange="getDesc(<?php echo e($count); ?>);" >
						<option value="">Select degree and education</option>
						<option value="Course Work" >Course Work</option>
						<option value="Professional Certificate" >Professional Certificate</option>
						<option value="Teaching Certificate">Teaching Certificate</option>
						<option value="Associate Degree">Associate Degree</option>
						<option value="Bachelor Degree">Bachelor Degree</option>
						<option value="Graduate Degree">Graduate Degree</option>
						<option value="Master Degree">Master Degree</option>
						<option value="Doctoral Degree">Doctoral Degree</option>
						<option value="other">Other</option>
					</select>
				</div>
			</div>
			<div id="addDesc<?php echo e($count); ?>"> <!--  -->
			</div>
		</div>
			<?php 
				$degreeCnt = $count;
				$count++;   
			?> 	
		<?php endif; ?>	
		</div>
		<div class="col-md-12" id="degreeButton">
			<div class="col-md-6">
				<input type="hidden" name="degreeCounter" id="degreeCounter" value="<?php echo e($degreeCnt); ?>" >
				<div class="form-group"><a class="btn btn-primary" id="addButton1" onclick="addButton();" ><strong>Add Another Degree</strong></a> &nbsp;&nbsp;<a class="btn btn-primary" id="removeButton" onclick="removeButton();" ><strong>Remove</strong></a></div>
			</div>
		</div>
	<?php endif; ?>
	
</div>
	    <div class="row">
			<div class="col-md-12" style="padding-left: 0px !important;">
				<h3><span class="fa-stack fa-1x" >
				<i class="fa fa-circle fa-stack-2x"></i>
  <strong class="fa-stack-1x text-default" style="color:white">8</strong>
					</span> Awards and Achievements: <span class="required required-text"> optional</span><br>
					<span style="color:#a94442; font-size:12px">&nbsp;
					   <b>Instructions:</b> Highlight up to five (5) awards in list format.
					</span></br></br>
					<span style="font-size:13px">&nbsp;
					   <strong>Example: &nbsp;&nbsp;  2012 - Manhattan School of Music Merit Scholarship. </strong>
					</span>
				</h3>
			</div>
			<?php if($teaches['newUser']=='no'): ?>
				<div class="col-md-12">
					<!--<textarea name="teacherDegrees" id="teacherDegrees" class="form-control" ></textarea>-->
					<textarea class="form-control" cols="80" id="teacherDegrees" name="teacherDegrees" rows="20" ><?php echo e($teaches['degrees']); ?>

					</textarea>
				</div>
			<?php else: ?>
			<div class="col-md-6" >
				<div class="form-group">
					<input type="text" name="award_achievement[]" class="form-control" maxlength="100" value="<?php if(isset($teaches['degrees'][0])): ?><?php echo e($teaches['degrees'][0]); ?><?php endif; ?>">
				</div>
				<div class="form-group">
					<input type="text" name="award_achievement[]" class="form-control" maxlength="100" value="<?php if(isset($teaches['degrees'][1])): ?><?php echo e($teaches['degrees'][1]); ?><?php endif; ?>">
				</div>
				<div class="form-group">
					<input type="text" name="award_achievement[]" class="form-control" maxlength="100" value="<?php if(isset($teaches['degrees'][2])): ?><?php echo e($teaches['degrees'][2]); ?><?php endif; ?>">
				</div>
				<div class="form-group">
					<input type="text" name="award_achievement[]" class="form-control" maxlength="100" value="<?php if(isset($teaches['degrees'][3])): ?><?php echo e($teaches['degrees'][3]); ?><?php endif; ?>">
				</div>
				<div class="form-group">
					<input type="text" name="award_achievement[]" class="form-control" maxlength="100" value="<?php if(isset($teaches['degrees'][4])): ?><?php echo e($teaches['degrees'][4]); ?><?php endif; ?>">
				</div>
			</div>
			<?php endif; ?>
		</div>
		<!--
		<div class="col-sm-12">
			<a name="step1" class="btn btn-primary" style="float: right;" value="step5" onclick="fifthStep();" >Save Your Changes</a>	
		</div>	
		-->
    <!------------------Custom html by v ---------------------------------->
						</fieldset>
						<fieldset>
						<div class="row">
							<div class="col-md-12" style="padding-left: 0px !important;">
							   <h3><span class="fa-stack fa-1x" >
								<i class="fa fa-circle fa-stack-2x"></i>
								<strong class="fa-stack-1x text-default" style="color:white">9</strong>
								</span> Photo Gallery: <span class="required required-text">optional</span><br>
								</h3></br>
							</div>
							<div class="col-md-12" id="gallerythumbs">
							<?php $__currentLoopData = $teachersPhotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="col-md-3" style="border: 1px solid; text-align: center;">
								<img alt="photo" src="https://musikalessons.com/uploads/photos/thumb.<?php echo e($photo->image); ?>" height="140px">
								<div style="bottom: 76%; position: absolute;right: 0px;" ><button type="button" class="btn btn-block btn-primary btn-flat galleryDiv<?php echo e($photo->id); ?>" onclick="btnDeleteImage('<?php echo e($photo->id); ?>');">X</button></div>
								</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
							</div>
							<div class="col-md-12">
								<div class="each_catagory">
								<p class="each_details">
								</br>
									<a class="btn btn-primary" data-toggle="modal" data-target="#myModal1">Select Image </a>
									Required file types are: <span class="required">*.jpg, *.gif, *.png, *.jpeg</span>
								</p>
								</div>
							</div>
						</div>
						</fieldset>
						<fieldset>
						<div class="row">
							<div class="col-md-12" style="padding-left: 0px !important;">
							   <h3><span class="fa-stack fa-1x" >
								<i class="fa fa-circle fa-stack-2x"></i>
								<strong class="fa-stack-1x text-default" style="color:white">10</strong>
								</span> Upload A Welcome Video: <span class="required required-text">optional</span> <span style="color:#a94442; font-size:12px"><a  href="javascript:void(0)" class="vid-pop-show">see example</a></span><br>
								</h3> 
								<div class="ibox-tools" style="text-align: left; margin-left: 15px;">
									<div style=" font-size:12px">
										A welcome video is a great way to introduce yourself to prospective students. It should be a short video in which you talk about your teaching methods. You can also give a brief demonstration of how you might teach a basic concept like a scale or warm-up exercise. 
									</div>
								</div>
								</br>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<strong>Select video type:  </strong>
								   <select class="form-control" name="videoType" id="videoType" onchange="getlinkTab();">
										<option value="Youtube">You Tube Video</option>
										<option value="File">Upload file</option>
									</select>
								</div>
							</div>
							<div class="col-md-12" id="videoTypeTab">
								<div class="form-group" >
									<strong>Insert your youtube link:  </strong>
								   <input type="text" class="form-control" name="youtubeLink" id="youtubeLink" >
								</div>
							</div>
							<?php if(isset($VideoInfo1->type)): ?>
								<?php if($VideoInfo1->type=='Youtube'): ?>
									<?php 
										$title= $VideoInfo1->youtubeUrl;  
										$fileUrl = $VideoInfo1->youtubeUrl;
										$split_url = explode('&',$fileUrl);
									?>
									<div class="col-md-8">
										<a href="<?php echo e($split_url[0]); ?>" class="vid-icon bla-2" title="<?php echo e($title); ?>"><?php echo e($title); ?><span></span></a> 
										<a href="javascript:void(0)" class="vid-rem-icon" onclick="removeVideo('<?php echo e($VideoInfo1->id); ?>','videoId')">Remove</a>	
									</div>
									<div class="col-md-4">
									
									</div>
								<?php else: ?>
									<?php 
										$title= $VideoInfo1->title;  
										$fileName = explode('/uploads/videos/',$VideoInfo1->file);
										$fileUrl = url('public/videos').'/'.$fileName[1];
									?>
									<div class="col-md-8" id="welcomeVideoTitle">
										<a href="javascript:void(0)" class="vid-icon" id="video1" title="<?php echo e($title); ?>"><?php echo e($title); ?><span></span></a> 
										<a href="javascript:void(0)" class="vid-rem-icon" onclick="removeVideo('<?php echo e($VideoInfo1->id); ?>','videoId')">Remove</a>	
									</div>
									<div class="col-md-4">
										
									</div>
								<?php endif; ?>		
							<?php endif; ?>
							<div class="col-md-12">
								<div class="form-group" style="margin-top: 20px;">
									<strong>Note: Please click on "SAVE YOUR CHANGES" after you have selected video. Please play your video after it is uploaded to make sure it was successful.</br>
									Note: Please enter full YouTube link only e.g. https://www.youtube.com... </strong>
								</div>
							</div>
						</div>
						</fieldset>	
						<fieldset>
						<div class="row">
							<div class="col-md-12" style="padding-left: 0px !important;">
							   <h3><span class="fa-stack fa-1x" >
								<i class="fa fa-circle fa-stack-2x"></i>
									<strong class="fa-stack-1x text-default" style="color:white">11</strong>
								</span> Upload A Performance Or Lesson Video <span class="required required-text">optional</span><br>
								</h3>
								<div class="ibox-tools" style="text-align: left; margin-left: 15px;">
									<div style=" font-size:12px">
										A performance video is an example of your skills as a musician. While it does not need to be a professional quality video, we encourage a polished performance that highlights your abilities on your primary instrument. 
									</div>
								</div>
								</br>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<strong>Select video type:  </strong>
									<select class="form-control" name="videoType2" id="videoType2" onchange="getlinkTab2();">
										<option value="Youtube">You Tube Video</option>
										<option value="File">Upload file</option>
									</select>
								</div>
							</div>	
							<div class="col-md-12" id="videoTypeTab2">
								<div class="form-group" >
									<strong>Insert your youtube link:  </strong>
								   <input type="text" class="form-control" name="youtubeLink2" id="youtubeLink2" >
								</div>
							</div>
							<?php if(isset($VideoInfo2->type)): ?>
								<?php if($VideoInfo2->type=='Youtube'): ?>
									<?php 
										$title = $VideoInfo2->youtubeUrl;  
										$fileUrl = $VideoInfo2->youtubeUrl;
										$split_url = explode('&',$fileUrl);	
									?>
									<div class="col-md-8">
										<a href="<?php echo e($split_url[0]); ?>" class="vid-icon bla-2" title="<?php echo e($title); ?>"><?php echo e($title); ?><span></span></a> 
										<a href="javascript:void(0)" class="vid-rem-icon" onclick="removeVideo('<?php echo e($VideoInfo2->id); ?>','videoId2')">Remove</a>
									</div>
									<div class="col-md-4">
									</div>
								<?php else: ?>
									<?php 
										$title= $VideoInfo2->title;  
										$fileName = explode('/uploads/videos/',$VideoInfo2->file);
										$fileUrl = url('public/videos').'/'.$fileName[1];
									?>
									<div class="col-md-8" id="welcomeVideoTitle2">
										<a href="javascript:void(0)" class="vid-icon" id="video11" title="<?php echo e($title); ?>"><?php echo e($title); ?><span></span></a>  
										<a href="javascript:void(0)" class="vid-rem-icon" onclick="removeVideo('<?php echo e($VideoInfo2->id); ?>','videoId2')">Remove</a>
									</div>
									<div class="col-md-4">
									</div>
								<?php endif; ?>		
							<?php endif; ?>
							<div class="col-md-12">
								<div class="form-group" style="margin-top: 20px;">
									<strong>Note: Please click on "SAVE YOUR CHANGES" after you have selected video. Please play your video after it is uploaded to make sure it was successful.</br>
									Note: Please enter full YouTube link only e.g. https://www.youtube.com... </strong>
								</div>
							</div>
						</div>
						</fieldset>	
						<fieldset>
							<div class="row">
			<div class="col-md-12" style="padding-left: 0px !important;">
			   <h3><span class="fa-stack fa-1x" >
				<i class="fa fa-circle fa-stack-2x"></i>
  <strong class="fa-stack-1x text-default" style="color:white">12</strong>
				</span> About Me:<span class="required required-text">* required</span><br><br>
				<span style="color:#a94442; font-size:12px">&nbsp;
				   <b>Instructions:</b> Do NOT copy/paste from your resume or another website. In the first person (use "I"), Write detailed description focusing on your musical background, education, and teaching studio.
				</span></h3>
			</div>
			<div class="col-md-12">
				<div class="form-group">
				<strong>Example: </strong> I'm a passionate and motivated instructor who loves working with students and sharing my love of music.  In 2007, I graduated from Indiana University with a Bachelor of Arts degree in Piano Performance.  Performing all over the world has been one of the greater experiences of my life as a musician, and I've had the opportunity to play both at the Avery Fischer Hall in New York, as well as touring the United Kingdom as several performances as the principle pianist with the Brighton Philharmonic Orchestra.
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
				   <textarea name="aboutTeacher" id="aboutTeacher" rows="4" cols="110" class="form-control" ><?php echo e($teaches['aboutTeacher']); ?></textarea>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
				<span style="color:red" id="aboutTeacherLimit">A minimum of 500 characters is required.</span>
				</div>
			</div>
		</div>
		</br>
		<div class="row">
			<div class="col-md-12" style="padding-left: 0px !important;">
			   <h3><span class="fa-stack fa-1x" >
				<i class="fa fa-circle fa-stack-2x"></i>
  <strong class="fa-stack-1x text-default" style="color:white">13</strong>
				</span> My Experience:<span class="required required-text">* required</span><br><br>
				<span style="color:#a94442; font-size:12px">&nbsp;
				   <b>Instructions:</b> Write detailed description focusing on your teaching experience and love of teaching.
				</span></h3>
			</div>
			<div class="col-md-12">
				<div class="form-group">
				<strong>Example: </strong> My teaching experience dates back to my college days, as I began teaching private lessons part time 8 years ago, and have been consistently teaching students in my home studio for the last 5 years.  Encouraging regular practice on a consistent schedule is one of the key points I like to emphasize for younger students, as it tends to help the student progress and gain a passion for the instrument.  I've also found that a combination of classical and modern music can go a long way in helping students enjoy the piano and motivate them to practice and continue to learn.  If a student isn't having fun in their lessons, then I'm not doing my job!  My students are encouraged to enter competitions and recitals, as well as work on composing their own original material, so they can feel good about their accomplishments and stay motivated to learn.  I'm always looking to bring on new students of all ages!
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
				   <textarea name="experience" id="experience" rows="4" cols="110" class="form-control" ><?php echo e($teaches['experience']); ?></textarea>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
				<span style="color:red"  id="experienceLimit">A minimum of 500 characters is required.</span>
				</div>
			</div>
		</div>
		</br>
			<div class="row">
			<div class="col-md-12" style="padding-left: 0px !important;">
			   <h3><span class="fa-stack fa-1x" >
				<i class="fa fa-circle fa-stack-2x"></i>
  <strong class="fa-stack-1x text-default" style="color:white">14</strong>
				</span> My Methods:<span class="required required-text">* required</span><br><br>
				<span style="color:#a94442; font-size:12px">&nbsp;
				   <b>Instructions:</b> Please write detailed description about any methods, practices, or philosophies you use when teaching. If you create your own custom lesson plans or materials, be sure to note this too.
				</span></h3>
			</div>
			<div class="col-md-12">
				<div class="form-group">
				<strong>Example: </strong> For beginning students who are children, I typically start with Hal Leonard's Essential Elements.  Once the student has progressed to have a grasp of the fundamentals, I will begin to introduce solo repertoire appropriate for their first recital performance.  For adults,  I try to find out what the student is interested in, and guide my instruction accordingly to keep the lessons engaging and fun, no matter their ability level.
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
				   <textarea name="methodsUsed" id="methodsUsed" rows="4" cols="110" class="form-control" ><?php echo e($teaches['methodsUsed']); ?></textarea>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
				<span style="color:red" id="methodsUsedLimit" >A minimum of 500 characters is required.</span>
				</div>
			</div>
		</div>
		</br>
		<div class="row">
			<div class="col-md-12" style="padding-left: 0px !important;">
			   <h3><span class="fa-stack fa-1x" >
				<i class="fa fa-circle fa-stack-2x"></i>
  <strong class="fa-stack-1x text-default" style="color:white">15</strong>
				</span> My Teaching Style:<span class="required required-text">* required</span><br><br>
				<span style="color:#a94442; font-size:12px">&nbsp;
				   <b>Instructions:</b> Please write detailed description explaining how you approach teaching. Make sure to convey your love of teaching!
				</span></h3>
			</div>
			<div class="col-md-12">
				<div class="form-group">
				<strong>Example: </strong>Nothing is more rewarding than seeing one of my students develop a passion for music!  Therefore, it's important that each student progresses at his or her own pace.  I encourage this by setting realistic goals for my students at each lesson. Acknowledging accomplishments helps fuel a students desire to progress, and makes students eager to learn more.  By trying to find out what inspires the student, I can successfully tailor my instruction to their wants and needs..
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
				   <textarea name="lessonsStyle" id="lessonsStyle" rows="4" cols="110" class="form-control" ><?php echo e($teaches['lessonsStyle']); ?></textarea>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
				<span style="color:red" id="lessonsStyleLimit">A minimum of 500 characters is required.</span>
				</div>
			</div>
		</div>
		<!--
		<div class="col-sm-12">
			<a name="step1" class="btn btn-primary" style="float: right;" value="step5" onclick="seventhStep();" >Save Your Changes</a>	
		</div> 
		-->
						</fieldset>
						<fieldset >
						<div class="row weeks-per">
							<div class="col-md-12" style="padding-left: 0px !important;">
							   <h3><span class="fa-stack fa-1x" >
								<i class="fa fa-circle fa-stack-2x"></i>
  <strong class="fa-stack-1x text-default" style="color:white">16</strong>
								</span> Teacher Schedule:<span class="required required-text">* required</span><br>
								</h3>
							</div>
							<div class="col-md-12">
								<div class="col-md-3" style="padding-left: 15px !important;">
									<label class="checkbox-container">Select All Home <input id="allHome" type="checkbox"><span class="checkmark"></span> </label>  
								</div>
								<div class="col-md-3" style="padding-left: 15px !important;">
									<label class="checkbox-container">Select All Studio<input id="allStudio" type="checkbox"> <span class="checkmark"></span> </label> 
								</div>
								<div class="col-md-3" style="padding-left: 15px !important;">
									<label class="checkbox-container">Select All Online<input id="allOnline" type="checkbox"> <span class="checkmark"></span> </label> 
								</div>
								<div class="col-md-2" style="padding-left: 15px !important;">
									<label class="checkbox-container">Select All<input id="checkAll" type="checkbox"> <span class="checkmark"></span> </label> 
								</div>
								</br>
									<div class="col-md-12" id="legend" >
									<label class="checkbox-container">H = Home, S = Studio, O = Online</label> 
									</div>
								</br>	
							</div>
						</div>
				<div class="col-lg-12 foriphone5" >
                    <div class="ibox float-e-margins">
                        <div class="ibox-content" style="overflow: auto;  height: 600px;padding:0px!important" id="table-container" >
                            <table class="table table-hover" id="maintable" align="left">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th class="schedule_heading">Sun</th>
                                    <th class="schedule_heading">Mon</th>
                                    <th class="schedule_heading">Tue</th>
                                    <th class="schedule_heading">Wed</th>
                                    <th class="schedule_heading">Thu</th>
                                    <th class="schedule_heading">Fri</th>
                                    <th class="schedule_heading">Sat</th>
                                    <th ></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody id="selectAllChkbx">
						<?php 
							$scheduleArr = [['1 AM','A','hide_schedule'],['2 AM','B','hide_schedule'],['3 AM','C','hide_schedule'],['4 AM','D','hide_schedule'],['5 AM','E','hide_schedule'],['6 AM','F','hide_schedule'],['7 AM','G',''],['8 AM','H',''],['9 AM','I',''],['10 AM','J',''],['11 AM','K',''],['Noon','L',''],['1 PM','M',''],['2 PM','N',''],['3 PM','O',''],['4 PM','P',''],['5 PM','Q',''],['6 PM','R',''],['7 PM','S',''],['8 PM','T',''],['9 PM','U',''],['10 PM','V',''],['11 PM','W',''],['12 PM','X','hide_schedule']];
						$k=1;
						?>
						<?php $__currentLoopData = $scheduleArr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="<?php echo e($data[2]); ?>">
                                    <td Rowspan="3" class="schedule_heading"><strong><?php echo e($data[0]); ?> </strong></td>
                                    <td><label class="checkbox-container css-home"><span class="scheduleHome"></span> <input id="<?php echo e($data[1]); ?>01" <?php if($schedule_data!='' && $schedule_data[$data[1].'01']==1){ echo "checked"; } ?> class="css-checkbox" type="checkbox"> <span class="checkmark"></span> </label></td>
                                    <td><label class="checkbox-container css-home"><span class="scheduleHome"></span><input id="<?php echo e($data[1]); ?>04" class="css-checkbox" type="checkbox" <?php if($schedule_data!='' && $schedule_data[$data[1].'04']==1){ echo "checked"; } ?> >  <span class="checkmark"></span> </label></td>
                                    <td> <label class="checkbox-container css-home"><span class="scheduleHome"></span><input id="<?php echo e($data[1]); ?>07" class="css-checkbox" type="checkbox" <?php if($schedule_data!='' && $schedule_data[$data[1].'07']==1){ echo "checked"; } ?> > <span class="checkmark"></span> </label>  </td>
                                    <td> <label class="checkbox-container css-home"><span class="scheduleHome"></span><input id="<?php echo e($data[1]); ?>10" class="css-checkbox" type="checkbox" <?php if($schedule_data!='' && $schedule_data[$data[1].'10']==1){ echo "checked"; } ?> >  <span class="checkmark"></span> </label> </td>
                                    <td> <label class="checkbox-container css-home"><span class="scheduleHome"></span><input id="<?php echo e($data[1]); ?>13" class="css-checkbox" type="checkbox" <?php if($schedule_data!='' && $schedule_data[$data[1].'13']==1){ echo "checked"; } ?> >  <span class="checkmark"></span> </label> </td>
                                    <td> <label class="checkbox-container css-home"><span class="scheduleHome"></span><input id="<?php echo e($data[1]); ?>16" class="css-checkbox" type="checkbox" <?php if($schedule_data!='' && $schedule_data[$data[1].'16']==1){ echo "checked"; } ?>  >  <span class="checkmark"></span> </label> </td>
                                    <td> <label class="checkbox-container css-home"><span class="scheduleHome"></span><input id="<?php echo e($data[1]); ?>19" class="css-checkbox" type="checkbox" <?php if($schedule_data!='' && $schedule_data[$data[1].'19']==1){ echo "checked"; } ?> >  <span class="checkmark"></span> </label> </td>
                                    <td>  </td>
                                    <td>  </td>
                                    <td>  </td>
                                    <td>  </td>
                                </tr>
                                <tr class="<?php echo e($data[2]); ?>">
                                    <td><label class="checkbox-container css-studio"> <span class="scheduleStudio"></span> <input id="<?php echo e($data[1]); ?>02" class="css-checkbox" type="checkbox" <?php if($schedule_data!='' && $schedule_data[$data[1].'02']==1){ echo "checked"; } ?> > <span class="checkmark"></span> </label></td>
                                    <td><label class="checkbox-container css-studio"><span class="scheduleStudio"></span> <input id="<?php echo e($data[1]); ?>05" class="css-checkbox" type="checkbox" <?php if($schedule_data!='' && $schedule_data[$data[1].'05']==1){ echo "checked"; } ?> >  <span class="checkmark"></span> </label></td>
                                    <td><label class="checkbox-container css-studio"><span class="scheduleStudio"></span> <input id="<?php echo e($data[1]); ?>08" class="css-checkbox" type="checkbox" <?php if($schedule_data!='' && $schedule_data[$data[1].'08']==1){ echo "checked"; } ?> >  <span class="checkmark"></span> </label> </td>
                                    <td><label class="checkbox-container css-studio"><span class="scheduleStudio"></span> <input id="<?php echo e($data[1]); ?>11" class="css-checkbox" type="checkbox" <?php if($schedule_data!='' && $schedule_data[$data[1].'11']==1){ echo "checked"; } ?> >  <span class="checkmark"></span> </label> </td>
                                    <td><label class="checkbox-container css-studio"><span class="scheduleStudio"></span> <input id="<?php echo e($data[1]); ?>14" class="css-checkbox" type="checkbox" <?php if($schedule_data!='' && $schedule_data[$data[1].'14']==1){ echo "checked"; } ?> >  <span class="checkmark"></span> </label></td>
                                    <td><label class="checkbox-container css-studio"><span class="scheduleStudio"></span> <input id="<?php echo e($data[1]); ?>17" class="css-checkbox" type="checkbox" <?php if($schedule_data!='' && $schedule_data[$data[1].'17']==1){ echo "checked"; } ?> >  <span class="checkmark"></span> </label></td>
                                    <td><label class="checkbox-container css-studio"><span class="scheduleStudio"></span> <input id="<?php echo e($data[1]); ?>20" class="css-checkbox" type="checkbox" <?php if($schedule_data!='' && $schedule_data[$data[1].'20']==1){ echo "checked"; } ?> >  <span class="checkmark"></span> </label></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
								<tr class="<?php echo e($data[2]); ?>">
                                    <td><label class="checkbox-container css-online"><span class="scheduleOnline"></span>  <input id="<?php echo e($data[1]); ?>03" class="css-checkbox" type="checkbox" <?php if($schedule_data!='' && $schedule_data[$data[1].'03']==1){ echo "checked"; } ?> > <span class="checkmark"></span> </label></td>
                                    <td><label class="checkbox-container css-online"><span class="scheduleOnline"></span> <input id="<?php echo e($data[1]); ?>06" class="css-checkbox" type="checkbox" <?php if($schedule_data!='' && $schedule_data[$data[1].'06']==1){ echo "checked"; } ?> > <span class="checkmark"></span> </label></td>
                                    <td><label class="checkbox-container css-online"><span class="scheduleOnline"></span> <input id="<?php echo e($data[1]); ?>09" class="css-checkbox" type="checkbox" <?php if($schedule_data!='' && $schedule_data[$data[1].'09']==1){ echo "checked"; } ?> >  <span class="checkmark"></span> </label> </td>
                                    <td><label class="checkbox-container css-online"><span class="scheduleOnline"></span> <input id="<?php echo e($data[1]); ?>12" class="css-checkbox" type="checkbox" <?php if($schedule_data!='' && $schedule_data[$data[1].'12']==1){ echo "checked"; } ?> >  <span class="checkmark"></span> </label> </td>
                                    <td><label class="checkbox-container css-online"><span class="scheduleOnline"></span> <input id="<?php echo e($data[1]); ?>15" class="css-checkbox" type="checkbox" <?php if($schedule_data!='' && $schedule_data[$data[1].'15']==1){ echo "checked"; } ?>>  <span class="checkmark"></span> </label></td>
                                    <td><label class="checkbox-container css-online"><span class="scheduleOnline"></span> <input id="<?php echo e($data[1]); ?>18" class="css-checkbox" type="checkbox" <?php if($schedule_data!='' && $schedule_data[$data[1].'18']==1){ echo "checked"; } ?> > <span class="checkmark"></span> </label></td>
                                    <td><label class="checkbox-container css-online"><span class="scheduleOnline"></span> <input id="<?php echo e($data[1]); ?>21" class="css-checkbox" type="checkbox" <?php if($schedule_data!='' && $schedule_data[$data[1].'21']==1){ echo "checked"; } ?> >  <span class="checkmark"></span> </label></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
								<?php if($k%4!=0): ?>
								<tr class="<?php echo e($data[2]); ?>">
									<td colspan="12"></td>
								</tr>	
								<?php else: ?>
								<tr class="<?php echo e($data[2]); ?>">
									<td colspan="12"></td>
								</tr>	
								<tr class="<?php echo e($data[2]); ?>" style="font-weight: bold;">	
									<td></td>
                                    <td class="schedule_heading">Sun</td>
                                    <td class="schedule_heading">Mon</td>
                                    <td class="schedule_heading">Tue</td>
                                    <td class="schedule_heading">Wed</td>
                                    <td class="schedule_heading">Thu</td>
                                    <td class="schedule_heading">Fri</td>
                                    <td class="schedule_heading">Sat</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
								</tr>
								<?php endif; ?>
							<?php $k++; ?>	
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
                                </tbody>
                            </table>
							<div id="bottom_anchor"></div>
                        </div>
                    </div>
                </div>
						</fieldset>
						
						<fieldset>
			<div class="col-lg-12" style="padding-left:0px">
                <div class="ibox collapsed">
                    <div class="ibox-title" style="padding: 15px 0px 7px;">
                        <h3><span class="fa-stack fa-1x" >
							<i class="fa fa-circle fa-stack-2x"></i>
							<strong class="fa-stack-1x text-default" style="color:white">17</strong>
								</span> Teacher Spotlight Question:<span class="required required-text">optional</span>
						</h3>
						<div class="ibox-tools" style="text-align: left;">
							<div style=" font-size:12px">
								Answer any of these questions and they will be added to a group that will be featured on our landing pages, home page and social media pages. This will greatly increase the chances students view your profile and request you as a teacher. 
							</div>
							</br>
							<span id="show_hide_ques" style="color: #00aeef;">show questions</span>
                            <a class="">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content" style="border-width: 0; ">
						<div class="col-md-12" style="padding-top: 25px;">
							<?php $i=0 ?>
							<?php $__currentLoopData = $spotlightQuestion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
								<div class="form-group">
								<strong><?php echo e($question->title); ?> </strong> </br>
								<span  style="color:#00aeef;cursor:pointer" onclick="$('#each_details_<?php echo e($question->Id); ?>').toggle();" > <?php if(isset($teacherSpotlight[$i]->qid) && $teacherSpotlight[$i]->answer!=''): ?> Edit <?php else: ?> Answer this question. <?php endif; ?></span>
								   <div id="each_details_<?php echo e($question->Id); ?>" class="each_details" style="display: none;">
								   <textarea name="QuestionsModel[]" id="Question<?php echo e($i); ?>" rows="5" cols="110" class="form-control" onkeydown="checkWordLength(<?php echo e($i); ?>)"><?php if(isset($teacherSpotlight[$i]->qid) && $teacherSpotlight[$i]->answer!=''): ?> <?php echo e($teacherSpotlight[$i]->answer); ?> <?php endif; ?></textarea>
								   
								   <span style="color:red" id="questionUsedLimit<?php echo e($i); ?>" ><?php if(isset($teacherSpotlight[$i]->qid) && str_word_count($teacherSpotlight[$i]->answer)<27): ?> A minimum of 27 words is required. <?php endif; ?> </span>
								   </div>
								</div>
							<?php $i++; ?>	
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
						</div>
                    </div>
                </div>
            </div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Select profile headshot</h4>
      </div>
      <div class="modal-body" style="padding: 20px 10px 30px 10px !important;">
	  <div id="wrapper">
        <div class="row">
			<form enctype="multipart/form-data" id="upload_form" role="form" method="POST"  >
                <div class="col-lg-12">
					<div class="ibox-content" style="padding: 15px 15px 20px 15px !important;">
						<!-- onSubmit="return ImageValidate()"-->
						<span id="errorName5" style="color: red;">Required file types are: *.jpg, *.gif, *.png, *.jpeg</span>
					   <div class="fileinput fileinput-new input-group" data-provides="fileinput">
							<div class="form-control" data-trigger="fileinput">
								<i class="glyphicon glyphicon-file fileinput-exists"></i>
							<span class="fileinput-filename"></span>
							</div>
							<span class="input-group-addon btn btn-default btn-file">
								<span class="fileinput-new">Select file</span>
								<span class="fileinput-exists">Change</span>
								<input type="file" name="avatar" id="avatar" />
							</span>
							<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
						</div>
					</div>
                </div>
				<div class="col-sm-12">
					
					<button type="submit" name="step1" class="btn btn-primary" style="float: right;     margin-right: 23px;" id="submitbutton" value="" onclick="return ImageValidate();">Upload Profile Images</button>
				</div>
			</form>	
		</div> 
		</div> 
      </div>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
    </div>
 </div>
 <!-- Modal -->
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Select Gallery Image</h4>
      </div>
      <div class="modal-body" style="padding: 20px 10px 30px 10px !important;">
	  <div id="wrapper">
        <div class="row">
			<form enctype="multipart/form-data" id="gallery_upload_form" role="form" method="POST"  >
                <div class="col-lg-12">
					<div class="ibox-content" style="padding: 15px 15px 20px 15px !important;">
						<!-- onSubmit="return ImageValidate()"-->
						<span id="errorName6" style="color: red;">Required file types are: *.jpg, *.gif, *.png, *.jpeg</span>
					   <div class="fileinput fileinput-new input-group" data-provides="fileinput">
							<div class="form-control" data-trigger="fileinput">
								<i class="glyphicon glyphicon-file fileinput-exists"></i>
							<span class="fileinput-filename"></span>
							</div>
							<span class="input-group-addon btn btn-default btn-file">
								<span class="fileinput-new">Select file</span>
								<span class="fileinput-exists">Change</span>
								<input type="file" name="upload_files" id="upload_files" />
							</span>
							<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
						</div>
					</div>
                </div>
				<div class="col-sm-12">
					
					<button type="submit" name="step1" class="btn btn-primary" style="float: right;  margin-right: 23px;" id="submitbutton2" value="" onclick="return GalleryImageValidate();">Upload Images</button>
				</div>
			</form>	
		</div> 
		</div> 
      </div>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
    </div>
 </div>
 <!-- Modal -->
<div id="myModalVideo" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload A Welcome Video </h4>
      </div>
      <div class="modal-body" style="padding: 20px 10px 30px 10px !important;">
	  <div id="wrapper">
        <div class="row">
			<form enctype="multipart/form-data" id="upload_video" role="form" method="POST"  >
                <div class="col-lg-12">
					<div class="ibox-content" style="padding: 15px 15px 20px 15px !important;">
						<!-- onSubmit="return ImageValidate()"-->
						<span id="errorName7" style="color: red;"></span>
					   <div class="fileinput fileinput-new input-group" data-provides="fileinput">
							<div class="form-control" data-trigger="fileinput">
								<i class="glyphicon glyphicon-file fileinput-exists"></i>
							<span class="fileinput-filename"></span>
							</div>
							<span class="input-group-addon btn btn-default btn-file">
								<span class="fileinput-new">Select file</span>
								<span class="fileinput-exists">Change</span>
								<input type="file" name="video" id="video" />
							</span>
							<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
						</div>
					</div>
                </div>
				<div class="col-sm-12">
					
					<button type="submit" name="step1" class="btn btn-primary" style="float: right; margin-right: 23px;" id="submitbutton" value="" onclick="return videoValidate();">Upload Video</button>
				</div>
			</form>	
		</div> 
		</div> 
      </div>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
    </div>
 </div>
<!-- Modal -->
<div id="myModalVideo2" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload A Performance Or Lesson Video </h4>
      </div>
      <div class="modal-body" style="padding: 20px 10px 30px 10px !important;">
	  <div id="wrapper">
        <div class="row">
			<form enctype="multipart/form-data" id="upload_video2" role="form" method="POST"  >
                <div class="col-lg-12">
					<div class="ibox-content" style="padding: 15px 15px 20px 15px !important;">
						<!-- onSubmit="return ImageValidate()"-->
						<span id="errorName8" style="color: red;"></span>
					   <div class="fileinput fileinput-new input-group" data-provides="fileinput">
							<div class="form-control" data-trigger="fileinput">
								<i class="glyphicon glyphicon-file fileinput-exists"></i>
							<span class="fileinput-filename"></span>
							</div>
							<span class="input-group-addon btn btn-default btn-file">
								<span class="fileinput-new">Select file</span>
								<span class="fileinput-exists">Change</span>
								<input type="file" name="video2" id="video2" />
							</span>
							<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
						</div>
					</div>
                </div>
				<div class="col-sm-12">
					
					<button type="submit" name="step1" class="btn btn-primary" style="float: right; margin-right: 23px;" id="submitbutton" value="" onclick="return videoValidate2();">Upload Video</button>
				</div>
			</form>	
		</div> 
		</div> 
      </div>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
    </div>
 </div>
 <div class="video-pop-up-box" style="display:none">
	<div class="player-box">
		<video width="100%" controls>
		  <source src="<?php echo e(storage_path('media/Teacher_Welcome.mp4')); ?>" type="video/mp4">
		</video>
		<div class="vid-close">X</div>
	</div>
</div>
<div class="video-pop-up-box2" style="display:none">
	<div class="player-box">
		<video width="100%" controls>
		  <source src="<?php echo e(storage_path('media/Teacher_Boundary_Map_Final.mp4')); ?>" type="video/mp4">
		</video>
		<div class="vid-close2">X</div>
	</div>
</div>
<div class="modal fade" id="table-modal" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Profile Level Details</h4>
        </div>
        <div class="modal-body" style="padding: 0px 8px 0px 8px;"> 
          <!-- Start Of The Table Structure -->
				<p>Your current profile completeness is: <?php echo e($completenss[$teaches['profile_completenss']]); ?>. To reach higher levels, review the profile content requirements. The benefits of each level are also listed below.</p>
			<div id="wrapper">
			<div class="row">
				<div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content"  style="overflow: auto; " id="table-container" >
                            <table class="table table-hover blue-heading-table" style="font-size: 14px;" id="">
                                <thead>
                                <tr>
									<th>Requirements</th>
									<th>70%</th>
									<th>80%</th>
									<th>90%</th>
									<th>100%</th>
								</tr>
                                </thead>
                                <tbody>
                                <tr>
									<td>Set your travel radius and/or studio location(s)</td>
									<td>Req.</td>
									<td>Req.</td>
									<td>Req.</td>
									<td>Req.</td>
								</tr>
								<tr>
									<td>Main profile picture</td>
									<td>Req.</td>
									<td>Req.</td>
									<td>Req.</td>
									<td>Req.</td>
								</tr>
								<tr>
									<td>About me section</td>
									<td>80 words</td>
									<td>80 words</td>
									<td>80 words</td>
									<td>80 words</td>
								</tr>
								<tr>
									<td>My experience section</td>
									<td>80 words</td>
									<td>80 words</td>
									<td>80 words</td>
									<td>80 words</td>
								</tr>
								<tr>
									<td>My methods section</td>
									<td>80 words</td>
									<td>80 words</td>
									<td>80 words</td>
									<td>80 words</td>
								</tr>
								<tr>
									<td>My teaching style section</td>
									<td>80 words</td>
									<td>80 words</td>
									<td>80 words</td>
									<td>80 words</td>
								</tr>
								<tr>
									<td>Additional photos</td>
									<td></td>
									<td>2+</td>
									<td>2+</td>
									<td>2+</td>
								</tr>
								<tr>
									<td>Reviews:Students can write you a review <a href="https://www.musikalessons.com/teachers/<?php echo e($teaches['urlName']); ?>">here</a> <BR>Share it with them!</td>
									<td></td>
									<td>4+</td>
									<td>6+</td>
									<td>8+</td>
								</tr>
								<tr>
									<td>Performance or lesson video</td>
									<td></td>
									<td>Req.</td>
									<td>Req.</td>
									<td>Req.</td>
								</tr>
								<tr>
									<td>Welcome video</td>
									<td></td>
									<td></td>
									<td>Req.</td>
									<td>Req.</td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			</div>		
			<div id="wrapper">
			<div class="row">
				<div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content"  style="overflow: auto; " id="table-container" >
                            <table class="table table-hover blue-heading-table" style="font-size: 14px;" id="">
                                <thead>
                                <tr>
									<th>Benefits</th>
									<th>Incomplete</th>
									<th>70%</th>
									<th>80%</th>
									<th>90%</th>
									<th>100%</th>
								</tr>
                                </thead>
                                <tbody>
                                <tr>
									<td>Profile will appear in search results</td>
									<td></td>
									<td><span class="glyphicon glyphicon-ok blue"></span></td>
									<td><span class="glyphicon glyphicon-ok blue"></span></td>
									<td><span class="glyphicon glyphicon-ok blue"></span></td>
									<td><span class="glyphicon glyphicon-ok blue"></span></td>
								</tr>
								<tr>
									<td>Receive student email leads from us</td>
									<td></td>
									<td><span class="glyphicon glyphicon-ok blue"></span></td>
									<td><span class="glyphicon glyphicon-ok blue"></span></td>
									<td><span class="glyphicon glyphicon-ok blue"></span></td>
									<td><span class="glyphicon glyphicon-ok blue"></span></td>
								</tr>
								<tr>
									<td>Eligible to be a “featured teacher” at the top of search results</td>
									<td></td>
									<td></td>
									<td><span class="glyphicon glyphicon-ok blue"></span></td>
									<td><span class="glyphicon glyphicon-ok blue"></span></td>
									<td><span class="glyphicon glyphicon-ok blue"></span></td>
								</tr>
								<tr>
									<td>Eligible to be a “featured teacher” on our homepage</td>
									<td></td>
									<td></td>
									<td></td>
									<td><span class="glyphicon glyphicon-ok blue"></span></td>
									<td><span class="glyphicon glyphicon-ok blue"></span></td>
								</tr>
								<tr>
									<td>Receive promotion on our social media. 30,000+ followers</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td><span class="glyphicon glyphicon-ok blue"></span></td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			</div>		
			<!-- End Of Table Structure -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
	<!-- End Of Table Pop Up -->
 <div class="loader-modal" style="display: none">
	<div class="center">
		<img alt="" src="<?php echo e(asset('img/ajax-loader2.gif')); ?>" />
		
	</div>
</div>

<?php if(isset($VideoInfo1->type)): ?>
	<?php if($VideoInfo1->type=='File'): ?>
		<?php 
			$fileName = explode('/uploads/videos/',$VideoInfo1->file);
			$fileUrl = url('public/videos').'/'.$fileName[1];
		?> 
		<div id="vidBox">
			<div id="videCont">
			<video id="v1"  controls>
				<source src="<?php echo e($fileUrl); ?>">
			</video>
			</div>
		</div>
	<?php endif; ?>
<?php endif; ?>	
<?php if(isset($VideoInfo2->type)): ?>
	<?php if($VideoInfo2->type=='File'): ?>
		<?php 
			$fileName = explode('/uploads/videos/',$VideoInfo2->file);
			$fileUrl = url('public/videos').'/'.$fileName[1];
		?>
		<div id="vidBox2">
			<div id="videCont2">
			<video id="v2"  controls>
				<source src="<?php echo e($fileUrl); ?>">
			</video>
			 </div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<div class="col-sm-12">
<nav id="updssave_btn" class="navbar navbar-fixed-bottom" role="navigation" style="min-height:50px;background-color:transparent;margin-bottom:5px;">
<div class="savebutton"><button type="button" id="save-teacher" class="submit_btn" onclick="profileUpdate();">SAVE YOUR CHANGES</button></div>
</nav>
</div>	
<?php $__env->stopSection(); ?>	
<!---->
<?php //print_r($TeachersPolygons);data-toggle="modal" data-target="#myModal" ?>
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
$(document).ready(function(){
	// $(window).scrollTop(0);
	$(".loader").hide();
});

</script>
	<script src="<?php echo e(asset('js/plugins/ionRangeSlider/ion.rangeSlider.min.js')); ?>"></script>
    <!-- Steps -->
    <script src="<?php echo e(asset('js/plugins/steps/jquery.steps.min.js')); ?>"></script>
	<!-- Jasny -->
    <script src="<?php echo e(asset('js/plugins/jasny/jasny-bootstrap.min.js')); ?>"></script>
    <!-- Jquery Validate -->
    <script src="<?php echo e(asset('js/plugins/validate/jquery.validate.min.js')); ?>"></script>
 <script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=Aipg-wNL6BOU70PIhj7IY1iosSWzMBKnnpDqw9P8uPnbTkSetwTKg4KdFkQdj3ej' async defer></script>
<script src="<?php echo e(asset('js/jquery-confirm.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.cookie.js')); ?>"></script>
 <script src="<?php echo e(asset('js/videopopup.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/YouTubePopUp.jquery.js')); ?>"></script>
<script type="text/javascript" src="https://www.musikalessons.com/themes/musika_res/js/jqueryrotate.js"></script>
<!---->
<script src="https://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
<!---->
<script>
	CKEDITOR.replace( 'teacherTraining', {
		height: 160,
	} );
	CKEDITOR.replace( 'teacherDegrees', {
		height: 160,
	} );
</script>
<script>

function checkWordLength(q_no){
	var wordLen = 27,
	 len; // Maximum word length
	len = $('#Question'+q_no).val().split(/[\s]+/);
	/* if (len.length > wordLen) { 
		if ( event.keyCode == 46 || event.keyCode == 8 ) {// Allow backspace and delete buttons
		} else if (event.keyCode < 48 || event.keyCode > 57 ) {//all other buttons
			//event.preventDefault();
		}
	} */
	console.log(len.length + " words are typed out of an available " + wordLen);
	if(len.length<27){
		$('#questionUsedLimit'+q_no).html('A minimum of 27 words is required.');
		$('#questionUsedLimit'+q_no).css('color','red');
	}else{
		$('#questionUsedLimit'+q_no).html('You have entered the minimum characters required; however you can add more if you like.');
		$('#questionUsedLimit'+q_no).css('color','green');
	}
}

/* $.each($("textarea[name='QuestionsModel[]']"), function(){            
		favorite.push($.trim($(this).val()));
	}); */

/* var wordLen = 20,
	 len; // Maximum word length
$('#Question1').keydown(function(event) {	
	len = $('#Question1').val().split(/[\s]+/);
	if (len.length > wordLen) { 
		if ( event.keyCode == 46 || event.keyCode == 8 ) {// Allow backspace and delete buttons
    } else if (event.keyCode < 48 || event.keyCode > 57 ) {//all other buttons
    	//event.preventDefault();
    }
	}
	console.log(len.length + " words are typed out of an available " + wordLen);
	wordsLeft = (wordLen) - len.length;
	$('.words-left').html(wordsLeft+ ' words left');
	if(wordsLeft == 0) {
		$('.words-left').css({
			'background':'red'
		}).prepend('<i class="fa fa-exclamation-triangle"></i>');
	}
}); 

 */
var angle = 0;
function rotateimg() {
	angle += 90;
	
	//alert(angle);
	//$("#save-avatar").show();
	$("#rotoate_message").show();
	//$("#avatar-image").rotate(angle);
	$("#profileimage").rotate(angle);
	$("#img_rotate_angle").val(angle);
	$("#lineBreak").html('<br>');
}


function saveAvatar(){
	var angle=$("#img_rotate_angle").val();
	console.log(angle);
	var csrf_token = $("input[name=_token]").val();
	$.ajax({
		url: "<?php echo url('/imgRotate') ?>",
		data: {
			angle:angle,
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
			//location.reload();
			if(response.status=='true')
			{
				$("#rotoate_message").hide();
			}
		},
		error: function(e){
			console.log(e.responseText);
		}
	});
	return false;
}



$('.ibox-title').on('click', function () {
		var showHideButton = $(this).find('#show_hide_ques').text();;
		console.log(showHideButton);
		if(showHideButton=='show questions'){
			var html = 'hide questions';
			$("#show_hide_ques").html(html);
		}else
		{
			var html = 'show questions';
			$("#show_hide_ques").html(html);
		}
        $(this).css('cursor','pointer');
          var ibox = $(this).closest('div.ibox');
        var button = $(this).find('i');
        var content = ibox.children('.ibox-content');
        content.slideToggle(200);
        //button.toggleClass('fa-chevron-up').toggleClass('fa-chevron-down');
        ibox.toggleClass('').toggleClass('border-bottom');
        setTimeout(function () {
            ibox.resize();
            ibox.find('[id^=map-]').resize();
        }, 50);
    });
	</script>
	<script type="text/javascript">
$(document).ready(function(){
	//$('#calendar div.fc-button-group button.fc-month-button').css('display', 'none');	
		window.mobilecheck = function() {
		  var check = false;
		  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
		  return check;
		};
		/** for word count in text areas **/
	if($('#aboutTeacher').val().length < 500 ){
		$('#aboutTeacherLimit').html('A minimum of 500 characters is required.');
		$('#aboutTeacherLimit').css('color','red');
		}
		else {
		$('#aboutTeacherLimit').html('You have entered the minimum characters required; however you can add more if you like.');
		$('#aboutTeacherLimit').css('color','green');
		}
		if($('#experience').val().length<500){
		$('#experienceLimit').html('A minimum of 500 characters is required.');
		$('#experienceLimit').css('color','red');
		} else {
		$('#experienceLimit').html('You have entered the minimum characters required; however you can add more if you like.');
		$('#experienceLimit').css('color','green');
		}
		if($('#methodsUsed').val().length < 500){
		$('#methodsUsedLimit').html('A minimum of 500 characters is required.');
		$('#methodsUsedLimit').css('color','red');
		} else {
		$('#methodsUsedLimit').html('You have entered the minimum characters required; however you can add more if you like.');
		$('#methodsUsedLimit').css('color','green');
		}
		if($('#lessonsStyle').val().length<500){
		$('#lessonsStyleLimit').html('A minimum of 500 characters is required.');
		$('#lessonsStyleLimit').css('color','red');
		}	else {
		$('#lessonsStyleLimit').html('You have entered the minimum characters required; however you can add more if you like.');$('#lessonsStyleLimit').css('color','green');
		}
		$('#aboutTeacher').keyup(function() {
			var text_length = $('#aboutTeacher').val().length;
			var more_needed = 500 - text_length;
			if(text_length < 500 ){
			$('#aboutTeacherLimit').html(more_needed +' more characters required!');
			$('#aboutTeacherLimit').css('color','red');
			}
			else  if(text_length > 499){ $('#aboutTeacherLimit').html('You have entered the minimum characters required; however you can add more if you like.');$('#aboutTeacherLimit').css('color','green');
			}
		});
		$('#experience').keyup(function() {
			var text_length = $('#experience').val().length;
			var more_needed = 500 - text_length;
			if(text_length < 500 ){$('#experienceLimit').html(more_needed +' more characters required!'); 
			$('#experienceLimit').css('color','red');}
			else if(text_length > 499) {$('#experienceLimit').html('You have entered the minimum characters required; however you can add more if you like.');$('#experienceLimit').css('color','green');}
		});
		$('#methodsUsed').keyup(function() {
			var text_length = $('#methodsUsed').val().length;
			var more_needed = 500 - text_length;
			if(text_length < 500 ){$('#methodsUsedLimit').html(more_needed +' more characters required!');
			$('#methodsUsedLimit').css('color','red');}
			else if(text_length > 499) {$('#methodsUsedLimit').html('You have entered the minimum characters required; however you can add more if you like.');$('#methodsUsedLimit').css('color','green');}
		});
		$('#lessonsStyle').keyup(function() {
			var text_length = $('#lessonsStyle').val().length;
			var more_needed = 500 - text_length;
			if(text_length < 500 ) {$('#lessonsStyleLimit').html(more_needed +' more characters required!');
			$('#lessonsStyleLimit').css('color','red');}
			else if(text_length > 499) {$('#lessonsStyleLimit').html('You have entered the minimum characters required; however you can add more if you like.');$('#lessonsStyleLimit').css('color','green');}
		});
	/** for word count in text areas **/
	var compt_hgt = $(".profile-info").height() + $(".footer").height() + $(".navbar-fixed-top").height() - $(window).height() -1400;
	$(window).scroll(function(){
	//console.log("comp hgt "+ compt_hgt);
	//console.log("scroll top "+ $(this).scrollTop());
		if($(this).scrollTop() >= 310 && $(this).scrollTop() <= compt_hgt) {
			$("body").find(".sticky_box").addClass("fix-stricky");
			$("body").find(".sticky_box").removeClass("fix-stricky-b");
			$("body").find("#updssave_btn").removeClass("fix-stricky-bs");
		}
		else if($(this).scrollTop() >= compt_hgt){
			$("body").find(".sticky_box").removeClass("fix-stricky");
			$("body").find(".sticky_box").addClass("fix-stricky-b");
			$("body").find("#updssave_btn").addClass("fix-stricky-bs");
		}
		else {
			$("body").find(".sticky_box").removeClass("fix-stricky");
			$("body").find("#updssave_btn").removeClass("fix-stricky-bs");
		}
	});
		if(window.mobilecheck())
		{
			$(".scheduleHome").html('H');
			$(".scheduleStudio").html('S');
			$(".scheduleOnline").html('O');			
			$(".schedule_heading").css('font-size', '11px');			
			$("#legend").css('display','block');
			$('#table-container').css('height','auto');
		}
		else
		{
			if($(window).width()>=768 && $(window).width()<1024)
			{
				$(".scheduleHome").html('H');
				$(".scheduleStudio").html('S');
				$(".scheduleOnline").html('O');			
				$(".schedule_heading").css('font-size', '13px');			
				$("#legend").css('display','block');
			}
			else{
				$("#legend").css('display','none');
				$(".scheduleHome").html('Home');
				$(".scheduleStudio").html('Studio');
				$(".scheduleOnline").html('Online');	
			}
		}
console.log($(window).width());
$(".wizard").find(".steps li").addClass('done');	
	$(".wizard").find(".steps li.current").removeClass('done');	
});	 
	</script>
<script type="text/javascript">
	$(function(){
		$("a.bla-1").YouTubePopUp();
		$("a.bla-2").YouTubePopUp( { autoplay: 0 } ); 
	});
	$('#form').on('click', '#checkAll', function() {
		//alert("ff");
		$('#selectAllChkbx input:checkbox').prop('checked', this.checked);    
	});
	$('#form').on('click', '#allHome', function() {
		$('.css-home input:checkbox').prop('checked', this.checked);    
	});
	$('#form').on('click', '#allStudio', function() {
		$('.css-studio input:checkbox').prop('checked', this.checked);    
	});
	$('#form').on('click', '#allOnline', function() {
		$('.css-online input:checkbox').prop('checked', this.checked);    
	});
</script>
<script type="text/javascript">
	$(function () {
	   $('#vidBox').VideoPopUp({
			backgroundColor: "#17212a",
			opener: "video1",
			maxweight: "340",
			idvideo: "v1"
		});
		$('#vidBox2').VideoPopUp2({
			backgroundColor: "#17212a",
			opener: "video11",
			maxweight: "340",
			idvideo: "v2"
		});
	});
</script>
<script>
	function emptyWeekday(){
		var i,final1 = [],arr2 = [];
		var polydata = <?php echo $TeacherPolygonsData ?>;
		for(i=0; i < polydata.length; i++){
			var arr1 = [];
			$.each($("input[name='day_week"+i+"[]']:checked"), function(){         
				var values = $(this).val();
				//final1 += values;
				 arr1.push(values);
			});
			if(arr1.length === 0) 
			{
				$.alert({ title: 'Alert!', content: 'Warning: You must have at least one day selected for an area. If you wish to delete the area, click the trash can.',});
				//return false;
			}
			arr2.push(arr1);
		}
		console.log(arr2);	
		/* 	$.each($("input[name='day_week0[]']:checked"), function(){         
				var values = $(this).val();
				//final1 += values;
				 final1.push(values);
			});
			 */
	}
	function profileUpdate(){
		
		var error_messages = new Array();
		$.cookie('myCookie', 'profileUpdate');
		$(".loader-modal").show();
		var primage = $('#profileimage').attr('src');
		var primages = primage.split("/");
		var primg = primages[primages.length-1];
		if(primg == 'profile.png'){
			error_messages.push("You must select at profile image!");
		}
		var favorite = [], validateMsg='';
		$.each($("input[name='instruments[]']:checked"), function(){            
			favorite.push($(this).val());
		});
		var instrument = favorite.join(",");
		 if(instrument=='' || favorite.length == 0 )
		{
			error_messages.push("You must select at least one instrument!");
		}
		else
		{ 
			var csrf_token = $("input[name=_token]").val();
			$.ajax({
				url: "<?php echo url('/updateInstrument') ?>",
				data: {
					instrumentIds:instrument,
					_token: csrf_token
				},
				type: 'POST',
				dataType: 'json',
				success: function(response){
					if(response.status=='true')
					{
					}
				},
				error: function(e){
					console.log(e.responseText);
				}
			});
		}
		var MapTeachesHome = $('input[name=teachesHome]:checked').val();
		var MapTeachesStudio = $('input[name=teachesStudio]:checked').val();
		var onlineLessons = $('input[name=online_lessons]:checked').val();
		if(MapTeachesHome==''){
			error_message.push("You must choose either Yes or No for teaching in home lessons!");
		}
		if(MapTeachesStudio==''){
			error_message.push("You must choose either Yes or No for teaching in studio!");
		}
		if(onlineLessons==''){
			error_message.push("You must choose either Yes or No for teaching online lessons!");
		}
		if(onlineLessons=='yes'){
			var MapOnline_lessons = 1;
		}
		else if(onlineLessons=='no'){
			var MapOnline_lessons = 0;
		}
		var csrf_token = $("input[name=_token]").val();
		$.ajax({
			url: "<?php echo url('/teachSection') ?>",
			data: {
				type: 'new',
				teachesHome:MapTeachesHome,
				teachesStudio:MapTeachesStudio,
				online_lessons:MapOnline_lessons,
				checkOnlineLessons:onlineLessons,
				_token: csrf_token
			},
			type: 'POST',
			dataType: 'json',
			success: function(response){
			},
			error: function(e){
			}
		});
		var i,arr2 = [],data, t_id, polygnid,t_ids = [],polygnids = [];
		var polydata = <?php echo $TeacherPolygonsData ?>;
		for(i=0; i < polydata.length; i++){
			var arr1 = [];
			$.each($("input[name='day_week"+i+"[]']:checked"), function(){         
				var values = $(this).val();
				arr1.push(values);
			});
			var arr1 = arr1.join(",");
			arr2.push(arr1);
			t_id = $("#t_id"+i).val();
			t_ids.push(t_id);
			polygnid = $("#polygnid"+i).val();
			polygnids.push(polygnid);
		}
		var final1 = [];
		$.each($("input[name='day_week0[]']:checked"), function(){         
			var values = $(this).val();
			 final1.push(values);
		});
		if(arr2.length === 0) 
		{
		} else{
			var csrf_token = $("input[name=_token]").val();
			$.ajax({
				url: "<?php echo url('/updateTeritoryLocationsDays') ?>",
				data: {
					polyIds: polygnids,
					teacherIds:t_ids,
					weekdays:arr2,
					_token: csrf_token
				},
				type: 'POST',
				dataType: 'json',
				success: function(response){
					console.log(response);
					if(response.status=='true')
					{
					}
				},
				error: function(e){
					console.log(e.responseText);
				}
			});
		}			
		var fromRange1 = $("#fromRange1").val();
		var toRange1 = $("#toRange1").val();
		var fromRange2 = $("#fromRange2").val();
		var toRange2 = $("#toRange2").val();
		if(fromRange1 == '' && toRange1 == ''){
			fromRange1 = '<?php echo $teaches['agesTought1'] ?>';
			toRange1 = '<?php echo $teaches['agesTought2'] ?>';
		}
		if(fromRange2 == '' && toRange2 == '')	{
			 fromRange2 = '<?php echo $teaches['levelTought1'] ?>';
			 toRange2 = '<?php echo $teaches['levelTought2'] ?>';
		}
		if(fromRange2=='0'){
			fromRange2 = 1;
		}
    	var csrf_token = $("input[name=_token]").val();
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
				if(response.status=='true')	{
				}
			},
			error: function(e){
			}
		});
	var favorite = [];
		$.each($("input[name='teachesHome']:checked"), function(){            
			favorite.push($(this).val());
		});
		var style = favorite.join(",");
		var doesTeachHome = 0;
		if(style=='' || favorite.length == 0 ){
		} else {
			doesTeachHome=1;
		}
		$.each($("input[name='teachesStudio']:checked"), function(){            
			favorite.push($(this).val());
		});
		var style = favorite.join(",");
		var doesTeachStudio = 0;
		if(style=='' || favorite.length == 0 )
		{
		}	else {
			doesTeachStudio = 1;
			sl = studioMap.entities.getLength();
			if(sl == 0) {
				error_messages.push("You must provide at least one studio location!");
			}
		}
		if(doesTeachStudio ==1 && doesTeachHome==1){
			var teachesHome = $('input[name=teachesHome]:checked').val();
			var teachesStudio = $('input[name=teachesStudio]:checked').val();
			var online_lessons = $('input[name=online_lessons]:checked').val();
			var csrf_token = $("input[name=_token]").val();
			$.ajax({
				url: "<?php echo url('/StudiosLocations') ?>",
				data: {
					type: 'new',
					latitute:'',
					longitude:'',
					teachesHome:teachesHome,
					teachesStudio:teachesStudio,
					online_lessons:online_lessons,
					_token: csrf_token
				},
				type: 'POST',
				dataType: 'json',
				success: function(response){
						if(response.status=='true'){
					}
				},
				error: function(e){
				}
			}); 
		}
		var favorite = [];
		$.each($("input[name='styles[]']:checked"), function(){            
			favorite.push($(this).val());
		});
		var style = favorite.join(",");
		 if(style=='' || favorite.length == 0 )		{
			error_messages.push('You must select at least one teaching style!');
		}
		else
		{ 
			var csrf_token = $("input[name=_token]").val();
			$.ajax({
				url: "<?php echo url('/updateStyles') ?>",
				data: {
					styleId:style,
					_token: csrf_token
				},
				type: 'POST',
				dataType: 'json',
				success: function(response){
					if(response.status=='true'){
					}
				},
				error: function(e){
				}
			}); 
		}
		error_messages2 = fifthStep();
		error_messages3 = seventhStep();
		error_messages4 = ScheduleStep();
		error_messages5 = ninthStep();
		error_messages6 = tenthStep();
		//$(".loader-modal").hide();
		console.log("Completed saving");
		var errmsg = '';
		if(error_messages.length>0)for(i=0; i < error_messages.length; i++){
			errmsg += "<span style='color:red'><li>" + error_messages[i] + "</li></span>" + "<br>";
		}
		if(error_messages2.length>0)for(i=0; i < error_messages2.length; i++){
			errmsg += "<span style='color:red'><li>" +error_messages2[i] + "</li></span>"+ "<br>";
		}
		if(error_messages3.length>0)for(i=0; i < error_messages3.length; i++){
			errmsg += "<span style='color:red'><li>" +error_messages3[i] + "</li></span>"+ "<br>";
		}
		if(error_messages4.length>0)for(i=0; i < error_messages4.length; i++){
			errmsg += "<span style='color:red'><li>" +error_messages4[i] + "</li></span>" + "<br>";
		}
		//$.alert({ title: 'Alert!', content: '<span style=\'color:red\'>Changes have been saved however your profile is not visible to students untill you fix following errors.</span> <br><br>'+ errmsg,});
		//location.reload();
	}
	function delpoly(poly_id,teacher_id)
	{
		//alert(poly_id+' '+teacher_id); return false;
		// this function is not used. 
		var csrf_token = $("input[name=_token]").val();n
		$.ajax({
			url: "<?php echo url('/deletePolygon') ?>",
			data: {
				polygonId:poly_id,
				teacherId:teacher_id,
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
				if(response.status=='true')
				{
					//$.alert({ title: 'Alert!', content: 'Travel boundary deleted successfully!',});
					//profileUpdate();
					// This function is not used. 
					map.entities.remove(centroid);
					map.entities.remove(polygon);
					location.reload();
				}
			},
			error: function(e){
				console.log(e.responseText);
			}
		});
	}
	function teacherMap()
	{
		var teachesHome = $('input[name=teachesHome]:checked').val();
		if(teachesHome=="no")
		{
			$("#tmap").removeAttr('style').css('display', 'none');
		}
		else
		{
			$("#tmap").removeAttr('style').css('display', 'block');
		}
		return false;
	}
	function teachesStudioMap()
	{
		var teachesStudio = $('input[name=teachesStudio]:checked').val();
		if(teachesStudio=="no")
		{
			$("#smap").removeAttr('style').css('display', 'none');
		}
		else
		{
			$("#smap").removeAttr('style').css('display', 'block');
		}
		return false;
	}
	function firststep(){
		var favorite = [];
		$.each($("input[name='instruments[]']:checked"), function(){            
			favorite.push($(this).val());
		});
		var instrument = favorite.join(",");
		if(instrument=='')
		{
			//$.alert({ title: 'Alert!', content: 'You must select at least one instrument!',});
			//return false;
		}
		var csrf_token = $("input[name=_token]").val();
		$.ajax({
			url: "<?php echo url('/updateInstrument') ?>",
			data: {
				instrumentIds:instrument,
				_token: csrf_token
			},
			type: 'POST',
			dataType: 'json',
			success: function(response){
				console.log(response);
				if(response.status=='true')
				{
					$.alert({ title: 'Alert!', content: 'Instruments updated successfully!',});
				}
			},
			error: function(e){
				console.log(e.responseText);
			}
		}); 
		return false;
	}
	function secondstep()
	{
		for(var i=0; i<10;i++ )
		{
			var currentli = $($('.steps').find('a#form-t-'+i)).parent().attr('class');
			var disabled_area = $($('.steps').find('a#form-t-'+i)).parent().attr('aria-disabled');
			var selected_area = $($('.steps').find('a#form-t-'+i)).parent().attr('aria-selected');
			//console.log(currentli+' '+disabled_area+' '+selected_area);
		}
		return false;
	}
	function fourthstep(){
		var favorite = [];
		$.each($("input[name='styles[]']:checked"), function(){            
			favorite.push($(this).val());
		});
		var style = favorite.join(",");
		if(style=='')
		{
			//$.alert({ title: 'Alert!', content: 'You must select at least one Style!',});
			//return false;
		}
		var csrf_token = $("input[name=_token]").val();
		$.ajax({
			url: "<?php echo url('/updateStyles') ?>",
			data: {
				styleId:style,
				_token: csrf_token
			},
			type: 'POST',
			dataType: 'json',
			success: function(response){
				console.log(response);
				if(response.status=='true')
				{
					$.alert({ title: 'Alert!', content: 'Styles updates successfully!',});
				}
			},
			error: function(e){
				console.log(e.responseText);
			}
		}); 
		return false;
	}
	function fifthStep(){
		var TeachersModeltraining, i, trainingArray = [],awardValue = '', degreeName='';
		var degreeCounter = $("#degreeCounter").val();
		 error_messages = new Array();
		var userdate = '<?php echo $teaches['newUser']; ?>';
		//console.log(userdate);
		if(userdate == 'yes'){
			for(i=1; i<=degreeCounter; i++)
			{
				var TeachersModeltraining = $("#TeachersModeltraining"+i).val();
				var firstDegreeSchoolName = $("#degreeSchoolName1").val();
				var degreeSchoolName = $("#degreeSchoolName"+i).val();
				console.log(TeachersModeltraining+' | '+degreeSchoolName);
				if(TeachersModeltraining!=''){
					if(degreeSchoolName=='')
					{
						degreeName += '- '+TeachersModeltraining+'</br>';
						//console.log(degreeName);
					}
					console.log(degreeName);
					var value = TeachersModeltraining+': '+degreeSchoolName;
					trainingArray.push(value);
				}
			}
			if(trainingArray.length ==0){
			  //error_messages.push("You must select at least one degree!");
			}
			var training = trainingArray.join(", ");
			$.each($("input[name='award_achievement[]']"), function(){            
				if($(this).val()!=''){
					awardValue += '<p>'+$(this).val()+'</p>';
				}
			});
			if(training==""){
				error_messages.push("You must select at least one degree!");
			}
			//console.log(training+' '+degreeName+'t');
			/* if(degreeName==''){
				error_messages.push("You must select at least one degree!");
			} */
		}
		else{
			training = CKEDITOR.instances.teacherTraining.getData();//$("#teacherTraining").val();
			awardValue = CKEDITOR.instances.teacherDegrees.getData();//$("#teacherDegrees").val();
			
			if($.trim(training)==''){
				error_messages.push("You must enter the Degrees and Education!");
			}
		}
		//console.log(training+' '+awardValue);
		//return false;
		var csrf_token = $("input[name=_token]").val();
		$.ajax({
			url: "<?php echo url('/updateDegreeAward') ?>",
			data: {
				training:training,
				awardValue:awardValue,
				_token: csrf_token
			},
			type: 'POST',
			dataType: 'json',
			success: function(response){
				if(response.status=='true')
				{
				}
			},
			error: function(e){
				console.log("not saved degress");
			}
		}); 
		if(error_messages.length>0) return error_messages;
		else return true;
	}
function ValidateSize(file) {
        var FileSize = file.files[0].size / 1024 / 1024; // in MB
        if (FileSize > 2) {
            alert('File size exceeds 2 MB');
           // $(file).val(''); //for clearing with Jquery
        } else {
        }
    }
function ImageValidate()
{
	//return true;
     var image =document.getElementById("avatar").value;
	//alert(image);
     if(image!='')
     {
           var checkimg = image.toLowerCase();
          if (!checkimg.match(/(\.jpg|\.png|\.JPG|\.PNG|\.jpeg|\.JPEG)$/)){ // validation of file extension using regular expression before file upload
              document.getElementById("avatar").focus();
              document.getElementById("errorName5").innerHTML="Wrong file selected. Required file formats: *.jpg, *.png"; 
              return false;
           }
            var img = document.getElementById("avatar"); 
            //alert(img.files[0].size);
			var FileSize = img.files[0].size / 1024 / 1024; // in MB
			if (FileSize > 8) {
				//alert('File size exceeds 2 MB');
			   document.getElementById("errorName5").innerHTML="File size should be less than 8 MB.";
				return false;
			}
			/* if(img.files[0].size >  2048)  // validation according to file size
            {
            document.getElementById("errorName5").innerHTML="Image size too short";
            return false;
             } */
             return true;
      }
	  else{
		  document.getElementById("errorName5").innerHTML="Please select image. Required file types are: *.jpg, *.gif, *.png, *.jpeg ";
		  return false;
	  }
}
function GalleryImageValidate()
{
     var image =document.getElementById("upload_files").value;
     if(image!='')
     {
           var checkimg = image.toLowerCase();
          if (!checkimg.match(/(\.jpg|\.png|\.JPG|\.PNG|\.jpeg|\.JPEG)$/)){ // validation of file extension using regular expression before file upload
              document.getElementById("upload_files").focus();
              document.getElementById("errorName6").innerHTML="Wrong file selected. Supported file formats: *.jpg, *.png"; 
              return false;
           }
            var img = document.getElementById("upload_files"); 
            //alert(img.files[0].size);
			var FileSize = img.files[0].size / 1024 / 1024; // in MB
			if (FileSize > 8) {
				//alert('File size exceeds 2 MB');
			   document.getElementById("errorName6").innerHTML="File size should be less than 8 MB.";
				return false;
			}
			/* if(img.files[0].size >  2048)  // validation according to file size
            {
            document.getElementById("errorName5").innerHTML="Image size too short";
            return false;
             } */
             return true;
      }
	  else{
		  document.getElementById("errorName6").innerHTML="Please select an image. Required file types are: *.jpg, *.gif, *.png, *.jpeg";
		  return false;
	  }
}
function videoValidate()
{
     var image =document.getElementById("video").value;
	// alert(image);
	//return false;
     if(image!='')
     {
           var checkimg = image.toLowerCase();
          if (!checkimg.match(/(\.mp4)$/)){ // validation of file extension using regular expression before file upload
              document.getElementById("video").focus();
              document.getElementById("errorName7").innerHTML="Wrong file selected. Required file formats: *.mp4 only."; 
              return false;
           }
            var img = document.getElementById("video"); 
			var FileSize = img.files[0].size / 1024 / 1024; // in MB
			//alert(FileSize);
            //return false;
			if (FileSize > 500) {
				//alert('File size exceeds 2 MB');
			   document.getElementById("errorName7").innerHTML="File size should be less than 500 MB.";
				return false;
			}
			/* if(img.files[0].size >  2048)  // validation according to file size
            {
            document.getElementById("errorName5").innerHTML="Image size too short";
            return false;
             } */
             return true;
      }
	  else{
		  document.getElementById("errorName7").innerHTML="Please select a video.";
		  return false;
	  }
}
function videoValidate2()
{
     var image =document.getElementById("video2").value;
	// alert(image);
	//return false;
     if(image!='')
     {
           var checkimg = image.toLowerCase();
          if (!checkimg.match(/(\.mp4)$/)){ // validation of file extension using regular expression before file upload
              document.getElementById("video2").focus();
              document.getElementById("errorName8").innerHTML="Wrong file selected. Required file formats: *.mp4 only."; 
              return false;
           }
            var img = document.getElementById("video2"); 
			var FileSize = img.files[0].size / 1024 / 1024; // in MB
			//alert(FileSize);
            //return false;
			if (FileSize > 500) {
				//alert('File size exceeds 2 MB');
			   document.getElementById("errorName8").innerHTML="File size should be less than 500 MB.";
				return false;
			}
			/* if(img.files[0].size >  2048)  // validation according to file size
            {
            document.getElementById("errorName5").innerHTML="Image size too short";
            return false;
             } */
             return true;
      }
	  else{
		  document.getElementById("errorName8").innerHTML="Please select a video";
		  return false;
	  }
}
$(document).ready(function(){	
	$("#upload_form").on("submit", function(event){
    event.preventDefault();                     
    //var form_url = $("form[id='upload_form']").attr("action");
    var CSRF_TOKEN = $('input[name="_token"]').val();                    
    //Use the 'FormData' Class
    var uploadfile = new FormData(this);
	//console.log(CSRF_TOKEN+' '+uploadfile);oldImagePath
//return false;	
    $.ajax({
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url:  "<?php echo url('/updateProfileImage') ?>",
        type: 'POST',
        data: uploadfile,
        contentType: false, 
        processData: false,
        dataType: 'JSON',
		beforeSend: function () {
			$('#submitbutton').attr("disabled","disabled");
			$(".loader-modal").show();
		},
		complete: function () {
			$(".loader-modal").hide();
		},
        success: function (result) {
            console.log(result);
            if(result.status=='true')
			{
				//$.alert({ title: 'Alert!', content: 'Image uploaded successfully!',});
				$('#myModal').modal('hide'); 
				$('#profileimage').attr("src",result.imgurl); 
				$('.img-circle').attr("src",result.imgurl); 
				$('#submitbutton').removeAttr('disabled');
				$('[data-dismiss=fileinput]').click();
				
				var avatar = "'"+result.avatar+"'";
				var button = '<a class="btn btn-xs btn-white" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit" ></i> Edit </a><a class="btn btn-xs btn-primary" onclick="deleteProfile('+avatar+');"><i class="fa fa-trash"></i> Delete</a><a onclick="rotateimg()" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-repeat white"></i> Rotate</a>';
				
				$("#profilebyAjax").html(button);
				$("#profilebyPageLoad").css('display','none');
				
				/** No reload on photo upload **/
				//profileUpdate();	
				//location.reload();
			}
        }
    });                            
});
});
$(document).ready(function(){	
	$("#gallery_upload_form").on("submit", function(event){
    event.preventDefault();                     
    //var form_url = $("form[id='upload_form']").attr("action");
    var CSRF_TOKEN = $('input[name="_token"]').val();                    
    //Use the 'FormData' Class
    var uploadfile = new FormData(this);
	//console.log(CSRF_TOKEN+' '+uploadfile);
//return false;	
    $.ajax({
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url:  "<?php echo url('/uploadGalleryImage') ?>",
        type: 'POST',
        data: uploadfile,
        contentType: false, 
        processData: false,
        dataType: 'JSON',
		beforeSend: function () {
			$("#submitbutton2").attr('disabled','disabled');
			$(".loader-modal").show();
		},
		complete: function () {
			$(".loader-modal").hide();
			$('[data-dismiss=modal]').click();
		},
        success: function (result) {
            console.log(result);
            if(result.status=='true')
			{
				//$.alert({ title: 'Alert!', content: 'Image uploaded successfully!',});
				$('#myModal').modal('hide'); 
				$("#submitbutton2").removeAttr('disabled');
				//profileUpdate();
				//location.reload();
				$("#gallerythumbs").append("<div class=\"col-md-3\" style=\"border: 1px solid; text-align: center;\"><img alt=\"photo\" src=\"https:\/\/musikalessons.com\/uploads\/photos\/" +result.img+ "\" height=\"140px\"><div style=\"bottom: 76%; position: absolute;right: 0px;\" ><button type=\"button\" class=\"btn btn-block btn-primary btn-flat galleryDiv"+result.id+"\" onclick=\"btnDeleteImage('"+result.id+"');\">X</button></div></div>");
			}
        }
    });                            
});
});
$(document).ready(function(){	
	$("#upload_video").on("submit", function(event){
    event.preventDefault();                     
    //var form_url = $("form[id='upload_form']").attr("action");
    var CSRF_TOKEN = $('input[name="_token"]').val();                    
    //Use the 'FormData' Class
    var uploadfile = new FormData(this);
	//console.log(CSRF_TOKEN+' '+uploadfile);
//return false;	
    $.ajax({
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url:  "<?php echo url('/uploadWelcomeVideo') ?>",
        type: 'POST',
        data: uploadfile,
        contentType: false, 
        processData: false,
        dataType: 'JSON',
		beforeSend: function () {
			$(".loader-modal").show();
		},
		complete: function () {
			$(".loader-modal").hide();
		},
        success: function (result) {
            console.log(result);
            if(result.status=='true')
			{
				//$.alert({ title: 'Alert!', content: 'Video uploaded successfully!',});
				$('#myModalVideo').modal('hide');
				$('#myModal').modal('hide'); 
				profileUpdate();
				//location.reload();
				/* var videoIdText = "'videoId'";
				var videoId = "'"+result.videoId+"'";
				var videoPath = '<?php echo url('/public/videos') ?>/'+result.video_path;
				
				var videoTitle = '<a href="javascript:void(0)" class="vid-icon" id="video1" title="'+result.title+'">'+result.title+'<span></span></a> <a href="javascript:void(0)" class="vid-rem-icon" onclick="removeVideo('+videoId+','+videoIdText+')">Remove</a>';
				
				var videoPath1 = '<div id="videCont"><video id="v1"  controls><source src="'+videoPath+'"></video></div></div>';
				var videoPath2 = '<source src="'+videoPath+'">';
				
				
				$("#welcomeVideoTitle").html(videoTitle);
				
				$("#vidBox").html(videoPath1);
				$('#vidBox').VideoPopUp({
					backgroundColor: "#17212a",
					opener: "video1",
					maxweight: "340",
					idvideo: "v1"
				}); */
				
				
			}
        }
    });                            
});
});
$(document).ready(function(){	
	$("#upload_video2").on("submit", function(event){
    event.preventDefault();                     
    //var form_url = $("form[id='upload_form']").attr("action");
    var CSRF_TOKEN = $('input[name="_token"]').val();                    
    //Use the 'FormData' Class
    var uploadfile = new FormData(this);
	//console.log(CSRF_TOKEN+' '+uploadfile);
//return false;	
    $.ajax({
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url:  "<?php echo url('/uploadWelcomeVideo') ?>",
        type: 'POST',
        data: uploadfile,
        contentType: false, 
        processData: false,
        dataType: 'JSON',
		beforeSend: function () {
			$(".loader-modal").show();
		},
		complete: function () {
			$(".loader-modal").hide();
		},
        success: function (result) {
            console.log(result);
            if(result.status=='true')
			{
				//$.alert({ title: 'Alert!', content: 'Video uploaded successfully!',});
				$('#myModalVideo2').modal('hide'); 
				//location.reload();
				profileUpdate();
				
				/* var videoIdText = "'videoId2'";
				var videoId = "'"+result.videoId+"'";
				var videoPath = '<?php echo url('/public/videos') ?>/'+result.video_path;
				
				var videoTitle = '<a href="javascript:void(0)" class="vid-icon" id="video11" title="'+result.title+'">'+result.title+'<span></span></a> <a href="javascript:void(0)" class="vid-rem-icon" onclick="removeVideo('+videoId+','+videoIdText+')">Remove</a>';
				
				var videoPath1 = '<div id="videCont2"><video id="v2"  controls><source src="'+videoPath+'"></video></div></div>';
				var videoPath2 = '<source src="'+videoPath+'">';
				
				
				$("#welcomeVideoTitle2").html(videoTitle);
				
				$("#vidBox2").html(videoPath1);
				$('#vidBox2').VideoPopUp2({
					backgroundColor: "#17212a",
					opener: "video11",
					maxweight: "340",
					idvideo: "v2"
				}); */
			}
        }
    });                            
});
});
function deleteProfile(imageName){
	//alert('sdfsd'); return false;
	$.confirm({
		title: 'Confirm!',
		content: 'Are you sure you want to delete the Photo',
		buttons: {
			formSubmit: {
				text: 'Submit',
				btnClass: 'btn-blue',
				action: function () {
					var csrf_token = $("input[name=_token]").val();
					$.ajax({
						url: "<?php echo url('/deleteProfilePhoto') ?>",
						data: {
							imageName:imageName,
							_token: csrf_token
						},
						type: 'POST',
						dataType: 'json',
						success: function(response){
							if(response.status=='true')
							{
								//profileUpdate();
								//$.alert({ title: 'Alert!', content: 'Image deleted successfully!',});
								location.reload();
							}
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
}	
function seventhStep(){
	var aboutTeacher = $("#aboutTeacher").val();
	var experience = $("#experience").val();
	var methodsUsed = $("#methodsUsed").val();
	var lessonsStyle = $("#lessonsStyle").val();
	error_messages = new Array();
	if(aboutTeacher==''){
		error_messages.push("You must enter at least 500 characters for About Me section!");
		//return false;
	}
	else if(aboutTeacher.length < 500){
		error_messages.push("You must enter at least 500 characters for About Me section!");
	}
	if(experience==''){
		error_messages.push("You must enter at least 500 characters for My Experience section!");
	}	else if(experience.length < 500){
		error_messages.push("You must enter at least 500 characters for My Experience section!");
	}
	if(methodsUsed==''){
		error_messages.push("You must enter at least 500 characters for My Methods section!");
	}	else if(methodsUsed.length < 500){
		error_messages.push("You must enter at least 500 characters for My Methods section!");
	}
	if(lessonsStyle==''){
		error_messages.push("You must enter at least 500 characters for My Teaching Style section!");
	}	else if(lessonsStyle.length < 500){
	    error_messages.push("You must enter at least 500 characters for My Teaching Style section!");
	}
	var csrf_token = $("input[name=_token]").val();
	$.ajax({
		url: "<?php echo url('/updatePersonalDesc') ?>",
		data: {
			aboutTeacher:aboutTeacher,
			experience:experience,
			methodsUsed:methodsUsed,
			lessonsStyle:lessonsStyle,
			_token: csrf_token
		},
		type: 'POST',
		dataType: 'json',
		success: function(response){
			if(response.status=='true')
			{
			}
		},
		error: function(e){
		}
	}); 
	if(error_messages.length>0)return error_messages; else return true;
}
function ScheduleStep(){
	var scheduleArr = <?php echo json_encode($scheduleArr); ?>;
	var i,j, title, value,week,index, hso ,  arr=[];
	for(i=0; i<scheduleArr.length; i++)
	{
		for(j=1; j<=21; j++)
		{
			if(j<=3){
				checkboxId = $('#'+scheduleArr[i][1]+'0'+j).is(":checked")? 1 : 0;
				title = scheduleArr[i][1];
				index = '0'+j;
				week = 'Sunday';
				if(parseInt(index)==1){ hso = 'home'; }
				if(parseInt(index)==2){ hso = 'studio'; }
				if(parseInt(index)==3){ hso = 'online'; }
			}
			else if(j>3 && j<=6){
				checkboxId = $('#'+scheduleArr[i][1]+'0'+j).is(":checked")? 1 : 0;
				title = scheduleArr[i][1];
				index = '0'+j;
				week = 'Monday';
				if(parseInt(index)==4){ hso = 'home'; }
				if(parseInt(index)==5){ hso = 'studio'; }
				if(parseInt(index)==6){ hso = 'online'; }
			}
			else if(j>6 && j<=9){
				checkboxId = $('#'+scheduleArr[i][1]+'0'+j).is(":checked")? 1 : 0;
				title = scheduleArr[i][1];
				index = '0'+j;
				week = 'Tuesday';
				if(parseInt(index)==7){ hso = 'home'; }
				if(parseInt(index)==8){ hso = 'studio';}
				if(parseInt(index)==9){ hso = 'online'; }
			}
			else if(j>9 && j<=12){
				checkboxId = $('#'+scheduleArr[i][1]+j).is(":checked")? 1 : 0;
				title = scheduleArr[i][1];
				index = j;
				week = 'Wednesday';
				if(parseInt(index)==10){ hso = 'home'; }
				if(parseInt(index)==11){ hso = 'studio'; }
				if(parseInt(index)==12){ hso = 'online'; }
			}
			else if(j>12 && j<=15){
				checkboxId = $('#'+scheduleArr[i][1]+j).is(":checked")? 1 : 0;
				title = scheduleArr[i][1];
				index = j;
				week = 'Thursday';
				if(parseInt(index)==13){ hso = 'home'; }
				if(parseInt(index)==14){ hso = 'studio'; }
				if(parseInt(index)==15){ hso = 'online'; }
			}
			else if(j>15 && j<=18){
				checkboxId = $('#'+scheduleArr[i][1]+j).is(":checked")? 1 : 0;
				title = scheduleArr[i][1];
				index = j;
				week = 'Friday';
				if(parseInt(index)==16){ hso = 'home'; }
				if(parseInt(index)==17){ hso = 'studio'; }
				if(parseInt(index)==18){ hso = 'online'; }
			}
			else if(j>18 && j<=21){
				checkboxId = $('#'+scheduleArr[i][1]+j).is(":checked")? 1 : 0;
				title = scheduleArr[i][1];
				index = j;
				week = 'Saturday';
				if(parseInt(index)==19){ hso = 'home'; }
				if(parseInt(index)==20){ hso = 'studio'; }
				if(parseInt(index)==21){ hso = 'online'; }
			}
			value = checkboxId;
			arr.push({title : title,index : index,value : checkboxId,week : week,hso : hso});	
		}		
	}
	testval = 0;
	for(i = 0 ; i < arr.length ; i++){
		testval = arr[i]['value'];
	}
	error_messages = new Array();
	if(testval == 0 )error_messages.push("You must select at least on day in schedule table!");
	var csrf_token = $("input[name=_token]").val();
	$.ajax({
		url: "<?php echo url('/teacherSchedule') ?>",
		data: {
			scheduleTime:arr,
			_token: csrf_token
		},
		type: 'POST',
		dataType: 'json',
		success: function(response){
			console.log(response);
			if(response.status=='true')
			{
			}
		},
		error: function(e){
			console.log(e.responseText);
		}
	}); 
	return error_messages;
}
function ninthStep(){
	var favorite = [];
		$.each($("textarea[name='QuestionsModel[]']"), function(){            
			favorite.push($.trim($(this).val()));
		});
	var answer = favorite.join("<~>");
	var csrf_token = $("input[name=_token]").val();
	$.ajax({
		url: "<?php echo url('/spotlightAnswer') ?>",
		data: {
			answer:answer,
			_token: csrf_token
		},
		type: 'POST',
		dataType: 'json',
		success: function(response){
			if(response.status=='true'){
			}
		},
		error: function(e){
			console.log(e.responseText);
		}
	}); 	
	return false;
}
function btnDeleteImage(image_id){
	//alert('sdfsd'+image_id); return false;
	$.confirm({
		title: 'Confirm!',
		content: 'Are you sure you want to delete the Photo',
		buttons: {
			formSubmit: {
				text: 'Submit',
				btnClass: 'btn-blue',
				action: function () {
					var csrf_token = $("input[name=_token]").val();
					$.ajax({
						url: "<?php echo url('/deleteGalleryPhoto') ?>",
						data: {
							image_id:image_id,
							_token: csrf_token
						},
						type: 'POST',
						dataType: 'json',
						success: function(response){
							if(response.status=='true')
							{
								//$.alert({ title: 'Alert!', content: 'Photo deleted successfully!',});
								//profileUpdate();
								//location.reload();
								$('.galleryDiv'+image_id).parent().parent().remove();
								//$(this).find('.galleryDiv').parent().parent().remove();
							}
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
}
function tenthStep(){
	var videoType = $("#videoType").val();
	var p = /^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/;
	if(videoType == 'Youtube')	{
    	var youtubeLink = $("#youtubeLink").val();
     	if(!youtubeLink.match(p) && youtubeLink!=''){
			$.alert({ title: 'Alert!', content: 'Please enter correct youtube video url for Welcome video!',});
			$( "#youtubeLink" ).focus();
			return false;
		}
	}	else	{
		var youtubeLink = '';
	}
	var videoType2 = $("#videoType2").val();
	if(videoType2 == 'Youtube'){
		var youtubeLink2 = $("#youtubeLink2").val();
		if(!youtubeLink2.match(p) && youtubeLink2!='')
		{
			$.alert({ title: 'Alert!', content: 'Please enter correct youtube video url for Performance or Lesson video!',});
			$( "#youtubeLink2" ).focus();
			return false;
		}
	}	else	{
		var youtubeLink2 = '';
	}
	var csrf_token = $("input[name=_token]").val();
	$.ajax({
		url: "<?php echo url('/updateVideoInfo') ?>",
		data: {
			videoType:videoType,
			youtubeLink:youtubeLink,
			videoType2:videoType2,
			youtubeLink2:youtubeLink2,
			_token: csrf_token
		},
		type: 'POST',
		dataType: 'json',
		success: function(response){
			if(response.status=='true')	{
				location.reload();
			}
		},
		error: function(e){
			console.log(e.responseText);
		}
	}); 	
	return false;
}
function removeVideo(video_id,field) {
	//alert(video_id+' '+field); return false;
	$.confirm({
		title: 'Confirm!',
		content: 'Are you sure you want to delete attached video?',
		buttons: {
			formSubmit: {
				text: 'Submit',
				btnClass: 'btn-blue',
				action: function () {
					var csrf_token = $("input[name=_token]").val();
					$.ajax({
						url: "<?php echo url('/deleteVideo') ?>",
						data: {
							video_id:video_id,
							field:field,
							_token: csrf_token
						},
						type: 'POST',
						dataType: 'json',
						success: function(response){
							//console.log(response);
							if(response.status=='true')
							{
								//$.alert({ title: 'Alert!', content: 'Video deleted successfully!',});
								location.reload();
							}
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
	return false;
}
	$(document).ready(function(){
		/* $('#form').on('click', '#checkAll', function() {
			$( "#target" ).click(function() 
			$('#selectAllChkbx input:checkbox').prop('checked', this.checked);    
		}); */
		$("#ionrange_1").ionRangeSlider({
            min: 3,
            max: 80,
            type: 'double',
             maxPostfix: "+",
            from: <?php if($teaches['agesTought1']!=''){ echo $teaches['agesTought1']; } else { echo '3'; }  ?>,
            to: <?php if($teaches['agesTought2']!=''){ echo $teaches['agesTought2']; } else { echo '80'; }  ?>,
            prettify: false,
            hasGrid: true,
			onFinish: function(data){
				//var value = data.fromNumber;
				$("#fromRange1").val(data.fromNumber);
				$("#toRange1").val(data.toNumber);
			}
        });
		$("#ionrange_2").ionRangeSlider({
			from: <?php if($teaches['levelTought1']!=''){ if($teaches['levelTought1']>=0 and $teaches['levelTought1']<=80){ echo '0';} else if($teaches['levelTought1']>81 and $teaches['levelTought1']<=160){ echo '1';} else { echo "2"; } } else { echo '0'; } ?>,
            to: <?php if($teaches['levelTought2']!=''){ if($teaches['levelTought2']>=0 and $teaches['levelTought2']<=80){ echo '0';} else if($teaches['levelTought2']>81 and $teaches['levelTought2']<=160){ echo '1';} else { echo "2"; } } else { echo '2'; } ?>,
			values: [
                "beginner", "Intermediate", "advanced"
            ],
            type: 'double',
			grid: true,
			onFinish: function(data){
				console.log(data);
				var fromPers = parseInt(2.4*data.fromPers);
				
				var toPers = parseInt(2.4*data.toPers);
				$("#fromRange2").val(fromPers);
				$("#toRange2").val(toPers);
			}
        });
	});
    </script>
  <script>
    var counter = <?php echo $count ?>;
    function addButton() {
	/* if(counter>=2)
		{
			$("#removedegreetab").removeAttr('style').css('display','block')
		} */
	if(counter>5){
            alert("Only 5 degree allow");
            return false;
	}   
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter).addClass("col-md-12");
	//newTextBoxDiv.after().html('<input type="text" class="form-control" maxlength="100" name="textbox' + counter + '" id="textbox' + counter + '" value="" >');
	newTextBoxDiv.after().html('<div class="col-md-4"><div class="form-group"><select class="form-control" name="TeachersModeltraining' + counter + '" id="TeachersModeltraining' + counter + '" onchange="getDesc(' + counter + ');" ><option value="">Select degree and education</option><option value="Course Work">Course Work</option><option value="Professional Certificate">Professional Certificate</option><option value="Teaching Certificate">Teaching Certificate</option><option value="Associate Degree">Associate Degree</option><option value="Bachelor Degree">Bachelor Degree</option><option value="Graduate Degree">Graduate Degree</option><option value="Master Degree">Master Degree</option><option value="Doctoral Degree">Doctoral Degree</option><option value="other">Other</option></select></div></div><div id="addDesc' + counter + '"></div>');
	newTextBoxDiv.appendTo("#TextBoxesGroup");
	$("#degreeCounter").val(counter);
	counter++;
     }
	function removeButton() {
	if(counter==2){
          $.alert({ title: 'Alert!', content: 'No more degree to remove!',});
          return false;
       }   
	counter--;
        $("#TextBoxDiv" + counter).remove();
		$("#degreeCounter").val(counter-1);	
     }
		</script>
		<script>
		function getDesc(index)
		{	
			//alert(index);
			var teachersModeltraining = $("#TeachersModeltraining"+index).val();
			//alert(teachersModeltraining);
			if(teachersModeltraining!="")
			{
				htmlDesc = '<div class="col-md-6" style="padding-left: 0px; !important"><div class="form-group"><input type="text" name="degreeSchoolName'+index+'" id="degreeSchoolName'+index+'" class="form-control" maxlength="100" placeholder="Name of School"></div></div>	';
				//$("#degreeButton").removeAttr('style').css('display','block')
			}
			else
			{
				htmlDesc = '<div class="col-md-6" style="padding-left: 0px; !important"></div>	';
				//$("#degreeButton").removeAttr('style').css('display','none')
			}
			$("#addDesc"+index).html(htmlDesc);
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
		function getlinkTab(){
			var videoType = $("#videoType").val();
			if(videoType=='File')
			{
				var htmlsection = '<div class="form-group"><a class="btn btn-primary" data-toggle="modal" data-target="#myModalVideo">Choose Video </a></br></br><strong>Required format is: *.mp4. The maximum video size is 500 MB. Recommended video duration is 10 minutes. </strong></div>';
			}
			else
			{
				var htmlsection = '<div class="form-group" ><strong>Insert your youtube link:  </strong><input type="text" class="form-control" name="youtubeLink" id="youtubeLink" ></div>';
			}
			$("#videoTypeTab").html(htmlsection);
			return false;
		}
		function getlinkTab2(){
			var videoType2 = $("#videoType2").val();
			if(videoType2=='File')
			{
				var htmlsection = '<div class="form-group"><a class="btn btn-primary" data-toggle="modal" data-target="#myModalVideo2">Choose Video </a></br></br><strong>Required format is: *.mp4. The maximum video size is 500 MB. Recommended video duration is 10 minutes. </strong></div>';
			}
			else
			{
				var htmlsection = '<div class="form-group" ><strong>Insert your youtube link:  </strong><input type="text" class="form-control" name="youtubeLink2" id="youtubeLink2" ></div>';
			}
			$("#videoTypeTab2").html(htmlsection);
			return false;
		}
		</script>
<script type="text/javascript">
	var map, isDrawing, polygon, lastMousePoint, eventIds = [], line;;
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
		map = new Microsoft.Maps.Map('#myMap', {
            center: new Microsoft.Maps.Location(lat, lng),
			showLocateMeButton: false
        });
		
		map.setView({
			center: new Microsoft.Maps.Location(lat, lng),
		});
		
		var StudioLocation = <?php echo $StudioLocation; ?>;
		//console.log(StudioLocation[0].lat);
		if(StudioLocation.length>0){
		studioMap = new Microsoft.Maps.Map('#studioMap', {
            center: new Microsoft.Maps.Location(StudioLocation[0].lat, StudioLocation[0].lng),
			showLocateMeButton: false
        });
		}	else {
			studioMap = new Microsoft.Maps.Map('#studioMap', {
            center: new Microsoft.Maps.Location(lat, lng),
			showLocateMeButton: false,
			disableZooming: true,
			showZoomButtons: true 
        });
		}
			$.each(StudioLocation, function(i,item){
			var stuloc = new Microsoft.Maps.Location(item.lat, item.lng);
			var studiopin = new Microsoft.Maps.Pushpin(stuloc,
	{ icon: 'https://teachers.musikalessons.com/img/mappin2.png',
		anchor: new Microsoft.Maps.Point(12, 39) });
				studioMap.entities.push(studiopin);
			});
		var i = 0, entity;
                while (i < studioMap.entities.getLength()) {
                    entity = studioMap.entities.get(i);
                    i += 1;
					Microsoft.Maps.Events.addHandler(entity, 'click', removePin);
                }
		Microsoft.Maps.Events.addHandler(studioMap, 'dblclick', displayLatLong);
		
		Microsoft.Maps.Events.addHandler(studioMap, 'mousemove', function (e) {
 			setTimeout(function(){ studioMap.setOptions({ disableZooming: false }); }, 1);
		});
		/** Microsoft.Maps.Events.addHandler(studioMap, 'rightclick', removeLatLong); **/
		$("#drawPolygon").addClass("stop-polygon");
		var center = map.getCenter();
        //Define a title and description for the infobox.
        var title = 'Edit';
        var description = '<a href="javascript:closeInfobox()" ><img src="https://teachers.musikalessons.com/img/icons8-trash-30.png" align="left" style="margin-right:5px;"/></a>';
        //Some HTML to add a close button to the infobox.
        var closeButton = '<a href="javascript:closeInfobox()" class="customInfoboxCloseButton">X</a>';
		var loc = new Microsoft.Maps.Location(lat, lng);
            //Add a pushpin at the user's location.
        //Create array of locations to form a ring.
		var poly_data = <?php echo $TeacherPolygonsData; ?>;
		//var arrLatLong = poly_data[0].polygon;
		if(poly_data.length == 0)
		{
			//console.log(loc);
			var pin = new Microsoft.Maps.Pushpin(loc);
			map.entities.push(pin);
		}
	//var poly_color = <?php //echo json_encode($colorArr) ?>;
	var color_count = 0;
	console.log(poly_data);	
	$.each(poly_data, function(i,item){
		//console.log(item.Id+' '+ item.teacherId);
		//var rgbaColor = 'rgba('+poly_color[color_count].rgba+')';
		//console.log(rgbaColor);
		var arrLatLong = item.polygon;
		var arrLatLong111 = [{latitude:"38.502569856264735", longitude:"-121.49393774785001"}, {latitude:"38.503644558651935", longitude:"-121.49393774785001"}, {latitude:"38.503644558651935", longitude:"-121.48569800175626"}, {latitude:"38.503644558651935", longitude:"-121.47745825566251"}, {latitude:"38.503644558651935", longitude:"-121.46921850956876"}, {latitude:"38.503644558651935", longitude:"-121.46097876347501"}, {latitude:"38.49827088635385", longitude:"-121.46235205449064"}, {latitude:"38.49289681316097", longitude:"-121.46509863652189"}, {latitude:"38.48644739617284", longitude:"-121.46647192753751"}, {latitude:"38.4810724410726", longitude:"-121.46921850956876"}, {latitude:"38.4756970851332", longitude:"-121.47059180058439"}, {latitude:"38.47032132837209", longitude:"-121.47333838261564"}, {latitude:"38.502569856264735", longitude:"-121.49393774785001"}];
		var locations = [];
		for (i = 0; i < arrLatLong.length; i++) { 
			var latitude = arrLatLong[i]['latitude'];
			var longitude = arrLatLong[i]['longitude'];
			locations[i] = new Microsoft.Maps.Location(latitude, longitude);
		}
		//console.log(arrLatLong[0]['latitude']);
        // var exteriorRing = [
            // new Microsoft.Maps.Location(28.69742562706177, 77.28520202636714),
            // new Microsoft.Maps.Location(28.69742562706177, 77.28726196289058),
        // ];
		// var exteriorRing[0] = locations;
		//console.log(locations);
        //Create a polygon
        var polygon = new Microsoft.Maps.Polygon(locations, {
            /**fillColor: 'rgba(0.25,103,200,255)',**/
            strokeColor: '#00aeef',
            strokeThickness: 1
        });  
		map.entities.push(polygon);
		var polyFirstLocation = new Microsoft.Maps.Location(arrLatLong[0]['latitude'], arrLatLong[0]['longitude']);
		//var polyFirstLocation = new Microsoft.Maps.Location(lat, lng);
		infobox = new Microsoft.Maps.Infobox(polyFirstLocation, {
            title: 'Click to Edit or Delete',
			visible: false
        });
        infobox.setMap(map);
		var centroid;
		Microsoft.Maps.loadModule('Microsoft.Maps.SpatialMath', function () {
			//centroid = new Microsoft.Maps.Pushpin(Microsoft.Maps.SpatialMath.Geometry.centroid(polygon), { icon: 'https://teachers.musikalessons.com/img/icons8-trash-30.png' });
			centroid = new Microsoft.Maps.Pushpin(Microsoft.Maps.SpatialMath.Geometry.centroid(polygon), {title:'Edit/Delete', text:1, icon: 'https://teachers.musikalessons.com/img/onepixel.png', });
			map.entities.push(centroid);
			Microsoft.Maps.Events.addHandler(centroid, 'click', function () {
							Microsoft.Maps.Events.invoke(polygon, 'click');
								/**
								var csrf_token = $("input[name=_token]").val();
								$.ajax({
									url: "<?php echo url('/deletePolygon') ?>",
									data: {
										polygonId:item.Id,
										teacherId:item.teacherId,
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
										if(response.status=='true'){
											profileUpdate();
  										    map.entities.remove(centroid);
											map.entities.remove(polygon);
										}
									},
									error: function(e){
										console.log(e.responseText);
									}
								});**/
			});
		});
        Microsoft.Maps.Events.addHandler(polygon, 'mouseover', function () {
			infobox.setOptions({
				location: polyFirstLocation,
                visible: true
            });
		});
		Microsoft.Maps.Events.addHandler(polygon, 'mouseout', closeInfobox);
		var ploydays = item.daysAvailable;
		var daysArray  = [];
		var res = ploydays.split(",");
		daysArray = daysArray.concat(res);	
		var checkboxDays1='', checkboxDays2='', checkboxDays3='', checkboxDays4='', checkboxDays5='', checkboxDays6='', checkboxDays7='';
		if($.inArray("1",daysArray)>=0){
			 checkboxDays1 = 'checked';
		}
		if($.inArray("2",daysArray)>=0){
			 checkboxDays2 = 'checked';
		}
		if($.inArray("3",daysArray)>=0){
			checkboxDays3 = 'checked';
		}
		if($.inArray("4",daysArray)>=0){
			 checkboxDays4 = 'checked';
		}
		if($.inArray("5",daysArray)>=0){
			 checkboxDays5 = 'checked';
		}
		if($.inArray("6",daysArray)>=0){
			 checkboxDays6 = 'checked';
		}
		if($.inArray("7",daysArray)>=0){
			 checkboxDays7 = 'checked';
		}
		Microsoft.Maps.Events.addHandler(polygon, 'click', function () {
            //Remove the polygon from the map as the drawing tools will display it in the drawing layer.
				$.confirm({
					title: 'What day of the week are you in this area?',
					content: '' +
					'<form action="" class="formName">' +
					'<div class="form-group">' +
					'<input id="day11" class="weekday1" name="day1[]" value="1"  type="checkbox" '+checkboxDays1+' > Sun &nbsp;<input id="day12" class="weekday1" name="day1[]" value="2" type="checkbox" '+checkboxDays2+' > Mon &nbsp;<input class="weekday1" id="day13" name="day1[]" value="3" type="checkbox" '+checkboxDays3+'> Tues &nbsp; <input id="day14" class="weekday1" name="day1[]" value="4" type="checkbox" '+checkboxDays4+'> Wed &nbsp;<input class="weekday1" id="day15" name="day1[]" value="5"  type="checkbox" '+checkboxDays5+'> Thurs &nbsp;<input class="weekday1" id="day16" name="day1[]" value="6"  type="checkbox" '+checkboxDays6+'> Fri &nbsp;<input class="weekday1" id="day17" name="day1[]" value="7" type="checkbox" '+checkboxDays7+'> Sat' +
					'</div>' +
					'</form>',
					buttons: {
						formSubmit: {
							text: 'Submit',
							btnClass: 'btn-blue',
							action: function () {
								var final1 = [],itemid = [],tId = [],weekdaysMap=[];
								$('.weekday1:checked').each(function(){        
									var values = $(this).val();
									//final1 += values;
									 final1.push(values);
								});
								var daysMap = final1.join(",");
								if(daysMap=='')
								{
									$.alert({ title: 'Alert!', content: 'Please select at least one checkbox!',});
									return false;
								}
								itemid.push(item.Id);
								tId.push(item.teacherId);
								tId.push(item.teacherId);
								weekdaysMap.push(daysMap);
								console.log(itemid+' '+tId);
								//return false;	
								var csrf_token = $("input[name=_token]").val();
								$.ajax({
									url: "<?php echo url('/updateTeritoryLocationsDays') ?>",
									data: {
										polyIds: itemid,
										teacherIds:tId,
										weekdays:weekdaysMap,
										_token: csrf_token
									},
									type: 'POST',
									dataType: 'json',
									beforeSend: function () {
									//$(".loader-modal").show();
									},
									complete: function () {
										//$(".loader-modal").hide();
									},
									success: function(response){
										console.log(response);
										if(response.status=='true')
										{ 
											//$.alert({ title: 'Alert!', content: 'Updated Successfully!',});
											//profileUpdate();
											location.reload();
											/* reload after travel area creation */
										}
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
						delete: function(){
							var csrf_token = $("input[name=_token]").val();
							var i = 0, e,l=0;
							while (i++ < map.entities.getLength()) {
								l++;
							}
							if(l<3)	$.alert({ title: 'Alert!', content: "You are deleting the only available teaching area. However you must define at least one teaching area Or mark No to teaching in Student's Home.",});
								$.ajax({
									url: "<?php echo url('/deletePolygon') ?>",
									data: {
										polygonId:item.Id,
										teacherId:item.teacherId,
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
										if(response.status=='true'){
											//profileUpdate();
  										    map.entities.remove(centroid);
											map.entities.remove(polygon);
											//location.reload();
										}
									},
									error: function(e){
										console.log(e.responseText);
									}
								});
						}
					}
				});	
           // tools.edit(polygon);
        });
		/**Microsoft.Maps.loadModule('Microsoft.Maps.SpatialMath', function () {
			pins = Microsoft.Maps.TestDataGenerator.getPushpins(1, map.getBounds(), null, 0.5);
			map.entities.push(pins);
			Microsoft.Maps.SpatialMath.Geometry.snapShapeToShape(pins, polygon);
			Microsoft.Maps.Events.addHandler(pins, 'click', function () { 
					Microsoft.Maps.Events.invoke(polygon, 'click');
			});
		});**/
	color_count++;
	});	
	$(".overlay").hide();
    }
	function displayLatLong(e) {
		sl = studioMap.entities.getLength();
		if(sl>7){
			$.alert({ title: 'Alert!', content: 'You can not add more than eight studio locations.',});
			return false;
		}
	e.handled = true;
	studioMap.setOptions({ disableZooming: true });
		if (e.targetType == "map") {
/* 
$.confirm({
title: 'Do you want to save the studio location?',
content: '',
buttons: {
	formSubmit: {
		text: 'Submit',
		btnClass: 'btn-blue',
		action: function () {
 */
			var point = new Microsoft.Maps.Point(e.getX(), e.getY());
			var loc = e.target.tryPixelToLocation(point);
			//console.log(loc.latitude + ", " + loc.longitude);
			var add_studio_loc = new Microsoft.Maps.Location(loc.latitude, loc.longitude);
			var studiopin = new Microsoft.Maps.Pushpin(add_studio_loc,	
			{ icon: 'https://teachers.musikalessons.com/img/mappin2.png',		
			  anchor: new Microsoft.Maps.Point(12, 39) });				
			  studioMap.entities.push(studiopin);			
			var i = 0;
			console.log(studioMap.entities.getLength() + ' old pins');
			while (i < studioMap.entities.getLength()) {
			   entity = studioMap.entities.get(i);
			   i += 1;
			}
			Microsoft.Maps.Events.addHandler(entity, 'click', removePin);
			var teachesHome = $('input[name=teachesHome]:checked').val();
			var teachesStudio = $('input[name=teachesStudio]:checked').val();
			var online_lessons = $('input[name=online_lessons]:checked').val();
			var csrf_token = $("input[name=_token]").val();
			$.ajax({
				url: "<?php echo url('/StudiosLocations') ?>",
				data: {
					type: 'new',
					latitute:loc.latitude,
					longitude:loc.longitude,
					teachesHome:teachesHome,
					teachesStudio:teachesStudio,
					online_lessons:online_lessons,
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
					if(response.status=='true')
					{
					}
				},
				error: function(e){
					console.log(e.responseText);
				}
			}); 
			/* }
			},
		cancel: function () {
			},
		}
	});	 */
		}
	}
	function removePin(e) {
	e.handled = true;
	rightClick = false;
		if (e.targetType == "pushpin") {
			pin = e.target;
			pinlocation = pin.getLocation();
			//idx = studioMap.entities.indexOf(pin);
			//console.log(idx);
			studioMap.entities.remove(pin)		;
			var studio_loc = new Microsoft.Maps.Location(pinlocation.latitude, pinlocation.longitude);
			var csrf_token = $("input[name=_token]").val();
			$.ajax({
				url: "<?php echo url('/RemoveStudiosLocations') ?>",
				data: {
					type: 'new',
					latitute:pinlocation.latitude.toFixed(4),
					longitude:pinlocation.longitude.toFixed(4),
					_token: csrf_token
				},
				type: 'POST',
				dataType: 'json',
				beforeSend: function () {
				//$(".loader-modal").show();
				},
				complete: function () {
					//$(".loader-modal").hide();
				},
				success: function(response){
					console.log(response);
					if(response.status=='true')
					{
					}
				},
				error: function(e){
					console.log(e.responseText+'error');
				}
			}); 
		}
	}
	function removeLatLong(e) {
	e.handled = true;
	rightClick = false;
		if (e.targetType == "map") {
$.confirm({
title: 'Do you want to remove the studio location?',
content: '',
buttons: {
	formSubmit: {
		text: 'Submit',
		btnClass: 'btn-blue',
		action: function () {
			var point = new Microsoft.Maps.Point(e.getX(), e.getY());
			var loc = e.target.tryPixelToLocation(point);
			//console.log(loc.latitude + ", " + loc.longitude);
			alert(loc.latitude);
			var csrf_token = $("input[name=_token]").val();
			$.ajax({
				url: "<?php echo url('/RemoveStudiosLocations') ?>",
				data: {
					type: 'new',
					latitute:loc.latitude,
					longitude:loc.longitude,
					_token: csrf_token
				},
				type: 'POST',
				dataType: 'json',
				beforeSend: function () {
				//$(".loader-modal").show();
				},
				complete: function () {
					//$(".loader-modal").hide();
				},
				success: function(response){
					//console.log(response);
					if(response.status=='true')
					{
						//$.alert({ title: 'Alert!', content: 'Studio location removed successfully!',});
						//profileUpdate(); 
						//location.reload();
					}
				},
				error: function(e){
					console.log(e.responseText);
				}
			}); 
			}
			},
		cancel: function () {
			},
		}
	});	
		}
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
			$("#drawPolygon").removeClass("stop-polygon");
			//Microsoft.Maps.Events.addHandler(map, 'mousedown', startDrawing);
			eventIds.push(Microsoft.Maps.Events.addHandler(map, 'mousedown', startDrawing));
		}
		//console.log(eventIds); 
	  }
	  function startDrawing(e)
	  {
		try{		
			var point = new Microsoft.Maps.Point(e.getX(), e.getY());
			var loc = e.target.tryPixelToLocation(point);
			line = new Microsoft.Maps.Polyline([loc, loc], { fillColor: 'rgba(0.25,103,200,255)',strokeColor: '#00aeef',strokeThickness: 1 });
			map.entities.push(line);
			isDrawing = true;
			map.setOptions({disablePanning: true, disableZooming: true});
			eventIds.push(Microsoft.Maps.Events.addHandler(map, 'mouseup', stopDrawing));
			eventIds.push(Microsoft.Maps.Events.addHandler(map, 'mousemove', mouseMoved));
		}catch(x){};
   	  }
	  function mouseMoved(e)	  {
		if(isDrawing){
			try{
				var point = new Microsoft.Maps.Point(e.getX(), e.getY());
				var loc = e.target.tryPixelToLocation(point);
				var locs = line.getLocations();
				locs.push(loc);
				line.setLocations(locs);
			}catch(x){}
		}
	  }
	  function stopDrawing(e)	  {
		//Remove mouse events.
		var teachesHome = $('input[name=teachesHome]:checked').val();
		var teachesStudio = $('input[name=teachesStudio]:checked').val();
		var online_lessons = $('input[name=online_lessons]:checked').val();
		Microsoft.Maps.Events.addHandler(map, 'mousemove', changeDefaultCursor);
		for(var i=0;i<eventIds.length;i++){
			Microsoft.Maps.Events.removeHandler(eventIds[i]);
		}
		eventIds = [];
		//re-enable panning and zooming.
		var locs = line.getLocations();
		var arr = [];
		var locations = [];
		locationLength = locs.length;
		for (i = 0; i <= locationLength; i++) {
			if(i!=locationLength)			{		
				var latitude = locs[i]['latitude'];
				var longitude = locs[i]['longitude'];
				locations[i] = new Microsoft.Maps.Location(latitude, longitude);
				arr.push({"latitude" : latitude,"longitude" : longitude,});
			}
			else			{
				var latitude = locs[0]['latitude'];
				var longitude = locs[0]['longitude'];
				locations[i] = new Microsoft.Maps.Location(latitude, longitude);
				arr.push({"latitude" : latitude,"longitude" : longitude,});
			}
		}
		var polygon = new Microsoft.Maps.Polygon(locations, {
            fillColor: 'rgba(0,255,255,0.2)',
            strokeColor: '#00aeef',
            strokeThickness: 1
        });
		map.entities.push(polygon);
		isDrawing = false;
		map.setOptions({disablePanning: false, disableZooming: false});
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
						if(final1==''){
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
								teachesHome:teachesHome,
								teachesStudio:teachesStudio,
								online_lessons:online_lessons,
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
								if(response.status=='true'){
									//$.alert({ title: 'Alert!', content: 'Please refresh page to reload map elements!',});
									//profileUpdate();	
									location.reload();
								}
							},
							error: function(e){
								console.log(e.responseText);
							}
						}); 
					}
				},
				cancel: function () {
					 map.entities.remove(polygon);
					 map.entities.remove(line);
				},
			}
		});	
		locs.push(locs[0]);
		polygon.setLocations(locs);
		$("#drawPolygon").removeClass("click-polygon");
		$("#drawPolygon").addClass("stop-polygon");	
 }
	/*  var arr = [
			"Hi",
			"Hello",
			"Bonjour"
		];
	// append new value to the array
	arr.push("Hola"); */
$('.vid-close').click(function(){
		$(this).parents("body").find(".video-pop-up-box").hide();
	});
	$('.vid-pop-show').click(function(){
		$(this).parents("body").find(".video-pop-up-box").show();
	});
	$('.vid-close2').click(function(){
		$(this).parents("body").find(".video-pop-up-box2").hide();
	});
	$('.vid-pop-show2').click(function(){
		$(this).parents("body").find(".video-pop-up-box2").show();
	});
	/**MediaElement('player1', {success: function(me) {
	me.play();
	}});
MediaElement('player2', {success: function(me) {
	me.play();
	}});
**/
$('[data-dismiss=modal]').on('click', function (e) {
	$('[data-dismiss=fileinput]').click();
})
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\musikateachers\resources\views/profile.blade.php ENDPATH**/ ?>