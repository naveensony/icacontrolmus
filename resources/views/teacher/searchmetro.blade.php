@include('layouts.layout_control.app')
<form id="form1" name="form1" method="post" action="{{route('control.control.searchmetrosearch')}}">
    @csrf
  Instrument:
  <select name="instrument" id="instrument">
  <option></option>

	@foreach($vars['instruments'] as $instrument)
	
		<option value="{{$instrument->instruments_id}}" {{$instrumens == $instrument->instruments_id ? 'selected' : '' }}>{{$instrument->name}}</option>
	@endforeach

  </select>
  Metro:
  <select name="metro" id="metro">
  <option></option>

    @foreach($vars['metros'] as $metro)
	
	<option value="{{$metro->metros_id}}" {{$meto == $metro->metros_id ? 'selected' : '' }}>{{$metro->name}}</option>
	
    @endforeach
  </select>
  <input type="submit" name="button" id="button" value="Submit" />
</form>
@if(isset($vars['teachers']))
<table width="200" border="1" class="table">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>&nbsp;</th>
  </tr>
@foreach($vars['teachers'] as $teacher) 
  <tr>
    <td>{{$teacher->teachers_id}}</td>
    <td><a href="/teachers_controller/edit/{{$teacher->teachers_id}}">{{$teacher->firstname}} {{$teacher->lastname}}</a></td>
    <td>&nbsp;</td>
  </tr>
@endforeach
</table>
@endif
@include('layouts.layout_control.footer')