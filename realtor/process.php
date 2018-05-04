<?php
session_start();
require_once("include/config.php");

$now = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];

if($_REQUEST["process"]=="updateprofile")
{
	$query="update rm_user_registration set
	 rm_user_name='".$_REQUEST["name"]."',	
	 rm_user_address='".$_REQUEST["address"]."',	
	 rm_user_mobile_no ='".$_REQUEST["mobile"]."'	
	where rm_user_reg_id='".$_SESSION['user_reg_id']."' and rm_user_email='".$_SESSION['email']."'
	 ";

	mysql_query($query);
	
	header("Location:home.php?pageno=33&view=profiledetails#t");
	exit();
	
}
if($_REQUEST["process"]=="changepassword")
{
	$recordsetmypassword = mysql_query("select * from rm_user_registration where rm_user_reg_id='".$_SESSION['user_reg_id']."' and rm_user_email='".$_SESSION['email']."' and rm_user_password='".$_REQUEST["oldpassword"]."'");
	
	if(mysql_num_rows($recordsetmypassword)==0)
	{
		header("Location:home.php?pageno=33&view=changepassword&msg=no#t");
		exit();
	}
	else
	{
		$update="update rm_user_registration set rm_user_password='".$_REQUEST["newpassword"]."' where rm_user_reg_id='".$_SESSION['user_reg_id']."' and rm_user_email='".$_SESSION['email']."' and rm_user_password='".$_REQUEST["oldpassword"]."'";
		mysql_query($update);
	}
	
	header("Location:home.php?pageno=33&view=changepassword&msg=yes#t");
		exit();
}

?>