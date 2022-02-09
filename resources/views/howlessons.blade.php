@extends('layouts.newapp')
@section('title') Musika Music Teachers  @endsection
@section('content')
<section class="banner lessonpage">
            <div class="container">
                <div class="row">
                    <div class="banner_content text-center text-light">
                        <h1 class="text-light">How Lessons Work</h1>
                        <p class="text-light mt-4">Booking a music teacher in your area is easy at Musika. Find your perfect teacher today!</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="get-started py-5">
            <div class="container">
                <h2 class="text-center mt-3 mb-2 heading">How to Get Started</h2>
                <h4 class="lightgray text-center sub-title">We make it easy for you to connect with teachers in your area.</h4>
                <div class="row mt-5">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-xl-6 col-xxl-6 mt-3" id="work1">
                        <div class="count"></div>
                        <h3 class="purple"><a class="purple">TELL</a></h3>
                        <h4 class="lightgray">Us Your Needs</h4>
                        <p class="weight400">We'll ask you a few questions so we can put you in touch with teachers in your area. You can choose to have lessons in your home, at a teacher's studio nearby, or online.</p>
                        <p>
                            <a data-toggle="modal" data-target="#yourNeedsModal">
                                <button class="btn-blue">GET STARTED</button>
                            </a>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-xl-6 col-xxl-6 mt-3 text-center" id="work1_photo">
                        <img class="img-responsive pull-right" src="images/music-lessons-3000-cities.png" />
                    </div>
                </div>
                <div class="row addpad110">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-xl-6 col-xxl-6 mt-3 text-center" id="work2_photo">
                        <img class="img-responsive" src="images/free-trial-music-lessons.png" />
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-xl-6 col-xxl-6 mt-3" id="work2">
                        <div class="count"></div>
                        <h3 class="purple"><a class="purple">TAKE</a></h3>
                        <h4 class="lightgray">A Risk-Free Trial</h4>
                        <p class="weight400">Book your trial lesson day and time directly with the teacher. If you wish to continue, simply let us know by contacting us.</p>
                    </div>
                </div>
                <div class="row addpad110">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-xl-6 col-xxl-6 mt-3" id="work3">
                        <div class="count"></div>
                        <h3 class="purple"><a class="purple">BOOK</a></h3>
                        <h4 class="lightgray">Your Teacher</h4>
                        <p class="weight400">Begin your lessons or try a different instructor. If you are not satisfied, you will not be charged and we can match you with a new teacher for another trial lesson.</p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-xl-6 col-xxl-6 mt-3 text-center" id="work3_photo">
                        <img class="img-responsive pull-right" src="images/music-lessons-book-teacher.png" />
                    </div>
                </div>
            </div>
        </section>
		<section class="overlesson py-5 text-center">
			<div class="container">
				<div class="row">
					<h3 class="text-center my-5">Over <span class="purple">2,000,000</span> lessons taught, since 2001</h3>
					<div class="fullrow col-xs-12 col-sm-4 col-md-4 col-xl-4 col-xxl-4  fadeIn" data--delay="0.2s" data--duration="2s">
						<div class="info pad_b p-4">
							<div class="info-icon">
								<i class="fas fa-calendar-alt blue"></i>
							</div>
							<div class="info-header">
								Your Lessons
							</div>
							<div class="info-details">
								<h5 class="text-center weight700">Scheduling &amp; Canceling Lessons</h5>
								<p><b>Schedule directly</b> with your instructor. Lessons can take place once per week, twice a week, every other week or on any schedule that works between you and the teacher.</p>
								<p><b>Cancel lessons directly</b> with your instructor, there is no need to call Musika.</p>
								<p><b>NOTE: Discontinuing Lessons</b> at anytime and there are no termination fees.</p>
							</div>	
						</div>
					</div>
					<div class="fullrow col-xs-12 col-sm-4 col-md-4 col-xl-4 col-xxl-4  fadeIn" data--delay="0.2s" data--duration="2s">
						<div class="info pad_b">
							<div class="info-icon">
								<i class="far fa-credit-card blue"></i>
							</div>
							<div class="info-header">
								Payment
							</div>
							<div class="info-details">
								<h5 class="text-center weight700">Hassle-Free Payment Solutions</h5>
								<p>For rates and pricing please <a href="/contact-us"><b>Contact Us</b>.</a></p>
								<p><b>For children</b> under 18 years of age, monthly charges to your credit or debit card for all lessons taken in the previous month.</p>
								<p><b>For Adults</b>, Lesson Packages: Charges are made to your debit or credit card for an eight (8) lesson package.</p>
							</div>	
						</div>
					</div>
					<div class="fullrow col-xs-12 col-sm-4 col-md-4 col-xl-4 col-xxl-4  fadeIn" data--delay="0.2s" data--duration="2s">
						<div class="info pad_b p-4">
							<div class="info-icon">
								<i class="far fa-play-circle blue"></i>
							</div>
							<div class="info-header">
								Getting Started
							</div>
							<div class="info-details">
								<h5 class="text-center weight700">Risk-Free Trial Lesson</h5>
								<p><em>“A customer oriented approach with a positive attitude toward service are the keys to our success.”</em></p>
								<p>Ready to get started? Contact us today to schedule an introductory lesson. Musika offers an easy, quick way to find the best teacher for what you want to accomplish on a schedule that works for you. To get started, fill out our simple trial lesson request form here:</p>
								<div class="text-center mt-3"><a data-target="#yourNeedsModal" data-toggle="modal"><button class="btn-blue">GET STARTED</button></a></div>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</section>
        <section class="musika-quiks py-5 worldfamous">
            <div class="container">
                <div class="row" text-center>
                    <h4 class="white weight300 text-light text-center">World famous musicians and producers from <b>The Fugees, Poison, Def Jam Records, Spike Lee, Arista Records &amp; The Guerneri Quartet</b> have chosen Musika for their child’s music education. Pretty cool, right?</h4>
                    <a href="#" class="text-center mt-3"><button class="btn-blue">GET STARTED TODAY</button></a>
                </div>
            </div>
        </section>
        <section class="featured py-5 mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-xl-12 col-xxl-12 mb-4">
                        <h2 class="text-center mt-3 mb-2 heading">Most popular instruments and locations</h2>
                    </div>
                    <div class="fullrow col-xs-12 col-sm-6 col-md-3 col-xl-3 col-xxl-3">
                        <ul class="list-unstyled featured border_r">
                            <li>
                                <a href="#">Voice Lessons San Francisco</a>
                            </li>
                            <li>
                                <a href="#">Piano Lessons Philadelphia</a>
                            </li>
                            <li><a href="#">Guitar Lessons Seattle</a></li>
                        </ul>
                    </div>
                    <div class="fullrow col-xs-12 col-sm-6 col-md-3 col-xl-3 col-xxl-3">
                        <ul class="list-unstyled featured border_r">
                            <li><a href="#">Guitar Lessons Boston</a></li>
                            <li><a href="#">Voice Lessons San Diego</a></li>
                            <li><a href="#">Guitar Lessons Miami</a></li>
                        </ul>
                    </div>
                    <div class="fullrow col-xs-12 col-sm-6 col-md-3 col-xl-3 col-xxl-3">
                        <ul class="list-unstyled featured border_r">
                            <li><a href="#">Piano Lessons New York</a></li>
                            <li><a href="#">Piano Lessons Houston</a></li>
                            <li><a href="#">Guitar Lessons Los Angeles</a></li>
                        </ul>
                    </div>
                    <div class="fullrow col-xs-12 col-sm-6 col-md-3 col-xl-3 col-xxl-3">
                        <ul class="list-unstyled featured">
                            <li><a href="#">Music Lessons New York</a></li>
                            <li><a href="#">Voice Lessons New Jersey</a></li>
                            <li><a href="#">Piano Lessons Austin</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
		<section class="about_logos py-3 text-center">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-2 col-sm-2 col-xs-12 col-xl-2 col-xxl-2">
						<img src="images/about_logo1.png" alt="VeriSign Trusted">
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12 col-xl-2 col-xxl-2">
						<img src="images/about_logo2.png" alt="IntelliCorp">
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12 col-xl-2 col-xxl-2">
						<img src="images/about_logo3.png" alt="better business bureau">
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12 col-xl-2 col-xxl-2">
						<img src="images/about_logo4.png" alt="MTNA">
					</div>
					<div class="col-md-2 col-sm-2 col-xs-12 col-xl-2 col-xxl-2">
						<img src="images/about_logo5.png" alt="Norton Secured">
					</div>
				</div>
			</div>
		</section>

        @endsection