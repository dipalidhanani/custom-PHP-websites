<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();	?>
    <?php
	$country=mysql_query("select * from accessories where Ass_Id='".$_REQUEST['eid']."'");
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
            <td class="normal_fonts14_black"><a href="accessories.php">Accessories Details</a></td>
            </tr>
          <tr>
            <td>
            <?php if($_REQUEST['eid']=='') { ?>
            <form name="frmbrand"  method="post" action="accessories_process.php" enctype="multipart/form-data">
            <?php } else { ?>
            <form name="frmbrand"  method="post" action="accessories_process.php?is_edit=1" enctype="multipart/form-data">
            <input type="hidden" name="txtid" value="<?php echo $k['Ass_Id']; ?>" />
            <?php } ?>
            <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
              <tr>
                <td width="300" align="right" class="normal_fonts9">Accessory Name</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9"><input name="name" type="text" class="normal_fonts9" id="name" size="40" value="<?php echo $k['Name']; ?>" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#f3f3f3" class="normal_fonts9">Code</td>
                <td align="center" bgcolor="#f3f3f3" class="normal_fonts9">:</td>
                <td bgcolor="#f3f3f3" class="normal_fonts9"><input name="code" type="text" class="normal_fonts9" id="code" size="20" value="<?php echo $k['Code']; ?>" /></td>
              </tr>
              <tr>
                <td align="right" class="normal_fonts9">Sr.No.</td>
                <td align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9"><input name="srno" type="text" class="normal_fonts9" id="srno" size="20" value="<?php echo $k['Srno']; ?>" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#f3f3f3" class="normal_fonts9">Dillar Price</td>
                <td align="center" bgcolor="#f3f3f3" class="normal_fonts9">:</td>
                <td bgcolor="#f3f3f3" class="normal_fonts9"><input name="dprice" type="text" class="normal_fonts9" id="dprice" size="20" value="<?php echo $k['Dillar_Price']; ?>"  style="text-align:right"/></td>
              </tr>
              <tr>
                <td align="right" class="normal_fonts9">MRP Price</td>
                <td align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9"><input name="bmprice" type="text" class="normal_fonts9" id="bmprice" size="20" value="<?php echo $k['Bhatia_Price']; ?>" style="text-align:right" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#f3f3f3" class="normal_fonts9">BM Price</td>
                <td align="center" bgcolor="#f3f3f3" class="normal_fonts9">:</td>
                <td bgcolor="#f3f3f3" class="normal_fonts9"><input name="fprice" type="text" class="normal_fonts9" id="fprice" size="20" value="<?php echo $k['Final_Price']; ?>" style="text-align:right" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#FFFFFF" class="normal_fonts9">Image</td>
                <td align="center" bgcolor="#FFFFFF" class="normal_fonts9">:</td>
                <td bgcolor="#FFFFFF" class="normal_fonts9">
                <input name="image" id="image" type="file" />
			    <input name="hidden" type="hidden" value="1" />
			    <input type="hidden" name="existing_file_value" value="<?php echo $k['Is_Image']; ?>" />
    
                </td>
              </tr>
              <tr>
                <td align="right" bgcolor="#f3f3f3" class="normal_fonts9">Display Order</td>
                <td align="center" bgcolor="#f3f3f3" class="normal_fonts9">:</td>
                <td bgcolor="#f3f3f3" class="normal_fonts9"><input name="order" type="text" class="normal_fonts9" id="order" size="10" value="<?php echo $k['Disp_Order']; ?>" style="text-align:right"/></td>
              </tr>
              <tr>
                <td align="right" valign="top" class="normal_fonts9">Description </td>
                <td align="center" valign="top" class="normal_fonts9">:</td>
                <td align="left" valign="top" class="normal_fonts9"><textarea name="descr" id="descr" cols="50" rows="5"><?php echo $k['Description']; ?></textarea></td>
              </tr>
              <tr>
                <td height="10" colspan="3" align="right" class="normal_fonts9"></td>
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
