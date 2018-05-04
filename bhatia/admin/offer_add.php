<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	mysql_query("truncate table temp");
	?>
    <?php
	$country=mysql_query("select * from offer where OfferId='".$_REQUEST['eid']."'");
	$k=mysql_fetch_array($country);
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ADMIN_TITLE; ?></title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/menu_style.css" type="text/css" />
    <script src="tooltip/jquery.js" type="text/javascript"></script>
	<script src="tooltip/main.js" type="text/javascript"></script>

<script language="javascript">
	function forAllBrowserVisible(val)
	{		
		var dra=navigator.appName;
		if(dra=="Netscape")
		{
			document.getElementById(val).style.display="table";
			document.getElementById(val).style.visibility="visible";
		}
		else
		{
			document.getElementById(val).style.display="block";
			document.getElementById(val).style.visibility="visible";
		}
	}
	function forAllBrowserHide(val)
	{		
		var dra=navigator.appName;
		if(dra=="Netscape")
		{
			document.getElementById(val).style.display="none";
			document.getElementById(val).style.visibility="hidden";
		}
		else
		{
			document.getElementById(val).style.display="none";
			document.getElementById(val).style.visibility="hidden";
		}
	}
	
	function Disp(val)
	{		
		forAllBrowserVisible(val);	
		document.getElementById(val).style.width='';	
		document.getElementById(val).style.height='';	
	}
	function noDisp(val)
	{			
		forAllBrowserHide(val);		
	}
</script>
<script language="javascript">
var xmlHttp
function showProd(str)
{
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  }
var url="dispprod.php";
url=url+"?pro="+str;
//alert(url);
xmlHttp.onreadystatechange=stateChanged;
xmlHttp.open("POST",url,true);
xmlHttp.send(null);
}
function stateChanged()
{
if (xmlHttp.readyState==4)
{
document.getElementById("txtHint").innerHTML="";
document.getElementById("txtHint").innerHTML=xmlHttp.responseText;
}
}
function GetXmlHttpObject()
{
var xmlHttp=null;
try
  {
  // Firefox, Opera 8.0+, Safari
  xmlHttp=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
return xmlHttp;
}
</script>
<script language="javascript">
	<?php 
	$brand=mysql_query("select * from brand_mst where Is_Active=1 order by Brand_Id");
	$rows1=mysql_affected_rows();
	while($n1=mysql_fetch_array($brand))
	{  ?>
	var flag<?php echo $n1['Brand_Id']; ?>=false;
	function selectme_<?php echo $n1['Brand_Id']; ?>(str<?php echo $n1['Brand_Id']; ?>)
	{ 
	//alert(flag<?php echo $n1['Brand_Id']; ?>);
	if(flag<?php echo $n1['Brand_Id']; ?>==false) { flag<?php echo $n1['Brand_Id']; ?>=true; } else { flag<?php echo $n1['Brand_Id']; ?>=false;}
	
		<?php if(mysql_num_rows(mysql_query("select * from prod_mst where Is_Active=1 and Brand_Id='".$n1['Brand_Id']."' order by Prod_Id"))>=1)
		{
				?> 
	//alert(str);
	//alert(document.getElementById('chkbox_<?php echo $n1['Brand_Id'] ?>').value);
	if(document.getElementById('chkbox_<?php echo $n1['Brand_Id'] ?>').value==str<?php echo $n1['Brand_Id']; ?>)
	{ 
		<?php  
		$br=mysql_query("select * from prod_mst where Is_Active=1 and Brand_Id='".$n1['Brand_Id']."' order by Prod_Id");
		$rows=mysql_affected_rows();
		while($n=mysql_fetch_array($br))
		{
		?>
		document.getElementById('chkboxprod_<?php echo $n['Prod_Id'] ?>').checked=flag<?php echo $n1['Brand_Id']; ?>;
		<?php } ?>
		
	}
	<?php } ?>
	}
	<?php } ?>

</script>
<script language="javascript">
function validation()
{
	var flag=0
	var msg
	msg="Please Enter the folllowing Values "
	msg=msg+ "\n" + "--------------------------------------------"
	if(document.getElementById('offer').value=='')
	{
		flag=1;
		msg=msg + "\n" + "Please enter gift detail you want to apply"
	}
	if (flag==1)
	{
		alert(msg)
		return false;
	}
	else
	{
		return true;		
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
#preview{
	position:absolute;
	padding:2px;
	display:none;
	color:#fff;
	}
	img{border:none;}
	pre{
	display:block;
	font:100% "Courier New", Courier, monospace;
	padding:10px;
	border:1px solid #bae2f0;
	background:#e3f4f9;	
	margin:.5em 0;
	overflow:auto;
	width:800px;
}
-->
</style></head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="125" align="left" valign="top" bgcolor="#FFFFFF"><?php include('header.php'); ?>
        </td>
      </tr>
      <tr>
        <td height="2" bgcolor="#000000"></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><?php include('menu.php'); ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black"><a href="offer.php">Gift Details</a></td>
            </tr>
          <tr>
            <td>
            <?php if($_REQUEST['eid']=='') { ?>
            <form name="frmoffer"  method="post" action="offer_process.php" enctype="multipart/form-data" onsubmit="return validation();">
            <?php } else { ?>
            <form name="frmoffer"  method="post" action="offer_process.php?is_edit=1" enctype="multipart/form-data" onsubmit="return validation();"> 
            <input type="hidden" name="txtid" value="<?php echo $k['OfferId']; ?>"  />
            <?php } ?>
            <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
            
              <tr>
                <td width="300" align="right" class="normal_fonts9">Gift Detail</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9"><input name="offer" type="text" class="normal_fonts9" id="offer" size="40" value="<?php echo $k['Offer']; ?>" /></td>
              </tr>
              
              <tr>
                <td width="300" align="right" bgcolor="#f3f3f3" class="normal_fonts9">Image</td>
                <td width="10" align="center" bgcolor="#f3f3f3" class="normal_fonts9">:</td>
                <td bgcolor="#f3f3f3" class="normal_fonts9">
                  <input name="image" id="image" type="file" />
                  <input name="hidden" type="hidden" value="1" />
                  <input type="hidden" name="existing_file_value" value="<?php echo $k['Is_Image']; ?>" />
                  
                  </td>
              </tr>
              <tr>
                <td width="300" align="right" bgcolor="#FFFFFF" class="normal_fonts9">Is Active</td>
                <td width="10" align="center" bgcolor="#FFFFFF" class="normal_fonts9">:</td>
                <td bgcolor="#FFFFFF" class="normal_fonts9">
                <label>
                    <input type="radio" name="active" value="1" id="active_0" <?php if($k['Is_Active']=='1'){  ?> checked="checked" <?php } ?>  checked="checked"/>
                    Active</label>
                  <label>
                    <input type="radio" name="active" value="0" id="active_1" <?php if($k['Is_Active']=='0'){  ?> checked="checked" <?php } ?> />
                    InActive</label>

                </td>
              </tr>
              <tr>
                <td width="300" align="right" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">Description</td>
                <td width="10" align="center" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">:</td>
                <td bgcolor="#f3f3f3" class="normal_fonts9"><textarea name="descr" id="descr" cols="45" rows="5"><?php echo $k['Description']; ?></textarea></td>
              </tr>
              <tr>
                <td align="right" valign="top" bgcolor="#FFFFFF" class="normal_fonts9">Gift  Apply to  Product</td>
                <td align="center" valign="top" bgcolor="#FFFFFF" class="normal_fonts9">:</td>
                <td bgcolor="#FFFFFF" class="normal_fonts9">
                <table width="100%" border="0" cellspacing="0" cellpadding="3">
                <?php 
				$brand=mysql_query("select * from brand_mst where Is_Active=1 order by Brand_Id");
				$rows1=mysql_affected_rows();
				$count1=1;
				while($n1=mysql_fetch_array($brand))
				{ 
				if(mysql_num_rows(mysql_query("select * from prod_mst where Is_Active=1 and Brand_Id='".$n1['Brand_Id']."' order by Prod_Id"))>=1)
				{
				?> 
                
                  <tr>
                    <td height="25" align="right" valign="top"><input type="checkbox" name="chkbob" id="chkbox_<?php echo $n1['Brand_Id']; ?>" value="<?php echo $n1['Brand_Id']; ?>" onclick="selectme_<?php echo $n1['Brand_Id']; ?>(this.value);"  /></td>
                    <td colspan="5" align="left" valign="middle"><strong>Select All   <?php echo $n1['Name']; ?> Products</strong></td>
                  </tr>
                  <tr>
                     <td colspan="6" style="border-bottom:1px dotted;"></td>
                   </tr> 
                    <tr>
                     <td colspan="6"></td>
                   </tr> 
                  <?php } ?>
                  <tr>
                  <?php  
				$br=mysql_query("select * from prod_mst where Is_Active=1 and Brand_Id='".$n1['Brand_Id']."' order by Prod_Id");
				$rows=mysql_affected_rows();
				$count=1;
				while($n=mysql_fetch_array($br))
				{
					$imqry=mysql_query("select * from prod_img where Prod_Id='".$n['Prod_Id']."' order by Disp_Order limit 1");
					$im=mysql_fetch_array($imqry);
				?>
                    <td width="30" align="right" valign="top">&nbsp;<input type="checkbox" name="prod[]" id="chkboxprod_<?php echo $n['Prod_Id']; ?>" value="<?php echo $n['Prod_Id']; ?>" <?php if($k['OfferId']==$n['Offer_Id']) { ?> checked="checked" <?php } ?> /></td>
                    <td align="left" valign="middle"><a href="../product/<?php echo $im['Is_Image']; ?>" class="preview"><?php echo $n['Prod_Name']; ?></a></td>
                   <?php if($count%3==0) { ?> 
                   <tr><td colspan="2" height="5"></td></tr>
                   <?php } ?>
                <?php $count++; }  ?>    
                 	<tr><td colspan="2" height="5"></td></tr>
                   <?php } ?>
                </tr>
                  <tr>
                     <td colspan="6">&nbsp;</td>
                   </tr>
                </table>
                </td>
              </tr>
              <tr>
                <td width="300" align="right" bgcolor="#FFFFFF" class="normal_fonts9">&nbsp;</td>
                <td width="10" align="center" bgcolor="#FFFFFF" class="normal_fonts9">&nbsp;</td>
                <td bgcolor="#FFFFFF" class="normal_fonts9"><input name="button4" type="submit" class="normal_fonts12_black" id="button4" style="width:80px; height:30px" value="Submit" /></td>
              </tr>
              <tr>
                <td height="10" colspan="3" align="right" class="normal_fonts9"></td>
                </tr>
            </table>
            </form>
            </td>
          </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>
