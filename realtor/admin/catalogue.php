<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");

	  $recordsetcatalogue = mysql_query("SELECT * FROM  catalogue_master");
	  while($rowcatalogue = mysql_fetch_array($recordsetcatalogue,MYSQL_ASSOC))
	  {
	  		$selectedcataloguename=$rowcatalogue["catalogue_name"];
	  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Shruti Fashions - Catalogue</title>
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
<script language="javascript">
function validation_catalogue()
{
	with(document.catalogueform)
	{
			var error=0;
			var message;
			message="Please enter / correct folllowing errors to proceed further";
			message=message+ "\n" + "--------------------------------------------------------------------";
			
			if(cataloguename.value=='')
			{
				error=1;
				message=message + "\n" + "Please Enter Catalogue Title !";
			}
			if(parentcategory.value=='')
			{
				error=1;
				message=message + "\n" + "Please Select Category !";
			}
			

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
      
         
      <?php
	  if($_REQUEST["action"]=="edit")
	  {
	  $recordsetcatalogue = mysql_query("SELECT * FROM  catalogue_master where catalogue_active_status=1");
	  while($rowcatalogue = mysql_fetch_array($recordsetcatalogue,MYSQL_ASSOC))
	  {
	  ?>
      <?php
	  }
	  }
	  ?>
      <tr>
       <td align="left" class="normal_fonts14_black">Catalogue</td>
       <td align="right"><table border="0" cellspacing="0" cellpadding="5">
          <tr>
         
            <td><a href="catalogue.php?action=new"><img src="images/add.png" width="20" height="20" border="0" /></a></td>
            <td class="normal_fonts9"><a href="catalogue.php?action=new"><strong>New Catalogue</strong></a>&nbsp;</td>
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
            <td width="4%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>No.</strong></td>
            <td width="15%" align="left" bgcolor="#999999" class="normal_fonts10"><strong>catalogue Name</strong></td>
            <td width="36%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>catalogue Cover Page Image</strong></td>
             <td width="12%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>View Catalog</strong></td>
            <td width="11%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Active</strong></td>
          
            <td width="12%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>No Of Products</strong></td>
            <td width="10%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Edit</strong></td>
          </tr>
          <?php
		  
		  $query="SELECT * FROM  catalogue_master order by catalogue_id";
		  
		  $no=1;
		  $recordsetcatalogue = mysql_query($query);
		 
		  while($rowcatalogue = mysql_fetch_array($recordsetcatalogue,MYSQL_ASSOC))
		  {
			   $querycataloguedetail=mysql_query("SELECT * FROM  catalogue_detail where catalogue_master_id='".$rowcatalogue['catalogue_id']."'");
		  $totproducts=mysql_num_rows($querycataloguedetail);
		  
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
            <td class="normal_fonts9" bgcolor="<?php echo $bg;?>"><?php echo $rowcatalogue["catalogue_name"];?></td>
             <td class="normal_fonts9" bgcolor="<?php echo $bg;?>" align="center">
              <?php $queryimage=mysql_query("SELECT * FROM  product_master
		  INNER JOIN catalogue_master ON catalogue_master.catalogue_cover_product_id=catalogue_master.catalogue_cover_product_id where product_catalogue_master_id ='".$rowcatalogue['catalogue_id']."' group by product_ID"); 
			 while($rowimage = mysql_fetch_array($queryimage))
			 {
			 if($rowcatalogue["catalogue_cover_product_id"]==$rowimage["product_ID"])
			 {
				
			 ?>
             <img src="../products/<?php echo $rowimage["product_thumbnail_image"];?>"  width="215" height="275" />	
             <?php } } ?>
            </td>
               <td align="center" bgcolor="<?php echo $bg;?>">                       
                         <a href="catalogue.php?action=viewcatalogue&catalogueid=<?php echo $rowcatalogue["catalogue_id"];?>"><img src="images/zoom_in.png" border="0" /></a>                                         
                        </td>
                        
            <td align="center" class="normal_fonts9" bgcolor="<?php echo $bg;?>">
            <?php
			if($rowcatalogue["catalogue_active_status"]==1)
			{
				echo "Yes";
			}
			else
			{
				echo "No";	
			}
			?>            </td>
           
             <td align="center" class="normal_fonts9" bgcolor="<?php echo $bg;?>"><?php echo $totproducts; ?></td>
             <td align="center" bgcolor="<?php echo $bg;?>"><table border="0" cellspacing="1" cellpadding="1">
                      <tr>
                        <td align="center" valign="middle">
                        <?php
						if($permission_dataentry_edit==1)
						{
						?>
                         <a href="catalogue.php?action=editcatalogue&catalogueid=<?php echo $rowcatalogue["catalogue_id"];?>"><img src="images/edit.png" border="0" /></a>
                         
                        <?php
						}
						else
						{
						?>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <?php
						}												
						if($permission_dataentry_remove==1)
						{						
						?>
                        <a href="process.php?action=deletecatalogue&catalogueid=<?php echo $rowcatalogue["catalogue_id"];?>" onClick="return confirm('Do you want to remove selected Catalogue?');"><img src="images/delete_on.gif" border="0" /></a>
                        <?php
						}
						else
						{
						?>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <?php
						}
						?>                                    
                        </td>
                     
                      </tr>
                </table></td>
          </tr>
          <?php
			 }
			 ?>
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
        <form name="catalogueform" id="catalogueform" method="post" action="process.php" enctype="multipart/form-data">
        <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
                  
          <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Catalogue Name</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top"><input name="cataloguename" id="cataloguename" type="text" class="normal_fonts9" size="45" /></td>
          </tr>
          <tr bgcolor="#F3F3F3">
            <td width="30%" align="right" valign="top" class="normal_fonts9">Catalogue Price Range</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top"><input name="price_range1" type="text" class="normal_fonts9" size="16" />&nbsp;To &nbsp;
            <input name="price_range2" type="text" class="normal_fonts9" size="16" />
            </td>
          </tr>
          <tr>
               <td align="right" class="normal_fonts9">Category</td>
               <td align="left">:</td>
               <td align="left" class="normal_fonts8"><select name="parentcategory" id="parentcategory" class="normal_fonts9" onchange="display_subcategory('ResultPanel','loadsubcategory.php',catalogueform)">
            <option value="">Select</option>
            <?php
			  $recordsetcategory = mysql_query("SELECT * FROM  category_master where parent_category_ID=0 order by category_ID");
			  while($rowcategory = mysql_fetch_array($recordsetcategory,MYSQL_ASSOC))
			  {
			  ?>
            <option value="<?php echo $rowcategory["category_ID"];?>"><?php echo $rowcategory["category_name"];?></option>
            <?php
			  }
			?>
            </select></td>
             </tr>
             <tr>
               <td align="right" bgcolor="#F3F3F3" class="normal_fonts9">Sub Category</td>
               <td align="left" bgcolor="#F3F3F3">:</td>
               <td align="left" bgcolor="#F3F3F3" class="normal_fonts8">
               <div id="ResultPanel">
                <select name="subcategory" id="subcategory" class="normal_fonts9">
                		<option value="">Select</option>          
                </select>
               </div>               </td>
             </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Catalogue Active Status</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input type="radio" name="cataloguestatus" value="1" checked="checked" />&nbsp;Yes&nbsp;<input type="radio" name="cataloguestatus" value="0"/>&nbsp;No</td>
          </tr>
          
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">  
              <input type="hidden" name="process" value="addcatalogue" />          
              <input name="submit" type="submit" class="normal_fonts9" value="Submit" onclick="return validation_catalogue();" /></td>
          </tr>
          
        </table></form></td>
      </tr>
       
      <?php
	  }
	  ?>
       <?php
	  if($_REQUEST["action"]=="editcatalogue")
	  {
	  ?>
       <tr>
        <td colspan="2">
        <form name="catalogueform" id="catalogueform" method="post" action="process.php" enctype="multipart/form-data">
        <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
      <?php
		
		$recordsetcatalogue = mysql_query("SELECT * FROM  catalogue_master where catalogue_id='".$_REQUEST["catalogueid"]."'");
	  if($rowcatalogue = mysql_fetch_array($recordsetcatalogue,MYSQL_ASSOC))
	  {
		  ?>     
          <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Catalogue Name</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top">
            <input name="catalogueid" type="hidden" value="<?php echo $rowcatalogue["catalogue_id"];?>" />
            <input name="cataloguename" id="cataloguename" type="text" class="normal_fonts9" size="45" value="<?php echo $rowcatalogue["catalogue_name"];?>" /></td>
          </tr>
          <tr bgcolor="#F3F3F3">
            <td width="30%" align="right" valign="top" class="normal_fonts9">Catalogue Price Range</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top"><input name="price_range1" type="text" class="normal_fonts9" size="16" value="<?php echo $rowcatalogue["catalogue_price_range_from"];?>"/>&nbsp;To &nbsp;
            <input name="price_range2" type="text" class="normal_fonts9" size="16" value="<?php echo $rowcatalogue["catalogue_price_range_to"];?>" />
            </td>
          </tr>
           <tr>
               <td align="right" class="normal_fonts9">Category</td>
               <td align="left" >:</td>
               <td align="left" class="normal_fonts8"><select name="parentcategory" id="parentcategory" class="normal_fonts9" onchange="display_subcategory('ResultPanel','loadsubcategory.php',catalogueform)">
               <option value="">-Select-</option>
            <?php
			  $recordsetcategory = mysql_query("SELECT * FROM  category_master where parent_category_ID=0 order by category_ID");
			  while($rowcategory = mysql_fetch_array($recordsetcategory,MYSQL_ASSOC))
			  {
			  ?>
            <option value="<?php echo $rowcategory["category_ID"];?>"<?php print($rowcategory["category_ID"])==$rowcatalogue["catalogue_parent_category"]?"Selected":"";?>><?php echo $rowcategory["category_name"];?></option>
            <?php
			}
			?>
            </select></td>
             </tr>
             <tr bgcolor="#F3F3F3">
               <td align="right" class="normal_fonts9">Sub Category</td>
               <td align="left">:</td>
               <td align="left" class="normal_fonts8">
               <div id="ResultPanel">
                <select name="subcategory" class="normal_fonts9">
                          <?php
						  $recordsetcategory = mysql_query("SELECT * FROM  category_master where parent_category_ID='".$rowcatalogue["catalogue_parent_category"]."' order by category_ID");
						  while($rowcategory = mysql_fetch_array($recordsetcategory,MYSQL_ASSOC))
						  {
						  ?>
						<option value="<?php echo $rowcategory["category_ID"];?>"<?php print($rowcategory["category_ID"])==$rowcatalogue["catalogue_sub_category"]?"Selected":"";?>><?php echo $rowcategory["category_name"];?></option>
						<?php
						}
						?>         
                </select>
               </div>               </td>
             </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Catalogue Active Status</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input type="radio" name="cataloguestatus" value="1" <?php if($rowcatalogue["catalogue_active_status"]==1){echo "checked";} ?> />&nbsp;Yes&nbsp;<input type="radio" name="cataloguestatus" value="0" <?php if($rowcatalogue["catalogue_active_status"]==0){echo "checked";} ?>/>&nbsp;No</td>
          </tr>
          
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">  
              <input type="hidden" name="process" value="editcatalogue" />          
              <input name="submit" type="submit" class="normal_fonts9" value="Submit" onclick="return validation_catalogue();" />
            </td>
          </tr>
        <?php } ?>  
        </table></form></td>
      </tr>
       
      <?php
	  }
	  ?>
       <?php
	  if($_REQUEST["action"]=="viewcatalogue")
	  {
	  ?>
       <tr>
        <td colspan="2">
         <form name="catalogueform" id="catalogueform" method="post" action="process.php" enctype="multipart/form-data">
        <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
          <tr>
            <td width="3%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>No.</strong></td>
            <td width="19%" align="left" bgcolor="#999999" class="normal_fonts10"><strong>Title / Code</strong></td>            
            <td width="16%" align="left" bgcolor="#999999" class="normal_fonts10"><strong>Product Category</strong></td>
            <td width="26%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Image</strong></td>
            <td width="18%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Set Image On Catalogue Cover Page 1 </strong></td> 
         <td width="18%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Set Image On Catalogue Cover Page 2 </strong></td> 
          </tr>
          <?php		
		  
		  $query="SELECT * FROM  product_master
		  INNER JOIN catalogue_master ON catalogue_master.catalogue_id = product_master.product_catalogue_master_id
		  where product_ID!=0 and product_catalogue_master_id='".$_REQUEST["catalogueid"]."' ";
		  
		  if($_REQUEST["productsearchname"]!="")
		  {
		  		$query=$query." and product_title REGEXP '".$_REQUEST["productsearchname"]."' ";
		  }
		  
		  if($_REQUEST["productsearchcode"]!="")
		  {
		  		$query=$query." and product_code REGEXP '".$_REQUEST["productsearchcode"]."'";
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
<?php echo "<strong>MRP Price</strong> : Rs. ".$rowproduct["product_mrp_price"];?>
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
			  $recordsetparentcategory = mysql_query("SELECT * FROM  category_master where category_ID='".$rowproduct["catalogue_parent_category"]."'");
			  while($rowparentcategory = mysql_fetch_array($recordsetparentcategory,MYSQL_ASSOC))
			  {	
			  		echo "<strong>".$rowparentcategory["category_name"]."</strong>";
			  }
			  
			  $recordsetsubcategory = mysql_query("SELECT * FROM  category_master where category_ID='".$rowproduct["catalogue_sub_category"]."'");
			  while($rowsubcategory = mysql_fetch_array($recordsetsubcategory,MYSQL_ASSOC))
			  {	
			  		echo " -> ".$rowsubcategory["category_name"];
			  }
			  ?>            </td>
            <td align="center" class="normal_fonts9" bgcolor="<?php echo $bg;?>">
            <input type="hidden" name="catalogueid" id="catalogueid" value="<?php echo $_REQUEST["catalogueid"]; ?>"  />
			<img src="../products/<?php echo $rowproduct["product_thumbnail_image"];?>" width="220" height="280" />			</td>
            <td align="center" class="normal_fonts9" bgcolor="<?php echo $bg;?>">
           <input type="radio" name="cataloguecoverproductid" id="cataloguecoverproductid" value="<?php echo $rowproduct["product_ID"];?>" <?php if($rowproduct["product_ID"]==$rowproduct["catalogue_cover_product_id"]){echo "checked";} ?> />
            </td>
             <td align="center" class="normal_fonts9" bgcolor="<?php echo $bg;?>">
           <input type="radio" name="cataloguecoverproductid2" id="cataloguecoverproductid2" value="<?php echo $rowproduct["product_ID"];?>" <?php if($rowproduct["product_ID"]==$rowproduct["catalogue_cover_product_id2"]){echo "checked";} ?> />
            </td>
            
          </tr>
          
          <?php
			 } ?>
            
          <tr>
            <td align="right" valign="top" class="normal_fonts9">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top" >&nbsp;</td>
            <td align="left" valign="top" class="normal_fonts9">&nbsp;  
            </td>
             <td align="center" valign="top" >          
              <input name="process" type="submit" class="normal_fonts9" value="Update Catalogue Cover Image1" /></td> 
              <td align="center" valign="top" >  
              <input name="process" type="submit" class="normal_fonts9" value="Update Catalogue Cover Image2" /></td> 
          </tr>  
             <?php
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
        </table>
        </form>
        </td>
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
