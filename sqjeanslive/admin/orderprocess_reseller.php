<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");

$now = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];

$query="update reseller_order_master set order_payment_status='".$_REQUEST["paymentstatus"]."',order_completed_status='".$_REQUEST["orderstatus"]."',order_status_note='".$_REQUEST["orderstatusnote"]."',order_status_updated_datetime='".$now."', 	order_status_updated_ip='".$ip."',order_amount='".$_REQUEST["order_amount"]."' where reseller_order_ID='".$_REQUEST["resellerorderid"]."'";
mysql_query($query);

echo "<script type=\"text/javascript\">javascript:window.history.go(-2);</script>\n";
?>
