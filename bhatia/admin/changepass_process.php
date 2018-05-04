<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();  

	 $pass1=base64_encode($_POST['pass1']);
	 $pass2=base64_encode($_POST['pass2']);
	 $pass3=base64_encode($_POST['pass3']);
	$check=mysql_query("select * from admin_mst where Is_Active and Password='".$pass1."' and Admin_Id='".$_SESSION['bhatia_id']."'");
	$rows=mysql_affected_rows();
	if($rows==1)
	{
		mysql_query("update admin_mst set Password='".$pass2."' where Admin_Id='".$_SESSION['bhatia_id']."'") or die(mysql_error()); 
	?>
    <script language="javascript">
	window.location='change_password.php?msg=yes';
	</script>																															
	<?php exit; }
	else
	{ ?>
	<script language="javascript">
	window.location='change_password.php?msg=no';
	</script>																															
	<?php exit; }
	
?>	
