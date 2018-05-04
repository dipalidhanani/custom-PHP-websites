<?php session_start();
	require_once("../admin/config.inc.php");
	require_once("../admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	
	$column=array("User_Name","Password","First_Name","Middle_Name","Last_Name","Address1","Address2","Area","City","Pincode","Country_Id","State_Id","Birthdate","Email_Address","Phone","Mobile","Gender");
	
	$fname=$_POST['fname'];
	$mname=$_POST['mname'];
	$lname=$_POST['lname'];
	$birthdate=$_POST['bdate']."/".$_POST['bmonth']."/".$_POST['byear'];
	$gender=$_POST['gender'];
	$add1=$_POST['add1'];
	$add2=$_POST['add2'];
	$countryid=$_POST['countryid'];
	$state=$_POST['state'];
	$city=$_POST['city'];
	$area=$_POST['area'];
	$zipcode=$_POST['zipcode'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$mobile=$_POST['mobile'];
	$username=$_POST['username'];
	$password=base64_encode($_POST['pass1']);
	$userid=$_SESSION['buserid'];
	$value=array($username,$password,$fname,$mname,$lname,$add1,$add2,$area,$city,$zipcode,$countryid,$state,$birthdate,$email,$phone,$mobile,$gender);
	
	$db->update("user_mst","User_Id",$userid,$column,$value);
	
	
?>

<script language="javascript">
window.location='<?php echo HTTP_BASE_URL_ORDER; ?>myaccount.php?pageno=1&msg=yes';
</script>