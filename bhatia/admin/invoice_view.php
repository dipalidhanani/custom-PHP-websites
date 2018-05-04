<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();	?>
     <?php
	$country=mysql_query("select * from bill_mst where Billing_Id='".$_REQUEST['eid']."'");
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
            <td class="normal_fonts14_black"><a href="invoice.php">Invoice Details</a></td>
            </tr>
          <tr>
            <td>
            <form name="frmbrand"  method="post" action="invoice_process.php?is_edit=<?php echo $k['Billing_Id']; ?>">
            <input type="hidden" name="txtid" value="<?php echo $k['Billing_Id']; ?>" />
            <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
              <tr>
                <td width="300" align="right" class="normal_fonts9">Payment Status</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9">
                <select name="ostatus" id="ostatus">
                <option value="Pending" <?php if($k['Status']=='Pending') { ?> selected="selected" <?php } ?>>Pending</option>
                <option value="Completed" <?php if($k['Status']=='Completed') { ?> selected="selected" <?php } ?>>Completed</option>
                <option value="Cancelled" <?php if($k['Status']=='Cancelled') { ?> selected="selected" <?php } ?>>Cancelled</option>
                          </select>
                </td>
              </tr>
              <tr>
                <td align="right" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">Description</td>
                <td align="center" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">:</td>
                <td bgcolor="#f3f3f3" class="normal_fonts9"><textarea name="descr" id="descr" cols="45" rows="5"><?php echo $k['Description']; ?></textarea></td>
              </tr>
            
              <tr>
                <td align="right" class="normal_fonts9">&nbsp;</td>
                <td align="center" class="normal_fonts9">&nbsp;</td>
                <td class="normal_fonts9">
                  <?php if($k['Status']=='Pending') { ?>
                <input name="button4" type="submit" class="normal_fonts12_black" id="button4" style="width:80px; height:30px" value="Submit" />
                <?php } ?>
                &nbsp;
                <input type="button" name="back" value="Back" onblur="javascript:history.go(-1)"  class="normal_fonts12_black" />
                </td>
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
</body>
</html>
