<?php session_start();
	require_once("admin/config.inc.php");
	require_once("admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	require_once ('pagination/pagination.php');
	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	$page = ($page == 0 ? 1 : $page);
	$perpage = 40;//limit in each page
	$startpoint = ($page * $perpage) - $perpage;
	?>
<link href="css/css1.css" rel="stylesheet" type="text/css" />
<link href="pagination/style2.css" rel="stylesheet" type="text/css" />
 <script src="tooltip/jquery.js" type="text/javascript"></script>
	<script src="tooltip/main.js" type="text/javascript"></script>
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
                                <td class="title">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td>Search Result</td>
                                    <td width="250" align="right"><table width="250" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td align="right" class="title_10">Select Brand</td>
                                        <td width="15" align="center">:</td>
                                        <td align="left">
                                <form action="index.php" method="get" name="frmsearch">
                                <input type="hidden" name="pageno" value="8" />
                                <input type="hidden" name="type" value="<?php echo $type;  ?>" />
                                <input type="hidden" name="qwerty" value="<?php echo $_REQUEST['qwerty'];  ?>" />
                                <input type="hidden" name="mtype" value="<?php echo $_REQUEST['mtype'];  ?>" />
                                <input type="hidden" name="dual" value="<?php echo $_REQUEST['dual'];  ?>" />
                                <input type="hidden" name="gg" value="<?php echo $_REQUEST['gg'];  ?>" />
                                <input type="hidden" name="bluetooth" value="<?php echo $_REQUEST['bluetooth'];  ?>" />
                                <input type="hidden" name="wifi" value="<?php echo $_REQUEST['wifi'];  ?>" />
                                <input type="hidden" name="camera" value="<?php echo $_REQUEST['camera'];  ?>" />
                                <input type="hidden" name="second_camera" value="<?php echo $_REQUEST['second_camera'];  ?>" />
                                <input type="hidden" name="video" value="<?php echo $_REQUEST['video'];  ?>" />
                                <input type="hidden" name="fm" value="<?php echo $_REQUEST['fm']; ?>" />
                                <input type="hidden" name="infrared" value="<?php echo $_REQUEST['infrared'];  ?>" />
                                <input type="hidden" name="memory" value="<?php echo $_REQUEST['memory'];  ?>" />
                                <input type="hidden" name="range" value="<?php echo $_REQUEST['range'];  ?>" />
                                <input type="hidden" name="pricecat" value="<?php echo $_REQUEST['pricecat'];  ?>" />
                                <input type="hidden" name="smartphone" value="<?php echo $_REQUEST['smartphone'];  ?>" />
                                 <select name="search_brand" class="title_10" id="search_brand" onchange="this.form.submit();">
                                        <option value="0">Select One</option>
                                        <?php
										$brand_data=mysql_query("select * from brand_mst where Is_Active=1 order by Disp_Order");
										while($bb=mysql_fetch_array($brand_data))
										{
										?>
                                        <option value="<?php echo $bb['Brand_Id']; ?>" <?php if($bb['Brand_Id']==$_REQUEST['search_brand']){  ?> selected="selected" <?php } ?>><?php echo $bb['Name']; ?></option>
                                        <?php } ?>
                                        </select>
                                        </form>
                                        </td>
                                      </tr>
                                    </table></td>
                                    <td width="200" align="right"><table width="200" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td align="right" class="title_10">Price</td>
                                        <td width="20" align="center">:</td>
                                        <td width="120" align="right">
                                        <form action="index.php" method="get" name="frmsearch">
                                <input type="hidden" name="pageno" value="8" />
                                <input type="hidden" name="type" value="<?php echo $type;  ?>" />
                                <input type="hidden" name="qwerty" value="<?php echo $_REQUEST['qwerty'];  ?>" />
                                <input type="hidden" name="mtype" value="<?php echo $_REQUEST['mtype'];  ?>" />
                                <input type="hidden" name="dual" value="<?php echo $_REQUEST['dual'];  ?>" />
                                <input type="hidden" name="gg" value="<?php echo $_REQUEST['gg'];  ?>" />
                                <input type="hidden" name="bluetooth" value="<?php echo $_REQUEST['bluetooth'];  ?>" />
                                <input type="hidden" name="wifi" value="<?php echo $_REQUEST['wifi'];  ?>" />
                                <input type="hidden" name="camera" value="<?php echo $_REQUEST['camera'];  ?>" />
                                <input type="hidden" name="second_camera" value="<?php echo $_REQUEST['second_camera'];  ?>" />
                                <input type="hidden" name="video" value="<?php echo $_REQUEST['video'];  ?>" />
                                <input type="hidden" name="fm" value="<?php echo $_REQUEST['fm']; ?>" />
                                <input type="hidden" name="infrared" value="<?php echo $_REQUEST['infrared'];  ?>" />
                                <input type="hidden" name="memory" value="<?php echo $_REQUEST['memory'];  ?>" />
                                <input type="hidden" name="range" value="<?php echo $_REQUEST['range'];  ?>" />
                                <input type="hidden" name="pricecat" value="<?php echo $_REQUEST['pricecat'];  ?>" />
                                <input type="hidden" name="smartphone" value="<?php echo $_REQUEST['smartphone'];  ?>" />
                                <select name="psearch" class="title_10" id="psearch" onchange="this.form.submit();">
                                          <option value="0">Select One</option>
                                          <option value="2" <?php if($_REQUEST['psearch']==2) { ?> selected="selected" <?php } ?>>Price : Low To High</option>
                                          <option value="3"  <?php if($_REQUEST['psearch']==3) { ?> selected="selected" <?php } ?>>Price : High To Low</option>
                                        </select>
                                        </form>
                                        </td>
                                      </tr>
                                    </table></td>
                                    <td width="80" align="right">&nbsp;</td>
                                  </tr>
                                </table>
                                
                                </td>
                              </tr>
                            </table></td>
                            <td width="5"><img src="<?php echo HTTP_BASE_URL; ?>images/box_04.jpg" width="5" height="41" /></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" bgcolor="#FFFFFF" ><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
                          <tr>
                            <td ><table width="100%" border="0" cellpadding="0" cellspacing="10">
                              <tr>
                                <?php 
			 		 $main=1;			  
					if($_REQUEST['pricecat']!='0')
					{
						$dx=split("-",$_REQUEST['pricecat']);
						$price1=$dx[0];
						$price2=$dx[1];
					}
					else
					{
						$price1=0;
						$price2=10000;
					}
					
						$part1="select * from prod_mst where Tech_type='".$_REQUEST['mtype']."' and (Final_Price >= '$price1' and Final_Price <= '$price2') and Is_Active=1";
					if($_REQUEST['search_brand']!='')
					{
						$part1=$part1." and Brand_Id='".$_REQUEST['search_brand']."'";
					}
					if($_REQUEST['qwerty']!='')
					{
						$part1=$part1." and Is_QWERTY='".$_REQUEST['qwerty']."'";
					}
					if($_REQUEST['dual']!='')
					{
						$part1=$part1." and Is_Dual_SIM='".$_REQUEST['dual']."'";
						
					}
					if($_REQUEST['gg']!='')
					{
						$part1=$part1." and Is_3G='".$_REQUEST['gg']."'";						
					}
					if($_REQUEST['bluetooth']!='')
					{
						$part1=$part1." and Is_Bluetooth='".$_REQUEST['bluetooth']."'";
					}
					if($_REQUEST['wifi']!='')
					{
						$part1=$part1." and Is_WiFi='".$_REQUEST['wifi']."'";
					}
					if($_REQUEST['camera']!='')
					{
						$part1=$part1." and  Is_Camera='".$_REQUEST['camera']."'";
					}
					if($_REQUEST['second_camera']!='')
					{
						$part1=$part1." and  Is_Secondary_Camera='".$_REQUEST['second_camera']."'";
					}
					if($_REQUEST['video']!='')
					{
						$part1=$part1." and  Is_Video_Recording='".$_REQUEST['video']."'";
					}
					if($_REQUEST['fm']!='')
					{
						$part1=$part1." and  Is_FM_Radio='".$_REQUEST['fm']."'";
					}
					if($_REQUEST['infrared']!='')
					{
						$part1=$part1." and Is_Infrared='".$_REQUEST['infrared']."'";
					}
					if($_REQUEST['memory']!='')
					{
						$part1=$part1." and  Is_Memory_Slot='".$_REQUEST['memory']."'";
					}
					if($_REQUEST['smartphone']!='')
					{
						$part1=$part1." and Is_SmartPhone='".$_REQUEST['smartphone']."'";
					}
					if($_REQUEST['psearch']!='')
					{
						if($_REQUEST['psearch']==0)
						{
							$part1=$part1."	Order by Prod_Id";		
						}
						if($_REQUEST['psearch']==2)
						{
							$part1=$part1." order by Final_Price";
						}
						if($_REQUEST['psearch']==3)
						{
							 $part1=$part1." order by Final_Price desc";
						}
					}
					else
					{
						$part1=$part1."	Order by Final_Price";
					}
					$query=$part1;
					$result=$db->pagingLimit($query,$startpoint,$perpage);
					$count=1;	
					while($r=mysql_fetch_array($result))
					{
		  				if(mysql_num_rows($result)>0)
						{
							  ?>
                              
                                <td width="135" align="left" valign="top" background="<?php echo HTTP_BASE_URL; ?>images/bg2.jpg"  bgcolor="#FFFFFF" style="background-repeat:repeat-x"><div class="module-new">
                                  <div class="featuredIndent">
                               
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td align="center" valign="middle"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                                          <tr>
                                            <td height="25" align="center" valign="bottom" class="fonts9"><table width="150" border="0" align="center" cellpadding="0" cellspacing="0" style="padding-top:10px;">
                                              <tr>
                                                <td height="25" align="center" valign="middle"><strong><a href="index.php?pageno=3&pid=<?php echo $r['Prod_Id']; ?>">
                                                  <?php  echo $r['Prod_Name'];?>
                                                </a></strong></td>
                                                <td width="35" align="center" valign="middle" class="title_w_9"
                                               <?php  if(($r['MRP_Price']!='0.00' || $r['MRP_Price']!='0') && ($r['Final_Price']!='0.00' || $r['Final_Price']!='0')) { ?>
                                                 style="background-image:url(<?php echo HTTP_BASE_URL_ORDER; ?>images/di.png);background-position:right;height:40px;width:33px;background-repeat:no-repeat;" <?php } ?>><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="middle" style="font-size:14px;">
    <strong>
	<?php
											if(($r['MRP_Price']!='0.00' || $r['MRP_Price']!='0') && ($r['Final_Price']!='0.00' || $r['Final_Price']!='0'))
											{
												$discount=(($r['MRP_Price']-$r['Final_Price'])/$r['MRP_Price'])*100;
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
										  $p_img=mysql_query("select * from prod_img where Prod_Id='".$r['Prod_Id']."' order by Disp_Order Limit 1");
										  $img=mysql_fetch_array($p_img);
										  ?>
                                            <td height="120" align="center" bgcolor="#FFFFFF"><a href="index.php?pageno=3&amp;pid=<?php echo $r['Prod_Id']; ?>"><img src="product/<?php echo $img['Is_Image']; ?>" border="0" title="<?php echo $r['Prod_Name']; ?>" alt="<?php echo $r['Prod_Name']; ?>" /></a></td>
                                          </tr>
                                        </table>
                                          </td>
                                      </tr>
                                      <tr>
                                        <td align="center" valign="middle"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">
                                          <tr>
                                            <td align="center" valign="middle" class="fonts12red"><table border="0" align="center" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td align="right" valign="middle" class="fonts12red">MRP </td>
                                                <td width="10" align="center" valign="middle"> :</td>
                                                <td width="10" align="center" valign="middle"><img src="<?php echo HTTP_BASE_URL; ?>images/rupees_red.png" width="8" height="12" border="0" /></td>
                                                <td align="left" valign="middle" class="fonts12red"><del><?php echo $r['MRP_Price']; ?></del></td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                          <tr>
                                            <td align="center" valign="middle" class="fonts12red"><table border="0" align="center" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td align="right" valign="middle" class="title_10"><strong>BHATIA </strong></td>
                                                <td width="10" align="center" valign="middle"> :</td>
                                                <td width="10" align="center" valign="middle"><img src="<?php echo HTTP_BASE_URL; ?>images/rupees.png" width="8" height="12" border="0" /></td>
                                                <td align="left" valign="middle"><strong><?php echo $r['Final_Price']; ?></strong></td>
                                              </tr>
                                              <?php
											  $odata=mysql_query("select * from offer where OfferId='".$r['Offer_Id']."'");
											  $of=mysql_fetch_array($odata);
											  ?>
                                              <tr>
                                                <td height="35" colspan="4" align="center" valign="middle"><a href="index.php?pageno19" style="text-decoration:none;font-size:11px;color:#F00;"><img src="<?php echo HTTP_BASE_URL; ?>images/freegift.png" width="83" height="25" border="0"/></a><a href="gift/<?php echo $of['Is_Image']; ?>" style="text-decoration:none;font-size:11px;color:#F00;"></a></td>
                                              </tr>
                                              <tr>
                                                <td colspan="4" align="center" valign="middle" class="fonts9"><?php //echo $of['Offer']; ?></td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                    </table>
                                  </div>
                                </div></td>
                                <?php 
								if(($count%4)==0) {  ?>
                                 <!--<tr><td height="5"></td></tr>-->
                                <?php } ?>
                                <?php $count++; } }?>
                              </tr>
                              <?php //if(mysql_affected_rows()=='0') {  ?> 
                              <!--<tr><td align="center" valign="middle" class="err_msg_12">No Result Found</td></tr>-->
                              <?php //} ?>
                            </table></td>
                          </tr>
                             
                            <tr>
                          
                            <td align="center" valign="middle" >&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="center" valign="middle" class="fonts10" >
                            <?php
							$sql=$query;
							$query="SELECT COUNT(*) as num FROM prod_mst ".substr($query,22,strlen($query)) ;
							$path='index.php?pageno=8&';
							if($_POST['srhsubmit']!='')
							{
								 $path=$path.'srhsubmit='.$_REQUEST['srhsubmit'];
							}
							else
							{
								$path=$path.'mtype='.$_REQUEST['mtype']."&smartphone=".$_REQUEST['smartphone']."&camera=".$_REQUEST['camera']."&qwerty=".$_REQUEST['qwerty']."&second_camera=".$_REQUEST['second_camera']."&dual=".$_REQUEST['dual']."&video=".$_REQUEST['video']."&gg=".$_REQUEST['gg']."&bluetooth=".$_REQUEST['bluetooth']."&infrared=".$_REQUEST['infrared']."&wifi=".$_REQUEST['wifi']."&memory=".$_REQUEST['memory']."&pricecat=".$_REQUEST['pricecat'];
							}
							$path=$path.'&psearch='.$_REQUEST['psearch'].'&';
							echo pages_wherequery($query,$sql,$perpage,$path);
							?>
                            </td>
                          </tr>
                        </table></td>
                      </tr>
                    </table>
                    