<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
	
	
if($_REQUEST["process"]=="Add")
{
	$offer=$_POST["txtOffer"];
	$amt=$_POST["txtAmount"];
	$type=$_POST["rdoType"];
	$status=$_POST["rdoStatus"];
$dt1=explode("-",$_POST["txtSdate"]);
	$dd1=$dt1[0];
	$mm1=$dt1[1];
	$yy1=$dt1[2];
	
	
$dt2=explode("-",$_POST["txtEdate"]);
	$dd2=$dt2[0];
	$mm2=$dt2[1];
	$yy2=$dt2[2];
$sdate=$yy1."-".$mm1."-".$dd1;
$edate=$yy2."-".$mm2."-".$dd2;

$query="insert into offer_mast(offer_name,offer_amt,offer_type,Start_date,End_date,offer_active_status) values('".$offer."','".$amt."','".$type."','".$sdate."','".$edate."','".$status."')";
$result=mysql_query($query)
or die(mysql_error());
header("location:offers.php");
}

                       ////////// Edit /////////////


if($_REQUEST["process"]=="Edit")
{
	$offerid=$_POST["hdnOfferid"];
$offer=$_POST["txtOffer"];
$amt=$_POST["txtAmount"];
$type=$_POST["rdoType"];
$status=$_POST["rdoStatus"];

$dt1=explode("-",$_POST["txtSdate"]);
	$dd1=$dt1[0];
	$mm1=$dt1[1];
	$yy1=$dt1[2];
	
	
$dt2=explode("-",$_POST["txtEdate"]);
	$dd2=$dt2[0];
	$mm2=$dt2[1];
	$yy2=$dt2[2];
$sdate=$yy1."-".$mm1."-".$dd1;
$edate=$yy2."-".$mm2."-".$dd2;

$query="update offer_mast set offer_name='".$offer."',offer_amt='".$amt."',offer_type='".$type."',Start_date='".$sdate."',End_date='".$edate."',offer_active_status='".$status."' where offer_id='".$offerid."'";

$result=mysql_query($query)
or die(mysql_error());
header("location:offers.php");
}

                       ///////////  Delete  //////////
					   

if($_REQUEST["process"]=="delete")
{
	$offerid=$_GET["Offer_id"];

$query="delete from offer_mast where offer_id='".$offerid."'";

$result=mysql_query($query)
or die(mysql_error());
header("location:offers.php");


}
?>