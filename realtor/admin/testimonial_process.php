<?php
session_start();
require_once("../include/config.php");


	                  /////////// Insert Testimonials  //////////
	
	
if($_REQUEST["process"]=="Addtestimonial")
{
$date=date("Y-m-d");
$time=date("h:i:s");
$name=$_REQUEST["user_name"];
$email=$_REQUEST["email"];
$title=$_REQUEST["title"];
$description=$_REQUEST["description"];
$ip=$_SERVER['REMOTE_ADDR'];

$query="insert into testimonials (testimonials_name,email,title,description,date,time,ip_address,approve_status) values('".$name."','".$email."','".$title."','".$description."','".$date."','".$time."','".$ip."',0)";

mysql_query($query);

header("location:testimonial.php");
}

                       ////////// Edit Testimonials /////////////


if($_REQUEST["process"]=="Edittestimonial")
{

$name=$_REQUEST["user_name"];
$email=$_REQUEST["email"];
$title=$_REQUEST["title"];
$description=$_REQUEST["description"];		
	$testimonial_id=$_POST["hdntestimonialid"];
	
$query="update testimonials set testimonials_name ='".$name."',email ='".$email."',title ='".$title."',description='".$description."',approve_status='".$_REQUEST["approve_status"]."' where testimonials_id='".$testimonial_id."'";

$result=mysql_query($query)
or die(mysql_error());

header("location:testimonial.php");

}

                       ///////////  Delete  Testimonials//////////
					   

if($_REQUEST["process"]=="deletetestimonial")
{
	$testimonial_id=$_GET["testimonial_id"];

$query="delete from testimonials where testimonials_id='".$testimonial_id."'";

$result=mysql_query($query)
or die(mysql_error());
header("location:testimonial.php");


}



?>