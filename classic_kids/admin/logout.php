<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>
<?php
$now = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];


unset($_SESSION['kidsadminlogin']);

header("Location:login.php");
exit();		
?>

