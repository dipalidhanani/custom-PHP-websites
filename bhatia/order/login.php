<link href="<?php echo HTTP_BASE_URL_ORDER; ?>css/css1.css" rel="stylesheet" type="text/css" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="top"><table width="500" border="0" align="center" cellpadding="0" cellspacing="0" background="<?php echo HTTP_BASE_URL_ORDER; ?>images/login.jpg" style="background-repeat:no-repeat;">
                  <tr>
                    <td height="300" align="left" valign="top">
                    <form action="login_process.php" method="post" name="frmlogin">
                    <table width="100%" border="0" cellspacing="5" cellpadding="0">
                      <?php if($_REQUEST['msg']=='yes') { ?>
                       <tr>
                        <td height="40" colspan="2" align="center" valign="bottom" class="err_msg_11">Username or Password is incorrect!!</td>
                        <td>&nbsp;</td>
                      </tr>
					<?php } else { ?>                      
                      <tr>
                        <td height="40" colspan="2" align="center" valign="middle">&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    <?php } ?>
                      <tr>
                        <td width="160">&nbsp;</td>
                        <td height="25" class="title_10">Username</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td class="fonts10"><input name="username" type="text" class="title_10" id="username" style="padding:3px;" size="25" /></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td class="title_10">Passwords</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td class="fonts10"><input name="password" type="password" class="title_10" id="password" style="padding:3px;" size="25" /></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td height="35" valign="bottom" class="fonts10"><label>
                          <input name="login" type="submit" class="title_12" id="login" value="Login" />
                        </label></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td height="25"><a href="<?php echo HTTP_BASE_URL_ORDER; ?>index.php?pageno=12" class="title_10">Forgot password ?</a></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td height="25"><a href="<?php echo HTTP_BASE_URL_ORDER; ?>index.php?pageno=1" class="title_w_12">Not a member yet ? Sign up now</a></td>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
                    </form>
                    </td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="10"></td>
              </tr>
              </table>