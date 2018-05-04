<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Klassic Kids - Order Details</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border">
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF"><?php include("header.php");?></td>
      </tr>
      
      
      <tr>
        <td bgcolor="#FFFFFF">         
<table width="100%" border="0" cellpadding="0">

<tr><td bgcolor="#FFFFFF">

<table width="99%" border="0" cellspacing="10" cellpadding="0" >
    
    <tr>
            <td class="normal_fonts14_black">Order Details</td>
    </tr>
    <tr>
      <td class="normal_fonts9"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" class="border" >
        <?php
		   $recordsetbill = mysql_query("select * from bill_master where bill_invoice_no='".$_REQUEST["invoice"]."'",$cn);
			while($rowbill = mysql_fetch_array($recordsetbill,MYSQL_ASSOC))
            {
			$billmastid=$rowbill["bill_master_ID"];
			$totalextraamount=$rowbill["bill_extra_amount"];
			$totalshippingamount=$rowbill["bill_total_shipping"];
			$totaldiscountamount=$rowbill["bill_total_discount"];
				?>
        <tr>
          <td width="15%" align="left"  ><strong>Name :</strong></td>
          <td width="25%" align="left" ><?php echo $rowbill["bill_name_user"];?></td>
          <td align="right" >Total Amount (MRP)</td>
          <td width="1%" align="center" >&nbsp;</td>
          <td width="15%" align="right" >Rs. <?php printf("%.2f",$rowbill["bill_total_amount"]);?></td>
          </tr>
        <tr>
          <td align="left"  ><strong>Date :</strong></td>
          <td align="left" ><?php
							$datetime=$rowbill["bill_datetime"];
							$datetime=explode(" ",$datetime);
							$date=$datetime[0];
							$date=explode("-",$date);
							$year=$date[0];
							$mon=$date[1];
							$day=$date[2];
							$date=$day."-".$mon."-".$year;
							$datetime=$date." ".$datetime[1];
							echo $datetime;
						?></td>
          <td align="right" >Total Discount</td>
          <td align="center" >-</td>
          <td align="right" >Rs. <?php printf("%.2f",$rowbill["bill_total_discount"]);?></td>
        </tr>
        <tr>
          <td align="left"  ><strong>Invoice No :</strong></td>
          <td align="left" ><?php echo $rowbill["bill_invoice_no"];?></td>
          <td align="right" ><strong>Total Amount</strong></td>
          <td align="center" >=</td>
          <td align="right" ><strong>Rs. <?php printf("%.2f",$rowbill["bill_total_amount"]-$rowbill["bill_total_discount"]);?></strong></td>
        </tr>
        <tr>
          <td align="left"  ><strong>Order Status :</strong></td>
          <td align="left" ><?php
if($rowbill["bill_order_completed"]==0)
{
	echo "Pending";
}
elseif($rowbill["bill_order_completed"]==1)
{
	echo "Completed";
}
elseif($rowbill["bill_order_completed"]==2)
{
	echo "Cancelled";
}
elseif($rowbill["bill_order_completed"]==3)
{
	echo "In Shipping";
}
?></td>
          <td align="right" >Total Shipping</td>
          <td align="center" >+</td>
          <td align="right" >Rs. <?php printf("%.2f",$rowbill["bill_total_shipping"]);?></td>
        </tr>
        <tr>
          <td align="left"  >&nbsp;</td>
          <td align="left" >&nbsp;</td>
          <td align="right" ><strong>Final Total</strong></td>
          <td align="center" >=</td>
          <td align="right" ><strong>Rs. <?php printf("%.2f",$rowbill["bill_final_amount"]);?></strong></td>
        </tr>
        <?php
			}
			?>
        </table></td>
    </tr>
    <tr>
      <td class="normal_fonts14_black">Payment Details</td>
    </tr>
    <tr>
      <td><table width="90%" border="0" align="center" cellpadding="5" cellspacing="0" class="border">
        <?php
		   $recordsetbill = mysql_query("select * from bill_master where bill_invoice_no='".$_REQUEST["invoice"]."'",$cn);
			while($rowbill = mysql_fetch_array($recordsetbill,MYSQL_ASSOC))
            {
			$totalextraamount=$rowbill["bill_extra_amount"];
			$totalshippingamount=$rowbill["bill_total_shipping"];
			$totaldiscountamount=$rowbill["bill_total_discount"];
				?>
        <tr>
          <td width="45%" align="right" bgcolor="#F3F3F3"  class="normal_fonts9"><strong>Payment Method :</strong></td>
          <td align="left" bgcolor="#F3F3F3" class="normal_fonts9"><?php 
		  if($rowbill["bill_payment_type"]==1)
		  {
		  		echo "Online - Paypal";
		  }
		  elseif($rowbill["bill_payment_type"]==2)
		  {
		  		echo "Cheque / Demand Draft";
		  }
		  elseif($rowbill["bill_payment_type"]==3)
		  {
		  		echo "Cash on Delivery";
		  }
		  ?></td>
          </tr>
        <tr>
          <td align="right"  class="normal_fonts9"><strong>Payment Status :</strong></td>
          <td align="left" class="normal_fonts9"><?php echo $rowbill["bill_payment_status"];?></td>
        </tr>
          <?php
		 if($rowbill["bill_payment_type"]==1)
		  {
		  ?> 
        <tr>
          <td align="right" bgcolor="#F3F3F3" class="normal_fonts9"><strong>Bank Name :</strong></td>
          <td align="left" bgcolor="#F3F3F3" class="normal_fonts9"><?php echo $rowbill["bill_payment_bank_name"];?></td>
          </tr>
          <?php
		  }
		  ?>
         <?php
		 if($rowbill["bill_payment_type"]==2)
		  {
		  ?> 
        <tr>
          <td align="right" bgcolor="#F3F3F3" class="normal_fonts9"><strong>Bank Name :</strong></td>
          <td align="left" bgcolor="#F3F3F3" class="normal_fonts9"><?php echo $rowbill["bill_payment_bank_name"];?></td>
          </tr>
        <tr>
          <td align="right" class="normal_fonts9"><strong>Cheque No :</strong></td>
          <td align="left" class="normal_fonts9"><?php echo $rowbill["bill_payment_cheque_dd_number"];?></td>
        </tr>
        <tr>
          <td align="right" bgcolor="#F3F3F3" class="normal_fonts9"><strong>Cheque Date :</strong></td>
          <td align="left" bgcolor="#F3F3F3" class="normal_fonts9"><?php echo $rowbill["bill_payment_cheque_dd_date"];?></td>
        </tr>
        <?php
		}
		?>
        <?php
		 if($rowbill["bill_payment_type"]==4)
		  {
		  ?> 
        <tr>
          <td align="right" bgcolor="#F3F3F3" class="normal_fonts9"><strong>Bank Name :</strong></td>
          <td align="left" bgcolor="#F3F3F3" class="normal_fonts9"><?php echo $rowbill["bill_payment_bank_name"];?></td>
          </tr>
        <tr>
          <td align="right" class="normal_fonts9"><strong>DD No :</strong></td>
          <td align="left" class="normal_fonts9"><?php echo $rowbill["bill_payment_cheque_dd_number"];?></td>
        </tr>
        <tr>
          <td align="right" bgcolor="#F3F3F3" class="normal_fonts9"><strong>DD Date :</strong></td>
          <td align="left" bgcolor="#F3F3F3" class="normal_fonts9"><?php echo $rowbill["bill_payment_cheque_dd_date"];?></td>
        </tr>
        <?php
		}
		?>
        <?php
			}
			?>
      </table></td>
    </tr>
     <tr>
       <td class="normal_fonts14_black">Product Details</td>
     </tr>
     <tr>
       <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><table width="100%" border="0" cellpadding="5" cellspacing="0">
                        <tr class="normal_fonts8">
                          <td align="left"><strong>Product</strong></td>
                          <td align="center"><strong>MRP</strong></td>
                          <td align="center"><strong>Disc</strong></td>
                          <td align="center"><strong>Final Price</strong></td>
                          <td align="center"><strong>Qty</strong></td>
                          <td align="center"><strong>Total</strong></td>
                        </tr>
                        <?php
						$p=1;
						$recordsetproduct = mysql_query("SELECT * FROM product_mast
						INNER JOIN bill_products ON bill_products.bill_product_master_ID=product_mast.product_id								
						where bill_products.Bill_Master_ID='".$billmastid."'");
							 while($rowproduct = mysql_fetch_array($recordsetproduct,MYSQL_ASSOC))
							 {									
								$productamount=$rowproduct["bill_product_MRP"];
								$productfinalamount=$rowproduct["bill_product_lastprice"];
								
								$selectedcolors=$rowproduct["bill_product_selected_color"];
								$selectedsize=$rowproduct["bill_product_selected_size"];
								$selectedquantity=$rowproduct["bill_product_qty"];
								
								
								$discountamount=$rowproduct["bill_product_discount"];
								$offertitle=$rowproduct["bill_product_offer_title"];
								
								
								
						 ?>
                        <tr class="normal_fonts8">
                          <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="230" align="center"><img src="../photo/<?php echo $rowproduct["Product_display_medium_image"];?>" width="220" height="280" border="0" alt="<?php echo $rowproduct["product_title"]." - ".$rowproduct["product_code"];?>" title="<?php echo $rowproduct["product_title"]." - ".$rowproduct["product_code"];?>" /></td>
                              <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="5">
                                <tr>
                                  <td class="normal_fonts8"><?php echo $rowproduct["product_title"];?></td>
                                </tr>
                                <tr>
                                  <td class="normal_fonts8"><?php echo $rowproduct["product_code"];?></td>
                                </tr>
                                 <?php if($selectedcolors!=""){ ?>
                                <tr>
                                  <td class="normal_fonts8">Selected Color : <?php echo $selectedcolors;?></td>
                                </tr>
                                <?php 
								 }
								if($selectedsize!=""){ ?>
                                <tr>
                                  <td class="normal_fonts8">Selected Size : <?php echo $selectedsize;?></td>
                                </tr>
                                <?php
								}
								if($offertitle!="")
								{
								?>
                                 <tr>
                                  <td class="normal_fonts8">Offer : <?php echo $offertitle;?></td>
                                </tr>
                                <?php
								}
								?>
                              </table></td>
                            </tr>
                          </table></td>
                          <td align="center" valign="top">Rs.<?php echo $rowproduct["bill_product_MRP"];?></td>
                          <td align="center" valign="top">Rs.<?php printf("%.2f",$discountamount);?></td>
                          <td align="center" valign="top">Rs. <?php printf("%.2f",$productfinalamount);?></td>
                          <td align="center" valign="top"><?php echo $selectedquantity;?></td>
                          <td align="center" valign="top">Rs. <?php printf("%.2f",$productfinalamount*$selectedquantity);?></td>
                        </tr>
                         <?php
						 if($p!=mysql_num_rows($recordsetproduct))
						 {
						 ?>
                        <tr>
                          <td colspan="6" align="center" valign="top" class="normal_fonts8">-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
                          </tr>
                        <?php
						 }
						 $p++;
						$productamount="";
						$productfinalamount="";
						$selectedcolors="";
						$selectedquantity="";
						$discountamount="";
						$offertitle="";
						}
						
						
							 ?>
                      </table></td>
                    </tr>
                  
                   
                    </table></td>
     </tr>
     <tr>
       <td class="normal_fonts14_black">Billing / Shipping Details</td>
     </tr>
     <tr>
       <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
         
         <tr>
           <td><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
             <tr>
               <td width="50%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border">
                 
                 <tr>
                   <td><table width="100%" border="0" cellpadding="5" cellspacing="0">
                     <tr>
                       <td bgcolor="#999999" class="normal_fonts12_black" ><strong>Billing Address</strong></td>
                       </tr>
                     </table></td>
                   </tr>
                 <tr>
                   <td><table width="100%" border="0" cellpadding="5" cellspacing="0">
                     <?php
						$recordsetbilling = mysql_query("select * from bill_billing_address
						INNER JOIN bill_master ON bill_master.bill_master_ID=bill_billing_address.billing_bill_master_ID							 
						where bill_master.bill_invoice_no='".$_REQUEST["invoice"]."'",$cn);
						$catc=1;
						while($rowbilling = mysql_fetch_array($recordsetbilling,MYSQL_ASSOC))
						{
                     ?>
                     <tr>
                       <td width="35%" align="right" valign="top" class="normal_fonts9" > Name </td>
                       <td class="normal_fonts9">:</td>
                       <td width="64%" align="left" class="normal_fonts9"><?php  echo $rowbilling["billing_user_name"];?></td>
                     </tr>
                     <tr>
                       <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9" >Address </td>
                       <td bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                       <td align="left" bgcolor="#F3F3F3" class="normal_fonts9"><?php  echo $rowbilling["billing_user_address"];?></td>
                     </tr>
                     <tr>
                       <td align="right" valign="top" class="normal_fonts9" >City </td>
                       <td class="normal_fonts9">:</td>
                       <td align="left" class="normal_fonts9"><?php echo $rowbilling["billing_user_city"];?></td>
                     </tr>
                     <tr>
                       <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9" >State / Province </td>
                       <td bgcolor="#F3F3F3"  class="normal_fonts9">:</td>
                       <td align="left" bgcolor="#F3F3F3"  class="normal_fonts9"><?php echo $rowbilling["billing_user_state"];?></td>
                     </tr>
                     <tr>
                       <td align="right" valign="top" class="normal_fonts9" >Post Code </td>
                       <td class="normal_fonts9">:</td>
                       <td align="left" class="normal_fonts9"><?php echo $rowbilling["billing_user_pincode"];?></td>
                     </tr>
                     <tr>
                       <td align="right" valign="top" bgcolor="#F3F3F3"  class="normal_fonts9" >Country </td>
                       <td bgcolor="#F3F3F3"  class="normal_fonts9">:</td>
                       <td align="left" bgcolor="#F3F3F3"  class="normal_fonts9"><?php echo $rowbilling["billing_user_country"];?></td>
                     </tr>
                     <tr>
                       <td align="right" valign="top" class="normal_fonts9" >Email Address </td>
                       <td width="1%" class="normal_fonts9">:</td>
                       <td align="left" class="normal_fonts9"><?php echo $rowbilling["billing_user_email"];?></td>
                     </tr>
                     <tr>
                       <td align="right" valign="top" bgcolor="#F3F3F3"  class="normal_fonts9" >Phone&nbsp;</td>
                       <td bgcolor="#F3F3F3"  class="normal_fonts9">:</td>
                       <td align="left" bgcolor="#F3F3F3"  class="normal_fonts9"><?php echo $rowbilling["billing_user_phone"];?></td>
                     </tr>
                     <tr>
                       <td align="right" valign="top" class="normal_fonts9" >Mobile </td>
                       <td class="normal_fonts9">:</td>
                       <td align="left" class="normal_fonts9"><?php echo $rowbilling["billing_user_mobile"];?></td>
                     </tr>
                     <tr>
                       <td height="10" colspan="4" align="right" class="normal_fonts9"></td>
                     </tr>
                <?php
				}
				?>
                     </table></td>
                   </tr>                   
                 </table></td>
               <td width="1%" valign="top">&nbsp;</td>
               <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border">
                 <tr>
                   <td><table width="100%" border="0" cellpadding="5" cellspacing="0">
                     <tr>
                       <td bgcolor="#999999" class="normal_fonts12_black" ><strong>Shipping Address</strong></td>
                       </tr>
                     </table></td>
                   </tr>
                 <tr>
                   <td><table width="100%" border="0" cellpadding="5" cellspacing="0">
                     <?php
                                $recordsetshipping = mysql_query("select * from bill_shipping_address
								INNER JOIN bill_master ON bill_master.bill_master_ID=bill_shipping_address.shipping_bill_master_ID							 
								where bill_master.bill_invoice_no='".$_REQUEST["invoice"]."'",$cn);
								$catc=1;
                                while($rowshipping = mysql_fetch_array($recordsetshipping,MYSQL_ASSOC))
                                {
                                ?>
                     <tr>
                       <td width="35%" align="right" valign="top" class="normal_fonts9" > Name </td>
                       <td class="normal_fonts9">:</td>
                       <td width="64%" align="left" class="normal_fonts9"><?php  echo $rowshipping["shipping_user_name"];?></td>
                     </tr>
                     <tr>
                       <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9" >Address </td>
                       <td bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                       <td align="left" bgcolor="#F3F3F3" class="normal_fonts9"><?php  echo $rowshipping["shipping_user_address"];?></td>
                     </tr>
                     <tr>
                       <td align="right" valign="top" class="normal_fonts9" >City </td>
                       <td class="normal_fonts9">:</td>
                       <td align="left" class="normal_fonts9"><?php  echo $rowshipping["shipping_user_city"];?></td>
                     </tr>
                     <tr>
                       <td align="right" valign="top" bgcolor="#F3F3F3"  class="normal_fonts9" >State / Province </td>
                       <td bgcolor="#F3F3F3"  class="normal_fonts9">:</td>
                       <td align="left" bgcolor="#F3F3F3"  class="normal_fonts9"><?php  echo $rowshipping["shipping_user_state"];?></td>
                       </tr>
                     <tr>
                       <td align="right" valign="top" class="normal_fonts9" >Post Code </td>
                       <td class="normal_fonts9">:</td>
                       <td align="left" class="normal_fonts9"><?php  echo $rowshipping["shipping_user_pincode"];?></td>
                       </tr>
                     <tr>
                       <td align="right" valign="top" bgcolor="#F3F3F3"  class="normal_fonts9" >Country </td>
                       <td bgcolor="#F3F3F3"  class="normal_fonts9">:</td>
                       <td align="left" bgcolor="#F3F3F3"  class="normal_fonts9"><?php  echo $rowshipping["shipping_user_country"];?></td>
                       </tr>
                     <tr>
                       <td align="right" valign="top" class="normal_fonts9" >Email Address </td>
                       <td width="1%" class="normal_fonts9">:</td>
                       <td align="left" class="normal_fonts9"><?php  echo $rowshipping["shipping_user_email"];?></td>
                       </tr>
                     <tr>
                       <td align="right" valign="top" bgcolor="#F3F3F3"  class="normal_fonts9" >Phone&nbsp;</td>
                       <td bgcolor="#F3F3F3"  class="normal_fonts9">:</td>
                       <td align="left" bgcolor="#F3F3F3"  class="normal_fonts9"><?php  echo $rowshipping["shipping_user_phone"];?></td>
                       </tr>
                     <tr>
                       <td align="right" valign="top" class="normal_fonts9" >Mobile </td>
                       <td class="normal_fonts9">:</td>
                       <td align="left" class="normal_fonts9"><?php  echo $rowshipping["shipping_user_mobile"];?></td>
                       </tr>
                     <tr>
                       <td height="10" colspan="4" align="right" class="normal_fonts9"></td>
                       </tr>
                     <?php
				}
				?>
                     </table></td>
                   </tr>
                 </table></td>
               </tr>
             </table></td>
           </tr>
       </table></td></tr>
      
     <tr>
       <td><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
         
         <tr>
           <td><table width="100%" border="0" cellpadding="5" cellspacing="0">
             <tr>
               <td align="left" bgcolor="#999999" class="normal_fonts12_black" ><strong>Order Status</strong></td>
               </tr>
             </table></td>
           </tr>
         <tr>
           <td>&nbsp;</td>
           </tr>
         <tr>
           <td><table border="0" align="center" cellpadding="5" cellspacing="0" class="border">
             <form name="orderform" action="orderprocess.php" method="post">
               <?php
				    $recordsetbill = mysql_query("select * from bill_master where bill_invoice_no='".$_REQUEST["invoice"]."'",$cn);
					while($rowbill = mysql_fetch_array($recordsetbill,MYSQL_ASSOC))
					{
					?>
               
               <tr>
                 <td align="right" valign="top" class="normal_fonts9"><strong>Order Status :</strong></td>
                 <td align="left" valign="top" class="normal_fonts9"><?php
if($rowbill["bill_order_completed"]==0)
{
	echo "Pending";
}
elseif($rowbill["bill_order_completed"]==1)
{
	echo "Completed";
}
elseif($rowbill["bill_order_completed"]==2)
{
	echo "Cancelled";
}
elseif($rowbill["bill_order_completed"]==3)
{
	echo "In Shipping";
}
?></td>
                 </tr>
               <tr>
                 <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><strong>Note :</strong></td>
                 <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><?php echo $rowbill["bill_order_status_note"];?></td>
                 </tr>
               <?php
				  if($rowbill["bill_order_status_updated_datetime"]!="0000-00-00 00:00:00")
				  {
				  ?>
               <tr>
                 <td align="right" valign="top" class="normal_fonts9"><strong>Status Updated On :</strong></td>
                 <td align="left" valign="top" class="normal_fonts9"><?php
							$datetime=$rowbill["bill_order_status_updated_datetime"];
							$datetime=explode(" ",$datetime);
							$date=$datetime[0];
							$date=explode("-",$date);
							$year=$date[0];
							$mon=$date[1];
							$day=$date[2];
							$date=$day."-".$mon."-".$year;
							$datetime=$date." ".$datetime[1];
							echo $datetime;
						?></td>
                 </tr>
               <tr>
                 <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><strong>Status Updated from :</strong></td>
                 <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><?php echo $rowbill["bill_order_status_updated_ip"];?></td>
                 </tr>
               <?php
				  }
				  ?>
               
               <?php
					}
					?>
               </form>   
             </table></td>
           </tr>
         <tr>
           <td>&nbsp;</td>
           </tr>                   
         </table></td>
     </tr>
</table>
</td></tr></table>		</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><?php include("footer.php");?></td>
  </tr>
</table>
 
</body>
</html>