<?php session_start();
include("include/config.php");

/////////// Insert  //////////
	
	
if($_REQUEST["process"]=="Add")
{
	
	$err_msg="";
	$emailerr="";
	
	
	if(($_SESSION['security_code']==$_POST["security_code"]))
	{
$name=$_POST["name"];
$address=$_POST["address"];
$email=$_POST["email"];
$password=$_POST["password"];

$mobile_no=$_POST["mobile_no"];

$contact_no=$code."-".$no;

$register_datetime=date("Y-m-d H:i:s");

$query="insert into rm_user_registration(rm_user_name,rm_user_address,rm_user_email,rm_user_password,rm_user_mobile_no,rm_user_register_datetime) values('".$name."','".$address."','".$email."','".$password."','".$mobile_no."','".$register_datetime."')";
$result=mysql_query($query)
or die(mysql_error());

$id=mysql_insert_id();
$_SESSION["user_reg_id_tmp"]=$id;

////// send mail to user //////

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
						$FromMail="Realtor <nilesh@indoushosting.com>";
						$Subject="WELCOME";
						
$Data='<table>
<tr><td>&nbsp;</td></tr>
<tr><td>One user has successfully registered with your portal.</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>Log in details are :
</td></tr>
<tr><td>Username : '.$email.'</td></tr>
<tr><td>Password : '.$password.'</td></tr>
<tr><td>Please log in to the admin panel to view other registraion details.</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>Thanks and Regards,</td></tr>
<tr><td>Realtor Team</td></tr>
</table>';

$ToMail="Realtor <nilesh@indoushosting.com>";
												
u_SendMail($FromMail,$ToMail,$Data,$Subject);


						$FromMail="Realtor <nilesh@indoushosting.com>";
						$Subject="WELCOME";
						
$Data='<table>
<tr>
<td>Dear '.$name.',</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr><td>You have successfully registered with Realtor portal.</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>You log in details are :
</td></tr>
<tr><td>Username : '.$email.'</td></tr>
<tr><td>Password : '.$password.'</td></tr>
<tr><td>You can log in here : <a href="#">Login</a> </td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>Thanks and Regards,</td></tr>
<tr><td>Realtor Team</td></tr>
</table>';


$ToMail=$name." - <".$email.">";												
u_SendMail($FromMail,$ToMail,$Data,$Subject);


header("location:home.php?pageno=17&msg=1");
	}
	else
	{
		$err_msg="Invalid Verification Code";
		header("location:home.php?pageno=16&err=".$err_msg."");
		 
	}

}
?>