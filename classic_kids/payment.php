<?php $now = date("Y-m-d H:i:s"); ?>
<script language="JavaScript">
					function show_paypal()
					{
						document.getElementById('payment_paypal').style.display = '';
						document.getElementById('payment_offline').style.display = 'none';
						document.getElementById('payment_cod').style.display = 'none';
					}
					function show_offline()
					{
						document.getElementById('payment_paypal').style.display = 'none';
						document.getElementById('payment_offline').style.display = '';
						document.getElementById('payment_cod').style.display = 'none';
					}
					function show_cod()
					{
						document.getElementById('payment_paypal').style.display = 'none';
						document.getElementById('payment_offline').style.display = 'none';
						document.getElementById('payment_cod').style.display = '';
					}					
</script>
<script language="javascript">
function validation_offline()
{
	with(document.formcheque)
	{
			var error=0;
			var message;
			message="please enter / correct folllowing errors to proceed further";
			message=message+ "\n" + "--------------------------------------------------------------------";
			
			if(chequebankname.value=='')
			{
				error=1;
				message=message + "\n" + "please enter bankname";
			}
			if(chequenumber.value=='')
			{
				error=1;
				message=message + "\n" + "please enter cheque number";
			}
			if(chequedate.value=='')
			{
				error=1;
				message=message + "\n" + "please enter cheque date";
			}
			if (error==1)
			{
				alert(message);
				return false;
			}
			else
			{
				return true;		
			}
	}
}
</script>
<link rel="stylesheet" href="calendar/css1/jquery.ui.all.css">
<script src="calendar/js/jquery-1.4.3.js"></script> 
	<script src="calendar/js/jquery.ui.core.js"></script> 

	<script src="calendar/js/jquery.ui.datepicker.js"></script> 

	<script type="text/javascript"> 
	$(function() {
		$( "#chequedate" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
	});
	
</script>
<table width="960" border="0" cellspacing="0" cellpadding="0">

  <tr>
  
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="5" colspan="5"></td>
        </tr>
      <tr>     
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border1">
           <tr>
                <td colspan="2" height="35" align="left" valign="middle" bgcolor="#727272" style="background:url(images/tag_bg.jpg) repeat-x;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                   <td width="10"> </td>
                    <td align="left" valign="middle" class="title_black"><span class="title_white">Payment</span></td>
                  </tr>
                </table>
                </td>
              </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
                <td bgcolor="#E4E4E4"><table width="100%" border="0" cellspacing="2" cellpadding="3">
                  <tr>
                    <td bgcolor="#F0F0F0" class="font9"><strong>Products</strong></td>
                    <td width="30" align="center" valign="middle" bgcolor="#F0F0F0" class="font9"><strong>Qty</strong></td>
                    <td width="65" align="center" valign="middle" bgcolor="#F0F0F0" class="font9"><strong>Price</strong></td>
                   
                    <td width="70" align="center" valign="middle" bgcolor="#F0F0F0" class="font9"><strong>Shipping</strong></td>
                    <td width="70" align="center" valign="middle" bgcolor="#F0F0F0" class="font9"><strong>Amount</strong></td>
                    </tr>
                  <?php		$totalqty=0;		  
                  	while(list($key,$proobj)=each($_SESSION['shopcart']))
					{
						$selectedproductid=$proobj['productid'];
						$selectedquantity=$proobj['quantity'];
						$selectedcolors=$proobj['avialable_colors'];
					    $qsize=mysql_query("select * from size_mast where size_id='".$proobj['avialable_size']."'");
						$rsize=mysql_fetch_array($qsize);
						$selectedsize=$rsize['size'];
						$selectedprice=$proobj['price'];					
						
						$recordsetproduct = mysql_query("select * from product_mast where Product_id='".$selectedproductid."'
						",$cn);
						 while($rowproduct = mysql_fetch_array($recordsetproduct,MYSQL_ASSOC))
						 {	
						 $c++;
						 
						 $recordsetproductoffer = mysql_query("select * from product_offer where Product_mast_id='".$rowproduct["Product_id"]."' and End_date >='".$now."'",$cn);
						 if(mysql_num_rows($recordsetproductoffer)!=0)
						 {
						 while($rowproductoffer = mysql_fetch_array($recordsetproductoffer,MYSQL_ASSOC))
						 {
							 $offeramount=$rowproductoffer["offer_amt"];
							 $offeramounttype=$rowproductoffer["offer_type_id"];
							 
							 if($offeramounttype==1)
							 {
								 $discountamount=($rowproduct["Price"]*$offeramount)/100;
								 
								 $amountafterdiscount=$rowproduct["Price"]-$discountamount;
							 	 $payableamount=$amountafterdiscount;
							 }
							 elseif($offeramounttype==2)
							 {
								 $discountamount=$offeramount;								 
								 $amountafterdiscount=$rowproduct["Price"]-$discountamount;
								 
								 $payableamount=$amountafterdiscount;
							 }
							 else
							 {
								 $payableamount=$rowproduct["Price"];	
							 }
						 }
						 }
						else
						{
								$payableamount=$rowproduct["Price"];
						}
						$qpostcode=mysql_query("select * from register_master where register_ID='".$_SESSION["loginuserid"]."'");
						$rowpostcode=mysql_fetch_array($qpostcode);
						$userpostcode=$rowpostcode["register_user_pincode"];
						
						$s_qpostcode=mysql_query("select * from shipping_charges where postcode='".$userpostcode."'");
						$s_rowpostcode=mysql_fetch_array($s_qpostcode);
						$shippingamt=$s_rowpostcode["incl_GST"];
                    ?>
                  <tr>
                    <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="145" valign="top"><table width="145" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="190" align="center" valign="middle"><img src="photo/<?php echo $rowproduct["Product_display_medium_image"];?>" width="135" height="180" border="0" alt="<?php echo $rowproduct["Product_title"];?>" title="<?php echo $rowproduct["Product_title"];?>" /></td>
                            </tr>
                          </table></td>
                        <td width="5">&nbsp;</td>
                        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                          <tr>
                            <td class="font10"><strong><?php echo $rowproduct["Product_title"];?></strong></td>
                            </tr>
                          <tr>
                            <td height="5"></td>
                            </tr>
                          <tr>
                            <td><table width="100%" border="0" cellpadding="1" cellspacing="1" class="botm">
                              <tr>
                                <td><table border="0" cellpadding="3" cellspacing="0">
                                  <tr>
                                    <td valign="top" class="font8">Code</td>
                                    <td valign="top" class="font8">:</td>
                                    <td valign="top" class="font8"><?php echo $rowproduct["Product_code"];?></td>
                                    </tr>
                                  <tr>
                                    <td valign="top" class="font8">MRP Price</td>
                                    <td valign="top" class="font8">:</td>
                                    <td valign="top" class="font8">$<?php 									
									printf("%.2f",$rowproduct["Price"]);?></td>
                                    </tr>
                                  <?php
									if($discountamount!=0)
									{
									?>
                                  <tr>
                                    <td valign="top" class="font8">Discount</td>
                                    <td valign="top" class="font8">:</td>
                                    <td valign="top" class="font8">$<?php									
									printf("%.2f",$discountamount);?></td>
                                    </tr>
                                  <tr>
                                    <td valign="top" class="font8">Price</td>
                                    <td valign="top" class="font8">:</td>
                                    <td valign="top" class="font8">$<?php printf("%.2f",$amountafterdiscount);?></td>
                                    </tr>
                                  <?php
									}
									?>
                                 
                                  <tr>
                                    <td valign="top" class="font8">Selected Color</td>
                                    <td valign="top" class="font8">:</td>
                                    <td valign="top" class="font8">
                                      <?php echo $selectedcolors;?></td>
                                    </tr>
                                     <?php if($selectedsize!=""){ ?>
                                     <tr>
                                    <td valign="top" class="font8">Selected Size</td>
                                    <td valign="top" class="font8">:</td>
                                    <td valign="top" class="font8">
                                      <?php echo $selectedsize;?></td>
                                    </tr>
                                  <?php } ?>
                                  </table></td>
                                </tr>
                              </table></td>
                            </tr>
                          </table></td>
                        </tr>
                      </table></td>
                    <td align="center" valign="top" bgcolor="#FFFFFF" class="font10"><?php echo $selectedquantity;?></td>
                    <td align="right" valign="top" bgcolor="#FFFFFF" class="font10">$<?php printf("%.2f",$payableamount*$selectedquantity);?></td>
                   
                    <td align="right" valign="top" bgcolor="#FFFFFF" class="font10">$<?php printf("%.2f",$shippingamt*$selectedquantity);?>
                    
					
                             
                    </td>
                    <td align="right" valign="top" bgcolor="#FFFFFF" class="font10">
                      <?php
					$totalmrpprice=$totalmrpprice+($rowproduct["Price"]*$selectedquantity);

					$totaldiscountamount=$totaldiscountamount+($discountamount*$selectedquantity);
					
					$totalqty=$totalqty+$selectedquantity;
					
					$totalshippingamt=$totalshippingamt+($shippingamt*$selectedquantity);
										
					$totalamountproduct=($payableamount*$selectedquantity)+($shippingamt*$selectedquantity);
					$totalamountorder=$totalamountorder+$totalamountproduct;
					?> $<?php printf("%.2f",$totalamountproduct);?>
                      </td>
                    </tr>
                  <?php
					    $amountafterdiscount=0;
			 			$discountamount=0;
						$totalamountproduct=0;
						$shippingamt=0;
                        }
                        }
                        ?>
                  <tr>
                    <td bgcolor="#FFFFFF">&nbsp;</td>
                    <td align="center" valign="middle" bgcolor="#FFFFFF" class="font10"><strong><?php echo $totalqty; ?></strong></td>
                    <td align="right" valign="middle" bgcolor="#FFFFFF"><strong>$<?php printf("%.2f",$totalmrpprice);?></strong></td>
                    <td align="right" valign="middle" bgcolor="#FFFFFF" class="font10"><strong>$<?php printf("%.2f",$totalshippingamt);?></strong></td>
                    <td align="right" valign="middle" bgcolor="#FFFFFF" class="font10"><strong>$<?php printf("%.2f",$totalamountorder);?></strong></td>
                    </tr>
                  </table></td>
              </tr>
              <!--<tr>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="5" colspan="5" ></td>
                    </tr>
                  <tr>
                    <td width="90" class="font10">Discount Code </td>
                    <td width="8" class="font10">:</td>
                    <td width="20"><input name="textfield" type="text" class="font10" id="textfield" size="15" style="height:15px" /></td>
                    <td width="5">&nbsp;</td>
                    <td><a href="#"><img src="images/update1.png" width="68" height="20" border="0" /></a></td>
                  </tr>
                </table></td>
              </tr>-->
              <tr>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                  <tr class="font10">
                    <td colspan="3" align="right"> </td>
                    <td width="2" align="center">&nbsp;</td>
                    <td width="5" align="center">&nbsp;</td>
                    <td width="60" align="right"><strong>&nbsp;</strong></td>
                    </tr>
                  <!--<tr class="font10">
                    <td colspan="3" align="right">Discount Code </td>
                    <td align="center">&nbsp;</td>
                    <td align="center">:</td>
                    <td align="right" class="link"> $ 000.00</td>
                  </tr>-->
                  <tr class="font10">
                    <td align="right">&nbsp;</td>
                    <td width="8" align="center">&nbsp;</td>
                    <td width="150" align="right">Total Amount (MRP)</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="right">$<?php printf("%.2f",$totalmrpprice);?></td>
                  </tr>
                
                  <tr class="font10">
                    <td align="right">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="right">Total Shipping</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">+</td>
                    <td align="right">$<?php printf("%.2f",$totalshippingamt);?>&nbsp;</td>
                  </tr>
                  <tr class="font10">
                    <td align="right">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="right">Total Discount</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">-</td>
                    <td align="right">$<?php printf("%.2f",$totaldiscountamount);?></td>
                  </tr>
                  <tr class="font10">
                    <td align="right">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="right"><strong>Final Total</strong></td>
                    <td align="center">&nbsp;</td>
                    <td align="center">=</td>
                    <td align="right"><strong>$<?php printf("%.2f",$totalamountorder);?></strong></td>
                  </tr>
                  </table></td>
              </tr>
              </table></td>
          
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
           
          </tr>
          <tr>
            <td width="5" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="2" cellspacing="2" class="border">
              
                <tr>
                  <td><table width="100%" border="0" cellpadding="5" cellspacing="0">
                    <tr>
                      <td class="green_fonts" >Your Billing Details</td>
                      </tr>
                  </table></td>
                </tr>
           <?php 
             $recordsetbill = mysql_query("select * from bill_master where bill_invoice_no='".base64_decode($_REQUEST["orderid"])."'",$cn);
			while($rowbill = mysql_fetch_array($recordsetbill,MYSQL_ASSOC))
            {
             ?>                
                <tr>
                  <td><table width="100%" border="0" cellspacing="2" cellpadding="2">
                    <tr>
                      <td width="15%" class="font9">Name :</td>
                      <td width="35%" align="left" class="font9"><?php echo $rowbill["bill_name_user"];?></td>
                      <td width="30%" align="right" class="font9">Date :</td>
                      <td width="20%" align="left" class="font9"><?php
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
                    </tr>
                    <tr>
                      <td class="font9">Invoice No :</td>
                      <td align="left" class="font9"><?php echo $rowbill["bill_invoice_no"];?></td>
                      <td align="right" class="font9">Amount :</td>
                      <td align="left" class="font9">$<?php echo $rowbill["bill_final_amount"];?></td>
                    </tr>
                  </table></td>
                </tr>
              <?php
			$invoicenumberpaypal=$rowbill["bill_invoice_no"];
			$billamountpaypal=$rowbill["bill_final_amount"];
			$productbillno=$rowbill["bill_master_ID"];
			
			}
			?>
            </table></td>
         
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
        
          </tr>
           <tr> <td bgcolor="#FFFFFF">&nbsp;</td>
          
                  <td  bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td bgcolor="#FFFFFF" width="5"></td><td class="green_fonts" >Payment Options</td>
                      </tr>
                  </table></td>
                </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF" align="center">
          
<table border="0" cellpadding="5" cellspacing="0">
<!--<tr class="font9">
  <td><input type="radio" name="paymentmode" value="1" checked="checked" onclick="show_paypal()" /></td>
  <td>Online</td>
  <td><input type="radio" name="paymentmode" value="2" onclick="show_offline()" /></td>
  <td>Cheque / Demand Draft</td>
  <td><input type="radio" name="paymentmode" value="3" onclick="show_cod()"/></td>
  <td>Cash on Delivery</td>
</tr>-->
<tr>
  <td colspan="6"><table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr id="payment_paypal">
      <td align="center">
          <?php
		 // $billamountinusd=convert_amount_usd($billamountpaypal);
		  ?>
          <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" name="form" >
          <input type="hidden" name="cmd" value="_cart">	
          <input type="hidden" name="upload" value="1"> 
          <input type="hidden" name="tax" value="0">        
          <input type="hidden" name="no_note" value="1">
          <input type="hidden" name="currency_code" value="USD"> 
          <input type="hidden" name="business" value="pardhinilesh@gmail.com">           
  <?php
    $j=0;   
	
	  $info = mysql_query("select * from bill_products where Bill_Master_ID='".$productbillno."'");
	  
		while($a=mysql_fetch_array($info))
		{
		$infodetail = mysql_query("select * from product_mast where Product_id='".$a["bill_product_master_ID"]."'"); 
		  $adetail=mysql_fetch_array($infodetail);
			?>
          <input type="hidden" name="item_name_<?php echo $j+1; ?>" value="<?php echo $adetail["Product_title"]; ?>">
          <input type="hidden" name="quantity_<?php echo $j+1; ?>"  value="<?php echo $a["bill_product_qty"]; ?>"/>
          <input type="hidden" name="amount_<?php echo $j+1; ?>" value="<?php echo $a["bill_product_lastprice"]; ?>"/>
 <?php			
	  $j++;		  	
	  }                    
  ?>      
          <input type="hidden" name="item_number" value="Online Shopping - Klassic Kids">
          		
          <input type="hidden" name="invoice"  value="<?php echo $invoicenumberpaypal;?>">				
          <input name="notify_url" type="hidden" value="http://localhost/classic_kids/index.php?content=18"/>
          <input name="return" type="hidden" value="http://localhost/classic_kids/index.php?content=17"/>
          <input name="cancel_return" type="hidden" value="http://localhost/classic_kids/index.php?content=15&orderid=<?php echo $_REQUEST["orderid"]; ?>"/> 
          <input type="image" name="submit" src="images/paypal_paynow_button.gif" />
        </form>
        
        
        
         </td>
    </tr>
    <?php /*?><tr id="payment_offline" style="display:none;">
      <td><table width="100%" border="0" cellspacing="0" cellpadding="5">
                <form name="formcheque" method="post" action="orderprocess.php">
                <tr>
                  <td align="right" class="font10">Enter your Bank Name </td>
                  <td width="1%" align="center" class="font10">:</td>
                  <td align="left" class="font10"><input name="chequebankname" type="text" class="font8" size="45" /></td>
                </tr>
                <tr>
                  <td align="right" class="font10">Cheque Number</td>
                  <td align="center" class="font10">:</td>
                  <td align="left" class="font10"><input name="chequenumber" type="text" class="font8" size="30" /></td>
                </tr>
                <tr>
                  <td align="right" class="font10">Cheque Date</td>
                  <td align="center" class="font10">:</td>
                  <td align="left" class="font10"><input name="chequedate" id="chequedate" type="text" class="font8" size="25" /> 
                    (dd-mm-yyyy)</td>
                </tr>
                                
                <tr>
                  <td colspan="3" align="center" class="font10">
                    <input type="hidden" name="paymenttype" value="2" />
                    <input type="hidden" name="invoiceno" value="<?php echo $invoicenumberpaypal;?>" />
                    <input type="image" src="images/order-now.png" width="115" height="30" onclick="return validation_offline(this.form);" />
                   </td>
                </tr>
                </form>
          </table></td>
                            </tr>
                            <tr id="payment_cod" style="display:none;">
                              <td><table width="100%" border="0" cellspacing="0" cellpadding="5">
                <form name="formcashondelivery" method="post" action="orderprocess.php">
                <tr>
                  <td colspan="3" align="center" class="font10">
                    <input type="hidden" name="paymenttype" value="3" />
                    <input type="hidden" name="invoiceno" value="<?php echo $invoicenumberpaypal;?>" />
                    <input type="image" src="images/order-now.png" width="115" height="30" /></td>
                </tr>
                </form>
                
               
          </table></td>
                            </tr><?php */?>
                          </table></td>
                        </tr>
                      </table>
                      
          </td></tr>
        
         <tr><td height="10"></td></tr>
        </table></td>      
      </tr>
      <tr>
        <td height="5" colspan="5"></td>
        </tr>
    </table></td>
  
  </tr>
 
</table>
