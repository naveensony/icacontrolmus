@extends('layouts.newapp')
@section('title') Musika Music Teachers  @endsection
@section('content')
<section class="banner rates">
            <div class="container">
                <div class="row">
                    <div class="banner_content text-center text-light p-5"> 
                        <h1 class="text-light mb-3">We make finding a music teacher easy. Just follow the two steps below and we do the rest!</h1>
						<form id="zipform">
							<div class="row">
								<div class="fullrow col-sm-4 col-xl-4 col-xxl-4 col-xs-12 col-md-4">
									<img id="arrow" class="img-responsive script_zip" src="images/enter_zip.png" alt="Enter Your Zip Code to Get Your Rates">
									</div>
									<div class="fullrow col-sm-5 col-xl-5 col-xxl-5 col-xs-12 col-md-5 form_field">
										<input type="text" id="zipcode" class="zip_box p-3 w-100 mt-1" maxlength="5" placeholder="Zip Code" value="">
									</div>
									<div class="fullrow col-sm-3 col-xl-3 col-xxl-3 col-xs-12 col-md-3 id="search_col">
										<input type="button" id="ratesearch" class="zip_search p-3  btn-blue mt-1" value="GET RATES">
									</div>
								</div>
						</form>
                    </div>
                </div>
            </div>
        </section>


@endsection