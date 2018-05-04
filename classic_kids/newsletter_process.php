<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");

$now = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];

$recordset = mysql_query("select * from newsletter_subscriber where newsletter_subscriber_email='".$_REQUEST["newsletter"]."'",$cn);

if(mysql_num_rows($recordset)==0)
{	
	$query="insert into newsletter_subscriber 
	(
	 newsletter_subscriber_email,
	 newsletter_subscriber_datetime,
	 newsletter_subscriber_ip,
	 newsletter_subscriber_status
	)
	values
	(
	 '".$_REQUEST["newsletter"]."',
	 '".$now."',
	 '".$ip."',
	 1
	 )
	 ";
	 mysql_query($query);
	 header("Location:index.php?content=5&msg=newsletter");
	 exit();
}
else
{
 header("Location:index.php?content=5&msg=already_subscribe");
  exit();
}
?>