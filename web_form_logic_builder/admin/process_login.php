<?php @session_start();
include("../config.php");
if($_REQUEST["process"]=="login")
{
$qregister=mysql_query("select * from admin_master where admin_username='".$_REQUEST["txtUsername"]."' and admin_password='".$_REQUEST["txtPassword"]."'");
if(mysql_num_rows($qregister)>0){
$rowlogin=mysql_fetch_array($qregister);
$_SESSION["admin_id"]=$rowlogin["admin_id"];
$_SESSION["admin_name"]=$rowlogin["admin_name"];
$_SESSION["admin_email"]=$rowlogin["admin_email"];
header("location:index.php?page=home");
exit;
}else{
	$_SESSION["errormessage"] = 'Invalid Username or Password';
header("location:index.php?page=login");
exit;
}
}
?>