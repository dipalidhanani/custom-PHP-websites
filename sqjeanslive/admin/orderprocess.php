<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");

$now = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];

$query="update bill_master set bill_payment_status='".$_REQUEST["paymentstatus"]."',bill_order_completed='".$_REQUEST["orderstatus"]."',bill_order_status_note='".$_REQUEST["orderstatusnote"]."',bill_order_status_updated_datetime='".$now."',bill_order_status_updated_ip='".$ip."' where bill_invoice_no='".$_REQUEST["invoice"]."'";
mysql_query($query);

echo "<script type=\"text/javascript\">javascript:window.history.go(-2);</script>\n";
?>
