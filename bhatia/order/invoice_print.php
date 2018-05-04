<?php session_start();

	require_once("../admin/config.inc.php");

	require_once("../admin/Database.class.php");

	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 

	$db->connect(); 

	

	$order_new=mysql_query("SELECT * FROM prod_order_mst WHERE order_invoice_Id='".$_SESSION["hdfc_payment_transactionid"]."'");

	$ord=mysql_fetch_array($order_new);

	$invoice_id=$_REQUEST['eid'];

	if($_REQUEST['eid']=='')

	{

		$inv=$ord['Order_Id'];

	}

	else

	{

		$inv=$invoice_id;

	}

		

	

	$invoive_detail=mysql_query("select * from bill_mst where Order_Id='".$inv."'");

	$inv=mysql_fetch_array($invoive_detail);

		

	$user=mysql_query("select * from user_mst where User_Id='".$inv['User_Id']."'");

	$u=mysql_fetch_array($user);

	

	$order_data=mysql_query("select * from order_mst where Order_Id='".$inv['Order_Id']."'");

	$o=mysql_fetch_array($order_data);

	

	

?>

<script language="javascript">

function print_me()

{

	window.print();

}

window.onload=print_me();

</script>



<link href="css/css.css" rel="stylesheet" type="text/css">

<link href="css/home.css" rel="stylesheet" type="text/css" />

<link href="css/css1.css" rel="stylesheet" type="text/css" />

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="border2" >

  <tr>

    <td valign="middle" class="title" ><table width="100%" border="0" cellpadding="2" cellspacing="0" class="border_bottom">

      <tr>

        <td align="left" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="3">

          <tr>

            <td align="left" valign="middle" class="heading_msg_10"><strong>Bhatia Comm. &amp; Retail(I) Pvt. Ltd</strong></td>

          </tr>

          <tr>

            <td align="left" valign="middle"><span class="title_10">Shop No. 1-2, DR Ambedkar Shopping Centre,</span></td>

          </tr>

          <tr>

            <td align="left" valign="middle"><span class="title_10">Opp Kinnari Cinema,&nbsp;Ring Road,&nbsp;Surat - 395002 </span></td>

          </tr>

          <tr>

            <td align="left" valign="middle"><span class="title_10">+(91)-9825811111, 9377411111, 9825811002 ,   +(91)-(261)-2349894 </span></td>

          </tr>

        </table></td>

        <td align="center" valign="middle"><img src="images/bhatia_logo.jpg" width="200" height="62" border="0" /></td>

      </tr>

    </table></td>

  </tr>

  <tr>

    <td align="left" valign="middle"><table width="100%" border="0" cellpadding="3" cellspacing="0" class="border_bottom">

      <tr>

        <td width="50%" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">

          <tr>

            <td colspan="3" align="left" valign="middle" class="heading_msg_10"><strong>Billing Address </strong></td>

            </tr>

          <tr>

            <td width="120" align="left" valign="middle" class="title_9">Name </td>

            <td width="10" align="left" valign="middle" class="title_9">:</td>

            <td align="left" valign="middle" class="title_9"><span class="title_10"><?php echo $u['First_Name']." ".$u['Middle_Name']." ".$u['Last_Name']; ?></span></td>

          </tr>

          <tr>

            <td align="left" valign="middle" class="title_9"><span class="title_10">Present Address</span></td>

            <td align="left" valign="middle" class="title_9">:</td>

            <td align="left" valign="middle" class="title_9"><span class="title_10"><?php echo $u['Address1']; ?></span></td>

          </tr>

          <tr>

            <td align="left" valign="middle" class="title_9"><span class="title_10">Permanent Address</span></td>

            <td align="left" valign="middle" class="title_9">:</td>

            <td align="left" valign="middle" class="title_9"><span class="title_10"><?php echo $u['Address2']; ?></span></td>

          </tr>

          <tr>

            <td align="left" valign="middle" class="title_9"><span class="title_10">Country </span></td>

            <td align="left" valign="middle" class="title_9">:</td>

            <td align="left" valign="middle" class="title_9"><span class="title_10">

              <?php $country_data=mysql_query("SELECT * FROM country WHERE Country_Id='".$u['Country_Id']."'");

			$con=mysql_fetch_array($country_data);

			echo $con['Name'];

			?>

            </span></td>

          </tr>

          <tr>

            <td align="left" valign="middle" class="title_9"><span class="title_10">State/City</span></td>

            <td align="left" valign="middle" class="title_9">:</td>

            <td align="left" valign="middle" class="title_9"><?php $state_data=mysql_query("SELECT * FROM state WHERE State_Id='".$u['State_Id']."'");

			$st=mysql_fetch_array($state_data);

			echo $st['Name'];

			?>

      [<?php $new_city=mysql_query("select * from city_mst where city_id='".$u['City']."'");	
		$disp_city=mysql_fetch_array($new_city);
		echo $disp_city['city_name'];
		?>]</td>

          </tr>

          <tr>

            <td align="left" valign="middle" class="title_9"><span class="title_10">Zipcode</span></td>

            <td align="left" valign="middle" class="title_9">:</td>

            <td align="left" valign="middle" class="title_9"><span class="title_10"><?php echo $u['Pincode']; ?></span></td>

          </tr>

          <tr>

            <td align="left" valign="middle" class="title_9"><span class="title_10">E-Mail Address</span></td>

            <td align="left" valign="middle" class="title_9">:</td>

            <td align="left" valign="middle" class="title_9"><span class="title_10"><?php echo $u['Email_Address']; ?></span></td>

          </tr>

          <tr>

            <td align="left" valign="middle" class="title_9">Contact No.</td>

            <td align="left" valign="middle" class="title_9">:</td>

            <td align="left" valign="middle" class="title_9"><span class="title_10"><?php echo $u['Phone']; ?></span></td>

          </tr>

          <tr>

            <td align="left" valign="middle" class="title_9"><span class="title_10">Mobile No.</span></td>

            <td align="left" valign="middle" class="title_9">:</td>

            <td align="left" valign="middle" class="title_9"><span class="title_10"><?php echo $u['Mobile']; ?></span></td>

          </tr>

        </table></td>

        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">

          <tr>

            <td colspan="3" align="left" valign="middle" class="heading_msg_10"><strong>Shipping Address </strong></td>

          </tr>

          <tr>

            <td width="120" align="left" valign="middle" class="title_9">Name </td>

            <td width="10" align="left" valign="middle" class="title_9">:</td>

            <td align="left" valign="middle" class="title_9"><span class="title_10"><?php echo $inv['Billing_Username']; ?></span></td>

          </tr>

          <tr>

            <td align="left" valign="middle" class="title_9"><span class="title_10">Present Address</span></td>

            <td align="left" valign="middle" class="title_9">:</td>

            <td align="left" valign="middle" class="title_9"><span class="title_10"><?php echo $inv['Billing_Address']; ?></span></td>

          </tr>

          <tr>

            <td align="left" valign="middle" class="title_9"><span class="title_10">Permanent Address</span></td>

            <td align="left" valign="middle" class="title_9">:</td>

            <td align="left" valign="middle" class="title_9"><span class="title_10"><?php echo $inv['Billing_Address']; ?></span></td>

          </tr>

          <tr>

            <td align="left" valign="middle" class="title_9"><span class="title_10">Country </span></td>

            <td align="left" valign="middle" class="title_9">:</td>

            <td align="left" valign="middle" class="title_9"><span class="title_10">

              <?php $country_data=mysql_query("SELECT * FROM country WHERE Country_Id='".$inv['Billing_Country']."'");

			$con=mysql_fetch_array($country_data);

			echo $con['Name'];

			?>

            </span></td>

          </tr>

          <tr>

            <td align="left" valign="middle" class="title_9"><span class="title_10">State/City</span></td>

            <td align="left" valign="middle" class="title_9">:</td>

            <td align="left" valign="middle" class="title_9"><?php $state_data=mysql_query("SELECT * FROM state WHERE State_Id='".$inv['Billing_State']."'");

			$st=mysql_fetch_array($state_data);

			echo $st['Name'];

			?>

              [<?php $new_city=mysql_query("select * from city_mst where city_id='".$inv['Billing_City']."'");	
		$disp_city=mysql_fetch_array($new_city);
		echo $disp_city['city_name'];
		?>]</td>

          </tr>

          <tr>

            <td align="left" valign="middle" class="title_9"><span class="title_10">Zipcode</span></td>

            <td align="left" valign="middle" class="title_9">:</td>

            <td align="left" valign="middle" class="title_9"><span class="title_10"><?php echo $inv['Billing_Pincode']; ?></span></td>

          </tr>

          <tr>

            <td align="left" valign="middle" class="title_9"><span class="title_10">E-Mail Address</span></td>

            <td align="left" valign="middle" class="title_9">:</td>

            <td align="left" valign="middle" class="title_9"><span class="title_10"><?php echo $inv['Billing_User_email']; ?></span></td>

          </tr>

          <tr>

            <td align="left" valign="middle" class="title_9">Contact No.</td>

            <td align="left" valign="middle" class="title_9">:</td>

            <td align="left" valign="middle" class="title_9"><span class="title_10"><?php echo $inv['Billing_Contact']; ?></span></td>

          </tr>

          <tr>

            <td align="left" valign="middle" class="title_9"><span class="title_10">Mobile No.</span></td>

            <td align="left" valign="middle" class="title_9">:</td>

            <td align="left" valign="middle" class="title_9"><span class="title_10"><?php echo $inv['Billing_mobile']; ?></span></td>

          </tr>

        </table></td>

      </tr>

    </table></td>

  </tr>

  <tr>

    <td align="left" valign="middle"><table width="100%" border="0" cellpadding="2" cellspacing="0" class="border_bottom">

      <tr>

        <td width="50%" align="left" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="3">

          <tr>

            <td colspan="3" align="left" class="title_11"><strong class="heading_msg_10">Order Details</strong></td>

            </tr>

          <tr>

            <td width="120" align="left" class="title_9">Order No.</td>

            <td width="10" align="left" class="title_9">:</td>

            <td align="left"><span class="title_10"><?php echo $o['Order_No']; ?></span></td>

          </tr>

          <tr>

            <td align="left" class="title_9">Order Date</td>

            <td align="left" class="title_9">:</td>

            <td align="left"><span class="title_10"><?php echo date('d/m/Y',strtotime($o['Order_Date'])); ?></span></td>

          </tr>

          <tr>

            <td align="left" class="title_9">Order Status</td>

            <td align="left" class="title_9">:</td>

            <td align="left"><span class="title_10"><?php echo $o['Order_Status']; ?></span></td>

          </tr>

          <tr>

            <td align="left" class="title_9">Transaction ID</td>

            <td align="left" class="title_9">:</td>

            <td align="left"><span class="title_10"><?php

			$invoice_id_data=mysql_query("select * from prod_order_mst where Order_Id='".$inv['Order_Id']."'");

			$ii=mysql_fetch_array($invoice_id_data);

			echo $ii['order_invoice_Id']; ?></span></td>

          </tr>

        </table></td>

        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="3">

          <tr>

            <td colspan="3" align="left" class="heading_msg_10"><strong>Payment Details</strong></td>

            </tr>

          <tr>

            <td width="100" align="left" class="title_9"><span class="title_9">Amount</span></td>

            <td width="10" align="left" class="title_9"><span class="title_9">:</span></td>

            <td align="left" class="title_9"><span class="title_10"><?php echo $o['Amount']; ?> INR</span></td>

          </tr>

          <tr>

            <td align="left" class="title_9"><span class="title_9">Payment Mode</span></td>

            <td align="left" class="title_9"><span class="title_9">:</span></td>

            <td align="left" class="title_9"><span class="normal_fonts10"><?php echo $o['Pay_Mode']; ?></span></td>

          </tr>

          <tr>

            <td align="left" class="title_9"><span class="title_9">Payment Status</span></td>

            <td align="left" class="title_9"><span class="title_9">:</span></td>

            <td align="left" class="title_9"><span class="normal_fonts10"><?php echo $o['Payment_Status']; ?></span></td>

          </tr>

        </table></td>

      </tr>

    </table></td>

  </tr>

  <tr>

    <td align="left" valign="middle"><table width="100%" border="0" cellpadding="3" cellspacing="0" >

      <tr >

        <td height="30" colspan="5" align="left" valign="middle" bgcolor="#FFFFFF" class="heading_msg_10" ><strong>Product Details</strong></td>

        </tr>

      <tr class="title_w_10" >

        <td height="25" align="left" valign="middle" bgcolor="#333333">Product Name</td>

        <td align="left" valign="middle" bgcolor="#333333">Quantity</td>

        <td align="left" valign="middle" bgcolor="#333333">Amount</td>

        <td align="left" valign="middle" bgcolor="#333333">Shipping Amount</td>
        
        <?php if($o['Pay_Mode']=='Cash On Delivery') { ?>
        <td align="left" valign="middle" bgcolor="#333333">COD Amount</td>
		 <?php } ?>	
        <td align="left" valign="middle" bgcolor="#333333">Total Amount</td>

        </tr>

     <?php  $prod_order=mysql_query("select * from prod_order_mst where Order_Id='".$inv['Order_Id']."'");

	 	$payprice=0;

		while($pd=mysql_fetch_array($prod_order)) { 

			$product=mysql_query("select * from prod_mst where Prod_Id='".$pd['Prod_Id']."'");

			$pp=mysql_fetch_array($product);

		?>

      <tr class="title_10" >

        <td align="left" valign="middle"><?php echo $pp['Prod_Name']; ?> (<?php echo $pd['Color']; ?>)</td>

        <td align="left" valign="middle"><?php echo $pd['Qty']; ?></td>

        <td align="left" valign="middle"><?php echo $main_price=$pd['Price']; ?></td>

        <td align="left" valign="middle"><?php echo $sh_price=$pd['Shipping_Price']; ?></td>
        
         <?php if($o['Pay_Mode']=='Cash On Delivery') { ?>
        <td align="left" valign="middle"><?php echo $cod_price=$pd['cod_price']; ?></td>
		<?php } else { $cod_price='0.00'; } ?>
        <td align="left" valign="middle"><?php

		echo number_format($main_price+$sh_price+$cod_price,2);

		$final_price=$main_price+$sh_price+$cod_price;

		$payprice=$payprice+$final_price;

		?></td>

        </tr>

     <?php } ?>   

     <tr class="title_10" >

        <td align="left" valign="middle">&nbsp;</td>

        <td align="left" valign="middle">&nbsp;</td>

        <td align="left" valign="middle">&nbsp;</td>

        <td align="left" valign="middle"><strong>Total Amount</strong></td>
        <?php if($o['Pay_Mode']=='Cash On Delivery') { ?>
        <td align="left" valign="middle">&nbsp;</td>
        <?php } ?>

        <td align="left" valign="middle"><strong><?php echo number_format($payprice,2); ?></strong></td>

      </tr>

    </table></td>

  </tr>

  <tr>

    <td height="35" align="center" valign="bottom" class="title_9">Shop No. 1-2, DR Ambedkar Shopping Centre,<span class="title_9">Opp Kinnari Cinema,&nbsp;Ring Road,&nbsp;Surat - 395002 </span></td>

  </tr>

</table>

	