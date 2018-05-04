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
<title>View Category</title>
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
            <td class="normal_fonts14_black">View All Category</td>
            </tr>
            <?php
			if($_REQUEST["msg"]!="")
			{
			?>
          <tr>
            <td align="center" class="normal_fonts14"><?php echo $_REQUEST["msg"];?></td>
          </tr>
            <?php
			}
			?>
          <tr>
            <td class="normal_fonts9"><?php
function p_SatrtFromMenu($Url,$StartFrom)
{
$a=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
?>
<table width="100%" align="center" class="border" >
  <tr>
    <td align="center" valign="middle" ><a href="<?php echo $Url."StartFrom=All";  ?>">All</a></td>

   <?php
   for($i=0;$i<26;$i++)
	{
		$temp=$a[$i];
		?>
    <td align="center" class="title">|</td>
    <?php
		if(strtoupper($temp)==strtoupper($StartFrom))
		{
			?>
    <td align="center" valign="middle" ><?php echo $temp; ?></td>
    <?php
		}
		else
		{
			?>
    <td align="center" valign="middle" ><a href="<?php echo $Url."StartFrom=$temp";  ?>"><?php echo $temp; ?></a></td>
    <?php
		}

	}
	?>
  </tr>
</table>
<?php
}
p_SatrtFromMenu("category_view.php?",$StartFrom);
?></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellpadding="4" cellspacing="0" class="border">
              <tr>
                <td width="20%" align="left" valign="middle" bgcolor="#999999" class="normal_fonts9"><strong>Category Name</strong></td>
                <td align="left" valign="middle" bgcolor="#999999" class="normal_fonts9"><strong>Parent Category</strong></td>
                  <td align="center" valign="middle" bgcolor="#999999" class="normal_fonts9"><strong>Category Display Order</strong></td>
                <td width="10%" align="center" valign="middle" bgcolor="#999999" class="normal_fonts9"><strong>Active Status</strong></td>
                <td width="10%" align="center" valign="middle" bgcolor="#999999" class="normal_fonts9"><strong>Action</strong></td>
                </tr>
                 <?php
				 $c=0;
					$StartFrom=$_REQUEST["StartFrom"];
					if($StartFrom=="")
					{
						$query="select * from category_master where parent_category_ID=0 order by category_name";
					}
					else if($StartFrom=="All")
					{
						$query="select * from category_master order by category_name";
					}
					else
					{
						$query="select * from category_master where category_name like '$StartFrom%' order by category_name" ;
					}	
									
					$recordsetcat = mysql_query($query,$cn);
					
					$total = mysql_num_rows($recordsetcat);					
					
					$n=1;
					 
					while($rowcat = mysql_fetch_array($recordsetcat,MYSQL_ASSOC))
					{
					
					 $rs= mysql_query("select * from category_master where  parent_category_ID='".$rowcat["category_ID"]."' ",$cn);
	     		     $numrows = mysql_num_rows($rs);
					 
					 if($c%2==0)
					 {
						 $bg="#FFFFFF";
					 }
					 else
					 {
						 $bg="#F3F3F3";
					 }
					 
					 
					$c++;  
					?>
              <tr>
                <td bgcolor="<?php echo $bg;?>" class="normal_fonts9"><?php print($rowcat["category_name"]); ?></td>
                <td bgcolor="<?php echo $bg;?>" class="normal_fonts9"><?php 
				if($rowcat["parent_category_ID"]==0){echo "-";}
				print category_chain($rowcat["parent_category_ID"]);
				
				?></td>
                 <td bgcolor="<?php echo $bg;?>" class="normal_fonts9" align="center"><?php print($rowcat["category_display_order"]); ?></td>
                <td align="center" bgcolor="<?php echo $bg;?>" class="normal_fonts9"><?php if($rowcat["category_active_status"]==1) { echo "Yes" ; } elseif($rowcat["category_active_status"]==0) { echo "No"; } ?></td>
                <td width="80" align="center" bgcolor="<?php echo $bg;?>"><table width="80" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="20" align="center">
                      <form name="form" action="category_edit.php" method="get">
                        <input type="hidden" name="catid" value="<?php echo $rowcat["category_ID"]; ?>"/>
                        <input type="hidden" name="StartFrom" value="<?php echo $_REQUEST["StartFrom"]; ?>"/>
                        <input type="image" src="images/edit.png" alt="Edit" width="20" height="20" border="0" title="Edit" /></form></td>
                    
                    <td width="20" align="center">
                    <?php
					  if($numrows==0)
					  {
					  if($StartFrom=="")
					  {
					 	$link="category_process.php?process=remove&catid=".$rowcat["category_ID"]; 
					  }
					  else
					  {
					 	 $link="category_process.php?process=remove&catid=".$rowcat["category_ID"]."&StartFrom=".$_REQUEST["StartFrom"];
					  }
					  ?>
                    <a href="<?php echo $link;?>"  onClick="return confirm('Do you want to remove this category ?');"><img src="images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a>
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
