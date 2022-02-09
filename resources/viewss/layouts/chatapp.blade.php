<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musika Lessons |  @yield('title') </title>	<link rel="icon" href="https://www.musikalessons.com/favicon.ico">

	@yield('css')	
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--><script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
</head>
<body>

  <!-- Wrapper-->
    <div id="wrapper">

        <!-- Navigation -->
 

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
			<?php echo "test";   die;?>

            <!-- Main view  -->
            @yield('content')

            <!-- Footer -->


        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->

@yield('js')




</body>
</html>
