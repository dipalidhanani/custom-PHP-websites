<?php
include("include/config.php");
$dt=date("Y-m-d H:i:s");
  $ip=$_SERVER['REMOTE_ADDR'];
mysql_query("insert into contactus(name,emailid,mobileno,city,message,contact_datetime,contact_ip) values('".$_REQUEST["name"]."','".$_REQUEST["emailid"]."','".$_REQUEST["mobileno"]."','".$_REQUEST["city"]."','".$_REQUEST["contactmessage"]."','".$dt."','".$ip."')") or die(mysql_error());




	/////////////////////////////////////////////////////
		
		function u_SendMail1($FromMail,$ToMail,$Data,$Subject)
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
			
		
		$FromMail="Naughty Paaji <".$_REQUEST["emailid"].">";
		$ToMail="Naughty Paaji <info@naughtypaaji.com>";
		
		$Subject="You have a New Contact Inquiry from Naughty Paaji";
		
		$Data = 'One user has successfully sent his/her contact details with your portal.<br /><br />								
							
								Name : '.$_REQUEST["name"].'<br />								
								Email Address : '.$_REQUEST["emailid"].'<br />
								Mobile Number : '.$_REQUEST["mobileno"].'<br />						
								City : '.$_REQUEST["city"].'<br />	
								Message : '.$_REQUEST["contactmessage"].'<br />	
								
								Regards,<br />
								Naughty Paaji Team';
		
		u_SendMail1($FromMail,$ToMail,$Data,$Subject);
		$FromMail="Naughty Paaji <info@naughtypaaji.com>";
		$ToMail="Naughty Paaji <".$_REQUEST["emailid"].">";
		
		
		$Subject="You have a Contact Inquiry from Naughty Paaji";
		
		$Data = 'You have Contact Inquiry details are given below.<br /><br />								
							
								Name : '.$_REQUEST["name"].'<br />								
								Email Address : '.$_REQUEST["emailid"].'<br />
								Mobile Number : '.$_REQUEST["mobileno"].'<br />						
								City : '.$_REQUEST["city"].'<br />	
								Message : '.$_REQUEST["contactmessage"].'<br />	
								
								Regards,<br />
								Naughty Paaji Team';
		
		u_SendMail1($FromMail,$ToMail,$Data,$Subject);

header("Location:index.php?page=3&msg=5");
exit();
?>