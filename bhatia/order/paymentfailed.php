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
                            <td class="title">Transaction Failed</td>
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
                            <td class="Left_Font_10"><p align="justify"><span class="hyper_link_10">Your order transaction has been failed. </span></p>
                               
                               <p align="justify"><span class="hyper_link_10"> Your Transaction ID : <strong> <?php echo $strMTRCKID;?></strong></p>
                               
                               <p align="justify"><span class="hyper_link_10"> Your Transaction Status : <strong> <?php echo $strMessage;?></strong></p>
<p align="justify" class="hyper_link_10">Regargs,<br/>
Bhatia Mobile
</p>
                            </td>
                            <td>&nbsp;</td>
                          </tr>
                          <?php 
						  $_SESSION['shopcart']='';
						  $_SESSION['cartno']='';
						  ?>
                          
                        </table></td>
                      </tr>
                      </table></td>
                    </tr>
                  </table></td>
              </tr>
</table>
