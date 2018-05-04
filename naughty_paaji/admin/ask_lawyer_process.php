<?php
session_start();
include("../include/config.php");

        
                       ///////////  Delete  Inquiry  //////////
					   

if($_REQUEST["process"]=="deletequestion")
{
	$ask_your_lawyer_id=$_GET["ask_your_lawyer_id"];

$query="delete from ask_your_lawyer where ask_your_lawyer_id='".$ask_your_lawyer_id."'";

$result=mysql_query($query)
or die(mysql_error());
header("location:ask_lawyer.php");


}



?>