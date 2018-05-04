<?php

if($_SESSION['sqjeansadminlogin']=="")

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

            <li><a href="#">Orders</a>

            	<ul>                

                	<li><a href="orders.php">Paypal</a></li>

                	<li><a href="orders.php?paymentmethod=1">Net Banking</a></li>

                    <li><a href="orders.php?paymentmethod=2">Cheque</a></li>

                    <li><a href="orders.php?paymentmethod=3">Cash</a></li>

                    <li><a href="orders.php?paymentmethod=4">Demand Draft</a></li>              

              	</ul>

            </li>            

            <li><a href="materials.php">Fabrics</a></li>  

            <li><a href="specialwash.php">Special Wash</a></li>

            <li><a href="threads.php">Thread</a></li> 

            <li><a href="#">Styles</a>

              <ul>    

                    <li><a href="pocketstyles.php?type=1">Front Pocket Style</a></li>            

                    <li><a href="pocketstyles.php?type=2">Back Pocket Style</a></li>

                    <li><a href="flystyles.php">Fly Style</a></li>

                    <li><a href="buttonrivets.php">Button & Rivets</a></li>   
                    <li><a href="beltstyles.php">Belt Style</a></li>   
                    <li><a href="loopsstyles.php">Loops Style</a></li>   
                     <li><a href="embroiderystyles.php">Embroidery Style</a></li>                       

              </ul>

            </li>   

            <li><a href="measurement.php">Measurement</a></li> 

            <li><a href="shipping.php">Shipping</a></li>

            <li><a href="discount.php">Discount</a></li>

            <li><a href="#">Users</a>
            <ul>
            <li>
            <a href="registeredusers.php">Registered Users</a>
            </li>
            <li>
            <a href="resellers.php">Resellers</a>
            </li>
            </ul>            
            </li> 

            <li><a href="inquiry.php">Inquiry</a></li> 

            <li><a href="gallery.php">Gallery</a></li> 

            </ul>

            </div></td>

  </tr>

</table>

