<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musika Lessons |  @yield('title') </title>
	<link rel="icon" href="https://www.musikalessons.com/favicon.ico"> 


    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/plugins/iCheck/custom.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/style.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') !!}" />
	
	@yield('link_css')
    <link rel="stylesheet" href="{!! asset('css/custom_media.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/custom.css') !!}" />
	@yield('custom_css')
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
		
@media screen and (max-width: 612px) {
	.footer-popup{
		 /*width: 700px;*/
	}
	.action_link {
		float: none;
		padding-bottom: 10px;
	}
}
@media screen and (min-width: 613px) {
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
        @include('layouts.navigation')

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            @include('layouts.topnavbar')

            <!-- Main view  -->
            @yield('content')

            <!-- Footer -->
            

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->

<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
@yield('prospective_js')
<script src="{{ asset('js/profile_validatoin.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>
@yield('custom_js')


@section('scripts')
@show

</body>
</html>
