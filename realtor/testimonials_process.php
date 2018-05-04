<?php
require_once("include/config.php");

$date=date("Y-m-d");
$time=date("h:i:s");
$name=$_REQUEST["user_name"];
$email=$_REQUEST["email"];
$title=$_REQUEST["title"];

$description=$_REQUEST["description"];
$ip=$_SERVER['REMOTE_ADDR'];
 $query="insert into testimonials (testimonials_name,email,title,description,date,time,ip_address) values('".$name."','".$email."','".$title."','".$description."','".$date."','".$time."','".$ip."')";



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

$Subject="New Testimonial on RM Realtor";


ob_start();
require('display_testimonials.php');
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


$FromMail2 = "RM Realtor <nilesh@indoushosting.com> \r\n";

$ToMail2="RM Realtor <".$_REQUEST["email"].">";


$Subject2="Your Testimonial on RM Realtor";


ob_start();
require('client_display_testimonials.php');
$Data2 = ob_get_contents();
ob_end_clean(); 


u_SendMail2($FromMail2,$ToMail2,$Data2,$Subject2);


?>
<table cellpadding="5" cellspacing="5" >
<tr><td class="white10">             
Thanks for submitting testimonial to RM Realtor.
</td></tr>
 <tr><td class="white10">
The email is sent on your email address for testimonial details.
</td></tr> 
 <tr><td class="white10">
Please save this email for future reference .
</td></tr>
 <tr><td class="white10">
Thanks & Regards,
</td></tr>
 <tr><td class="white10">
RM Realtor Team
</td></tr>
</table>