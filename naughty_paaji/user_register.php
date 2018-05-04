<?php 
$userid=$_SESSION['user_reg_id'];
?>

<script language="JavaScript">
            loadcountryid=new Array();
            loadstateid=new Array();
            loadstatename=new Array();

		     <?php
		$recordsetstate = mysql_query("select * from state_mast order by state_name");
	    while($rowstate = mysql_fetch_array($recordsetstate,MYSQL_ASSOC))
	    {
		?>
                        loadstateid.push(<?php echo $rowstate["state_id"]; ?>);
                        loadstatename.push("<?php echo $rowstate["state_name"]; ?>");
					    loadcountryid.push(<?php echo $rowstate["country_mast_id"]; ?>);
       <?php
	    }
	   ?>
            function dis_state()
            {
                with(document.userform)
                {
                    selectcountryid=cmbCountry.options[cmbCountry.selectedIndex].value;
					
					
					cmbState.options.length=0;					
					
					
				    checkcount1=1;
					
					cmbState.options[0]=new Option("Please Select","",false);								
					
                    
					for(i=0;i< loadstateid.length;i++)
                    {
					   if(selectcountryid==loadcountryid[i])
                        {
                            cmbState.options.length=checkcount1+1;
                            cmbState.options[checkcount1]=new Option(loadstatename[i],loadstateid[i],false);							
							
                            checkcount1++;
                        }
                    }
                }
            }
</script>

<script language="javascript">

function validation_form()
{
		
	if(document.getElementById('first_name').value=='')
	{
		
		document.getElementById('errfirst_name').style.display='';
		
		return false;
			
	}
	
	if(document.getElementById('last_name').value=='')
	{
		
		document.getElementById('errlast_name').style.display='';
		
		return false;
			
	}
	if(cmbCountry.options[cmbCountry.selectedIndex].value=='')
	{
		
		document.getElementById('errcountry').style.display='';
		
		return false;
			
	}
	if(cmbState.options[cmbState.selectedIndex].value=='')
	{
		
		document.getElementById('errstate').style.display='';
		
		return false;
			
	}
	if(document.getElementById('city').value=='')
	{
		
		document.getElementById('errcity').style.display='';
		
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
		if(document.getElementById('first_name').value=='')
		{
			
			document.getElementById('errfirst_name').style.display='';
			
		}
		else
		{
			document.getElementById('errfirst_name').style.display='none';
		}
	}
	
	if(id==2)
	{
		if(document.getElementById('last_name').value=='')
		{
			document.getElementById('errlast_name').style.display='';
			
		}
		else
		{
			document.getElementById('errlast_name').style.display='none';
		}
	}
	
	if(id==3)
	{
		if(cmbCountry.options[cmbCountry.selectedIndex].value=='')
		{
			document.getElementById('errcountry').style.display='';
			
		}
		else
		{
			document.getElementById('errcountry').style.display='none';
		}
	}
	if(id==4)
	{
		if(cmbState.options[cmbState.selectedIndex].value=='')
		{
			document.getElementById('errstate').style.display='';
			
		}
		else
		{
			document.getElementById('errstate').style.display='none';
		}
	}

    if(id==5)
	{
		if(document.getElementById('city').value=='')
		{
			document.getElementById('errcity').style.display='';
			
		}
		else
		{
			document.getElementById('errcity').style.display='none';
		}
	}
			
	if(id==8)
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
	if(id==8)
				{
					if (isNaN(document.getElementById('mobile_no').value)==true)
					{
						document.getElementById('errvalidmobile').style.display='';
						
					}
					else
					{
							if(id==8)
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
	
	if(id==9)
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
	if(id==9)
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
	if(id==10)
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
	if(id==10)
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
	if(id==11)
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
	if(id==11)
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
	
	if(id==12)
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
	if(id==13)
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
$selectemail=mysql_query("select email from user_registration");
	while($r=mysql_fetch_array($selectemail))
	{ ?>
	var email="<?php echo $r["email"]; ?>";
	//alert(email);
	if(email==parseInt(document.getElementById('email').value))
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


  <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="10" height="10"><img src="images/box2_01.png" width="10" height="10" /></td>
            <td background="images/box2_02.png" style="background-repeat:repeat-x;"></td>
            <td width="10" height="10"><img src="images/box2_03.png" width="10" height="10" /></td>
          </tr>
          <tr>
            <td background="images/box2_04.png" style="background-repeat:repeat-y;">&nbsp;</td>
            <td bgcolor="#E4DFD3">           
 <form id="userform" name="userform" method="post" class="cmxform" onsubmit="return validation_form()" action="process_user.php" >
 <?php  $err=$_GET["err"];
        $emailerr=$_GET["emailerr"];  ?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="30" align="left" valign="middle"><h3 class="title">User Registration</h3></td>
              </tr>
              <tr>
                <td>
<table width="100%" border="0" cellspacing="5" cellpadding="5">
  <tr>
    <td align="right" class="black10"><strong>First Name<span style="color:#F00">*</span> :</strong> </td>
    <td class="black10 err_validate"><input name="first_name" id="first_name" class="black10 textcss" onblur="validation(1)" type="text" size="35"/><br />
    <span id="errfirst_name" style="display:none" class="err_validate" >Please enter your First name</span>
    </td>
  </tr>
  <tr>
    <td align="right" class="black10"><strong>Last Name<span style="color:#F00">*</span> :</strong> </td>
    <td class="black10 err_validate"><input name="last_name" class="black10 textcss" id="last_name" type="text" onblur="validation(2)" size="35"/><br /><span id="errlast_name" style="display:none" ><font color="#FF0000">Please enter your Last name</font></span>
    </td>
  </tr>
 
 
  <tr>
    <td align="right" class="black10"><strong>Country<span style="color:#F00">*</span> :</strong></td>
    <td class="black10">
    <select id="cmbCountry" name="cmbCountry" onChange="dis_state()" class="black10 textcss" style="width:245px;" onblur="validation(3)">
			<option value="" class="black10">Please Select</option>
			<?php				
					 $recordsetcountry = mysql_query("select * from country_mast order by country_name") or die(mysql_error());
					 while($rowcountry = mysql_fetch_array($recordsetcountry))
					 {
					 ?>
                     <option class="black10" value="<?php echo $rowcountry["country_id"]; ?>"><?php echo $rowcountry["country_name"]; ?>
                     </option>
                     <?php
					 }
					 ?> 
		</select>
        <br /><span id="errcountry" style="display:none" ><font color="#FF0000">Please enter your Country</font></span>
        </td>
  </tr>
  <tr>
    <td align="right" class="black10"><strong>State<span style="color:#F00">*</span> :</strong></td>
    <td class="black10">
    <select class="black10 textcss" id="cmbState" name="cmbState" onChange="dis_city()" style="width:245px;" onblur="validation(4)" >
			
            <option class="black10" value="">Please Select</option>
			
	</select>
     <br /><span id="errstate" style="display:none" ><font color="#FF0000">Please enter your State</font></span>
        </td>
  </tr>
  <tr>
    <td align="right" class="black10"><strong>City<span style="color:#F00">*</span> :</strong></td>
    <td class="black10"><input type="text" name="city" id="city" size="35" class="black10 textcss" onblur="validation(5)"/>
     <br /><span id="errcity" style="display:none" ><font color="#FF0000">Please enter your City</font></span>
        </td>
  </tr>
 
  <tr>
    <td align="right" class="black10"><strong>Contact No :</strong></td>
    <td  class="black10 err_validate"><input name="code" class="black10 textcss" id="code" type="text" size="3" /> <font color="#000000">-</font> <input name="contact_no" id="contact_no" type="text" class="black10 textcss" size="24" />
    </td>
  </tr>
  <tr>
    <td align="right" class="black10"><strong>Mobile No<span style="color:#F00">*</span> :</strong></td>
    <td class="black10 err_validate"><input name="mobile_no" class="black10 textcss" id="mobile_no" type="text" size="35" onblur="validation(8)" maxlength="10" />
    <br /><span id="errmobile" style="display:none" ><font color="#FF0000">Please enter your Mobile No</font></span>
    <span id="errvalidmobile" style="display:none" ><font color="#FF0000">Please enter Digits</font></span>
    <span id="errmobile_nolength" style="display:none" ><font color="#FF0000">Mobile No must be 10 characters</font></span>
    </td>
  </tr>
   <tr>
    <td align="right" class="black10"><strong>Email Address<span style="color:#F00">*</span> :</strong></td>
    <td class="black10 err_validate"><input name="email" type="text" class="black10 textcss" id="email" size="35" onblur="validation(9);validemail()" />
    <br /><span id="erremail" style="display:none" ><font color="#FF0000">Please enter your Email address</font></span>
    <span id="errvalidemail" style="display:none" ><font color="#FF0000">Please enter Valid Email address</font></span>
   <span id="errsameemail" style="display:none" ><font color="#FF0000">This Email address Already Exists!!!</font></span>
    </td>
  </tr>
  <tr>
    <td align="right" class="black10"><strong>Password<span style="color:#F00">*</span> :</strong></td>
    <td class="black10 err_validate">
   <input name="password" class="black10 textcss" id="password" type="password" size="35" onblur="validation(10)" />
   <br /><span id="errpassword" style="display:none" ><font color="#FF0000">Please provide a Password</font></span>
   <span id="errpasswordlength" style="display:none" ><font color="#FF0000">Your password must be at least 5 characters long</font></span>
  </td>
  </tr>
  <tr>
    <td align="right" class="black10"><strong>Confirm Password<span style="color:#F00">*</span> :</strong></td>
    <td class="black10 err_validate"><input name="conf_password" class="black10 textcss" id="conf_password" type="password" size="35" onblur="validation(11)" /> 
    <br /><span id="errconf_password" style="display:none" ><font color="#FF0000">Please re-enter Password</font></span>
    <span id="errconf_passwordsame" style="display:none" ><font color="#FF0000">Please Enter Same Password</font></span>
    </td>
  </tr>
  <tr>
    <td align="right" class="black10"><strong>Enter Verification Code<span style="color:#F00">*</span> :</strong></td>
    <td class="black10 err_validate"><input name="security_code" class="black10 textcss" id="security_code" type="text" size="35" onblur="validation(12)"/>
     <br /><span id="errsecurity_code" style="display:none" ><font color="#FF0000">Enter Verification Code</font></span>
     </td>
  </tr>
  <tr>
    <td align="right" class="black10" valign="top"><strong>Verification Code :</strong> </td>
    <td><img src="CaptchaSecurityImages.php?width=120&height=40&characters=6" ></td>
  </tr>
  <tr>
  <td colspan="2" class="black10">
    <input type="checkbox" id="terms" name="terms"  onblur="validation(13)"/><strong> I have read and agree with the terms and condition<span style="color:#F00">*</span></strong>
     <br /><span id="errterms" style="display:none" ><font color="#FF0000">Please accept terms of use and the privacy policy</font></span>
 </td>
   </tr>
   
   <tr>
   <td></td>
   <td align="left" class="black10 err_validate"><?php echo $err; ?></td>
    </tr>
  
  <tr><td>
  </td>
  <td align="center" >
                          <table width="100%" border="0" cellpadding="5" cellspacing="0">
                          <tr>
                            <td class="normal_fonts9" align="left">
                            <input type="hidden" name="process" value="Add" />
                            <input class="submit" name="submit" type="submit" align="middle" style="width:80px; height:30px" id="submit" value="Register" /></td>
                          </tr>
                          
                          </table>
         </td></tr>
</table>
</td></tr></table>
</form>
</td>
            <td background="images/box2_06.png" style="background-repeat:repeat-y;">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="images/box2_07.png" width="10" height="10" /></td>
            <td background="images/box2_08.png" style="background-repeat:repeat-x;"></td>
            <td><img src="images/box2_09.png" width="10" height="10" /></td>
          </tr>
        </table>
   