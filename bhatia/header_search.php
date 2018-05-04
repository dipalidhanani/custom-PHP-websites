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
	$name=$_REQUEST['search'];
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
                                <td height="6" colspan="3" align="left" valign="middle"></td>
                              </tr>
                              <tr>
                                <td width="30" align="left" valign="middle"><img src="<?php echo HTTP_BASE_URL; ?>images/Arrow.png" width="24" height="24" /></td>
                                <td width="600" class="title">Search Result for 
                                <?php
								if($_REQUEST['mtype']=='GSM')
								{ 
									echo "GSM"; 
								}
								if($_REQUEST['mtype']=='CDMA')
								{ 
									echo "CDMA"; 
								}
								if($_REQUEST['mtype']=='BOTH')
								{ 
									echo "GSM & CDMA"; 
								}
								if($_REQUEST['os']!='')
								{
									$da=mysql_query("SELECT * FROM mobile_os WHERE Mobile_OS_Id='".$_REQUEST['os']."'");
									$fd=mysql_fetch_array($da);
									echo $fd['Mobile_OS'];
								}
								if($_REQUEST['features']=='smartphone')
								{
									echo "SmartPhone";
								}
								if($_REQUEST['features']=='bluetooth')
							 	{
									echo "Bluetooth";
								}
								if($_REQUEST['features']=='camera')
							 	{
									echo "Camera";
								}
								if($_REQUEST['features']=='3g')
							 	{
									echo "3G";
								}
								if($_REQUEST['features']=='qwerty')
							 	{
									echo "QWERTY";
								}
								if($_REQUEST['features']=='dualsim')
							 	{
									echo "Dual SIM";
								}
								if($_REQUEST['features']=='memory')
							 	{
									echo "Memory Slot";
								}
								if($_REQUEST['price']!='')
							 	{
									echo "Price";
								}
								if($name!='')
							 	{
									echo $name;
								}
								
								?>
                                </td>
                                <td align="right" valign="middle" class="title"><table width="250" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td align="left" valign="middle" class="title_10">Price</td>
                                    <td width="20" align="center" valign="middle">:</td>
                                    <td align="left" valign="middle">
                                    <form name="frmsearchme" method="get" action="<?php echo HTTP_BASE_URL; ?>index.php">
                                    <input type="hidden" name="pageno" value="13" />
                                    <?php
									if($_REQUEST["mtype"]!="")
									{
									?>
                                    <input type="hidden" name="mtype" value="<?php echo $_REQUEST["mtype"];?>" />
                                    <?php
									}
									if($_REQUEST["os"]!="")
									{
									?>
                                    <input type="hidden" name="os" value="<?php echo $_REQUEST["os"];?>" />
                                    <?php
									}
									if($_REQUEST["features"]!="")
									{
									?>
                                    <input type="hidden" name="features" value="<?php echo $_REQUEST["features"];?>" />
                                    <?php
									}
									if($_REQUEST["price"]!="")
									{
									?>
                                    <input type="hidden" name="price" value="<?php echo $_REQUEST["price"];?>" />
                                    <?php
									}
									?>
                                    <select name="psearch" class="title_10" id="psearch" onchange="this.form.submit();">
                                          <option value="0">Select One</option>
                                          <option value="2" <?php if($_REQUEST['psearch']==2) { ?> selected="selected" <?php } ?>>Price : Low To High</option>
                                          <option value="3"  <?php if($_REQUEST['psearch']==3) { ?> selected="selected" <?php } ?>>Price : High To Low</option>
                                      </select>
                                    </form>
                                    </td>
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
                            <td align="center" ><table width="100%" border="0" cellpadding="0" cellspacing="10">
                              <tr>
                                <?php 
							 if($_REQUEST['mtype']!='')
							 {
								$query="select * from prod_mst where Is_Active=1 and Tech_Type='".$_REQUEST['mtype']."'"; 
							 }
							 if($_REQUEST['os']!='')
							 {
								$query="select * from prod_mst where Is_Active=1 and Prod_Mobile_OS='".$_REQUEST['os']."'";			 
							 }
							 if($_REQUEST['features']=='smartphone')
							 {
								 $query="select * from prod_mst where Is_Active=1 and Is_SmartPhone='1'";	
							 }
							 if($_REQUEST['features']=='bluetooth')
							 {
								 $query="select * from prod_mst where Is_Active=1 and Is_Bluetooth='1'";	
							 }
							 if($_REQUEST['features']=='camera')
							 {
								 $query="select * from prod_mst where Is_Active=1 and Is_Camera='1'";
							 }
							 if($_REQUEST['features']=='3g')
							 {
								 $query="select * from prod_mst where Is_Active=1 and Is_3G='1'";
							 }
							 if($_REQUEST['features']=='qwerty')
							 {
								 $query="select * from prod_mst where Is_Active=1 and Is_QWERTY='1'";
							 }
							 if($_REQUEST['features']=='dualsim')
							 {
								 $query="select * from prod_mst where Is_Active=1 and Is_Dual_SIM='1'";
							 }
							 if($_REQUEST['features']=='memory')
							 {
								 $query="select * from prod_mst where Is_Active=1 and Is_Memory_Slot='1'";
							 }
							 if($_REQUEST['price']!='')
							 {
								 $dx=split("-",$_REQUEST['price']);
								 $price1=$dx[0];
								 $price2=$dx[1];
								 if($price2=='Above')
								 {
									 $price2='10000000';
								 }
								 $query="select * from prod_mst where Is_Active=1 and (Final_Price >= '$price1' and Final_Price <= '$price2')";
							 }
							 if(isset($_REQUEST['search']))
							 {
								 if($name!='')
								 {
									 $query="select * from prod_mst where Is_Active=1 and Prod_Name like '%".$name."%'"; 
								 }
								 else
								 {
								 	$query="select * from prod_mst where Prod_Id=''";
								 }
							 }
								 
							 if($_REQUEST['psearch']!='')
							 {
								 if($_REQUEST['psearch']==2)
								 {
									 
									$query=$query." ORDER BY Final_Price ";
								 }
								 if($_REQUEST['psearch']==3)
								 {
									 $query=$query." ORDER BY Final_Price desc ";
								 }
							 }
							 
							 else
							 {
								 $query=$query." ORDER BY Final_Price";
								 
							 }
							 
							  //echo $query;
							  $r=mysql_query($query);
							  $rows=mysql_affected_rows();
							  $result=$db->pagingLimit($query,$startpoint,$perpage);
							  $count=1;
							  if($rows>0)
							  {
							  while($p=mysql_fetch_array($result))
							  {  
							  ?>
                                <td align="left" valign="top" background="<?php echo HTTP_BASE_URL; ?>images/bg2.jpg"  bgcolor="#FFFFFF" style="background-repeat:repeat-x"><div class="module-new">
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
    <td align="center" valign="middle" style="font-size:14px;">
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
                                          <a href="#"></a></td>
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
                                            <td align="center" valign="middle" class="fonts12red"><table border="0" align="center" cellpadding="0" cellspacing="0">
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
                                                <td height="35" colspan="4" align="center" valign="middle"><a href="index.php?pageno19"  style="text-decoration:none;font-size:11px;color:#F00;"><img src="<?php echo HTTP_BASE_URL; ?>images/freegift.png" width="83" height="25" border="0"/></a><a href="gift/<?php echo $of['Is_Image']; ?>"  style="text-decoration:none;font-size:11px;color:#F00;"></a></td>
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
								if($count%4==0) {  ?>
                                 <tr><td height="5"></td></tr>
                                <?php } ?>
                                <?php $count++; } ?>
                                 <?php } else { ?>
                                <td align="center" class="err_msg_12" height="100">No Result Found</td>
                                <?php } ?>
                              </tr>
                              <tr><td align="center" valign="middle" class="title_10" colspan="5">
                              <?php
							$sql=$query;
							$query="SELECT COUNT(*) as num FROM prod_mst ".substr($query,15,strlen($query)) ;
							$path='index.php?pageno=13&';
							if($_REQUEST['mtype']!='')
							{
								$path=$path.'mtype='.$_REQUEST['mtype'];
							}
							if($_REQUEST['os']!='')
							{
								$path=$path.'os='.$_REQUEST['os'];
							}
							if($_REQUEST['features']!='')
							{
								$path=$path.'features='.$_REQUEST['features'];
							}
							if($_REQUEST['price']!='')
							{
								$path=$path.'price='.$_REQUEST['price'];
							}
							if($_REQUEST['psearch']!='')
							{
								$path=$path.'&psearch='.$_REQUEST['psearch'];
							}
							if($name!='')
							{
								$path=$path.'search='.$_REQUEST['search'];
							}
							$path=$path."&";
							echo pages_wherequery($query,$sql,$perpage,$path); 
							?>
                              </td></tr>
                            </table></td>
                          </tr>
                          
                        </table></td>
                      </tr>
                    </table>