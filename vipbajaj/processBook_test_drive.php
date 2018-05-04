<?php
include("include/config.php");

if($_REQUEST["process"]=="addtestdrive")
{

	$book_test_drive_date=date("Y-m-d H:i:s");
	$query="insert into bike_book_test_drive (Bike_mast_id,Name,Contactno,email,Book_test_drive_date) values ('".$_REQUEST["bike_name"]."','".$_REQUEST["name"]."','".$_REQUEST["contactno"]."','".$_REQUEST["email"]."','".$book_test_drive_date."')";
	mysql_query($query);
	
	$mess="Thank you for your test drive booking.";



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
		
	 $booktestdrive_date=date('d-m-Y H:i:s');
		
		$FromMail="VIP Auto <web@vipauto.co.in>";
		$ToMail="VIP Auto <web@vipauto.co.in>";
		
		$Subject="You have a new request for Bike Test Drive from VIP Auto";
		
		$Data = 'You have New Bike Test Drive Inquiry details are given below.<br /><br />
								
								Test Drive For Bike : '.$bike_name.'<br />
								Name : '.$_REQUEST["name"].'<br />								
								Contact No : '.$_REQUEST["contactno"].'<br />
								Email Address : '.$_REQUEST["email"].'<br />
								Book Test Drive Date: '.$booktestdrive_date.'<br /><br />							
								
								Regards,<br />
								VIP Auto';
		
		u_SendMail1($FromMail,$ToMail,$Data,$Subject);
		
	header("Location:thanks.php?mess=".$mess."");
	exit();
}

?>