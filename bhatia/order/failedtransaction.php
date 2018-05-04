<?php session_start();
//$today=date('Y-m-d');
//$o/rderno=mysql_fetch_array(mysql_query("select * from order_mst where User_Id='".$_SESSION['buserid']."' and Order_Date='".$today."' order by Order_No Desc,Order_Date desc limit 1")); 
//if(mysql_affected_rows()>0)
//{
//	$order_no=$orderno['Order_No'];
//}
?>
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
                            <td class="title">Transaction Failed</td>
                            <td width="100" align="right" valign="middle" class="title_11">&nbsp;</td>
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
                            <td class="Left_Font_10"><p align="justify"><span class="hyper_link_10">Your Payment Transaction has been failed</span></p>
                               
                              
                              <?php
							  if($_SESSION["hdfc_payment_transactionid"]!="")
							  {
							  ?>
                              <p align="justify"><span class="hyper_link_10">Your <strong>order transaction id </strong> is</span> : <strong> <?php echo $_SESSION["hdfc_payment_transactionid"];?>
                              </strong></p>
                              <?php
							  }
							  ?>
                              <p align="justify"><span class="hyper_link_10">Your <strong>order transaction status  </strong> is</span> : <strong> <?php echo $_SESSION["hdfc_payment_failed_message"];?>
                              </strong></p>
                              
<p align="justify" class="hyper_link_10"><a href="http://www.bhatiamobile.com/index.php?pageno=10">Contact us</a> if you are enable to proceed to payment.</p>
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