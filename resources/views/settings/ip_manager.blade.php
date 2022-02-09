@include('layouts.layout_control.app')
<h2>Access IPs</h2>
<table width="642" class="table">
    <tr>
        <th width="62">ID</th>
        <th width="233">IP Address</th>
        <th width="202">Comment</th>
        <th width="125">&nbsp;</th>
    </tr>
@foreach($vars['ips'] as $key => $ip) 
    <tr>
        
        <td>{{$ip->id}}</td>
        <td>{{$ip->ip_address}}</td>
        <td>{{$ip->comment}}</td>
        <td><input type="submit" name="button" id="button" value="Delete" onclick="alert('Action is not authorized');" /></td>
    </tr>
@endforeach
</table>

@include('layouts.layout_control.footer')