<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Alerts e.g. approaching your limit</title>
   <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
	<link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Cedarville+Cursive" > 
</head>

<body>
	Hi Musika, <br/><br/>
	
<?php if($details['payout_method']=='Direct Deposit'): ?>
	Payment method information of this Teacher "<?php echo e($details['teacherName']); ?>".<br/><br/>
	Payout Method: <?php echo e($details['payout_method']); ?><br/>
	Type of Account: <?php echo e($details['type_of_account']); ?><br/>
	Account holder's name: <?php echo e($details['accont_holder_name']); ?><br/>
	Routing number: <?php echo e($details['routing_no']); ?><br/>
	Bank Name: <?php echo e($details['bank_name']); ?><br/>
	E-Signature : <span style="font-family: 'Cedarville Cursive';font-size: 25px; text-decoration:underline;height:25px;"><?php echo e($details['e_sign']); ?> </span><br/>
	Date Signed: <?php echo e(date('l, F j, Y',strtotime($details['e_sign_date']))); ?><br/>
	<br/>
<?php elseif($payout_method=='Payment by Mail'): ?> 
	Payment method information of this Teacher "<?php echo e($details['teacherName']); ?>".<br/><br/>
	Payout Method: <?php echo e($details['payout_method']); ?><br/>
	Address Line 1: <?php echo e($details['addressL1']); ?><br/>
	Address Line 2: <?php echo e($details['addressL2']); ?><br/>
	City: <?php echo e($details['city']); ?><br/>
	State: <?php echo e($details['state']); ?><br/>
	ZipCode : <?php echo e($details['zipcode']); ?><br/>
	<br/>
<?php endif; ?>	
	
	From:<br/>
	Musika Lessons

</body>
</html>
<?php /**PATH C:\xampp\htdocs\musikateachers\resources\views/emails/payment_method_info.blade.php ENDPATH**/ ?>