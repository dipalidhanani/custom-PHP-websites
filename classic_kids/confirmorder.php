<?php $now = date("Y-m-d H:i:s"); ?>
<link href="css/home.css" rel="stylesheet" type="text/css" />
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
                    <td align="left" valign="middle" class="title_black"><span class="title_white">Confirm your Order</span></td>
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
                    <td bgcolor="#F0F0F0" class="black10"><strong>Products</strong></td>
                    <td width="30" align="center" valign="middle" bgcolor="#F0F0F0" class="black10"><strong>Qty</strong></td>
                    <td width="65" align="center" valign="middle" bgcolor="#F0F0F0" class="black10"><strong>Price</strong></td>
                    <td width="70" align="center" valign="middle" bgcolor="#F0F0F0" class="black10"><strong>Shipping</strong></td>
                    <td width="70" align="center" valign="middle" bgcolor="#F0F0F0" class="black10"><strong>Amount</strong></td>
                    </tr>
                  <?php		$totalqty=0;	$totalshipping=0;		  
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
						 
						  $totalqty=$totalqty+$selectedquantity;
						  
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
                            <td class="black10"><strong><?php echo $rowproduct["Product_title"];?></strong></td>
                            </tr>
                          <tr>
                            <td height="5"></td>
                            </tr>
                          <tr>
                            <td><table width="100%" border="0" cellpadding="1" cellspacing="1" class="botm">
                              <tr>
                                <td><table border="0" cellpadding="3" cellspacing="0">
                                  <tr>
                                    <td valign="top" class="black8">Code</td>
                                    <td valign="top" class="black8">:</td>
                                    <td valign="top" class="black8"><?php echo $rowproduct["Product_code"];?></td>
                                    </tr>
                                  <tr>
                                    <td valign="top" class="black8">MRP Price</td>
                                    <td valign="top" class="black8">:</td>
                                    <td valign="top" class="black8">$<?php 									
									printf("%.2f",$rowproduct["Price"]);?></td>
                                    </tr>
                                  <?php
									if($discountamount!=0)
									{
									?>
                                  <tr>
                                    <td valign="top" class="black8">Discount</td>
                                    <td valign="top" class="black8">:</td>
                                    <td valign="top" class="black8">$<?php									
									printf("%.2f",$discountamount);?></td>
                                    </tr>
                                  <tr>
                                    <td valign="top" class="black8">Price</td>
                                    <td valign="top" class="black8">:</td>
                                    <td valign="top" class="black8">$<?php printf("%.2f",$amountafterdiscount);?></td>
                                    </tr>
                                  <?php
									}
									?>
                                 
                                  <tr>
                                    <td valign="top" class="black8">Selected Color</td>
                                    <td valign="top" class="black8">:</td>
                                    <td valign="top" class="black8"><?php echo $selectedcolors;?></td>
                                    </tr>
                                    <?php if($selectedsize!=""){ ?>
                                    <tr>
                                    <td valign="top" class="black8">Selected Size</td>
                                    <td valign="top" class="black8">:</td>
                                    <td valign="top" class="black8"><?php echo $selectedsize;?></td>
                                    </tr>
                                    <?php } ?>
                                      
                                  </table></td>
                                </tr>
                              </table></td>
                            </tr>
                          </table></td>
                        </tr>
                      </table></td>
                    <td align="center" valign="top" bgcolor="#FFFFFF" class="black10"><?php echo $selectedquantity;?></td>
                    <td align="right" valign="top" bgcolor="#FFFFFF" class="black10">$<?php printf("%.2f",$payableamount*$selectedquantity);?></td>
                    <td align="right" valign="top" bgcolor="#FFFFFF" class="black10">$<?php printf("%.2f",$shippingamt*$selectedquantity);?>
                      
                      
                      
                    </td>
                    <td align="right" valign="top" bgcolor="#FFFFFF" class="black10">
                      <?php
					$totalmrpprice=$totalmrpprice+($rowproduct["Price"]*$selectedquantity);

					$totaldiscountamount=$totaldiscountamount+($discountamount*$selectedquantity);
					
					
					
					$totalshippingamt=$totalshippingamt+($shippingamt*$selectedquantity);
										
					$totalamountproduct=($payableamount*$selectedquantity)+($shippingamt*$selectedquantity);
					$totalamountorder=$totalamountorder+$totalamountproduct;
					?>$                      <?php printf("%.2f",$totalamountproduct);?>
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
                    <td align="center" valign="middle" bgcolor="#FFFFFF" class="black10"><strong><?php echo $totalqty; ?></strong></td>
                    <td align="right" valign="middle" bgcolor="#FFFFFF"><strong>$<?php printf("%.2f",$totalmrpprice);?></strong></td>
                    <td align="right" valign="middle" bgcolor="#FFFFFF" class="black10"><strong>$<?php printf("%.2f",$totalshippingamt);?></strong></td>
                    <td align="right" valign="middle" bgcolor="#FFFFFF" class="black10"><strong>$<?php printf("%.2f",$totalamountorder);?></strong></td>
                    </tr>
                  </table></td>
              </tr>
              <!--<tr>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="5" colspan="5" ></td>
                    </tr>
                  <tr>
                    <td width="90" class="black10">Discount Code </td>
                    <td width="8" class="black10">:</td>
                    <td width="20"><input name="textfield" type="text" class="black10" id="textfield" size="15" style="height:15px" /></td>
                    <td width="5">&nbsp;</td>
                    <td><a href="#"><img src="images/update1.png" width="68" height="20" border="0" /></a></td>
                  </tr>
                </table></td>
              </tr>-->
              <tr>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                  <tr class="black10">
                    <td colspan="3" align="right"> </td>
                    <td width="2" align="center">&nbsp;</td>
                    <td width="5" align="center">&nbsp;</td>
                    <td width="60" align="right"><strong>&nbsp;</strong></td>
                    </tr>
                  <!--<tr class="black10">
                    <td colspan="3" align="right">Discount Code </td>
                    <td align="center">&nbsp;</td>
                    <td align="center">:</td>
                    <td align="right" class="link"> $ 000.00</td>
                  </tr>-->
                  <tr class="black10">
                    <td align="right">&nbsp;</td>
                    <td width="8" align="center">&nbsp;</td>
                    <td width="150" align="right">Total Amount (MRP)</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="right">$<?php printf("%.2f",$totalmrpprice);?></td>
                  </tr>
                  <tr class="black10">
                    <td align="right">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="right">Total Shipping</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">+</td>
                    <td align="right">$<?php printf("%.2f",$totalshippingamt);?></td>
                  </tr>
                  <tr class="black10">
                    <td align="right">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="right">Total Discount</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">-</td>
                    <td align="right">$<?php printf("%.2f",$totaldiscountamount);?></td>
                  </tr>
                  <tr class="black10">
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
            <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td width="50%" valign="top"><table width="100%" border="0" cellpadding="2" cellspacing="2" class="border">
                  
                    <tr>
                      <td><table width="100%" border="0" cellpadding="5" cellspacing="5">
                        <tr>
                          <td class="green_fonts">Your Billing Address</td>
                          </tr>
                        </table></td>
                      </tr>
                    <tr>
                      <td><table width="100%" border="0" cellpadding="5" cellspacing="0">
                        <?php
                                $recordsetbilling = mysql_query("select * from bill_billing_address
								INNER JOIN bill_master ON bill_master.bill_master_ID=bill_billing_address.billing_bill_master_ID							 
								where bill_master.bill_invoice_no='".base64_decode($_REQUEST["orderid"])."'",$cn);
								$catc=1;
                                while($rowbilling = mysql_fetch_array($recordsetbilling,MYSQL_ASSOC))
                                {
                                ?>
                        <tr>
                          <td width="35%" align="right" valign="top" class="black10" >First Name </td>
                          <td class="black10">:</td>
                          <td width="64%" class="black10"><?php  echo $rowbilling["billing_user_first_name"];?></td>
                          </tr>
                        <tr>
                          <td align="right" valign="top"  class="black10" >Last Name </td>
                          <td  class="black10">:</td>
                          <td  class="black10"><?php  echo $rowbilling["billing_user_last_name"];?></td>
                          </tr>
                        <tr>
                          <td align="right" valign="top" class="black10" >Unit </td>
                          <td class="black10">:</td>
                          <td class="black10"><?php  echo $rowbilling["billing_user_unit"];?></td>
                          </tr>
                        <tr>
                          <td align="right" valign="top"  class="black10" >Street </td>
                          <td  class="black10">:</td>
                          <td  class="black10"><?php  echo $rowbilling["billing_user_street"];?></td>
                          </tr>
                        <tr>
                          <td align="right" valign="top" class="black10" >Subburb </td>
                          <td class="black10">:</td>
                          <td class="black10"><?php  echo $rowbilling["billing_user_subburb"];?></td>
                          </tr>
                        <tr>
                          <td align="right" valign="top"  class="black10" >State / Province </td>
                          <td  class="black10">:</td>
                          <td  class="black10"><?php  echo $rowbilling["billing_user_state"];?></td>
                          </tr>
                        <tr>
                          <td align="right" valign="top" class="black10" >Post Code </td>
                          <td class="black10">:</td>
                          <td class="black10"><?php  echo $rowbilling["billing_user_pincode"];?></td>
                          </tr>
                        <tr>
                          <td align="right" valign="top"  class="black10" >Country </td>
                          <td  class="black10">:</td>
                          <td  class="black10"><?php  echo $rowbilling["billing_user_country"];?></td>
                          </tr>
                        <tr>
                          <td align="right" valign="top" class="black10" >Email Address </td>
                          <td width="1%" class="black10">:</td>
                          <td class="black10"><?php  echo $rowbilling["billing_user_email"];?></td>
                          </tr>
                          <?php if($rowbilling["billing_user_phone"]!=''){ ?>
                        <tr>
                          <td align="right" valign="top"  class="black10" >Phone&nbsp;</td>
                          <td  class="black10">:</td>
                          <td  class="black10"><?php  echo $rowbilling["billing_user_phone"];?></td>
                          </tr>
                          <?php } ?>
                        <tr>
                          <td align="right" valign="top" class="black10" >Mobile </td>
                          <td class="black10">:</td>
                          <td class="black10"><?php  echo $rowbilling["billing_user_mobile"];?></td>
                          </tr>
                        <tr>
                          <td height="10" colspan="4" align="right" class="black10"></td>
                          </tr>
                        <?php
				}
				?>
                        </table></td>
                      </tr>                   
                  </table></td>
                <td valign="top"><table width="100%" border="0" cellpadding="2" cellspacing="2" class="border">
                  <tr>
                    <td><table width="100%" border="0" cellpadding="5" cellspacing="5">
                      <tr>
                        <td class="green_fonts" >Your Shipping Address</td>
                        </tr>
                      </table></td>
                    </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="5" cellspacing="0">
                      <?php					 
                                $recordsetshipping = mysql_query("select * from bill_shipping_address
								INNER JOIN bill_master ON bill_master.bill_master_ID=bill_shipping_address.shipping_bill_master_ID							 
								where bill_master.bill_invoice_no='".base64_decode($_REQUEST["orderid"])."'",$cn);
								$catc=1;
                                while($rowshipping = mysql_fetch_array($recordsetshipping,MYSQL_ASSOC))
                                {
                                ?>
                      <tr>
                        <td width="35%" align="right" valign="top" class="black10" >First Name </td>
                        <td class="black10">:</td>
                        <td width="64%" class="black10"><?php  echo $rowshipping["shipping_user_first_name"];?></td>
                        </tr>
                      <tr>
                        <td align="right" valign="top"  class="black10" >Last Name </td>
                        <td  class="black10">:</td>
                        <td  class="black10"><?php  echo $rowshipping["shipping_user_last_name"];?></td>
                        </tr>
                      <tr>
                        <td align="right" valign="top" class="black10" >Unit</td>
                        <td class="black10">:</td>
                        <td class="black10"><?php  echo $rowshipping["shipping_user_unit"];?></td>
                        </tr>
                      <tr>
                        <td align="right" valign="top"  class="black10" >Street</td>
                        <td  class="black10">:</td>
                        <td  class="black10"><?php  echo $rowshipping["shipping_user_street"];?></td>
                        </tr>
                      <tr>
                        <td align="right" valign="top" class="black10" >Subburb</td>
                        <td class="black10">:</td>
                        <td class="black10"><?php  echo $rowshipping["shipping_user_subburb"];?></td>
                        </tr>
                      <tr>
                        <td align="right" valign="top"  class="black10" >State / Province </td>
                        <td  class="black10">:</td>
                        <td  class="black10"><?php  echo $rowshipping["shipping_user_state"];?></td>
                        </tr>
                      <tr>
                        <td align="right" valign="top" class="black10" >Post Code </td>
                        <td class="black10">:</td>
                        <td class="black10"><?php  echo $rowshipping["shipping_user_pincode"];?></td>
                        </tr>
                      <tr>
                        <td align="right" valign="top"  class="black10" >Country </td>
                        <td  class="black10">:</td>
                        <td  class="black10"><?php  echo $rowshipping["shipping_user_country"];?></td>
                        </tr>
                      <tr>
                        <td align="right" valign="top" class="black10" >Email Address </td>
                        <td width="1%" class="black10">:</td>
                        <td class="black10"><?php  echo $rowshipping["shipping_user_email"];?></td>
                        </tr>
                          <?php if($rowshipping["shipping_user_phone"]!=''){ ?>
                      <tr>
                        <td align="right" valign="top"  class="black10" >Phone&nbsp;</td>
                        <td  class="black10">:</td>
                        <td  class="black10"><?php  echo $rowshipping["shipping_user_phone"];?></td>
                        </tr> 
                         <?php } ?>
                      <tr>
                        <td align="right" valign="top" class="black10" >Mobile </td>
                        <td class="black10">:</td>
                        <td class="black10"><?php  echo $rowshipping["shipping_user_mobile"];?></td>
                        </tr>
                      <tr>
                        <td height="10" colspan="4" align="right" class="black10"></td>
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
          <tr>
            <td bgcolor="#FFFFFF"></td>
            <td align="center" valign="top" bgcolor="#FFFFFF" height="10"></td>
          
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" valign="top" bgcolor="#FFFFFF">
            <?php
			 $query="update bill_master set bill_total_amount='".$totalmrpprice."',bill_total_discount='".$totaldiscountamount."',bill_total_shipping='".$totalshippingamt."',bill_final_amount='".$totalamountorder."' where bill_invoice_no='".base64_decode($_REQUEST["orderid"])."' ";
			mysql_query($query);
			?>
            <a href="index.php?content=15&orderid=<?php echo $_REQUEST["orderid"];?>"><img src="images/proceed.png" width="241" height="39" border="0" /></a></td>
            
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"></td>
            <td align="center" valign="top" bgcolor="#FFFFFF" height="10"></td>
          
          </tr>
          <tr>
            <td width="5" height="5"><img src="images/table1_05.png" width="5" height="5" /></td>
            <td bgcolor="#FFFFFF"></td>
          
          </tr>
        </table></td>      
      </tr>
      <tr>
        <td height="5" colspan="5"></td>
        </tr>
    </table></td>
   
  </tr>

</table>
