<style>
.minimalize-styl-2
{
	display: none;
}
.logo
{
	   margin-left: 5px;
    margin-top: 2px;
}
@media (max-width: 355px) {
	.navbar-header {max-width: 85%;}
	.nav.navbar-right > li > a[title="Log Out"] {
		padding: 20px 4px;
		margin-left: 13px;
	}
	.navbar-header .logo img {
		max-width: 100%;
	}
}
.dd-text {
    margin-top: 3px;
    /* padding-left: 30%; */
	color:#fff;
	width:105%;
	background-color: #742475;
	padding-top:10px;
	padding-bottom:5px;
	margin-left: -15px;
	text-align: center;
	padding-right: 4%;
	min-height:45px;
	
}
</style>
<div class="row border-bottom">
    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0;padding-right: 4%;padding-bottom: 10px;">
        <div class="navbar-header">
          <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> 
		   </a>
		  <div class="logo"><img class="responsive" src="https://teachers.musikalessons.com/img/musika.svg" height="60px" ></div>
		  <!--<div class="logo"><img class="responsive" src="https://teachers.musikalessons.com/img/logo225.png"></div>
		  <div class="logo"><img class="responsive" src="https://www.musikalessons.com/themes/musika_res/images/logo.jpg"></div>
		 
            <form role="search" class="navbar-form-custom" method="post" action="/">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search" />
                </div>
            </form>-->
			
        </div>
        <ul class="nav navbar-top-links navbar-right">
			<li>
                    <span class="m-r-sm text-muted welcome-message">Welcome <?php if(Auth::check()): ?><?php echo e(Auth::user()->firstName); ?>  <?php echo e(Auth::user()->lastName); ?> ! <?php endif; ?></span>
           </li>
            <li>
			
			<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
						
						
						
						
						<a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" title="Log Out">
                                         <i class="fa fa-sign-out"></i>
                                        </a>
			
			
                
            </li>
		
        </ul><!-- #5e1d5f -->
		
    </nav>
</div>

<div class="dd-text"> <span style="background-color: #742475; font-size: 16px;
    font-weight: 500;"> <a href='/paymentMethod' style='font-size: 16px;color:#fff'>New! Sign up for direct deposit!</a> </span></div><?php /**PATH /var/www/vhosts/musikateachers/resources/views/layouts/topnavbar.blade.php ENDPATH**/ ?>