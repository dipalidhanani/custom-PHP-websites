<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>
<?php
$now = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];

if($_REQUEST["process"]=="addcategory")
{
	$parentcategory=$_REQUEST["parentcategory"];
		
	$query="insert into category_master (category_name,parent_category_ID,category_active_status) values ('".$_REQUEST["categoryname"]."','".$parentcategory."','".$_REQUEST["categorystatus"]."')";
	mysql_query($query);
	
	header("Location:category.php?categoryid=".$_REQUEST["parentcategory"]);
	exit();
}
if($_REQUEST["process"]=="editcategory")
{
		$parentcategory=$_REQUEST["parentcategory"];
		
	$query="update category_master set category_name='".$_REQUEST["categoryname"]."',parent_category_ID='".$parentcategory."',category_active_status='".$_REQUEST["categorystatus"]."' where category_ID='".$_REQUEST["categoryid"]."'";
	
	
	mysql_query($query);

	header("Location:category.php?categoryid=".$parentcategory);
	exit();
}

if($_REQUEST["process"]=="newshipping")
{

	for($i=$_REQUEST["postcode_starts"]; $i<=$_REQUEST["postcode_ends"]; $i++)
	{
		
		if(strlen($i)==3){$postcode="0".$i;}else{$postcode=$i;}
		
        $query="insert into shipping_charges 
		(
		shipping_zone,
		postcode,
		incl_GST,
		GST,
		ex_GST,				
		shipping_is_avail
		) 
		values 
		(
		'".$_REQUEST["shipping_zone"]."',
		'".$postcode."',
		'".$_REQUEST["incl_GST"]."',
		'".$_REQUEST["GST"]."',
		'".$_REQUEST["ex_GST"]."',
		'".$_REQUEST["shippingavailable"]."'
		)
		";
		
		mysql_query($query);
    }

		
		header("Location:shipping.php");
		exit();
}
if($_REQUEST["process"]=="editshipping")
{
		$query="update shipping_charges set
		shipping_zone='".$_REQUEST["shipping_zone"]."',
		postcode='".$_REQUEST["postcode"]."',
		incl_GST='".$_REQUEST["incl_GST"]."',
		GST='".$_REQUEST["GST"]."',
		ex_GST='".$_REQUEST["ex_GST"]."',		
		shipping_is_avail='".$_REQUEST["shippingavailable"]."'
		where shipping_charge_ID='".$_REQUEST["shippingid"]."'
		";
		mysql_query($query);
		
		header("Location:shipping.php");
		exit();
}
if($_REQUEST["process"]=="removeshipping")
{
	$query="delete from shipping_charges where shipping_charge_ID='".$_REQUEST["shippingid"]."'";
	mysql_query($query);
		
		header("Location:shipping.php");
		exit();
}
?>

