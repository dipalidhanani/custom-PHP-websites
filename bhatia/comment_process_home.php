<?php session_start();
	require_once("admin/config.inc.php");
	require_once("admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	
	$txtname=$_POST['txtname_home'];
	$txtemail=$_POST['txtemail_home'];
	$comm=$_POST['comment_home'];
	$sel_product=$_POST['sel_product_home'];
	$date=date('Y-m-d H:m:s');
	
	if($txtname!='' && $txtemail!='' && $comm!='')
	{
		mysql_query("insert into review_mst(Name,review_email_address,Description,Dt,Prod_Id) values('".$txtname."','".$txtemail."','".$comm."','".$date."','".$sel_product."')") or die(mysql_error()); ?>
	<script language="javascript">
	alert('Thank you for your review.Your review will display after admin approval.');
	window.location='<?php echo HTTP_BASE_URL; ?>index.php';
	</script>	
	<?php exit; }
	else
	{ ?>
	<script language="javascript">
	alert('Please enter required fields value.');
	window.location='<?php echo HTTP_BASE_URL; ?>index.php';
	</script>		
	<?php exit; } ?>

