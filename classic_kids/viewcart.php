<?php $now = date("Y-m-d H:i:s"); ?>
<link href="css/home.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
checked=false;
function checkedAll (viewcartform) {
	var aa= document.getElementById('viewcartform');
	 if (checked == false)
          {
           checked = true
          }
        else
          {
          checked = false
          }
	for (var i =0; i < aa.elements.length; i++) 
	{
	 aa.elements[i].checked = checked;
	}
      }
</script>
<!--<script language="javascript">
function validate_checkbox(checkfor)
{
var chks = document.getElementsByName('removefromcart[]');
var hasChecked = false;
for (var i = 0; i < chks.length; i++)
{
if (chks[i].checked)
{
hasChecked = true;
if(checkfor==1)
{
	return confirm('Do you want add selected items to your wishlist?');
}
if(checkfor==2)
{
	return confirm('Do you want to remove selected items from cart?');
}
break;
}
}
if (hasChecked == false)
{
alert("Please select at least one product.");
return false;
}
}
</script>-->
<table width="960" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td align="center" valign="top"><table width="960" border="0" cellpadding="0" cellspacing="0" class="border1">
            <tr>
                <td width="100" align="center" bgcolor="#E96CC7" class="white8">You are here &gt;</td>
                <td width="5" bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF" class="black8"><a href="index.php">Home</a> / Shopping Cart</td>
            </tr>
        </table></td>
    </tr>
  <tr>

    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="5" colspan="5"></td>
        </tr>
      <tr>
      
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border1">
          <form name="viewcartform" method="post" action="remove.php" id="viewcartform">
          <tr>
                <td colspan="2" height="35" align="left" valign="middle" bgcolor="#727272" style="background:url(images/tag_bg.jpg) repeat-x;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                   <td width="10"> </td>
                    <td align="left" valign="middle" class="title_black"><span class="title_white">Shopping Cart</span></td>
                  </tr>
                </table>
                </td>
              </tr>
          <tr>
          <?php		  
		  if($_SESSION['cartno']!=0)
		  {
		  ?>
          <tr>
            
            <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
                <td bgcolor="#E4E4E4">
                <table width="100%" border="0" cellspacing="2" cellpadding="3">
               
                  <tr>
                    <td width="20" bgcolor="#F0F0F0"><input type='checkbox' name='checkall' onclick='checkedAll(viewcartform);'></td>
                    <td bgcolor="#F0F0F0" class="font9"><strong>Products</strong></td>
                    <td width="30" align="center" valign="middle" bgcolor="#F0F0F0" class="font9"><strong>Qty</strong></td>
                    <td width="65" align="center" valign="middle" bgcolor="#F0F0F0" class="font9"><strong>Price</strong></td>                   
                    <td width="70" align="center" valign="middle" bgcolor="#F0F0F0" class="font9"><strong>Amount</strong></td>
                  </tr>
                   <?php	$totalqty=0;						  
                  	while(list($key,$proobj)=each($_SESSION['shopcart']))
					{
						$selectedproductid=$proobj['productid'];
						$selectedquantity=$proobj['quantity'];
						$selectedcolors=$proobj['avialable_colors'];
						$qsize=mysql_query("select * from size_mast where size_id='".$proobj['avialable_size']."'");
						$rsize=mysql_fetch_array($qsize);
						$selectedsize=$rsize['size'];
						$selectedprice=$proobj['price'];						
												
						$recordsetproduct = mysql_query("select * from product_mast where Product_id='".$selectedproductid."'",$cn);
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
                    ?>
                  <tr>
                    <td align="center" valign="top" bgcolor="#FFFFFF"><input type="checkbox" name="removefromcart[]" id="removefromcart" value="<?php echo $key;?>" /></td>
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
                                    <td class="font8">Code</td>
                                    <td class="font8">:</td>
                                    <td class="font8"><?php echo $rowproduct["Product_code"];?></td>
                                  </tr>
                                  <tr>
                                    <td class="font8">MRP Price</td>
                                    <td class="font8">:</td>
                                    <td class="font8">$<?php									
									printf("%.2f",$rowproduct["Price"]);
									?></td>
                                  </tr>
                                  <?php
									if($discountamount!=0)
									{
									?>
                                  <tr>
                                    <td class="font8">Discount</td>
                                    <td class="font8">:</td>
                                    <td class="font8">$<?php
									
									printf("%.2f",$discountamount);
									?></td>
                                  </tr>
                                  <tr>
                                    <td class="font8">Price</td>
                                    <td class="font8">:</td>
                                    <td class="font8">$<?php printf("%.2f",$amountafterdiscount);?></td>
                                  </tr>
                                  <?php
									}
								  ?>                                 
                                  <tr>
                                    <td class="font8">Selected Color</td>
                                    <td class="font8">:</td>
                                    <td class="font8"><?php echo $selectedcolors;?></td>
                                  </tr>
                                   <?php if($selectedsize!=""){ ?>
                                   <tr>
                                    <td class="font8">Selected Size</td>
                                    <td class="font8">:</td>
                                    <td class="font8"><?php echo $selectedsize;?></td>
                                  </tr>
                                   <?php  } ?>
                                   
                                </table></td>
                              </tr>
                            </table></td>
                          </tr>
                        </table></td>
                      </tr>
                      </table></td>
                    <td align="center" valign="top" bgcolor="#FFFFFF" class="font10"><?php echo $selectedquantity;?></td>
                    <td align="right" valign="top" bgcolor="#FFFFFF" class="font10">$<?php printf("%.2f",$payableamount*$selectedquantity);?></td>
                  
                    <td align="right" valign="top" bgcolor="#FFFFFF" class="font10">
                    <?php					
					$totalmrpprice=$totalmrpprice+($rowproduct["Price"]*$selectedquantity);

					$totaldiscountamount=$totaldiscountamount+($discountamount*$selectedquantity);
					
									
					$totalamountproduct=($payableamount*$selectedquantity);
					$totalamountorder=$totalamountorder+$totalamountproduct;
					?>
                   $<?php printf("%.2f",$totalamountproduct);?>
                    </td>
                  </tr>
					  <?php
					    $amountafterdiscount=0;
			 			$discountamount=0;
						$totalamountproduct=0;
                        }
                        }
                        ?>
                  <tr>
                    <td bgcolor="#FFFFFF">&nbsp;</td>
                    <td bgcolor="#FFFFFF">&nbsp;</td>
                    <td align="center" valign="middle" bgcolor="#FFFFFF" class="font10"><strong><?php echo $totalqty; ?></strong></td>
                    <td align="right" valign="middle" bgcolor="#FFFFFF"><strong>$<?php printf("%.2f",$totalmrpprice);?></strong></td>
                    <td align="right" valign="middle" bgcolor="#FFFFFF" class="font10"><strong>$<?php printf("%.2f",$totalamountorder);?></strong></td>
                  </tr>
                 
                </table></td>
              </tr>
              <tr>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    
                    <td width="62"><input type="image" src="images/deleteselected.png"  border="0"  onClick="return confirm('Do you want to remove selected items from cart?');" style="cursor:pointer;" /></td>
                    <td width="10">&nbsp;</td>
                    <td><a href="emptycart.php" onClick="return confirm('Do you want to delete all items from cart?');"><img src="images/emptycart.png" width="94" height="20" border="0" /></a></td>
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
              <tr>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>&nbsp;</td>
                    <td width="136"><a href="index.php"><img src="images/continue_shopping.png" width="136" height="20" border="0" /></a></td>
                    <td width="10">&nbsp;</td>
                    <td width="87">                
                    <a href="index.php?content=12"><img src="images/check_out.png" width="87" height="20" border="0" /></a></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          
          </tr>
          
       <?php
		  }
		  else
		  {
		  ?>
          <tr>
           
            <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="5" cellpadding="5">
              <tr>
                <td class="font10"><strong>Your shopping cart is empty. <span class="link"><a href="index.php">Click here</a></span> to start shopping.</strong></td>
              </tr>
            </table></td>
           
          </tr>
          <?php
		  }
		  ?>
         
           </form>
        </table></td>
       
      </tr>
    
    </table></td>
 
  </tr>
 
</table>
