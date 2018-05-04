<?php
$errormsg=$_GET["errormsg"];
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="10" height="10"><img src="images/box2_01.png" width="10" height="10" /></td>
            <td background="images/box2_02.png" style="background-repeat:repeat-x;"></td>
            <td width="10" height="10"><img src="images/box2_03.png" width="10" height="10" /></td>
          </tr>
          <tr>
            <td background="images/box2_04.png" style="background-repeat:repeat-y;">&nbsp;</td>
            <td bgcolor="#E4DFD3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              
              <tr>
                <td>
 <form method="post" name="frmuserlogin" id="frmuserlogin" action="process_login.php" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="3" class="title"><strong>Login</strong></td>
            </tr>
          <tr>
            <td height="10" colspan="3"></td>
            </tr>
          <tr>
          <td width="242" class="black10"> Email Address : </td>
            <td width="642"><input name="txtEmail" type="text" class="textcss" id="txtEmail" value="Email" size="24" onFocus="if(this.value == 'Email') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Email';}" tabindex="1"  /></td>
            <td width="10">&nbsp;</td>
            <td width="80" rowspan="3" align="center" valign="middle">
            <input type="hidden" name="process" value="login"  />
           
            <input type="image" name="submit" src="images/index2_26.jpg" value=""  tabindex="3"/>
           </td>
          </tr>
          
          <tr>
            <td height="10"></td>
            <td height="10"></td>
            </tr>
          <tr>
           <td class="black10"> Password : </td>
            <td><input name="txtPass" type="Password" class="textcss" id="txtPass" value="Password" size="24"   onFocus="if(this.value == 'Password') {this.value = '';}"  onBlur="if (this.value == '') {this.value = 'Password';}"  tabindex="2" /></td>
            <td width="10">&nbsp;</td>
            </tr>
          <tr><td height="5"></td></tr>
          <?php
            	if($errormsg!="")
				{ ?>
          <tr>
            <td height="15" colspan="3" class="black10">
            <font color="#FF0000" >
            <?php  echo $errormsg; ?>
            </font>
            </td>
          </tr>
          <?php } ?>
           <tr><td height="5"></td></tr>
          <tr>
            <td colspan="3" align="left" class="black10"><a href="index.php?page=5">New Registration</a> | <a href="index.php?page=8">Forgot Password?</a></td>
            </tr>
        </table>
</form>
</td>
              </tr>
              </table></td>
            <td background="images/box2_06.png" style="background-repeat:repeat-y;">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="images/box2_07.png" width="10" height="10" /></td>
            <td background="images/box2_08.png" style="background-repeat:repeat-x;"></td>
            <td><img src="images/box2_09.png" width="10" height="10" /></td>
          </tr>
        </table>

 