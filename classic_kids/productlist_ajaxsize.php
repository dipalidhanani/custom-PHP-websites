<?php session_start();
	  include("include/config.php");
	  require_once("include/function.php");
	  u_Connect("cn");
?>    
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
								
	$queryproduct="select * from product_mast";	
	
									if($_GET["type"]!="")
									{
										$queryproduct=$queryproduct." INNER JOIN product_category ON product_category.Product_mast_id=product_mast.Product_id";
									}
									if($_REQUEST["chksize"]!="")
									{
										$queryproduct=$queryproduct." INNER JOIN product_size ON product_size.product_mast_id=product_mast.Product_id";
									}
									if($_GET["colorid"]!="")
									{
										$queryproduct=$queryproduct." INNER JOIN product_colors ON product_colors.product_master_ID=product_mast.Product_id";
									}
									if(($_REQUEST["type"]!="") || ($_REQUEST["colorid"]!="") || ($_REQUEST["chksize"]!=""))
									{
										$queryproduct=$queryproduct." where Product_active_status=1 and Product_quantity > 0";
									}
									if($_GET["type"]!="")
									{
										$queryproduct=$queryproduct." and product_category.Category_mast_id='".$_GET["type"]."'";
									}
									if($_GET["colorid"]!="")
									{
										$queryproduct=$queryproduct." and product_colors.color_master_ID='".$_GET["colorid"]."'";
									}
									
									$totalcheck=count($_REQUEST["chksize"]);
									
	if($_REQUEST["chksize"]!="")
	{ $s=1;
		foreach($_REQUEST["chksize"] as $selectedsize) 
		{ 
			$psize[$s]=$selectedsize;
			if($totalcheck==1){$queryproduct.=" and product_size.size_mast_id='".$psize[$s]."'";}
			else if($s==1){
			$queryproduct.=" and (product_size.size_mast_id='".$psize[$s]."'";	
			}else{
			$queryproduct.=" or product_size.size_mast_id='".$psize[$s]."'";	
			}
			
			$s++;
		}
		if($totalcheck>1){$queryproduct.=")";}	
		$queryproduct.=" group by product_mast.Product_id";	
	}
									
				//echo $queryproduct;			
							
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
						 }  } else { $errmsg="No Products Found Related to your search!"; } 
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
            