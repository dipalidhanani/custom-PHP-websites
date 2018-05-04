<?php session_start();

	include("../include/config.php"); 

	

	$del=mysql_query("select * from slider_mst where slider_Id='".$_REQUEST['eid']."'");

	$d=mysql_fetch_array($del);

	$fileis=$d['is_Image'];

	$path='../slider_images/'.$fileis;

	unlink($path);

	

	mysql_query("delete from slider_mst where slider_Id='".$_REQUEST['eid']."'") or die(mysql_error());

	

?>	

<script language="javascript">

javascript:history.go(-1);

</script>