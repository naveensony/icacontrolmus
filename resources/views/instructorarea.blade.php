@extends('layouts.newapp')
@section('title') Musika Music Teachers  @endsection
@section('content')
<section class="banner instructorarea">
            <div class="container">
                <div class="row">
					<div class="col-md-9 col-sm-9 col-xs-12 col-xl-9 col-xxl-9">
						<div class="banner_content text-center text-light">
							<h1 class="text-light text-start">Find an Instructor In Your Area</h1>
							<p class="text-light text-start fw-bold fs-5">Setup a <a href="riskfreetrail.php" class="blue-color">risk-free trial</a> lesson for you or your child:</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 col-xl-3 col-xxl-3">
						<a href="contact.php"><button class="btn-blue">INQURE TODAY</button></a>
					</div>
                </div>
            </div>
        </section>
		<section class="instructorarea-content">
			<div class="container position-relative custom-container-top search_states">
				<section class="strip-line">
					<span class="color_divider bg_blue"></span>
					<span class="color_divider bg_green"></span>
					<span class="color_divider bg_purple"></span>
					<span class="color_divider bg_orange"></span>
					<span class="color_divider bg_yellow"></span>
				</section>
				<div class="row">
					<div class="col-md-12 col-xs-12 col-sm-12 col-xl-12 col-xxl-12">
						<div class="map_top py-4">
							<h1 class="blue-color text-center fw-bold mt-4">Choose Your Region</h1>
							<div class="map_arrow text-center"><i class="fas fa-angle-down lightgray fs-1"></i></div>
						</div>
						<div class="map-place col-xl-12 col-xxl-12 py-5 text-center">			
							<img src="images/map-usa_bkp2.png" alt="map" usemap="#map" id="map-pict" class="w-75 m-auto">
						</div>
					</div>
				</div>
			</div>
		</section>

@endsection