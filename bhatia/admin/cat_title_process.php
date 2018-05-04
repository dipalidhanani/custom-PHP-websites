<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();  
	$is_edit=$_REQUEST['is_edit'];

if($is_edit==1)
{
	 $query="select * from prod_title order by Disp_Order";
	 $result=mysql_query($query);
	 $i=1;
	 while($k=mysql_fetch_array($result))
	 {
		mysql_query("update prod_title set Prod_Desc_Cat_Id='".$_POST['cat_'.$i]."',Title='".$_POST['title_'.$i]."',Description='".$_POST['desc_'.$i]."',Disp_Order='".$_POST['dispo_'.$i]."' where Title_Id='".$k['Title_Id']."'") or die(mysql_error());
		$i++;
	 }
}
else
{
	mysql_query("insert into prod_title values('".NULL."','".$_POST['cat']."','".$_POST['title']."','".$_POST['desc']."','".$_POST['disp_order']."')") or die(mysql_error());	
}
?>	
<script language="javascript">
javascript:history.go(-2);
</script>