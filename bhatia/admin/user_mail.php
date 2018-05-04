<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
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
	if(document.getElementById('subject').value=='')
	{
		flag=1;
		msg=msg + "\n" + "Please enter subject"
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
            <td class="normal_fonts14_black"><a href="user.php">User Mail Send</a></td>
            </tr>
          <tr>
            <td>
            <form name="frmmail" method="post" action="user_mail_process.php" onsubmit="return validation();">
            <table width="100%" border="0" cellspacing="0" cellpadding="5" style="padding-left:5px" class="border">
            <?php if($_REQUEST['err']=='yes') { ?>
              <tr>
                <td colspan="2" align="center" class="normal_fonts12">Please Try again!!</td>
                </tr>
             <?php } ?>   
              <tr>
                <td width="100" align="right" class="normal_fonts10">Subject :</td>
                <td>
                  <input name="subject" type="text" class="normal_fonts10" size="50" id="subject" />
              </td>
</tr>
              <tr>
                <td align="right" valign="top" class="normal_fonts10" >Content :</td>
                <td><?php 	include_once "ckeditor/ckeditor.php";
			
 $ckeditor = new CKEditor();
 $config['height']=200;
 $config['width']=800;
 $config['toolbar'] ="Basic";
 $ckeditor->basePath ='ckeditor/';
 $ckeditor->config['filebrowserBrowseUrl'] = 'ckfinder/ckfinder.html';
 $ckeditor->config['filebrowserImageBrowseUrl'] = 'ckfinder/ckfinder.html?type=Images';
 $ckeditor->config['filebrowserFlashBrowseUrl'] = 'ckfinder/ckfinder.html?type=Flash';
 $ckeditor->config['filebrowserUploadUrl'] = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
 $ckeditor->config['filebrowserImageUploadUrl'] = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
 $ckeditor->config['filebrowserFlashUploadUrl'] = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
 $code = $ckeditor->editor('data',$data,$config);
	echo $code;
	?></td>
              </tr>
              <tr align="center">
                <td colspan="2"><input type="submit" name="btn" class="normal_fonts12_black" value="Send Mail" id="sendmail"/></td>
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
