<?php 
session_start();
include("include/config.php");
?>
<html>
<head>
<title>RM Realtor</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<?php include("font.php"); ?>
<link href="css/home.css" rel="stylesheet" type="text/css">
 <link rel="stylesheet" media="screen,projection" href="css/ui.totop.css" />
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td colspan="2" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td><?php include("header.php"); ?></td>
                </tr>
            </table></td>
        </tr>
        <tr>
            <td width="70%" valign="top" bgcolor="#FFFFFF"><?php
			$pageno=$_REQUEST['pageno'];
			switch($pageno)
			{
				 case 1:
					 include("making_an_offer.php");
					 break;
					 
			    case 2:
					 include("closing_costs.php");
					 break;
					 
			    case 3:
					 include("land_transfer_tax.php");
					 break;
					 
				case 4:
					 include("title_insurance_explained.php");
					 break;
					 
				case 5:
					 include("renting_vs_home_ownership.php");
					 break;
					 
				case 6:
					 include("elements_of_an_offer_explained.php");
					 break;
					 
				case 7:
					 include("greater_savings_with_a_larger_down_payment.php");
					 break;
					 
			   case 8:
					 include("what_to_expect_from_a_real_estate_professional.php");
					 break;
					 
				case 9:
					 include("selling_your_home.php");
					 break;
					 
			  case 10:
					 include("pricing_your_property.php");
					 break;
					 
			  case 11:
					 include("free_home_evaluation.php");
					 break;
					 
					 
			 case 12:
					 include("little_improvements_big_returns.php");
					 break;
					 
			case 13:
				 include("holding_a_successful_open_house.php");
				 break;
				 
				 
			case 14:
					 include("real_estate_terms.php");
					 break;
					 
					 
			case 15:
					 include("mortgage_terms.php");
					 break;
			case 16:
					 include("user_register.php");
					 break;
			case 17:
					 include("thanks.php");
					 break;
			case 18:
					 include("login.php");
					 break;
			case 19:
					 include("property_search.php");
					 break;
			case 20:
					 include("property_search_login.php");
					 break;
			case 21:
					 include("inquiry.php");
					 break;
			case 22:
					 include("contactus.php");
					 break;
			case 23:
					 include("testimonials.php");
					 break;
			case 24:
					 include("property_add_step1.php");
					 break;
			case 25:
					 include("property_add_step2.php");
					 break;
			case 26:
					 include("property_search_login_details.php");
					 break;
			case 27:
					 include("property_search_login_details_inquiry.php");
					 break;
			case 28:
					 include("testimonials_list.php");
					 break;
			case 29:
					 include("land_transfer.php");
					 break;	
			case 30:
					 include("mortgage.php");
					 break;	
			case 31:
					 include("cmhc_calc.php");
					 break;	
			case 32:
					 include("rent_vs_buy.php");
					 break;	
			case 33:
					 include("myprofile.php");
					 break;	
					 
			case 34:
					 include("ontario_real_estate.php");
					 break;	
					 
			case 35:
					 include("local_market_info.php");
					 break;
			case 36:
					 include("agency_relationships.php");
					 break;
			case 37:
					 include("transportation.php");
					 break;
					 
			case 38:
					 include("aboutus.php");
					 break;
			case 39:
					 include("property_list.php");
					 break;
			
					 
				 default:
					 include("middle.php"); 
				 break;
			}				 
		 ?>	</td>
            <td width="30%" valign="top" bgcolor="#E0E0E0"><?php include("right.php"); ?></td>
        </tr>
        <tr>
            <td colspan="2" valign="top" bgcolor="#FFFFFF"><?php include("fotter.php"); ?>
</td>
</tr>
</table>
</td>
</tr>
</table>
	<!-- easing plugin ( optional ) -->
	<script src="js/easing.js" type="text/javascript"></script>
	<!-- UItoTop plugin -->
	<script src="js/jquery.ui.totop.js" type="text/javascript"></script>
	<!-- Starting the plugin -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
</body>
</html>
