<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>
<?php
$now = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];

$generatedpassword=base64_encode($_REQUEST["resellerpassword"]);


		  $recordset = mysql_query("select * from reseller_master 		  
		  where 
		  reseller_emailid ='".$_REQUEST["reselleremail"]."' and
		  reseller_password='".$generatedpassword."'
		  ",$cn);
		
		  $check=mysql_num_rows($recordset);
		
		  while($row = mysql_fetch_array($recordset,MYSQL_ASSOC))
		  {
		  		$resellerloginid=$row["reseller_id"];
			    $resellerloginname=$row["reseller_name"];
				$resellerloginemail=$row["reseller_emailid"];
		  
		}			
		  if($check!=0)
		  {						
					$_SESSION['sqjeansresellerlogin']=$resellerloginid;	
					$_SESSION['sqjeansresellerloginname']=$resellerloginname;
					$_SESSION['sqjeansresellerloginemail']=$resellerloginemail;
					header("Location:main.php");
					
	      }
		  else
		  {				
					header("Location:login.php?error=wrong");
					exit();
		  }
		  
?>

