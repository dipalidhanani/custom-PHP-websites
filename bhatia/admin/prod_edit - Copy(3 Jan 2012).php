<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	$user=mysql_query("select * from prod_mst where Prod_Id='".$_REQUEST['eid']."'");
	$k=mysql_fetch_array($user);
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ADMIN_TITLE; ?></title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/menu_style.css" type="text/css" />
<script src="calender/js/format1.js"></script>
<script src="calender/js/format.js"></script>
<link rel="stylesheet" type="text/css" href="calender/css/format.css" />
<link rel="stylesheet" type="text/css" href="calender/css/border-radius.css" />
<link rel="stylesheet" type="text/css" href="calender/steel/steel.css" />
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
<script language="JavaScript">
 var count=<?php echo count($cntype)==0?"1":count($cntype);?>;
				  function addcontact()
				  {
				  	count=count+1;
					var ldiv=document.getElementById("test"+count);
					ldiv.style.display="block";
					if(count==15)
					{
						var objbutton=document.getElementById("addtestbutton");
						objbutton.style.display="none";						
					}
				  } 
</script>  
<script language="javascript">
var xmlHttp
function showOffer(str)
{
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  }
var url="selectoffer.php";
url=url+"?offer="+str+"&price="+document.getElementById('mrp').value;
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
document.getElementById('fprice').focus();
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
function validation()
{
	var flag=0
	var msg
	msg="Please Enter the folllowing Values "
	msg=msg+ "\n" + "---------------------------------------------"
	if(document.getElementById('brand').value=='0')
	{
		flag=1;
		msg=msg + "\n" + "Please select brand"
	}
	if(document.getElementById('pname').value=='')
	{
		flag=1;
		msg=msg + "\n" + "Please enter product name"
	}
	if(document.getElementById('pcode').value=='')
	{
		flag=1;
		msg=msg + "\n" + "please enter product code"
	}
	if(document.getElementById('color').value=='')
	{
		flag=1;
		msg=msg + "\n" + "please enter available color"
	}
	if(document.getElementById('dillar').value=='')
	{
		flag=1;
		msg=msg + "\n" + "please enter dillar price"
	}
	if(document.getElementById('mrp').value=='')
	{
		flag=1;
		msg=msg + "\n" + "please enter MRP Price"
	}
		if(document.getElementById('fprice').value=='')
	{
		flag=1;
		msg=msg + "\n" + "please enter Bhatia Price"
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
</head>
<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="125" align="left" valign="top" bgcolor="#FFFFFF"><?php include('header.php'); ?></td>
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
            <td class="normal_fonts14_black"><a href="prod.php">Product  Details</a></td>
            </tr>
          <tr>
            <td>
            <?php if($_REQUEST['eid']=='') { ?>
            <form name="frmuseradd" method="post" action="prod_process.php" enctype="multipart/form-data" onsubmit="return validation();">
            <?php } else { ?>
            <form name="frmuseradd" method="post" action="prod_process.php?is_edit=1" enctype="multipart/form-data" onsubmit="return validation();">
            <?php } ?>
            <input type="hidden" name="txtid" value="<?php echo $_REQUEST['eid']; ?>" />
            <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
              <tr>
                <td width="300" align="right" valign="top" class="normal_fonts9"> Brand Name</td>
                <td width="10" align="center" valign="top" class="normal_fonts9">:</td>
                <td class="normal_fonts9">
                <?php
				if($_REQUEST['bid']=='') { ?>
                <select name="brand" id="brand">
                <option value="0">Select Brand</option>
                <?php 
				$query="select * from brand_mst where Is_Active=1 order by Disp_Order";
				$data=mysql_query($query);
				while($j=mysql_fetch_array($data)) {?>
                <option value="<?php echo $j['Brand_Id']; ?>" <?php if($k['Brand_Id']==$j['Brand_Id']) { ?> selected="selected" <?php } ?>><?php echo $j['Name']; ?></option>
                <?php } ?>
                </select>
                <?php } else {  ?>
                <select name="brand" id="brand">
                <option value="0">Select Brand</option>
                <?php 
				$query="select * from brand_mst where Is_Active=1 order by Disp_Order";
				$data=mysql_query($query);
				while($j=mysql_fetch_array($data)) {?>
                <option value="<?php echo $j['Brand_Id']; ?>" <?php if($_REQUEST['bid']==$j['Brand_Id']) { ?> selected="selected" <?php } ?>><?php echo $j['Name']; ?></option>
                <?php } ?>
                </select>
                <?php } ?>
                </td>
              </tr>
              <tr>
                <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Product Name</td>
                <td align="center" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9"><input name="pname" type="text" class="normal_fonts9" id="pname" size="40" value="<?php echo $k['Prod_Name']; ?>" /></td>
              </tr>
              <tr>
                <td align="right" valign="top" class="normal_fonts9">Product Code</td>
                <td align="center" valign="top" class="normal_fonts9">:</td>
                <td class="normal_fonts9"><input name="pcode" type="text" class="normal_fonts9" id="pcode" value="<?php echo $k['Prod_Code']; ?>" />&nbsp;&nbsp;</td>
              </tr>
              <tr>
                <td align="right" bgcolor="#f3f3f3" class="normal_fonts9">Model Type</td>
                <td align="center" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">:</td>
                <td bgcolor="#f3f3f3" class="normal_fonts9"><label>
                  <input type="radio" name="model" value="GSM" id="gsm" <?php if($k['Tech_Type']=='GSM'){  ?> checked="checked" <?php } ?>  checked="checked"/>
                  GSM</label>
                  <label>
                    <input type="radio" name="model" value="CDMA" id="cdma" <?php if($k['Tech_Type']=='CDMA'){  ?> checked="checked" <?php } ?> />
                    CDMA</label>
                    <label>
                    <input type="radio" name="model" value="BOTH" id="both" <?php if($k['Tech_Type']=='BOTH'){  ?> checked="checked" <?php } ?> />
                    BOTH</label>
                    </td>
              </tr>
              <tr>
                <td align="right" valign="top" bgcolor="#FFFFFF" class="normal_fonts9">Available Colour(s)</td>
                <td align="center" valign="top" bgcolor="#FFFFFF" class="normal_fonts9">:</td>
                <td bgcolor="#FFFFFF" class="normal_fonts9"><input name="color" type="text" class="normal_fonts9" id="color"
                <?php if($_REQUEST['eid']!='') { ?>
                 value="<?php $col_qry=mysql_query("select * from color_mst where Prod_Id='".$_REQUEST['eid']."'");
		$rows=mysql_affected_rows();		
		$count=1;
		while($color=mysql_fetch_array($col_qry))
		{
			echo $color['Color'];
			if($count!=$rows)
			{
				echo ",";
			}
			$count++;
		}
				?>" 
                <?php } else { ?>
                value=""
                <?php }?>			
                 size="40" /> 
                  (Colour name Seperated by Comma)</td>
              </tr>
              <tr>
                <td align="right" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">Dealer Price</td>
                <td align="center" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">:</td>
                <td bgcolor="#f3f3f3" class="normal_fonts9"><input name="dillar" type="text" class="normal_fonts9" id="dillar" value="<?php echo $k['Dillar_Price']; ?>" size="15"  style="text-align:right"/></td>
              </tr>
              <tr>
                <td align="right" valign="top" bgcolor="#FFFFFF" class="normal_fonts9">MRP Price</td>
                <td align="center" valign="top" bgcolor="#FFFFFF" class="normal_fonts9">:</td>
                <td bgcolor="#FFFFFF" class="normal_fonts9"><input name="mrp" type="text" class="normal_fonts9" id="mrp" value="<?php echo $k['MRP_Price']; ?>" size="15"  style="text-align:right"/></td>
              </tr>
              <!--<tr>
                <td align="right" valign="top" bgcolor="#FFFFFF" class="normal_fonts9">Offer Amount</td>
                <td align="center" valign="top" bgcolor="#FFFFFF" class="normal_fonts9">:</td>
                <td bgcolor="#FFFFFF" class="normal_fonts9">
                 <div  id="txtHint">
                <input type="text" name="oamt" value="0.00" size="15" style="text-align:right"  class="normal_fonts9" readonly="readonly" />
                 </div>
                </td></tr>-->
              <tr>
                <td align="right" bgcolor="#f3f3f3" class="normal_fonts9">BHATIA Price</td>
                <td align="center" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">:</td>
                <td bgcolor="#f3f3f3" class="normal_fonts9"><input name="fprice" type="text" class="normal_fonts9" id="fprice" value="<?php echo $k['Final_Price']; ?>" size="15" style="text-align:right" /></td>
              </tr>
              <tr>
                <td align="right" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">Apply Gift</td>
                <td align="center" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">:</td>
                <td bgcolor="#f3f3f3" class="normal_fonts9"><select name="offer" id="offer" onchange="showOffer(this.value);">
                <option value="">Select One</option>
                <?php
				$offer=mysql_query("select * from offer where IsActive=1 order by OfferId");
				while($o=mysql_fetch_array($offer))
				{
				?>
                <option value="<?php echo $o['OfferId']; ?>" <?php if($o['OfferId']==$k['Offer_Id']) { ?> selected="selected" <?php } ?>><?php echo $o['Offer']; ?></option>
                <?php } ?>
                </select></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#FFFFFF" class="normal_fonts9">Is Active Product</td>
                <td align="center" valign="top" bgcolor="#FFFFFF" class="normal_fonts9">:</td>
                <td bgcolor="#FFFFFF" class="normal_fonts9"><label>
                  <input type="radio" name="active" value="1" id="active_0" <?php if($k['Is_Active']=='1'){  ?> checked="checked" <?php } ?>  checked="checked"/>
                  Active</label>
                  <label>
                    <input type="radio" name="active" value="0" id="active_1" <?php if($k['Is_Active']=='0'){  ?> checked="checked" <?php } ?> />
                    InActive</label></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#f3f3f3" class="normal_fonts9">Display Order</td>
                <td align="center" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">:</td>
                <td bgcolor="#f3f3f3" class="normal_fonts9"><input name="order" type="text" class="normal_fonts9" id="order" value="<?php echo $k['Disp_Order']; ?>" size="5" /></td>
              </tr>
              <tr>
                <td align="right" valign="top" bgcolor="#FFFFFF" class="normal_fonts9">Description</td>
                <td align="center" valign="top" bgcolor="#FFFFFF" class="normal_fonts9">:</td>
                <td align="left" valign="top" bgcolor="#FFFFFF" class="normal_fonts9"><textarea name="descr" id="descr" cols="50" rows="5"><?php echo $k['Description']; ?></textarea></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#f3f3f3" class="normal_fonts9">Is Tablet </td>
                <td align="center" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">:</td>
                <td bgcolor="#f3f3f3" class="normal_fonts9"><label>
                  <input type="radio" name="tablet" value="1" id="tablet_0" <?php if($k['Is_Tablet']=='1'){  ?> checked="checked" <?php } ?> />
                  Yes</label>
                  <label>
                    <input type="radio" name="tablet" value="0" id="tablet_1" <?php if($k['Is_Tablet']=='0'){  ?> checked="checked" <?php } ?> checked="checked" />
                    No</label></td>
              </tr>
              <tr>
                <td align="left" bgcolor="#FFFFFF" class="normal_fonts14_black">Product Specification</td>
                <td align="center" valign="top" bgcolor="#FFFFFF" class="normal_fonts9">&nbsp;</td>
                <td bgcolor="#FFFFFF" class="normal_fonts9">&nbsp;</td>
              </tr>
              <?php 
			  $qry=mysql_query("select * from prod_title group by Prod_Desc_Cat_Id");
			  $main=1;
			  while($cat=mysql_fetch_array($qry))
			  {
			  ?>
              <tr>
                <td align="right" bgcolor="#CCCCCC" class="normal_fonts12_black">
				<?php
			$cat_mst=mysql_query("select * from prod_desc_cat where Prod_Desc_Cat_Id='".$cat['Prod_Desc_Cat_Id']."' order by Disp_Order");
				$pcat=mysql_fetch_array($cat_mst);
				echo $pcat['Category'];
				?></td>
                <td align="center" valign="top" bgcolor="#CCCCCC" class="normal_fonts9">&nbsp;</td>
                <td bgcolor="#CCCCCC" class="normal_fonts9">&nbsp;</td>
              </tr>
              <?php 
		  	$an=mysql_query("select * from prod_title where Prod_Desc_Cat_Id='".$cat['Prod_Desc_Cat_Id']."' order by Disp_Order") or die(mysql_error());
		  	$cnt=1;
			$x=1;
		  	if(mysql_affected_rows()>0){
		 	 while($a=mysql_fetch_array($an))
		  	{
				if($x%2==0)
				{
					$color='#FFFFFF';
				}
				else
				{
					$color='#f3f3f3';
				}
				
				$countqry="select * from prod_desc where Title_Id='".$a['Title_Id']."' and Prod_Id='".$_REQUEST['eid']."' order by Prod_Desc_Id";
					$query5=mysql_query($countqry);
					while($rr=mysql_fetch_array($query5))
					{ 
				?>  	
            
              <tr bgcolor="<?php echo $color; ?>">
                <td align="right" class="normal_fonts9"><?php echo $a['Title']; ?></td>
                <td align="center" valign="top" class="normal_fonts9">:</td>
                <td class="normal_fonts9"><input name="desc_<?php echo $x."_".$main; ?>" type="text" class="normal_fonts9" id="desc" value="<?php echo $rr['Desc'];   ?>" size="50" />&nbsp;&nbsp;<?php echo $a['Description']; ?></td>
              </tr>
              <?php $x++; }} $main++;} } ?>
              <tr>
                <td align="right" class="normal_fonts9">&nbsp;</td>
                <td align="center" class="normal_fonts9">&nbsp;</td>
                <td align="left" valign="top" class="normal_fonts9"><input name="button4" type="submit" class="normal_fonts12_black" id="button4" style="width:80px; height:30px" value="Submit" /></td>
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
