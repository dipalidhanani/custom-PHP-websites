<?php
session_start();
include("include/config.php");
require_once("include/function.php");
u_Connect("cn");
if($_SESSION['kidsadminlogin'] == "")
	{
			//echo "Unauthorised Access !!!";die;
			echo "<script>location.href='login.php';</script>";
			exit();
	}
	
	                  /////////// Insert  //////////
	
	
if($_REQUEST["process"]=="Add")
{
	$name=$_POST["txtName"];
$pass=base64_encode($_POST["txtPass"]);
$email=$_POST["txtEmail"];
$mobile=$_POST["txtMobile"];
$username=$_POST["txtUser"];


$query="insert into kid_admin_mast(kid_admin_name,kid_username,kid_password,kid_mobileno,kid_admin_is_master) values('".$name."','".$username."','".$pass."','".$mobile."',0)";
$result=mysql_query($query)
or die(mysql_error());
header("location:disAdmin.php");
}

                       ////////// Edit /////////////


if($_REQUEST["process"]=="Edit")
{
$Adid=$_POST["hdnAdid"];
$name=$_POST["txtName"];
$pass=base64_encode($_POST["txtPass"]);
$email=$_POST["txtEmail"];
$mobile=$_POST["txtMobile"];
$username=$_POST["txtUser"];

 $query="update kid_admin_mast set kid_admin_name='".$name."',kid_username='".$username."',kid_password='".$pass."',kid_mobileno='".$mobile."' where kid_admin_id='".$Adid."'";
$result=mysql_query($query)
or die(mysql_error());
header("location:disAdmin.php");	
}

                       ///////////  Delete  //////////
					   

if($_REQUEST["process"]=="delete")
{
$Adid=$_GET["Admin_id"];

$query="delete from kid_admin_mast where kid_admin_id='".$Adid."'";

$result=mysql_query($query)
or die(mysql_error());
header("location:disAdmin.php");
}
?>