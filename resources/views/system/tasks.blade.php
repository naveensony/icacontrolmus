<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>musika :: task manager</title>

<style type='text/css'>
body,td,th {
	font-family: Helvetica, Arial, sans-serif;
	font-size: 9pt;
}
body	{text-align:center; margin:0; padding:0 0 0.5in;}
#mmain	{margin:0 auto; text-align:left; max-width:1150px; overflow:auto;}

.l	{text-align:left;}
.c	{text-align:center;}
.r	{text-align:right;}
.clr	{clear:both;}

fieldset	{border:1px solid #d0d0d0; padding:0 1ex 1ex; margin-top:2em;}
fieldset legend	{font-weight:bold;}
th	{text-align:left;}

fieldset div.li	{padding:1em 1ex;}
.fl	{float:left;}
.fr	{float:right;}

.rounded	{
	border-radius:1ex;
	-webkit-border-radius:1ex;
	-moz-border-radius:1ex;
}
</style>
<script type='text/javascript'>
function toggle_visible(i) {
	var b_show = -1; if (arguments.length>1) b_show = arguments[1];
	var el = document.getElementById(i);
	el.style.display = b_show!=-1?(b_show?'':'none'):(el.style.display=='none'?'':'none');
}
window.onload = function() {
	var els = ["tblNoEntries","tblTeachersCall","tblInterviews"];
	//var el;
	var i = -1; while (++i<els.length) {
		//el = document.getElementById(els[i]);
		//el.style.display = 'none';
		toggle_visible(els[i],0);
	}
}
</script>

</head>
<body>
<h1 class='r'>Task Manager</h1>
@include('system.head')
<div id='mmain'>
<fieldset class='rounded'><legend>Inquiries</legend>
	<div class='li'><span class='fl'><a href="control.php?page=inquiries">To email</a></span><span class='fr'>{{$inquiries}}</span></div><div class='clr'></div>
	<div class='li'><span class='fl'><a href="control.php?page=ch_inquiries_call&amp;search_new=Y&amp;istate=1">To call</a></span><span class='fr'>{{$to_call}}</span></div>
	<div class='li'><span class='fl'><a href="https://control.musikalessons.com/voicemails">Voicemails</a></span></div>
</fieldset>
<fieldset class='rounded'><legend>Prospectives</legend>
	<div class='li'><span class='fl'><a href="control.php?page=send_prospectives" title='Prospectives to be sent out'>To be sent out</a></span><span class='fr'>{{$prospectives}}</span></div><div class='clr'></div>
	<div class='li'><span class='fl'><a href="control.php?page=teacher_student_request">Connection: To be made</a></span><span class='fr'>{{$assignments}}</span></div><div class='clr'></div>
</fieldset>
<fieldset class='rounded'><legend>Accounting</legend>
@include('system.tasks_teachers_no_rate')

	<div class='li'><span class='fl'><a href="findNegs.php" title='Packages w/negative counts'>Packages with negative counts</a></span><span class='fr'>{{$billing}}</span></div><div class='clr'></div>
	<div class='li'>
		<span class='fl'><a href="control.php?page=cc_declined" title='Declined CCs'>Total declined CCs with all four emails sent</a></span>
		<span class='fr'><b>{{$billingg['declined_all_four']}}</b> with all 4 emails sent / <b>{{$billingg['declined_total']}}</b> total declined CCs</span>
	</div><div class='clr'></div>
	<div class='li'>
		<span class='fl'><a href="control.php?page=contested" title='Contested entries'>Contested entries</a></span>
		<span class='fr'><b>{{$contested['open']}}</b> ticket
			@if($contested['open'] != 1)
			s
			@endif
			open, <b>
		{{$contested['need_action']}}</b> ticket
			@if($contested['need_action'] != 1)
				s need
			@else 
				needs
			@endif 
				action
		</span>
	</div><div class='clr'></div>

</fieldset>
<fieldset class='rounded'><legend>Entries</legend>
	<div class='li'><span class='fl'><a href="control.php?page=other_entries" title='Entries marked as "Other"'>Total "Other" entries</a></span><span class='fr'>{{$entriess['total_others']}}</span></div><div class='clr'></div>
	<div class='li'><span class='fl'><a href="control.php?page=comments" title='&quot;Same Day&quot; cancellations w/comments'>"Same Day" comments to be approved</a></span><span class='fr'>{{$entriess['to_approve']}}</span></div><div class='clr'></div>
	<div class='li'><span class='fl'><a href="javascript:toggle_visible('tblNoEntries');" title='Toggle table view'>Teachers not logging entries for new student after 16 days</a> (open admissions created after 2008 may 1)</span><span class='fr'>{{$TTO_CALL ?? 0}}</span></div><div class='clr'></div>
	<form id='tblNoEntries' action="" method="post"><table width="632" border="1">
		<tr>
			<th colspan="2">Teacher</th>
			<th width="116">Teacher's Phone #</th>
			<th>Student Name</th>
		</tr>
		{section name=t loop=$TTO_CALL}
		<tr>
			<td width="20"><input name="to_mark[]" type="checkbox" id="to_mark[]" value="{$TTO_CALL[t].connectId}" /></td>
			<td width="134"><a href="control.php?page=teacher&amp;id={$TTO_CALL[t].teacherId}" title='View teacher profile'>{$TTO_CALL[t].t_firstname} {$TTO_CALL[t].t_lastname}</a></td>
			<td>{if $TTO_CALL[t].t_phone}{$TTO_CALL[t].t_phone}<br />{/if}{if $TTO_CALL[t].t_phone2}{$TTO_CALL[t].t_phone2}<br />{/if}{$TTO_CALL[t].t_phone2}</td>
			<td width="128"><a href="showStudent.php?alterId={$TTO_CALL[t].studentId}">{$TTO_CALL[t].s_firstname} {$TTO_CALL[t].s_lastname}</a></td>
		</tr>
		{/section}
	</table><br/>
	<input name="mark_called" type="submit" id="mark_called" value="Mark Called" /><input name="_do" type="hidden" id="_do" value="update_called3" />
	</form>
</fieldset>
<fieldset class='rounded'><legend>Assignments</legend>
	<div class='li'><span class='fl'><a href="javascript:toggle_visible('tblTeachersCall');" title='Toggle table view'>Teachers to be called regarding assignment</a></span><span class='fr'>{{$ato_call ?? 0}}</span></div><div class='clr'></div>
	<form id='tblTeachersCall' action="" method="post"><table width="824" border="1">
		<tr>
			<th colspan="2">Teacher</th>
			<th width="116">Teacher's Phone #</th>
			<th>Student Name</th>
		    <th>Current Status</th>
		    <th>Due in</th>
		</tr>
{section name=a loop=$ATO_CALL}
		<tr>
			<td width="20"><input name="to_mark[]" type="checkbox" id="to_mark[]" value="{$ATO_CALL[a].connectId}" /></td>
			<td width="134">{if $ATO_CALL[a].had_first eq 'N'}<b style="color:#FF0000;">{/if}<a href="control.php?page=teacher&amp;id={$ATO_CALL[a].teacherId}" title='View teacher profile'>{$ATO_CALL[a].t_firstname} {$ATO_CALL[a].t_lastname}</a> {if $ATO_CALL[a].had_first eq 0}</b>{/if}</td>
			<td>{if $ATO_CALL[a].t_phone}{$ATO_CALL[a].t_phone}<br />{/if}{if $ATO_CALL[a].t_phone2}{$ATO_CALL[a].t_phone2}<br />{/if}{$ATO_CALL[a].t_phone2}</td>
			<td width="128"><a href="allWaitingStudents.php?action=0&amp;alterId={$ATO_CALL[a].studentId}">{$ATO_CALL[a].s_firstname} {$ATO_CALL[a].s_lastname}</a></td>
			<td width="189">{$ATO_CALL[a].status_descr}</td>
		    <td width="189">{$ATO_CALL[a].elapsedr}</td>
		</tr>
{/section}
		<tr><td colspan="6">Legend:<br /><strong style="color: #FF0000;">Red:</strong> First Assignment</td></tr>
	</table>
	<br />
	<input name="mark_called" type="submit" id="mark_called" value="Mark Called" /><input name="_do" type="hidden" id="_do" value="update_called" />
	</form>
</fieldset>
<fieldset class='rounded'><legend>Registration Followup</legend>
	<div class='li'>
		<span class='fl'><a href="control.php?page=tasks_intros_to_call">Parents to be called</a> (had Intro lesson, call needed regarding registration)</span>
		<span class='fr'><b>{{$NC_TO_CALL}}</b> to be called / <b>{{$nc_call ?? 0}}</b> total</span>
	</div><div class='clr'></div>
</fieldset>
<fieldset class='rounded'><legend>Hiring</legend>
@include('system.tasks_interviews_content')
</fieldset>
</div>
</body>
</html>
