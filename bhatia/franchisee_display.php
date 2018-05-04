<?php session_start();
	require_once("admin/config.inc.php");
	require_once("admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	require_once ('pagination/pagination.php');
	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	$page = ($page == 0 ? 1 : $page);
	$perpage = 20;//limit in each page
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
                                <td class="title"><strong>Our Branches  Details</strong></td>
                              </tr>
                            </table></td>
                            <td width="5"><img src="<?php echo HTTP_BASE_URL; ?>images/box_04.jpg" width="5" height="41" /></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" bgcolor="#FFFFFF" ><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
                          <tr>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
                            <?php
							$query="select * from franchise_mst order by Disp_Order"; 
							$query_rows=mysql_query("select * from franchise_mst order by Disp_Order");
							$result=$db->pagingLimit($query,$startpoint,$perpage);
							$rows=mysql_num_rows($query_rows);
							$i=1;
							while($k=mysql_fetch_array($result))
							{
							?>
                              <tr>
                                <td width="50%" align="left" valign="top"><table width="100%" border="0" align="left" cellpadding="5" cellspacing="0">
                                  <tr>
                                    <td width="25" align="left" valign="top">&nbsp;</td>
                                    <td align="left" valign="top"><strong><span class="title_10"><?php echo $k['Name']; ?></span></strong></td>
                                  </tr>
                                  <tr>
                                    <td align="left" valign="top" class="title_9"><img src="<?php echo HTTP_BASE_URL; ?>images/home.png" width="20" height="20" border="0" /></td>
                                    <td align="left" valign="top" class="title_9"><span class="title_10"><?php echo $k['Address1']; ?></span></td>
                                  </tr>
                                  <tr>
                                    <td align="left" valign="top" class="title_9"><img src="<?php echo HTTP_BASE_URL; ?>images/mobile.png" width="24" height="24" border="0" /></td>
                                    <td align="left" valign="top" class="title_10"><?php  echo $k['Demo_No'];?></td>
                                  </tr>
                                  <tr>
                                    <td align="left" valign="top"><span class="title_9"><img src="<?php echo HTTP_BASE_URL; ?>images/mail.png" width="22" height="20" border="0" /></span></td>
                                    <td align="left" valign="top"><span class="title_10">
                                      <?php  echo $k['Email_Address'];?>
                                    </span></td>
                                  </tr>
                                </table></td>
                                <?php if($k['Is_Image']!='') { ?>
                                <td align="left" valign="top"><img src="<?php echo HTTP_BASE_URL; ?>franchisee/<?php echo $k['Is_Image']; ?>"  border="0" /></td>
                                <?php } else { ?> 
                                <td align="left" valign="top">&nbsp;</td>
                                <?php } ?>
                              </tr>
                              <?php if($perpage!=$i) { ?>
                              <tr><td colspan="2" class="border_bottom"></td></tr>
                              <?php } ?>
                              <?php $i++; } ?>
                            </table></td>
                          </tr>
                          <tr>
                            <td align="center" valign="middle" class="title_10">
                             <?php
							$sql=$query;
							$query="SELECT COUNT(*) as num FROM franchise_mst ".substr($query,27,strlen($query));
							echo pages_wherequery($query,$sql,$perpage,"index.php?pageno=26&"); 
							
							?>
                            </td>
                          </tr>
                        </table></td>
                      </tr>
                    </table>