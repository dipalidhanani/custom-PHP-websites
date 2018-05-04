<?php
include("include/config.php");

if($_REQUEST["process"]=="addservice")
{
$now = date("Y-m-d H:i:s");

	$dt1=explode("-",$_REQUEST["service_date"]);
	$dd1=$dt1[0];
	$mm1=$dt1[1];
	$yy1=$dt1[2];
$service_date=$yy1."-".$mm1."-".$dd1;

	$book_test_drive_date=date('y-m-d');
 $query="insert into bike_book_service (Bike_mast_id,Book_service_date,Book_service_currentdatetime,Person_name,Person_address,phone_number,Email,Bike_number,Service_type,Door_step) values ('".$_REQUEST["bike_name"]."','".$service_date."','".$now."','".$_REQUEST["person_name"]."','".$_REQUEST["address"]."','".$_REQUEST["phone_number"]."','".$_REQUEST["email"]."','".$_REQUEST["bike_number"]."','".$_REQUEST["service_type"]."','".$_REQUEST["door_step"]."')";
	
	mysql_query($query);
	$mess="Thank you for your online service booking.";



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
		
	 	if($_REQUEST["free_service"]==1){$free_service="Yes";}else{$free_service="No";}
		
		$FromMail="VIP Auto <web@vipauto.co.in>";
		$ToMail="VIP Auto <web@vipauto.co.in>";
		
		$Subject="You have a new request for Bike Service from VIP Auto";
		
		$Data = 'You have New Bike Service Inquiry details are given below.<br /><br />
								
								Service For Bike : '.$bike_name.'<br />
								Service Date: '.$_REQUEST["service_date"].'<br />
								Name : '.$_REQUEST["person_name"].'<br />								
								Address : '.$_REQUEST["address"].'<br />
								Contact No:'.$_REQUEST["phone_number"].'<br/>
								Bike Number : '.$_REQUEST["bike_number"].'<br />
								Service Type : '.$_REQUEST["service_type"].'<br />
								Door Step : '.$_REQUEST["door_step"].'<br />
								<br />							
								
								Regards,<br />
								VIP Auto';
		
		u_SendMail1($FromMail,$ToMail,$Data,$Subject);
	header("Location:thanks.php?mess=".$mess."");
	exit();
}

?>

