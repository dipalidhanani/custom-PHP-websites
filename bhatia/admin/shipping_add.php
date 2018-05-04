<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();	?>
    <?php
	$country=mysql_query("select * from shipping_mst where Shipping_Id='".$_REQUEST['eid']."'");
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
            <td class="normal_fonts14_black"><a href="shipping.php">Shipping Details</a></td>
            </tr>
          <tr>
            <td>
            <?php if($_REQUEST['eid']=='') { ?>
            <form name="frmsh"  method="post" action="shipping_process.php">
            <?php } else { ?>
            <form name="frmsh"  method="post" action="shipping_process.php?is_edit=1">
            <input type="hidden" name="txtid" value="<?php echo $k['Shipping_Id']; ?>" />
            <?php } ?>
            <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
              <tr>
                <td width="300" align="right" class="normal_fonts9">Select State</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9"><select name="ship" id="ship">
                <option value="0">Select One</option>
                <?php
				$st=mysql_query("select * from state order by Name");
				while($s=mysql_fetch_array($st))
				{
				?>
                <option value="<?php  echo $s['State_Id']; ?>" <?php if($k['State_Id']==$s['State_Id']) { ?> selected="selected" <?php } ?>><?php  echo $s['Name']; ?></option>
                <?php } ?>
                </select></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#f3f3f3" class="normal_fonts9">Shipping Charge</td>
                <td align="center" bgcolor="#f3f3f3" class="normal_fonts9">:</td>
                <td bgcolor="#f3f3f3" class="normal_fonts9"><input name="chrg" type="text" class="normal_fonts9" id="chrg" size="15" value="<?php echo $k['Charge']; ?>" style="text-align:right" />&nbsp;(In Rupees)</td>
              </tr>
              <tr>
                <td align="right" class="normal_fonts9">Is Active</td>
                <td align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9">
                <label>
                    <input type="radio" name="active" value="1" id="active_0" <?php if($k['Is_Active']==1){  ?> checked="checked" <?php } ?>  checked="checked"/>
                    Active</label>
                  <label>
                    <input type="radio" name="active" value="0" id="active_1" <?php if($k['Is_Active']=='0'){  ?> checked="checked" <?php } ?> />
                    InActive</label>
                </td>
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
