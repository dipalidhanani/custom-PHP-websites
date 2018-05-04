<?php
	$time_set=86400;
	session_set_cookie_params ($time_set , '/', '.bhatiamobile.com',TRUE,FALSE);
	session_start();
	require_once("../admin/config.inc.php");
	require_once("../admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	
	
if(!is_array($_SESSION['shopcart'])) 

$_SESSION['shopcart']=array();
$proobj['item']=$_REQUEST['itm'];
$proobj['qty']=$_REQUEST['qty'];
$proobj['color']=$_REQUEST['color'];
$tot_price=$_REQUEST['total_amt']*$_REQUEST['qty'];
$proobj['price']=$tot_price;
$proobj['cod_amt']=$_REQUEST['cod_amt'];

setcookie("PHPSESSID", session_id(), 0, "/", ".bhatiamobile.com");
$_SESSION['shopcart'][]=$proobj; 

		$y="";
		
		if($_SESSION['cartno']==$y)
		{
			$_SESSION['cartno']=$_REQUEST['qty'];
		}
		else
		{
			$count=$_SESSION['cartno']+$_REQUEST['qty'];
			$_SESSION['cartno']=$count;
		}


//print($_SESSION['shopcart']);
	
	?>
<script language="javascript">
window.location='<?php echo HTTP_BASE_URL_ORDER; ?>index.php?pageno=7';
</script>