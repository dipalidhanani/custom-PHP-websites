<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();	?>
    <?php
	$country=mysql_query("select * from news_master where news_id='".$_REQUEST['eid']."'");
	$k=mysql_fetch_array($country);
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
            <td class="normal_fonts14_black"><a href="news.php">News Details</a></td>
            </tr>
          <tr>
            <td>
            <?php if($_REQUEST['eid']=='') { ?>
            <form name="frmcountry"  method="post" action="news_process.php">
            <?php } else { ?>
            <form name="frmcountry"  method="post" action="news_process.php?is_edit=1">
            <input type="hidden" name="txtid" value="<?php echo $k['news_id']; ?>" />
            <?php } ?>
            <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
              <tr>
                <td width="300" align="right" class="normal_fonts9">News Title</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9"><input name="title" type="text" id="title" size="30" value="<?php echo $k['news_title']; ?>" /></td>
              </tr>
              <tr>
                <td align="right" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">News Description</td>
                <td align="center" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">:</td>
                <td bgcolor="#f3f3f3" class="normal_fonts9"><textarea name="news_desc" id="news_desc" cols="45" rows="5"><?php echo $k['news_description']; ?></textarea></td>
              </tr>
              <tr>
                <td align="right" valign="middle" class="normal_fonts9">Is Active News ?</td>
                <td align="center" valign="middle" class="normal_fonts9">:</td>
                <td class="normal_fonts9"><table width="200">
                  <tr>
                    <td><label>
                      <input type="radio" name="isactive" value="1" id="isactive_0" <?php if($k['Is_Active']==1) { ?> checked="checked" <?php } ?> />
                      Active</label></td>
                      <td><label>
                      <input type="radio" name="isactive" value="0" id="isactive_1" <?php if($k['Is_Active']==0) { ?> checked="checked" <?php } ?> />
                      Inactive</label></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#F3F3F3" class="normal_fonts9">&nbsp;</td>
                <td align="center" bgcolor="#F3F3F3" class="normal_fonts9">&nbsp;</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9"><input name="button4" type="submit" class="normal_fonts12_black" id="button4" style="width:80px; height:30px" value="Submit" /></td>
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
