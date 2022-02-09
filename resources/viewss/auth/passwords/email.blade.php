@extends('layouts.login_app')
@section('custom_css')
@section('title') Teacher forgot password  @endsection
<style>
body { 
  background-color: #FFFFFF !important;
}

.b_color:focus {
border-color: #1c84c6 !important;	
}
</style>
@endsection
@section('content')



    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <!--<h1 class="logo-name"><img src="{{url('img/logo_img.gif')}}"></h1>-->
                <!--<h1 class="logo-name"><img src="{{url('img/Musika-logo-2.svg')}}" height="135px"></h1> --> 
				 @if (session('status'))
					<p class="alert alert-success">{{ session('status') }}</p>
				@endif

            </div>
					<h2 class="font-bold">Forgot your password?</h2>

                    <p>
                         Enter your email and we will email you a link to reset your password.
                    </p>
            
            <form class="m-t" role="form" method="POST" action="{{ route('password.email') }}">
			 {{ csrf_field() }}
				
			    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="form-group">
                      <input id="email" type="email" placeholder="E-mail Address" class="form-control b_color" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                </div>
                </div>
                <button type="submit" class="btn btn-blue block full-width m-b">Send Password Reset Link</button>
				
                
             
            </form>
            <!-- <p class="m-t"> <small>&copy; 2001 - 2018 Musika All Rights Reserved</small> </p> -->
        </div>
    </div>

@endsection


<!--
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection  -->
