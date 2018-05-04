<?php
session_start();
require_once("../include/config.php");

if($_SESSION['rm_admin_id']=="")
{
	echo "<script type=\"text/javascript\">document.location.href='login.php'; </script>\n";
	exit();
}

$pid=$_GET['pid'];

$str=mysql_query("delete from property_master where property_id='$pid'");
	
	if($str)
	{
		$_SESSION['msgd'] = "Record deleted successfully";
		header("location:propertylist.php");
	}
	else
	{
		header("location:propertylist.php");
	}
?>