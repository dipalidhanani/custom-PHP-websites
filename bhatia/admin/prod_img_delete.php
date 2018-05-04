<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();  
	
	$del=mysql_query("select * from prod_img where Prod_Img_Id='".$_REQUEST['eid']."'");
	$d=mysql_fetch_array($del);
	$fileis=$d['Is_Image'];
	$path='../product/'.$fileis;
	$newpath='../product/ph'.$fileis;
	unlink($path);
	unlink($newpath);
	
	mysql_query("delete from prod_img where Prod_Img_Id='".$_REQUEST['eid']."'") or die(mysql_error());
	
?>	
<script language="javascript">
javascript:history.go(-1);
</script>