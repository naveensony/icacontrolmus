<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musika Lessons |  <?php echo $__env->yieldContent('title'); ?> </title>
	<link rel="icon" href="https://www.musikalessons.com/favicon.ico"> 


    <link rel="stylesheet" href="<?php echo asset('css/vendor.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/app.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/plugins/iCheck/custom.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/style.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css'); ?>" />
	
	<?php echo $__env->yieldContent('link_css'); ?>
    <link rel="stylesheet" href="<?php echo asset('css/custom_media.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/custom.css'); ?>" />
	<?php echo $__env->yieldContent('custom_css'); ?>
	<style>
.sub-menu {
            display: none;
        }
		.sub-menu li {
			list-style-type: none;
		}
        .sub-menu li a {
            padding: 7px 10px 7px 10px;
            padding-left: 2px;
            color: #a7b1c2;
            font-weight: 600;
            position: relative;
            display: block;
            text-decoration: none;
        }

        .sub-menu li a:hover {
            color: #fff;
        }
		
@media  screen and (max-width: 612px) {
	.footer-popup{
		 /*width: 700px;*/
	}
	.action_link {
		float: none;
		padding-bottom: 10px;
	}
}
@media  screen and (min-width: 613px) {
	.action_link {
		float: left;
	}
}
		
	.link-btn-new {
    background-color: #00aeef;
    border-color: #00aeef;
    color: #ffffff;
    padding: 4px;
	font-weight: bold;
    /* display: block;*/
    margin: 8px 5px;
    text-align: center;
}
.link-btn-new:hover {
	background-color: #039cd5;
    border-color: #039cd5;
    color: #ffffff;
} 	
</style>
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
</head>
<body>

  <!-- Wrapper-->
    <div id="wrapper">

        <!-- Navigation -->
        <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            <?php echo $__env->make('layouts.topnavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Main view  -->
            <?php echo $__env->yieldContent('content'); ?>

            <!-- Footer -->
            

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->

<script src="<?php echo e(asset('js/app.js')); ?>" type="text/javascript"></script>
<?php echo $__env->yieldContent('prospective_js'); ?>
<script src="<?php echo e(asset('js/profile_validatoin.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/plugins/iCheck/icheck.min.js')); ?>" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>
<?php echo $__env->yieldContent('custom_js'); ?>


<?php $__env->startSection('scripts'); ?>
<?php echo $__env->yieldSection(); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\musikateachers\resources\views/layouts/app.blade.php ENDPATH**/ ?>