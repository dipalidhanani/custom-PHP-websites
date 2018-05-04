<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	$user=mysql_query("select * from franchise_mst where Is_Active=1 and Franchise_Id='".$_REQUEST['eid']."'");
	$k=mysql_fetch_array($user);
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ADMIN_TITLE; ?></title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/menu_style.css" type="text/css" />
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
</head>
<script language="javascript">
var xmlHttp
function showState(str)
{
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  }
var url="statedata.php";
url=url+"?q="+str;
//url=url+"&sid="+Math.random();
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
function validation()
{
	var flag=0
	var msg
	msg="Please Enter the folllowing Values "
	msg=msg+ "\n" + "--------------------------------------------"
	if(document.getElementById('fname').value=='')
	{
		flag=1;
		msg=msg + "\n" + "Please enter first name"
	}
	if(document.getElementById('add1').value=='')
	{
		flag=1;
		msg=msg + "\n" + "please enter an address"
	}
	if(document.getElementById('city').value=='')
	{
		flag=1;
		msg=msg + "\n" + "please enter city"
	}
	if(document.getElementById('area').value=='')
	{
		flag=1;
		msg=msg + "\n" + "please enter an area"
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
/*function validate_email()
{
var x=document.getElementById('email').value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }
}*/

</script>

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
            <td class="normal_fonts14_black"><a href="franchise.php">Franchisee  Details</a></td>
            </tr>
          <tr>
            <td>
            <?php if($_REQUEST['eid']=='')
			{
				$url_to='franchise_process.php';
			}
			else
			{
				$url_to='franchise_process.php?is_edit=1';
			}
			?>
            <form name="frmuseradd" method="post" action="<?php echo $url_to; ?>" enctype="multipart/form-data" onsubmit="return validation();">
            <input type="hidden" name="txtid" value="<?php echo $_REQUEST['eid']; ?>" />
            <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
              <tr>
                <td width="300" align="right" valign="top" class="normal_fonts9"> Name</td>
                <td width="10" align="center" valign="top" class="normal_fonts9">:</td>
                <td class="normal_fonts9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="150" align="left" valign="middle"><input name="fname" type="text" class="normal_fonts9" id="fname"  value="<?php echo $k['Name']; ?>" size="40"/></td>
                    <td width="150" align="left" valign="middle">&nbsp;</td>
                    <td align="left" valign="middle">&nbsp;</td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Branch</td>
                <td align="center" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9"><input name="barnch" type="text" class="normal_fonts9" id="barnch" value="<?php echo $k['Branch']; ?>" /></td>
              </tr>
              <tr>
                <td align="right" class="normal_fonts9">Demo No.</td>
                <td align="center" valign="top" class="normal_fonts9">:</td>
                <td class="normal_fonts9"><input name="demo_no" type="text" class="normal_fonts9" id="demo_no" value="<?php echo $k['Demo_No']; ?>" /></td>
              </tr>
              <tr>
                <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Email Address</td>
                <td align="center" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9"><input name="email" type="text" class="normal_fonts9" id="email" size="40" value="<?php echo $k['Email_Address']; ?>" /></td>
              </tr>
              <tr>
                <td align="right" valign="top" class="normal_fonts9">Current Address</td>
                <td align="center" valign="top" class="normal_fonts9">:</td>
                <td class="normal_fonts9"><textarea name="add1" cols="45" rows="5" class="normal_fonts9" id="add1"><?php echo $k['Address1']; ?></textarea></td>
              </tr>
              <!--<tr>
                <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Permanent Address</td>
                <td align="center" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9"><textarea name="add2" cols="45" rows="5" class="normal_fonts9" id="add2"><?php echo $k['Address2']; ?></textarea></td>
              </tr>-->
              <!--<tr>
                <td align="right" valign="top" class="normal_fonts9">Country </td>
                <td align="center" valign="top" class="normal_fonts9">:</td>
                <td class="normal_fonts9">
                <select name="countryid" id="countryid" onChange="showState(this.value)">
				  <option value="0" >Select One</option>
				 <?php	
					 $recordsetcountry = mysql_query("select * from country order by Name");
					 while($rowcountry = mysql_fetch_array($recordsetcountry,MYSQL_ASSOC))
					 {
					 ?>
    <option value="<?php echo $rowcountry["Country_Id"]; ?>" <?php if($k['Country_Id']==$rowcountry["Country_Id"]){ ?> selected="selected" <?php }  ?>><?php print($rowcountry["Name"]); ?></option>
    <?php
					 }
					 ?>
  </select>
                </td>
              </tr>-->
              <!--<tr>
                <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">State</td>
                <td align="center" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9">
                <div id="txtHint">
  <select name="state" id="state">
  <option value="">Select One</option>
  <?php $st=$db->dbselect("select * from state where Country_Id='".$k['Country_Id']."'");
  while($disp=mysql_fetch_array($st))
  {
  ?>
  <option value="<?php echo $disp['State_Id']; ?>"<?php if($k['State_Id']==$disp["State_Id"]){ ?> selected="selected" <?php }  ?>><?php echo $disp['Name']; ?></option>
<?php } ?>	
  </select>
  </div>
                </td>
              </tr>-->
              <tr>
                <td align="right" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">City</td>
                <td align="center" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">:</td>
                <td bgcolor="#f3f3f3" class="normal_fonts9">
                <select name="city" class="normal_fonts9" id="city">
                <option value="0">Select One</option>
                              <?php $city_data=mysql_query("SELECT * FROM city_mst WHERE state_id=1 ORDER BY city_name");
							  while($ct=mysql_fetch_array($city_data))
							  {
							  ?>
                              <option value="<?php echo $ct['city_id']; ?>" <?php if($ct['city_id']==$k['City']) { ?> selected="selected" <?php } ?>><?php echo $ct['city_name']; ?></option>
                              <?php } ?>
                              </select>
                </td>
              </tr>
              <tr>
                <td align="right" bgcolor="#FFFFFF" class="normal_fonts9">Area</td>
                <td align="center" valign="top" bgcolor="#FFFFFF" class="normal_fonts9">:</td>
                <td bgcolor="#FFFFFF" class="normal_fonts9"><input name="area" type="text" class="normal_fonts9" id="area" value="<?php echo $k['Area']; ?>" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#f3f3f3" class="normal_fonts9">Zipcode</td>
                <td align="center" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">:</td>
                <td bgcolor="#f3f3f3" class="normal_fonts9"><input name="zipcode" type="text" class="normal_fonts9" id="zipcode" value="<?php echo $k['Pincode']; ?>" /></td>
              </tr>
              
              <tr>
                <td align="right" bgcolor="#FFFFFF" class="normal_fonts9">Mobile No.</td>
                <td align="center" valign="top" bgcolor="#FFFFFF" class="normal_fonts9">:</td>
                <td bgcolor="#FFFFFF" class="normal_fonts9"><input name="mobile" type="text" class="normal_fonts9" id="mobile" value="<?php echo $k['Mobile']; ?>" /></td>
              </tr>
              <tr>
                <td align="right" valign="middle" bgcolor="#F3F3F3" class="normal_fonts9">Is Image</td>
                <td align="center" valign="middle" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td valign="middle" bgcolor="#F3F3F3" class="normal_fonts9">
                <input name="image" type="file" class="normal_fonts9" id="image" />
			    <input name="hidden" type="hidden" value="1" />
			    <input type="hidden" name="existing_file_value" value="<?php echo $k['Is_Image']; ?>" />
                </td>
              </tr>
              <tr>
                <td align="right" bgcolor="#FFFFFF" class="normal_fonts9">Franchisee is</td>
                <td align="center" valign="top" bgcolor="#FFFFFF" class="normal_fonts9">:</td>
                <td bgcolor="#FFFFFF" class="normal_fonts9">
                <label>
                  <input type="radio" name="active" value="1" id="active_0" <?php if($k['Is_Active']=='1'){  ?> checked="checked" <?php } ?>  checked="checked" />
                  Active</label>
                  <label>
                    <input type="radio" name="active" value="0" id="active_1" <?php if($k['Is_Active']=='0'){  ?> checked="checked" <?php } ?> />
                    InActive</label>
                </td>
              </tr>
              <tr>
                <td align="right" bgcolor="#FFFFFF" class="normal_fonts9">Disply Order</td>
                <td align="center" valign="top" bgcolor="#FFFFFF" class="normal_fonts9">:</td>
                <td bgcolor="#FFFFFF" class="normal_fonts9"><input name="disp_order" type="text" class="normal_fonts9" id="disp_order" value="<?php echo $k['Disp_Order']; ?>" /></td>
              </tr>
              <tr>
                <td height="10" colspan="3" align="right" bgcolor="#FFFFFF" class="normal_fonts9"></td>
                </tr>
              <tr>
                <td align="right" bgcolor="#f3f3f3" class="normal_fonts9">&nbsp;</td>
                <td align="center" bgcolor="#f3f3f3" class="normal_fonts9">&nbsp;</td>
                <td align="left" valign="top" bgcolor="#f3f3f3" class="normal_fonts9"><input name="button4" type="submit" class="normal_fonts12_black" id="button4" style="width:80px; height:30px" value="Submit" onclick="return validate_email();" /></td>
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
