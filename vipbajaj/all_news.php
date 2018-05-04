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
<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><?php include("header.php"); ?></td>
  </tr>
  <tr>
    <td><table width="980" border="0" align="center" cellpadding="0" cellspacing="10">
      <tr>
        <td class="blue"><a href="index.php">Home</a> &gt; News</td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
                  <tr>
                    <td class="title">News</td>
                    </tr>
                  <tr>
                    <td height="5" class="title"></td>
                  </tr>
                </table></td>
              </tr>
               <?php
			$qnews=mysql_query("select * from news_mast order by news_id desc");
			$i=1;
			while($rnews=mysql_fetch_array($qnews)){
			?>
            <tr><td><table width="100%" cellpadding="0" cellspacing="8" <?php if(mysql_num_rows($qnews)!=$i){ ?> style="border-bottom:1px dotted #444;" <?php } ?>>
              <tr><td class="black10"><strong><?php echo $rnews["news_title"]; ?></strong> </td></tr>
               <tr><td class="black10"><?php echo $rnews["news_desc"]; ?> </td></tr>
               </table></td></tr>
               <?php $i++; } ?> 
               <?php if(mysql_num_rows($qnews)==0){ ?>
               <tr><td height="10"></td></tr>
              <tr>
                <td class="black9" align="left" style="color:#F00;">
                No News Found.
                </td>
              </tr>
              <?php } ?>
            </table></td>
            <td width="12">&nbsp;</td>
            <td width="182" align="left" valign="top"><table width="180" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><?php include("booktestdrive.php"); ?></td>
              </tr>
              <tr>
                <td height="10"></td>
              </tr>
              <tr>
                <td><?php include("bookservice.php"); ?></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="80" align="left" valign="top"><?php include("bikeslider1.php"); ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="top"><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>
