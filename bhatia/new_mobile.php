<?php session_start();
	require_once("admin/config.inc.php");
	require_once("admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	require_once ('pagination/pagination.php');
	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	$page = ($page == 0 ? 1 : $page);
	$perpage = 40;
	$startpoint = ($page * $perpage) - $perpage;
	?>
<link href="<?php echo HTTP_BASE_URL; ?>css/css1.css" rel="stylesheet" type="text/css" />
<link href="<?php echo HTTP_BASE_URL; ?>pagination/style2.css" rel="stylesheet" type="text/css" />
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
                                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td class="title"><span class="title_red"><strong>New </strong></span><strong>Mobiles</strong></td>
                                    <td align="right" valign="middle">&nbsp;</td>
                                  </tr>
                                </table></td>
                              </tr>
                            </table></td>
                            <td width="5"><img src="<?php echo HTTP_BASE_URL; ?>images/box_04.jpg" width="5" height="41" /></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" bgcolor="#FFFFFF" ><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
                          <tr>
                            <td ><table width="100%" border="0" cellspacing="10" cellpadding="0">
                              <tr>
                                <?php 
							  $query="select * from prod_mst where Is_Active=1 order by Prod_Id desc"; 
							  $result=$db->pagingLimit($query,$startpoint,$perpage);
							  $count=1;
							  while($p=mysql_fetch_array($result))
							  {  
							  ?>
                                <td align="left" valign="top"  bgcolor="#FFFFFF" background="<?php echo HTTP_BASE_URL; ?>images/bg2.jpg" style="background-repeat:repeat-x"><div class="module-new">
                                  <div class="featuredIndent">
                                    <!-- The product image DIV. -->
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td align="center" valign="middle"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                                          <tr>
                                            <td height="25" align="center" valign="bottom" class="fonts9"><table width="150" border="0" align="center" cellpadding="0" cellspacing="0" style="padding-top:10px;">
                                              <tr>
                                                <td height="25" align="center" valign="middle"><strong><a href="index.php?pageno=3&pid=<?php echo $p['Prod_Id']; ?>">
                                                  <?php  echo $p['Prod_Name'];?>
                                                </a></strong></td>
                                                <td width="35" align="center" valign="middle" class="title_w_9"
                                               <?php  if(($p['MRP_Price']!='0.00' || $p['MRP_Price']!='0') && ($p['Final_Price']!='0.00' || $p['Final_Price']!='0')) { ?>
                                                 style="background-image:url(<?php echo HTTP_BASE_URL_ORDER; ?>images/di.png);background-position:left;height:40px;width:33px;background-repeat:no-repeat;" <?php } ?>><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="middle">
    <strong>
	<?php
											if(($p['MRP_Price']!='0.00' || $p['MRP_Price']!='0') && ($p['Final_Price']!='0.00' || $p['Final_Price']!='0'))
											{
												$discount=(($p['MRP_Price']-$p['Final_Price'])/$p['MRP_Price'])*100;
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
                                        </table></td>
                                      </tr>
                                      <tr>
                                        <td height="140" align="center"><table width="120" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <?php
										  $p_img=mysql_query("select * from prod_img where Prod_Id='".$p['Prod_Id']."' order by Disp_Order Limit 1");
										  $img=mysql_fetch_array($p_img);
										  ?>
                                            <td height="120" align="center" bgcolor="#FFFFFF"><a href="index.php?pageno=3&amp;pid=<?php echo $p['Prod_Id']; ?>"><img src="product/<?php echo $img['Is_Image']; ?>" border="0" title="<?php echo $p['Prod_Name']; ?>" alt="<?php echo $p['Prod_Name']; ?>" /></a></td>
                                          </tr>
                                        </table>
                                          </td>
                                      </tr>
                                      <tr>
                                        <td align="center" valign="middle"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                                          <tr>
                                            <td align="center" valign="middle" class="fonts12red"><table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td align="right" valign="middle" class="fonts12red">MRP </td>
                                                <td width="10" align="center" valign="middle"> :</td>
                                                <td width="10" align="center" valign="middle"><img src="<?php echo HTTP_BASE_URL; ?>images/rupees_red.png" width="8" height="12" border="0" /></td>
                                                <td align="left" valign="middle" class="fonts12red"><del><?php echo $p['MRP_Price']; ?></del></td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                          <tr>
                                            <td align="center" valign="middle"><table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td align="right" valign="middle" class="title_10"><table border="0" align="center" cellpadding="0" cellspacing="0">
                                                  <tr>
                                                    <td align="right" valign="middle" class="title_10"><strong>BHATIA </strong></td>
                                                    <td width="10" align="center" valign="middle"> :</td>
                                                    <td width="10" align="center" valign="middle"><img src="<?php echo HTTP_BASE_URL; ?>images/rupees.png" width="8" height="12" border="0" /></td>
                                                    <td align="left" valign="middle"><strong><?php echo $p['Final_Price']; ?></strong></td>
                                                  </tr>
                                                  <?php
											  $odata=mysql_query("select * from offer where OfferId='".$p['Offer_Id']."'");
											  $of=mysql_fetch_array($odata);
											  ?>
                                                  <tr>
                                                    <td height="35" colspan="4" align="center" valign="middle"><a href="index.php?pageno=19" style="text-decoration:none;font-size:11px;color:#F00;"><img src="<?php echo HTTP_BASE_URL; ?>images/freegift.png" width="83" height="25" border="0"/></a><a href="gift/<?php echo $of['Is_Image']; ?>" style="text-decoration:none;font-size:11px;color:#F00;"></a></td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="4" align="center" valign="middle" class="fonts9"><?php //echo $of['Offer']; ?></td>
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
                                <?php 
								if($count%4==0) {  ?>
                                 <tr><td height="5"></td></tr>
                                <?php } ?>
                                <?php $count++; } ?>
                              </tr>
                            </table></td>
                          </tr>
                          
                        </table></td>
                      </tr>
                    </table>