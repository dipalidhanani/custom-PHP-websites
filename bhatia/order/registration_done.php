<?php session_start();
	require_once("../admin/config.inc.php");
	require_once("../admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	?>
<link href="css/css1.css" rel="stylesheet" type="text/css" />
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
                            <td class="title">Registration Done</td>
                            </tr>
                          </table></td>
                        <td width="5"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_04.jpg" width="5" height="41" /></td>
                        </tr>
                      </table></td>
                    </tr>
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
                      <tr>
                        <td align="left" valign="middle" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="7" height="7"></td>
                            <td></td>
                            <td width="7" align="left" valign="top"></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td align="center" valign="middle"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/alert.png" width="60" height="60" border="0" /></td>
                                <td valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="5">
                                  <tr>
                                    <td class="title">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td class="title">Thank you for registration with Bhatia Mobile</td>
                                  </tr>
                                  <tr>
                                    <td valign="top">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top"><span class="title_10">You'll be redirected to Home Page after (5) Seconds</span></td>
									 <meta http-equiv=Refresh content=10;url=<?php echo HTTP_BASE_URL; ?>index.php>  
                                  </tr>
                                  <tr>
                                    <td valign="top">&nbsp;</td>
                                  </tr>
                                </table></td>
                              </tr>
                            </table></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </table></td>
                      </tr>
                      </table></td>
                    </tr>
                  </table></td>
              </tr>
              </table>