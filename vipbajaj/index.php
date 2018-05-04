<?php
include("include/config.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>VIP AUTO</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<link href="css/home.css" rel="stylesheet" type="text/css" />
</head>

<body style="font-size:62.5%;">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><?php include("header.php"); ?></td>
  </tr>
  <tr>
    <td><table width="980" border="0" align="center" cellpadding="0" cellspacing="10">
      <tr>
        <td><?php include("slider.php"); ?></td>
      </tr>
      <tr>
        <td><?php include("centerbox.php"); ?></td>
      </tr>
      <tr>
        <td height="80" align="left" valign="top"><?php include("bikeslider1.php"); ?></td>
      </tr>
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
           <td align="left" valign="top" width="200">
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="title" style="font-size:13px;">Welcome to&nbsp;</td>
                    <td><img src="images/logo1.png" width="126" height="22" /></td>
                    </tr>
                  </table></td>
                </tr>
              <tr>
                <td height="10"></td>
                </tr>
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="200" valign="top"><img src="images/home.jpg" width="200" height="130" /></td>
                 
                    </tr>
                  </table></td>
                </tr>
                <tr><td height="6"></td></tr>
                <tr><td class="blue" valign="top" align="right"><a href="profile.php">more..</a></td></tr>
              </table>

           </td>
            <td width="12">&nbsp;</td>
            <td align="left" valign="top" width="180">
            <table border="0" width="100%" height="182" cellpadding="5" cellspacing="5" style="border:1px solid #ddd; border-radius:4px;" class="black10">
            <tr><td class="title" height="10" valign="top">Latest News</td></tr>
            <tr><td height="110" valign="top">
             <marquee direction="up" height="110" scrolldelay="300" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 6, 0);">
            <?php
			$qnews=mysql_query("select * from news_mast order by news_id desc");
			while($rnews=mysql_fetch_array($qnews)){
			?>
             <strong><?php echo $rnews["news_title"]; ?></strong><br />
       <?php echo substr($rnews["news_desc"],0,40).".."; ?><br /><br />
              <?php } ?>
              </marquee>
              </td></tr>
               <tr><td class="blue" valign="top" align="right" height="10"><a href="all_news.php">more..</a></td></tr>
            </table>
            </td>
            <td width="12">&nbsp;</td>
            <td align="left" valign="top" width="180">
             <table border="0" width="100%" height="182" cellpadding="5" cellspacing="5" style="border:1px solid #ddd; border-radius:4px;" >
            <tr><td class="title" height="10" valign="top">Events</td></tr>
            <tr><td height="95" valign="top" style="padding:0;">
            <table width="100%" cellspacing="0" cellpadding="0">
             <?php
			$qevent=mysql_query("select * from event_mast order by event_id desc limit 1");
			if($revent=mysql_fetch_array($qevent)){
			?>
             <tr><td align="center"> <a href="event_video.php?eventid=<?php echo $revent["event_id"]; ?>"><img border="0" src="events/<?php echo $revent["event_photo"]; ?>" height="91" width="154"></a></td></tr>
             <tr><td height="8"></td></tr>
       <tr><td class="black10" align="center"> <?php echo $revent["event_title"]; ?></td></tr>
              <?php } ?>
              </table></td></tr>
          <tr><td class="blue" valign="bottom" align="right" height="10"><a href="all_events.php">more..</a></td></tr>
            </table>
            </td>
            <td width="12">&nbsp;</td>
            <td width="182" align="left" valign="top"><?php include("booktestdrive.php"); ?></td>
            <td width="12">&nbsp;</td>
            <td width="182" align="left" valign="top"><?php include("bookservice.php"); ?></td>
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
