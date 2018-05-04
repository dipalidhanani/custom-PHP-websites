<?php session_start();
	require_once("../admin/config.inc.php");
	require_once("../admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	require_once ('../pagination/pagination.php');
	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	$page = ($page == 0 ? 1 : $page);
	$perpage = 30;//limit in each page
	$startpoint = ($page * $perpage) - $perpage;
	?>
<link href="<?php echo HTT_BASE_URL_ORDER; ?>css/css1.css" rel="stylesheet" type="text/css" />
<link href="<?php echo HTT_BASE_URL_ORDER; ?>pagination/style2.css" rel="stylesheet" type="text/css" />

<table width="100%" border="0" cellspacing="0" cellpadding="3">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="5"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_01.jpg" width="5" height="41" /></td>
            <td align="left" valign="top" background="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_02.jpg" style="background-repeat:repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="6" colspan="2" align="left" valign="middle"></td>
              </tr>
              <tr>
                <td width="30" align="left" valign="middle"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/Arrow.png" width="24" height="24" /></td>
                <td class="title"><strong>My Account</strong></td>
              </tr>
            </table></td>
            <td width="5"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_04.jpg" width="5" height="41" /></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="200" align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle" ><table width="100%" border="0" align="center" cellpadding="5" cellspacing="2" class="title_11">
              <tr>
                <td width="20" align="center" valign="middle">&nbsp;</td>
                <td width="100" height="50" align="center" valign="middle"><a href="myaccount.php?pageno=1"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/user.png" width="40" height="40" border="0" /></a></td>
                <td width="100" height="50" align="center" valign="middle"><a href="myaccount.php?pageno=2"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/order_img.png" width="40" height="40" border="0" /></a></td>
                <td width="100" height="50" align="center" valign="middle"><!--<a href="myaccount.php?pageno=4"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/order_img.png" width="40" height="40" border="0" /></a>--></td>
                <td align="center" valign="middle">&nbsp;</td>
                <td align="center" valign="middle">&nbsp;</td>
                <td align="center" valign="middle">&nbsp;</td>
                <td width="20" align="center" valign="middle">&nbsp;</td>
              </tr>
              <tr>
                <td align="center" valign="middle">&nbsp;</td>
                <td align="center" valign="middle"><a href="<?php echo HTTP_BASE_URL_ORDER; ?>myaccount.php?pageno=1" class="fonts10">Update Profile</a></td>
                <td align="center" valign="middle"><a href="<?php echo HTTP_BASE_URL_ORDER; ?>myaccount.php?pageno=2" class="fonts10">My Orders</a></td>
                <td align="center" valign="middle"><!--<a href="<?php echo HTTP_BASE_URL_ORDER; ?>myaccount.php?pageno=4" class="fonts10">Invoice Details</a>--></td>
                <td align="center" valign="middle">&nbsp;</td>
                <td align="center" valign="middle">&nbsp;</td>
                <td align="center" valign="middle">&nbsp;</td>
                <td align="center" valign="middle">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" valign="middle" class="fonts10" >&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle" class="fonts10" >&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
    <td width="1">&nbsp;</td>
    <td width="250" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="5"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_01.jpg" width="5" height="41" /></td>
            <td align="left" valign="top" background="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_02.jpg" style="background-repeat:repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="6" colspan="2" align="left" valign="middle"></td>
              </tr>
              <tr>
                <td width="30" align="left" valign="middle"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/Arrow.png" width="24" height="24" /></td>
                <td class="title"><strong>Announcement</strong></td>
              </tr>
            </table></td>
            <td width="5"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_04.jpg" width="5" height="41" /></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF">
        <marquee behavior="scroll" direction="up" scrolldelay="300" style="cursor:pointer;" onmouseover="this.stop();" onmouseout="this.start();">
        <table width="100%" border="0" cellpadding="3" cellspacing="0" style="padding:5px;">
        <?php
		$news_query=mysql_query("SELECT * FROM news_master WHERE Is_Active=1 ORDER BY news_id desc LIMIT 2");
		while($k=mysql_fetch_array($news_query))
		{
		?>
          <tr>
            <td align="left" valign="middle" class="title_11"><strong>&nbsp;<?php echo $k['news_title']; ?></strong></td>
          </tr>
          <tr>
            <td align="left" valign="middle" class="title_10" style="text-align:justify">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $k['news_description']; ?></td>
          </tr>
          <?php } ?>
        </table>
        </marquee>
        </td>
      </tr>
    </table></td>
  </tr>
</table>
