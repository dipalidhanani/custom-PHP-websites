<?php
session_start();
include("../include/config.php");


	                  /////////// Insert Rights  //////////
	
	
if($_REQUEST["process"]=="Addrights")
{
$dt=date("Y-m-d H:i:s");

$rights_mast_id=$_REQUEST["rights_mast_id"];
$query="insert into rights_detail(rights_mast_id,rights_desc,rights_type,rights_datetime) values('".$_REQUEST["rights_mast_id"]."','".$_REQUEST["rights_desc"]."','".$_REQUEST["rights_type"]."','".$dt."')";
$result=mysql_query($query)
or die(mysql_error());
header("location:rights.php?rights_id=".$rights_mast_id."");
}

                       ////////// Edit Rights /////////////


if($_REQUEST["process"]=="Editrights")
{

		
	$rights_id=$_POST["hdnrightsid"];
	$rights_mast_id=$_POST["rights_mast_id"];
$query="update rights_detail set rights_desc='".$_REQUEST["rights_desc"]."',rights_type='".$_REQUEST["rights_type"]."' where rights_detail_id='".$rights_id."'";

$result=mysql_query($query)
or die(mysql_error());

header("location:rights.php?rights_id=".$rights_mast_id."");

}

                       ///////////  Delete  Rights//////////
					   

if($_REQUEST["process"]=="deleterights")
{
	$rights_id=$_GET["rights_id"];
	$rights_mast_id=$_GET["rights_mast_id"];

$query="delete from rights_detail where rights_detail_id ='".$rights_id."'";

$result=mysql_query($query)
or die(mysql_error());
header("location:rights.php?rights_id=".$rights_mast_id."");


}



	                  /////////// Insert Duties  //////////
	
	
if($_REQUEST["process"]=="Addduties")
{
	$dt=date("Y-m-d H:i:s");


$query="insert into duties_mast(duties_title,duties_desc,duties_type,duties_datetime) values('".$_REQUEST["duties_title"]."','".$_REQUEST["duties_desc"]."','".$_REQUEST["duties_type"]."','".$dt."')";
$result=mysql_query($query)
or die(mysql_error());
header("location:duties.php");
}

                       ////////// Edit Duties /////////////


if($_REQUEST["process"]=="Editduties")
{
	
$duties_id=$_POST["hdndutiesid"];
$query="update duties_mast set duties_title='".$_REQUEST["duties_title"]."',duties_desc='".$_REQUEST["duties_desc"]."',duties_type='".$_REQUEST["duties_type"]."' where duties_id='".$duties_id."'";

$result=mysql_query($query)
or die(mysql_error());

header("location:duties.php");

}

                       ///////////  Delete  Duties//////////
					   

if($_REQUEST["process"]=="deleteduties")
{
	$duties_id=$_GET["duties_id"];

$query="delete from duties_mast where duties_id='".$duties_id."'";

$result=mysql_query($query)
or die(mysql_error());
header("location:duties.php");
}

?>