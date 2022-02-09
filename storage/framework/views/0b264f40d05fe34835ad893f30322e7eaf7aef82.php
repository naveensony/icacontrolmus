<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>musika :: link central</title>
<!-- link rel="stylesheet" href="style_sheets/update_styles.css" type="text/css" / -->

<style type="text/css">
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

.rounded	{
	border-radius:1ex;
	-webkit-border-radius:1ex;
	-moz-border-radius:1ex;
}

.linkbar a	{display:inline-block; padding:1ex; border:1px solid transparent; white-space:nowrap;}
.linkbar a:hover	{background:#f8f8ff; border-color:#e0e0f0;}

.mlinks	{/*background-color:#f0f0f0;*/}
.mlinks fieldset	{border:1px solid #d0d0d0; padding:0 1em; margin-top:1.5em;}
.mlinks fieldset legend	{font-weight:bold;}
.mlinks fieldset legend a:link	{text-decoration:none; color:#8010c0;}
.mlinks fieldset .linkbar ul	{display:block; padding:0.5em 0; margin:0; list-style:none;}
.mlinks fieldset .linkbar ul li	{display:inline; list-style:none; margin:0;}
.mlinks fieldset .linkbar ul li.dot	{padding-left:0.5em; padding-right:0.5em;}
--></style>
<script type='text/javascript'><!--
function confirm_redir(url, msg) {
	if (confirm(msg)) {
		window.location.href = url;
		return true;
	}
	else return false;
}
function toggle_visible(i) {
	var el = document.getElementById(i);
	el.style.display = (el.style.display=='none'?'':'none');
	var mark = document.getElementById(i+"Marker"); 
	mark.innerHTML = (el.style.display=='none'?'&darr;':'&uarr;');
}

</script>
{/literal}
</head>
<body>
<h1 class='r'>Link Central</h1>
<?php echo $__env->make('system.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div id='mmain' class='normalText'>
<div class='mlinks'>
{foreach from=$LINKS key=L_LEGEND item=arr}{assign var='L_SHORT' value=$L_LEGEND|replace:' ':''}
<fieldset class='rounded'><legend><a href='javascript:toggle_visible("links{$L_SHORT}");' title='Toggle section'>{$L_LEGEND}</a> <span id='links{$L_LEGEND}Marker'>&uarr;</span></legend>
<div id='links{$L_SHORT}' class='linkbar'><ul>
{section name=l loop=$arr}{* if $smarty.section.l.index gt 0}<li class='dot'>&middot;</li>{/if *}
	<li><a href="{$arr[l][0]}"{if $arr[l][2]} title='{$arr[l][2]}'{/if} class='rounded'>{if $arr[l][1]}{$arr[l][1]}{else}{$arr[l][0]}{/if}</a></li>
{/section}
</ul></div>
</fieldset>
{/foreach}

	<!--<tr><td class="normalText" align="right"><a href="invoicesexcel.php?alterMonth=&amp;month=<?php  print(1); ?>&amp;alterYear=<?php  print(1); ?>" onmouseover="status='Download Invoices'; return(true);" onmouseout="status='Musika Students Database'; return(true);" onfocus="if(this.blur)this.blur()" title="Download Invoices">New Member Indicator in Invoices;</a></td></tr>-->
	<!-- tr><td align="right" class="normalText"><a href="admissionsexcel.php" onmouseover="status='Teacher Lesson Report'; return(true);" onmouseout="status='Musika::Admissions Database'; return(true);" onfocus="if(this.blur)this.blur();" title="Admit a new admission">Teacher Lesson Report</a></td></tr -->
	<!-- | <a href='#' onclick="if (confirm('This will send the first email to all teachers. Are you sure you want to continue?')) window.location.href='missingEntries.php?alterMonth=<?=1;?>&amp;alterYear=<?=1;?>&amp;send=1';">Check &amp; Send First Summary Email to All Teachers</a -->

</div>
</div>
</body>
</html><?php /**PATH C:\xampp\htdocs\musikateachers\resources\views/system/links.blade.php ENDPATH**/ ?>