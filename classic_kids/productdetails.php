<?php
$now = date("Y-m-d");
?>

 
 <link type="text/css" rel="stylesheet" href="rating/jquery.ratings.css" />
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
    <script src="rating/jquery.ratings.js"></script>
    <script src="rating/example.js"></script>
<?php 
if($_REQUEST["type"]!="")
				{
					$recordsetproductcategory = mysql_query("select * from category_master where category_ID='".$_REQUEST["type"]."'",$cn);
						 if($rowproductcategory = mysql_fetch_array($recordsetproductcategory,MYSQL_ASSOC))
						 {
							$categoryname=$rowproductcategory["category_name"]; 
						 }
				}
				$recordsetproduct = mysql_query("select * from product_mast where Product_id='".$_REQUEST["productid"]."'",$cn);
						 if($rowproduct = mysql_fetch_array($recordsetproduct,MYSQL_ASSOC))
						 {
							$productname=$rowproduct["Product_title"]; 
						 }
				
				
?>

<table width="960" border="0" cellspacing="0" cellpadding="0">
   <tr>
        <td align="center" valign="top"><table width="960" border="0" cellpadding="0" cellspacing="0" class="border1">
            <tr>
                <td width="100" align="center" bgcolor="#E96CC7" class="white8">You are here &gt;</td>
                <td width="5" bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF" class="black8"><a href="index.php" class="black8">Home</a> / <a href="javascript:history.go(-1);"><?php echo $categoryname; ?></a> / <?php echo $productname; ?></td>
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
         <?php
						$c=1;
						$discountamount=0;
						
						$query="select * from product_mast 
						INNER JOIN product_category ON product_category.Product_mast_id=product_mast.Product_id
						where Product_id='".$_REQUEST["productid"]."'";
						
						if($_REQUEST["type"]!="")
						{
							$query=$query." and product_category.Category_mast_id='".$_REQUEST["type"]."'";
						}
						
						$query=$query." group by product_mast.Product_id";
						
						$recordsetproduct = mysql_query($query,$cn);
						 while($rowproduct = mysql_fetch_array($recordsetproduct,MYSQL_ASSOC))
						 {	
						 $c++;
						 
						 $recordsetproductoffer = mysql_query("select * from product_offer where Product_mast_id='".$rowproduct["Product_id"]."' and End_date >='".$now."'",$cn);
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
							 }
						 }
						 
						 $producthits=$rowproduct["product_total_hits"];
						 $producthits=$producthits+1;
						 $query="update product_mast set product_total_hits='".$producthits."' where Product_id='".$_REQUEST["productid"]."'";
						 mysql_query($query);
						 
		 ?>
         <tr>
                <td colspan="2" height="35" align="left" valign="middle" bgcolor="#727272" style="background:url(images/tag_bg.jpg) repeat-x;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                   <td width="10"> </td>
                    <td align="left" valign="middle" class="title_black"><span class="title_white"><?php echo $rowproduct["Product_title"];?></span></td>
                  </tr>
                </table>
                </td>
              </tr>
          <tr>
          
            <td align="left" valign="top" bgcolor="#FFFFFF">
            <table width="100%" border="0" cellspacing="10" cellpadding="0">
           
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                  <td width="350" align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="350"><div class="zoom-section" style="width:350px;">
                          <div class="zoom-small-image">
                            <div id="wrap" style="top: 0px; z-index: 1; position: relative;"> 
                            <?php
							$recordsetproductimage1 = mysql_query("select * from product_mast where Product_id='".$_REQUEST["productid"]."' ",$cn);
						 if($rowproductimage1 = mysql_fetch_array($recordsetproductimage1,MYSQL_ASSOC))
							 {
							?>
                            <a style="position: relative; display: block;" href="photo/<?php echo $rowproductimage1["Product_display_full_image"];?>" class="cloud-zoom" id="zoom1" rel="adjustX: 10, adjustY:-4" > 
                            <img src="photo/<?php echo $rowproductimage1["Product_display_medium_image"];?>" alt="" border="0" title="<?php echo $rowproductimage1['Product_title']; ?>" style="display: block; max-height:600px; max-width:350px; width: expression(Math.min(parseInt(this.offsetWidth), 350 ) + 'px'); height: expression(Math.min(parseInt(this.offsetHeight), 600 ) + 'px');"   /></a>
                            
                              <div class="mousetrap" style="background-image: url(&quot;.&quot;); z-index: 999; position: absolute; left: 0px; top: 0px; cursor: move; max-height:600px; max-width:350px; width: expression(Math.min(parseInt(this.offsetWidth), 350 ) + 'px'); height: expression(Math.min(parseInt(this.offsetHeight), 600 ) + 'px');" ></div>
                            </div>
                          </div>
                          <div class="zoom-desc">
                            <p>
                            <a href="photo/<?php echo $rowproductimage1["Product_display_full_image"];?>" class="cloud-zoom-gallery" title="Red" rel="useZoom: 'zoom1', smallImage: 'photo/<?php echo $rowproductimage1["Product_display_medium_image"];?>' "> <img src="photo/<?php echo $rowproductimage1["Product_display_thumb_image"];?>" alt="Thumbnail 1" width="48" height="64" border="0" class="zoom-tiny-image" /></a>
                             <?php
							$recordsetproductimage = mysql_query("select * from product_image where Product_mast_id='".$_REQUEST["productid"]."' order by Image_id",$cn);
						 while($rowproductimage = mysql_fetch_array($recordsetproductimage,MYSQL_ASSOC))
							 {
								
							?>
                            <a href="photo/<?php echo $rowproductimage["Large_image"];?>" class="cloud-zoom-gallery" title="Red" rel="useZoom: 'zoom1', smallImage: 'photo/<?php echo $rowproductimage["Medium_image"];?>' "> <img src="photo/<?php echo $rowproductimage["Thumb_image"];?>" alt="Thumbnail 1" width="48" height="64" border="0" class="zoom-tiny-image" /></a>
                            <?php
							 }
							 ?>
                             <?php
							 }
							 ?>
                            </p>
                          </div>
                        </div></td>
                      </tr>
                      
                      <tr>
                      <td>
                      <table width="100%" border="0" cellspacing="5" cellpadding="2" background="images/bg1.jpg" style="background-repeat:repeat-x">
                         <form name="reviewform" method="post" action="process_rate.php?productid=<?php echo $_REQUEST["productid"];?>&type=<?php echo $_REQUEST["type"];?>" onsubmit="return validation_form();review_validate();">
                         <script language="javascript">

function validation_form()
{
		
	if(document.getElementById('review').value=='')
	{
		
		document.getElementById('errcomment').style.display='';
		
		return false;
			
	}
}
	</script>
    <script language="javascript">

function validation(id)
{
	
	if(id==1)
	{
		if(document.getElementById('review').value=='')
		{
			
			document.getElementById('errcomment').style.display='';
			
		}
		else
		{
			document.getElementById('errcomment').style.display='none';
		}
	}
	return false;
}
</script>
                         <script type="text/javascript">
                       function review_validate(){	
					  <?php if($_SESSION['loginuserid']=="")
							{
					  ?>
						  if( document.getElementById('review').value!=''){
							 alert("Please login to system to write reviews for product");
							 return false;
						  }
					  <?php } ?>
					   document.getElementById('rating_value_1').value=document.getElementById('example-rating-2').innerHTML;					  
					   }
					   
                         </script>
                       
      <tr>
        <td height="25" colspan="4" class="font10">
        <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #FBDDD3;padding-top:5px; padding-bottom:5px;border-bottom: 1px dotted #EDC3AD;padding-left:5px;">   
      <td class="lbl_ProductInfohead_css">Reviews & Rating</td>
      </table>
      </td>
      </tr>
      <tr>
        <td valign="top" class="font10" colspan="4" align="left">Write Your Review / Comments Here : </td>
      </tr>
      <tr>
        <td valign="top" class="font10" colspan="4" align="left"><textarea cols="30" rows="5" name="review" id="review" onblur="validation(1)" style="border: 1px solid #CCCCCC;"></textarea>
       <br /> <span id="errcomment" style="display:none" class="title_red" >Please Write Your Review/Comment</span></td>
      </tr>
      <tr>
        <td valign="top" class="font10" colspan="4" align="left">Rate This Product : </td>
      </tr>
      <tr>
        <td valign="top" class="font10" colspan="4" align="left">
        <table cellpadding="0" cellspacing="0" width="100%">
         <tr align="left">
        
         <td>
      
		
 <div id="example-2"></div> 
  <span id="example-rating-2"></span>
    <input type="hidden" id="rating_value_1" name="rating_value" />	
 </td>
 
 </tr></table>
 </td>
                          </tr>
                          <tr>
                            <td valign="top" class="font10" colspan="4" align="left"><input type="submit" name="submit" value="Submit" /></td>
                          </tr>
                          <tr>
                            <td valign="top" class="font10" colspan="4" align="left"></td>
                          </tr>
                         </form>
                      </table>
                      </td>
                      </tr>
                    </table></td>
                    
                    <td width="15">&nbsp;</td>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                   	<tr>
                        <td height="5"></td>
                      </tr>
                      <tr>
                        <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="botm">
                         <tr>
                          <td><table width="100%" cellpadding="0" cellspacing="0" style="border-bottom: 1px dotted gray; padding-bottom: 5px;">
                          <tr>
                            <td class="lbl_pro_name"><?php echo $rowproduct["Product_title"];?>
                            </td>
                         </tr>
                         </table></td>
                         </tr>
                          <tr>
                          <td><table width="100%" cellpadding="0" cellspacing="0" >
                          <tr>
                            <td width="50%"><table width="100%" cellpadding="0" cellspacing="0" style="border-right: 1px dotted gray; padding-top:5px; padding-bottom:5px;"> 
                            <tr>
                            <td class="lbl_mrp_css"><?php
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
									?></td>
                             </tr></table></td>
                            <td class="font10" width="50%" style="padding-left:5px;">Code : <?php echo $rowproduct["Product_code"];?></td>
                            </tr>
                            </table></td></tr>
                            <?php
							$proddesc=str_replace("<br />", " " , $rowproduct["Product_description"]);
							if(trim($proddesc)!="")
							{
							  ?>
                      <tr>
                      <td><table width="100%" cellpadding="0" cellspacing="0">       
                          <tr>
                          <td><table width="100%" cellpadding="0" cellspacing="0" style="background-color: #FBDDD3;padding-top:5px; padding-bottom:5px;border-bottom: 1px dotted #EDC3AD;padding-left:5px;">   
                          <td class="lbl_ProductInfohead_css">Product Details</td>
                          </table></td>
                          </tr> 
                          <tr>
                            <td class="black10"><?php echo $rowproduct["Product_description"]; ?></td>
                          </tr>
                       </table>
                       </td>
                       </tr>
                     
                       		 <?php
							  }
							  ?>
                            
                          </table></td>
                      </tr>
                     
                      <tr>
                        <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" background="images/bg1.jpg" style="background-repeat:repeat-x">
                         <form name="addtocartform" method="post" action="addtocart.php">   
                                              
                            <?php
							$recordsetproductsize = mysql_query("select * from size_mast 
							INNER JOIN product_size ON 	product_size.size_mast_id=size_mast.size_id						
							where product_size.product_mast_id='".$_REQUEST["productid"]."'
						",$cn);
							if(mysql_num_rows($recordsetproductsize)!=0)
							{
							?>
                         <tr>
                          <td colspan="4"><table width="100%" cellpadding="5" cellspacing="0" style="background-color: #F4F4F4;border-top: 1px dotted gray;"> 
                          <tr>
                            <td width="50" valign="top" class="font10">Size</td>
                            <td width="10" valign="top" class="font10">:</td>
                            <td colspan="2" valign="top" class="font10">
                              <table border="0" cellspacing="1" cellpadding="1">
                                
                                <tr>
                                  <td>
                                  <select name="avialable_size">
                                  <?php
							   $ss=1;
							
						     while($rowproductsize = mysql_fetch_array($recordsetproductsize,MYSQL_ASSOC))
							 {
							?>
                                  <option value="<?php echo $rowproductsize["size_id"];?>" <?php if($ss==1) { ?> selected="selected" <?php } ?>><?php echo $rowproductsize["size"];?></option>
                                  <?php
							   $ss++;
								 }
								?>
                                 </select>
                                 &nbsp;&nbsp;<a onclick="return hs.htmlExpand(this, { headingText: 'Size Chart' })" style="cursor:pointer; text-decoration:underline;" >SIZE CHART</a>
                                 <div class="highslide-maincontent" >
             <table width="100%" border="0" cellspacing="0" cellpadding="0" >
            <tr><td bgcolor="#cccccc">
            <table width="100%" border="0" cellspacing="1" cellpadding="4"  >
  <tr bgcolor="#FFFFFF">
    <td colspan="7" align="center" height="50" class="normal_fonts14_black"><strong>Australian Standard Size</strong></td>
    <td width="23%" align="center" class="normal_fonts14_black" style="color:#C06"><strong>Equivalent    Klassic Kids Size</strong></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="7">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="normal_fonts12_black" bgcolor="#FFFFFF">
    <td width="10%" height="29" align="center"><strong>Size</strong></td>
    <td width="13%" align="center"><strong>Age</strong></td>
    <td width="12%" align="center"><strong>Height</strong></td>
    <td width="14%" align="center"><strong>Weight</strong></td>
    <td width="10%" align="center"><strong>Chest</strong></td>
    <td width="10%" align="center"><strong>Waist</strong></td>
    <td width="8%" align="center"><strong>Hip</strong></td>
    <td align="center" style="color:#C06"><strong>Size</strong></td>
  </tr>
  <tr class="normal_fonts9" bgcolor="#FFFFFF">
    <td align="center">Triple 0</td>
    <td align="center">0 - 3 months</td>
    <td align="center">62</td>
    <td align="center">3 - 5 kg</td>
    <td align="center">44 cm</td>
    <td align="center">n.a</td>
    <td align="center">n.a</td>
    <td align="center" style="color:#C06">&quot; S &quot; or 14</td>
  </tr>
  <tr class="normal_fonts9" bgcolor="#FFFFFF">
    <td align="center">Double 0</td>
    <td align="center">3 - 6 months</td>
    <td align="center">68</td>
    <td align="center">5 - 7 kg</td>
    <td align="center">47 cm</td>
    <td align="center">n.a</td>
    <td align="center">n.a</td>
    <td align="center" style="color:#C06">&quot; S &quot; or 14</td>
  </tr>
  <tr class="normal_fonts9" bgcolor="#FFFFFF">
    <td align="center">Zero</td>
    <td align="center">6 - 9 months</td>
    <td align="center">74</td>
    <td align="center">7 - 9 kg</td>
    <td align="center">50 cm</td>
    <td align="center">n.a</td>
    <td align="center">n.a</td>
    <td align="center" style="color:#C06">&quot; M &quot; or 16</td>
  </tr>
  <tr class="normal_fonts9" bgcolor="#FFFFFF">
    <td align="center">1</td>
    <td align="center">12 months</td>
    <td align="center">80</td>
    <td align="center">9 - 11 kg</td>
    <td align="center">53 cm</td>
    <td align="center">n.a</td>
    <td align="center">n.a</td>
    <td align="center" style="color:#C06">&quot; L &quot; or 18 </td>
  </tr>
  <tr class="normal_fonts9" bgcolor="#FFFFFF">
    <td align="center">1</td>
    <td align="center">18 months</td>
    <td align="center">86</td>
    <td align="center">10.5 - 12.5 kg</td>
    <td align="center">53 cm</td>
    <td align="center">n.a</td>
    <td align="center">n.a</td>
    <td align="center" style="color:#C06">&quot; XL &quot; or 20</td>
  </tr>
  <tr class="normal_fonts9" bgcolor="#FFFFFF">
    <td align="center">2</td>
    <td align="center">2 years</td>
    <td align="center">92</td>
    <td align="center">12 - 14.5 kg</td>
    <td align="center">56 cm</td>
    <td align="center">54 cm</td>
    <td align="center">56 cm</td>
    <td align="center" style="color:#C06">&quot; XL &quot; or 20</td>
  </tr>
  <tr class="normal_fonts9" bgcolor="#FFFFFF">
    <td align="center">3</td>
    <td align="center">3 years</td>
    <td align="center">98</td>
    <td align="center">13.5 - 15 kg</td>
    <td align="center">58 cm</td>
    <td align="center">55 cm</td>
    <td align="center">59 cm</td>
    <td align="center" style="color:#C06">&quot; 22 &quot;</td>
  </tr>
  <tr class="normal_fonts9" bgcolor="#FFFFFF">
    <td align="center">4</td>
    <td align="center">4 years</td>
    <td align="center">104</td>
    <td align="center">15 - 18 kg</td>
    <td align="center">60 cm</td>
    <td align="center">56 cm</td>
    <td align="center">62 cm</td>
    <td align="center" style="color:#C06">&quot; 24 &quot;</td>
  </tr>
  <tr class="normal_fonts9" bgcolor="#FFFFFF">
    <td align="center">5</td>
    <td align="center">5 years</td>
    <td align="center">110</td>
    <td align="center">19 - 21 kg</td>
    <td align="center">62 cm</td>
    <td align="center">57 cm</td>
    <td align="center">64 cm</td>
    <td align="center" style="color:#C06">&quot; 24 &quot;</td>
  </tr>
  <tr class="normal_fonts9" bgcolor="#FFFFFF">
    <td align="center">6</td>
    <td align="center">6 years</td>
    <td align="center">116</td>
    <td align="center">22 - 25 kg</td>
    <td align="center">64 cm</td>
    <td align="center">58 cm</td>
    <td align="center">66 cm</td>
    <td align="center" style="color:#C06">&quot; 26 &quot;</td>
  </tr>
  <tr class="normal_fonts9" bgcolor="#FFFFFF">
    <td align="center">7</td>
    <td align="center">7 years</td>
    <td align="center">122</td>
    <td align="center">25 - 28 kg </td>
    <td align="center">66 cm</td>
    <td align="center">59 cm</td>
    <td align="center">68 cm</td>
    <td align="center" style="color:#C06">&quot; 26 &quot;</td>
  </tr>
  <tr class="normal_fonts9" bgcolor="#FFFFFF">
    <td align="center">8</td>
    <td align="center">8 years</td>
    <td align="center">128</td>
    <td align="center">30 - 32 kg</td>
    <td align="center">68 cm</td>
    <td align="center">60 cm</td>
    <td align="center">70 cm</td>
    <td align="center" style="color:#C06">&quot; 28 &quot;</td>
  </tr>
</table>
</td></tr></table>
             </div>
                                  </td>
                                 
                                  </tr>
                                
                                </table>
                            </td>
                            </tr>
                            </table></td></tr>
                            <?php
							}
							?>
                            
                          <tr>
                          <td colspan="4"><table width="100%" cellpadding="5" cellspacing="0" style="background-color: #F4F4F4;border-top: 1px dotted gray;">
                          <tr>
                            <td valign="top" class="font10" width="50" align="left">Color</td>
                            <td valign="top" class="font10" width="10" align="center">:</td>
                            <td colspan="2" valign="top" class="font10">
                              <table border="0" cellpadding="1" cellspacing="1">
                                <?php
							   $ss=1;
							
							$recordsetproductcolor = mysql_query("select * from product_colors
																 INNER JOIN color_mast ON color_mast.Color_id=product_colors.color_master_ID
																 where product_master_ID ='".$_REQUEST["productid"]."' order by product_color_ID desc",$cn);
						 while($rowproductcolor = mysql_fetch_array($recordsetproductcolor,MYSQL_ASSOC))
							 {
							?>
                                <tr>
                                  <td align="left" valign="top"><input type="radio" name="avialable_colors" value="<?php echo $rowproductcolor["Color"]?>" <?php if($ss==1) { ?> checked="checked" <?php } ?> /></td>
                                  <td align="left" valign="top">&nbsp;</td>
                                  <td align="left" valign="top"><img src="images/colors/<?php echo $rowproductcolor["Color_image"];?>" alt="<?php echo $rowproductcolor["Color"];?>" title="<?php echo $rowproductcolor["Color"];?>" height="23" width="23" /></td>
                                 </tr>
                                <?php
							  $ss++;
							 }
							?>
                                </table>
                            </td>
                            </tr>
                            
                            </table></td></tr>
                          <tr>
                          <td colspan="4"><table width="100%" cellpadding="5" cellspacing="0" style="background-color: #F4F4F4;border-top: 1px dotted gray;">
                          <tr>
                            <td valign="top" class="font10" align="left" width="50">Gender</td>
                            <td valign="top" class="font10" align="center" width="10">:</td>
                            <td colspan="2" valign="top" class="font10">
                            <?php
							echo $rowproduct["gender"];
												
							?>
                            </td>
                            </tr>
                          </table></td></tr>
                          
                            <?php
							if($rowproduct["Brand_mast_id"]!=0)
							{
								?>
                          <tr>
                          <td colspan="4"><table width="100%" cellpadding="5" cellspacing="0" style="background-color: #F4F4F4;border-top: 1px dotted gray;">
                          <tr>
                            <td valign="top" class="font10" align="left" width="50">Brand</td>
                            <td valign="top" class="font10" align="center" width="10">:</td>
                            <td colspan="2" valign="top" class="font10">
                            <?php						
							$recordsetbrand = mysql_query("select * from kid_brand_mast where kid_brand_id ='".$rowproduct["Brand_mast_id"]."'",$cn);
							while($rowbrand = mysql_fetch_array($recordsetbrand,MYSQL_ASSOC))
                            {
                                echo $rowbrand["kid_brand_name"];
                            }
							?>
                            </td>
                            </tr>
                            </table></td></tr>
                            <?php
							}							 
							  if($rowproduct["product_clothes_fabric"]!="")
							  {
							  ?>
                                <tr>
                          <td colspan="4"><table width="100%" cellpadding="5" cellspacing="0" style="background-color: #F4F4F4;border-top: 1px dotted gray;">
                              <tr>
                                <td class="font10" align="left" width="50">Fabric</td>
                                <td class="font10" align="center" width="10">:</td>
                                 <td colspan="2" valign="top" class="font10">
                                  <?php echo $rowproduct["product_clothes_fabric"];?></td>
                              </tr>
                              </table></td></tr>
                              <?php
							  }
							  ?>
    <script type="text/javascript">
    function hello()
	{ 
	var qty=parseInt(document.getElementById("quantity").value);
	var qty1=parseInt(document.getElementById("stockqty").value);
	
		if(qty > qty1)
		{
			alert("Out of stock !");
			document.getElementById("quantity").value=document.getElementById("stockqty").value;
		}
    }
    </script>
                            <tr>
                            
                          <td colspan="4"><table width="100%" cellpadding="5" cellspacing="0" style="background-color:#F4F4F4;border-top: 1px dotted gray;">							
                          <tr>
                            <td class="font10" align="left" width="50">Quantity</td>
                            <td class="font10" align="center" width="10">:</td>
                            <td><input name="quantity" type="text" id="quantity" size="5" value="1" onblur="hello();" />
                            <input type="hidden" name="stockqty" id="stockqty" value="<?php echo $rowproduct["Product_quantity"];?>" />
                            </td>                           
                            </tr>
                           </table></td></tr>
                          <tr>
                            <td height="5" colspan="4" class="font10"></td>
                            </tr>
                          <tr>
                            <td align="left" class="font10" width="160">
                              <input type="hidden" name="productid" value="<?php echo $_REQUEST["productid"];?>" />
                              <input type="hidden" name="mrpprice" value="<?php echo $rowproduct["Price"];?>" />
                              <input type="hidden" name="discount" value="<?php echo $discountamount;?>" />
                              <input type="hidden" name="amountafterdiscount" value="<?php echo $amountafterdiscount;?>" />
                              <input type="image" src="images/add_to_cart.png" width="150" height="29" border="0" /></td>
                            <td class="font10" colspan="3">
                              <?php					
							if($_SESSION['loginuserid']!="")
							{
							$now = date("Y-m-d H:i:s");							
							$today = mktime(date("H"),date("i"),date("s"),date("m"),date("d")+15,date("Y"));
							$after15days=date("Y-m-d H:i:s", $today);
														 
							$recordsetproductwishlist = mysql_query("select * from product_wishlist where wishlist_product_ID='".$_REQUEST["productid"]."' and wishlist_user_ID='".$_SESSION['loginuserid']."' and wishlist_datetime < '".$after15days."'",$cn);
							
							if(mysql_num_rows($recordsetproductwishlist)==0)
							{
	
							?>
                             <span class="wishadd">
                              <a style="color: #AD5192;cursor: pointer;font-family: Tahoma;font-size: 13px; font-weight: 500;" href="addtowishlist.php?type=<?php echo $_REQUEST["type"];?>&productid=<?php echo $_REQUEST["productid"];?>" onClick="return confirm('Do you want to add this product to your wishlist?');">Add To Wishlist</a>
                              </span>
                              <?php
							}
							else
							{
								?>
                                 <span class="wishremove">
                                 <a style="color: #AD5192;cursor: pointer;font-family: Tahoma;font-size: 13px; font-weight: 500;" href="removewishlist.php?type=<?php echo $_REQUEST["type"];?>&productid=<?php echo $_REQUEST["productid"];?>&remove=product" onClick="return confirm('Do you want to remove this product to your wishlist?');">Remove From Wishlist</a>
                                 </span>
                                <?php
							}
							}
							?>
                            </td>
                            </tr>
                            </form>
                          </table></td>
                      </tr>
                      <tr><td height="10"></td></tr>
                      
                        <tr>
                      <td><table width="100%" cellpadding="0" cellspacing="0">       
                          <tr>
                          <td><table width="100%" cellpadding="0" cellspacing="0" style="background-color: #FBDDD3;padding-top:5px; padding-bottom:5px;border-bottom: 1px dotted #EDC3AD;padding-left:5px;">   
                          <td class="lbl_ProductInfohead_css">RECENTLY VIEWED</td>
                          </table></td>
                          </tr> 
                          <tr>
                            <td class="black10">
                              <form name="addtocartform" method="post" action="addtocart.php">    
         <table width="100%" border="0" cellspacing="5" cellpadding="0">
          <tr>
            <td align="left" valign="middle"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <?php
						$v_c=1;
						$v_discountamount=0;
						$v_queryproduct="select * from product_mast order by product_total_hits desc limit 3";
						
						$v_recordsetproduct = mysql_query($v_queryproduct,$cn);
						 while($v_rowproduct = mysql_fetch_array($v_recordsetproduct,MYSQL_ASSOC))
						 {	
						 $v_c++;
						 
						 $v_recordsetproductoffer = mysql_query("select * from product_offer where Product_mast_id='".$v_rowproduct["Product_id"]."' and End_date >='".$v_now."'",$cn);
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
						<td align="left" valign="top" width="187"><table width="187" border="0" cellpadding="0" cellspacing="0" <?php
						  if(($v_c%3)!=1)
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
                                  <strong>  <?php
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
                              <img src="images/add_to_cart.png" width="150" height="29" border="0" /></a>
                                         </td>
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
						  if(($v_c%3)==1)
						  {
						  ?>
                        </tr>
                        <tr>
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
        </table>
      					  </form>
                            </td>
                          </tr>
                          
                       </table>
                       </td>
                       </tr>
                       <tr>
                      <td><table width="100%" cellpadding="0" cellspacing="0">       
                          <tr>
                          <td><table width="100%" cellpadding="0" cellspacing="0" style="background-color: #FBDDD3;padding-top:5px; padding-bottom:5px;border-bottom: 1px dotted #EDC3AD;padding-left:5px;">   
                          <td class="lbl_ProductInfohead_css">YOU MAY ALSO LIKE</td>
                          </table></td>
                          </tr> 
                          <tr>
                            <td class="black10">
                            <table width="100%" border="0" cellspacing="5" cellpadding="0">
          <tr>
            <td align="left" valign="middle">
              <form name="addtocartform" method="post" action="addtocart.php">    
            <table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <?php
						$v_c=1;
						$v_discountamount=0;
						$v_queryproduct="select * from product_category
						INNER JOIN product_mast ON product_mast.Product_id=product_category.Product_mast_id
						INNER JOIN category_master ON category_master.category_ID=product_category.Category_mast_id
						where Category_mast_id='".$_REQUEST["type"]."' and Product_mast_id!='".$_REQUEST["productid"]."' order by product_mast.Product_id desc limit 3";
						
						$v_recordsetproduct = mysql_query($v_queryproduct,$cn);
						 while($v_rowproduct = mysql_fetch_array($v_recordsetproduct,MYSQL_ASSOC))
						 {	
						 $v_c++;
						 
						 $v_recordsetproductoffer = mysql_query("select * from product_offer where Product_mast_id='".$v_rowproduct["Product_id"]."' and End_date >='".$v_now."'",$cn);
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
						<td align="left" valign="top" width="187"><table width="187" border="0" cellpadding="0" cellspacing="0" <?php
						  if(($v_c%3)!=1)
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
                                   <strong> <?php
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
                              <img src="images/add_to_cart.png" width="150" height="29" border="0" /></a>
                                         </td>
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
						  if(($v_c%3)==1)
						  {
						  ?>
                        </tr>
                        <tr>
                        <td align="center" valign="top">&nbsp;</td>
                        
                        </tr>
                        <?php
						  }
						  $v_amountafterdiscount=0;
						  $v_discountamount=0;
						 }
						  ?>                    
                    </table>
              </form>
            </td>
          </tr>
        </table>
                            </td>
                          </tr>
                       </table>
                       </td>
                       </tr>
                      <tr>
                        <td>&nbsp;</td>
                        </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td align="left" valign="top">&nbsp;</td>
              </tr>             
            </table></td>
            
          </tr>
         
          <?php
		     $amountafterdiscount=0;
			 $discountamount=0;
			 $shippingamt=0;
			 }
			 ?>
        </table></td>
      
      </tr>
    
    </table></td>
   
  </tr>
  
</table>
      <?php if($_GET["ratemsg"]==1){ ?>
                          <script type="text/javascript">
                          alert("Thanks for your feedback");
                          </script>
                          <?php } ?>
