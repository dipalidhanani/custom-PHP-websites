<?php

session_start();

require_once("include/config.php");

require_once("include/function.php");

u_Connect("cn");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>



<title><?php echo pagetitle();?></title>

<meta name="description" content="Custom made jeans | Made to your own measurements with Wash treatments. Best custom jeans all over the world | Price Starts @ US$ 56.00 only |" />

<meta name="keywords" content="Custom Jeans, Custom Made Jeans, customized jeans, Tailor Made Jeans, Tailored Jeans, tailored clothing, Make Your Own jeans, custom skinny jeans, skinny jeans, design own jeans,  custom jeans For Women, custom designer jeans,  Low Waist, denim wash treatments, Boot Cut, Narrow, stretch jeans, Cargo,  Plus Size jeans" />

<META NAME="OWNER" CONTENT="info@sqjeans.com">

<meta name="Copyright" content="SQ Jeans">

<meta name="Language" content="English">

<meta name="author" content="Hitesh Sodiwala" />

<META NAME="RATING" CONTENT="General">

<meta name="robots" content="index, follow" />

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

	background-color: #000;

	background-image: url(images/bg.jpg);

	background-position:center top;

	background-repeat:no-repeat;

}

-->

</style>

<link href="css/home.css" rel="stylesheet" type="text/css" />

</head>

<body>

<table width="960" border="0"  align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td><table width="960" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td><table width="960" border="0" align="center" cellpadding="0" cellspacing="0">

          <tr>

            <td height="32" colspan="2">&nbsp;</td>

            </tr>

          <tr>

            <td width="300" align="left" valign="top" background="images/bg3.jpg">

            <table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr>

                <td><?php include("logo.php");?></td>

              </tr>

              <tr>

                <td height="15"></td>

              </tr>

              <tr>

                <td>

				<?php 

					if(($_REQUEST["object"]==2)&&($_REQUEST["step"]!=4))

					{

						include("left_custom.php");

					}					

					else

					{

						include("left.php");

					}

				?></td>

              </tr>

                </table>

            </td>

            <td align="left" valign="top" background="images/bg3.jpg" alt="perfect fit jeans bg image"><!-- change here for bg color / background image-->

            <table width="100%" border="0" cellspacing="0" cellpadding="0" >

              <tr>

                <td><?php include("header.php");?></td>

              </tr>

              <tr>

                <td height="17"border="0" cellspacing="0" cellpadding="0" ></td>

              </tr>

              <tr>

                <td border="0" cellspacing="0" cellpadding="0"><?php

						$object=$_GET['object'];

						

						switch($object)

						{

							 case 1:

								 include("aboutus.php"); 

							 break;	

							 

							 case 2:

								 include("customjeans.php"); 

							 break;

							 

							 case 3:

								 include("howtoorder.php"); 

							 break;

							 

							 case 4:

								 include("contactus.php"); 

							 break;		

							 

							 case 5:

								 include("returnpolicy.php"); 

							 break;

							 

							 case 6:

								 include("termsandconditions.php"); 

							 break;	

							 

							 case 7:

								 include("payment.php"); 

							 break;		

							 

							 case 8:

								 include("ipn.php"); 

							 break;

							 

							 case 9:

								 include("myprofile.php"); 

							 break;

							 

							 case 10:

								 include("myorders.php"); 

							 break;

							 

							 case 11:

								 include("myorderdetails.php"); 

							 break;

							 

							 case 12:

								 include("changejeans.php"); 

							 break;

							 

							 case 13:

								 include("gallery0.php"); 

							 break;

							 

							 case 101:

								 include("gallery1.php"); 

							 break;

							 

							 case 102:

								 include("gallery2.php"); 

							 break;

							 

							 case 103:

								 include("gallery3.php"); 

							 break;

							 

							 case 104:

								 include("gallery4.php"); 

							 break;							 

							 

							 case 14:

								 include("mydetails.php"); 

							 break;

							 

							 case 15:

								 include("updateprofile.php"); 

							 break;

							 

							 case 16:

								 include("changepassword.php"); 

							 break;

							 

							 case 17:

								 include("shipping.php"); 

							 break;

							 

							 case 18:

								 include("cancelation_or_modification_of_order.php"); 

							 break;

							 

							 case 19:

								 include("privacypolicy.php"); 

							 break;

							 

							 case 20:

								 include("offlinepaymentdone.php"); 

							 break;

							 

							 case 21:

								 include("register.php"); 

							 break;

							 

							 case 22:

								 include("forgotpassword.php"); 

							 break;

							 

							 case 23:

								 include("error.php"); 

							 break;

							 

							 case 24:

								 include("checkout.php"); 

							 break;

							 

							 case 25:

								 include("mycart.php"); 

							 break;

							 

							 case 26:

								 include("notifyurl.php"); 

							 break;

							 

							 case 27:

								 include("changemycartjeans.php"); 

							 break;

							 

							 case 29:

								 include("shipping rates.php"); 

							 break;

							 

							 case 30:

								 include("Bank Account.php"); 

							 break;

							 

							 case 32:

								 include("new offer.php"); 

							 break;

							 

							 case 33:

								 include("testimonials.php"); 

							 break;

							 

							 case 34:

								 include("ourconcept.php"); 

							 break;

							 

							 case 35:

								 include("partner.php"); 

							 break;

							 

							 case 41:

								 include("inquiry.php"); 

							 break;

							 

							 case 200:

								 include("fabricsindex.php"); 

							 break;

							 

							 case 201:

								 include("fabrics elvira.php"); 

							 break;

							 

							 case 202:

								 include("fabrics angel.php"); 

							 break;

							 

							 case 203:

								 include("fabrics arnold.php"); 

							 break;

							 

							 case 204:

								 include("fabrics pussycat.php"); 

							 break;

							 

							 case 205:

								 include("fabrics bakhos.php"); 

							 break;

							 

							 case 206:

								 include("fabrics black pool.php"); 

							 break;

							 

							 case 207:

								 include("fabrics jimmy.php"); 

							 break;

							 

							 case 208:

								 include("fabrics roots.php"); 

							 break;

							 

							 case 209:

								 include("fabrics 5921.php"); 

							 break;

							 

							 case 210:

								 include("fabrics 2220.php"); 

							 break;

							 

							 case 211:

								 include("fabrics power.php"); 

							 break;

							 

							 case 212:

								 include("fabrics brooklyn.php"); 

							 break;
							 
							 case 213:

								 include("select_fabric.php"); 

							 break;

							 

							 default:

							  include("main.php"); 

							 break;

						}

		 			?></td>

              </tr>

            </table>

            </td>

          </tr>

          

          

            <tr>

            <td colspan="2" align="left" valign="top" background="images/bg3.jpg" alt="skinny jeans bg image">&nbsp;</td>

            </tr>

        </table></td>

      </tr>

      <tr>

        <td><?php include("footer.php");?></td>

      </tr>

    </table></td>

  </tr>

</table>



<map name="Map" id="Map">

  <area shape="rect" coords="16,7,89,33" href="index.php" alt="Home" title="Home" />

  <area shape="rect" coords="100,6,197,36" href="aboutus.html" alt="About Us" title="About Us" />

  <area shape="rect" coords="205,5,343,37" href="customjeans.html" alt="Custom Jeans"  title="Custom Jeans"/>

  <area shape="rect" coords="356,6,518,35" href="gallery.html" alt="Photo Gallery" title="Photo Gallery" />

  <area shape="rect" coords="529,6,641,35" href="contactus.html" alt="Contact us" title="Contact us" />

</map>







<script type="text/javascript">



  var _gaq = _gaq || [];

  _gaq.push(['_setAccount', 'UA-25596194-2']);

  _gaq.push(['_trackPageview']);

  (function() {

    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;

    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';

    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);

  })();

</script>



<!-- Histats.com  START (hidden counter)-->

<script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>

<a href="http://www.histats.com" target="_blank" title="free tracking" ><script  type="text/javascript" >

try {Histats.start(1,1826387,4,0,0,0,"");

Histats.track_hits();} catch(err){};

</script></a>

<noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?1826387&101" alt="free tracking" border="0"></a></noscript>

<!-- Histats.com  END  -->





<!-- Start of StatCounter Code for Default Guide -->

<script type="text/javascript">

var sc_project=7213366; 

var sc_invisible=1; 

var sc_security="329c0566"; 

</script>

<script type="text/javascript"

src="http://www.statcounter.com/counter/counter.js"></script>

<noscript><div class="statcounter"><a title="free hit

counters" href="http://statcounter.com/free-hit-counter/"

target="_blank"><img class="statcounter"

src="http://c.statcounter.com/7213366/0/329c0566/1/"

alt="The best tailor made jeans"></a></div></noscript>

<!-- End of StatCounter Code for Default Guide -->







</body>

</html>

