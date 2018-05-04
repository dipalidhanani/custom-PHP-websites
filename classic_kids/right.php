<?php $now = date("Y-m-d H:i:s"); ?>
<link href="css/css-home.css" rel="stylesheet" type="text/css">

<form name="frmkids" id="frmkids" >
<table width="235" border="0" cellspacing="0" cellpadding="0"  class="black10">
    <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td height="103" align="left" valign="bottom" style="background:url(images/lift_01.png) no-repeat;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="center" valign="middle" class="title_white"><strong>Shop by</strong></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                </table></td>
            </tr>
            <tr>
                <td style="background:url(images/lift_02.png) repeat-y;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="15">&nbsp;</td>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                         <?php
						  $v_recordsetsubcategory = mysql_query("select * from category_master where parent_category_ID='".$_REQUEST["type"]."'",$cn);
						  if(mysql_num_rows($v_recordsetsubcategory)!=0)
						  {
						  ?>
                            <tr>
                                <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="bottom-border">
                                    <tr>
                                        <td height="25" bgcolor="#E8E8E8" class="title_pink"><strong>&nbsp;Select Your Category</strong></td>
                                    </tr>
                                    <tr>
                                        <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
                                           <?php
				
				 while($v_rowsubcategory = mysql_fetch_array($v_recordsetsubcategory,MYSQL_ASSOC))
				 {	
				?>
              <tr>
                <td><a href="index.php?content=1&type=<?php echo $v_rowsubcategory["category_ID"];?>"><?php echo $v_rowsubcategory["category_name"];?></a></td>
              </tr>
              <?php
				 }
				 ?>
                                        </table></td>
                                    </tr>
                                    <tr>
                                        <td height="5"></td>
                                    </tr>
                                </table></td>
                            </tr>
                            <tr>
                                <td height="10"></td>
                            </tr>
                            
  			<?php  } ?>
            
                            <tr>
                                <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="bottom-border">
                                    <tr>
                                        <td height="25" bgcolor="#E8E8E8" class="title_pink"><strong>&nbsp;Select Your Size</strong></td>
                                    </tr>
                                     <tr><td height="5"></td></tr>
                                    <tr>
                                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                <?php
				 $v_c=1;
				$v_recordsize = mysql_query("select * from size_mast order by size_id",$cn);
				while($v_rowsize = mysql_fetch_array($v_recordsize,MYSQL_ASSOC))
				{
				$v_c++;
				?>   
                <td class="black9">
                <input type="checkbox" name="chksize[]" value="<?php echo $v_rowsize["size_id"]; ?>" onclick="gfe2('ajaxsize','productlist_ajaxsize.php?type=<?php echo $_REQUEST["type"]; ?>',frmkids);" />
                <a href="index.php?content=1&type=<?php echo $_REQUEST["type"];?>&sizeid=<?php echo $v_rowsize["size_id"]; ?>"><?php echo $v_rowsize["size"]; ?></a></td>
                 <?php
			  if(($v_c%2)==1)
			  {
			  ?>
              </tr>
				<?php
                }
                }
                ?>  
                                        </table></td>
                                    </tr>
                                    <tr>
                                        <td height="5"></td>
                                    </tr>
                                </table></td>
                            </tr>
                              <tr>
                                <td height="10"></td>
                            </tr>
                            <tr>
                                <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="bottom-border">
                                    <tr>
                                        <td height="25" bgcolor="#E8E8E8" class="title_pink"><strong>&nbsp;Select Your Color</strong></td>
                                    </tr>
                                     <tr><td height="5"></td></tr>
                                    <tr>
                                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                <?php
				 $v_c=1;
				$v_recordcolor = mysql_query("select * from color_mast order by Color_id",$cn);
				while($v_rowcolor = mysql_fetch_array($v_recordcolor,MYSQL_ASSOC))
				{
				$v_c++;
				?>   
                <td><a href="#" onclick="gfe2('ajaxsize','productlist_ajaxsize.php?type=<?php echo $_REQUEST["type"]; ?>&colorid=<?php echo $v_rowcolor["Color_id"]; ?>',frmkids);"><img src="images/colors/<?php echo $v_rowcolor["Color_image"]; ?>" title="<?php echo $v_rowcolor["Color"]; ?>" border="0"/></a></td>
                 <?php
			  if(($v_c%9)==1)
			  {
			  ?>
              </tr>
				<?php
                }
                }
                ?>  
                                        </table></td>
                                    </tr>
                                    <tr>
                                        <td height="5"></td>
                                    </tr>
                                </table></td>
                            </tr>
                            
                          
                             <tr>
                                <td height="10"></td>
                            </tr>
                            <tr>
                                <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="bottom-border">
                                    <tr>
                                        <td height="25" bgcolor="#E8E8E8" class="title_pink"><strong>&nbsp;Best Selling Product</strong></td>
                                    </tr>
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
							bill_master.bill_master_ID=bill_products.Bill_Master_ID
						and
							(bill_master.bill_payment_status='Completed' 
							 or bill_master.bill_payment_status='Pending')
						group by bill_product_master_ID  
						order by mostselling desc 
						limit 1 ";				
						$b_recordsetproduct1 = mysql_query($b_queryproduct1,$cn);
						while($b_rowproduct1 = mysql_fetch_array($b_recordsetproduct1,MYSQL_ASSOC))
						 {	
						 	$mostsellproductid=$b_rowproduct1["bill_product_master_ID"];
						 }
						
						
						$b_queryproduct="select * from product_mast where Product_id='".$mostsellproductid."'";
						
						$b_recordsetproduct = mysql_query($b_queryproduct,$cn);
						 while($b_rowproduct = mysql_fetch_array($b_recordsetproduct,MYSQL_ASSOC))
						 {	
						 echo $b_rowproduct["bill_product_master_ID"];
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
						<td align="left" valign="top"><table width="145" border="0" cellpadding="0" cellspacing="0" class="border">
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
							  ?>
                              <a href="addtocart.php?productid=<?php echo $b_rowproduct["Product_id"];?>&quantity=1&avialable_colors=<?php echo $rowrecordsetproductcolor["Color"]; ?>">
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
                       
                        </tr>
                        <?php
						  }
						  $b_amountafterdiscount=0;
						  $b_discountamount=0;
						 }
						  ?>                    
                    </table></td>
          </tr>
                                    <tr>
                                        <td height="5"></td>
                                    </tr>
                                </table></td>
                            </tr>
                            <tr>
                                <td height="10"></td>
                            </tr>
                            <tr>
                                <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="bottom-border">
                                    <tr>
                                        <td height="25" bgcolor="#E8E8E8" class="title_pink"><strong>&nbsp;Mostly Viewed Products</strong></td>
                                    </tr>
                                    <tr>
      
        <td align="center" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="5" cellpadding="0">
          <tr>
            <td align="center" valign="middle"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <?php
						$v_c=1;
						$v_discountamount=0;
						$v_queryproduct="select * from product_mast order by product_total_hits desc limit 1";
						
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
						<td align="left" valign="top"><table width="145" border="0" cellpadding="0" cellspacing="0" class="border">
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
							  ?>
                              <a href="addtocart.php?productid=<?php echo $v_rowproduct["Product_id"];?>&quantity=1&avialable_colors=<?php echo $rowrecordsetproductcolor["Color"]; ?>">
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
                                    <tr>
                                        <td height="5"></td>
                                    </tr>
                                </table></td>
                            </tr>
                          
                            
                            </table></td>
                        <td width="15">&nbsp;</td>
                    </tr>
                </table></td>
            </tr>
            <tr>
                <td><img src="images/lift_03.png" width="235" height="21"></td>
            </tr>
        </table></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
</table>
</form>