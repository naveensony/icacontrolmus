<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>musika :: new teacher applications</title>
<meta name="keywords" lang="en-us" content="piano, voice, violin, guitar, music, lessons, METRO, child, youth, adult, instructor, instruction, beginning, intermediate, advanced, musika" />
<link rel="shortcut icon" href="/favicon.ico" type="image/vnd.microsoft.icon" />
<link rel="icon" href="/favicon.ico" type="image/vnd.microsoft.icon" />
<link href="../system/stylesheet/musika.css" rel="stylesheet" type="text/css" />

<style type="text/css"><!--
body,td,th {
	font-family: "Lucida Grande", Helvetica, Arial, sans-serif;
	font-size: 10pt;
}
body {margin: 0;}
hr	{margin:8em 0;}
hr.nopad	{margin:0; border-color:black;}

.r0	{background-color:#c0c0c0;}
.r1	{background-color:#f0f0f0;}
.r2	{background-color:white;}
.r3	{background-color:#f8f8f8;}

.l	{text-align:left;}
.c	{text-align:center;}
.r	{text-align:right;}

td label {white-space:nowrap;}
input, textarea, .options {
	padding: .2em;
}
input[type="submit"] {
	background-color: #fdda7c;
	border: 1px solid;
	border-color: #ffecb8 #f5c136 #f5c136 #ffecb8;
}
input[type="button"] {
	background-color: #fdda7c;
	border: 1px solid;
	border-color: #ffecb8 #f5c136 #f5c136 #ffecb8;
	font-weight:bold;
}

.ptdata fieldset {background-color: #EFEFEF;}
.ptdata legend {background-color: #EFEFEF; margin-bottom: 1em; border:2px groove #f0f0f0; border-bottom:0; padding:0 5px 0;}
img	{margin:0; padding:0; border:0;}
legend img	{vertical-align:middle;}

.errorf {background-color: #ffb7b2;}
.errors {color: #FF2000;}
.ok	{color:#20e010;}

fieldset.fssrch	{width:540px; margin:2em auto;}
fieldset.fssrch legend	{font-weight:bold;}

.nowrap	{white-space:nowrap;}
.mailsent {
	color:#000099;
}
.topmenu	{list-style:none; padding:0; margin:0 0 2em; float:left; max-width:25em; text-align:left;}
.topmenu li	{display:block; padding:0 1em;}
.topmenu li+li	{padding-left:2em; padding-top:1ex;}
.pthead	{background-color:#f8f8f8; border:4px solid #a0a0a0; padding:4px;}
.ptdata div	{padding:3px 0;}
.ptinfo	{border-bottom:1px groove black; margin:2px 2px 3px;}
.ptinfo strong	{padding-left:1em;}
.pths	{}
.ptoffer	{padding:0 0.5em !important; margin-top:1em;}
.txtnotes	{background-position:left top; background-repeat:no-repeat;}
.txthome, .txtstudio, .txtsrch, .txtrating	{background-position:left center; background-repeat:no-repeat;}
.txtnotes	{background-image:url("assets/images/txt_notes.png");}
.txthome	{background-image:url("assets/images/txt_home.png");}
.txtstudio	{background-image:url("assets/images/txt_studio.png");}
.txtsrch	{background-image:url("assets/images/txt_search.png");}
.txtrating	{background-image:url("assets/images/txt_rating.png");}
.dis	{opacity:.4; filter:alpha(opacity=40);}
.old	{background-color:#f02000; color:white;}
.vc	{vertical-align:middle;}
</style>
<script type="text/javascript"> 
function trim(str) {
	return trimR(trimL(str));
}
function trimL(str) {
	var i = -1; while (++i<str.length) {
		if (str.charCodeAt(i)>32) break;
	}
	return str.substr(i);
}
function trimR(str) {
	var i = str.length; while (--i>=0) {
		if (str.charCodeAt(i)>32) break;
	}
	return str.substr(0,i+1);
}

function count_select(s) {
	var ret = 0;
	var i = -1; while (++i<s.length) {if (s.options[i].selected) ++ret;}
	return ret;
}

function self_replace(i, num, field) {
	var el = document.getElementById(i);
	if (el.tagName=='LABEL'&&el.id.substr(0,2)=='tp') {
		var ch = el.childNodes[0];
		if (num) {
			var s = 16; if (field.substr(0,5)=='phone') s = 12;
			el.innerHTML = "<input type='text' name='"+el.id+"' value='"+(ch.tagName=='INPUT'?ch.value:(ch.nodeType==1?ch.innerHTML:ch.nodeValue))+"' size='"+s+"' />"+
				"<a href='javascript:self_replace(\""+el.id+"\",0,\""+field+"\");' title='Accept "+field+" change'><img src='/assets/images/btn_chk_mac.png' width='16' height='16' alt='(&#10003;)' class='vc' /></a> "+
				"<a href='javascript:void(0);' onclick='xajax_update_info(\""+el.id+"\",\""+(ch.tagName=='INPUT'?ch.value:(ch.nodeType==1?ch.innerHTML:ch.nodeValue))+"\",\""+field+"\");' title='Cancel "+field+" change'><img src='/assets/images/btn_x_mac.png' width='16' height='16' alt='(X)' class='vc' /></a>";
		}
		else {
			xajax_update_info(el.id, ch.tagName=='INPUT'?ch.value:(ch.nodeType==1?ch.innerHTML:ch.nodeValue),field);
			//el.innerHTML = "<a href='javascript:self_replace(\""+el.id+"\",1);'>"+(ch.tagName=='INPUT'?ch.value:ch.innerHTML)+"</a>";
		}
	}
}
function toggle_visible(i) {
	var el = document.getElementById(i);
	el.style.display = (el.style.display=='none'?'':'none');
	var mark = document.getElementById(i+"Marker"); 
	mark.innerHTML = (el.style.display=='none'?'&darr;':'&uarr;');
}

function setCaretPosition(elemId, caretPos) {
    var elem = document.getElementById(elemId);
	
	var character = 'The rates';

	var string = document.getElementById(elemId).value;
	var pos = string.indexOf(character);
	var browser=navigator.appName;
	var b_version=navigator.appVersion;
	var version=parseFloat(b_version);

	if (pos!=-1) {
		if (browser=="Microsoft Internet Explorer" && (version>=4)) caretPos = pos-3;
		else caretPos = pos-1;
	}
	if (elem != null) {
		if (elem.createTextRange) {
			var range = elem.createTextRange();
			range.move('character', caretPos);
			range.select();
		}
		else {
			if (elem.selectionStart) {
				elem.focus();
				elem.setSelectionRange(caretPos, caretPos);
			}
			else elem.focus();
		}
	}
}
</script>

</head>
<body>
<h1 class='r'>New Teachers Applications</h1>
@include('system.head')
<div style='width:90%; margin:0 auto;'>
	<fieldset class='fssrch'><legend>Search applications</legend>
		<form name='ptsrch' method='post' onsubmit="xajax_search_teachers(this.q.value); return false;"><input type='text' name='q' class='txtsrch' onfocus="this.className='';" onblur="if (this.value=='') this.className='txtsrch';" /><input type='submit' name='btnsrch' value='Search' /></form>
		<div id="searchResults"></div>
	</fieldset>
	<ul class='topmenu'>
		<li><b>View</b></li><!-- li>&raquo;</li -->
		<li>{if $smarty.request.view !== '0' or $smarty.request.alterId}<a href="{$LINK}view=0&amp;{$HTIME}{$HFILT}{$HDEG}{$HATT}">All</a>{else}<b>All</b>{/if}</li><!-- li>&middot;</li -->
		<li>{if $smarty.request.view != 1}<a href="{$LINK}view=1&amp;{$HTIME}{$HFILT}{$HDEG}{$HATT}" title='Meets criteria'>Meets criteria, not yet scheduled</a>{else}<b>Meets criteria, not yet scheduled</b>{/if}</li>
		<li>{if $smarty.request.view != 6}<a href="{$LINK}view=6&amp;{$HTIME}{$HFILT}{$HDEG}{$HATT}" title='Meets criteria, emailed'>Meets criteria, not yet scheduled, emailed</a>{else}<b>Meets criteria, not yet scheduled, emailed</b>{/if}</li>
		<li>{if $smarty.request.view != 2}<a href="{$LINK}view=2&amp;{$HTIME}{$HFILT}{$HDEG}{$HATT}" title="Doesn't meet criteria">Doesn't meet criteria, not scheduled</a>{else}<b>Doesn't meet criteria, not scheduled</b>{/if}</li>
		<li>{if $smarty.request.view != 3}<a href="{$LINK}view=3&amp;{$HTIME}{$HFILT}{$HDEG}{$HATT}" title='Has scheduled'>Has scheduled</a>{else}<b>Has scheduled</b>{/if}</li><!-- li>&middot;</li -->
		<li>{if $smarty.request.view != 4}<a href="{$LINK}view=4&amp;{$HTIME}{$HFILT}{$HDEG}{$HATT}" title="Contract offered">Contract offered</a>{else}<b>Contract offered</b>{/if}</li>
		<li>{if $smarty.request.view != 5}<a href="{$LINK}view=5&amp;{$HTIME}{$HFILT}{$HDEG}{$HATT}" title='Contract and followup sent'>Contract offered, followup sent</a>{else}<b>Contract offered, followup sent</b>{/if}</li><!-- li>&middot;</li -->
		<li><a href='control.php?page=tasks_interviews' title='View scheduled interviews'>View scheduled interviews</a></li>
	</ul>
	<ul class='topmenu'>
		<li><b>Time</b></li><!-- li>&raquo;</li -->
		<li>{if $smarty.request.time}<a href="{$LINK}{$HVIEW}{$HFILT}{$HDEG}{$HATT}">All</a>{else}<b>All</b>{/if}</li>
		<li>{if $smarty.request.time != 7}<a href="{$LINK}{$HVIEW}time=7&amp;{$HFILT}{$HDEG}{$HATT}">1 week</a>{else}<b>1 week</b>{/if}</li>
		<li>{if $smarty.request.time != 30}<a href="{$LINK}{$HVIEW}time=30&amp;{$HFILT}{$HDEG}{$HATT}">1 month</a>{else}<b>1 month</b>{/if}</li>
		<li>{if $smarty.request.time != 90}<a href="{$LINK}{$HVIEW}time=90&amp;{$HFILT}{$HDEG}{$HATT}">3 months</a>{else}<b>3 months</b>{/if}</li>
		<li>{if $smarty.request.time != 180}<a href="{$LINK}{$HVIEW}time=180&amp;{$HFILT}{$HDEG}{$HATT}">6 months</a>{else}<b>6 months</b>{/if}</li>
		<li>{if $smarty.request.time != 365}<a href="{$LINK}{$HVIEW}time=365&amp;{$HFILT}{$HDEG}{$HATT}">1 year</a>{else}<b>1 year</b>{/if}</li>
	</ul>
	<ul class='topmenu'>
		<li><b>Status</b></li><!-- li>&raquo;</li -->
		<li>{if $smarty.request.filter gte '0'}<a href="{$LINK}{$HVIEW}{$HTIME}{$HDEG}{$HATT}">All</a>{else}<b>All</b>{/if}</li>
		<li>{if $smarty.request.filter !== '0'}<a href="{$LINK}{$HVIEW}{$HTIME}filter=0&amp;{$HDEG}{$HATT}">New</a>{else}<b>New</b>{/if}</li>
		<li>{if $smarty.request.filter != 1}<a href="{$LINK}{$HVIEW}{$HTIME}filter=1&amp;{$HDEG}{$HATT}">Left message</a>{else}<b>Left message</b>{/if}</li>
		<li>{if $smarty.request.filter != 2}<a href="{$LINK}{$HVIEW}{$HTIME}filter=2&amp;{$HDEG}{$HATT}">Teacher not interested</a>{else}<b>Teacher not interested</b>{/if}</li>
		<li>{if $smarty.request.filter != 3}<a href="{$LINK}{$HVIEW}{$HTIME}filter=3&amp;{$HDEG}{$HATT}">Teacher not qualified</a>{else}<b>Teacher not qualified</b>{/if}</li>
		<li>{if $smarty.request.filter != 4}<a href="{$LINK}{$HVIEW}{$HTIME}filter=4&amp;{$HDEG}{$HATT}">Musika not interested</a>{else}<b>Musika not interested</b>{/if}</li>
	</ul>
	<ul class='topmenu'>
		<li><b>R&eacute;sum&eacute;s</b></li><!-- li>&raquo;</li -->
		<li>{if $smarty.request.attach gte '0'}<a href="{$LINK}{$HVIEW}{$HTIME}{$HFILT}{$HDEG}">All</a>{else}<b>All</b>{/if}</li>
		<li>{if $smarty.request.attach !== '0'}<a href="{$LINK}{$HVIEW}{$HTIME}{$HFILT}{$HDEG}attach=0&amp;">No attachment</a>{else}<b>No attachment</b>{/if}</li>
		<li>{if $smarty.request.attach != 1}<a href="{$LINK}{$HVIEW}{$HTIME}{$HFILT}{$HDEG}attach=1&amp;">Has attachment</a>{else}<b>Has attachment</b>{/if}</li>
	</ul>
	<ul class='topmenu'>
		<li><b>Degree</b></li><!-- li>&raquo;</li -->
		<li>{if $smarty.request.degree gte '0'}<a href="{$LINK}{$HVIEW}{$HTIME}{$HFILT}{$HATT}">All</a>{else}<b>All</b>{/if}</li>
		<li>{if $smarty.request.degree !== '0'}<a href="{$LINK}{$HVIEW}{$HTIME}{$HFILT}degree=0&amp;{$HATT}">No degree</a>{else}<b>No degree</b>{/if}</li>
		<li>{if $smarty.request.degree != 1}<a href="{$LINK}{$HVIEW}{$HTIME}{$HFILT}degree=1&amp;{$HATT}">High school/GED</a>{else}<b>High school/GED</b>{/if}</li>
		<li>{if $smarty.request.degree != 2}<a href="{$LINK}{$HVIEW}{$HTIME}{$HFILT}degree=2&amp;{$HATT}">Associate's</a>{else}<b>Associate's</b>{/if}</li>
		<li>{if $smarty.request.degree != 3}<a href="{$LINK}{$HVIEW}{$HTIME}{$HFILT}degree=3&amp;{$HATT}">Bachelor's</a>{else}<b>Bachelor's</b>{/if}</li>
		<li>{if $smarty.request.degree != 4}<a href="{$LINK}{$HVIEW}{$HTIME}{$HFILT}degree=4&amp;{$HATT}">Master's</a>{else}<b>Master's</b>{/if}</li>
		<li>{if $smarty.request.degree != 5}<a href="{$LINK}{$HVIEW}{$HTIME}{$HFILT}degree=5&amp;{$HATT}">Ph.D.</a>{else}<b>Ph.D.</b>{/if}</li>
	</ul>
	<ul class='topmenu'>
		<li><b>Teachers per page</b></li><!-- li>&raquo;</li -->
		<li>{if $LIMIT gt 0}<a href="{$LINK}{$HVIEW}{$HTIME}{$HFILT}{$HDEG}{$HATT}limit=0">All</a>{else}<b>All</b>{/if}</li>
		<li>{if $TOTAL lt 10}<span class='dis'>10</span>{elseif $LIMIT != 10}<a href="{$LINK}{$HVIEW}{$HTIME}{$HFILT}{$HDEG}{$HATT}limit=10">10</a>{else}<b>10</b>{/if}</li>
		<li>{if $TOTAL lt 25}<span class='dis'>25</span>{elseif $LIMIT != 25}<a href="{$LINK}{$HVIEW}{$HTIME}{$HFILT}{$HDEG}{$HATT}limit=25">25</a>{else}<b>25</b>{/if}</li>
		<li>{if $TOTAL lt 50}<span class='dis'>50</span>{elseif $LIMIT != 50}<a href="{$LINK}{$HVIEW}{$HTIME}{$HFILT}{$HDEG}{$HATT}limit=50">50</a>{else}<b>50</b>{/if}</li>
		<li>{if $TOTAL lt 100}<span class='dis'>100</span>{elseif $LIMIT != 100}<a href="{$LINK}{$HVIEW}{$HTIME}{$HFILT}{$HDEG}{$HATT}limit=100">100</a>{else}<b>100</b>{/if}</li>
	</ul>
	<div class='clr'></div>
</div>
<div class='clr'></div>

<div style='text-align:left; width:90%; margin:0 auto;'>
	<p>Instructions to process a pending teacher app using this page are as follows:</p>
	<ol start='0'>
		<li>If a teacher is qualified but hasn't scheduled an interview yet and doesn't have a link to the scheduler, click "Send Interview Email" to send them a link to the scheduler.</li>
		<li>Update the status - fill in your notes, rating, whether you left a message or think the teacher shouldn't be hired, and any mailing lists you think the teacher should be on if hired, then click "Update Status" to save that info.<br /><b>NOTE:</b> will NOT save contract related info.</li>
		<li>Send contract - choose whether to send with students for review or not, fill in the rates, then click "Send Contract" to send an email to the teacher containing their unique link to the contract page.<br /><b>NOTE:</b> will NOT save the stuff from step 1.</li>
		<li>Once the teacher submits a contract, a teacher account should be automatically created with the info you saved in step 1 and the rates in step 2.</li>
	</ol>
	<p>Extra things to be aware of:</p>
	<ol>
		<li>Phone numbers and email addresses are editable. Click on them to show a text box you can edit, then either click the <img src='/assets/images/btn_chk_mac.png' width='16' height='16' alt='(&#10003;)' /> to confirm the change or the <img src='/assets/images/btn_x_mac.png' width='16' height='16' alt='(X)' /> to cancel it.</li>
		<li>Home addresses will soon be editable. Stay tuned.</li>
	</ol>
{if $ERRORS}
	<p>You've encountered the following errors.</p>
	<ul class='errors'>
{section name=e loop=$ERRORS}
		<li>{$ERRORS[e]}</li>
{/section}
	</ul>
{/if}
{if $RESULTS}
	<ul>
{section name=r loop=$RESULTS}
		<li>{$RESULTS[r]}</li>
{/section}
	</ul>
{/if}
</div>

{$PAGER}

{counter start=0 print=0}
{foreach key=city item=arr from=$METRO}

<div style='width:90%; margin:1em auto; text-align:left;'>
	<div class='pthead'><strong>{$city|capitalize}</strong> metro teachers - ({$arr|@count})</div>
{section name=s loop=$arr}{assign var='TCH' value=$arr[s]}
	<form action="" method="post" name='f{$TCH.teacherId}' class='ptdata' style='width:96%; margin:0 auto; padding-top:2em;' onsubmit='return false;'><fieldset>
		<legend>
			<a href='control.php?page=save_teacher_vcard&amp;tbl=pending_teachers&amp;alterId={$TCH.teacherId}' title="Download vCard for {$TCH.fullName}"><img src='/assets/images/vcard.png' height='24' alt='Download vCard' /></a>
			{if $TCH.attachments_id gt 0}<a href='control.php?page=save_attachment&amp;id={$TCH.attachments_id}' title="Download r&eacute;sum&eacute; for {$TCH.fullName}"><img src='/assets/images/notes_24.png' height='24' alt='Download r&eacute;sum&eacute;' /></a> {/if}<strong>{$TCH.fullName}</strong> &middot;
			<span style='font-size:smaller;'>app submitted {$TCH.timestamp|date_format:"%Y/%m/%d %l:%M %p"}</span>
		</legend>
{if $TCH.has_criminal_record eq 'Y'}
		<h1 class='errors'>THIS TEACHER AFFIRMED HAVING A CRIMINAL RECORD!</h1>
{/if}
{if $TCH.reviewReferences eq 'N'}
		<h1 class='errors'>THIS TEACHER CANNOT PROVIDE REFERENCES!</h1>
{/if}
		<input type='hidden' name='_do' value='' />
		<input type="hidden" name="teacherId" value="{$TCH.teacherId}" />
		<a href='javascript:toggle_visible("ptinfo{$TCH.teacherId}");' title='Show/hide teacher info'>Show/hide teacher info</a> <span id='ptinfo{$TCH.teacherId}Marker'>&uarr;</span>
		<div id='ptinfo{$TCH.teacherId}' class='ptinfo'>
			<nobr><strong>Meets criteria:</strong> {if $TCH.pass}Y{if $TCH.request_sent gt 0} (reminded about scheduler {$TCH.request_sent|date_format:"%Y/%m/%d %l:%M %p"}){/if}{else}N{/if}</nobr><br />
{if $TCH.iview|@count}{assign var='EVT' value=$TCH.iview}
			<strong>Interview info:</strong> {if $EVT.event_start lt $NOW}<span class='old'>TIME HAS PASSED</span> {/if}{if $EVT.is_closed}<span>WAS CONDUCTED</span> {/if}{$EVT.event_start|date_format:"%Y/%m/%d %l:%M %p %Z"} ({$EVT.timezone})<br />
{/if}
			{if $TCH.phone}<nobr><strong>Business:</strong> <label id='tp{$TCH.teacherId}p'><a href='javascript:self_replace("tp{$TCH.teacherId}p",1,"phone");' title='Change this phone'>{$TCH.phone}</a></label></nobr>{/if}
			{if $TCH.phone2}<nobr><strong>Home:</strong>  <label id='tp{$TCH.teacherId}p2'><a href='javascript:self_replace("tp{$TCH.teacherId}p2",1,"phone2");' title='Change this phone2'>{$TCH.phone2}</a></label></nobr>{/if}
			{if $TCH.phone3}<nobr><strong>Cell:</strong>  <label id='tp{$TCH.teacherId}p3'><a href='javascript:self_replace("tp{$TCH.teacherId}p3",1,"phone3");' title='Change this phone3'>{$TCH.phone3}</a></label></nobr>{/if}
			{if $TCH.email}<nobr><strong>Email:</strong>  <label id='tp{$TCH.teacherId}e'><a href='javascript:self_replace("tp{$TCH.teacherId}e",1,"email");' title='Change this email'>{$TCH.email}</a></label></nobr>{/if}
			<nobr><strong>Metro:</strong> {$TCH.metro}</nobr>
			<nobr><strong>Highest degree attained:</strong> {$TCH.degree} <!--from {$TCH.school} in {$TCH.dyear} --> {if $TCH.course}; {$TCH.course}{/if}</nobr>			<br />
			<nobr><strong>Rate Home:</strong> {$TCH.rateHome}</nobr>			<nobr><strong>Rate Studio:</strong> {$TCH.rateStudio}</nobr><br />
			<nobr><strong>Instruments:</strong>{foreach key=i item=inst from=$TCH.instr}{assign var='ins' value=$TCH.instr[$i]}{if $ins} {if $ins|intval}{$INSTRUMENTS[$ins].name}{else}{$ins}{/if} ({$TCH.exp[$i]} yrs, {$TCH.lvl[$i]}){/if}{/foreach}</nobr><br />
			<nobr><strong>Address:</strong> {$TCH.addressL1} {$TCH.addressL2} {$TCH.location}, {$TCH.stateId} {$TCH.zipCode}</nobr>
			<!-- click here for detailed info. -->
		</div>
{if $TCH.references|@count}
		<div class='ptinfo'>
{section loop=$TCH.references name=r}{assign var=ref value=$TCH.references[r]}
			<nobr><strong>Reference #{$smarty.section.r.index+1}:</strong> <span id='ref{$ref.reference_id}'>{if $ref.is_verified eq 'Y'}<b class='ok'>VERIFIED</b> <input type='button' value='De-verify' onclick='xajax_update_reference({$ref.reference_id},"N");' />{else}<b class='errors'>NOT YET VERIFIED</b> <input type='button' value='Mark verified' onclick='xajax_update_reference({$ref.reference_id},"Y");' />{/if}</span></nobr><br />
			<ul style='margin-top:0; list-style:none;'>
				<li>{$ref.name} ({$ref.title}, <i>{$ref.company}</i>)</li>
				<li>{$ref.phone}{if $ref.phone2} (alt. {$ref.phone2}){/if}</li>
{if $ref.email}
				<li>{$ref.email}</li>
{/if}
			</ul>
{/section}
		</div>
{/if}
		<div class='clr'></div>
		<a href='javascript:toggle_visible("ptnotes{$TCH.teacherId}");' title='Show/hide teacher notes'>Show/hide teacher notes</a> <span id='ptnotes{$TCH.teacherId}Marker'>&uarr;</span>
		<div id='ptnotes{$TCH.teacherId}' class='ptinfo'>
			<div style='float:left; padding-right:3em;'><label>Notes<br /><textarea name="txtNotes" rows="3" cols="40" class="{if !$TCH.notes}txtnotes{/if}" {if $TCH.new_id gt 0}disabled='disabled'{/if} onfocus="this.className='';" onblur="if (this.value=='') this.className='txtnotes';">{$TCH.notes}</textarea></label></div>
			<div style='float:left; padding-right:3em;'><label>Teacher Rating<br />{if $TCH.new_id eq 0}<select name="txtTRating">
				<option class='txtrating'></option>
{section name=rat loop=$RATINGS}{assign var="r" value=$smarty.section.rat.index+1}{assign var='r5' value=$r+0.5}
				<option{if $TCH.teacher_rating eq $r} selected='selected'{/if}>{$r} - {$RATINGS[rat]}</option>
{* if $r5 lt 10}
				<!-- option{if $TCH.teacher_rating eq $r5} selected='selected'{/if}>{$r5}</option -->
{/if *}
{/section}
			</select>{else}{assign var='rat' value=$TCH.rat-1}{$TCH.teacher_rating} - {$RATINGS[$rat]}{/if}</label></div>
			{if $TCH.new_id eq 0}<div style='float:left; padding-right:3em;' class='ptsendto'>
				Status<br /><input type='hidden' name="rdoContractType" value="NULL" />
				<label class='nowrap'><input type="radio" name="rdoContractType" value="1" {if $TCH.sent_status eq 1}checked="checked"{/if} /> Left a message</label><br />
				<label class='nowrap'><input type="radio" name="rdoContractType" value="2" {if $TCH.sent_status eq 2}checked="checked"{/if}/> Teacher not interested</label><br />
				<label class='nowrap'><input type="radio" name="rdoContractType" value="3" {if $TCH.sent_status eq 3}checked="checked"{/if}/> Teacher not qualified</label><br />
				<label class='nowrap'><input type="radio" name="rdoContractType" value="4" {if $TCH.sent_status eq 4}checked="checked"{/if}/> Musika not interested</label>
			</div>{/if}
			<div class='clr'></div>
{if $TCH.new_id eq 0}
			<div class='pths' style='padding-bottom:1em;'>
				<label class='nowrap'><input type='checkbox' name='freeze' value='Y'{if $TCH.is_frozen eq 'Y'} checked='checked'{/if} /> Freeze contract followup auto-emails?</label>
			</div>
			<i style='font-size:smaller;'>(hold Shift or Control on Windows/Command on Mac while clicking to select more than one option)</i><br />
{if $INSTRUMENTS|@count}
			<div style="float:left; padding-right:3em;"><label>Instruments<br /><select name="selected_instruments[]" id="selected_instruments" multiple='multiple' size='4'>
{foreach key=i item=inst from=$INSTRUMENTS}
				<option value="{$INSTRUMENTS[$i].instruments_id}" {check_array haystack=$TCH.insts needle=$INSTRUMENTS[$i].instruments_id text="selected='selected'"}>{$INSTRUMENTS[$i].name}</option>
{/foreach}
			</select></label></div>
{/if}
{if $METROS|@count}
			<div style="float:left; padding-right:3em"><label>Metros<br /><select name="metros[]" id="metros" multiple='multiple' size='4'>
{section name=m loop=$METROS}
				<option value="{$METROS[m].metros_id}" {check_array haystack=$TCH.metros needle=$METROS[m].metros_id text="selected='selected'"}>{$METROS[m].name}</option>
{/section}
			</select></label></div>
{/if}
			<div class='clr'>&nbsp;</div>
			<input type="button" name="_d" value="Update Status" onclick="xajax_check_fields(this.form.teacherId.value, this.value); return false;" />
			<input type="button" name="_d" value="Send Interview Email" onclick="xajax_check_fields(this.form.teacherId.value, this.value); return false;" />
			<div class='clr'>&nbsp;</div>
		</div>
		<div class='clr'></div>
		{if $TCH.sent_date gt 0}<div class='ptoffer'>Contract offer sent {$TCH.sent_date|date_format:"%Y/%m/%d %l:%M %p"}{if $TCH.followupsent gt 0}, last followup sent {$TCH.followupsent|date_format:"%Y/%m/%d %l:%M %p"}{/if}</div>{/if}
		<div style='float:left; padding-right:3em;'>
			<div class='pths'><label class='nowrap'><input type="radio" name="rdoContract" value="1" {if $TCH.contract_type eq 1}checked="checked"{/if} /> Send contract with students for review.</label></div>
			<div class='pths'><label class='nowrap'><input type="radio" name="rdoContract" value="2" {if $TCH.contract_type eq 2}checked="checked"{/if} /> Send contract only.</label></div>
		</div>
		<div style="float:left; padding-right:1em;">
			<div class='pths'>
				<label class='nowrap' style='padding-right:1em;'>In Home $<input type="text" name="texthome1" value="{if $TCH.rate_home gt 0}{$TCH.rate_home}{elseif $TCH.sendcontract_home gt 0}{$TCH.sendcontract_home}{/if}" size='5' class="{if $TCH.rate_home gt 0 or $TCH.sendcontract_home gt 0}{else}txthome{/if}" onfocus="this.className='';" onblur="if (this.value=='') this.className='txthome';" /></label>
				<label class='nowrap' style='padding-right:1em;'>In Studio $<input type="text" name="textstudio1" value="{if $TCH.rate_studio gt 0}{$TCH.rate_studio}{elseif $TCH.sendcontract_studio gt 0}{$TCH.sendcontract_studio}{/if}" size='5' class="{if $TCH.rate_studio gt 0 or $TCH.sendcontract_studio gt 0}{else}txtstudio{/if}" onfocus="this.className='';" onblur="if (this.value=='') this.className='txtstudio';" /></label>
			</div>
		</div>
		<div style="float:left; padding-right:3em;"><div class='pths'>
			<input type="button" name="_d" value="Send Contract" onclick="xajax_check_fields(this.form.teacherId.value, this.value); return false;" />
		</div></div>
		<div class='clr'><hr class='nopad' /></div>
		<div>If teacher was hired but wasn't removed from auto-mailing, find them here and click "Update Hiring Status." <select name='hired_id'>
			<option></option>
{section name=ht loop=$HIRED}
			<option value='{$HIRED[ht].teacherId}'>{$HIRED[ht].lastName}, {$HIRED[ht].firstName}{if $HIRED[ht].city or $HIRED[ht].stateId} ({if $HIRED[ht].city}{$HIRED[ht].city}, {/if}{$HIRED[ht].stateId}){/if}</option>
{/section}
		</select> <input type='button' name='_d' value="Update Hiring Status" onclick="xajax_check_fields(this.form.teacherId.value, this.value); return false;" /></div>
		{else}</div>
		<div class='clr'><a href='control.php?page=teacher&amp;id={$TCH.new_id}'>View {$TCH.firstName}'s profile</a> ({if $TCH.rate_home gt 0}{$TCH.rate_home}{else}no{/if} home rate, {if $TCH.rate_studio gt 0}{$TCH.rate_studio}{else}no{/if} studio rate)</div>
		{/if}
	</fieldset></form>
{/section}
	<hr />
</div>
{/foreach}

{$PAGER}
</body>
</html>