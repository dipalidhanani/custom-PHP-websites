<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to SQ Jeans - Reseller Panel</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-color: #E8E8E8;
}
-->
</style></head>

<body>
<table width="355" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:100px;">
  <tr>
    <td height="260" align="right" valign="top" background="images/login.png" style="background-repeat:no-repeat; background-position:top">
    <table width="80%" border="0" cellspacing="0" cellpadding="0">
     <form method="post" name="frmresellerlogin" id="frmresellerlogin" action="loginprocess.php" >
      <tr>
        <td width="12" height="12" background="images/box_bg_02.jpg"></td>
        <td height="15" background="images/box_bg_02.jpg"></td>
        </tr>
      <tr>
        <td background="images/box_bg_04.jpg">&nbsp;</td>
        <td style="background-repeat:repeat-x"><table width="100%" border="0" cellpadding="0" cellspacing="2">
          
          <tr>
            <td height="22" align="left" class="normal_fonts12_black" >Email Id</td>
          </tr>
          <tr>
            <td height="22" align="left" ><input name="reselleremail" type="text" class="normal_fonts9" id="reselleremail" /></td>
            </tr>   
          <tr>
            <td height="22" align="left" class="normal_fonts12_black">Password</td>
            </tr>
          <tr>
            <td height="22" align="left"><input name="resellerpassword" type="password" class="normal_fonts9" id="resellerpassword" /></td>
            </tr>
        </table></td>
        </tr>
      <tr>
        <td height="53" valign="bottom">&nbsp;</td>
        <td align="left" valign="middle" background="images/box_bg_05.jpg" style="background-repeat:repeat-x"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr></tr>
            
            <tr>
              <td height="10"></td>
            </tr>
            <tr>
              <td><input name="submit" type="submit" class="input" value="Sign In" /></td>
              </tr>
               <?php
			   
            	if($_REQUEST["error"]=="wrong")
				{
			?>
            <tr>
              <td height="10"></td>
            </tr>
            <tr>
              <td class="warning_fonts9"><strong><?php echo "Invalid Email Id or password."; ?></strong></td>
            </tr>
            <?php
				}
				?>
            <tr>
              <td height="20" align="right" valign="bottom">&nbsp;</td>
              </tr>
            <tr>
              <td height="20" align="center" valign="bottom" class="hyper_link_10">&nbsp;</td>
              </tr>
            <tr>
              <td height="20" align="center" valign="bottom">&nbsp;</td>
              </tr>
            <tr>
              <td height="10" align="center" valign="bottom" ></td>
              </tr>
            <tr>
              <td height="20" align="center" valign="bottom">&nbsp;</td>
              </tr>
            <tr>
              <td height="10" align="center" valign="bottom"></td>
            </tr>
            <tr>
              <td height="20" align="left" valign="top" class="normal_fonts8">Developed by : <a href="http://www.indoushosting.com/" target="_blank">V3+ Web Solutions 2010-2011</a></td>
            </tr>
          </table></td>
      </tr>
      </form>
    </table></td>
  </tr>
</table>
</body>
</html>
