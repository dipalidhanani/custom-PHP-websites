<?php session_start();
	require_once("admin/config.inc.php");
	require_once("admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	
	$txtname=$_POST['txtname'];
	$txtemail=$_POST['txtemail'];
	$comm=$_POST['comment'];
	$sel_product=$_POST['sel_product'];
	$date=date('Y-m-d H:m:s');
	
	if($txtname!='' && $txtemail!='' && $comm!='')
	{
		mysql_query("insert into review_mst(Name,review_email_address,Description,Dt,Prod_Id) values('".$txtname."','".$txtemail."','".$comm."','".$date."','".$sel_product."')") or die(mysql_error()); ?>
	<script language="javascript">
	window.location='<?php echo $_REQUEST['url']; ?>&eid=<?php echo $sel_product; ?>&msg=yes';
	</script>	
	<?php exit; }
	else
	{ ?>
	<script language="javascript">
	window.location='<?php echo $_REQUEST['url']; ?>&eid=<?php echo $sel_product; ?>&msg=no';
	</script>		
	<?php exit; } ?>

