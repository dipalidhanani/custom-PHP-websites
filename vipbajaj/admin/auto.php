<?php
session_start();
include("include/config.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to VIP AUTO - Bike</title>
<link href="../css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../menu_style.css" type="text/css" />

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
<link rel="stylesheet" href="calendar/css1/jquery.ui.all.css">
<script src="calendar/js/jquery-1.4.3.js"></script> 
	<script src="calendar/js/jquery.ui.core.js"></script> 

	<script src="calendar/js/jquery.ui.datepicker.js"></script> 

	<script type="text/javascript"> 
	
	var $j = jQuery.noConflict();
	
	$j(function() {
		$j( "#coming_soon_date" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
	});
	
</script>

<script type="text/javascript">
function load1(test1)
{ 
 document.getElementById("txtexist").style.display = '';
}
function load2(test2)
{ 
 document.getElementById("txtexist").style.display = 'none';
}
</script>
</head>
<body style="font-size:62.5%;">
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
      <tr>
        <td><table width="1000" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td bgcolor="#FFFFFF"> <?php include("headerAdmin.php");?></td>
          </tr>
          <tr>
            <td height="10" bgcolor="#FFFFFF"></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">
            
                <!-- main starts here  -->  
                <table width="100%" border="0" cellspacing="10" cellpadding="0">
      
         
    
      <tr>
        <td class="normal_fonts14_black">Auto</td>
        <td align="right" class="normal_fonts14_black"><table border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td><a href="auto.php?action=new"><img src="../images/add.png" width="20" height="20" border="0" /></a></td>
            <td class="normal_fonts12_black"><a href="auto.php?action=new">New Auto</a>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <?php
	  if($_REQUEST["action"]=="")
	  {
	  ?>
      <tr>
        <td colspan="2"><table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
          <tr>
            <td width="5%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>No.</strong></td>
            <td align="left" bgcolor="#999999" class="normal_fonts10"><strong>Auto Name</strong></td>
            <td align="left" bgcolor="#999999" class="normal_fonts10"><strong>Auto Model</strong></td>
            <td align="left" bgcolor="#999999" class="normal_fonts10"><strong>Auto Price</strong></td>           
            <td width="10%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Action</strong></td>
          </tr>
          <?php
		  
		  $query="SELECT * FROM bike_mast where type=1 ";
		  
		  $no=1;
		  $recordsetcategory = mysql_query($query);
		  $totbikes=mysql_num_rows($recordsetcategory);
		  if($totbikes>0){
		  while($rowcategory = mysql_fetch_array($recordsetcategory,MYSQL_ASSOC))
		  {
			  if(($no%2)==1)
			  {
					$bg="#FFFFFF";
			  }
			  else
			  {
					$bg="#F3F3F3";
			  }
		  ?>
          <tr>
            <td align="center" class="normal_fonts9" bgcolor="<?php echo $bg;?>"><?php echo $no++;?></td>
            <td class="normal_fonts9" bgcolor="<?php echo $bg;?>"><?php echo $rowcategory["Bike_name"];?></td>
           <td class="normal_fonts9" bgcolor="<?php echo $bg;?>">
		   <?php $q=mysql_query("select * from model_mast where model_id='".$rowcategory["Model_mast_id"]."'");
		   if($rowmodel=mysql_fetch_array($q)){
		    echo $rowmodel["Model"];
		   }
			?>
           
           </td>
           <td class="normal_fonts9" bgcolor="<?php echo $bg;?>"><?php echo $rowcategory["Bike_price"];?></td> 
            
             <td align="center" bgcolor="<?php echo $bg;?>"><table border="0" cellspacing="1" cellpadding="1">
                      <tr>
                        <td align="center" valign="top">
                       
                        <a href="auto.php?action=edit&bikeid=<?php echo $rowcategory["Bike_id"];?>"><img src="../images/edit.png" border="0" /></a>
                        </td>
                         <td align="center" valign="top">
                       
                        <a href="auto.php?action=view&bikeid=<?php echo $rowcategory["Bike_id"];?>"><img src="../images/zoom_in.png" border="0" /></a>
                        </td>
                      </tr>
                </table></td>
          </tr>
          <?php
			 } }else {
			 ?>
              <tr>
            <td align="center" class="normal_fonts9" colspan="5"> No Records Found
           </td>
           </tr>
             <?php } ?>
        </table></td>
      </tr>
      
     
      <?php
	  }
	  ?>
      <?php
	  if($_REQUEST["action"]=="new")
	  {
	  ?>
       <tr>
        <td colspan="2">
        <form name="bikeform" id="bikeform" method="post" action="processBike.php?type=1" enctype="multipart/form-data"> 
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="border"> 
        <tr><td colspan="3">
          <table  width="100%" border="0" cellpadding="5" cellspacing="0">
          <tr bgcolor="#F3F3F3">
              <td width="30%" align="right" class="normal_fonts9">Model</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top">
               <select name="model" id="model" >
               <option value="">Select Model</option>
               <?php
	 
      $recordsetmodel = mysql_query("SELECT * FROM  model_mast order by Model_id");
	  while($rowmodel = mysql_fetch_array($recordsetmodel,MYSQL_ASSOC))
	  {
	  ?>
     
      <option value="<?php echo $rowmodel["Model_id"];?>"><?php echo $rowmodel["Model"];?></option>
                        
     <?php	
	  }
	  ?>
            </select>       
              </td>
            </tr>        
            <tr>
              <td width="30%" align="right" class="normal_fonts9">Auto Name</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top"><input name="bike_name" type="text" class="normal_fonts9" size="45" /></td>
            </tr>
         
        <tr bgcolor="#F3F3F3">
              <td width="30%" align="right" valign="top" class="normal_fonts9">Available Colors</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top">
            <table border="0" cellspacing="0" cellpadding="5">
              <tr>
       <?php
	   $c=1;
      $recordsetcolor = mysql_query("SELECT * FROM  color_mast order by Color_id");
	  while($rowcolor = mysql_fetch_array($recordsetcolor,MYSQL_ASSOC))
	  {
	  ?>
                <td><input type="checkbox" name="selectedcolors[]" value="<?php echo $rowcolor["Color_id"];?>" /></td>
                <td><img src="../colors/<?php echo $rowcolor["Color_image"];?>" alt="<?php echo $rowcolor["Color"];?>" title="<?php echo $rowcolor["Color"];?>" /></td>
     <?php
	 if(($c%7)==0)
	 {
	  ?>
              </tr>
      <?php
	  
	 }
	 $c++;
	  }
	  ?>
            </table>

            </td>
          </tr>
          
            <tr>
              <td width="30%" align="right" class="normal_fonts9">Auto Photo</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top"><input name="bike_photo" id="bike_photo" type="file" class="normal_fonts9" size="45" /></td>
              </tr>
              <tr bgcolor="#F3F3F3">
              <td width="30%" align="right" class="normal_fonts9">Additional Auto Photo 1</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top"><input name="additional_bike_photo1" id="additional_bike_photo1" type="file" class="normal_fonts9" size="45" /></td>
              </tr>
              <tr>
              <td width="30%" align="right" class="normal_fonts9">Additional Auto Photo 2</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top"><input name="additional_bike_photo2" id="additional_bike_photo2" type="file" class="normal_fonts9" size="45" /></td>
              </tr>
              <tr bgcolor="#F3F3F3">
              <td width="30%" align="right" class="normal_fonts9">Additional Auto Photo 3</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top"><input name="additional_bike_photo3" id="additional_bike_photo3" type="file" class="normal_fonts9" size="45" /></td>
              </tr>
            <tr>
              <td width="30%" align="right"  class="normal_fonts9">Auto Price</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top"><input name="bike_price" type="text" class="normal_fonts9" size="45" /></td>
              </tr>           
            <tr bgcolor="#F3F3F3">
              <td width="30%" align="right" class="normal_fonts9">Available In Market</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top" class="normal_fonts9">
              <input type="radio" name="available_in_market" id="available_in_market" value="1" />Yes
              <input type="radio" name="available_in_market" id="available_in_market" value="0" />No
              </td>
            </tr>
            <tr>
              <td width="30%" align="right" class="normal_fonts9">Coming Soon</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top" class="normal_fonts9">
              <input type="radio" name="coming_soon" id="coming_soon" value="1" onClick="load1('test1')" />Yes
              <input type="radio" name="coming_soon" id="coming_soon" value="0" onClick="load2('test2')" />No
              </td>
            </tr>
             <tr id="txtexist" style="display:none;"> 
             <td width="30%" align="right" class="normal_fonts9">Coming Soon Date</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top">
              <input type="text" name="coming_soon_date" id="coming_soon_date" />
              </td> 
             </tr>
              <tr bgcolor="#F3F3F3">
              <td width="30%" align="right" class="normal_fonts9">Key Features</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top"><input name="key_features" id="key_features" type="file" class="normal_fonts9" size="45" /></td>
              </tr>
              <tr> 
             <td width="30%" align="right" class="normal_fonts9">Free Service</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top">
              <?php
	   			 include_once '../ckeditor/ckeditor.php';
				 include_once '../ckfinder/ckfinder.php';
				 $ckeditor = new CKEditor();
				 $config['height']=150;
				 $config['width']=450;
				 $config['toolbar']="Basic";
								 
				 $ckeditor->basePath = '../ckeditor/';
				 $ckeditor->config['filebrowserBrowseUrl'] = '../ckfinder/ckfinder.html';
				 $ckeditor->config['filebrowserImageBrowseUrl'] = '../ckfinder/ckfinder.html?type=Images';
				 $ckeditor->config['filebrowserFlashBrowseUrl'] = '../ckfinder/ckfinder.html?type=Flash';
				 $ckeditor->config['filebrowserUploadUrl'] = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
				 $ckeditor->config['filebrowserImageUploadUrl'] = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
				 $ckeditor->config['filebrowserFlashUploadUrl'] = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
				 $code = $ckeditor->editor('free_service', '',$config);
				 echo $code;
				 ?>
              </td> 
             </tr>
             
            <tr bgcolor="#F3F3F3">
              <td width="30%" align="right" class="normal_fonts9">&nbsp;</td>
              <td width="1%" align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top"><span class="normal_fonts9"><strong>Features &amp; Specifications</strong></span>
                </td>
              </tr>
           
              
              <?php
			  $recordsetcategory = mysql_query("SELECT * FROM bike_specification_mast where Parent_feature_ID=0 order by Feature_ID");
			  while($rowcategory = mysql_fetch_array($recordsetcategory,MYSQL_ASSOC))
			  {
			  ?>
              
              <tr>
                <td align="right"  width="30%" class="normal_fonts9"><strong><?php echo $rowcategory["Feature_name"];?></strong></td> 
                <td align="left" width="1%">&nbsp;</td>
                <td align="left" class="normal_fonts8">
                </td>
                </tr>
                
                  <?php
			
			  $recordsetcategory1 = mysql_query("SELECT * FROM bike_specification_mast where Parent_feature_ID='".$rowcategory["Feature_ID"]."' order by Feature_ID");
			  while($rowcategory1 = mysql_fetch_array($recordsetcategory1,MYSQL_ASSOC))
			  {
			  ?>
               <tr>
                <td align="right"  width="30%" class="normal_fonts9">
                  <?php echo $rowcategory1["Feature_name"];?>
                  
                  </td>
                   <td align="left" width="1%">:</td>
                   <td align="left" class="normal_fonts8">
                   <input type="hidden" name="featureid[]" id="featureid" value="<?php echo $rowcategory1["Feature_ID"];?>" />
                  <input name="feature_value[]" id="feature_value" type="text" class="normal_fonts9" size="45" />
                  </td>
              </tr>
           <?php
			  }
			  }
			?>
          <tr>
            <td width="30%" align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">&nbsp;</td>
            <td width="1%" align="left" valign="top" bgcolor="#F3F3F3">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">  
              <input type="hidden" name="process" value="addbike" />          
              <input name="submit" type="submit" class="normal_fonts9" value="Submit" /></td>
          </tr>
            
            </table>
        </td>
                   </tr>
         
                  
         </table>
          </form>
        </td>
      </tr>
       
      <?php
	  }
	  ?>
      <?php
	  if($_REQUEST["action"]=="edit")
	  {
	  ?>
      <tr>
         <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border">
        <form name="bikeform" method="post" action="processBike.php?type=1" enctype="multipart/form-data">
        <?php
		$recordsetbike = mysql_query("SELECT * FROM  bike_mast			
			 where Bike_id='".$_REQUEST["bikeid"]."'");
	  if($rowbike = mysql_fetch_array($recordsetbike,MYSQL_ASSOC))
	  {
		  ?>
           <tr><td colspan="3">
          <table  width="100%" border="0" cellpadding="5" cellspacing="0">      
           <tr bgcolor="#F3F3F3">
              <td width="30%" align="right" class="normal_fonts9">Model</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top">
               <select name="model" id="model" >
               <option value="">Select Model</option>
               <?php
	 
			  $recordsetmodel = mysql_query("SELECT * FROM  model_mast order by Model_id");
			  while($rowmodel = mysql_fetch_array($recordsetmodel,MYSQL_ASSOC))
			  {
			  ?>
			 
			  <option value="<?php echo $rowmodel["Model_id"];?>" <?php if($rowmodel["Model_id"]==$rowbike["Model_mast_id"]){echo "selected";}?>><?php echo $rowmodel["Model"];?></option>
								
			 <?php	
			  }
			  ?>
            </select>       
              </td>
            </tr>  
            <tr>
              <td width="30%" align="right" valign="top" class="normal_fonts9">Auto Name</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top">
              <input type="hidden" name="bikeid" value="<?php echo $rowbike['Bike_id']; ?>" />
              <input name="bike_name" type="text" class="normal_fonts9" size="45" value="<?php echo $rowbike['Bike_name']; ?>" /></td>
            </tr>
            <tr bgcolor="#F3F3F3">
            <td align="right" width="30%" valign="top" class="normal_fonts9">Available Colors</td>
            <td align="left" width="1%" valign="top">:</td>
            <td align="left" valign="top"><table border="0" cellspacing="0" cellpadding="5">
              <tr>
       <?php
	   $c=1;
      $recordsetcolor = mysql_query("SELECT * FROM  color_mast order by Color_id");
	  while($rowcolor = mysql_fetch_array($recordsetcolor,MYSQL_ASSOC))
	  {
		  $recordsetproductcolor = mysql_query("SELECT * FROM  bike_colors where bike_mast_id='".$_REQUEST["bikeid"]."' and color_mast_id ='".$rowcolor["Color_id"]."'");
	  ?>
                <td><input type="checkbox" name="selectedcolors[]" value="<?php echo $rowcolor["Color_id"];?>" <?php if(mysql_num_rows($recordsetproductcolor)!=0) { ?> checked="checked" <?php } ?> /></td>
                <td><img src="../colors/<?php echo $rowcolor["Color_image"];?>" alt="<?php echo $rowcolor["Color"];?>" title="<?php echo $rowcolor["Color"];?>" /></td>
     <?php
	 if(($c%7)==0)
	 {
	  ?>
              </tr>
      <?php
	  
	 }
	 $c++;
	  }
	  ?>
            </table></td>
          </tr>
              <tr>
              <td width="30%" align="right" valign="top" class="normal_fonts9">Auto Photo</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top">
              <input type="hidden" name="currentbike_thumbphoto" value="<?php echo $rowbike["Bike_thumb_photo"];?>" />
               <input type="hidden" name="currentbike_bigphoto" value="<?php echo $rowbike["Bike_big_photo"];?>" />
              <img src="../bike_photos/<?php echo $rowbike["Bike_thumb_photo"];?>" width="98" height="56" />
              </td></tr>
            <tr>
              <td width="30%" align="right" valign="top" class="normal_fonts9">Edit Auto Photo</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top"><input name="bike_photo" type="file" class="normal_fonts9" size="45" /></td>
              </tr>
               <tr>
              <td width="30%" align="right" valign="top" class="normal_fonts9">Auto Photo</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top">
              <input type="hidden" name="add_currentbike_thumbphoto1" value="<?php echo $rowbike["Additional_bike_thumb_photo1"];?>" />
               <input type="hidden" name="add_currentbike_bigphoto1" value="<?php echo $rowbike["Additional_bike_big_photo1"];?>" />
              <img src="../bike_photos/<?php echo $rowbike["Additional_bike_thumb_photo1"];?>" width="98" height="56" />
              </td></tr>
            <tr>
              <td width="30%" align="right" valign="top" class="normal_fonts9">Edit Auto Photo</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top"><input name="additional_bike_photo1" type="file" class="normal_fonts9" size="45" /></td>
              </tr>
               <tr>
              <td width="30%" align="right" valign="top" class="normal_fonts9">Auto Photo</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top">
              <input type="hidden" name="add_currentbike_thumbphoto2" value="<?php echo $rowbike["Additional_bike_thumb_photo2"];?>" />
               <input type="hidden" name="add_currentbike_bigphoto2" value="<?php echo $rowbike["Additional_bike_big_photo2"];?>" />
              <img src="../bike_photos/<?php echo $rowbike["Additional_bike_thumb_photo2"];?>" width="98" height="56" />
              </td></tr>
            <tr>
              <td width="30%" align="right" valign="top" class="normal_fonts9">Edit Auto Photo</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top"><input name="additional_bike_photo2" type="file" class="normal_fonts9" size="45" /></td>
              </tr>
               <tr>
              <td width="30%" align="right" valign="top" class="normal_fonts9">Auto Photo</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top">
              <input type="hidden" name="add_currentbike_thumbphoto3" value="<?php echo $rowbike["Additional_bike_thumb_photo3"];?>" />
               <input type="hidden" name="add_currentbike_bigphoto3" value="<?php echo $rowbike["Additional_bike_big_photo3"];?>" />
              <img src="../bike_photos/<?php echo $rowbike["Additional_bike_thumb_photo3"];?>" width="98" height="56" />
              </td></tr>
            <tr>
              <td width="30%" align="right" valign="top" class="normal_fonts9">Edit Auto Photo</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top"><input name="additional_bike_photo3" type="file" class="normal_fonts9" size="45" /></td>
              </tr>
            <tr bgcolor="#F3F3F3">
              <td width="30%" align="right" valign="top" class="normal_fonts9">Auto Price</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top"><input name="bike_price" type="text" class="normal_fonts9" size="45" value="<?php echo $rowbike['Bike_price']; ?>" /></td>
              </tr>
               <tr>
              <td width="30%" align="right" class="normal_fonts9">Available In Market</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top" class="normal_fonts9">
              <input type="radio" name="available_in_market" id="available_in_market" value="1" <?php if($rowbike['Available_in_market']==1){echo "checked";} ?> />Yes
              <input type="radio" name="available_in_market" id="available_in_market" value="0" <?php if($rowbike['Available_in_market']==0){echo "checked";} ?> />No
              </td>
            </tr>
            <tr bgcolor="#F3F3F3">
              <td width="30%" align="right" class="normal_fonts9">Coming Soon</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top" class="normal_fonts9">
              <input type="radio" name="coming_soon" id="coming_soon" value="1" onClick="load1('test1')" <?php if($rowbike['Coming_soon']==1){echo "checked";} ?> />Yes
              <input type="radio" name="coming_soon" id="coming_soon" value="0" onClick="load2('test2')" <?php if($rowbike['Coming_soon']==0){echo "checked";} ?> />No
              </td>
            </tr>
              <?php if($rowbike["Coming_soon"]=='1'){ 
			  $display='';}else{$display='none';}
	 $dt1=explode("-",$rowbike['Coming_soon_date']);
	   $yy1=$dt1[0];
	   $mm1=$dt1[1];
	   $dd1=$dt1[2];
	   $coming_soon_date=$dd1."-".$mm1."-".$yy1;
			  ?>
             <tr id="txtexist" style="display:<?php echo $display; ?>;"> 
             <td width="30%" align="right" class="normal_fonts9">Coming Soon Date</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top">
              <input type="text" name="coming_soon_date" id="coming_soon_date" value="<?php echo $coming_soon_date; ?>" />
              </td> 
             </tr>
              <tr>
              <td width="30%" align="right" valign="top" class="normal_fonts9">Key Features</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top">
                <input type="hidden" name="cuerrent_key_features" value="<?php echo $rowbike["key_features"];?>" />   
                <input name="key_features" type="file" class="normal_fonts9" size="45" /></td>
              </tr>
              <tr> 
             <td width="30%" align="right" class="normal_fonts9">Free Service</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top">
              <?php
	   			 include_once '../ckeditor/ckeditor.php';
				 include_once '../ckfinder/ckfinder.php';
				 $ckeditor = new CKEditor();
				 $config['height']=150;
				 $config['width']=450;
				 $config['toolbar']="Basic";
								 
				 $ckeditor->basePath = '../ckeditor/';
				 $ckeditor->config['filebrowserBrowseUrl'] = '../ckfinder/ckfinder.html';
				 $ckeditor->config['filebrowserImageBrowseUrl'] = '../ckfinder/ckfinder.html?type=Images';
				 $ckeditor->config['filebrowserFlashBrowseUrl'] = '../ckfinder/ckfinder.html?type=Flash';
				 $ckeditor->config['filebrowserUploadUrl'] = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
				 $ckeditor->config['filebrowserImageUploadUrl'] = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
				 $ckeditor->config['filebrowserFlashUploadUrl'] = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
				 $code = $ckeditor->editor('free_service', $rowbike["free_service"],$config);
				 echo $code;
				 ?>
              </td> 
             </tr>
            <tr>
              <td width="30%" align="right" valign="top" class="normal_fonts9">&nbsp;</td>
              <td width="1%" align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top"><span class="normal_fonts9"><strong>Features &amp; Specifications</strong></span>
                </td>
              </tr>
           
              
              <?php
		
			
			  $recordsetcategory = mysql_query("SELECT * FROM  bike_specification_mast where Parent_feature_ID=0 order by Feature_ID");
			  while($rowcategory = mysql_fetch_array($recordsetcategory,MYSQL_ASSOC))
			  {
			  ?>
              
              <tr>
                <td align="right"  width="30%" class="normal_fonts9"><strong><?php echo $rowcategory["Feature_name"];?></strong></td> 
                <td align="left" width="1%">&nbsp;</td>
                <td align="left" class="normal_fonts8">
                </td>
                </tr>
                
                  <?php
		
			  $recordsetcategory1 = mysql_query("SELECT * FROM  bike_specification_mast where Parent_feature_ID='".$rowcategory["Feature_ID"]."'");
			  while($rowcategory1 = mysql_fetch_array($recordsetcategory1,MYSQL_ASSOC))
			  {
					$a="SELECT * FROM  bike_specification_detail
			 INNER JOIN bike_mast ON bike_mast.Bike_id = bike_specification_detail.Bike_mast_id
			 INNER JOIN bike_specification_mast ON bike_specification_mast.Feature_ID = bike_specification_detail.Feature_mast_id
			 where Bike_mast_id='".$rowbike["Bike_id"]."' and Feature_mast_id='".$rowcategory1['Feature_ID']."'";
			 $b=mysql_query($a);
			 $row1=mysql_fetch_array($b);
			  
			  ?>
               <tr>
                <td align="right"  width="30%" class="normal_fonts9">
                  <?php echo $rowcategory1["Feature_name"];?>
                  
                  </td>
                   <td align="left" width="1%">:</td>
                   <td align="left" class="normal_fonts8">
                   <input type="hidden" name="featureid[]" id="featureid" value="<?php echo $rowcategory1["Feature_ID"];?>" />
                  <input name="feature_value[]" id="feature_value" type="text" class="normal_fonts9" size="45" value="<?php
				   if($row1['Feature_mast_id']== $rowcategory1['Feature_ID']){
				  echo $row1['Feature_value']; } ?>" />
                  </td>
              </tr>
           <?php
			  }
			  } 
			?>
            
            <tr>
            <td width="30%" align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">&nbsp;</td>
            <td width="1%" align="left" valign="top" bgcolor="#F3F3F3">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">  
            
              <input type="hidden" name="process" value="editbike" />          
              <input name="submit" type="submit" class="normal_fonts9" value="Update" /></td>
          </tr>
            </table>
        </td>
                   </tr>
                   
      <?php
	  }
	  ?>
        
          </form>
    </table> 
    </td></tr>
    <?php } ?>
     <?php
	  if($_REQUEST["action"]=="view")
	  {
	  ?>
      <tr>
         <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border">
        
        <?php
		$recordsetbike = mysql_query("SELECT * FROM  bike_mast			
			 where Bike_id='".$_GET["bikeid"]."'");
	  if($rowbike = mysql_fetch_array($recordsetbike,MYSQL_ASSOC))
	  {
		  ?>
           <tr>
             <td colspan="3">
          <table  width="100%" border="0" cellpadding="5" cellspacing="0">      
           <tr bgcolor="#F3F3F3">
              <td width="30%" align="right" class="normal_fonts9">Model</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top" class="normal_fonts9">
           <?php $q=mysql_query("select * from model_mast where model_id='".$rowbike["Model_mast_id"]."'");
		   if($rowmodel=mysql_fetch_array($q)){
		    echo $rowmodel["Model"];
		   }
			?>      
              </td>
            </tr>  
            <tr>
              <td width="30%" align="right" valign="top" class="normal_fonts9">Auto Name</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top" class="normal_fonts9">
             <?php echo $rowbike['Bike_name']; ?>
             </td>
            </tr>
            <tr bgcolor="#F3F3F3">
            <td align="right" width="30%" valign="top" class="normal_fonts9">Available Colors</td>
            <td align="left" width="1%" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><table border="0" cellspacing="0" cellpadding="5">
              <tr>
       <?php
	   $c=1;
      $recordsetcolor = mysql_query("SELECT * FROM  bike_colors
									INNER JOIN color_mast ON color_mast.Color_id=bike_colors.Color_mast_id where Bike_mast_id='".$rowbike["Bike_id"]."'");
	  while($rowcolor = mysql_fetch_array($recordsetcolor,MYSQL_ASSOC))
	  {
		  
	  ?>
                <td>&nbsp;</td>
                <td><img src="../colors/<?php echo $rowcolor["Color_image"];?>" alt="<?php echo $rowcolor["Color"];?>" title="<?php echo $rowcolor["Color"];?>" /></td>
    <?php 
	 $c++;
	  }
	  ?>
            </table></td>
          </tr>
              <tr>
              <td width="30%" align="right" valign="top" class="normal_fonts9">Auto Photo</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top" class="normal_fonts9">
              <input type="hidden" name="currentbike_thumbphoto" value="<?php echo $rowbike["Bike_thumb_photo"];?>" />
               <input type="hidden" name="currentbike_bigphoto" value="<?php echo $rowbike["Bike_big_photo"];?>" />
              <img src="../bike_photos/<?php echo $rowbike["Bike_thumb_photo"];?>" width="98" height="56" />
              </td></tr>
           
            <tr bgcolor="#F3F3F3">
              <td width="30%" align="right" valign="top" class="normal_fonts9">Auto Price</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top" class="normal_fonts9"><?php echo $rowbike['Bike_price']; ?></td>
              </tr>
               <tr>
              <td width="30%" align="right" class="normal_fonts9">Available In Market</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top" class="normal_fonts9">
             <?php if($rowbike['Available_in_market']==1){echo "Yes";} ?>
          <?php if($rowbike['Available_in_market']==0){echo "No";} ?>
              </td>
            </tr>
            <tr bgcolor="#F3F3F3">
              <td width="30%" align="right" class="normal_fonts9">Coming Soon</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top" class="normal_fonts9">
              <?php if($rowbike['Coming_soon']==1){echo "Yes";} ?>
             <?php if($rowbike['Coming_soon']==0){echo "No";} ?> 
              </td>
            </tr>
              <?php if($rowbike["Coming_soon"]=='1'){ 
			  $display='';}else{$display='none';}
	 $dt1=explode("-",$rowbike['Coming_soon_date']);
	   $yy1=$dt1[0];
	   $mm1=$dt1[1];
	   $dd1=$dt1[2];
	   $coming_soon_date=$dd1."-".$mm1."-".$yy1;
			  ?>
             <tr id="txtexist" style="display:<?php echo $display; ?>;"> 
             <td width="30%" align="right" class="normal_fonts9">Coming Soon Date</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top" class="normal_fonts9">
             <?php echo $coming_soon_date; ?>
              </td> 
             </tr>
              <tr> 
             <td width="30%" align="right" class="normal_fonts9">Free Service</td>
              <td width="1%" align="left" valign="middle">:</td>
              <td align="left" valign="top" class="normal_fonts9">
              <?php
	   			echo $rowbike['free_service'];
				 ?>
              </td> 
             </tr>
            <tr>
              <td width="30%" align="right" valign="top" class="normal_fonts9">&nbsp;</td>
              <td width="1%" align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top" class="normal_fonts9"><span class="normal_fonts9"><strong>Features &amp; Specifications</strong></span>
                </td>
              </tr>
           
              
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
                <td align="right"  width="30%" class="normal_fonts9"><strong><?php echo $rowcategory["Feature_name"];?></strong></td> 
                <td align="left" width="1%">&nbsp;</td>
                <td align="left" class="normal_fonts9">
                </td>
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
			   if($row1['Feature_mast_id']== $rowcategory1['Feature_ID']){
			  ?>
               <tr>
                <td align="right"  width="30%" class="normal_fonts9">
                  <?php echo $rowcategory1["Feature_name"];?>
                  
                  </td>
                   <td align="left" width="1%">:</td>
                   <td align="left" class="normal_fonts9">
                  
               <?php
				  
				  echo $row1['Feature_value']; } ?>
                  </td>
              </tr>
           <?php
			  }
			  } 
			?>
            
            <tr>
            <td width="30%" align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">&nbsp;</td>
            <td width="1%" align="left" valign="top" bgcolor="#F3F3F3">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">  
            
              <input type="hidden" name="process" value="editbike" />          
              <input name="submit" type="submit" class="normal_fonts9" value="Update" /></td>
          </tr>
            </table>
        </td>
                   </tr>
                   
      <?php
	  }
	  ?>
        
        
    </table> 
    </td></tr>
    <?php } ?>
    </table>
     <!-- main ends here  -->
            
         </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="10"></td>
      </tr>
      <tr>
        <td align="center" valign="middle">
        <?php  include("footer.php"); ?>
        
        </td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
