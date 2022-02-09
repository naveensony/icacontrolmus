@extends('layouts.app') @section('content')@section('title') Account  @endsection
@section('link_css')
<style>
@media screen and (min-width: 320px) and (max-width: 767px) {
	.ibox-content {
         border-width: 5px !important;
    }
}
</style>
	
@endsection
<div id="wrapper">
    <div class="wrapper wrapper-content">
	
		   <div class="row"> 
			 <div class="col-lg-10">
				@if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}<br>
						
						Warning: You are updating mailing address. To update your travel radius and studio location you must <a href="https://teachers.musikalessons.com/profile">click here </a> and update it.
                    </div>
                @endif
				
				
				@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
			</div>
			</div>
			
			<div class="row">
			
			<form method="post" class="form-horizontal" action="{{url('/account').'/'.$teacher_profile->teacherId}}" onSubmit="return submitTeacherProfile();">
			{{csrf_field()}}
            {{ method_field('PATCH') }}
                <div class="col-lg-10">
				
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Account Information</h5>
                          
                        </div>
                        <div class="ibox-content">
       <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
		  <label class="col-md-3 control-label">First Name</label>
				<div class="col-md-9">
					<input type="text" name="first_name" value="{{$teacher_profile->firstName}}" class="form-control" required>
					 <small class="text-danger pull-left">{{ $errors->first('first_name') }}</small>
				</div>
       </div>
         
		<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
			<label class="col-md-3 control-label">Last Name</label>
                <div class="col-md-9">
					<input type="text" name="last_name" value="{{$teacher_profile->lastName}}" class="form-control" required>
					 <small class="text-danger pull-left">{{ $errors->first('last_name') }}</small>
				</div>
		</div>
          
								
		<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}"><label class="col-md-3 control-label">Telephone</label>
			<div class="col-md-9">
			   <input type="text" name="phone" size="12" maxlength="12"  value="{{old('phone',(empty($teacher_profile->phone))?"":$teacher_profile->phone ) }}" class="form-control">
			   <small class="text-danger pull-left">{{ $errors->first('phone') }}</small>
			 </div>
	   </div>
                                
		 
		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"><label class="col-md-3 control-label">Email</label>

			<div class="col-md-9"><input type="email" name="email" value="{{old('email',$teacher_profile->email)}}" class="form-control" required>
			 <small class="text-danger pull-left">{{ $errors->first('email') }}</small>
			</div>
			</div>
		
		 
		<div class="form-group">
			<label class="col-md-3 control-label">Address Line 1</label>
				<div class="col-md-9"><input type="text" name="add1" value="{{ (empty($teacher_profile->addressL1))? "": $teacher_profile->addressL1}}"  class="form-control"></div>
		</div>
          
		<div class="form-group">
			<label class="col-md-3 control-label">Address Line 2</label>
				<div class="col-md-9">
					<input type="text" name="add2" value="{{ (empty($teacher_profile->addressL2))? "": $teacher_profile->addressL2 }}"  class="form-control"></div>
        </div>
		 
		<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
			<label class="col-md-3 control-label">City</label>
				<!--<div class="col-md-9">
					<input type="text" name="city" value="{{ (empty($teacher_profile->city))? "" : $teacher_profile->city  }}"  class="form-control">
				</div>-->
				<div class="col-md-9">
					<input type="text" name="city" value="{{old('city',(empty($teacher_profile->city))?"":$teacher_profile->city ) }}"  class="form-control">
					<small class="text-danger pull-left">{{ $errors->first('city') }}</small>
				</div>
        </div>
		 
	<div class="form-group">
		<label class="col-md-3 control-label">State</label>
			<div class="col-md-9">
				<select class="form-control m-b" name="state">
				@foreach($statename as $state)
					<option value="{{$state->stateId }}" {{($teacher_profile->yourState->stateId == $state->stateId ) ? 'selected' : '' }}>
					{{$state->stateName}}
					</option>
				@endforeach	
				</select></div>
	</div>
	 
	<div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }}">
		<label class="col-md-3 control-label">Zip Code</label>
           <div class="col-md-9">
		   <input type="text" name="zip"  id="newZipCode" value="{{old('zip',(empty($teacher_profile->zipCode))?"":$teacher_profile->zipCode ) }}" class="form-control">
		   <small class="text-danger pull-left">{{ $errors->first('zip') }}</small>
		   </div>
		   <input type="hidden" name="dbZipCode" id="dbZipCode" value="{{$teacher_profile->zipCode}}" />
     </div>
     <div class="text-center">
		<button class="btn btn-primary" type="submit" ><strong>Save</strong></button>
	</div>
   </div>
</div>
</div>

								</form>
								</div>
								
								 <div class="row">
                <div class="col-lg-10">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Change Password</h5>
                           
                        </div>
						<form method="post" action="{{url('updatepassword').'/'.$teacher_profile->teacherId}}" class="form-horizontal">
						{{csrf_field()}}
                        <div class="ibox-content">
						
                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"><label class="col-md-3 control-label">New Password</label>

                                    <div class="col-md-9"><input name="password"  id ="pwd" type="password" class="form-control" required>
									<small class="text-danger pull-left">{{ $errors->first('password') }}</small></div>
                                    </div>
                           
                                  

								<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}"><label class="col-md-3 control-label">Confirm Password
</label>

                                    <div class="col-md-9"><input name="password_confirmation" id="cpwd" type="password"  class="form-control" required>
									 <small class="text-danger pull-left">{{ $errors->first('password_confirmation') }}</small>
									</div>
                                 
								 </div>
                                
                                 
								<div class="text-center">
								<button class="btn btn-primary" type="submit"><strong>Update</strong></button>
								</div>
						
								</div>
								</form>	
								</div>
								</div>
								</div>
							
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
<script>
function isZip(){
	
	var newZipCode = $("#newZipCode").val();
	var dbZipCode = $("#dbZipCode").val();
	//alert(newZipCode+' '+dbZipCode);
	//return false;
	//s = s.value;
    var reZip = "/(^\d{5}$)|(^\d{5}-\d{4}$)/";
    if(!(/(^\d{5}$)|(^\d{5}-\d{4}$)/).test(newZipCode)){
         alert("Zip code is not valid");
         return false;
    }
	else if(dbZipCode!=newZipCode)
	{
		$.noConflict();
		//$('#myModal').modal();
		//cleared = false;
		bootbox.alert({
			message: 'Warning: You are updating mailing address. To update your travel radius and studio location you must <a href="https://teachers.musikalessons.com/profile" target="">click here </a> and update it.',
			callback: function () {
				console.log('This was logged in the callback!');
				return true;
			}
		})
	}
	//return  false;
	
}
</script>
@endsection