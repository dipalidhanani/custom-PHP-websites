<?php
include("include/config.php");

if($_REQUEST["process"]=="addexchange_bonanza")
{

	$exchange_bonanza_datetime=date("Y-m-d H:i:s");
$query="insert into exchange_bonanza (name,mobileno,email,vehicle_no,model_name,model_year,vehicle_condition,expected_price,vehicle_interest,exchange_bonanza_datetime) values ('".$_REQUEST["name"]."','".$_REQUEST["mobileno"]."','".$_REQUEST["email"]."','".$_REQUEST["vehicle_no"]."','".$_REQUEST["model_name"]."','".$_REQUEST["model_year"]."','".$_REQUEST["condition"]."','".$_REQUEST["expected_price"]."','".$_REQUEST["vehicle_interest"]."','".$exchange_bonanza_datetime."')";
	mysql_query($query);
	
	$mess="Thank you for your exchange bonanza.";



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
		
		$Subject="You have a new request for Exchange Bonanza from VIP Auto";
		
		$Data = 'You have Exchange Bonanza details are given below.<br /><br />								
								
								Name : '.$_REQUEST["name"].'<br />								
								Mobile No : '.$_REQUEST["contactno"].'<br />
								Email Address : '.$_REQUEST["email"].'<br />
								Vehicle No : '.$_REQUEST["vehicle_no"].'<br />
								Model Name : '.$_REQUEST["model_name"].'<br />
								Model Year : '.$_REQUEST["model_year"].'<br />
								Vehicle Condition : '.$_REQUEST["condition"].'<br />
								Expected Price : '.$_REQUEST["expected_price"].'<br />
								Vehicle Interest : '.$_REQUEST["vehicle_interest"].'<br />
								Exchange Bonanza Datetime: '.$exchange_bonanza_datetime.'<br /><br />							
								
								Regards,<br />
								VIP Auto';
		
		u_SendMail1($FromMail,$ToMail,$Data,$Subject);
		
	header("Location:thanks.php?mess=".$mess."");
	exit();
}

?>