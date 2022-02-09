<style>
.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}
</style>


<div class="topnav">control.customer
  <a  <?php if($class == 'student'): ?> class="active" <?php endif; ?> href="<?php echo e(route('control.control.customer')); ?>">Customers</a>
  <a <?php if($class == 'student'): ?> class="active" <?php endif; ?> href="<?php echo e(route('control.student')); ?>">Students</a>
  <a <?php if($class == 'prospective'): ?> class="active" <?php endif; ?> href="<?php echo e(route('control.prospective')); ?>">Prospective Students</a>
  <a href="">Dashboard</a>
  <a href="">Teachers</a>
  <a <?php if($class == 'new_application'): ?> class="active" <?php endif; ?> href="<?php echo e(route('control.new_application')); ?>">Teacher Applications</a>
  <a href="">Admissions</a>
  <a <?php if($class == 'dashboard'): ?> class="active" <?php endif; ?> href="<?php echo e(route('control.dashboard')); ?>">Tasks</a>
  <a <?php if($class == 'link'): ?> class="active" <?php endif; ?> href="<?php echo e(route('control.links')); ?>">Links</a>
  <a href="">Preferences</a>
</div>
<div style="float:left;margin-left:3px;font-size:10pt">
    <?php echo e(\Carbon\Carbon::now()->format('d.F.Y H:i:s')); ?>

</div>
<div style="float:right;margin-right:3px;font-size:10pt">
    <?php echo e('Logged in as '.session('user')->firstname.' '.session('user')->lastname.' '); ?><a href="<?php echo e(route('control.logout')); ?>">[ Logout ]</a>
</div>

<?php /**PATH C:\xampp\htdocs\musikateachers\resources\views/system/head.blade.php ENDPATH**/ ?>