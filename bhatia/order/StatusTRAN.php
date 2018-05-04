<?php
session_start();

	require_once("../admin/config.inc.php");
	require_once("../admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();

$txmessage = isset($_GET['message']) ? $_GET['message'] : '';
$txmeid= isset($_GET['ME_TX_ID']) ? $_GET['ME_TX_ID'] : '';

$result= isset($_GET['result']) ? $_GET['result'] : '';


$recordsetcheckorder = mysql_query("select * from order_mst
INNER JOIN prod_order_mst ON prod_order_mst.Order_Id=order_mst.Order_Id
 where 
 prod_order_mst.order_invoice_Id='".$txmeid."' and
 Pay_Mode='Online' and
 Payment_Status='Completed'  and
 ( Payment_Provider_Response_Status='CAPTURED' or Payment_Provider_Response_Status='APPROVED' )
 ");

if(mysql_num_rows($recordsetcheckorder)!=0)
{

$_SESSION["hdfc_payment_message"]=$txmessage;
$_SESSION["hdfc_payment_transactionid"]=$txmeid;
$_SESSION["hdfc_payment_result"]=$result;
				
		
		$_SESSION['shopcart']='';
		$_SESSION['cartno']='';


echo "<script type=\"text/javascript\">document.location.href='index.php?pageno=25'; </script>\n";
exit();
}
else
{
	echo "<script type=\"text/javascript\">document.location.href='FailedTRAN.php?message=ERROR IN PROCESSING PAYMENT(ILLEGAL ACCESS)'; </script>\n";
	exit();
}
?>
