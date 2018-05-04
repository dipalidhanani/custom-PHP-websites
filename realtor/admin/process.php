<?php session_start();
require_once("../include/config.php");
?>
<?php
$now = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];


if($_REQUEST["process"]=="deleteuser")
{
	$query="delete from rm_user_registration where rm_user_reg_id='".$_REQUEST["user_id"]."'";
	mysql_query($query);
		
		header("Location:registered_users.php");
		exit();
}

if($_REQUEST["process"]=="deletecontact")
{
	$query="delete from contact where contact_id='".$_REQUEST["contact_id"]."'";
	mysql_query($query);
		
		header("Location:contact_display.php");
		exit();
}
if($_REQUEST["process"]=="deleteinq")
{
	$query="delete from inquiry where inquiry_id='".$_REQUEST["inquiry_id"]."'";
	mysql_query($query);
		
		header("Location:inquiry_display.php");
		exit();
}
if($_REQUEST["process"]=="changepassword")
{
	$query="update rm_admin_master set rm_admin_password='".base64_encode($_REQUEST["newpassword"])."' where rm_admin_id ='".$_SESSION['rm_admin_id']."'";
		mysql_query($query);
		
		header("Location:changepassword.php?msg=change");
		exit();
}
?>

