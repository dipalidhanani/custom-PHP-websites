<?php 
session_start();
include("session_check.php");
require("config.inc.php"); 
require("Database.class.php"); 
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
$db->connect(); 

$is_edit=$_REQUEST['is_edit'];

$column=array("User_Name","Password","First_Name","Middle_Name","Last_Name","Address1","Address2","Area","City","Pincode","Country_Id","State_Id","Birthdate","Email_Address","Phone","Mobile","Gender","Register_Date");
 
	$fname=$_POST["fname"];
	$mname=$_POST['mname'];
	$lname=$_POST["lname"];
	$gender=$_POST["gender"];
	$bdate=$_POST["bdate"]."/".$_POST["bmonth"]."/".$_POST["byear"];
	$add1=$_POST["add1"];
	$add2=$_POST["add2"];
	$area=$_POST["area"];
	$zipcode=$_POST["zipcode"];
	$country=$_POST["countryid"];
	$state=$_POST["state"];
	$city=$_POST["city"];
	$username=$_POST["username"];
	$pass=base64_encode($_POST["password"]);
	$email=$_POST["email"];
	$phone=$_POST["phone"];
	$mobile=$_POST["mobile"];
    $rdate=date('Y-m-d H:i:s');
	$gender=$_POST['gender'];
	
	$value=array($username,$pass,$fname,$mname,$lname,$add1,$add2,$area,$city,$zipcode,$country,$state,$bdate,$email,$phone,$mobile,$gender,$rdate);


if($is_edit==1)
{ 
	$txtid=$_POST['txtid'];
	$db->update("user_mst","User_Id",$txtid,$column,$value);
	
}
else
{ 
	$db->insert("user_mst",$column,$value);
}
?>
<script type="text/javascript">
window.location ='user.php';
</script>
