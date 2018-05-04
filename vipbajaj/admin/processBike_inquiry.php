<?php
session_start();
include("include/config.php");

if($_SESSION['Admin_id'] == "")
	{
			//echo "Unauthorised Access !!!";die;
			echo "<script>location.href='login.php';</script>";
			exit();
	}

if($_REQUEST["process"]=="delete")
{
	$query=mysql_query("delete from bike_inquiry where bike_inquiry_id='".$_GET['bike_inquiry_id']."'");
	
header("Location:bike_inquiry.php");
exit();
	}
?>