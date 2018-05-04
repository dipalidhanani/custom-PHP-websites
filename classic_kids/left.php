<style type="text/css">

#coolmenu{
width: 238px;
background-color: #FFF;
}

#coolmenu a{
	font: normal 12px Arial;
	padding: 4px;
	display: block;
	width: 100%;
	color: #333;
	text-decoration: none;
	border-bottom-width: 1px;
	border-bottom-style: dotted;
	border-bottom-color: #CCC;
}

html>body #coolmenu a{ /*Non IE rule*/
width: auto;
}

#coolmenu a:hover{
background-color: #333;
color: white;
}

#tabledescription{
width: 100%;
height: 3em;
padding: 2px;
filter:alpha(opacity=0);
-moz-opacity:0;
}

</style>

<script type="text/javascript">

var baseopacity=0

function showtext(thetext){
if (!document.getElementById)
return
textcontainerobj=document.getElementById("tabledescription")
browserdetect=textcontainerobj.filters? "ie" : typeof textcontainerobj.style.MozOpacity=="string"? "mozilla" : ""
instantset(baseopacity)
document.getElementById("tabledescription").innerHTML=thetext
highlighting=setInterval("gradualfade(textcontainerobj)",50)
}

function hidetext(){
cleartimer()
instantset(baseopacity)
}

function instantset(degree){
if (browserdetect=="mozilla")
textcontainerobj.style.MozOpacity=degree/100
else if (browserdetect=="ie")
textcontainerobj.filters.alpha.opacity=degree
else if (document.getElementById && baseopacity==0)
document.getElementById("tabledescription").innerHTML=""
}

function cleartimer(){
if (window.highlighting) clearInterval(highlighting)
}

function gradualfade(cur2){
if (browserdetect=="mozilla" && cur2.style.MozOpacity<1)
cur2.style.MozOpacity=Math.min(parseFloat(cur2.style.MozOpacity)+0.2, 0.99)
else if (browserdetect=="ie" && cur2.filters.alpha.opacity<100)
cur2.filters.alpha.opacity+=20
else if (window.highlighting)
clearInterval(highlighting)
}

</script>
<table width="200" border="0" cellspacing="0" cellpadding="0">
  <?php
  $v_recordsetsubcategory = mysql_query("select * from category_master where parent_category_ID='".$_REQUEST["type"]."'",$cn);
  if(mysql_num_rows($v_recordsetsubcategory)!=0)
  {
  ?>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border1">
    
     <tr>
        <td colspan="2" height="35" align="left" valign="middle" bgcolor="#727272" style="background:url(images/tag_bg.jpg) repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
           <td width="10"> </td>
            <td align="left" valign="middle" class="title_black"><span class="title_white">Select Your Category</span></td>
          </tr>
        </table></td>
        
      </tr>
      <tr>      
        <td valign="top" bgcolor="#FFFFFF">
        <table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr>            
            <td><div id="coolmenu"><table width="100%" border="0" cellpadding="1" cellspacing="0">
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
              </table></div></td>
          </tr>
        </table>
        </td>
       
              </tr>
     
    </table></td>
  </tr>
  <tr>
    <td height="10"></td>
  </tr>
  <?php
  }
  ?>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border1">
      <tr>
        <td colspan="2" height="35" align="left" valign="middle" bgcolor="#727272" style="background:url(images/tag_bg.jpg) repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
           <td width="10"> </td>
            <td align="left" valign="middle" class="title_black"><span class="title_white">Select Your Color</span></td>
          </tr>
        </table></td>
        
      </tr>
      <tr>
        <td width="5" bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="5" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="2" cellpadding="0">
              <tr>
                <?php
				 $v_c=1;
				$v_recordcolor = mysql_query("select * from color_mast order by Color_id",$cn);
				while($v_rowcolor = mysql_fetch_array($v_recordcolor,MYSQL_ASSOC))
				{
				$v_c++;
				?>   
                <td><a href="index.php?content=1&type=<?php echo $_REQUEST["type"];?>&colorid=<?php echo $v_rowcolor["Color_id"]; ?>"><img src="images/colors/<?php echo $v_rowcolor["Color_image"]; ?>" alt="<?php echo $v_rowcolor["Color"]; ?>" title="<?php echo $v_rowcolor["Color"]; ?>" border="0"/></a></td>
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
        </table></td>
       
      </tr>
     
    </table></td>
  </tr>
  <tr>
    <td height="10"></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border1">
     <tr>
        <td colspan="2" height="35" align="left" valign="middle" bgcolor="#727272" style="background:url(images/tag_bg.jpg) repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
           <td width="10"> </td>
            <td align="left" valign="middle" class="title_black"><span class="title_white">Best Selling Product</span></td>
          </tr>
        </table></td>
        
      </tr>
      <tr>
        <td width="5" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="5" cellpadding="0">
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
							( bill_master.bill_payment_status='Completed' 
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
						 
						 $b_recordsetproductoffer = mysql_query("select * from product_offer where Product_mast_id='".$b_rowproduct["Product_id"]."' and End_date >='".$b_now."'",$cn);
						 while($b_rowproductoffer = mysql_fetch_array($b_recordsetproductoffer,MYSQL_ASSOC))
						 {
							 $b_offeramount=$b_rowproductoffer["Offer_amt"];
							 $b_offeramounttype=$b_rowproductoffer["Offer_type_id"];
							 
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
                                  <tr>
                                    <td width="5" align="left" valign="middle">&nbsp;</td>
                                    <td align="left" valign="middle"><?php echo $b_rowproduct["Product_code"];?></td>
                                    <td>&nbsp;</td>
                                    <td width="5" align="right">
                                    <?php
									if($b_discountamount!=0)
									{
									?>
                                    <del>&pound;<?php echo $b_rowproduct["Price"];?></del>
                                    &pound;<?php printf("%.2f",$b_amountafterdiscount);?>
                                    <?php 
									}
									else
									{
									?>
                                    &pound;<?php echo $b_rowproduct["Price"];?>
                                    <?php
									}
									?>
									
                                    </td>
                                    <td align="right">&nbsp;</td>
                                    </tr>
                                  </table></td>
                                </tr>
                              <tr>
                                <td height="5"></td>
                                </tr>
                              <tr>
                                <td height="3" bgcolor="#66CC33"></td>
                                </tr>
                              </table></td>
                            </tr>
                          </table></td>
                        <td width="20" align="center" valign="top">&nbsp;</td>
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
						 }
						  ?>                    
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
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border1">
       <tr>
        <td colspan="2" height="35" align="left" valign="middle" bgcolor="#727272" style="background:url(images/tag_bg.jpg) repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
           <td width="10"> </td>
            <td align="left" valign="middle" class="title_black"><span class="title_white">Mostly Viewed Products</span></td>
          </tr>
        </table></td>
        
      </tr>
      <tr>
        <td width="5" bgcolor="#FFFFFF">&nbsp;</td>
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
						 
						 $v_recordsetproductoffer = mysql_query("select * from product_offer where Product_mast_id='".$v_rowproduct["Product_id"]."' and End_date >='".$v_now."'",$cn);
						 while($v_rowproductoffer = mysql_fetch_array($v_recordsetproductoffer,MYSQL_ASSOC))
						 {
							 $v_offeramount=$v_rowproductoffer["Offer_amt"];
							 $v_offeramounttype=$v_rowproductoffer["Offer_type_id"];
							 
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
                                  <tr>
                                    <td width="5" align="left" valign="middle">&nbsp;</td>
                                    <td align="left" valign="middle"><?php echo $v_rowproduct["Product_code"];?></td>
                                    <td>&nbsp;</td>
                                    <td width="5" align="right">
                                    <?php
									if($v_discountamount!=0)
									{
									?>
                                    <del>&pound;<?php echo $v_rowproduct["Price"];?></del>
                                    &pound;<?php printf("%.2f",$v_amountafterdiscount);?>
                                    <?php 
									}
									else
									{
									?>
                                    &pound;<?php echo $v_rowproduct["Price"];?>
                                    <?php
									}
									?>
									
                                    </td>
                                    <td align="right">&nbsp;</td>
                                    </tr>
                                  </table></td>
                                </tr>
                              <tr>
                                <td height="5"></td>
                                </tr>
                              <tr>
                                <td height="3" bgcolor="#66CC33"></td>
                                </tr>
                              </table></td>
                            </tr>
                          </table></td>
                        <td width="20" align="center" valign="top">&nbsp;</td>
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
</table>
