<?php
session_start();
include("include/config.php");

if($_SESSION['Admin_id'] == "")
	{
			//echo "Unauthorised Access !!!";die;
			echo "<script>location.href='login.php';</script>";
			exit();
	}

?>
<?php
$now = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];

if($_REQUEST["process"]=="delete")
{
	$query=mysql_query("delete from exchange_bonanza where exchange_bonanza_id ='".$_GET['exchange_bonanza_id']."'");
	
header("Location:exchange_bonanza.php");
exit();
	}
?>

