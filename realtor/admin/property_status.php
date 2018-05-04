<?php
session_start();
require_once("../include/config.php");

if($_SESSION['rm_admin_id']=="")
{
	echo "<script type=\"text/javascript\">document.location.href='login.php'; </script>\n";
	exit();
}

$str=mysql_query("update property_master set property_status='".$_GET["status"]."' where property_id='".$_GET["pid"]."'");
	
	
		header("location:propertylist.php?category=".$_GET["category"]."");
	exit;
?>