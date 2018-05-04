<!--
  jQuery library
-->
<script type="text/javascript" src="lib/jquery-1.4.2.min.js"></script>
<!--
  jCarousel library
-->
<script type="text/javascript" src="lib/jquery.jcarousel.min.js"></script>
<!--
  jCarousel skin stylesheet
-->
<script type="text/javascript">

function mycarousel_initCallback(carousel)
{
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};

jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
        auto: 2,
        wrap: 'last',
        initCallback: mycarousel_initCallback
    });
});

</script>
<link rel="stylesheet" type="text/css" href="skins/tango/skin.css" />
<link href="css/home.css" rel="stylesheet" type="text/css">
<link href="css/css1.css" rel="stylesheet" type="text/css" />
<table width="985" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="10"></td>
  </tr>
  <tr>
    <td height="171" align="left" valign="top" background="images/footer_bg.jpg" bgcolor="#D6D4D5" style="background-repeat:repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><div id="wrap" style="padding-right:15px;">
              <ul id="mycarousel" class="jcarousel-skin-tango">
              <?php
			  $logo=mysql_query("select * from logo_mst order by Disp_Order");
			  while($l=mysql_fetch_array($logo))
			  {
			  ?>
                <li><img src="logo/<?php echo $l['Is_Image']; ?>" height="40"  border="0" /></li>
              <?php } ?>  
              </ul>
            </div></td>
          </tr>
          <tr>
            <td  align="center"><table width="950" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="1" background="images/line.jpg"></td>
  </tr>
</table>
</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="25" align="center" valign="middle" class="fonts9"><a href="index.php?pageno=14">About us</a> | <a href="index.php?pageno=15">Terms &amp; Conditions</a> | <a href="index.php?pageno=22"> Shipping Policy </a>| <a href="index.php?pageno=11">Franchisee Inquiries</a> | <a href="sitemap.html">Site map</a> | <a href="index.php?pageno=10">Contact Us</a></td>
      </tr>
      <tr>
        <td height="20" align="center" valign="middle" class="fonts9">Copyright &copy; BHATIA&rsquo;s - All rights reserved</td>
      </tr>
      <tr>
        <td height="20" align="center" valign="middle" class="fonts9"><a href="http://www.indoushosting.com" target="_blank">Developed &amp; Managed by V3+ Web Solutions</a></td>
      </tr>
    </table></td>
  </tr>
</table>
