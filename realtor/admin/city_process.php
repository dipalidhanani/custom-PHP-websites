<?php
session_start();
require_once("../include/config.php");


	                  /////////// Insert cities  //////////
	
	
if($_REQUEST["process"]=="Addcity")
{
$dt=date("Y-m-d H:i:s");


$query="insert into rm_city_master(rm_city_title) values('".$_REQUEST["city_title"]."')";
$result=mysql_query($query)
or die(mysql_error());
header("location:city.php");
}

                       ////////// Edit cities /////////////


if($_REQUEST["process"]=="Editcity")
{

		
	$city_id=$_POST["hdncityid"];
$query="update rm_city_master rm_city_title='".$_REQUEST["city_title"]."' where rm_city_id='".$city_id."'";

$result=mysql_query($query)
or die(mysql_error());

header("location:city.php");

}

                       ///////////  Delete  cities//////////
					   

if($_REQUEST["process"]=="deletecity")
{
	$city_id=$_GET["city_id"];

$query="delete from rm_city_master where rm_city_id='".$city_id."'";

$result=mysql_query($query)
or die(mysql_error());
header("location:city.php");


}



?>