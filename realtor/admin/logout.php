<?php
session_start();
require_once("../include/config.php");
?>
<?php
$now = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];


unset($_SESSION['rm_admin_id']);

header("Location:login.php");
exit();		
?>

