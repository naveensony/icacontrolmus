@extends('layouts.app')
<style>
.ibox-content p{
	
	line-height: 2;
    margin: 2px 14px 10px 11px;
}
.ibox {
	
    margin-bottom: 0px !important;
}

</style>
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-sm-10">
      <h2>Contractual Obligation - Inform Musika About Your Musika Student's Referral</h2>
   </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">

<form id="dataDisplay" name="dataDisplay" method="post" action="{{url('post_referral')}}"  onsubmit="return doSubmit(this);">
		 {{csrf_field()}}

   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins" >
            <!--<div class="ibox-title">
			
            </div>-->
			@if(isset($msg))
			 <div class="ibox-content">
				<div class="alert alert-info alert-dismissable">
				{{$msg}} 
				</div>
			</div>
			@endif
            <div class="ibox-content" style="height: 110%">
          <p> <strong>As per contract, all referrals from your Musika students (ie friends, family members, relatives) must register through Musika and cannot be taught outside of Musika by you at any time.</strong> If you're on this page, great! We're glad one of your Musika students has referred you to one or more of their friends and/or relatives. This means the students and/or their parents like your teaching attitude and/or style so much that they want to recommend you as a Musika teacher to their friends and/or relatives. This is the most positive factor in Musika's decision to assign more students to you, and the more referrals you have from your Musika students, the more likely Musika will consider assigning students to you in the future.</p>
             <br/>
			<div class="form-group">
				<label class="col-md-4 ">Name of parent or student to whom you were referred:</label>
				<div class="col-md-5">
					<input type="text" name="sname" id="sname" value="" class="form-control" >
				</div>
		   </div>
			<br>&nbsp;</br> 
			<div class="form-group">
				<label class="col-md-4 ">Phone number:</label>
					<div class="col-md-5">
						<input type="text" name="phone" id="phone" value="" class="form-control" >
					</div>
			</div>
			<p>&nbsp;</p>
			<div class="form-group">
				<div class="col-md-12 text-center">
					<input type='hidden' name='sent' value='1'>	
					<input type="submit" id="tSubmit" value="submit" class="btn btn-primary">
				</div>
			</div>	
			
			</div>
			
         </div>
      </div>
   </div>
</form>
</div>
@endsection

@section('scripts')
<link rel="stylesheet" href="{{asset('css/jquery-confirm.min.css')}}">
<script src="{{asset('js/jquery-confirm.min.js')}}"></script>
<script type="text/javascript">

  function doSubmit(f) {

	//alert('test');
	//return false;
	
	if ($.trim(f.sname.value)=='') {
		//alert("You need to enter at least one name (preferably the parent's name)."); 
		$.alert({ title: 'Alert!', content: 'You need to enter at least one name (preferably the parent`s name).'});
		return false;
	}
	
	if ($.trim(f.phone.value)=='') {
		//alert("You need to enter a phone number to contact."); 
		$.alert({ title: 'Alert!', content: 'You need to enter a phone number to contact.'});
		return false;
	}

	

	return true;

}

</script>
@endsection

