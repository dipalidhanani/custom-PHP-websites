<?php
	$time_set=86400;
	session_set_cookie_params ($time_set, '/', '.bhatiamobile.com',TRUE, FALSE);
	session_start();
	mysql_connect('localhost','root','');
	mysql_select_db('bhatiamo_db');
	if($_REQUEST['pageno']==2)
	{
		$brandname=mysql_query("select * from brand_mst where Is_Active=1 and Brand_Id='".$_REQUEST['bid']."'");
		$bname=mysql_fetch_array($brandname);
		$value="BHATIA'S Mobile : ".$bname['Name'];
	}
	else if($_REQUEST['pageno']==3 || $_REQUEST['pageno']==17)
	{
		$prodname=mysql_query("select * from prod_mst where Is_Active=1 and Prod_Id='".$_REQUEST['pid']."'");
		$pname=mysql_fetch_array($prodname);
		$value="BHATIA'S Mobile : ".$pname['Prod_Name'];
	}
	else 
	{
	$value="BHATIA'S Mobile : The Mobile one stop shop. Latest mobiles @ cheap price";
	}
	require_once("admin/config.inc.php");
	require_once("admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	?>
    <?php
 function curPageURL() 
{
  $pageURL = 'http';
  if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
  $pageURL .= "://";
  if ($_SERVER["SERVER_PORT"] != "80") 
  {
   $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
  } 
  else 
  {
   $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
  }
  return $pageURL;
}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo CLIENT_TITLE; ?></title>
<meta name="description" content="Bhatia's Mobile Shop is your One Stop Shop For All Your Mobile needs. BhatiaMobile.com provides you with latest and comprehensive cell phones and accessories in India. We are proud of the business that we have built since 2002." />

<meta name="keywords" content="online mobile shop, online mobiles india, mobile offers, indian mobile shop, mobile shop gujarat, online mobile shop gujarat, Samsung mobile partner, Blackberry Experience Zone, iPhone Authorized Dealer, Nokia Solution Partner, cheap mobile phones" />

<meta name="author" content="Masud Vorajee"  />

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
<link href="<?php echo HTTP_BASE_URL; ?>css/css1.css" rel="stylesheet" type="text/css" />
<link href="<?php echo HTTP_BASE_URL; ?>menu_style.css" rel="stylesheet" type="text/css" />
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
            <td width="220" align="left" valign="top"><table width="220" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><?php include("left.php"); ?></td>
              </tr>
            </table></td>
            <td align="left" valign="top">
             <?php
			  $pageno=$_GET['pageno'];
			  switch($pageno)
			  {
				  case 1:
				  include('registration.php');
				  break;
				  
				  case 2:
				  include('brand.php');
				  break;
				  
				  case 3:
				  include('product_detail.php');
				  break;
				  
				  case 4:
				  include('registration_done.php');
				  break;
				  
				  case 5:
				  include('logout.php');
				  break;
				  
				  case 6:
				  include('login.php');
				  break;
				  
				  case 7:
				  include('cart_data.php');
				  break;
				  
				  case 8:
				  include('search_result.php');
				  break;
				  
				  case 9:
				  include('order_done.php');
				  break;
				  
				  case 10:
				  include('contact_us.php');
				  break;
				  
				  case 11:
				  include('franchise.php');
				  break;
				  
				  case 12:
				  include('forgotpass.php');
				  break;
				  
				  case 13:
				  include('header_search.php');
				  break;
				  
				  case 14:
				  include('about_us.php');
				  break;
				  
				  case 15:
				  include('terms.php');
				  break;
				  
				  case 16:
				  include('product_review.php');
				  break;
				  
				  case 17:
				  include('product_review_detail.php');
				  break;
				  
				  case 18:
				  include('product_review_detail_desc.php');
				  break;
				  
				  case 19:
				  include('sp_offer.php');
				  break;
				  
				  case 20:
				  include('home_new.php');
				  break;
				  
				  case 21:
				  include('accessories.php');
				  break;
				  
				  case 22:
				  include('shipping_policy.php');
				  break;
				  
				  case 23:
				  include('sitemap.php');
				  break;
				  
				  case 24:
				  include('rand_mobile.php');
				  break;
				  
				  case 25:
				  include('privacy_policy.php');
				  break;
				  
				  case 26:
				  include('franchisee_display.php');
				  break;
				  
				  case 27:
				  include('video_gallery.php');
				  break;
				  
				  case 28:
				  include('new_mobile.php');
				  break;
				  
				  case 29:
				  include('mobile_compare.php');
				  break;
				  
				  case 30:
				  include('mobile_compare_description.php');
				  break;
				  
				  default:
				  include('home.php');
				  break;
			  }
			  ?>
            </td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="top" width="950"><?php include("footer.php"); ?></td>
  </tr>
</table>

</body>
</html>
