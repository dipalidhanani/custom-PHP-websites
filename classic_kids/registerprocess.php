<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");


	
$now = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];

$recordsetprofile = mysql_query("select * from register_master where register_user_email='".$_REQUEST["email"]."'");


if(mysql_num_rows($recordsetprofile)==1)
{
	header("Location:index.php?content=4&error=email");
	exit();
}

else
{
	$dt1=explode("-",$_POST["dateofbirth"]);
	$dd1=$dt1[0];
	$mm1=$dt1[1];
	$yy1=$dt1[2];
	
	$birthdate=$yy1."-".$mm1."-".$dd1;
	$query="insert into register_master 
	(
	 register_user_first_name,
	 register_user_last_name,
	 register_user_birth_date,
	 register_user_unit,
	 register_user_street,
	 register_user_subburb,
	 register_user_state,
	 register_user_pincode,
	 register_user_country,
	 register_user_email,
	 register_user_password,
	 register_user_phone,
	 register_user_mobile,	 
	 registration_date_time,
	 registration_IP
	 )
	values
	(
	 '".$_REQUEST["firstname"]."',
	 '".$_REQUEST["lastname"]."',
	 '".$birthdate."',
	 '".$_REQUEST["unit"]."',
	 '".$_REQUEST["street"]."',
	 '".$_REQUEST["subburb"]."',
	 '".$_REQUEST["state"]."',
	 '".$_REQUEST["pincode"]."',
	 '".$_REQUEST["country"]."',
	 '".$_REQUEST["email"]."',
	 '".base64_encode($_REQUEST["password"])."',	 
	 '".$_REQUEST["phone"]."',
	 '".$_REQUEST["mobile"]."',
	 '".$now."',
	 '".$ip."'
	 )	
	";
	mysql_query($query);



						function u_SendMail($FromMail,$ToMail,$Data,$Subject)
						{
							$headers = "MIME-Version: 1.0\n"; 
							$headers .= "Content-type: text/html; charset=iso-8859-1\n";
							
							$headers .= "From: $FromMail\n";
						
							if(strpos($_SERVER['SERVER_NAME'],".com"))
							{
								$myresult=mail($ToMail, $Subject , $Data, $headers);
							}					
						}	
						
						$FromMail="Klassic Kids <info@klassickids.com>";
						$ToMail=$_REQUEST["email"];
											
						$Data= 'Cogratulations! '.$_REQUEST["firstname"].' '.$_REQUEST["lastname"].',<br /><br />
						
						You are now a registered member of Klassic Kids<br /><br />
                       						
						Your login details are given below.<br /><br />
						
						Email : '.$_REQUEST["email"].'<br />
						Password : '.$_REQUEST["password"].'<br /><br />						
						
						Regards,<br />
						Klassic Kids Team';
						
													
						$Subject= "Registration @ Klassic Kids";						
							
						u_SendMail($FromMail,$ToMail,$Data,$Subject);
						
						
						$FromMail=$_REQUEST["firstname"].' '.$_REQUEST["lastname"]. "<".$_REQUEST["email"].">";
						$ToMail="info@klassickids.com";
											
						$Data= 'Dear Admin, <br /><br />
						
						New member registration on Klassic Kids<br /><br />
                       						
						Member details are below.<br /><br />
						
						Name : '.$_REQUEST["firstname"].' '.$_REQUEST["lastname"].'<br />
						Email : '.$_REQUEST["email"].'<br />
						Country : '.$_REQUEST["country"].'<br /><br />						
						
						Regards';
						
													
						$Subject= "New Registration @ Klassic Kids";						
							
						u_SendMail($FromMail,$ToMail,$Data,$Subject);	

header("Location:index.php?content=5&value=register");
exit();
}


?>