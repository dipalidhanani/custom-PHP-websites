<?php
session_start();
require_once("../include/config.php");

if($_SESSION['rm_admin_id']=="")
{
	echo "<script type=\"text/javascript\">document.location.href='login.php'; </script>\n";
	exit();
}
if($_POST['btnupdate'])
{
	$pid=$_POST['pid'];

	$propname = $_POST['txtproperty'];
	$property = $_POST['ddlptype'];
	if($_POST['status'] == "Yes")
	{
		$s = "Yes";
	}
	else 
	{
		$s = "No";
	}

	$str=mysql_query("update property_master set property_type_id='$property',property_name='$propname' where property_id=$pid");
	if($str)
	{
		$_SESSION['msgu'] = "Record Updated Successfully";
			header("location:propertylist.php");
		
	}
	else
	{
		header("location:editproperty.php");
	}
}
else if($_POST['btnback'])
{
	header("location:propertylist.php");
}
?>