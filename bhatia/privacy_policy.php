<?php session_start();
	require_once("admin/config.inc.php");
	require_once("admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	require_once ('pagination/pagination.php');
	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	$page = ($page == 0 ? 1 : $page);
	$perpage = 3;//limit in each page
	$startpoint = ($page * $perpage) - $perpage;
	?>
<link href="css/css1.css" rel="stylesheet" type="text/css" />
<link href="pagination/style2.css" rel="stylesheet" type="text/css" />

<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="5"><img src="<?php echo HTTP_BASE_URL; ?>images/box_01.jpg" width="5" height="41" /></td>
                            <td align="left" valign="top" background="<?php echo HTTP_BASE_URL; ?>images/box_02.jpg" style="background-repeat:repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td height="6" colspan="2" align="left" valign="middle"></td>
                              </tr>
                              <tr>
                                <td width="30" align="left" valign="middle"><img src="<?php echo HTTP_BASE_URL; ?>images/Arrow.png" width="24" height="24" /></td>
                                <td class="title"><strong>Privacy  Policy</strong></td>
                              </tr>
                            </table></td>
                            <td width="5"><img src="<?php echo HTTP_BASE_URL; ?>images/box_04.jpg" width="5" height="41" /></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" bgcolor="#FFFFFF" ><table width="100%" border="0" align="left" cellpadding="6" cellspacing="0" class="title_10" style="padding-left:10px;padding-right:10px;">
                          <tr>
                            <td class="title_10" style="text-align:justify">Thank you for shopping with BhatiaMobile.com. We have done our best to ensure the security and privacy of your transactions with us. Rest assured that your credit card information and other personal data will be treated with the highest standards of safety, security, and confidentiality.</td>
                          </tr>
                          <tr>
                            <td style="text-align:justify">Our Privacy Policy is designed to assist you-businesses, consumers and the general public-in understanding how we collect and use the personal information you provide to us, and to help you make informed decisions when using our web site and all of our related services therein.</td>
                          </tr>
                          <tr>
                            <td class="title_11" style="text-align:justify"><strong>Personal Information You Choose to Provide </strong></td>
                          </tr>
                          <tr>
                            <td style="text-align:justify">Registration information you will provide us information about yourself, your firm or company, and your practices when you register to buy our products.</td>
                          </tr>
                          <tr>
                            <td class="title_11" style="text-align:justify"><strong>How Do We Use the Information That You Provide to Us?</strong></td>
                          </tr>
                          <tr>
                            <td style="text-align:justify">Generally, we use personal information for purposes of managing and expanding our business activities, providing customer service and making available other products and services to our customers and prospective customers. Occasionally, we may also use the information we collect to notify you about important changes to our Web site, new services and special offers we think you will find valuable.</td>
                          </tr>
                          <tr>
                            <td class="title_11" style="text-align:justify"><strong>Choice/Opt-out</strong></td>
                          </tr>
                          <tr>
                            <td style="text-align:justify">We allow you the choice to opt-out of having your information used for purposes not directly related to our site, when we ask for the information.</td>
                          </tr>
                          <tr>
                            <td style="text-align:justify">
                            Until you explicitly opt-in for the first time we consider you in the opt-out category. We always notify our customers when their information is being collected by any outside parties. We do this so our users can make an informed choice as to whether or not they should proceed with services that require an outside party.
                            </td>
                          </tr>
                          <tr>
                            <td style="text-align:justify">If you do not wish to receive any promotional or marketing e-mails and/or surface mail marketing letters, you may opt-out of receiving those communications by sending an e-mail with the subject line "Unsubscribe from Mail List" to  info@BhatiaMobile.com.</td>
                          </tr>
                          <tr>
                            <td class="title_11" style="text-align:justify"><strong>How Do We Protect Your Information?</strong></td>
                          </tr>
                          <tr>
                            <td style="text-align:justify">Secure Information Transmissions Email is not recognized as a secure medium of communication. For this reason, we request that you do not send private information to us by email. Some of the information you may enter on our Web site may be transmitted securely via Secure Sockets Layer SSL, 128 bit encryption services. Pages utilizing this technology will have URLs that start with HTTPS instead of HTTP. </td>
                          </tr>
                          <tr>
                            <td class="title_11" style="text-align:justify"><strong>How Can You Access and Correct Your Information?</strong></td>
                          </tr>
                          <tr>
                            <td style="text-align:justify">You may request access to all your personally identifiable information that we collect online and maintain in our database by contact us, see the above contact information.</td>
                          </tr>
                          <tr>
                            <td class="title_11" style="text-align:justify"><strong>Your Consent</strong></td>
                          </tr>
                          <tr>
                            <td style="text-align:justify">By using our Web site you consent to our collection and use of your personal information as described in this Privacy Policy. If we change our privacy policies and procedures, we will post those changes on our Web site to keep you aware of what information we collect, how we use it and under what circumstances we may disclose it. At any time you may request to view any and all changes and updates, via surface mail.</td>
                          </tr>
                          <tr>
                            <td class="title_12" style="text-align:justify"><strong class="title_11">Notification of Changes</strong></td>
                          </tr>
                          <tr>
                            <td style="text-align:justify">The Privacy Policy is subject to periodic review and change. In order to view the current Privacy Policy, simply check this section of the website. If we materially change our privacy policy, we will post those changes to this privacy statement and other places we deem appropriate so users are aware of what information we collect, how it is used, and under what circumstances, if any, we disclose it. In some cases where we post a notice, we may also email user who have opted to receive communications from us, notifying them of the changes in our privacy practices.</td>
                          </tr>
                          <tr>
                            <td style="text-align:justify">We've made every effort to make our system a secure one. In order to provide our customers with the most secure and private online shopping environment available, BhatiaMobile.com uses state-of-the-art technology to protect credit card numbers and other confidential information you provide when placing an order. Any information that you send to us while at our secure site is "encrypted" before it is transmitted over the web.</td>
                          </tr>
                          <tr>
                            <td style="text-align:justify">BhatiaMobile.com does not sell, rent, or trade customer information, or any other information, which may identify you, to any outside party under any circumstances. Your information is only used to ensure secure ordering and to provide a more personalized shopping experience.</td>
                          </tr>
                          <tr>
                            <td style="text-align:justify">BhatiaMobile.com does not reveal customer information except to complete transactions with our third party banking institution. The banking institution we do banking with is under strict responsibility to keep your information private and protected.</td>
                          </tr>
                          <tr>
                            <td style="text-align:justify">BhatiaMobile.com is committed to providing all customers with a world-class shopping experience. In order to measure how well we are doing and to better serve you with our product offerings, from time-to-time we may contact you via email and solicit your participation in research.</td>
                          </tr>
                          <tr>
                            <td style="text-align:justify">BhatiaMobile.com may also occasionally notify you via email with recommendations or special offers of new products, prices, or any other promotions. You may request to remove yourself from future efforts of this kind at any time.</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          
                        </table></td>
                      </tr>
                    </table>