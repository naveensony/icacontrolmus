@extends('layouts.app')

@section('title')
Home
@endsection
@section('content')
<style>
 
.wrapper-content a{
	text-decoration: underline;
}

h5 small, .h5 small, h5 .small, .h5 .small{
	
	font-size:80% !important;
	
}
@media screen and (min-width: 320px) and (max-width: 767px) {
	.ibox-title h5 {
		font-size: 15px;
	}
}
.headingSpace{
	padding-left:5px;
}

.personal tr td:nth-child(1) {
    width: 25% !important;
}
.set-width tr td:nth-child(1) {
    width: 20% !important;
}
@media screen and (min-width: 768px) and (max-width: 1024px) {
	.col-sm-2 {
		width: 25%;
	}
}
</style>
<div class="wrapper wrapper-content">
<div class="row paddingzero">
<div class="col-lg-10">
@if (session('status'))
                    <div class="alert alert-success">
                        {!! session('status') !!}
                    </div>
			@endif 
</div>	


<div class="col-lg-10">
@if (session('thaeading') && session('tmsg') )
                    <div class="alert alert-info">
                        <h3>{{session('thaeading')}}</h3>
						<p>{!! session('tmsg') !!}</p>
                    </div>
@endif 
</div>	


		
</div>			

  @if($admission->isNotEmpty())
  <div class="row paddingzero">
      <div class="col-lg-10">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5><span style="color:#00aeef;"> Registered Students </span> <small> The following Musika students are currently registered as having music lessons with you.</small> </h5>
               <div class="ibox-tools">
                  <a class="collapse-link">
                  <i class="fa fa-chevron-up"></i>
                  </a>
               </div>
            </div>
            <div class="ibox-content">
               <div class="table-responsive">
                  <table class="table table-striped">
                     <thead>
                        <tr>
                           <th width="25%">Name</th>
                           <th width="20%" class="inst">Instrument</th>
                           <th >Entries</th>
                           <th class="inst"></th>
                           <!--<th>Action</th>-->
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($admission as $students)	
                        <tr>
                           <td>
                              @php
                              $row=(!empty($students->name->lastName)?($students->name->packageStudent=='Y'&&$students->name->lastName[0]!='-'?'- ':"").$students->name->firstName."  ":"").$students->name->lastName;
                              @endphp
                              <a href="viewStudent/{{$students->name->studentId}}" data-toggle="tooltip" data-placement="bottom" title="View profile for student {{$row}}"> {{$row}}</a>
                           </td>
                           <td class="inst">
                              {{ $students->instName->instrumentName }}
                           </td>
                           <td><a href="invoice/{{$students->admissionId}}" title="View entries for student {{$row}}">View  Entries</a></td>
                           <td class="inst"></td>
                           <!--<td class="seb"><div class="btn-group">
                              <button class="btn btn-info btn-xs" type="button">Submit Entry</button>
                              
                              </div></td>-->
                        </tr>
                        @endforeach			
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   @endif
   @if($awaiting_students->isNotEmpty())
   <div class="row paddingzero">
      <div class="col-lg-10">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5><span style="color:#00aeef;">Students Awaiting Registration (Intro lesson taught) </span><small>  The following Musika students are confirmed by you to have been taught an introductory lesson, but are not yet officially registered. Musika will continue to contact the parent/student regarding registration until they have officially registered with you. </small></h5>
               <div class="ibox-tools">
                  <a class="collapse-link">
                  <i class="fa fa-chevron-up"></i>
                  </a>
               </div>
            </div>
            <div class="ibox-content">
               <div class="table-responsive">
                  <table class="table table-striped">
                     <thead>
                        <tr>
                           <th width="25%" >Name</th>
                           <th width="20%" class="inst">Instrument</th>
                           <th class="col-md-4">Registration Status</th>
                           <th class="col-md-2"> Matched Date </th>
                           <!--<th>Action</th>-->
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($awaiting_students as $awaitingstudent)	
                        @if(!is_null($awaitingstudent->prospectiveStudent))									
                        <tr>
                           <!--<td><a href="viewNewStudent/{{$awaitingstudent->prospectiveId}}">{{$awaitingstudent->prospectiveStudent->firstName}} {{$awaitingstudent->prospectiveStudent->lastName}}</a></td>-->
                           <td>
                              @php
                              $row1=(!empty($awaitingstudent->prospectiveStudent->lastName)?($awaitingstudent->prospectiveStudent->packageStudent=='Y'&&$awaitingstudent->prospectiveStudent->lastName[0]!='-'?'- ':"").$awaitingstudent->prospectiveStudent->firstName."  ":"").$awaitingstudent->prospectiveStudent->lastName;
                              @endphp
                              <a href="viewAwaitingStudent/{{$awaitingstudent->prospectiveStudent->studentId}}" data-toggle="tooltip" data-placement="bottom" title="View profile for student {{$row1}}">{{$row1}}</a>
                           </td>
                           <td class="inst">{{$awaitingstudent->instrument->instrumentName}}</td>
                           <td class="status">@php
                              if(isset($awaitingstudent->pro_status))
                              {
                              $ec=str_replace("Teacher","I",$awaitingstudent->pro_status->statusDesc);
                              }
                              else
                              {
                              $ec= "&mdash;";
                              }
                              @endphp
                              {{$ec}}
                           </td>
						   <td>{{date('Y-m-d',strtotime($awaitingstudent->dateMade))}} </td>
                           <!--<td><div class="btn-group">
                              <button class="btn btn-info btn-xs" type="button">Submit Entry</button>
                              
                              </div></td>-->
                        </tr>
                        @endif
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   @endif
   @if($prospective_students->isNotEmpty())
   <div class="row paddingzero">
			
      <div class="col-lg-10">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5><span style="color:#00aeef;">Prospective Student </span><small> The following Musika students are not yet confirmed as having been taught an introductory lesson by you. </small></h5>
               <div class="ibox-tools">
                  <a class="collapse-link">
                  <i class="fa fa-chevron-up"></i>
                  </a>
               </div>
            </div>
            <div class="ibox-content">
               <div class="table-responsive">
                  <table class="table table-striped">
                     <thead>
                        <tr>
                           <th >Name</th>
                           <th class="inst">Instrument</th>
                           <th width="45%">Status</th>
                           <th >Matched Date</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($prospective_students as $unrstudent)	
                        @if(!is_null($unrstudent->prospectiveStudent))									
                        <tr>
                           <!--<td><a href="viewNewStudent/{{$unrstudent->prospectiveId}}">{{$unrstudent->prospectiveStudent->firstName}} {{$unrstudent->prospectiveStudent->lastName}}</a></td>-->
                           <td>
                              @php
                              $row2=(!empty($unrstudent->prospectiveStudent->lastName)?($unrstudent->prospectiveStudent->packageStudent=='Y'&&$unrstudent->prospectiveStudent->lastName[0]!='-'?'- ':"").$unrstudent->prospectiveStudent->firstName."  ":"").$unrstudent->prospectiveStudent->lastName;
                              @endphp
                              <a href="viewNewStudent/{{$unrstudent->prospectiveStudent->studentId}}" data-toggle="tooltip" data-placement="bottom" title="View profile for student {{$row2}}"  style="word-break: break-word;">{{$row2}}</a>
                           </td>
                           <td class="inst">{{$unrstudent->instrument->instrumentName}}</td>
                           <td class="status">
							@if(isset($unrstudent->pro_status))
								@if($unrstudent->pro_status->statusId==4)
									I spoke to student/parent and set up a first lesson date for ({{$unrstudent->intro_sh_date}})
								@else
									{{ str_replace("Teacher","I",$unrstudent->pro_status->statusDesc)}}
								@endif
							@else
                              <span style="color:red;">*Unknown</span>
							@endif
							@if(isset($unrstudent->pro_status))
                              <a href="{{url('getStatus').'?sid='.$unrstudent->pro_status->statusId.'&pid='.$unrstudent->prospectiveStudent->studentId}}">Change Status</a>
							@else
                              <a href="{{url('getStatus').'?pid='.$unrstudent->prospectiveStudent->studentId}}">Change Status</a>
							@endif	
							  
                           </td>
							<td class="status">
							{{date('Y-m-d',strtotime($unrstudent->dateMade))}}
                             
                           </td>
						   
                           <!--<td><div class="btn-group">
                              <button class="btn btn-primary btn-xs" type="button">Change Status</button>
                              
                              </div></td>-->
                        </tr>
                        @endif
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   @endif
</div>
@endsection

