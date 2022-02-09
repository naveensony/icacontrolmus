@extends('layouts.newapp')
@section('title') Musika Music Teachers  @endsection
@section('content')
<section class="banner contact-us instruments border border-bottom border-3">
            <div class="container">
                <div class="row">
                    <div class="banner_content text-center text-light">
                        <h1 class="text-center purple">Online Music Lessons</h1>
                        <p class="mt-3 fs-5 text-dark">What Would You Like to Learn? Pick your favorite instrument.</p>
                    </div>
                </div>
            </div>
        </section> 
		<section class="py-5 metallica-mozart text-center position-relative bg-white instrument_ser_list">
			<div class="container">
				<div class="row mb-5">
					<div class="col-md-4 col-xs-12 col-sm-12 col-xl-4 col-xxl-4">
						<div class="instruments-content">
							<a data-toggle="modal" href="#" title="Details" class="position-relative d-block">
								<div class="our-images">
								<img src="images/piano_lessons.jpg" alt="Avatar" class="image">
								<div class="overlay">
									<div class="text"><i class="fas fa-link"></i></div>
								</div>
								</div>
							</a>
							<div class="instruments-content-info pt-3 text-center border border-top-0 border-1 bd-example px-3">
								<h5 class="lightgrey fs-5 mb-0">PIANO</h5>
								<p class="lightgrey same_height py-2">Learning to tickle the ivories is easier than ever with online lessons. Check it out and get playing today.</p>
								<p class="learn_more"><a href="/instruments/piano"><button class="more_btn">MORE DETAILS</button></a></p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-xs-12 col-sm-12 col-xl-4 col-xxl-4">
						<div class="instruments-content">
							<a data-toggle="modal" href="#" title="Details" class="position-relative d-block">
								<div class="our-images">
								<img src="images/guitar_lessons.jpg" alt="Avatar" class="image">
								<div class="overlay">
									<div class="text"><i class="fas fa-link"></i></div>
								</div>
								</div>
							</a>
							<div class="instruments-content-info pt-3 text-center border border-top-0 border-1 bd-example px-3">
								<h5 class="lightgrey fs-5 mb-0">GUITAR</h5>
								<p class="lightgrey same_height py-2">With online lessons you can rock out with any teacher in the country! Try it out risk free today.</p>
								<p class="learn_more"><a href="/instruments/piano"><button class="more_btn">MORE DETAILS</button></a></p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-xs-12 col-sm-12 col-xl-4 col-xxl-4">
						<div class="instruments-content">
							<a data-toggle="modal" href="#" title="Details" class="position-relative d-block">
								<div class="our-images">
								<img src="images/voice_lessons.jpg" alt="Avatar" class="image">
								<div class="overlay">
									<div class="text"><i class="fas fa-link"></i></div>
								</div>
								</div>
							</a>
							<div class="instruments-content-info pt-3 text-center border border-top-0 border-1 bd-example px-3">
								<h5 class="lightgrey fs-5 mb-0">VOICE</h5>
								<p class="lightgrey same_height py-2">Sing your heart out without even having to leave your house! Try a risk free online voice lesson today.</p>
								<p class="learn_more"><a href="/instruments/piano"><button class="more_btn">MORE DETAILS</button></a></p>
							</div>
						</div>
					</div>
				</div>
				<div class="row mb-5">
					<div class="col-md-4 col-xs-12 col-sm-12 col-xl-4 col-xxl-4">
						<div class="instruments-content">
							<a data-toggle="modal" href="#" title="Details" class="position-relative d-block">
								<div class="our-images">
								<img src="images/violin_lessons.jpg" alt="Avatar" class="image">
								<div class="overlay">
									<div class="text"><i class="fas fa-link"></i></div>
								</div>
								</div>
							</a>
							<div class="instruments-content-info pt-3 text-center border border-top-0 border-1 bd-example px-3">
								<h5 class="lightgrey fs-5 mb-0">VIOLIN</h5>
								<p class="lightgrey same_height py-2">Classical, Celtic, and fiddle styles are all accessible with the click of a button. Try an online violin lesson risk free today.</p>
								<p class="learn_more"><a href="/instruments/piano"><button class="more_btn">MORE DETAILS</button></a></p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-xs-12 col-sm-12 col-xl-4 col-xxl-4">
						<div class="instruments-content">
							<a data-toggle="modal" href="#" title="Details" class="position-relative d-block">
								<div class="our-images">
								<img src="images/trumpet_lessons.jpg" alt="Avatar" class="image">
								<div class="overlay">
									<div class="text"><i class="fas fa-link"></i></div>
								</div>
								</div>
							</a>
							<div class="instruments-content-info pt-3 text-center border border-top-0 border-1 bd-example px-3">
								<h5 class="lightgrey fs-5 mb-0">TRUMPET</h5>
								<p class="lightgrey same_height py-2">From jazz to big band to classical, you can learn it all with online lessons. Get started with a risk free trial!</p>
								<p class="learn_more"><a href="/instruments/piano"><button class="more_btn">MORE DETAILS</button></a></p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-xs-12 col-sm-12 col-xl-4 col-xxl-4">
						<div class="instruments-content">
							<a data-toggle="modal" href="#" title="Details" class="position-relative d-block">
								<div class="our-images">
								<img src="images/clarinet_lessons.jpg" alt="Avatar" class="image">
								<div class="overlay">
									<div class="text"><i class="fas fa-link"></i></div>
								</div>
								</div>
							</a>
							<div class="instruments-content-info pt-3 text-center border border-top-0 border-1 bd-example px-3">
								<h5 class="lightgrey fs-5 mb-0">CLARINET</h5>
								<p class="lightgrey same_height py-2">Get your woodwind fix with online clarinet lessons. It's a great way to learn and risk free to try it out!</p>
								<p class="learn_more"><a href="/instruments/piano"><button class="more_btn">MORE DETAILS</button></a></p>
							</div>
						</div>
					</div>
				</div>
				<div class="row mb-5">
					<div class="col-md-4 col-xs-12 col-sm-12 col-xl-4 col-xxl-4">
						<div class="instruments-content">
							<a data-toggle="modal" href="#" title="Details" class="position-relative d-block">
								<div class="our-images">
								<img src="images/home_bass.jpg" alt="Avatar" class="image">
								<div class="overlay">
									<div class="text"><i class="fas fa-link"></i></div>
								</div>
								</div>
							</a>
							<div class="instruments-content-info pt-3 text-center border border-top-0 border-1 bd-example px-3">
								<h5 class="lightgrey fs-5 mb-0">BASS GUITAR</h5>
								<p class="lightgrey same_height py-2">Every good song needs a bass line. Try a risk free online lesson and become the heartbeat of your band.</p>
								<p class="learn_more"><a href="/instruments/piano"><button class="more_btn">MORE DETAILS</button></a></p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-xs-12 col-sm-12 col-xl-4 col-xxl-4">
						<div class="instruments-content">
							<a data-toggle="modal" href="#" title="Details" class="position-relative d-block">
								<div class="our-images">
								<img src="images/saxophone_lessons.jpg" alt="Avatar" class="image">
								<div class="overlay">
									<div class="text"><i class="fas fa-link"></i></div>
								</div>
								</div>
							</a>
							<div class="instruments-content-info pt-3 text-center border border-top-0 border-1 bd-example px-3">
								<h5 class="lightgrey fs-5 mb-0">SAXOPHONE</h5>
								<p class="lightgrey same_height py-2">No matter what size saxophone you want to learn, we've got you covered with online lessons. Give it a try today, risk free.</p>
								<p class="learn_more"><a href="/instruments/piano"><button class="more_btn">MORE DETAILS</button></a></p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-xs-12 col-sm-12 col-xl-4 col-xxl-4">
						<div class="instruments-content">
							<a data-toggle="modal" href="#" title="Details" class="position-relative d-block">
								<div class="our-images">
								<img src="images/flute_lessons.jpg" alt="Avatar" class="image">
								<div class="overlay">
									<div class="text"><i class="fas fa-link"></i></div>
								</div>
								</div>
							</a>
							<div class="instruments-content-info pt-3 text-center border border-top-0 border-1 bd-example px-3">
								<h5 class="lightgrey fs-5 mb-0">FLUTE</h5>
								<p class="lightgrey same_height py-2">Whether you're in an orchestra, a band, or just playing for fun, online lessons are great for all flutists. Try a lesson risk free today.</p>
								<p class="learn_more"><a href="/instruments/piano"><button class="more_btn">MORE DETAILS</button></a></p>
							</div>
						</div>
					</div>
				</div>
				<div class="row mb-5">
					<div class="col-md-4 col-xs-12 col-sm-12 col-xl-4 col-xxl-4">
						<div class="instruments-content">
							<a data-toggle="modal" href="#" title="Details" class="position-relative d-block">
								<div class="our-images">
								<img src="images/cello_lessons.jpg" alt="Avatar" class="image">
								<div class="overlay">
									<div class="text"><i class="fas fa-link"></i></div>
								</div>
								</div>
							</a>
							<div class="instruments-content-info pt-3 text-center border border-top-0 border-1 bd-example px-3">
								<h5 class="lightgrey fs-5 mb-0">CELLO</h5>
								<p class="lightgrey same_height py-2">No one wants to carry a cello all the way to a studio! Try online lessons risk free instead.</p>
								<p class="learn_more"><a href="/instruments/piano"><button class="more_btn">MORE DETAILS</button></a></p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-xs-12 col-sm-12 col-xl-4 col-xxl-4">
						<div class="instruments-content">
							<a data-toggle="modal" href="#" title="Details" class="position-relative d-block">
								<div class="our-images">
								<img src="images/drums_lessons.jpg" alt="Avatar" class="image">
								<div class="overlay">
									<div class="text"><i class="fas fa-link"></i></div>
								</div>
								</div>
							</a>
							<div class="instruments-content-info pt-3 text-center border border-top-0 border-1 bd-example px-3">
								<h5 class="lightgrey fs-5 mb-0">DRUMS</h5>
								<p class="lightgrey same_height py-2">Learn on your own kit while your teacher demonstrates on his or her kit at their studio. Online lessons are the best of both worlds.</p>
								<p class="learn_more"><a href="/instruments/piano"><button class="more_btn">MORE DETAILS</button></a></p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-xs-12 col-sm-12 col-xl-4 col-xxl-4">
						<div class="instruments-content">
							<a data-toggle="modal" href="#" title="Details" class="position-relative d-block">
								<div class="our-images">
								<img src="images/trombone_lessons.jpg" alt="Avatar" class="image">
								<div class="overlay">
									<div class="text"><i class="fas fa-link"></i></div>
								</div>
								</div>
							</a>
							<div class="instruments-content-info pt-3 text-center border border-top-0 border-1 bd-example px-3">
								<h5 class="lightgrey fs-5 mb-0">TROMBONE</h5>
								<p class="lightgrey same_height py-2">Limited time to take lessons but still want to learn trombone? Online lessons may be the perfect fit for you!</p>
								<p class="learn_more"><a href="/instruments/piano"><button class="more_btn">MORE DETAILS</button></a></p>
							</div>
						</div>
					</div>
				</div>
				<div class="row mb-5">
					<div class="col-md-4 col-xs-12 col-sm-12 col-xl-4 col-xxl-4">
						<div class="instruments-content">
							<a data-toggle="modal" href="#" title="Details" class="position-relative d-block">
								<div class="our-images">
								<img src="images/home_viola.jpg" alt="Avatar" class="image">
								<div class="overlay">
									<div class="text"><i class="fas fa-link"></i></div>
								</div>
								</div>
							</a>
							<div class="instruments-content-info pt-3 text-center border border-top-0 border-1 bd-example px-3">
								<h5 class="lightgrey fs-5 mb-0">VIOLA</h5>
								<p class="lightgrey same_height py-2">All levels of student can benefit from viola lessons. Try them online today.</p>
								<p class="learn_more"><a href="/instruments/piano"><button class="more_btn">MORE DETAILS</button></a></p>
							</div>
						</div>
					</div>
					
					
				</div>
			</div>
		</section>
       <section class="py-5 text-center position-relative riskfreetrial">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-xs-12 col-sm-12 col-xl-12 col-xxl-12">
						<div class="heading-title">
							<h2 class="text-center mt-3 mb-2 heading fs-2">Ready to get started with a <span class="purple">RISK-FREE</span>trial lesson?</h2>
							<a href="#" class="my-3"><button class="btn-blue mt-4">GET STARTED TODAY</button></a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="teachers-section py-2">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 col-xl-12 col-xxl-12">
						<div class="featured_logos lightgray text-center text-uppercase weight300 mt-3">Teachers Featured in</div>
						<div class="row logos_wrapper mt-2">
							<ul class="home_logos frame">
								<li><a class="logo_item billboard">Billboard</a></li>
								<li><a class="logo_item rollingstone">Rolling Stone</a></li>
								<li><a class="logo_item pianist">Pianist</a></li>
								<li><a class="logo_item guitarplayer">Guitar Player</a></li>
								<li><a class="logo_item latimes">LA Times</a></li>
								<li><a class="logo_item nytimes">New York Times</a></li>
								<li><a class="logo_item wb">WB network</a></li>
								<li><a class="logo_item fox5">Fox 5</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>

@endsection