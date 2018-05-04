<link href="<?php echo HTTP_BASE_URL; ?>css/home.css" rel="stylesheet" type="text/css">
<link href="<?php echo HTTP_BASE_URL; ?>css/css1.css" rel="stylesheet" type="text/css" />
<table width="985" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="10"></td>
  </tr>
  <tr>
    <td height="171" align="left" valign="top" background="<?php echo HTTP_BASE_URL; ?>images/footer_bg.jpg" bgcolor="#D6D4D5" style="background-repeat:repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td style="padding-left:15px;">
            <marquee align="middle" behavior="scroll" direction="left" style="cursor:pointer;" scrolldelay="200" onmouseover="this.stop();" onmouseout="this.start();" width="950px;"> 
            <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
  			<tr>
            <?php
			  $logo=mysql_query("select * from logo_mst order by Disp_Order");
			  while($l=mysql_fetch_array($logo))
			  {
			  ?>
   			<td  align="left" valign="middle">
            <img src="<?php echo HTTP_BASE_URL; ?>logo/<?php echo $l['Is_Image']; ?>" height="40"  border="0" />            </td>
            <?php } ?>
            </tr>
			</table>
               </marquee></td>
          </tr>
          <tr>
            <td  align="center"><table width="950" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="1"></td>
  </tr>
</table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="25" align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td align="center" class="fonts9"><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=14">About us</a> | <a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=15">Terms &amp; Conditions</a> | <a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=22"> Shipping Policy </a>| <a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=25"> Privacy Policy </a> | <a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=11">Franchisee Inquiries</a> | <a href="<?php echo HTTP_BASE_URL; ?>sitemap.html" target="_blank">Site map</a> | <a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=10">Contact Us</a></td>
            <td width="25%" rowspan="3" align="center" class="fonts9"><div id="thawteseal" style="text-align:center;" title="Click to Verify - This site chose Thawte SSL for secure e-commerce and confidential communications.">
<div><script type="text/javascript" src="https://seal.thawte.com/getthawteseal?host_name=order.bhatiamobile.com&amp;size=S&amp;lang=en"></script></div>
<div><a href="http://www.thawte.com/products/" target="_blank" style="color:#000000; text-decoration:none; font:bold 10px arial,sans-serif; margin:0px; padding:0px;">ABOUT SSL CERTIFICATES</a></div>
</div></td>
          </tr>
          <tr>
            <td align="center" class="fonts9">Copyright &copy; BHATIA&rsquo;S - All rights reserved</td>
            </tr>
          <tr>
            <td align="center" class="fonts9"><a href="http://www.indoushosting.com" target="_blank">Developed &amp; Managed by V3+ Web Solutions</a></td>
            </tr>
        </table></td>
      </tr>
      
    </table></td>
  </tr>
</table>
