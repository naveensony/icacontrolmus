Dear @if(!$details['isPackage'])
	parents of {{$details['fullname']}}
@else
{{$details['fullname']}},
@endif
<br>
<p>
Your music teacher {{$details['tname']}} has indicated to us here at Musika that you have had your initial lesson and that all went very well. 
{{$details['tname']}} as well as the Musika staff would like to invite you to join our program. 
If you wish to continue lessons in the Musika program you <b>must</b> <a href='https://system.musikalessons.com/{{($isPackage?'adult':'')}}registration{{($isLower==1?'2':(!$isPackage&&$isLower==2?'3':''))}}.htm'>click here</a> and provide your credit card information to complete the registration process. If you'd like to view the Musika calendar, <a href='http://system.musikalessons.com/schedule.htm'>click here</a>.
If you have decided not to take lessons at this time please reply to this email
with the message \"I have decided not to continue at this time. Introductory lesson only.\" so that Musika can inform the teacher of your decision and remove you from our automated message system.
If you don't already know, I'm pleased to inform you that Musika offers the following student satisfaction guarantee:
</p>

<h3 style='text-decoration:underline;'>Student Satisfaction Guarantee/Reward Program</h3>
<ul>
	<li>If you decide to register for lessons with Musika, remember that our rates are 
	
	
	@if(!$details['isPackage'])$ {{($details['prices['price_30']']')}} a lesson for 30 minute lessons, $ {{($details['prices['price_45']']')}} a lesson for 45 minute lessons, and $ {{($details['prices['price_60']']')}}a lesson for 60 minute lessons @else
	${{($details['prices['price_30']+8*$details['prices['price_45'])}}for a package of eight 45 minute lessons + 30 minute intro lesson and $ {{($details['prices['price_30']']+8*$details['prices['price_60']']')}} for a package of eight 60 minute lessons + 30 minute intro lesson
There's no need to ask or pay the teacher directly, as Musika handles all billing and payment.
@endif</li>
	<li>We are confident about the quality of our faculty and our unique matching process. If for some reason you are not happy with our teacher after the intro lesson, there is no charge for the intro lesson. The introductory lesson is not a free lesson, but we are determined to match you with a quality instructor who meets your needs and requirements. If we have failed to match you with a member of our faculty who meets your specifications, we will not charge you for that first lesson.</li>
	<li>If you register with Musika by the end of one week after you were first notified of your match you will receive a <b>$20 credit to your account</b>.</li>
</ul>
<p>
If you have any questions please call the Musika office. <br><br>
Thank you.<br><br>
<b style='font-size:10pt; font-family:Times New Roman, serif;'>E. Scott Brady</b> | <span style='font-size:10pt; font-family:Arial, Helvetica, sans-serif; font-style:italic;'>Founder &amp; Director</span><br />
<span style='font-size:18pt; font-family:Monotype Corsiva, fantasy; color:blue;'>Musika</span> <span style='font-size:smaller;'>LLC</span><br />
<a style='font-size:10pt; font-family:Arial, Helvetica, sans-serif;' href='http://system.musikalessons.com'>system.musikalessons.com</a><br />
<span style='font-size:10pt; font-family:Arial, Helvetica, sans-serif;'>Toll-free: (877) 687-4524</span>
</p>
<br><br>
FP957678GHJNEW