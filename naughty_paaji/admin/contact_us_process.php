<?php
session_start();
include("../include/config.php");

        
                       ///////////  Delete  Inquiry  //////////
					   

if($_REQUEST["process"]=="deletecontact")
{

$contactus_id=$_GET["contactus_id"];
$query="delete from contactus where contactus_id='".$contactus_id."'";

$result=mysql_query($query)
or die(mysql_error());
header("location:contact_us.php");

}



?>