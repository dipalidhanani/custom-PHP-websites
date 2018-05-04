<?php session_start();
require_once("include/config.php");

	
	if($_POST['add'])
	{
		
		if($_SESSION['radio1'] == "Yes")
		{
			$f="Yes";
		}
		else
		{
			$f="No";
		}
		if($_REQUEST['status'] == "Yes")
		{
			$s = "Yes";
		}
		else 
		{
			$s = "No";
		}
	
	
		$q ="INSERT INTO property_propertydetail_master(property_propertdetail_property_type_id,
														property_propertydetail_postpropertyfor,
														property_propertydetail_country_id,
														property_propertydetail_state_id,
														property_propertydetail_city_id,
														propperty_propertydetail_area_id,
														propperty_propertydetail_area_code,
														property_propertydetail_bedroom,
														property_propertydetail_bathroom,														
														property_propertydetail_balconies,														
														property_propertydetail_status,
														property_propertydetail_name,
														property_propertdetail_property_email,
														property_propertydetail_company_address,														
														property_propertydetail_phoneno,
														property_propertydetail_property_price,
														property_submitted_by_id)values(
														'".$_REQUEST['ddlptype']."',
														'".$_REQUEST['ddlpost']."',
														'".$_REQUEST['ddlcountry']."',
														'".$_REQUEST['ddlstate']."',
														'".$_REQUEST['ddlcity']."',
														'".$_REQUEST['ddlarea']."',
														'".$_REQUEST['areacode']."',
														'".$_REQUEST['txtbedroom']."',
														'".$_REQUEST['txtbathroom']."',														
														'".$_REQUEST['txtbalcony']."',														
														'$s',
														'".$_REQUEST['txtpname']."',
														'".$_REQUEST['txtemail']."',
														'".$_REQUEST['txtcadd']."',														
														'".$_REQUEST['txtcontactno']."',
														'".$_REQUEST['txtprice']."',														
														'".$_SESSION['user_reg_id']."')";		

	$sql = mysql_query($q) or die(mysql_error());
	$id=mysql_insert_id();

	
			
			
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


$FromMail = "RM Realtor <dipali@indoushosting.com> \r\n";
$ToMail="RM Realtor <nilesh@indoushosting.com>";

$Subject="New Property on RM Realtor";


ob_start();
require('display_prop.php');
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


$FromMail2="RM Realtor <nilesh@indoushosting.com>";
$ToMail2="RM Realtor <".$_SESSION["email"].">";


$Subject2="Your Property on RM Realtor";


ob_start();
require('client_display_prop.php');
$Data2 = ob_get_contents();
ob_end_clean(); 

u_SendMail2($FromMail2,$ToMail2,$Data2,$Subject2);

header("location:home.php?pageno=17&msg=prop");
	
	}
	
exit;
?>