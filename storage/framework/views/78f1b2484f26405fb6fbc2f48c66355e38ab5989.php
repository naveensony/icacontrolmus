
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
		<?php  $cnt_admission_data = 0; $cnt_prosective_data = 0; ?>
		<?php if(isset($admission_data)): ?>
		<?php if($admission_data->isNotEmpty()): ?>
			<?php  $cnt_admission_data = 1; ?> 
			<?php endif; ?>
		
		<?php $__currentLoopData = $admission_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $students): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php        $row=(!empty($students->name->lastName)?($students->name->packageStudent=='Y'&& $students->name->lastName[0]!='-'?'- ':"").$students->name->firstName."  ":"");
			?>
		
		
			<p><span style="/*color:#00aeef;*/">
			
			<?php if(!empty($l_records)): ?>
				<?php $ldate = $l_records->lessonDate;  ?>
				<span style="color:red"><strong>URGENT:</strong></span>	
				The last entry date you have logged for <strong><?php echo e($row); ?> <?php echo e($students->name->lastName); ?> (<?php echo e($students->instName->instrumentName); ?>)</strong> lessons was on <strong><?php echo e($ldate); ?></strong>. Please review your entry to make sure you have not forgotten to log (lessons, cancellations, other, etc) for <strong><?php echo e($row); ?> <?php echo e($students->name->lastName); ?></strong>
			<?php else: ?>
				<?php $ldate = ""; ?>
				<span style="color:red"><strong>URGENT:</strong></span>	You have not logged any entry for 656 5656 (Piano).
			<?php endif; ?>
			
			To remove this temporary account access restriction, log entries for <strong><?php echo e($row); ?> <?php echo e($students->name->lastName); ?></strong>  on or after <strong><?php echo e(date('Y-m-d', strtotime("-45 days"))); ?></strong> or submit a termination request. This will notifying us that <strong><?php echo e($row); ?> <?php echo e($students->name->lastName); ?></strong> wishes to stop lessons.
			
			</span></p>
		
		
		
			<div style="margin-top: 35px; text-align: center;" >
				<a class="btn btn-primary" href="<?php echo e(url('/terminateLessons')); ?>?stu_id=<?php echo e($students->admissionId); ?>" style="margin-right: 10px;margin-bottom: 10px;" >Terminate Student</a>
				<a class="btn btn-primary" href="<?php echo e(url('/invoice')); ?>/<?php echo e($students->admissionId); ?>" style="margin-right: 10px;margin-bottom: 10px;" >View entries</a>
				<a class="btn btn-primary" href="JavaScript:void(0)" onclick="close_popup();" style="margin-bottom: 10px;" >Submit entry</a>
			</div>
		
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
		
		<?php if($prospective_students->isNotEmpty() && $admission_data->isEmpty()): ?>
			<?php  $cnt_prosective_data = 1; ?>
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
				<?php $__currentLoopData = $prospective_students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unrstudent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if(!is_null($unrstudent->prospectiveStudent)): ?>	
				<tr>
				   <td>
					  <?php
					  $row2=(!empty($unrstudent->prospectiveStudent->lastName)?($unrstudent->prospectiveStudent->packageStudent=='Y'&&$unrstudent->prospectiveStudent->lastName[0]!='-'?'- ':"").$unrstudent->prospectiveStudent->firstName."  ":"").$unrstudent->prospectiveStudent->lastName;
					  ?>
					  <?php echo e($row2); ?>

				   </td>
				   
				   <td>
				   
				   <div class="action_link"><a class="btn btn-primary" href="JavaScript:void(0)" onclick="close_popup();" >OK</a></div>
				   </td>
				   
				</tr>
				<?php endif; ?>	
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>			
			 </tbody>
		  </table>
		<?php endif; ?>
		<?php endif; ?>
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
			<?php if(isset($admission_data)): ?>	
			<?php if($admission_data->isNotEmpty()): ?>
					<?php $__currentLoopData = $admission_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $students): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="table-responsive" style="border: 0px">
					<p><h4><span style="color:red">Warning:</span>  Before proceeding to the link you must log entries (lessons, cancellations, other, etc) or submit a termination request for <?php echo e($row); ?> <?php echo e($students->name->lastName); ?> if they has stopped lessons.<br>
					
					
					</h4></p>
					<p> 
						<div style="margin-top: 35px; text-align: center;" >
							<a class="btn btn-primary" href="<?php echo e(url('/terminateLessons')); ?>?stu_id=<?php echo e($students->admissionId); ?>" style="margin-right: 10px;margin-bottom: 10px;" >Terminate Student</a>
							<a class="btn btn-primary" href="<?php echo e(url('/invoice')); ?>/<?php echo e($students->admissionId); ?>" style="margin-right: 10px;margin-bottom: 10px;" >View entries</a>
							<a class="btn btn-primary" style="margin-bottom: 10px;" href="JavaScript:void(0)" onclick="close_warning_popup();" >Submit entry</a>
						</div>
					</p>
					<!--<p> <div style="margin-top: 35px; text-align: center;" ><a class="btn btn-primary" href="JavaScript:void(0)" onclick="close_warning_popup();" >Ok</a></div></p>-->
				</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php elseif($prospective_students->isNotEmpty() && $admission_data->isEmpty()): ?>
				<div class="table-responsive" style="border: 0px">
					<p><h4><span style="color:red">Warning:</span> Before proceeding to the link you must update status of intro lesson for <?php echo e($row2); ?>. </h4></p>
					<p> <div style="margin-top: 35px; text-align: center;" ><a class="btn btn-primary" href="JavaScript:void(0)" onclick="close_warning_popup();" >Ok</a></div></p>
				</div>
				<?php endif; ?>
				<?php endif; ?>
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
        <strong>Copyright11</strong> &copy; 2001 - <?php echo e(date('Y')); ?> Musika All Rights Reserved
    </div>
</div>


<script>
// $(document).ready(function(){
	

	
// 	// $(window).scrollTop(0);
// 	var url = "<?php echo e(Request::path()); ?>";
// 	console.log(url);
// 	//console.log(url.indexOf('invoice') !== -1);
// 	<?php if(Request::path() == 'new-submit-entry' && $cnt_admission_data==10000): ?>
// 		$("#footer_myModal").hide();
// 	<?php elseif(Request::path() == 'terminateLessons' && $cnt_admission_data==1): ?>
// 		$("#side-menu li:not(#is_enable)").click(function(){
// 			$("#warning_myModal").modal();
// 		});
// 		$("#side-menu a:not(#is_enable a)").css({"color":"#888888", cursor: "default"}).click(function(e) {
// 			e.preventDefault();
// 		});
// 		$("#footer_myModal").hide();
// 	<?php elseif(Request::path() == 'getStatus' && $cnt_prosective_data==1111111): ?>
// 		$("#side-menu li:not(#is_enable)").click(function(){
// 			$("#warning_myModal").modal();
// 		});
// 		$("#side-menu a").css({"color":"#888888", cursor: "default"}).click(function(e) {
// 			e.preventDefault();
// 		});	
// 		$("#footer_myModal").hide();
// 	<?php elseif(strpos(Request::path(), 'invoice/') !== false): ?>
// 		$("#side-menu li:not(#is_enable)").click(function(){
// 			$("#warning_myModal").modal();
// 		});
// 		$("#side-menu a:not(#is_enable a)").css({"color":"#888888", cursor: "default"}).click(function(e) {
// 			e.preventDefault();
// 		});	
// 		$("#footer_myModal").hide();
// 	<?php else: ?>	
// 		var log_lesson  = "";
// 		var prospective_result  = "";
// 		console.log(log_lesson);
// 		if(log_lesson=="Yes"){
			
// 			/* $("#side-menu li:not(#is_enable)").click(function(){
// 				$("#warning_myModal").modal({
// 					backdrop: 'static',
// 					keyboard: false
// 				});
// 			});
// 			$("#side-menu a:not(#is_enable a)").css({"color":"#888888", cursor: "default"}).click(function(e) {
// 				e.preventDefault();
// 			}); 
// 			$("#footer_myModal").modal({
// 				backdrop: 'static',
// 				keyboard: false
// 			});   */
// 		}else if(prospective_result=="Yes"){
// 			/* $("#side-menu li:not(#is_enable)").click(function(){
// 				$("#warning_myModal").modal({
// 					backdrop: 'static',
// 					keyboard: false
// 				});
// 			});
// 			$("#side-menu a").css({"color":"#888888", cursor: "default"}).click(function(e) {
// 				e.preventDefault();
// 			}); 
// 			$("#footer_myModal").modal({
// 				backdrop: 'static',
// 				keyboard: false
// 			});  */
// 		}else{
// 			$("#side-menu a").css({"color":"", cursor: ""}).unbind();	
// 		}
// 	<?php endif; ?>
		
// });

function close_popup(){
	$("#footer_myModal").modal('hide');
}
function close_warning_popup(){
	$("#warning_myModal").modal('hide');
}
</script>
<?php /**PATH C:\xampp\htdocs\musikateachers\resources\views/layouts/footer.blade.php ENDPATH**/ ?>