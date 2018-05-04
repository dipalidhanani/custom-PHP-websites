<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();  
	
	$prod_is=$_POST['deal_prod'];
	
	mysql_query("UPDATE prod_mst SET Is_prod_deal_of_day=0") or die(mysql_error());
	mysql_query("UPDATE prod_mst SET Is_prod_deal_of_day=1 WHERE Prod_Id='".$prod_is."'") or die(mysql_error());
?>	
<script language="javascript">
window.location='prod.php?deal=1&pd=<?php echo $prod_is; ?>';
</script>