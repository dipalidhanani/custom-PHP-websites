<?php 
session_start();
require_once("../include/config.php");
////////////////////  Edit profile  ///////////////

if($_REQUEST["process"]=="Edit")
{
$first_name=$_POST["first_name"];
$last_name=$_POST["last_name"];
$password=$_POST["password"];

$country=$_POST["cmbCountry"];
$state=$_POST["cmbState"];
$city=$_POST["city"];
$address=$_POST["address"];
$pincode=$_POST["pincode"];
$code=$_POST["code"];
$no=$_POST["contact_no"];
$mobile_no=$_POST["mobile_no"];

$contact_no=$code."-".$no;
$userid=$_POST["hdnUserid"];
	
$editquery=mysql_query("update user_registration set first_name='".$first_name."',last_name='".$last_name."',password='".$password."',country_mast_id='".$country."',state_mast_id='".$state."',city='".$city."',address='".$address."',pincode='".$pincode."',contact_no='".$contact_no."',mobile_no='".$mobile_no."' where user_reg_id='".$userid."' ");

header("location:registered_user.php");

}

?>