<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Musika LLC</title>
<!--[if IE 6]>
<script src="assets/js/DD_belatedPNG_0.0.8a-min.js"></script>
<script>
  
  DD_belatedPNG.fix('#header');
  DD_belatedPNG.fix('.notification');
  DD_belatedPNG.fix('.submit');
  DD_belatedPNG.fix('.pngfix');

</script>
<![endif]-->
<link href="<?php echo e(asset('control/assets/css/styles.css')); ?>" rel="stylesheet" type="text/css" />

</head>
<body>
<div id="admin-wrapper">

  <form action="<?php echo e(route('control.login')); ?>" method="post">
  <?php if(Session::has('message')): ?>
  <p><?php echo e(Session::get('message')); ?></p>
  <?php endif; ?>
    <?php echo csrf_field(); ?>
    <div id="logo">
      <h1><strong>Musika</strong>LLC</h1>
    </div>
    <label>Username</label>
    <br />
    <input name="username" type="text" class="text big" id="username" />
    <br />
    <label>Password</label>
    <br />
    <input name="password" type="password" class="text big" id="password" />
    <br />
    <div class="clearfix">&nbsp;</div>
    <p>
      <input name="btn_login" type="submit" class="submit" id="btn_login" value="LOGIN" />
      <input type="checkbox" class="checkbox" id="cbdemo2" />
      <label for="cbdemo2">Remember Me</label>
    </p>
  </form>
</div>
</body>
</html><?php /**PATH C:\xampp\htdocs\musikateachers\resources\views/control/login.blade.php ENDPATH**/ ?>