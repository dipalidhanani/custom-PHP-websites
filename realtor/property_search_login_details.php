<?php session_start();
$_SESSION["pre_url"]="http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>
    <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
 <?php if($_SESSION['user_reg_id']=="")
{ 	$errormsg=$_GET["errormsg"];?>
 <table width="99%" border="0" cellspacing="0" cellpadding="0">
       <tr><td height="5"></td></tr>
          <tr>           
            <td>           
<form method="post" name="frmuserlogin" id="frmuserlogin" action="process_login.php" >
<table width="100%" border="0" cellspacing="10" cellpadding="0">
           <tr>
                            <td width="71%" class="title_red"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="25"><img src="images/arrow1.png" width="19" height="18"></td>
                                    <td class="title_red"><strong>Login</strong></td>
                                    </tr>
                                </table></td>
              </tr>
           <?php if($_GET["notifymsg"]=='prop_details'){ ?>   
         <tr><td class="black10" style="color:#AB2400;"> 
         Please Login First To Your 'RM Realtor' Account To View Property Details!
         </td></tr> 
         <?php } ?>
         
<tr> 
<td>
<table width="100%" border="0" cellspacing="5" cellpadding="5">
          <tr>
          <td width="177" class="black10"> Email Address : </td>
            <td width="1144"><input name="txtEmail" type="text" class="textcss" id="txtEmail" value="Email" size="24" onFocus="if(this.value == 'Email') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Email';}" tabindex="1"  /></td>
           
            
          </tr>
          
         
          <tr>
           <td class="black10"> Password : </td>
            <td><input name="txtPass" type="Password" class="textcss" id="txtPass" value="Password" size="24"   onFocus="if(this.value == 'Password') {this.value = '';}"  onBlur="if (this.value == '') {this.value = 'Password';}"  tabindex="2" /></td>
           
            </tr>
                  <tr><td colspan="3"> 
          <input type="hidden" name="process" value="login"  />
           
          <input type="submit" name="submit" value="Login"  tabindex="3"/>
            </td></tr>
          <?php
            	if($errormsg!="")
				{ ?>
          <tr>
            <td height="15" colspan="3" class="black10">
            <font color="#FF0000" >
            <strong><?php  echo $errormsg; ?></strong>
            </font>
            </td>
          </tr>
          <?php } ?>
          <tr>
            <td colspan="3" align="left" class="black10" style="color:#AB2400;"><a href="home.php?pageno=16" style="color:#AB2400;">New Registration</a> | <a href="#" style="color:#AB2400;" onClick="return alert('Please contact to our support team.')">Forgot Password?</a></td>
            </tr>
          </table></td></tr>
           <tr><td height="5"></td></tr>
          
        </table>
</form></td></tr></table>
<?php } else { ?>
<table width="99%" border="0" cellspacing="0" cellpadding="0">
      
          <tr>           
            <td>           

<table width="100%" border="0" cellspacing="10" cellpadding="0">
<tr>                                  
<td class="black9" ><strong><a href="index.php">Home</a></strong> > <strong><a href="home.php?pageno=20&ddlcity=<?php echo $_SESSION["city"]; ?>&areaid=<?php echo $_SESSION["areaid"]; ?>&areacode=<?php echo $_SESSION["areacode"]; ?>&ddlpost=<?php echo $_SESSION["ddlpost"]; ?>&ddlptype=<?php echo $_SESSION["ddlptype"]; ?>&ddlprop=<?php echo $_SESSION["ddlprop"]; ?>&minprice=<?php echo $_SESSION["minprice"]; ?>&maxprice=<?php echo $_SESSION["maxprice"]; ?>">Property Search</a></strong> > Property Information</td>
           </tr>
           <tr>
                            <td width="71%" class="title_red"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="25"><img src="images/arrow1.png" width="19" height="18"></td>
                                    <td class="title_red"><strong>Property Information</strong></td>
                                    </tr>
                                </table></td>
</tr>
          
<tr>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

<?php 


$queryprop="select * from property_propertydetail_master where property_propertydetail_id = '".$_GET["pid"]."'";


$data_p = mysql_query($queryprop) or die(mysql_error());
$totalrecords=mysql_num_rows($data_p);


$i=1;	
 while($rowprop = mysql_fetch_array($data_p))
 {	
 $qcity=mysql_query("select * from rm_city_master where rm_city_id='".$rowprop["property_propertydetail_city_id"]."'");
 $rowcity=mysql_fetch_array($qcity);
 
 $qarea=mysql_query("select * from rm_area_master where rm_area_id='".$rowprop["propperty_propertydetail_area_id"]."'");
 $rowarea=mysql_fetch_array($qarea);
 
 $qptype=mysql_query("select * from property_type_master where property_type_id='".$rowprop["property_propertdetail_property_type_id"]."'");
 $rowptype=mysql_fetch_array($qptype);
 

?>
          <tr>
          <td>
          <table width="100%" border="0" cellspacing="0" cellpadding="10" <?php if($totalrecords!=$i){ ?> style="border-bottom:1px dotted #999;" <?php } ?>  >          
         <tr>
           <td valign="top" colspan="5">
           <table width="100%" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #dddddd; border-radius:4px 4px 4px 4px;" >
            
           <tr><td valign="top" width="59%">
           <table cellspacing="0" cellpadding="5">
           
           <?php
		   
		   $city_name=$rowcity["rm_city_title"];
		   
		   $street_name=$rowcity["rm_area_title"];
		   
		   ?>
          
            <tr>
                                  
                                    <td class="black11" style="color:#AB2400; border-bottom:1px dotted #ccc;" align="left" colspan="2"><strong> Basic Details</strong></td>
                                  
           </tr>
             <?php if($rowprop["property_propertydetail_property_name"]!=''){ ?>
           <tr>
           <td class="black10" ><strong>Property Name : </strong><?php echo $rowprop["property_propertydetail_property_name"]; ?></td>
           </tr>
           <?php } ?>
           <tr>
           <td class="black9"><strong>Property For : </strong><?php echo $rowprop["property_propertydetail_postpropertyfor"]; ?></td>
           </tr>
          
           <tr>
           <td class="black10" ><strong>City :</strong> <?php echo $rowcity["rm_city_title"]; ?></td>
           </tr>
           <tr>
           <td class="black10"><strong>Street :</strong> <?php echo $rowarea["rm_area_title"]; ?></td>
           </tr>
           <tr>
           <td class="black10"><strong>Postal Code : </strong><?php echo $rowprop["propperty_propertydetail_area_code"]; ?></td>
           </tr>           
           <tr>
           <td class="black10"><strong>Property Type : </strong><?php echo $rowptype["property_type_name"]; ?></td>
           </tr>           
           <tr>
           <td class="black10"><strong>Property Price : </strong><?php echo "CAD $".number_format($rowprop["property_propertydetail_property_price"],2); ?></td>
           </tr>  
          
       
            <tr>
                                  
                                    <td class="black11" style="color:#AB2400; border-bottom:1px dotted #ccc;"" align="left" colspan="2"><strong>Property Area </strong></td>
                                  
           </tr>
            <tr>
           <td class="black10"><strong>Covered Area   :</strong> <?php echo number_format($rowprop["property_propertydetail_coveredarea_from"],2)."  ".$rowprop["property_propertydetail_coveredarea_type"]; ?></td>
           </tr>
            <tr>
           <td class="black10"><strong>Covered Area Rate :</strong> <?php echo "CAD $".number_format($rowprop["property_propertydetail_coveredarea_rate"],2); ?></td>
           </tr>
           <tr>
           <td class="black10"><strong>Covered Area Amount :</strong> <?php echo "CAD $".number_format($rowprop["property_propertydetail_coveredarea_amount"],2); ?></td>
           </tr>                  
            
            <tr>
           <td class="black10"><strong>Plot/land Area  : </strong><?php echo number_format($rowprop["property_propertydetail_landarea_from"],2)."  ".$rowprop["property_propertydetail_landarea_type"]; ?></td>
           </tr>
            <tr>
           <td class="black10"><strong>Plot/land Area Rate : </strong><?php echo "CAD $".number_format($rowprop["property_propertydetail_landarea_rate"],2); ?></td>
           </tr>
            <tr>
           <td class="black10"><strong>Plot/land Area Amount :</strong> <?php echo "CAD $".number_format($rowprop["property_propertydetail_landarea_amount"],2); ?></td>
           </tr>
             <?php if($rowprop["property_propertydetail_carpetarea_from"]!=0){ ?>
            <tr>
           <td class="black10"><strong>Carpet Area : </strong><?php echo number_format($rowprop["property_propertydetail_carpetarea_from"],2)."  ".$rowprop["property_propertydetail_carpetarea_type"]; ?></td>
           </tr>
           <?php  } ?>
             <?php if($rowprop["property_propertydetail_carpetarea_rate"]!=0){ ?>
            <tr>
           <td class="black10"><strong>Carpet Area Rate : </strong><?php echo "CAD $".number_format($rowprop["property_propertydetail_carpetarea_rate"],2); ?></td>
           </tr>
           <?php } ?>
             <?php if($rowprop["property_propertydetail_carpetarea_amount"]!=0){ ?>
            <tr>
           <td class="black10"><strong>Carpet Area Amount :</strong> <?php echo "CAD $".number_format($rowprop["property_propertydetail_carpetarea_amount"],2); ?></td>
           </tr>
         <?php } ?>
        <tr>
                                  
                                    <td class="black11" style="color:#AB2400;border-bottom:1px dotted #ccc;"" align="left" colspan="2"><strong> Additional Details</strong></td>
                                  
           </tr>
            <?php if($rowprop["property_propertydetail_parking_space"]!=""){ ?>
            <tr>
           <td class="black10"><strong>Parking Space Total :</strong> <?php echo $rowprop["property_propertydetail_parking_space"]; ?></td>
           </tr>
            <?php } ?>
           <?php if($rowprop["property_propertydetail_garage_facility"]==1){ ?>
            <tr>
           <td class="black10"><strong>Garage</strong></td>
           </tr>
           <?php } ?>
           <?php if($rowprop["property_propertydetail_airconditioning"]==1){ ?>
           <tr>
           <td class="black10"><strong>Airconditioning</strong></td>
           </tr>
           <?php } ?>
           <?php if($rowprop["property_propertydetail_pool"]==1){ ?>
           <tr>
           <td class="black10"><strong>Pool</strong></td>
           </tr>
           <?php } ?>
            <?php if($rowprop["property_propertydetail_annual_tax_amt"]!=""){ ?>
            <tr>
           <td class="black10"><strong>Annual Tax Amount : </strong><?php echo "CAD $".number_format($rowprop["property_propertydetail_annual_tax_amt"],2); ?></td>
           </tr>
            <?php } ?>
             <?php if($rowprop["property_propertydetail_parking_space"]!=""){ ?>
            <tr>
           <td class="black10"><strong>Tax Year :</strong> <?php echo $rowprop["property_propertydetail_tax_year"]; ?></td>
           </tr>
            <?php } ?>
        
           
        </table></td>
        <td width="41%" valign="top">
        
        <table cellpadding="5" cellspacing="0">
        <tr>
         <td class="black11" style="color:#AB2400;border-bottom:1px dotted #ccc;""><strong>Property Gallery</strong></td></tr>
         <tr><td height="1px"></td></tr>
           <tr>
           <td>
           <table width="128" cellpadding="0" cellspacing="0">
           <tr>
           <td style="border:1px solid #cccccc; padding:3px;">
        <?php if($rowprop["property_propertydetail_photo"]!=''){ ?>
            <a href="admin/uploadimages/property/<?php echo $rowprop["property_propertydetail_photo"]; ?>" rel="lightbox[plants]"  ><img src="admin/uploadimages/property/<?php echo $rowprop["property_propertydetail_photo"]; ?>" width="247" height="180"  border="0"/></a>
            <?php } else{ ?>
             <img src="images/noimage.jpg" width="247" height="180" border="0" />
            <?php } ?>
             <?php if($rowprop["property_propertydetail_photo2"]!=''){ ?>
            <a style="display:none;" href="admin/uploadimages/property/<?php echo $rowprop["property_propertydetail_photo2"]; ?>" rel="lightbox[plants]" ><img src="admin/uploadimages/property/<?php echo $rowprop["property_propertydetail_photo2"]; ?>" width="128" height="130" border="0"/></a>
            <?php } ?>
             <?php if($rowprop["property_propertydetail_photo3"]!=''){ ?>
            <a style="display:none;" href="admin/uploadimages/property/<?php echo $rowprop["property_propertydetail_photo3"]; ?>" rel="lightbox[plants]" ><img src="admin/uploadimages/property/<?php echo $rowprop["property_propertydetail_photo3"]; ?>" width="128" height="130" border="0"/></a>
            <?php } ?>
             <?php if($rowprop["property_propertydetail_photo4"]!=''){ ?>
            <a style="display:none;" href="admin/uploadimages/property/<?php echo $rowprop["property_propertydetail_photo4"]; ?>" rel="lightbox[plants]" ><img src="admin/uploadimages/property/<?php echo $rowprop["property_propertydetail_photo4"]; ?>" width="128" height="130" border="0"/></a>
            <?php } ?>
             <?php if($rowprop["property_propertydetail_photo5"]!=''){ ?>
            <a style="display:none;" href="admin/uploadimages/property/<?php echo $rowprop["property_propertydetail_photo5"]; ?>" rel="lightbox[plants]" ><img src="admin/uploadimages/property/<?php echo $rowprop["property_propertydetail_photo5"]; ?>" width="128" height="130" border="0"/></a>
            <?php } ?>            
            </td>
            </tr></table>
            </tr>
            <tr><td class="black10" style="color:#AB2400;" align="center">Click on image to view image gallary</td></tr>
         <tr>
                                  
                                    <td class="black11" style="color:#AB2400;border-bottom:1px dotted #ccc;"" align="left" colspan="2"><strong> Features</strong></td>
                                  
           </tr>
            <?php if($rowprop["property_propertydetail_type_of_seller_required"]!=0){ ?>
            <tr>
           <td class="black10"><strong>Type of Seller :</strong> <?php echo $rowprop["property_propertydetail_type_of_seller_required"]; ?></td>
           </tr>
            <?php } ?>
             <?php if($rowprop["property_propertydetail_purpose_for_buying"]!=0){ ?>
            <tr>
           <td class="black10"><strong>Purpose For Buying :</strong> <?php echo $rowprop["property_propertydetail_purpose_for_buying"]; ?></td>
           </tr>
            <?php } ?>
             <?php if($rowprop["property_propertydetail_use_for_property"]!=''){ ?>
            <tr>
           <td class="black10"><strong>Use Of Property :</strong> <?php echo $rowprop["property_propertydetail_use_for_property"]; ?></td>
           </tr>
            <?php } ?>
             <?php if($rowprop["property_propertydetail_timeframe_for_buying"]!=0){ ?>
            <tr>
           <td class="black10"><strong>Time Frame For Buying :</strong> <?php echo $rowprop["property_propertydetail_timeframe_for_buying"]; ?></td>
           </tr>
            <?php } ?>
             <?php if($rowprop["property_propertydetail_seriousness_for_buying"]!=0){ ?>
            <tr>
           <td class="black10"><strong>Property Seriousness For Buying :</strong> <?php echo $rowprop["property_propertydetail_seriousness_for_buying"]; ?></td>
           </tr>
            <?php } ?>
             <?php if($rowprop["property_propertydetail_transaction_type"]!=''){ ?>
            <tr>
           <td class="black10"><strong>Transaction Type :</strong> <?php echo $rowprop["property_propertydetail_transaction_type"]; ?></td>
           </tr>
            <?php } ?>
            <?php if($rowprop["property_propertydetail_property_ownership"]!=''){ ?>
            <tr>
           <td class="black10"><strong>Property Ownership :</strong> <?php echo $rowprop["property_propertydetail_property_ownership"]; ?></td>
           </tr>
            <?php } ?>
             <?php if($rowprop["property_propertydetail_age_of_property"]!=''){ ?>
            <tr>
           <td class="black10"><strong>Age Of Property :</strong> <?php echo $rowprop["property_propertydetail_age_of_property"]; ?></td>
           </tr>
            <?php } ?>
             <?php if($rowprop["property_propertdetail_possession_of_property"]!=''){ ?>
            <tr>
           <td class="black10"><strong>Possession Of Property :</strong> <?php echo $rowprop["property_propertdetail_possession_of_property"]; ?></td>
           </tr>
            <?php } ?>
             <?php if($rowprop["property_propertdetail_selling_reason"]!=''){ ?>
             <tr>
           <td class="black10"><strong>Selling Reason : </strong><?php echo $rowprop["property_propertdetail_selling_reason"]; ?></td>
           </tr> 
           <?php } ?>
            <?php if($rowprop["property_propertydetail_expectedrent"]!=0){ ?>
            <tr>
           <td class="black10"><strong>Expected Rent : </strong><?php echo $rowprop["property_propertydetail_expectedrent"]; ?></td>
           </tr>
            <?php } ?>
            <?php if($rowprop["property_propertydetail_deposit_amount"]!=0){ ?>
            <tr>
           <td class="black10"><strong>Deposit Amount : </strong><?php echo "CAD $".number_format($rowprop["property_propertydetail_deposit_amount"],2); ?></td>
           </tr>
            <?php } ?>
             <?php if($rowprop["property_propertydetail_timeperiod_for_rent"]!=''){ ?>
            <tr>
           <td class="black10"><strong>Time Period For Rent :</strong> <?php echo $rowprop["property_propertydetail_timeperiod_for_rent"]." ".$rowprop["property_propertydetail_timeperiod_for_rent_type"]; ?></td>
           </tr>

            <?php } ?>
              <?php if($rowprop["property_propertydetail_purpose_for_renting"]!=''){ ?>
            <tr>
           <td class="black10"><strong>Purpose For Rent :</strong> <?php echo $rowprop["property_propertydetail_purpose_for_renting"]; ?></td>
           </tr>
            <?php } ?>
            
            <?php if($rowprop["property_propertydetail_expectedprice"]!=0){ ?>
            <tr>
           <td class="black10"><strong>Expected Price :</strong> <?php echo $rowprop["property_propertydetail_expectedprice"]; ?></td>
           </tr>
            <?php } ?>
            
            <?php if($rowprop["property_propertydetail_bedroom"]!=0){ ?>
            <tr>
           <td class="black10"><strong>Bedroom :</strong> <?php echo $rowprop["property_propertydetail_bedroom"]; ?></td>
           </tr>
           <?php } ?>
            <?php if($rowprop["property_propertydetail_bathroom"]!=0){ ?>
            <tr>
           <td class="black10"><strong>Bathroom : </strong><?php echo $rowprop["property_propertydetail_bathroom"]; ?></td>
           </tr>
            <?php } ?>
            <?php if($rowprop["property_propertydetail_balconies"]!=0){ ?>
            <tr>
           <td class="black10"><strong>Balconies :</strong> <?php echo $rowprop["property_propertydetail_balconies"]; ?></td>
           </tr>
            <?php } ?>
           
            <?php if($rowprop["property_propertydetail_directional_facing"]!=''){ ?>
            <tr>
           <td class="black10"><strong>Property Directional Facing :</strong> <?php echo $rowprop["property_propertydetail_directional_facing"]; ?></td>
           </tr>
            <?php } ?>
            <?php if($rowprop["property_propertydetail_distance_from_highway"]!=0){ ?>
            <tr>
           <td class="black10"><strong>Property Distance From Highway : </strong><?php echo $rowprop["property_propertydetail_distance_from_highway"]; ?></td>
           </tr>
            <?php } ?>
            <?php if($rowprop["property_propertydetail_flooring"]!=''){ ?>
            <tr>
           <td class="black10"><strong>Property Floor :</strong> <?php echo $rowprop["property_propertydetail_flooring"]; ?></td>
           </tr>
            <?php } ?>
             <?php if($rowprop["property_propertydetail_furnished"]!=""){ ?>
            <tr>
           <td class="black10"><strong>Property Furnished : </strong><?php echo $rowprop["property_propertydetail_furnished"]; ?></td>
           </tr>
            <?php } ?>         
         
          <?php if($rowprop["property_propertydetail_locality"]!=""){ ?>
            <tr>
           <td class="black10"><strong>Property Locality : </strong><?php echo $rowprop["property_propertydetail_locality"]; ?></td>
           </tr>
            <?php } ?>
             <?php if($rowprop["property_propertydetail_furniture_detail"]!=""){ ?>
            <tr>
           <td class="black10"><strong>Furniture Detail : </strong><?php echo $rowprop["property_propertydetail_furniture_detail"]; ?></td>
           </tr>
            <?php } ?>
           
             <?php if($rowprop["property_propertydetail_select_flat_feature"]!=''){ ?>
            <tr>
           <td class="black10"><strong>Feature :</strong> <?php echo $rowprop["property_propertydetail_select_flat_feature"]; ?></td>
           </tr>
            <?php } ?>
            <?php if($rowprop["property_propertydetail_property_address"]!=''){ ?>
            <tr>
           <td class="black10"><strong>Property Address : </strong><?php echo $rowprop["property_propertydetail_property_address"]; ?></td>
           </tr>
            <?php } ?>
         
            </table>
        </td></tr>
        
       
        
           </table>
           
           </td>
           
           </tr>
            <tr>       
         <td  class="black11" align="right" style="padding-bottom:0;padding-top:0;">
           <a href="home.php?pageno=27&pid=<?php echo $rowprop["property_propertydetail_id"]; ?>" class='basic' style="color:#444444;"><img src="images/inq_arrow.png" align="absmiddle" border="0" width="20" height="20" style="margin-right:5px;" /><strong>Send An Inquiry</strong></a>
           </td>
           </tr>
           </table></td>
          </tr>
         
          
  <?php  $i++; }  ?>
  
       
      
          </table></td></tr>
    
           
           <tr>
           <td valign="top" colspan="5">
           <table width="100%" border="0" cellspacing="0" cellpadding="5">
             <tr>
                                  
            <td class="black11" style="color:#AB2400;"><strong>Map</strong></td>
           </tr>
           
            <tr><td><?php include("map.php"); ?></td></tr>
            
            </table>
            </td>
            </tr>
          
        </table>
</td></tr></table>
<?php } ?>
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/jquery-ui-1.8.18.custom.min.js"></script>
<script src="js/jquery.smooth-scroll.min.js"></script>
<script src="js/lightbox.js"></script>

<script>
  jQuery(document).ready(function($) {
      $('a').smoothScroll({
        speed: 1000,
        easing: 'easeInOutCubic'
      });

      $('.showOlderChanges').on('click', function(e){
        $('.changelog .old').slideDown('slow');
        $(this).fadeOut();
        e.preventDefault();
      })
  });

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-2196019-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>