<?php echo $__env->make('layouts.layout_control.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<form id="form1" name="form1" method="post" action="<?php echo e(route('control.control.searchmetrosearch')); ?>">
    <?php echo csrf_field(); ?>
  Instrument:
  <select name="instrument" id="instrument">
  <option></option>

	<?php $__currentLoopData = $vars['instruments']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instrument): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	
		<option value="<?php echo e($instrument->instruments_id); ?>" <?php echo e($instrumens == $instrument->instruments_id ? 'selected' : ''); ?>><?php echo e($instrument->name); ?></option>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  </select>
  Metro:
  <select name="metro" id="metro">
  <option></option>

    <?php $__currentLoopData = $vars['metros']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $metro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	
	<option value="<?php echo e($metro->metros_id); ?>" <?php echo e($meto == $metro->metros_id ? 'selected' : ''); ?>><?php echo e($metro->name); ?></option>
	
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
  <input type="submit" name="button" id="button" value="Submit" />
</form>
<?php if(isset($vars['teachers'])): ?>
<table width="200" border="1" class="table">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>&nbsp;</th>
  </tr>
<?php $__currentLoopData = $vars['teachers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
  <tr>
    <td><?php echo e($teacher->teachers_id); ?></td>
    <td><a href="/teachers_controller/edit/<?php echo e($teacher->teachers_id); ?>"><?php echo e($teacher->firstname); ?> <?php echo e($teacher->lastname); ?></a></td>
    <td>&nbsp;</td>
  </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<?php endif; ?>
<?php echo $__env->make('layouts.layout_control.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\musikateachers\resources\views/teacher/searchmetro.blade.php ENDPATH**/ ?>