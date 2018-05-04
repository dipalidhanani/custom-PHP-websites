<?php
$time_set=86400;
session_set_cookie_params ($time_set, '/', '.bhatiamobile.com',TRUE, FALSE);
session_start();
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
$db->connect();
?>
<link href="css/css1.css" rel="stylesheet" type="text/css">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="right"><table width="100%" border="0" cellspacing="3" cellpadding="0">
              <tr>
                <td align="center">&nbsp;</td>
                <?php if($_SESSION['buserid']=='') { ?>

                <td align="center" valign="middle"><a href="<?php echo HTTP_BASE_URL_ORDER; ?>index.php?pageno=6" class="err_msg_11">Login</a>  <span class="err_msg_10">|</span>  <a href="<?php echo HTTP_BASE_URL_ORDER; ?>index.php?pageno=1" class="err_msg_11">Sign Up</a></td>

                <?php } else {	?>

                <td align="center" valign="middle"><a href="<?php echo HTTP_BASE_URL_ORDER; ?>myaccount.php" class="err_msg_11">My Profile</a>  <span class="err_msg_10">|</span>  <a href="<?php echo HTTP_BASE_URL_ORDER; ?>index.php?pageno=5" class="err_msg_11">Logout</a></td>

                <?php } ?>
              </tr>
              <tr>
                <td align="center" class="fonts12red">&nbsp;</td>
                <td align="center" class="fonts12red"><table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="20"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/basket.png" width="16" height="16" /></td>
                    <td width="5">&nbsp;</td>
                    <td><a href="<?php echo HTTP_BASE_URL_ORDER; ?>index.php?pageno=7"><strong class="err_msg_12">View Cart</strong></a></td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td align="center" class="fonts12red">&nbsp;</td>
                <td align="center" class="title_w_9">You have <?php 

				if($_SESSION['cartno']=='') { echo "no"; } else { echo $_SESSION['cartno'];}  ?> 

                item(s) in your cart</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="10"></td>
          </tr>
          <tr>
            <td>
            <form name="srh" method="post" id="srh" action="<?php echo HTTP_BASE_URL; ?>index.php?pageno=13">
            <table border="0" cellspacing="0" cellpadding="0" align="center">
              <tr>
                <td width="9"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/header_11.jpg" width="9" height="24" /></td>
                <td background="<?php echo HTTP_BASE_URL_ORDER; ?>images/header_12.jpg" style="background-repeat:repeat-x;"><input name="search" type="text" class="fonts10" id="search" style="background:none; border:none;" size="15" /></td>
                <td width="9"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/header_14.jpg" width="9" height="24" /></td>
                <td width="10">&nbsp;</td>
                <td width="70"><input type="image" src="<?php echo HTTP_BASE_URL; ?>images/header_16.jpg" border="0" name="search" /></td>
              </tr>
            </table>
            </form>
            </td>
          </tr>
          <tr>
            <td height="10"></td>
          </tr>
        </table>