<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();  
	$is_edit=$_REQUEST['is_edit'];

if($is_edit==1)
{
	mysql_query("update bhatia_video set Bhatia_Video_Title='".$_POST['video_name']."',Bhatia_Video_Source_Code='".$_POST['video_source_code']."',Bhatia_Video_Disp_Status='".$_POST['isdisp']."',Bhatia_Video_Disp_Order='".$_POST['disp_order']."',Display_On_Home='".$_POST['disp_home']."' where Bhatia_Video_Id='".$_POST['txtid']."'") or die(mysql_error());
}
else
{
	mysql_query("insert into bhatia_video(Bhatia_Video_Title,Bhatia_Video_Source_Code,Bhatia_Video_Disp_Status,Bhatia_Video_Disp_Order,Display_On_Home)values('".$_POST['video_name']."','".$_POST['video_source_code']."','".$_POST['isdisp']."','".$_POST['disp_order']."','".$_POST['disp_home']."')") or die(mysql_error());	
}
?>	
<script language="javascript">
window.location='add_video.php';
</script>