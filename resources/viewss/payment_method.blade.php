@extends('layouts.app') @section('content')
@section('title') Account  @endsection
@section('link_css')
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Cedarville+Cursive" >
<style>
@media screen and (min-width: 320px) and (max-width: 767px) {
	.ibox-content {
         border-width: 5px !important;
    }
	.p-bottom{
		 padding-bottom: 15px;
	}
	.img-hide{
		display:none;
	}
	
}
@media screen and (min-width: 1199px) {
	.txt-width {
        padding-right: 50px;
    }
	.p-top {
		padding-top: 70px;
	}
	.img-desktop{
		display:none;
	}
}
.form-horizontal .control-label {
    padding-right: 0;
    padding-top: 7px;
    text-align: left;
}
.ibox-content {
	/*padding: 15px 10px 20px;*/
}
.signature{ 
	font-family: 'Cedarville Cursive';font-size: 25px; text-decoration:underline;height:25px;
}
@media screen and (min-width: 768px) and (max-width: 1199px) {
	.img-width{
		width: 65%;
	}
	.p-bottom{
		 padding-bottom: 15px;
	}
	.img-hide{
		display:none;
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
                    </div>
                @endif
				
				 @if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							<li>There are one or more errors in the form. </li>
							{{-- @foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach --}}
						</ul>
					</div>
				@endif 
			</div>
			</div>
	<div class="row" style="background-color:#fff">
		<div class="col-lg-12" style="padding-right: 0; padding-left: 0;">
			<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Payment Information</h5>
			</div>
			<div class="ibox-content">
			<div class="col-lg-6 p-top p-bottom img-hide" style="float:right;" align="center">
				<div id="showChequeImg" style="display:@if(old('payout_method') == 'Payment by Mail') none @else @if(old('payout_method') == 'Direct Deposit' || (isset($payment_info->payout_method) && $payment_info->payout_method == 'Direct Deposit')) block  @elseif(old('payout_method') == 'Payment by Mail' || (isset($payment_info->payout_method) && $payment_info->payout_method == 'Payment by Mail')) none @else none @endif @endif" class="img-width" >
					<img  width="100%" src="{{url('/img/CVC199908_RoutingNumber_Check_Image.jpg')}}" />	
				</div>
			</div>
			<div class="col-lg-6" style="float:left;"> 
				<form method="post" class="form-horizontal" action="{{route('submitPaymentMethod')}}" onSubmit="return validaionPaymentMethod();" style="padding-bottom: 40px;">
				{{csrf_field()}}
				<div class="form-group">
					<label class="col-md-4 control-label"> Payout Method</label>
					<div class="col-md-8 {{ $errors->has('payout_method') ? ' has-error' : '' }}" style="padding-top: 6px;">
					<input type="radio" name="payout_method" id="payout_method" value="Direct Deposit" @if(old('payout_method') != 'Payment by Mail') @if(old('payout_method') == 'Direct Deposit' || (isset($payment_info->payout_method) && $payment_info->payout_method == 'Direct Deposit')) checked @endif @endif onclick="showPayoutMethod();"  > Direct Deposit &nbsp;&nbsp;
					<input type="radio" name="payout_method" id="payout_method" value="Payment by Mail" @if(old('payout_method') != 'Direct Deposit') @if(old('payout_method') == 'Payment by Mail'  || (isset($payment_info->payout_method) && $payment_info->payout_method == 'Payment by Mail')) checked @endif @endif onclick="showPayoutMethod();" > Payment by Mail 
					<!--<input type="email" name="email" value="" class="form-control" required>-->
					 <small class="text-danger pull-left"> {{ $errors->first('payout_method') }}</small>
					</div>
				</div>
				<div id="showDirectDeposit" style="display:@if(old('payout_method') == 'Payment by Mail') none @else  @if(old('payout_method') == 'Direct Deposit' || (isset($payment_info->payout_method) && $payment_info->payout_method == 'Direct Deposit')) block  @elseif(old('payout_method') == 'Payment by Mail' || (isset($payment_info->payout_method) && $payment_info->payout_method == 'Payment by Mail')) none @else none @endif @endif">
				<div class="form-group"><label class="col-md-4 control-label"> Type of Account</label>
					<div class="col-md-8" style="padding-top: 6px;">
					<input type="radio" name="type_of_account" id="type_of_account" @if(old('type_of_account') == 'Savings Account' || (isset($payment_info->type_of_account) && $payment_info->type_of_account == 'Savings Account') ) checked @endif value="Savings Account" > Savings Account &nbsp;&nbsp;
					<input type="radio" name="type_of_account" id="type_of_account" value="Checking Account" @if(old('type_of_account') == 'Checking Account' || (isset($payment_info->type_of_account) && $payment_info->type_of_account == 'Checking Account')) checked @endif> Checking Account
					<!--<input type="email" name="email" value="" class="form-control" required>-->
					 <small class="text-danger pull-left">{{ $errors->first('type_of_account') }}</small>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Account Holder's Name </label>
					<div class="col-md-8 {{ $errors->has('accont_holder_name') ? ' has-error' : '' }}" >
						<input type="text" name="accont_holder_name" id="accont_holder_name" value="{{old('accont_holder_name',(isset($payment_info->accont_holder_name))? $payment_info->accont_holder_name : "")}}" class="form-control" >
						 <small class="text-danger pull-left">{{ $errors->first('accont_holder_name') }}</small>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12 p-top p-bottom img-desktop">
						<div id="showChequeImg2" style="display:@if(old('payout_method') == 'Payment by Mail') none @else @if(old('payout_method') == 'Direct Deposit' || (isset($payment_info->payout_method) && $payment_info->payout_method == 'Direct Deposit')) block  @elseif(old('payout_method') == 'Payment by Mail' || (isset($payment_info->payout_method) && $payment_info->payout_method == 'Payment by Mail')) none @else none @endif @endif" class="img-width" >
							<img  width="100%" src="{{url('/img/CVC199908_RoutingNumber_Check_Image.jpg')}}" />	
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Routing Number</label>
					<div class="col-md-8 {{ $errors->has('routing_no') ? ' has-error' : '' }}">
						<input type="text" name="routing_no" id="routing_no" value="{{old('routing_no',(isset($payment_info->routing_no))? $payment_info->routing_no : "")}}" class="form-control" >
						 <small class="text-danger pull-left">{{ $errors->first('routing_no') }}</small>
					</div>
				</div>
			    <div class="form-group">
					<label class="col-md-4 control-label">Confirm Routing Number</label>
					<div class="col-md-8 {{ $errors->has('routing_no_confirmation') ? ' has-error' : '' }}">
						<input type="text" name="routing_no_confirmation" id="routing_no_confirmation" value="{{old('routing_no_confirmation',(isset($payment_info->routing_no))? $payment_info->routing_no : "")}}" class="form-control" >
						 <small class="text-danger pull-left">{{ $errors->first('routing_no_confirmation') }}</small>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label"> Bank Account Number</label>
					<div class="col-md-8 {{ $errors->has('account_no') ? ' has-error' : '' }}">
						<input type="text" name="account_no" id="account_no" value="{{old('account_no',(isset($payment_info->account_no))? $payment_info->account_no : "")}}" class="form-control" >
						 <small class="text-danger pull-left">{{ $errors->first('account_no') }}</small>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label"> Confirm Bank Account Number</label>
					<div class="col-md-8 {{ $errors->has('account_no_confirmation') ? ' has-error' : '' }}">
						<input type="text" name="account_no_confirmation" id="account_no_confirmation" value="{{old('account_no_confirmation',(isset($payment_info->account_no))? $payment_info->account_no : "")}}" class="form-control" >
						 <small class="text-danger pull-left">{{ $errors->first('account_no_confirmation') }}</small>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Bank Name</label>
					<div class="col-md-8 {{ $errors->has('bank_name') ? ' has-error' : '' }}">
					   <input type="text" name="bank_name" id="bank_name"  value="{{old('bank_name',(isset($payment_info->bank_name))? $payment_info->bank_name : "")}}" class="form-control">
					   <small class="text-danger pull-left">{{ $errors->first('bank_name') }}</small>
					 </div>
				</div>
				<div class="form-group{{ $errors->has('chk_confirmation') ? ' has-error' : '' }}">
					<!--<label class="col-md-12 control-label"> </label>-->
					<div class="col-md-12">
					   <input type="checkbox" name="chk_confirmation" id="chk_confirmation" value="1" {{ (old('chk_confirmation') == 1) ? 'checked' : '' }}> I authorize Musika Lessons, Inc. to automatically deposit my earning into the account listed above. This authorization will remain in effect until I change the payment method.<br>
					   <small class="text-danger pull-left">{{ $errors->first('chk_confirmation') }}</small>
					 </div>
				</div>
				<div class="form-group" style="margin-bottom: 1px;">
					<label class="col-md-4 control-label">E-Signature (Full Legal Name)</label>
					<div class="col-md-8 {{ $errors->has('e_sign') ? ' has-error' : '' }}">
					   <input type="text" name="e_sign" id="e_sign" onkeyup="convert_sign();"  value="{{old('e_sign',(isset($payment_info->e_sign))? $payment_info->e_sign : "")}}" class="form-control ">
					   <small class="text-danger pull-left">{{ $errors->first('e_sign') }}</small>
					 </div>
				</div>
				<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
					<label class="col-md-4 control-label"></label>
					<div class="col-md-8">
					   <!--<input type="text" name="signature" id="e_sign"  value="" class="form-control">-->
						<span id="signature" class="signature">{{(isset($payment_info->e_sign))? $payment_info->e_sign : ""}} </span>
					 </div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Date Signed</label>
					<div class="col-md-6 {{ $errors->has('e_sign_date') ? ' has-error' : '' }}">
					   <input type="text" name="e_sign_date" id="e_sign_date" value="{{date('l, F j, Y')}}" class="form-control" disabled >
					   <small class="text-danger pull-left">{{ $errors->first('e_sign_date') }}</small>
					 </div>
				</div>
				<div class="form-group">
					<!--<label class="col-md-12 control-label"> </label>-->
					<div class="col-md-12">
					  Direct Deposit payments will be processed on the 14th of every month, unless the 14th falls on a weekend or holiday in which case it will be moved to the next available business day. Please note that deposits take <strong>2 business days</strong> for the bank to process.
					 </div>
				</div>
				</div>
				<div id="showPaymentByMail" style="display:@if(old('payout_method') == 'Direct Deposit') none @else  @if(old('payout_method') == 'Payment by Mail' || (isset($payment_info->payout_method) && $payment_info->payout_method == 'Payment by Mail')) block @else none @endif  @endif">
				<div class="form-group">
					<label class="col-md-4 control-label">Address Line 1</label>
					<div class="col-md-8{{ $errors->has('addressL1') ? ' has-error' : '' }}">
					   <input name="addressL1" id="addressL1" value="{{ old('addressL1',(isset($payment_info->addressL1))? $payment_info->addressL1 : "")}}" class="form-control" />
					   <small class="text-danger pull-left">{{ $errors->first('addressL1') }}</small>
					 </div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Address Line 2</label>
					<div class="col-md-8{{ $errors->has('addressL2') ? ' has-error' : '' }}">
					   <input name="addressL2" id="addressL2" value="{{ old('addressL2',(isset($payment_info->addressL2))? $payment_info->addressL2 : "" )}}" class="form-control" />
					   <small class="text-danger pull-left">{{ $errors->first('addressL2') }}</small>
					 </div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">City</label>
					<div class="col-md-8{{ $errors->has('city') ? ' has-error' : '' }}">
					   <input type="text" name="city" id="city" value="{{old('city',(isset($payment_info->city))? $payment_info->city : "") }}" class="form-control" /> 
					   <small class="text-danger pull-left">{{ $errors->first('city') }}</small>
					 </div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">State</label>
					<div class="col-md-8{{ $errors->has('state') ? ' has-error' : '' }}">
					   <select class="form-control m-b" name="state">
						@foreach($statename as $state)
							<option value="{{$state->stateId }}" @if(isset($payment_info->state) && $payment_info->state == $state->stateId ) selected  @endif >
							{{$state->stateName}}
							</option>
						@endforeach	
						</select> 
					   <small class="text-danger pull-left">{{ $errors->first('state') }}</small>
					 </div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Zipcode</label>
					<div class="col-md-8{{ $errors->has('zipcode') ? ' has-error' : '' }}">
					   <input type="text" name="zipcode" id="zipcode" value=" {{old('zipcode',(isset($payment_info->zipcode))? $payment_info->zipcode : "" ) }}" class="form-control" /> 
					   <small class="text-danger pull-left">{{ $errors->first('zipcode') }}</small>
					 </div>
				</div>	
				</div>
				<div class="text-center">
					<button class="btn btn-primary" type="submit" ><strong>Save</strong></button>
				</div>
				</form>
			</div>
			</div>
		</div>
	</div>
	<!--<div class="col-lg-6" style="padding-left:0;">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5></h5>
			</div>
			<div class="ibox-content">
				
			</div>
		</div>
	</div>-->
	</div>
			
								 
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
<script>
function convert_sign(){
	var e_sign = $("#e_sign").val();
	$("#signature").html(e_sign);
}

function showPayoutMethod(){
	var payout_method = $('input[name=payout_method]:checked').val()
	if(payout_method == "Direct Deposit"){
		$("#showDirectDeposit").css('display','block');
		$("#showChequeImg").css('display','block');
		$("#showChequeImg2").css('display','block');
		$("#showPaymentByMail").css('display','none');
	}else if(payout_method == "Payment by Mail"){
		$("#showDirectDeposit").css('display','none');
		$("#showChequeImg").css('display','none');
		$("#showChequeImg2").css('display','none');
		$("#showPaymentByMail").css('display','block');
	}
}

$(document).ready(function(){
   $('#account_no_confirmation').on("cut copy paste",function(e) {
      e.preventDefault();
   });
    $('#routing_no_confirmation').on("cut copy paste",function(e) {
      e.preventDefault();
   });
  // t = ($('#accont_holder_name').offset().top/2)+'px';
   //$('#showChequeImg').css('top', t);
   //$('#showChequeImg').css('position', 'absolute');
   
});
</script>
@endsection