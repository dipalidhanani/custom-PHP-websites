<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	$today=date('Y-m-d');
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
        <td height="125" align="left" valign="top" bgcolor="#FFFFFF"><?php include('header.php'); ?></td>
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
            <td height="250" align="center" valign="middle" class="normal_fonts14_black"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="30%" align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" class="border">
                  <tr>
                    <td colspan="3" align="left" valign="middle" bgcolor="#CCCCCC">Today's Order Detail</td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle" class="normal_fonts12_black"><a href="order.php?st=1">Today's Order</a></td>
                    <td width="10" align="center" valign="middle" class="normal_fonts12_black">:</td>
                    <td width="50" align="center" valign="middle" class="normal_fonts12_black"><?php $todayOrder= $db->dbselect1("select count(*) from order_mst where Order_Date='".$today."'"); echo $todayOrder['count(*)']; ?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle" class="normal_fonts12_black"><a href="order.php?st=2">Today's Pending</a></td>
                    <td align="center" valign="middle" class="normal_fonts12_black">:</td>
                    <td align="center" valign="middle" class="normal_fonts12_black"><?php $todayOrder= $db->dbselect1("select count(*) from order_mst where Order_Date='".$today."' and Order_Status='Pending'"); echo $todayOrder['count(*)']; ?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle" class="normal_fonts12_black"><a href="order.php?st=3">Today's Completed</a></td>
                    <td align="center" valign="middle" class="normal_fonts12_black">:</td>
                    <td align="center" valign="middle" class="normal_fonts12_black"><?php $todayOrder= $db->dbselect1("select count(*) from order_mst where Order_Date='".$today."' and Order_Status='Completed'"); echo $todayOrder['count(*)']; ?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle" class="normal_fonts12_black"><a href="order.php?st=4">Today's Cancelled</a></td>
                    <td align="center" valign="middle" class="normal_fonts12_black">:</td>
                    <td align="center" valign="middle" class="normal_fonts12_black"><?php $todayOrder= $db->dbselect1("select count(*) from order_mst where Order_Date='".$today."' and Is_Cancelled='1'"); echo $todayOrder['count(*)']; ?></td>
                  </tr>
                </table></td>
                <td align="left" valign="top">&nbsp;</td>
                <td width="30%" align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" class="border">
                  <tr>
                    <td colspan="3" align="left" valign="middle" bgcolor="#CCCCCC">Order Detail</td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle" class="normal_fonts12_black">Total No. of Order </td>
                    <td width="10" align="center" valign="middle" class="normal_fonts12_black">:</td>
                    <td width="50" align="center" valign="middle" class="normal_fonts12_black"><?php $todayOrder= $db->dbselect1("select count(*) from order_mst"); echo $todayOrder['count(*)']; ?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle" class="normal_fonts12_black">Total  Pending Order</td>
                    <td align="center" valign="middle" class="normal_fonts12_black">:</td>
                    <td align="center" valign="middle" class="normal_fonts12_black"><?php $todayOrder= $db->dbselect1("select count(*) from order_mst where Order_Status='Pending'"); echo $todayOrder['count(*)']; ?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle" class="normal_fonts12_black">Total  Completed Order</td>
                    <td align="center" valign="middle" class="normal_fonts12_black">:</td>
                    <td align="center" valign="middle" class="normal_fonts12_black"><?php $todayOrder= $db->dbselect1("select count(*) from order_mst where Order_Status='Completed'"); echo $todayOrder['count(*)']; ?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle" class="normal_fonts12_black">Total  Cancelled Order</td>
                    <td align="center" valign="middle" class="normal_fonts12_black">:</td>
                    <td align="center" valign="middle" class="normal_fonts12_black"><?php $todayOrder= $db->dbselect1("select count(*) from order_mst where Is_Cancelled='1'"); echo $todayOrder['count(*)']; ?></td>
                  </tr>
                </table></td>
                <td align="left" valign="top">&nbsp;</td>
                <td width="30%" align="left" valign="top"><table width="100%" border="0" align="right" cellpadding="4" cellspacing="0" class="border">
                  <tr>
                    <td colspan="3" align="left" valign="middle" bgcolor="#CCCCCC" class="normal_fonts14_black">Statistics</td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle" class="normal_fonts12_black">Total Customers</td>
                    <td width="10" align="center" valign="middle">:</td>
                    <td align="center" valign="middle"><span class="normal_fonts12_black">
                      <?php $todayOrder= $db->dbselect1("select count(*) from user_mst"); echo $todayOrder['count(*)']; ?>
                    </span></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle" class="normal_fonts12_black">Total Branches</td>
                    <td align="center" valign="middle">:</td>
                    <td width="50" align="center" valign="middle"><span class="normal_fonts12_black">
                      <?php $todayOrder= $db->dbselect1("select count(*) from franchise_mst"); echo $todayOrder['count(*)']; ?>
                    </span></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle" class="normal_fonts12_black">No. of Products</td>
                    <td align="center" valign="middle">:</td>
                    <td width="50" align="center" valign="middle"><span class="normal_fonts12_black">
                      <?php $todayOrder= $db->dbselect1("select count(*) from prod_mst"); echo $todayOrder['count(*)']; ?>
                    </span></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle" class="normal_fonts12_black">No. of Brands</td>
                    <td align="center" valign="middle">:</td>
                    <td width="50" align="center" valign="middle"><span class="normal_fonts12_black">
                      <?php $todayOrder= $db->dbselect1("select count(*) from brand_mst"); echo $todayOrder['count(*)']; ?>
                    </span></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
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
