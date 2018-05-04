<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();  
	mysql_query("delete from brand_mst where Brand_Id='".$_REQUEST['eid']."'") or die(mysql_error());
?>	
<script language="javascript">
javascript:history.go(-1);
</script>