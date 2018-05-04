<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");

$now = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];

$query="select * from product_mast where Product_id='".$_REQUEST["productid"]."'";
$recordsetproduct = mysql_query($query,$cn);
while($rowproduct = mysql_fetch_array($recordsetproduct,MYSQL_ASSOC))
{	
$productname=$rowproduct["Product_title"];
}
						
if($_REQUEST["process"]=="bulk")
{
	$query="insert into bulk_inquiry_mast (bulk_inquiry_product_ID,
										   bulk_inquiry_number,
										   bulk_inquiry_name,
										   bulk_inquiry_email,
										   bulk_inquiry_country,
										   bulk_inquiry_state,
										   bulk_inquiry_city,
										   bulk_inquiry_mobile,
										   bulk_inquiry_company,
										   bulk_inquiry_message,
										   bulk_inquiry_datetime,
										   bulk_inquiry_IP) values (
										   '".$_REQUEST["productid"]."',
										   '".$_REQUEST["bulknumber"]."',
										   '".$_REQUEST["yourname_bulk"]."',
										   '".$_REQUEST["youremail_bulk"]."',
										   '".$_REQUEST["yourcountry_bulk"]."',
										   '".$_REQUEST["yourstate_bulk"]."',
										   '".$_REQUEST["yourcity_bulk"]."',
										   '".$_REQUEST["yourmobile_bulk"]."',
										   '".$_REQUEST["yourcompanyname_bulk"]."',
										   '".$_REQUEST["yourmessage"]."',
										   '".$now."',
										   '".$ip."'
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
						
						$FromMail="Klassic Kids <info@klassickids.com>";
						$ToMail=$_REQUEST["youremail_bulk"];
											
						$Data= 'Dear '.$_REQUEST["yourname_bulk"].',<br /><br />
						
						Thank you for your bulk inquiry on Klassic Kids.<br /><br />
                       						
						Your details are given below.<br /><br />
						
						Name : '.$_REQUEST["yourname_bulk"].'<br />
						Email : '.$_REQUEST["youremail_bulk"].'<br />	
						Product : '.$productname.'<br />
						Bulk Number : '.$_REQUEST["bulknumber"].'<br />
						
						Regards,<br />
						Klassic Kids Team';
						
													
						$Subject= "Your bulk order inquery @ Klassic Kids";						
							
						u_SendMail($FromMail,$ToMail,$Data,$Subject);
						
						
						$FromMail=$_REQUEST["yourname_bulk"]. "<".$_REQUEST["youremail_bulk"].">";
						$ToMail="info@klassickids.com";
											
						$Data= 'Dear Admin, <br /><br />
						
						You have new bulk order inquiry on Klassic Kids<br /><br />
                       						
						Bulk Inquiry details are below.<br /><br />
						
						Name : '.$_REQUEST["yourname_bulk"].'<br />
						Email : '.$_REQUEST["youremail_bulk"].'<br />	
						Product : '.$productname.'<br />
						Bulk Number : '.$_REQUEST["bulknumber"].'<br /><br />					
						
						Regards';													
						$Subject= "Bulk order inquiry @ Klassic Kids";						
							
						u_SendMail($FromMail,$ToMail,$Data,$Subject);
	
	header("Location:index.php?content=2&productid=".$_REQUEST["productid"]);
	exit();
}
if($_REQUEST["process"]=="email")
{
				
				$query="insert into friend_suggestion 
				(
				 suggestion_from_name,
				 suggestion_from_email,
				 suggestion_to_name,
				 suggestion_to_email,
				 suggestion_product_ID,
				 suggestion_url,
				 suggestion_message,
				 suggestion_datetime,
				 suggestion_IP
				 )
				values 
				(
				 '".$_REQUEST["yourname"]."',
				 '".$_REQUEST["youremail"]."',
				 '".$_REQUEST["yourfriendname"]."',
				 '".$_REQUEST["yourfriendemail"]."',
				 '".$_REQUEST["productid"]."',
				 '".$_REQUEST["url"]."',
				 '".$_REQUEST["yourmessage"]."',
				 '".$now."',
				 '".$ip."'
				 )
				";
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
						$FromMail=$_REQUEST["yourname"]. "<".$_REQUEST["youremail"].">";
						$ToMail=$_REQUEST["yourfriendemail"];
											
						$Data= 'Dear '.$_REQUEST["yourfriendname"].', <br /><br />
						
						Your friend '.$_REQUEST["yourname"].' suggest you Klassic Kids<br /><br />
                       						
						Link : <a href='.$_REQUEST["url"].'>'.$_REQUEST["url"].'</a><br />
						Message : '.$_REQUEST["yourmessage"].'<br /><br />					
						
						Regards,<br />
						Klassic Kids Team';				
						
						$Subject= "Your friend ".$_REQUEST["yourname"]." suggest you Klassic Kids";						
							
						u_SendMail($FromMail,$ToMail,$Data,$Subject);
		
		header("Location:index.php?content=2&productid=".$_REQUEST["productid"]);
		exit();
}
if($_REQUEST["process"]=="testimonial")
{
	$query="insert into testimonials (testimonials_name,testimonials_email,testimonials_message,testimonials_active_status,testimonials_datetime,testimonials_IP) values ('".$_REQUEST["yourname_test"]."','".$_REQUEST["youremail_test"]."','".$_REQUEST["yourmessage_test"]."',0,'".$now."','".$ip."')";
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
						
						$FromMail=$_REQUEST["yourname_test"]. "<".$_REQUEST["youremail_test"].">";
						$ToMail="info@klassickids.com";
											
						$Data= 'Dear Admin, <br /><br />
						
						'.$_REQUEST["yourname_test"].' has written testimonial on Klassic Kids<br /><br />
                       						
						Testimonials details are below.<br /><br />
						
						Name : '.$_REQUEST["yourname_test"].'<br />
						Email : '.$_REQUEST["youremail_test"].'<br />	
						Message : '.$_REQUEST["yourmessage_test"].'<br /><br />								
						
						Regards';													
						$Subject= "New Testimonial @ Klassic Kids";						
							
						u_SendMail($FromMail,$ToMail,$Data,$Subject);
						
						header("Location:index.php?content=5&value=testimonial");
						exit();
}
if($_REQUEST["process"]=="enquiry")
{
	$verify_box = $_REQUEST["verify_box"];

	
	if(md5($verify_box).'a4xn' == $_COOKIE['tntcon'])
	{
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
	
	
			$FromMail="Klassic Kids <info@klassickids.com>";
			$ToMail=$_REQUEST["youremail_enquiry"];
			
			$Subject="Your inquiry to Klassic Kids";
			
			
			ob_start();
			require('display_client.php');
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
				else
				{
					
				}
			
			}
			
			
			$FromMail=$_REQUEST["yourname_enquiry"].' <'.$_REQUEST["youremail_enquiry"].'>';
			$ToMail="Klassic Kids <info@klassickids.com>";
			
			$Subject="You have a new inquiry";
			
			
			ob_start();
			require('display_admin.php');
			$Data = ob_get_contents();
			ob_end_clean(); 
			
			u_SendMail1($FromMail,$ToMail,$Data,$Subject);
			
			
			header("Location:index.php?content=9&msg=".urlencode("Thank you for contacting us. We will reply soon."));
			exit();
	}
	else 
	{
		header("Location:".$_SERVER['HTTP_REFERER']."&wrong_code=true&session=yes");
		exit;	
	}
}
if($_REQUEST["process"]=="updateprofile")
{
	$query="update register_master set
	 register_user_first_name='".$_REQUEST["firstname"]."',
	 register_user_last_name='".$_REQUEST["lastname"]."',
	 register_user_unit='".$_REQUEST["unit"]."',
	 register_user_street='".$_REQUEST["street"]."',
	 register_user_subburb='".$_REQUEST["subburb"]."',
	 register_user_state='".$_REQUEST["state"]."',
	 register_user_pincode='".$_REQUEST["pincode"]."',
	 register_user_country='".$_REQUEST["country"]."',
	 register_user_phone='".$_REQUEST["phone"]."',
	 register_user_mobile='".$_REQUEST["mobile"]."'	
	where register_ID='".$_SESSION['loginuserid']."' and register_user_email='".$_SESSION['loginusername']."'
	 ";

	mysql_query($query);
	
	header("Location:index.php?content=7&view=profiledetails#t");
	exit();
	
}
if($_REQUEST["process"]=="changepassword")
{
	$recordsetmypassword = mysql_query("select * from register_master where register_ID='".$_SESSION['loginuserid']."' and register_user_email='".$_SESSION['loginusername']."' and register_user_password='".base64_encode($_REQUEST["oldpassword"])."' ",$cn);
	
	if(mysql_num_rows($recordsetmypassword)==0)
	{
		header("Location:index.php?content=7&view=changepassword&msg=no#t");
		exit();
	}
	else
	{
		$update="update register_master set register_user_password='".base64_encode($_REQUEST["newpassword"])."' where register_ID='".$_SESSION['loginuserid']."' and register_user_email='".$_SESSION['loginusername']."' and register_user_password='".base64_encode($_REQUEST["oldpassword"])."'";
		mysql_query($update);
	}
	
	header("Location:index.php?content=7&view=changepassword&msg=yes#t");
		exit();
}
if($_REQUEST["process"]=="forgot_password")
{

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
						$ToMail=$_GET["loginemail"];
						
						$qforgot=mysql_query("select * from register_master where register_user_email='".$_GET["loginemail"]."'");
						$rowforgot=mysql_fetch_array($qforgot);
											
						$Data= 'Dear ! '.$rowforgot["register_user_first_name"].' '.$rowforgot["register_user_last_name"].',<br /><br />
						
						You requested your account password.<br /><br />
                       						
						Your account password are given below.<br /><br />						
						
						Password : '.base64_decode($rowforgot["register_user_password"]).'<br /><br />						
						
						Regards,<br />
						Klassic Kids Team';
						
													
						$Subject= "Klassic Kids Forgot Account Password";						
							
						u_SendMail($FromMail,$ToMail,$Data,$Subject);
						
						header("Location:index.php?content=5&msg=forgot");
						exit;
}
?>