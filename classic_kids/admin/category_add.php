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
<title>Add New Category</title>
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
<script language="javascript">
function validation_category()
{
	with(document.categoryform)
	{
			var error=0;
			var message;
			message="Please enter / correct folllowing errors to proceed further";
			message=message+ "\n" + "--------------------------------------------------------------------";
			
			if(cat_name.value=='')
			{
				error=1;
				message=message + "\n" + "Please Enter Category !";
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
            <td class="normal_fonts14_black">Add New Category</td>
            </tr>
          <tr>
            <td><form name="categoryform" id="categoryform" action="category_process.php" method="post" enctype="multipart/form-data">
                    <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
              <tr>
                <td width="300" align="right" valign="top" class="normal_fonts9">Category Name</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td valign="top" class="normal_fonts9"><input name="cat_name" type="text" class="normal_fonts9"  size="45"  /></td>
              </tr>
              <tr>
                <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Parent Category</td>
                <td align="center" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><?php
                                $recordsetcat = mysql_query("select * from category_master where parent_category_ID=0",$cn);
								$catc=1;
                                while($rowcat = mysql_fetch_array($recordsetcat,MYSQL_ASSOC))
                                {
                                ?>
                                    <?php //print($rowcat["category_id"]);?>
                          <input type="radio" id="parent_category" name="parent_category" value="<?php print($rowcat["category_ID"]);?>" onclick="gfe('subcategorydiv','subcategory.php',categoryform)"/>
                                    <?php print category_chain($rowcat["category_ID"]); ?> <br />
                                    <?php
									  	$catc++;
                                }
                                ?>
                                    <input type="hidden"  name="catidval"  id="catidval" value="<?php echo $catc; ?>" /></td>
              </tr>
              <tr>
                <td align="right" valign="top" class="normal_fonts9">Sub Category :</td>
                <td align="center" valign="top" class="normal_fonts9">:</td>
                <td valign="top" class="normal_fonts9"><div id="subcategorydiv"></div></td>
              </tr>
              <tr>
                <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Active :</td>
                <td align="center" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><input type="radio" name="cat_status" value="1" checked="checked" />Yes&nbsp;
                  <input type="radio" name="cat_status" value="0" />No</td>
              </tr>
               <tr>
                <td align="right" valign="top" class="normal_fonts9">Display Order </td>
                <td align="center" valign="top" class="normal_fonts9">:</td>
                <td valign="top" class="normal_fonts9"><input type="text" name="cat_display_order" id="cat_display_order" ></td>
              </tr>
              <tr>
                <td height="10" colspan="3" align="right" class="normal_fonts9"></td>
              </tr>
              <tr>
                <td align="right" class="normal_fonts9">&nbsp;</td>
                <td align="center" class="normal_fonts9">&nbsp;</td>
                <td class="normal_fonts9">
                <input type="hidden" name="process" value="add" />
                      <input type="submit" name="Submit" value="Submit"  onClick="return validation_category()" class="normal_fonts12_black"/></td>
              </tr>
              <tr>
                <td height="10" colspan="3" align="right" class="normal_fonts9"></td>
                </tr>
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
