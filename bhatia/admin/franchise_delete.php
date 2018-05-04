<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();  
	$query=mysql_query("select * from franchise_mst where Franchise_Id='".$_REQUEST['eid']."'");
	$q=mysql_fetch_array($query);
	$file_to_delete=$q['Is_Image'];
	$path='../franchisee/'.$file_to_delete;
	unlink($path);
	mysql_query("delete from franchise_mst where Franchise_Id='".$_REQUEST['eid']."'") or die(mysql_error());
?>	
<script language="javascript">
javascript:history.go(-1);
</script>