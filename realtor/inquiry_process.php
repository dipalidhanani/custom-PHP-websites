<?php
require_once("include/config.php");

$prid=$_REQUEST["propertyid"];


$date=date("Y-m-d");
$time=date("h:i:s");
$name=$_REQUEST["user_name"];
$email=$_REQUEST["email"];
$mobile=$_REQUEST["mobile"];

$comments=$_REQUEST["comments"];
$prid=$_REQUEST["propertyid"];
$ip=$_SERVER['REMOTE_ADDR'];
 $query="insert into inquiry (contact_name,mobile_no,email,comments,property_id,date,time,ip_address) values('".$name."','".$mobile."','".$email."','".$comments."','".$prid."','".$date."','".$time."','".$ip."')";



mysql_query($query);



$FromMail = "RM Realtor <nilesh@indoushosting.com> \r\n";

$ToMail="RM Realtor <nilesh@indoushosting.com>"; 

$Subject="New Inquiry on RM Realtor";


$FromMail2 = "RM Realtor <nilesh@indoushosting.com> \r\n";

$ToMail2="RM Realtor <".$_REQUEST["email"].">";

$Subject2="Your Inquiry on RM Realtor";


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




ob_start();
require('display.php');
$Data = ob_get_contents();
ob_end_clean(); 

u_SendMail($FromMail,$ToMail,$Data,$Subject);



function u_SendMail2($FromMail2,$ToMail2,$Data2,$Subject2)
{
	
	$headers = "MIME-Version: 1.0\n"; 
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





ob_start();
require('client_display.php');
$Data2 = ob_get_contents();
ob_end_clean(); 


u_SendMail2($FromMail2,$ToMail2,$Data2,$Subject2);
?>
<table cellpadding="5" cellspacing="5" >
                <tr><td class="white10">             
 Thank you for inquiring with RM Realtor.
</td></tr>
 <tr><td class="white10">
The email is sent on your email address for inquiry confirmation.
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