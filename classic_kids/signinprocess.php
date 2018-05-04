<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>

<?php
$now = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];

		$recordset = mysql_query("select * from register_master where register_user_email='".$_REQUEST["loginemail"]."'  ",$cn);
		
					while($row = mysql_fetch_array($recordset,MYSQL_ASSOC))
					{
						$loginuserid=$row["register_ID"];
						$password=$row["register_user_password"];							
					}
					$generatedpassword=base64_encode($_REQUEST["loginpassword"]);
					
					if(($password==$generatedpassword)&&($_REQUEST["loginemail"]!="")&&($_REQUEST["loginpassword"]))
					{							
								$_SESSION['loginuserid']=$loginuserid;
								$_SESSION['loginusername']=$_REQUEST["loginemail"];
								
								if($_SESSION["pre_url"]!=""){
								
					?>		
							<script language="javascript"> 
								location.href = '<?php echo $_SESSION["pre_url"]; ?>';
							</script>
					<?php	 } else{
						
						?>
                        <script language="javascript"> 
								location.href = 'index.php?content=7&view=profiledetails#t';
							</script>
                        <?php
						}
								exit;	
					 }
					 else
					 {?>		
							<script language="javascript"> 
								location.href = 'index.php?content=14&error=invalid';
							</script>
					<?php							
								exit;	
					 }
					 exit;
?>

