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
                                <td class="title"><strong>Shipping  Policy</strong></td>
                              </tr>
                            </table></td>
                            <td width="5"><img src="<?php echo HTTP_BASE_URL; ?>images/box_04.jpg" width="5" height="41" /></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" bgcolor="#FFFFFF" ><table width="100%" border="0" align="left" cellpadding="10" cellspacing="0" class="title_10" style="padding-left:10px;padding-right:10px;">
                          <tr>
                            <td class="title_10" style="text-align:justify">Your order is thoroughly reviewed by our billing department to ensure that the order is accurate, the payment method is valid, and you are authorized to use this payment method. Once your order has passed the rigorous review by our billing Department, it is sent to our warehouse for shipment.</td>
                          </tr>
                          <tr>
                            <td style="text-align:justify"> Please note, credit card processing can take up to 1-2 business days ( Depending on the accuracy of the information given to us by the customer ). </td>
                          </tr>
                          <tr>
                            <td style="text-align:justify"> If the item(s) on your order are in-stock, we will ship them as soon as possible from our main Surat warehouse or from one of our franchisee located in India. If the item(s) on your order are out of stock, they will not be shipped until we have received and processed the backordered inventory in our warehouse. </td>
                          </tr>
                          <tr>
                            <td style="text-align:justify"> Total time of delievery is based on the amount of time it takes to get payment authorization, order processing, and the transit time from the carrier. in stock items usually ship within 24 hours. </td>
                          </tr>
                          <tr>
                            <td style="text-align:justify"> If one or more items in your order are not in stock, your order may split into two or more orders. We will charge and ship the items in stock and the rest will be placed under back order. Remaining items will be charged and shipped at a later date as per availability. </td>
                          </tr>
                          <tr>
                            <td style="text-align:justify"> <strong>Note:</strong> Some items might be posted as &quot;In Stock&quot; on our web site that are not available for shipping, as we process limited quantity orders on first come first serve bases and it may take time to update the stock status on our website. </td>
                          </tr>
                          <tr>
                            <td style="text-align:justify"> If your order must be shipped in multiple boxes, or in separate shipments in the event an item is not in stock and must ship at a later date, shipping and handling charges for the entire order will be assessed at the point when the first item is shipped. We charge only ONCE for shipping and handling, for the entire order. Should you have any questions or concerns regarding these charges, feel free to email us at support@bhatiamobile.com </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          
                        </table></td>
                      </tr>
                    </table>