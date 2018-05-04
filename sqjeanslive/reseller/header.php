<?php

if($_SESSION['sqjeansresellerlogin']=="")

{

	echo "<script type=\"text/javascript\">document.location.href='login.php'; </script>\n";

	exit();

}

?>

<link rel="stylesheet" href="css/menu_style.css" type="text/css" />

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
        <td width="125"><a href="http://www.indoushosting.com"><img src="images/v3+web.png" width="125" height="125" border="0" /></a></td>
        <td align="center" class="normal_fonts14_black">&nbsp;</td>
        <td width="160" align="center" valign="middle" class="normal_fonts12_black">
        <a href="main.php"><img src="images/sqjeanslogo.png" width="222" height="120" border="0"/></a></td>
      </tr>
    </table></td>

  </tr>

  <tr>

    <td><div class="menu">

			<ul>

            <li><a href="#">My Profile</a>

            	<ul>                

                	
                	<li><a href="mydetails.php">My Details</a></li>

                   <!-- <li><a href="updateprofile.php">Update Profile</a></li>-->

                    <li><a href="changepassword.php">Change Password</a></li>

                    <li><a href="logout.php">Logout</a></li>
                   
              	</ul>

            </li>            

            <li><a href="myorders.php">My Orders</a></li>  

            <li><a href="place_order.php">Place Order</a></li>

         
            </ul>

            </div></td>

  </tr>

</table>

