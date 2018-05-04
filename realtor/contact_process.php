<?php
require_once("include/config.php");

$date=date("Y-m-d");
$time=date("h:i:s");
$name=$_REQUEST["user_name"];
$email=$_REQUEST["email"];
$mobile=$_REQUEST["mobile"];

$comments=$_REQUEST["comments"];
$ip=$_SERVER['REMOTE_ADDR'];
 $query="insert into contact (contact_name,mobile_no,email,comments,date,time,ip_address) values('".$name."','".$mobile."','".$email."','".$comments."','".$date."','".$time."','".$ip."')";



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
	else
	{
		
	}

}


$FromMail = "RM Realtor <nilesh@indoushosting.com> \r\n";

$ToMail="RM Realtor <nilesh@indoushosting.com>"; 

$Subject="New Contact on RM Realtor";


ob_start();
require('display_contact.php');
$Data = ob_get_contents();
ob_end_clean(); 

u_SendMail($FromMail,$ToMail,$Data,$Subject);



function u_SendMail2($FromMail2,$ToMail2,$Data2,$Subject2)
{
	
	$headers  = "MIME-Version: 1.0\n"; 
	$headers .= "Content-type: text/html; charset=iso-8859-1\n";

	$headers .= "From: $FromMail2\n";

	if(strpos($_SERVER['SERVER_NAME'],".com"))
  	{
  		$myresult=mail($ToMail2, $Subject2 , $Data2, $headers);
	 }
	else
	{
		
	}

}

$FromMail2 = "RM Realtor <nilesh@indoushosting.com> \r\n";

$ToMail2="RM Realtor <".$_REQUEST["email"].">";

$Subject2="Your Contact on RM Realtor";


ob_start();
require('client_display_contact.php');
$Data2 = ob_get_contents();
ob_end_clean(); 


u_SendMail2($FromMail2,$ToMail2,$Data2,$Subject2);


?>
<table cellpadding="5" cellspacing="5" >
<tr><td class="white10">             
Thanks for your contact to RM Realtor.
</td></tr>
 <tr><td class="white10">
The email is sent on your email address for contact confirmation.
</td></tr> 
 <tr><td class="white10">
Our support team will contact you as soon as possible.
</td></tr>
 <tr><td class="white10">
Thanks & Regards,
</td></tr>
 <tr><td class="white10">
RM Realtor Team
</td></tr>
</table>