<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();  
	$is_edit=$_REQUEST['is_edit'];

if($is_edit==1)
{
	mysql_query("update brand_mst set Name='".$_POST['name']."',Is_Active='".$_POST['active']."',Disp_Order='".$_POST['order']."' where Brand_Id='".$_POST['txtid']."'") or die(mysql_error());
}
else
{
	mysql_query("insert into brand_mst(Name,Is_Active,Disp_Order)values('".$_POST['name']."','".$_POST['active']."','".$_POST['order']."')") or die(mysql_error());	
}
?>	
<script language="javascript">
window.location='brand.php';
</script>