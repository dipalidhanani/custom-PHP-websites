<?php 
	session_start();
	require_once("admin/config.inc.php");
	require_once("admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo CLIENT_TITLE; ?></title>

<link rel="stylesheet" href="virtuemart.css" type="text/css">

<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #d5d4d4;
}
-->
</style>
<link href="css/css1.css" rel="stylesheet" type="text/css" />
<link href="menu_style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="bottom" bgcolor="#EEEEEE"><?php include("header.php"); ?></td>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0" class="borderbox">
      <tr>
        <td bgcolor="#eeeeee"><table width="980" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td width="220" align="left" valign="top"><table width="220" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><?php include("left.php"); ?></td>
              </tr>
            </table></td>
            <td align="left" valign="top"></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="top"><?php include("footer.php"); ?></td>
  </tr>
</table>

</body>
</html>
