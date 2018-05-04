<?php
session_start();
include("include/config.php");
require_once("include/function.php");
u_Connect("cn");


function category_chain($CatId)
{
	global $cn;
	$rs1=mysql_query("SELECT * from category_master where category_ID=".$CatId." order by category_name") or die(mysql_error());
	if($row1=mysql_fetch_object($rs1))
	{
		
		if($row1->parent_category_ID==0)
		{
			return $row1->category_name;
		}
		else
		{
			return category_chain($row1->parent_category_ID)." >> ".$row1->category_name;
		}
	}
	return "";
}

function offer_chain($OfferId)
{
	global $cn;
	$rs1=mysql_query("SELECT * from offer_mast where offer_id=".$OfferId." order by offer_name") or die(mysql_error());
	if($row1=mysql_fetch_object($rs1))
	{
			return $row1->offer_name;
		
	}
	return "";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Product Details</title>
<link href="css/home.css" rel="stylesheet" type="text/css" />
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" />

<script src="jquery-validate/lib/jquery.js" type="text/javascript"></script>
<script src="jquery-validate/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery-validate/demo/multipart/js/jquery.maskedinput-1.0.js"></script>
<script type="text/javascript" src="jquery-validate/demo/multipart/js/ui.core.js"></script>
<script src="jquery-validate/lib/jquery.metadata.js" type="text/javascript"></script>

<script type="text/javascript" src="jquery-validate/demo/multipart/js/ui.accordion.js"></script>

<script type="text/javascript">

$().ready(function() {
	//$("#txtMobile").mask("9999999999");
$.metadata.setType("attr", "validate");
	// validate signup form on keyup and submit
	$("#ProductForm").validate({
		rules: {
			txtName: {required:true},
			
		},
		messages: {
			txtName: " Please enter Product"
		
		}
	});
	
	var newsletter = $("#newsletter");
	// newsletter topics are optional, hide at first
	var inital = newsletter.is(":checked");
	var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
	var topicInputs = topics.find("input").attr("disabled", !inital);
	// show when newsletter is checked
	newsletter.click(function() {
		topics[this.checked ? "removeClass" : "addClass"]("gray");
		topicInputs.attr("disabled", !this.checked);
	
	
	});
});
</script>

<link rel="stylesheet" href="calendar/css1/jquery.ui.all.css">
<script src="calendar/js/jquery-1.4.3.js"></script> 
	<script src="calendar/js/jquery.ui.core.js"></script> 

	<script src="calendar/js/jquery.ui.datepicker.js"></script> 

	<script type="text/javascript"> 
	
	var $j = jQuery.noConflict();
	
	$j(function() {
		$j( "#txtSdate" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
	});
	$j(function() {
		$j( "#txtEdate" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
	});
</script>

</head>
<script language="javascript" >		
	////////////// XML Function ////////////
	
	
	function gfe(d_n, f_n, fm) 
	{			
		f=fm;
		l=f.elements.length;
		m="";
		i=0;
		for(i=0;i<l;i++) 
		{
			if(f.elements[i].type=="checkbox")
			{
				if(f.elements[i].checked==true)
				{
					m +=f.elements[i].name+"="+f.elements[i].value+"&";
				}
			}
			else if(f.elements[i].type=="radio")
			{
				if(f.elements[i].checked==true)
				{
					m +=f.elements[i].name+"="+f.elements[i].value+"&";
				}
			}
			else
			{
				m +=f.elements[i].name+"="+f.elements[i].value+"&";
			}
		}
		//dt(d_n, f_n+'?'+m);		
		getoutput(f_n+'?'+m,d_n)
		
	
		
		return false;
	}
	
	function getoutput(url,resultpan)	
	{
		//alert(url);
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
				//alert(xmlchat.responseText);
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
<script language="javascript">

function load1(test1)
{
document.getElementById("txtexist").style.display = 'none';
document.getElementById("testexist").style.visibility= 'none';
document.getElementById("txt1").style.display = '';
document.getElementById("testadd").style.visibility="visible";
}
function load2(test2)
{
document.getElementById("txtexist").style.display = 'none';
document.getElementById("txt1").style.display = 'none';

//document.getElementById("testadd").style.visibility="visible";
}
function load3(test3)
{
document.getElementById("txtexist").style.display = '';
document.getElementById("txt1").style.display = '';
document.getElementById("testadd").style.visibility="visible";
document.getElementById("testexist").style.visibility="visible";
}

</script>
<script language="JavaScript">
var countcat=<?php echo count($cntypecat)==0?"1":count($cntypecat);?>;
				  
				  function addcategories()
				  {
				  	countcat=countcat+1;
					var ldivcat=document.getElementById("divcategory"+countcat);
					ldivcat.style.display="block";
					if(countcat==16-<?php echo mysql_num_rows($recordsetproductcolor);?>)
					{
						var objbuttoncat=document.getElementById("addcategory");
						objbuttoncat.style.display="none";						
					}
				
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
			
			if(product_title.value=='')
			{
				error=1;
				message=message + "\n" + "Please Enter Product Title !";
			}
			if(product_code.value=='')
			{
				error=1;
				message=message + "\n" + "Please Enter Product Code !";
			}
			if(brand.value=='')
			{
				error=1;
				message=message + "\n" + "Please Enter Band !";
			}
			//var i;
//			for(i=1;i<document.getElementById("total_count").value;i++){
//			if(document.getElementById('parent_category'+i).checked==true)
//			{
//				
//				error=0;				
//				break;
//			
//			}
//			else{
//				error=1;				
//				}
//			
//			}
//			
//			if(error==1){
//				
//				message=message + "\n" + "Please Enter Product Category !";
//			}
				
			
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
<script type="text/javascript" src="ajax/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="ajax/highslide.css" />
<script type="text/javascript">
hs.graphicsDir = 'ajax/graphics/';
hs.outlineType = 'rounded-white';
hs.showCredits = false;
hs.wrapperClassName = 'draggable-header';
</script>
<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border">
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF"><?php include("header.php");?></td>
      </tr>

      
      
      <tr>
        <td bgcolor="#FFFFFF">
     
     <!--   main starts here-->
<form id="productform" name="productform" method="post" action="processProduct.php" enctype="multipart/form-data" >

             
     
<table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">Change Product Details</td>
          </tr>
          <tr>
            <td>
           <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
           <?php 

   $a=$_GET["Product_id"];
 

   $query = "select * from product_mast where Product_id='".$a."'";
   
   $result= mysql_query($query) 
   or die (mysql_error());
   
   if($row=mysql_fetch_array($result))
   {
	   

	?>     
    <tr bgcolor="#F3F3F3">
      <td width="40%" align="right" valign="top" class="normal_fonts9">Product Title :</td>
      <td width="60%" align="left">
      <input name="product_title" type="text" class="normal_fonts9" value="<?php echo $row['Product_title'];  ?>" />
      <input name="hdnProduct" type="hidden" id="hdnProduct" value="<?php echo $row['Product_id'];  ?>" />
      </td>
    </tr>
    <tr>
      <td width="40%" align="right" valign="top"  class="normal_fonts9">Product Code :</td>
      <td width="60%" align="left"><input name="product_code" type="text" class="normal_fonts9" value="<?php echo $row['Product_code'];  ?>" /></td>
    </tr>
    <tr>
      <td width="40%" align="right" valign="top"  class="normal_fonts9">Available Size :</td>
      <td width="60%" align="left" valign="top">
            <table border="0" cellspacing="0" cellpadding="5">
            <tr>
     <?php
	   $s=1;
      $recordsetsize = mysql_query("SELECT * FROM  size_mast order by size_id");
	  while($rowsize = mysql_fetch_array($recordsetsize,MYSQL_ASSOC))
	  { $recordsetproductsize = mysql_query("SELECT * FROM product_size where product_mast_id ='".$a."' and size_mast_id ='".$rowsize["size_id"]."'");
	  ?>
                <td class="normal_fonts9"><input type="checkbox" name="chksize[]" value="<?php echo $rowsize['size_id'];?>" <?php if(mysql_num_rows($recordsetproductsize)!=0) { ?> checked="checked" <?php } ?> /><?php echo $rowsize["size"]; ?></td>
     <?php
	 if(($s%4)==0)
	 {
	  ?>
              </tr>
      <?php
	  
	 }
	 $s++;
	  }
	  ?>
         
            <tr>
            <td class="normal_fonts9"><a onclick="return hs.htmlExpand(this, { headingText: 'Size Chart' })" style="cursor:pointer; text-decoration:underline;" >SIZE CHART</a>
             <div class="highslide-maincontent" >
             <table width="100%" border="0" cellspacing="0" cellpadding="0" >
            <tr><td bgcolor="#cccccc">
            <table width="100%" border="0" cellspacing="1" cellpadding="4"  >
  <tr bgcolor="#FFFFFF">
    <td colspan="7" align="center" height="50" class="normal_fonts14_black"><strong>Australian Standard Size</strong></td>
    <td width="23%" align="center" class="normal_fonts14_black"><strong>Equivalent    Klassic Kids Size</strong></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="7">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="normal_fonts12_black" bgcolor="#FFFFFF">
    <td width="10%" height="29" align="center"><strong>Size </strong></td>
    <td width="13%" align="center"><strong>Age</strong></td>
    <td width="12%" align="center"><strong>Height</strong></td>
    <td width="14%" align="center"><strong>Weight</strong></td>
    <td width="10%" align="center"><strong>Chest</strong></td>
    <td width="10%" align="center"><strong>Waist</strong></td>
    <td width="8%" align="center"><strong>Hip</strong></td>
    <td align="center"><strong>Size</strong></td>
  </tr>
  <tr class="normal_fonts9" bgcolor="#FFFFFF">
    <td align="center">Triple 0</td>
    <td align="center">0 - 3 months</td>
    <td align="center">62</td>
    <td align="center">3 - 5 kg</td>
    <td align="center">44 cm</td>
    <td align="center">n.a</td>
    <td align="center">n.a</td>
    <td align="center">&quot; S &quot; or 14</td>
  </tr>
  <tr class="normal_fonts9" bgcolor="#FFFFFF">
    <td align="center">Double 0</td>
    <td align="center">3 - 6 months</td>
    <td align="center">68</td>
    <td align="center">5 - 7 kg</td>
    <td align="center">47 cm</td>
    <td align="center">n.a</td>
    <td align="center">n.a</td>
    <td align="center">&quot; S &quot; or 14</td>
  </tr>
  <tr class="normal_fonts9" bgcolor="#FFFFFF">
    <td align="center">Zero</td>
    <td align="center">6 - 9 months</td>
    <td align="center">74</td>
    <td align="center">7 - 9 kg</td>
    <td align="center">50 cm</td>
    <td align="center">n.a</td>
    <td align="center">n.a</td>
    <td align="center">&quot; M &quot; or 16</td>
  </tr>
  <tr class="normal_fonts9" bgcolor="#FFFFFF">
    <td align="center">1</td>
    <td align="center">12 months</td>
    <td align="center">80</td>
    <td align="center">9 - 11 kg</td>
    <td align="center">53 cm</td>
    <td align="center">n.a</td>
    <td align="center">n.a</td>
    <td align="center">&quot; L &quot; or 18 </td>
  </tr>
  <tr class="normal_fonts9" bgcolor="#FFFFFF">
    <td align="center">1</td>
    <td align="center">18 months</td>
    <td align="center">86</td>
    <td align="center">10.5 - 12.5 kg</td>
    <td align="center">53 cm</td>
    <td align="center">n.a</td>
    <td align="center">n.a</td>
    <td align="center">&quot; XL &quot; or 20</td>
  </tr>
  <tr class="normal_fonts9" bgcolor="#FFFFFF">
    <td align="center">2</td>
    <td align="center">2 years</td>
    <td align="center">92</td>
    <td align="center">12 - 14.5 kg</td>
    <td align="center">56 cm</td>
    <td align="center">54 cm</td>
    <td align="center">56 cm</td>
    <td align="center">&quot; XL &quot; or 20</td>
  </tr>
  <tr class="normal_fonts9" bgcolor="#FFFFFF">
    <td align="center">3</td>
    <td align="center">3 years</td>
    <td align="center">98</td>
    <td align="center">13.5 - 15 kg</td>
    <td align="center">58 cm</td>
    <td align="center">55 cm</td>
    <td align="center">59 cm</td>
    <td align="center">&quot; 22 &quot;</td>
  </tr>
  <tr class="normal_fonts9" bgcolor="#FFFFFF">
    <td align="center">4</td>
    <td align="center">4 years</td>
    <td align="center">104</td>
    <td align="center">15 - 18 kg</td>
    <td align="center">60 cm</td>
    <td align="center">56 cm</td>
    <td align="center">62 cm</td>
    <td align="center">&quot; 24 &quot;</td>
  </tr>
  <tr class="normal_fonts9" bgcolor="#FFFFFF">
    <td align="center">5</td>
    <td align="center">5 years</td>
    <td align="center">110</td>
    <td align="center">19 - 21 kg</td>
    <td align="center">62 cm</td>
    <td align="center">57 cm</td>
    <td align="center">64 cm</td>
    <td align="center">&quot; 24 &quot;</td>
  </tr>
  <tr class="normal_fonts9" bgcolor="#FFFFFF">
    <td align="center">6</td>
    <td align="center">6 years</td>
    <td align="center">116</td>
    <td align="center">22 - 25 kg</td>
    <td align="center">64 cm</td>
    <td align="center">58 cm</td>
    <td align="center">66 cm</td>
    <td align="center">&quot; 26 &quot;</td>
  </tr>
  <tr class="normal_fonts9" bgcolor="#FFFFFF">
    <td align="center">7</td>
    <td align="center">7 years</td>
    <td align="center">122</td>
    <td align="center">25 - 28 kg </td>
    <td align="center">66 cm</td>
    <td align="center">59 cm</td>
    <td align="center">68 cm</td>
    <td align="center">&quot; 26 &quot;</td>
  </tr>
  <tr class="normal_fonts9" bgcolor="#FFFFFF">
    <td align="center">8</td>
    <td align="center">8 years</td>
    <td align="center">128</td>
    <td align="center">30 - 32 kg</td>
    <td align="center">68 cm</td>
    <td align="center">60 cm</td>
    <td align="center">70 cm</td>
    <td align="center">&quot; 28 &quot;</td>
  </tr>
</table>
</td></tr></table>
             </div>
                           
              </td>
            </tr>
            </table>
      </td>
    </tr>
    <tr bgcolor="#F3F3F3">
              <td width="40%" align="right" valign="top" class="normal_fonts9">Available Colors :</td>              
              <td width="60%" align="left" valign="top" class="normal_fonts9">
            <table border="0" cellspacing="0" cellpadding="5">
    <tr>
       <?php
	   $c=1;
      $recordsetcolor = mysql_query("SELECT * FROM  color_mast order by Color_id");
	  while($rowcolor = mysql_fetch_array($recordsetcolor,MYSQL_ASSOC))
	  { $recordsetproductcolor = mysql_query("SELECT * FROM product_colors where product_master_ID ='".$row['Product_id']."' and color_master_ID ='".$rowcolor["Color_id"]."'");
	  ?>
                <td><input type="checkbox" name="selectedcolors[]" value="<?php echo $rowcolor['Color_id'];?>" <?php if(mysql_num_rows($recordsetproductcolor)!=0) { ?> checked="checked" <?php } ?> /></td>
                <td><img src="../images/colors/<?php echo $rowcolor["Color_image"];?>" alt="<?php echo $rowcolor["Color"];?>" title="<?php echo $rowcolor["Color"];?>" /></td>
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
      <td align="right"  valign="top" class="normal_fonts9">Product Fabric :</td>
      <td align="left"><input name="product_clothes_fabric" type="text" class="normal_fonts9" value="<?php echo $row['product_clothes_fabric'];  ?>" /></td>
    </tr>
     <tr>
      <td align="right" bgcolor="#F3F3F3" valign="top" class="normal_fonts9">Gender :</td>
      <td align="left" bgcolor="#F3F3F3" class="normal_fonts9">
       <input name="gender" id="gender" value="Boy" type="radio" <?php if($row["gender"]=='Boy')
{ echo "checked"; }?>/>Boy	
                    <input name="gender" id="gender" value="Girl" type="radio" <?php if($row["gender"]=='Girl')
{ echo "checked"; }?> />Girl
      </td>
    </tr>
          
    <tr>
      <td align="right" valign="top" class="normal_fonts9">Product Description :</td>
      <td align="left">
      			<?php
	   			 include_once 'ckeditor/ckeditor.php';
				 include_once 'ckfinder/ckfinder.php';
				 $ckeditor = new CKEditor();
				 $config['height']=150;
				 $config['width']=450;
				 $config['toolbar']="Basic";
								 
				 $ckeditor->basePath = 'ckeditor/';
				 $ckeditor->config['filebrowserBrowseUrl'] = 'ckfinder/ckfinder.html';
				 $ckeditor->config['filebrowserImageBrowseUrl'] = 'ckfinder/ckfinder.html?type=Images';
				 $ckeditor->config['filebrowserFlashBrowseUrl'] = 'ckfinder/ckfinder.html?type=Flash';
				 $ckeditor->config['filebrowserUploadUrl'] = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
				 $ckeditor->config['filebrowserImageUploadUrl'] = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
				 $ckeditor->config['filebrowserFlashUploadUrl'] = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
				 $code = $ckeditor->editor('product_desc', $row['Product_description'],$config);
				 echo $code;
				 ?></td>
    </tr>
   
    
    <tr>
      <td align="right" bgcolor="#F3F3F3" valign="top" class="normal_fonts9">Product Price :</td>
      <td align="left" bgcolor="#F3F3F3"><input name="product_mrp" type="text" class="normal_fonts9" value="<?php echo $row['Price'];  ?>" /></td>
    </tr>
    <tr>
      <td align="right" valign="top" class="normal_fonts9">Product Quantity :</td>
      <td align="left" ><input name="product_qty" type="text" class="normal_fonts9"  value="<?php echo $row['Product_quantity'];  ?>"/></td>
    </tr>
    
    <tr bgcolor="#F3F3F3">
      <td align="right" valign="top" class="normal_fonts9">Brand :</td>
      <td align="left" class="normal_fonts9">
	  <select name="brand" id="brand" class="normal_fonts9">
      <option >-select- </option>
	  <?php
                                $recordsetcat = mysql_query("select * from kid_brand_mast where kid_brand_active_status=1");
								$catc=1;
                                while($rowbrand = mysql_fetch_array($recordsetcat,MYSQL_ASSOC))
                                {
                                ?>
                       <option value="<?php echo $rowbrand["kid_brand_id"];?>" <?php print($rowbrand["kid_brand_id"])==$row["Brand_mast_id"]?"Selected":"";?> ><?php echo $rowbrand["kid_brand_name"];?></option>           
                                                     
                                    <?php
									  	$catc++;
                                }
                                ?>
                                
       </select>
                        </td>
    </tr>
    
    
    <tr>
                <td align="right" class="normal_fonts9">Product status :</td>
                 <td class="normal_fonts9">
                    <input name="rdoStatus" id="rdoStatus" value="1" type="radio" <?php if($row["Product_active_status"]==1)
{ echo "checked"; }?>/>Active	
                    <input name="rdoStatus" id="rdoStatus" value="0" type="radio" <?php if($row["Product_active_status"]==0)
{ echo "checked"; }?> />Inactive
                    
                    </td>
   </tr>
   <tr>
      <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Category  :</td>
      <td align="left" class="normal_fonts9" bgcolor="#F3F3F3"> 
            <?php	
      $recordsetcatparent = mysql_query("select * from product_category 
					 INNER JOIN category_master ON category_master.category_ID=product_category.Category_mast_id
					 where Product_mast_id='".$row["Product_id"]."' and category_master.parent_category_ID=0 ");		 	  
		 $rowparentcat=mysql_fetch_array($recordsetcatparent);
				?>                        
           <?php	
		   $i=1;
      $recordsetcatparentall = mysql_query("select * from category_master where parent_category_ID=0 ");		 	  
		 while($rowparentcatall=mysql_fetch_array($recordsetcatparentall)){
				?>       
           <input type="radio" id="parent_category<?php echo $i; ?>" name="parent_category" value="<?php echo $rowparentcatall["category_ID"]; ?>" onclick="gfe('subcategorydiv','subcategory.php',productform)" <?php if($rowparentcat["category_ID"]==$rowparentcatall["category_ID"]){echo "checked";} ?> />
		   <?php echo $rowparentcatall["category_name"]; ?><br />
           
           <?php $i++;}  ?>
             <input type="hidden" name="total_count" id="total_count" value="<?php echo mysql_num_rows($recordsetcatparentall); ?>" />
      </td>
    </tr>
    <tr>
      <td align="right" valign="top" class="normal_fonts9">Subcategory :</td>
      <td align="left"> <div class="normal_fonts9" id="subcategorydiv">
      <?php	
      $recordsetcatchild = mysql_query("select * from category_master where parent_category_ID='".$rowparentcat["category_ID"]."' ");

	 $b=1;
	while($rowcatchild = mysql_fetch_array($recordsetcatchild))
	 { ?>
      <?php	
      $recordsetcat = mysql_query("select * from product_category 
					 INNER JOIN category_master ON category_master.category_ID=product_category.Category_mast_id
					 where Product_mast_id='".$row["Product_id"]."' and Category_mast_id='".$rowcatchild["category_ID"]."' ");
	
	  $rowcat1 = mysql_fetch_array($recordsetcat);
	  ?>
       <input type="radio" id="childcategory<?php echo $b; ?>" name="childcategory" value="<?php echo $rowcatchild["category_ID"]; ?>" <?php if($rowcatchild["category_ID"]==$rowcat1["category_ID"]){echo "checked";} ?>/>
          <?php
			  $catid=$rowcatchild["category_ID"];
			  echo $rowparentcat["category_name"]." >> ";
			 
			  echo $rowcatchild["category_name"];
				
				 $b++;
			?>
          <br />
		  <?php
		  }
		  ?>
         <input type="hidden" name="hdnCatid" value="<?php echo $catid; ?>" />
           </div></td>
         
    </tr>
    
  
    <tr>
      <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Offer :</td>
      <td align="left" bgcolor="#F3F3F3" class="normal_fonts9"><?php
                                $recordsetcat = mysql_query("select * from offer_mast where offer_active_status=1");
								$catc=1;
                                while($rowcat = mysql_fetch_array($recordsetcat,MYSQL_ASSOC))
                                {
                                ?>
                                    
                                    <input type="radio" id="offer_name" name="offer_name" value="<?php echo $rowcat["offer_id"];?>" onclick="gfe('subcategorydiv_offer','offer_detail.php',productform)" <?php
						   $qDev=mysql_query("select * from product_offer 
where Product_mast_id='".$row['Product_id']."'");
                    while($resDev=mysql_fetch_array($qDev))
					{	 
						  if($resDev["offer_mast_id"]==$rowcat["offer_id"])echo "Checked";
					}?>
                    />
                                    <?php print offer_chain($rowcat["offer_id"]); ?> <br />
                                    <?php
									  	$catc++;
                                }
                                ?>
                                    <input type="hidden"  name="catidval"  id="catidval" value="<?php echo $catc; ?>" />
                        </td>
    </tr>
    <tr>
      <td align="right" valign="top" class="normal_fonts9">Offer Details :</td>
      <td align="left"  class="normal_fonts9"><div id="subcategorydiv_offer">
      
     <?php
	 
      $rs1=mysql_query("SELECT * from product_offer  
					 where Product_mast_id='".$row["Product_id"]."'") or die(mysql_error());		
		
		if($row1=mysql_fetch_array($rs1))
		{
			$dt1=explode("-",$row1["Start_date"]);
			$dd1=$dt1[0];
			$mm1=$dt1[1];
			$yy1=$dt1[2];
			
			$dt2=explode("-",$row1["End_date"]);
				$dd2=$dt2[0];
				$mm2=$dt2[1];
				$yy2=$dt2[2];
			$sdate=$yy1."-".$mm1."-".$dd1;
			$edate=$yy2."-".$mm2."-".$dd2;
			?>	
            <table>
            
            <tr><td class="normal_fonts9">
		Offer amount : <input name="txtAmount" type="text" class="normal_fonts9" id="txtAmount" value="<?php echo $row1["offer_amt"]; ?>" />
        </td><td> In : 
        <input name="rdoType" id="rdoType" value="1" <?php if($row1["offer_type_id"]==1)
                { echo "checked"; }?> type="radio"/>%	
                
                <input name="rdoType" id="rdoType" value="2" <?php if($row1["offer_type_id"]==2)
                { echo "checked"; }?> type="radio"/>Rs
               </td></tr>
               <tr class="normal_fonts9"><td>
		Start date : <input name="txtSdate" type="text" class="normal_fonts9" id="txtSdate"  value="<?php echo $sdate; ?>" /> 
        </td></tr>
        <tr class="normal_fonts9"><td>
        End date :<input name="txtEdate" type="text" class="normal_fonts9" id="txtEdate" value="<?php echo $edate; ?>" />
        </td></tr>
        </table>
     <?php  	
		}
      ?>
       </div></td>
    </tr>
    
    
    <tr><td align="right" bgcolor="#F3F3F3" valign="top" class="normal_fonts9">Project Display Image :</td>
    <td bgcolor="#F3F3F3"><img src="../photo/<?php echo $row["Product_display_medium_image"]; ?> " width="135" height="180" /></td>    
    </tr>
    <tr>
    <td align="right" valign="top" class="normal_fonts9">Change Display Image</td>
    <td class="normal_fonts9">
    <input name="changeimage" type="file" class="normal_fonts9" id="changeimage"  />(width : 135px x height : 180px) (Display on Product List Page)
    </td></tr>
           
      
    <?php } ?>     
</table>
  </td></tr>
  
                          <tr><td>
                          <table width="100%" border="0" cellpadding="5" cellspacing="0">
                          <tr>
                            <td align="right" class="normal_fonts9" width="375">&nbsp;</td>
                            <td align="center" class="normal_fonts9" width="10">&nbsp;</td>
                            <td class="normal_fonts9" >
                            <input type="hidden" name="process" value="Edit" />
                <input class="submit" name="submit" type="submit" align="middle" style="width:80px; height:30px" id="submit" value="Save" onclick="return validation_product()" /></td>
                          </tr>
                          
                          </table>
  </td></tr></table>
          
          
</form>
<!--   main ends here-->

</td>
      </tr>
      
      
      
    </table></td>
  </tr>
  
  <tr>
        <td align="center" valign="middle">
        <?php  include("footer.php"); ?>
        </td>
  </tr>
</table>
 </td></tr></table>
</body>
</html>