<?php
require_once("include/config.php");
?>		 

<table width="100%" border="0" cellspacing="0" cellpadding="0">
             
				  <tr>
                  <td class="black10">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                         
              <tr>
                        
                            <td align="left" valign="top">
<?php							
$rs_prop = mysql_query("select * from property_propertydetail_master 
where property_propertydetail_id='".$_REQUEST["propertyid"]."'");
    
    if($row = mysql_fetch_array($rs_prop,MYSQL_ASSOC))
       {$qcity=mysql_query("select * from rm_city_master where rm_city_id='".$row["property_propertydetail_city_id"]."'");
 $rowcity=mysql_fetch_array($qcity);
         $qarea=mysql_query("select * from rm_area_master where rm_area_id='".$row["propperty_propertydetail_area_id"]."'");
 $rowarea=mysql_fetch_array($qarea);
 
 $qptype=mysql_query("select * from property_type_master where property_type_id='".$row["property_propertdetail_property_type_id"]."'");
 $rowptype=mysql_fetch_array($qptype); 

        ?>

                            <table width="100%" border="0" cellspacing="3" cellpadding="3">
							 <tr>
							   <td colspan="2" align="left" class="black10"><strong>Property Details</strong> </td>
							   </tr>
							             <?php if($row["property_propertydetail_property_name"]!=''){ ?>
							  <tr>
           <td class="black10" width="17%" align="left" >Property Name : </td><td width="83%" class="black10"><?php echo $row["property_propertydetail_property_name"]; ?></td>
           </tr>
           <?php }  ?>
           <tr>
           <td class="black10" width="17%" align="left" >Property For : </td> <td width="83%" class="black10"><?php echo $row["property_propertydetail_postpropertyfor"]; ?></td>
           </tr>
          
             <tr>
           <td class="black10" width="17%" align="left" >City : </td><td class="black10"><?php echo $rowcity["rm_city_title"]; ?></td>
           </tr>
           <tr>
           <td class="black10" width="17%" align="left" >Street : </td><td class="black10"><?php echo $rowarea["rm_area_title"]; ?></td>
           </tr>
           <tr>
           <td class="black10" width="17%" align="left" >Postal Code : </td><td class="black10"><?php echo $row["propperty_propertydetail_area_code"]; ?></td>
           </tr>           
           <tr>
           <td class="black10" width="17%" align="left" >Property Type : </td><td class="black10"><?php echo $rowptype["property_type_name"]; ?></td>
           </tr>         
           <tr>
           <td class="black10" width="17%" align="left" >Property Price : </td><td class="black10"><?php echo "CAD $".number_format($row["property_propertydetail_property_price"],2); ?></td>
           </tr>
													  
</table>
  <?php 
  }
   ?>	
</td>
                          
                          </tr>
                          
                        
                        </table>
                  
                  
                  </td>
                  </tr>
                  <tr>
                  
                  <td class="black10">
                  
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                         
                          <tr>
                           
                            <td align="left" valign="top" ><table width="100%" border="0" cellspacing="3" cellpadding="3">
                                <tr>
                                  <td colspan="2" align="left" class="black10"><strong>Inquiry Details</strong> </td>
                                </tr>
                                <tr>
                                  <td width="17%" align="left" class="black10">Name : </td>
                                  <td width="83%" align="left" class="black10"><?php print($_REQUEST["user_name"]); ?></td>
                                </tr>
                                <tr>
                                  <td align="left" class="black10">Mobile No : </td>
                                  <td align="left" class="black10"><?php print($_REQUEST["mobile"]); ?></td>
                                </tr>
                                <tr>
                                  <td align="left" class="black10">E-Mail : </td>
                                  <td align="left" class="black10"><?php print($_REQUEST["email"]); ?></td>
                                </tr>
                                <tr>
                                  <td align="left" valign="top" class="black10">Requirements / Comments : </td>
                                  <td align="left" class="black10"><?php print($_REQUEST["comments"]); ?></td>
                                </tr>
                                
                      

                            </table></td>
                        
                          </tr>
                         <tr><td height="10"></td></tr>
                         <tr>
                                  <td colspan="2" align="left" valign="top" class="black10">Thanks & Regards,</td>
                              </tr>
                               <tr>
                                  <td colspan="2" align="left" valign="top" class="black10">RM Realtor Team</td>
                              </tr>
                        </table>
                  
                  </td>
                 </tr>
         
                        </table></td>
                      
                      </tr>
                     
                  </table>
