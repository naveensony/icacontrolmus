@extends('layouts.newapp')
@section('title') Musika Music Teachers  @endsection
@section('content')
<section class="banner contact-us instruments border border-bottom border-3">
            <div class="container">
                <div class="row">
                    <div class="banner_content text-center text-light">
                        <h1 class="text-center purple">Instruments</h1>
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
								<p class="lightgrey same_height py-2">The perfect instrument for musicians of all ages and skill levels! From Mozart to Miley, start learning to play any kind of music today!</p>
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
								<p class="lightgrey same_height py-2">From electric to acoustic there’s no limits to what you can play on guitar. Rock out today by signing up for a risk free trial lesson.</p>
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
								<p class="lightgrey same_height py-2">Whether you want to be the next American Idol or just sing better in the shower, voice lessons are the place to start so try a risk free trial today!</p>
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
								<p class="lightgrey same_height py-2">Are you the world's next virtuoso violinist? You'll never know until you try! Sign up for a risk free trial today.</p>
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
								<p class="lightgrey same_height py-2">Wake up your neighbors with a reveille or entertain them with some smooth jazz. Get started with a risk free trial today.</p>
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
								<p class="lightgrey same_height py-2">Bb is the standard sized clarinet, but it comes in lots of other sizes too! Learn all about this great instrument by signing up for a risk free trial today.</p>
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
								<p class="lightgrey same_height py-2">From electric to upright, classical to heavy metal, the bass does it all! Get started with a risk free trial today.</p>
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
								<p class="lightgrey same_height py-2">Are you more of an alto, tenor, or baritone? Find out today with a risk free trial lesson!</p>
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
								<p class="lightgrey same_height py-2">Whether you’d like to be called a flutist or a flautist, every flute player needs lessons! Get started with a risk free trial today.</p>
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
								<p class="lightgrey same_height py-2">Even Yo-Yo Ma had to start somewhere! Get started with cello lessons today with a risk free trial.</p>
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
								<p class="lightgrey same_height py-2">There’s much more to drumming than hitting things with sticks! Find out what it takes to be a drummer with a risk free trial lesson.</p>
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
								<p class="lightgrey same_height py-2">Slide into a new skill with this fun brass instrument. Get started with a risk free trial today.</p>
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
								<p class="lightgrey same_height py-2">Slightly bigger than a violin, with a deep and smoother tone, viola is a great instrument for any student. Get started with lessons today!</p>
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