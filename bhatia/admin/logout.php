<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect(); 
		
	mysql_query("update admintracking set Ip_Address='".$_SERVER['REMOTE_ADDR']."', Log_OutTime=NOW(), Status='0' where Admin_Id='".$_SESSION['bhatia_id']."' and Ip_Address='".$_SERVER['REMOTE_ADDR']."' ") or die(mysql_error());	
	
	mysql_query("update login_history set Ip_Address='".$_SERVER['REMOTE_ADDR']."', Log_OutTime=NOW(), Status='0' where Admin_Id='".$_SESSION['bhatia_id']."' and Ip_Address='".$_SERVER['REMOTE_ADDR']."' ") or die(mysql_error());	

	session_unset();
	
	session_destroy();			
	unset($_SESSION['user_name']);
	unset($_SESSION['admin_id']);
	
?>
<script language="javascript">
	location.href="index.php";
</script>