@include('layouts.layout_control.app')
<table class="table">
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
    </tr>
@foreach($students as $student)
<tr>
    <td>{{$student->studentId}}</td>
    <td>{{$student->firstName}}</td>
    <td>{{$student->lastName}}</td>
</tr>
@endforeach
</table>
{{$students->links()}}
@include('layouts.layout_control.footer')