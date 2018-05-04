<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	$user=mysql_query("select * from user_mst where Is_Active=1 and User_Id='".$_REQUEST['eid']."'");
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
	if(document.getElementById('lname').value=='')
	{
		flag=1;
		msg=msg + "\n" + "please enter last name"
	}
		if(document.getElementById('bdate').value=='0')
	{
		flag=1;
		msg=msg + "\n" + "please select day"
	}
	if(document.getElementById('bmonth').value=='0')
	{
		flag=1;
		msg=msg + "\n" + "please select month"
	}
	if(document.getElementById('byear').value=='0')
	{
		flag=1;
		msg=msg + "\n" + "please select year"
	}
	if(document.getElementById('add1').value=='')
	{
		flag=1;
		msg=msg + "\n" + "please enter an address"
	}
	if(document.getElementById('countryid').value=='0')
	{
		flag=1;
		msg=msg + "\n" + "please select country"
	}
	if(document.getElementById('city').value=='0')
	{
		flag=1;
		msg=msg + "\n" + "please select city"
	}
	if(document.getElementById('area').value=='')
	{
		flag=1;
		msg=msg + "\n" + "please enter an area"
	}
		if(document.getElementById('zipcode').value=='')
	{
		flag=1;
		msg=msg + "\n" + "please enter zipcode"
	}
	if(document.getElementById('email').value=='')
	{
		flag=1;
		msg=msg + "\n" + "please enter an email address"
	}
	if(document.getElementById('mobile').value=='')
	{
		flag=1;
		msg=msg + "\n" + "Please mobile no"
	}
	if(document.getElementById('username').value=='')
	{
		flag=1;
		msg=msg + "\n" + "please enter an username"
	}
	if(document.getElementById('password').value=='')
	{
		flag=1;
		msg=msg + "\n" + "please enter password"
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
function validate_email()
{
var x=document.getElementById('email').value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }
}

</script>

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
var xmlHttp
function checkuser()
{
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  }
var url="checkuservalid.php";
url=url+"?user="+document.getElementById('username').value;
//alert(url);
xmlHttp.onreadystatechange=UsernameChanged;
xmlHttp.open("POST",url,true);
xmlHttp.send(null);
}
function UsernameChanged()
{
if (xmlHttp.readyState==4)
{
document.getElementById("txtHintuser").innerHTML="";
document.getElementById("txtHintuser").innerHTML=xmlHttp.responseText;
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
            <td class="normal_fonts14_black"><a href="user.php">User  Details</a></td>
            </tr>
          <tr>
            <td>
            <?php if($_REQUEST['eid']=='') { ?>
            <form name="frmuseradd" method="post" action="user_process.php" onsubmit="return validation();">
            <?php } else { ?>
            <form name="frmuseradd" method="post" action="user_process.php?is_edit=1" onsubmit="return validation();">
            <?php } ?>
            <input type="hidden" name="txtid" value="<?php echo $_REQUEST['eid']; ?>" />
            <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
              <tr>
                <td width="300" align="right" valign="top" class="normal_fonts9"> Name</td>
                <td width="10" align="center" valign="top" class="normal_fonts9">:</td>
                <td class="normal_fonts9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="150" align="left" valign="middle"><input name="fname" type="text" class="normal_fonts9" id="fname"  value="<?php echo $k['First_Name']; ?>"/></td>
                    <td width="150" align="left" valign="middle"><input name="mname" type="text" class="normal_fonts9" id="mname" value="<?php echo $k['Middle_Name']; ?>" /></td>
                    <td align="left" valign="middle"><input name="lname" type="text" class="normal_fonts9" id="lname"  value="<?php echo $k['Last_Name']; ?>"/></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td align="right" valign="top" class="normal_fonts9">&nbsp;</td>
                <td align="center" valign="top" class="normal_fonts9">&nbsp;</td>
                <td class="normal_fonts9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="150" align="left" valign="middle">(First Name)</td>
                    <td width="150" align="left" valign="middle">(Middle Name)</td>
                    <td align="left" valign="middle">(Last Name)</td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Gender</td>
                <td align="center" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9">
                    <label>
                      <input name="gender" type="radio" id="gender_0" value="Male" <?php if($k['Gender']=='Male') {  ?> checked="checked" <?php } ?> checked="checked" />
                      Male</label>
                    <label>
                      <input type="radio" name="gender" value="Female" id="gender_1" <?php if($k['Gender']=='Female') {  ?> checked="checked" <?php } ?> />
                      Female</label>
                </td>
              </tr>
              <tr>
                <td align="right" valign="top" class="normal_fonts9">Birthdate</td>
                <td align="center" valign="top" class="normal_fonts9">:</td>
                <td>
                <?php
				$dx=explode('/',$k['Birthdate']);
				$bd=$dx[0];
				$bm=$dx[1];
				$by=$dx[2];
				?>
                  <select name="bdate" id="bdate">
                    <option value="0">DD</option>
                    <?php for($i=1;$i<=31;$i++){ ?>
                    <option value="<?php echo $i; ?>" <?php if($bd==$i){ ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
                    <?php } ?>
                  </select>
                  <select name="bmonth" id="bmonth">
                    <option value="0" >MM</option>
                    <?php for($j=1;$j<=12;$j++){ ?>
                    <option value="<?php echo $j; ?>"  <?php if($bm==$j){ ?> selected="selected" <?php } ?> ><?php echo $j; ?></option>
                    <?php } ?>
                  </select>
                  <select name="byear" id="byear">
                    <option value="0">YYYY</option>
                    <?php
					$yr=date('Y');
					$min=1970;
					for($kk=$yr-1;$kk>=$min;$kk--){ ?>
                    <option value="<?php echo $kk; ?>" <?php if($by==$kk){ ?> selected="selected" <?php } ?> ><?php echo $kk; ?></option>
                    <?php } ?>
                  </select></td>
              </tr>
              <tr>
                <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Email Address</td>
                <td align="center" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9"><input name="email" type="text" class="normal_fonts9" id="email" size="40" value="<?php echo $k['Email_Address']; ?>" /></td>
              </tr>
              <tr>
                <td align="right" valign="top" class="normal_fonts9">Username</td>
                <td align="center" valign="top" class="normal_fonts9">:</td>
                <td class="normal_fonts9"><input name="username" type="text" class="normal_fonts9" id="username" value="<?php echo $k['User_Name']; ?>" />&nbsp;&nbsp;<span class="normal_fonts12" id="usercheck" style="cursor:pointer" onclick="checkuser();">Check Username</span>
                <div id="txtHintuser" class="normal_fonts12">
                <input type="hidden" name="msg" id="msg" value="<?php echo $user; ?>" />
                </div>
                </td>
              </tr>
              <tr>
                <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Password</td>
                <td align="center" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9"><input name="password" type="text" class="normal_fonts9" id="password"  value="<?php echo base64_decode($k['Password']); ?>"/></td>
              </tr>
              <tr>
                <td align="right" valign="top" class="normal_fonts9">Current Address</td>
                <td align="center" valign="top" class="normal_fonts9">:</td>
                <td class="normal_fonts9"><textarea name="add1" cols="45" rows="5" class="normal_fonts9" id="add1"><?php echo $k['Address1']; ?></textarea></td>
              </tr>
              <tr>
                <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Permanent Address</td>
                <td align="center" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9"><textarea name="add2" cols="45" rows="5" class="normal_fonts9" id="add2"><?php echo $k['Address2']; ?></textarea></td>
              </tr>
              <tr>
                <td align="right" valign="top" class="normal_fonts9">Country </td>
                <td align="center" valign="top" class="normal_fonts9">:</td>
                <td class="normal_fonts9">
                <select name="countryid" class="normal_fonts9" id="countryid">
				  <option value="1">India</option>
 				 </select>
                </td>
              </tr>
              <tr>
                <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">State</td>
                <td align="center" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9">
  <select name="state" class="normal_fonts9" id="state" onChange="showState(this.value)">
  <option value="">Select One</option>
  <?php $st=$db->dbselect("select * from state ORDER BY Name");
  while($disp=mysql_fetch_array($st))
  {
  ?>
  <option value="<?php echo $disp['State_Id']; ?>"<?php if($k['State_Id']==$disp["State_Id"]){ ?> selected="selected" <?php }  ?>><?php echo $disp['Name']; ?></option>
<?php } ?>	
  </select>
 
                </td>
              </tr>
              <tr>
                <td align="right" valign="top" class="normal_fonts9">City</td>
                <td align="center" valign="top" class="normal_fonts9">:</td>
                <td class="normal_fonts9">
                <div id="txtHint">
                <select name="city" class="normal_fonts9" id="city">
                <option value="0">Select One</option>
                              <?php $city_data=mysql_query("SELECT * FROM city_mst ORDER BY city_name");
							  while($ct=mysql_fetch_array($city_data))
							  {
							  ?>
                              <option value="<?php echo $ct['city_id']; ?>" <?php if($ct['city_id']==$k['City']) { ?> selected="selected" <?php } ?>><?php echo $ct['city_name']; ?></option>
                              <?php } ?>
                              </select>
                </div>
                </td>
              </tr>
              <tr>
                <td align="right" bgcolor="#F3F3F3" class="normal_fonts9">Area</td>
                <td align="center" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9"><input name="area" type="text" class="normal_fonts9" id="area" value="<?php echo $k['Area']; ?>" /></td>
              </tr>
              <tr>
                <td align="right" class="normal_fonts9">Zipcode</td>
                <td align="center" valign="top" class="normal_fonts9">:</td>
                <td class="normal_fonts9"><input name="zipcode" type="text" class="normal_fonts9" id="zipcode" value="<?php echo $k['Pincode']; ?>" /></td>
              </tr>
              <tr>
                <td align="right" class="normal_fonts9">Phone No.</td>
                <td align="center" valign="top" class="normal_fonts9">:</td>
                <td class="normal_fonts9"><input name="phone" type="text" class="normal_fonts9" id="phone" value="<?php echo $k['Phone']; ?>" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#F3F3F3" class="normal_fonts9">Mobile No.</td>
                <td align="center" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9"><input name="mobile" type="text" class="normal_fonts9" id="mobile" value="<?php echo $k['Mobile']; ?>" /></td>
              </tr>
              <tr>
                <td height="10" colspan="3" align="right" class="normal_fonts9"></td>
                </tr>
              <tr>
                <td align="right" class="normal_fonts9">&nbsp;</td>
                <td align="center" class="normal_fonts9">&nbsp;</td>
                <td align="left" valign="top" class="normal_fonts9"><input name="button4" type="submit" class="normal_fonts12_black" id="button4" style="width:80px; height:30px" value="Submit" onclick="return validate_email();" /></td>
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
