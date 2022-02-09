
<?php
use Illuminate\Support\Facades\Cookie;

$url = Cookie::get('ref');
$newUrl = str_replace( "www." , "system." , $url );
dd($url);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Musika LLC</title>
<?php if(cookie('ref') == ''): ?>
<meta http-equiv="refresh" content="2;URL=https://system.musikalessons.com/update/control.php?page=tasks" />
<?php else: ?>
<meta http-equiv="refresh" content="2;URL=<?php echo e($newUrl); ?>" />
<?php endif; ?>
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
  <form action="" method="post">
    <div id="logo">
      <center><h1>Clocking in..</h1>
      <img src="<?php echo e(asset('control/assets/images/loader1.gif')); ?>" width="128" height="15" border="0" /></center>
    </div>
</form>
</div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\musikateachers\resources\views/control/clock_in.blade.php ENDPATH**/ ?>