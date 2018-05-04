<?php session_start();
include("include/config.php");

/////////// Insert  //////////
	
	
if($_REQUEST["process"]=="Add")
{
	
	$err_msg="";
	$emailerr="";
	
	
	if(($_SESSION['security_code']==$_POST["security_code"]))
	{
$first_name=$_POST["first_name"];
$last_name=$_POST["last_name"];
$email=$_POST["email"];
$password=$_POST["password"];
$gender=$_POST["gender"];


$country=$_POST["cmbCountry"];
$state=$_POST["cmbState"];
$city=$_POST["city"];
$code=$_POST["code"];
$no=$_POST["contact_no"];
$mobile_no=$_POST["mobile_no"];

$contact_no=$code."-".$no;

$register_datetime=date("Y-m-d H:i:s");

$query="insert into user_registration(first_name,last_name,email,password,country_mast_id,state_mast_id,city,contact_no,mobile_no,register_datetime) values('".$first_name."','".$last_name."','".$email."','".$password."','".$country."','".$state."','".$city."','".$contact_no."','".$mobile_no."','".$register_datetime."')";
$result=mysql_query($query)
or die(mysql_error());

$id=mysql_insert_id();
$_SESSION["user_reg_id_tmp"]=$id;

////// send mail to user //////

$qu2=mysql_query("select * from admin_mast where is_master_admin=1");
$resAde=mysql_fetch_array($qu2);
$adname=$resAde["admin_name"];
$ademail=$resAde["email_id"];

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
						$FromMail="Naughty Paa Ji <info@naughtypaaji.com>";
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
<tr><td>Naughty Paa Ji Team</td></tr>
</table>';

$ToMail=$first_name." - <".$email.">";
												
u_SendMail($FromMail,$ToMail,$Data,$Subject);


						$FromMail="Naughty Paa Ji <info@naughtypaaji.com>";
						$Subject="WELCOME";
						
$Data='<table>
<tr>
<td>Dear '.$first_name.',</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr><td>You have successfully registered with Naughty Paa Ji portal.</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>You log in details are :
</td></tr>
<tr><td>Username : '.$email.'</td></tr>
<tr><td>Password : '.$password.'</td></tr>
<tr><td>You can log in here : <a href="">Login</a> </td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>Thanks and Regards,</td></tr>
<tr><td>Naughty Paa Ji Team</td></tr>
</table>';

$ToMail="Naughty Paa Ji <info@naughtypaaji.com>";
												
u_SendMail($FromMail,$ToMail,$Data,$Subject);


header("location:index.php?page=3&msg=1");
	}
	else
	{
		$err_msg="Invalid Verification Code";
		header("location:index.php?page=5&err=".$err_msg."");
		 
	}

}
?>