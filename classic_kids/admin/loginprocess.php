<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>
<?php
$now = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];
$generatedpassword=base64_encode($_REQUEST["kidsadminpassword"]);

				$recordset = mysql_query("select * from kid_admin_mast where kid_username='".$_REQUEST["kidsadmin"]."' and kid_password='".$generatedpassword."'");

				$check=mysql_num_rows($recordset);
		
				while($row = mysql_fetch_array($recordset,MYSQL_ASSOC))
				{	
					  	$managerid=$row["kid_admin_id"];
				}
		
		  if($check!=0)
		  {				
		 
					$_SESSION['kidsadminlogin']=$managerid;								
					header("Location:main.php");				
	      }
		  else
		  {					
					header("Location:login.php?error=wrong");
					exit();
		  }
		
?>

