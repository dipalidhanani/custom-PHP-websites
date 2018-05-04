<?php  
session_start();
include("session_check.php");
require("config.inc.php"); 
require("Database.class.php"); 
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
$db->connect(); 

if($_POST['approve'])
{
	$checkbox=$_POST['checkbox'];
	for($i=0;$i<count($checkbox);$i++)
	{
	$id = $checkbox[$i];
	$set=1;
	$col=array("Is_Approve");
	$val=array($set);
	$db->update("review_mst","Review_Id",$id,$col,$val); 
	}
}
?>

<script language="javascript">
javascript:history.go(-1);
</script>