<?php 
if($_REQUEST["process"]=="addcoupon")
{
	
$query="insert into kid_voucher_coupon (kid_coupon_name,kid_coupon_amount,kid_minimum_purchase_value,kid_expiration_from_date,kid_expiration_to_date,kid_maximum_time_coupon_can_be_used,kid_coupon_active_status) values ('".$_REQUEST["coupon_name"]."','".$_REQUEST["coupon_amount"]."','".$_REQUEST["minimum_purchase_value"]."','".$_REQUEST["expiration_date_from"]."','".$_REQUEST["expiration_date_to"]."','".$_REQUEST["maximum_time_coupon_can_be_used"]."','".$_REQUEST["coupon_status"]."')";
	
	mysql_query($query);
	
	header("Location:coupon.php");
	exit();
}
if($_REQUEST["process"]=="editcoupon")
{		
	$query="update kid_voucher_coupon set 
	kid_coupon_name='".$_REQUEST["coupon_name"]."',
	kid_coupon_amount='".$_REQUEST["coupon_amount"]."',			
	kid_minimum_purchase_value='".$_REQUEST["minimum_purchase_value"]."',
	kid_expiration_from_date='".$_REQUEST["expiration_date_from"]."',
	kid_expiration_to_date='".$_REQUEST["expiration_date_to"]."',	
	kid_maximum_time_coupon_can_be_used='".$_REQUEST["maximum_time_coupon_can_be_used"]."',
	kid_coupon_active_status='".$_REQUEST["coupon_status"]."'
	where kid_coupon_id='".$_REQUEST["coupon_id"]."'
	";
	
	mysql_query($query);	
	
	header("Location:coupon.php");
	exit();
}
?>