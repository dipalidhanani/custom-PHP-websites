<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>
<link href="css/home.css" rel="stylesheet" type="text/css" />
<script language="JavaScript">
function EmailValidation(emailval)
{
	if(emailval=="")
	{
		return true;
	}
	else
	{
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		if(reg.test(emailval) == false)
		{
			 return false;
		}
		else
		{
			return true;
		}
	}
}

function validation(forgotpasswordform)
{
	with(document.forgotpasswordform)
    {
    	var errmsg="";
	    
		var illegalChars = /\W/; // allow letters, numbers, and underscores
			

		if(youremail.value=="")
		{
			errmsg="Please enter your email address.";
		}
		if(EmailValidation(youremail.value)==false)
		{
			errmsg=errmsg +"Please enter valid email address.";
		}		
				
		if(errmsg=="")
		{
		  return true;
		}
		else
		{			
			document.getElementById("erroralready").style.display= '';			
			document.getElementById("lblerror").style.visibility= "visible";
			document.getElementById("lblerror").innerHTML = errmsg;
			return false;
		}
    }
}
</script>
<table width="100%" border="0"  cellspacing="0" cellpadding="0">

  <tr>
    <td width="10">&nbsp;</td>
    <td align="left" valign="top">
    <table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td class="titel_2"><strong>Forgot Password?</strong></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" background="images/pgbg02a.jpg" class="border3" cellspacing="2" cellpadding="0">
          <form name="forgotpasswordform" method="post" action="process.php">
            <?php
			if($_REQUEST["error"]=="yes")
			{
			?>
            <tr>
              <td height="25" colspan="3" align="center" class="red_font9"><strong class="red_font9">This email address is not registered with SQ Jeans</strong></td>
            </tr>
            <?php
			}
			?>
            <?php
			if($_REQUEST["value"]=="sent")
			{
			?>
            <tr>
              <td height="25" colspan="3" align="center" class="red_font9"><strong class="red_font9">Password has been sent successfully to your email account.</strong></td>
            </tr>
            <?php
			}
			?>
            <tr>
              <td height="25" colspan="3" align="left" class="font10"><strong>Please enter your email address to retrieve your password.</strong></td>
              </tr>
                  <tr>
              <td height="10" colspan="3"></td>
              </tr>
            <tr>
              <td width="30%" align="right" class="font10"><strong>Email</strong></td>
              <td width="5" class="font11">:</td>
              <td><input name="youremail" type="text" class="font9" id="youremail" size="45" /></td>
            </tr>
            <tr>
              <td height="10" colspan="3" align="center"></td>
              </tr>
            
        
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>
              <input type="hidden" name="action" value="forgotpassword" />
              <input type="submit" name="submit" id="submit" value="Submit" onclick="return validation(this.form);" style="cursor:pointer;"/></td>
              </tr>
            <tr>
              <td height="10" colspan="3" align="center"></td>
              </tr>
            <tr id="erroralready" style="display:none;">
              <td colspan="3" valign="bottom"><table width="50%" border="0" cellspacing="0" cellpadding="0" align="center">
                              <tr>
                                <td width="10" height="10"><img src="images/red_tab_01.png" width="10" height="10" /></td>
                                <td background="images/red_tab_03.png" style="background-repeat:repeat-x"></td>
                                <td width="10" height="10"><img src="images/red_tab_04.png" width="10" height="10" /></td>
                              </tr>
                              <tr>
                                <td background="images/red_tab_05.png" style="background-repeat:repeat-y">&nbsp;</td>
                                <td bgcolor="#FFD3D3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="65" valign="top"><img src="images/red_tab_06.png" width="65" height="58" /></td>
                                    <td width="5" valign="top">&nbsp;</td>
                                    <td valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">
                                      <tr>
                                        <td class="red_font9" align="left"><strong> Error</strong></td>
                                      </tr>
                                      <tr>
                                        <td class="red_font9" align="left">
                                        <div id="lblerror" class="font10" align="left" style=" width:250px; margin-left:0px; color:#FF0000; border-color:#FF0000; visibility:hidden;" ></div>                                        </td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table></td>
                                <td background="images/red_tab_08.png" style="background-repeat:repeat-y">&nbsp;</td>
                              </tr>
                              <tr>
                                <td><img src="images/red_tab_12.png" width="10" height="10" /></td>
                                <td background="images/red_tab_14.png" style="background-repeat:repeat-x"></td>
                                <td><img src="images/red_tab_15.png" width="10" height="10" /></td>
                              </tr>
</table></td>
              </tr>            
            </form>
            </table></td>
  </tr>
</table>

    </td>
    <td width="10">&nbsp;</td>
  </tr>

</table>