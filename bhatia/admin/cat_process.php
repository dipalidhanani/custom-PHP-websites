<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();  
	$is_edit=$_REQUEST['is_edit'];

if($is_edit==1)
{
	 $query="select * from prod_desc_cat order by Disp_Order";
	 $result=mysql_query($query);
	 $i=1;
	 while($k=mysql_fetch_array($result))
	 {
		mysql_query("update prod_desc_cat set Category='".$_POST['cat_'.$i]."',Disp_Order='".$_POST['order_'.$i]."',Description='".$_POST['desc_'.$i]."' where Prod_Desc_Cat_Id='".$k['Prod_Desc_Cat_Id']."'") or die(mysql_error());
		$i++;
	 }
}
else
{
	mysql_query("insert into prod_desc_cat values('".NULL."','".$_POST['cat']."','".$_POST['order']."','".$_POST['desc']."')") or die(mysql_error());	
}
?>	
<script language="javascript">
javascript:history.go(-2);
</script>