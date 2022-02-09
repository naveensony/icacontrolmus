<style>
.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}
</style>


<div class="topnav">control.customer
  <a  @if($class == 'student') class="active" @endif href="{{route('control.control.customer')}}">Customers</a>
  <a @if($class == 'student') class="active" @endif href="{{route('control.student')}}">Students</a>
  <a @if($class == 'prospective') class="active" @endif href="{{route('control.prospective')}}">Prospective Students</a>
  <a href="">Dashboard</a>
  <a href="">Teachers</a>
  <a @if($class == 'new_application') class="active" @endif href="{{route('control.new_application')}}">Teacher Applications</a>
  <a href="">Admissions</a>
  <a @if($class == 'dashboard') class="active" @endif href="{{route('control.dashboard')}}">Tasks</a>
  <a @if($class == 'link') class="active" @endif href="{{route('control.links')}}">Links</a>
  <a href="">Preferences</a>
</div>
<div style="float:left;margin-left:3px;font-size:10pt">
    {{\Carbon\Carbon::now()->format('d.F.Y H:i:s')}}
</div>
<div style="float:right;margin-right:3px;font-size:10pt">
    {{'Logged in as '.session('user')->firstname.' '.session('user')->lastname.' '}}<a href="{{route('control.logout')}}">[ Logout ]</a>
</div>

