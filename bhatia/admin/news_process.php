<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();  
	$is_edit=$_REQUEST['is_edit'];

	$newsdate=date('Y-m-d H:i:s');
if($is_edit==1)
{
	mysql_query("update news_master set news_title='".$_POST['title']."',news_datetime='".$newsdate."',news_description='".$_POST['news_desc']."',Is_Active='".$_POST['isactive']."' where news_id='".$_POST['txtid']."'") or die(mysql_error());
}
else
{
	mysql_query("insert into news_master values('".NULL."','".$_POST['title']."','".$newsdate."','".$_POST['news_desc']."','".$_POST['isactive']."')") or die(mysql_error());	
}
?>	
<script language="javascript">
window.location='news.php';
</script>