<?php
session_start();
include("../include/config.php");


	                  /////////// Insert Testimonials  //////////
	
	
if($_REQUEST["process"]=="Addpress")
{
$dt=date("Y-m-d H:i:s");


$query="insert into press_mast(press_title,press_link,press_date) values('".$_REQUEST["press_title"]."','".$_REQUEST["press_link"]."','".$dt."')";
$result=mysql_query($query)
or die(mysql_error());
header("location:press.php");
}

////////// Edit Testimonials /////////////


if($_REQUEST["process"]=="Editpress")
{

		
$press_id=$_POST["hdnpressid"];

$query="update press_mast set press_title='".$_REQUEST["press_title"]."',press_link='".$_REQUEST["press_link"]."' where press_id='".$press_id."'";

$result=mysql_query($query)
or die(mysql_error());

header("location:press.php");

}

                       ///////////  Delete  Testimonials//////////
					   

if($_REQUEST["process"]=="deletepress")
{
	$press_id=$_GET["press_id"];

$query="delete from press_mast where press_id='".$press_id."'";

$result=mysql_query($query)
or die(mysql_error());
header("location:press.php");


}



?>