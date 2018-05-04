<?php session_start();
	  include("include/config.php");
	  require_once("include/function.php");
	  u_Connect("cn");

$type=$_GET["type"];
$productid=$_GET["productid"];
$userid=$_GET["userid"];
$rating_value=$_POST["rating_value"];
$review=$_POST["review"];

$query=mysql_query("insert into product_rate(product_mast_id,rate_value,rate_comment,product_rate_from_id) values('".$productid."','".$rating_value."','".$review."','".$userid."')"); 
header("location:index.php?content=2&type=".$type."&productid=".$productid."&ratemsg=1");
exit;
?>