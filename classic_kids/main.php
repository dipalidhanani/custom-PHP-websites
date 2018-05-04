<?php $now = date("Y-m-d H:i:s"); ?>
<tr>
        <td align="center" valign="top"><table width="960" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td><table width="960" border="0" align="center" cellpadding="0" cellspacing="0" class="border1">
                    <tr>
                        <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td height="35" bgcolor="#727272" style="background:url(images/tag_bg.jpg) repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="10">&nbsp;</td>
                                        <td align="left" valign="middle" class="title_black">Best <span class="title_white">Deals</span></td>
                                        <td align="right" valign="middle" class="white10">&nbsp;</td>
                                        <td width="10">&nbsp;</td>
                                    </tr>
                                </table></td>
                            </tr>
                            <tr>
                                <td align="left" valign="top">
                                <table border="0" cellspacing="11" cellpadding="0">
                      <tr>
                        <?php
						$v_c=1;
						$v_discountamount=0;
						$v_queryproduct="select * from product_offer
						INNER JOIN product_mast ON product_mast.Product_id=product_offer.Product_mast_id
						where End_date >='".$now."' order by Product_id desc limit 4";
						
						$v_recordsetproduct = mysql_query($v_queryproduct,$cn);
						 while($v_rowproduct = mysql_fetch_array($v_recordsetproduct,MYSQL_ASSOC))
						 {	
						 $v_c++;
						 
						
							 $v_offeramount=$v_rowproduct["offer_amt"];
							 $v_offeramounttype=$v_rowproduct["offer_type_id"];
							 
							 if($v_offeramounttype==1)
							 {
								 $v_discountamount=($v_rowproduct["Price"]*$v_offeramount)/100;
								 
								 $v_amountafterdiscount=$v_rowproduct["Price"]-$v_discountamount;
							 }
							 if($v_offeramounttype==2)
							 {
								 $v_discountamount=$v_offeramount;								 
								 $v_amountafterdiscount=$v_rowproduct["Price"]-$v_discountamount;
							 }
						 
						 
						?>
						<td align="left" valign="top" width="225"><table width="225" border="0" cellpadding="0" cellspacing="0" >                         
                             
                              <tr>
                                <td class="font10"><table width="100%" border="0" cellspacing="0" cellpadding="0">                                                       
                                 
                                    <tr>
                                                <td align="center" valign="top"><a href="index.php?content=2&productid=<?php echo $v_rowproduct["Product_id"];?>"><img src="photo/<?php echo $v_rowproduct["Product_display_medium_image"];?>" width="225" height="215" border="0" alt="<?php echo $v_rowproduct["Product_title"];?>" title="<?php echo $v_rowproduct["Product_title"];?>" /></a></td>
                                            </tr>
                                            <tr>
                                                <td height="33" align="center" valign="middle" bgcolor="#c0c0c0" class="black8"><?php echo $v_rowproduct["Product_title"];?></td>
                                            </tr>
                                   <tr>
                                                <td align="left" valign="top">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">        
                                   <tr>
                                                        <td width="5" valign="bottom"><img src="images/best_deals_tag_01.png" width="5" height="28" /></td>
                                                        <td width="92" align="center" valign="middle" bgcolor="#FF0000" class="white11">
                                                        <strong>
														<?php
														echo $v_rowproduct["offer_amt"];
														if($v_offeramounttype==1)
														{ echo "%"; }else{echo "Rs";} ?>&nbsp;
                                                        <?php 
														echo "OFF";
														?>
                                                        </strong></td>
                                                        <td width="5" valign="bottom"><img src="images/best_deals_tag_02.png" width="5" height="28" /></td>
                                                        <td align="center" valign="middle" bgcolor="#E96CC7" class="white10"><a href="index.php?content=2&productid=<?php echo $v_rowproduct["Product_id"];?>">View Product</a></td>
                                                        <td width="5" valign="bottom"><img src="images/best_deals_tag_03.png" width="5" height="28" /></td>
                                    </tr>
                                   </table></td></tr>
                                  </table></td>
                                </tr>
                              <tr>
                                <td height="5"></td>
                                </tr>
                            
                              
                          </table></td>
                       
                        <?php
						  if(($v_c%4)==1)
						  {
						  ?>
                        </tr>
                       
                        <?php
						  }
						  $v_amountafterdiscount=0;
						  $v_discountamount=0;
						  }
						  ?>                    
                    </table>
                                </td>
                            </tr>
                            </table></td>
                    </tr>
                </table></td>
            </tr>
        </table></td>
    </tr>
    <tr>
        <td height="10"></td>
    </tr>
    <tr>
        <td><table width="960" border="0" align="center" cellpadding="0" cellspacing="0" class="border1">
            <tr>
                <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td height="35" bgcolor="#727272" style="background:url(images/tag_bg.jpg) repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="10">&nbsp;</td>
                                <td align="left" valign="middle" class="title_black">Best <span class="title_white">Sellers</span></td>
                                <td align="right" valign="middle" class="white10">&nbsp;</td>
                                <td width="10">&nbsp;</td>
                            </tr>
                        </table></td>
                    </tr>
                    <tr>
                        <td align="left" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
          <tr>
            <td align="center" valign="middle"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <?php
						$b_c=1;
						$b_discountamount=0;
						
						$b_queryproduct1="select 
							count(bill_products.bill_product_master_ID) as mostselling,
							bill_products.bill_product_master_ID,
							bill_products.Bill_Master_ID,
							bill_master.bill_master_ID,
							bill_master.bill_payment_status
						from 
							bill_products,
							bill_master
							
						where							
							(bill_master.bill_payment_status='Completed' 
							 or bill_master.bill_payment_status='Pending')
						group by bill_product_master_ID  
						order by mostselling desc 
						limit 4 ";				
						$b_recordsetproduct1 = mysql_query($b_queryproduct1,$cn);
						while($b_rowproduct1 = mysql_fetch_array($b_recordsetproduct1,MYSQL_ASSOC))
						 {	
						 	$mostsellproductid=$b_rowproduct1["bill_product_master_ID"];
						 
						
						
						$b_queryproduct="select * from product_mast where Product_id='".$mostsellproductid."'";
						
						$b_recordsetproduct = mysql_query($b_queryproduct,$cn);
						 while($b_rowproduct = mysql_fetch_array($b_recordsetproduct,MYSQL_ASSOC))
						 {	
						
						 $b_c++;
						 
						 $b_recordsetproductoffer = mysql_query("select * from product_offer where Product_mast_id='".$b_rowproduct["Product_id"]."' and End_date >='".$now."'",$cn);
						 while($b_rowproductoffer = mysql_fetch_array($b_recordsetproductoffer,MYSQL_ASSOC))
						 {
							 $b_offeramount=$b_rowproductoffer["offer_amt"];
							 $b_offeramounttype=$b_rowproductoffer["offer_type_id"];
							 
							 if($b_offeramounttype==1)
							 {
								 $b_discountamount=($b_rowproduct["Price"]*$b_offeramount)/100;
								 
								 $b_amountafterdiscount=$b_rowproduct["Price"]-$b_discountamount;
							 }
							 if($b_offeramounttype==2)
							 {
								 $b_discountamount=$b_offeramount;								 
								 $b_amountafterdiscount=$b_rowproduct["Price"]-$b_discountamount;
							 }
							 
						 }
						 
						?>
						<td align="left" valign="top" width="235"><table width="235" border="0" cellpadding="0" cellspacing="0" <?php
						  if(($b_c%4)!=1)
						  {
						  ?> class="right-border" <?php } ?>>
                          <tr>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td height="190" align="center" valign="middle"><a href="index.php?content=2&productid=<?php echo $b_rowproduct["Product_id"];?>"><img src="photo/<?php echo $b_rowproduct["Product_display_medium_image"];?>" width="135" height="180" border="0" alt="<?php echo $b_rowproduct["Product_title"];?>" title="<?php echo $b_rowproduct["Product_title"];?>" /></a></td>
                                </tr>
                              <tr>
                                <td height="5"></td>
                                </tr>
                              <tr>
                                <td class="font10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                 <tr><td align="center" class="black9"><strong><?php echo $b_rowproduct["Product_title"];?></strong></td></tr>
                                 <tr><td height="5"></td></tr>
                                  <tr>                                   
                                    <td width="5" align="center" class="title_pink">
                                    <strong><?php
									if($b_discountamount!=0)
									{
									?>
                                    <del>$<?php echo $b_rowproduct["Price"];?></del>
                                    $<?php printf("%.2f",$b_amountafterdiscount);?>
                                    <?php 
									}
									else
									{
									?>
                                    $<?php echo $b_rowproduct["Price"];?>
                                    <?php
									}
									?></strong>
									
                                    </td>                                    
                                    </tr>
                                    <tr><td height="5"></td></tr>
                                    <tr>
                            <td colspan="3" align="center" class="font10">
                              <input type="hidden" name="productid" value="<?php echo $b_rowproduct["Product_id"];?>" />
                              <input type="hidden" name="mrpprice" value="<?php echo $b_rowproduct["Price"];?>" />
                              <input type="hidden" name="discount" value="<?php echo $b_discountamount;?>" />
                              <input type="hidden" name="amountafterdiscount" value="<?php echo $b_amountafterdiscount;?>" />
                              <?php $recordsetproductcolor = mysql_query("select * from product_colors
																 INNER JOIN color_mast ON color_mast.Color_id=product_colors.color_master_ID
																 where product_master_ID ='".$b_rowproduct["Product_id"]."' order by product_color_ID desc limit 1");
							  $rowrecordsetproductcolor=mysql_fetch_array($recordsetproductcolor);
							  
							  $recordsetproductsize = mysql_query("select * from product_size
																 INNER JOIN size_mast ON size_mast.size_id=product_size.size_mast_id
																 where product_mast_id ='".$b_rowproduct["Product_id"]."' order by size_mast_id asc limit 1");
							  $rowrecordsetproductsize=mysql_fetch_array($recordsetproductsize);
							  ?>
                              <a href="addtocart.php?productid=<?php echo $b_rowproduct["Product_id"];?>&quantity=1&avialable_colors=<?php echo $rowrecordsetproductcolor["Color"]; ?>&avialable_size=<?php echo $rowrecordsetproductsize["size_id"]; ?>">
                              <img src="images/add_to_cart.png" width="150" height="29" border="0" /></a></td>
                             </tr>
                          
                                  </table></td>
                                </tr>
                              <tr>
                                <td height="5"></td>
                                </tr>
                            
                              </table></td>
                            </tr>
                          </table></td>
                       
                        <?php
						  if(($b_c%4)==1)
						  {
						  ?>
                        </tr>
                        <tr>
                        <td align="center" valign="top">&nbsp;</td>
                        <td align="center" valign="top">&nbsp;</td>
                        </tr>
                        <?php
						  }
						  $b_amountafterdiscount=0;
						  $b_discountamount=0;
						  } }
						  ?>                    
                    </table></td>
          </tr>
        </table></td>
                    </tr>
                </table></td>
            </tr>
        </table></td>
    </tr>
    <tr>
        <td height="10"></td>
    </tr>
    <tr>
        <td><table width="960" border="0" align="center" cellpadding="0" cellspacing="0" class="border1">
            <tr>
                <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td height="35" bgcolor="#727272" style="background:url(images/tag_bg.jpg) repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="10">&nbsp;</td>
                                <td align="left" valign="middle" class="title_black">Latest<span class="title_white"> Arrivals</span></td>
                                <td align="right" valign="middle" class="white10">&nbsp;</td>
                                <td width="10">&nbsp;</td>
                            </tr>
                        </table></td>
                    </tr>
                    <tr>
                        <td align="left" valign="top"><table width="100%" border="0" cellspacing="10" cellpadding="0">
                            <tr>
                                <td align="center" valign="top"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <?php
						$v_c=1;
						$v_discountamount=0;
						$v_queryproduct="select * from product_mast order by Product_id desc limit 4";
						
						$v_recordsetproduct = mysql_query($v_queryproduct,$cn);
						 while($v_rowproduct = mysql_fetch_array($v_recordsetproduct,MYSQL_ASSOC))
						 {	
						 $v_c++;
						 
						 $v_recordsetproductoffer = mysql_query("select * from product_offer where Product_mast_id='".$v_rowproduct["Product_id"]."' and End_date >='".$now."'",$cn);
						 while($v_rowproductoffer = mysql_fetch_array($v_recordsetproductoffer,MYSQL_ASSOC))
						 {
							 $v_offeramount=$v_rowproductoffer["offer_amt"];
							 $v_offeramounttype=$v_rowproductoffer["offer_type_id"];
							 
							 if($v_offeramounttype==1)
							 {
								 $v_discountamount=($v_rowproduct["Price"]*$v_offeramount)/100;
								 
								 $v_amountafterdiscount=$v_rowproduct["Price"]-$v_discountamount;
							 }
							 if($v_offeramounttype==2)
							 {
								 $v_discountamount=$v_offeramount;								 
								 $v_amountafterdiscount=$v_rowproduct["Price"]-$v_discountamount;
							 }
						 }
						 
						?>
						<td align="left" valign="top" width="235"><table width="235" border="0" cellpadding="0" cellspacing="0" <?php
						  if(($v_c%4)!=1)
						  {
						  ?> class="right-border" <?php } ?>>
                          <tr>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td height="190" align="center" valign="middle"><a href="index.php?content=2&productid=<?php echo $v_rowproduct["Product_id"];?>"><img src="photo/<?php echo $v_rowproduct["Product_display_medium_image"];?>" width="135" height="180" border="0" alt="<?php echo $v_rowproduct["Product_title"];?>" title="<?php echo $v_rowproduct["Product_title"];?>" /></a></td>
                                </tr>
                              <tr>
                                <td height="5"></td>
                                </tr>
                              <tr>
                                <td class="font10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                 <tr><td align="center" class="black9"><strong><?php echo $v_rowproduct["Product_title"];?></strong></td></tr>
                                 <tr><td height="5"></td></tr>
                                  <tr>                                   
                                    <td width="5" align="center" class="title_pink">
                                    <strong><?php
									if($v_discountamount!=0)
									{
									?>
                                    <del>$<?php echo $v_rowproduct["Price"];?></del>
                                    $<?php printf("%.2f",$v_amountafterdiscount);?>
                                    <?php 
									}
									else
									{
									?>
                                    $<?php echo $v_rowproduct["Price"];?>
                                    <?php
									}
									?></strong>
									
                                    </td>                                    
                                    </tr>
                                    <tr><td height="5"></td></tr>
                                    <tr>
                            <td colspan="3" align="center" class="font10">
                              <input type="hidden" name="productid" value="<?php echo $v_rowproduct["Product_id"];?>" />
                              <input type="hidden" name="mrpprice" value="<?php echo $v_rowproduct["Price"];?>" />
                              <input type="hidden" name="discount" value="<?php echo $v_discountamount;?>" />
                              <input type="hidden" name="amountafterdiscount" value="<?php echo $v_amountafterdiscount;?>" />
                              <?php $recordsetproductcolor = mysql_query("select * from product_colors
																 INNER JOIN color_mast ON color_mast.Color_id=product_colors.color_master_ID
																 where product_master_ID ='".$v_rowproduct["Product_id"]."' order by product_color_ID desc limit 1");
							  $rowrecordsetproductcolor=mysql_fetch_array($recordsetproductcolor);
							   $recordsetproductsize = mysql_query("select * from product_size
																 INNER JOIN size_mast ON size_mast.size_id=product_size.size_mast_id
																 where product_mast_id ='".$v_rowproduct["Product_id"]."' order by size_mast_id asc limit 1");
							  $rowrecordsetproductsize=mysql_fetch_array($recordsetproductsize);
							  ?>
                              <a href="addtocart.php?productid=<?php echo $v_rowproduct["Product_id"];?>&quantity=1&avialable_colors=<?php echo $rowrecordsetproductcolor["Color"]; ?>&avialable_size=<?php echo $rowrecordsetproductsize["size_id"]; ?>"><img src="images/add_to_cart.png" width="150" height="29" border="0" /></a></td>
                             </tr>
                          
                                  </table></td>
                                </tr>
                              <tr>
                                <td height="5"></td>
                                </tr>
                            
                              </table></td>
                            </tr>
                          </table></td>
                       
                        <?php
						  if(($v_c%4)==1)
						  {
						  ?>
                        </tr>
                        <tr>
                        <td align="center" valign="top">&nbsp;</td>
                        <td align="center" valign="top">&nbsp;</td>
                        </tr>
                        <?php
						  }
						  $v_amountafterdiscount=0;
						  $v_discountamount=0;
						  }
						  ?>                    
                    </table></td>
                            </tr>
                        </table></td>
                    </tr>
                </table></td>
            </tr>
        </table></td>
    </tr>