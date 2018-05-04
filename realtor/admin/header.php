<?php
if($_SESSION['rm_admin_id']=="")
{
	echo "<script type=\"text/javascript\">document.location.href='login.php'; </script>\n";
	exit();
}
?>
<link rel="stylesheet" href="menu_style.css" type="text/css" />
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
</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="125"><a href="main.php"><img src="images/v3+web.png" width="125" he1ight="125" border="0" /></a></td>
        <td>&nbsp;</td>
        <td width="250" align="center" valign="top"><table border="0" align="right" cellpadding="2" cellspacing="0">
        
        <tr>
        <td height="20"></td>
        </tr>
        
         <tr>
            <td class="normal_fonts9"><a href="main.php"><strong>Admin Panel Home</strong></a></td>
            <td class="normal_fonts9">|</td>
            <td class="normal_fonts9"><a href="http://www.indoushosting.com" target="_blank"><strong>Website Home</strong></a>&nbsp;&nbsp;</td>
          </tr>
          
        <tr>
        <td height="10"></td>
        </tr>
        
          <tr>
            <td class="normal_fonts9"><a href="changepassword.php"><strong>Change Password</strong></a></td>
            <td class="normal_fonts9">|</td>
            <td class="normal_fonts9"><a href="logout.php"><strong>Logout</strong></a>&nbsp;&nbsp;</td>
          </tr>
          
            <tr>
        <td height="20"></td>
        </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><div class="menu">
			<ul>
                <li><a href="main.php">Home</a></li>
			      <li><a href="city.php">City</a></li>
                <li><a href="area.php">Street</a></li>
                <li><a href="registered_users.php">Registered Users</a></li>
                <li><a href="property_typelist.php">Property Type</a></li>
              <!--  <li><a href="propertylist.php">Property Type</a></li>-->
                <li><a href="propertyDetail_list.php">Property Detail</a></li>
                <li><a href="testimonial.php">Testimonials</a></li>
                <li><a href="inquiry_display.php">Inquiry</a></li>
                <li><a href="contact_display.php">Contact Us</a></li>
              
            </ul>
            </div></td>
  </tr>
</table>
