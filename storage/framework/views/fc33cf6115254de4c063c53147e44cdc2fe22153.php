<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Search</title>
<link href="assets/css/dialog.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' language="javascript" src="assets/js/dialog.js"></script>

<style type="text/css">
body,td,th {
	font-family: Helvetica, Arial, sans-serif;
	font-size: 12px;
}
body	{margin:1em 0;}
th	{text-align:left;}

.dialogued th	{text-align:right;}
.l	{text-align:left;}
.c	{text-align:center;}
.r	{text-align:right;}

.r0	{background-color:#c0c0c0;}
.r1	{background-color:#f0f0f0;}
.r2	{background-color:white;}
.r3	{background-color:#f8f8f8;}
.r4	{background-color:#588526;}

.btngold	{
	background-color: #fdda7c;
	border: 1px solid;
	border-color: #ffecb8 #f5c136 #f5c136 #ffecb8;
	text-decoration:none; padding:0.5ex 1ex;
	color:black;
}
a.btngold:link	{color:#400000;}
a.btngold:visited	{color:#400000;}
a.btngold:hover	{text-decoration:none; color:#401000; background-color:#e0c060;}

#main	{text-align:left; width:540px; margin:0 auto;}
#form1	{margin:2em 0;}
</style>
<script type='text/javascript' language="javascript">
function bg_alert() {alert("There are no background check details available for this teacher, please check teacher's profile.");}
function search_prospective(page)
{
	document.getElementById('page_number').value = page;
	//document.searchForm.submit();
	xajax_search_students(xajax.getFormValues('searchForm'));
}
</script>
</head>
<body>
<h1 class='r'>Prospective Student Search</h1>
<?php echo $__env->make('system.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div id='main'>
<form id="searchForm" name="searchForm" method="post" action="" onsubmit="xajax_search_students(xajax.getFormValues('searchForm')); return false;"><fieldset>
	<legend><strong>Search prospective students</strong></legend>
	<table width="100%" border="0" cellpadding="5"><tr>
		<td><input type="text" name="keywords" id="keywords" size='32' /></td>
		<td width='152'><input type="submit" name="button" id="button" value="Search" /></td>
	</tr></table>
	<div>
		<strong>Search in:</strong> 
		<label><br />
		</label>
		<!--<table width="417" border="0">
		  <tr>
		    <td width="52">Student</td>
		    <td width="97"><input type="checkbox" name="sname" id="checkbox5" />
		      Name Fields</td>
		    <td width="111"><input type="checkbox" name="scontact" id="checkbox6" />
		      Contact Fields</td>
		    <td width="139">&nbsp;</td>
	      </tr>
		  <tr>
		    <td>Payee</td>
		    <td><input type="checkbox" name="pname" id="checkbox5" />
		      Name Fields</td>
		    <td><input type="checkbox" name="pcontact" id="checkbox6" /> 
		      Contact Fields </td>
		    <td>&nbsp;</td>
	      </tr>
		  <tr>
		    <td>Teacher</td>
		    <td><input type="checkbox" name="tname" id="checkbox5" />
		      Name Fields</td>
		    <td><input type="checkbox" name="tcontact" id="checkbox6" />
		      Contact Fields</td>
		    <td><input name="page_number" type="hidden" id="page_number" value="1" /></td>
	      </tr>
	    </table> -->
	<!--	<p>
		  <label>		  <br />
		    <input name="all" type="checkbox" id="all" value="Y" checked="checked" /> 
		    All</label> 
		  <label>
		    <input name="not_connected" type="checkbox" id="not_connected" value="Y" />
		    Not Connected</label>
		  <label>
		    <input name="connected" type="checkbox" id="connected" value="Y" /> 
		    Connected</label> 
		  <label>
		    <input name="had_first" type="checkbox" id="had_first" value="Y" /> 
		    Had First Lesson</label>
	    </p> -->
		<p>Search within last: 
		  
	      <select name="duration" id="duration">
	        <option value="30" selected="selected">1 month</option>
	        <option value="90">3 months</option>
	        <option value="180">6 months</option>
            <option value="365">1 Year</option>
            <option value="730">2 Year</option>
            <option value="10000">All</option>
          </select>
		  <input name="page_number" type="hidden" id="page_number" value="1" />
		  <br />
	    </p>
    </div>
</fieldset></form>
<div id="searchResults"></div>
</div>
<div id="dialogBox"><div align="right"><a href="javascript:aDialog_close();" class='btngold' title='Close this dialog'>X</a></div><div id="dialogBoxContent"></div></div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\musikateachers\resources\views/system/prospective_search.blade.php ENDPATH**/ ?>