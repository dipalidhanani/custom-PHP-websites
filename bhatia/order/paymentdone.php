<?php session_start();
//$today=date('Y-m-d');
//$o/rderno=mysql_fetch_array(mysql_query("select * from order_mst where User_Id='".$_SESSION['buserid']."' and Order_Date='".$today."' order by Order_No Desc,Order_Date desc limit 1")); 
//if(mysql_affected_rows()>0)
//{
//	$order_no=$orderno['Order_No'];
//}
//echo $_SESSION["hdfc_payment_result"];
?>
<link href="css/css1.css" rel="stylesheet" type="text/css" />

<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="5"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_01.jpg" width="5" height="41" /></td>
                        <td align="left" valign="top" background="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_02.jpg" style="background-repeat:repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="6" colspan="3" align="left" valign="middle"></td>
                            </tr>
                          <tr>
                            <td width="30" align="left" valign="middle"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/Arrow.png" width="24" height="24" /></td>
                            <td class="title">Order Completed</td>
                            <td width="100" align="right" valign="middle" class="title_11"><a href="invoice_print.php" target="_blank" class="title_11">Print Invoice</a></td>
                            </tr>
                          </table></td>
                        <td width="5"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_04.jpg" width="5" height="41" /></td>
                        </tr>
                      </table></td>
                    </tr>
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
                      <tr>
                        <td align="left" valign="middle" bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" class="title_10">
                          <tr>
                            <td colspan="2" align="left" valign="middle"></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td class="Left_Font_10"><p align="justify"><span class="hyper_link_10">Thank you for placing an order with BHATIAMOBILE.COM </span></p>
                               <p align="justify"><span class="hyper_link_10">Your <strong>order number</strong> is</span> : <strong>
                              <?php 
							  $order_new=mysql_query("SELECT * FROM prod_order_mst WHERE order_invoice_Id='".$_SESSION["hdfc_payment_transactionid"]."'");
	$ord=mysql_fetch_array($order_new);
	$order_id=$ord['Order_Id'];
	
	$order_mst=mysql_query("SELECT * FROM order_mst WHERE Order_Id='".$order_id."' and 	User_Id='".$_SESSION['buserid']."'");
	$or=mysql_fetch_array($order_mst);
	echo $or['Order_No'];
							  ?>
                              </strong></p>
                              
                              <p align="justify"><span class="hyper_link_10">Your <strong>order transaction ID </strong> is</span> : <strong> <?php echo $_SESSION["hdfc_payment_transactionid"];?>
                              </strong></p>
                              
<p align="justify" class="hyper_link_10">Our Order department will review and process the order manually within next 6 to 24 hours. Once processed, we will then send the order for dispatch. The whole process can take anywhere from 4 to 12 days.</p>
<p align="justify" class="hyper_link_10">Please check our <a href="http://www.bhatiamobile.com/index.php?pageno=22">Shipping Policy</a> for more information.</p>
<p align="justify" class="hyper_link_10">Regards,</p>
<p align="justify" class="hyper_link_10">Bhatia Mobile</p>
                            </td>
                            <td>&nbsp;</td>
                          </tr>
                         
                         
                        </table></td>
                      </tr>
                      </table></td>
                    </tr>
                  </table></td>
              </tr>
              </table>