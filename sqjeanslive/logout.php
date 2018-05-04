<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");

unset($_SESSION['sqjeansloginuserid']);
unset($_SESSION['sqjeansloginuseremail']);
unset($_SESSION['sqjeanscart']);
unset($_SESSION['cartno']);
unset($_SESSION['selectedmaterialid']);
unset($_SESSION['selectedspecialwash']);
unset($_SESSION['selectedthread_main']);
unset($_SESSION['selectedthread_second']);
unset($_SESSION['selectedprocketstyle']);
unset($_SESSION['selectedprocketstyle_back']);
unset($_SESSION['selectedflystyle']);

header("Location:index.php");
exit();
?>



