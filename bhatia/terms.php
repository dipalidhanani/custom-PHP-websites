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
                                <td class="title"><strong>Terms &amp; Condition</strong></td>
                              </tr>
                            </table></td>
                            <td width="5"><img src="<?php echo HTTP_BASE_URL; ?>images/box_04.jpg" width="5" height="41" /></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" bgcolor="#FFFFFF" ><table width="100%" border="0" cellpadding="3" cellspacing="0" class="border1" style="padding-left:7px;padding-right:7px;">
                          <tr>
                            <td class="title_10" height="5"></td>
                          </tr>
                          <tr>
                            <td class="title_10" style="text-align:justify"> This Agreement is a legal contract between the Customer and BhatiaMobile.com. The Customer accepts this Agreement by making a purchase, placing an order, or otherwise shopping on the website. The terms and conditions of this Agreement are subject to change without prior notice, except that the terms and conditions posted on the website at the time the Customer initially places or modifies an order will govern the order in question. </td>
                          </tr>
                          <tr>
                            <td height="5px"></td>
                          </tr>
                          <tr>
                            <td class="title_11"> <strong>GOVERING LAW CAUSE </strong></td>
                          </tr>
                          <tr>
                            <td class="title_10" style="text-align:justify" > This User Agreement shall be construed in accordance with the applicable laws of India. The Courts at Surat shall have exclusive jurisdiction in any proceedings arising out of this agreement. Any dispute or difference either in interpretation or otherwise, of any terms of this User Agreement between the parties hereto, the same shall be referred to an independent arbitrator who will be appointed by Bhatia Communications Pvt. LTD. and his decision shall be final and binding on the parties hereto. The above arbitration shall be in accordance with the Arbitration and Conciliation Act, 1996 as amended from time to time. The arbitration shall be held in Gujarat. The High Court of judicature at Gujarat alone shall have the jurisdiction and the Laws of India shall apply. </td>
                          </tr>
                          <tr>
                            <td height="5px"></td>
                          </tr>
                          <tr>
                            <td class="title_11"> <strong>PRICING AND INFORMATION </strong></td>
                          </tr>
                          <tr>
                            <td class="title_10" style="text-align:justify"> All pricing subject to change. For all prices, products and offers, BhatiaMobile.com reserves the right to make adjustments due to changing market conditions, product discontinuation, manufacturer's price changes, errors in advertisements and other extenuating circumstances. BhatiaMobile.com uses its best efforts to put accurate and up-to-date information on the Site, but BhatiaMobile.com makes no warranties or representations as to the website's accuracy. BhatiaMobile.com assumes no liability or responsibility for any errors or omissions in the content on the website. </td>
                          </tr>
                          <tr>
                            <td height="5px"></td>
                          </tr>
                          <tr>
                            <td class="title_11"> <strong>ORDERS </strong></td>
                          </tr>
                          <tr>
                            <td class="title_10" style="text-align:justify"> Orders are not bindingupon BhatiaMobile.com until accepted and confirmed by BhatiaMobile.com. Once an order has been placed and accepted by BhatiaMobile.com, the order is not cancelable unless the shipment is unavoidably delayed. </td>
                          </tr>
                          <tr>
                            <td height="5px"></td>
                          </tr>
                          <tr>
                            <td class="title_11"> <strong>PAYMENT POLICY </strong></td>
                          </tr>
                          <tr>
                            <td class="title_10" style="text-align:justify"> We accept payments via All major credit cards (online facility), wire transfer, cheques &amp; drafts name <strong>Bhatia Comm. &amp; Retail(I) Pvt. Ltd. </strong> (offline facility). Please note that shipping will be made after the payments have been cleared in offline facility. </td>
                          </tr>
                          <tr>
                            <td height="5px"></td>
                          </tr>
                          <tr>
                            <td class="title_10" style="text-align:justify"> For all other payment methods, please contact us at sales@bhatiamobile.com </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          
                        </table></td>
                      </tr>
                    </table>