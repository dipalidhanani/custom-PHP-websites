<?php
if($_SESSION['kidsadminlogin']=="")
{
	echo "<script type=\"text/javascript\">document.location.href='login.php'; </script>\n";
	exit();
}
else
	{
	$query = "select * from kid_admin_mast where kid_admin_id = '".$_SESSION['kidsadminlogin']."'";
	$rs = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($rs);
	$a = $row['kid_admin_name'];
	$ad = $row['kid_admin_is_master'];
}

$permission_dataentry_view=1;
$permission_dataentry_add=1;
$permission_dataentry_edit=1;
$permission_dataentry_remove=1;
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
        <td width="125"><a href="main.php"><img src="images/v3+web.png" width="125" height="125" border="0" /></a></td>
        <td>&nbsp;</td>
        <td width="250" align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="normal_fonts14_black"><strong>Welcome   		<?php echo $a; ?></strong></td>
              </tr>
              <tr>
                <td height="10"></td>
              </tr>
              <tr>
                <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="10">&nbsp;</td>
                    <td class="normal_fonts12_black"><a href="logout.php">Logout</a> |
                    <a href="changepassword.php" class="normal_fonts10">Change Password</a>
                    </td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><div class="menu">
			<ul>
                <li><a href="main.php">Home</a></li>
                <li><a href="#">Orders</a>
                <ul>
					   <li><a href="orders.php?paymentmethod=1">Online - Paypal</a></li>
                       <li><a href="orders.php?paymentmethod=2">Cheque - Demand Draft</a></li>
                       <li><a href="orders.php?paymentmethod=3">Cash on Delivery</a></li>
                </ul>
               </li>
               <li><a href="#">Category</a>
              <ul>
                <li><a href="category_add.php">Add Category</a></li>
                <li><a href="category_view.php">View Category</a></li>               
              </ul>
              </li>
               <!--<li><a href="coupon.php">Coupon</a></li>-->
               <li><a href="disProduct.php">Products</a></li>    
            
               <li><a href="shipping.php">Shipping</a></li>          
               <li><a href="pages.php">Company Info</a></li>
               <li><a href="#">Users</a>
               <ul>
               		   <li><a href="disAdmin.php">Admin Management</a></li>
                       <li><a href="registeredusers.php">Registered Users</a></li>
                       <li><a href="newsletter_subscriber.php">Newsletter Subscriber</a></li>                      
               </ul>
               </li>
			 
               <li><a href="brand.php">Brand</a></li>
               <li><a href="offers.php">Offers</a></li>
                  <li><a href="feedback.php">Feedback</a></li>
               <li><a href="disColor.php">Colors</a></li>
               <li><a href="#">Extra</a>
                   <ul>
               		   <li><a href="inquiry_contactus.php">Contact Inquiry</a></li>
                      <li><a href="testimonial.php">Testimonials</a></li>
                       <li><a href="slider.php">Slider</a></li>
                   </ul>
               </li>
              
            </ul>
            </div></td>
  </tr>
</table>
