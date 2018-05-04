<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
date_default_timezone_set('Asia/Calcutta');
?>
<?php
$now = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];

if($_REQUEST["process"]=="changepassword")
{
		$query="update reseller_master set reseller_password='".base64_encode($_REQUEST["newpassword"])."' where reseller_id ='".$_SESSION['sqjeansresellerlogin']."'";
		mysql_query($query);
		
		header("Location:changepassword.php?msg=change");
		exit();
}

if($_REQUEST["process"]=="updateprofile")
{
	
	
	$query="update reseller_master set reseller_name='".$_REQUEST["resellername"]."',reseller_contactno='".$_REQUEST["resellercontact"]."',reseller_emailid='".$_REQUEST["reselleremail"]."',reseller_location='".$_REQUEST["reselleraddress"]."',reseller_city='".$_REQUEST["resellercity"]."',reseller_state='".$_REQUEST["resellerstate"]."',reseller_country='".$_REQUEST["resellercountry"]."' where reseller_id='".$_REQUEST["resellerid"]."'";
	mysql_query($query);

	header("Location:main.php");
	exit();
}

if($_REQUEST["process"]=="placeorder")
{
	$reseller_order_date = date("Y-m-d");
	$resellerid=$_SESSION['sqjeansresellerlogin'];
	$resellername=$_SESSION['sqjeansresellerloginname'];
	$reselleremail=$_SESSION['sqjeansresellerloginemail'];

						
	if($_REQUEST["rise2"]==""){$rise=$_REQUEST["rise1"];} else{$rise=$_REQUEST["rise2"];}
	if($_REQUEST["fitting_style2"]==""){$fitting_style=$_REQUEST["fitting_style1"];} else{$fitting_style=$_REQUEST["fitting_style2"];}
	if($_REQUEST["leg_style2"]==""){$leg_style=$_REQUEST["leg_style1"];} else{$leg_style=$_REQUEST["leg_style2"];}
	if($_REQUEST["wash_treatment2"]==""){$wash_treatment=$_REQUEST["wash_treatment1"];} else{$wash_treatment=$_REQUEST["wash_treatment2"];}
	
	
	 $query="insert into reseller_order_master(
			reseller_mast_id,
			reseller_order_date,								  
	        customer_name,
			reseller_order_for,
			fabric,
			wash_treatment,
			special_wash,
			rise,
			fitting_style,
			leg_style,
			thread_primary,
			thread_secondary,
			fly_style,
			frontpocket_style,
			backpocket_style,
			buttonrivets_style,
			belt_style,
			loops_style,
			embroidery_style,
			full_length,
			inside_length,
			seat,
			waist,
			front_rise,
			front_low,
			back_rise,
			full_ucrotch,
			thighs_on1,
			thighs_on6,
			knee,
			bottom,
			order_details1,
			order_details2
			) values(
			'".$resellerid."',
			'".$reseller_order_date."',
			'".$_REQUEST["customer_name"]."',
			'".$_REQUEST["reseller_order_for"]."',
			'".$_REQUEST["fabric"]."',
			'".$wash_treatment."',
			'".$_REQUEST["special_wash"]."',
			'".$rise."',
			'".$fitting_style."',
			'".$leg_style."',
			'".$_REQUEST["thread_primary"]."',
			'".$_REQUEST["thread_secondary"]."',
			'".$_REQUEST["fly_style"]."',
			'".$_REQUEST["frontpocket_style"]."',
			'".$_REQUEST["backpocket_style"]."',
			'".$_REQUEST["buttonrivets_style"]."',
			'".$_REQUEST["belt_style"]."',
			'".$_REQUEST["loops_style"]."',
			'".$_REQUEST["embroidery_style"]."',
			'".$_REQUEST["full_length"]."',
			'".$_REQUEST["inside_length"]."',
			'".$_REQUEST["seat"]."',
			'".$_REQUEST["waist"]."',
			'".$_REQUEST["front_rise"]."',
			'".$_REQUEST["front_low"]."',
			'".$_REQUEST["back_rise"]."',
			'".$_REQUEST["full_ucrotch"]."',
			'".$_REQUEST["thighs_on1"]."',
			'".$_REQUEST["thighs_on6"]."',
			'".$_REQUEST["knee"]."',
			'".$_REQUEST["bottom"]."',
			'".$_REQUEST["order_details1"]."',
			'".$_REQUEST["order_details2"]."'
			)";

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
						}	
						$orderdate=date('d-m-Y');
						
						$message ="Thank you for your order on SQ Jeans.";
						
						$FromMail="SQ Jeans <info@sqjeans.com>";
						$ToMail=$reselleremail;
											
						$Data= 'Dear '.$resellername.',<br /><br />
						
						'.$message.'<br /><br />					
						
						Regards,<br />
						SQ Jeans
						';
						
													
						$Subject= "Reseller Order @ SQ Jeans";						
							
						u_SendMail($FromMail,$ToMail,$Data,$Subject);
						
						
						$FromMail=$resellername. "<".$reselleremail.">";
						$ToMail="info@sqjeans.com";
											
						$Data= 'Dear Admin, <br /><br />
						
						You have a new order on www.sqjeans.com of Reseller on '.$orderdate.' <br /><br />
                       						
						Order details are below.<br /><br />
						
						Reseller Name : '.$resellername.',<br /><br />
						
						Customer Name : '.$_REQUEST["customer_name"].',<br /><br />
								
						Regards,<br/>
						Development Team
						';
						
													
						$Subject= "New Reseller Order @ SQ Jeans";						
							
						u_SendMail($FromMail,$ToMail,$Data,$Subject);

	header("Location:myorders.php");
	exit();
}

?>

