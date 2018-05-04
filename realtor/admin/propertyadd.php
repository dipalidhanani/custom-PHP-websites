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
	$proptype = $_POST['ddlptype'];
	$pname = $_POST['txtproperty'];
	if($_POST['status'] == "Yes")
	{
		$s = "Yes";
	}
	else 
	{
		$s = "No";
	}
	$result = mysql_query("select * from property_master where property_name='$pname'");
	if(mysql_num_rows($result)==0 && $pname!="")
	{
		mysql_query("INSERT INTO property_master(property_type_id,property_name,property_status) values('$proptype','$pname','$s')");
	
		$_SESSION['msgi'] = "Record Inserted Successfully.";
		header("location:propertylist.php");
	
	}
	else
	{	
		$_SESSION['already'] = "Property name already exist";
		header("location:property.php?nm=$ptype");
	
	
	}
}
?>