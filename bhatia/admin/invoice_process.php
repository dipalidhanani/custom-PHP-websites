<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();  
	
	$is_edit=$_REQUEST['is_edit'];
	
	$odata=mysql_query("select * from bill_mst where Billing_Id='".$is_edit."'");
	$ob=mysql_fetch_array($odata);
	$orderid=$ob['Order_Id'];

	$ostatus=$_POST['ostatus'];
	$descr=$_POST['descr'];
	$rem='0.00';
	if($ostatus=='Completed')
	{
		mysql_query("update bill_mst set Status='".$ostatus."',Bill_Amount='".$ob['Bill_Amount']."',Remaing_Amount='".$rem."',Description='".$descr."' where Billing_Id='".$is_edit."'") or die(mysql_error());
		
		mysql_query("update order_mst set Payment_Status='Completed' where Order_Id='".$orderid."'") or die(mysql_error());
	}
	else if($ostatus=='Cancelled')
	{
		mysql_query("update bill_mst set Status='Cancelled',Description='".$descr."' where Billing_Id='".$is_edit."'") or die(mysql_error());
	}
	else
	{
		mysql_query("update bill_mst set Description='".$descr."' where Billing_Id='".$is_edit."'") or die(mysql_error());
	}
	
?>	
<script language="javascript">
window.location='invoice.php';
</script>