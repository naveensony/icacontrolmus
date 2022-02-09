@extends('layouts.newapp')
@section('title') Musika Music Teachers  @endsection
@section('content')
<section class="teachers-content banner py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-xs-12 col-sm-9 col-xl-9 col-xxl-9">
                        <div class="teachers-content-table bg-white p-3 border border-1">
                            <h1 class="fw-bolder">Search for Teachers -</h1>
                            <div class="row my-3">
                                <div class="search_input search_fullrow col-xs-12 col-sm-12 col-xl-4 col-md-4 col-xxl-4">
                                    <div class="inner-addon left-addon position-relative">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <input type="text" value="" id="zipcode" onfocus="value=''" class="border border-1 rounded-0" />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-xl-4 col-md-4 col-xxl-4">
                                    <div class="selectinstrumnet position-relative w-100">
                                        <i class="fas fa-list"></i>
                                        <select id="instruments_select" class="selectpicker border border-1 rounded-0 w-100" name="instrument">
                                            <option value="all">Select an Instrument</option>
                                            <option value="1"> Piano </option>
                                            <option value="2"> Guitar </option>
                                            <option value="3"> Voice </option>
                                            <option value="4"> Violin </option>
                                            <option value="7"> Cello </option>
                                            <option value="8"> Viola </option>
                                            <option value="9"> Trumpet </option>
                                            <option value="10"> Trombone </option>
                                            <option value="11"> Saxophone </option>
                                            <option value="12"> Flute </option>
                                            <option value="13"> Clarinet </option>
                                            <option value="14"> Drums </option>
                                            <option value="15"> Bass Guitar </option>
                                            <option value="all"> All instruments </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="instrument-tought mb-3">
                                <h6><i class="fas fa-music me-2 text-secondary"></i>Instruments Taught</h6>
                                <div class="row justify-content-start">
                                    <div class="col-md-2 col-sm-2 col-xs-12 col-xl-2 col-xxl-2">
                                        <div class="form-check">
                                            <input class="form-check-input rounded-0" type="checkbox" value="" id="Piano" />
                                            <label class="form-check-label" for="Piano">Piano</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input rounded-0" type="checkbox" value="" id="Guitar" />
                                            <label class="form-check-label" for="Guitar">Guitar</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input rounded-0" type="checkbox" value="" id="Bass" />
                                            <label class="form-check-label" for="Bass">Bass Guitar</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12 col-xl-2 col-xxl-2">
                                        <div class="form-check">
                                            <input class="form-check-input rounded-0" type="checkbox" value="" id="Voice" />
                                            <label class="form-check-label" for="Voice">Voice</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input rounded-0" type="checkbox" value="" id="Violin" />
                                            <label class="form-check-label" for="Violin">Violin</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input rounded-0" type="checkbox" value="" id="Cello" />
                                            <label class="form-check-label" for="Cello">Cello</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12 col-xl-2 col-xxl-2">
                                        <div class="form-check">
                                            <input class="form-check-input rounded-0" type="checkbox" value="" id="Viola" />
                                            <label class="form-check-label" for="Viola">Viola</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input rounded-0" type="checkbox" value="" id="Trumpet" />
                                            <label class="form-check-label" for="Trumpet">Trumpet</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input rounded-0" type="checkbox" value="" id="Trombone" />
                                            <label class="form-check-label" for="Trombone">Trombone</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12 col-xl-2 col-xxl-2">
                                        <div class="form-check">
                                            <input class="form-check-input rounded-0" type="checkbox" value="" id="Saxophone" />
                                            <label class="form-check-label" for="Saxophone">Saxophone</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input rounded-0" type="checkbox" value="" id="Guitar" />
                                            <label class="form-check-label" for="Guitar">Saxophone</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input rounded-0" type="checkbox" value="" id="Clarinet" />
                                            <label class="form-check-label" for="Clarinet">Clarinet</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12 col-xl-3 col-xxl-3">
                                        <div class="form-check">
                                            <input class="form-check-input rounded-0" type="checkbox" value="" id="Drums" />
                                            <label class="form-check-label" for="Drums">Drums</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input rounded-0" type="checkbox" value="" id="AllInstruments" />
                                            <label class="form-check-label" for="AllInstruments">All Instruments</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lesson-location">
                                <div class="row">
                                    <div class="col-md-4 col-xs-12 col-sm-12 col-xl-4 col-xxl-4">
                                        <h6><i class="fas fa-home text-secondary me-2"></i>Lesson Location</h6>
                                        <div class="lesson-location-checked">
                                            <div class="form-check">
                                                <input class="form-check-input rounded-0" type="checkbox" value="" id="InHome" />
                                                <label class="form-check-label" for="InHome">In Home</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input rounded-0" type="checkbox" value="" id="InStudio" />
                                                <label class="form-check-label" for="InStudio">In Studio</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input rounded-0" type="checkbox" value="" id="Online" />
                                                <label class="form-check-label" for="Online">Online</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12 col-sm-12 col-xl-4 col-xxl-4">
                                        <h6><i class="fas fa-exchange-alt text-secondary me-2"></i>Maximum Distance</h6>
                                        <select id="input_distance" class="selectpicker border border-1 rounded-0 w-100 p-2" name="distance" onchange="">
                                            <option value="20">20 miles</option>
                                            <option value="30">30 miles</option>
                                            <option value="40">40 miles</option>
                                            <option value="50">50 miles</option>
                                            <option value="60">60 miles</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-xs-12 col-sm-12 col-xl-4 col-xxl-4">
                                        <button class="btn-s mt-4 p-2 w-100"><i class="fas fa-search text-light me-2"></i>FIND TEACHERS</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="teachers-found my-2">
                            <div class="teachers-filter d-flex">
                                <ul class="me-auto">
                                    <li class="d-inline-block"><h6>4 teachers found.</h6></li>
                                    <li class="d-inline-block">
                                        <a class="more studios"> <img src="images/ico-view-map.png" alt="view studio map" />view studio map </a>
                                    </li>
                                </ul>
                                <div class="ms-auto">
                                    <select id="sort" class="sortCriteria form-control border border-1 rounded-0 shadow-none py-1 px-2">
                                        <option value="sort" selected="selected">Sort By</option>
                                        <option value="distance">Distance</option>
                                        <option value="name">Name</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="search_result bg-white p-3 border border-1 mt-2">
                            <div class="row">
                                <div class="col-md-2 col-sm-2 col-xs-12 col-xl-2 col-xxl-2">
                                    <a data-toggle="modal" href="#" title="Details" class="position-relative d-block">
                                        <div class="our-images">
                                            <img class="image img-thumbnail" alt="Avatar" src="images/hv49vp1hryd6h75ayuhc.jpg" />
                                            <div class="overlay">
                                                <div class="text w-100">
                                                    <i class="fas fa-search-plus"></i>
                                                    <span class="d-block text-center my-1 fs-6">View Profie</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 col-xl-6 col-xxl-6 border-1 border-end">
                                    <h4 class="profile_name">
                                        <a target="_blank" href="#"><span id="teacher_1_firstName" style="display: inline;">Eric J</span></a>
                                        <span class="lesson_location">
                                            <img src="images/profile_home.png" alt="in home" />
                                            <b class="purple">In Your Home</b>
                                        </span>
                                    </h4>
                                    <span class="distance">0.12 miles away</span>
                                    <h6><strong>Instruments:</strong> <span>Saxophone, Flute, Clarinet</span></h6>
                                    <h6><strong>Styles:</strong> <span>Classical, Jazz, Pop, Rock, Blues, Folk, R&amp;B</span></h6>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 col-xl-4 col-xxl-4">
                                    <h6 class="ages_taught"><strong>Ages Taught:</strong> <span>5-80</span></h6>
                                    <h6 class="levels_taught"><strong>Levels Taught:</strong></h6>
									<img src="images/jslider2.png" class="my-1">
									<button class="btn-s mt-2 p-2 w-100">Get Started</button>
                                </div>
                            </div>
                        </div>
						<div class="search_result bg-white p-3 border border-1 mt-2">
                            <div class="row">
                                <div class="col-md-2 col-sm-2 col-xs-12 col-xl-2 col-xxl-2">
                                    <a data-toggle="modal" href="#" title="Details" class="position-relative d-block">
                                        <div class="our-images">
                                            <img class="image img-thumbnail" alt="Avatar" src="images/zayv3uaqfleg9vkmrh4b.jpg" />
                                            <div class="overlay">
                                                <div class="text w-100">
                                                    <i class="fas fa-search-plus"></i>
                                                    <span class="d-block text-center my-1 fs-6">View Profie</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 col-xl-6 col-xxl-6 border-1 border-end">
                                    <h4 class="profile_name">
                                        <a target="_blank" href="#"><span id="teacher_1_firstName" style="display: inline;">Kiah C</span></a>
                                        <span class="lesson_location">
                                            <img src="images/profile_home.png" alt="in home" />
                                            <b class="purple">In Your Home</b>
                                        </span>
                                    </h4>
                                    <span class="distance">0.12 miles away</span>
                                    <h6><strong>Instruments:</strong> <span>Piano, Voice, Cello</span></h6>
                                    <h6><strong>Styles:</strong> <span>Classical, Pop, Musical Theater, Opera, New Age</span></h6>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 col-xl-4 col-xxl-4">
                                    <h6 class="ages_taught"><strong>Ages Taught:</strong> <span>7-80</span></h6>
                                    <h6 class="levels_taught"><strong>Levels Taught:</strong></h6>
									<img src="images/jslider2.png" class="my-1">
									<button class="btn-s mt-2 p-2 w-100">Get Started</button>
                                </div>
                            </div>
                        </div>
						<div class="search_result bg-white p-3 border border-1 mt-2">
                            <div class="row">
                                <div class="col-md-2 col-sm-2 col-xs-12 col-xl-2 col-xxl-2">
                                    <a data-toggle="modal" href="#" title="Details" class="position-relative d-block">
                                        <div class="our-images">
                                            <img class="image img-thumbnail" alt="Avatar" src="images/rzvjbeapm9ree1l4ldwk.jpg" />
                                            <div class="overlay">
                                                <div class="text w-100">
                                                    <i class="fas fa-search-plus"></i>
                                                    <span class="d-block text-center my-1 fs-6">View Profie</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 col-xl-6 col-xxl-6 border-1 border-end">
                                    <h4 class="profile_name">
                                        <a target="_blank" href="#"><span id="teacher_1_firstName" style="display: inline;">Nicole C</span></a>
										<span class="lesson_location">
                                            <img src="images/profile_online.png" alt="in Online" />
                                            <b class="orange">Online</b>
                                        </span>
                                        <span class="lesson_location me-2">
                                            <img src="images/profile_home.png" alt="in home" />
                                            <b class="purple">In Your Home</b>
                                        </span>
                                    </h4>
                                    <span class="distance">0.12 miles away</span>
                                    <h6><strong>Instruments:</strong> <span>Voice</span></h6>
                                    <h6><strong>Styles:</strong> <span>Classical, Rock, Blues, Musical Theater, Opera, Electronic, Showtunes, Punk</span></h6>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 col-xl-4 col-xxl-4">
                                    <h6 class="ages_taught"><strong>Ages Taught:</strong> <span> 10-80</span></h6>
                                    <h6 class="levels_taught"><strong>Levels Taught:</strong></h6>
									<img src="images/jslider2.png" class="my-1">
									<button class="btn-s mt-2 p-2 w-100">Get Started</button>
                                </div>
                            </div>
                        </div>
						<div class="search_result bg-white p-3 border border-1 mt-2">
                            <div class="row">
                                <div class="col-md-2 col-sm-2 col-xs-12 col-xl-2 col-xxl-2">
                                    <a data-toggle="modal" href="#" title="Details" class="position-relative d-block">
                                        <div class="our-images">
                                            <img class="image img-thumbnail" alt="Avatar" src="images/bhvjrfsu8mogq8lgj1wy.jpg" />
                                            <div class="overlay">
                                                <div class="text w-100">
                                                    <i class="fas fa-search-plus"></i>
                                                    <span class="d-block text-center my-1 fs-6">View Profie</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 col-xl-6 col-xxl-6 border-1 border-end">
                                    <h4 class="profile_name">
                                        <a target="_blank" href="#"><span id="teacher_1_firstName" style="display: inline;">Suya N</span></a>
										<span class="lesson_location">
                                            <img src="images/profile_online.png" alt="in Online" />
                                            <b class="orange">Online</b>
                                        </span>
                                        <span class="lesson_location me-2">
                                            <img src="images/profile_home.png" alt="in home" />
                                            <b class="purple">In Your Home</b>
                                        </span>
                                    </h4>
                                    <span class="distance">0.12 miles away</span>
                                    <h6><strong>Instruments:</strong> <span>Piano, Guitar, Voice, Drum, Bass-Guitar, Synthesizer, Ukulele, Recorder, Conga, Latin-Percussion</span></h6>
                                    <h6><strong>Styles:</strong> <span>Pop, Rock, Blues, Country, R&B, Gospel, Musical Theater, Latin, Funk, Electronic, Salsa, Showtunes, Spirituals, Reggae, Swing, New Age, Samba, Bossa Nova, Soul, Punk, Avant-garde</span></h6>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 col-xl-4 col-xxl-4">
                                    <h6 class="ages_taught"><strong>Ages Taught:</strong> <span>5-80</span></h6>
                                    <h6 class="levels_taught"><strong>Levels Taught:</strong></h6>
									<img src="images/jslider2.png" class="my-1">
									<button class="btn-s mt-2 p-2 w-100">Get Started</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12 col-sm-3 col-xl-3 col-xxl-3">
					 <div class="search_result bg-white p-3 border border-1">
						<a href="#"><img class="pull-left side_image float-start me-2 w-auto" src="images/ico-bbb.png" alt="BBB A+ rating"></a>
						<h5><b>Check out our <span class="purple">A+</span></b></h5>
						<p>Rating from the Better Business Bureau</p>
					 </div>
					  <div class="search_result bg-white p-3 border border-1 mt-2">
						<a href="#"><img class="pull-left side_image float-start me-2 w-auto" src="images/sidebar_riskfree.jpg" alt="BBB A+ rating"></a>
						<h5><b><span class="purple">100% Risk-Free</span> Trial Lesson </b></h5>
						<p>We are so confident that you will love our service that if you are not 100% satisfied after the trial lesson it’s free. GUARANTEED!</p>
					 </div>
					 <div class="search_result bg-white p-3 border border-1 mt-2">
						<h5><b>Teachers<span class="purple">Featured In</span></b></h5>
						<img class="pull-left side_image" src="images/teacher_feature.jpg">
					 </div>
					  <div class="search_result bg-white p-3 border border-1 mt-2">
						<h5><b><span class="purple">Ready?</span></b></h5>
						<p>Get started with your risk-free trial lesson! Call us at <a href="callto:+18776874524"><b>(877) 687-4524</b></a> or</p>
						<button class="btn-s mt-3 p-2 w-100">RISK-FREE TRIAL</button>
					 </div>
					</div>
                </div>
            </div>
        </section>
		<section class="py-5 text-center position-relative bg-light">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-xs-12 col-sm-12 col-xl-12 col-xxl-12">
						<div class="heading-title">
							<h3 class="text-center mt-3 mb-2 heading">Not sure which teacher is perfect for you? No worries, just tell us your needs and <span class="purple">we'll pair you with the best match!</span></h3>
							<a href="#" class="my-3"><button class="btn-blue">GET STARTED NOW</button></a>
						</div>
					</div>
				</div>
			</div>
		</section>

@endsection