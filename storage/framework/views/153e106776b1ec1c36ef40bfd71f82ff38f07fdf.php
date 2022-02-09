 <?php $__env->startSection('content'); ?><?php $__env->startSection('title'); ?> Account  <?php $__env->stopSection(); ?>
<?php $__env->startSection('link_css'); ?>
<style>
@media  screen and (min-width: 320px) and (max-width: 767px) {
	.ibox-content {
         border-width: 5px !important;
    }
}
</style>
	
<?php $__env->stopSection(); ?>
<div id="wrapper">
    <div class="wrapper wrapper-content">
	
		   <div class="row"> 
			 <div class="col-lg-10">
				<?php if(session('status')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('status')); ?><br>
						
						Warning: You are updating mailing address. To update your travel radius and studio location you must <a href="https://teachers.musikalessons.com/profile">click here </a> and update it.
                    </div>
                <?php endif; ?>
				
				
				<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
			</div>
			</div>
			
			<div class="row">
			
			<form method="post" class="form-horizontal" action="<?php echo e(url('/account').'/'.$teacher_profile->teacherId); ?>" onSubmit="return submitTeacherProfile();">
			<?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PATCH')); ?>

                <div class="col-lg-10">
				
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Account Information</h5>
                          
                        </div>
                        <div class="ibox-content">
       <div class="form-group<?php echo e($errors->has('first_name') ? ' has-error' : ''); ?>">
		  <label class="col-md-3 control-label">First Name</label>
				<div class="col-md-9">
					<input type="text" name="first_name" value="<?php echo e($teacher_profile->firstName); ?>" class="form-control" required>
					 <small class="text-danger pull-left"><?php echo e($errors->first('first_name')); ?></small>
				</div>
       </div>
         
		<div class="form-group<?php echo e($errors->has('last_name') ? ' has-error' : ''); ?>">
			<label class="col-md-3 control-label">Last Name</label>
                <div class="col-md-9">
					<input type="text" name="last_name" value="<?php echo e($teacher_profile->lastName); ?>" class="form-control" required>
					 <small class="text-danger pull-left"><?php echo e($errors->first('last_name')); ?></small>
				</div>
		</div>
          
								
		<div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : ''); ?>"><label class="col-md-3 control-label">Telephone</label>
			<div class="col-md-9">
			   <input type="text" name="phone" size="12" maxlength="12"  value="<?php echo e(old('phone',(empty($teacher_profile->phone))?"":$teacher_profile->phone )); ?>" class="form-control">
			   <small class="text-danger pull-left"><?php echo e($errors->first('phone')); ?></small>
			 </div>
	   </div>
                                
		 
		<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>"><label class="col-md-3 control-label">Email</label>

			<div class="col-md-9"><input type="email" name="email" value="<?php echo e(old('email',$teacher_profile->email)); ?>" class="form-control" required>
			 <small class="text-danger pull-left"><?php echo e($errors->first('email')); ?></small>
			</div>
			</div>
		
		 
		<div class="form-group">
			<label class="col-md-3 control-label">Address Line 1</label>
				<div class="col-md-9"><input type="text" name="add1" value="<?php echo e((empty($teacher_profile->addressL1))? "": $teacher_profile->addressL1); ?>"  class="form-control"></div>
		</div>
          
		<div class="form-group">
			<label class="col-md-3 control-label">Address Line 2</label>
				<div class="col-md-9">
					<input type="text" name="add2" value="<?php echo e((empty($teacher_profile->addressL2))? "": $teacher_profile->addressL2); ?>"  class="form-control"></div>
        </div>
		 
		<div class="form-group<?php echo e($errors->has('city') ? ' has-error' : ''); ?>">
			<label class="col-md-3 control-label">City</label>
				<!--<div class="col-md-9">
					<input type="text" name="city" value="<?php echo e((empty($teacher_profile->city))? "" : $teacher_profile->city); ?>"  class="form-control">
				</div>-->
				<div class="col-md-9">
					<input type="text" name="city" value="<?php echo e(old('city',(empty($teacher_profile->city))?"":$teacher_profile->city )); ?>"  class="form-control">
					<small class="text-danger pull-left"><?php echo e($errors->first('city')); ?></small>
				</div>
        </div>
		 
	<div class="form-group">
		<label class="col-md-3 control-label">State</label>
			<div class="col-md-9">
				<select class="form-control m-b" name="state">
				<?php $__currentLoopData = $statename; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($state->stateId); ?>" <?php echo e(($teacher_profile->yourState->stateId == $state->stateId ) ? 'selected' : ''); ?>>
					<?php echo e($state->stateName); ?>

					</option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
				</select></div>
	</div>
	 
	<div class="form-group<?php echo e($errors->has('zip') ? ' has-error' : ''); ?>">
		<label class="col-md-3 control-label">Zip Code</label>
           <div class="col-md-9">
		   <input type="text" name="zip"  id="newZipCode" value="<?php echo e(old('zip',(empty($teacher_profile->zipCode))?"":$teacher_profile->zipCode )); ?>" class="form-control">
		   <small class="text-danger pull-left"><?php echo e($errors->first('zip')); ?></small>
		   </div>
		   <input type="hidden" name="dbZipCode" id="dbZipCode" value="<?php echo e($teacher_profile->zipCode); ?>" />
     </div>
     <div class="text-center">
		<button class="btn btn-primary" type="submit" ><strong>Save</strong></button>
	</div>
   </div>
</div>
</div>

								</form>
								</div>
								
								 <div class="row">
                <div class="col-lg-10">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Change Password</h5>
                           
                        </div>
						<form method="post" action="<?php echo e(url('updatepassword').'/'.$teacher_profile->teacherId); ?>" class="form-horizontal">
						<?php echo e(csrf_field()); ?>

                        <div class="ibox-content">
						
                                                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>"><label class="col-md-3 control-label">New Password</label>

                                    <div class="col-md-9"><input name="password"  id ="pwd" type="password" class="form-control" required>
									<small class="text-danger pull-left"><?php echo e($errors->first('password')); ?></small></div>
                                    </div>
                           
                                  

								<div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>"><label class="col-md-3 control-label">Confirm Password
</label>

                                    <div class="col-md-9"><input name="password_confirmation" id="cpwd" type="password"  class="form-control" required>
									 <small class="text-danger pull-left"><?php echo e($errors->first('password_confirmation')); ?></small>
									</div>
                                 
								 </div>
                                
                                 
								<div class="text-center">
								<button class="btn btn-primary" type="submit"><strong>Update</strong></button>
								</div>
						
								</div>
								</form>	
								</div>
								</div>
								</div>
							
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
<script>
function isZip(){
	
	var newZipCode = $("#newZipCode").val();
	var dbZipCode = $("#dbZipCode").val();
	//alert(newZipCode+' '+dbZipCode);
	//return false;
	//s = s.value;
    var reZip = "/(^\d{5}$)|(^\d{5}-\d{4}$)/";
    if(!(/(^\d{5}$)|(^\d{5}-\d{4}$)/).test(newZipCode)){
         alert("Zip code is not valid");
         return false;
    }
	else if(dbZipCode!=newZipCode)
	{
		$.noConflict();
		//$('#myModal').modal();
		//cleared = false;
		bootbox.alert({
			message: 'Warning: You are updating mailing address. To update your travel radius and studio location you must <a href="https://teachers.musikalessons.com/profile" target="">click here </a> and update it.',
			callback: function () {
				console.log('This was logged in the callback!');
				return true;
			}
		})
	}
	//return  false;
	
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\musikateachers\resources\views/teacher_profile.blade.php ENDPATH**/ ?>