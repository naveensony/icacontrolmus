

<?php $__env->startSection('custom_css'); ?>
<style>
body { 
  background-color: #FFFFFF !important;
}
.b_color:focus {
border-color: #1c84c6 !important;	
}
.btn-link {
    color: #337ab7 !important;
}
.btn-link:hover {
    color: #039cd5 !important;  /* 039cd5  00aeef*/
	text-decoration: underline;
}

.middle-box {
    padding-top: 80px;
	padding-bottom: 20px;
	max-width: 800px !important;
	z-index: 0;
}


.loginscreen.middle-box {
    width: 800px;
}


</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div id="wrapper" class="login_wrap">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <h2 style="font-weight:700">Musika - Not found</h2>
      

        <div class="error-desc" style="font-weight:600;font-size: 16px;">
            Sorry, but the page you are looking for has note been found. Try checking the URL for error, then hit the refresh button on your browser or try found something else in our webiste.</br></br>
			Need Help? </br>Call now 877-687-4524 </br></br>
			<a href="/login">Teacher Login</a>
            <!--<form class="form-inline m-t" role="form">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search for page">
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>-->
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\musikateachers\resources\views/errors/404.blade.php ENDPATH**/ ?>