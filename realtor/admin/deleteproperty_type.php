<?php
session_start();
require_once("../include/config.php");

if($_SESSION['rm_admin_id']=="")
{
	echo "<script type=\"text/javascript\">document.location.href='login.php'; </script>\n";
	exit();
}

$ptid=$_GET['ptid'];

$str=mysql_query("delete from property_type_master where property_type_id='$ptid'");
	
	if($str)
	{
		$_SESSION['msgd'] = "Record deleted successfully";
		header("location:property_typelist.php");
	}
	else
	{
		
		header("location:property_typelist.php");
	}
?>