<?php session_start();
include("config.php");
 include("functions_mysql.php");
 include("functions.php");
 
 if(isset($_SESSION["user_id"])){
$select_target_level = mysql_query("select * from set_target_level where set_target_user_master_id = '".$_SESSION["user_id"]."'");	 
$total_target_level = mysql_num_rows($select_target_level);	 

if($total_target_level == 0){
$ins_target_level = mysql_query("insert into set_target_level(set_target_user_master_id,set_target_weekly,set_target_monthly,set_target_quarterly,set_target_yearly) values('".$_SESSION["user_id"]."','".$_REQUEST['set_target_weekly']."','".$_REQUEST['set_target_monthly']."','".$_REQUEST['set_target_quarterly']."','".$_REQUEST['set_target_yearly']."')"); 
}
else{
	$update_target_level = mysql_query("update set_target_level set 
	set_target_weekly = '".$_REQUEST['set_target_weekly']."',
	set_target_monthly = '".$_REQUEST['set_target_monthly']."',
	set_target_quarterly = '".$_REQUEST['set_target_quarterly']."',
	set_target_yearly = '".$_REQUEST['set_target_yearly']."'
	where set_target_user_master_id = '".$_SESSION["user_id"]."'"); 
}
	

	$_SESSION["successmessage"]='Set target level has been set.';
	 	header('location: index.php?page=set_target_level');
		exit;
}		 
 ?>