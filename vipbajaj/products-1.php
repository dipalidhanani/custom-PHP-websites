<?php
include("include/config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>VIP AUTO</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<link href="css/home.css" rel="stylesheet" type="text/css" />
</head>

<body>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><?php include("header.php"); ?></td>
  </tr>
   <?php
  $bikeid=$_GET["bikeid"];
  $qbike=mysql_query("select * from bike_mast where Bike_id ='".$bikeid."'");
		if($rowbike=mysql_fetch_array($qbike))
		{
		?>
  <tr>
    <td><table width="980" border="0" align="center" cellpadding="0" cellspacing="10">
      <tr>
        <td class="blue"><a href="index.php">Home</a> &gt; <a href="products.php">Products</a> &gt; <?php echo $rowbike["Bike_name"]; ?></td>
      </tr>
      
 
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
                  <tr>
                    <td class="title"><strong><?php echo $rowbike["Bike_name"]; ?> </strong></td>
                    </tr>
                  <tr>
                    <td height="5" class="title"></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="10"></td>
              </tr>
              <tr>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="200" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border">
                          <tr>
                            <td><img name="productimages" id="productimages" src="bike_photos/<?php echo $rowbike["Bike_big_photo"]; ?>" width="470" height="276" border="0" /></td>
                            </tr>
                          </table></td>
                        </tr>
                      <tr>
                        <td height="10"></td>
                        </tr>
                      <tr>
                        <td align="center" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                          <tr>
                            <td align="center" valign="middle" width="100"><table border="0" cellpadding="0" cellspacing="5" class="border">
                              <tr>
                                <td>
                                <a href="#" onclick="document.getElementById('productimages').src = 'bike_photos/<?php echo $rowbike["Bike_big_photo"]; ?>';" >
                                <img src="bike_photos/<?php echo $rowbike["Bike_thumb_photo"]; ?>" width="98" height="56" border="0" /></a></td>
                                </tr>
                              </table></td>
                            
                            <td align="center" valign="middle" width="100">
                            <?php if($rowbike["Additional_bike_thumb_photo1"]!=''){ ?>  
                            <table border="0" cellspacing="5" cellpadding="0" class="border">
                              <tr>
                                <td>
                                <a href="#" onclick="document.getElementById('productimages').src = 'bike_photos/<?php echo $rowbike["Additional_bike_big_photo1"]; ?>';" >
                                <img id="add_thumb1" src="bike_photos/<?php echo $rowbike["Additional_bike_thumb_photo1"]; ?>" width="98" height="56" border="0" /></a>
                                
                                </td>
                                </tr>
                              </table>
                              <?php } ?>
                              </td>
                              
                              
                            <td align="center" valign="middle" width="100">
                            <?php if($rowbike["Additional_bike_thumb_photo2"]!='') { ?>
                            <table border="0" cellspacing="5" cellpadding="0" class="border">
                              <tr>
                                <td>
                                  <a href="#" onclick="document.getElementById('productimages').src = 'bike_photos/<?php echo $rowbike["Additional_bike_big_photo2"]; ?>';" >
                                <img src="bike_photos/<?php echo $rowbike["Additional_bike_thumb_photo2"]; ?>" width="98" height="56" border="0" /></a>
                            </td>
                                </tr>
                              </table>
                                <?php } ?>
                              </td>
                              
                               
                            <td align="center" valign="middle" width="100">
                           <?php if($rowbike["Additional_bike_thumb_photo3"]!='') { ?>
                            <table border="0" cellspacing="5" cellpadding="0" class="border">
                              <tr>
                                <td>
                                <a href="#" onclick="document.getElementById('productimages').src = 'bike_photos/<?php echo $rowbike["Additional_bike_big_photo3"]; ?>';" >
                                <img src="bike_photos/<?php echo $rowbike["Additional_bike_thumb_photo3"]; ?>" width="98" height="56" border="0" /></a></td>
                                </tr>
                              </table>
                               <?php } ?>
                              </td>
                             
                            </tr>
                          </table></td>
                        </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      <?php if($rowbike["free_service"]!=""){ ?>
                      <tr>
                        <td class="title"><strong>Free Service</strong></td>
                      </tr>
                       <tr>
                        <td class="black10"><?php echo $rowbike["free_service"]; ?></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      <?php } ?>
                      </table></td>
                    <td width="10">&nbsp;</td>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                     <tr>
                        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <?php
		
			
			  $recordsetcategory = mysql_query("SELECT * FROM  bike_specification_mast where Parent_feature_ID=0 order by Feature_ID");
			  while($rowcategory = mysql_fetch_array($recordsetcategory,MYSQL_ASSOC))
			  {
				  
				   $recordsetparent = mysql_query("SELECT * FROM  bike_specification_mast where Parent_feature_ID='".$rowcategory["Feature_ID"]."'");
				   $a=0;
				  while($rowparent = mysql_fetch_array($recordsetparent,MYSQL_ASSOC)){
				  
				
				  $recordsetparent1 = mysql_query("SELECT * FROM  bike_specification_detail where Feature_mast_id='".$rowparent["Feature_ID"]."' and Bike_mast_id='".$rowbike["Bike_id"]."'");
				 $totparent=mysql_num_rows($recordsetparent1);
				 if($totparent>0)
				 {$a++;}
				 
				   }
				  
				if($a>0){
			  ?>                   
                     
                          <tr>
                            <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
                              <tr>
                                <td width="150" height="30" bgcolor="#0A51A1" class="white10">
                                <strong>&nbsp;<?php echo $rowcategory["Feature_name"];?></strong>
                                </td>
                                </tr>
                              </table></td>
                            </tr>
                             
           <?php
				}
			  $recordsetcategory1 = mysql_query("SELECT * FROM  bike_specification_mast where Parent_feature_ID='".$rowcategory["Feature_ID"]."'");
			  while($rowcategory1 = mysql_fetch_array($recordsetcategory1,MYSQL_ASSOC))
			  {
					 $a="SELECT * FROM  bike_specification_detail
			 INNER JOIN bike_mast ON bike_mast.Bike_id = bike_specification_detail.Bike_mast_id
			 INNER JOIN bike_specification_mast ON bike_specification_mast.Feature_ID = bike_specification_detail.Feature_mast_id
			 where Bike_mast_id='".$rowbike["Bike_id"]."' and Feature_mast_id='".$rowcategory1['Feature_ID']."'";
			 $b=mysql_query($a);
			 $row1=mysql_fetch_array($b);
			  
			  if($row1['Feature_mast_id']==$rowcategory1["Feature_ID"]){
			  ?> <tr>
                            <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
                        
                              <tr>
                                <td width="150" height="25" bgcolor="#E3E4E6" class="black10">&nbsp;
                                 <?php echo $rowcategory1["Feature_name"];?></td>
                                <td bgcolor="#E3E4E6" class="black10">&nbsp; 
								<?php  echo $row1['Feature_value'];  ?></td>
                                </tr>
                        </table></td>
                            </tr>   
                        
                <?php } } } ?>   
                
                 </table></td>
                        </tr>     
                     
                      <tr>
                            <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
                              <tr>
                                <td width="150" height="30" bgcolor="#0A51A1" class="white10">
                                <strong>&nbsp;Available Colors</strong>
                                </td>
                                </tr>
                              </table></td>
                            </tr>
                       <?php $qcolor=mysql_query("select * from bike_colors
												INNER JOIN color_mast ON color_mast.Color_id=bike_colors.color_mast_id
												where bike_mast_id='".$rowbike["Bike_id"]."'"); 
					  while($rowcolor=mysql_fetch_array($qcolor)){
					  ?>
                       
                       
                       <tr>
                            <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
                        
                              <tr>
                                <td width="150" height="25" bgcolor="#E3E4E6" class="black10">&nbsp;
                                 <?php echo $rowcolor["Color"];?></td>
                                <td bgcolor="#E3E4E6" class="black10" valign="middle" >&nbsp; 
								 <img src="colors/<?php echo $rowcolor["Color_image"]; ?>" style="padding-top:2px;" /></td>
                                </tr>
                        </table></td>
                            </tr>
                             <?php } ?>   
                    
                      <tr>
                        <td align="left" valign="top">&nbsp;</td>
                      </tr>
                      <?php if($rowbike["key_features"]!=""){ ?>
                      <tr>
                        <td align="left" valign="top" class="black10"><a href="features/<?php echo $rowbike["key_features"]; ?>" target="_blank">Key Features</a></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top">&nbsp;</td>
                      </tr>
                      <?php } ?>
                      </table></td>
                  </tr>
                  </table></td>
              </tr>
            </table></td>
            </tr>
        </table></td>
      </tr>
      
      <?php } ?>
      <tr>
        <td height="80" align="left" valign="top"><?php include("bikeslider1.php"); ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="top"><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>
