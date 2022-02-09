	<div class='li'>
		<span class='fl'>
			<a href='control.php?page=teachers_no_rate'>Teachers with missing rates</a>
		</span><span class='fr'>
			<b><?php echo e($NORATE_REGS ?? 0); ?></b> w/awaiting regs, <b>
				<!-- {if $smarty.get.page eq 'tasks'} -->
				<!-- {$NORATE.total} -->
				<!-- {else} -->
				<!-- {$NORATE|@count} -->
				<!-- {/if} -->
			</b>0 w/open admission
		</span>
	</div>
	<div class='clr'>
		
	</div>
<?php /**PATH C:\xampp\htdocs\musikateachers\resources\views/system/tasks_teachers_no_rate.blade.php ENDPATH**/ ?>