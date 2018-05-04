<?php session_start();
	require_once("admin/config.inc.php");
	require_once("admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	require_once ('pagination/pagination.php');
	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	$page = ($page == 0 ? 1 : $page);
	$perpage = 30;
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
                                <td class="title"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="250" align="left" valign="middle"><strong>
                                      <?php
								$brand=mysql_query("select * from brand_mst where Is_Active=1 and Brand_Id='".$_REQUEST['bid']."'");
								$b=mysql_fetch_array($brand);
								echo $b['Name'];
								 ?>
                                    </strong></td>
                                    <td align="right" valign="middle">
                                    <form action="#" method="post" name="frmsearch">
                                    <table width="300" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td align="right" valign="middle" class="title_10">Sort by</td>
                                        <td width="15" align="center" valign="middle">:</td>
                                        <td width="150" align="left" valign="middle"><select name="psearch" class="title_10" id="psearch" onchange="this.form.submit();">
                                          <option value="0">Select One</option>
                                          <option value="2">Price : Low To High</option>
                                          <option value="3">Price : High To Low</option>
                                        </select></td>
                                      </tr>
                                    </table>
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
                            <td ><table border="0" cellspacing="10" cellpadding="0">
                              <tr>
                              <?php 
							  if($_REQUEST['psearch']==2)
							  {
								  if($_REQUEST['name']=='Tablet' || $_REQUEST['name']=='tablet')
								  {
									  $query="select * from prod_mst where Is_Active=1 and Is_Tablet='1' order by Final_Price";
   	  						      }
								   else
								   {
									   $query="select * from prod_mst where Is_Active=1 and Brand_Id='".$_REQUEST['bid']."'  order by Final_Price";
								   }
							  }
							  else if($_REQUEST['psearch']==3)
							  {
								  if($_REQUEST['name']=='Tablet' || $_REQUEST['name']=='tablet')
								  {
									  $query="select * from prod_mst where Is_Active=1 and Is_Tablet='1' order by Final_Price desc";
   	  						      }
								   else
								   {
									   $query="select * from prod_mst where Is_Active=1 and Brand_Id='".$_REQUEST['bid']."'  order by Final_Price desc";
								   }
							  }
							  else 
							  {
								  if($_REQUEST['name']=='Tablet' || $_REQUEST['name']=='tablet')
								  {
							  		  $query="select * from prod_mst where Is_Active=1 and Is_Tablet='1' order by Final_Price"; 
								  }
								  else
								  {
									  $query="select * from prod_mst where Is_Active=1 and Brand_Id='".$_REQUEST['bid']."' order by Final_Price";
								  }
							  }
							  
							  //echo $query;
							  $result=$db->pagingLimit($query,$startpoint,$perpage);
							  $count=1;
							  while($p=mysql_fetch_array($result))
							  {  
							  ?>
                                <td width="135" align="left" valign="top" background="<?php echo HTTP_BASE_URL; ?>images/bg2.jpg"  bgcolor="#FFFFFF" style="background-repeat:repeat-x;"><div class="module-new">
                                  <div class="featuredIndent">
                                    <!-- The product image DIV. -->
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td align="center" valign="middle"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                                          <tr>
                                            <td height="25" align="center" valign="bottom" class="fonts9"><table border="0" align="center" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td align="center" valign="middle"><strong><a href="index.php?pageno=3&pid=<?php echo $p['Prod_Id']; ?>">
                                                  <?php  echo $p['Prod_Name'];?>
                                                </a></strong></td>
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
                                            <td height="120" align="center" bgcolor="#FFFFFF"><a href="index.php?pageno=3&amp;pid=<?php echo $p['Prod_Id']; ?>"><img src="product/<?php echo $img['Is_Image']; ?>" width="80" height="100" border="0" title="<?php echo $p['Prod_Name']; ?>" alt="<?php echo $p['Prod_Name']; ?>" /></a></td>
                                          </tr>
                                        </table>
                                          <a href="#"></a></td>
                                      </tr>
                                      <tr>
                                        <td align="center" valign="middle"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                                          <tr>
                                            <td align="center" valign="middle" class="fonts12red"><table border="0" align="center" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td align="right" valign="middle" class="fonts12red">MRP </td>
                                                <td width="10" align="center" valign="middle"> :</td>
                                                <td width="10" align="center" valign="middle"><img src="<?php echo HTTP_BASE_URL; ?>images/rupees.png" width="8" height="12"  border="0"/></td>
                                                <td align="left" valign="middle" class="fonts12red"><del><?php echo $p['MRP_Price']; ?></del></td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                          <tr>
                                            <td align="center" valign="middle" class="title_10"><table border="0" align="center" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td align="right" valign="middle" class="title_10"><strong>Bhatia </strong></td>
                                                <td width="10" align="center" valign="middle"> :</td>
                                                <td width="10" align="center" valign="middle"><img src="<?php echo HTTP_BASE_URL; ?>images/rupees_red.png" width="8" height="12" border="0" /></td>
                                                <td align="left" valign="middle"><strong><?php echo $p['Final_Price']; ?></strong></td>
                                              </tr>
                                              <?php
											  $odata=mysql_query("select * from offer where OfferId='".$p['Offer_Id']."'");
											  $of=mysql_fetch_array($odata);
											  ?>
                                              <tr>
                                                <td height="35" colspan="4" align="center" valign="middle"><a href="index.php?pageno=19" style="text-decoration:none;font-size:11px;color:#F00;"><img src="<?php echo HTTP_BASE_URL; ?>images/freegift.png" width="83" height="25" border="0"/></a><a href="gift/<?php echo $of['Is_Image']; ?>" class="preview" style="text-decoration:none;font-size:11px;color:#F00;"></a></td>
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
								if($count%5==0) {  ?>
                                 <tr><td height="5"></td></tr>
                                <?php } ?>
                                <?php $count++; } ?>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td align="center" valign="middle" >&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="center" valign="middle" class="fonts10" >
                            <?php
							$sql=$query;
							$query="SELECT COUNT(*) as num FROM prod_mst ".substr($query,15,strlen($query)) ;
							if($_REQUEST['psearch']!='')
							{
								echo pages_wherequery($query,$sql,$perpage,"index.php?pageno=2&bid=".$_REQUEST['bid']."&name=".$_REQUEST['name']."&psearch=".$_REQUEST['psearch']."&"); 
							}
							else
							{
								echo pages_wherequery($query,$sql,$perpage,"index.php?pageno=2&bid=".$_REQUEST['bid']."&name=".$_REQUEST['name']."&"); 
							}
							
							?>
                            </td>
                          </tr>
                        </table></td>
                      </tr>
                    </table>