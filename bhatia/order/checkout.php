<?php 
	$time_set=86400;
	session_set_cookie_params ($time_set, '/', '.bhatiamobile.com',TRUE, FALSE);
	session_start();
	require_once("../admin/config.inc.php");
	require_once("../admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	if($_SESSION['buserid']=='')
	{
		$_SESSION['url']=HTTP_BASE_URL_ORDER.'checkout.php';
	?>
	<script language="javascript">
	window.location='<?php echo HTTP_BASE_URL_ORDER; ?>index.php?pageno=6';	
	</script>
	<?php exit; } else {  
	$dt=mysql_query("select * from prod_order_mst where User_Id='".$_SESSION['buserid']."' and Temp=1");	
	$ct=mysql_affected_rows();
	if($ct!=0)
	{
		$u=mysql_fetch_array($dt);
		mysql_query("delete from gift_mst where Prod_order_Id='".$u['Prod_order_Id']."'");
	}
	mysql_query("delete from prod_order_mst where User_Id='".$_SESSION['buserid']."' and Temp=1");	
	if($_SESSION['shopcart']!='')
	{
		srand((double)microtime()*1000000);
		$orderinvoice = rand(1000000000,9999999999);
		$_SESSION["bhatia_order_invoice"]=$orderinvoice;

		while(list($key,$proobj)=each($_SESSION['shopcart']))
		{
			 $selectedproductid=$proobj['item'];
			 $selectedquantity=$proobj['qty'];
			 $selectedcolors=$proobj['color'];
			 $price=$proobj['price'];
			 $selected_cod_amt=$proobj['cod_amt']*$selectedquantity;
									  $findu=mysql_query("select * from user_mst where User_Id='".$_SESSION['buserid']."' order by User_Id");
									  $fu=mysql_fetch_array($findu);
									  $st_id=$fu['State_Id'];
									  $chr=mysql_query("select * from shipping_mst where State_Id='".$st_id."'");
									  $ch=mysql_fetch_array($chr);
									  $charge=$ch['Charge']*$selectedquantity;
  									  $famt=$charge;
			if(($price!='0.00' || $price!='0') && ($selectedquantity!='' || $selectedquantity!='0'))
			{

			 mysql_query("insert into prod_order_mst(Prod_Id,Color,Qty,Price,User_Id,Temp,Shipping_Price,order_invoice_Id,cod_price) values('".$selectedproductid."','".$selectedcolors."','".$selectedquantity."','".$price."','".$_SESSION['buserid']."',1,'".$famt."','".$orderinvoice."','".$selected_cod_amt."')") or die(mysql_error());

			}

			 $oldid=mysql_insert_id();
			 $ofdata=mysql_query("select * from prod_mst where Prod_Id='".$selectedproductid."'");
			 $of=mysql_fetch_array($ofdata);
			 $offer=mysql_query("select * from offer where OfferId='".$of['Offer_Id']."'");
			 $rows=mysql_affected_rows();
			 if($rows==1)
			 {
				$d=mysql_fetch_array($offer);
				$ofname=$d['Offer'];
				$ofdesc=$d['Description'];
				$image=$d['Is_Image'];
			 	mysql_query("insert into gift_mst(Prod_order_Id,Offer,Description,Is_Image)values('".$oldid."','".$ofname."','".$ofdesc."','".$image."')") or die(mysql_error());

			 }

		}

	} 

		?>

	<script language="javascript">

	//javascript:history.go(-1);

	window.location='<?php echo HTTP_BASE_URL_ORDER; ?>index.php?pageno=7&pay=yes';

	</script>

	<?php } ?>