<?php session_start();
	require_once("../admin/config.inc.php");
	require_once("../admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	?>
<link href="css/css1.css" rel="stylesheet" type="text/css" />
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
document.getElementById('state').focus();
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
	if(document.getElementById('username').value=='')
	{
		alert('Please enter an username');
		document.getElementById('username').focus();
		return false;
		
	}
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
	if(document.getElementById('state').value=='0')
	{
		flag=1;
		msg=msg + "\n" + "please select state"
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
	if(document.getElementById('pass1').value=='')
	{
		flag=1;
		msg=msg + "\n" + "please enter password"
	}
	if(document.getElementById('pass2').value=='')
	{
		flag=1;
		msg=msg + "\n" + "please enter confirm password"
	}
	if(document.getElementById('code').value=='')
	{
		flag=1;
		msg=msg + "\n" + "please enter security code"
	}
	if(document.getElementById('term').checked==false)
	{
		flag=1;
		msg=msg + "\n" + "please check terms & condition"
	}
	if(document.getElementById('msg_user').value=='Username already taken')
	{
		flag=1;
		msg=msg + "\n" + "please enter valid username"
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
function validate_pass()
{
	if(document.getElementById('pass1').value!=document.getElementById('pass2').value)
	{
		alert('Password and confirm password must be same');
		document.getElementById('pass2').value='';
		document.getElementById('pass2').focus();
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

<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="5"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_01.jpg" width="5" height="41" /></td>
                        <td align="left" valign="top" background="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_02.jpg" style="background-repeat:repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="6" colspan="2" align="left" valign="middle"></td>
                            </tr>
                          <tr>
                            <td width="30" align="left" valign="middle"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/Arrow.png" width="24" height="24" /></td>
                            <td class="title">User Registartion</td>
                            </tr>
                          </table></td>
                        <td width="5"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_04.jpg" width="5" height="41" /></td>
                        </tr>
                      </table></td>
                    </tr>
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
                      <tr>
                        <td align="left" valign="middle" bgcolor="#FFFFFF">
                        <form name="frmuserreg" method="post" action="register_process.php" onsubmit="return validation();">
                        <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" class="title_10">
                          <!--<tr>
                            <td height="10" colspan="3" align="left" valign="top" bgcolor="#FFFFFF"></td>
                          </tr>-->
                          <?php if($_REQUEST['code']==1) { ?>
                          <tr>
                            <td height="10" colspan="3" align="center" valign="middle" bgcolor="#FFFFFF" class="err_msg_11">Please enter valid security code!!</td>
                          </tr>
                          <?php } ?>
                          <?php if($_REQUEST['user']=='yes') { ?>
                          <tr>
                            <td height="10" colspan="3" align="center" valign="middle" bgcolor="#FFFFFF" class="err_msg_11">Username already taken!!</td>
                          </tr>
                          <?php } ?>
                          <?php if($_REQUEST['mail']=='yes') { ?>
                          <tr>
                            <td height="10" colspan="3" align="center" valign="middle" bgcolor="#FFFFFF" class="err_msg_11">E-Mail address already taken!!</td>
                          </tr>
                          <?php } ?>
                          <tr>
                            <td colspan="3" align="right" valign="middle" bgcolor="#FFFFFF">* Required fields</td>
                          </tr>
                          <tr>
                            <td height="20" colspan="3" align="left" valign="top" bgcolor="#CCCCCC" class="title_10">&nbsp;Fill Personal Details</td>
                          </tr>
                          <tr>
                            <td width="200" align="right" valign="top">Name</td>
                            <td width="10" align="center" valign="top">:</td>
                            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="110" align="left" valign="middle"><input name="fname" type="text" class="title_10" id="fname" value="<?php echo $_SESSION['fname']; ?>" /></td>
                                <td width="110" align="left" valign="middle"><input name="mname" type="text" class="title_10" id="mname"  value="<?php echo $_SESSION['mname']; ?>" /></td>
                                <td width="110" align="left" valign="middle"><input name="lname" type="text" class="title_10" id="lname" value="<?php echo $_SESSION['lname']; ?>" /></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top" bgcolor="#f3f3f3">&nbsp;</td>
                            <td align="center" valign="top" bgcolor="#f3f3f3">&nbsp;</td>
                            <td align="left" valign="top" bgcolor="#f3f3f3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="110" align="left" valign="middle">(First Name) *</td>
                                <td width="110" align="left" valign="middle">(Middle Name) </td>
                                <td width="110" align="left" valign="middle">(Last Name) *</td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top">Birthdate</td>
                            <td align="center" valign="top">:</td>
                            <td align="left" valign="top" class="title_10"><select name="bdate" id="bdate">
                              <option value="0">DD</option>
                              <?php for($i=1;$i<=31;$i++){ ?>
                              <option value="<?php echo $i; ?>" <?php if($_SESSION['bdate']==$i){ ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
                              <?php } ?>
                            </select>
                              <select name="bmonth" id="bmonth">
                                <option value="0" >MM</option>
                                <?php for($j=1;$j<=12;$j++){ ?>
                                <option value="<?php echo $j; ?>"  <?php if($_SESSION['bmonth']==$j){ ?> selected="selected" <?php } ?> ><?php echo $j; ?></option>
                                <?php } ?>
                              </select>
                              <select name="byear" id="byear">
                                <option value="0">YYYY</option>
                                <?php
					$yr=date('Y');
					$min=1970;
					for($kk=$yr-1;$kk>=$min;$kk--){ ?>
                                <option value="<?php echo $kk; ?>" <?php if($_SESSION['byear']==$kk){ ?> selected="selected" <?php } ?> ><?php echo $kk; ?></option>
                                <?php } ?>
                            </select></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top" bgcolor="#f3f3f3">Gender</td>
                            <td align="center" valign="top" bgcolor="#f3f3f3">:</td>
                            <td align="left" valign="top" bgcolor="#f3f3f3"><span class="normal_fonts9">
                              <label>
                                <input name="gender" type="radio" id="gender_0" value="Male" checked="checked"  />
                                Male</label>
                              <label>
                                <input type="radio" name="gender" value="Female" id="gender_1"  />
                                Female</label>
                            </span></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top">Current Address</td>
                            <td align="center" valign="top">:</td>
                            <td align="left" valign="top"><span class="normal_fonts9">
                              <textarea name="add1" cols="40" rows="4" class="title_10" id="add1"><?php echo $_SESSION['add1']; ?></textarea>
                            *</span></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top" bgcolor="#f3f3f3"><span class="normal_fonts9">Permanent Address</span></td>
                            <td align="center" valign="top" bgcolor="#f3f3f3">:</td>
                            <td align="left" valign="top" bgcolor="#f3f3f3"><span class="normal_fonts9">
                              <textarea name="add2" cols="40" rows="4" class="title_10" id="add2"><?php echo $_SESSION['add2']; ?></textarea>
                            </span></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top">Country</td>
                            <td align="center" valign="top">:</td>
                            <td align="left" valign="top"><span class="normal_fonts9">
                              <select name="countryid" class="title_10" id="countryid">
                                <?php	
					 $recordsetcountry = mysql_query("select * from country order by Name");
					 while($rowcountry = mysql_fetch_array($recordsetcountry,MYSQL_ASSOC))
					 {
					 ?>
                                <option value="<?php echo $rowcountry["Country_Id"]; ?>" <?php if($_SESSION['countryid']==$rowcountry["Country_Id"]){ ?> selected="selected" <?php }  ?>><?php print($rowcountry["Name"]); ?></option>
                                <?php
					 }
					 ?>
                              </select>
                            *</span></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top" bgcolor="#f3f3f3">State</td>
                            <td align="center" valign="top" bgcolor="#f3f3f3">:</td>
                            <td align="left" valign="top" bgcolor="#f3f3f3">
                              <select name="state" id="state" onchange="showState(this.value)">
                                <option value="0">Select One</option>
                                <?php $st=$db->dbselect("select * from state where Country_Id='1' ORDER BY Name");
  while($disp=mysql_fetch_array($st))
  {
  ?>
                                <option value="<?php echo $disp['State_Id']; ?>"<?php if($_SESSION['state']==$disp["State_Id"]){ ?> selected="selected" <?php }  ?>><?php echo $disp['Name']; ?></option>
                                <?php } ?>
                              </select>
                            *</td>
                          </tr>
                          <tr>
                            <td align="right" valign="top">City</td>
                            <td align="center" valign="top">:</td>
                            <td align="left" valign="top">
                            <div id="txtHint">
                              <select name="city" id="city">
                              <option value="0">Select One</option>
                              <?php $city_data=mysql_query("SELECT * FROM city_mst ORDER BY city_name");
							  while($ct=mysql_fetch_array($city_data))
							  {
							  ?>
                              <option value="<?php echo $ct['city_id']; ?>" <?php if($ct['city_id']==$_SESSION['city']) {  ?> selected="selected" <?php } ?>><?php echo $ct['city_name']; ?></option>
                              <?php } ?>
                              </select> *
                              </div>
                           </td>
                          </tr>
                          <tr>
                            <td align="right" valign="top" bgcolor="#f3f3f3">Area</td>
                            <td align="center" valign="top" bgcolor="#f3f3f3">:</td>
                            <td align="left" valign="top" bgcolor="#f3f3f3"><span class="normal_fonts9">
                              <input name="area" type="text" class="title_10" id="area" value="<?php echo $_SESSION['area']; ?>" />
                            *</span></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top">Zipcode</td>
                            <td align="center" valign="top">:</td>
                            <td align="left" valign="top"><span class="normal_fonts9">
                              <input name="zipcode" type="text" class="title_10" id="zipcode" value="<?php echo $_SESSION['zipcode']; ?>" />
                            *</span></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top" bgcolor="#f3f3f3">E-Mail Address</td>
                            <td align="center" valign="top" bgcolor="#f3f3f3">:</td>
                            <td align="left" valign="top" bgcolor="#f3f3f3"><span class="normal_fonts9">
                              <input name="email" type="text" class="title_10" id="email" size="30" value="<?php echo $_SESSION['email']; ?>" />
                            *</span></td>
                          </tr>
                          <tr>
                            <td height="20" colspan="3" align="left" valign="top" bgcolor="#CCCCCC" class="title_10">&nbsp;Contact Details</td>
                          </tr>
                          <tr>
                            <td align="right" valign="top">Phone No.</td>
                            <td align="center" valign="top">:</td>
                            <td align="left" valign="top"><span class="normal_fonts9">
                              <input name="phone" type="text" class="title_10" id="phone" value="<?php echo $_SESSION['phone']; ?>" />
                            </span></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top" bgcolor="#f3f3f3">Mobile No.</td>
                            <td align="center" valign="top" bgcolor="#f3f3f3">:</td>
                            <td align="left" valign="top" bgcolor="#f3f3f3"><span class="normal_fonts9">
                              <input name="mobile" type="text" class="title_10" id="mobile" value="<?php echo $_SESSION['mobile']; ?>" />
                            *</span></td>
                          </tr>
                          <tr>
                            <td height="20" colspan="3" align="left" valign="top" bgcolor="#CCCCCC" class="title_10">&nbsp;Login Details</td>
                          </tr>
                          <tr>
                            <td align="right" valign="top" bgcolor="#FFFFFF">Username</td>
                            <td align="center" valign="top" bgcolor="#FFFFFF">:</td>
                            <td bgcolor="#FFFFFF" class="normal_fonts9"><input name="username" type="text" class="title_10" id="username" value="<?php echo $k['User_Name']; ?>" onblur="checkuser();" />
                              &nbsp;*&nbsp; 
                              <!--<img src="<?php echo HTTP_BASE_URL_ORDER; ?>loading.gif" width="16" height="16" border="0" id="hideme"/>-->
<!--<span class="err_msg_11" id="usercheck" style="cursor:pointer" onclick="checkuser();">Check Username</span>-->
                              <div id="txtHintuser" class="err_msg_9">
                                <input type="hidden" name="msg" id="msg_user" value="<?php echo $user; ?>" />
                            </div></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top" bgcolor="#f3f3f3">Password</td>
                            <td align="center" valign="top" bgcolor="#f3f3f3">:</td>
                            <td align="left" valign="top" bgcolor="#f3f3f3"><span class="normal_fonts9">
                              <input name="pass1" type="password" class="title_10" id="pass1"  value="<?php echo base64_decode($k['Password']); ?>"/>
                            *</span></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top" bgcolor="#FFFFFF">Confirm Passsword</td>
                            <td align="center" valign="top" bgcolor="#FFFFFF">:</td>
                            <td align="left" valign="top" bgcolor="#FFFFFF"><span class="normal_fonts9">
                              <input name="pass2" type="password" class="title_10" id="pass2"  value="<?php echo base64_decode($k['Password']); ?>"/>
                            *</span></td>
                          </tr>
                          <tr>
                            <td height="20" colspan="3" align="left" valign="top" bgcolor="#CCCCCC" class="title_10">&nbsp;Security Details</td>
                          </tr>
                          <tr>
                            <td align="right" valign="top" bgcolor="#f3f3f3">Security Code</td>
                            <td align="center" valign="top" bgcolor="#f3f3f3">:</td>
                            <td align="left" valign="top" bgcolor="#f3f3f3"><span class="normal_fonts9">
                              <input name="code" type="text" class="title_10" id="code" value="" />
                            *</span></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top">&nbsp;</td>
                            <td align="center" valign="top">&nbsp;</td>
                            <td align="left" valign="top"><span class="hyper_link_10"><img src="CaptchaSecurityImages.php? width=100&amp;height=40&amp;characters=5" /></span></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top" bgcolor="#f3f3f3">&nbsp;</td>
                            <td align="center" valign="top" bgcolor="#f3f3f3">&nbsp;</td>
                            <td align="left" valign="top" bgcolor="#f3f3f3"><span class="hyper_link_10">
                              <input type="checkbox" name="term"  value="1" id="term" />
                            </span><a href="index.php?pageno=15" target="_blank" style="text-decoration:none;">Bhatia Mobile Terms &amp; Conditions</a></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top" bgcolor="#f3f3f3">&nbsp;</td>
                            <td align="center" valign="top" bgcolor="#f3f3f3">&nbsp;</td>
                            <td align="left" valign="top" bgcolor="#f3f3f3" style="text-align:justify">By clicking the &ldquo;Checkbox&rdquo; below, I certify that I have read and agree to the Bhatia Mobile Terms of Service</td>
                          </tr>
                          <tr>
                            <td colspan="3" align="right" valign="top" height="10"></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top">&nbsp;</td>
                            <td colspan="2" align="left" valign="top"><input name="submit" type="submit" class="title_11" value="Submit" onclick="return validate_pass();validate_email();" />&nbsp;<input name="reset" type="reset" class="title_11" value="Reset"  /></td>
                          </tr>
                          <tr>
                            <td height="10" colspan="3" align="right" valign="top"></td>
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