@extends('layouts.newapp')
@section('title') Musika Music Teachers  @endsection
@section('content')
<section class="banner faq">
            <div class="container">
                <div class="row">
                    <div class="banner_content text-center text-light">
                        <h1 class="text-center">FREQUENTLY ASKED QUESTIONS</h1>
                    </div>
                </div>
            </div>
        </section>
		<section class="faq-content py-4">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 col-xl-12 col-xxl-12 mb-4">
						<div class="weight700 section_name mt-5 pt-2">
							<h4 class="text-start">About <span class="purple">Musika</span></h4>
						</div>
						<div class="accordion accordion-flush" id="accordionFlushExample">
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-headingOne">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
									What services does Musika provide?
								</button>
								</h2>
								<div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
								<div class="accordion-body fs-6">Musika is a resource for individuals seeking qualified independent music teachers who offer lessons for children and adults of all ages and skill levels. Lessons can take place either in a student’s home, in a teacher’s private studio, any public space the teacher has access to, or online via a video chat service such as Skype. Teachers work individually with their students to create lesson plans they feel will work best for each student’s goals.</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-headingTwo">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
									Who is the founder of Musika?
								</button>
								</h2>
								<div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
								<div class="accordion-body fs-6">Musika was founded by <a href="#">E. Scott Brady</a> </div>
								</div>
							</div>
						<div class="weight700 section_name mt-5 pt-2">
							<h4 class="text-start">Privacy and  <span class="purple">Security</span></h4>
						</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-heading9">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse9" aria-expanded="false" aria-controls="flush-collapse9">Will Musika ever release my information to a third party?
								</button>
								</h2>
								<div id="flush-collapse9" class="accordion-collapse collapse" aria-labelledby="flush-heading9" data-bs-parent="#accordionFlushExample">
								<div class="accordion-body fs-6">Musika LLC is a Participant in the TRUSTe Privacy Seal Program. TRUSTe is an independent organization whose mission is to advance privacy and trust in the networked world. This Web site has agreed to have its privacy practices monitored for compliance by TRUSTe and will never give or sell your information to a third party.
								</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-heading10">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse10" aria-expanded="false" aria-controls="flush-collapse10">Is the Musika Website Secure?
								</button>
								</h2>
								<div id="flush-collapse10" class="accordion-collapse collapse" aria-labelledby="flush-heading10" data-bs-parent="#accordionFlushExample">
									<div class="accordion-body fs-6">Musika uses VeriSign sealed SSL encryption to protect your information. We want your lessons to be an enjoyable experience and part of that is making sure all your personal information is secure.
									</div>
								</div>
							</div>
						<div class="weight700 section_name mt-5 pt-2">
							<h4 class="text-start">Getting Started, Intro Lesson,  <span class="purple">Lesson Rates and Registration Process</span></h4>
						</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-heading11">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse11" aria-expanded="false" aria-controls="flush-collapse11">Will Musika ever release my What is the process to sign-up?
								</button>
								</h2>
								<div id="flush-collapse11" class="accordion-collapse collapse" aria-labelledby="flush-heading11" data-bs-parent="#accordionFlushExample">
								<div class="accordion-body fs-6"> The way to get started is to fill out a <a data-target="#yourNeedsModal" data-toggle="modal" style="cursor:pointer">trial lesson request form</a>. This will give us your availability for lessons, as well as any other special requests you may have about the kind of teacher you are looking for. If you have browsed the profiles of <a href="#">teachers in your area</a> and you are particularly interested in working with a specific teacher, you can put their name in the “special requests” box and we will send your request to that teacher and others teachers in your area that match your needs, in case the teacher is unavailable. Your teacher will call you directly to set up a risk-free trial lesson.
								</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-heading12">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse12" aria-expanded="false" aria-controls="flush-collapse12">ICan a teacher come to my home to teach?
								</button>
								</h2>
								<div id="flush-collapse12" class="accordion-collapse collapse" aria-labelledby="flush-heading12" data-bs-parent="#accordionFlushExample">
									<div class="accordion-body fs-6">Yes! Most of our students have lessons in their homes.</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-heading3">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapse3">Where are teacher's studios located?
								</button>
								</h2>
								<div id="flush-collapse3" class="accordion-collapse collapse" aria-labelledby="flush-heading3" data-bs-parent="#accordionFlushExample">
									<div class="accordion-body fs-6">Teachers in the network have their own private studio spaces which can be in their own homes, in space they rent in other establishments such as schools, churches, or music stores, or in practice spaces they have access to. When you request a teacher you can let us know how far you are able to travel to get to a teacher’s studio and we will connect you with teachers within your radius. 
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-heading4">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">What are your lesson prices?
								</button>
								</h2>
								<div id="flush-collapse4" class="accordion-collapse collapse" aria-labelledby="flush-heading4" data-bs-parent="#accordionFlushExample">
									<div class="accordion-body fs-6">You can find the rates for in-person lessons in your area by searching your zip code <a href="#">here</a>. We are also always happy to discuss our rates with you over the phone, at 877-687-4524.	
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-heading5">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapse5">What is the registration fee?
								</button>
								</h2>
								<div id="flush-collapse5" class="accordion-collapse collapse" aria-labelledby="flush-heading5" data-bs-parent="#accordionFlushExample">
									<div class="accordion-body fs-6">There is no registration fee.</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-heading6">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse6" aria-expanded="false" aria-controls="flush-collapse6">Can I meet the teacher to be sure I like them?
								</button>
								</h2>
								<div id="flush-collapse6" class="accordion-collapse collapse" aria-labelledby="flush-heading6" data-bs-parent="#accordionFlushExample">
									<div class="accordion-body fs-6">Definitely! We want you to be comfortable and happy with your teacher. If for any reason you feel it's not the best match, the trial lessons will be free of charge.
									</div>
								</div>
							</div>


						<div class="weight700 section_name mt-5 pt-2">
							<h4 class="text-start">Our <span class="purple">Students</span></h4>
						</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-heading13">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse13" aria-expanded="false" aria-controls="flush-collapse13">What is the right age to start music lessons?
								</button>
								</h2>
								<div id="flush-collapse13" class="accordion-collapse collapse" aria-labelledby="flush-heading13" data-bs-parent="#accordionFlushExample">
								<div class="accordion-body fs-6"> Music can be a lifelong hobby, passion, or even career so getting kids started early is great! That being said, certain instruments are better suited for older children due to the physical development required to play comfortably. We accept students as young as 3 for piano and violin lessons, although if younger children have the attention span to concentrate for a 30 minute lesson it is possible to start earlier. Wind instruments need to be started a bit later, around 8 or 9 years old, and we strongly recommend waiting until the age of 11 or 12 to start formal vocal training. You can read more about age recommendations and other aspects of specific instruments under the “Instruments” tab at the top of the page. 
								</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-heading30">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse30" aria-expanded="false" aria-controls="flush-collapse30">Can an adult with no previous experience still begin music lessons?
								</button>
								</h2>
								<div id="flush-collapse30" class="accordion-collapse collapse" aria-labelledby="flush-heading30" data-bs-parent="#accordionFlushExample">
									<div class="accordion-body fs-6">Absolutely! Many of our students are beginning adults and we do not require any previous experience to start lessons. There’s no time like the present to start something 	new and you’re never too old to pick up a new skill!
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-heading14">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse14" aria-expanded="false" aria-controls="flush-collapse14">Do I need to be present for my child’s lesson?
								</button>
								</h2>
								<div id="flush-collapse14" class="accordion-collapse collapse" aria-labelledby="flush-heading14" data-bs-parent="#accordionFlushExample">
									<div class="accordion-body fs-6">We do require an adult over the age of 18 to be present if a teacher is coming to your home. Adults do not need to be in the room, but they do need to be on the premises.
									</div>
								</div>
							</div>
						<div class="weight700 section_name mt-5 pt-2">
							<h4 class="text-start"><span class="purple">Teachers</span></h4>
						</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-heading15">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse15" aria-expanded="false" aria-controls="flush-collapse15">How do I become a lesson provider with Musika?
								</button>
								</h2>
								<div id="flush-collapse15" class="accordion-collapse collapse" aria-labelledby="flush-heading15" data-bs-parent="#accordionFlushExample">
								<div class="accordion-body fs-6"> We are always looking for qualified teachers all over the country to join our network! <a href="#">Get started here</a>.	
								</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-heading16">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse16" aria-expanded="false" aria-controls="flush-collapse16">Are your teachers independent contractors or employees?
								</button>
								</h2>
								<div id="flush-collapse16" class="accordion-collapse collapse" aria-labelledby="flush-heading16" data-bs-parent="#accordionFlushExample">
									<div class="accordion-body fs-6">All of Musika’s teachers are independent contractors which gives them the complete freedom to make their own schedules and come up with their own lesson plans.
									</div>
								</div>
							</div>
						<div class="weight700 section_name mt-5 pt-2">
							<h4 class="text-start">Getting an <span class="purple">Instrument</span></h4>
						</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-heading17">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse17" aria-expanded="false" aria-controls="flush-collapse17">Where can I rent or purchase an instrument?
								</button>
								</h2>
								<div id="flush-collapse17" class="accordion-collapse collapse" aria-labelledby="flush-heading17" data-bs-parent="#accordionFlushExample">
								<div class="accordion-body fs-6">Since we are a national company it is difficult for us to make recommendations for individual towns. Once you have a teacher, however, he or she can help you find the best option for your skill level and budget.	               
								</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-heading18">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse18" aria-expanded="false" aria-controls="flush-collapse18">What features should I look for in a digital piano/keyboard?
								</button>
								</h2>
								<div id="flush-collapse18" class="accordion-collapse collapse" aria-labelledby="flush-heading18" data-bs-parent="#accordionFlushExample">
									<div class="accordion-body fs-6">The most important difference between keyboards is whether it has “weighted keys” or not. A weighted-key keyboard will feel similar to a real piano, while a cheap keyboard without weighted keys will be more like a toy. Most weighted keyboards start around $300-$400 and have 88 keys, while non-weighted keyboards are around $150 and usually have only 61 keys. We strongly recommend a keyboard with weighted keys. A non-weighted keyboard may be suitable for a very young child in the early stages of their musical development, but it is worth the extra cost to purchase a keyboard that has weighted keys. Weighted keys are less important for voice students, but they are still a nice feature to have, especially if the student decides to start learning piano later on.
									</div>
								</div>
							</div>
						<div class="weight700 section_name mt-5 pt-2">
							<h4 class="text-start">Your <span class="purple">Lessons</span></h4>
						</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-heading19">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse19" aria-expanded="false" aria-controls="flush-collapse19">What will I learn at my lessons?
								</button>
								</h2>
								<div id="flush-collapse19" class="accordion-collapse collapse" aria-labelledby="flush-heading19" data-bs-parent="#accordionFlushExample">
									<div class="accordion-body fs-6">There are a wide variety of things students can learn depending on what direction they want to take their lessons in. We want you to get the most out of your lessons, so our teachers create customized lesson plans for each student in order to accomplish individual goals. Common topics covered are technique for your instrument, warm-up and technical exercises, music theory, sight reading, and applying concepts to pieces of music that the student enjoys.             
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-heading20">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse20" aria-expanded="false" aria-controls="flush-collapse20">How long until I see some results?
								</button>
								</h2>
								<div id="flush-collapse20" class="accordion-collapse collapse" aria-labelledby="flush-heading20" data-bs-parent="#accordionFlushExample">
									<div class="accordion-body fs-6">Putting a timeline on learning a musical instrument is difficult because everyone learns a bit differently and at their own pace. Most beginners will be able to play simple pieces within a few weeks if they are practicing consistently, but for many people learning to play an instrument or to sing is a lifelong pursuit. Even professionals often continue taking lessons as there is always something new to learn or get better at!
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-heading21">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse21" aria-expanded="false" aria-controls="flush-collapse21">How often do lessons occur?
								</button>
								</h2>
								<div id="flush-collapse21" class="accordion-collapse collapse" aria-labelledby="flush-heading21" data-bs-parent="#accordionFlushExample">
									<div class="accordion-body fs-6">Since scheduling is done directly with your instructor time between lessons can be flexible, but we recommend one lesson per week. This gives students enough time to practice and absorb concepts taught in that week’s lesson, but not enough time to forget them!
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-heading22">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse22" aria-expanded="false" aria-controls="flush-collapse22">Can students schedule lessons every other week?
								</button>
								</h2>
								<div id="flush-collapse22" class="accordion-collapse collapse" aria-labelledby="flush-heading22" data-bs-parent="#accordionFlushExample">
									<div class="accordion-body fs-6">As long as your instructor has agreed to a biweekly schedule it is fine with us.     
									</div>
								</div>
							</div>
						<div class="weight700 section_name mt-5 pt-2">
							<h4 class="text-start">Lessons <span class="purple">Cancellation</span></h4>
						</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-heading23">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse23" aria-expanded="false" aria-controls="flush-collapse23">How do I cancel a scheduled lesson?
								</button>
								</h2>
								<div id="flush-collapse23" class="accordion-collapse collapse" aria-labelledby="flush-heading23" data-bs-parent="#accordionFlushExample">
								<div class="accordion-body fs-6">Since all scheduling is done directly with your teacher, all you need to do is contact him or her the day before your lesson to cancel for that week. As long as your lesson is cancelled at least 24 hours in advance it will not be charged (same day cancellations are charged) for that day and you can arrange a time to make-up the lesson with your teacher if you both decide. That's up to you. 
								</div>
								</div>
							</div>
						<div class="weight700 section_name mt-5 pt-2">
							<h4 class="text-start">Gift <span class="purple">Certificates</span></h4>
						</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-heading24">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse24" aria-expanded="false" aria-controls="flush-collapse24">Does Musika offer gift certificates?
								</button>
								</h2>
								<div id="flush-collapse24" class="accordion-collapse collapse" aria-labelledby="flush-heading24" data-bs-parent="#accordionFlushExample">
								<div class="accordion-body fs-6">Yes we do! Gift certificates can be purchased in packages of 4, 6, or 8 lessons and can be redeemed at any time. We can only process gift card requests over the phone, so to purchase one call us toll-free at (877) 687-4524. Once we’ve processed your gift card, you’ll receive a certificate via email in .pdf format. 
								</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-heading25">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse25" aria-expanded="false" aria-controls="flush-collapse25">Can I get a refund for my gift certificate?
								</button>
								</h2>
								<div id="flush-collapse25" class="accordion-collapse collapse" aria-labelledby="flush-heading25" data-bs-parent="#accordionFlushExample">
								<div class="accordion-body fs-6">In the rare event that we are unable to find an available teacher for a student trying to redeem a gift card we will refund the purchase in full. Please contact our accounting department for all refund requests.
								</div>
								</div>
							</div>
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
						<div class="row logos_wrapper mt-3">
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