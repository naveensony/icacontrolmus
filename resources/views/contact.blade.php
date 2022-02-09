@extends('layouts.newapp')
@section('title') Musika Music Teachers  @endsection
@section('content')
<section class="banner contact-us">
            <div class="container">
                <div class="row">
                    <div class="banner_content text-center text-light">
                        <h1 class="text-center text-dark">Contact Us</h1>
                        <p class="mt-3 fs-5 text-dark">Because we know music. We are the nation's premiere music teacher network serving 2643 cities across America.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="strip-line">
            <span class="color_divider bg_blue"></span>
            <span class="color_divider bg_green"></span>
            <span class="color_divider bg_purple"></span>
            <span class="color_divider bg_orange"></span>
            <span class="color_divider bg_yellow"></span>
        </section>
        <section class="contact-content py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-xl-6 col-xxl-6">
                        <div class="info-title py-2 border-bottom border-1 bd-example mb-3">
                            <h4 class="lightgray">How can we help you today?</h4>
                        </div>
                        <form class="need-validation">
                            <div class="row mb-3">
                                <label class="col-sm-4 col-xs-12 col-form-label text-end fw-bold">I am: *</label>
                                <div class="col-sm-8 col-xs-12">
                                    <select class="form-select form-control rounded-0 shadow-none" aria-label="Default select example">
                                        <option selected>Interested in Music Lessons Info</option>
                                        <option value="1">Interested in Teaching</option>
                                        <option value="2">a Current Musika Teacher</option>
                                        <option value="3">a Current Musika Student</option>
                                        <option value="3">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-xs-12 col-form-label text-end fw-bold">I want lessons on: *</label>
                                <div class="col-sm-8 col-xs-12">
                                    <select class="form-select form-control rounded-0 shadow-none">
                                        <option value="" selected="selected"> </option>
                                        <option value="Piano">Piano</option>
                                        <option value="Guitar">Guitar</option>
                                        <option value="Voice">Voice</option>
                                        <option value="Violin">Violin</option>
                                        <option value="Flute">Flute</option>
                                        <option value="Cello">Cello</option>
                                        <option value="Clarinet">Clarinet</option>
                                        <option value="Saxophone">Saxophone</option>
                                        <option value="Drums">Drums</option>
                                        <option value="Trombone">Trombone</option>
                                        <option value="Trumpet">Trumpet</option>
                                        <option value="Viola">Viola</option>
                                        <option value="Bass Guitar">Bass Guitar</option>
                                    </select>
                                </div>
                            </div>
							<div class="row mb-3">
                                <label class="col-sm-4 col-xs-12 col-form-label text-end fw-bold">I'm also interested in: (optional)</label>
                                <div class="col-sm-8 col-xs-12">
                                    <select class="form-select form-control rounded-0 shadow-none">
                                        <option value="" selected="selected"> </option>
                                        <option value="Piano">Piano</option>
                                        <option value="Guitar">Guitar</option>
                                        <option value="Voice">Voice</option>
                                        <option value="Violin">Violin</option>
                                        <option value="Flute">Flute</option>
                                        <option value="Cello">Cello</option>
                                        <option value="Clarinet">Clarinet</option>
                                        <option value="Saxophone">Saxophone</option>
                                        <option value="Drums">Drums</option>
                                        <option value="Trombone">Trombone</option>
                                        <option value="Trumpet">Trumpet</option>
                                        <option value="Viola">Viola</option>
                                        <option value="Bass Guitar">Bass Guitar</option>
                                    </select>
                                </div>
                            </div>
                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-4 col-xs-12 text-end fw-bold">Who is interested in Lessons?</legend>
                                <div class="col-sm-8 col-xs-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Child" id="Child" value="option1" />
                                        <label class="form-check-label" for="Child">
                                            Child
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="Adult" value="option2" />
                                        <label class="form-check-label" for="Adult">
                                            Adult
                                        </label>
                                    </div>
									<div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="Both" value="option2" />
                                        <label class="form-check-label" for="Both">
                                            Both
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
							<div class="row mb-3">
								 <label class="col-sm-4 col-xs-12 col-form-label text-end fw-bold">Name: *</label>
								<div class="col-sm-4 col-xs-6">
									<input type="text" class="form-control rounded-0 shadow-none">
									<label class="label-fs">First</label>
								</div>
								<div class="col-sm-4 col-xs-6">
									<input type="text" class="form-control rounded-0 shadow-none">
									<label class="label-fs">Last</label>
								</div>
							</div>
							<div class="row mb-3">
                                <label class="col-sm-4 col-xs-12 col-form-label text-end fw-bold">Email: *</label>
                                <div class="col-sm-8 col-xs-12">
								  <input type="email" class="form-control rounded-0 shadow-none" required>
                                </div>
                            </div>
							<div class="row mb-3">
                                <label class="col-sm-4 col-xs-12 col-form-label text-end fw-bold">Zip Code: *</label>
                                <div class="col-sm-8 col-xs-12">
								  <input type="text" class="form-control rounded-0 shadow-none" required>
								  <label class="label-fs">Enter 5 digits.    <span>Currently Used: 0 digits.</span></label>
                                </div>
                            </div>
							<div class="row mb-3">
                                <label class="col-sm-4 col-xs-12 col-form-label text-end fw-bold">Telephone: *</label>
                                <div class="col-sm-8 col-xs-12">
								  <input type="tel" class="form-control rounded-0 shadow-none" required>
                                </div>
                            </div>
							<div class="row mb-3">
                                <label class="col-sm-4 col-xs-12 col-form-label text-end fw-bold">How Can We Help You?</label>
                                <div class="col-sm-8 col-xs-12">
								  <textarea  class="form-control rounded-0 shadow-none"></textarea>
								   <label class="label-fs">Maximum of 800 characters.<span>Currently Used: 0 characters.</span></label>
                                </div>
                            </div>
							<div class="border-bottom w-100 my-2"></div>
							<p class="text-end fw-bold">Please check the box below. *</p>
                            <button type="submit me-auto" class="btn btn-secondary px-4 rounded-0 float-end mt-2">Sumbit</button>
                        </form>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 col-xl-6 col-xxl-6">
						 <div class="info-title py-2 mb-3">
                            <h4 class="lightgray">What we do for you</h4>
							<ul class="list-unstyled">
								<li><i class="far fa-check-square purple"></i> Email you our lesson rates and pricing.</li>
								<li><i class="far fa-check-square purple"></i> Call you to discuss setting up your risk-free trial.</li>
								<li><i class="far fa-check-square purple"></i> Answer your questions about music lessons.</li>
							</ul>
							<div class="right_divider half-margins position-relative"><i class="fas fa-star"></i></div>
                        </div>
						 <div class="info-title py-2 mb-3">
                            <h4 class="lightgray">Phone & Hours</h4>
							<ul class="list-unstyled">
								<li><i class="fas fa-phone-alt purple"></i>  Call us toll free: 1 (877) 687-4524</li>
								<li><i class="far fa-clock purple"></i> Phone hours: Mon-Fri 9:00am to 5:00pm EST</li>
							</ul>
							<div class="right_divider half-margins position-relative"><i class="fas fa-star"></i></div>
                        </div>
						 <div class="info-title py-2 mb-3">
                            <h4 class="lightgray">Lesson Locations</h4>
							<ul class="list-unstyled">
								<li><i class="far fa-check-square purple"></i>  In Home, In Studio or Online</li>
								<li><i class="fas fa-user purple"></i>  3000+ teachers servicing 10,000 towns/cities across America. Inquire today!</li>
							</ul>
							<div class="right_divider half-margins position-relative"><i class="fas fa-star"></i></div>
                        </div>
						<div class="info-title py-2 mb-3">
                            <h4 class="lightgray">Your Privacy</h4>
							<ul class="list-unstyled">
								<li>We value your privacy and never sell or share your information.</li>
								<div class="row mt-5">
									<div class="col-md-4">
										<a href="#"><img src="images/blue-seal-200-42-bbb-98940.png"></a>
									</div>
									<div class="col-md-4">
										<a href="#"><img src="images/truste.jpg"></a>
									</div>
									<div class="col-md-4">
										<a href="#"><img src="images/comodo_secure_100x85_white.png"></a>
									</div>
								</div>
							</ul>
                        </div>
					</div>
                </div>
            </div>
        </section>


@endsection