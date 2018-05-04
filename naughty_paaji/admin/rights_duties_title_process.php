<?php
session_start();
include("../include/config.php");


	                  /////////// Insert Rights  //////////
	
	
if($_REQUEST["process"]=="Addrightstitle")
{
$dt=date("Y-m-d H:i:s");


$query="insert into rights_mast(rights_title,rights_active_status) values('".$_REQUEST["rights_title"]."','".$_REQUEST["rights_active_status"]."')";
$result=mysql_query($query)
or die(mysql_error());
header("location:rights_title.php");
}

                       ////////// Edit Rights /////////////


if($_REQUEST["process"]=="Editrights")
{

		
	$rights_id=$_POST["hdnrightsid"];
$query="update rights_mast set rights_title='".$_REQUEST["rights_title"]."',rights_active_status='".$_REQUEST["rights_active_status"]."' where rights_id='".$rights_id."'";

$result=mysql_query($query)
or die(mysql_error());

header("location:rights_title.php");

}

                       ///////////  Delete  Rights//////////
					   

if($_REQUEST["process"]=="deleterights")
{
	$rights_id=$_GET["rights_id"];

$query="delete from rights_mast where rights_id='".$rights_id."'";

$result=mysql_query($query)
or die(mysql_error());
header("location:rights_title.php");


}

             

?>