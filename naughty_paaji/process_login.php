<?php session_start();
include("include/config.php");
$errormsg ="";

		$info = mysql_query("select * from user_registration");
		$data = mysql_fetch_array($info);

if($_POST["process"]=="login")
{
	if($_POST["txtEmail"]=="" || $_POST["txtPass"]=="")
	{
		$errormsg = "Please enter Email Address or Password!";
		
	}
	else
	{
		$email =  $_POST["txtEmail"];
		$password =  $_POST["txtPass"];
		
		$info = mysql_query("select * from user_registration where email='".$email."' and password='".$password."'") or die(mysql_error());
		
		if($a = mysql_fetch_array($info))
		{
			$_SESSION["user_reg_id"] = $a["user_reg_id"];
			$_SESSION["first_name"] = $a["first_name"];
			$_SESSION["last_name"] = $a["last_name"];
			$_SESSION["email"] = $a["email"];
			
			if($_SERVER["HTTP_REFERER"]=="index.php?page=6")
			{
			header("Location:index.php");
			}
			else
			{
			header("Location:".$_SERVER["HTTP_REFERER"]);
			}
		}
		else
		{
			$errormsg = "Invalid Email Address or Password!";
			if($_SERVER["HTTP_REFERER"]=="index.php?page=6&errormsg=".$errormsg."")
			{
			header("location:index.php?page=6&errormsg=".$errormsg."");
			}
			else
			{
			header("Location:".$_SERVER["HTTP_REFERER"]."&errormsg=".$errormsg);
			}
			
			exit;
		}
		
		
	}
	
		if($_SERVER["HTTP_REFERER"]=="index.php?page=6")
		{
			header("Location:index.php");
		}
		else
		{
			header("Location:".$_SERVER["HTTP_REFERER"]);
		}
}

?>