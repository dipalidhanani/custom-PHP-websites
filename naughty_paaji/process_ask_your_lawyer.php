<?php
include("include/config.php");
$dt=date("Y-m-d H:i:s");
  $ip=$_SERVER['REMOTE_ADDR'];
mysql_query("insert into ask_your_lawyer(name,emailid,mobileno,city,question,question_datetime,question_ip) values('".$_REQUEST["name1"]."','".$_REQUEST["emailid1"]."','".$_REQUEST["mobileno"]."','".$_REQUEST["city"]."','".$_REQUEST["question"]."','".$dt."','".$ip."')") or die(mysql_error());





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
		$ToMail="Naughty Paaji <".$_REQUEST["emailid1"].">";
		
		$Subject="You have a New Lawyer Question Inquiry from Naughty Paaji";
		
		$Data = 'You have successfully asked your question on Naughty Paaji portal.<br /><br />
		Your question details are :<br />							
							
								Name : '.$_REQUEST["name1"].'<br />								
								Email Address : '.$_REQUEST["emailid1"].'<br />
								Mobile Number : '.$_REQUEST["mobileno"].'<br />						
								City : '.$_REQUEST["city"].'<br />	
								Question : '.$_REQUEST["question"].'<br />	
								
								Regards,<br />
								Naughty Paaji';
		
		u_SendMail1($FromMail,$ToMail,$Data,$Subject);
		
		
		$FromMail="Naughty Paaji <".$_REQUEST["emailid1"].">";
		$ToMail="Naughty Paaji <info@naughtypaaji.com>";
		
		$Subject="You have a New Lawyer Question Inquiry from Naughty Paaji";
		
		$Data = 'One user has successfully asked his/her question with your portal.<br /><br />
		Question details are :<br />							
							
								Name : '.$_REQUEST["name1"].'<br />								
								Email Address : '.$_REQUEST["emailid1"].'<br />
								Mobile Number : '.$_REQUEST["mobileno"].'<br />						
								City : '.$_REQUEST["city"].'<br />	
								Question : '.$_REQUEST["question"].'<br />	
								
								Regards,<br />
								Naughty Paaji';
		
		u_SendMail1($FromMail,$ToMail,$Data,$Subject);

header("Location:index.php?page=3&msg=2");
exit();
?>