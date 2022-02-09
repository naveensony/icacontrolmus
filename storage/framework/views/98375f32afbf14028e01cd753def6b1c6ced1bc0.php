

<?php $__env->startSection('title'); ?>
Home
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>
 
.wrapper-content a{
	text-decoration: underline;
}

h5 small, .h5 small, h5 .small, .h5 .small{
	
	font-size:80% !important;
	
}
@media  screen and (min-width: 320px) and (max-width: 767px) {
	.ibox-title h5 {
		font-size: 15px;
	}
}
.headingSpace{
	padding-left:5px;
}

.personal tr td:nth-child(1) {
    width: 25% !important;
}
.set-width tr td:nth-child(1) {
    width: 20% !important;
}
@media  screen and (min-width: 768px) and (max-width: 1024px) {
	.col-sm-2 {
		width: 25%;
	}
}
</style>
<div class="wrapper wrapper-content">
<div class="row paddingzero">
<div class="col-lg-10">
<?php if(session('status')): ?>
                    <div class="alert alert-success">
                        <?php echo session('status'); ?>

                    </div>
			<?php endif; ?> 
</div>	


<div class="col-lg-10">
<?php if(session('thaeading') && session('tmsg') ): ?>
                    <div class="alert alert-info">
                        <h3><?php echo e(session('thaeading')); ?></h3>
						<p><?php echo session('tmsg'); ?></p>
                    </div>
<?php endif; ?> 
</div>	


		
</div>			

  <?php if($admission->isNotEmpty()): ?>
  <div class="row paddingzero">
      <div class="col-lg-10">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5><span style="color:#00aeef;"> Registered Students </span> <small> The following Musika students are currently registered as having music lessons with you.</small> </h5>
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
                        <tr>
                           <th width="25%">Name</th>
                           <th width="20%" class="inst">Instrument</th>
                           <th >Entries</th>
                           <th class="inst"></th>
                           <!--<th>Action</th>-->
                        </tr>
                     </thead>
                     <tbody>
                        <?php $__currentLoopData = $admission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $students): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
                        <tr>
                           <td>
                              <?php
                              $row=(!empty($students->name->lastName)?($students->name->packageStudent=='Y'&&$students->name->lastName[0]!='-'?'- ':"").$students->name->firstName."  ":"").$students->name->lastName;
                              ?>
                              <a href="viewStudent/<?php echo e($students->name->studentId); ?>" data-toggle="tooltip" data-placement="bottom" title="View profile for student <?php echo e($row); ?>"> <?php echo e($row); ?></a>
                           </td>
                           <td class="inst">
                              <?php echo e($students->instName->instrumentName); ?>

                           </td>
                           <td><a href="invoice/<?php echo e($students->admissionId); ?>" title="View entries for student <?php echo e($row); ?>">View  Entries</a></td>
                           <td class="inst"></td>
                           <!--<td class="seb"><div class="btn-group">
                              <button class="btn btn-info btn-xs" type="button">Submit Entry</button>
                              
                              </div></td>-->
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>			
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php endif; ?>
   <?php if($awaiting_students->isNotEmpty()): ?>
   <div class="row paddingzero">
      <div class="col-lg-10">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5><span style="color:#00aeef;">Students Awaiting Registration (Intro lesson taught) </span><small>  The following Musika students are confirmed by you to have been taught an introductory lesson, but are not yet officially registered. Musika will continue to contact the parent/student regarding registration until they have officially registered with you. </small></h5>
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
                        <tr>
                           <th width="25%" >Name</th>
                           <th width="20%" class="inst">Instrument</th>
                           <th class="col-md-4">Registration Status</th>
                           <th class="col-md-2"> Matched Date </th>
                           <!--<th>Action</th>-->
                        </tr>
                     </thead>
                     <tbody>
                        <?php $__currentLoopData = $awaiting_students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $awaitingstudent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
                        <?php if(!is_null($awaitingstudent->prospectiveStudent)): ?>									
                        <tr>
                           <!--<td><a href="viewNewStudent/<?php echo e($awaitingstudent->prospectiveId); ?>"><?php echo e($awaitingstudent->prospectiveStudent->firstName); ?> <?php echo e($awaitingstudent->prospectiveStudent->lastName); ?></a></td>-->
                           <td>
                              <?php
                              $row1=(!empty($awaitingstudent->prospectiveStudent->lastName)?($awaitingstudent->prospectiveStudent->packageStudent=='Y'&&$awaitingstudent->prospectiveStudent->lastName[0]!='-'?'- ':"").$awaitingstudent->prospectiveStudent->firstName."  ":"").$awaitingstudent->prospectiveStudent->lastName;
                              ?>
                              <a href="viewAwaitingStudent/<?php echo e($awaitingstudent->prospectiveStudent->studentId); ?>" data-toggle="tooltip" data-placement="bottom" title="View profile for student <?php echo e($row1); ?>"><?php echo e($row1); ?></a>
                           </td>
                           <td class="inst"><?php echo e($awaitingstudent->instrument->instrumentName); ?></td>
                           <td class="status"><?php
                              if(isset($awaitingstudent->pro_status))
                              {
                              $ec=str_replace("Teacher","I",$awaitingstudent->pro_status->statusDesc);
                              }
                              else
                              {
                              $ec= "&mdash;";
                              }
                              ?>
                              <?php echo e($ec); ?>

                           </td>
						   <td><?php echo e(date('Y-m-d',strtotime($awaitingstudent->dateMade))); ?> </td>
                           <!--<td><div class="btn-group">
                              <button class="btn btn-info btn-xs" type="button">Submit Entry</button>
                              
                              </div></td>-->
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php endif; ?>
   <?php if($prospective_students->isNotEmpty()): ?>
   <div class="row paddingzero">
			
      <div class="col-lg-10">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5><span style="color:#00aeef;">Prospective Student </span><small> The following Musika students are not yet confirmed as having been taught an introductory lesson by you. </small></h5>
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
                        <tr>
                           <th >Name</th>
                           <th class="inst">Instrument</th>
                           <th width="45%">Status</th>
                           <th >Matched Date</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $__currentLoopData = $prospective_students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unrstudent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
                        <?php if(!is_null($unrstudent->prospectiveStudent)): ?>									
                        <tr>
                           <!--<td><a href="viewNewStudent/<?php echo e($unrstudent->prospectiveId); ?>"><?php echo e($unrstudent->prospectiveStudent->firstName); ?> <?php echo e($unrstudent->prospectiveStudent->lastName); ?></a></td>-->
                           <td>
                              <?php
                              $row2=(!empty($unrstudent->prospectiveStudent->lastName)?($unrstudent->prospectiveStudent->packageStudent=='Y'&&$unrstudent->prospectiveStudent->lastName[0]!='-'?'- ':"").$unrstudent->prospectiveStudent->firstName."  ":"").$unrstudent->prospectiveStudent->lastName;
                              ?>
                              <a href="viewNewStudent/<?php echo e($unrstudent->prospectiveStudent->studentId); ?>" data-toggle="tooltip" data-placement="bottom" title="View profile for student <?php echo e($row2); ?>"  style="word-break: break-word;"><?php echo e($row2); ?></a>
                           </td>
                           <td class="inst"><?php echo e($unrstudent->instrument->instrumentName); ?></td>
                           <td class="status">
							<?php if(isset($unrstudent->pro_status)): ?>
								<?php if($unrstudent->pro_status->statusId==4): ?>
									I spoke to student/parent and set up a first lesson date for (<?php echo e($unrstudent->intro_sh_date); ?>)
								<?php else: ?>
									<?php echo e(str_replace("Teacher","I",$unrstudent->pro_status->statusDesc)); ?>

								<?php endif; ?>
							<?php else: ?>
                              <span style="color:red;">*Unknown</span>
							<?php endif; ?>
							<?php if(isset($unrstudent->pro_status)): ?>
                              <a href="<?php echo e(url('getStatus').'?sid='.$unrstudent->pro_status->statusId.'&pid='.$unrstudent->prospectiveStudent->studentId); ?>">Change Status</a>
							<?php else: ?>
                              <a href="<?php echo e(url('getStatus').'?pid='.$unrstudent->prospectiveStudent->studentId); ?>">Change Status</a>
							<?php endif; ?>	
							  
                           </td>
							<td class="status">
							<?php echo e(date('Y-m-d',strtotime($unrstudent->dateMade))); ?>

                             
                           </td>
						   
                           <!--<td><div class="btn-group">
                              <button class="btn btn-primary btn-xs" type="button">Change Status</button>
                              
                              </div></td>-->
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\musikateachers\resources\views/home.blade.php ENDPATH**/ ?>