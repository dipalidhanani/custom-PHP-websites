<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>
<?php
$now = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];

$generatedpassword=base64_encode($_REQUEST["adminpassword"]);


		  $recordset = mysql_query("select * from admin_master 		  
		  where 
		  admin_username='".$_REQUEST["adminusername"]."' and
		  admin_password='".$generatedpassword."'
		  ",$cn);
		
		  $check=mysql_num_rows($recordset);
		
		  while($row = mysql_fetch_array($recordset,MYSQL_ASSOC))
		  {
		  		$adminloginid=$row["admin_ID"];
				$masteradmin=$row["admin_is_master"];
		  }
						
		  if($check!=0)
		  {					
					$_SESSION['sqjeansadminlogin']=$adminloginid;	
					$_SESSION['ismasteradminlogin']=$masteradmin;	
					
					header("Location:main.php");				
	      }
		  else
		  {					
					header("Location:login.php?error=wrong");
					exit();
		  }
		
?>

