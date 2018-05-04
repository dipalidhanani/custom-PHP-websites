<link href="css/home.css" rel="stylesheet" type="text/css" />
<style type="text/css">

ul.mk-mynt-nav {
    border-bottom: 1px solid #D6D6D6;
    margin-bottom: 15px;
	margin:5px 0;
}
td.mk-mynt-nav-td{padding:0;}
ul.mk-mynt-nav {
    border: 0 none;
    display: inline-block;
    font-size: 14px;
   padding-bottom: 0;
    padding-left: 0;
    text-align: center;
}

ul.mk-mynt-nav li {
    margin-left: 0;
}
ul.mk-mynt-nav li {
    display: inline;
  
}
ul.mk-mynt-nav li a {
    background: none repeat scroll 0 0 #E6E6E6;
    border-bottom: 1px solid #D6D6D6;
    border-radius: 2px 2px 2px 2px;
    color: #000000;
    display: inline-block;
    height: 20px;
    padding: 8px 3px 2px;
    text-decoration: none;
    width: 126px;
	
}
ul.mk-mynt-nav li a:hover, ul.mk-mynt-nav li a.active {
    background: none repeat scroll 0 0 #000000;
    border-bottom: 1px solid #000000;
    color: #FFFFFF;
}
</style>
<script type="text/javascript" src="ajax/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="ajax/highslide.css" />
<script type="text/javascript">
hs.graphicsDir = 'ajax/graphics/';
hs.outlineType = 'rounded-white';
hs.showCredits = false;
hs.wrapperClassName = 'draggable-header';
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="border1">
           
      <tr>
       
        <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="10" cellpadding="0">
        <tr>
                            <td width="71%" class="title_red"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="25"><img src="images/arrow1.png" width="19" height="18"></td>
                                    <td class="title_red"><strong>My Profile</strong></td>
                                    </tr>
                                </table></td>
              </tr>  
          <tr>
            <td><table width="100%" border="0" cellspacing="2" cellpadding="5">
             
                    
              <?php
			  
               $recordsetmyprofile = mysql_query("select * from rm_user_registration where rm_user_reg_id='".$_SESSION['user_reg_id']."' and rm_user_email='".$_SESSION['email']."'");
				if($rowmyprofile = mysql_fetch_array($recordsetmyprofile,MYSQL_ASSOC))
				{
				?>
  
              <tr>
               <td class="black11" style="color:#AB2400; text-transform:capitalize; padding-left: 0;padding-top: 0;"><strong>Welcome
                  <?php  echo $rowmyprofile["rm_user_name"];?></strong></td>
              </tr>
              <tr>
                <td class="mk-mynt-nav-td black10">
                <ul class="mk-mynt-nav">          
                             <li><a href="home.php?pageno=33&view=profiledetails#t" <?php if($_REQUEST["view"]=="profiledetails"){ ?>  class="active" <?php } ?>>My Details</a></li>
                             <li><a href="home.php?pageno=33&view=updateprofile#t" <?php if($_REQUEST["view"]=="updateprofile"){ ?>  class="active" <?php } ?>>Update Profile</a></li>         
                             <li><a href="home.php?pageno=33&view=list_properties#t" <?php if($_REQUEST["view"]=="list_properties"){ ?>  class="active" <?php } ?>>List Properties</a></li>
                             <li><a href="home.php?pageno=33&view=changepassword#t" <?php if($_REQUEST["view"]=="changepassword"){ ?>  class="active" <?php } ?>>Change&nbsp;Password</a></li>
                             <li><a href="logout.php">Logout</a></li>             
                </ul>
				</td>
               </tr>
               <?php
				}
			   ?>
              
            </table></td>
          </tr>
 <?php if($_REQUEST["view"]=="updateprofile"){ ?>         
          
 <script language="JavaScript">
function IsNumeric(strString) //  check for valid numeric strings
{
	if(!/\D/.test(strString)) return true;//IF NUMBER
	//else if(/^\d+\.\d+$/.test(strString)) return true;//IF A DECIMAL NUMBER HAVING AN INTEGER ON EITHER SIDE OF THE DOT(.)
	else
	return false;
}
function EmailValidation(emailval)
{
	if(emailval=="")
	{
		return true;
	}
	else
	{
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		if(reg.test(emailval) == false)
		{
			 return false;
		}
		else
		{
			return true;
		}
	}
}

function validation(updateprofileform)
{
	with(document.updateprofileform)
    {
    	var errmsg="";
	    
		var illegalChars = /\W/; // allow letters, numbers, and underscores
 
		
		if(name.value=="")
		{
			errmsg="Please enter your firstname.";
		}		
		if(address.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your address.";
		}		
		
		if(mobile.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your mobile number.";
		}
		if(mobile.value!="")
		{
			if(IsNumeric(mobile.value)==false ||mobile.value.length != 10)
			{
					errmsg=errmsg +'<br>' + "Please enter valid mobile number.";
			}
		}
		
			
		if(errmsg=="")
		{
		  return true;
		}
		else
		{			
			document.getElementById("erroralready").style.display= '';			
			document.getElementById("lblerror").style.visibility= "visible";
			document.getElementById("lblerror").innerHTML = errmsg;
			return false;
		}
    }
}



</script>
</script>
        <tr>
       
        <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="2" cellpadding="2">
                  <form name="updateprofileform" id="updateprofileform" method="get" action="process.php">
                 <?php
                 $recordsetmyprofile = mysql_query("select * from rm_user_registration where rm_user_reg_id='".$_SESSION['user_reg_id']."' and rm_user_email='".$_SESSION['email']."'");
				while($rowmyprofile = mysql_fetch_array($recordsetmyprofile,MYSQL_ASSOC))
				{
				?>
                 
                  <tr>
                    <td><table width="100%" border="0" cellpadding="3" cellspacing="3" >
                     <tr>
                         <td width="16%" align="left" valign="top" class="black10" ><span class="validationmsg">*</span>Name : </td>
                         <td width="84%" class="black10">
                         <input type="text" name="name" id="name" value="<?php  echo $rowmyprofile["rm_user_name"];?>" class="black10 tb7" />
                       </td>
                        </tr>
                        <tr>
                         <td width="16%" align="left" valign="top" class="black10" ><span class="validationmsg">*</span>Address : </td>
                         <td class="black10"><textarea name="address" cols="35"  rows="3" class="black10 tb7"><?php  echo $rowmyprofile["rm_user_address"];?></textarea></td>
                        </tr>                       
                       
                    </table></td>
                  </tr>
                  <tr>
                    
                    <td><table width="100%" border="0" cellpadding="3" cellspacing="3" >
                      <tr>
                        <td width="16%" align="left" valign="top" class="black10" >Email Address :</td>
                        <td width="84%" class="black10"><?php  echo $rowmyprofile["rm_user_email"];?></td>
                      </tr>                     
                      <tr>
                        <td align="left" valign="top" class="black10" ><span class="validationmsg">*</span>Mobile Number : </td>
                        <td><input name="mobile" type="text" class="black10 tb7phone"  id="mobile" size="25" value="<?php  echo $rowmyprofile["rm_user_mobile_no"];?>" maxlength="10"></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="3" cellspacing="3" >                    
                    
                      <tr>
                        <td align="left">       <input type="hidden" name="process" value="updateprofile" />
                        <input type="submit" value="Update" onclick="return validation(this.form);" style="cursor:pointer;" >
                        &nbsp;</td>
                      </tr>
                      </table></td>
                    
                    
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr id="erroralready" style="display:none;">
                    <td><table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
                              <tr>
                                <td width="10" height="10"><img src="images/red_tab_01.png" width="10" height="10" /></td>
                                <td background="images/red_tab_03.png" style="background-repeat:repeat-x"></td>
                                <td width="10" height="10"><img src="images/red_tab_04.png" width="10" height="10" /></td>
                              </tr>
                              <tr>
                                <td background="images/red_tab_05.png" style="background-repeat:repeat-y">&nbsp;</td>
                                <td bgcolor="#FFD3D3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="65" valign="top"><img src="images/red_tab_06.png" width="65" height="58" /></td>
                                    <td width="5" valign="top">&nbsp;</td>
                                    <td valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">
                                      <tr>
                                        <td class="title_red" align="left"><strong> Error</strong></td>
                                      </tr>
                                      <tr>
                                        <td class="validationmsg" align="left">
                                        <div id="lblerror" class="black10" align="left" style=" width:400px; margin-left:0px; color:#FF0000; border-color:#FF0000; visibility:hidden;" ></div>
                                        </td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table></td>
                                <td background="images/red_tab_08.png" style="background-repeat:repeat-y">&nbsp;</td>
                              </tr>
                              <tr>
                                <td><img src="images/red_tab_12.png" width="10" height="10" /></td>
                                <td background="images/red_tab_14.png" style="background-repeat:repeat-x"></td>
                                <td><img src="images/red_tab_15.png" width="10" height="10" /></td>
                              </tr>
</table></td>
                  </tr>
                  <?php
					}
					?>
                  </form>
                </table></td>
     
      </tr>    
    <?php } ?> 
    <?php if($_REQUEST["view"]=="profiledetails"){ ?>     
    
    <tr>
            <td><table width="100%" border="0" cellpadding="2" cellspacing="2">
              <?php
                 $recordsetmyprofile = mysql_query("select * from rm_user_registration where rm_user_reg_id='".$_SESSION['user_reg_id']."' and rm_user_email='".$_SESSION['email']."'");
				while($rowmyprofile = mysql_fetch_array($recordsetmyprofile,MYSQL_ASSOC))
				{
				?>
              <tr>
                <td><table width="100%" border="0" cellpadding="3" cellspacing="3" >
                  <tr>
                    <td width="16%" align="left" valign="top" class="black10" >Name : </td>
                    <td width="84%" class="black10"><?php  echo $rowmyprofile["rm_user_name"];?></td>
                    </tr>                
                  <tr>
                    <td width="16%" align="left" valign="top" class="black10" >Address : </td>
                    <td class="black10"><?php  echo $rowmyprofile["rm_user_address"];?></td>
                    </tr> 
                    <tr>
                    <td width="16%" align="left" valign="top" class="black10" >Email Address : </td>
                    <td width="84%" class="black10"><?php  echo $rowmyprofile["rm_user_email"];?></td>
                    </tr>                 
                  <tr>
                    <td align="left" valign="top" class="black10" >Mobile Number : </td>
                    <td class="black10"><?php  echo $rowmyprofile["rm_user_mobile_no"];?></td>
                    </tr>                    
                </table></td>
              </tr>
             
              
              <?php
					}
					?>
            </table></td>
          </tr>
          <?php	}	?>             
           <?php if($_REQUEST["view"]=="list_properties"){ ?>  
          <tr>       
        <td bgcolor="#ddd"><table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
          <tr class="black8">
            <td width="11%" height="30" bgcolor="#ccc" align="center" ><strong>City</strong></td>
            <td width="13%" align="center" bgcolor="#ccc"><strong>Street</strong></td>
            <td width="11%" align="center" bgcolor="#ccc"><strong>Postal Code</strong></td>
           
              <td width="16%" align="center" bgcolor="#ccc"><strong>Property Type</strong></td>
            <td width="16%" align="center" bgcolor="#ccc"><strong>Post Property For</strong></td>
            <td width="13%" align="center" bgcolor="#ccc"><strong>Property Price</strong></td>
            <td width="7%" bgcolor="#ccc" align="center"><strong>Action</strong></td>
          </tr>
          <?php
			$recordsetmyorders = mysql_query("select * from property_type_master ptype,property_propertydetail_master pd where ptype.property_type_id = pd.property_propertdetail_property_type_id and pd.property_submitted_by_id='".$_SESSION['user_reg_id']."' order by pd.property_propertydetail_id desc ");
			 while($rowmyorders = mysql_fetch_array($recordsetmyorders,MYSQL_ASSOC))
			 {	
			 	
							
							$ptype=$rowmyorders['property_type_name'];
							$post=$rowmyorders['property_propertydetail_postpropertyfor'];
							$price=$rowmyorders['property_propertydetail_property_price'];
							$status=$rowmyorders['property_propertydetail_status'];
							$pid=$rowmyorders['property_propertydetail_id'];
							$qcity=mysql_query("select * from rm_city_master where rm_city_id='".$rowmyorders['property_propertydetail_city_id']."'");
							$rcity=mysql_fetch_array($qcity);
							$city=$rcity['rm_city_title'];
							
							$qstreet=mysql_query("select * from rm_area_master where rm_area_id='".$rowmyorders['propperty_propertydetail_area_id']."'");
							$rstreet=mysql_fetch_array($qstreet);
							$street=$rstreet['rm_area_title'];
							$postalcode=$rowmyorders['propperty_propertydetail_area_code'];
			?>
<tr class="black10">
                                <td bgcolor="#FFFFFF" class="black9" align="center"><?php echo $city; ?></td>
                                <td bgcolor="#FFFFFF" class="black9" align="center"><?php echo $street; ?></td>
                                <td bgcolor="#FFFFFF" class="black9" align="center"><?php echo $postalcode; ?></td>                       	
                               
                                <td bgcolor="#FFFFFF" class="black9" align="center"><?php echo $ptype; ?></td>
                                <td bgcolor="#FFFFFF" class="black9" align="center"><?php echo $post; ?></td>
                                <td bgcolor="#FFFFFF" class="black9" align="center"><?php echo "CAD $".number_format($price,2); ?></td>    
            <td align="center" bgcolor="#FFFFFF"><img src="images/zoom_in.png" width="20" height="20" border="0" style="cursor:pointer;" onclick="return hs.htmlExpand(this, { headingText: '<?php  echo $rowmyorders["property_propertydetail_property_name"];?>' })" />
             <div class="highslide-maincontent">
             <?php 


$queryprop="select * from property_propertydetail_master where property_propertydetail_id = '".$rowmyorders["property_propertydetail_id"]."'";


$data_p = mysql_query($queryprop) or die(mysql_error());
$totalrecords=mysql_num_rows($data_p);


$i=1;	
 if($rowprop = mysql_fetch_array($data_p))
 {	
 $qcity=mysql_query("select * from rm_city_master where rm_city_id='".$rowprop["property_propertydetail_city_id"]."'");
 $rowcity=mysql_fetch_array($qcity);
 
 $qarea=mysql_query("select * from rm_area_master where rm_area_id='".$rowprop["propperty_propertydetail_area_id"]."'");
 $rowarea=mysql_fetch_array($qarea);
 
 $qptype=mysql_query("select * from property_type_master where property_type_id='".$rowprop["property_propertdetail_property_type_id"]."'");
 $rowptype=mysql_fetch_array($qptype);

?>
       <table width="100%" border="0" cellspacing="0" cellpadding="5">
             <tr>
                                  
                                    <td class="black11" style="color:#AB2400;"><strong>Property Details</strong></td>
           </tr>
           <tr><td valign="top" width="50%">
           <table cellspacing="0" cellpadding="5">
            <?php if($rowprop["property_propertydetail_property_name"]!=''){ ?>
           <tr>
           <td class="black10" ><strong>Property Name : </strong><?php echo $rowprop["property_propertydetail_property_name"]; ?></td>
           </tr>
           <?php } ?>
            <tr>
           <td class="black10"><strong>Property For : </strong><?php echo $rowprop["property_propertydetail_postpropertyfor"]; ?></td>
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
             <?php if($rowprop["property_propertydetail_coveredarea_from"]!=0){ ?>    
            <tr>
           <td class="black10"><strong>Covered Area   :</strong> <?php echo number_format($rowprop["property_propertydetail_coveredarea_from"],2)."  ".$rowprop["property_propertydetail_coveredarea_type"]; ?></td>
           </tr>
           <?php } ?>
            <?php if($rowprop["property_propertydetail_coveredarea_rate"]!=0){ ?>    
            <tr>
           <td class="black10"><strong>Covered Area Rate :</strong> <?php echo "CAD $".number_format($rowprop["property_propertydetail_coveredarea_rate"],2); ?></td>
           </tr>
            <?php } ?>
            <?php if($rowprop["property_propertydetail_coveredarea_amount"]!=0){ ?>  
           <tr>
           <td class="black10"><strong>Covered Area Amount :</strong> <?php echo "CAD $".number_format($rowprop["property_propertydetail_coveredarea_amount"],2); ?></td>
           </tr>                  
             <?php } ?>
            <?php if($rowprop["property_propertydetail_landarea_from"]!=0){ ?>  
            <tr>
           <td class="black10"><strong>Plot/land Area  : </strong><?php echo number_format($rowprop["property_propertydetail_landarea_from"],2)."  ".$rowprop["property_propertydetail_landarea_type"]; ?></td>
           </tr>
            <?php } ?>
            <?php if($rowprop["property_propertydetail_landarea_rate"]!=0){ ?>  
            <tr>
           <td class="black10"><strong>Plot/land Area Rate : </strong><?php echo "CAD $".number_format($rowprop["property_propertydetail_landarea_rate"],2); ?></td>
           </tr>
            <?php } ?>
            <?php if($rowprop["property_propertydetail_landarea_amount"]!=0){ ?>  
            <tr>
           <td class="black10"><strong>Plot/land Area Amount :</strong> <?php echo "CAD $".number_format($rowprop["property_propertydetail_landarea_amount"],2); ?></td>
           </tr>
            <?php } ?>
            <?php if($rowprop["property_propertydetail_carpetarea_from"]!=0){ ?>  
            <tr>
           <td class="black10"><strong>Carpet Area : </strong><?php echo number_format($rowprop["property_propertydetail_carpetarea_from"],2)."  ".$rowprop["property_propertydetail_carpetarea_type"]; ?></td>
           </tr>
            <?php } ?>
            <?php if($rowprop["property_propertydetail_carpetarea_rate"]!=0){ ?>  
            <tr>
           <td class="black10"><strong>Carpet Area Rate :</strong><?php echo "CAD $".number_format($rowprop["property_propertydetail_carpetarea_rate"],2); ?></td>
           </tr>
            <?php } ?>
            <?php if($rowprop["property_propertydetail_carpetarea_amount"]!=0){ ?>  
            <tr>
           <td class="black10"><strong>Carpet Area Amount :</strong> <?php echo "CAD $".number_format($rowprop["property_propertydetail_carpetarea_amount"],2); ?></td>
           </tr>
            <?php } ?>
        
           <?php if($rowprop["property_propertydetail_bedroom"]!=0){ ?>
            <tr>
           <td class="black10"><strong>Bedroom :</strong> <?php echo $rowprop["property_propertydetail_bedroom"]; ?></td>
           </tr>
           <?php } ?>
            <?php if($rowprop["property_propertydetail_bathroom"]!=0){ ?>
            <tr>
           <td class="black10"><strong>Bathroom :</strong><?php echo $rowprop["property_propertydetail_bathroom"]; ?></td>
           </tr>
            <?php } ?>
            <?php if($rowprop["property_propertydetail_balconies"]!=0){ ?>
            <tr>
           <td class="black10"><strong>Balconies :</strong> <?php echo $rowprop["property_propertydetail_balconies"]; ?></td>
           </tr>
            <?php } ?>
           
        </table></td>
        <td width="50%" valign="top"><table  cellspacing="0" cellpadding="5">
           <?php if($rowprop["property_propertydetail_expectedrent"]!=0){ ?>
            <tr>
           <td class="black10"><strong>Expected Rent :</strong><?php echo $rowprop["property_propertydetail_expectedrent"]; ?></td>
           </tr>
            <?php } ?>
            <?php if($rowprop["property_propertydetail_expectedprice"]!=0){ ?>
            <tr>
           <td class="black10"><strong>Expected Price :</strong><?php echo $rowprop["property_propertydetail_expectedprice"]; ?></td>
           </tr>
            <?php } ?>
            <?php if($rowprop["property_propertydetail_directional_facing"]!=''){ ?>
            <tr>
           <td class="black10"><strong>Property Directional Facing :</strong><?php echo $rowprop["property_propertydetail_directional_facing"]; ?></td>
           </tr>
            <?php } ?>
            <?php if($rowprop["property_propertydetail_distance_from_highway"]!=0){ ?>
            <tr>
           <td class="black10"><strong>Property Distance From Highway :</strong><?php echo $rowprop["property_propertydetail_distance_from_highway"]; ?></td>
           </tr>
            <?php } ?>
            <?php if($rowprop["property_propertydetail_flooring"]!=''){ ?>
            <tr>
           <td class="black10"><strong>Property Floor :</strong><?php echo $rowprop["property_propertydetail_flooring"]; ?></td>
           </tr>
            <?php } ?>
             <?php if($rowprop["property_propertydetail_furnished"]!=""){ ?>
            <tr>
           <td class="black10"><strong>Property Furnished :</strong><?php echo $rowprop["property_propertydetail_furnished"]; ?></td>
           </tr>
            <?php } ?>         
         
          <?php if($rowprop["property_propertydetail_locality"]!=""){ ?>
            <tr>
           <td class="black10"><strong>Property Locality :</strong><?php echo $rowprop["property_propertydetail_locality"]; ?></td>
           </tr>
            <?php } ?>
             <?php if($rowprop["property_propertydetail_furniture_detail"]!=""){ ?>
            <tr>
           <td class="black10"><strong>Furniture Detail :</strong><?php echo $rowprop["property_propertydetail_furniture_detail"]; ?></td>
           </tr>
            <?php } ?>
             <?php if($rowprop["property_propertydetail_deposit_amount"]!=''){ ?>
            <tr>
           <td class="black10"><strong>Deposit Amount :</strong><?php echo "CAD $".number_format($rowprop["property_propertydetail_deposit_amount"],2); ?></td>
           </tr>
            <?php } ?>
             <?php if($rowprop["property_propertydetail_timeperiod_for_rent"]!=''){ ?>
            <tr>
           <td class="black10"><strong>Time Period For Rent :</strong><?php echo $rowprop["property_propertydetail_timeperiod_for_rent"]." ".$rowprop["property_propertydetail_timeperiod_for_rent_type"]; ?></td>
           </tr>
            <?php } ?>
              <?php if($rowprop["property_propertydetail_purpose_for_renting"]!=''){ ?>
            <tr>
           <td class="black10"><strong>Purpose For Rent :</strong><?php echo $rowprop["property_propertydetail_purpose_for_renting"]; ?></td>
           </tr>
            <?php } ?>
             <?php if($rowprop["property_propertdetail_selling_reason"]!=''){ ?>
            <tr>
           <td class="black10"><strong>Selling Reason :</strong><?php echo $rowprop["property_propertdetail_selling_reason"]; ?></td>
           </tr>
            <?php } ?>
             <?php if($rowprop["property_propertydetail_select_flat_feature"]!=''){ ?>
            <tr>
           <td class="black10"><strong>Flat Feature :</strong><?php echo $rowprop["property_propertydetail_select_flat_feature"]; ?></td>
           </tr>
            <?php } ?>
            <?php if($rowprop["property_propertydetail_property_address"]!=''){ ?>
            <tr>
           <td class="black10"><strong>Property Address :</strong><?php echo $rowprop["property_propertydetail_property_address"]; ?></td>
           </tr>
            <?php } ?>
            <?php if($rowprop["property_propertydetail_type_of_seller_required"]!=0){ ?>
            <tr>
           <td class="black10"><strong>Type of Seller :</strong><?php echo $rowprop["property_propertydetail_type_of_seller_required"]; ?></td>
           </tr>
            <?php } ?>
             <?php if($rowprop["property_propertydetail_purpose_for_buying"]!=0){ ?>
            <tr>
           <td class="black10"><strong>Purpose For Buying :</strong><?php echo $rowprop["property_propertydetail_purpose_for_buying"]; ?></td>
           </tr>
            <?php } ?>
             <?php if($rowprop["property_propertydetail_use_for_property"]!=''){ ?>
            <tr>
           <td class="black10"><strong>Use Of Property :</strong><?php echo $rowprop["property_propertydetail_use_for_property"]; ?></td>
           </tr>
            <?php } ?>
             <?php if($rowprop["property_propertydetail_timeframe_for_buying"]!=0){ ?>
            <tr>
           <td class="black10"><strong>Time Frame For Buying :</strong><?php echo $rowprop["property_propertydetail_timeframe_for_buying"]; ?></td>
           </tr>
            <?php } ?>
             <?php if($rowprop["property_propertydetail_seriousness_for_buying"]!=0){ ?>
            <tr>
           <td class="black10"><strong>Property Seriousness For Buying :</strong><?php echo $rowprop["property_propertydetail_seriousness_for_buying"]; ?></td>
           </tr>
            <?php } ?>
             <?php if($rowprop["property_propertydetail_transaction_type"]!=''){ ?>
            <tr>
           <td class="black10"><strong>Transaction Type :</strong><?php echo $rowprop["property_propertydetail_transaction_type"]; ?></td>
           </tr>
            <?php } ?>
            <?php if($rowprop["property_propertydetail_property_ownership"]!=''){ ?>
            <tr>
           <td class="black10"><strong>Property Ownership :</strong><?php echo $rowprop["property_propertydetail_property_ownership"]; ?></td>
           </tr>
            <?php } ?>
             <?php if($rowprop["property_propertydetail_age_of_property"]!=''){ ?>
            <tr>
           <td class="black10"><strong>Age Of Property :</strong><?php echo $rowprop["property_propertydetail_age_of_property"]; ?></td>
           </tr>
            <?php } ?>
             <?php if($rowprop["property_propertdetail_possession_of_property"]!=''){ ?>
            <tr>
           <td class="black10"><strong>Possession Of Property :</strong><?php echo $rowprop["property_propertdetail_possession_of_property"]; ?></td>
           </tr>
            <?php } ?>
           
            <tr>
           <td class="black10"><strong>Property Status :</strong> <?php if($rowprop["property_propertydetail_status"]=='Yes'){echo "Approved"; } else {echo "Not Approved";} ?></td>
           </tr>
           
           
            </table></td></tr>
           </table>  
           <?php } ?>
      </div> 
          </td>
          </tr>
          <?php
			 }
			 ?>
        </table></td>     
      </tr>
               <?php	}	?>   
                <?php if($_REQUEST["view"]=="changepassword"){ ?>  
                <tr><td>
                <table width="100%" border="0" cellspacing="2" cellpadding="2">
              
                  <tr>
                    
                    <td><form name="passwordform" id="passwordform" action="process.php" method="post">
                      <table width="100%" border="0" cellspacing="5" cellpadding="5">                      
                      <?php
					  if($_REQUEST["msg"]!="")
					  {
						   if($_REQUEST["msg"]=="no")
						   {
							   $msg="Please enter the valid current password!";
						   }
						   elseif($_REQUEST["msg"]=="yes")
						   {
							   $msg="Password changed successfully";
						   }
						   
					  ?>
                      <tr>
                        <td colspan="2" align="center" valign="top" class="validationmsg"><?php echo $msg;?></td>
                        </tr>
                        <?php
					  }
					  ?>
                      <tr>
                        <td width="20%" align="left" valign="top" class="black10">Old Password :</td>
                        <td  align="left" valign="top"><input type="password" name="oldpassword" class="black8 tb7"/></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" class="black10">New Password :</td>
                        <td align="left" valign="top"><input type="password" name="newpassword" class="black8 tb7"/></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" class="black10">Confirm Password :</td>
                        <td align="left" valign="top"><input type="password" name="confirmpassword" class="black8 tb7"/></td>
                      </tr>
                      <tr id="submitbuttontr">
                        <td colspan="2" align="left">                        
                        <input type="hidden" name="process" value="changepassword" />
                         <input type="submit" name="submit" value="Change Password" class="black10" onclick="return validation(this.form);" style="cursor:pointer;"/></td>
                        </tr>                        
                      </table>
                      </form></td>
                    
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr id="erroralready" style="display:none;">
                    <td><table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
                              <tr>
                                <td width="10" height="10"><img src="images/red_tab_01.png" width="10" height="10" /></td>
                                <td background="images/red_tab_03.png" style="background-repeat:repeat-x"></td>
                                <td width="10" height="10"><img src="images/red_tab_04.png" width="10" height="10" /></td>
                              </tr>
                              <tr>
                                <td background="images/red_tab_05.png" style="background-repeat:repeat-y">&nbsp;</td>
                                <td bgcolor="#FFD3D3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="65" valign="top"><img src="images/red_tab_06.png" width="65" height="58" /></td>
                                    <td width="5" valign="top">&nbsp;</td>
                                    <td valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">
                                      <tr>
                                        <td class="title_red" align="left"><strong> Error</strong></td>
                                      </tr>
                                      <tr>
                                        <td class="validationmsg" align="left">
                                        <div id="lblerror" class="validationmsg" align="left" style=" width:300px; margin-left:0px; color:#FF0000; border-color:#FF0000; visibility:hidden;" ></div>
                                        </td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table></td>
                                <td background="images/red_tab_08.png" style="background-repeat:repeat-y">&nbsp;</td>
                              </tr>
                              <tr>
                                <td><img src="images/red_tab_12.png" width="10" height="10" /></td>
                                <td background="images/red_tab_14.png" style="background-repeat:repeat-x"></td>
                                <td><img src="images/red_tab_15.png" width="10" height="10" /></td>
                              </tr>
</table></td>
                  </tr>
                 
                </table>
                </td></tr>
               <?php	}	?>  
                  
        </table></td>
       
      </tr>
     
    </table>