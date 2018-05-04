<link href="menu_style1.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo HTTP_BASE_URL_ORDER; ?>menu_style.css" type="text/css" />
<link href="<?php echo HTTP_BASE_URL_ORDER; ?>css/home.css" rel="stylesheet" type="text/css">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#333333"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="288"><a href="<?php echo HTTP_BASE_URL; ?>index.php"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/logo.jpg" width="288" height="100" border="0" /></a></td>
        <td align="right" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>&nbsp;</td>
            <td width="100">
            <script>var slide1foldername='<?php echo HTTP_BASE_URL_ORDER; ?>images/';</script>
                  <script src="<?php echo HTTP_BASE_URL_ORDER; ?>images/slide1.js" type="text/javascript"></script>
            </td>
            <td width="150" align="right"><table width="150" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="80">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="15" align="right" valign="middle">&nbsp;</td>
        <td width="260" align="right"><?php include('cart.php'); ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="41" align="center" valign="middle" background="<?php echo HTTP_BASE_URL_ORDER; ?>images/header_07.jpg" style="background-repeat:repeat-x;"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><div class="menu">
              <ul>
                <li style="background-color:#c2c0c1;width:1px;height:41px;">&nbsp;</li>
                <li><a href="<?php echo HTTP_BASE_URL; ?>index.php" >Home</a></li>
                <li style="background-color:#c2c0c1;width:1px;height:41px;">&nbsp;</li>
                <li><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=28" id="current">What's New?</a>
                  <!--<ul>
                    <li><a href="#">Drop Down CSS Menus</a></li>
                    <li><a href="#">Horizontal CSS Menus</a></li>
                    <li><a href="#">Vertical CSS Menus</a></li>
                    <li><a href="#">Dreamweaver Menus</a></li>
                  </ul>-->
                </li>
                <li style="background-color:#c2c0c1;width:1px;height:41px;">&nbsp;</li>
                <li><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=19">Free Gift</a></li>
                <li style="background-color:#c2c0c1;width:1px;height:41px;">&nbsp;</li>
                <li><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=21">Accessories</a></li>
                <li style="background-color:#c2c0c1;width:1px;height:41px;">&nbsp;</li>
               	<li><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=16">Mobile Reviews</a></li>
               	<li style="background-color:#c2c0c1;width:1px;height:41px;">&nbsp;</li>
               	<li><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=26">Our Branches</a></li>
               	<li style="background-color:#c2c0c1;width:1px;height:41px;">&nbsp;</li>
                <li><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=29">Compare Mobiles</a></li>
               	<li style="background-color:#c2c0c1;width:1px;height:41px;">&nbsp;</li>
                <li><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=10">Contact us</a></li>
                <li style="background-color:#c2c0c1;width:1px;height:41px;">&nbsp;</li>
              </ul>
            </div></td>
          </tr>
        </table></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="1" align="center" valign="middle" bgcolor="#FFFFFF"></td>
  </tr>
  <tr>
    <td height="30" align="center" valign="middle"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td valign="top" ><table width="982" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="borderbox">
              <tr>
                <td bgcolor="#333333" style="background-repeat:repeat-x; background-position:top;"><div class="menu1">
                  <ul>
                    <li><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=13&mtype=GSM">GSM</a></li>
                    <li style="background-color:#c2c0c1;width:1px;height:30px;">&nbsp;</li>
                    <li><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=13&mtype=CDMA">CDMA</a></li>
                    <li style="background-color:#c2c0c1;width:1px;height:30px;">&nbsp;</li>
                    <li><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=13&mtype=BOTH">GSM &amp; CDMA</a></li>
                    <li style="background-color:#c2c0c1;width:1px;height:30px;">&nbsp;</li>
                    <li><a href="#" id="current2">Mobile OS</a>
                      <ul>
                      <?php
					  $os_data=mysql_query("SELECT * FROM mobile_os ORDER BY Mobile_OS_Id");
				      while($disp_os=mysql_fetch_array($os_data))
				      {   ?>
                        <li><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=13&os=<?php echo $disp_os['Mobile_OS_Id']; ?>"><?php echo $disp_os['Mobile_OS']; ?></a></li>
                      <?php } ?>  
                      </ul>
                    </li>
                    <li style="background-color:#c2c0c1;width:1px;height:30px;">&nbsp;</li>
                    <li><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=13&features=smartphone">SmartPhone</a></li>
                    <li style="background-color:#c2c0c1;width:1px;height:30px;">&nbsp;</li>
                    <li><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=13&features=bluetooth">Bluetooth</a></li>
                    <li style="background-color:#c2c0c1;width:1px;height:30px;">&nbsp;</li>
                    <li><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=13&features=camera">Camera</a></li>
                    <li style="background-color:#c2c0c1;width:1px;height:30px;">&nbsp;</li>
                    <li><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=13&features=3g">3G</a></li>
                    <li style="background-color:#c2c0c1;width:1px;height:30px;">&nbsp;</li>
                    <li><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=13&features=qwerty">QWERTY</a></li>
                    <li style="background-color:#c2c0c1;width:1px;height:30px;">&nbsp;</li>
                    <li><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=13&features=dualsim">Dual SIM</a></li>
                    <li style="background-color:#c2c0c1;width:1px;height:30px;">&nbsp;</li>
                    <li><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=13&features=memory">Memory Slot</a></li>
                    <li style="background-color:#c2c0c1;width:1px;height:30px;">&nbsp;</li>
                    <li style="background-color:#c2c0c1;width:1px;height:30px;">&nbsp;</li>
                    <li><a href="#" id="current2">Price Range</a>
                      <ul>
                        <li><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=13&price=0-2000">Rs.0 - Rs.2000</a></li>
                        <li><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=13&price=2000-5000">Rs.2000 - Rs.5000</a></li>
                        <li><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=13&price=5000-8000">Rs.5000 - Rs.8000</a></li>
                        <li><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=13&price=8000-10000">Rs.8000 - Rs.10000</a></li>
                        <li><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=13&price=10000-20000">Rs.10000 - Rs.20000</a></li>
                        <li><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=13&price=20000-30000">Rs.20000 - Rs.30000</a></li>
                        <li><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=13&price=30000-Above">Rs.30000 - Above</a></li>
                      </ul>
                    </li>
                    <li style="background-color:#c2c0c1;width:1px;height:30px;">&nbsp;</li>
                  </ul>
                </div></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>