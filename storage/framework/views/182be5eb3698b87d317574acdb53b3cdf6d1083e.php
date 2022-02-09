<?php echo $__env->make('layouts.layout_control.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<h2>Instruments</h2>
<table width="642" class="table">
    <tr>
        <th width="62">ID</th>
        <th width="233">Isntrument</th>
        <th width="202">Status</th>
        <th width="125">&nbsp;</th>
    </tr>
<?php $__currentLoopData = $vars['instruments']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instrument): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
    <tr>
        <td><?php echo e($instrument->instruments_id); ?></td>
        <td><?php echo e($instrument->name); ?></td>
        <td><?php echo e($instrument->is_active == 'Y' ? 'Active' : 'Inactive'); ?></td>
        <td><input type="submit" name="button" id="button" value="Delete" onclick="alert('Action is not authorized');" /></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

<?php echo $__env->make('layouts.layout_control.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\musikateachers\resources\views/settings/instruments.blade.php ENDPATH**/ ?>