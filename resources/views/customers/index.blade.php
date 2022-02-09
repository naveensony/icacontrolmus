@include('layouts.layout_control.app')
	<div class="grid_12">
        <form method="get" action="{{route('control.control.customer')}}">
           
<table width="800" border="0">
	<tr>
    	<td width="73">Search</td>
        <td width="219"><input type="text" name="searchwords" id="searchwords" value="{{$vars['searchwords']}}" /></td>
        <td width="494"><input type="submit" name="button" id="button" value="Submit" /></td>
    </tr>
    
</table>
</form>
<table width="987" border="0" cellpadding="4" cellspacing="2">
	<tr>
    	<th width="164">Account #</th>
        <th width="266">Name</th>
        <th width="231">Email</th>
        <th width="141">Last Updated</th>
        <th width="151">Created</th>
        
    </tr>
@foreach($vars['customers'] as $customer) 
  <tr>
	    <td>{{$customer->customers_id}}</td>
    <td><a href="customers_controller/edit/{{$customer->customers_id}}">{{$customer->firstname}} {{$customer->lastname}}</a></td>
        <td>{{$customer->email}}</td>
        <td>08/17/2010</td>
        <td>08/17/2010</td> 
        
  </tr>
@endforeach
</table>
     
</div>
{{$vars['customers']->appends(['searchwords' =>$vars['searchwords']])->links()}}

@include('layouts.layout_control.footer')

