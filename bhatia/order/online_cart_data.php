<?php session_start();
	require_once("admin/config.inc.php");
	require_once("admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	

					if($_SESSION['shopcart']!='')
								{
									while(list($key,$proobj)=each($_SESSION['shopcart']))
									{
									 $selectedproductid=$proobj['item'];
									 $selectedquantity=$proobj['qty'];
									 $selectedcolors=$proobj['color'];
									 $price=$proobj['price'];
									 
									 mysql_query("insert into prod_order_mst(Prod_Id,Color,Qty,Price) values('".$selectedproductid."','".$selectedcolors."','".$selectedquantity."','".$price."')") or die(mysql_error());
									}
								}

	?>
<script language="javascript">
window.location='<?php echo PAYPAL_SENDBOX_PATH; ?>';
</script>