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
	$query=mysql_query("delete from door_step where Doorstep_id='".$_GET['doorstepid']."'");
	
header("Location:door_step.php");
exit();
	}
?>