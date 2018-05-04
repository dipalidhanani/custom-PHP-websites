<?php session_start();
require_once("../include/config.php");

if($_SESSION['rm_admin_id']=="")
{
	echo "<script type=\"text/javascript\">document.location.href='login.php'; </script>\n";
	exit();
}

$act = $_REQUEST["action"];
$pid=$_GET['pid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RM Realtor - Admin Facility</title>
<link rel="stylesheet" href="css/css.css" type="text/css" />
<link rel="stylesheet" href="menu_style.css" type="text/css" />
<style type="text/css">
<!--
body {
	background-color: #E8E8E8;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>

</head>

<body>

<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1000"><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
      <tr>
        <td><table width="1000" border="0" cellpadding="0" cellspacing="0" >
          <tr>
            <td bgcolor="#FFFFFF"> <?php include("header.php");?></td>
          </tr>
          <tr>
            <td height="10" bgcolor="#FFFFFF"></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">
            
                <!-- main starts here  --> 
                 <table width="100%" border="0" cellpadding="0">
     
      <tr>
        <td bgcolor="#FFFFFF">
<form name="frm" id="frm" >
<?php
	
	

		$pid = $_GET['pid'];
		$query=mysql_query("select * from property_propertydetail_master where property_propertydetail_id=$pid");
		$rowmain = mysql_fetch_array($query);
		$countryid = $rowmain['property_propertydetail_country_id'];
		$stateid=$rowmain['property_propertydetail_state_id'];
		$cityid=$rowmain['property_propertydetail_city_id'];
		$areaid=$rowmain['propperty_propertydetail_area_id'];
		$areacode=$rowmain['propperty_propertydetail_area_code'];
		$ptypeid=$rowmain['property_propertdetail_property_type_id'];
		$propnmid=$rowmain['property_propertydetail_property_id'];
		$pdid=$rowmain['property_propertydetail_id'];
	
		

	
						
?>
<table width="100%" border="0" cellspacing="5" cellpadding="0">
	<tr>
    	<td height="35" class="normal_fonts14_black">View&nbsp; Property Detail</td>
    </tr>
    <tr>
        <td>
        <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
          <tr>
          	<td colspan="3" class="normal_fonts14" style="color:#444; background-color:#EEEEEE" valign="middle" align="center">Property Details</td>
          </tr>
          <?php if($rowmain['property_propertydetail_property_name']!=''){ ?>
           <tr>
           <td width="200" align="right" class="normal_fonts9">Property Name</td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
             <?php echo $rowmain['property_propertydetail_property_name'];	?>
             </td>
         </tr>
         <?php } ?>
           <tr>
           <td width="200" align="right" class="normal_fonts9">Post Property For</td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
             
             
             <?php
			
				
					$qry="select property_propertydetail_postpropertyfor from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					echo $nmpost=$row['property_propertydetail_postpropertyfor'];
			?>
             
             
             </td>
         </tr>
          <tr>
			<td width="200" align="right" class="normal_fonts9">Country Name</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
           Canada
            	
            </td>
         </tr>
         <tr>
           <td width="200" align="right" class="normal_fonts9">Province</td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
             Ontario            	
             </td>
         </tr>         
        <tr>
          <td width="200" align="right" class="normal_fonts9">City</td>
          <td width="10" align="center" class="normal_fonts9">:</td>
          <td class="normal_fonts9">
            
            <?php		 
		                                       
									$qry="select DISTINCT * from rm_city_master"; 
									$qry1="select a.rm_city_title from rm_city_master a, property_propertydetail_master p where a.rm_city_id = $cityid";
														
													 $res=mysql_query($qry);
									                 $rs=mysql_query($qry1);
													 if($a=mysql_fetch_array($rs))
		  							                  {
									                echo $nm=$a['rm_city_title'];
										
									                   }
													?>
            </td>
        </tr>
        <tr>
          <td width="200" align="right" class="normal_fonts9">Street</td>
          <td width="10" align="center" class="normal_fonts9">:</td>
          <td class="normal_fonts9">
            <div id="ajaxareaid">            	
              <?php			  
								 $qry="select DISTINCT a.rm_area_title,a.rm_area_id from rm_area_master a where a.rm_city_mast_id=$cityid"; 
									$qry1="select a.rm_area_title from rm_area_master a, property_propertydetail_master p where a.rm_area_id = $areaid";
														
													 $res=mysql_query($qry);
									                 $rs=mysql_query($qry1);
													 if($a=mysql_fetch_array($rs))
		  							                  {
									                echo $nm=$a['rm_area_title'];
										
									                   }
										?>
              
              
              </div>
            </td>
        </tr>
         <tr>
			<td width="200" align="right" class="normal_fonts9">Postal Code</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
           <?php echo $areacode; ?>
            	
            </td>
         </tr>
        
         
         
								
          <tr>
          	<td width="200" align="right" class="normal_fonts9">Property Type</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
						<?php					
						$qry1 = "select ptype.property_type_name from property_type_master ptype, property_propertydetail_master p where ptype.property_type_id = $ptypeid ";
						$res1=mysql_query($qry1);
						$arr1 = mysql_fetch_array($res1);
						echo $nmprop = $arr1['property_type_name'];									
						?>						
             </td>
          </tr>
       
         
           <tr>
          	<td colspan="3" class="normal_fonts14" style="color:#444; background-color:#EEEEEE" align="center">Property Features Details</td>
          </tr>
           <?php if($rowmain['property_propertydetail_coveredarea_from']!=''){ ?>
         <tr>
          
           <td width="200" align="right" class="normal_fonts9">Covered Area  </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<?php echo $rowmain['property_propertydetail_coveredarea_from']." ".$rowmain['property_propertydetail_coveredarea_type']; ?>                          
           </td>
        </tr>
        <?php } ?>
         <?php if($rowmain['property_propertydetail_coveredarea_rate']!=''){ ?>
        <tr>
          
          <td width="200" align="right" class="normal_fonts9">Covered Area Rate </td>
          <td width="10" align="center" class="normal_fonts9">:</td>
          <td class="normal_fonts9">
            <?php echo "CAD $".number_format($rowmain['property_propertydetail_coveredarea_rate'],2); ?> 
            </td>
        </tr>
        <?php } ?>
         <?php if($rowmain['property_propertydetail_coveredarea_amount']!=''){ ?>
        <tr>          
          <td width="200" align="right" class="normal_fonts9">Covered Area Amount </td>
          <td width="10" align="center" class="normal_fonts9">:</td>
          <td class="normal_fonts9">
            <?php echo "CAD $".number_format($rowmain['property_propertydetail_coveredarea_amount'],2); ?>
            
            </td>
        </tr>
        <?php } ?>
         <?php if($rowmain['property_propertydetail_landarea_from']!=''){ ?>
        <tr>
          <td width="200" align="right" class="normal_fonts9">Plot/land Area  </td>
          <td width="10" align="center" class="normal_fonts9">:</td>
          <td class="normal_fonts9">
            <?php echo $rowmain['property_propertydetail_landarea_from']." ".$rowmain['property_propertydetail_landarea_type']; ?>              
            </td>
        </tr>
        <?php } ?>
         <?php if($rowmain['property_propertydetail_landarea_rate']!=''){ ?>
        <tr>
          
          <td width="200" align="right" class="normal_fonts9">Plot/land Area Rate </td>
          <td width="10" align="center" class="normal_fonts9">:</td>
          <td class="normal_fonts9">
            <?php echo "CAD $".number_format($rowmain['property_propertydetail_landarea_rate'],2); ?>    
            </td>
        </tr>
        <?php } ?>
         <?php if($rowmain['property_propertydetail_landarea_amount']!=''){ ?>
        <tr>
          
          <td width="200" align="right" class="normal_fonts9">Plot/land Area Amount </td>
          <td width="10" align="center" class="normal_fonts9">:</td>
          <td class="normal_fonts9">
            <?php echo "CAD $".number_format($rowmain['property_propertydetail_landarea_amount'],2); ?>
            </td>
        </tr>
        <?php } ?>
        <?php if($rowmain['property_propertydetail_carpetarea_from']!=''){ ?>
        <tr id="carpetarea" style="display:none; visibility:hidden">
           <td width="200" align="right" class="normal_fonts9">Carpet Area  </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<?php echo $rowmain['property_propertydetail_carpetarea_from']." ".$rowmain['property_propertydetail_carpetarea_type']; ?>           
           </td>
        </tr>
        <?php } ?>
         <?php if($rowmain['property_propertydetail_carpetarea_rate']!=''){ ?>
        <tr id="carpetarearate" style="display:none; visibility:hidden">
          
          <td width="200" align="right" class="normal_fonts9">Carpet Area Rate </td>
          <td width="10" align="center" class="normal_fonts9">:</td>
          <td class="normal_fonts9">
            <?php echo "CAD $".number_format($rowmain['property_propertydetail_carpetarea_rate'],2); ?> 
            </td>
        </tr>
        <?php } ?>
         <?php if($rowmain['property_propertydetail_carpetarea_amount']!=''){ ?>
        <tr id="carpetareaamt" style="display:none; visibility:hidden">
          
          <td width="200" align="right" class="normal_fonts9">Carpet Area Amount </td>
          <td width="10" align="center" class="normal_fonts9">:</td>
          <td class="normal_fonts9">
            <?php echo "CAD $".number_format($rowmain['property_propertydetail_carpetarea_amount'],2); ?>
            </td>
        </tr>
        <?php } ?>
     <?php if($rowmain['property_propertydetail_budgetmin']!=0 && $rowmain['property_propertydetail_budgetmax']!=0){ ?>  
        <tr id="budget"   <?php  if($nmpost!="Buy"){ ?>  style="display:none; visibility:hidden"<?php }  ?> >
          <td width="200" align="right" class="normal_fonts9">Budget </td>
          <td width="10" align="center" class="normal_fonts9">:</td>
          <td class="normal_fonts9">
            <?php echo "CAD $".number_format($rowmain['property_propertydetail_budgetmin'],2)." To "."CAD $".number_format($rowmain['property_propertydetail_budgetmax'],2); ?>          
            </td>
        </tr>
           <?php } ?>
           <?php if($rowmain['property_propertydetail_locality']!=''){ ?>  
        <tr id="lbllocality">
          	<td width="200" align="right" class="normal_fonts9">Locality</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
             <?php				
					$qry="select property_propertydetail_locality from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					echo $nm=$row['property_propertydetail_locality'];
			?>
            </td>
          </tr>
            <?php } ?>
                <?php if($rowmain['property_propertydetail_deposit_amount']!=0){ ?>  
 
         <tr id="depositamt" <?php  if($nmpost!="Rent"){ ?> style="display:none;visibility:hidden;" <?php } ?>>
           <td width="200" align="right" class="normal_fonts9">Deposit Amount </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<?php echo "CAD $".number_format($rowmain['property_propertydetail_deposit_amount'],2); ?>         
           </td>
        </tr>
        <?php } ?>
               <?php if($rowmain['property_propertydetail_property_price']!=0){ ?>  

        <tr>
           <td width="200" align="right" class="normal_fonts9">Property Price</td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           	<?php echo "CAD $".number_format($rowmain['property_propertydetail_property_price'],2); ?>           
           </td>
        </tr>
        <?php } ?>
               <?php if($rowmain['property_propertydetail_expectedrent']!=0){ ?>  

        <tr id="expectedrent"  <?php  if(($nmpost!="Rent") && ($nmpost!="Lease")){ ?> style="display:none; visibility:hidden" <?php } ?>>
           <td width="200" align="right" class="normal_fonts9">Expected Rent </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           	<?php echo "CAD $".number_format($rowmain['property_propertydetail_expectedrent'],2); ?>            
           </td>
        </tr>
        <?php } ?>
               <?php if($rowmain['property_propertydetail_expectedprice']!=0){ ?>  

        <tr id="expectedprice" <?php  if(($nmpost!="Rent") && ($nmpost!="Sell")){ ?> style="display:none; visibility:hidden" <?php } ?>>
           <td width="200" align="right" class="normal_fonts9">Expected Price </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           	<?php echo "CAD $".number_format($rowmain['property_propertydetail_expectedprice'],2); ?>           
           </td>
        </tr>
       <?php } ?>
              <?php if($rowmain['property_propertydetail_timeperiod_for_rent']!=''){ ?>  

         <tr id="timerent" <?php  if(($nmpost!="Rent") && ($nmpost!="Lease")){ ?> style="display:none; visibility:hidden" <?php } ?>>
           <td width="200" align="right" class="normal_fonts9">TimePeriod For Rent </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
               <?php			
				
					 echo $rowmain["property_propertydetail_timeperiod_for_rent"]." ".$rowmain["property_propertydetail_timeperiod_for_rent_type"]; 
					 ?>
		
                            
           </td>
        </tr>
      <?php } ?>
             <?php if($rowmain['property_propertydetail_purpose_for_renting']!=''){ ?>  

        <tr id="purposerent" <?php if($nmpost!="Lease"){ ?> style="display:none; visibility:hidden" <?php } ?>>
           <td width="200" align="right" class="normal_fonts9">Purpose For Renting </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<?php echo $rowmain['property_propertydetail_purpose_for_renting']; ?>          
           </td>
        </tr>
        <?php } ?>
               <?php if($rowmain['property_propertdetail_selling_reason']!=''){ ?>  

        <tr id="sellreason" <?php if($nmpost!="Sell"){ ?> style="display:none; visibility:hidden"  <?php } ?>>
           <td width="200" align="right" class="normal_fonts9">Selling Reason </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<?php echo $rowmain['property_propertdetail_selling_reason']; ?>             
           </td>
        </tr>
        <?php } ?>
               <?php if($rowmain['property_propertydetail_type_of_seller_required']!=''){ ?>  

        <tr id="typeseller" <?php if($nmpost!="Buy"){ ?> style="display:none; visibility:hidden" <?php } ?>>
           <td width="200" align="right" class="normal_fonts9">Type of Seller Required </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
            <?php			
				
					$qry="select property_propertydetail_type_of_seller_required  from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					echo $nm=$row['property_propertydetail_type_of_seller_required'];
			?>               
           </td>
        </tr>
       <?php } ?>
       <?php if($rowmain['property_propertydetail_purpose_for_buying']!=''){ ?>  
         <tr id="buypurpose" <?php  if($nmpost!="Buy"){ ?> style="display:none; visibility:hidden" <?php } ?>>
           <td width="200" align="right" class="normal_fonts9">Purpose For Buying</td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           <?php
					$qry="select property_propertydetail_purpose_for_buying  from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					echo $nm=$row['property_propertydetail_purpose_for_buying'];					
			?>                       
           </td>
        </tr>
<?php } ?>
 <?php if($rowmain['property_propertydetail_use_for_property']!=''){ ?>  
        <tr id="useproperty" <?php  if($nmpost!="Buy"){ ?>  style="display:none; visibility:hidden" <?php } ?>>
           <td width="200" align="right" class="normal_fonts9">Use For Property</td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<?php echo $rowmain['property_propertydetail_use_for_property']; ?>              
           </td>
        </tr> 
        <?php } ?>
        <?php if($rowmain['property_propertydetail_timeframe_for_buying']!=''){ ?>         
        <tr id="timebuy"  <?php  if($nmpost!="Buy"){ ?> style="display:none; visibility:hidden"<?php } ?>>
           <td width="200" align="right" class="normal_fonts9">Timeframe For Buying</td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
            <?php
					$qry="select property_propertydetail_timeframe_for_buying  from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					echo $nm=$row['property_propertydetail_timeframe_for_buying'];
			?>                  
           </td>
        </tr>
        <?php } ?>
       <?php if($rowmain['property_propertydetail_seriousness_for_buying']!=''){ ?>  
        <tr id="seriousbuy" <?php  if($nmpost!="Buy"){ ?> style="display:none; visibility:hidden" <?php } ?>>
           <td width="200" align="right" class="normal_fonts9">Seriousness For Buying</td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
        
             <?php
			
					$qry="select property_propertydetail_seriousness_for_buying  from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
				echo $nm=$row['property_propertydetail_seriousness_for_buying'];
			?>
            	
                           
           </td>
        </tr>
      <?php } ?>
      <?php if($rowmain['property_propertydetail_transaction_type']!=''){ ?>  
         <tr id="transactiontype" <?php  if($nmpost!="Buy"){ ?> style="display:none; visibility:hidden" <?php } ?>>
          	<td width="200" align="right" class="normal_fonts9">Transaction Type</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
            <?php
					$qry="select property_propertydetail_transaction_type  from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					echo $nm=$row['property_propertydetail_transaction_type'];
			?>            	
            </td>
          </tr>
        <?php } ?> 
           <?php if($rowmain['property_propertydetail_property_ownership']!=''){ ?>    
         <tr id="propownership" <?php  if($nmpost!="Buy"){ ?> style="display:none; visibility:hidden" <?php } ?>>
          	<td width="200" align="right" class="normal_fonts9">Property Ownership</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
            <?php
					$qry="select property_propertydetail_property_ownership  from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
				echo $nm=$row['property_propertydetail_property_ownership'];
			?>
            	 
            </td>
          </tr> 
          <?php } ?>    
            <?php if($rowmain['property_propertdetail_possession_of_property']!=' '){ ?>    
         <tr id="proppossession" <?php  if($nmpost!="Buy"){ ?> style="display:none; visibility:hidden" <?php } ?>>
          	<td width="200" align="right" class="normal_fonts9">Possession Of Property</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
            <?php				
					$qry="select property_propertdetail_possession_of_property  from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					echo $nm=$row['property_propertdetail_possession_of_property'];
			?>            	 
            </td>
          </tr>
          <?php } ?>
             <?php if($rowmain['property_propertydetail_age_of_property']!=''){ ?>
         <tr id="propage" <?php  if($nmpost!="Buy"){ ?> style="display:none; visibility:hidden" <?php } ?>>
          	<td width="200" align="right" class="normal_fonts9">Age Of Property</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
             <?php
					$qry="select property_propertydetail_age_of_property  from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					echo $nm=$row['property_propertydetail_age_of_property'];
			?>            	
            </td>
          </tr>
         <?php } ?>
		 <tr id="additionalmsg"  <?php if($nmprop==" "){ ?> style="display:none; visibility:hidden" <?php } ?>>
          	<td colspan="3" class="normal_fonts14" style="color:#444; background-color:#EEEEEE" align="center">Additional Details</td>
          </tr>
         <?php if($rowmain['property_propertydetail_parking_space']!=''){ ?>
         
          <tr id="lblparking_space" <?php if($nmprop=="Vacant Land"){ ?> style="display:none; visibility:hidden;" <?php } ?>>
           <td width="200" align="right" class="normal_fonts9">Parking Space Total </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           <?php				
					$qry="select property_propertydetail_parking_space from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					echo $nmparking=$row['property_propertydetail_parking_space'];
			?>                     
           </td>
        </tr>
          <?php } ?>
      
          <tr id="lblairconditioning" <?php if($nmprop=="Vacant Land"){ ?> style="display:none; visibility:hidden;" <?php } ?>>
           <td width="200" align="right" class="normal_fonts9">Airconditioning </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           <?php
			$qry="select property_propertydetail_airconditioning from  property_propertydetail_master where property_propertydetail_id=$pid";
			$sql=mysql_query($qry) or die(mysql_error());
			$row=(mysql_fetch_array($sql));
			$nmairconditioning=$row['property_propertydetail_airconditioning'];
			if($nmairconditioning=="1"){ echo "Yes"; } 
			if($nmairconditioning=="0"){ echo "No"; } 
			 ?>
				               
           </td>
        </tr>
         
        <tr id="lblgarage" <?php if($nmprop=="Vacant Land"){ ?> style="display:none; visibility:hidden;" <?php } ?>>
           <td width="200" align="right" class="normal_fonts9">Garage Facility </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           <?php
					$qry="select property_propertydetail_garage_facility from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					$nmgarage=$row['property_propertydetail_garage_facility'];
					if($nmgarage=="1"){ echo "Yes"; } 
			if($nmgarage=="0"){ echo "No"; } 
			?>               
           </td>
        </tr>
        <?php if($rowmain['property_propertydetail_annual_tax_amt']!=0){ ?>
          <tr id="lblannual_tax_amt" <?php if($nmprop=="Vacant Land"){ ?> style="display:none; visibility:hidden;" <?php } ?>>
           <td width="200" align="right" class="normal_fonts9">Annual Tax Amount </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
                     
           <?php
					$qry="select property_propertydetail_annual_tax_amt from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					echo $nmannual_tax_amt="CAD $".number_format($row['property_propertydetail_annual_tax_amt'],2);
			?>
        
           </td>
        </tr>
          <?php } ?>
     <?php if($rowmain['property_propertydetail_tax_year']!=''){ ?>
         <tr id="lbltax_year" <?php if($nmprop=="Vacant Land"){ ?> style="display:none; visibility:hidden;" <?php } ?>>
           <td width="200" align="right" class="normal_fonts9">Tax Year</td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
         <?php
					$qry="select property_propertydetail_tax_year from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					echo $nmtax_year=$row['property_propertydetail_tax_year'];
			?>
				               
           </td>
        </tr>
     <?php } ?>
         <tr id="lblpool" <?php if($nmprop=="Vacant Land"){ ?> style="display:none; visibility:hidden;" <?php } ?>>
           <td width="200" align="right" class="normal_fonts9">Pool  </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">         			
           <?php 
					$qry="select property_propertydetail_pool from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					$nmpool=$row['property_propertydetail_pool'];
					if($nmpool=="1"){ echo "Yes"; } 
			if($nmpool=="0"){ echo "No"; } 
			?>				               
           </td>
        </tr>
        <?php if($rowmain['property_propertydetail_extra_detail']!=''){ ?> 
        <tr id="lblextra_detail" <?php if($nmprop=="Vacant Land"){ ?> style="display:none; visibility:hidden;" <?php } ?>>
           <td width="200" align="right" class="normal_fonts9">Extra Detail </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
             <?php
				
				 echo $rowmain['property_propertydetail_extra_detail'];
				
?>       
           </td>
        </tr>
       <?php } ?>
        <?php if($rowmain['property_propertydetail_bedroom']!=''){ ?> 
        <tr id="bedroom" <?php if(($nmprop!="Detached") && ($nmprop!="Semi-Detached") && ($nmprop!="Townhouse") && ($nmprop!="Condominium")){ ?> style="display:none; visibility:hidden" <?php } ?>>
           <td width="200" align="right" class="normal_fonts9">Bedroom </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<?php echo $rowmain['property_propertydetail_bedroom']; ?>
				               
           </td>
        </tr>
      
           <?php } ?>
            <?php if($rowmain['property_propertydetail_bathroom']!=''){ ?> 
        <tr id="bathroom" <?php if(($nmprop!="Detached") && ($nmprop!="Semi-Detached") && ($nmprop!="Townhouse") && ($nmprop!="Condominium")){ ?> style="display:none; visibility:hidden" <?php } ?>>
           <td width="200" align="right" class="normal_fonts9">Bathroom </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           	<?php echo $rowmain['property_propertydetail_bathroom']; ?>
				               
           </td>
        </tr>
         <?php } ?>
          <?php if($rowmain['property_propertydetail_balconies']!=''){ ?> 
        <tr id="balcony" <?php if(($nmprop!="Detached") && ($nmprop!="Semi-Detached") && ($nmprop!="Townhouse") && ($nmprop!="Condominium")){ ?> style="display:none; visibility:hidden" <?php } ?>>
           <td width="200" align="right" class="normal_fonts9">Balconies </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           	<?php echo $rowmain['property_propertydetail_balconies']; ?>          
           </td>
        </tr>
          <?php } ?>
          
             <?php if($rowmain['property_propertydetail_building_no']!=''){ ?>   
        <tr id="buildingno" style="display:none; visibility:hidden" >
           <td width="200" align="right" class="normal_fonts9">Building no </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<?php echo $rowmain['property_propertydetail_building_no']; ?>
           </td>
        </tr>
           <?php } ?>
                 <?php if($rowmain['property_propertydetail_select_flat_feature']!=''){ ?> 
        <tr id="flatfeature" style="display:none; visibility:hidden">
          <td width="200" align="right" class="normal_fonts9">Features</td>
          <td width="10" align="center" class="normal_fonts9">:</td>
          <td class="normal_fonts9">
            <?php
					$qry="select property_propertydetail_select_flat_feature  from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					echo $nm=$row['property_propertydetail_select_flat_feature'];
			?> 
            </td>
        </tr>
           <?php } ?> 
                 <?php if($rowmain['property_propertydetail_flooring']!=''){ ?>        
         <tr id="flooring" style="display:none; visibility:hidden" >
          	<td width="200" align="right" class="normal_fonts9">Flooring</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
            <?php
					$qry="select property_propertydetail_flooring  from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					echo $nm=$row['property_propertydetail_flooring'];
			?>
            </td>
          </tr>  
             <?php } ?>   
                   <?php if($rowmain['property_propertydetail_directional_facing']!=''){ ?>     
         <tr id="direfacing" <?php if(($nmprop!="Detached") && ($nmprop!="Semi-Detached") && ($nmprop!="Townhouse") && ($nmprop!="Condominium")){ ?> style="display:none; visibility:hidden" <?php } ?>>
          	<td width="200" align="right" class="normal_fonts9">Directional Facing</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
            <?php
					$qry="select property_propertydetail_directional_facing  from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					echo $nm=$row['property_propertydetail_directional_facing'];
			?>
            	
            </td>
          </tr>
            <?php } ?>
             <?php if($rowmain['property_propertydetail_facing']!=''){ ?> 
         <tr id="facing" <?php if(($nmprop!="Detached") && ($nmprop!="Semi-Detached") && ($nmprop!="Townhouse") && ($nmprop!="Condominium")){ ?> style="display:none; visibility:hidden" <?php } ?>>
          	<td width="200" align="right" class="normal_fonts9">Facing</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
             <?php
					$qry="select property_propertydetail_facing  from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					echo $nm=$row['property_propertydetail_facing'];
			?>            	
            </td>
          </tr> 
             <?php } ?>  
              <?php if($rowmain['property_propertydetail_furnished']!=''){ ?>       
         <tr id="furnished" <?php if(($nmprop!="Detached") && ($nmprop!="Semi-Detached") && ($nmprop!="Townhouse") && ($nmprop!="Condominium")){ ?> style="display:none; visibility:hidden" <?php } ?>> 
          	<td width="200" align="right" class="normal_fonts9">Furnished</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
            <?php
				
					$qry="select property_propertydetail_furnished  from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					echo $nm=$row['property_propertydetail_furnished'];
				
			?>            
            </td>
          </tr>
             <?php } ?>  
             <?php if($rowmain['property_propertydetail_furniture_detail']!=''){ ?>        
          <tr id="furnituredetail" <?php if(($nmprop!="Detached") && ($nmprop!="Semi-Detached") && ($nmprop!="Townhouse") && ($nmprop!="Condominium")){ ?> style="display:none; visibility:hidden" <?php } ?>>
          	<td width="200" align="right" class="normal_fonts9">Furniture Detail</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
             <?php				
					$qry="select property_propertydetail_furniture_detail  from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					echo $nm=$row['property_propertydetail_furniture_detail'];
			?>            
            </td>
          </tr> 
             <?php } ?>
            <?php if($rowmain['property_propertydetail_distance_from_highway_type']!=''){ ?> 
          <tr id="disthighway" <?php if(($nmprop!="Condominium")){ ?> style="display:none; visibility:hidden" <?php } ?>>
           <td width="200" align="right" class="normal_fonts9">Distance From Highway </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		
                <?php				
					$qry="select property_propertydetail_distance_from_highway_type from  property_propertydetail_master where property_propertydetail_id=$pid";
					$sql=mysql_query($qry) or die(mysql_error());
					$row=(mysql_fetch_array($sql));
					echo $nm=$row['property_propertydetail_distance_from_highway_type'];
			?>                 
           </td>
        </tr> <?php } ?>
                <?php if($rowmain['property_propertydetail_photo']!=''){ ?>
      
        <tr id="propimage">
           <td width="200" align="right" class="normal_fonts9">Upload Property Image 1</td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<img src="uploadimages/property/<?php echo $rowmain['property_propertydetail_photo']; ?>"  name="img1" width="250" height="70" /> 
           </td>
        </tr>
           <?php } ?>
                <?php if($rowmain['property_propertydetail_photo2']!=''){ ?>

        <tr >
           <td width="200" align="right" class="normal_fonts9">Upload Property Image 2</td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           	<img src="uploadimages/property/<?php echo $rowmain['property_propertydetail_photo2']; ?>"  name="img2" width="250" height="70" /> 				           
           </td>
        </tr>
           <?php } ?>
                <?php if($rowmain['property_propertydetail_photo3']!=''){ ?>

         <tr >
           <td width="200" align="right" class="normal_fonts9">Upload Property Image 3</td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<img src="uploadimages/property/<?php echo $rowmain['property_propertydetail_photo3']; ?>"  name="img3" width="250" height="70" />                           
           </td>
        </tr>
           <?php } ?>
                <?php if($rowmain['property_propertydetail_photo4']!=''){ ?>

         <tr >
           <td width="200" align="right" class="normal_fonts9">Upload Property Image 4</td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		 <img src="uploadimages/property/<?php echo $rowmain['property_propertydetail_photo4']; ?>"  name="img4" width="250" height="70" />                         
           </td>
        </tr>
           <?php } ?>
        <?php if($rowmain['property_propertydetail_photo5']!=''){ ?>
         <tr >
           <td width="200" align="right" class="normal_fonts9">Upload Property Image 5</td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<img src="uploadimages/property/<?php echo $rowmain['property_propertydetail_photo5']; ?>"  name="img5" width="250" height="70" />                         
           </td>
        </tr>
       <?php } ?>
         
        
          
           <?php
		
		   $resami=mysql_query("select * from property_propertydetail_amenities
							   INNER JOIN  property_amenities_master ON  property_amenities_master.property_amenities_id=property_propertydetail_amenities.property_propertydetail_amenities_name
							   where property_propertydetail_amenities_property_id='".$pid."'");
			$totalami=mysql_num_rows($resami);
			$b=1;
			 if($totalami!=0){
				 ?>
                 <tr id="amenities" >
          	<td colspan="3" class="normal_fonts14" style="color:#444; background-color:#EEEEEE" align="center">Amenities</td>
          </tr>
         
        <tr>
          	<td width="200" align="right" class="normal_fonts9">Amenities</td>
            <td width="10" align="center" class="normal_fonts9">:</td>
            <td class="normal_fonts9">
          <?php
	 
		while($rowami=mysql_fetch_array($resami))
		{
			echo $rowami["property_amenities_name"];
			if($b!=$totalami)
				{
			
					echo ", ";
				}
			 $b++;
		}
		?>		
                
            </td>
          </tr>
          <?php } ?>
          <?php if($rowmain['property_propertydetail_postpropertyfor']!='Buy'){ ?>
          
          <tr>
          	<td colspan="3" class="normal_fonts14" bgcolor="#eee" style="color:#444;" align="center">Property/Project Details</td>
          </tr>
      <?php if($rowmain['property_propertydetail_property_no']!=''){ ?>   
        <tr>
           <td width="200" align="right" class="normal_fonts9">Property No </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<?php echo $rowmain['property_propertydetail_property_no']; ?>
           </td>
        </tr>
        <?php } ?>
        
      <?php if($rowmain['property_propertydetail_property_name']!=''){ ?>  
        <tr>
           <td width="200" align="right" class="normal_fonts9">Property Name </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           	<?php echo $rowmain['property_propertydetail_property_name']; ?>  
           </td>
        </tr>
        <?php } ?>
         <?php if($padd!=''){ ?>  
        <tr>
           <td width="200" align="right" class="normal_fonts9">Property Address </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           	<?php echo $padd; ?>
           </td>
        </tr>
        <?php } ?>
         <?php if($rowmain['property_propertydetail_project_name']!=''){ ?>  
        <tr>
           <td width="200" align="right" class="normal_fonts9">Project Name</td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           <?php echo $rowmain['property_propertydetail_project_name']; ?>    
           </td>
        </tr>
        <?php } ?>
         <?php if($pdes!=''){ ?>          
        <tr>
           <td width="200" align="right" class="normal_fonts9">Project Description </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           <?php echo $pdes;?>
           </td>
        </tr>
        <?php } ?>
       <?php if($rowmain['property_propertydetail_property_url']!=''){ ?>          
         <tr>
           <td width="200" align="right" class="normal_fonts9">Project Url </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<?php echo $rowmain['property_propertydetail_property_url']; ?> 
           </td>
        </tr>
        <?php } ?>
    <?php } ?>
        <tr>
          	<td colspan="3" class="normal_fonts14" bgcolor="#eee" style="color:#444;" align="center">Contact Details</td>
          </tr>
         <?php if($rowmain['property_propertydetail_name']!=''){ ?>     
        <tr>
           <td width="200" align="right" class="normal_fonts9">Person Name </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           	<?php echo $rowmain['property_propertydetail_name']; ?>         
           </td>
        </tr>
        <?php } ?>
        <?php if($rowmain['property_propertdetail_property_email']!=''){ ?>    
        <tr>
           <td width="200" align="right" class="normal_fonts9">Email Address </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           	<?php echo $rowmain['property_propertdetail_property_email']; ?>          
           </td>
        </tr>
         <?php } ?>
       
        <?php if($cadd!=''){ ?>  
        <tr>
           <td width="200" align="right" class="normal_fonts9">Company Address </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<?php echo $cadd; ?>    
           </td>
        </tr>
        <?php } ?>
        <?php if($rowmain['property_propertydetail_phoneno']!=0){ ?>  
         <tr>
           <td width="200" align="right" class="normal_fonts9">Contact No </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           	<?php echo $rowmain['property_propertydetail_phoneno']; ?>              
           </td>
        </tr>
        <?php } ?>       
   		<tr>
     		<td height="10" colspan="3" align="right" class="normal_fonts9"></td>
        </tr>
   		<tr>
   		  <td align="right" class="normal_fonts9">&nbsp;</td>
   		  <td align="center" class="normal_fonts9">&nbsp;</td>
   		  <td class="normal_fonts9">
   		    
   		    <input name="Back" type="button" class="normal_fonts12_black" id="Back" style="width:80px; height:30px" value="Back" onclick="history.go(-1)" />
   		    
   		    </td>
 		  </tr>
       	<tr>
       		<td height="10" colspan="3" align="right" class="normal_fonts9"></td>
   		</tr>
      </table>
     </td>
   </tr>
</table>
</form>
     </td></tr></table>
                  
                     <!-- main ends here  -->
            
         </td>
          </tr>
        </table></td>
      </tr>
    
    </table></td>
  </tr>
    <tr>
        <td align="center" valign="middle">
        <?php  include("footer.php"); ?>
        
        </td>
      </tr>
</table>

</body>
</html>                    