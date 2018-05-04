<link href="css/home.css" rel="stylesheet" type="text/css" />
<script language="JavaScript">
function IsNumeric(strString) //  check for valid numeric strings
{
	if(!/\D/.test(strString)) return true;//IF NUMBER
	//else if(/^\d+\.\d+$/.test(strString)) return true;//IF A DECIMAL NUMBER HAVING AN INTEGER ON EITHER SIDE OF THE DOT(.)
	else
	return false;
}
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

function validation(registerform)
{
	with(document.registerform)
    {
    	var errmsg="";
	    
		var illegalChars = /\W/; // allow letters, numbers, and underscores
 
		
		if(firstname.value=="")
		{
			errmsg="Please Enter First Name!";
		}
		if(lastname.value=="")
		{
			errmsg=errmsg +'<br>' + "Please Enter Last Name!";
		}
		if(dateofbirth.value=="")
		{
			errmsg=errmsg +'<br>' + "Please Enter Date Of Birth!";
		}
		if(document.getElementById("unit").value=="")
		{
			errmsg=errmsg +'<br>' + "Please Enter Unit!";
		}	
		if(document.getElementById("street").value=="")
		{
			errmsg=errmsg +'<br>' + "Please Enter Street!";
		}	
		if(subburb.value=="")
		{
			errmsg=errmsg +'<br>' + "Please Enter Subburb!";
		}
		if(state.value=="")
		{
			errmsg=errmsg +'<br>' + "Please Enter State/Province!";
		}
		if(pincode.value=="")
		{
			errmsg=errmsg +'<br>' + "Please Enter Post Code!";
		}
		
		if(email.value=="")
		{
			errmsg=errmsg +'<br>' + "Please Enter Email Address!";
		}
		if(EmailValidation(email.value)==false)
		{
			errmsg=errmsg +'<br>' + "Please Enter Valid Email Address!";
		}
		if(mobile.value=="")
		{
			errmsg=errmsg +'<br>' + "Please Enter Mobile Number!";
		}
		if(mobile.value!="")
		{
			if(IsNumeric(mobile.value)==false ||mobile.value.length != 10)
			{
					errmsg=errmsg +'<br>' + "Please Enter Valid Mobile Number!";
			}
		}
		if(phone.value!="")
		{
			if(IsNumeric(phone.value)==false ||phone.value.length < 7)
			{
					errmsg=errmsg +'<br>' + "Please Enter Valid Phone Number.";
			}
		}
		if(password.value=="")
		{
			errmsg=errmsg +'<br>' + "Please Enter Password!";
		}
		if(confirmpassword.value=="")
		{
			errmsg=errmsg +'<br>' + "Please Enter Retype Password!";
		}
		if((password.value)!=(confirmpassword.value))
		{
			errmsg=errmsg +'<br>' + "Password and Retype Password are not same!";
		}
		if(regcheck.checked=="")
		{
			errmsg=errmsg +'<br>' + "Please Accept Registration Terms & Condition!";
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

function validemail(){
	
<?php 
$selectemail=mysql_query("select register_user_email from register_master");
	while($r=mysql_fetch_array($selectemail))
	{ ?>
	var email="<?php echo $r["register_user_email"]; ?>";
	//alert(email);
	if(email==(document.getElementById('email').value))
	{
	 document.getElementById('errsameemail').style.display='';
	 return false;
	}
	else
	{
		 document.getElementById('errsameemail').style.display='none';
	}
	
	<?php
	}	
	?>
}

function matchpostcode(){
	
<?php 
$selectemail=mysql_query("select postcode from shipping_charges");
	while($r=mysql_fetch_array($selectemail))
	{ ?>
	var postcode="<?php echo $r["postcode"]; ?>";
	//alert(document.getElementById('pincode').value);
	if(postcode==document.getElementById('pincode').value)
	{
	 document.getElementById('errmatchpost').style.display='none';
	  return false;
	}
	else
	{
		 document.getElementById('errmatchpost').style.display='';
	
		
	}
	
	
	<?php
	}	
	?>
}


</script>
<link type="text/css" rel="stylesheet" href="admin/calendar/calendar.css" media="screen"></link>
<script language="javascript" type="text/javascript" src="admin/calendar/calendar.js"></script>
<table width="960" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0" class="border1">
                    <tr>
                        <td bgcolor="#FFFFFF">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
       <tr>
                                <td height="35" bgcolor="#727272" style="background:url(images/tag_bg.jpg) repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="10">&nbsp;</td>
                                        <td align="left" valign="middle" class="title_black"><span class="title_white">Register</span></td>
                                       
                                        <td width="10">&nbsp;</td>
                                    </tr>
                                </table></td>
       </tr>
      <tr>       
        <td bgcolor="#FFFFFF" class="black10"><table width="100%" border="0" cellspacing="2" cellpadding="2">
                  <form name="registerform" id="registerform" method="get" action="registerprocess.php">
                  <tr>

                    <td><table width="100%" border="0" cellpadding="5" cellspacing="5">
                        <tr>
                          <td class="font10" ><strong>Please fill up follow fileds to register.</strong></td>
                          <td align="right" class="title_red" >&nbsp;* Signifies required fields</td>
                        </tr>
                    </table></td>
                  </tr>
                  <?php
				  if($_REQUEST["error"]=="email")
				  {
				  ?>
                  <tr>
                    <td><table width="100%" border="0" cellspacing="3" cellpadding="3">
                      <tr>
                        <td class="red_black10">This email address is already registered with Klassic Kids</td>
                      </tr>
                      <tr>
                        <td class="red_black10">Click here, if you forgot password?</td>
                      </tr>
                    </table></td>
                  </tr>
                  <?php
				  }
				  ?>
                  <tr>

                    <td><table width="100%" border="0" cellpadding="3" cellspacing="3" >
                        <tr>

                          <td width="25%" align="right" valign="top" class="font10" ><span class="title_red">*</span>First Name :</td>
                          <td width="75%"><input name="firstname" type="text"  id="firstname" size="25" class="tb7 black10"></td>
                          </tr>
                        <tr>
                          <td align="right" valign="top" class="font10" ><span class="title_red">*</span>Last Name :</td>
                          <td><input name="lastname" type="text" id="lastname" size="25" class="tb7 black10"></td>
                        </tr>
                         <tr>
                          <td align="right" valign="top" class="font10" ><span class="title_red">*</span>Date Of Birth :</td>
                          <td ><input name="dateofbirth" type="text" id="dateofbirth" size="25" class="tb7 black10" onFocus="displayCalendar(dateofbirth,'dd-mm-yyyy',this)"></td>
                        </tr>
                    </table></td>

                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="3" cellspacing="3" >
                        <tr>
                          <td width="25%" align="right" valign="top" class="font10" ><span class="title_red">*</span>Unit :</td>
                          <td><input type="text" name="unit" id="unit" class="black10"  /></td>
                        </tr>
                        <tr>

                          <td align="right" valign="top" class="font10" ><span class="title_red">*</span>Street : </td>
                          <td><input type="text" name="street" id="street" class="black10"  /></td>
                        </tr>
                        <tr>
                          <td align="right" valign="top" class="font10" ><span class="title_red">*</span>Subburb :</td>
                          <td><input name="subburb" type="text" id="subburb" size="25" class="tb7 black10"></td>
                        </tr>

                        <tr>
                          <td align="right" valign="top" class="font10" ><span class="title_red">*</span>State / Province :</td>
                          <td><input name="state" type="text"  id="state" size="25" class="tb7 black10"></td>
                        </tr>
                        <tr>
                          <td align="right" valign="top" class="font10" ><span class="title_red">*</span>Post Code :</td>
                          <td class="black10"><input name="pincode" type="text" id="pincode" size="20" onblur="matchpostcode()" class="tb7 black10">
                          <br /> <span id="errmatchpost" style="display:none" ><font color="#FF0000">Does not match Post Code!!!</font></span></td>
                        </tr>

                        <tr>
                          <td align="right" valign="top" class="font10" >Country : </td>
                        <td class="black10">Australia<input name="country" type="hidden" id="country" size="20" value="Australia" class="tb7 black10">
                          </td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>

                    <td><table width="100%" border="0" cellpadding="3" cellspacing="3" >
                        <tr>
                          <td width="25%" align="right" valign="top" class="font10" ><span class="title_red">*</span>Email Address :</td>
                          <td width="75%"><input name="email" type="text" id="email" size="40" onblur="validemail()" class="tb7 black10">
                          <br /> <span id="errsameemail" style="display:none" ><font color="#FF0000">This Email address Already Exists!!!</font></span></td>
                        </tr>
                        <tr>
                          <td align="right" valign="top" class="font10" >Phone&nbsp;&nbsp;&nbsp;</td>
                          <td><input name="phone" type="text" id="phone" size="25" class="tb7 black10"></td>

                        </tr>
                        <tr>
                          <td align="right" valign="top" class="font10" ><span class="title_red">*</span>Mobile :</td>
                          <td><input name="mobile" type="text" id="mobile" size="25" class="tb7 black10"></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>

                    <td><table width="100%" border="0" cellpadding="3" cellspacing="3" >
                        <tr>
                          <td width="25%" align="right" valign="top" class="font10" ><span class="title_red">*</span>Password :</td>
                          <td width="75%"><input name="password" type="password" size="20" class="tb7 black10"></td>
                        </tr>
                        <tr>
                          <td align="right" valign="top" class="font10" ><span class="title_red">*</span>Retype Password : </td>
                          <td><input name="confirmpassword" type="password" size="20" class="tb7 black10"></td>

                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="3" cellspacing="3" >
                       
                        <tr>
                          <td ><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td valign="top" class="font10" ><input name="regcheck" type="checkbox"  id="regcheck" value="regcheck"></td>
                                <td valign="top" class="font10" >&nbsp;</td>
                                <td valign="top" class="red_black10" >Registration is subject to terms and conditions. Please check the box to signify you have read these available here and your acceptance of these.</td>
                              </tr>
                          </table></td>
                        </tr>

                        <tr>
                          <td>
</td>
                        </tr>
                        <tr>
                          <td align="center"><input type="submit" onclick="return validation(this.form);" style="cursor:pointer;" name="submit" value="Register Now" >
                            &nbsp;</td>
                        </tr>
                    </table></td>


                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr id="erroralready" style="display:none;">
                    <td><table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
                              <tr>
                                <td width="10" height="10"><img src="images/red_tab_01.png" width="10" height="10" /></td>
                                <td background="images/red_tab_03.png" style="background-repeat:repeat-x"></td>
                                <td width="10" height="10"><img src="images/red_tab_04.png" width="10" height="10" /></td>
                              </tr>
                              <tr>
                                <td background="images/red_tab_05.png" style="background-repeat:repeat-y">&nbsp;</td>
                                <td bgcolor="#FFD3D3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="65" valign="top"><img src="images/red_tab_06.png" width="65" height="58" align="absmiddle" /></td>
                                    <td width="5" valign="top">&nbsp;</td>
                                    <td valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">
                                      <tr>
                                        <td class="red_black10" align="left"><strong>Registration Error</strong></td>
                                      </tr>
                                      <tr>
                                        <td class="red_black10" align="left">
                                        <div id="lblerror" class="normal_fonts10" align="left" style=" width:400px; margin-left:0px; color:#FF0000; border-color:#FF0000; visibility:hidden;" ></div>
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
      
    </table>
    </td>
                    </tr>
                </table>
                </td></tr></table>