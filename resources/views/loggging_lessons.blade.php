@extends('layouts.app')
@section('title')  Help Videos | Logging Lessons  @endsection
@section('content')

<script>$('.video').click(function(){this.paused?this.play():this.pause();});</script>
 
        <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-10">
                    <h2>Logging Lessons</h2>
                  
                </div>
             
            </div>
     
    <div class="wrapper wrapper-content animated fadeInRight">
	 
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                           
                        </div>
                        <div class="ibox-content text-center">
						
						
                           <video class="video" width="320" height="240" controls="controls"  src="{{url('media/Logging_Lessons_New_System_from_swf_to_mp4_same_quality.mp4')}}" type="video/mp4" poster="{{url('media/logginlesson.png')}}">
  
  Your browser does not support the video tag.
</video> 
                        </div>
                    </div>
                </div>
                </div>
				 <div class="row">
           <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                           
                      
                        </div>
                        <div class="ibox-content">
                         
                            <p>
                              Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                             </p>
                             
                               
                     
                        </div>
                    </div>
                </div>
                </div>

        </div>
     
     
  


@endsection
