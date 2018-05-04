<?php
session_start();
require_once("../include/config.php");

if($_SESSION['rm_admin_id']=="")
{
	echo "<script type=\"text/javascript\">document.location.href='login.php'; </script>\n";
	exit();
}


$pid=$_GET['pid'];

$str1=mysql_query("delete from property_propertydetail_additionalroom where property_propertydetail_additionalroom_property_propertydetailid='$pid'");
$str2=mysql_query("delete from property_propertydetail_amenities where property_propertydetail_amenities_property_id='$pid'");
$str3=mysql_query("delete from property_propertydetail_master where property_propertydetail_id='$pid'");
	
	if($str3)
	{
		$_SESSION['msgd'] = "Record deleted successfully";
		header("location:propertyDetail_list.php");
	}
	else
	{
		header("location:propertyDetail_list.php");
	}


?>