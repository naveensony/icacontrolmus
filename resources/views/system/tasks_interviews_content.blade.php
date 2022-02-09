	<div class='li'>
		<span class='fl'><a href="control.php?page=tasks_interviews" title='View all interviews not yet conducted'>Interviews scheduled</a></span>
		<span class='fr'>
			<a href="control.php?page=tasks_interviews&amp;view=d1" title='View upcoming interviews'>{{$EVENTS ?? 0 }} today</a>
			<!-- {if $EVENTS|@count > 0}{if $EVTS45|@count > 0},
			{$EVTS45|@count} within the next 45 mins{/if}{section name=nxt loop=$EVENTS}{if $EVENTS[nxt].event_start>$NOW and $NEXT eq -1}{assign var='NEXT' value=$smarty.section.nxt.index}{/if}{/section}{if $NEXT gt -1}, 
			next at {if $EVENTS[$NEXT].event_start|date_format:"%m/%d/%Y" eq $NOW|date_format:"%m/%d/%Y"}{$EVENTS[$NEXT].event_start|date_format:"%m/%d %l:%M %p"}{else}{$EVENTS[$NEXT].event_start|date_format:"%l:%M %p"}{/if}{/if}{/if}-->
		</span> 
	</div><div class='clr'></div>
	<!-- <form id='tblInterviews' action="" method="post"><table width="100%" border="1">
		<tr>
			<th colspan="2">Teacher</th>
			<th width="100">Time</th>
			<th width="10">TZ</th>
		    <th>Info</th>
		</tr> -->
<!-- section name=e loop=$EVTS45assign var='EVT' value=$EVTS45[e] -->
		<!-- <tr>
			<td width="20"><input name="to_iview[]" type="checkbox" id="to_iview[]" value="{$EVT.event_key}" /></td>
			<td width="250">{$EVT.event_title}</td>
			<td>{$EVT.event_start|date_format:"%l:%M %p %Z"}</td>
			<td>{$EVT.timezone}</td>
			<td>{$EVT.event_description|nl2br}</td>
		</tr> -->
<!-- {/section} -->
	<!-- </table><br />
	<input name="mark_called" type="submit" id="mark_called" value="Mark Called" /><input name="_do" type="hidden" id="_do" value="update_iview" />
	</form> -->
