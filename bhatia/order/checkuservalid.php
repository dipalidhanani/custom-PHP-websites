<?php 
session_start();
require("../admin/config.inc.php"); 
require("../admin/Database.class.php"); 
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
$db->connect(); 

?>
<?php
if($_REQUEST['user']!='')
{
	$user=mysql_query("SELECT User_Name FROM user_mst where User_Name='".$_REQUEST['user']."'");
	$rows=mysql_affected_rows();
	if($rows==0)
	{
		echo $user="Username available for use";
	}
	else
	{
		echo $user="Username already taken";
	}
}
?>


<input type="hidden" name="msg" id="msg_user" value="<?php echo $user; ?>" />