<?php 
$userid=$_SESSION['user_reg_id'];
?>
<script language="javascript">
function check_valid_email(emailval)
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
</script>

<script language="javascript">
function validation_form()
{
		
	if(document.getElementById('name').value=='')
	{
		
		document.getElementById('errname').style.display='';
		
		return false;
			
	}
	if (isNaN(document.getElementById('errname').value)==false)
        {
		
		document.getElementById('errvalidname').style.display='';
		
		return false;
			
	}
	if(document.getElementById('address').value=='')
	{
		
		document.getElementById('erraddress').style.display='';
		
		return false;
			
	}
	if(document.getElementById('mobile_no').value=='')
	{
		
		document.getElementById('errmobile').style.display='';
		
		return false;
			
	}
	if (isNaN(document.getElementById('mobile_no').value)==true)
        {
		
		document.getElementById('errvalidmobile').style.display='';
		
		return false;
			
	}
	if(document.getElementById('email').value=='')
	{
		
		document.getElementById('erremail').style.display='';
		
		return false;
			
	}
	if(check_valid_email(document.getElementById('email').value)==false)
	{
		
		document.getElementById('errvalidemail').style.display='';
		
		return false;
			
	}
	if(document.getElementById('password').value=='')
	{
		
		document.getElementById('errpassword').style.display='';
		
		return false;
			
	}
	
	if(document.getElementById('conf_password').value=='')
	{
		
		document.getElementById('errconf_password').style.display='';
		
		return false;
			
	}
	if(document.getElementById('security_code').value=='')
	{
		
		document.getElementById('errsecurity_code').style.display='';
				
		return false;
			
	}
	if(!document.getElementById('terms').checked)
	{
		
		document.getElementById('errterms').style.display='';
		
		return false;
			
	}
	
	
	
}

</script>
<script language="javascript">

function validation(id)
{
	
	if(id==1)
	{
		if(document.getElementById('name').value=='')
		{
			
			document.getElementById('errname').style.display='';
			document.getElementById('errvalidname').style.display='none';
			
		}
		else
		{
			document.getElementById('errname').style.display='none';
			document.getElementById('errvalidname').style.display='none';	
			if (isNaN(document.getElementById('name').value)==false)
					{
						document.getElementById('errvalidname').style.display='';
						
					}
					else
					{
					document.getElementById('errvalidname').style.display='none';		
					}
			
		}
	}
	
				
	if(id==2)
	{
		if(document.getElementById('address').value=='')
		{
			
			document.getElementById('erraddress').style.display='';
			
		}
		else
		{
			document.getElementById('erraddress').style.display='none';
		}
	}
	
			
	if(id==3)
	{
		if(document.getElementById('mobile_no').value=='')
		{
			document.getElementById('errmobile').style.display='';
			
		}
		else
		{
			document.getElementById('errmobile').style.display='none';				
			
		}
	}
	if(id==3)
				{
					if (isNaN(document.getElementById('mobile_no').value)==true)
					{
						document.getElementById('errvalidmobile').style.display='';
						
					}
					else
					{
							if(id==3)
							{
								if(((document.getElementById('mobile_no').value.length)!=10) && (document.getElementById('mobile_no').value!=''))
								{
									document.getElementById('errvalidmobile').style.display='none';
									document.getElementById('errmobile_nolength').style.display='';
									
								}
								else
								{
									document.getElementById('errmobile_nolength').style.display='none';
								}
							}
						
					}
				}
	
	if(id==4)
	{
		if(document.getElementById('email').value=='')
		{
			document.getElementById('erremail').style.display='';
			
		}
		else
		{
			document.getElementById('erremail').style.display='none';
		}
	}
	if(id==4)
	{
		if(check_valid_email(document.getElementById('email').value)==false)
		{
			document.getElementById('errvalidemail').style.display='';
			
		}
		else
		{
			document.getElementById('errvalidemail').style.display='none';
		}
	}
	if(id==5)
	{
		if(document.getElementById('password').value=='')
		{
			document.getElementById('errpassword').style.display='';
			
		}
		else
		{
			document.getElementById('errpassword').style.display='none';
		}
	}
	if(id==5)
	{
		if(((document.getElementById('password').value.length)<5) && (document.getElementById('password').value!=''))
		{
			document.getElementById('errpasswordlength').style.display='';
			
		}
		else
		{
			document.getElementById('errpasswordlength').style.display='none';
		}
	}
	if(id==6)
	{
		if(document.getElementById('conf_password').value=='')
		{
			document.getElementById('errconf_password').style.display='';
			
		}
		else
		{
			document.getElementById('errconf_password').style.display='none';
		}
	}
	if(id==6)
	{
		if((document.getElementById('conf_password').value!=document.getElementById('password').value) && (document.getElementById('conf_password').value!=''))
		{
			document.getElementById('errconf_passwordsame').style.display='';
			
		}
		else
		{
			document.getElementById('errconf_passwordsame').style.display='none';
		}
	}
	
	if(id==7)
	{
		if(document.getElementById('security_code').value=='')
		{
			document.getElementById('errsecurity_code').style.display='';
			
		}
		else
		{
			document.getElementById('errsecurity_code').style.display='none';
		}
	}
	if(id==8)
	{
		if(!document.getElementById('terms').checked)
		{
			document.getElementById('errterms').style.display='';
			
		}
		else
		{
			document.getElementById('errterms').style.display='none';
		}
	}
	
	
	
}

function validemail(){
<?php 
$selectemail=mysql_query("select rm_user_email from rm_user_registration");
	while($r=mysql_fetch_array($selectemail))
	{ ?>
	var email="<?php echo $r["rm_user_email"]; ?>";
	
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

</script>



  <table width="99%" border="0" cellspacing="0" cellpadding="0">
      
          <tr>           
            <td>           
 <form id="userform" name="userform" method="post" class="cmxform" action="process_user.php" onsubmit="return validation_form()">
 <?php  $err=$_GET["err"];
        $emailerr=$_GET["emailerr"];  ?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
<td>
<table width="100%" cellspacing="10" cellpadding="0" border="0">
              <tr>
                            <td width="71%" class="title_red"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="25"><img src="images/arrow1.png" width="19" height="18"></td>
                                    <td class="title_red"><strong>User Registraion</strong></td>
                                    </tr>
                                </table></td>
              </tr>
              <tr>
                <td>
<table width="100%" border="0" cellspacing="5" cellpadding="5">
  <tr>
    <td align="right" class="black10"><strong>Name<span style="color:#F00">*</span> :</strong> </td>
    <td class="black10 red"><input name="name" id="name" class="black10 textcss" type="text" size="35" onblur="validation(1)"/>
    <br />
    <span id="errname" style="display:none" class="err_validate" ><font color="#FF0000">Please enter your Name</font></span>    
    <span id="errvalidname" style="display:none" class="err_validate" ><font color="#FF0000">Please enter Valid Name</font></span>   
    </td>
  </tr>
  <tr>
    <td align="right" class="black10"><strong>Address<span style="color:#F00">*</span> :</strong> </td>
    <td class="black10 red">
    <textarea rows="5" cols="30" name="address" id="address" class="black10 textcss" onblur="validation(2)"></textarea>
    <br />
    <span id="erraddress" style="display:none" class="err_validate" ><font color="#FF0000">Please enter your Address</font></span>    
    </td>
  </tr>
  <tr>
    <td align="right" class="black10"><strong>Mobile No<span style="color:#F00">*</span> :</strong></td>
    <td class="black10 red"><input name="mobile_no" class="black10 textcss" id="mobile_no" type="text" size="35"  maxlength="10 "onblur="validation(3)" />
    <br /><span id="errmobile" style="display:none" ><font color="#FF0000">Please enter your Mobile No</font></span>
    <span id="errvalidmobile" style="display:none" ><font color="#FF0000">Please enter Digits</font></span>
    <span id="errmobile_nolength" style="display:none" ><font color="#FF0000">Mobile No must be 10 characters</font></span>       
      </td>
  </tr>
   <tr>
    <td align="right" class="black10"><strong>Email Address<span style="color:#F00">*</span> :</strong></td>
    <td class="black10 red"><input name="email" type="text" class="black10 textcss" id="email" size="35" onblur="validation(4);validemail()"/>
   <br /><span id="erremail" style="display:none" ><font color="#FF0000">Please enter your Email address</font></span>
    <span id="errvalidemail" style="display:none" ><font color="#FF0000">Please enter Valid Email address</font></span>
   <span id="errsameemail" style="display:none" ><font color="#FF0000">This Email address Already Exists!!!</font></span>
    </td>
  </tr>
  <tr>
    <td align="right" class="black10"><strong>Password<span style="color:#F00">*</span> :</strong></td>
    <td class="black10 red">
   <input name="password" class="black10 textcss" id="password" type="password" size="35" onblur="validation(5)" />
 <br /><span id="errpassword" style="display:none" ><font color="#FF0000">Please provide a Password</font></span>
   <span id="errpasswordlength" style="display:none" ><font color="#FF0000">Your password must be at least 5 characters long</font></span>
  </td>
  </tr>
  <tr>
    <td align="right" class="black10"><strong>Confirm Password<span style="color:#F00">*</span> :</strong></td>
    <td class="black10 red"><input name="conf_password" class="black10 textcss" id="conf_password" type="password" size="35" onblur="validation(6)" />   
     <br /><span id="errconf_password" style="display:none" ><font color="#FF0000">Please re-enter Password</font></span>
    <span id="errconf_passwordsame" style="display:none" ><font color="#FF0000">Please Enter Same Password</font></span>
    </td>
  </tr>
  <tr>
    <td align="right" class="black10"><strong>Enter Verification Code<span style="color:#F00">*</span> :</strong></td>
    <td class="black10 red"><input name="security_code" class="black10 textcss" id="security_code" type="text" size="35" onblur="validation(7)"/>
      <br /><span id="errsecurity_code" style="display:none" ><font color="#FF0000">Enter Verification Code</font></span>
     </td>
  </tr>
  <tr>
    <td align="right" class="black10" valign="top"><strong>Verification Code :</strong> </td>
    <td><img src="CaptchaSecurityImages.php?width=120&height=40&characters=6" ></td>
  </tr>
  <tr>
  <td colspan="2" class="black10">
    <input type="checkbox" id="terms" name="terms" onblur="validation(8)"/><strong> I have read and agree with the terms and condition<span style="color:#F00">*</span></strong>
     <br /><span id="errterms" style="display:none" ><font color="#FF0000">Please accept terms of use and the privacy policy</font></span>
 </td>
   </tr>
   
   <tr>
   <td></td>
   <td align="left" class="black10 red"><?php echo $err; ?></td>
    </tr>
  
  <tr><td>
  </td>
  <td align="center" >
                          <table width="100%" border="0" cellpadding="5" cellspacing="0">
                          <tr>
                            <td class="normal_fonts9" align="left">
                            <input type="hidden" name="process" value="Add" />
                            <input class="submit" name="submit" type="submit" align="middle" style="width:80px; height:30px" id="submit" value="Register" onClick="return validemail();"/></td>
                          </tr>
                          
                          </table>
         </td></tr>
</table>
</td></tr></table>

</td>
          
          </tr>
        </table>
        </form></td></tr></table>
