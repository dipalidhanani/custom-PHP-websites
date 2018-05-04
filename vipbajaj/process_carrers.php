<?php
include("include/config.php");

if($_REQUEST["process"]=="addcarrers")
{

	
 $query="insert into carrers(name,address,contact_number,email,education,experience,field_in_interest) values('".$_REQUEST["name"]."','".$_REQUEST["address"]."','".$_REQUEST["contact_number"]."','".$_REQUEST["email"]."','".$_REQUEST["education"]."','".$_REQUEST["experience"]."','".$_REQUEST["field_in_interest"]."')";
	
	mysql_query($query);
	$mess="Thank you for Carrer Inquiry.";



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
		
		$FromMail="VIP Auto <web@vipauto.co.in>";
		$ToMail="VIP Auto <web@vipauto.co.in>";
		
		$Subject="You have a new request for Door Step from VIP Auto";
		
		$Data = 'You have New Door Step Inquiry details are given below.<br /><br />								
													
								Name : '.$_REQUEST["name"].'<br />								
								Address : '.$_REQUEST["address"].'<br />
								Contact No:'.$_REQUEST["contact_number"].'<br/>								
								Email Address : '.$_REQUEST["email"].'<br />
								Education : '.$_REQUEST["education"].'<br />
								Experience : '.$_REQUEST["experience"].'<br />
								Field In Interest : '.$_REQUEST["field_in_interest"].'<br />
								<br />							
								
								Regards,<br />
								VIP Auto';
		
		u_SendMail1($FromMail,$ToMail,$Data,$Subject);
	header("Location:thanks.php?mess=".$mess."");
	exit();
}

?>

