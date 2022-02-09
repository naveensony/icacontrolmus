
<?php $__env->startSection('title'); ?> Reviews  <?php $__env->stopSection(); ?>
<style>
.ibox-content p{
	
	line-height: 2;
    margin: 2px 14px 10px 11px;
}
.cent{
	
margin-top: -8px;
}
</style>
<?php $__env->startSection('content'); ?>

<div class="wrapper wrapper-content animated fadeInRight">

		
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
			 <h2>Reviews</h2>
            </div>
			 <div class="ibox-content">
				<div class="alert alert-info alert-dismissable">
				<h3>GET 5X MORE STUDENTS WITH REVIEWS</h3></br>
				Reviews are key to attracting new students so be sure to share your profile link
				</br>
				<strong><a href="https://www.musikalessons.com/teachers/<?php echo e($urlName); ?>" > https://www.musikalessons.com/teachers/<?php echo e($urlName); ?> </a> </strong></br>
				where people can write you a review. Any of your past or current students can write review and they don’t have to be a Musika student. Aim for 10+ reviews.
				<br><br>
				0-3    &nbsp; &nbsp;  Reviews -  Difficult to attract students
				<br>4-9 &nbsp; &nbsp;     Reviews -  2X more likely to attract students
				<br>10-20 Reviews -  3X more likely to attract students
				<br>21-29 Reviews -  4X more likely to attract students
				<br>30+ &nbsp; &nbsp;   Reviews -   5X more likely to attract students 
				<br>
				</div>
				
				<?php if(!empty($db_reviews)): ?><div style="font-weight: 700;">Total Reviews: <?php echo e(count($db_reviews)); ?></div>
				<?php else: ?> <div style="font-weight: 700;">Total Reviews: 0</div>
				<?php endif; ?>
			</div>
            <div class="ibox-content">
                     
						 
                            <div class="row">
                                <div class="col-lg-12">

					<?php if(isset($r['reviews']) and 1==2): ?>
						<?php if(count($r['reviews']) < 4): ?>
							<p>There are not enough reviews.  <font color='red'>Low count!</font></p>
						<?php endif; ?>	
					   <?php $__currentLoopData = $r['reviews']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="social-feed-box">
							<div class="social-avatar">
								
								<div class="media-body">
									<h3>
									<?php echo e(ucwords($review['user']['username'])); ?>

									</h3>
									<small class="text-muted"><?php echo e(ucwords($review['since'])); ?> <?php echo e($review['created_at']); ?>

									</br>
									<?php $g=$review['grade'];?>
							<?php for($i=1; $i<=$g; $i++): ?>		
							<span style="color:green;" class="fa fa-star"></span>
							<?php endfor; ?>
								</small>
							<p style="display:none;" class="hi">
								<?php echo e($review['text']); ?>

								</p>
								</div>
							</div>
							<div class="social-body" style=" padding: 18px;">
								<p>
								<?php echo e($review['text']); ?>

								</p>
							
							 <a  style="text-decoration:underline;"  class="pull-left cent">
							   Request for Deletion
							 </a>
							
							</div>	
						</div>
						 <hr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
			   <?php else: ?>
				   <?php if(!empty($db_reviews)): ?>
						<?php if(count($db_reviews) < 4): ?>
							<p>There are not enough reviews.  <font color='red'>Low count!</font></p>
						<?php endif; ?>
						<?php $__currentLoopData = $db_reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="social-feed-box">
							<div class="social-avatar">
								
								<div class="media-body">
									<h3>
									<?php echo e(ucwords($review['reviewername'])); ?>

									</h3>
									<small class="text-muted"> <?php echo e($review['created_at']); ?>

									</br>
									<?php $g=$review['rating'];?>
							<?php for($i=1; $i<=$g; $i++): ?>		
							<span style="color:green;" class="fa fa-star"></span>
							<?php endfor; ?>
								</small>
							<p style="display:none;" class="hi">
								<?php echo e($review['reviewtext']); ?>

								<input type="hidden" name="get_text" id="get_text" value="<?php echo e($review['reviewtext']); ?>">
								</p>
								</div>
							</div>
							<div class="social-body" style=" padding: 18px;">
								<p>
								<?php echo e($review['reviewtext']); ?>

								</p>
							
							 <a  style="text-decoration:underline;"  class="pull-left cent">
							   Request for Deletion
							 </a>
							
							</div>	
						</div>
						 <hr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					
					<?php endif; ?>		
				   
					   <!--<p>No reviews have been left yet. <font color='red'>Incomplete!</font></p>-->
			   <?php endif; ?>
                      
                        


                                </div>
                            </div>

			</div>
			
         </div>
      </div>
   </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
<!--<button class="example1 btn btn-primary">example alert</button>
<script type="text/javascript">
$('.EXAMPLE1').ON('CLICK', FUNCTION () {
   $.CONFIRM({
		TITLE: 'CONFIRM!',
		CONTENT: 'ARE YOU SURE SEND DELETE REQUEST THIS REVIEW?',
		BUTTONS: {
			CONFIRM: FUNCTION () {
				$.ALERT('CONFIRM');
			},
			CANCEL: FUNCTION () {
				$.ALERT('CANCELED!');
			}
		}
	});
});
</script>-->
							
<script type="text/javascript">

$(function() {

   $('#tSubmit').click( function() {

       if ( $('#confirm_terminate').is(':checked') ) { 

            if( $('#alterId').val() == '' ) {

                alert('You must select a student name from the drop down menu.')
				return false;

            } else {   

                $('#dataDisplay').submit(); 

            }

       } else {

             alert('You must acknowledge your already signed contractual obligation by checking the box.'); 
			 return false;
			 

       }

    });

});
$(".cent").click(function(){
	
	$.confirm({
		title: 'Confirm!',
		content: 'Are you sure you want to delete this review?',
		buttons: {
			confirm: function () {
				//$.alert('confirm');
				var s=$(this);
				//alert($(this).parent().find('p').text());
				var c=$(this).parent().find('div').find('p').css('display','block').parent().html();
				$(this).parent().find('div').find('p').css('display','none');
				
				var n=$.trim(c);
				var review_text = $("#get_text").val();
				//console.log(review_text); return false;
				$.ajax({
					type: "POST",	
					url: "<?php echo e(url('/reviewdelete')); ?>",
					data:{ ht:review_text, "_token": "<?php echo e(csrf_token()); ?>"},
					success:function(data)
					{
						console.log(data)
						//alert('The review deletion request is successfully');
						$.alert('Your request has been sent to Musika and the review will be removed within 48 hours.');
						/*  $.alert({
							title: 'Message!',
							content: 'The review deletion request is successfully!',
						}); */
						
						s.parent().find('div').find('h3').css('color','red');
						s.parent().find('div').find('p').css('color','red');
						
					}
				});
			},
			cancel: function () {
				//$.alert('Canceled!');
				//return false;
			}
		}
	});
	
	
/* 	var cn=confirm('Are you sure send delete request this review?');
	if(cn)
	{
		
				

	// $.ajax({
			
			
			
		// })
	}
	else
	{
		return false;
	} */


});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/musikateachers/resources/views/review.blade.php ENDPATH**/ ?>