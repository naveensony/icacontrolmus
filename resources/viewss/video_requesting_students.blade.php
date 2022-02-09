@extends('layouts.app')
@section('title') Help Videos | Requesting Students  @endsection
@section('content')
<style> </style>
<script>$('.video').click(function(){this.paused?this.play():this.pause();});</script>
 
        <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-10">
                    <h2>Requesting Students</h2>
                  
                </div>
             
            </div>
     
     <div class="wrapper wrapper-content animated fadeInRight">
	 
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                           
                        </div>
                        <div class="ibox-content text-center"> 
						
                           <!--<video class="video" width="240"   src="{{url('storage/media/Requesting_Students.mp4')}}" type="video/mp4" controls="controls" poster="{{url('storage/media/reqstudent.png')}}">-->
                           <video class="video" width="240"   src="{{url('storage/media/Request_Student_New_System_from_swf_to_mp4_same_quality.mp4')}}" type="video/mp4" controls="controls" poster="{{url('storage/media/reqstudent.png')}}">
  
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
