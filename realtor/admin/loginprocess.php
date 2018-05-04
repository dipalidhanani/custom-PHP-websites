<?php
session_start();
require_once("../include/config.php");

$now = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];
$generatedpassword=base64_encode($_REQUEST["admin_password"]);

				$query = mysql_query("select * from rm_admin_master where rm_admin_name ='".$_REQUEST["admin_name"]."' and rm_admin_password='".$generatedpassword."' ") or die(mysql_error());
		
				$check=mysql_num_rows($query);
				
				$result=mysql_fetch_array($query);
		
		  if($check!=0)
		  {							
					$_SESSION['rm_admin_id']=$result['rm_admin_id'];	
					
					header("Location:main.php");				
	      }
		  else
		  {					
					header("Location:login.php?error=wrong");
					exit();
		  }
		
?>

