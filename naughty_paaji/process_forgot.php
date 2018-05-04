<?php 
include("include/config.php");

if($_REQUEST["submit"]=="Submit")
{ $email=$_POST["email"];
	$emailerr="";
	$err="";
	$selectemail=mysql_query("select email from user_registration where email='".$email."'");
	$numemail=mysql_num_rows($selectemail);
	
	if($numemail==0)
	{
	   $emailerr="This email address is not registered with IVF.";
	   header("location:index.php?page=8?emailerr=".$emailerr."");
	   exit;
	}
///////// send mail to client ///////////

$qumastadmin=mysql_query("select * from admin_mast where is_master_admin=1");
	$resMastad=mysql_fetch_array($qumastadmin);
	  $adnm=$resMastad["admin_name"];
	  $ademail=$resMastad["email_id"];
	  
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
						
	
		$FromMail=$adnm." - Admin <".$ademail.">";
								
 
  
$query=mysql_query("select * from user_registration where email='".$email."'");
	
$Data= '<table>';
if($res=mysql_fetch_array($query))
{
	$Subject= "Password Recovery from IVF Client Panel";
	 		
$Data.='
<tr><td>Dear '.$res["first_name"].',</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>Following is the requested information :</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>Your username is : '.$email.'</td></tr>
<tr>
<td>Your password : '.$res["password"].'</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr><td><a href="http://naughtypaaji.com/index.php?page=6"> Click here </a> to login to your account.</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>Regards,</td></tr>
<tr><td>Naughty Paaji Team</td></tr>
</table>';

		$usernm=$res["first_name"];
		$useremail=$res["email"];
					
$ToMail=$usernm."(Client) <".$useremail.">";
					u_SendMail($FromMail,$ToMail,$Data,$Subject);

}
$err="Password has been sent successfully.";
header("location:index.php?page=8&err=".$err."");
}
?>