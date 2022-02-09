@extends('layouts.login_app')
@section('title') Support @endsection
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
</style>
@endsection
@section('content')
    <div class="middle-box text-center">
        <div>
            
			<div>
				@if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}<br>
					
                    </div>
                @endif
			</div>
            <form class="m-t" role="form" method="POST" action="{{url('/support_request')}}">
			 {{ csrf_field() }}
				<div class="form-group">
					
				  <h3> Request for Support</h3>
                                
				</div>
			    <div class="form-group{{ $errors->has('full_name') ? ' has-error' : '' }}">
                <div class="form-group">
                      <input type="text" name="full_name" value="{{old('full_name')}}" class="form-control" placeholder="Full Name">
					 <small class="text-danger pull-left">{{ $errors->first('full_name') }}</small>
                </div>
                </div>
				 <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <div class="form-group">
                      <input type="text" name="phone" size="12" maxlength="12"  value="{{old('phone')}}" class="form-control" placeholder="Phone number">
						<small class="text-danger pull-left">{{ $errors->first('phone') }}</small>
                </div>
                </div>
				 <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="form-group">
                      <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="E-mail Address">
						 <small class="text-danger pull-left">{{ $errors->first('email') }}</small>
                </div>
                </div>
				 <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                <div class="form-group">
						<textarea name="message" value="" class="form-control" placeholder="Message"  rows="6">{{old('message')}}</textarea>
						<small class="text-danger pull-left">{{ $errors->first('message') }}</small>
                </div>
                </div>
				
				
                <button type="submit" class="btn btn-blue block full-width m-b">Submit</button>
            </form>
           
        </div>
    </div>
@endsection