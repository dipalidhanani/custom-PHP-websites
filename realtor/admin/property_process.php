<?php session_start();
require_once("../include/config.php");

if($_SESSION['rm_admin_id']=="")
{
	echo "<script type=\"text/javascript\">document.location.href='login.php'; </script>\n";
	exit();
}

if($_GET['action']=="add")
{
	
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
		if($_POST['status'] == "Yes")
		{
			$s = "Yes";
		}
		else 
		{
			$s = "No";
		}
	
	
		$q ="INSERT INTO property_propertydetail_master(property_propertdetail_property_type_id,property_propertydetail_postpropertyfor, property_propertydetail_country_id, property_propertydetail_state_id,property_propertydetail_city_id, propperty_propertydetail_area_id,propperty_propertydetail_area_code, property_propertydetail_budgetmin,property_propertydetail_budgetmax , property_propertydetail_coveredarea_from , property_propertydetail_coveredarea_to, property_propertydetail_landarea_from, property_propertydetail_landarea_to, property_propertydetail_carpetarea_from, property_propertydetail_carpetarea_to, property_propertydetail_bedroom, property_propertydetail_bathroom, property_propertydetail_expectedrent, property_propertydetail_expectedprice, property_propertydetail_balconies, property_propertydetail_directional_facing, property_propertydetail_distance_from_highway, property_propertydetail_flooring, property_propertydetail_furnished, property_propertydetail_locality, property_propertydetail_furniture_detail, property_propertydetail_deposit_amount,property_propertydetail_status,property_propertydetail_timeperiod_for_rent, property_propertydetail_purpose_for_renting, property_propertydetail_property_no,property_propertydetail_property_name,property_propertydetail_property_address,property_propertydetail_project_name, property_propertydetail_project_description,property_propertydetail_property_url,property_propertdetail_selling_reason, property_propertydetail_building_no, property_propertydetail_select_flat_feature, property_propertydetail_type_of_seller_required, property_propertydetail_purpose_for_buying, property_propertydetail_use_for_property, property_propertydetail_timeframe_for_buying, property_propertydetail_seriousness_for_buying, property_propertydetail_transaction_type, property_propertydetail_property_ownership, property_propertydetail_age_of_property, property_propertdetail_possession_of_property, property_propertydetail_name, property_propertydetail_company_name, property_propertydetail_company_address, property_propertydetail_city, property_propertydetail_phoneno,property_propertydetail_property_price,property_propertydetail_coveredarea_rate, property_propertydetail_coveredarea_amount, property_propertydetail_landarea_rate,property_propertydetail_landarea_amount,property_propertydetail_carpetarea_rate,property_propertydetail_carpetarea_amount, property_propertydetail_coveredarea_type, property_propertydetail_landarea_type,property_propertydetail_carpetarea_type, property_propertydetail_timeperiod_for_rent_type, property_propertydetail_facing, property_propertydetail_distance_from_highway_type,property_propertydetail_parking_space,property_propertydetail_garage_facility,property_propertydetail_annual_tax_amt,property_propertydetail_tax_year,property_propertydetail_pool,property_propertydetail_extra_detail,property_propertydetail_airconditioning)values('".$_SESSION['ddlptype']."','".$_SESSION['ddlpost']."',																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																													'".$_SESSION['ddlcountry']."', 
'".$_SESSION['ddlstate']."','".$_SESSION['ddlcity']."','".$_SESSION['ddlarea']."','".$_SESSION['areacode']."','".$_SESSION['txtbudgetmin']."','".$_SESSION['txtbudgetmax']."',
'".$_SESSION['txtcovfrom']."','".$_SESSION['txtcovto']."','".$_SESSION['txtplotfrom']."','".$_SESSION['txtplotto']."','".$_SESSION['txtcarpetfrom']."',
'".$_SESSION['txtcarpetto']."','".$_SESSION['txtbedroom']."','".$_SESSION['txtbathroom']."','".$_SESSION['txtexrent']."','".$_SESSION['txtexprice']."',
'".$_SESSION['txtbalcony']."','".$_SESSION['ddldfacing']."','".$_SESSION['txtdisthigh']."','".$_SESSION['ddlfloring']."','$f','".$_SESSION['ddllocality']."','".$_SESSION['ddlfurniture']."','".$_SESSION['txtamt']."','Yes','".$_SESSION['txttrent']."','".$_SESSION['txtprent']."',
'".$_POST['txtpropno']."','".$_POST['txtpropname']."','".$_POST['txtpropadd']."','".$_POST['txtprojname']."','".$_POST['txtprojdesc']."','".$_POST['txtprojurl']."',
'".$_SESSION['txtsreason']."','".$_SESSION['txtbuilding']."','".$_SESSION['ddlffeature']."','".$_SESSION['ddltypeseller']."','".$_SESSION['ddlbpurpose']."',
'".$_SESSION['txtuprop']."','".$_SESSION['ddlbuytime']."','".$_SESSION['ddlserbuy']."','".$_SESSION['ddltransaction']."','".$_SESSION['ddlownership']."',
'".$_SESSION['ddlage']."','".$_SESSION['ddlpossession']."','".$_POST['txtpname']."','".$_POST['txtcname']."','".$_POST['txtcadd']."','".$_POST['txtcity']."',
'".$_POST['txtcontactno']."','".$_SESSION['txtprice']."','".$_SESSION['txtcovrate']."','".$_SESSION['txtcovamt']."',
'".$_SESSION['txtplotrate']."','".$_SESSION['txtplotamt']."','".$_SESSION['txtcarpetrate']."','".$_SESSION['txtcarpetamt']."','".$_SESSION['radiocovarea']."','".$_SESSION['radioplotarea']."','".$_SESSION['radiocarpetarea']."','".$_SESSION['ddltime']."','".$_SESSION['ddlfacing']."','".$_SESSION['ddldistance']."','".$_SESSION["ddlparking_space"]."','".$_SESSION["rdogarage"]."','".$_SESSION["txtannual_tax_amt"]."','".$_SESSION["ddltax_year"]."','".$_SESSION["rdopool"]."','".$_SESSION["extra_detail"]."','".$_SESSION["rdoairconditioning"]."')";


	$sql = mysql_query($q) or die(mysql_error());
	$id=mysql_insert_id();

	//// for inserting additional room
//	$checkbox = $_SESSION['room'];
//	$s = sizeof($checkbox);
//
//
//	for($i=0;$i<$s;$i++)
//	{
//		$query="insert into property_propertydetail_additionalroom (property_propertydetail_additionalroom_property_propertydetailid,additionalroom_name) values ('$id','$checkbox[$i]')";
//		$sql=mysql_query($query) or die(mysql_error());
//	}

	//for inserting amenities
	$checkbox1 = $_SESSION['ch'];
	$s = sizeof($checkbox1);


	for($i=0;$i<$s;$i++)
	{
		$query="insert into property_propertydetail_amenities (property_propertydetail_amenities_property_id,property_propertydetail_amenities_name) values ('$id','$checkbox1[$i]')";
		$sql=mysql_query($query) or die(mysql_error());
	}


	//for rename the upload image
	$date = date('d-m-Y'); 
	$img=$_SESSION['image'];
	$img2=$_SESSION['image2'];
	$img3=$_SESSION['image3'];
	$img4=$_SESSION['image4'];
	$img5=$_SESSION['image5'];
	
	
	$query1="update property_propertydetail_master set property_propertydetail_photo='$img',property_propertydetail_photo2='$img2',property_propertydetail_photo3='$img3',property_propertydetail_photo4='$img4',property_propertydetail_photo5='$img5' where property_propertydetail_id='$id'";  
			$sql=mysql_query($query1) or die(mysql_error());
			
	$_SESSION['msgi'] = "Record Inserted Successfully.";
	header("location:propertyDetail_list.php");
	exit;
	}
}
else if($_GET['action']=="edit")
{
	$pid=$_GET['pid'];

	if($_POST['update'])
	{
		if($_SESSION['radio1'] == "Yes")
		{
			$f="Yes";
		}
		else
		{
			$f="No";
		}
		if($_POST['status'] == "Yes")
		{
			$s = "Yes";
		}
		else 
		{
			$s = "No";
		}
	$qry="update property_propertydetail_master set property_propertdetail_property_type_id='".$_SESSION['ddlptype']."',property_propertydetail_postpropertyfor='".$_SESSION['ddlpost']."',property_propertydetail_country_id='".$_SESSION['ddlcountry']."',property_propertydetail_state_id='".$_SESSION['ddlstate']."',property_propertydetail_city_id='".$_SESSION['ddlcity']."', propperty_propertydetail_area_id='".$_SESSION['ddlarea']."',propperty_propertydetail_area_code='".$_SESSION['areacode']."', property_propertydetail_budgetmin='".$_SESSION['txtbudgetmin']."',property_propertydetail_budgetmax='".$_SESSION['txtbudgetmax']."' , property_propertydetail_coveredarea_from='".$_SESSION['txtcovfrom']."' , property_propertydetail_coveredarea_to='".$_SESSION['txtcovto']."', property_propertydetail_landarea_from='".$_SESSION['txtplotfrom']."', property_propertydetail_landarea_to='".$_SESSION['txtplotto']."', property_propertydetail_carpetarea_from='".$_SESSION['txtcarpetfrom']."', property_propertydetail_carpetarea_to='".$_SESSION['txtcarpetto']."', property_propertydetail_bedroom='".$_SESSION['txtbedroom']."', property_propertydetail_bathroom='".$_SESSION['txtbathroom']."', property_propertydetail_expectedrent='".$_SESSION['txtexrent']."', property_propertydetail_expectedprice='".$_SESSION['txtexprice']."', property_propertydetail_balconies='".$_SESSION['txtbalcony']."', property_propertydetail_directional_facing='".$_SESSION['ddldfacing']."', property_propertydetail_distance_from_highway='".$_SESSION['txtdisthigh']."', property_propertydetail_flooring='".$_SESSION['ddlfloring']."', property_propertydetail_furnished='$f',property_propertydetail_locality='".$_SESSION['ddllocality']."', property_propertydetail_furniture_detail='".$_SESSION['ddlfurniture']."', property_propertydetail_deposit_amount='".$_SESSION['txtamt']."',property_propertydetail_timeperiod_for_rent='".$_SESSION['txttrent']."', property_propertydetail_purpose_for_renting='".$_SESSION['txtprent']."', property_propertydetail_property_no='".$_POST['txtpropno']."' , property_propertydetail_property_name='".$_POST['txtpropname']."', property_propertydetail_property_address='".$_POST['txtpropadd']."', property_propertydetail_project_name='".$_POST['txtprojname']."', property_propertydetail_project_description='".$_POST['txtprojdesc']."',property_propertydetail_property_url='".$_POST['txtprojurl']."',property_propertdetail_selling_reason='".$_SESSION['txtsreason']."', property_propertydetail_building_no='".$_SESSION['txtbuilding']."', property_propertydetail_select_flat_feature='".$_SESSION['ddlffeature']."', property_propertydetail_type_of_seller_required='".$_SESSION['ddltypeseller']."', property_propertydetail_purpose_for_buying='".$_SESSION['ddlbpurpose']."', property_propertydetail_use_for_property='".$_SESSION['txtuprop']."', property_propertydetail_timeframe_for_buying='".$_SESSION['ddlbuytime']."', property_propertydetail_seriousness_for_buying='".$_SESSION['ddlserbuy']."', property_propertydetail_transaction_type='".$_SESSION['ddltransaction']."', property_propertydetail_property_ownership='".$_SESSION['ddlownership']."', property_propertydetail_age_of_property='".$_SESSION['ddlage']."', property_propertdetail_possession_of_property='".$_SESSION['ddlpossession']."', property_propertydetail_name='".$_POST['txtpname']."', property_propertydetail_company_name='".$_POST['txtcname']."', property_propertydetail_company_address='".$_POST['txtcadd']."', property_propertydetail_city='".$_POST['txtcity']."', property_propertydetail_phoneno='".$_POST['txtcontactno']."', property_propertydetail_property_price='".$_SESSION['txtprice']."',property_propertydetail_coveredarea_rate='".$_SESSION['txtcovrate']."', property_propertydetail_coveredarea_amount='".$_SESSION['txtcovamt']."', property_propertydetail_landarea_rate='".$_SESSION['txtplotrate']."', property_propertydetail_landarea_amount='".$_SESSION['txtplotamt']."', property_propertydetail_carpetarea_rate='".$_SESSION['txtcarpetrate']."',property_propertydetail_carpetarea_amount='".$_SESSION['txtcarpetamt']."', property_propertydetail_coveredarea_type='".$_SESSION['radiocovarea']."', property_propertydetail_landarea_type='".$_SESSION['radioplotarea']."', property_propertydetail_carpetarea_type='".$_SESSION['radiocarpetarea']."', property_propertydetail_timeperiod_for_rent_type='".$_SESSION['ddltime']."',property_propertydetail_facing='".$_SESSION['ddlfacing']."', property_propertydetail_distance_from_highway_type='".$_SESSION['ddldistance']."',property_propertydetail_parking_space='".$_SESSION["ddlparking_space"]."',property_propertydetail_garage_facility='".$_SESSION["rdogarage"]."',property_propertydetail_annual_tax_amt='".$_SESSION["txtannual_tax_amt"]."',property_propertydetail_tax_year='".$_SESSION["ddltax_year"]."',property_propertydetail_pool='".$_SESSION["rdopool"]."',property_propertydetail_extra_detail='".$_SESSION["extra_detail"]."',property_propertydetail_airconditioning='".$_SESSION["rdoairconditioning"]."' where property_propertydetail_id=$pid";
		$sql = mysql_query($qry) or die(mysql_error());
		
		//for updating amenities
		$checkbox1 = $_SESSION['ch'];
		$s = sizeof($checkbox1);
		
		$q="delete from property_propertydetail_amenities where property_propertydetail_amenities_property_id=$pid";
		$sql=mysql_query($q) or die(mysql_error());
		for($i=0;$i<$s;$i++)
		{
				$query="insert into property_propertydetail_amenities (property_propertydetail_amenities_property_id,property_propertydetail_amenities_name) values ('$pid','$checkbox1[$i]')";
				
				$sql=mysql_query($query) or die(mysql_error());
		}
		
	//	// for updating additional room
//		$checkbox = $_SESSION['room'];
//		$s = sizeof($checkbox);
//		$q1=mysql_query("delete from property_propertydetail_additionalroom where property_propertydetail_additionalroom_property_propertydetailid=$pid") or die(mysql_query());
//
//	for($i=0;$i<$s;$i++)
//	{
//		$query="insert into property_propertydetail_additionalroom (property_propertydetail_additionalroom_property_propertydetailid,additionalroom_name) values ('$pid','$checkbox[$i]')";
//		$sql=mysql_query($query) or die(mysql_error());
//	}
	
	//for rename the upload image
	$date = date('d-m-Y'); 
	$img=$_SESSION['image'];
	$img2=$_SESSION['image2'];
	$img3=$_SESSION['image3'];
	$img4=$_SESSION['image4'];
	$img5=$_SESSION['image5'];
			$query1="update property_propertydetail_master set property_propertydetail_photo='$img',property_propertydetail_photo2='$img2',property_propertydetail_photo3='$img3',property_propertydetail_photo4='$img4',property_propertydetail_photo5='$img5' where property_propertydetail_id='$pid'";  
			$sql=mysql_query($query1) or die(mysql_error());
		
		$_SESSION['msgu'] = "Record Updated Successfully.";
		unset($_SESSION['image']);
		unset($_SESSION['image2']);
			unset($_SESSION['image3']);
				unset($_SESSION['image4']);
					unset($_SESSION['image5']);
	header("location:propertyDetail_list.php");
	
	exit;	
	}
}
		
?>