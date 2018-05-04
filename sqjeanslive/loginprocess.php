<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>
<?php
$now = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];

					$recordset = mysql_query("select * from register_master where register_user_email='".$_REQUEST["sqjeansemail"]."'  ",$cn);
		
					while($row = mysql_fetch_array($recordset,MYSQL_ASSOC))
					{
						$sqjeansloginuserid=$row["register_ID"];
						$password=$row["register_user_password"];							
					}
					$generatedpassword=base64_encode($_REQUEST["sqjeanspassword"]);					
						
					if(($password==$generatedpassword)&&($_REQUEST["sqjeansemail"]!="")&&($_REQUEST["sqjeanspassword"]))
					{
							
								$_SESSION['sqjeansloginuserid']=$sqjeansloginuserid;
								$_SESSION['sqjeansloginuseremail']=$_REQUEST["sqjeansemail"];								
								
								header("Location:myprofile.html");
								exit();	
					 }
					 else
					 {
							header("Location:index.php?error=invalid");
								exit();	
					 }
?>

