<?php 
	session_start();
	//setcookie("testcookie", "", time(), "/", ".indoushosting.com", 0, true);
	//setcookie("testcookie", "", time(), "/", "portal.indoushosting.com", 0, true);
	require_once("../admin/config.inc.php");
	require_once("../admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect(); 
	mysql_query("update clienttracking set Ip_Address='".$_SERVER['REMOTE_ADDR']."', Log_OutTime=NOW(), Status=0 where User_Id='".$_SESSION['buserid']."'") or die(mysql_error());
	session_unset();
	session_destroy();	
	$_SESSION['buserid']='';
?>
<script language="javascript">
window.location="<?php echo HTTP_BASE_URL; ?>index.php";
</script>
<?php exit; ?>