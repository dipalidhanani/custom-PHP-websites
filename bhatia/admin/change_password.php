<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect(); 
	require_once ('pagination/pagination.php');
	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	$page = ($page == 0 ? 1 : $page);
	$perpage = PAGE_LIMIT;//limit in each page
	$startpoint = ($page * $perpage) - $perpage;
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ADMIN_TITLE; ?></title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/menu_style.css" type="text/css" />
<link rel="stylesheet" href="pagination/style2.css" type="text/css" />

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
<script language="javascript">
function validation()
{
	var flag=0
	var msg
	msg="Please Enter the folllowing Values "
	msg=msg+ "\n" + "--------------------------------------------"
	if(document.getElementById('pass1').value=='')
	{
		flag=1;
		msg=msg + "\n" + "Please enter old password"
	}
	if(document.getElementById('pass2').value=='')
	{
		flag=1;
		msg=msg + "\n" + "Please enter new password"
	}
	if(document.getElementById('pass3').value=='')
	{
		flag=1;
		msg=msg + "\n" + "please enter confirm password"
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
	if(document.getElementById('pass2').value!=document.getElementById('pass3').value)
	{
		alert('Password and confirm password must be same');
		document.getElementById('pass3').value='';
		document.getElementById('pass3').focus();
		return false;
	}
	else
	{
		return true;
	}
	
}
</script>
<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="125" align="left" valign="top" bgcolor="#FFFFFF"><?php include('header.php');  ?></td>
      </tr>
      <tr>
        <td height="2" bgcolor="#000000"></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><?php include('menu.php'); ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><table width="99%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">Change Password</td>
            </tr>
          <tr>
            <td class="normal_fonts14_black">
            <form name="frmchangepass" method="post" action="changepass_process.php" onsubmit="return validation();validate_pass();">
            <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" class="border">
            <?php if($_REQUEST['msg']=='no') { ?>
              <tr>
                <td colspan="3" align="center" valign="middle" class="normal_fonts12">Old Password you have entered was incorrect</td>
              </tr>
              <?php } ?>
              <?php if($_REQUEST['msg']=='yes') { ?>
              <tr>
                <td colspan="3" align="center" valign="middle" class="normal_fonts12">Your password has been changed succsessfully</td>
                </tr>
                <?php } ?>
              <tr>
                <td width="300" align="right" valign="middle"><span class="normal_fonts10">Old Password</span></td>
                <td width="10" align="center" valign="middle"><span class="normal_fonts10">:</span></td>
                <td align="left" valign="middle"><input type="password" name="pass1" id="pass1" /></td>
              </tr>
              <tr>
                <td align="right" valign="middle" bgcolor="#f3f3f3"><span class="normal_fonts10">New Password</span></td>
                <td align="center" valign="middle" bgcolor="#f3f3f3"><span class="normal_fonts10">:</span></td>
                <td align="left" valign="middle" bgcolor="#f3f3f3"><input type="password" name="pass2" id="pass2" /></td>
              </tr>
              <tr>
                <td align="right" valign="middle"><span class="normal_fonts10">Confirm New Password</span></td>
                <td align="center" valign="middle"><span class="normal_fonts10">:</span></td>
                <td align="left" valign="middle"><input type="password" name="pass3" id="pass3" /></td>
              </tr>
              <tr>
                <td colspan="3" align="right" valign="middle" height="5"></td>
                </tr>
              <tr>
                <td align="right" valign="middle" bgcolor="#f3f3f3">&nbsp;</td>
                <td align="center" valign="middle" bgcolor="#f3f3f3">&nbsp;</td>
                <td align="left" valign="middle" bgcolor="#f3f3f3"><input name="submit" type="submit" class="normal_fonts14_black" value="Submit" /></td>
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
</body>
</html>
