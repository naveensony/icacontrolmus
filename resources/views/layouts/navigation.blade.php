@section('custom_css')
<style>
.sub-menu {
            display: none;
        }
		.sub-menu li {
			list-style-type: none;
		}
        .sub-menu li a {
            padding: 7px 10px 7px 10px;
            padding-left: 52px;
            color: #a7b1c2;
            font-weight: 600;
            position: relative;
            display: block;
            text-decoration: none;
        }
        .sub-menu li a:hover {
            color: #fff;
        }
	.pro-status{
		background-color: red;
		margin-left: 10px;
		margin-right: 2px;
		padding-left: 3px;
		padding-right: 4px;
	}
</style>	
@endsection
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element" style="text-align: center;">
                    <a href="{{url('/')}}">
						@if(Auth::check() )
@php
	$avatar=App\Models\User::with('teacherId')->where('id',Auth::id())->first();
	$newavt=str_replace("@{{THUMBNAILMASK}}","avatarSize",$avatar->teacherId->avatar);
@endphp
						<span>
                            <img alt="image" width="116px"  class="img-circle" src="http://ceo.musikalessons.com/uploads/TeachersModel/{{$avatar->teacherId->id}}/avatar/{{$newavt}}">
                            <!--<img alt="image" width="116px"  class="img-circle" src="{{url('/public/thumbnail')}}/{{$newavt}}">-->
                         </span>
						  <span class="block m-t-xs">
                                <a href="{{ route('account.index') }}"><strong class="font-bold"> @if(Auth::check()){{ Auth::user()->firstName }} {{ Auth::user()->lastName }}@endif</strong></a>
                        </span>
						 @else
						 <span>
                            <img alt="image"  width="116px" height="116px" class="img-circle" src="{{url('img\profile.png')}}">
                         </span>
						  <span class="block m-t-xs">
                                <a href="{{ route('account.index') }}"><strong class="font-bold"> @if(Auth::check()){{ Auth::user()->firstName }} {{ Auth::user()->lastName}}@endif</strong></a>
                        </span>
						 @endif
                    </a>
                </div>
                <div class="logo-element">
                </div>
            </li>
			
			<li class="{{ isActiveRoute('account.index') }}">
				<a href="{{ route('account.index') }}"><i class="fa fa-pencil"></i> <span class="nav-label">Account</span></a>
			</li>
			<li class="{{ isActiveRoute('paymentMethod') }}">
				<a href="{{ route('paymentMethod') }}"><i class="fa fa-pencil"></i> <span class="nav-label"><font style="color:yellow">New!</font> Payment Method</span></a>
			</li>
			<li class="{{ isActiveRoute('profile') }}">
				@if(Auth::check() )
					@php
						$user=App\Models\User::with('teacherId')->where('id',Auth::id())->first();
						$completenss=$user->teacherId->profile_completenss;
					@endphp
				@else
					@php 
						$completenss = 'Not found';
					@endphp	
				@endif	
				<a href="{{ route('profile') }}"><i class="fa fa-user-circle-o"></i> <span class="nav-label">Profile</span> @if($completenss=='Incomplete') <span class="pull-right label label-primary" style="background-color: #ff0000;">{{$completenss}}!</span> @endif</a>
			</li>
				@if(Auth::check() )
					@php
						$user=App\Models\User::with('teacherId')->where('id',Auth::id())->first();
						$sku=$user->teacherId->id;
						$cSession = curl_init(); 
						curl_setopt($cSession,CURLOPT_URL,'http://musika.reziew.com/api/1/review/list.json?sku=' . $sku .'&order=desc');
						curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
						curl_setopt($cSession,CURLOPT_HEADER, false); 
						$output=curl_exec($cSession);
						$temp = array( $sku => array( 'average' => 0 , 'count' => 0) );
						$r = json_decode($output,1);
						curl_close($cSession);
					@endphp
				@endif
			<li class="{{ isActiveRoute('review') }}">
				<a href="{{ route('review') }}"><i class="fa fa-envelope"></i> <span class="nav-label">Reviews </span> @if(isset($r['reviews']) && count($r['reviews']) < 4) <span class="pull-right label label-primary" style="background-color: #ff0000;">Low Count!</span> @elseif(!isset($r['reviews'])) <span class="pull-right label label-primary" style="background-color: #ff0000;">Low Count!</span> @endif</a>
			</li>
			<li class="{{ isActiveRoute('home') }}">
				@if(Auth::check() )
					@php
						$pros_students=App\Models\Connection::with('prospectiveStudent','instrument','pro_status')->where('teacherid',$user->teacherId->remoteTeacherId)->where('dateInitInformed','0000-00-00 00:00:00')->get();
						$cnt_stu=0;
					@endphp
					@if($pros_students->isNotEmpty())
						@foreach($pros_students as $unrstudent)	
							@if(!is_null($unrstudent->prospectiveStudent))
								@php $cnt_stu++;  @endphp
							@endif
						@endforeach
					@else
						@php $cnt_stu=0; @endphp	
					@endif		
				@endif	
				<a href="{{ route('home') }}"><i class="fa fa-users"></i> <span class="nav-label">Students </span> </a>
			</li>
			<li class="{{ isActiveRoute('viewProspective') }}">
				<a href="{{ route('searchProspective') }}"><i class="fa fa-search"></i> <span class="nav-label">Available Students</span></a>
			</li>
			<li class="{{ isActiveRoute('invoice') }}">
				<a href="{{ url('/invoice') }}"><i class="fa fa-usd"></i> <span class="nav-label">Invoices</span></a>
			</li>
			<li class="{{ isActiveRoute('new-submit-entry') }}">
				<a href="{{ route('new-submit-entry') }}"><i class="fa fa-calendar"></i> <span class="nav-label">Submit Entry</span></a>
			</li>
			 <li class="{{ isActiveRoute('trail-lesson') }}">
				<a href="{{url('/trialLesson')}}"><i class="fa fa-bullhorn"></i><span class="nav-label">Trial Lesson Indicator</span></a>
			 </li> 
			 <li class="{{ isActiveRoute('terminate-student') }}" id="is_enable">
				<a href="{{('/terminateLessons')}}"><i class="fa fa-chain-broken"></i><span class="nav-label">Student Ending Lessons</span></a>
			 </li>
			  <li class="{{ isActiveRoute('handbook') }}">
				<a href="{{ route('handbook') }}"><i class="fa fa-question-circle"></i><span class="nav-label">FAQ</span></a>
			 </li>
			 <li class="{{ (strpos($_SERVER['REQUEST_URI'], 'helpvideo'))?'active':''  }}">
				<a href="#"><i class="fa fa-file-video-o"></i> <span class="nav-label">Help Videos</span><span class="fa arrow"></span></a>
			 <ul class="sub-menu">
                    <li class="{{ isActiveRoute('requesting-student') }}"><a href="{{ route('requesting-student') }}">Requesting Students</a></li>
                    <li class="{{ isActiveRoute('intro-lesson') }}"><a href="{{ route('intro-lesson') }}">Submitting Intro Lesson</a></li>
                    <li class="{{ isActiveRoute('change-status') }}"><a href="{{ route('change-status') }}">Change Student Status</a></li>
                    <li class="{{ isActiveRoute('logging-lessons') }}"><a href="{{ route('logging-lessons') }}"> Logging Lessons</a></li>
               </ul>
            </li>
			<li class="{{ isActiveRoute('support') }}">
				<a href="{{ route('support') }}" target="_blank"><i class="fa fa-question-circle"></i><span class="nav-label">Support</span></a>
			 </li>
			<li class="{{ isActiveRoute('studentsList') }}">
				<a href="{{ route('studentsList') }}" target="_blank"><i class="fa fa-question-circle"></i><span class="nav-label">Messages</span></a>
			 </li> 
        </ul>
    </div>
</nav>
@section('scripts')
<script>
    $('.sub-menu-trigger').on('click', function () {
        $(this).parents('li').toggleClass('active');
        $(this).next('.sub-menu').slideToggle(250);
    });
</script>
@endsection