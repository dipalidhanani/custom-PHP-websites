<?php
session_start();
require_once("include/config.php");

	                  /////////// Insert  //////////
	
	
if($_REQUEST["process"]=="Add")
{
	
$model=$_POST["txtmodel"];
$query="insert into model_mast(Model) values('".$model."')";
$result=mysql_query($query)
or die(mysql_error());
header("location:model.php");
}

                       ////////// Edit /////////////


if($_REQUEST["process"]=="Edit")
{
	
		
	$modelid=$_POST["hdnModelid"];
	$model=$_POST["txtmodel"];

	$query="update model_mast set Model='".$model."' where Model_id='".$modelid."'";
	$result=mysql_query($query)
	or die(mysql_error());


header("location:model.php");


}

                       ///////////  Delete  //////////
					   

if($_REQUEST["process"]=="delete")
{
$modelid=$_GET["model_id"];

$query="delete from model_mast where Model_id='".$modelid."'";

$result=mysql_query($query)
or die(mysql_error());
header("location:model.php");


}
?>