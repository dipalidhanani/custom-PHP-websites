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

function validation(formlogin2)
{
	with(document.formlogin2)
    {
    	var errmsg="";
	    
		var illegalChars = /\W/; // allow letters, numbers, and underscores
			

		if(loginemail.value=="")
		{
			errmsg="Please enter your email address." + '<br>';
		}
		if(EmailValidation(loginemail.value)==false)
		{
			errmsg=errmsg + "Please enter valid email address." + '<br>';
		}
		if(loginpassword.value=="")
		{
			errmsg=errmsg + "Please enter your password.";
		}
		
				
		if(errmsg=="")
		{
		  return true;
		}
		else
		{			
			document.getElementById("erroralready_login").style.display= '';
			document.getElementById("erroralready_reg").style.display= 'none';
			document.getElementById("lblerror_login").style.visibility= "visible";
			document.getElementById("lblerror_login").innerHTML = errmsg;
			return false;
		}
    }
}
</script>
<script language="JavaScript">
function IsNumeric(strString) //  check for valid numeric strings
{
	if(!/\D/.test(strString)) return true;//IF NUMBER
	//else if(/^\d+\.\d+$/.test(strString)) return true;//IF A DECIMAL NUMBER HAVING AN INTEGER ON EITHER SIDE OF THE DOT(.)
	else
	return false;
}


function validation_reg(registerform)
{
	with(document.registerform)
    {
    	var errmsg="";
	    
		var illegalChars = /\W/; // allow letters, numbers, and underscores
 
		
		if(firstname.value=="")
		{
			errmsg="Please enter your firstname !";
		}
		if(lastname.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your lastname.";
		}		
		if(address.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your address.";
		}	
		if(email.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your email address.";
		}
		if(EmailValidation(email.value)==false)
		{
			errmsg=errmsg +'<br>' + "Please enter valid email address.";
		}		
		
		if(password.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your password.";
		}	
				
		if(errmsg=="")
		{
		  return true;
		}
		else
		{			
			document.getElementById("erroralready_reg").style.display= '';	
			document.getElementById("erroralready_login").style.display= 'none';
			document.getElementById("lblerror").style.visibility= "visible";
			document.getElementById("lblerror").innerHTML = errmsg;
			return false;
		}
    }
}

function validemail(){	
<?php 
$selectemail=mysql_query("select register_user_email from register_master");
	while($r=mysql_fetch_array($selectemail))
	{ ?>
	var email="<?php echo $r["register_user_email"]; ?>";
	//alert(email);
	if((document.getElementById('email').value)!="")
	{
	if(email==(document.getElementById('email').value))
	{
	 document.getElementById('errsameemail').style.display='';
	 return false;
	}
	else
	{
		 document.getElementById('errsameemail').style.display='none';
	}
	}
	<?php
	}	
	?>
}
function validemail_pass(){	
if(loginemail.value=="")
		{
			document.getElementById('erremail_pass').style.display='';
			 document.getElementById('errsameemail_pass').style.display='none';
			 document.getElementById('errvalidemail_pass').style.display='none';
			 return false;			
		}
		if(EmailValidation(loginemail.value)==false)
		{ 
			document.getElementById('errvalidemail_pass').style.display='';
			document.getElementById('erremail_pass').style.display='none';
			 document.getElementById('errsameemail_pass').style.display='none';
			 return false;		
		}
<?php 
$selectemail=mysql_query("select register_user_email from register_master");
	while($r=mysql_fetch_array($selectemail))
	{ ?>
	var email="<?php echo $r["register_user_email"]; ?>";
	//alert(email);
	if((document.getElementById('loginemail').value)!="")
	{
	if(email==(document.getElementById('loginemail').value))
	{
	 document.getElementById('errsameemail_pass').style.display='none';
	window.location.href='process.php?process=forgot_password&loginemail='+document.getElementById('loginemail').value;
return false;
	}	
	else{
		 document.getElementById('errsameemail_pass').style.display='';	 
		 document.getElementById('errvalidemail_pass').style.display='none';
	   document.getElementById('erremail_pass').style.display='none';	 
	
		}
	}
	<?php
	
	}	
	 
	?>	
}

</script>
<table width="960" border="0" cellspacing="0" cellpadding="0">
 <tr>
        <td align="center" valign="top" colspan="3"><table width="960" border="0" cellpadding="0" cellspacing="0" class="border1">
            <tr>
                <td width="100" align="center" bgcolor="#E96CC7" class="white8">You are here &gt;</td>
                <td width="5" bgcolor="#FFFFFF">&nbsp;</td>
                <td bgcolor="#FFFFFF" class="black8"><a href="index.php" class="black8">Home</a> / Login</td>
            </tr>
        </table></td>
    </tr>
  <tr>
  
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
     <tr>
        <td height="5" colspan="5"></td>
        </tr>
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border1">
        
      <tr>
      
                        <td bgcolor="#FFFFFF">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
       <tr>
                                <td height="35" bgcolor="#727272" style="background:url(images/tag_bg.jpg) repeat-x;" colspan="3">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="10">&nbsp;</td>
                                        <td align="left" valign="middle" class="title_black"><span class="title_white">Log In / Sign Up</span></td>
                                       
                                        <td width="10">&nbsp;</td>
                                    </tr>
                                </table></td>
       </tr>
      <tr>
        
        <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="2" cellpadding="0"  >
          <form name="registerform" id="registerform" method="post" action="registerprocess.php">
           <tr>
              <td align="left" colspan="3">&nbsp;</td>              
            </tr>
          
            <tr><td><table width="100%" cellpadding="0" cellspacing="2" style="border-right:1px solid #ddd;">
             <tr>
              <td align="left" class="green_fonts" colspan="3">NEW USER ? SIGN UP NOW </td>              
            </tr>
            
           <tr>
              <td align="left" colspan="3">&nbsp;</td>              
            </tr>          
            <tr>

                        <td align="right" class="font10"><span class="title_red">*</span>First Name</td>
                         <td width="5" class="font11">:</td>
                          <td><input name="firstname" type="text" class="font9 tb7"  id="firstname" size="25"></td>
                        </tr>
              <tr>
              <td height="2" colspan="3" align="center"></td>
              </tr>
                        <tr>
                         <td align="right" class="font10"><span class="title_red">*</span>Last Name</td>
                           <td width="5" class="font11">:</td>
                          <td><input name="lastname" type="text" class="font9 tb7"  id="lastname" size="25"></td>
                        </tr>
              <tr>
              <td height="2" colspan="3" align="center"></td>
              </tr>
                        <tr>
                         <td align="right" class="font10"><span class="title_red">*</span>Address</td>
                           <td width="5" class="font11">:</td>
                          <td>
                          <textarea name="address" id="address" class="tb7 font9" ></textarea>
                          </td>
                        </tr>
              <tr>
              <td height="2" colspan="3" align="center"></td>
              </tr>
            <tr>
              <td align="right" class="font10"><span class="title_red">*</span>Email</td>
              <td width="5" class="font11">:</td>
              <td><input type="text" name="email" id="email" size="25" onblur="validemail()" class="tb7 font9"/>
               <br /> <span id="errsameemail" style="display:none" ><font color="#FF0000">This Email address Already Exists!!!</font></span>
               </td>
            </tr>
            <tr>
              <td height="2" colspan="3" align="center"></td>
              </tr>
            <tr>
              <td align="right" class="font10"><span class="title_red">*</span>Password</td>
              <td class="font11">:</td>
              <td><input type="password" name="password" id="password" size="25" class="tb7 font9"/></td>
            </tr>
            <tr>
              <td height="2" colspan="3"></td>
              </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td class="font10"><input type="submit" onclick="return validation_reg(this.form);" style="cursor:pointer;" name="submit" value="Register Now" ></td>
              
              </tr>
           
            </table></td></tr>
             <tr>
              <td valign="bottom" colspan="3">&nbsp;</td>
            </tr>
            <tr id="erroralready_reg" style="display:none;">
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
                                    <td width="65" valign="middle"><img src="images/red_tab_06.png" width="65" height="58" /></td>
                                    <td width="5" valign="top">&nbsp;</td>
                                    <td valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">
                                      <tr>
                                        <td class="red_font9" align="left"><strong> Error</strong></td>
                                      </tr>
                                      <tr>
                                        <td class="red_font9" align="left">
                                        <div id="lblerror" class="normal_fonts10" align="left" style=" width:250px; margin-left:0px; color:#FF0000; border-color:#FF0000; visibility:hidden;" ></div>
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
              <tr><td height="10"></td></tr>           
            </form>
            </table></td>
            <td width="8"></td>
       <td bgcolor="#FFFFFF" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
          <form name="formlogin2" method="post" action="signinprocess.php">
          <tr>
              <td align="left" colspan="3">&nbsp;</td>              
            </tr>
           <tr>
              <td align="left" class="green_fonts" colspan="3">EXISTING USER ? LOGIN NOW </td>              
            </tr>
            
           <tr>
              <td align="left" colspan="3">&nbsp;</td>              
            </tr>
           <?php		   
		   if($_REQUEST["error"]=="invalid")
		   {
		   ?>
            <tr>
              <td align="right" class="font10">&nbsp;</td>
              <td class="font11">&nbsp;</td>
              <td class="title_red">Invalid Emailid and password</td>
            </tr>
            <?php
		   }
		   ?>
            
            <tr>
              <td align="right" class="font10"><span class="title_red">*</span>Email</td>
              <td width="5" class="font11">:</td>
              <td><input type="text" name="loginemail" id="loginemail" size="25" class="tb7 font9" />
               <br /> <span id="errsameemail_pass" style="display:none" ><font color="#FF0000">This Email address Does Not Exists!</font></span>
               <span id="erremail_pass" style="display:none" ><font color="#FF0000">Please enter your email address!</font></span>
               <span id="errvalidemail_pass" style="display:none" ><font color="#FF0000">Please enter valid email address!</font></span>
               </td>
            </tr>
            <tr>
              <td height="2" colspan="3" align="center"></td>
              </tr>
            <tr>
              <td align="right" class="font10"><span class="title_red">*</span>Password</td>
              <td class="font11">:</td>
              <td><input type="password" name="loginpassword" id="loginpassword" size="25"  class="tb7 font9"/></td>
            </tr>
            <tr>
              <td height="2" colspan="3"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td class="font10"><label>
                <input type="submit" name="submit" id="submit" value="Login" onclick="return validation(this.form);" style="cursor:pointer;"/>
              </label>&nbsp;&nbsp;<u><a href="#" onclick="return validemail_pass()">Forgot Password ?</a></u></td>
              
              </tr>
            <tr>
              <td valign="bottom" colspan="3">&nbsp;</td>
            </tr>
            <tr id="erroralready_login" style="display:none;">
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
               <div id="lblerror_login" class="normal_fonts10" align="left" style=" width:250px; margin-left:0px; color:#FF0000; border-color:#FF0000; visibility:hidden;" ></div>
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
            </form>
            </table></td>
      </tr>
     
    </table></td>
      
      </tr>
    
    </table>
        
        </td>
       
      </tr>
      <tr>
        <td height="5" colspan="5"></td>
        </tr>
    </table></td>
        <td width="10">&nbsp;</td>
     <td width="200" align="left" valign="top"><?php include("right.php"); ?></td>
    
  </tr>
 
</table>
