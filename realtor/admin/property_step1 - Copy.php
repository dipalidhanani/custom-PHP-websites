<?php session_start();
require_once("../include/config.php");

if($_SESSION['rm_admin_id']=="")
{
	echo "<script type=\"text/javascript\">document.location.href='login.php'; </script>\n";
	exit();
}

$act = $_REQUEST["action"];
$pid=$_GET['pid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RM Realtor - Admin Facility</title>
<link rel="stylesheet" href="css/css.css" type="text/css" />
<link rel="stylesheet" href="menu_style.css" type="text/css" />
<style type="text/css">
<!--
body {
	background-color: #E8E8E8;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>

</head>

<body>

<script language="javascript" type="text/javascript" src="dropdown.js"></script>

<script language="javascript">

						function loadproperty()
  						{
	  							//alert(document.getElementById("ddlpost").value);
							
	 						 if(document.getElementById("ddlpost").value=="Buy" )
			  					{  
   										document.getElementById("carpetarea").style.display = '';
										document.getElementById("carpetarea").style.visibility="visible";
										document.getElementById("carpetareamsg").style.display = '';
										document.getElementById("carpetareamsg").style.visibility="visible";
										
										document.getElementById("carpetarearate").style.display = '';
										document.getElementById("carpetarearate").style.visibility="visible";
										document.getElementById("carpetarearatemsg").style.display = '';
										document.getElementById("carpetarearatemsg").style.visibility="visible";
										
										document.getElementById("carpetareaamt").style.display = '';
										document.getElementById("carpetareaamt").style.visibility="visible";
										document.getElementById("carpetareaamtmsg").style.display = '';
										document.getElementById("carpetareaamtmsg").style.visibility="visible";
										
										document.getElementById("budget").style.display = '';
										document.getElementById("budget").style.visibility="visible";
										document.getElementById("budgetmsg").style.display = '';
										document.getElementById("budgetmsg").style.visibility="visible";
										
										document.getElementById("expectedrent").style.display = 'none';
										document.getElementById("expectedrent").style.visibility="hidden";
										document.getElementById("expectedrentmsg").style.display = 'none';
										document.getElementById("expectedrentmsg").style.visibility="hidden";
										
										document.getElementById("expectedprice").style.display = 'none';
										document.getElementById("expectedprice").style.visibility="hidden";
										document.getElementById("expectedpricemsg").style.display = 'none';
										document.getElementById("expectedpricemsg").style.visibility="hidden";
										
										document.getElementById("timerent").style.display = 'none';
										document.getElementById("timerent").style.visibility="hidden";
										document.getElementById("timerentmsg").style.display = 'none';
										document.getElementById("timerentmsg").style.visibility="hidden";
										
										document.getElementById("purposerent").style.display = 'none';
										document.getElementById("purposerent").style.visibility="hidden";
										document.getElementById("purposerentmsg").style.display = 'none';
										document.getElementById("purposerentmsg").style.visibility="hidden";
										
										document.getElementById("sellreason").style.display = 'none';
										document.getElementById("sellreason").style.visibility="hidden";
										document.getElementById("sellreasonmsg").style.display = 'none';
										document.getElementById("sellreasonmsg").style.visibility="hidden";
										
										document.getElementById("typeseller").style.display = 'none';
										document.getElementById("typeseller").style.visibility="hidden";
										document.getElementById("typesellermsg").style.display = 'none';
										document.getElementById("typesellermsg").style.visibility="hidden";
										
										document.getElementById("buypurpose").style.display = '';
										document.getElementById("buypurpose").style.visibility="visible";
										document.getElementById("buypurposemsg").style.display = '';
										document.getElementById("buypurposemsg").style.visibility="visible";
										
										document.getElementById("useproperty").style.display = '';
										document.getElementById("useproperty").style.visibility="visible";
										document.getElementById("usepropertymsg").style.display = '';
										document.getElementById("usepropertymsg").style.visibility="visible";
										
										document.getElementById("timebuy").style.display = '';
										document.getElementById("timebuy").style.visibility="visible";
										document.getElementById("timebuymsg").style.display = '';
										document.getElementById("timebuymsg").style.visibility="visible";
										
										document.getElementById("seriousbuy").style.display = '';
										document.getElementById("seriousbuy").style.visibility="visible";
										document.getElementById("seriousbuymsg").style.display = '';
										document.getElementById("seriousbuymsg").style.visibility="visible";
										
										document.getElementById("transactiontype").style.display = '';
										document.getElementById("transactiontype").style.visibility="visible";
										document.getElementById("transactiontypemsg").style.display = '';
										document.getElementById("transactiontypemsg").style.visibility="visible";
										
										document.getElementById("propownership").style.display = '';
										document.getElementById("propownership").style.visibility="visible";
										document.getElementById("propownershipmsg").style.display = '';
										document.getElementById("propownershipmsg").style.visibility="visible";

										document.getElementById("proppossession").style.display = '';
										document.getElementById("proppossession").style.visibility="visible";
										document.getElementById("proppossessionmsg").style.display = '';
										document.getElementById("proppossessionmsg").style.visibility="visible";
										
										document.getElementById("propage").style.display = '';
										document.getElementById("propage").style.visibility="visible";
										document.getElementById("propagemsg").style.display = '';
										document.getElementById("propagemsg").style.visibility="visible";
										
										var type = document.getElementById("ddlptype");
										var value = type.selectedIndex;
										var name = type.options[value].text;
							
							
										if(name =="Residential")
			  							{
											document.getElementById("carpetarea").style.display = '';
										document.getElementById("carpetarea").style.visibility="visible";
										document.getElementById("carpetareamsg").style.display = '';
										document.getElementById("carpetareamsg").style.visibility="visible";
										
										document.getElementById("carpetarearate").style.display = '';
										document.getElementById("carpetarearate").style.visibility="visible";
										document.getElementById("carpetarearatemsg").style.display = '';
										document.getElementById("carpetarearatemsg").style.visibility="visible";
										
										document.getElementById("carpetareaamt").style.display = '';
										document.getElementById("carpetareaamt").style.visibility="visible";
										document.getElementById("carpetareaamtmsg").style.display = '';
										document.getElementById("carpetareaamtmsg").style.visibility="visible";
										}
										else if(name=="Commercial")
										{
											document.getElementById("carpetarea").style.display = 'none';
										document.getElementById("carpetarea").style.visibility="hidden";
										document.getElementById("carpetareamsg").style.display = 'none';
										document.getElementById("carpetareamsg").style.visibility="hidden";
										
										document.getElementById("carpetarearate").style.display = 'none';
										document.getElementById("carpetarearate").style.visibility="hidden";
										document.getElementById("carpetarearatemsg").style.display = 'none';
										document.getElementById("carpetarearatemsg").style.visibility="hidden";
										
										document.getElementById("carpetareaamt").style.display = 'none';
										document.getElementById("carpetareaamt").style.visibility="hidden";
										document.getElementById("carpetareaamtmsg").style.display = 'none';
										document.getElementById("carpetareaamtmsg").style.visibility="hidden";
										}
										else if(name=="Agricultural")
										{
											document.getElementById("carpetarea").style.display = 'none';
										document.getElementById("carpetarea").style.visibility="hidden";
										document.getElementById("carpetareamsg").style.display = 'none';
										document.getElementById("carpetareamsg").style.visibility="hidden";
										
										document.getElementById("carpetarearate").style.display = 'none';
										document.getElementById("carpetarearate").style.visibility="hidden";
										document.getElementById("carpetarearatemsg").style.display = 'none';
										document.getElementById("carpetarearatemsg").style.visibility="hidden";
										
										document.getElementById("carpetareaamt").style.display = 'none';
										document.getElementById("carpetareaamt").style.visibility="hidden";
										document.getElementById("carpetareaamtmsg").style.display = 'none';
										document.getElementById("carpetareaamtmsg").style.visibility="hidden";
										}
										else if(name=="Industrial")
										{
											document.getElementById("carpetarea").style.display = 'none';
										document.getElementById("carpetarea").style.visibility="hidden";
										document.getElementById("carpetareamsg").style.display = 'none';
										document.getElementById("carpetareamsg").style.visibility="hidden";
										
										document.getElementById("carpetarearate").style.display = 'none';
										document.getElementById("carpetarearate").style.visibility="hidden";
										document.getElementById("carpetarearatemsg").style.display = 'none';
										document.getElementById("carpetarearatemsg").style.visibility="hidden";
										
										document.getElementById("carpetareaamt").style.display = 'none';
										document.getElementById("carpetareaamt").style.visibility="hidden";
										document.getElementById("carpetareaamtmsg").style.display = 'none';
										document.getElementById("carpetareaamtmsg").style.visibility="hidden";
										}
										
										
										
										
								}
								else if(document.getElementById("ddlpost").value=="Rent")
								{
										document.getElementById("carpetarea").style.display = '';
										document.getElementById("carpetarea").style.visibility="visible";
										document.getElementById("carpetareamsg").style.display = '';
										document.getElementById("carpetareamsg").style.visibility="visible";
										
										document.getElementById("carpetarearate").style.display = '';
										document.getElementById("carpetarearate").style.visibility="visible";
										document.getElementById("carpetarearatemsg").style.display = '';
										document.getElementById("carpetarearatemsg").style.visibility="visible";
										
										document.getElementById("carpetareaamt").style.display = '';
										document.getElementById("carpetareaamt").style.visibility="visible";
										document.getElementById("carpetareaamtmsg").style.display = '';
										document.getElementById("carpetareaamtmsg").style.visibility="visible";
										
										document.getElementById("budget").style.display = 'none';
										document.getElementById("budget").style.visibility="hidden";
										document.getElementById("budgetmsg").style.display = 'none';
										document.getElementById("budgetmsg").style.visibility="hidden";
										
										document.getElementById("expectedrent").style.display = '';
										document.getElementById("expectedrent").style.visibility="visible";
										document.getElementById("expectedrentmsg").style.display = '';
										document.getElementById("expectedrentmsg").style.visibility="visible";
										
										document.getElementById("expectedprice").style.display = '';
										document.getElementById("expectedprice").style.visibility="visible";
										document.getElementById("expectedpricemsg").style.display = '';
										document.getElementById("expectedpricemsg").style.visibility="visible";
										
										document.getElementById("timerent").style.display = '';
										document.getElementById("timerent").style.visibility="visible";
										document.getElementById("timerentmsg").style.display = '';
										document.getElementById("timerentmsg").style.visibility="visible";
										
										document.getElementById("purposerent").style.display = 'none';
										document.getElementById("purposerent").style.visibility="hidden";
										document.getElementById("purposerentmsg").style.display = 'none';
										document.getElementById("purposerentmsg").style.visibility="hidden";
										
										document.getElementById("sellreason").style.display = 'none';
										document.getElementById("sellreason").style.visibility="hidden";
										document.getElementById("sellreasonmsg").style.display = 'none';
										document.getElementById("sellreasonmsg").style.visibility="hidden";
										
										document.getElementById("typeseller").style.display = 'none';
										document.getElementById("typeseller").style.visibility="hidden";
										document.getElementById("typesellermsg").style.display = 'none';
										document.getElementById("typesellermsg").style.visibility="hidden";
										
										document.getElementById("buypurpose").style.display = 'none';
										document.getElementById("buypurpose").style.visibility="hidden";
										document.getElementById("buypurposemsg").style.display = 'none';
										document.getElementById("buypurposemsg").style.visibility="hidden";
										
										document.getElementById("useproperty").style.display = 'none';
										document.getElementById("useproperty").style.visibility="hidden";
										document.getElementById("usepropertymsg").style.display = 'none';
										document.getElementById("usepropertymsg").style.visibility="hidden";
										
										document.getElementById("timebuy").style.display = 'none';
										document.getElementById("timebuy").style.visibility="hidden";
										document.getElementById("timebuymsg").style.display = 'none';
										document.getElementById("timebuymsg").style.visibility="hidden";
										
										document.getElementById("seriousbuy").style.display = 'none';
										document.getElementById("seriousbuy").style.visibility="hidden";
										document.getElementById("seriousbuymsg").style.display = 'none';
										document.getElementById("seriousbuymsg").style.visibility="hidden";
										
										document.getElementById("transactiontype").style.display = 'none';
										document.getElementById("transactiontype").style.visibility="hidden";
										document.getElementById("transactiontypemsg").style.display = 'none';
										document.getElementById("transactiontypemsg").style.visibility="hidden";
										
										document.getElementById("propownership").style.display = 'none';
										document.getElementById("propownership").style.visibility="hidden";
										document.getElementById("propownershipmsg").style.display = 'none';
										document.getElementById("propownershipmsg").style.visibility="hidden";

										document.getElementById("proppossession").style.display = 'none';
										document.getElementById("proppossession").style.visibility="hidden";
										document.getElementById("proppossessionmsg").style.display = 'none';
										document.getElementById("proppossessionmsg").style.visibility="hidden";
										
										document.getElementById("propage").style.display = 'none';
										document.getElementById("propage").style.visibility="hidden";
										document.getElementById("propagemsg").style.display = 'none';
										document.getElementById("propagemsg").style.visibility="hidden";
										
										var type = document.getElementById("ddlptype");
										var value = type.selectedIndex;
										var name = type.options[value].text;
							
							
										if(name =="Residential")
			  							{
											document.getElementById("carpetarea").style.display = '';
										document.getElementById("carpetarea").style.visibility="visible";
										document.getElementById("carpetareamsg").style.display = '';
										document.getElementById("carpetareamsg").style.visibility="visible";
										
										document.getElementById("carpetarearate").style.display = '';
										document.getElementById("carpetarearate").style.visibility="visible";
										document.getElementById("carpetarearatemsg").style.display = '';
										document.getElementById("carpetarearatemsg").style.visibility="visible";
										
										document.getElementById("carpetareaamt").style.display = '';
										document.getElementById("carpetareaamt").style.visibility="visible";
										document.getElementById("carpetareaamtmsg").style.display = '';
										document.getElementById("carpetareaamtmsg").style.visibility="visible";
										}
										else if(name=="Commercial")
										{
											document.getElementById("carpetarea").style.display = 'none';
										document.getElementById("carpetarea").style.visibility="hidden";
										document.getElementById("carpetareamsg").style.display = 'none';
										document.getElementById("carpetareamsg").style.visibility="hidden";
										
										document.getElementById("carpetarearate").style.display = 'none';
										document.getElementById("carpetarearate").style.visibility="hidden";
										document.getElementById("carpetarearatemsg").style.display = 'none';
										document.getElementById("carpetarearatemsg").style.visibility="hidden";
										
										document.getElementById("carpetareaamt").style.display = 'none';
										document.getElementById("carpetareaamt").style.visibility="hidden";
										document.getElementById("carpetareaamtmsg").style.display = 'none';
										document.getElementById("carpetareaamtmsg").style.visibility="hidden";
										}
										else if(name=="Agricultural")
										{
											document.getElementById("carpetarea").style.display = 'none';
										document.getElementById("carpetarea").style.visibility="hidden";
										document.getElementById("carpetareamsg").style.display = 'none';
										document.getElementById("carpetareamsg").style.visibility="hidden";
										
										document.getElementById("carpetarearate").style.display = 'none';
										document.getElementById("carpetarearate").style.visibility="hidden";
										document.getElementById("carpetarearatemsg").style.display = 'none';
										document.getElementById("carpetarearatemsg").style.visibility="hidden";
										
										document.getElementById("carpetareaamt").style.display = 'none';
										document.getElementById("carpetareaamt").style.visibility="hidden";
										document.getElementById("carpetareaamtmsg").style.display = 'none';
										document.getElementById("carpetareaamtmsg").style.visibility="hidden";
										}
										else if(name=="Industrial")
										{
											document.getElementById("carpetarea").style.display = 'none';
										document.getElementById("carpetarea").style.visibility="hidden";
										document.getElementById("carpetareamsg").style.display = 'none';
										document.getElementById("carpetareamsg").style.visibility="hidden";
										
										document.getElementById("carpetarearate").style.display = 'none';
										document.getElementById("carpetarearate").style.visibility="hidden";
										document.getElementById("carpetarearatemsg").style.display = 'none';
										document.getElementById("carpetarearatemsg").style.visibility="hidden";
										
										document.getElementById("carpetareaamt").style.display = 'none';
										document.getElementById("carpetareaamt").style.visibility="hidden";
										document.getElementById("carpetareaamtmsg").style.display = 'none';
										document.getElementById("carpetareaamtmsg").style.visibility="hidden";
										}
										
										
										
								}
								else if(document.getElementById("ddlpost").value=="Lease")
								{
										document.getElementById("carpetarea").style.display = '';
										document.getElementById("carpetarea").style.visibility="visible";
										document.getElementById("carpetareamsg").style.display = '';
										document.getElementById("carpetareamsg").style.visibility="visible";
										
										document.getElementById("carpetarearate").style.display = '';
										document.getElementById("carpetarearate").style.visibility="visible";
										document.getElementById("carpetarearatemsg").style.display = '';
										document.getElementById("carpetarearatemsg").style.visibility="visible";
										
										document.getElementById("carpetareaamt").style.display = '';
										document.getElementById("carpetareaamt").style.visibility="visible";
										document.getElementById("carpetareaamtmsg").style.display = '';
										document.getElementById("carpetareaamtmsg").style.visibility="visible";
										
										document.getElementById("budget").style.display = 'none';
										document.getElementById("budget").style.visibility="hidden";
										document.getElementById("budgetmsg").style.display = 'none';
										document.getElementById("budgetmsg").style.visibility="hidden";
										
										document.getElementById("expectedrent").style.display = '';
										document.getElementById("expectedrent").style.visibility="visible";
										document.getElementById("expectedrentmsg").style.display = '';
										document.getElementById("expectedrentmsg").style.visibility="visible";
										
										document.getElementById("expectedprice").style.display = '';
										document.getElementById("expectedprice").style.visibility="visible";
										document.getElementById("expectedpricemsg").style.display = '';
										document.getElementById("expectedpricemsg").style.visibility="visible";
										
										document.getElementById("timerent").style.display = '';
										document.getElementById("timerent").style.visibility="visible";
										document.getElementById("timerentmsg").style.display = '';
										document.getElementById("timerentmsg").style.visibility="visible";
										
										document.getElementById("purposerent").style.display = '';
										document.getElementById("purposerent").style.visibility="visible";
										document.getElementById("purposerentmsg").style.display = '';
										document.getElementById("purposerentmsg").style.visibility="visible";
										
										document.getElementById("sellreason").style.display = 'none';
										document.getElementById("sellreason").style.visibility="hidden";
										document.getElementById("sellreasonmsg").style.display = 'none';
										document.getElementById("sellreasonmsg").style.visibility="hidden";
										
										document.getElementById("typeseller").style.display = 'none';
										document.getElementById("typeseller").style.visibility="hidden";
										document.getElementById("typesellermsg").style.display = 'none';
										document.getElementById("typesellermsg").style.visibility="hidden";
										
										document.getElementById("buypurpose").style.display = 'none';
										document.getElementById("buypurpose").style.visibility="hidden";
										document.getElementById("buypurposemsg").style.display = 'none';
										document.getElementById("buypurposemsg").style.visibility="hidden";
										
										document.getElementById("useproperty").style.display = 'none';
										document.getElementById("useproperty").style.visibility="hidden";
										document.getElementById("usepropertymsg").style.display = 'none';
										document.getElementById("usepropertymsg").style.visibility="hidden";
										
										document.getElementById("timebuy").style.display = 'none';
										document.getElementById("timebuy").style.visibility="hidden";
										document.getElementById("timebuymsg").style.display = 'none';
										document.getElementById("timebuymsg").style.visibility="hidden";
										
										document.getElementById("seriousbuy").style.display = 'none';
										document.getElementById("seriousbuy").style.visibility="hidden";
										document.getElementById("seriousbuymsg").style.display = 'none';
										document.getElementById("seriousbuymsg").style.visibility="hidden";
										
										document.getElementById("transactiontype").style.display = 'none';
										document.getElementById("transactiontype").style.visibility="hidden";
										document.getElementById("transactiontypemsg").style.display = 'none';
										document.getElementById("transactiontypemsg").style.visibility="hidden";
										
										document.getElementById("propownership").style.display = 'none';
										document.getElementById("propownership").style.visibility="hidden";
										document.getElementById("propownershipmsg").style.display = 'none';
										document.getElementById("propownershipmsg").style.visibility="hidden";

										document.getElementById("proppossession").style.display = 'none';
										document.getElementById("proppossession").style.visibility="hidden";
										document.getElementById("proppossessionmsg").style.display = 'none';
										document.getElementById("proppossessionmsg").style.visibility="hidden";
										
										document.getElementById("propage").style.display = 'none';
										document.getElementById("propage").style.visibility="hidden";
										document.getElementById("propagemsg").style.display = 'none';
										document.getElementById("propagemsg").style.visibility="hidden";
										
										var type = document.getElementById("ddlptype");
										var value = type.selectedIndex;
										var name = type.options[value].text;
							
							
										if(name =="Residential")
			  							{
											document.getElementById("carpetarea").style.display = '';
										document.getElementById("carpetarea").style.visibility="visible";
										document.getElementById("carpetareamsg").style.display = '';
										document.getElementById("carpetareamsg").style.visibility="visible";
										
										document.getElementById("carpetarearate").style.display = '';
										document.getElementById("carpetarearate").style.visibility="visible";
										document.getElementById("carpetarearatemsg").style.display = '';
										document.getElementById("carpetarearatemsg").style.visibility="visible";
										
										document.getElementById("carpetareaamt").style.display = '';
										document.getElementById("carpetareaamt").style.visibility="visible";
										document.getElementById("carpetareaamtmsg").style.display = '';
										document.getElementById("carpetareaamtmsg").style.visibility="visible";
										}
										else if(name=="Commercial")
										{
											document.getElementById("carpetarea").style.display = 'none';
										document.getElementById("carpetarea").style.visibility="hidden";
										document.getElementById("carpetareamsg").style.display = 'none';
										document.getElementById("carpetareamsg").style.visibility="hidden";
										
										document.getElementById("carpetarearate").style.display = 'none';
										document.getElementById("carpetarearate").style.visibility="hidden";
										document.getElementById("carpetarearatemsg").style.display = 'none';
										document.getElementById("carpetarearatemsg").style.visibility="hidden";
										
										document.getElementById("carpetareaamt").style.display = 'none';
										document.getElementById("carpetareaamt").style.visibility="hidden";
										document.getElementById("carpetareaamtmsg").style.display = 'none';
										document.getElementById("carpetareaamtmsg").style.visibility="hidden";
										}
										else if(name=="Agricultural")
										{
											document.getElementById("carpetarea").style.display = 'none';
										document.getElementById("carpetarea").style.visibility="hidden";
										document.getElementById("carpetareamsg").style.display = 'none';
										document.getElementById("carpetareamsg").style.visibility="hidden";
										
										document.getElementById("carpetarearate").style.display = 'none';
										document.getElementById("carpetarearate").style.visibility="hidden";
										document.getElementById("carpetarearatemsg").style.display = 'none';
										document.getElementById("carpetarearatemsg").style.visibility="hidden";
										
										document.getElementById("carpetareaamt").style.display = 'none';
										document.getElementById("carpetareaamt").style.visibility="hidden";
										document.getElementById("carpetareaamtmsg").style.display = 'none';
										document.getElementById("carpetareaamtmsg").style.visibility="hidden";
										}
										else if(name=="Industrial")
										{
											document.getElementById("carpetarea").style.display = 'none';
										document.getElementById("carpetarea").style.visibility="hidden";
										document.getElementById("carpetareamsg").style.display = 'none';
										document.getElementById("carpetareamsg").style.visibility="hidden";
										
										document.getElementById("carpetarearate").style.display = 'none';
										document.getElementById("carpetarearate").style.visibility="hidden";
										document.getElementById("carpetarearatemsg").style.display = 'none';
										document.getElementById("carpetarearatemsg").style.visibility="hidden";
										
										document.getElementById("carpetareaamt").style.display = 'none';
										document.getElementById("carpetareaamt").style.visibility="hidden";
										document.getElementById("carpetareaamtmsg").style.display = 'none';
										document.getElementById("carpetareaamtmsg").style.visibility="hidden";
										}
										
										
										
								}
								else if(document.getElementById("ddlpost").value=="Sell")
								{
										document.getElementById("carpetarea").style.display = '';
										document.getElementById("carpetarea").style.visibility="visible";
										document.getElementById("carpetareamsg").style.display = '';
										document.getElementById("carpetareamsg").style.visibility="visible";
										
										document.getElementById("carpetarearate").style.display = '';
										document.getElementById("carpetarearate").style.visibility="visible";
										document.getElementById("carpetarearatemsg").style.display = '';
										document.getElementById("carpetarearatemsg").style.visibility="visible";
										
										document.getElementById("carpetareaamt").style.display = '';
										document.getElementById("carpetareaamt").style.visibility="visible";
										document.getElementById("carpetareaamtmsg").style.display = '';
										document.getElementById("carpetareaamtmsg").style.visibility="visible";
										
										document.getElementById("budget").style.display = 'none';
										document.getElementById("budget").style.visibility="hidden";
										document.getElementById("budgetmsg").style.display = 'none';
										document.getElementById("budgetmsg").style.visibility="hidden";
										
										document.getElementById("expectedrent").style.display = 'none';
										document.getElementById("expectedrent").style.visibility="hidden";
										document.getElementById("expectedrentmsg").style.display = 'none';
										document.getElementById("expectedrentmsg").style.visibility="hidden";
										
										document.getElementById("expectedprice").style.display = 'none';
										document.getElementById("expectedprice").style.visibility="hidden";
										document.getElementById("expectedpricemsg").style.display = 'none';
										document.getElementById("expectedpricemsg").style.visibility="hidden";
										
										document.getElementById("timerent").style.display = 'none';
										document.getElementById("timerent").style.visibility="hidden";
										document.getElementById("timerentmsg").style.display = 'none';
										document.getElementById("timerentmsg").style.visibility="hidden";
										
										document.getElementById("purposerent").style.display = 'none';
										document.getElementById("purposerent").style.visibility="hidden";
										document.getElementById("purposerentmsg").style.display = 'none';
										document.getElementById("purposerentmsg").style.visibility="hidden";
										
										document.getElementById("sellreason").style.display = '';
										document.getElementById("sellreason").style.visibility="visible";
										document.getElementById("sellreasonmsg").style.display = '';
										document.getElementById("sellreasonmsg").style.visibility="visible";
										
										document.getElementById("typeseller").style.display = '';
										document.getElementById("typeseller").style.visibility="visible";
										document.getElementById("typesellermsg").style.display = '';
										document.getElementById("typesellermsg").style.visibility="visible";
										
										document.getElementById("buypurpose").style.display = 'none';
										document.getElementById("buypurpose").style.visibility="hidden";
										document.getElementById("buypurposemsg").style.display = 'none';
										document.getElementById("buypurposemsg").style.visibility="hidden";
										
										document.getElementById("useproperty").style.display = 'none';
										document.getElementById("useproperty").style.visibility="hidden";
										document.getElementById("usepropertymsg").style.display = 'none';
										document.getElementById("usepropertymsg").style.visibility="hidden";
										
										document.getElementById("timebuy").style.display = 'none';
										document.getElementById("timebuy").style.visibility="hidden";
										document.getElementById("timebuymsg").style.display = 'none';
										document.getElementById("timebuymsg").style.visibility="hidden";
										
										document.getElementById("seriousbuy").style.display = 'none';
										document.getElementById("seriousbuy").style.visibility="hidden";
										document.getElementById("seriousbuymsg").style.display = 'none';
										document.getElementById("seriousbuymsg").style.visibility="hidden";
										
										document.getElementById("transactiontype").style.display = 'none';
										document.getElementById("transactiontype").style.visibility="hidden";
										document.getElementById("transactiontypemsg").style.display = 'none';
										document.getElementById("transactiontypemsg").style.visibility="hidden";
										
										document.getElementById("propownership").style.display = 'none';
										document.getElementById("propownership").style.visibility="hidden";
										document.getElementById("propownershipmsg").style.display = 'none';
										document.getElementById("propownershipmsg").style.visibility="hidden";

										document.getElementById("proppossession").style.display = 'none';
										document.getElementById("proppossession").style.visibility="hidden";
										document.getElementById("proppossessionmsg").style.display = 'none';
										document.getElementById("proppossessionmsg").style.visibility="hidden";
										
										document.getElementById("propage").style.display = 'none';
										document.getElementById("propage").style.visibility="hidden";
										document.getElementById("propagemsg").style.display = 'none';
										document.getElementById("propagemsg").style.visibility="hidden";
										
										var type = document.getElementById("ddlptype");
										var value = type.selectedIndex;
										var name = type.options[value].text;
							
							
										if(name =="Residential")
			  							{
											document.getElementById("carpetarea").style.display = '';
										document.getElementById("carpetarea").style.visibility="visible";
										document.getElementById("carpetareamsg").style.display = '';
										document.getElementById("carpetareamsg").style.visibility="visible";
										
										document.getElementById("carpetarearate").style.display = '';
										document.getElementById("carpetarearate").style.visibility="visible";
										document.getElementById("carpetarearatemsg").style.display = '';
										document.getElementById("carpetarearatemsg").style.visibility="visible";
										
										document.getElementById("carpetareaamt").style.display = '';
										document.getElementById("carpetareaamt").style.visibility="visible";
										document.getElementById("carpetareaamtmsg").style.display = '';
										document.getElementById("carpetareaamtmsg").style.visibility="visible";
										}
										else if(name=="Commercial")
										{
											document.getElementById("carpetarea").style.display = 'none';
										document.getElementById("carpetarea").style.visibility="hidden";
										document.getElementById("carpetareamsg").style.display = 'none';
										document.getElementById("carpetareamsg").style.visibility="hidden";
										
										document.getElementById("carpetarearate").style.display = 'none';
										document.getElementById("carpetarearate").style.visibility="hidden";
										document.getElementById("carpetarearatemsg").style.display = 'none';
										document.getElementById("carpetarearatemsg").style.visibility="hidden";
										
										document.getElementById("carpetareaamt").style.display = 'none';
										document.getElementById("carpetareaamt").style.visibility="hidden";
										document.getElementById("carpetareaamtmsg").style.display = 'none';
										document.getElementById("carpetareaamtmsg").style.visibility="hidden";
										}
										else if(name=="Agricultural")
										{
											document.getElementById("carpetarea").style.display = 'none';
										document.getElementById("carpetarea").style.visibility="hidden";
										document.getElementById("carpetareamsg").style.display = 'none';
										document.getElementById("carpetareamsg").style.visibility="hidden";
										
										document.getElementById("carpetarearate").style.display = 'none';
										document.getElementById("carpetarearate").style.visibility="hidden";
										document.getElementById("carpetarearatemsg").style.display = 'none';
										document.getElementById("carpetarearatemsg").style.visibility="hidden";
										
										document.getElementById("carpetareaamt").style.display = 'none';
										document.getElementById("carpetareaamt").style.visibility="hidden";
										document.getElementById("carpetareaamtmsg").style.display = 'none';
										document.getElementById("carpetareaamtmsg").style.visibility="hidden";
										}
										else if(name=="Industrial")
										{
											document.getElementById("carpetarea").style.display = 'none';
										document.getElementById("carpetarea").style.visibility="hidden";
										document.getElementById("carpetareamsg").style.display = 'none';
										document.getElementById("carpetareamsg").style.visibility="hidden";
										
										document.getElementById("carpetarearate").style.display = 'none';
										document.getElementById("carpetarearate").style.visibility="hidden";
										document.getElementById("carpetarearatemsg").style.display = 'none';
										document.getElementById("carpetarearatemsg").style.visibility="hidden";
										
										document.getElementById("carpetareaamt").style.display = 'none';
										document.getElementById("carpetareaamt").style.visibility="hidden";
										document.getElementById("carpetareaamtmsg").style.display = 'none';
										document.getElementById("carpetareaamtmsg").style.visibility="hidden";
										}
										
										
										
								}
								else
								{
									document.getElementById("carpetarea").style.display = 'none';
										document.getElementById("carpetarea").style.visibility="hidden";
										document.getElementById("carpetareamsg").style.display = 'none';
										document.getElementById("carpetareamsg").style.visibility="hidden";
										
										document.getElementById("carpetarearate").style.display = 'none';
										document.getElementById("carpetarearate").style.visibility="hidden";
										document.getElementById("carpetarearatemsg").style.display = 'none';
										document.getElementById("carpetarearatemsg").style.visibility="hidden";
										
										document.getElementById("carpetareaamt").style.display = 'none';
										document.getElementById("carpetareaamt").style.visibility="hidden";
										document.getElementById("carpetareaamtmsg").style.display = 'none';
										document.getElementById("carpetareaamtmsg").style.visibility="hidden";
										
										document.getElementById("budget").style.display = 'none';
										document.getElementById("budget").style.visibility="hidden";
										document.getElementById("budgetmsg").style.display = 'none';
										document.getElementById("budgetmsg").style.visibility="hidden";
										
										document.getElementById("expectedrent").style.display = 'none';
										document.getElementById("expectedrent").style.visibility="hidden";
										document.getElementById("expectedrentmsg").style.display = 'none';
										document.getElementById("expectedrentmsg").style.visibility="hidden";
										
										document.getElementById("expectedprice").style.display = 'none';
										document.getElementById("expectedprice").style.visibility="hidden";
										document.getElementById("expectedpricemsg").style.display = 'none';
										document.getElementById("expectedpricemsg").style.visibility="hidden";
										
										document.getElementById("timerent").style.display = 'none';
										document.getElementById("timerent").style.visibility="hidden";
										document.getElementById("timerentmsg").style.display = 'none';
										document.getElementById("timerentmsg").style.visibility="hidden";
										
										document.getElementById("purposerent").style.display = 'none';
										document.getElementById("purposerent").style.visibility="hidden";
										document.getElementById("purposerentmsg").style.display = 'none';
										document.getElementById("purposerentmsg").style.visibility="hidden";
										
										document.getElementById("sellreason").style.display = 'none';
										document.getElementById("sellreason").style.visibility="hidden";
										document.getElementById("sellreasonmsg").style.display = 'none';
										document.getElementById("sellreasonmsg").style.visibility="hidden";
										
										document.getElementById("typeseller").style.display = 'none';
										document.getElementById("typeseller").style.visibility="hidden";
										document.getElementById("typesellermsg").style.display = 'none';
										document.getElementById("typesellermsg").style.visibility="hidden";
										
										document.getElementById("buypurpose").style.display = 'none';
										document.getElementById("buypurpose").style.visibility="hidden";
										document.getElementById("buypurposemsg").style.display = 'none';
										document.getElementById("buypurposemsg").style.visibility="hidden";
										
										document.getElementById("useproperty").style.display = 'none';
										document.getElementById("useproperty").style.visibility="hidden";
										document.getElementById("usepropertymsg").style.display = 'none';
										document.getElementById("usepropertymsg").style.visibility="hidden";
										
										document.getElementById("timebuy").style.display = 'none';
										document.getElementById("timebuy").style.visibility="hidden";
										document.getElementById("timebuymsg").style.display = 'none';
										document.getElementById("timebuymsg").style.visibility="hidden";
										
										document.getElementById("seriousbuy").style.display = 'none';
										document.getElementById("seriousbuy").style.visibility="hidden";
										document.getElementById("seriousbuymsg").style.display = 'none';
										document.getElementById("seriousbuymsg").style.visibility="hidden";
										
										document.getElementById("transactiontype").style.display = 'none';
										document.getElementById("transactiontype").style.visibility="hidden";
										document.getElementById("transactiontypemsg").style.display = 'none';
										document.getElementById("transactiontypemsg").style.visibility="hidden";
										
										document.getElementById("propownership").style.display = 'none';
										document.getElementById("propownership").style.visibility="hidden";
										document.getElementById("propownershipmsg").style.display = 'none';
										document.getElementById("propownershipmsg").style.visibility="hidden";

										document.getElementById("proppossession").style.display = 'none';
										document.getElementById("proppossession").style.visibility="hidden";
										document.getElementById("proppossessionmsg").style.display = 'none';
										document.getElementById("proppossessionmsg").style.visibility="hidden";
										
										document.getElementById("propage").style.display = 'none';
										document.getElementById("propage").style.visibility="hidden";
										document.getElementById("propagemsg").style.display = 'none';
										document.getElementById("propagemsg").style.visibility="hidden";
										
								}
								
						}
						
						
						function loadPropType()
						{
							var type = document.getElementById("ddlptype");
							var value = type.selectedIndex;
							var name = type.options[value].text;
							
							
							if(name =="Residential")
			  				{ 
								if(document.getElementById("ddlpost").value=="Buy" || document.getElementById("ddlpost").value=="Rent" || document.getElementById("ddlpost").value=="Lease" || document.getElementById("ddlpost").value=="Sell"  )
			  					{ 
								document.getElementById("propname").style.display = '';
								document.getElementById("propname").style.visibility="visible";
								
								document.getElementById("carpetarea").style.display = '';
								document.getElementById("carpetarea").style.visibility="visible";
								document.getElementById("carpetareamsg").style.display = '';
								document.getElementById("carpetareamsg").style.visibility="visible";
										
								document.getElementById("carpetarearate").style.display = '';
								document.getElementById("carpetarearate").style.visibility="visible";
								document.getElementById("carpetarearatemsg").style.display = '';
								document.getElementById("carpetarearatemsg").style.visibility="visible";
										
								document.getElementById("carpetareaamt").style.display = '';
								document.getElementById("carpetareaamt").style.visibility="visible";
								document.getElementById("carpetareaamtmsg").style.display = '';
								document.getElementById("carpetareaamtmsg").style.visibility="visible";
								}
							}
							else if(name =="Commercial")
			  				{ 
								 if(document.getElementById("ddlpost").value=="Buy" || document.getElementById("ddlpost").value=="Rent" || document.getElementById("ddlpost").value=="Lease" || document.getElementById("ddlpost").value=="Sell"  )
			  					{ 
								document.getElementById("propname").style.display = '';
								document.getElementById("propname").style.visibility="visible";
								
								document.getElementById("carpetarea").style.display = 'none';
								document.getElementById("carpetarea").style.visibility="hidden";
								document.getElementById("carpetareamsg").style.display = 'none';
								document.getElementById("carpetareamsg").style.visibility="hidden";
										
								document.getElementById("carpetarearate").style.display = 'none';
								document.getElementById("carpetarearate").style.visibility="hidden";
								document.getElementById("carpetarearatemsg").style.display = 'none';
								document.getElementById("carpetarearatemsg").style.visibility="hidden";
										
								document.getElementById("carpetareaamt").style.display = 'none';
								document.getElementById("carpetareaamt").style.visibility="hidden";
								document.getElementById("carpetareaamtmsg").style.display = 'none';
								document.getElementById("carpetareaamtmsg").style.visibility="hidden";
								}
							}
							else if(name =="Agricultural")
			  				{ 
								if(document.getElementById("ddlpost").value=="Buy" || document.getElementById("ddlpost").value=="Rent" || document.getElementById("ddlpost").value=="Lease" || document.getElementById("ddlpost").value=="Sell"  )
			  					{ 
								
								document.getElementById("propname").style.display = '';
								document.getElementById("propname").style.visibility="visible";
								
								document.getElementById("carpetarea").style.display = 'none';
								document.getElementById("carpetarea").style.visibility="hidden";
								document.getElementById("carpetareamsg").style.display = 'none';
								document.getElementById("carpetareamsg").style.visibility="hidden";
										
								document.getElementById("carpetarearate").style.display = 'none';
								document.getElementById("carpetarearate").style.visibility="hidden";
								document.getElementById("carpetarearatemsg").style.display = 'none';
								document.getElementById("carpetarearatemsg").style.visibility="hidden";
										
								document.getElementById("carpetareaamt").style.display = 'none';
								document.getElementById("carpetareaamt").style.visibility="hidden";
								document.getElementById("carpetareaamtmsg").style.display = 'none';
								document.getElementById("carpetareaamtmsg").style.visibility="hidden";
								}
							}
							else if(name =="Industrial")
			  				{ 
								if(document.getElementById("ddlpost").value=="Buy" || document.getElementById("ddlpost").value=="Rent" || document.getElementById("ddlpost").value=="Lease" || document.getElementById("ddlpost").value=="Sell"  )
			  					{ 
								document.getElementById("propname").style.display = '';
								document.getElementById("propname").style.visibility="visible";
								
								document.getElementById("carpetarea").style.display = 'none';
								document.getElementById("carpetarea").style.visibility="hidden";
								document.getElementById("carpetareamsg").style.display = 'none';
								document.getElementById("carpetareamsg").style.visibility="hidden";
										
								document.getElementById("carpetarearate").style.display = 'none';
								document.getElementById("carpetarearate").style.visibility="hidden";
								document.getElementById("carpetarearatemsg").style.display = 'none';
								document.getElementById("carpetarearatemsg").style.visibility="hidden";
										
								document.getElementById("carpetareaamt").style.display = 'none';
								document.getElementById("carpetareaamt").style.visibility="hidden";
								document.getElementById("carpetareaamtmsg").style.display = 'none';
								document.getElementById("carpetareaamtmsg").style.visibility="hidden";
								}
							}
							else
							{
								document.getElementById("propname").style.display = 'none';
								document.getElementById("propname").style.visibility="hidden";
							}
						}
						
						
						function loadPropName()
						{
							
							var type = document.getElementById("ddlprop");
							var value = type.selectedIndex;
							var name = type.options[value].text;
							//alert(name);
							
							if(name=="Flat")
							{
								document.getElementById("additionalmsg").style.display = '';
								document.getElementById("additionalmsg").style.visibility="visible";
								
								document.getElementById("bedroom").style.display = '';
								document.getElementById("bedroom").style.visibility="visible";
								document.getElementById("bedroommsg").style.display = '';
								document.getElementById("bedroommsg").style.visibility="visible";
								
								document.getElementById("bathroom").style.display = '';
								document.getElementById("bathroom").style.visibility="visible";
								document.getElementById("bathroommsg").style.display = '';
								document.getElementById("bathroommsg").style.visibility="visible";
								
								document.getElementById("balcony").style.display = '';
								document.getElementById("balcony").style.visibility="visible";
								document.getElementById("balconymsg").style.display = '';
								document.getElementById("balconymsg").style.visibility="visible";
								
								
								document.getElementById("floorno").style.display = '';
								document.getElementById("floorno").style.visibility="visible";
								document.getElementById("floornomsg").style.display = '';
								document.getElementById("floornomsg").style.visibility="visible";
								
								document.getElementById("buildingno").style.display = '';
								document.getElementById("buildingno").style.visibility="visible";
								document.getElementById("buildingnomsg").style.display = '';
								document.getElementById("buildingnomsg").style.visibility="visible";
								
								document.getElementById("addtionalroom").style.display = '';
								document.getElementById("addtionalroom").style.visibility="visible";
								document.getElementById("additionalroommsg").style.display = '';
								document.getElementById("additionalroommsg").style.visibility="visible";
								
								document.getElementById("flatfeature").style.display = '';
								document.getElementById("flatfeature").style.visibility="visible";
								document.getElementById("flatfeaturemsg").style.display = '';
								document.getElementById("flatfeaturemsg").style.visibility="visible";
								
								document.getElementById("flooring").style.display = '';
								document.getElementById("flooring").style.visibility="visible";
								document.getElementById("flooringmsg").style.display = '';
								document.getElementById("flooringmsg").style.visibility="visible";
								
								document.getElementById("direfacing").style.display = '';
								document.getElementById("direfacing").style.visibility="visible";
								document.getElementById("direfacingmsg").style.display = '';
								document.getElementById("direfacingmsg").style.visibility="visible";
								
								document.getElementById("facing").style.display = '';
								document.getElementById("facing").style.visibility="visible";
								document.getElementById("facingmsg").style.display = '';
								document.getElementById("facingmsg").style.visibility="visible";
								
								document.getElementById("furnished").style.display = '';
								document.getElementById("furnished").style.visibility="visible";
								document.getElementById("furnishedmsg").style.display = '';
								document.getElementById("furnishedmsg").style.visibility="visible";
								
								
								document.getElementById("disthighway").style.display = '';
								document.getElementById("disthighway").style.visibility="visible";
								document.getElementById("disthighwaymsg").style.display = '';
								document.getElementById("disthighwaymsg").style.visibility="visible";
								
								document.getElementById("propimage").style.display = '';
								document.getElementById("propimage").style.visibility="visible";
								document.getElementById("propimagemsg").style.display = '';
								document.getElementById("propimagemsg").style.visibility="visible";
								
								document.getElementById("amenities").style.display = '';
								document.getElementById("amenities").style.visibility="visible";
								document.getElementById("amenitieschk").style.display = '';
								document.getElementById("amenitieschk").style.visibility="visible";
								
								
							}
							else if(name=="Rowhouse")
							{
								document.getElementById("additionalmsg").style.display = '';
								document.getElementById("additionalmsg").style.visibility="visible";
								
								document.getElementById("bedroom").style.display = '';
								document.getElementById("bedroom").style.visibility="visible";
								document.getElementById("bedroommsg").style.display = '';
								document.getElementById("bedroommsg").style.visibility="visible";
								
								document.getElementById("bathroom").style.display = '';
								document.getElementById("bathroom").style.visibility="visible";
								document.getElementById("bathroommsg").style.display = '';
								document.getElementById("bathroommsg").style.visibility="visible";
								
								document.getElementById("balcony").style.display = '';
								document.getElementById("balcony").style.visibility="visible";
								document.getElementById("balconymsg").style.display = '';
								document.getElementById("balconymsg").style.visibility="visible";
								
								
								document.getElementById("floorno").style.display = 'none';
								document.getElementById("floorno").style.visibility="hidden";
								document.getElementById("floornomsg").style.display = 'none';
								document.getElementById("floornomsg").style.visibility="hidden";
								
								document.getElementById("buildingno").style.display = 'none';
								document.getElementById("buildingno").style.visibility="hidden";
								document.getElementById("buildingnomsg").style.display = 'none';
								document.getElementById("buildingnomsg").style.visibility="hidden";
								
								document.getElementById("addtionalroom").style.display = '';
								document.getElementById("addtionalroom").style.visibility="visible";
								document.getElementById("additionalroommsg").style.display = '';
								document.getElementById("additionalroommsg").style.visibility="visible";
								
								document.getElementById("flatfeature").style.display = 'none';
								document.getElementById("flatfeature").style.visibility="hidden";
								document.getElementById("flatfeaturemsg").style.display = 'none';
								document.getElementById("flatfeaturemsg").style.visibility="hidden";
								
								document.getElementById("flooring").style.display = '';
								document.getElementById("flooring").style.visibility="visible";
								document.getElementById("flooringmsg").style.display = '';
								document.getElementById("flooringmsg").style.visibility="visible";
								
								document.getElementById("direfacing").style.display = '';
								document.getElementById("direfacing").style.visibility="visible";
								document.getElementById("direfacingmsg").style.display = '';
								document.getElementById("direfacingmsg").style.visibility="visible";
								
								document.getElementById("facing").style.display = '';
								document.getElementById("facing").style.visibility="visible";
								document.getElementById("facingmsg").style.display = '';
								document.getElementById("facingmsg").style.visibility="visible";
								
								document.getElementById("furnished").style.display = '';
								document.getElementById("furnished").style.visibility="visible";
								document.getElementById("furnishedmsg").style.display = '';
								document.getElementById("furnishedmsg").style.visibility="visible";
								
								document.getElementById("furnituredetail").style.display = '';
								document.getElementById("furnituredetail").style.visibility="visible";
								document.getElementById("furnituredetailmsg").style.display = '';
								document.getElementById("furnituredetailmsg").style.visibility="visible";
								
								
								
								document.getElementById("propimage").style.display = '';
								document.getElementById("propimage").style.visibility="visible";
								document.getElementById("propimagemsg").style.display = '';
								document.getElementById("propimagemsg").style.visibility="visible";
								
								document.getElementById("amenities").style.display = '';
								document.getElementById("amenities").style.visibility="visible";
								document.getElementById("amenitieschk").style.display = '';
								document.getElementById("amenitieschk").style.visibility="visible";
							}
							
							else if(name == "Apartment")
							{
								document.getElementById("additionalmsg").style.display = '';
								document.getElementById("additionalmsg").style.visibility="visible";
								
								document.getElementById("bedroom").style.display = '';
								document.getElementById("bedroom").style.visibility="visible";
								document.getElementById("bedroommsg").style.display = '';
								document.getElementById("bedroommsg").style.visibility="visible";
								
								document.getElementById("bathroom").style.display = '';
								document.getElementById("bathroom").style.visibility="visible";
								document.getElementById("bathroommsg").style.display = '';
								document.getElementById("bathroommsg").style.visibility="visible";
								
								document.getElementById("balcony").style.display = '';
								document.getElementById("balcony").style.visibility="visible";
								document.getElementById("balconymsg").style.display = '';
								document.getElementById("balconymsg").style.visibility="visible";
								
								
								document.getElementById("floorno").style.display = '';
								document.getElementById("floorno").style.visibility="visible";
								document.getElementById("floornomsg").style.display = '';
								document.getElementById("floornomsg").style.visibility="visible";
								
								document.getElementById("buildingno").style.display = '';
								document.getElementById("buildingno").style.visibility="visible";
								document.getElementById("buildingnomsg").style.display = '';
								document.getElementById("buildingnomsg").style.visibility="visible";
								
								document.getElementById("addtionalroom").style.display = '';
								document.getElementById("addtionalroom").style.visibility="visible";
								document.getElementById("additionalroommsg").style.display = '';
								document.getElementById("additionalroommsg").style.visibility="visible";
								
								document.getElementById("flatfeature").style.display = '';
								document.getElementById("flatfeature").style.visibility="visible";
								document.getElementById("flatfeaturemsg").style.display = '';
								document.getElementById("flatfeaturemsg").style.visibility="visible";
								
								document.getElementById("flooring").style.display = '';
								document.getElementById("flooring").style.visibility="visible";
								document.getElementById("flooringmsg").style.display = '';
								document.getElementById("flooringmsg").style.visibility="visible";
								
								document.getElementById("direfacing").style.display = '';
								document.getElementById("direfacing").style.visibility="visible";
								document.getElementById("direfacingmsg").style.display = '';
								document.getElementById("direfacingmsg").style.visibility="visible";
								
								document.getElementById("facing").style.display = '';
								document.getElementById("facing").style.visibility="visible";
								document.getElementById("facingmsg").style.display = '';
								document.getElementById("facingmsg").style.visibility="visible";
								
								document.getElementById("furnished").style.display = '';
								document.getElementById("furnished").style.visibility="visible";
								document.getElementById("furnishedmsg").style.display = '';
								document.getElementById("furnishedmsg").style.visibility="visible";
								
								
								document.getElementById("disthighway").style.display = '';
								document.getElementById("disthighway").style.visibility="visible";
								document.getElementById("disthighwaymsg").style.display = '';
								document.getElementById("disthighwaymsg").style.visibility="visible";
								
								document.getElementById("propimage").style.display = '';
								document.getElementById("propimage").style.visibility="visible";
								document.getElementById("propimagemsg").style.display = '';
								document.getElementById("propimagemsg").style.visibility="visible";
								
								document.getElementById("amenities").style.display = '';
								document.getElementById("amenities").style.visibility="visible";
								document.getElementById("amenitieschk").style.display = '';
								document.getElementById("amenitieschk").style.visibility="visible";
							}
							
							else if(name == "Bunglow")
							{
								document.getElementById("additionalmsg").style.display = '';
								document.getElementById("additionalmsg").style.visibility="visible";
								
								document.getElementById("bedroom").style.display = '';
								document.getElementById("bedroom").style.visibility="visible";
								document.getElementById("bedroommsg").style.display = '';
								document.getElementById("bedroommsg").style.visibility="visible";
								
								document.getElementById("bathroom").style.display = '';
								document.getElementById("bathroom").style.visibility="visible";
								document.getElementById("bathroommsg").style.display = '';
								document.getElementById("bathroommsg").style.visibility="visible";
								
								document.getElementById("balcony").style.display = '';
								document.getElementById("balcony").style.visibility="visible";
								document.getElementById("balconymsg").style.display = '';
								document.getElementById("balconymsg").style.visibility="visible";
								
								
								document.getElementById("floorno").style.display = 'none';
								document.getElementById("floorno").style.visibility="hidden";
								document.getElementById("floornomsg").style.display = 'none';
								document.getElementById("floornomsg").style.visibility="hidden";
								
								document.getElementById("buildingno").style.display = 'none';
								document.getElementById("buildingno").style.visibility="hidden";
								document.getElementById("buildingnomsg").style.display = 'none';
								document.getElementById("buildingnomsg").style.visibility="hidden";
								
								document.getElementById("addtionalroom").style.display = '';
								document.getElementById("addtionalroom").style.visibility="visible";
								document.getElementById("additionalroommsg").style.display = '';
								document.getElementById("additionalroommsg").style.visibility="visible";
								
								document.getElementById("flatfeature").style.display = 'none';
								document.getElementById("flatfeature").style.visibility="hidden";
								document.getElementById("flatfeaturemsg").style.display = 'none';
								document.getElementById("flatfeaturemsg").style.visibility="hidden";
								
								document.getElementById("flooring").style.display = '';
								document.getElementById("flooring").style.visibility="visible";
								document.getElementById("flooringmsg").style.display = '';
								document.getElementById("flooringmsg").style.visibility="visible";
								
								document.getElementById("direfacing").style.display = '';
								document.getElementById("direfacing").style.visibility="visible";
								document.getElementById("direfacingmsg").style.display = '';
								document.getElementById("direfacingmsg").style.visibility="visible";
								
								document.getElementById("facing").style.display = '';
								document.getElementById("facing").style.visibility="visible";
								document.getElementById("facingmsg").style.display = '';
								document.getElementById("facingmsg").style.visibility="visible";
								
								document.getElementById("furnished").style.display = '';
								document.getElementById("furnished").style.visibility="visible";
								document.getElementById("furnishedmsg").style.display = '';
								document.getElementById("furnishedmsg").style.visibility="visible";
								
								
								
								document.getElementById("disthighway").style.display = '';
								document.getElementById("disthighway").style.visibility="visible";
								document.getElementById("disthighwaymsg").style.display = '';
								document.getElementById("disthighwaymsg").style.visibility="visible";
								
								document.getElementById("propimage").style.display = '';
								document.getElementById("propimage").style.visibility="visible";
								document.getElementById("propimagemsg").style.display = '';
								document.getElementById("propimagemsg").style.visibility="visible";
								
								document.getElementById("amenities").style.display = 'none';
								document.getElementById("amenities").style.visibility="hidden";
								document.getElementById("amenitieschk").style.display = 'none';
								document.getElementById("amenitieschk").style.visibility="hidden";
							}
							
							else if(name == "Land")
							{
								document.getElementById("carpetarea").style.display = 'none';
								document.getElementById("carpetarea").style.visibility="hidden";
								document.getElementById("carpetareamsg").style.display = 'none';
								document.getElementById("carpetareamsg").style.visibility="hidden";
										
								document.getElementById("carpetarearate").style.display = 'none';
								document.getElementById("carpetarearate").style.visibility="hidden";
								document.getElementById("carpetarearatemsg").style.display = 'none';
								document.getElementById("carpetarearatemsg").style.visibility="hidden";
										
								document.getElementById("carpetareaamt").style.display = 'none';
								document.getElementById("carpetareaamt").style.visibility="hidden";
								document.getElementById("carpetareaamtmsg").style.display = 'none';
								document.getElementById("carpetareaamtmsg").style.visibility="hidden";
										
								
								document.getElementById("additionalmsg").style.display = 'none';
								document.getElementById("additionalmsg").style.visibility="hidden";
								
								document.getElementById("bedroom").style.display = 'none';
								document.getElementById("bedroom").style.visibility="hidden";
								document.getElementById("bedroommsg").style.display = 'none';
								document.getElementById("bedroommsg").style.visibility="hidden";
								
								document.getElementById("bathroom").style.display = 'none';
								document.getElementById("bathroom").style.visibility="hidden";
								document.getElementById("bathroommsg").style.display = 'none';
								document.getElementById("bathroommsg").style.visibility="hidden";
								
								document.getElementById("balcony").style.display = 'none';
								document.getElementById("balcony").style.visibility="hidden";
								document.getElementById("balconymsg").style.display = 'none';
								document.getElementById("balconymsg").style.visibility="hidden";
								
								
								document.getElementById("floorno").style.display = 'none';
								document.getElementById("floorno").style.visibility="hidden";
								document.getElementById("floornomsg").style.display = 'none';
								document.getElementById("floornomsg").style.visibility="hidden";
								
								document.getElementById("buildingno").style.display = 'none';
								document.getElementById("buildingno").style.visibility="hidden";
								document.getElementById("buildingnomsg").style.display = 'none';
								document.getElementById("buildingnomsg").style.visibility="hidden";
								
								document.getElementById("addtionalroom").style.display = 'none';
								document.getElementById("addtionalroom").style.visibility="hidden";
								document.getElementById("additionalroommsg").style.display = 'none';
								document.getElementById("additionalroommsg").style.visibility="hidden";
								
								document.getElementById("flatfeature").style.display = 'none';
								document.getElementById("flatfeature").style.visibility="hidden";
								document.getElementById("flatfeaturemsg").style.display = 'none';
								document.getElementById("flatfeaturemsg").style.visibility="hidden";
								
								document.getElementById("flooring").style.display = 'none';
								document.getElementById("flooring").style.visibility="hidden";
								document.getElementById("flooringmsg").style.display = 'none';
								document.getElementById("flooringmsg").style.visibility="hidden";
								
								document.getElementById("direfacing").style.display = 'none';
								document.getElementById("direfacing").style.visibility="hidden";
								document.getElementById("direfacingmsg").style.display = 'none';
								document.getElementById("direfacingmsg").style.visibility="hidden";
								
								document.getElementById("facing").style.display = 'none';
								document.getElementById("facing").style.visibility="hidden";
								document.getElementById("facingmsg").style.display = 'none';
								document.getElementById("facingmsg").style.visibility="hidden";
								
								document.getElementById("furnished").style.display = 'none';
								document.getElementById("furnished").style.visibility="hidden";
								document.getElementById("furnishedmsg").style.display = 'none';
								document.getElementById("furnishedmsg").style.visibility="hidden";
								
								
								
								document.getElementById("disthighway").style.display = 'none';
								document.getElementById("disthighway").style.visibility="hidden";
								document.getElementById("disthighwaymsg").style.display = 'none';
								document.getElementById("disthighwaymsg").style.visibility="hidden";
								
								document.getElementById("propimage").style.display = 'none';
								document.getElementById("propimage").style.visibility="hidden";
								document.getElementById("propimagemsg").style.display = 'none';
								document.getElementById("propimagemsg").style.visibility="hidden";
								
								document.getElementById("amenities").style.display = 'none';
								document.getElementById("amenities").style.visibility="hidden";
								document.getElementById("amenitieschk").style.display = 'none';
								document.getElementById("amenitieschk").style.visibility="hidden";
							}
							
							else if(name == "Shop")
							{
								document.getElementById("additionalmsg").style.display = '';
								document.getElementById("additionalmsg").style.visibility="visible";
								
								document.getElementById("bedroom").style.display = 'none';
								document.getElementById("bedroom").style.visibility="hidden";
								document.getElementById("bedroommsg").style.display = 'none';
								document.getElementById("bedroommsg").style.visibility="hidden";
								
								document.getElementById("bathroom").style.display = 'none';
								document.getElementById("bathroom").style.visibility="hidden";
								document.getElementById("bathroommsg").style.display = 'none';
								document.getElementById("bathroommsg").style.visibility="hidden";
								
								document.getElementById("balcony").style.display = 'none';
								document.getElementById("balcony").style.visibility="hidden";
								document.getElementById("balconymsg").style.display = 'none';
								document.getElementById("balconymsg").style.visibility="hidden";
								
								
								document.getElementById("floorno").style.display = '';
								document.getElementById("floorno").style.visibility="visible";
								document.getElementById("floornomsg").style.display = '';
								document.getElementById("floornomsg").style.visibility="visible";
								
								document.getElementById("buildingno").style.display = '';
								document.getElementById("buildingno").style.visibility="visible";
								document.getElementById("buildingnomsg").style.display = '';
								document.getElementById("buildingnomsg").style.visibility="visible";
								
								document.getElementById("addtionalroom").style.display = 'none';
								document.getElementById("addtionalroom").style.visibility="hidden";
								document.getElementById("additionalroommsg").style.display = 'none';
								document.getElementById("additionalroommsg").style.visibility="hidden";
								
								document.getElementById("flatfeature").style.display = 'none';
								document.getElementById("flatfeature").style.visibility="hidden";
								document.getElementById("flatfeaturemsg").style.display = 'none';
								document.getElementById("flatfeaturemsg").style.visibility="hidden";
								
								document.getElementById("flooring").style.display = 'none';
								document.getElementById("flooring").style.visibility="hidden";
								document.getElementById("flooringmsg").style.display = 'none';
								document.getElementById("flooringmsg").style.visibility="hidden";
								
								document.getElementById("direfacing").style.display = '';
								document.getElementById("direfacing").style.visibility="visible";
								document.getElementById("direfacingmsg").style.display = '';
								document.getElementById("direfacingmsg").style.visibility="visible";
								
								document.getElementById("facing").style.display = 'none';
								document.getElementById("facing").style.visibility="hidden";
								document.getElementById("facingmsg").style.display = 'none';
								document.getElementById("facingmsg").style.visibility="hidden";
								
								document.getElementById("furnished").style.display = 'none';
								document.getElementById("furnished").style.visibility="hidden";
								document.getElementById("furnishedmsg").style.display = 'none';
								document.getElementById("furnishedmsg").style.visibility="hidden";
								
								
								
								document.getElementById("disthighway").style.display = 'none';
								document.getElementById("disthighway").style.visibility="hidden";
								document.getElementById("disthighwaymsg").style.display = 'none';
								document.getElementById("disthighwaymsg").style.visibility="hidden";
								
								document.getElementById("propimage").style.display = '';
								document.getElementById("propimage").style.visibility="visible";
								document.getElementById("propimagemsg").style.display = '';
								document.getElementById("propimagemsg").style.visibility="visible";
								
								document.getElementById("amenities").style.display = 'none';
								document.getElementById("amenities").style.visibility="hidden";
								document.getElementById("amenitieschk").style.display = 'none';
								document.getElementById("amenitieschk").style.visibility="hidden";
							}
							else if(name == "Mall")
							{
								document.getElementById("additionalmsg").style.display = '';
								document.getElementById("additionalmsg").style.visibility="visible";
								
								document.getElementById("bedroom").style.display = 'none';
								document.getElementById("bedroom").style.visibility="hidden";
								document.getElementById("bedroommsg").style.display = 'none';
								document.getElementById("bedroommsg").style.visibility="hidden";
								
								document.getElementById("bathroom").style.display = 'none';
								document.getElementById("bathroom").style.visibility="hidden";
								document.getElementById("bathroommsg").style.display = 'none';
								document.getElementById("bathroommsg").style.visibility="hidden";
								
								document.getElementById("balcony").style.display = 'none';
								document.getElementById("balcony").style.visibility="hidden";
								document.getElementById("balconymsg").style.display = 'none';
								document.getElementById("balconymsg").style.visibility="hidden";
								
								
								document.getElementById("floorno").style.display = '';
								document.getElementById("floorno").style.visibility="visible";
								document.getElementById("floornomsg").style.display = '';
								document.getElementById("floornomsg").style.visibility="visible";
								
								document.getElementById("buildingno").style.display = 'none';
								document.getElementById("buildingno").style.visibility="hidden";
								document.getElementById("buildingnomsg").style.display = 'none';
								document.getElementById("buildingnomsg").style.visibility="hidden";
								
								document.getElementById("addtionalroom").style.display = 'none';
								document.getElementById("addtionalroom").style.visibility="hidden";
								document.getElementById("additionalroommsg").style.display = 'none';
								document.getElementById("additionalroommsg").style.visibility="hidden";
								
								document.getElementById("flatfeature").style.display = 'none';
								document.getElementById("flatfeature").style.visibility="hidden";
								document.getElementById("flatfeaturemsg").style.display = 'none';
								document.getElementById("flatfeaturemsg").style.visibility="hidden";
								
								document.getElementById("flooring").style.display = 'none';
								document.getElementById("flooring").style.visibility="hidden";
								document.getElementById("flooringmsg").style.display = 'none';
								document.getElementById("flooringmsg").style.visibility="hidden";
								
								document.getElementById("direfacing").style.display = '';
								document.getElementById("direfacing").style.visibility="visible";
								document.getElementById("direfacingmsg").style.display = '';
								document.getElementById("direfacingmsg").style.visibility="visible";
								
								document.getElementById("facing").style.display = 'none';
								document.getElementById("facing").style.visibility="hidden";
								document.getElementById("facingmsg").style.display = 'none';
								document.getElementById("facingmsg").style.visibility="hidden";
								
								document.getElementById("furnished").style.display = 'none';
								document.getElementById("furnished").style.visibility="hidden";
								document.getElementById("furnishedmsg").style.display = 'none';
								document.getElementById("furnishedmsg").style.visibility="hidden";
								
								
								
								document.getElementById("disthighway").style.display = 'none';
								document.getElementById("disthighway").style.visibility="hidden";
								document.getElementById("disthighwaymsg").style.display = 'none';
								document.getElementById("disthighwaymsg").style.visibility="hidden";
								
								document.getElementById("propimage").style.display = '';
								document.getElementById("propimage").style.visibility="visible";
								document.getElementById("propimagemsg").style.display = '';
								document.getElementById("propimagemsg").style.visibility="visible";
								
								document.getElementById("amenities").style.display = 'none';
								document.getElementById("amenities").style.visibility="hidden";
								document.getElementById("amenitieschk").style.display = 'none';
								document.getElementById("amenitieschk").style.visibility="hidden";
							}
							else if(name == "Office")
							{
								document.getElementById("additionalmsg").style.display = '';
								document.getElementById("additionalmsg").style.visibility="visible";
								
								document.getElementById("bedroom").style.display = 'none';
								document.getElementById("bedroom").style.visibility="hidden";
								document.getElementById("bedroommsg").style.display = 'none';
								document.getElementById("bedroommsg").style.visibility="hidden";
								
								document.getElementById("bathroom").style.display = 'none';
								document.getElementById("bathroom").style.visibility="hidden";
								document.getElementById("bathroommsg").style.display = 'none';
								document.getElementById("bathroommsg").style.visibility="hidden";
								
								document.getElementById("balcony").style.display = 'none';
								document.getElementById("balcony").style.visibility="hidden";
								document.getElementById("balconymsg").style.display = 'none';
								document.getElementById("balconymsg").style.visibility="hidden";
								
								
								document.getElementById("floorno").style.display = '';
								document.getElementById("floorno").style.visibility="visible";
								document.getElementById("floornomsg").style.display = '';
								document.getElementById("floornomsg").style.visibility="visible";
								
								document.getElementById("buildingno").style.display = '';
								document.getElementById("buildingno").style.visibility="visible";
								document.getElementById("buildingnomsg").style.display = '';
								document.getElementById("buildingnomsg").style.visibility="visible";
								
								document.getElementById("addtionalroom").style.display = 'none';
								document.getElementById("addtionalroom").style.visibility="hidden";
								document.getElementById("additionalroommsg").style.display = 'none';
								document.getElementById("additionalroommsg").style.visibility="hidden";
								
								document.getElementById("flatfeature").style.display = 'none';
								document.getElementById("flatfeature").style.visibility="hidden";
								document.getElementById("flatfeaturemsg").style.display = 'none';
								document.getElementById("flatfeaturemsg").style.visibility="hidden";
								
								document.getElementById("flooring").style.display = 'none';
								document.getElementById("flooring").style.visibility="hidden";
								document.getElementById("flooringmsg").style.display = 'none';
								document.getElementById("flooringmsg").style.visibility="hidden";
								
								document.getElementById("direfacing").style.display = '';
								document.getElementById("direfacing").style.visibility="visible";
								document.getElementById("direfacingmsg").style.display = '';
								document.getElementById("direfacingmsg").style.visibility="visible";
								
								document.getElementById("facing").style.display = 'none';
								document.getElementById("facing").style.visibility="hidden";
								document.getElementById("facingmsg").style.display = 'none';
								document.getElementById("facingmsg").style.visibility="hidden";
								
								document.getElementById("furnished").style.display = 'none';
								document.getElementById("furnished").style.visibility="hidden";
								document.getElementById("furnishedmsg").style.display = 'none';
								document.getElementById("furnishedmsg").style.visibility="hidden";
								
								
								
								document.getElementById("disthighway").style.display = 'none';
								document.getElementById("disthighway").style.visibility="hidden";
								document.getElementById("disthighwaymsg").style.display = 'none';
								document.getElementById("disthighwaymsg").style.visibility="hidden";
								
								document.getElementById("propimage").style.display = '';
								document.getElementById("propimage").style.visibility="visible";
								document.getElementById("propimagemsg").style.display = '';
								document.getElementById("propimagemsg").style.visibility="visible";
								
								document.getElementById("amenities").style.display = 'none';
								document.getElementById("amenities").style.visibility="hidden";
								document.getElementById("amenitieschk").style.display = 'none';
								document.getElementById("amenitieschk").style.visibility="hidden";
							}
							else if(name == "Godown")
							{
								document.getElementById("additionalmsg").style.display = '';
								document.getElementById("additionalmsg").style.visibility="visible";
								
								document.getElementById("bedroom").style.display = 'none';
								document.getElementById("bedroom").style.visibility="hidden";
								document.getElementById("bedroommsg").style.display = 'none';
								document.getElementById("bedroommsg").style.visibility="hidden";
								
								document.getElementById("bathroom").style.display = 'none';
								document.getElementById("bathroom").style.visibility="hidden";
								document.getElementById("bathroommsg").style.display = 'none';
								document.getElementById("bathroommsg").style.visibility="hidden";
								
								document.getElementById("balcony").style.display = 'none';
								document.getElementById("balcony").style.visibility="hidden";
								document.getElementById("balconymsg").style.display = 'none';
								document.getElementById("balconymsg").style.visibility="hidden";
								
								
								document.getElementById("floorno").style.display = 'none';
								document.getElementById("floorno").style.visibility="hidden";
								document.getElementById("floornomsg").style.display = 'none';
								document.getElementById("floornomsg").style.visibility="hidden";
								
								document.getElementById("buildingno").style.display = 'none';
								document.getElementById("buildingno").style.visibility="hidden";
								document.getElementById("buildingnomsg").style.display = 'none';
								document.getElementById("buildingnomsg").style.visibility="hidden";
								
								document.getElementById("addtionalroom").style.display = 'none';
								document.getElementById("addtionalroom").style.visibility="hidden";
								document.getElementById("additionalroommsg").style.display = 'none';
								document.getElementById("additionalroommsg").style.visibility="hidden";
								
								document.getElementById("flatfeature").style.display = 'none';
								document.getElementById("flatfeature").style.visibility="hidden";
								document.getElementById("flatfeaturemsg").style.display = 'none';
								document.getElementById("flatfeaturemsg").style.visibility="hidden";
								
								document.getElementById("flooring").style.display = 'none';
								document.getElementById("flooring").style.visibility="hidden";
								document.getElementById("flooringmsg").style.display = 'none';
								document.getElementById("flooringmsg").style.visibility="hidden";
								
								document.getElementById("direfacing").style.display = '';
								document.getElementById("direfacing").style.visibility="visible";
								document.getElementById("direfacingmsg").style.display = '';
								document.getElementById("direfacingmsg").style.visibility="visible";
								
								document.getElementById("facing").style.display = 'none';
								document.getElementById("facing").style.visibility="hidden";
								document.getElementById("facingmsg").style.display = 'none';
								document.getElementById("facingmsg").style.visibility="hidden";
								
								document.getElementById("furnished").style.display = 'none';
								document.getElementById("furnished").style.visibility="hidden";
								document.getElementById("furnishedmsg").style.display = 'none';
								document.getElementById("furnishedmsg").style.visibility="hidden";
								
								
								
								document.getElementById("disthighway").style.display = 'none';
								document.getElementById("disthighway").style.visibility="hidden";
								document.getElementById("disthighwaymsg").style.display = 'none';
								document.getElementById("disthighwaymsg").style.visibility="hidden";
								
								document.getElementById("propimage").style.display = '';
								document.getElementById("propimage").style.visibility="visible";
								document.getElementById("propimagemsg").style.display = '';
								document.getElementById("propimagemsg").style.visibility="visible";
								
								document.getElementById("amenities").style.display = 'none';
								document.getElementById("amenities").style.visibility="hidden";
								document.getElementById("amenitieschk").style.display = 'none';
								document.getElementById("amenitieschk").style.visibility="hidden";
							}
							else if(name == "Industrial Shed")
							{
								document.getElementById("additionalmsg").style.display = '';
								document.getElementById("additionalmsg").style.visibility="visible";
								
								document.getElementById("bedroom").style.display = 'none';
								document.getElementById("bedroom").style.visibility="hidden";
								document.getElementById("bedroommsg").style.display = 'none';
								document.getElementById("bedroommsg").style.visibility="hidden";
								
								document.getElementById("bathroom").style.display = 'none';
								document.getElementById("bathroom").style.visibility="hidden";
								document.getElementById("bathroommsg").style.display = 'none';
								document.getElementById("bathroommsg").style.visibility="hidden";
								
								document.getElementById("balcony").style.display = 'none';
								document.getElementById("balcony").style.visibility="hidden";
								document.getElementById("balconymsg").style.display = 'none';
								document.getElementById("balconymsg").style.visibility="hidden";
								
								
								document.getElementById("floorno").style.display = 'none';
								document.getElementById("floorno").style.visibility="hidden";
								document.getElementById("floornomsg").style.display = 'none';
								document.getElementById("floornomsg").style.visibility="hidden";
								
								document.getElementById("buildingno").style.display = 'none';
								document.getElementById("buildingno").style.visibility="hidden";
								document.getElementById("buildingnomsg").style.display = 'none';
								document.getElementById("buildingnomsg").style.visibility="hidden";
								
								document.getElementById("addtionalroom").style.display = 'none';
								document.getElementById("addtionalroom").style.visibility="hidden";
								document.getElementById("additionalroommsg").style.display = 'none';
								document.getElementById("additionalroommsg").style.visibility="hidden";
								
								document.getElementById("flatfeature").style.display = 'none';
								document.getElementById("flatfeature").style.visibility="hidden";
								document.getElementById("flatfeaturemsg").style.display = 'none';
								document.getElementById("flatfeaturemsg").style.visibility="hidden";
								
								document.getElementById("flooring").style.display = 'none';
								document.getElementById("flooring").style.visibility="hidden";
								document.getElementById("flooringmsg").style.display = 'none';
								document.getElementById("flooringmsg").style.visibility="hidden";
								
								document.getElementById("direfacing").style.display = '';
								document.getElementById("direfacing").style.visibility="visible";
								document.getElementById("direfacingmsg").style.display = '';
								document.getElementById("direfacingmsg").style.visibility="visible";
								
								document.getElementById("facing").style.display = 'none';
								document.getElementById("facing").style.visibility="hidden";
								document.getElementById("facingmsg").style.display = 'none';
								document.getElementById("facingmsg").style.visibility="hidden";
								
								document.getElementById("furnished").style.display = 'none';
								document.getElementById("furnished").style.visibility="hidden";
								document.getElementById("furnishedmsg").style.display = 'none';
								document.getElementById("furnishedmsg").style.visibility="hidden";
								
								
								
								document.getElementById("disthighway").style.display = 'none';
								document.getElementById("disthighway").style.visibility="hidden";
								document.getElementById("disthighwaymsg").style.display = 'none';
								document.getElementById("disthighwaymsg").style.visibility="hidden";
								
								document.getElementById("propimage").style.display = '';
								document.getElementById("propimage").style.visibility="visible";
								document.getElementById("propimagemsg").style.display = '';
								document.getElementById("propimagemsg").style.visibility="visible";
								
								document.getElementById("amenities").style.display = 'none';
								document.getElementById("amenities").style.visibility="hidden";
								document.getElementById("amenitieschk").style.display = 'none';
								document.getElementById("amenitieschk").style.visibility="hidden";
							}
							else if(name == "ShowRoom")
							{
								document.getElementById("additionalmsg").style.display = '';
								document.getElementById("additionalmsg").style.visibility="visible";
								
								document.getElementById("bedroom").style.display = 'none';
								document.getElementById("bedroom").style.visibility="hidden";
								document.getElementById("bedroommsg").style.display = 'none';
								document.getElementById("bedroommsg").style.visibility="hidden";
								
								document.getElementById("bathroom").style.display = 'none';
								document.getElementById("bathroom").style.visibility="hidden";
								document.getElementById("bathroommsg").style.display = 'none';
								document.getElementById("bathroommsg").style.visibility="hidden";
								
								document.getElementById("balcony").style.display = 'none';
								document.getElementById("balcony").style.visibility="hidden";
								document.getElementById("balconymsg").style.display = 'none';
								document.getElementById("balconymsg").style.visibility="hidden";
								
								
								document.getElementById("floorno").style.display = '';
								document.getElementById("floorno").style.visibility="visible";
								document.getElementById("floornomsg").style.display = '';
								document.getElementById("floornomsg").style.visibility="visible";
								
								document.getElementById("buildingno").style.display = 'none';
								document.getElementById("buildingno").style.visibility="hidden";
								document.getElementById("buildingnomsg").style.display = 'none';
								document.getElementById("buildingnomsg").style.visibility="hidden";
								
								document.getElementById("addtionalroom").style.display = 'none';
								document.getElementById("addtionalroom").style.visibility="hidden";
								document.getElementById("additionalroommsg").style.display = 'none';
								document.getElementById("additionalroommsg").style.visibility="hidden";
								
								document.getElementById("flatfeature").style.display = 'none';
								document.getElementById("flatfeature").style.visibility="hidden";
								document.getElementById("flatfeaturemsg").style.display = 'none';
								document.getElementById("flatfeaturemsg").style.visibility="hidden";
								
								document.getElementById("flooring").style.display = 'none';
								document.getElementById("flooring").style.visibility="hidden";
								document.getElementById("flooringmsg").style.display = 'none';
								document.getElementById("flooringmsg").style.visibility="hidden";
								
								document.getElementById("direfacing").style.display = '';
								document.getElementById("direfacing").style.visibility="visible";
								document.getElementById("direfacingmsg").style.display = '';
								document.getElementById("direfacingmsg").style.visibility="visible";
								
								document.getElementById("facing").style.display = 'none';
								document.getElementById("facing").style.visibility="hidden";
								document.getElementById("facingmsg").style.display = 'none';
								document.getElementById("facingmsg").style.visibility="hidden";
								
								document.getElementById("furnished").style.display = 'none';
								document.getElementById("furnished").style.visibility="hidden";
								document.getElementById("furnishedmsg").style.display = 'none';
								document.getElementById("furnishedmsg").style.visibility="hidden";
								
								
								
								document.getElementById("disthighway").style.display = 'none';
								document.getElementById("disthighway").style.visibility="hidden";
								document.getElementById("disthighwaymsg").style.display = 'none';
								document.getElementById("disthighwaymsg").style.visibility="hidden";
								
								document.getElementById("propimage").style.display = '';
								document.getElementById("propimage").style.visibility="visible";
								document.getElementById("propimagemsg").style.display = '';
								document.getElementById("propimagemsg").style.visibility="visible";
								
								document.getElementById("amenities").style.display = 'none';
								document.getElementById("amenities").style.visibility="hidden";
								document.getElementById("amenitieschk").style.display = 'none';
								document.getElementById("amenitieschk").style.visibility="hidden";
							}
							else if(name == "Business Center")
							{
								document.getElementById("additionalmsg").style.display = '';
								document.getElementById("additionalmsg").style.visibility="visible";
								
								document.getElementById("bedroom").style.display = 'none';
								document.getElementById("bedroom").style.visibility="hidden";
								document.getElementById("bedroommsg").style.display = 'none';
								document.getElementById("bedroommsg").style.visibility="hidden";
								
								document.getElementById("bathroom").style.display = 'none';
								document.getElementById("bathroom").style.visibility="hidden";
								document.getElementById("bathroommsg").style.display = 'none';
								document.getElementById("bathroommsg").style.visibility="hidden";
								
								document.getElementById("balcony").style.display = 'none';
								document.getElementById("balcony").style.visibility="hidden";
								document.getElementById("balconymsg").style.display = 'none';
								document.getElementById("balconymsg").style.visibility="hidden";
								
								
								document.getElementById("floorno").style.display = '';
								document.getElementById("floorno").style.visibility="visible";
								document.getElementById("floornomsg").style.display = '';
								document.getElementById("floornomsg").style.visibility="visible";
								
								document.getElementById("buildingno").style.display = '';
								document.getElementById("buildingno").style.visibility="visible";
								document.getElementById("buildingnomsg").style.display = '';
								document.getElementById("buildingnomsg").style.visibility="visible";
								
								document.getElementById("addtionalroom").style.display = 'none';
								document.getElementById("addtionalroom").style.visibility="hidden";
								document.getElementById("additionalroommsg").style.display = 'none';
								document.getElementById("additionalroommsg").style.visibility="hidden";
								
								document.getElementById("flatfeature").style.display = 'none';
								document.getElementById("flatfeature").style.visibility="hidden";
								document.getElementById("flatfeaturemsg").style.display = 'none';
								document.getElementById("flatfeaturemsg").style.visibility="hidden";
								
								document.getElementById("flooring").style.display = 'none';
								document.getElementById("flooring").style.visibility="hidden";
								document.getElementById("flooringmsg").style.display = 'none';
								document.getElementById("flooringmsg").style.visibility="hidden";
								
								document.getElementById("direfacing").style.display = '';
								document.getElementById("direfacing").style.visibility="visible";
								document.getElementById("direfacingmsg").style.display = '';
								document.getElementById("direfacingmsg").style.visibility="visible";
								
								document.getElementById("facing").style.display = 'none';
								document.getElementById("facing").style.visibility="hidden";
								document.getElementById("facingmsg").style.display = 'none';
								document.getElementById("facingmsg").style.visibility="hidden";
								
								document.getElementById("furnished").style.display = 'none';
								document.getElementById("furnished").style.visibility="hidden";
								document.getElementById("furnishedmsg").style.display = 'none';
								document.getElementById("furnishedmsg").style.visibility="hidden";
								
								
								
								document.getElementById("disthighway").style.display = 'none';
								document.getElementById("disthighway").style.visibility="hidden";
								document.getElementById("disthighwaymsg").style.display = 'none';
								document.getElementById("disthighwaymsg").style.visibility="hidden";
								
								document.getElementById("propimage").style.display = '';
								document.getElementById("propimage").style.visibility="visible";
								document.getElementById("propimagemsg").style.display = '';
								document.getElementById("propimagemsg").style.visibility="visible";
								
								document.getElementById("amenities").style.display = 'none';
								document.getElementById("amenities").style.visibility="hidden";
								document.getElementById("amenitieschk").style.display = 'none';
								document.getElementById("amenitieschk").style.visibility="hidden";
							}
							else if(name == "Plot-Residental")
							{
								document.getElementById("additionalmsg").style.display = '';
								document.getElementById("additionalmsg").style.visibility="visible";
								
								document.getElementById("bedroom").style.display = '';
								document.getElementById("bedroom").style.visibility="visible";
								document.getElementById("bedroommsg").style.display = '';
								document.getElementById("bedroommsg").style.visibility="visible";
								
								document.getElementById("bathroom").style.display = 'none';
								document.getElementById("bathroom").style.visibility="hidden";
								document.getElementById("bathroommsg").style.display = 'none';
								document.getElementById("bathroommsg").style.visibility="hidden";
								
								document.getElementById("balcony").style.display = 'none';
								document.getElementById("balcony").style.visibility="hidden";
								document.getElementById("balconymsg").style.display = 'none';
								document.getElementById("balconymsg").style.visibility="hidden";
								
								
								document.getElementById("floorno").style.display = 'none';
								document.getElementById("floorno").style.visibility="hidden";
								document.getElementById("floornomsg").style.display = 'none';
								document.getElementById("floornomsg").style.visibility="hidden";
								
								document.getElementById("buildingno").style.display = 'none';
								document.getElementById("buildingno").style.visibility="hidden";
								document.getElementById("buildingnomsg").style.display = 'none';
								document.getElementById("buildingnomsg").style.visibility="hidden";
								
								document.getElementById("addtionalroom").style.display = 'none';
								document.getElementById("addtionalroom").style.visibility="hidden";
								document.getElementById("additionalroommsg").style.display = 'none';
								document.getElementById("additionalroommsg").style.visibility="hidden";
								
								document.getElementById("flatfeature").style.display = 'none';
								document.getElementById("flatfeature").style.visibility="hidden";
								document.getElementById("flatfeaturemsg").style.display = 'none';
								document.getElementById("flatfeaturemsg").style.visibility="hidden";
								
								document.getElementById("flooring").style.display = 'none';
								document.getElementById("flooring").style.visibility="hidden";
								document.getElementById("flooringmsg").style.display = 'none';
								document.getElementById("flooringmsg").style.visibility="hidden";
								
								document.getElementById("direfacing").style.display = '';
								document.getElementById("direfacing").style.visibility="visible";
								document.getElementById("direfacingmsg").style.display = '';
								document.getElementById("direfacingmsg").style.visibility="visible";
								
								document.getElementById("facing").style.display = 'none';
								document.getElementById("facing").style.visibility="hidden";
								document.getElementById("facingmsg").style.display = 'none';
								document.getElementById("facingmsg").style.visibility="hidden";
								
								document.getElementById("furnished").style.display = 'none';
								document.getElementById("furnished").style.visibility="hidden";
								document.getElementById("furnishedmsg").style.display = 'none';
								document.getElementById("furnishedmsg").style.visibility="hidden";
								
								
								
								document.getElementById("disthighway").style.display = 'none';
								document.getElementById("disthighway").style.visibility="hidden";
								document.getElementById("disthighwaymsg").style.display = 'none';
								document.getElementById("disthighwaymsg").style.visibility="hidden";
								
								document.getElementById("propimage").style.display = '';
								document.getElementById("propimage").style.visibility="visible";
								document.getElementById("propimagemsg").style.display = '';
								document.getElementById("propimagemsg").style.visibility="visible";
								
								document.getElementById("amenities").style.display = 'none';
								document.getElementById("amenities").style.visibility="hidden";
								document.getElementById("amenitieschk").style.display = 'none';
								document.getElementById("amenitieschk").style.visibility="hidden";
							}
							
							else if(name == "Plot-Industrial")
							{
								document.getElementById("additionalmsg").style.display = '';
								document.getElementById("additionalmsg").style.visibility="visible";
								
								document.getElementById("bedroom").style.display = 'none';
								document.getElementById("bedroom").style.visibility="hidden";
								document.getElementById("bedroommsg").style.display = 'none';
								document.getElementById("bedroommsg").style.visibility="hidden";
								
								document.getElementById("bathroom").style.display = 'none';
								document.getElementById("bathroom").style.visibility="hidden";
								document.getElementById("bathroommsg").style.display = 'none';
								document.getElementById("bathroommsg").style.visibility="hidden";
								
								document.getElementById("balcony").style.display = 'none';
								document.getElementById("balcony").style.visibility="hidden";
								document.getElementById("balconymsg").style.display = 'none';
								document.getElementById("balconymsg").style.visibility="hidden";
								
								
								document.getElementById("floorno").style.display = 'none';
								document.getElementById("floorno").style.visibility="hidden";
								document.getElementById("floornomsg").style.display = 'none';
								document.getElementById("floornomsg").style.visibility="hidden";
								
								document.getElementById("buildingno").style.display = 'none';
								document.getElementById("buildingno").style.visibility="hidden";
								document.getElementById("buildingnomsg").style.display = 'none';
								document.getElementById("buildingnomsg").style.visibility="hidden";
								
								document.getElementById("addtionalroom").style.display = 'none';
								document.getElementById("addtionalroom").style.visibility="hidden";
								document.getElementById("additionalroommsg").style.display = 'none';
								document.getElementById("additionalroommsg").style.visibility="hidden";
								
								document.getElementById("flatfeature").style.display = 'none';
								document.getElementById("flatfeature").style.visibility="hidden";
								document.getElementById("flatfeaturemsg").style.display = 'none';
								document.getElementById("flatfeaturemsg").style.visibility="hidden";
								
								document.getElementById("flooring").style.display = 'none';
								document.getElementById("flooring").style.visibility="hidden";
								document.getElementById("flooringmsg").style.display = 'none';
								document.getElementById("flooringmsg").style.visibility="hidden";
								
								document.getElementById("direfacing").style.display = '';
								document.getElementById("direfacing").style.visibility="visible";
								document.getElementById("direfacingmsg").style.display = '';
								document.getElementById("direfacingmsg").style.visibility="visible";
								
								document.getElementById("facing").style.display = 'none';
								document.getElementById("facing").style.visibility="hidden";
								document.getElementById("facingmsg").style.display = 'none';
								document.getElementById("facingmsg").style.visibility="hidden";
								
								document.getElementById("furnished").style.display = 'none';
								document.getElementById("furnished").style.visibility="hidden";
								document.getElementById("furnishedmsg").style.display = 'none';
								document.getElementById("furnishedmsg").style.visibility="hidden";
								
								
								
								document.getElementById("disthighway").style.display = 'none';
								document.getElementById("disthighway").style.visibility="hidden";
								document.getElementById("disthighwaymsg").style.display = 'none';
								document.getElementById("disthighwaymsg").style.visibility="hidden";
								
								document.getElementById("propimage").style.display = '';
								document.getElementById("propimage").style.visibility="visible";
								document.getElementById("propimagemsg").style.display = '';
								document.getElementById("propimagemsg").style.visibility="visible";
								
								document.getElementById("amenities").style.display = 'none';
								document.getElementById("amenities").style.visibility="hidden";
								document.getElementById("amenitieschk").style.display = 'none';
								document.getElementById("amenitieschk").style.visibility="hidden";
							}
							else if(name == "Farm House")
							{
								document.getElementById("additionalmsg").style.display = '';
								document.getElementById("additionalmsg").style.visibility="visible";
								
								document.getElementById("bedroom").style.display = 'none';
								document.getElementById("bedroom").style.visibility="hidden";
								document.getElementById("bedroommsg").style.display = 'none';
								document.getElementById("bedroommsg").style.visibility="hidden";
								
								document.getElementById("bathroom").style.display = 'none';
								document.getElementById("bathroom").style.visibility="hidden";
								document.getElementById("bathroommsg").style.display = 'none';
								document.getElementById("bathroommsg").style.visibility="hidden";
								
								document.getElementById("balcony").style.display = 'none';
								document.getElementById("balcony").style.visibility="hidden";
								document.getElementById("balconymsg").style.display = 'none';
								document.getElementById("balconymsg").style.visibility="hidden";
								
								
								document.getElementById("floorno").style.display = 'none';
								document.getElementById("floorno").style.visibility="hidden";
								document.getElementById("floornomsg").style.display = 'none';
								document.getElementById("floornomsg").style.visibility="hidden";
								
								document.getElementById("buildingno").style.display = 'none';
								document.getElementById("buildingno").style.visibility="hidden";
								document.getElementById("buildingnomsg").style.display = 'none';
								document.getElementById("buildingnomsg").style.visibility="hidden";
								
								document.getElementById("addtionalroom").style.display = 'none';
								document.getElementById("addtionalroom").style.visibility="hidden";
								document.getElementById("additionalroommsg").style.display = 'none';
								document.getElementById("additionalroommsg").style.visibility="hidden";
								
								document.getElementById("flatfeature").style.display = 'none';
								document.getElementById("flatfeature").style.visibility="hidden";
								document.getElementById("flatfeaturemsg").style.display = 'none';
								document.getElementById("flatfeaturemsg").style.visibility="hidden";
								
								document.getElementById("flooring").style.display = 'none';
								document.getElementById("flooring").style.visibility="hidden";
								document.getElementById("flooringmsg").style.display = 'none';
								document.getElementById("flooringmsg").style.visibility="hidden";
								
								document.getElementById("direfacing").style.display = '';
								document.getElementById("direfacing").style.visibility="visible";
								document.getElementById("direfacingmsg").style.display = '';
								document.getElementById("direfacingmsg").style.visibility="visible";
								
								document.getElementById("facing").style.display = 'none';
								document.getElementById("facing").style.visibility="hidden";
								document.getElementById("facingmsg").style.display = 'none';
								document.getElementById("facingmsg").style.visibility="hidden";
								
								document.getElementById("furnished").style.display = 'none';
								document.getElementById("furnished").style.visibility="hidden";
								document.getElementById("furnishedmsg").style.display = 'none';
								document.getElementById("furnishedmsg").style.visibility="hidden";
								
								
								
								document.getElementById("disthighway").style.display = 'none';
								document.getElementById("disthighway").style.visibility="hidden";
								document.getElementById("disthighwaymsg").style.display = 'none';
								document.getElementById("disthighwaymsg").style.visibility="hidden";
								
								document.getElementById("propimage").style.display = '';
								document.getElementById("propimage").style.visibility="visible";
								document.getElementById("propimagemsg").style.display = '';
								document.getElementById("propimagemsg").style.visibility="visible";
								
								document.getElementById("amenities").style.display = 'none';
								document.getElementById("amenities").style.visibility="hidden";
								document.getElementById("amenitieschk").style.display = 'none';
								document.getElementById("amenitieschk").style.visibility="hidden";
							}
							
				
							
						}
						
						
						function showfurniture()
						{
								
								document.getElementById("furnituredetail").style.display = '';
								document.getElementById("furnituredetail").style.visibility="visible";
								document.getElementById("furnituredetailmsg").style.display = '';
								document.getElementById("furnituredetailmsg").style.visibility="visible";
						}
						
						function hidefurniture()
						{
								
								document.getElementById("furnituredetail").style.display = 'none';
								document.getElementById("furnituredetail").style.visibility="hidden";
								document.getElementById("furnituredetailmsg").style.display = 'none';
								document.getElementById("furnituredetailmsg").style.visibility="hidden";
						}
						
						function covsom()
						{
  								var txtcovfrom,txtcovto,txtcovrate,txtcovamt,a;
								//txtcovto = document.getElementById("txtcovto").value;
								txtcovfrom = document.getElementById("txtcovfrom").value;
								//area = (txtcovto - txtcovfrom )
  								txtcovrate  = document.getElementById("txtcovrate").value;
  								txtcovamt  = document.getElementById("txtcovamt").value;
 							    document.getElementById("txtcovamt").value = (txtcovfrom * txtcovrate);
						}
						function plotsom()
						{
  								var txtplotfrom,txtplotto,txtcovrate,txtplotamt;
								//txtplotto = document.getElementById("txtplotto").value;
								txtplotfrom = document.getElementById("txtplotfrom").value;
								//area = (txtplotto - txtplotfrom )
  								txtplotrate  = document.getElementById("txtplotrate").value;
  								txtplotamt  = document.getElementById("txtplotamt").value;
 							    document.getElementById("txtplotamt").value = (txtplotfrom * txtplotrate);
						}
						function carpetsom()
						{
  								var txtcarpetto,txtcarpetfrom,txtcarpetrate,txtcarpetamt;
								//txtcarpetto = document.getElementById("txtcarpetto").value;
								txtcarpetfrom = document.getElementById("txtcarpetfrom").value;
								area = (txtcarpetto - txtcarpetfrom )
  								txtcarpetrate  = document.getElementById("txtcarpetrate").value;
  								txtcarpetamt  = document.getElementById("txtcarpetamt").value;
 							    document.getElementById("txtcarpetamt").value = (txtcarpetfrom * txtcarpetrate);
						}
						
		</script>

<script type="text/javascript" >
	
// function checkCname(frm)
//{
//	var obj=document.getElementById('ddlcountry1');
//  	var cname = frm.ddlcountry.value;
//  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
//  	var error=false;
//  	obj.innerHTML='';
//  	if (frm.ddlcountry.selectedIndex=='0') 
//	{
//   		error='Select any one country name!';
//   		frm.ddlcountry.focus();
//  	}
//  	if (error)
//	{
//   	frm.ddlcountry.focus();
//   	obj.innerHTML=error;
//   	return false;
//  	}
//  	return true;
// }
// function checkSname(frm)
//{
//	var obj=document.getElementById('ddlstate1');
//  	var cname = frm.ddlstate.value;
//  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
//  	var error=false;
//  	obj.innerHTML='';
//  	if (frm.ddlstate.selectedIndex=='0') 
//	{
//   		error='Select any one state name!';
//   		frm.ddlstate.focus();
//  	}
//  	if (error)
//	{
//   	frm.ddlstate.focus();
//   	obj.innerHTML=error;
//   	return false;
//  	}
//  	return true;
// }
 //function checkCiname(frm)
//{
//	var obj=document.getElementById('ddlcity1');
//  	var cname = frm.ddlcity.value;
//  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
//  	var error=false;
//  	obj.innerHTML='';
//  	if (frm.ddlcity.selectedIndex=='0') 
//	{
//   		error='Select any one city name!';
//   		frm.ddlcity.focus();
//  	}
//  	if (error)
//	{
//   	frm.ddlcity.focus();
//   	obj.innerHTML=error;
//   	return false;
//  	}
//  	return true;
// }
// function checkAname(frm)
//{
//	var obj=document.getElementById('ddlarea1');
//  	var cname = frm.ddlarea.value;
//  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
//  	var error=false;
//  	obj.innerHTML='';
//  	if (frm.ddlarea.selectedIndex=='0') 
//	{
//   		error='Select any one area name!';
//   		frm.ddlarea.focus();
//  	}
//  	if (error)
//	{
//   	frm.ddlarea.focus();
//   	obj.innerHTML=error;
//   	return false;
//  	}
//  	return true;
// }
 function checkPostpro(frm)
{
	var obj=document.getElementById('ddlpost1');
  	var cname = frm.ddlpost.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddlpost.selectedIndex=='0') 
	{
   		error='Select any one purpose for posting property!';
   		frm.ddlpost.focus();
  	}
  	if (error)
	{
   	frm.ddlpost.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkProtype(frm)
{
	var obj=document.getElementById('ddlptype1');
  	var cname = frm.ddlptype.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddlptype.selectedIndex=='0') 
	{
   		error='Select any one property type!';
   		frm.ddlptype.focus();
  	}
  	if (error)
	{
   	frm.ddlptype.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkProname(frm)
{
	var obj=document.getElementById('ddlprop1');
  	var cname = frm.ddlprop.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddlprop.selectedIndex=='0') 
	{
   		error='Select any one property name!';
   		frm.ddlprop.focus();
  	}
  	if (error)
	{
   	frm.ddlprop.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkCoverarea(frm)
{
	var obj=document.getElementById('txtcover1');
  	var cname = frm.txtcovfrom.value;
	var cname1=frm.txtcovto.value;
  	var p = /^[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' || cname1 == '') 
	{
   		error='Cover area is required!';
   		frm.txtcovfrom.focus();
		frm.txtcovto.focus();
  	}
  	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	else if (!p.test(cname1))
	{
   error="Only digits are allowed";
  	}
  	if (error)
	{
   frm.txtcovfrom.focus();
		frm.txtcovto.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkCoverarearate(frm)
{
	var obj=document.getElementById('txtcovrate1');
  	var cname = frm.txtcovrate.value;
	
  	var p = /^[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Cover area rate is required!';
   		frm.txtcovrate.focus();
		
  	}
  	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txtcovrate.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkCoverareaamt(frm)
{
	var obj=document.getElementById('txtcovamt1');
  	var cname = frm.txtcovamt.value;
	
  	var p = /^[a-z0-9]+[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Cover area amount is required!';
   		frm.txtcovamt.focus();
		
  	}
  	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txtcovamt.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkPlotarea(frm)
{
	var obj=document.getElementById('txtplot1');
  	var cname = frm.txtplotfrom.value;
	var cname1=frm.txtplotto.value;
  	var p = /^[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' || cname1 == '') 
	{
   		error='Plot/Land area is required!';
   		frm.txtplotfrom.focus();
		frm.txtplotto.focus();
  	}
  	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	else if (!p.test(cname1))
	{
   error="Only digits are allowed";
  	}
  	if (error)
	{
   frm.txtplotfrom.focus();
		frm.txtplotto.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkPlotarearate(frm)
{
	var obj=document.getElementById('txtplotrate1');
  	var cname = frm.txtplotrate.value;
	
  	var p = /^[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Plot area rate is required!';
   		frm.txtplotrate.focus();
		
  	}
  	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txtplotrate.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkPlotareaamt(frm)
{
	var obj=document.getElementById('txtplotamt1');
  	var cname = frm.txtplotamt.value;
	
  	var p = /^[a-z0-9]+[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Plot area amount is required!';
   		frm.txtplotamt.focus();
		
  	}
  	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txtplotamt.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkCarpetarea(frm)
{
	var obj=document.getElementById('txtcarpet');
  	var cname = frm.txtcarpetfrom.value;
	var cname1=frm.txtcarpetto.value;
  	var p = /^[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' || cname1 == '') 
	{
   		error='Carpet area is required!';
   		frm.txtcarpetfrom.focus();
		frm.txtcarpetto.focus();
  	}
  	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	else if (!p.test(cname1))
	{
   error="Only digits are allowed";
  	}
  	if (error)
	{
   frm.txtcarpetfrom.focus();
		frm.txtcarpetto.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkCarpetarearate(frm)
{
	var obj=document.getElementById('txtcarpetrate1');
  	var cname = frm.txtcarpetrate.value;
	
  	var p = /^[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Carpet area rate is required!';
   		frm.txtcarpetrate.focus();
		
  	}
  	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txtcarpetrate.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkCarpetareaamt(frm)
{
	var obj=document.getElementById('txtcarpetamt1');
  	var cname = frm.txtcarpetamt.value;
	
  	var p = /^[a-z0-9]+[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Carpet area amount is required!';
   		frm.txtcarpetamt.focus();
		
  	}
  	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txtcarpetamt.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 
 function checkBudget(frm)
{
	var obj=document.getElementById('txtbudget');
  	var cname = frm.txtbudgetmin.value;
	var cname1=frm.txtbudgetmax.value;
  	var p = /^[a-z0-9]+[_.-]?[0-9-,]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' || cname1 == '') 
	{
   		error='Property budget is required!';
   		frm.txtbudgetmin.focus();
		frm.txtbudgetmax.focus();
  	}
  	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	else if (!p.test(cname1))
	{
   error="Only digits are allowed";
  	}
  	if (error)
	{
   frm.txtbudgetmin.focus();
		frm.txtbudgetmax.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkLocality(frm)
{
	var obj=document.getElementById('ddllocality1');
  	var cname = frm.ddllocality.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddllocality.selectedIndex=='0') 
	{
   		error='Select any one property locality!';
   		frm.ddllocality.focus();
  	}
  	if (error)
	{
   	frm.ddllocality.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkDamount(frm)
{
	var obj=document.getElementById('txtamt1');
  	var cname = frm.txtamt.value;
	
  	var p = /^[a-z0-9]+[_.-]?[0-9-,]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' ) 
	{
   		error='Property deposit amount is required!';
   		frm.txtamt.focus();
		
  	}
	else if (cname.length < 4) 
	{
    error="Property deposit amount should be atleast 4 digits long";
  	}
  	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txtamt.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkPprice(frm)
{
	var obj=document.getElementById('txtprice1');
  	var cname = frm.txtprice.value;
	
  	var p = /^[a-z0-9]+[_.-]?[0-9-,]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' ) 
	{
   		error='Property price is required!';
   		frm.txtprice.focus();
		
  	}
	else if (cname.length < 4) 
	{
    error="Property price should be atleast 4 digits long";
  	}
  	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txtprice.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkExrent(frm)
{
	var obj=document.getElementById('txtexrent1');
  	var cname = frm.txtexrent.value;
	
  	var p = /^[a-z0-9]+[_.-]?[0-9-,]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' ) 
	{
   		error='Expected rent is required!';
   		frm.txtexrent.focus();
		
  	}
	else if (cname.length < 4) 
	{
    error="Expected rent should be atleast 4 digits long";
  	}
  	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txtexrent.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkExprice(frm)
{
	var obj=document.getElementById('txtexprice1');
  	var cname = frm.txtexprice.value;
	
  	var p = /^[a-z0-9]+[_.-]?[0-9-,]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' ) 
	{
   		error='Expected price is required!';
   		frm.txtexprice.focus();
		
  	}
	else if (cname.length < 4) 
	{
    error="Expected price should be atleast 4 digits long";
  	}
  	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txtexprice.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkTimerent(frm)
{
	var obj=document.getElementById('txttrent1');
  	var cname = frm.txttrent.value;
  	var p = /^[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' ) 
	{
   		error='Timeperiod is required!';
   		frm.txttrent.focus();
		
  	}
	if (frm.ddltime.selectedIndex=='0') 
	{
   		error='Select any one timeperiod!';
   		frm.ddltime.focus();
  	}
	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txttrent.focus();
	frm.ddltime.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkPrent(frm)
{
	var obj=document.getElementById('txtprent1');
  	var cname = frm.txtprent.value;
	
  	var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' ) 
	{
   		error='Purpose for renting is required!';
   		frm.txtprent.focus();
		
  	}
	
  	
  	else if (!p.test(cname))
	{
   error="Only characters are allowed";
  	}
	
  	if (error)
	{
   frm.txtprent.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkSreason(frm)
{
	var obj=document.getElementById('txtsreason1');
  	var cname = frm.txtsreason.value;
	
  	var p = /^[a-z0-9]+[_.-]?[a-z- ]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' ) 
	{
   		error='Selling reason is required!';
   		frm.txtsreason.focus();
		
  	}
	
  	
  	else if (!p.test(cname))
	{
   error="Only characters are allowed";
  	}
	
  	if (error)
	{
   frm.txtsreason.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkTypeseller(frm)
{
	var obj=document.getElementById('ddltypeseller1');
  	var cname = frm.ddltypeseller.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddltypeseller.selectedIndex=='0') 
	{
   		error='Select any one type of seller!';
   		frm.ddltypeseller.focus();
  	}
  	if (error)
	{
   	frm.ddltypeseller.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkPbuy(frm)
{
	var obj=document.getElementById('ddlbpurpose1');
  	var cname = frm.ddlbpurpose.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddlbpurpose.selectedIndex=='0') 
	{
   		error='Select any one purpose for buying property!';
   		frm.ddlbpurpose.focus();
  	}
  	if (error)
	{
   	frm.ddlbpurpose.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkUprop(frm)
{
	var obj=document.getElementById('txtuprop1');
  	var cname = frm.txtuprop.value;
	
  	var p = /^[a-z0-9]+[_.-]?[a-z- ]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' ) 
	{
   		error='Use of property is required!';
   		frm.txtuprop.focus();
		
  	}
	
  	
  	else if (!p.test(cname))
	{
   error="Only characters are allowed";
  	}
	
  	if (error)
	{
   frm.txtuprop.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
  function checkBtime(frm)
{
	var obj=document.getElementById('ddlbuytime1');
  	var cname = frm.ddlbuytime.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddlbuytime.selectedIndex=='0') 
	{
   		error='Select any one timeframe for buying propery!';
   		frm.ddlbpurpose.focus();
  	}
  	if (error)
	{
   	frm.ddlbuytime.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
  function checkSerbuy(frm)
{
	var obj=document.getElementById('ddlserbuy1');
  	var cname = frm.ddlserbuy.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddlserbuy.selectedIndex=='0') 
	{
   		error='Select any one seriousness for buying property!';
   		frm.ddlserbuy.focus();
  	}
  	if (error)
	{
   	frm.ddlserbuy.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkTran(frm)
{
	var obj=document.getElementById('ddltransaction1');
  	var cname = frm.ddltransaction.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddltransaction.selectedIndex=='0') 
	{
   		error='Select any one transaction type!';
   		frm.ddlserbuy.focus();
  	}
  	if (error)
	{
   	frm.ddltransaction.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkOwner(frm)
{
	var obj=document.getElementById('ddlownership1');
  	var cname = frm.ddlownership.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddlownership.selectedIndex=='0') 
	{
   		error='Select any one Ownership!';
   		frm.ddlserbuy.focus();
  	}
  	if (error)
	{
   	frm.ddlownership.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkPoss(frm)
{
	var obj=document.getElementById('ddlpossession1');
  	var cname = frm.ddlpossession.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddlpossession.selectedIndex=='0') 
	{
   		error='Select any one possession of property!';
   		frm.ddlpossession.focus();
  	}
  	if (error)
	{
   	frm.ddlpossession.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkPage(frm)
{
	var obj=document.getElementById('ddlage1');
  	var cname = frm.ddlage.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddlage.selectedIndex=='0') 
	{
   		error='Select any one age of property!';
   		frm.ddlage.focus();
  	}
  	if (error)
	{
   	frm.ddlage.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
  function checkBedroom(frm)
{
	var obj=document.getElementById('txtbedroom1');
  	var cname = frm.txtbedroom.value;
	
  	var p = /^[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' ) 
	{
   		error='Bedroom no. is required!';
   		frm.txtbedroom.focus();
		
  	}
	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txtbedroom.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkBathroom(frm)
{
	var obj=document.getElementById('txtbathroom1');
  	var cname = frm.txtbathroom.value;
	
  	var p = /^[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' ) 
	{
   		error='Bathroom no. is required!';
   		frm.txtbathroom.focus();
		
  	}
	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txtbathroom.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
function checkBalcony(frm)
{
	var obj=document.getElementById('txtbalcony1');
  	var cname = frm.txtbalcony.value;
	
  	var p = /^[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' ) 
	{
   		error='Balcony no. is required!';
   		frm.txtbalcony.focus();
		
  	}
	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txtbalcony.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
function checkFloor(frm)
{
	var obj=document.getElementById('txtfloor');
  	var cname = frm.txtfloorfrom.value;
	var cname1=frm.txtfloorto.value;
  	var p = /^[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' || cname1 == '') 
	{
   		error='Floor no. is required!';
   		frm.txtfloorfrom.focus();
		frm.txtfloorto.focus();
  	}
  	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	else if (!p.test(cname1))
	{
   error="Only digits are allowed";
  	}
  	if (error)
	{
   frm.txtfloorfrom.focus();
		frm.txtfloorto.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkBuilding(frm)
{
	var obj=document.getElementById('txtbuilding1');
  	var cname = frm.txtbuilding.value;
	
  	var p = /^[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' ) 
	{
   		error='Building no. is required!';
   		frm.txtbuilding.focus();
		
  	}
	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txtbuilding.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkFfeature(frm)
{
	var obj=document.getElementById('ddlffeature1');
  	var cname = frm.ddlffeature.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddlffeature.selectedIndex=='0') 
	{
   		error='Select any one flat feature!';
   		frm.ddlffeature.focus();
  	}
  	if (error)
	{
   	frm.ddlffeature.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkFloring(frm)
{
	var obj=document.getElementById('ddlfloring1');
  	var cname = frm.ddlfloring.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddlfloring.selectedIndex=='0') 
	{
   		error='Select any one floring!';
   		frm.ddlfloring.focus();
  	}
  	if (error)
	{
   	frm.ddlfloring.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkDfacing(frm)
{
	var obj=document.getElementById('ddldfacing1');
  	var cname = frm.ddldfacing.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddldfacing.selectedIndex=='0') 
	{
   		error='Select any one directional facing!';
   		frm.ddldfacing.focus();
  	}
  	if (error)
	{
   	frm.ddldfacing.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkFacing(frm)
{
	var obj=document.getElementById('ddlfacing1');
  	var cname = frm.ddlfacing.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddlfacing.selectedIndex=='0') 
	{
   		error='Select any one facing!';
   		frm.ddlfacing.focus();
  	}
  	if (error)
	{
   	frm.ddlfacing.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkFurniture(frm)
{
	var obj=document.getElementById('ddlfurniture1');
  	var cname = frm.ddlfurniture.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddlfurniture.selectedIndex=='0') 
	{
   		error='Select any one furniture detail!';
   		frm.ddlfurniture.focus();
  	}
  	if (error)
	{
   	frm.ddlfurniture.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
function checkDishigh(frm)
{
	var obj=document.getElementById('txtdisthigh1');
  	var cname = frm.txtdisthigh.value;
  	var p = /^[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' ) 
	{
   		error='Distance from highway is required!';
   		frm.txtdisthigh.focus();
		
  	}
	if (frm.ddldistance.selectedIndex=='0') 
	{
   		error='Select any one distance type!';
   		frm.ddldistance.focus();
  	}
	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txtdisthigh.focus();
	frm.ddldistance.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 
// alert(document.getElementById("ddlpost").value);
  
	function validate() 
 	{alert("hello");
		 if(document.getElementById("ddlpost").value=="Buy" )
		{
			var type = document.getElementById("ddlptype");
			var value = type.selectedIndex;
			var name = type.options[value].text;
			if(name=="Commercial" || name=="Agricultural" || name=="Industrial")
 			{var form = document.forms['frm'];
 			var ary=[checkPostpro,checkProtype,checkProname,checkCoverarea,checkCoverarearate,checkCoverareaamt,checkPlotarea,checkPlotarearate,checkPlotareaamt,checkBudget,checkLocality,checkDamount,checkPprice,checkPbuy,checkUprop,checkBtime,checkSerbuy,checkTran,checkOwner,checkPoss,checkPage];
 			var rtn=true;
 			var z0=0;
 			for (var z0=0;z0<ary.length;z0++)
			{
  				if (!ary[z0](form))
  				{
    				rtn=false;
  				}
 			}
 			return rtn;
			}
			else
			{
				var form = document.forms['frm'];
 				var ary=[checkPostpro,checkProtype,checkProname,checkCoverarea,checkCoverarearate,checkCoverareaamt,checkPlotarea,checkPlotarearate,checkPlotareaamt,checkCarpetarea,checkCarpetarearate,checkCarpetareaamt,checkBudget,checkLocality,checkDamount,checkPprice,checkPbuy,checkUprop,checkBtime,checkSerbuy,checkTran,checkOwner,checkPoss,checkPage];
 				var rtn=true;
 				var z0=0;
 				for (var z0=0;z0<ary.length;z0++)
				{
  					if (!ary[z0](form))
  					{
    					rtn=false;
  					}
 				}
 				return rtn;
			}
		}
		else if(document.getElementById("ddlpost").value=="Rent")
		{
			var type = document.getElementById("ddlptype");
			var value = type.selectedIndex;
			var name = type.options[value].text;
			if(name=="Commercial" || name=="Agricultural" || name=="Industrial")
 			{
				var form = document.forms['frm'];
 				var ary=[checkPostpro,checkProtype,checkProname,checkCoverarea,checkCoverarearate,checkCoverareaamt,checkPlotarea,checkPlotarearate,checkPlotareaamt,checkLocality,checkDamount,checkPprice,checkExrent,checkExprice,checkTimerent];
 				var rtn=true;
 				var z0=0;
 				for (var z0=0;z0<ary.length;z0++)
				{
  					if (!ary[z0](form))
  					{
    					rtn=false;
  					}
 				}
 				return rtn;
			}
			else
			{
				var form = document.forms['frm'];
 				var ary=[checkPostpro,checkProtype,checkProname,checkCoverarea,checkCoverarearate,checkCoverareaamt,checkPlotarea,checkPlotarearate,checkPlotareaamt,checkCarpetarea,checkCarpetarearate,checkCarpetareaamt,checkLocality,checkDamount,checkPprice,checkExrent,checkExprice,checkTimerent];
 				var rtn=true;
 				var z0=0;
 				for (var z0=0;z0<ary.length;z0++)
				{
  					if (!ary[z0](form))
  					{
    					rtn=false;
  					}
 				}
 				return rtn;
			}
		}
		else if(document.getElementById("ddlpost").value=="Lease")
		{
			var type = document.getElementById("ddlptype");
			var value = type.selectedIndex;
			var name = type.options[value].text;
			if(name=="Commercial" || name=="Agricultural" || name=="Industrial")
 			{
			var form = document.forms['frm'];
 			var ary=[checkPostpro,checkProtype,checkProname,checkCoverarea,checkCoverarearate,checkCoverareaamt,checkPlotarea,checkPlotarearate,checkPlotareaamt,checkLocality,checkDamount,checkPprice,checkExrent,checkExprice,checkTimerent,checkPrent];
 			var rtn=true;
 			var z0=0;
 			for (var z0=0;z0<ary.length;z0++)
			{
  				if (!ary[z0](form))
  				{
    				rtn=false;
  				}
 			}
 			return rtn;
			}
			else
			{
				var form = document.forms['frm'];
 			var ary=[checkPostpro,checkProtype,checkProname,checkCoverarea,checkCoverarearate,checkCoverareaamt,checkPlotarea,checkPlotarearate,checkPlotareaamt,checkCarpetarea,checkCarpetarearate,checkCarpetareaamt,checkLocality,checkDamount,checkPprice,checkExrent,checkExprice,checkTimerent,checkPrent];
 			var rtn=true;
 			var z0=0;
 			for (var z0=0;z0<ary.length;z0++)
			{
  				if (!ary[z0](form))
  				{
    				rtn=false;
  				}
 			}
 			return rtn;
			}
		
		}
		else if(document.getElementById("ddlpost").value=="Sell")
		{
			var type = document.getElementById("ddlptype");
			var value = type.selectedIndex;
			var name = type.options[value].text;
			if(name=="Commercial" || name=="Agricultural" || name=="Industrial")
 			{
			var form = document.forms['frm'];
 			var ary=[checkPostpro,checkProtype,checkProname,checkCoverarea,checkCoverarearate,checkCoverareaamt,checkPlotarea,checkPlotarearate,checkPlotareaamt,checkLocality,checkDamount,checkPprice,checkSreason,checkTypeseller];
 			var rtn=true;
 			var z0=0;
 			for (var z0=0;z0<ary.length;z0++)
			{
  				if (!ary[z0](form))
  				{
    				rtn=false;
  				}
 			}
 			return rtn;
			}
			else
			{
				var form = document.forms['frm'];
 			var ary=[checkPostpro,checkProtype,checkProname,checkCoverarea,checkCoverarearate,checkCoverareaamt,checkPlotarea,checkPlotarearate,checkPlotareaamt,checkCarpetarea,checkCarpetarearate,checkCarpetareaamt,checkLocality,checkDamount,checkPprice,checkSreason,checkTypeseller];
 			var rtn=true;
 			var z0=0;
 			for (var z0=0;z0<ary.length;z0++)
			{
  				if (!ary[z0](form))
  				{
    				rtn=false;
  				}
 			}
 			return rtn;
			}
		}
		else 
		{
			var form = document.forms['frm'];
 			var ary=[checkPostpro,checkProtype,checkProname,checkCoverarea,checkCoverarearate,checkCoverareaamt,checkPlotarea,checkPlotarearate,checkPlotareaamt,checkLocality,checkDamount,checkPprice];
 			var rtn=true;
 			var z0=0;
 			for (var z0=0;z0<ary.length;z0++)
			{
  				if (!ary[z0](form))
  				{
    				rtn=false;
  				}
 			}
 			return rtn;
		}
		alert("hello"+rtn);
		var type = document.getElementById("ddlprop");
		var value = type.selectedIndex;
		var name = type.options[value].text;
		if(name=="Flat")
		{
			var form = document.forms['frm'];
 			var ary=[checkBedroom,checkBathroom,checkBalcony,checkFloor,checkBuilding,checkFfeature,checkFloring,checkDfacing,checkFacing,checkFurniture,checkDishigh];
 			var rtn=true;
 			var z0=0;
 			for (var z0=0;z0<ary.length;z0++)
			{
  				if (!ary[z0](form))
  				{
    				rtn=false;
  				}
 			}
 			return rtn;
		}
		
		else if(name=="Rowhouse")
		{
			var form = document.forms['frm'];
 			var ary=[checkBedroom,checkBathroom,checkBalcony,checkFfeature,checkFloring,checkDfacing,checkFacing,checkFurniture,checkDishigh];
 			var rtn=true;
 			var z0=0;
 			for (var z0=0;z0<ary.length;z0++)
			{
  				if (!ary[z0](form))
  				{
    				rtn=false;
  				}
 			}
 			return rtn;
		}
		else if(name=="Apartment")
		{
			var form = document.forms['frm'];
 			var ary=[checkBedroom,checkBathroom,checkBalcony,checkFloor,checkBuilding,checkFfeature,checkFloring,checkDfacing,checkFacing,checkFurniture,checkDishigh];
 			var rtn=true;
 			var z0=0;
 			for (var z0=0;z0<ary.length;z0++)
			{
  				if (!ary[z0](form))
  				{
    				rtn=false;
  				}
 			}
 			return rtn;
		}
		else if(name=="Bunglow")
		{
			var form = document.forms['frm'];
 			var ary=[checkBedroom,checkBathroom,checkBalcony,checkDfacing,checkFacing,checkFurniture,checkDishigh];
 			var rtn=true;
 			var z0=0;
 			for (var z0=0;z0<ary.length;z0++)
			{
  				if (!ary[z0](form))
  				{
    				rtn=false;
  				}
 			}
 			return rtn;
		}
		else if(name=="Land")
		{
			var form = document.forms['frm'];
 			var ary=[];
 			var rtn=true;
 			var z0=0;
 			for (var z0=0;z0<ary.length;z0++)
			{
  				if (!ary[z0](form))
  				{
    				rtn=false;
  				}
 			}
 			return rtn;
		}
		else if(name=="Shop" || name=="Mall" || name=="Office" || name=="ShowRoom" || name=="Business Center")
		{
			var form = document.forms['frm'];
 			var ary=[checkFloor,checkBuilding,checkDfacing];
 			var rtn=true;
 			var z0=0;
 			for (var z0=0;z0<ary.length;z0++)
			{
  				if (!ary[z0](form))
  				{
    				rtn=false;
  				}
 			}
 			return rtn;
		}
		else if(name=="Industrial Shed" || name=="Godown" || name=="Plot-Residental" || name=="Plot-Industrial" || name=="Farm House")
		{
			var form = document.forms['frm'];
 			var ary=[checkDfacing];
 			var rtn=true;
 			var z0=0;
 			for (var z0=0;z0<ary.length;z0++)
			{
  				if (!ary[z0](form))
  				{
    				rtn=false;
  				}
 			}
 			return rtn;
		}

		
	}

</script>

<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1000"><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
      <tr>
        <td><table width="1000" border="0" cellpadding="0" cellspacing="0" >
          <tr>
            <td bgcolor="#FFFFFF"> <?php include("header.php");?></td>
          </tr>
          <tr>
            <td height="10" bgcolor="#FFFFFF"></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">
            
                <!-- main starts here  --> 
                 <table width="100%" border="0" cellpadding="0">
     
      <tr>
        <td bgcolor="#FFFFFF">
<form action="property_step2.php?act=<?php echo $act; ?>&pid=<?php echo $pid; ?>" method="post" name="frm" id="frm" onsubmit="return validate();" enctype="multipart/form-data">
<?php
	$page = "Add";
	
	if($_REQUEST["action"]=="edit")
	{
		$pid = $_GET['pid'];
		$page = "Edit";
		$query=mysql_query("select * from property_propertydetail_master where property_propertydetail_id=$pid");
		$rowmain = mysql_fetch_array($query);
		$countryid = $rowmain['property_propertydetail_country_id'];
		$stateid=$rowmain['property_propertydetail_state_id'];
		$cityid=$rowmain['property_propertydetail_city_id'];
		$areaid=$rowmain['propperty_propertydetail_area_id'];
		$areacode=$rowmain['propperty_propertydetail_area_code'];
		$ptypeid=$rowmain['property_propertdetail_property_type_id'];
		$propnmid=$rowmain['property_propertydetail_property_id'];
		$pdid=$rowmain['property_propertydetail_id'];
	
		
	}
	
						
?>
<table width="100%" border="0" cellspacing="5" cellpadding="0">
	<tr>
    	<td height="35" class="normal_fonts14_black"><?php echo $page; ?>&nbsp; Property Detail</td>
    </tr>
    <tr>
        <td>
        	<table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
            <tr>
             	<td colspan="3" align="center" class="normal_fonts14">
                 	<!-- start display message -->
						<?php /*?><?php
							if (isset($_SESSION['already'])) 
							{ 
  								echo $_SESSION['already']; 
  								unset($_SESSION['already']); 
							}  
						?><?php */?>
                    <!-- end display message  -->
                 </td>
          </tr>
          <tr>
          	<td colspan="3" class="normal_fonts14">
            	<a href="property_step1.php" class="normal_fonts10" ><label name="step1" class="normal_fonts14"> Step 1</label></a>
            </td>
          </tr>
          <tr>
          	<td colspan="3" class="normal_fonts14" bgcolor="#FDFAD6" align="center">Property Details</td>
          </tr>
          
          <tr>
			<td width="200" align="right" class="normal_fonts9">Country Name</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
            <input type="hidden" name="ddlcountry" id="ddlcountry" value="Canada" />Canada
            	
            </td>
         </tr>
         <tr>
            <td></td>
            <td></td>
            <td class="validationmsg" ><span id="ddlcountry1"></span></td>
        </tr>
         <tr>
			<td width="200" align="right" class="normal_fonts9">Province</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
           <input type="hidden" name="ddlstate" id="ddlstate" value="Ontario" />Ontario            	
            </td>
         </tr>
         <tr>
            <td></td>
            <td></td>
            <td class="validationmsg" ><span id="ddlstate1"></span></td>
        </tr>         
       
        <tr>
			<td width="200" align="right" class="normal_fonts9">Area Name</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
            	<select name="ddlarea" id="ddlarea" style="width:230px"  class="normal_fonts10" onchange="getAreacode(this.value)">
								<option value="--Select area--">Select Area</option>
								<?php		 
		                                          // $qry="select * from property_state_master";
												  	//if($_REQUEST["action"]=="edit")
													//{
															$qry="select DISTINCT a.rm_area_title,a.rm_area_id from rm_area_master a"; 
									$qry1="select a.rm_area_title from rm_area_master a, property_propertydetail_master p where a.rm_area_id = $areaid";
														
													 $res=mysql_query($qry);
									                 $rs=mysql_query($qry1);
													 while($a=mysql_fetch_array($rs))
		  							                  {
									                 $nm=$a['rm_area_title'];
										
									                   }
													 while($arr=mysql_fetch_array($res))
													 
		  							    {
										?>
										<option value="<?php echo $arr['rm_area_id'] ?>" <?php if($_REQUEST["action"]=="edit") {if($nm == $arr['rm_area_title']){ ?> selected="selected" <?php }} ?>><?php echo $arr['rm_area_title']; ?></option>
                                       <?php
		                                             
		                                           }//}
                                           ?>
				</select>
            </td>
         </tr>
         <tr>
			<td width="200" align="right" class="normal_fonts9">Area Code</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
            <input type="text" name="areacode" id="areacode" value="<?php echo $areacode; ?>" />
            	
            </td>
         </tr>
         <tr>
            <td></td>
            <td></td>
            <td class="validationmsg" ><span id="ddlarea1"></span></td>
        </tr>
        <tr>
          
          <tr>
          	<td width="200" align="right" class="normal_fonts9">Post Property For</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
            <?php
				if($_REQUEST["action"] == "add")
				{
			?>
            	<select name="ddlpost" id="ddlpost" style="width:230px" class="normal_fonts10" onchange="loadproperty();">
								<option value="--Select PropertyName--">Select purpose of property</option>
								<option value="Buy" >Buy</option>
                                <option value="Rent">Rent</option>
                                <option value="Lease">Lease</option>
                                <option value="Sell">Sell</option>
                                
						</select>
             <?php
				}
				if($_REQUEST["action"] == "edit")
				{
					$qry="select property_propertydetail_postpropertyfor from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					$nm=$row['property_propertydetail_postpropertyfor'];
			?>
            	<select name="ddlpost" id="ddlpost" style="width:230px" class="normal_fonts10" onchange="loadproperty();" >
								<option value="--Select PropertyName--">Select purpose of property</option>
								<option value="Buy" <?php if($nm == "Buy"){ ?> selected="selected" <?php } ?>>Buy</option>
                                <option value="Rent" <?php if($nm == "Rent"){ ?> selected="selected" <?php } ?>>Rent</option>
                                <option value="Lease" <?php if($nm == "Lease"){ ?> selected="selected" <?php } ?>>Lease</option>
                                <option value="Sell" <?php if($nm == "Sell"){ ?> selected="selected" <?php } ?>>Sell</option>
                                
			</select>
            <input type="hidden" name="txtprop"  value="<?php echo $nm; ?>" size="35"  />
            <?php
				}
			 ?>
			
            </td>
          </tr>
          <tr>
          	<td></td>
            <td></td>
       		<td class="validationmsg" ><span id="ddlpost1" ></span></td>
         </tr>
         
								
          <tr>
          	<td width="200" align="right" class="normal_fonts9">Property Type</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
            	<select name="ddlptype" id="ddlptype" style="width:230px" class="normal_fonts10" onchange="getProp(this.value); loadPropType()">
								<option value="--Select PropertyType--">Select Property Type</option>
								<?php		 
		  							$qry="select * from property_type_master";
							
									if($_REQUEST["action"]=="edit")
									{
														
														$qry1 = "select ptype.property_type_name from property_type_master ptype, property_propertydetail_master p where ptype.property_type_id = $ptypeid ";
														$res1=mysql_query($qry1);
														$arr1 = mysql_fetch_array($res1);
														$nm = $arr1['property_type_name'];
									
									}
                                   
		  							$res=mysql_query($qry);
		 							 while($arr=mysql_fetch_array($res))
		  							{
									?>
										<option value="<?php echo $arr['property_type_id'] ?>" <?php if($_REQUEST["action"]=="edit") {if($nm == $arr['property_type_name']){ ?> selected="selected" <?php }} ?>><?php echo $arr['property_type_name']; ?></option>
                                     <?php
		      							
		  							}
								?>
						</select>
                        <?php
							if($_REQUEST["action"]=="edit")
							{
						?>
                        		
								<input type="hidden" name="txtptype"  value="<?php echo $nm; ?>"  size="35" />
                         <?php
								
							}
						?>
                      
             </td>
          </tr>
          <tr>
          	<td></td>
            <td></td>
       		<td class="validationmsg" ><span id="ddlptype1" ></span></td>
         </tr>
         
         <tr <?php  if($_REQUEST["action"]=="add") { ?> id="propname" style="visibility:hidden; display:none" <?php } ?>>
          	<td width="200" align="right" class="normal_fonts9">Property Name</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
            	<select name="ddlprop" id="ddlprop" style="width:230px" class="normal_fonts10" onchange="loadPropName(this.value)">
								<option value="--Select PropertyName--">Select first property type</option>
								 <?php		 
		                                          
												  	if($_REQUEST["action"]=="edit")
													{
															$qry="select DISTINCT p.property_name,p.property_id from property_master p ,property_propertydetail_master pd where p.property_type_id = $ptypeid"; 
									$qry1="select p.property_name from property_master p, property_propertydetail_master pd where p.property_id = $propnmid";
														
													 $res=mysql_query($qry);
									                 $rs=mysql_query($qry1);
													 while($a=mysql_fetch_array($rs))
		  							                  {
									                 $nm=$a['property_name'];
										
									                   }
													 while($arr=mysql_fetch_array($res))
													 
		  							    {
										?>
										<option value="<?php echo $arr['property_id'] ?>" <?php if($nm == $arr['property_name']){ ?> selected="selected" <?php } ?>><?php echo $arr['property_name']; ?></option>
                                       <?php
		                                             
		                                           }}
                                           ?>
						</select>
                         <?php
							if($_REQUEST["action"]=="edit")
							{
						?>
                        		
								<input type="hidden" name="txtpname"  value="<?php echo $nm; ?>"  size="35" />
                         <?php
								
							}
						?>
            </td>
          </tr>
          <tr>
          	<td></td>
            <td></td>
       		<td class="validationmsg" ><span id="ddlprop1" ></span></td>
         </tr>
           <tr>
          	<td colspan="3" class="normal_fonts14" bgcolor="#FDFAD6" align="center">Property Features Details</td>
          </tr>
         <tr>
          
           <td width="200" align="right" class="normal_fonts9">Covered Area From </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtcovfrom" id="txtcovfrom" class="normal_fonts9" size="20" value="<?php echo $rowmain['property_propertydetail_coveredarea_from']; ?>">
               <br />
               
                <input type="radio" name="covarea" id="covarea1" value="SQ FT" checked="checked" class="normal_fonts10"/>SQ FT
                <input type="radio" name="covarea" id="covarea2" value="VAAR" class="normal_fonts9"/>VAAR
                <input type="radio" name="covarea" id="covarea3" value="VIGHA" class="normal_fonts9"/>VIGHA
                <input type="radio" name="covarea" id="covarea4" value="ACRE" class="normal_fonts9"/>ACRE
                <input type="radio" name="covarea" id="covarea5" value="SQ MT" class="normal_fonts9"/>SQ MT               
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtcover1" ></span></td>
        </tr>
        <tr>
          
           <td width="200" align="right" class="normal_fonts9">Covered Area Rate </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtcovrate" id="txtcovrate" class="normal_fonts9" size="40" value="<?php echo $rowmain['property_propertydetail_coveredarea_rate']; ?>">  &nbsp; Per Area           
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtcovrate1" ></span></td>
        </tr>
        <tr>
          
           <td width="200" align="right" class="normal_fonts9">Covered Area Amount </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtcovamt" id="txtcovamt" class="normal_fonts9" size="40" value="<?php echo $rowmain['property_propertydetail_coveredarea_amount']; ?>">    
                <input type="button" value="Multiply" onclick="covsom()" />      
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtcovamt1" ></span></td>
        </tr>
        <tr>
           <td width="200" align="right" class="normal_fonts9">Plot/land Area From </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtplotfrom" id="txtplotfrom" class="normal_fonts9" size="20" value="<?php echo $rowmain['property_propertydetail_landarea_from']; ?>">  
                 <br />
               
                <input type="radio" name="plotarea" id="plotarea1" value="SQ FT" checked="checked" class="normal_fonts10"/>SQ FT
                <input type="radio" name="plotarea" id="plotarea2" value="VAAR" class="normal_fonts9"/>VAAR
                <input type="radio" name="plotarea" id="plotarea3" value="VIGHA" class="normal_fonts9"/>VIGHA
                <input type="radio" name="plotarea" id="plotarea4" value="ACRE" class="normal_fonts9"/>ACRE
                <input type="radio" name="plotarea" id="plotarea5" value="SQ MT" class="normal_fonts9"/>SQ MT                 
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtplot1"></span></td>
        </tr>
        <tr>
          
           <td width="200" align="right" class="normal_fonts9">Plot/land Area Rate </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtplotrate" id="txtplotrate" class="normal_fonts9" size="40" value="<?php echo $rowmain['property_propertydetail_landarea_rate']; ?>">  &nbsp; Per Area           
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtplotrate1" ></span></td>
        </tr>
        <tr>
          
           <td width="200" align="right" class="normal_fonts9">Plot/land Area Amount </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtplotamt" id="txtplotamt" class="normal_fonts9" size="40" value="<?php echo $rowmain['property_propertydetail_landarea_amount']; ?>">    
                <input type="button" value="Multiply" onclick="plotsom()" />      
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtplotamt1" ></span></td>
        </tr>
        <tr id="carpetarea" style="display:none; visibility:hidden">
           <td width="200" align="right" class="normal_fonts9">Carpet Area From </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtcarpetfrom" id="txtcarpetfrom" class="normal_fonts9" size="20" value="<?php echo $rowmain['property_propertydetail_carpetarea_from']; ?>">
                <br />
               
                <input type="radio" name="carpetarea" id="carpetarea1" value="SQ FT" checked="checked" class="normal_fonts10"/>SQ FT
                <input type="radio" name="carpetarea" id="carpetarea2" value="VAAR" class="normal_fonts9"/>VAAR
                <input type="radio" name="carpetarea" id="carpetarea3" value="VIGHA" class="normal_fonts9"/>VIGHA
                <input type="radio" name="carpetarea" id="carpetarea4" value="ACRE" class="normal_fonts9"/>ACRE
                <input type="radio" name="carpetarea" id="carpetarea5" value="SQ MT" class="normal_fonts9"/>SQ MT                
           </td>
        </tr>
        <tr id="carpetareamsg" style="display:none; visibility:hidden">
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtcarpet"></span></td>
        </tr>
        <tr id="carpetarearate" style="display:none; visibility:hidden">
          
           <td width="200" align="right" class="normal_fonts9">Carpet Area Rate </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtcarpetrate" id="txtcarpetrate" class="normal_fonts9" size="40" value="<?php echo $rowmain['property_propertydetail_carpetarea_rate']; ?>">  &nbsp; Per Area           
           </td>
        </tr>
        <tr id="carpetarearatemsg" style="display:none; visibility:hidden">
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtcarpetrate1" ></span></td>
        </tr>
        <tr id="carpetareaamt" style="display:none; visibility:hidden">
          
           <td width="200" align="right" class="normal_fonts9">Carpet Area Amount </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtcarpetamt" id="txtcarpetamt" class="normal_fonts9" size="40" value="<?php echo $rowmain['property_propertydetail_carpetarea_amount']; ?>">    
                <input type="button" value="Multiply" onclick="carpetsom()" />      
           </td>
        </tr>
        <tr id="carpetareaamtmsg" style="display:none; visibility:hidden">
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtcarpetamt1" ></span></td>
        </tr>
       
        <tr id="budget" style="display:none; visibility:hidden">
           <td width="200" align="right" class="normal_fonts9">Budget Min </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtbudgetmin" class="normal_fonts9" size="20" value="<?php echo $rowmain['property_propertydetail_budgetmin']; ?>"> Max :
				<input type="text" name="txtbudgetmax" class="normal_fonts9" size="20" value="<?php echo $rowmain['property_propertydetail_budgetmax']; ?>">                
           </td>
        </tr>
        <tr id="budgetmsg" style="display:none; visibility:hidden">
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtbudget"></span></td>
        </tr>
        <tr>
          	<td width="200" align="right" class="normal_fonts9">Locality</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
             <?php
				if($_REQUEST["action"] == "add")
				{
			?>
            	<select name="ddllocality" id="ddllocality" style="width:230px" class="normal_fonts10">
								<option value="--Select Locality--">Select Locality</option>
								<option value="Excellent">Excellent</option>
                                <option value="Very Good">Very Good</option>
                                <option value="Good">Good</option>
                               
                                
				</select>
           	<?php
				}
				if($_REQUEST["action"] == "edit")
				{
					$qry="select property_propertydetail_locality from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					$nm=$row['property_propertydetail_locality'];
			?>
            	<select name="ddllocality" id="ddllocality" style="width:230px" class="normal_fonts10">
								<option value="--Select Locality--">Select Locality</option>
								<option value="Excellent" <?php if($nm == "Excellent"){ ?> selected="selected" <?php } ?>>Excellent</option>
                                <option value="Very Good" <?php if($nm == "Very Good"){ ?> selected="selected" <?php } ?>>Very Good</option>
                                <option value="Good" <?php if($nm == "Good"){ ?> selected="selected" <?php } ?>>Good</option>
                               
			</select>
            <?php
				}
			 ?>
			
            </td>
          </tr>
          <tr>
          	<td></td>
            <td></td>
       		<td class="validationmsg" ><span id="ddllocality1" ></span></td>
         </tr>
         <tr>
           <td width="200" align="right" class="normal_fonts9">Deposit Amount </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtamt" class="normal_fonts9" size="40" value="<?php echo $rowmain['property_propertydetail_deposit_amount']; ?>">                 
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtamt1"></span></td>
        </tr>
        <tr>
           <td width="200" align="right" class="normal_fonts9">Property Price</td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtprice" class="normal_fonts9" size="40" value="<?php echo $rowmain['property_propertydetail_property_price']; ?>">                 
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtprice1"></span></td>
        </tr>
        <tr id="expectedrent" style="display:none; visibility:hidden">
           <td width="200" align="right" class="normal_fonts9">Expected Rent </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtexrent" class="normal_fonts9" size="40" value="<?php echo $rowmain['property_propertydetail_expectedrent']; ?>">                 
           </td>
        </tr>
        <tr id="expectedrentmsg" style="display:none; visibility:hidden">
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtexrent1"></span></td>
        </tr>
        <tr id="expectedprice" style="display:none; visibility:hidden">
           <td width="200" align="right" class="normal_fonts9">Expected Price </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtexprice" class="normal_fonts9" size="40" value="<?php echo $rowmain['property_propertydetail_expectedprice']; ?>">                 
           </td>
        </tr>
        <tr id="expectedpricemsg" style="display:none; visibility:hidden">
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtexprice1"></span></td>
        </tr>
         <tr id="timerent" style="display:none; visibility:hidden">
           <td width="200" align="right" class="normal_fonts9">TimePeriod For Rent </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txttrent" class="normal_fonts9" size="15" value="<?php echo $rowmain['property_propertydetail_timeperiod_for_rent']; ?>">    
                 <?php
				if($_REQUEST["action"] == "add")
				{
			?>
            	<select name="ddltime" id="ddltime" style="width:130px" class="normal_fonts10">
								<option value="--Select TimePeriod--">Select TimePeriod</option>
								<option value="Month">Month</option>
                                <option value="Year">Year</option>
              </select>
           	<?php
				}
				if($_REQUEST["action"] == "edit")
				{
					$qry="select property_propertydetail_timeperiod_for_rent_type from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					$nm=$row['property_propertydetail_timeperiod_for_rent_type'];
			?>
            	<select name="ddltime" id="ddltime" style="width:130px" class="normal_fonts10">
								<option value="--Select TimePeriod--">Select TimePeriod</option>
								<option value="Month" <?php if($nm == "Month"){ ?> selected="selected" <?php } ?>>Month</option>
                               
                                <option value="Year" <?php if($nm == "Year"){ ?> selected="selected" <?php } ?>>Year</option>
                               
			</select>
            <?php
				}
			 ?>
                            
           </td>
        </tr>
        <tr id="timerentmsg" style="display:none; visibility:hidden">
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txttrent1"></span></td>
        </tr>
        <tr id="purposerent" style="display:none; visibility:hidden">
           <td width="200" align="right" class="normal_fonts9">Purpose For Renting </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtprent" class="normal_fonts9" size="40" value="<?php echo $rowmain['property_propertydetail_purpose_for_renting']; ?>">                 
           </td>
        </tr>
        <tr id="purposerentmsg" style="display:none; visibility:hidden">
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtprent1"></span></td>
        </tr>
        <tr id="sellreason" style="display:none; visibility:hidden">
           <td width="200" align="right" class="normal_fonts9">Selling Reason </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtsreason" class="normal_fonts9" size="40" value="<?php echo $rowmain['property_propertdetail_selling_reason']; ?>">                 
           </td>
        </tr>
        <tr id="sellreasonmsg" style="display:none; visibility:hidden">
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtsreason1"></span></td>
        </tr>
        
        <tr id="typeseller" style="display:none; visibility:hidden">
           <td width="200" align="right" class="normal_fonts9">Type of Seller Required </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
            <?php
				if($_REQUEST["action"] == "add")
				{
			?>
           		<select name="ddltypeseller" class="normal_fonts10" style="width:230px" >
      				<option selected="selected" value="0">Select Seller</option> 
      				<option value="Seller in deep need of money">Seller in deep need of money</option>
       				<option value="Bank auctioned property">Bank auctioned property</option>
       				<option value="Discount in new project booking">Discount in new project booking</option>
       				<option value="Developing area">Developing area</option>
       				<option value="Rental income">Rental income</option>
       				<option value="Any of these">Any of these</option>
       
       			</select>
            <?php
				}
				if($_REQUEST["action"] == "edit")
				{
					$qry="select property_propertydetail_type_of_seller_required  from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					$nm=$row['property_propertydetail_type_of_seller_required'];
			?>
            	<select name="ddltypeseller" class="normal_fonts10" style="width:230px" >
      				<option selected="selected" value="0">Select Seller</option> 
								<option value="Seller in deep need of money" <?php if($nm == "Seller in deep need of money"){ ?> selected="selected" <?php } ?>>Seller in deep need of money</option>
                                <option value="Bank auctioned property" <?php if($nm == "Bank auctioned property"){ ?> selected="selected" <?php } ?>>Bank auctioned property</option>
                                <option value="Discount in new project booking" <?php if($nm == "Discount in new project booking"){ ?> selected="selected" <?php } ?>>Discount in new project booking</option>
                                <option value="Developing area" <?php if($nm == "Developing area"){ ?> selected="selected" <?php } ?>>Developing area</option>
                                <option value="Rental income" <?php if($nm == "Rental income"){ ?> selected="selected" <?php } ?>>Rental income</option>
                                <option value="Any of these" <?php if($nm == "Any of these"){ ?> selected="selected" <?php } ?>>Any of these</option>
                               
			</select>
            <?php
				}
			 ?>
           
           		
           		                
           </td>
        </tr>
        <tr id="typesellermsg" style="display:none; visibility:hidden">
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="ddltypeseller1"></span></td>
        </tr>
         <tr id="buypurpose" style="display:none; visibility:hidden">
           <td width="200" align="right" class="normal_fonts9">Purpose For Buying</td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           <?php
				if($_REQUEST["action"] == "add")
				{
			?>
           		<select name="ddlbpurpose" class="normal_fonts10" style="width:230px">
          			<option selected="selected" value="0">Select  Purpose</option> 
          			<option value="New For Own Use">New For Own Use</option>
		   			<option value="Swapping">Swapping</option>
		    		<option value="Investment For Appreceiation">Investment For Appreceiation</option>
            		<option value="For Rental Income">For Rental Income</option>
                 
        		</select>  
                
            <?php
				}
				if($_REQUEST["action"] == "edit")
				{
					$qry="select property_propertydetail_purpose_for_buying  from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					$nm=$row['property_propertydetail_purpose_for_buying'];
					
			?>
            	<select name="ddlbpurpose" class="normal_fonts10" style="width:230px">
          			<option selected="selected" value="0">Select  Purpose</option>  
								<option value="New For Own Use" <?php if($nm == "New For Own Use"){ ?> selected="selected" <?php } ?>>New For Own Use</option>
                                <option value="Swapping" <?php if($nm == "Swapping"){ ?> selected="selected" <?php } ?>>Swapping</option>
                                <option value="Investment For Appreceiation" <?php if($nm == "Investment For Appreceiation"){ ?> selected="selected" <?php } ?>>Investment For Appreceiation</option>
                                <option value="For Rental Income" <?php if($nm == "For Rental Income"){ ?> selected="selected" <?php } ?>>For Rental Income</option>
                                
                               
			</select>
            <?php
				}
			 ?>               
           </td>
        </tr>
        <tr id="buypurposemsg" style="display:none; visibility:hidden">
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="ddlbpurpose1"></span></td>
        </tr>
        <tr id="useproperty" style="display:none; visibility:hidden">
           <td width="200" align="right" class="normal_fonts9">Use For Property</td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtuprop" class="normal_fonts9" size="40" value="<?php echo $rowmain['property_propertydetail_use_for_property']; ?>">                 
           </td>
        </tr>
        <tr id="usepropertymsg" style="display:none; visibility:hidden">
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtuprop1"></span></td>
        </tr>
        <tr id="timebuy" style="display:none; visibility:hidden">
           <td width="200" align="right" class="normal_fonts9">Timeframe For Buying</td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
            <?php
				if($_REQUEST["action"] == "add")
				{
			?>
           		<select name="ddlbuytime" class="normal_fonts10" style="width:230px">
              	<option selected="selected" value="0">Select Timeframe</option>
              	<option value="Urgent">Urgent</option>
              	<option value="Within A Month">Within A Month</option>
              	<option value="Within 6 Months">Within 6 Months</option>
              	<option value="Whenever">Whenever</option>
              	<option value="In Response To Our Selling AD">In Response To Our Selling AD</option>
              
            </select> 
             <?php
				}
				if($_REQUEST["action"] == "edit")
				{
					$qry="select property_propertydetail_timeframe_for_buying  from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					$nm=$row['property_propertydetail_timeframe_for_buying'];
			?>
            	<select name="ddlbuytime" class="normal_fonts10" style="width:230px">
              	<option selected="selected" value="0">Select Timeframe</option>  
								<option value="Urgent" <?php if($nm == "Urgent"){ ?> selected="selected" <?php } ?>>Urgent</option>
                                <option value="Within A Month" <?php if($nm == "Within A Month"){ ?> selected="selected" <?php } ?>>Within A Month</option>
                                <option value="Within 6 Months" <?php if($nm == "Within 6 Months"){ ?> selected="selected" <?php } ?>>Within 6 Months</option>
                                <option value="Whenever" <?php if($nm == "Whenever"){ ?> selected="selected" <?php } ?>>Whenever</option>
                                <option value="In Response To Our Selling AD" <?php if($nm == "In Response To Our Selling AD"){ ?> selected="selected" <?php } ?>>In Response To Our Selling AD</option>
                                
                               
			</select>
            <?php
				}
			 ?>                          
           </td>
        </tr>
        <tr id="timebuymsg" style="display:none; visibility:hidden">
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="ddlbuytime1"></span></td>
        </tr>
        <tr id="seriousbuy" style="display:none; visibility:hidden">
           <td width="200" align="right" class="normal_fonts9">Seriousness For Buying</td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           <?php
				if($_REQUEST["action"] == "add")
				{
			?>
           		<select name="ddlserbuy" class="normal_fonts10" style="width:230px" >
              <option selected="selected" value="0">Select Seriousness</option>
              <option value="Very Serious">Very Serious</option>
              <option value="Serious">Serious</option>
              <option value="Will Buy At Own Terms">Will Buy At Own Terms</option>
              <option value="Just Timepass">Just Timepass</option>

              
            </select>
             <?php
				}
				if($_REQUEST["action"] == "edit")
				{
					$qry="select property_propertydetail_seriousness_for_buying  from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					$nm=$row['property_propertydetail_seriousness_for_buying'];
			?>
            	<select name="ddlserbuy" class="normal_fonts10" style="width:230px" >
              <option selected="selected" value="0">Select Seriousness</option>  
								<option value="Very Serious" <?php if($nm == "Very Serious"){ ?> selected="selected" <?php } ?>>Very Serious</option>
                                <option value="Serious" <?php if($nm == "Serious"){ ?> selected="selected" <?php } ?>>Serious</option>
                                <option value="Will Buy At Own Terms" <?php if($nm == "Will Buy At Own Terms"){ ?> selected="selected" <?php } ?>>Will Buy At Own Terms</option>
                                <option value="Just Timepass" <?php if($nm == "Just Timepass"){ ?> selected="selected" <?php } ?>>Just Timepass</option>
                                
			</select>
            <?php
				}
			 ?>                 
           </td>
        </tr>
        <tr id="seriousbuymsg" style="display:none; visibility:hidden">
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="ddlserbuy1"></span></td>
        </tr>
         <tr id="transactiontype" style="display:none; visibility:hidden">
          	<td width="200" align="right" class="normal_fonts9">Transaction Type</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
             <?php
				if($_REQUEST["action"] == "add")
				{
			?>
                <select name="ddltransaction" id="ddltransaction" style="width:230px" class="normal_fonts10">
								<option value="--Select Transactiontype--">Select Type</option>
								<option value="Resale">Resale</option>
                                <option value="New Booking">New Booking</option>
                                
				</select>
                <?php
				}
				if($_REQUEST["action"] == "edit")
				{
					$qry="select property_propertydetail_transaction_type  from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					$nm=$row['property_propertydetail_transaction_type'];
			?>
            	 <select name="ddltransaction" id="ddltransaction" style="width:230px" class="normal_fonts10">
								<option value="--Select Transactiontype--">Select Type</option>  
								<option value="Resale" <?php if($nm == "Resale"){ ?> selected="selected" <?php } ?>>Resale</option>
                                <option value="New Booking" <?php if($nm == "New Booking"){ ?> selected="selected" <?php } ?>>New Booking</option>
                 </select>
            <?php
				}
			 ?>       
            </td>
          </tr>
          <tr id="transactiontypemsg" style="display:none; visibility:hidden">
          	<td></td>
            <td></td>
       		<td class="validationmsg" ><span id="ddltransaction1" ></span></td>
         </tr>
         <tr id="propownership" style="display:none; visibility:hidden">
          	<td width="200" align="right" class="normal_fonts9">Property Ownership</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
            <?php
				if($_REQUEST["action"] == "add")
				{
			?>
            	<select name="ddlownership" id="ddlownership" style="width:230px" class="normal_fonts10">
								<option value="--Select ownership--">Select Ownership</option>
								<option value="Freehold">Freehold</option>
                                <option value="Leasehold">Leasehold</option>
                                <option value="CO-operative Society">CO-operative Society</option>
                                <option value="Power Of Attorny">Power Of Attorny</option>
                                
				</select>
                 <?php
				}
				if($_REQUEST["action"] == "edit")
				{
					$qry="select property_propertydetail_property_ownership  from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					$nm=$row['property_propertydetail_property_ownership'];
			?>
            	 <select name="ddlownership" id="ddlownership" style="width:230px" class="normal_fonts10">
								<option value="--Select ownership--">Select Ownership</option>  
								<option value="Freehold" <?php if($nm == "Freehold"){ ?> selected="selected" <?php } ?>>Freehold</option>
                                <option value="Leasehold" <?php if($nm == "Leasehold"){ ?> selected="selected" <?php } ?>>Leasehold</option>
                                <option value="CO-operative Society" <?php if($nm == "CO-operative Society"){ ?> selected="selected" <?php } ?>>CO-operative Society</option>
                                <option value="Power Of Attorny" <?php if($nm == "Power Of Attorny"){ ?> selected="selected" <?php } ?>>Power Of Attorny</option>
                 </select>
            <?php
				}
			 ?>       
            </td>
          </tr>
          <tr id="propownershipmsg" style="display:none; visibility:hidden">
          	<td></td>
            <td></td>
       		<td class="validationmsg" ><span id="ddlownership1" ></span></td>
         </tr>
         <tr id="proppossession" style="display:none; visibility:hidden">
          	<td width="200" align="right" class="normal_fonts9">Possession Of Property</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
            <?php
				if($_REQUEST["action"] == "add")
				{
			?>
            	<select name="ddlpossession" id="ddlpossession" style="width:230px" class="normal_fonts10">
								<option value="--Select possession--">Select Possession</option>
								<option value="Ready To Move">Ready To Move</option>
                                <option value="1 month">1 month</option>
                                <option value="2 months">2 months</option>
                                <option value="3 months">3 months</option>
                                <option value="4 months">4 months</option>
                                <option value="5 months">5 months</option>
                                <option value="6 months">6 months</option>
                                <option value="1 year">1 year</option>
                                <option value="2 year">2 years</option>
                                <option value="3 year">3 years</option>
                                
				</select>
                 <?php
				}
				if($_REQUEST["action"] == "edit")
				{
					$qry="select property_propertdetail_possession_of_property  from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					$nm=$row['property_propertdetail_possession_of_property'];
			?>
            	<select name="ddlpossession" id="ddlpossession" style="width:230px" class="normal_fonts10">
								<option value="--Select possession--">Select Possession</option>  
								<option value="Ready To Move" <?php if($nm == "Ready To Move"){ ?> selected="selected" <?php } ?>>Ready To Move</option>
                                <option value="1 month" <?php if($nm == "1 month"){ ?> selected="selected" <?php } ?>>1 month</option>
                                <option value="2 months" <?php if($nm == "2 months"){ ?> selected="selected" <?php } ?>>2 months</option>
                                <option value="3 months" <?php if($nm == "3 months"){ ?> selected="selected" <?php } ?>>3 months</option>
                                <option value="4 months" <?php if($nm == "4 months"){ ?> selected="selected" <?php } ?>>4 months</option>
                                <option value="5 months" <?php if($nm == "5 months"){ ?> selected="selected" <?php } ?>>5 months</option>
                                <option value="6 months" <?php if($nm == "6 months"){ ?> selected="selected" <?php } ?>>6 months</option>
                                <option value="1 year" <?php if($nm == "1 year"){ ?> selected="selected" <?php } ?>>1 year</option>
                                <option value="2 years" <?php if($nm == "2 years"){ ?> selected="selected" <?php } ?>>2 years</option>
                                <option value="3 years" <?php if($nm == "3 years"){ ?> selected="selected" <?php } ?>>3 years</option>
                 </select>
            <?php
				}
			 ?>       
            </td>
          </tr>
          <tr id="proppossessionmsg" style="display:none; visibility:hidden">
          	<td></td>
            <td></td>
       		<td class="validationmsg" ><span id="ddlpossession1" ></span></td>
         </tr>
         <tr id="propage" style="display:none; visibility:hidden">
          	<td width="200" align="right" class="normal_fonts9">Age Of Property</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
             <?php
				if($_REQUEST["action"] == "add")
				{
			?>
            	<select name="ddlage" id="ddlage" style="width:230px" class="normal_fonts10">
								<option value="--Select age--">Select age</option>
								<option value="Ready">Ready</option>
                                <option value="1 month">1 month</option>
                                <option value="2 months">2 months</option>
                                <option value="3 months">3 months</option>
                                <option value="4 months">4 months</option>
                                <option value="5 months">5 months</option>
                                <option value="6 months">6 months</option>
                                <option value="1 year">1 year</option>
                                <option value="5 years">5 years</option>
                                <option value="10 years">10 years</option>
                                
				</select>
                <?php
				}
				if($_REQUEST["action"] == "edit")
				{
					$qry="select property_propertydetail_age_of_property  from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					$nm=$row['property_propertydetail_age_of_property'];
			?>
            	<select name="ddlage" id="ddlage" style="width:230px" class="normal_fonts10">
								<option value="--Select age--">Select age</option>  
								<option value="Ready" <?php if($nm == "Ready"){ ?> selected="selected" <?php } ?>>Ready</option>
                                <option value="1 month" <?php if($nm == "1 month"){ ?> selected="selected" <?php } ?>>1 month</option>
                                <option value="2 months" <?php if($nm == "2 months"){ ?> selected="selected" <?php } ?>>2 months</option>
                                <option value="3 months" <?php if($nm == "3 months"){ ?> selected="selected" <?php } ?>>3 months</option>
                                <option value="4 months" <?php if($nm == "4 months"){ ?> selected="selected" <?php } ?>>4 months</option>
                                <option value="5 months" <?php if($nm == "5 months"){ ?> selected="selected" <?php } ?>>5 months</option>
                                <option value="6 months" <?php if($nm == "6 months"){ ?> selected="selected" <?php } ?>>6 months</option>
                                <option value="1 year" <?php if($nm == "1 year"){ ?> selected="selected" <?php } ?>>1 year</option>
                                <option value="5 years" <?php if($nm == "5 years"){ ?> selected="selected" <?php } ?>>5 years</option>
                                <option value="10 years" <?php if($nm == "10 years"){ ?> selected="selected" <?php } ?>>10 years</option>
                 </select>
            <?php
				}
			 ?>       
            </td>
          </tr>
          <tr id="propagemsg" style="display:none; visibility:hidden">
          	<td></td>
            <td></td>
       		<td class="validationmsg" ><span id="ddlage1" ></span></td>
         </tr>
		 <tr id="additionalmsg" style="display:none; visibility:hidden">
          	<td colspan="3" class="normal_fonts14" bgcolor="#FDFAD6" align="center">Additional Details</td>
          </tr>
        	<tr id="bedroom" style="display:none; visibility:hidden">
           <td width="200" align="right" class="normal_fonts9">Bedroom </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtbedroom" class="normal_fonts9" size="40" value="<?php echo $rowmain['property_propertydetail_bedroom']; ?>">
				               
           </td>
        </tr>
        <tr id="bedroommsg" style="display:none; visibility:hidden">
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtbedroom1" ></span></td>
        </tr>
        
        <tr id="bathroom" style="display:none; visibility:hidden">
           <td width="200" align="right" class="normal_fonts9">Bathroom </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtbathroom" class="normal_fonts9" size="40" value="<?php echo $rowmain['property_propertydetail_bathroom']; ?>"> 
				               
           </td>
        </tr>
        <tr id="bathroommsg" style="display:none; visibility:hidden">
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtbathroom1"></span></td>
        </tr>
        <tr id="balcony" style="display:none; visibility:hidden">
           <td width="200" align="right" class="normal_fonts9">Balconies </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtbalcony" class="normal_fonts9" size="40" value="<?php echo $rowmain['property_propertydetail_balconies']; ?>">              
           </td>
        </tr>
        <tr id="balconymsg" style="display:none; visibility:hidden">
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtbalcony1"></span></td>
        </tr>
        <tr id="addtionalroom" style="display:none; visibility:hidden">
          	<td width="200" align="right" class="normal_fonts9">Addtional Rooms</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
           <?php
				if($_REQUEST["action"] == "add")
				{
			?>
            	<input type="checkbox" name="room[]" value="Puja Room"> Puja Room 
                <input type="checkbox" name="room[]" value="Servant Room"> Servant Room 
                <input type="checkbox" name="room[]" value="Study Room"> Study Room 
                <input type="checkbox" name="room[]" value="Store Room"> Store Room 
               <?php
				}
				if($_REQUEST["action"] == "edit")
				{
					$qry="select additionalroom_name from  property_propertydetail_additionalroom where property_propertydetail_additionalroom_property_propertydetailid=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$c=mysql_num_rows($sql);
					$room=array("Puja Room","Servant Room","Study Room","Store Room");
					
					$i=0;
							while($i<=3)
							{	
								$name=$room[$i];
								
								$j=0;
								$u=0;
								while($j<$c)
								{
									$arr=mysql_fetch_array($sql);
									$nm=$arr['additionalroom_name'];
									
									if($name==$nm)
									{
										
									?>
										<input type="checkbox" name="room[]" value="<?php echo $name; ?>" checked="checked">
										
									<?php
									echo $name;
									}
									else
									{
										$u++;
									}
									
									$j++;
								}
								if($u==$c)
								{
									?>
									<input type="checkbox" name="room[]" value="<?php echo $name; ?>">
										
									<?php
									echo $name;
								}
								$qry="select additionalroom_name from  property_propertydetail_additionalroom where property_propertydetail_additionalroom_property_propertydetailid=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
								$i++;
							}
					
            
          
				}
                
                	
				?>			
                
            </td>
          </tr>
          <tr id="additionalroommsg" style="display:none; visibility:hidden">
          	<td></td>
            <td></td>
            <td class="validationmsg" ><span id="txtfloorfrom"></span></td>
          </tr>
        <tr id="floorno" style="display:none;visibility:hidden">
           <td width="200" align="right" class="normal_fonts9">Floor No From</td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtfloorfrom" class="normal_fonts9" size="20" value="<?php echo $rowmain['property_propertydetail_floorno_from']; ?>"> To : 
				<input type="text" name="txtfloorto" class="normal_fonts9" size="20" value="<?php echo $rowmain['property_propertydetail_floorno_to']; ?>">                
           </td>
        </tr>
        <tr id="floornomsg" style="display:none; visibility:hidden">
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtfloor"></span></td>
        </tr>
        <tr id="buildingno" style="display:none; visibility:hidden">
           <td width="200" align="right" class="normal_fonts9">Building no </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtbuilding" class="normal_fonts9" size="40" value="<?php echo $rowmain['property_propertydetail_building_no']; ?>">                
           </td>
        </tr>
        <tr id="buildingnomsg" style="display:none; visibility:hidden">
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtbuilding1"></span></td>
        </tr>
        <tr id="flatfeature" style="display:none; visibility:hidden">
          	<td width="200" align="right" class="normal_fonts9">Flat Features</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
              <?php
				if($_REQUEST["action"] == "add")
				{
			?>
            	<select name="ddlffeature" id="ddlffeature" style="width:230px" class="normal_fonts10">
								<option value="--Select Feature--">Select Feature</option>
								<option value="Super">Super</option>
                                <option value="Built Up">Built Up</option>
                                <option value="Carpet">Carpet</option>
                               
                                
				</select>
              <?php
				}
				if($_REQUEST["action"] == "edit")
				{
					$qry="select property_propertydetail_select_flat_feature  from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					$nm=$row['property_propertydetail_select_flat_feature'];
			?>
            	<select name="ddlffeature" id="ddlffeature" style="width:230px" class="normal_fonts10">
								<option value="--Select Feature--">Select Feature</option> 
								<option value="Super" <?php if($nm == "Super"){ ?> selected="selected" <?php } ?>>Super</option>
                                <option value="Built Up" <?php if($nm == "Built Up"){ ?> selected="selected" <?php } ?>>Built Up</option>
                                <option value="Carpet" <?php if($nm == "Carpet"){ ?> selected="selected" <?php } ?>>Carpet</option>
               </select>
            <?php
				}
			 ?>       
              
            </td>
          </tr>
          <tr id="flatfeaturemsg" style="display:none; visibility:hidden">
          	<td></td>
            <td></td>
       		<td class="validationmsg" ><span id="ddlffeature1" ></span></td>
         </tr>
         <tr id="flooring" style="display:none; visibility:hidden" >
          	<td width="200" align="right" class="normal_fonts9">Flooring</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
            <?php
				if($_REQUEST["action"] == "add")
				{
			?>
            	<select name="ddlfloring" id="ddlfloring" style="width:230px" class="normal_fonts10">
								<option value="--Select Floring--">Select Floring</option>
								<option value="Ceramic">Ceramic</option>
                                <option value="Grenaile">Grenaile</option>
                                <option value="Marbonic">Marbonic</option>
                                <option value="Wooded">Wooded</option>
                                <option value="Normal Tiles">Normal Tiles</option>
                                <option value="Utrified Tiles">Utrified Tiles</option>
                  </select>
                   <?php
				}
				if($_REQUEST["action"] == "edit")
				{
					$qry="select property_propertydetail_flooring  from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					$nm=$row['property_propertydetail_flooring'];
			?>
            	<select name="ddlfloring" id="ddlfloring" style="width:230px" class="normal_fonts10">
								<option value="--Select Floring--">Select Floring</option>
								<option value="Ceramic" <?php if($nm == "Ceramic"){ ?> selected="selected" <?php } ?>>Ceramic</option>
                                <option value="Grenaile" <?php if($nm == "Grenaile"){ ?> selected="selected" <?php } ?>>Grenaile</option>
                                <option value="Marbonic" <?php if($nm == "Marbonic"){ ?> selected="selected" <?php } ?>>Marbonic</option>
                                <option value="Wooded" <?php if($nm == "Wooded"){ ?> selected="selected" <?php } ?>>Wooded</option>
                                <option value="Normal Tiles" <?php if($nm == "Normal Tiles"){ ?> selected="selected" <?php } ?>>Normal Tiles</option>
                                <option value="Utrified Tiles" <?php if($nm == "Utrified Tiles"){ ?> selected="selected" <?php } ?>>Utrified Tiles</option>
               </select>
            <?php
				}
			 ?>     
            </td>
          </tr>
          <tr id="flooringmsg" style="display:none; visibility:hidden">
          	<td></td>
            <td></td>
       		<td class="validationmsg" ><span id="ddlfloring1" ></span></td>
         </tr>
         <tr id="direfacing" style="display:none; visibility:hidden">
          	<td width="200" align="right" class="normal_fonts9">Directional Facing</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
            <?php
				if($_REQUEST["action"] == "add")
				{
			?>
            	<select name="ddldfacing" id="ddldfacing" style="width:230px" class="normal_fonts10">
								<option value="--Select facing--">Select Directional Facing</option>
								<option value="East">East</option>
                                <option value="West">West</option>
                                <option value="North">North</option>
                                <option value="South">South</option>
                               
                               
                                
						</select>
                         <?php
				}
				if($_REQUEST["action"] == "edit")
				{
					$qry="select property_propertydetail_directional_facing  from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					$nm=$row['property_propertydetail_directional_facing'];
			?>
            	<select name="ddldfacing" id="ddldfacing" style="width:230px" class="normal_fonts10">
								<option value="--Select facing--">Select Directional Facing</option>
								<option value="East" <?php if($nm == "East"){ ?> selected="selected" <?php } ?>>East</option>
                                <option value="West" <?php if($nm == "West"){ ?> selected="selected" <?php } ?>>West</option>
                                <option value="North" <?php if($nm == "North"){ ?> selected="selected" <?php } ?>>North</option>
                                <option value="South" <?php if($nm == "South"){ ?> selected="selected" <?php } ?>>South</option>
                               
               </select>
            <?php
				}
			 ?>     
            </td>
          </tr>
          <tr id="direfacingmsg" style="display:none; visibility:hidden">
          	<td></td>
            <td></td>
       		<td class="validationmsg" ><span id="ddldfacing1" ></span></td>
         </tr>
         <tr id="facing" style="display:none; visibility:hidden">
          	<td width="200" align="right" class="normal_fonts9">Facing</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
             <?php
				if($_REQUEST["action"] == "add")
				{
			?>
            	<select name="ddlfacing" id="ddlfacing" style="width:230px" class="normal_fonts10">
								<option value="--Select facing--">Select Facing</option>
								<option value="Pool">Pool</option>
                                <option value="Garden">Garden</option>
                                <option value="Main Road">Main Road</option>
                                
			</select>
            <?php
				}
				if($_REQUEST["action"] == "edit")
				{
					$qry="select property_propertydetail_facing  from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					$nm=$row['property_propertydetail_facing'];
			?>
            	<select name="ddlfacing" id="ddlfacing" style="width:230px" class="normal_fonts10">
								<option value="--Select facing--">Select Facing</option>
								<option value="Pool" <?php if($nm == "Pool"){ ?> selected="selected" <?php } ?>>Pool</option>
                                <option value="Garden" <?php if($nm == "Garden"){ ?> selected="selected" <?php } ?>>Garden</option>
                                <option value="Main Road" <?php if($nm == "Main Road"){ ?> selected="selected" <?php } ?>>Main Road</option>
                             
               </select>
            <?php
				}
			 ?>     
            </td>
          </tr>
          <tr id="facingmsg" style="display:none; visibility:hidden">
          	<td></td>
            <td></td>
       		<td class="validationmsg" ><span id="ddlfacing1" ></span></td>
         </tr>
         <tr id="furnished" style="display:none; visibility:hidden"> 
          	<td width="200" align="right" class="normal_fonts9">Furnished</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
            <?php
				if($_REQUEST["action"] == "edit")
				{
					$qry="select property_propertydetail_furnished  from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					$nm=$row['property_propertydetail_furnished'];
				}
			?>
            	<input type="radio" name="radio1" value="Yes" onclick="showfurniture(this.value)" <?php if($_REQUEST["action"] == "edit"){ if($nm=="Yes")?> 
                checked="checked" <?php } ?>> Yes
                
                <input type="radio" name="radio1" value="No" onclick="hidefurniture(this.value)" <?php if($_REQUEST["action"] == "edit"){ if($nm=="Yes")?> checked="checked" <?php } ?>> No
            </td>
          </tr>
          <tr id="furnishedmsg" style="display:none; visibility:hidden">
          	<td></td>
            <td></td>
            <td></td>
          </tr>
          <tr id="furnituredetail" style="display:none; visibility:hidden">
          	<td width="200" align="right" class="normal_fonts9">Furniture Detail</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
             <?php
				if($_REQUEST["action"] == "add")
				{
			?>
            	<select name="ddlfurniture" id="ddlfurniture" style="width:230px" class="normal_fonts10"> 
								<option value="--Select Floring--">Select Option</option>
								<option value="Naked">Naked</option>
                                <option value="Old Furniture">Old Furniture</option>
                                <option value="Fully Furnished">Fully Furnished</option>
                                <option value="Semi Furnished">Semi Furnished</option>
                               
				</select>
                 <?php
				}
				if($_REQUEST["action"] == "edit")
				{
					$qry="select property_propertydetail_furniture_detail  from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					$nm=$row['property_propertydetail_furniture_detail'];
			?>
            	<select name="ddlfurniture" id="ddlfurniture" style="width:230px" class="normal_fonts10"> 
								<option value="--Select Floring--">Select Option</option>
								<option value="Naked" <?php if($nm == "Naked"){ ?> selected="selected" <?php } ?>>Naked</option>
                                <option value="Old Furniture" <?php if($nm == "Old Furniture"){ ?> selected="selected" <?php } ?>>Old Furniture</option>
                                <option value="Fully Furnished" <?php if($nm == "Fully Furnished"){ ?> selected="selected" <?php } ?>>Fully Furnished</option>
                                <option value="Semi Furnished" <?php if($nm == "Semi Furnished"){ ?> selected="selected" <?php } ?>>Semi Furnished</option>
                             
               </select>
            <?php
				}
			 ?>     
            </td>
          </tr>
          <tr id="furnituredetailmsg" style="display:none; visibility:hidden">
          	<td></td>
            <td></td>
       		<td class="validationmsg" ><span id="ddlfurniture1" ></span></td>
         </tr>
          <tr id="disthighway" style="display:none; visibility:hidden">
           <td width="200" align="right" class="normal_fonts9">Distance From Highway </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtdisthigh" class="normal_fonts9" size="15" value="<?php echo $rowmain['property_propertydetail_distance_from_highway']; ?>">
                <?php
				if($_REQUEST["action"] == "add")
				{
				?>
                <select name="ddldistance" id="ddldistance" style="width:130px" class="normal_fonts10">
								<option value="--Select Distance--">Select Distance</option>
								<option value="Km">Km</option>
                                <option value="Meter">Meter</option>
              </select>  
               <?php
				}
				if($_REQUEST["action"] == "edit")
				{
					$qry="select property_propertydetail_distance_from_highway_type from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					$nm=$row['property_propertydetail_distance_from_highway_type'];
			?>
            	<select name="ddldistance" id="ddldistance" style="width:130px" class="normal_fonts10">
								<option value="--Select Distance--">Select Distance</option>
								<option value="Km" <?php if($nm == "Km"){ ?> selected="selected" <?php } ?>>Km</option>
                                <option value="Meter" <?php if($nm == "Meter"){ ?> selected="selected" <?php } ?>>Meter</option>
                               
               </select>
            <?php
				}
			 ?>                
                                
           </td>
        </tr>
        <tr id="disthighwaymsg">
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtdisthigh1"></span></td>
        </tr>
        <tr id="propimage">
           <td width="200" align="right" class="normal_fonts9">Upload Property Image </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="file" name="image" size="37" id="image" value="<?php echo $rowmain['property_propertydetail_photo']; ?>">  
                <br/><br/> <img src="uploadimages/property/<?php echo $rowmain['property_propertydetail_photo']; ?>"  name="img1" width="250" height="70" />            
           </td>
        </tr>
        <tr id="propimagemsg" style="display:none; visibility:hidden">
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtdisthigh"></span></td>
        </tr>
         
        <tr id="amenities" style="display:none; visibility:hidden">
          	<td colspan="3" class="normal_fonts14" bgcolor="#FDFAD6" align="center">Amenities</td>
          </tr>
          <tr id="amenitieschk" style="display:none;visibility:hidden">
          <td width="200" align="right" class="normal_fonts9">Select Amenities</td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
         
          	<?php
				if($_REQUEST["action"] == "add")
				{
					$c=0;
				$qry = "select * from property_amenities_master";
				$sql = mysql_query($qry) or die(mysql_error());
				while($row = mysql_fetch_array($sql))
				{
							$c++;
							$id=$row['property_amenities_id'];
							$nm=$row['property_amenities_name'];
							
			?>
               
				<input type="checkbox" name="ch[]" id="ch[]" value="<?php echo $id; ?>" />
                     
              <?php 
						echo $nm;
						if($c==4 || $c==8 || $c==12 || $c==16 || $c==20 || $c==24)
						{
						echo "<br/>";
						echo "<br/>";
						}
               }
			}
				
			
					
				if($_REQUEST["action"] == "edit")
				{
					$p=0;
					$qry = "select * from property_amenities_master";
					$sql = mysql_query($qry) or die(mysql_error());
					$c=mysql_num_rows($sql);
					
					$qry1="select a.property_amenities_name,a.property_amenities_id from property_propertydetail_master pd,property_propertydetail_amenities pa, property_amenities_master a where pd.property_propertydetail_id = pa.property_propertydetail_amenities_property_id and a.property_amenities_id=pa.property_propertydetail_amenities_name and pa.property_propertydetail_amenities_property_id=$pid";
					$sql1=mysql_query($qry1) or die(mysql_error());
					$c1=mysql_num_rows($sql1);
					
					$i=0;
					while($i<$c)
					{
						$row=mysql_fetch_array($sql);
						$nm=$row['property_amenities_name'];
						$id=$row['property_amenities_id'];
							$j=0;
							$u=0;
							$p=0;
							while($j<$c1)
							{
								
								$row1=mysql_fetch_array($sql1);
							 	$nm1=$row1['property_amenities_name'];
							 
								if($nm==$nm1)
								{
								?>
                                <input type="checkbox" name="ch[]" id="ch[]" checked="checked" value="<?php echo $id; ?>" />
                				                
                                <?php
								$p++;
								echo $nm;
								
								}
								else
								{
									$u++;
								}
								$j++;
							}
							
							if($u==$c1)
							{
							?>
                                <input type="checkbox" name="ch[]" id="ch[]" value="<?php echo $id; ?>" />
                                <?php
								echo $nm;
							}
							if($p==4 || $p==8 || $p==12 || $p==16 || $p==20 || $p==24)
							{
								echo "<br/>";
								echo "<br/>";
							}
							$qry1="select a.property_amenities_name from property_propertydetail_master pd,property_propertydetail_amenities pa, property_amenities_master a where pd.property_propertydetail_id = pa.property_propertydetail_amenities_property_id and a.property_amenities_id=pa.property_propertydetail_amenities_name and pa.property_propertydetail_amenities_property_id=$pid";
							$sql1=mysql_query($qry1) or die(mysql_error());	
							
							
						$i++;
						
					}
					
					
				}
				?>
                
            </td>
          </tr>
        
        
   		<tr>
     		<td height="10" colspan="3" align="right" class="normal_fonts9"></td>
        </tr>
     	<tr></tr>
   		<tr>
 			<td align="right" class="normal_fonts9">&nbsp;</td>
      		<td align="center" class="normal_fonts9">&nbsp;</td>
        	<td class="normal_fonts9">
            <?php
						if($_REQUEST["action"]=="add")
						{
						?>
            				<input name="add" type="submit" class="normal_fonts12_black" id="button4" style="width:80px; height:30px" value="Add" />
                            <a href="propertyDetail_list.php"><input name="back" type="button" class="normal_fonts12_black" id="button4" style="width:80px; height:30px" value="Back" /></a>
            			<?php
						}
						else if($_REQUEST["action"]=="edit")
						{
						?>
						<input name="Update" type="submit" class="normal_fonts12_black" id="Update" style="width:80px; height:30px" value="Update" />
                        <a href="propertyDetail_list.php"><input name="back" type="button" class="normal_fonts12_black" id="button4" style="width:80px; height:30px" value="Back" /></a>
						
						<?php
						}
						?>
         
            
            </td>
       </tr>
       	<tr>
       		<td height="10" colspan="3" align="right" class="normal_fonts9"></td>
   		</tr>
      </table>
     </td>
   </tr>
</table>
</form>
     </td></tr></table>
                  
                     <!-- main ends here  -->
            
         </td>
          </tr>
        </table></td>
      </tr>
    
    </table></td>
  </tr>
    <tr>
        <td align="center" valign="middle">
        <?php  include("footer.php"); ?>
        
        </td>
      </tr>
</table>

</body>
</html>                    