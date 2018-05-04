<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Products</title>
<link rel="stylesheet" href="css/css.css" type="text/css" />
<script language="javascript">
function display_subcategory(d_n, f_n, fm) 
{
	f=fm;
	l=f.elements.length;
	m="";
	i=0;
		
	m +=f.elements['parentcategory'].name+"="+f.elements['parentcategory'].value;
	
	getoutput(f_n+'?'+m,d_n)
	
	return false;
}

function getoutput(url,resultpan)
{
	var xmlchat = initxmlhttp() ;
	var m = document.getElementById(resultpan);
	m.innerHTML = "<div id='loading'>Loading...</div>";
	xmlchat.open( "GET", url, true ) ;
	xmlchat.onreadystatechange=function()
	{
		//alert("hi");
		if (xmlchat.readyState==4)
		{
			var m = document.getElementById(resultpan);
			m.innerHTML = xmlchat.responseText;
			
			var str = xmlchat.responseText;			
		}
		
	}
	xmlchat.send(null) ;
//	xmlchat.close();
//	var temp = setTimeout("xmlpull()",) ;
}
function initxmlhttp()

{
		var xmlhttp ;
 	    if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
           //    xmlHttpReq.overrideMimeType('text/xml');
        }
        // IE
        else if (window.ActiveXObject) {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
		return xmlhttp ;
}
</script>
<script language="JavaScript">
function display_moreprice()
{
		 document.getElementById('tr_display_viewmore').style.display = "none";
  	     document.getElementById('tr_display_moreprice').style.display = "";				   
			
}
</script>
<script language="javascript">
function validation_product()
{
	with(document.productform)
	{
			var error=0;
			var message;
			message="Please enter / correct folllowing errors to proceed further";
			message=message+ "\n" + "--------------------------------------------------------------------";
			
			if(catalogue.value=='')
			{
				error=1;
				message=message + "\n" + "Please Select Catalogue !";
			}
			if(productname.value=='')
			{
				error=1;
				message=message + "\n" + "Please Enter Product Title !";
			}
			if(productcode.value=='')
			{
				error=1;
				message=message + "\n" + "Please Enter Product Code !";
			}
			 <?php
	  if($_REQUEST["action"]=="new")
	  {
	  ?>
			if(display_image.value=='')
			{
				error=1;
				message=message + "\n" + "Please Select Product Display Image !";
			}
			<?php } ?>

			if (error==1)
			{
				alert(message);
				return false;
			}
			else
			{
				return true;		
			}
	}
}
</script>
</head>
<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border">
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF"><?php include("header.php");?></td>
      </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="10" cellpadding="0">
      <tr>
        <td class="normal_fonts14_black">Products</td>
        <td width="35%" align="right"><table border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td><img src="images/add.png" width="20" height="20" /></td>
            <td ><a href="product.php?action=new" class="normal_fonts10"><strong>Add New</strong></a></td>
          </tr>
        </table></td>
      </tr>
      
      <?php
	  if($_REQUEST["action"]=="new")
	  {
	  ?>
      <tr>
        <td colspan="2">
        <form name="productform" id="productform" method="post" action="process.php" enctype="multipart/form-data">
        <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">        
          <?php
		  if($_REQUEST["msg"]!="")
		  {
			  			   if($_REQUEST["msg"]=="save")
						   {
							   $msg="product added successfully";
						   }
						   elseif($_REQUEST["msg"]=="edit")
						   {
							   $msg="product details changed successfully";
						   }
						   elseif($_REQUEST["msg"]=="remove")
						   {
							   $msg="product details removed successfully";
						   }
		  ?>
          <tr>
            <td colspan="3" align="center" class="warning_fonts9"><?php echo $msg;?></td>
            </tr>
            <?php
		  }
		  ?>
         
          <tr>
            <td width="40%" align="right" class="normal_fonts9">Catalogue</td>
            <td width="1%" align="left">:</td>
            <td align="left" >
             <select name="catalogue" id="catalogue" class="normal_fonts9">
            <option value="">Select</option>
            <?php
			  $recordsetcatalogue = mysql_query("SELECT * FROM  catalogue_master where catalogue_active_status=1 order by catalogue_id");
			  while($rowcatalogue = mysql_fetch_array($recordsetcatalogue,MYSQL_ASSOC))
			  {
			  ?>
            <option value="<?php echo $rowcatalogue["catalogue_id"];?>"><?php echo $rowcatalogue["catalogue_name"];?></option>
            <?php
			}
			?>
            </select>
            </td>
          </tr>
           <tr  bgcolor="#F3F3F3">
            <td width="40%" align="right" class="normal_fonts9">Product Name</td>
            <td width="1%" align="left">:</td>
            <td align="left" ><input name="productname" id="productname" type="text" class="normal_fonts9" size="45" /></td>
          </tr>
          <tr>
            <td align="right" class="normal_fonts9">Product Code</td>
            <td align="left">:</td>
            <td align="left"><input name="productcode" id="productcode" type="text" class="normal_fonts9" size="45" /></td>
          </tr>
          <!--<tr>
            <td align="right" bgcolor="#F3F3F3" class="normal_fonts9">MRP Price</td>
            <td align="left" bgcolor="#F3F3F3">:</td>
            <td align="left" bgcolor="#F3F3F3"><input name="mrpprice" type="text" class="normal_fonts9" /></td>
          </tr>
          <tr>
            <td align="right" class="normal_fonts9">Select Offer</td>
            <td align="left">:</td>
            <td align="left">
            <select name="offer" class="normal_fonts9">
            <option value="">Select</option>
            <?php
			  $date=date("Y-m-d");
			  $recordsetoffer = mysql_query("SELECT * FROM  offer_mast where offer_active_status=1 and End_date > '".$date."' order by offer_name");
			  while($rowoffer = mysql_fetch_array($recordsetoffer,MYSQL_ASSOC))
			  {
			  ?>
            <option value="<?php echo $rowoffer["offer_id"];?>"><?php echo $rowoffer["offer_name"];?></option>
            <?php
			}
			?>
            </select>
            </td>
          </tr>-->
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Product Description</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3"><?php echo small_editor("product_desc");?></td>
          </tr>
          <tr>
            <td align="right" class="normal_fonts9">Work</td>
            <td align="left" valign="top" class="normal_fonts9">:</td>
            <td align="left"><input name="product_work" type="text" class="normal_fonts9" /></td>
          </tr>
          <tr>
            <td align="right" bgcolor="#F3F3F3" class="normal_fonts9">Fabric</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
            <td align="left" bgcolor="#F3F3F3"><input name="product_fabric" type="text" class="normal_fonts9" /></td>
          </tr>
          <tr>
            <td align="right" class="normal_fonts9">Occasion</td>
            <td align="left" valign="top" class="normal_fonts9">:</td>
            <td align="left"><input name="product_occasion" type="text" class="normal_fonts9" /></td>
          </tr>
          <tr>
            <td align="right" bgcolor="#F3F3F3" class="normal_fonts9">Season</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
            <td align="left" bgcolor="#F3F3F3"><input name="product_season" type="text" class="normal_fonts9" /></td>
          </tr>
          <tr>
            <td align="right" class="normal_fonts9">Weight</td>
            <td align="left" valign="top" class="normal_fonts9">:</td>
            <td align="left"><input name="product_weight" type="text" class="normal_fonts9" /></td>
          </tr>
          <tr>
            <td align="right" bgcolor="#F3F3F3" class="normal_fonts9">Dimension</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
            <td align="left" bgcolor="#F3F3F3"><input name="product_dimension" type="text" class="normal_fonts9" size="60" /></td>
          </tr>
          <tr>
            <td align="right" class="normal_fonts9">Blouse Length</td>
            <td align="left" valign="top" class="normal_fonts9">:</td>
            <td align="left"><input name="product_blouse" type="text" class="normal_fonts9" size="35" /></td>
          </tr>
          <tr>
            <td align="right" bgcolor="#F3F3F3" class="normal_fonts9">Time to Ship</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
            <td align="left" bgcolor="#F3F3F3" class="normal_fonts8"><input name="product_timetoship" type="text" class="normal_fonts9" /> 
            (e.g. 5, 7-8)</td>
          </tr>
          <!--<tr>
            <td align="right" valign="top" class="normal_fonts9">Available Colors</td>
            <td align="left" valign="top">:</td>
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
          </tr>-->
          <tr>
            <td align="right"class="normal_fonts9"> Upload Product Image</td>
            <td align="left">:</td>
            <td align="left" class="normal_fonts8">
            <input name="display_image" id="display_image" type="file" class="normal_fonts8" /> (Width: 600px  Height: 900px)         
            </td>
          </tr>                    
         
             
          <tr  bgcolor="#F3F3F3">
            <td align="right" class="normal_fonts9">Product Active Status</td>
            <td align="left">:</td>
            <td align="left" class="normal_fonts9"><input type="radio" name="productstatus" value="1" checked="checked" />&nbsp;Yes&nbsp;<input type="radio" name="productstatus" value="0"/>&nbsp;No</td>
          </tr>
          <tr>
            <td align="right"  class="normal_fonts9">In Stock</td>
            <td align="left">:</td>
            <td align="left" class="normal_fonts9"><input type="radio" name="instock" value="1" checked="checked" />&nbsp;Yes&nbsp;<input type="radio" name="instock" value="0"/>&nbsp;No</td>
          </tr>
           <tr bgcolor="#F3F3F3">
            <td align="right"  class="normal_fonts9">Is this Latest Product ?</td>
            <td align="left">:</td>
            <td align="left" class="normal_fonts9"><input type="radio" name="latest" value="1" checked="checked" />&nbsp;Yes&nbsp;<input type="radio" name="latest" value="0"/>&nbsp;No</td>
          </tr>
          <tr>
            <td align="right" class="normal_fonts9">&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td align="left" class="normal_fonts9">  
              <input type="hidden" name="process" value="addproduct" />          
              <input name="submit" type="submit" class="normal_fonts9" value="Submit" onclick="return validation_product()" /></td>
          </tr>
        </table>
        </form>        
        </td>
      </tr>
      <?php
	  }
	  if($_REQUEST["action"]=="edit")
	  {
	  $recordsetproduct = mysql_query("SELECT * FROM  product_master where product_ID='".$_REQUEST["productid"]."'");
	  while($rowproduct = mysql_fetch_array($recordsetproduct,MYSQL_ASSOC))
	  {
	  ?>
      <tr>
        <td colspan="2">
        <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
        <form name="productform" method="post" action="process.php" enctype="multipart/form-data">
          
           <tr>
               <td align="right" class="normal_fonts9">Catalogue</td>
               <td align="left">:</td>
               <td align="left" class="normal_fonts8"><select name="catalogue" id="catalogue" class="normal_fonts9">
               <option value="">Select</option>
            <?php
			  $recordsetcatalogue = mysql_query("SELECT * FROM catalogue_master order by catalogue_id");
			  while($rowcatalogue = mysql_fetch_array($recordsetcatalogue,MYSQL_ASSOC))
			  {
			  ?>
            <option value="<?php echo $rowcatalogue["catalogue_id"];?>"<?php print($rowcatalogue["catalogue_id"])==$rowproduct["product_catalogue_master_id"]?"Selected":"";?>><?php echo $rowcatalogue["catalogue_name"];?></option>
            <?php
			}
			?>
            </select></td>
             </tr>
            <tr bgcolor="#F3F3F3">
            <td width="40%" align="right" class="normal_fonts9">Product Title</td>
            <td width="1%" align="left" >:</td>
            <td align="left" ><input name="productname" id="productname" type="text" class="normal_fonts9" size="45" value="<?php echo $rowproduct["product_title"];?>" /></td>
          </tr>
           <tr >
            <td align="right" class="normal_fonts9">Product Code</td>
            <td align="left">:</td>
            <td align="left"><input name="productcode" id="productcode" type="text" class="normal_fonts9" size="45" value="<?php echo $rowproduct["product_code"];?>" /></td>
          </tr>
         <?php /*?> <tr>
            <td align="right" bgcolor="#F3F3F3" class="normal_fonts9">MRP Price</td>
            <td align="left" bgcolor="#F3F3F3">:</td>
            <td align="left" bgcolor="#F3F3F3"><input name="mrpprice" type="text" class="normal_fonts9" value="<?php echo $rowproduct["product_mrp_price"];?>" /></td>
          </tr><?php */?>
         <!-- <tr>
            <td align="right" class="normal_fonts9">Select Offer</td>
            <td align="left">:</td>
            <td align="left">
            <select name="offer" class="normal_fonts9">
            <option value="">Select</option>
            <?php
			  $date=date("Y-m-d");
			  $recordsetoffer = mysql_query("SELECT * FROM  offer_mast where offer_active_status=1 and End_date > '".$date."' order by offer_name");
			  while($rowoffer = mysql_fetch_array($recordsetoffer,MYSQL_ASSOC))
			  {
			  ?>
            <option value="<?php echo $rowoffer["offer_id"];?>"<?php print($rowoffer["offer_id"])==$rowproduct["product_offer_ID"]?"Selected":"";?>><?php echo $rowoffer["offer_name"];?></option>
            <?php
			}
			?>
            </select>
            </td>
          </tr>-->
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Product Description</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3"><?php echo small_editor_value("product_desc",$rowproduct["product_description"]);?></td>
          </tr>
          <tr>
            <td align="right" class="normal_fonts9">Work</td>
            <td align="left" valign="top" class="normal_fonts9">:</td>
            <td align="left"><input name="product_work" type="text" class="normal_fonts9" value="<?php echo $rowproduct["product_work"];?>" /></td>
          </tr>
          <tr>
            <td align="right" bgcolor="#F3F3F3" class="normal_fonts9">Fabric</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
            <td align="left" bgcolor="#F3F3F3"><input name="product_fabric" type="text" class="normal_fonts9" value="<?php echo $rowproduct["product_fabric"];?>" /></td>
          </tr>
          <tr>
            <td align="right" class="normal_fonts9">Occasion</td>
            <td align="left" valign="top" class="normal_fonts9">:</td>
            <td align="left"><input name="product_occasion" type="text" class="normal_fonts9" value="<?php echo $rowproduct["product_occasion"];?>" /></td>
          </tr>
          <tr>
            <td align="right" bgcolor="#F3F3F3" class="normal_fonts9">Season</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
            <td align="left" bgcolor="#F3F3F3"><input name="product_season" type="text" class="normal_fonts9" value="<?php echo $rowproduct["product_season"];?>"/></td>
          </tr>
          <tr>
            <td align="right" class="normal_fonts9">Weight</td>
            <td align="left" valign="top" class="normal_fonts9">:</td>
            <td align="left"><input name="product_weight" type="text" class="normal_fonts9" size="30" value="<?php echo $rowproduct["product_weight"];?>" /></td>
          </tr>
          <tr>
            <td align="right" bgcolor="#F3F3F3" class="normal_fonts9">Dimension</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
            <td align="left" bgcolor="#F3F3F3"><input name="product_dimension" type="text" class="normal_fonts9" size="60" value="<?php echo $rowproduct["product_dimension"];?>" /></td>
          </tr>
          <tr>
            <td align="right" class="normal_fonts9">Blouse Length</td>
            <td align="left" valign="top" class="normal_fonts9">:</td>
            <td align="left"><input name="product_blouse" type="text" class="normal_fonts9" size="35" value="<?php echo $rowproduct["product_blouselength"];?>" /></td>
          </tr>
          <tr>
            <td align="right" bgcolor="#F3F3F3" class="normal_fonts9">Time to Ship</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
            <td align="left" bgcolor="#F3F3F3" class="normal_fonts8"><input name="product_timetoship" type="text" class="normal_fonts9" value="<?php echo $rowproduct["product_time_to_ship"];?>" /> (e.g. 5, 7-8)</td>
          </tr>
          <!--<tr>
            <td align="right" valign="top" class="normal_fonts9">Available Colors</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top"><table border="0" cellspacing="0" cellpadding="5">
              <tr>
       <?php
	   $c=1;
      $recordsetcolor = mysql_query("SELECT * FROM  color_mast order by Color_id");
	  while($rowcolor = mysql_fetch_array($recordsetcolor,MYSQL_ASSOC))
	  {
		  $recordsetproductcolor = mysql_query("SELECT * FROM  product_colors where product_master_ID='".$_REQUEST["productid"]."' and color_master_ID='".$rowcolor["Color_id"]."'");
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
          </tr>-->
             <tr>
            <td align="right" valign="top"  class="normal_fonts9">Product Image</td>
            <td align="left" valign="top" >:</td>
            <td align="left" ><img src="../products/<?php echo $rowproduct["product_thumbnail_image"];?>" width="215" height="275" /></td>
          </tr>
             <tr bgcolor="#F3F3F3">
            <td align="right" class="normal_fonts9"> Change Product Image</td>
            <td align="left">:</td>
            <td align="left" class="normal_fonts8">
            <input name="display_image" type="file" class="normal_fonts8" />(Width: 600px  Height: 900px) 
         </td>
          </tr>           
             
          <tr>
            <td align="right" class="normal_fonts9">Product Active Status</td>
            <td align="left" >:</td>
            <td align="left" class="normal_fonts9"><input type="radio" name="productstatus" value="1" <?php  if($rowproduct["product_display_status"]==1) { ?> checked="checked" <?php } ?>/>&nbsp;Yes&nbsp;<input type="radio" name="productstatus" value="0" <?php  if($rowproduct["product_display_status"]==0) { ?> checked="checked" <?php } ?>/>&nbsp;No</td>
          </tr>
          <tr  bgcolor="#F3F3F3">
            <td align="right" class="normal_fonts9">In Stock</td>
            <td align="left">:</td>
            <td align="left" class="normal_fonts9"><input type="radio" name="instock" value="1" <?php  if($rowproduct["product_in_stock"]==1) { ?> checked="checked" <?php } ?>/>&nbsp;Yes&nbsp;<input type="radio" name="instock" value="0" <?php  if($rowproduct["product_in_stock"]==0) { ?> checked="checked" <?php } ?>/>&nbsp;No</td>
          </tr>
           <tr>
            <td align="right" class="normal_fonts9">Is this Latest Product ?</td>
            <td align="left">:</td>
            <td align="left" class="normal_fonts9"><input type="radio" name="latest" value="1" <?php  if($rowproduct["product_latest_status"]==1) { ?> checked="checked" <?php } ?>/>&nbsp;Yes&nbsp;<input type="radio" name="latest" value="0" <?php  if($rowproduct["product_latest_status"]==0) { ?> checked="checked" <?php } ?>/>&nbsp;No</td>
          </tr>
          
          <tr bgcolor="#F3F3F3">
            <td align="right" class="normal_fonts9">&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td align="left" class="normal_fonts9">  
              <input type="hidden" name="productcurrentthumbimage" value="<?php echo $rowproduct["product_thumbnail_image"];?>" />	
              <input type="hidden" name="productcurrentzoomimage" value="<?php echo $rowproduct["product_zoom_image"];?>" />	
              <input type="hidden" name="productid" value="<?php echo $_REQUEST["productid"];?>" />
              <input type="hidden" name="process" value="editproduct" />          
              <input name="submit" type="submit" class="normal_fonts9" value="Submit" onclick="return validation_product()" /></td>
          </tr>
          </form>
        </table></td>
      </tr>
      <?php
	  }
	  }
	  if($_REQUEST["action"]=="")
	  {
	  ?>
     <!--<tr>
        <td colspan="2" align="center">
        <form name="productsearchform" method="get" action="product.php">
        <table border="0" cellpadding="5" cellspacing="0" class="border">
          <tr>
            <td colspan="2" align="left" bgcolor="#999999" class="normal_fonts12_black">Search Product</td>
            </tr>
          <tr>
            <td align="right" class="normal_fonts9"> Title :</td>
            <td align="left" class="normal_fonts9"><input name="productsearchname" type="text" class="normal_fonts9" size="30" value="<?php echo $_REQUEST["productsearchname"];?>" /></td>
          </tr>
          <tr>
            <td align="right" class="normal_fonts9">Code :</td>
            <td align="left" class="normal_fonts9"><input name="productsearchcode" type="text" class="normal_fonts9" size="30" value="<?php echo $_REQUEST["productsearchcode"];?>" /></td>
          </tr>
          <tr>
            <td align="right" class="normal_fonts9">Product Category :</td>
            <td align="left" class="normal_fonts9">
            <select name="parentcategory" class="normal_fonts9" onchange="display_subcategory('ResultPanel','loadsubcategory.php',productsearchform)">
            <option value="">Select</option>
            <?php
			  $recordsetcategory = mysql_query("SELECT * FROM  category_master where parent_category_ID=0 order by category_ID");
			  while($rowcategory = mysql_fetch_array($recordsetcategory,MYSQL_ASSOC))
			  {
			  ?>
            <option value="<?php echo $rowcategory["category_ID"];?>"<?php print($rowcategory["category_ID"])==$_REQUEST["parentcategory"]?"Selected":"";?>><?php echo $rowcategory["category_name"];?></option>
            <?php
			}
			?>
			</select></td>
          </tr>
          <tr>
            <td align="right" class="normal_fonts9">Sub Category :</td>
            <td align="left" class="normal_fonts9">
            <div id="ResultPanel">
            <select name="subcategory" class="normal_fonts9">
            <option value="">Select</option>          
             <?php
			  $recordsetcategory = mysql_query("SELECT * FROM  category_master where parent_category_ID='".$_REQUEST["parentcategory"]."' order by category_ID");
			  while($rowcategory = mysql_fetch_array($recordsetcategory,MYSQL_ASSOC))
			  {
			  ?>
            <option value="<?php echo $rowcategory["category_ID"];?>"<?php print($rowcategory["category_ID"])==$_REQUEST["subcategory"]?"Selected":"";?>><?php echo $rowcategory["category_name"];?></option>
            <?php
			}
			?>
            </select>
            </div>
            </td>
          </tr>
          <tr>
            <td colspan="2" align="center" class="normal_fonts9"><input name="search" type="submit" class="normal_fonts12_black" value="Search" /></td>
            </tr>
        </table>
        </form>
        </td>
        </tr>-->
      <tr>
        <td colspan="2"><table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
          <tr>
            <td width="5%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>No.</strong></td>
            <td align="left" bgcolor="#999999" class="normal_fonts10"><strong>Title / Code</strong></td>            
            <td width="20%" align="left" bgcolor="#999999" class="normal_fonts10"><strong>Product Category</strong></td>
            <td width="20%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Image</strong></td>
            <td width="7%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>In Stock</strong></td> 
            <td width="5%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Display</strong></td>
            <td width="5%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Latest</strong></td>
            <td width="5%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Action</strong></td>
          </tr>
          <?php		
		  
		  $query="SELECT * FROM  product_master 		  
		   where product_ID!=0 ";
		  
		  if($_REQUEST["productsearchname"]!="")
		  {
		  		$query=$query." and product_title REGEXP '".$_REQUEST["productsearchname"]."' ";
		  }
		  
		  if($_REQUEST["productsearchcode"]!="")
		  {
		  		$query=$query." and product_code REGEXP '".$_REQUEST["productsearchcode"]."'";
		  }
		  
		  if($_REQUEST["parentcategory"]!="")
		  {
		  		$query=$query." and catalogue_parent_category='".$_REQUEST["parentcategory"]."'";
		  }
		  
		  if($_REQUEST["subcategory"]!="")
		  {
		  		$query=$query." and catalogue_sub_category='".$_REQUEST["subcategory"]."'";
		  }
		  
		  $query=$query." order by product_ID desc ";
		  
		 			if($_REQUEST["pagenum"]=="")
					{
						$pagenum = 1;
					}
					else
					{
						$pagenum=$_REQUEST["pagenum"];
					}
					
					$data = mysql_query($query);
    				$rows1 = mysql_num_rows($data);	
					
				
				       
											
					$page_rows = 10;
   
					$last = ceil($rows1/$page_rows);
				  
					if ($pagenum < 1)
					{
					$pagenum = 1;
					}
					elseif ($pagenum > $last)
					{
					$pagenum = $last;
					}
				
				   
					$max = 'limit ' .($pagenum - 1) * $page_rows .',' .$page_rows; 
					
					
					$qmax=$query.$max;
					
					$res = mysql_query($qmax);	
		 
		 $no=1;
		  $recordsetproduct = mysql_query($query);		
		if($rows1>0)
		{	  
		while($rowproduct=mysql_fetch_array($res))
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
            <td class="normal_fonts9" bgcolor="<?php echo $bg;?>">
<?php echo $rowproduct["product_title"];?><br /><br />
<?php echo "<strong>Product Code</strong> : ".$rowproduct["product_code"];?><br /><br />
<?php //echo "<strong>MRP Price</strong> : Rs. ".$rowproduct["product_mrp_price"];?>
<?php
if($rowproduct["product_offer_ID"]!=0)
{
?>
<br /><br /><font color="#FF0000"><strong>Offer :</strong> <?php display_offer_title($rowproduct["product_offer_ID"]);?></font>
<?php
}
?>
</td>
            <td align="left" class="normal_fonts8" bgcolor="<?php echo $bg;?>">
            <?php
			$q=mysql_query("select * from product_master						   
						   INNER JOIN catalogue_master ON catalogue_master.catalogue_id = product_master.product_catalogue_master_id where product_ID='".$rowproduct["product_ID"]."'");
			$rowcat=mysql_fetch_array($q);
			
			
			 $recordsetparentcategory = mysql_query("SELECT * FROM  category_master where category_ID='".$rowcat["catalogue_parent_category"]."'");
			  while($rowparentcategory = mysql_fetch_array($recordsetparentcategory,MYSQL_ASSOC))
			  {	
			  		echo "<strong>".$rowparentcategory["category_name"]."</strong>";
			  }
			  
			  $recordsetsubcategory = mysql_query("SELECT * FROM  category_master where category_ID='".$rowcat["catalogue_sub_category"]."'");
			  while($rowsubcategory = mysql_fetch_array($recordsetsubcategory,MYSQL_ASSOC))
			  {	
			  		echo " -> ".$rowsubcategory["category_name"];
			  }
			
			 
			  ?>            </td>
            <td align="center" class="normal_fonts9" bgcolor="<?php echo $bg;?>">
            
            
			<img src="../products/<?php echo $rowproduct["product_thumbnail_image"];?>" width="215" height="275" />			</td>
            <td align="center" class="normal_fonts9" bgcolor="<?php echo $bg;?>">
            <?php
			if($rowproduct["product_in_stock"]==1)
			{
				echo "Yes";
			}
			else
			{
				echo "No";	
			}
			?> 
            </td>
            <td align="center" class="normal_fonts9" bgcolor="<?php echo $bg;?>">
            <?php
			if($rowproduct["product_display_status"]==1)
			{
				echo "Yes";
			}
			else
			{
				echo "No";	
			}
			?>            </td>
             <td align="center" class="normal_fonts9" bgcolor="<?php echo $bg;?>">
            <?php
			if($rowproduct["product_latest_status"]==1)
			{
				echo "Yes";
			}
			else
			{
				echo "No";	
			}
			?>            </td>
   
            <td align="center" bgcolor="<?php echo $bg;?>"><table border="0" cellspacing="1" cellpadding="1">
                      <tr>
                        <td align="center">
                        <?php
						if($permission_dataentry_edit==1)
						{
						?>
                        <a href="product.php?action=edit&productid=<?php echo $rowproduct["product_ID"]?>"><img src="images/edit.png" border="0" /></a>
                        <?php
						}
						else
						{
						?>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <?php
						}
						?>                        </td>
                        <td align="center">
                         <?php						
						if($permission_dataentry_remove==1)
						{						
						?>
                        <a href="process.php?process=removeproduct&productid=<?php echo $rowproduct["product_ID"]?>" onClick="return confirm('Do you want to remove selected product?');"><img src="images/delete_on.gif" border="0" /></a>
                        <?php
						}
						else
						{
						?>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <?php
						}
						?>                        </td>
                      </tr>
                </table></td>
          </tr>
          <?php
			 }
		}
		else
		{?>
        <tr>
        <td colspan="7" align="center" class="warning_fonts9">
        No Records Found
        </td>
        </tr>
        <?php
		}
		?>
        </table></td>
      </tr>
      <tr>
        <td colspan="2" align="center" class="normal_fonts9"><?php 
if($rows1!=0)
{
if ($pagenum == 1)
{
}
else
{
?>

    <a href='product.php?productsearchname=<?php echo $_REQUEST["productsearchname"]?>&productsearchcode=<?php echo $_REQUEST["productsearchcode"]?>&parentcategory=<?php echo $_REQUEST["parentcategory"]?>&subcategory=<?php echo $_REQUEST["subcategory"]?>&pagenum=1' > << first      </a>
    <a href='product.php?productsearchname=<?php echo $_REQUEST["productsearchname"]?>&productsearchcode=<?php echo $_REQUEST["productsearchcode"]?>&parentcategory=<?php echo $_REQUEST["parentcategory"]?>&subcategory=<?php echo $_REQUEST["subcategory"]?>&pagenum=<?php echo $pagenum-1; ?>'>Previous      </a>	
    <?php
}
if ($pagenum == $last) 
				{
					if($pagenum ==1)
					{
						$pagenum=1;
					}
					else
					{
					
					if($last-10>10)
					{
						$v=$last-10;						
					}
					else
					{
						$v=1;
					}
												
					for($i=$v;$i<=$last;$i++)
				{				
				?>				
    <a href='product.php?productsearchname=<?php echo $_REQUEST["productsearchname"]?>&productsearchcode=<?php echo $_REQUEST["productsearchcode"]?>&parentcategory=<?php echo $_REQUEST["parentcategory"]?>&subcategory=<?php echo $_REQUEST["subcategory"]?>&pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> | 
    <?php
				}		
				}		
				}
				else 
				{	
					if($pagenum<10)
					{
					    if($last>10)
						{
							$pageupto=10;
						}
						else
						{
							$pageupto=$last;
						}
						
						for($i=1;$i<=$pageupto;$i++)
						{				
						?>				
    <a href='product.php?productsearchname=<?php echo $_REQUEST["productsearchname"]?>&productsearchcode=<?php echo $_REQUEST["productsearchcode"]?>&parentcategory=<?php echo $_REQUEST["parentcategory"]?>&subcategory=<?php echo $_REQUEST["subcategory"]?>&pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
    <?php
						}		
					}
					else
					{
					
						for($i=$pagenum-5;$i<=$pagenum+5;$i++)
						{
						if($i<=$last)
						{				
						?>				
    <a href='product.php?productsearchname=<?php echo $_REQUEST["productsearchname"]?>&productsearchcode=<?php echo $_REQUEST["productsearchcode"]?>&parentcategory=<?php echo $_REQUEST["parentcategory"]?>&subcategory=<?php echo $_REQUEST["subcategory"]?>&pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
    <?php
						}
						}
					}
				 }
				 
			   ?>
    <?php
				if ($pagenum == $last)
				{
				}
				else
				{
			?>
    <a href='product.php?productsearchname=<?php echo $_REQUEST["productsearchname"]?>&productsearchcode=<?php echo $_REQUEST["productsearchcode"]?>&parentcategory=<?php echo $_REQUEST["parentcategory"]?>&subcategory=<?php echo $_REQUEST["subcategory"]?>&pagenum=<?php echo $pagenum+1; ?>'>Next</a>&nbsp;&nbsp;
    <a href='product.php?productsearchname=<?php echo $_REQUEST["productsearchname"]?>&productsearchcode=<?php echo $_REQUEST["productsearchcode"]?>&parentcategory=<?php echo $_REQUEST["parentcategory"]?>&subcategory=<?php echo $_REQUEST["subcategory"]?>&pagenum=<?php echo $last; ?>'>Last >> </a>	
    <?php
				}
			}
				?></td>
      </tr>
      <?php
	  }
	  ?>
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
