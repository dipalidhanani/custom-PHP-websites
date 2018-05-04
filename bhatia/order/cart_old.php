<?php
$time_set=86400;
session_set_cookie_params ($time_set, '/', '.bhatiamobile.com',TRUE, FALSE);
session_start();
//require_once("../admin/config.inc.php");
//require_once("../admin/Database.class.php");
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
$db->connect();
?>
<link href="<?php echo HTTP_BASE_URL_ORDER; ?>css/css1.css" rel="stylesheet" type="text/css">

<table width="260" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="81" align="left" valign="top" background="<?php echo HTTP_BASE_URL_ORDER; ?>images/header_04.jpg" style="background-repeat:no-repeat;"><table width="100%" border="0" cellspacing="3" cellpadding="0">
              <tr>
                <td width="60">&nbsp;</td>
                <td align="center"><a href="<?php echo HTTP_BASE_URL_ORDER; ?>index.php?pageno=7" class="err_msg_12"><strong>View Cart</strong></a></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="center" class="fonts9">You have <?php 
				if($_SESSION['cartno']=='') { echo "no"; } else { echo $_SESSION['cartno'];}  ?> iteam(s) in your cart</td>
              </tr>
              <tr>
                <td align="center" valign="middle">&nbsp;</td>
                <?php if($_SESSION['buserid']=='') { ?>
                <td align="center" valign="middle"><a href="<?php echo HTTP_BASE_URL_ORDER; ?>index.php?pageno=6" class="err_msg_12">Login</a>  |  <a href="<?php echo HTTP_BASE_URL_ORDER; ?>index.php?pageno=1" class="err_msg_12">Sign Up</a></td>
                <?php } else {	?>
                <td align="center" valign="middle"><a href="<?php echo HTTP_BASE_URL_ORDER; ?>myaccount.php" class="err_msg_12">My Profile</a>  |  <a href="<?php echo HTTP_BASE_URL_ORDER; ?>index.php?pageno=5" class="err_msg_12">Logout</a></td>
                <?php } ?>
              </tr>
            </table></td>
          </tr>
        </table>