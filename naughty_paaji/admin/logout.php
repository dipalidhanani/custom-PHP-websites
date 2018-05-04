<?php
include("../include/config.php");
session_start();

unset($_SESSION["Admin_id"]);
unset($_SESSION["Admin_name"]);
unset($_SESSION["Email_id"]);
unset($_SESSION["Username"]);
unset($_SESSION['Is_master_admin']);
header("location:login.php");
?>