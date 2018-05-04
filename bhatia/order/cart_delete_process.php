<?php
session_start();
require_once("../admin/config.inc.php");
require_once("../admin/Database.class.php");
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
$db->connect();
if($_POST['delete'])
{
	if($_POST['checkbox']!='')
	{
		$checkbox=$_POST['checkbox'];
		$hi=$_POST['hi'];
		foreach ($checkbox as $val)
		{
			unset($_SESSION['shopcart'][$val]);
			$_SESSION['cartno']=$_SESSION['cartno']-$hi[0];
			if(count($_SESSION['cartno'])<0)
			{
				$_SESSION['cartno']='0';
			}
				
		}
	}

}
else
{
	$_SESSION['shopcart']='';
	$_SESSION['cartno']='';
}
?>

<script language="javascript">
window.location='<?php echo HTTP_BASE_URL_ORDER; ?>index.php?pageno=7';
</script>