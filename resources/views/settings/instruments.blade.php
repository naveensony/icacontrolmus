@include('layouts.layout_control.app')
<h2>Instruments</h2>
<table width="642" class="table">
    <tr>
        <th width="62">ID</th>
        <th width="233">Isntrument</th>
        <th width="202">Status</th>
        <th width="125">&nbsp;</th>
    </tr>
@foreach($vars['instruments'] as $instrument) 
    <tr>
        <td>{{$instrument->instruments_id}}</td>
        <td>{{$instrument->name}}</td>
        <td>{{$instrument->is_active == 'Y' ? 'Active' : 'Inactive'}}</td>
        <td><input type="submit" name="button" id="button" value="Delete" onclick="alert('Action is not authorized');" /></td>
    </tr>
@endforeach
</table>

@include('layouts.layout_control.footer')