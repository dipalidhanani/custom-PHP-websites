<?php session_start();
	  include("include/config.php");
	  require_once("include/function.php");
	  u_Connect("cn");

$now = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];

		function u_SendMail($FromMail,$ToMail,$Data,$Subject)
		{
			
			$headers = "MIME-Version: 1.0\n"; 
			$headers .= "Content-type: text/html; charset=iso-8859-1\n";
		
			$headers .= "From: $FromMail\n";
		
			if(strpos($_SERVER['SERVER_NAME'],".com"))
			{
				$myresult=mail($ToMail, $Subject , $Data, $headers);
			 }			
		}
		
		
		$FromMail="Klassic Kids <info@klassickids.com>";
		$ToMail=$_REQUEST["email"];
		
		$Subject="Your inquiry to Klassic Kids";
		
		
		ob_start();
		require('contactus_client.php');
		$Data = ob_get_contents();
		ob_end_clean(); 
		
		u_SendMail($FromMail,$ToMail,$Data,$Subject);
		
		
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
		}
		
		
		$FromMail=$_REQUEST["name"]." <".$_REQUEST["email"].">";
		$ToMail="Klassic Kids <info@klassickids.com>";
		
		$Subject="You have a new inquiry on Klassic Kids";
		
		
		ob_start();
		require('contactus_admin.php');
		$Data = ob_get_contents();
		ob_end_clean(); 
		
		u_SendMail1($FromMail,$ToMail,$Data,$Subject);
		
		$query="insert into contactus_inquiry 
		(
		inquiry_by_name,
		inquiry_by_email,
		inquiry_by_mobile,
		inquiry_by_country,
		inquiry_by_query,
		inquiry_on_datetime,
		inquiry_from_ip
		)
		values
		(
		'".$_REQUEST["name"]."',
		'".$_REQUEST["email"]."',
		'".$_REQUEST["mobile"]."',
		'".$_REQUEST["country"]."',
		'".$_REQUEST["query"]."',
		'".$now."',
		'".$ip."'
		)
		";
		mysql_query($query);
		
		header("Location:index.php?content=5&msg=contact");
		exit();
?>