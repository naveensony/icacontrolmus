<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Musika Lessons |  <?php echo $__env->yieldContent('title'); ?> </title>
	<link rel="icon" href="https://www.musikalessons.com/favicon.ico">

    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('css/animate.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/login_style.css')); ?>" rel="stylesheet">

    
	
	
	
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

	<link href='//fonts.googleapis.com/css?family=Lato:400,700,400italic,900,300,100,100italic,300italic,700italic,900italic' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://www.musikalessons.com/static_assets/res/css/custom.css">  


<style>



.gift-wrapper p {

padding: 10px 20px; text-transform: uppercase; text-align: center; color: #fff; font-weight: bold; width: 540px; max-width: 100%; margin: 0 auto; position: relative; background: #a70805;

}

.gift-wrapper a.inquire-now {

background: #4fb339; display: inline-block;padding: 1px 30px;margin-left: 10px; color: #fff; text-decoration: none;

}

.gift-wrapper a.inquire-now:hover {

color: #fff; text-decoration: none;

}

@media (max-width: 768px) {

.full-width-image {

margin-top: 20px;

}

.desk-top-view {

display: none !important;

}

}

@media (max-width: 680px) {

.full-width-image {

margin-top: 11px !important;

}

.desk-top-view {

display: none !important;

}



}

@media (max-width: 480px)

.full-width-image {

padding: 35px 0;

margin-top: 42px;

}





}



@media (max-width: 767px)

.button-light-blue {

font-weight: 600!important;
	.login_wrap {
		margin-top: -30px;
	}

}





/* Holiday Gift certificates */

.gift-wrapper p{line-height:24px;}

.gift-wrapper a.inquire-now{ height:24px; line-height:24px; padding: 0 30px!important; max-width:165px;}

/* .banner-outer-wrapper{ margin-top: 55px !important;} */



@media (max-width:767px){

/* .banner-outer-wrapper{ margin-top: 50px !important;} */

}



@media (max-width:680px){

	.full-width-image {margin-top: 30px !important;} 
	.login_wrap {
		margin-top: -30px;
		padding: 150px 0 50px;
	}
}



@media (max-width:580px){

.banner-outer-wrapper{ margin-top: 75px !important;}

.gift-wrapper p{ padding: 5px 10px 10px;}

.gift-wrapper a.inquire-now{ display: block; margin:5px auto 0;}

.full-width-image {margin-top: 45px !important;}

.login_wrap {
    margin-top: -30px;
    padding: 150px 0 50px;
}

}



@media (max-width:480px){

.banner-outer-wrapper{ margin-top: 45px !important;}

.gift-wrapper p::before{ width: 22px; left: -15px;}

.gift-wrapper p{ font-size:11px; padding: 5px 0px 10px; !important;}

}

/* Holiday Gift certificates */

.gift-certificates-top {

max-width: 265px;

background: #eaeaea;

position: fixed;

top: -1px;

left: 0;

right: 0;

margin: 0 auto;

z-index: 9999;

height: 23px;

line-height: 23px;

text-align: center;

}

.gift-certificates-top p {

margin: 0;

font-size: 13px;

color: #403d3d;

font-weight: 600;

}

.gift-certificates-top p a {

color: #0097d0;

text-decoration: underline;

margin-left: 7px;

}

.gift-certificates-top p a:hover {

text-decoration: none;

}

.gift-certificates-top::after {

content: '';

width: 17px;

height: 23px;

display: inline-block;

position: absolute;

right: -17px;

background: url(https://www.musikalessons.com/themes/musika_res/images/music-sprit-img.png) no-repeat -9px -223px;

top: 0;

}

.gift-certificates-top::before {

content: '';

width: 17px;

height: 23px;

display: inline-block;

position: absolute;

left: -17px;

top: 0;

background: url(https://www.musikalessons.com/themes/musika_res/images/music-sprit-img.png) no-repeat -8px -189px;

}

.sticky-header-on-scroll.head-fix-stricky {

display: none;

}

.navbar.navbar-fixed-top.header-move-ups {

transform: translateY(0) !important;

}

.gift-certificates-mobile {

display: none;

}

.nav > li.mobile-only-link {

display: none;

}

@media (min-width:768px) and (max-width:1024px) {

.gift-certificates-top p {

font-size: 11px;

}

.gift-certificates-top {

max-width: 205px;

left: -70px;

}

}

@media (max-width:767px) {

.gift-certificates-desktop {

display: none;

}

.gift-certificates-mobile {

display: block;

position: fixed;

right: 52px;

top: 18px;

z-index: 9999;

text-align: center;

}

.gift-certificates-mobile p {

margin: 0;

font-size: 11px;

color: #0097d0;

line-height: 14px;

}

.nav > li.mobile-only-link {

display: block;

}

}

.modal-open .gift-certificates-top.gift-certificates-desktop {

    z-index: 1;

}

</style>





<!-- gift-wrapper -->

<!-- /menu--> 

<!-- Slider-->

<!-- added sticky header on scroll the page -->

 <style>

.sticky-header-on-scroll{ height:75px; background:#fff; z-index:999; transform: translateY(-55px); transition: transform 0.3s ease 0s; position:fixed; top:0; left:0; width:100%;border-bottom: 1px solid #ddd; padding:5px 0;}

.sticky-header-on-scroll img {margin-top: 6px;}

.header-sricky-cont{float: right; padding: 10px 0 0 0;font-size: 18px;font-weight: bold; color: #575757; width: 70%;}

.header-sricky-cont span{ padding:0 5px 0 0; margin:0; display:inline-block;}

.sticky-header-on-scroll .navbar-brand{ padding:0; margin: 0 0 0 15px;}

.sticky-header-on-scroll.head-fix-stricky{ transform: translateY(0px);}

body.header-move-up{ padding-top:0!important;}

.navbar.navbar-fixed-top.header-move-ups{ transform: translateY(-80px); transition: transform 0.3s ease 0s;}

.navbar.navbar-fixed-top{ transition: transform 0.3s ease 0s;}

span.color-mix { color: #683498;}

.head-fix-stricky .btn-blue.riskfreeHeader {min-width: 178px !important;background: none #00aeef !important;text-align: center !important;height: 40px;font-size: 16px !important; margin-top: 3px;}

.special-offer-dis-banner { text-align: center;width: 100%;background: url(https://www.musikalessons.com/themes/musika_res/images/bgpurple.jpg) left top no-repeat; background-position: 50% -28.5px; padding: 7px 15px; margin: 0 0 -1px;min-height: 45px; position: fixed;top: 83px;transition: all 0.01s ease-in;z-index:100;}

.special-offer-dis-banner p {letter-spacing: 0.5px;font-weight: 500;padding: 0;margin: 0;font-size: 17px;color: #fff;line-height: 30px;}

.special-offer-dis-banner p span {font-weight: 600;padding: 0;margin: 0;}

.special-offer-dis-banner .so-risk-free-btn { color: #fff;position: relative;text-decoration: underline;display: inline-block;padding: 0 11px 0 0; background: url(https://www.musikalessons.com/themes/musika_res/images/so-btn-arrow.png) right center no-repeat;}

.head-fix-stricky ~ .special-offer-dis-banner {top: 75px;z-index: 9;transition: all 0.01s ease-in;}



.top-nav .phone em {

    background: url(https://www.musikalessons.com/themes/musika_res/images/music-sprit-img.png) no-repeat scroll -9px -63px rgba(0,0,0,0) !important;

    border-radius: 100%;

    height: 21px !important;

    width: 21px !important;

}

.btn-blue.riskfreeHeader { 

    background: #00aeef url(https://www.musikalessons.com/themes/musika_res/images/music-sprit-img.png) no-repeat scroll 159px -254px !important;

}

.special-offer-dis-banner .so-risk-free-btn {

    background: url(https://www.musikalessons.com/themes/musika_res/images/music-sprit-img.png) 112px -89px no-repeat;

}

.lesson_list > li::after {

    background: url(https://www.musikalessons.com/themes/musika_res/images/music-sprit-img.png) no-repeat -2px -281px;

}

.header-bottom-link li {

    background: url(https://www.musikalessons.com/themes/musika_res/images/music-sprit-img.png) no-repeat -13px -35px !important;

}

.header-bottom-link li:first-child {

    background: none !important;

}

.header-bottom-link li.contact-num {

    background: none !important;

}

h2.how-hd-n-line {

    background: none !important;

}

h2.how-hd-n-line::after {

    background: url(https://www.musikalessons.com/themes/musika_res/images/music-sprit-img.png) no-repeat center -300px !important;

    content: '';

    height: 21px;

    display: block;

    width: 100%;

}





@media (min-width:768px) and (max-width:1024px){

.header-sricky-cont {font-size: 16px;}

.head-fix-stricky .btn-blue.riskfreeHeader {margin-top: -5px;}

.special-offer-dis-banner {top: 95px;}

.header-move-ups .navbar-collapse.collapse {margin: 0 !important;}

.header-sricky-cont {width: 68%;}

.header-sricky-cont { padding: 20px 20px 0 0;}

}



@media (max-width:767px){

.header-sricky-cont span{ display: block;}

.sticky-header-on-scroll .btn-blue.riskfreeHeader{ margin:2px auto 0;}

.header-sricky-cont { padding: 0 15px 0 0; margin: -3px 0 0 0;}

.box-sm.get-a-risk-free-ms.sticky-ftr.sticky-ftr-with-dis{ background:#00aeef; padding: 0 0 0 17px; text-align:center;}

.box-sm.get-a-risk-free-ms.sticky-ftr.sticky-ftr-with-dis:hover, .box-sm.get-a-risk-free-ms.sticky-ftr.sticky-ftr-with-dis:hover .btn-blue.riskfreeHeader{ background:#039cd5!important;}

.box-sm.get-a-risk-free-ms.sticky-ftr.sticky-ftr-with-dis span.discountoff{ color:#fff!important; display: inline-block; padding:0; margin:0;}

.box-sm.get-a-risk-free-ms.sticky-ftr.sticky-ftr-with-dis .btn-blue.riskfreeHeader{ margin:0!important; width:auto!important; display: inline-block!important;}

.sticky-header-on-scroll .btn-blue.riskfreeHeader, .header-sricky-cont {display: none;}

.special-offer-dis-banner {display: none;}

.head-fix-stricky ~ .special-offer-dis-banner {top: 74px;}

.special-offer-dis-banner p {font-size: 12px;}

.sticky-header-on-scroll .navbar-brand {width: 100%;display: block;text-align: center;}

.navbar.navbar-fixed-top.header-move-ups { transform: none; transition: none;}

.sticky-header-on-scroll.head-fix-stricky {display: none;}

body.header-move-up {padding-top: 70px !important;}

}



@media (max-width:520px){

/*.sticky-header-on-scroll .btn-blue.riskfreeHeader{ display:none;}*/

.header-sricky-cont { padding: 0 0 0 0; margin: 5px 0 0 0; float: inherit;}

.sticky-header-on-scroll .navbar-brand { margin: 0 auto; float: inherit;}

.sticky-header-on-scroll{ text-align:center; height: auto; transform: translateY(-105px);}

.header-sricky-cont span { padding: 0 0 1px 0;}

.head-fix-stricky ~ .special-offer-dis-banner {top: 60px;}

}
.btn-blue {
    background: #00aeef none repeat scroll 0 0;
    border: 0 none;
    color: #ffffff;
    cursor: pointer;
    display: inline-block;
    font-size: 18px;
    font-weight: 400;
    margin: 0;
    min-width: 235px;
    padding: 5px 20px;
    position: relative;
    text-decoration: none;
    text-transform: uppercase;
}

 </style>
<style>

/* added css for landing banner updates */

.box-sm{ display:none!important;}

.box-sm.get-a-risk-free-ms{ width: 100%;}



@media (max-width:767px){

.box-sm{ display:block!important;}

.box-sm.get-a-risk-free-ms .btn-blue.riskfreeHeader{ border-radius: inherit; width: 100%; height:40px; margin: 10px auto 0; text-align:center; background: #00aeef!important;}

.box-sm.get-a-risk-free-ms .btn-blue.riskfreeHeader:hover{ background: #039cd5!important;}

.box-sm.get-a-risk-free-ms.sticky-ftr{ width: 100%; position:fixed; left:0; bottom:0; z-index:99999;}

.button-light-blue{ font-weight:500!important;}

}

.login_wrap {
    background: #f5f5f5;
    padding: 25px 0 50px;
}

@media (max-width:580px){

.hidden-xs-small{ display:none !important;}

}


#footer_1 {float:right;}

#footer_2 {float:left;}

</style>

	
	<?php echo $__env->yieldContent('custom_css'); ?>
</head>



<body>

<div class="gift-certificates-top gift-certificates-desktop">
<p>Gift Certificates Available. <a href="https://www.musikalessons.com/gift-card-checkout" target="_blank">SHOP NOW!</a></p>
</div>


<div class="navbar navbar-default navbar-fixed-top" role="navigation" >

<div class="container">  

<button onclick="open_menu();" type="button" class="navbar-toggle" >

<span class="sr-only">Toggle navigation</span>

<span class="icon-bar"></span>

<span class="icon-bar"></span>

<span class="icon-bar"></span>

</button> 

<a class="navbar-brand" href="/"><img src="https://www.musikalessons.com/themes/musika_res/images/logo.jpg" alt="Musika Music Lessons" target="_blank"></a>  

<div class="row">

<ul class="top-nav"><li class="desk-top-view">&nbsp;<a href="https://www.musikalessons.com/contact-us" target="_blank"><span class="lightgray">Contact Us</span></a></li>

<li class="phone"><a href="tel:+18776874524" onclick="ga('send', 'event', 'Call tracking', 'Click to call', 'Phone in top nav');"><em></em><span class="blue bfont" >877-687-4524</span></a></li>

 </ul>

</div>

 <div class="navbar-collapse collapse">

 <ul class="nav navbar-nav navbar-left">

<li class=""><a href="/why-choose-musika" target="">Why Musika</a></li>

<li class=""><a href="/how-lesson" target="">How Lessons Work</a></li>   

<li class=""><a href="/rates" target="">Rates</a></li>

<li class=""><a href="/risk-free-trail" target="">Risk-Free Trial</a></li>

<li class="box-sm" style="display:none;"><a href="/contact-us" target="">Contact us</a></li>

<li class="dropdown"><a href="/login" onclick="search_box();" class="dropdown-toggle" id="find-toggle" data-toggle="dropdown" target="_blank"><span class="addpad5">Teachers</span></a>

<div class="dropdown-menu search-open" role="menu">
	<div id="search_bar" class="input-group">
		<form target="_blank" action="/teacher/search/basic" method="GET">
			<span class="search_zip">
				<input id="top_zip" class="form-control" name="zipCode" placeholder="Zip Code" maxlength="5" type="text">
			</span>
			<span class="search_btn">
			<button class="btn-s" type="submit">SEARCH</button>
				<input id="instrument" value="all" name="instrument" type="hidden">
			</span>
		</form>
	</div>
</div>

</li>   

</ul>

<a data-toggle="modal" data-target="#yourNeedsModal" >

<button class="btn-blue riskfreeHeader">GET A RISK-FREE TRIAL</button>

</a>  

  </div>



   </div>  

<!-- gift-wrapper -->

<div class="gift-wrapper" style="display:none">

<div class="container">

<p>Holiday Gift certificates  <a href="https://www.musikalessons.com/gift-card-checkout" class="inquire-now" target="_blank">Inquire Now!</a></p>

</div><!-- container -->

</div>

<!-- gift-wrapper -->   

</div>


<div class="special-offer-dis-banner"> 

<div class="container">

<p>Lesson Special - Up to <span>20% OFF!</span> Get Started Now with a <a data-toggle="modal" data-target="#yourNeedsModal"  class="so-risk-free-btn">Risk-Free Trial!</a></p>

</div>

</div>
  <!-- Wrapper-->
    

    

            <!-- Main view  -->
            <?php echo $__env->yieldContent('content'); ?>

            <!-- Footer -->


        
        <!-- End page wrapper-->

    <!-- End wrapper-->

<!--=== Footer ===-->

<div class="footer">

<div class="container">

<div class="row">



<div id="footer_1" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

<!-- Contact -->

<div class="headline"><h5><span>Contact Us</span></h5></div>

  <p class="font17">Need Help <b>Finding a Teacher?</b><br> Call now <a style="color:#ffffff" href="tel:+18776874524" onclick="ga('send', 'event', 'Call tracking', 'Click to call', 'Phone in footer');"><b>877-687-4524</b></a> or </p>

<a data-toggle="modal" data-target="#yourNeedsModal"><button class="btn-s">GET STARTED</button></a>

<div class="social">

<ul class="list-unstyled">

<li class="facebook">

<a class="social_facebook" href="https://www.facebook.com/musikalessons" rel="nofollow" target="_blank"></a>

</li>

<li class="twitter">

<a class="social_twitter" href="https://twitter.com/musikalessons" rel="nofollow" target="_blank"></a>

</li>

<li class="linkedin">

<a class="social_linkedin" href="https://www.linkedin.com/company/musika-llc" rel="nofollow" target="_blank"></a>

</li>

<li class="pinterest">

<a class="social_pinterest" href="http://www.pinterest.com/musikalessons/" rel="nofollow" target="_blank"></a>

</li>

<!--<li class="googleplus">

<a class="social_googleplus" href="https://plus.google.com/+MusikaMusicLessonsNewYork" rel="nofollow" target="_blank"></a>

</li>--><li class="tumblr">

<a class="social_tumblr" href="http://musikalessons.tumblr.com/" rel="nofollow" target="_blank"></a>

</li>

</ul>

</div>

</div><!--/span4-->



<div id="footer_2" class="col-lg-8 col-md-8 col-sm-8 col-xs-12">



<!-- quick links -->

<div class="headline"><h5><span>Quick Links</span></h5></div>



<div class="footer-m">

<ul class="footer-lt">

<li><a href="/about-us" target="">About Musika</a></li>

<li><a href="/rates" target="">Rates</a></li>

<li><a href="/why-choose-musika" target="">Why Choose Musika?</a></li>

<li><a href="/how-lesson" target="">How it Works</a></li>



</ul>

</div>

<div class="footer-m">

<ul class="footer-lt">

<li><a href="/faqq" target="">FAQ</a></li>

<li><a href="/contact-us" target="">Contact Us</a></li>

<li><a href="/instruments" target="">Instruments</a></li>

<li><a href="/online-music" target="">Online Music Lessons</a></li>



</ul>

</div>



<div class="footer-m">

<ul class="footer-lt">

<li><a href="/risk-free-trail" target="">Risk-Free Trial</a></li>

<li><a href="/instructor-area" target="">Areas We Service</a></li>

<li><a href="/teacher-search" target="">Teacher Search</a></li>

<li><a href="/blog" target="_blank">Musika Blog</a></li>

</ul>

</div>

<div class="footer-m">

<ul class="footer-lt"> 

<li><a href="/teaching-opportunities" target="_blank">Teaching Opportunities</a></li>



<li><a href="https://musikalessons.wufoo.com/forms/refer-us-to-a-friend/" target="_blank">Refer a Friend</a></li>

  <li><a href="https://www.musikalessons.com/gift-card-checkout" target="_blank">Gift Certificates</a></li>

  <li><a href="/metros" target="">Top Metros<a></li>

</ul>

</div>



</div>

</div>

<!--/span4-->

<!--/span4-->

</div><!--/row-fluid-->
</div>
</div>
  <!--=== Copyright ===-->

<div class="copyright">

<div class="container">

<div class="row">

<div class="mcenter col-xxs col-xs-7 col-sm-6 col-md-7">

 <p class="copyright_f">&copy; Copyright 2001 - <?php echo date("Y"); ?> Musika All Rights Reserved</p>   

</div>

<div class="col-xxs col-xs-5 col-sm-6 col-md-5 text-right">  

<p>

<a href="https://www.musikalessons.com/terms" class="addpad" rel="nofollow" target="_blank">Terms</a> | <a class="addpad" href="https://www.musikalessons.com/privacy-policy" rel="nofollow" target="_blank">Privacy Policy</a> | <a class="addpad" href="https://www.musikalessons.com/site-map" target="_blank">Sitemap</a>

</p>

</div>

</div>

</div> 

</div><!--/copyright--> 

<script src="<?php echo e(asset('js/app.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(asset('js/jquery-3.1.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
	
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

<script>

function search_box(){
	if ( $('li').hasClass('open') ) {
		//alert('true');
		$(".dropdown").removeClass('open')
	}else{
		$(".dropdown").addClass('open');	
	}
	
}
function open_menu(){
	if ( $('.navbar-collapse').hasClass('in') ) {
		//alert('true');
		$(".navbar-collapse").removeClass('in')
	}else{
		$(".navbar-collapse").addClass('in');	
	}
	
}

</script>	
<script type="application/ld+json">



{

  "@context": "http://schema.org",

  "@type": "WebSite",

  "url": "https://www.musikalessons.com/",

"potentialAction": {

"@type": "SearchAction",

"target": "https://www.musikalessons.com/teachers/search/basic?zipCode={ZIPCODE}&instrument=all",

"query-input": "required name=ZIPCODE"

  }

}

</script>
<script type='text/javascript'>

(function() {

if ("-ms-user-select" in document.documentElement.style && navigator.userAgent.match(/IEMobile\/10\.0/)){

var msViewportStyle = document.createElement("style");

msViewportStyle.appendChild(document.createTextNode("@-ms-viewport{width:auto!important}"));

document.getElementsByTagName("head")[0].appendChild(msViewportStyle);

}

})();

</script>
	
	
<?php $__env->startSection('scripts'); ?>
<?php echo $__env->yieldSection(); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\musikateachers\resources\views/layouts/login_app.blade.php ENDPATH**/ ?>