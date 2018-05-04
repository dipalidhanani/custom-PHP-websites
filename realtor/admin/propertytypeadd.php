<?php
session_start();
require_once("../include/config.php");

if($_SESSION['rm_admin_id']=="")
{
	echo "<script type=\"text/javascript\">document.location.href='login.php'; </script>\n";
	exit();
}
if($_POST['Add'])
{
	$ptype = $_POST['txtproptype'];
	$result = mysql_query("select * from property_type_master where property_type_name='$ptype'");
	if(mysql_num_rows($result)==0 && $ptype!="")
	{
		mysql_query("INSERT INTO property_type_master(property_type_name) values('$ptype')");
		$_SESSION['msgi'] = "Record Inserted Successfully.";
		header("location:property_typelist.php");
	}
	else
	{	
		$_SESSION['already'] = "Property type name already exist";
		header("location:property_type.php?nm=$ptype");
	
	}
}
?>