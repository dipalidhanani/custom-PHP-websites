<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>

<?php
$invoice=$_REQUEST["invoice"];

$currenttime = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];

$qry="INSERT INTO paypal_table (payer_id,payment_date,txn_id,first_name,last_name,payer_email,payer_status,payment_type,memo,item_name,invoice,quantity,mc_gross,mc_currency,address_name,address_street,address_city,address_state,address_zip,address_country,address_status,payer_business_name,payment_status,pending_reason,reason_code,txn_type) VALUES 
('".$_REQUEST["payer_id"]."','".$_REQUEST["payment_date"]."', '".$_REQUEST["txn_id"]."', '".$_REQUEST["first_name"]."', '".$_REQUEST["last_name"]."', '".$_REQUEST["payer_email"]."', '".$_REQUEST["payer_status"]."', '".$_REQUEST["payment_type"]."', '".$_REQUEST["memo"]."', '".$_REQUEST["item_name"]."', '".$_REQUEST["invoice"]."', '".$_REQUEST["quantity"]."', '".$_REQUEST["mc_gross"]."', '".$_REQUEST["mc_currency"]."', '".$_REQUEST["address_name"]."', '".$_REQUEST["address_street"]."', '".$_REQUEST["address_city"]."', '".$_REQUEST["address_state"]."', '".$_REQUEST["address_zip"]."', '".$_REQUEST["address_country"]."', '".$_REQUEST["address_status"]."', '".$_REQUEST["payer_business_name"]."', '".$_REQUEST["payment_status"]."', '".$_REQUEST["pending_reason"]."', '".$_REQUEST["reason_code"]."', '".$_REQUEST["txn_type"]."')";

mysql_query($qry);
?>
