<?php
session_start();
require_once("../include/config.php");

if($_REQUEST["process"]=="editpricing")
{	
	$query="update pricing_mast set pricing_table ='".$_REQUEST["pricing_table"]."' where pricing_id =1";
	mysql_query($query);
	
	header("Location:pricing_table.php");
	exit();
}
?>

