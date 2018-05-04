<?php
session_start();
include("../include/config.php");

        
                       ///////////  Delete  Inquiry  //////////
					   

if($_REQUEST["process"]=="deleteinquiry")
{
	$inquiry_id=$_GET["inquiry_id"];

$query="delete from inquiry where inquiry_id='".$inquiry_id."'";

$result=mysql_query($query)
or die(mysql_error());
header("location:inquiry.php");


}



?>