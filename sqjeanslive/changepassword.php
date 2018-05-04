<link href="css/home.css" rel="stylesheet" type="text/css" />
<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>
<script language="JavaScript">
function validation(passwordform)
{
	with(document.passwordform)
    {
    	var errmsg="";
	    
		var illegalChars = /\W/; // allow letters, numbers, and underscores
 
		
		if(oldpassword.value=="")
		{
			errmsg="Please enter your current password.";
		}			
		if(newpassword.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your new password.";
		}
		if(confirmpassword.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your confirm password.";
		}
		if(newpassword.value!=confirmpassword.value)
		{
			errmsg=errmsg +'<br>' + "new password and confirmation does not matched.";
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
<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td width="10">&nbsp;</td>
    <td align="left" valign="top">
    <table width="100%" border="0"  cellspacing="0" cellpadding="5">
  <tr>
    <td align="center" class="titel_2"><b><h1>Change Password</h1></b></td>
  </tr>
  <tr>
    <td ><table width="100%" border="0" background="images/pgbg02a.jpg"  cellpadding="0" cellspacing="0" class="border3">
              
      <tr>
                    
                    <td><form name="passwordform" id="passwordform" action="process.php" method="post">
                      <table width="100%" border="0" cellspacing="0" cellpadding="5">                      
                      <?php
					  if($_REQUEST["msg"]!="")
					  {
						   if($_REQUEST["msg"]=="no")
						   {
							   $msg="Please enter the valid current password";
						   }
						   elseif($_REQUEST["msg"]=="yes")
						   {
							   $msg="password changed successfully";
						   }
						   
					  ?>
                      <tr>
                        <td colspan="2" align="center" valign="top" class="font9"><font color="#FF0000">
						<?php echo $msg;?></font></td>
                        </tr>
                        <?php
					  }
					  ?>
                      <tr>
                        <td width="45%" align="right" valign="top" class="font9">Old Password :</td>
                        <td align="left" valign="top"><input type="password" name="oldpassword" class="font8"/></td>
                      </tr>
                      <tr>
                        <td align="right" valign="top" class="font9">New Password :</td>
                        <td align="left" valign="top" ><input type="password" name="newpassword" class="font8"/></td>
                      </tr>
                      <tr>
                        <td align="right" valign="top" class="font9">Confirm Password :</td>
                        <td align="left" valign="top"><input type="password" name="confirmpassword" class="font8"/></td>
                      </tr>
                      <tr id="submitbuttontr">
                        <td colspan="2" align="center"                         
                        <input type="hidden" name="action" value="changepassword" />
                        <input type="submit" name="submit" value="Change Password" class="font9" onclick="return validation(this.form);" style="cursor:pointer;"/></td>
                        </tr>                        
                      </table>
                      </form></td>
                    
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr id="erroralready" style="display:none;">
                    <td><table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
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
                                        <td class="titel" align="left"><font color="#FF0000"><b>Error</b></font></td>
                                      </tr>
                                      <tr>
                                        <td class="red_font9" align="left">
                                        <div id="lblerror" class="font10" align="left" style=" width:300px; margin-left:0px; color:#FF0000; border-color:#FF0000; visibility:hidden;" ></div>
                                        </td>
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
                 </table></td>
                </tr>
               </table>
             </td>
            <td width="10">&nbsp;</td>
           </tr>

</table>