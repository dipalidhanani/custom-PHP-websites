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
                                <td class="title"><strong>About Us</strong></td>
                              </tr>
                            </table></td>
                            <td width="5"><img src="<?php echo HTTP_BASE_URL; ?>images/box_04.jpg" width="5" height="41" /></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" bgcolor="#FFFFFF" ><table width="100%" border="0" align="left" cellpadding="8" cellspacing="0" class="title_10" style="padding-left:10px;padding-right:10px;">
                          <tr>
                            <td class="title_10" style="text-align:justify">Bhatia's Mobile Shop is your One Stop Shop For All Your Mobile needs. BhatiaMobile.com provides you with latest and comprehensive cell phones and accessories in India. We are proud of the business that we have built since 1972.</td>
                          </tr>
                          <tr>
                            <td valign="middle" style="text-align:justify"> We are proudly connected with, </td>
                          </tr>
                          <tr>
                            <td><table width="100%" border="0" cellpadding="3" cellspacing="0" class="title_10">
                              <tr>
                                <td width="50" align="right" valign="middle"><img src="<?php echo HTTP_BASE_URL; ?>images/bullet1.png" width="10" height="10" border="0" /></td>
                                <td align="left" valign="middle"> Nokia - Solution Partner </td>
                              </tr>
                              <tr>
                                <td align="right" valign="middle"><img src="<?php echo HTTP_BASE_URL; ?>images/bullet1.png" width="10" height="10" border="0" /></td>
                                <td align="left" valign="middle"> Samsung - Privilege Partner </td>
                              </tr>
                              <tr>
                                <td align="right" valign="middle"><img src="<?php echo HTTP_BASE_URL; ?>images/bullet1.png" width="10" height="10" border="0" /></td>
                                <td align="left" valign="middle"> LG - Preferred Partner </td>
                              </tr>
                              <tr>
                                <td align="right" valign="middle"><img src="<?php echo HTTP_BASE_URL; ?>images/bullet1.png" width="10" height="10" border="0" /></td>
                                <td align="left" valign="middle"> Blackberry - Experience Zone </td>
                              </tr>
                              <tr>
                                <td align="right" valign="middle"><img src="<?php echo HTTP_BASE_URL; ?>images/bullet1.png" width="10" height="10" border="0" /></td>
                                <td align="left" valign="middle"> iPhone - Authorized Dealer </td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td style="text-align:justify">BhatiaMobile.com is dedicated to offering the latest mobile products - unlocked cell phone, bluetooths and accessories at the best prices. We pride ourselves in offering sophisticated service and efficient ordering to make our customers' ordering process a breeze.</td>
                          </tr>
                          <tr>
                            <td style="text-align:justify"> If you have any questions about our website or for any of our products, please feel free to contact us. </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          
                        </table></td>
                      </tr>
                    </table>