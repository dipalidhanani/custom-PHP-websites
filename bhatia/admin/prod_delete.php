<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();  
	$prod_img=mysql_query("SELECT * FROM prod_img WHERE Prod_Id='".$_REQUEST['eid']."'");
	$pi=mysql_fetch_array($prod_img);
	$img_name=$pi['Is_Image'];
	$img_new_name="photo_".$img_name;
	$img_new_name1="phphoto_".$img_name;
	//unlink($img_new_name);
	//unlink($img_new_name1);
	mysql_query("delete from prod_img where Prod_Id='".$_REQUEST['eid']."'") or die(mysql_error());
	mysql_query("delete from prod_desc where Prod_Id='".$_REQUEST['eid']."'") or die(mysql_error());
	mysql_query("delete from prod_mst where Prod_Id='".$_REQUEST['eid']."'") or die(mysql_error());
	
	
?>	
<script language="javascript">
window.location='<?php echo $_SERVER['HTTP_REFERER']; ?>';
</script>