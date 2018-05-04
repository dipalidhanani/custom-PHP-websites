<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();  
	$is_edit=$_REQUEST['is_edit'];

if($is_edit==1)
{
	mysql_query("update shipping_mst set State_Id='".$_POST['ship']."',Charge='".$_POST['chrg']."',Is_Active='".$_POST['active']."' where Shipping_Id='".$_POST['txtid']."'") or die(mysql_error());
}
else
{
	mysql_query("insert into shipping_mst(State_Id,Charge)values('".$_POST['ship']."','".$_POST['chrg']."')") or die(mysql_error());	
}
?>	
<script language="javascript">
window.location='shipping.php';
</script>