<?php
session_start();
include("../include/config.php");

        
                       ///////////  Delete  Inquiry  //////////
					   

if($_REQUEST["process"]=="deleteexp")
{
	$share_experience_id=$_GET["share_experience_id"];

$query="delete from share_experience where share_experience_id='".$share_experience_id."'";

$result=mysql_query($query)
or die(mysql_error());
header("location:share_experience.php");


}



?>