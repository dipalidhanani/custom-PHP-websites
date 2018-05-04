<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();	?>
    <?php
	$country=mysql_query("select * from bhatia_video where Bhatia_Video_Id='".$_REQUEST['eid']."'");
	$k=mysql_fetch_array($country);
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
            <td class="normal_fonts14_black"><a href="add_video.php">Advertisement Video Details</a></td>
            </tr>
          <tr>
            <td>
            <?php if($_REQUEST['eid']=='') { ?>
            <form name="frmsh"  method="post" action="add_video_process.php">
            <?php } else { ?>
            <form name="frmsh"  method="post" action="add_video_process.php?is_edit=1">
            <input type="hidden" name="txtid" value="<?php echo $k['Bhatia_Video_Id']; ?>" />
            <?php } ?>
            <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
              <tr>
                <td width="300" align="right" class="normal_fonts9">Video Title</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9"><input name="video_name" type="text" id="video_name" size="40" value="<?php echo $k['Bhatia_Video_Title']; ?>" /></td>
              </tr>
              <tr>
                <td align="right" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">Source Code</td>
                <td align="center" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">:</td>
                <td bgcolor="#f3f3f3" class="normal_fonts9"><textarea name="video_source_code" id="video_source_code" cols="50" rows="7"><?php echo $k['Bhatia_Video_Source_Code'];  ?></textarea></td>
              </tr>
              <tr>
                <td align="right" class="normal_fonts9">Is Display </td>
                <td align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9">
                <label>
                    <input type="radio" name="isdisp" value="1" id="active_0" <?php if($k['Bhatia_Video_Disp_Status']==1){  ?> checked="checked" <?php } ?> />
                    Yes
                </label>
                  <label>
                    <input type="radio" name="isdisp" value="0" id="active_1" <?php if($k['Bhatia_Video_Disp_Status']==0){  ?> checked="checked" <?php } ?> />
                    No
                  </label></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#f3f3f3" class="normal_fonts9">Set Display Order</td>
                <td align="center" bgcolor="#f3f3f3" class="normal_fonts9">:</td>
                <td bgcolor="#f3f3f3" class="normal_fonts9"><input name="disp_order" type="text" id="disp_order" size="5" value="<?php echo $k['Bhatia_Video_Disp_Order']; ?>" /></td>
              </tr>
              <tr>
                <td align="right" class="normal_fonts9">Display on Home</td>
                <td align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9">
                <label>
                    <input type="radio" name="disp_home" value="1" id="disp_home_1" <?php if($k['Display_On_Home']==1){  ?> checked="checked" <?php } ?> />
                    Yes
                </label>
                  <label>
                    <input type="radio" name="disp_home" value="0" id="disp_home_2" <?php if($k['Display_On_Home']=='0'){  ?> checked="checked" <?php } ?> />
                    No
                  </label>
                </td>
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
