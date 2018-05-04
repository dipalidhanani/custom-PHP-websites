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
	$ptid=$_POST['ptid'];

	$name = $_POST['txtproptype'];
	$str=mysql_query("update property_type_master set property_type_name='$name' where property_type_id=$ptid");
	if($str)
		{
			$_SESSION['msgu'] = "Record Updated Successfully";
			header("location:property_typelist.php");
		
		
		}
		else
		{
			header("location:editproperty_type.php");
		}
}
else if($_POST['btnback'])
{
	header("location:property_typelist.php");
}

?>