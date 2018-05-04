<?php
include("include/config.php");
$dt=date("Y-m-d H:i:s");
  $ip=$_SERVER['REMOTE_ADDR'];
mysql_query("insert into share_experience(name,emailid,mobileno,city,experience,exp_datetime,exp_ip) values('".$_REQUEST["name"]."','".$_REQUEST["emailid"]."','".$_REQUEST["mobileno"]."','".$_REQUEST["city"]."','".$_REQUEST["experience"]."','".$dt."','".$ip."')") or die(mysql_error());





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
			
		
		$FromMail="Naughty Paaji <info@naughtypaaji.com>";
		$ToMail="Naughty Paaji <".$_REQUEST["emailid"].">";
		
		$Subject="Naughty Paaji";
		
		$Data = 'You have successfully shared your experience with Naughty Paaji portal.<br /><br />
		Your experience details are :<br />
							
								Name : '.$_REQUEST["name"].'<br />								
								Email Address : '.$_REQUEST["emailid"].'<br />
								Mobile Number : '.$_REQUEST["mobileno"].'<br />						
								City : '.$_REQUEST["city"].'<br />	
								Experience : '.$_REQUEST["experience"].'<br />	
								
								Thanks and Regards,<br />
								Naughty Paaji Team';
		
		u_SendMail1($FromMail,$ToMail,$Data,$Subject);
		
		
		$FromMail="Naughty Paaji <".$_REQUEST["emailid"].">";
		$ToMail="Naughty Paaji <info@naughtypaaji.com>";
		
		$Subject="Naughty Paaji";
		
		$Data = 'One user has successfully shared his/her experience with your portal.<br /><br />
		Experience details are :<br />
							
								Name : '.$_REQUEST["name"].'<br />								
								Email Address : '.$_REQUEST["emailid"].'<br />
								Mobile Number : '.$_REQUEST["mobileno"].'<br />						
								City : '.$_REQUEST["city"].'<br />	
								Experience : '.$_REQUEST["experience"].'<br />	
								
								Thanks and Regards,<br />
								Naughty Paaji Team';
		
		u_SendMail1($FromMail,$ToMail,$Data,$Subject);

header("Location:index.php?page=3&msg=3");
exit();
?>