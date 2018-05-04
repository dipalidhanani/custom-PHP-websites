<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>
<?php
$now = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];
	

if($_REQUEST["process"]=="edit")
{
	$query="update page_master set page_content='".$_REQUEST["page_content"]."',page_content_active_status ='".$_REQUEST["displaystatus"]."' where page_ID='".$_REQUEST["pageid"]."'";
	mysql_query($query);	
}

header("Location:pages.php");
exit();	
?>

