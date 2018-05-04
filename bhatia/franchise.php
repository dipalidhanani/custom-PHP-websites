<?php session_start();
	require_once("admin/config.inc.php");
	require_once("admin/Database.class.php");
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
var url="admin/statedata.php";
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
	msg=msg+ "\n" + "---------------------------------------"
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
	if(document.getElementById('code').value=='')
	{
		flag=1;
		msg=msg + "\n" + "please enter security code"
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

<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="5"><img src="<?php echo HTTP_BASE_URL; ?>images/box_01.jpg" width="5" height="41" /></td>
                        <td align="left" valign="top" background="<?php echo HTTP_BASE_URL; ?>images/box_02.jpg" style="background-repeat:repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="6" colspan="2" align="left" valign="middle"></td>
                            </tr>
                          <tr>
                            <td width="30" align="left" valign="middle"><img src="<?php echo HTTP_BASE_URL; ?>images/Arrow.png" width="24" height="24" /></td>
                            <td class="title">Franchise Registration</td>
                            </tr>
                          </table></td>
                        <td width="5"><img src="<?php echo HTTP_BASE_URL; ?>images/box_04.jpg" width="5" height="41" /></td>
                        </tr>
                      </table></td>
                    </tr>
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
                      <tr>
                        <td align="left" valign="middle" bgcolor="#FFFFFF">
                        <form name="frmuserreg" method="post" action="franchise_process.php" onsubmit="return validation();">
                        <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" class="title_10">
                          <tr>
                            <td height="10" colspan="3" align="left" valign="top" bgcolor="#FFFFFF"></td>
                          </tr>
                          <?php if($_REQUEST['msg']=='yes') { ?>
                          <tr>
                            <td colspan="3" align="center" valign="top" class="err_msg_12">Your registration has been completed successfully!!</td>
                          </tr>
                          <?php } ?>
                          <?php if($_REQUEST['code']==1) { ?>
                          <tr>
                            <td colspan="3" align="center" valign="top" class="err_msg_12">Please enter valid security code!!</td>
                          </tr>
                          <?php } ?>
                          <tr>
                            <td width="200" align="right" valign="top">Name</td>
                            <td width="10" align="center" valign="top">:</td>
                            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="110" align="left" valign="middle"><input name="fname" type="text" class="title_10" id="fname" size="35" value="<?php echo $_SESSION['fname']; ?>" /> </td>
                                <td width="110" align="left" valign="middle">&nbsp;</td>
                                <td width="110" align="left" valign="middle">&nbsp;</td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top" bgcolor="#f3f3f3">Branch</td>
                            <td align="center" valign="top" bgcolor="#f3f3f3">:</td>
                            <td align="left" valign="top" bgcolor="#f3f3f3"><input name="branch" type="text" class="title_10" id="branch"  value="<?php echo $_SESSION['branch']; ?>"/></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top" bgcolor="#FFFFFF">Demo No.</td>
                            <td align="center" valign="top" bgcolor="#FFFFFF">:</td>
                            <td align="left" valign="top" bgcolor="#FFFFFF"><span class="normal_fonts9">
                              <input name="demo_no" type="text" class="title_10" id="demo_no" value="<?php echo $_SESSION['demo_no'];  ?>" />
                            </span></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top" bgcolor="#f3f3f3">Current Address</td>
                            <td align="center" valign="top" bgcolor="#f3f3f3">:</td>
                            <td align="left" valign="top" bgcolor="#f3f3f3"><span class="normal_fonts9">
                              <textarea name="add1" cols="40" rows="5" class="title_10" id="add1"><?php echo $_SESSION['add1'];  ?></textarea>
                            </span></td>
                          </tr>
                          <!--<tr>
                            <td align="right" valign="top" bgcolor="#FFFFFF"><span class="normal_fonts9">Permanent Address</span></td>
                            <td align="center" valign="top" bgcolor="#FFFFFF">:</td>
                            <td align="left" valign="top" bgcolor="#FFFFFF"><span class="normal_fonts9">
                              <textarea name="add2" cols="40" rows="4" class="title_10" id="add2"><?php echo $k['Address2']; ?></textarea>
                            </span></td>
                          </tr>-->
                          <!--<tr>
                            <td align="right" valign="top" bgcolor="#f3f3f3">Country</td>
                            <td align="center" valign="top" bgcolor="#f3f3f3">:</td>
                            <td align="left" valign="top" bgcolor="#f3f3f3"><span class="normal_fonts9">
                              <select name="countryid" class="title_10" id="countryid" onchange="showState(this.value)">
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
                            </span></td>
                          </tr>-->
                          <!--<tr>
                            <td align="right" valign="top" bgcolor="#FFFFFF">State</td>
                            <td align="center" valign="top" bgcolor="#FFFFFF">:</td>
                            <td align="left" valign="top" bgcolor="#FFFFFF"><div id="txtHint">
                              <select name="state" id="state">
                                <option value="">Select One</option>
                                <?php $st=$db->dbselect("select * from state where Country_Id='".$k['Country_Id']."'");
  while($disp=mysql_fetch_array($st))
  {
  ?>
                                <option value="<?php echo $disp['State_Id']; ?>"<?php if($k['State_Id']==$disp["State_Id"]){ ?> selected="selected" <?php }  ?>><?php echo $disp['Name']; ?></option>
                                <?php } ?>
                              </select>
                            </div></td>
                          </tr>-->
                          <tr>
                            <td align="right" valign="top" bgcolor="#FFFFFF">City</td>
                            <td align="center" valign="top" bgcolor="#FFFFFF">:</td>
                            <td align="left" valign="top" bgcolor="#FFFFFF"><span class="normal_fonts9">
                              <input name="city" type="text" class="title_10" id="city" value="<?php echo $_SESSION['city']; ?>" />
                            </span></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top" bgcolor="#f3f3f3">Area</td>
                            <td align="center" valign="top" bgcolor="#f3f3f3">:</td>
                            <td align="left" valign="top" bgcolor="#f3f3f3"><span class="normal_fonts9">
                              <input name="area" type="text" class="title_10" id="area" value="<?php echo $_SESSION['area'];  ?>" />
                            </span></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top" bgcolor="#FFFFFF">Zipcode</td>
                            <td align="center" valign="top" bgcolor="#FFFFFF">:</td>
                            <td align="left" valign="top" bgcolor="#FFFFFF"><span class="normal_fonts9">
                              <input name="zipcode" type="text" class="title_10" id="zipcode" value="<?php echo $_SESSION['zipcode']; ?>" />
                            </span></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top" bgcolor="#FFFFFF">E-Mail Address</td>
                            <td align="center" valign="top" bgcolor="#FFFFFF">:</td>
                            <td align="left" valign="top" bgcolor="#FFFFFF"><span class="normal_fonts9">
                              <input name="email" type="text" class="title_10" id="email" size="30" value="<?php echo $_SESSION['email']; ?>" />
                            </span></td>
                          </tr>
                          
                          <tr>
                            <td align="right" valign="top" bgcolor="#f3f3f3">Mobile No.</td>
                            <td align="center" valign="top" bgcolor="#f3f3f3">:</td>
                            <td align="left" valign="top" bgcolor="#f3f3f3"><span class="normal_fonts9">
                              <input name="mobile" type="text" class="title_10" id="mobile" value="<?php echo $_SESSION['mobile']; ?>" />
                            </span></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top" bgcolor="#FFFFFF">Security Code</td>
                            <td align="center" valign="top" bgcolor="#FFFFFF">:</td>
                            <td align="left" valign="top" bgcolor="#FFFFFF"><span class="normal_fonts9">
                              <input name="code" type="text" class="title_10" id="code" value="" />
                            </span></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top">&nbsp;</td>
                            <td align="center" valign="top">&nbsp;</td>
                            <td align="left" valign="top"><span class="hyper_link_10"><img src="CaptchaSecurityImages.php? width=100&amp;height=40&amp;characters=5" /></span></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top" bgcolor="#f3f3f3">&nbsp;</td>
                            <td colspan="2" align="left" valign="top" bgcolor="#f3f3f3"><input name="submit" type="submit" class="title_12" value="Submit" onclick="return validate_email();validate_pass();" />&nbsp;<input name="reset" type="reset" class="title_12" value="Reset"  /></td>
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