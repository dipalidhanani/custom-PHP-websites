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
                                    <td class="title_red"><strong>Property Search</strong></td>
                                    </tr>
                                </table></td>
</tr>


<?php 
if($_REQUEST["minprice"]=='Min'){$min='';}else{$min=$_REQUEST["minprice"];}
if($_REQUEST["maxprice"]=='Max'){$max='';}else{$max=$_REQUEST["maxprice"];}
$_SESSION["areaid"]=$_REQUEST["areaid"];
$_SESSION["areacode"]=$_REQUEST["areacode"];
$_SESSION["ddlpost"]=$_REQUEST["ddlpost"];
$_SESSION["ddlptype"]=$_REQUEST["ddlptype"];
$_SESSION["ddlprop"]=$_REQUEST["ddlprop"];
$_SESSION["minprice"]=$min;
$_SESSION["maxprice"]=$max;
				
if($_REQUEST["ddlcity"]!=0){
$queryprop="select * from property_propertydetail_master where property_propertydetail_city_id = '".$_REQUEST["ddlcity"]."'";
}
if($_REQUEST["areaid"]!=0){
$queryprop="and propperty_propertydetail_area_id = '".$_REQUEST["areaid"]."'";
}
if($_REQUEST["areacode"]!=""){
$queryprop.=" and propperty_propertydetail_area_code = '".$_REQUEST["areacode"]."'";
}
if($min!=""){
$queryprop.=" and property_propertydetail_property_price >= '".$min."'";
}
if($max!=""){
$queryprop.=" and property_propertydetail_property_price <= '".$max."'";
}
$data_p = mysql_query($queryprop) or die(mysql_error());
$totalrecords=mysql_num_rows($data_p);
if($totalrecords!=0)
{
?>

<tr>
<td align="left"  style="color:#AB2400; font-size:13px;" colspan="3">Total <strong><?php echo $totalrecords;  ?></strong> Properties found related to your search!</td>
</tr>
<?php
}
?>
          
<tr>
<td>
<table border="0" cellspacing="5" cellpadding="5">



 <tr>
<?php
if($totalrecords>0){ 
$i=1;			
 while($rowprop = mysql_fetch_array($data_p))
 {										
?>
       <td width="210" <?php if((($i%3)!=0) && ($totalrecords!=$i)){ ?> style="border-right:1px dotted #444;" <?php } ?> >
       <table>
          <tr>  
           <td class="black10">
            <img src="admin/uploadimages/property/<?php echo $rowprop["property_propertydetail_photo"]; ?>" width="200" height="200" />
           </td>
         </tr>
         <tr>
           <td class="black10" align="center"><?php echo "CAD $".number_format($rowprop["property_propertydetail_property_price"],2); ?></td>
         </tr>
       </table>
       </td> 
          
  <?php		
  if(($i%3)==0)
  {echo "</tr><tr>";  }
 $i++;} 
 } else { 
 ?> 
   <tr><td class="black10" style="color:#AB2400; font-size:13px;">
  No Products Found Related to your search!
  </td></tr>
  <?php } ?>
  
       
     
          </table></td></tr>
          
          
           <tr><td height="5"></td></tr>
          
        </table>
</td></tr></table>
