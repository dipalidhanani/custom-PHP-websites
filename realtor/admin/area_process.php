<?php
session_start();
require_once("../include/config.php");


	                  /////////// Insert areas  //////////
	
	
if($_REQUEST["process"]=="Addarea")
{
$dt=date("Y-m-d H:i:s");


$query="insert into rm_area_master(rm_area_code,rm_area_title,rm_city_mast_id) values('".$_REQUEST["area_code"]."','".$_REQUEST["area_title"]."','".$_REQUEST["ddlcity"]."')";
$result=mysql_query($query)
or die(mysql_error());
header("location:area.php");
}

                       ////////// Edit areas /////////////


if($_REQUEST["process"]=="Editarea")
{

		
	$area_id=$_POST["hdnareaid"];
$query="update rm_area_master set rm_area_code='".$_REQUEST["area_code"]."',rm_area_title='".$_REQUEST["area_title"]."',rm_city_mast_id='".$_REQUEST["ddlcity"]."'  where rm_area_id='".$area_id."'";

$result=mysql_query($query)
or die(mysql_error());

header("location:area.php");

}

                       ///////////  Delete  areas//////////
					   

if($_REQUEST["process"]=="deletearea")
{
	$area_id=$_GET["area_id"];

$query="delete from rm_area_master where rm_area_id='".$area_id."'";

$result=mysql_query($query)
or die(mysql_error());
header("location:area.php");


}



?>