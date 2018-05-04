<?php
include("include/config.php");

if($_REQUEST["process"]=="addfinance")
{

	$finance_datetime=date("Y-m-d H:i:s");
$query="insert into finance (name,mobileno,email,finance_required_emails,purpose_of_loan,finance_datetime) values ('".$_REQUEST["name"]."','".$_REQUEST["mobileno"]."','".$_REQUEST["email"]."','".$_REQUEST["finance_required_emails"]."','".$_REQUEST["purpose_of_loan"]."','".$finance_datetime."')";
	mysql_query($query);
	
	$mess="Thank you for Finance Inquiry.";



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
		
		$Subject="You have a new request for Finance from VIP Auto";
		
		$Data = 'You have Finance details are given below.<br /><br />								
								
								Name : '.$_REQUEST["name"].'<br />								
								Mobile No : '.$_REQUEST["contactno"].'<br />
								Email Address : '.$_REQUEST["email"].'<br />
								Finance Required Emails : '.$_REQUEST["finance_required_emails"].'<br />
								Purpose Of Loan : '.$_REQUEST["purpose_of_loan"].'<br />								
								Finance Datetime: '.$finance_datetime.'<br /><br />							
								
								Regards,<br />
								VIP Auto';
		
		u_SendMail1($FromMail,$ToMail,$Data,$Subject);
		
	header("Location:thanks.php?mess=".$mess."");
	exit();
}

?>