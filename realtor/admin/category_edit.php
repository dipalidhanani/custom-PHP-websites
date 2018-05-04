<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
$username=$_SESSION['shopuname'];

function category_chain($CatId)
{
	global $cn;
	$rs1=mysql_query("SELECT * from category_master where category_ID=".$CatId." order by category_name",$cn) or die(mysql_error());
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Category Details</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="menu_style.css" type="text/css" />
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
</style></head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border">
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF"><?php include("header.php");?></td>
      </tr>
      
      
      <tr>
        <td bgcolor="#FFFFFF">
        
        <table width="99%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">Modify Category Details</td>
            </tr>
          <tr>
            <td><form name="categoryform" id="categoryform" action="category_process.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="category_ID" id="category_ID" value="<?php echo $_REQUEST["catid"]; ?>"  />
                    <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
                     <?php
                        $recordsetcat = mysql_query("select * from category_master where category_ID='".$_REQUEST["catid"]."' " ,$cn);
						while($rowcat = mysql_fetch_array($recordsetcat,MYSQL_ASSOC))
						{
						?>
             <tr>
                <td width="300" align="right" valign="top" class="normal_fonts9">Category Name</td>
                <td width="10" align="center" valign="top" class="normal_fonts9"> :</td>
                <td valign="top" class="normal_fonts9"><input name="cat_name" type="text" class="normal_fonts9" value="<?php echo $rowcat["category_name"]; ?>"  size="45"  /></td>
             </tr>
              <tr bgcolor="#F3F3F3">
                <td width="300" align="right" valign="top" class="normal_fonts9">Category Display Image</td>
                <td width="10" align="center" valign="top" class="normal_fonts9"> :</td>
                <td valign="top" class="normal_fonts9"><img src="../category/<?php echo $rowcat["category_display_image"]; ?>" width="220" height="119" />
                <input type="hidden" name="currentimage" id="currentimage" value="<?php echo $rowcat["category_display_image"]; ?>" />
                </td>
              </tr>
              <tr>
                <td width="300" align="right" valign="top" class="normal_fonts9">Change Display Image</td>
                <td width="10" align="center" valign="top" class="normal_fonts9"> :</td>
                <td valign="top" class="normal_fonts9"><input name="changeimage" type="file" class="normal_fonts9" id="changeimage"  />&nbsp;&nbsp;(width : 220px x height : 119px)</td>
              </tr>
             
              <tr>
                <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Parent Category</td>
                <td align="center" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><?php
                                $recordsetcat = mysql_query("select * from category_master where parent_category_ID=0 order by category_name ",$cn);
								$catc=1;
                                while($rowcat1 = mysql_fetch_array($recordsetcat,MYSQL_ASSOC))
                                {
                                ?>                                   
                                    <?php  $chCat=mysql_fetch_array(mysql_query("select * from category_master where category_ID='".$_REQUEST['catid']."' ")); 									
									?>
                                   <?php if(mysql_affected_rows()>0 && $chCat['parent_category_ID']==$rowcat1['category_ID']) { ?>
                          <input type="radio" id="parent_category" name="parent_category" value="<?php print($rowcat1["category_ID"]);?>" onclick="gfe('subcatdiv2','subcategory.php',categoryform)" checked="checked"/>
                                    <?php } else { ?>
                                    <input type="radio" id="parent_category" name="parent_category" value="<?php print($rowcat1["category_ID"]);?>" onclick="gfe('subcatdiv2','subcategory.php',categoryform)" />
                                    <?php } ?>
                                    <?php print category_chain($rowcat1["category_ID"]); ?> <br />
                                    <?php
									  	$catc++;
                                }
                                ?></td>
              </tr>
              <tr>
                <td align="right" valign="top" class="normal_fonts9">Sub Category </td>
                <td align="center" valign="top" class="normal_fonts9">:</td>
                <td valign="top" class="normal_fonts9"><div id="subcatdiv2">
							<?php  
						    if($rowcat['parent_category_ID']!=0)
							{
						   $recordsetcat1 = mysql_query("select * from category_master where parent_category_ID=0 and category_ID='".$rowcat['parent_category_ID']."' order by category_name ",$cn);
							 if(mysql_num_rows($recordsetcat1)==0)
							 {
							?>
                            <input type="radio" name="childcategory" value="<?php echo $rowcat['category_ID'];?>" checked="checked" />         
                            <?php
							 
								  print category_chain($rowcat['parent_category_ID'])."<br>";
							 }
							}
							 ?>
                            </div></td>
              </tr>
               <tr bgcolor="#F3F3F3">
                <td align="right" valign="top" class="normal_fonts9">Category Display Order</td>
                <td align="center" valign="top" class="normal_fonts9">:</td>
                <td valign="top" class="normal_fonts9"><input name="category_display_order" id="category_display_order" type="text" class="normal_fonts9" size="45" value="<?php echo $rowcat["category_display_order"]; ?>" /></td>
              </tr>
              <tr>
                <td align="right" valign="top" class="normal_fonts9">Active </td>
                <td align="center" valign="top" class="normal_fonts9">:</td>
                <td valign="top" class="normal_fonts9"><input type="radio" name="cat_status" value="1" <?php if($rowcat["category_active_status"]==1) { ?> checked="checked" <?php } ?> />Yes&nbsp;<input type="radio" name="cat_status" value="0" <?php if($rowcat["category_active_status"]==0) { ?> checked="checked" <?php } ?> />No</td>
              </tr>
              <tr>
                <td height="10" colspan="3" align="right" class="normal_fonts9"></td>
              </tr>
              <tr>
                <td align="right" class="normal_fonts9">&nbsp;</td>
                <td align="center" class="normal_fonts9">&nbsp;</td>
                <td class="normal_fonts9">
                <input type="hidden" name="StartFrom" value="<?php echo $_REQUEST["StartFrom"]; ?>"/>
                       <input type="hidden" name="catid" value="<?php echo $_REQUEST["catid"] ?>"/>
                       <input type="hidden" name="parentcategoryid" value="<?php echo $rowcat['parent_category_ID'];?>" />
                      <input type="hidden" name="process" value="edit" />
                      <input type="submit" name="Submit" value="Change"  onClick="return validation(this.form)" class="normal_fonts12_black"/></td>
              </tr>
              <tr>
                <td height="10" colspan="3" align="right" class="normal_fonts9"></td>
                </tr>
                <?php
				}
				?>
            </table></form></td>
          </tr>
          </table>
          
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
