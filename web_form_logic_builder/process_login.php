<?php @session_start();
include("config.php");
if($_REQUEST["process"]=="login")
{
$qregister=mysql_query("select * from user_master where user_username='".$_REQUEST["txtUsername"]."' and user_password='".$_REQUEST["txtPassword"]."'");
if(mysql_num_rows($qregister)>0){
$rowlogin=mysql_fetch_array($qregister);
$_SESSION["user_id"]=$rowlogin["user_id"];
$_SESSION["user_fullname"]=$rowlogin["user_fullname"];
$_SESSION["user_email"]=$rowlogin["user_email"];
header("location:index.php?page=my-account");
exit;
}else{
	$_SESSION["errormessage"] = 'Invalid Username or Password';
header("location:index.php?page=login");
exit;
}
}
?>