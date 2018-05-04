<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");


	                  /////////// Insert Testimonials  //////////
	
	
if($_REQUEST["process"]=="Addtestimonial")
{
$dt=date("Y-m-d H:i:s");


$query="insert into testimonial_mast(testimonial_title,testimonial_desc,testimonial_datetime) values('".$_REQUEST["testimonial_title"]."','".$_REQUEST["testimonial_desc"]."','".$dt."')";
$result=mysql_query($query)
or die(mysql_error());
header("location:testimonial.php");
}

                       ////////// Edit Testimonials /////////////


if($_REQUEST["process"]=="Edittestimonial")
{

		
	$testimonial_id=$_POST["hdntestimonialid"];
$query="update testimonial_mast set testimonial_title='".$_REQUEST["testimonial_title"]."',testimonial_desc='".$_REQUEST["testimonial_desc"]."' where testimonial_id='".$testimonial_id."'";

$result=mysql_query($query)
or die(mysql_error());

header("location:testimonial.php");

}

                       ///////////  Delete  Testimonials//////////
					   

if($_REQUEST["process"]=="deletetestimonial")
{
	$testimonial_id=$_GET["testimonial_id"];

$query="delete from testimonial_mast where testimonial_id='".$testimonial_id."'";

$result=mysql_query($query)
or die(mysql_error());
header("location:testimonial.php");


}



?>