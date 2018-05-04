<?php 
$errormsg=$_GET["errormsg"];
?>
  <table width="99%" border="0" cellspacing="0" cellpadding="0">
      
          <tr>           
            <td>           
<form method="post" name="frmuserlogin" id="frmuserlogin" action="process_login.php" >
<table width="100%" border="0" cellspacing="10" cellpadding="0">
           <tr>
                            <td width="71%" class="title_red"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="25"><img src="images/arrow1.png" width="19" height="18"></td>
                                    <td class="title_red"><strong>Login</strong></td>
                                    </tr>
                                </table></td>
              </tr>
          
         
<tr>
<td>
<table width="100%" border="0" cellspacing="5" cellpadding="5">
          <tr>
          <td width="177" class="black10"> Email Address : </td>
            <td width="1144"><input name="txtEmail" type="text" class="textcss" id="txtEmail" value="Email" size="24" onFocus="if(this.value == 'Email') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Email';}" tabindex="1"  /></td>
           
            
          </tr>
          
         
          <tr>
           <td class="black10"> Password : </td>
            <td><input name="txtPass" type="Password" class="textcss" id="txtPass" value="Password" size="24"   onFocus="if(this.value == 'Password') {this.value = '';}"  onBlur="if (this.value == '') {this.value = 'Password';}"  tabindex="2" /></td>
           
            </tr>
                  <tr><td colspan="3"> 
          <input type="hidden" name="process" value="login"  />
           
          <input type="submit" name="submit" value="Login"  tabindex="3"/>
            </td></tr>
          <?php
            	if($errormsg!="")
				{ ?>
          <tr>
            <td height="15" colspan="3" class="black10">
            <font color="#FF0000" >
            <strong><?php  echo $errormsg; ?></strong>
            </font>
            </td>
          </tr>
          <?php } ?>
          <tr>
            <td colspan="3" align="left" class="black10" style="color:#AB2400;"><a href="home.php?pageno=16" style="color:#AB2400;">New Registration</a> | <a href="#" style="color:#AB2400;" onClick="return alert('Please contact to our support team.')">Forgot Password?</a></td>
            </tr>
          </table></td></tr>
           <tr><td height="5"></td></tr>
          
        </table>
</form></td></tr></table>
