<?php session_start();
	require_once("../admin/config.inc.php");
	require_once("../admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	require_once ('../pagination/pagination.php');
	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	$page = ($page == 0 ? 1 : $page);
	$perpage = 3;//limit in each page
	$startpoint = ($page * $perpage) - $perpage;
	?>
<link href="<?php echo HTTP_BASE_URL_ORDER; ?>css/css1.css" rel="stylesheet" type="text/css" />
<link href="<?php echo HTTP_BASE_URL; ?>/pagination/style2.css" rel="stylesheet" type="text/css" />

<table width="100%" border="0" cellspacing="0" cellpadding="0">
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
                                <td class="title"><strong>Forgot Password</strong></td>
                              </tr>
                            </table></td>
                            <td width="5"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_04.jpg" width="5" height="41" /></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" bgcolor="#FFFFFF" ><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
                          <tr>
                            <td>
                            <form id="form1" name="form1" method="post" action="forgotpass_process.php">
                            <table width="100%" border="0" align="center" cellpadding="6" cellspacing="0">
                              <tr>
                                <td colspan="3" align="center" valign="middle"><span class="title_11">Enter your email address to retrieve your   password.</span></td>
                              </tr>
                              <tr>
                                <td colspan="3" align="center" valign="middle" height="20"></td>
                              </tr>
                              <?php if($_REQUEST['msg']=='no') { ?>
                              <tr>
                                <td colspan="3" align="center" valign="middle" class="err_msg_12">Please enter registered e-mail address.</td>
                              </tr>
                              <?php } ?>
                              <?php if($_REQUEST['msg']=='yes') { ?>
                              <tr>
                                <td colspan="3" align="center" valign="middle" class="err_msg_12">Your new password has been set successfully.Check your mail for further detail.</td>
                              </tr>
                              <?php } ?>
                              <tr class="title_12">
                                <td width="250" align="right" valign="middle">E-mail Address</td>
                                <td width="10" align="center" valign="middle">:</td>
                                <td align="left" valign="middle">
                                  <input type="text" name="email" id="email" />
                                </td>
                              </tr>
                              <tr>
                                <td colspan="3" align="right" valign="middle" height="1"></td>
                              </tr>
                              <tr>
                                <td align="right" valign="middle">&nbsp;</td>
                                <td align="center" valign="middle">&nbsp;</td>
                                <td align="left" valign="middle">
                                <input name="submit" type="submit" class="title_12" value="Submit" />
                                </td>
                              </tr>
                            </table>
                            </form>
                            </td>
                          </tr>
                          
                        </table></td>
                      </tr>
                    </table>