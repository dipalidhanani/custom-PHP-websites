<?php
session_start();
require_once("../include/config.php");

if($_SESSION['rm_admin_id']=="")
{
	echo "<script type=\"text/javascript\">document.location.href='login.php'; </script>\n";
	exit();
}

$str=mysql_query("update property_propertydetail_master set property_propertydetail_status='".$_REQUEST["status"]."' where property_propertydetail_id='".$_REQUEST["pid"]."'") or die(mysql_error());
	
	
		header("location:propertyDetail_list.php");
	exit;
?>