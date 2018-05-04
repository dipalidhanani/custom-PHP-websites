<?php session_start();
	  include("include/config.php");
	  require_once("include/function.php");
	  u_Connect("cn");


$date=date("Y-m-d");
$time=date("h:i:s");
$name=$_REQUEST["name"];
$email=$_REQUEST["email"];
$mobile=$_REQUEST["telephone"];

$comments=$_REQUEST["comment"];
$ip=$_SERVER['REMOTE_ADDR'];

$qregister=mysql_query("select register_user_email from register_master where register_user_email='".$email."'");
if(mysql_num_rows($qregister)==0){$feedback_user_type=0;}
else{$feedback_user_type=1;}

 $query="insert into feedback (feedback_name,mobile_no,email,comments,date,time,ip_address,feedback_user_type) values('".$name."','".$mobile."','".$email."','".$comments."','".$date."','".$time."','".$ip."','".$feedback_user_type."')";

mysql_query($query);


function u_SendMail($FromMail,$ToMail,$Data,$Subject)
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


$FromMail = "Klassic Kids <info@klassickids> \r\n";

$ToMail="Klassic Kids <info@klassickids>"; 

$Subject="New Feedback on Klassic Kids";


ob_start();
require('display_feedback.php');
$Data = ob_get_contents();
ob_end_clean(); 

u_SendMail($FromMail,$ToMail,$Data,$Subject);



function u_SendMail2($FromMail2,$ToMail2,$Data2,$Subject2)
{
	
	$headers  = "MIME-Version: 1.0\n"; 
	$headers .= "Content-type: text/html; charset=iso-8859-1\n";

	$headers .= "From: $FromMail2\n";

	if(strpos($_SERVER['SERVER_NAME'],".com"))
  	{
  		$myresult=mail($ToMail2, $Subject2 , $Data2, $headers);
	 }
	else
	{
		
	}

}

$FromMail2 = "Klassic Kids <info@klassickids> \r\n";

$ToMail2="Klassic Kids <".$_REQUEST["email"].">";

$Subject2="Your Feedback on Klassic Kids";


ob_start();
require('client_display_feedback.php');
$Data2 = ob_get_contents();
ob_end_clean(); 


u_SendMail2($FromMail2,$ToMail2,$Data2,$Subject2);


?>
