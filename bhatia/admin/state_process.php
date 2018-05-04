<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();  
	$is_edit=$_REQUEST['is_edit'];

if($is_edit==1)
{
	mysql_query("update state set Country_Id='".$_POST['country']."',Name='".$_POST['name']."' where State_Id='".$_POST['txtid']."'") or die(mysql_error());
}
else
{
	mysql_query("insert into state values('".NULL."','".$_POST['country']."','".$_POST['name']."')") or die(mysql_error());	
}
?>	
<script language="javascript">
window.location='state.php';
</script>