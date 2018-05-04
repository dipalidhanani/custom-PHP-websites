<?php session_start();
include("include/config.php");
$errormsg ="";

	

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
		
		$info = mysql_query("select * from rm_user_registration where rm_user_email='".$email."' and rm_user_password='".$password."'") or die(mysql_error());
		
		if($a = mysql_fetch_array($info))
		{
			$_SESSION["user_reg_id"] = $a["rm_user_reg_id"];
			$_SESSION["name"] = $a["rm_user_name"];			
			$_SESSION["email"] = $a["rm_user_email"];
				
				if($_SESSION["pre_url"]!=""){
								
					?>		
							<script language="javascript"> 
								location.href = '<?php echo $_SESSION["pre_url"]; ?>';
							</script>
					<?php	 } else{
						
						?>
                        <script language="javascript"> 
								location.href = 'home.php?pageno=33&view=profiledetails#t';
							</script>
                        <?php
						}
			
		}
		else
		{
			$errormsg = "Invalid Email Address or Password!";
			if($_SERVER["HTTP_REFERER"]=="home.php?pageno=6&errormsg=".$errormsg."")
			{
			header("location:home.php?pageno=6&errormsg=".$errormsg."");
			}
			else
			{
			header("Location:".$_SERVER["HTTP_REFERER"]."&errormsg=".$errormsg);
			}			
			exit;
		}
		
		
	}
	
		header("Location:home.php?pageno=33&view=profiledetails#t");
		exit;
}

?>