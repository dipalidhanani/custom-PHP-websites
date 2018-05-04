<?php

session_start();

require_once("include/config.php");

$now = date("Y-m-d H:i:s");

$ip=$_SERVER['REMOTE_ADDR'];



//$query="insert into register_user_login_logout_records (login_logout_user_id,login_logout_datetime,login_logout_IP_address,IS_login_logout) values ('".$_SESSION['loginuserid']."','".$now."','".$ip."',2)";
//
//mysql_query($query);

								

unset($_SESSION['user_reg_id']);

unset($_SESSION['name']);

unset($_SESSION['email']);

unset($_SESSION["pre_url"]);

unset($_SESSION['city']);
unset($_SESSION['areaid']);
unset($_SESSION['areacode']);
unset($_SESSION['ddlpost']);
unset($_SESSION['ddlptype']);
unset($_SESSION['minprice']);
unset($_SESSION['maxprice']);



header("Location:home.php?pageno=18");

exit();





		

?>



