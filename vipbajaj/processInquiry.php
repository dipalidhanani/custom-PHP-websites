<?php
include("include/config.php");

if($_REQUEST["process"]=="addinquiry")
{

	$inquiry_date=date('y-m-d');
	$query="insert into bike_inquiry (bike_mast_id,inquiry_name,inquiry_contact,inquiry_date) values ('".$_REQUEST["bike_name"]."','".$_REQUEST["name"]."','".$_REQUEST["contactno"]."','".$inquiry_date."')";
	mysql_query($query);
	$mess="Your Inquiry For Bike Submitted..";
	
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
		$q=mysql_query("select * from bike_mast where Bike_id='".$_REQUEST["bike_name"]."'");
		$qrow=mysql_fetch_array($q);
		$bike_name=$qrow["Bike_name"];
		
		$FromMail="VIP Auto <web@vipauto.co.in>";
		$ToMail="VIP Auto <web@vipauto.co.in>";
		
		$Subject="You have a new inquiry on VIP Auto";
		
		$Data = 'You have New Inquiry details are given below.<br /><br />
								
								Inquiry For Bike : '.$bike_name.'<br />
								Name : '.$_REQUEST["name"].'<br />
								Contact No : '.$_REQUEST["contactno"].'<br /><br />						
								
								Regards,<br />
								VIP Auto';
		
		u_SendMail1($FromMail,$ToMail,$Data,$Subject);
		
	header("Location:bike_inquiry.php?mess=".$mess."");
	exit();
}

?>