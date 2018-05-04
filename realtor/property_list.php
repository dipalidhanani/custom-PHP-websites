<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<link type='text/css' href='css/demo.css' rel='stylesheet' media='screen' />

<!-- Contact Form CSS files -->
<link type='text/css' href='css/basic.css' rel='stylesheet' media='screen' />
<table width="99%" border="0" cellspacing="0" cellpadding="0">
      
          <tr>           
            <td>           

<table width="100%" border="0" cellspacing="10" cellpadding="0">
           <tr>
                            <td width="71%" class="title_red"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="25"><img src="images/arrow1.png" width="19" height="18"></td>
                                    <td class="title_red"><strong>Property List</strong></td>
                                    </tr>
                                </table></td>
</tr>
          
<tr>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

<?php 

$queryprop="select * from property_propertydetail_master where property_propertydetail_status='Yes' order by property_propertydetail_id desc limit 10";

$res=mysql_query($queryprop);
$rows1=mysql_num_rows($res);

if($rows1>0){ 

 while($rowprop = mysql_fetch_array($res))
 {	
 
 $qarea=mysql_query("select * from rm_area_master where rm_area_id='".$rowprop["propperty_propertydetail_area_id"]."'");
 $rowarea=mysql_fetch_array($qarea);
 
 $qptype=mysql_query("select * from property_type_master where property_type_id='".$rowprop["property_propertdetail_property_type_id"]."'");
 $rowptype=mysql_fetch_array($qptype);
 
?>
          <tr>
          <td>
          <div style="background-color:#FFFFFF; cursor:pointer;" onmouseover="this.style.background='#eeeeee';" onmouseout="this.style.background='#FFFFFF';" onclick="location.href='home.php?pageno=26&pid=<?php echo $rowprop["property_propertydetail_id"]; ?>';">
         
          <table width="100%" border="0" cellspacing="0" cellpadding="10" style="border:1px solid #dddddd; box-shadow: 0 3px 0 #EEEEEE;"  >          
          <tr>
          <td width="15" class="black10" valign="middle">
            <?php echo $i."."; ?>
           </td>
           <td width="120" class="black10" valign="middle">
           <?php if($rowprop["property_propertydetail_photo"]!=''){ ?>
            <img src="admin/uploadimages/property/<?php echo $rowprop["property_propertydetail_photo"]; ?>" width="120" height="120"  style="padding:3px; border:1px solid #ddd;" />
            <?php } else { ?>
            <img src="images/noimage.jpg" width="120" height="120" border="0" style="padding:3px; border:1px solid #ddd;" />
            <?php } ?>
            
           </td>
           <td valign="top">
           
           <table width="100%" border="0" cellspacing="0" cellpadding="5">
           <tr><td width="50%"> <table width="100%" border="0" cellspacing="0" cellpadding="5">
                 
            <tr>
           <td class="black9"><strong>Property For : </strong><?php echo $rowprop["property_propertydetail_postpropertyfor"]; ?></td>
           </tr>
           
           <tr>
           <td class="black9"><strong>Street :</strong> <?php echo $rowarea["rm_area_title"]; ?></td>
           </tr>
           <tr>
           <td class="black9"><strong>Postal Code : </strong><?php echo $rowprop["propperty_propertydetail_area_code"]; ?></td>
           </tr>
             <tr>
           <td class="black9" valign="top">         
          <a href="home.php?pageno=26&pid=<?php echo $rowprop["property_propertydetail_id"]; ?>&notifymsg=prop_details" class="basic" style="color:#AB2400;"><img src="images/arrow.png" align="absmiddle" border="0" width="16" height="16" style="margin-bottom:4px; margin-right:5px;" />View More Details</a>
          </td>
          </tr> 
           </table></td>
           <td width="50%" valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="5">          
           <tr>
           <td class="black9"><strong>Property Type : </strong><?php echo $rowptype["property_type_name"]; ?></td>
           </tr>
           <!--<tr>
           <td class="black9"><strong>Property Type : </strong><?php //echo $rowpname["property_name"]; ?></td>
           </tr>-->
           <tr>
           <td class="black9"><strong>Property Price : </strong><?php echo "CAD $".number_format($rowprop["property_propertydetail_property_price"],2); ?></td>
           </tr>
         
          <tr>
          <td class="black9" valign="top" align="left">
				<a href="home.php?pageno=27&pid=<?php echo $rowprop["property_propertydetail_id"]; ?>" class='basic' style="color:#AB2400;"><img src="images/arrow.png" align="absmiddle" border="0" width="16" height="16" style="margin-bottom:4px; margin-right:5px;" />Send An Inquiry</a>
          </td>
           </tr>
          </table></td></tr>
           </table>
           
           
           </td>
           
           </tr></table>
          </div>
           </td>
          </tr>
         <tr><td height="10"></td></tr>
          
  <?php  $i++; } } else { ?> 
   <tr><td  style="color:#AB2400; font-size:13px;">
  No Properties found related to your search!
  </td></tr>
  <?php } ?>
  
      
          </table></td></tr>
          
          
           <tr><td height="5"></td></tr>
          
        </table>
</td></tr></table>
