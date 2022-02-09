<?php echo $__env->make('layouts.layout_control.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<div class="grid_12">
        <form method="get" action="<?php echo e(route('control.control.customer')); ?>">
           
<table width="800" border="0">
	<tr>
    	<td width="73">Search</td>
        <td width="219"><input type="text" name="searchwords" id="searchwords" value="<?php echo e($vars['searchwords']); ?>" /></td>
        <td width="494"><input type="submit" name="button" id="button" value="Submit" /></td>
    </tr>
    
</table>
</form>
<table width="987" border="0" cellpadding="4" cellspacing="2">
	<tr>
    	<th width="164">Account #</th>
        <th width="266">Name</th>
        <th width="231">Email</th>
        <th width="141">Last Updated</th>
        <th width="151">Created</th>
        
    </tr>
<?php $__currentLoopData = $vars['customers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
  <tr>
	    <td><?php echo e($customer->customers_id); ?></td>
    <td><a href="customers_controller/edit/<?php echo e($customer->customers_id); ?>"><?php echo e($customer->firstname); ?> <?php echo e($customer->lastname); ?></a></td>
        <td><?php echo e($customer->email); ?></td>
        <td>08/17/2010</td>
        <td>08/17/2010</td> 
        
  </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
     
</div>
<?php echo e($vars['customers']->appends(['searchwords' =>$vars['searchwords']])->links()); ?>


<?php echo $__env->make('layouts.layout_control.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH C:\xampp\htdocs\musikateachers\resources\views/customers/index.blade.php ENDPATH**/ ?>