<?php

	$time_set=86400;

	session_set_cookie_params ($time_set , '/', '.bhatiamobile.com',TRUE, FALSE);

	session_start();

	$value="BHATIA'S Mobile : The Mobile one stop shop. Latest mobiles @ cheap price";

	require_once("../admin/config.inc.php");

	require_once("../admin/Database.class.php");

	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 

	$db->connect();

	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title><?php echo CLIENT_TITLE; ?></title>

<meta name="description" content="Bhatia's Mobile Shop is your One Stop Shop For All Your Mobile needs. BhatiaMobile.com provides you with latest and comprehensive cell phones and accessories in India. We are proud of the business that we have built since 2002." />



<meta name="keywords" content="online mobile shop, online mobiles india, mobile offers, indian mobile shop, mobile shop gujarat, online mobile shop gujarat, Samsung mobile partner, Blackberry Experience Zone, iPhone Authorized Dealer, Nokia Solution Partner, cheap mobile phones" />



<meta name="author" content="Masud Vorajee" />



<meta name="robots" content="index, follow" />

<link rel="stylesheet" href="virtuemart.css" type="text/css">



<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

	background-color: #d5d4d4;

}

-->

</style>

<link href="<?php echo HTTP_BASE_URL_ORDER; ?>css/css1.css" rel="stylesheet" type="text/css" />

<link href="<?php echo HTTP_BASE_URL_ORDER; ?>menu_style.css" rel="stylesheet" type="text/css" />

</head>



<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td valign="bottom" bgcolor="#EEEEEE"><?php include("header.php"); ?></td>

  </tr>

  <tr>

    <td align="left" valign="top"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0" class="borderbox">

      <tr>

        <td bgcolor="#eeeeee"><table width="980" border="0" cellspacing="10" cellpadding="0">

          <tr>

            <td align="left" valign="top"><table width="220" border="0" cellspacing="0" cellpadding="0">

              <tr>

                </tr>

              </table>

              <?php

			  $pageno=$_GET['pageno'];

			  switch($pageno)

			  {

				  case 1:

				  include('update_profile.php');

				  break;

				  

				  case 2:

				  include('user_order.php');

				  break;

				  

				  case 3:

				  include('user_order_view.php');

				  break;

				  

				  case 4:

				  include('user_invoice.php');

				  break;

				  

				  case 5:

				  include('user_invoice_view.php');

				  break;

				  

				  case 6:

				  include('login.php');

				  break;

				  

				  case 7:

				  include('cart_data.php');

				  break;

				  

				  default:

				  include('acc_home.php');

				  break;

			  }

			  ?>            </td>

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

