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

<link href="css/css1.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="p_flies/highslide-with-html.js"></script>

<link rel="stylesheet" type="text/css" href="p_flies/highslide.css" />

<script type="text/javascript">

	hs.graphicsDir = 'p_flies/graphics/';

	hs.outlineType = 'rounded-white';

	hs.showCredits = false;

	hs.wrapperClassName = 'draggable-header';

</script>



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

                                <td class="title"><strong>Accessories</strong></td>

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

							  $query="select * from accessories order by Disp_Order"; 

							  $result=$db->pagingLimit($query,$startpoint,$perpage);

							  $count=1;

							  while($p=mysql_fetch_array($result))

							  {  

							  ?>

                                <td width="200" align="center" valign="top" background="<?php echo HTTP_BASE_URL; ?>images/bg2.jpg"  bgcolor="#FFFFFF" style="background-repeat:repeat-x;"><div class="module-new">

                                  <div class="featuredIndent">

                                    <!-- The product image DIV. -->

                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">

                                      <tr>

                                        <td align="center" valign="middle"><table width="100%" border="0" cellspacing="3" cellpadding="0">

                                          <tr>

                                            <td height="50" align="center" valign="middle" class="fonts9"><table width="100" border="0" align="center" cellpadding="0" cellspacing="0">

                                              <tr>

                                                <td align="center" valign="middle"><strong><?php  echo $p['Name'];?></strong></td>

                                              </tr>

                                            </table>                                              <strong><a href="#"></a></strong></td>

                                          </tr>

                                        </table></td>

                                      </tr>

                                      <tr>

                                        <td height="140" align="center"><table border="0" cellspacing="0" cellpadding="0">

                                          <tr>

                                            <td height="120" align="center" bgcolor="#FFFFFF">

                                            <a href="#" onclick="return hs.htmlExpand(this, { headingText: '<?php echo $p['Name']; ?>' })">

                                            <img src="accessories/<?php echo $p['Is_Image']; ?>" style="max-height:120px;max-width:150px;" border="0" title="<?php echo $p['Name']; ?>" alt="<?php echo $p['Name']; ?>" />

</a>

<div class="highslide-maincontent"><font color="#000000">

<table width="100%" border="0" cellspacing="0" cellpadding="1">

  <tr>

    <td width="400" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="5">

      <tr>

        <td width="150" align="right" valign="middle">Accessory Name</td>

        <td width="10" align="center" valign="middle">:</td>

        <td align="left" valign="middle"><?php echo $p['Name']; ?></td>

      </tr>

      <tr>

        <td align="right" valign="middle">Code</td>

        <td align="center" valign="middle">:</td>

        <td align="left" valign="middle"><?php echo $p['Code']; ?></td>

      </tr>

      <tr>

        <td align="right" valign="middle">Sr.No.</td>

        <td align="center" valign="middle">:</td>

        <td align="left" valign="middle"><?php echo $p['Srno']; ?></td>

      </tr>

      <tr>

        <td align="right" valign="middle">MRP Price</td>

        <td align="center" valign="middle">:</td>

        <td align="left" valign="middle"><del><?php echo $p['Bhatia_Price']; ?></del></td>

      </tr>

      <tr>

        <td align="right" valign="middle">BM Price</td>

        <td align="center" valign="middle">:</td>

        <td align="left" valign="middle"><?php echo $p['Final_Price']; ?></td>

      </tr>

      <tr>

        <td align="right" valign="top">Description</td>

        <td align="center" valign="top">:</td>

        <td align="left" valign="top"><?php echo $p['Description']; ?></td>

      </tr>

    </table></td>

    <td align="left" valign="top">&nbsp;</td>

  </tr>

</table>

</font></div>

                                           </td>

                                          </tr>

                                        </table>

                                          <a href="#"></a></td>

                                      </tr>

                                      <tr>

                                        <td align="center" valign="middle"><table width="100%" border="0" cellspacing="3" cellpadding="0">

                                          <tr>

                                            <td align="center" valign="middle" class="fonts12red"><table width="100" border="0" align="center" cellpadding="0" cellspacing="0">

                                              <tr>

                                                <td width="100" align="right" valign="middle" class="fonts12red">MRP </td>

                                                <td width="20" align="center" valign="middle"> :</td>

                                                <td align="left" valign="middle" class="fonts12red"><del><?php echo $p['Bhatia_Price']; ?></del></td>

                                              </tr>

                                            </table></td>

                                          </tr>

                                          <tr>

                                            <td align="center" valign="middle" class="title_10"><table width="100" border="0" align="center" cellpadding="0" cellspacing="0">

                                              <tr>

                                                <td width="100" align="right" valign="middle"><strong>Bhatia </strong></td>

                                                <td width="20" align="center" valign="middle"> :</td>

                                                <td align="left" valign="middle"><strong><?php echo $p['Final_Price']; ?></strong></td>

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

                          <tr>

                            <td align="center" valign="middle" >&nbsp;</td>

                          </tr>

                          <tr>

                            <td align="center" valign="middle" class="fonts10" >

                            <?php

							$sql=$query;

							$query="SELECT COUNT(*) as num FROM accessories ".substr($query,25,strlen($query)) ;

							echo pages_wherequery($query,$sql,$perpage,"index.php?pageno=21&"); 

							?>

                            </td>

                          </tr>

                        </table></td>

                      </tr>

                    </table>