 <script src="<?php echo HTTP_BASE_URL; ?>tooltip/jquery.js" type="text/javascript"></script>
	<script src="<?php echo HTTP_BASE_URL; ?>tooltip/main.js" type="text/javascript"></script>
<style>
#preview{
	position:absolute;
	border:1px solid #ccc;
	background:#FFF;
	padding:5px;
	display:none;
	color:#fff;
	}
</style>
<?php 
$qry=mysql_query("select * from prod_mst where Is_Active=1 and Is_prod_deal_of_day=1 order by Prod_Id desc LIMIT 1");
$q=mysql_fetch_array($qry);
?>
<link href="<?php echo HTTP_BASE_URL; ?>css/css1.css" rel="stylesheet" type="text/css">

<table width="220" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="5"><img src="<?php echo HTTP_BASE_URL; ?>images/box_red_01.jpg" width="5" height="41" /></td>
                            <td align="left" valign="top" background="<?php echo HTTP_BASE_URL; ?>images/box_red_02.jpg" style="background-repeat:repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td height="6" colspan="2" align="left" valign="middle"></td>
                              </tr>
                              <tr>
                                <td width="30" align="left" valign="middle"><img src="<?php echo HTTP_BASE_URL; ?>images/box_red_06.jpg" width="24" height="24" /></td>
                                <td class="title_w">Deal of the Day</td>
                              </tr>
                            </table></td>
                            <td width="5"><img src="<?php echo HTTP_BASE_URL; ?>images/box_red_04.jpg" width="5" height="41" /></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td bgcolor="#FFBCB7"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td background="<?php echo HTTP_BASE_URL; ?>images/bg2.jpg" style="background-repeat:repeat-x" bgcolor="#FFFFFF"><div class="module-new">
                              <div class="featuredIndent">
                                <!-- The product image DIV. -->
                                <table width="100%" border="0" cellspacing="0" cellpadding="1">
                                  <tr>
                                    <td align="center" valign="middle" class="fonts9"><table width="150" border="0" align="center" cellpadding="0" cellspacing="0" style="padding-top:10px;">
                                              <tr>
                                                <td height="25" align="center" valign="middle"><strong><a href="index.php?pageno=3&pid=<?php echo $q['Prod_Id']; ?>">
                                                  <?php  echo $q['Prod_Name'];?>
                                                </a></strong></td>
                                                <td width="35" align="center" valign="middle" class="title_w_9"
                                               <?php  if(($q['MRP_Price']!='0.00' || $q['MRP_Price']!='0') && ($q['Final_Price']!='0.00' || $q['Final_Price']!='0')) { ?>
                                                 style="background-image:url(<?php echo HTTP_BASE_URL_ORDER; ?>images/di.png);;height:40px;width:33px;background-repeat:no-repeat;" <?php } ?>><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="middle" style="font-size:14px;">
    <strong>
	<?php
											if(($q['MRP_Price']!='0.00' || $q['MRP_Price']!='0') && ($q['Final_Price']!='0.00' || $q['Final_Price']!='0'))
											{
												$discount=(($q['MRP_Price']-$q['Final_Price'])/$q['MRP_Price'])*100;
												$discount=number_format($discount,1);
												echo round($discount)."%";
											}
											else
											{
												echo " ";
											}
											?>
                                            </strong>
                                            </td>
  </tr>
  <tr>
    <td height="7px"></td>
  </tr>
</table>
</td>
                                              </tr>
                                    </table></td>
                                  </tr>
                                  <?php
								  $prod=mysql_query("select * from prod_img where Prod_id='".$q['Prod_Id']."' order by Disp_Order Limit 1");
								  $i=mysql_fetch_array($prod);
								  ?>
                                  <tr>
                                    <td height="140" align="center"><table width="120" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td height="120" align="center" bgcolor="#FFFFFF"><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=3&pid=<?php echo $q['Prod_Id']; ?>"><img src="<?php echo HTTP_BASE_URL; ?>product/<?php echo $i['Is_Image']; ?>" border="0" title="<?php echo $q['Prod_Name']; ?>" alt="<?php echo $q['Prod_Name']; ?>" /></a></td>
                                      </tr>
                                    </table>
                                      </td>
                                  </tr>
                                  <tr>
                                    <td align="center" valign="middle"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                                      <tr>
                                        <td align="center" valign="middle" class="fonts12red"><table border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td align="right" valign="middle" class="fonts12red">MRP</td>
                                            <td width="10" align="center" valign="middle">:</td>
                                            <td width="10" align="center" valign="middle"><img src="<?php echo HTTP_BASE_URL; ?>images/rupees_red.png" width="8" height="12" border="0" /></td>
                                            <td align="left" valign="middle"><del><?php echo $q['MRP_Price']; ?></del></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                      <tr>
                                        <td align="center" valign="middle" class="fonts12red"><table border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td align="right" valign="middle" class="title_10"><strong>BHATIA</strong></td>
                                            <td width="10" align="center" valign="middle">:</td>
                                            <td width="10" align="center" valign="middle"><img src="<?php echo HTTP_BASE_URL; ?>images/rupees.png" width="8" height="12" border="0" /></td>
                                            <td><strong><?php echo $q['Final_Price']; ?></strong></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                      <tr>
                                        <td align="center" valign="middle" class="title_10"><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td align="right" valign="middle"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                              <?php
											  $odata=mysql_query("select * from offer where OfferId='".$q['Offer_Id']."'");
											  $of=mysql_fetch_array($odata);
											  ?>
                                              <tr>
                                                <td height="35" align="center" valign="middle"><a href="index.php?pageno=19"  style="text-decoration:none;font-size:11px;color:#F00;"><img src="<?php echo HTTP_BASE_URL; ?>images/freegift.png" width="83" height="25" border="0"/></a><a href="gift/<?php echo $of['Is_Image']; ?>" style="text-decoration:none;font-size:11px;color:#F00;"></a></td>
                                              </tr>
                                              <tr>
                                                <td align="center" valign="middle" class="fonts9"><?php //echo $of['Offer']; ?></td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table>
                              </div>
                            </div></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table>