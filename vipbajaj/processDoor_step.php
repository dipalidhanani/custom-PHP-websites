<?php
include("include/config.php");

if($_REQUEST["process"]=="adddoorstepe")
{

	
 $query="insert into door_step (Bike_mast_id,Person_name,Person_address,Phone_number,Email,Service_type) values ('".$_REQUEST["bike_name"]."','".$_REQUEST["person_name"]."','".$_REQUEST["address"]."','".$_REQUEST["phone_number"]."','".$_REQUEST["email"]."','".$_REQUEST["service_type"]."')";
	
	mysql_query($query);
	$mess="Thank you for Door Step Inquiry.";



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
		
		$Subject="You have a new request for Door Step from VIP Auto";
		
		$Data = 'You have New Door Step Inquiry details are given below.<br /><br />
								
								Service For Bike : '.$bike_name.'<br />								
								Name : '.$_REQUEST["person_name"].'<br />								
								Address : '.$_REQUEST["address"].'<br />
								Contact No:'.$_REQUEST["phone_number"].'<br/>								
								Service Type : '.$_REQUEST["service_type"].'<br />
								<br />							
								
								Regards,<br />
								VIP Auto';
		
		u_SendMail1($FromMail,$ToMail,$Data,$Subject);
	header("Location:thanks.php?mess=".$mess."");
	exit();
}

?>

