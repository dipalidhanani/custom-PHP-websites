<?php

session_start();

require_once("include/config.php");

require_once("include/function.php");

u_Connect("cn");



$now = date("Y-m-d H:i:s");

$ip=$_SERVER['REMOTE_ADDR'];



//$query="insert into register_user_login_logout_records (login_logout_user_id,login_logout_datetime,login_logout_IP_address,IS_login_logout) values ('".$_SESSION['loginuserid']."','".$now."','".$ip."',2)";
//
//mysql_query($query);

								

unset($_SESSION['loginuserid']);

unset($_SESSION['loginusername']);

unset($_SESSION["pre_url"]);





header("Location:index.php?content=14");

exit();





		

?>



