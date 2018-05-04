<?php session_start();
include("include/config.php");

$disid=$_GET["disid"];
$userid=$_GET["userid"];
$value=$_GET["value"];
$query=mysql_query("insert into discussion_rate(discussion_board_id,rate_value,discussion_rate_from_id) values('".$disid."','".$value."','".$userid."')"); 

header("location:index.php?page=9&discussion_board_id=".$disid."");
?>