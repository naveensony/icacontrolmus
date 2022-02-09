@extends('layouts.login_app')

@section('custom_css')
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
@endsection
@section('content')
<div id="wrapper" class="login_wrap">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <h2 style="font-weight:700">Musika - Not found</h2>
      

        <div class="error-desc" style="font-weight:600;font-size: 16px;">
            Unfortunately this student is no longer available. We recommend checking e-mails from Musika daily as students tend to get matched quickly. If you would like to browse through the available students in the system please click on the 'Available Students' tab in your invoicing account.</br></br>
			Need Help? </br> Call now 877-687-4524 </br></br> 
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


@endsection
