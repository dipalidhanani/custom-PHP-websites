<?php
session_start();
$_SESSION["fabric_for"]=$_REQUEST["fabric_for"];
$_SESSION["display_order_for"]=$_REQUEST["display_order_for"];

header("Location:customjeans-step1.html");
exit();
?>