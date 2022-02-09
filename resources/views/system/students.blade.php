<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>musika :: search for students</title>

<style type="text/css">
body,td,th {
	font-family: Helvetica, Arial, sans-serif;
	font-size: 10pt;
}
body	{margin:1em 0; text-align:center;}
fieldset legend	{font-weight:bold;}

.r0	{background-color:#c0c0c0;}
.r1	{background-color:#f0f0f0;}
.r2	{background-color:white;}
.r3	{background-color:#f8f8f8;}

.r	{text-align:right;}

#main	{text-align:left; width:540px; margin:0 auto;}
#form1	{margin:2em 0;}
</style></head>

<body>
<h1 class='r'>Student Search</h1>
@include('system.head')
<div id='main'>
<form id="student_search" name="student_search" method="post" action="" onsubmit="xajax_search_students(xajax.getFormValues('student_search')); return false;">
	<fieldset><legend>Search students</legend>
	<table width="100%" border="0" cellpadding="5"><tr>
		<td width="222"><input type="text" name="keywords" id="keywords" /></td>
		<td width="152"><input type="submit" name="button" id="button" value="Search" /></td>
	</tr>
	  <tr>
	    <td colspan="2">Search Feilds: 
	      <label>
	        <input name="fields[]" type="checkbox" id="fields1" value="all" checked="checked" />
	        All
	        <input name="fields[]" type="checkbox" id="fields2" value="student" />
          Student Name
          <input name="fields[]" type="checkbox" id="fields3" value="payee" />
          Payee
          <input name="fields[]" type="checkbox" id="fields4" value="state" />
          State</label>
	      <label>
	        <input type="checkbox" name="fields[]" id="fields5" value="email" />
          Email</label></td>
	    </tr>
	</table>
	</fieldset>
</form>
<div id="searchResults"></div>
</div>
</body>
</html>
