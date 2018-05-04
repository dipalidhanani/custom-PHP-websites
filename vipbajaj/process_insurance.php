<?php
include("include/config.php");

if($_REQUEST["process"]=="addinsurance")
{


	$dt1=explode("-",$_REQUEST["expiry_date"]);
	$dd1=$dt1[0];
	$mm1=$dt1[1];
	$yy1=$dt1[2];
$expiry_date=$yy1."-".$mm1."-".$dd1;
$query="insert into insurance (name,mobileno,email,city,model,vehicle,manufacturing_year,policy_no,expiry_date,existing_company_name,primium_amount) values ('".$_REQUEST["name"]."','".$_REQUEST["mobileno"]."','".$_REQUEST["email"]."','".$_REQUEST["city"]."','".$_REQUEST["model"]."','".$_REQUEST["vehicle"]."','".$_REQUEST["manufacturing_year"]."','".$_REQUEST["policy_no"]."','".$expiry_date."','".$_REQUEST["existing_company_name"]."','".$_REQUEST["primium_amount"]."')";
	mysql_query($query);
	
	$mess="Thank you for Insurance Inquiry.";



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
		
		
	 $booktestdrive_date=date('d-m-Y H:i:s');
		
		$FromMail="VIP Auto <web@vipauto.co.in>";
		$ToMail="VIP Auto <web@vipauto.co.in>";
		
		$Subject="You have a new request for Insurance from VIP Auto";
		
		$Data = 'You have Insurance details are given below.<br /><br />								
								
								Name : '.$_REQUEST["name"].'<br />								
								Mobile No : '.$_REQUEST["mobileno"].'<br />
								Email Address : '.$_REQUEST["email"].'<br />
								City : '.$_REQUEST["city"].'<br />
								Model : '.$_REQUEST["model"].'<br />	
								Vehicle : '.$_REQUEST["vehicle"].'<br />	
								Manufacturing Year : '.$_REQUEST["manufacturing_year"].'<br />	
								Policy Number : '.$_REQUEST["policy_no"].'<br />	
								Name Of Existing Finance Company : '.$_REQUEST["existing_company_name"].'<br />	
								Expiry Date: '.$expiry_date.'<br /><br />		
								Primium Amount : '.$_REQUEST["primium_amount"].'<br />	
								Regards,<br />
								VIP Auto';
		
		u_SendMail1($FromMail,$ToMail,$Data,$Subject);
		
	header("Location:thanks.php?mess=".$mess."");
	exit();
}

?>