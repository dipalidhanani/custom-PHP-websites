<?php session_start();
	require_once("../admin/config.inc.php");
	require_once("../admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	?>
<link href="<?php echo HTTP_BASE_URL_ORDER; ?>css/css1.css" rel="stylesheet" type="text/css" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="5"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_01.jpg" width="5" height="41" /></td>
                        <td align="left" valign="top" background="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_02.jpg" style="background-repeat:repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="6" colspan="2" align="left" valign="middle"></td>
                            </tr>
                          <tr>
                            <td width="30" align="left" valign="middle"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/Arrow.png" width="24" height="24" /></td>
                            <td class="title">Order Completed</td>
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
                            <td class="Left_Font_10"><p align="justify"><span class="hyper_link_10">Thank you for placing an order with Bhatia Mobile </span></p>
                              <p align="justify"><span class="hyper_link_10">Your <strong>order number</strong> is</span> : <strong>
                              
                              <?php 
							  $order_new=mysql_query("SELECT * FROM prod_order_mst WHERE order_invoice_Id='".$_SESSION["bhatia_order_invoice"]."'");
	$ord=mysql_fetch_array($order_new);
	$order_id=$ord['Order_Id'];
	
	$order_mst=mysql_query("SELECT * FROM order_mst WHERE Order_Id='".$order_id."' and 	User_Id='".$_SESSION['buserid']."'");
	$or=mysql_fetch_array($order_mst);
	echo $or['Order_No'];
							  ?>
                              
                              </strong></p>
<p align="justify" class="hyper_link_10">Our Order department will review and create order manually within next 6 to 24 hours. Once processed, you will recieve all the required information via e-mail address listed during the order.</p>
                            </td>
                            <td>&nbsp;</td>
                          </tr>
                          <?php 
						  
						  $_SESSION['shopcart']='';
						  $_SESSION['cartno']='';
						  ?>
                          <tr>
                            <td>&nbsp;</td>
                            <td>
                              <?php echo "<meta http-equiv=Refresh content=30;url=".HTTP_BASE_URL."index.php>"; ?></td>
                            <td>&nbsp;</td>
                          </tr>
                        </table></td>
                      </tr>
                      </table></td>
                    </tr>
                  </table></td>
              </tr>
              </table>