<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>
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
			errmsg="Please enter your firstname.";
		}
		if(lastname.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your lastname.";
		}
		if(address.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your address.";
		}		
		if(city.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your city.";
		}
		if(state.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your state/province.";
		}
		if(pincode.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your pincode.";
		}
		if(country.value=="")
		{
			errmsg=errmsg +'<br>' + "Please select your country.";
		}
		if(email.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your email address.";
		}
		if(EmailValidation(email.value)==false)
		{
			errmsg=errmsg +'<br>' + "Please enter valid email address.";
		}
		if(mobile.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your mobile number.";
		}
		if(mobile.value!="")
		{
			if(IsNumeric(mobile.value)==false)
			{
					errmsg=errmsg +'<br>' + "Please enter valid mobile number.";
			}
		}
		if(phone.value!="")
		{
			if(IsNumeric(phone.value)==false ||phone.value.length < 7)
			{
					errmsg=errmsg +'<br>' + "Please enter valid phone number.";
			}
		}
		if(password.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your password.";
		}
		if(confirmpassword.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your confirm password.";
		}
		if((password.value)!=(confirmpassword.value))
		{
			errmsg=errmsg +'<br>' + "your password and confirm password are not same.";
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
<table width="100%" border="0" background="images/pgbg02a.jpg" class="border3" cellspacing="0" cellpadding="0">

  <tr>
    <td width="10">&nbsp;</td>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td class="titel_2"><strong>Registration</strong></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="1" cellspacing="0">   
     <form name="registerform" id="registerform" method="get" action="process.php">               
                  <?php
				  if($_REQUEST["error"]=="email")
				  {
				  ?>
                  <tr>
                    <td colspan="2" class="font10" ><table width="100%" border="0" cellspacing="3" cellpadding="3">
                      <tr>
                        <td class="red_font9"><strong>This email address is already registered with SQ Jeans</strong></td>
                      </tr>
                      <tr>
                        <td class="red_font9"><strong><a href="index.php?object=22">Click here,</a> if you forgot password?</strong></td>
                      </tr>
                    </table></td>
                  </tr>
                  <?php
				  }
				  ?>
                   <?php
				  if($_REQUEST["msg"]=="register")
				  {
				  ?>
                  <tr>
                    <td colspan="2" class="font10" ><table width="100%" border="0" cellspacing="3" cellpadding="3">
                      <tr>
                        <td class="red_font9"><strong>Congratulations,</strong></td>
                      </tr>
                      <tr>
                        <td class="red_font9"><strong>Your account has been created successfully on SQ Jeans</strong></td>
                      </tr>                     
                    </table></td>
                  </tr>
                  <?php
				  }
				  ?>
                  <tr>
                    <td height="35" align="left" valign="middle" class="font10" ><strong>Login Information :</strong></td>
                    <td align="right" class="font8_red" >&nbsp;* Signifies required fields</td>
                  </tr>
                  <tr>
                    <td width="30%" align="right" valign="top" class="font10" >Email Address <span class="font8_red">*</span></td>
                    <td width="75%" ><input name="email" type="text" class="font9"  id="email" size="40" value="<?php echo $billing_email;?>" /></td>
                  </tr>                 
                  <tr>
                    <td align="right" valign="top" class="font10" >Password <span class="font8_red">*</span></td>
                    <td><input name="password" type="password" class="font9"  size="30" /></td>
                  </tr>
                  <tr>
                    <td align="right" valign="top" class="font10" >Retype Password <span class="font8_red">*</span></td>
                    <td ><input name="confirmpassword" type="password" class="font9"  size="30" /></td>
                  </tr>
                  <tr>
                    <td height="35" align="left" valign="middle" class="font10" ><strong>Personal Information :</strong></td>
                  </tr>
                  <tr>
                    <td width="30%" align="right" valign="top" class="font10" >First Name <span class="font8_red">*</span></td>
                    <td width="75%"><input name="firstname" type="text" class="font9"  id="firstname" size="40" /></td>
                  </tr>
                  <tr>
                    <td align="right" valign="top" class="font10" >Last Name <span class="font8_red">*</span></td>
                    <td ><input name="lastname" type="text" class="font9"  id="lastname" size="40"  /></td>
                  </tr>
                  <tr>
                    <td align="right" valign="top" class="font10" >Date Of Birth <span class="font8_red">*</span></td>
                    <td ><select name="day" class="font9">
                    	<option value="">Day</option>
                    <?php
                    for($d=1;$d<=31;$d++)
                    {
                    ?>
                        <option value="<?php echo $d;?>"><?php echo $d;?></option>
                    <?php
                    }
                    ?>
                </select>  
                <select name="month" class="font9">
                        <option value="">Mon</option>                
                        <option value="Jan">Jan</option>
                        <option value="Feb">Feb</option>
                        <option value="Mar">Mar</option>
                        <option value="Apr">Apr</option>
                        <option value="May">May</option>
                        <option value="Jun">Jun</option>
                        <option value="Jul">Jul</option>
                        <option value="Aug">Aug</option>
                        <option value="Sep">Sep</option>
                        <option value="Oct">Oct</option>
                        <option value="Nov">Nov</option>
                        <option value="Dec">Dec</option>                
                </select>
                <select name="year" class="font9">
                    	<option value="">Year</option>
                    <?php
                    for($y=1900;$y<=date("Y");$y++)
                    {
                    ?>
                        <option value="<?php echo $y;?>"><?php echo $y;?></option>
                    <?php
                    }
                    ?>
                </select></td>
                  </tr>
                  <tr>
                    <td align="right" valign="top" class="font10" >Gender <span class="font8_red">*</span></td>
                    <td class="font10" ><table border="0" cellspacing="0" cellpadding="5">
              <tr>
                <td><input type="radio" name="gender" value="Male" checked="checked" /></td>
                <td>Male</td>
                <td><input type="radio" name="gender" value="Female" /></td>
                <td>Female</td>
              </tr>
            </table></td>
                  </tr>
                  <tr>
                    <td width="30%" align="right" valign="top" class="font10" >Address <span class="font8_red">*</span></td>
                    <td><textarea name="address" cols="40"  rows="3" class="font9"></textarea></td>
                  </tr>
                  <tr>
                    <td align="right" valign="top" class="font10" >Address (Cntd.) </td>
                    <td ><textarea name="address2" cols="40"  rows="3" class="font9"></textarea></td>
                  </tr>
                  <tr>
                    <td align="right" valign="top" class="font10" >Post Code <span class="font8_red">*</span></td>
                    <td class="font9"><input name="pincode" type="text" class="font9"  id="pincode" size="40" /></td>
                  </tr>
                  <tr>
                    <td align="right" valign="top" class="font10" >City <span class="font8_red">*</span></td>
                    <td ><input name="city" type="text" class="font9"  id="city" size="25"/></td>
                  </tr>
                  <tr>
                    <td align="right" valign="top" class="font10" >State / Province <span class="font8_red">*</span></td>
                    <td><input name="state" type="text" class="font9"  id="state" size="25"/></td>
                  </tr>
                  <tr>
                    <td align="right" valign="top" class="font10" >Country <span class="font8_red">*</span></td>
                    <td ><select name="country" class="font9">                     
                      <option value="">Select</option>
						  <?php
                         $query="SELECT * FROM shipping_charges  where shipping_is_avail=1 order by shipping_country";			
                         $recordsetshipping = mysql_query($query);
                         while($rowshipping = mysql_fetch_array($recordsetshipping,MYSQL_ASSOC))
                         {
                         ?>	
                          <option value="<?php echo $rowshipping["shipping_country"];?>"><?php echo $rowshipping["shipping_country"];?></option>
                         <?php
                         }
                         ?>
                    </select></td>
                  </tr>
                  <tr>
                    <td align="right" valign="top" class="font10" >Phone&nbsp;&nbsp;</td>
                    <td><input name="phone" type="text" class="font9"  id="phone" size="25"/></td>
                  </tr>
                  <tr>
                    <td align="right" valign="top" class="font10" >Mobile <span class="font8_red">*</span></td>
                    <td ><input name="mobile" type="text" class="font9"  id="mobile" size="25" /></td>
                  </tr>
                  <tr>
                    <td align="right" valign="top" class="font10" >&nbsp;</td>
                    <td>
                    <input type="hidden" name="action" value="register" />
                    <input type="submit" name="submit" value="Register" onclick="return validation(this.form);" style="cursor:pointer;"/></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center" valign="top" class="red_font10" >New customers will Get Discount code on Regitration when offer is running<br />Registered Members will get discount offers by E-Mail</td>
                  </tr>
              </form>
          </table></td>
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
                                    <td width="65" valign="top"><img src="images/red_tab_06.png" width="65" height="58" /></td>
                                    <td width="5" valign="top">&nbsp;</td>
                                    <td valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">
                                      <tr>
                                        <td class="red_font9" align="left"><strong>Registration Error</strong></td>
                                      </tr>
                                      <tr>
                                        <td class="red_font9" align="left">
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
</table>

    </td>
    <td width="10">&nbsp;</td>
  </tr>

</table>