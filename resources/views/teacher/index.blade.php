@include('layouts.layout_control.app')
	<div class="grid_12">
<table width="800" border="0">
<form method="get" action="{{route('control.control.teacher')}}">
	<tr>
    	<td width="73">Search</td>
        <td width="219"><input type="text" name="searchwords" id="searchwords" value="{{$vars['searchwords']}}" /></td>
        <td width="494"><input type="submit" name="button" id="button" value="Submit" /></td>
    </tr>
    </form>   
</table>
<table width="1000" border="0" cellpadding="4" cellspacing="2" class="table">
	<tr>
    	<th width="75">Account #</th>
        <th width="150">Name</th>
        <th width="155">Email</th>
        <th width="123">City, State</th>
        <th width="268">Instruments</th>
        <th>Status</th>
        <th>&nbsp;</th>
		<th>Last Active</th>
        <th>&nbsp;</th>
        <th>Legacy</th>
		<th>&nbsp;</th>
    </tr>
    @foreach($vars['teachers'] as $teacher) 
    
  <tr>
	    <td>{{$teacher->teachers_id}}</td>
    <td><a href="teachers_controller/edit/{{$teacher->teachers_id}}">{{$teacher->firstname}} {{$teacher->lastname}}</a></td>
        <td>{{$teacher->email}}</td>
        <td>{{$teacher->city}}, {{$teacher->state}}</td>
        <td>{{$teacher->instruments}}</td>
        <td width="76">{{ucfirst($teacher->status) }}</td>
		 <td>&nbsp;</td>
		<td width="76">{{$teacher->musika_id}}</td>
        <td width="39"><a href="teachers_controller/subscriptions/{{$teacher->teachers_id}}">Subscriptions</a></td>
        <td width="40" align="center"><a href="https://system.musikalessons.com/update/control.php?page=teacher&id={{$teacher->teachers_id}}">V1</a> <a href="https://system.musikalessons.com/control/control.php?page=teachers_edit&old_id={{$teacher->teachers_id}}">V2</a></td>
		<td>Close Account</td>
  </tr>
@endforeach
</table>

</div>
{{$vars['teachers']->appends(['searchwords' =>$vars['searchwords']])->links()}}

@include('layouts.layout_control.footer')
<?php


function getlastactive($id){
	$link = mysqli_connect('localhost','musika7_musikabeta_db1','7x3qzx4ept','musika7_musikabeta_db1');
	
	$res = @mysqli_query($link, "Select dateLastLogin from User where id = $id");
	if(@mysqli_num_rows($res)==0) return 'NA';
	$row = @mysqli_fetch_array($res);
	return $row['dateLastLogin'];
	
}
?>

