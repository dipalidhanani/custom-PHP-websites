<?php
session_start();
include("../include/config.php");

if($_SESSION['Admin_id'] == "")
	{
			//echo "Unauthorised Access !!!";die;
			echo "<script>location.href='login.php';</script>";
			exit();
	}
	
	                  /////////// Insert  //////////
	
	
if($_REQUEST["process"]=="Add")
{
	$name=$_POST["txtName"];
$pass=$_POST["txtPass"];
$email=$_POST["txtEmail"];
$mobile=$_POST["txtMobile"];
$username=$_POST["txtUser"];


$query="insert into admin_mast(admin_name,email_id,username,password,mobileno,is_master_admin) values('".$name."','".$email."','".$username."','".$pass."','".$mobile."',0)";
$result=mysql_query($query)
or die(mysql_error());
header("location:disAdmin.php");
}

                       ////////// Edit /////////////


if($_REQUEST["process"]=="Edit")
{
$Adid=$_POST["hdnAdid"];
$name=$_POST["txtName"];
$pass=$_POST["txtPass"];
$email=$_POST["txtEmail"];
$mobile=$_POST["txtMobile"];
$username=$_POST["txtUser"];

$query="update admin_mast set admin_name='".$name."',email_id='".$email."',username='".$username."',password='".$pass."',mobileno='".$mobile."' where admin_id='".$Adid."'";

$result=mysql_query($query)
or die(mysql_error());
header("location:disAdmin.php");
	
}

                       ///////////  Delete  //////////
					   

if($_REQUEST["process"]=="delete")
{
$Adid=$_GET["Admin_id"];

$query="delete from admin_mast where admin_id='".$Adid."'";

$result=mysql_query($query)
or die(mysql_error());
header("location:disAdmin.php");
	
}
?>