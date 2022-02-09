<?php echo $__env->make('layouts.layout_control.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<div class="grid_12">
<table width="800" border="0">
<form method="get" action="<?php echo e(route('control.control.teacher')); ?>">
	<tr>
    	<td width="73">Search</td>
        <td width="219"><input type="text" name="searchwords" id="searchwords" value="<?php echo e($vars['searchwords']); ?>" /></td>
        <td width="494"><input type="submit" name="button" id="button" value="Submit" /></td>
    </tr>
    </form>   
</table>
<table width="1000" border="0" cellpadding="4" cellspacing="2" class="table">
	<tr>
    	<th width="75">Account #</th>
        <th width="150">Name</th>
        <th width="155">Email</th>
        <th width="123">City, State</th>
        <th width="268">Instruments</th>
        <th>Status</th>
        <th>&nbsp;</th>
		<th>Last Active</th>
        <th>&nbsp;</th>
        <th>Legacy</th>
		<th>&nbsp;</th>
    </tr>
    <?php $__currentLoopData = $vars['teachers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
    
  <tr>
	    <td><?php echo e($teacher->teachers_id); ?></td>
    <td><a href="teachers_controller/edit/<?php echo e($teacher->teachers_id); ?>"><?php echo e($teacher->firstname); ?> <?php echo e($teacher->lastname); ?></a></td>
        <td><?php echo e($teacher->email); ?></td>
        <td><?php echo e($teacher->city); ?>, <?php echo e($teacher->state); ?></td>
        <td><?php echo e($teacher->instruments); ?></td>
        <td width="76"><?php echo e(ucfirst($teacher->status)); ?></td>
		 <td>&nbsp;</td>
		<td width="76"><?php echo e($teacher->musika_id); ?></td>
        <td width="39"><a href="teachers_controller/subscriptions/<?php echo e($teacher->teachers_id); ?>">Subscriptions</a></td>
        <td width="40" align="center"><a href="https://system.musikalessons.com/update/control.php?page=teacher&id=<?php echo e($teacher->teachers_id); ?>">V1</a> <a href="https://system.musikalessons.com/control/control.php?page=teachers_edit&old_id=<?php echo e($teacher->teachers_id); ?>">V2</a></td>
		<td>Close Account</td>
  </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

</div>
<?php echo e($vars['teachers']->appends(['searchwords' =>$vars['searchwords']])->links()); ?>


<?php echo $__env->make('layouts.layout_control.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php


function getlastactive($id){
	$link = mysqli_connect('localhost','musika7_musikabeta_db1','7x3qzx4ept','musika7_musikabeta_db1');
	
	$res = @mysqli_query($link, "Select dateLastLogin from User where id = $id");
	if(@mysqli_num_rows($res)==0) return 'NA';
	$row = @mysqli_fetch_array($res);
	return $row['dateLastLogin'];
	
}
?>

<?php /**PATH C:\xampp\htdocs\musikateachers\resources\views/teacher/index.blade.php ENDPATH**/ ?>