<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>
<link href="css/home.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function login_setFocus()
{
     document.getElementById("sqjeansemail").focus();
}
</script>
<table width="100%" border="0"  background="images/pgbg02a.jpg" background="repeat;" cellspacing="0" cellpadding="0">

  <tr>
    <td width="10">&nbsp;</td>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td class="titel_2"><strong>Already Registered</strong></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="5">
      <tr>
        <td class="font10"><strong>This email address is already registered with SQ Jeans</strong></td>
      </tr>
      <tr>
        <td class="font10"><strong><a href="#" onclick="login_setFocus()" style="cursor:pointer;"><font color="#0000CC">Click here</font></a> to login into your account to proceed order.</strong></td>
      </tr>
      <tr>
        <td class="font10"><strong><a href="index.php?object=22"><font color="#0000CC">Click here</font>,</a> if you forgot password?</strong></td>
      </tr>
    </table></td>
  </tr>
</table>

    </td>
    <td width="10">&nbsp;</td>
  </tr>

</table>