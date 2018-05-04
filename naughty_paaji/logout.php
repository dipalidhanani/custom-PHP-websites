<?php
session_start();
include("include/config.php"); 
require_once("include/function.php");

unset($_SESSION["user_reg_id"]);
			unset($_SESSION["first_name"]);
			unset($_SESSION["last_name"]);
			unset($_SESSION["email"]);


header("location:index.php?page=6");
exit;
?>