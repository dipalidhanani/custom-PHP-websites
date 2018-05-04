<?php session_start();
	require_once("admin/config.inc.php");
	require_once("admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	require_once ('pagination/pagination.php');
	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	$page = ($page == 0 ? 1 : $page);
	$perpage = 3;//limit in each page
	$startpoint = ($page * $perpage) - $perpage;
	?>
<link href="css/css1.css" rel="stylesheet" type="text/css" />
<link href="pagination/style2.css" rel="stylesheet" type="text/css" />

<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
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
                                <td class="title"><strong>Free Gift</strong></td>
                              </tr>
                            </table></td>
                            <td width="5"><img src="<?php echo HTTP_BASE_URL; ?>images/box_04.jpg" width="5" height="41" /></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" bgcolor="#FFFFFF" ><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>
                            <?php
							$offer=mysql_query("select * from offer where IsActive=1 order by OfferId Desc");
							$rows=mysql_affected_rows();
							$count=1;
							while($o=mysql_fetch_array($offer))
							{													   
							?>
                            <table width="100%" border="0" align="left" cellpadding="5" cellspacing="0" style="padding-left:10px;padding-right:10px;">
                              <tr class="title">
                                <td width="5" align="right" valign="top">&nbsp;</td>
                                <td width="10" align="center" valign="middle"><img src="<?php echo HTTP_BASE_URL; ?>images/bullet1.png" width="15" height="15" border="0" /></td>
                                <td align="left" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td align="left" valign="middle" class="title_11"><?php echo $o['Offer']; ?></td>
                                    <td align="left" valign="middle">&nbsp;</td>
                                    <td width="200" align="left" valign="middle" class="title_11">&nbsp;</td>
                                  </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td align="right" valign="top">&nbsp;</td>
                                <td align="center" valign="top">&nbsp;</td>
                                <td align="left" valign="top" style="text-align:justify"><span class="title_10"><?php echo $o['Description']; ?></span></td>
                              </tr>
                              <tr>
                                <td align="right" valign="top">&nbsp;</td>
                                <td align="center" valign="top">&nbsp;</td>
                                <td align="left" valign="top" class="title_11" style="text-align:justify"><strong class="title_10">Free Gift</strong></td>
                              </tr>
                              <tr>
                                <td colspan="3" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td><img src="<?php echo HTTP_BASE_URL; ?>gift/<?php echo $o['Is_Image']; ?>" border="0"  /></td>
                                  </tr>
                                </table></td>
                              </tr>
                              <?php if($count!=$rows) { ?>
                              <tr>
                                <td colspan="3" align="right" valign="top" class="border_bottom"></td>
                              </tr>
                              <?php } ?>
                            </table>
                            <?php $count++; } ?>
                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="center" valign="middle"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="300" height="250" id="FLVPlayer">
                              <param name="movie" value="FLVPlayer_Progressive.swf" />
                              <param name="quality" value="high" />
                              <param name="wmode" value="opaque" />
                              <param name="scale" value="noscale" />
                              <param name="salign" value="lt" />
                              <param name="FlashVars" value="&amp;MM_ComponentVersion=1&amp;skinName=Clear_Skin_3&amp;streamName=images/bhatia_video&amp;autoPlay=false&amp;autoRewind=false" />
                              <param name="swfversion" value="8,0,0,0" />
                              <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
                              <param name="expressinstall" value="Scripts/expressInstall.swf" />
                              <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
                              <!--[if !IE]>-->
                              <object type="application/x-shockwave-flash" data="FLVPlayer_Progressive.swf" width="300" height="250">
                                <!--<![endif]-->
                                <param name="quality" value="high" />
                                <param name="wmode" value="opaque" />
                                <param name="scale" value="noscale" />
                                <param name="salign" value="lt" />
                                <param name="FlashVars" value="&amp;MM_ComponentVersion=1&amp;skinName=Clear_Skin_3&amp;streamName=images/bhatia_video&amp;autoPlay=false&amp;autoRewind=false" />
                                <param name="swfversion" value="8,0,0,0" />
                                <param name="expressinstall" value="Scripts/expressInstall.swf" />
                                <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                                <div>
                                  <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
                                  <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
                                </div>
                                <!--[if !IE]>-->
                              </object>
                              <!--<![endif]-->
                            </object></td>
                          </tr>
                          
                        </table></td>
                      </tr>
                    </table>
<script type="text/javascript">
<!--
swfobject.registerObject("FLVPlayer");
swfobject.registerObject("FLVPlayer");
//-->
</script>
