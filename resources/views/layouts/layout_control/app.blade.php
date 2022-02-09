<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Musika LLC</title>

<!--[if IE 6]>
<script src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script>
  
  DD_belatedPNG.fix('#header');
  DD_belatedPNG.fix('.notification');
  DD_belatedPNG.fix('.submit');
  DD_belatedPNG.fix('#info');
  DD_belatedPNG.fix('.pngfix');
  
</script>
<![endif]-->

<!-- LOAD JQUERY FROM GOOGLE CDN  -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<!-- LOAD CUSTOM SCRIPTS AND JQUERY UI LIBRARY  -->
<script type="text/javascript" src="{{asset('control/control/assets/js/scripts.js')}}"></script>
<script type="text/javascript" src="{{asset('control/control/assets/js/jquery-ui-1.7.2.custom.min.js')}}"></script>

<!-- LOAD FACEBOX -->
<script type="text/javascript" src="{{asset('control/control/assets/js/facebox.js')}}"></script>
<link href="{{asset('control/control/assets/css/facebox.css')}}" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{{asset('control/control/assets/js/iepngfix_tilebg.js')}}"></script>

<!-- MASTER STYLESHEET -->
<link href="{{asset('control/control/assets/css/styles.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"/>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- START THE MENU -->
<script type="text/javascript">




// initialise plugins
jQuery(function(){
	jQuery('ul.sf-menu').superfish();
});

</script>
</head>
<body>
<div id="header">
  <div id="head_wrap" class="container_12"> 
    <!--START LOGO  -->
    <div id="logo" class="grid_8">
      <h1><strong>Musika</strong>LLC</h1>
    </div>
    <!-- END LOGO --> 
    <div id="user_panel" class="grid_4">
      <ul>
        <li><a href="#">{{session('user')->firstname}} {{session('user')->lastname}}</a></li>
        <!-- MODAL LINK - USE TH REL="FACEBOX" TO BRING UP MODAL PAGES-->
        <li><a href="#info" rel="facebox">Messages (<strong>2</strong>)</a></li>
        <li><a href="/my_settings">My Sttings </a></li>
        <li><a href="{{ route('control.logout') }}">Log Out</a></li>
      </ul>
    </div>
    <!-- END USERPANEL --> 
    
    <!--START NAVIGATION  -->
    <div id="nav" class="grid_9">
      <ul class="sf-menu">
        
        <!-- class "current" defines this as current page -->
        <li><a href="{{route('control.control.dashboard')}}">Dashboard</a></li>
        <li><a href="#">New Requests</a>
          <ul>
            <li><a href="#">Information Requsts</a></li>
            <li><a href="#">Teacher Reqeusts</a></li>
            <li><a href="#">Teacher Applications</a></li>
          </ul>
        </li>
        <li><a href="#">Customers</a>
          <ul>
            <li><a href="{{route('control.control.customer')}}">Customers</a></li>
            <li><a href="{{route('control.control.student')}}">Students</a></li>
            <li><a target="_blank" href="https://system.musikalessons.com/update/control.php?page=billing_monthly&year=<?=date('Y')?>&month=<?=(date('m') != 1) ? sprintf('%02d',(date('m')-1)) : 12;?>">Monthly Billing</a></li>
            <li><a href="#">Monthly Billing Batches</a></li>
          </ul>
        </li>
        <li><a href="#">Teachers</a>
          <ul>
            <li><a href="{{route('control.control.teacher')}}">View Teachers</a></li>
            <li><a href="{{route('control.control.searchmetro')}}">Search By Metro</a></li>
          </ul>
        </li>
        <li><a href="url()?>reports">Reports</a></li>
        <li><a href="#">Support</a></li>
        <li><a href="url()?>my_settings">Settings</a>
          <ul>
            <li><a href="url('my_settings')">My Settings</a></li>
            <li><a href="{{route('control.control.ipmanager')}}">IP Manager</a></li>
            <li><a href="{{route('control.control.instruments')}}">Instrument Manager</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- END NAV --> 
    
    <!-- START SEARCH -->
    <div id="search" class="grid_3 buttons">
      <form id="form1" name="form1" method="post" action="">
        <input type="text" class="text medium" id="search2" />
        <input name="Submit" type="submit" class="submit special" value="Go" id="Submit" />
      </form>
    </div>
    <!-- END SEARCH --> 
    
  </div>
  <!-- END HEAD_WRAP (CONTAINER FOR LOGO AND NAVIGATION --> 
  
</div>
<!--END HEADER (FULLL WIDTH WRAPPER WITH BG) --> 
<div id="content" class="container_12">
