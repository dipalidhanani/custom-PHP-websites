<?php
$now = date("Y-m-d");
$type=$_REQUEST["type"];
$colorid=$_REQUEST["colorid"];
$sortforprice=$_REQUEST["sortforprice"];
//$sortforpaging=$_REQUEST["sortforpaging"];

				function max_key($array) 
				{
					
					if($array!="")
					{
						foreach ($array as $key => $val) 
						{		
							if ($val == max($array)) 
							return $key;
						}
					}
				}
				
				function min_key($array) 
				{					
					if($array!="")
					{
						foreach ($array as $key => $val) 
						{		
							if ($val == min($array)) 
							return $key;
						}
					}
				}
?>
<link href="css/home.css" rel="stylesheet" type="text/css" />
<?php

							//if($_REQUEST["pagenum"]=="")
//							{
//								$pagenum = 1;
//								$a=1;
//								$arrayload=$_REQUEST["sortforpaging"];
//								$arrayloadstart=0;
//							}
//							else
//							{
//								
//								$pagenum=$_REQUEST["pagenum"];
//								
//								$arrayload=$pagenum*$_REQUEST["sortforpaging"];
//														
//								$arrayloadstart=$arrayload-20;
//																
//								$a=50;
//								$a=$a*($_REQUEST["pagenum"]-1);
//								$a=$a+1;
//							}
							
if($_REQUEST["sortforprice"]!="")
{
						$c=0;
						$discountamount=0;
						$queryproduct="select * from product_mast 
						INNER JOIN product_category ON product_category.Product_mast_id=product_mast.Product_id
						INNER JOIN product_colors ON product_colors.product_master_ID=product_mast.Product_id
						where Product_active_status=1 and Product_quantity > 0 ";
						if($_REQUEST["type"]!="")
						{
							$queryproduct=$queryproduct." and product_category.Category_mast_id='".$_REQUEST["type"]."'";
						}
						if($_REQUEST["colorid"]!="")
						{
							$queryproduct=$queryproduct." and product_colors.color_master_ID='".$_REQUEST["colorid"]."'";
						}
						if($_REQUEST["searchtext"]!="")
									{
										 $queryproduct=$queryproduct." and ( Product_title REGEXP '".$_REQUEST["searchtext"]."' or Product_code REGEXP '".$_REQUEST["searchtext"]."' )";
										
									}
						$queryproduct=$queryproduct." group by product_mast.Product_id";
						
						 $recordsetproduct = mysql_query($queryproduct,$cn);
						 while($rowproduct = mysql_fetch_array($recordsetproduct,MYSQL_ASSOC))
						 {
						
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
									 }
									 elseif($offeramounttype==2)
									 {
										 $discountamount=$offeramount;								 
										 $amountafterdiscount=$rowproduct["Price"]-$discountamount;
									 }
									 else
									 {
										 $amountafterdiscount=$rowproduct["Price"];
									 }
									 
									
								 }
							}
							else
							{
								$amountafterdiscount=$rowproduct["Price"];
							}
							 
							 $my_productid[$c]=$rowproduct["Product_id"];
							 $my_productprice[$c]=$amountafterdiscount;
						 
						 	 $amountafterdiscount=0;
						 	 $discountamount=0;
							$c++;
						 
						 }
						  
						  
}

				if($_REQUEST["type"]!="")
				{
					$recordsetproductcategory = mysql_query("select * from category_master where category_ID='".$_REQUEST["type"]."'",$cn);
						 if($rowproductcategory = mysql_fetch_array($recordsetproductcategory,MYSQL_ASSOC))
						 {
							$categoryname=$rowproductcategory["category_name"]; 
						 }
				}
					
?>
<table width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
        <td align="center" valign="top" class="black8"><table width="960" border="0" cellpadding="0" cellspacing="0" class="border1">
            <tr>
                <td width="100" align="center" bgcolor="#E96CC7" class="white8">You are here &gt;</td>
                <td width="5" bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF" class="black8"><a href="index.php" class="black8" >Home</a> / <?php echo $categoryname; if($_REQUEST["searchtext"]!=""){echo "Search Results";} ?></td>
            </tr>
        </table></td>
    </tr>
  <tr>   
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="5" colspan="5"></td>
      </tr>
      <tr>
        <td align="left" valign="top">
        
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="border1">
          <tr>
            <td colspan="2" align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                                <td height="35" colspan="2" bgcolor="#727272" style="background:url(images/tag_bg.jpg) repeat-x;">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="10">&nbsp;</td>
                                        <td align="left" valign="middle" class="title_black"><span class="title_white">
                                         <?php	echo $categoryname;	
										 if($_REQUEST["searchtext"]!=""){echo "Search Results";}
										 ?>
                                        </span></td>
                                       
                                        <td width="10">&nbsp;</td>
                                    </tr>
                                </table></td>
       </tr>
            </table></td>
           
          </tr>
          <tr>
            <td width="5" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="5" cellpadding="0" id="ajaxsize">
            <?php if($_REQUEST["searchtext"]==""){	?>
              <tr>
                <td><table width="100%" border="0" cellspacing="5" cellpadding="0">
                <form name="productsortform" method="get" action="index.php">
                <input type="hidden" name="content" value="1" />
                <input type="hidden" name="type" value="<?php echo $_REQUEST["type"];?>" />
                  <tr>
                  
                    <td width="220" align="left" valign="middle">
                    <select name="sortforprice" id="sortforprice" style="width:200px" onchange="this.form.submit();" class="tb7combo">
                      <option value="">Sort Item by</option>
                      <option value="1"<?php print($_REQUEST["sortforprice"])==1?"Selected":"";?>>Offer Products</option>
                      <option value="2"<?php print($_REQUEST["sortforprice"])==2?"Selected":"";?>>Minimum Price</option>
                      <option value="3"<?php print($_REQUEST["sortforprice"])==3?"Selected":"";?>>Maximum Price</option>
                    </select></td>
                   <?php /*?> <td align="left" valign="middle">
                    <select name="sortforpaging" id="sortforpaging"  style="width:200px" onchange="this.form.submit();" class="tb7combo">
                      <option value="20"<?php print($_REQUEST["sortforpaging"])==20?"Selected":"";?>>View 20 Items per page</option>
                      <option value="40"<?php print($_REQUEST["sortforpaging"])==40?"Selected":"";?>>View 40 Items per page</option>
                      <option value="60"<?php print($_REQUEST["sortforpaging"])==60?"Selected":"";?>>View 60 Items per page</option>
                    </select></td>
                    <td>&nbsp;</td><?php */?>
                  </tr>                  
                  </form>
                </table></td>
              </tr>
              <?php } ?>
              <tr>
                <td align="left" valign="top">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                 
                  <tr>
                    <td>
                        <form name="addtocartform" method="post" >   
                    <table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <?php
						$c=1;
						$discountamount=0;
						
							
						
						if(($_REQUEST["sortforprice"]=="")||($_REQUEST["sortforprice"]==1))
						{						
								
								if($_REQUEST["sortforprice"]=="")
								{
									$queryproduct="select * from product_mast ";
									if($_REQUEST["type"]!="")
									{
										$queryproduct=$queryproduct." INNER JOIN product_category ON product_category.Product_mast_id=product_mast.Product_id";
									}
									if($_REQUEST["colorid"]!="")
									{
										$queryproduct=$queryproduct." INNER JOIN product_colors ON product_colors.product_master_ID=product_mast.Product_id";
									}
									if(($_REQUEST["type"]!="") || ($_REQUEST["colorid"]!="") || ($_REQUEST["searchtext"]!="")){$queryproduct=$queryproduct." where Product_active_status=1 and Product_quantity > 0";}
									if($_REQUEST["searchtext"]!="")
									{
										 $queryproduct=$queryproduct." and ( Product_title REGEXP '".$_REQUEST["searchtext"]."' or Product_code REGEXP '".$_REQUEST["searchtext"]."' )";
										
									}
									if($_REQUEST["type"]!="")
									{
										$queryproduct=$queryproduct." and product_category.Category_mast_id='".$_REQUEST["type"]."'";
									}
									if($_REQUEST["colorid"]!="")
									{
										$queryproduct=$queryproduct." and product_colors.color_master_ID='".$_REQUEST["colorid"]."'";
									}
									$queryproduct=$queryproduct." group by product_mast.Product_id";
									
									
								}
								if($_REQUEST["sortforprice"]==1)
								{
									$queryproduct="select * from product_mast									
									INNER JOIN product_offer ON product_offer.Product_mast_id=product_mast.Product_id";
									
									if($_REQUEST["type"]!="")
									{
										$queryproduct=$queryproduct." INNER JOIN product_category ON product_category.Product_mast_id=product_mast.Product_id";
									}									
									if($_REQUEST["colorid"]!="")
									{
										$queryproduct=$queryproduct." INNER JOIN product_colors ON product_colors.product_master_ID=product_mast.Product_id";
									}
									if(($_REQUEST["type"]!="") || ($_REQUEST["colorid"]!="") || ($_REQUEST["searchtext"]!=""))
									{
										$queryproduct=$queryproduct." where Product_active_status=1 and Product_quantity > 0 and product_offer.End_date >='".$now."'";
									}
									if($_REQUEST["searchtext"]!="")
									{
										 $queryproduct=$queryproduct." and ( Product_title REGEXP '".$_REQUEST["searchtext"]."' or Product_code REGEXP '".$_REQUEST["searchtext"]."' )";										
									}
									if($_REQUEST["type"]!="")
									{
										$queryproduct=$queryproduct." and product_category.Category_mast_id='".$_REQUEST["type"]."'";
									}
									if($_REQUEST["colorid"]!="")
									{
										$queryproduct=$queryproduct." and product_colors.color_master_ID='".$_REQUEST["colorid"]."'";
									}
									$queryproduct=$queryproduct." group by product_mast.Product_id ";
									
									
								}
						
						//echo $queryproduct;
						
						 // $recordsetproduct = mysql_query($queryproduct,$cn);
//						 
//						  $data = mysql_query($queryproduct) or die(mysql_error());
//						  $rows = mysql_num_rows($data);
//						  
//						   if($_REQUEST["sortforpaging"]=="")
//						   {
//						   		$page_rows = 20;
//						   }
//						   else
//						   {
//							   $page_rows=$_REQUEST["sortforpaging"];
//						   }
//		
//							//This tells us the page number of our last page
//							$last = ceil($rows/$page_rows);
//							
//							$max = ' limit ' .($pagenum - 1) * $page_rows .',' .$page_rows; 
//			
//							
//							$queryproduct=$queryproduct.$max;
							
							
							$data_p = mysql_query($queryproduct) or die(mysql_error());
							$totalrecords=mysql_num_rows($data_p);
			if($totalrecords>0){ 
			
						 while($rowproduct = mysql_fetch_array( $data_p ))
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
									 }
									 elseif($offeramounttype==2)
									 {
										 $discountamount=$offeramount;								 
										 $amountafterdiscount=$rowproduct["Price"]-$discountamount;
									 }
									 else
									 {
										 $amountafterdiscount=$rowproduct["Price"];
									 }
								 }
						 }
							else
							{
								$amountafterdiscount=$rowproduct["Price"];
							}
					
						?>
						<td align="left" valign="top" width="230"><table width="230" border="0" cellpadding="0" cellspacing="0" <?php
						  if(($c%3)!=1)
						  {
						  ?> class="right-border" <?php } ?>>
                          <tr>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td height="190" align="center" valign="middle" ><a href="index.php?content=2&type=<?php echo $_REQUEST["type"];?>&productid=<?php echo $rowproduct["Product_id"];?>"><img src="photo/<?php echo $rowproduct["Product_display_medium_image"];?>" width="135" height="180" border="0" alt="<?php echo $rowproduct["Product_title"];?>" title="<?php echo $rowproduct["Product_title"];?>" /></a></td>
                                </tr>
                              <tr>
                                <td height="5"></td>
                                </tr>
                              <tr>
                                <td class="font10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                 <tr><td align="center" class="black9"><strong><?php echo $rowproduct["Product_title"];?></strong></td></tr>
                                 <tr><td height="5"></td></tr>
                                  <tr>                                   
                                    <td width="5" align="center" class="title_pink">
                                  <strong>  <?php
									if($discountamount!=0)
									{
									?>
                                    <del>$<?php echo $rowproduct["Price"];?></del>
                                    $<?php printf("%.2f",$amountafterdiscount);?>
                                    <?php 
									}
									else
									{
									?>
                                    $<?php echo $rowproduct["Price"];?>
                                    <?php
									}
									?></strong>
									
                                    </td>                                    
                                    </tr>
                                    <tr><td height="5"></td></tr>
                                    <tr>
                            <td colspan="3" align="center" class="font10">
                              <input type="hidden" name="productid" value="<?php echo $rowproduct["Product_id"];?>" />
                              <input type="hidden" name="mrpprice" value="<?php echo $rowproduct["Price"];?>" />
                              <input type="hidden" name="discount" value="<?php echo $discountamount;?>" />
                              <input type="hidden" name="amountafterdiscount" value="<?php echo $amountafterdiscount;?>" />
                              <?php $recordsetproductcolor = mysql_query("select * from product_colors
																 INNER JOIN color_mast ON color_mast.Color_id=product_colors.color_master_ID
																 where product_master_ID ='".$rowproduct["Product_id"]."' order by product_color_ID desc limit 1");
							  $rowrecordsetproductcolor=mysql_fetch_array($recordsetproductcolor);
							  ?>
                              <a href="addtocart.php?productid=<?php echo $rowproduct["Product_id"];?>&quantity=1&avialable_colors=<?php echo $rowrecordsetproductcolor["Color"]; ?>">
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
						  if(($c%3)==1)
						  {
						  ?>
                        </tr>
                        <tr>
                        <td align="center" valign="top">&nbsp;</td>
                       
                        </tr>
                        <?php
						  }
						  $amountafterdiscount=0;
						  $discountamount=0;
						 }  } else { $errmsg="No Products Found Related to your search!"; } }
						 
							else
							{
								    $array =  $my_productprice;	
									$array_count=count($array);    
									
									
						 			 $rows = $array_count;
									
									for($i=1;$i<=$array_count;$i++)
									{ 
										if($_REQUEST["sortforprice"]==2)
										{
											$max_val[$i]=min_key($array);
										}
										if($_REQUEST["sortforprice"]==3)
										{
											$max_val[$i]=max_key($array);
										}
										
										$view=$array[$max_val[$i]];
										
										unset($array[$max_val[$i]]); 
									
																				
										
									
									$queryproduct="select * from product_mast 
								INNER JOIN product_category ON product_category.Product_mast_id=product_mast.Product_id
								INNER JOIN product_colors ON product_colors.product_master_ID=product_mast.Product_id
								where Product_active_status=1 and Product_quantity > 0 and Product_id='".$my_productid[$max_val[$i]]."' ";
								if($_REQUEST["type"]!="")
								{
									$queryproduct=$queryproduct." and product_category.Category_mast_id='".$_REQUEST["type"]."'";
								}
								if($_REQUEST["colorid"]!="")
								{
									$queryproduct=$queryproduct." and product_colors.color_master_ID='".$_REQUEST["colorid"]."'";
								}
								$queryproduct=$queryproduct." group by product_mast.Product_id";
						
						
									 $recordsetproduct = mysql_query($queryproduct,$cn);
									 
								
		
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
										 }
										 if($offeramounttype==2)
										 {
											 $discountamount=$offeramount;								 
											 $amountafterdiscount=$rowproduct["Price"]-$discountamount;
										 }else
									 {
										 $amountafterdiscount=$rowproduct["Price"];
									 }
								 }
								 }
									else
									{
										$amountafterdiscount=$rowproduct["Price"];
									}
						 
						?>
						<td align="left" valign="top" width="230"><table width="230" border="0" cellpadding="0" cellspacing="0" <?php
						  if(($c%3)!=1)
						  {
						  ?> class="right-border" <?php } ?>>
                          <tr>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td height="190" align="center" valign="middle"><a href="index.php?content=2&type=<?php echo $_REQUEST["type"];?>&productid=<?php echo $rowproduct["Product_id"];?>"><img src="photo/<?php echo $rowproduct["Product_display_medium_image"];?>" width="135" height="180" border="0" alt="<?php echo $rowproduct["Product_title"];?>" title="<?php echo $rowproduct["Product_title"];?>" /></a></td>
                                </tr>
                              <tr>
                                <td height="5"></td>
                              </tr>
                              <tr>
                                <td class="font10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                 <tr><td align="center" class="black9"><strong><?php echo $rowproduct["Product_title"];?></strong></td></tr>
                                 <tr><td height="5"></td></tr>
                                  <tr>                                   
                                    <td width="5" align="center" class="title_pink">
                                    <strong><?php
									if($discountamount!=0)
									{
									?>
                                    <del>$<?php echo $rowproduct["Price"];?></del>
                                    $<?php printf("%.2f",$amountafterdiscount);?>
                                    <?php 
									}
									else
									{
									?>
                                    $<?php echo $rowproduct["Price"];?>
                                    <?php
									}
									?></strong>
									
                                    </td>                                    
                                    </tr>
                                    <tr><td height="5"></td></tr>
                                    <tr>
                            <td colspan="3" align="center" class="font10">
                              <input type="hidden" name="productid" value="<?php echo $rowproduct["Product_id"];?>" />
                              <input type="hidden" name="mrpprice" value="<?php echo $rowproduct["Price"];?>" />
                              <input type="hidden" name="discount" value="<?php echo $discountamount;?>" />
                              <input type="hidden" name="amountafterdiscount" value="<?php echo $amountafterdiscount;?>" />
                              <?php $recordsetproductcolor = mysql_query("select * from product_colors
																 INNER JOIN color_mast ON color_mast.Color_id=product_colors.color_master_ID
																 where product_master_ID ='".$rowproduct["Product_id"]."' order by product_color_ID desc limit 1");
							  $rowrecordsetproductcolor=mysql_fetch_array($recordsetproductcolor);
							  ?>
                              <a href="addtocart.php?productid=<?php echo $rowproduct["Product_id"];?>&quantity=1&avialable_colors=<?php echo $rowrecordsetproductcolor["Color"]; ?>">
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
						  if(($c%3)==1)
						  {
						  ?>
                        </tr>
                        <tr>
                        <td align="center" valign="top">&nbsp;</td>
                       
                        </tr>
                        <?php
										  }
										  $amountafterdiscount=0;
										  $discountamount=0;
										 }			
										
										 }
							}
						  ?>                    
                    </table>
                    </form>
                    </td>
                  </tr>
                  <tr>
                    <td height="10"></td>
                  </tr>
                 <?php /*?> <tr>
                    <td><table width="100%" border="0" cellspacing="5" cellpadding="0">
                      <tr>
                        <td align="left" valign="middle" class="font10">&nbsp;</td>
                        <td height="25" align="right" valign="middle" class="font10"><strong><?php 


if(($rows!="")&&($arrayload!=$rows))
{
if ($pagenum == 1)
{
}
else
{
echo " <a href='{$_SERVER['PHP_SELF']}?content=1&pagenum=1&type=$type&colorid=$colorid&sortforprice=$sortforprice&sortforpaging=$sortforpaging'> <<- First</a> ";
echo " ";
$previous = $pagenum-1;
echo " <a href='{$_SERVER['PHP_SELF']}?content=1&pagenum=$previous&type=$type&colorid=$colorid&sortforprice=$sortforprice&sortforpaging=$sortforpaging'> <- Previous</a> ";
}

//just a spacer

echo "|";

//This does the same as above, only checking if we are on the last page, and then generating the Next and Last links
if ($pagenum == $last)
{
}
else {
$next = $pagenum+1;

echo " <a href='{$_SERVER['PHP_SELF']}?content=1&pagenum=$next&type=$type&colorid=$colorid&sortforprice=$sortforprice&sortforpaging=$sortforpaging'>Next -></a> ";
echo " ";
echo " <a href='{$_SERVER['PHP_SELF']}?content=1&pagenum=$last&type=$type&colorid=$colorid&sortforprice=$sortforprice&sortforpaging=$sortforpaging'>Last ->></a> ";
}
} ?></strong></td>
                      </tr>
                    </table></td>
                  </tr><?php */?>
                </table></td>
              </tr>
              <?php if($errmsg!=""){ ?>
                 <tr><td class="title_red" align="center" colspan="3"><?php echo $errmsg; ?></td></tr>
                 <tr><td  height="10"></td></tr>
                 <?php } 
				 if(($_REQUEST["sortforprice"]!="") && ($_REQUEST["sortforprice"]!=1))
						{
                   if($array_count==0){ 
											
				?>
                <tr><td class="title_red" align="center" colspan="3">No Products Found Related to your search!</td></tr>
                 <tr><td  height="10"></td></tr>
                <?php	} } ?>
            </table></td>
           
          </tr>
      
        </table>
        
        </td>
       <td width="10">&nbsp;</td>
       <td width="200" align="left" valign="top"><?php include("right.php"); ?></td>
      </tr>
      <tr>
        <td height="5" colspan="5"></td>
        </tr>
    </table></td>
    
  </tr>
 
</table>
