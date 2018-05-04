<?php $_SESSION["pre_url"]="http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>
<link href="css/home.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function hideshipping()
{
 document.getElementById('shippingaddress_tr').style.display = 'none';
}
function showshipping()
{
 document.getElementById('shippingaddress_tr').style.display = '';
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

function validation(confirmform)
{
	with(document.confirmform)
    {
    	var errmsg="";
	    
		var illegalChars = /\W/; // allow letters, numbers, and underscores
 			
		if(firstname.value=="")
		{
			errmsg="Please enter your firstname in billing address.";
		}
		if(lastname.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your lastname in billing address.";
		}
		if(dateofbirth.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your birthdate.";
		}
		if(document.getElementById("unit").value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your unit in billing address.";
		}		
		if(street.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your street in billing address.";
		}
		if(subburb.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your subburb in billing address.";
		}
		if(state.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your state/province in billing address.";
		}
		if(pincode.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your pincode in billing address.";
		}
		if(country.value=="")
		{
			errmsg=errmsg +'<br>' + "Please select your country in billing address.";
		}
		
		if(mobile.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your mobile number in billing address.";
		}
		if(mobile.value!="")
		{
			if(IsNumeric(mobile.value)==false ||mobile.value.length != 10)
			{
					errmsg=errmsg +'<br>' + "Please enter valid mobile number in billing address.";
			}
		}
		if(phone.value!="")
		{
			if(IsNumeric(phone.value)==false ||phone.value.length < 7)
			{
					errmsg=errmsg +'<br>' + "Please enter valid phone number in billing address.";
			}
		}
		if(email.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your email address in billing address.";
		}
		if(EmailValidation(email.value)==false)
		{
			errmsg=errmsg +'<br>' + "Please enter valid email address in billing address.";
		}
		 <?php
		  if($_SESSION['loginuserid']=="")
		  {
			?>
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
			<?php
		  }
		  ?>
		
		for (i=0; i<document.confirmform.shipping.length; i++)
		{
			if (document.confirmform.shipping[i].checked==true)
			{
					checkp1 =document.confirmform.shipping[i].value;
			}
		}
			
			if(checkp1==1)
			{	
				if(shipping_firstname.value=="")
				{
					errmsg=errmsg +'<br>' +"Please enter your firstname in shipping address.";
				}
				if(shipping_lastname.value=="")
				{
					errmsg=errmsg +'<br>' + "Please enter your lastname in shipping address.";
				}
				if(shipping_unit.value=="")
				{
					errmsg=errmsg +'<br>' + "Please enter your unit in shipping address.";
				}		
				if(shipping_street.value=="")
				{
					errmsg=errmsg +'<br>' + "Please enter your street in shipping address.";
				}
				if(shipping_subburb.value=="")
				{
					errmsg=errmsg +'<br>' + "Please enter your subburb in shipping address.";
				}
				if(shipping_state.value=="")
				{
					errmsg=errmsg +'<br>' + "Please enter your state/province in shipping address.";
				}
				if(shipping_pincode.value=="")
				{
					errmsg=errmsg +'<br>' + "Please enter your pincode in shipping address.";
				}
				if(shipping_country.value=="")
				{
					errmsg=errmsg +'<br>' + "Please select your country in shipping address.";
				}
				if(shipping_email.value=="")
				{
					errmsg=errmsg +'<br>' + "Please enter your email address in shipping address.";
				}
				if(EmailValidation(shipping_email.value)==false)
				{
					errmsg=errmsg +'<br>' + "Please enter valid email address in shipping address.";
				}
				if(shipping_mobile.value=="")
				{
					errmsg=errmsg +'<br>' + "Please enter your mobile number in shipping address.";
				}
				if(shipping_mobile.value!="")
				{
					if(IsNumeric(shipping_mobile.value)==false ||shipping_mobile.value.length != 10)
					{
							errmsg=errmsg +'<br>' + "Please enter valid mobile number in shipping address.";
					}
				}
				if(shipping_phone.value!="")
				{
					if(IsNumeric(shipping_phone.value)==false ||shipping_phone.value.length < 7)
					{
							errmsg=errmsg +'<br>' + "Please enter valid phone number in shipping address.";
					}
				}
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
<link rel="stylesheet" href="calendar/css1/jquery.ui.all.css">
<script src="calendar/js/jquery-1.4.3.js"></script> 
	<script src="calendar/js/jquery.ui.core.js"></script> 

	<script src="calendar/js/jquery.ui.datepicker.js"></script> 

	<script type="text/javascript"> 
	$(function() {
		$( "#dateofbirth" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
	});
	
</script>
<table width="960" border="0" cellspacing="0" cellpadding="0">
 
  <tr>
  
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="5" colspan="5"></td>
        </tr>
      <tr>       
        <td align="left" valign="top">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="border1">
        <form name="confirmform" method="post" action="billprocess.php" id="confirmform">   
         
           <tr>
                <td colspan="2" height="35" align="left" valign="middle" bgcolor="#727272" style="background:url(images/tag_bg.jpg) repeat-x;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                   <td width="10"> </td>
                    <td align="left" valign="middle" class="title_black"><span class="title_white">Billing &amp; Shipping Address</span></td>
                  </tr>
                </table>
                </td>
              </tr>
          <?php
			  if($_SESSION['loginuserid']=="")
			  {
			  ?>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="5" cellpadding="5">
              <tr>
                <td class="font10"><strong>Already member of Klassic Kids? <span class="link"><a href="index.php?content=14">Click here</a></span> to login.</strong></td>
              </tr>             
            </table></td>
           
          </tr>
          <?php
			  }
			  ?>
          <tr>
            <td width="5" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#FFFFFF">
            <table width="100%" border="0" cellspacing="2" cellpadding="2">
            <?php
               $recordsetregister = mysql_query("select * from register_master where register_ID='".$_SESSION['loginuserid']."'",$cn);
				$catc=1;
                while($rowregister = mysql_fetch_array($recordsetregister,MYSQL_ASSOC))
                {
					$dt1=explode("-",$rowregister["register_user_birth_date"]);
					$dd1=$dt1[2];
					$mm1=$dt1[1];
					$yy1=$dt1[0];
					
					$billing_fname=$rowregister["register_user_first_name"];
					$billing_lname=$rowregister["register_user_last_name"];
					$billing_birthdate=$dd1."-".$mm1."-".$yy1;
					
					$billing_unit=$rowregister["register_user_unit"];
					$billing_street=$rowregister["register_user_street"];
					$billing_subburb=$rowregister["register_user_subburb"];
					$billing_state=$rowregister["register_user_state"];
					$billing_pincode=$rowregister["register_user_pincode"];
					$billing_country=$rowregister["register_user_country"];
					$billing_email=$rowregister["register_user_email"];
					$billing_phone=$rowregister["register_user_phone"];
					$billing_mobile=$rowregister["register_user_mobile"];
					
				}
                ?>
              
                <tr>
                  <td><table width="100%" border="0" cellpadding="5" cellspacing="0">
                    <tr>
                      <td class="green_fonts" >Your Billing Address</td>
                      <td align="right" class="red_black10" >&nbsp;<span class="title_red"> * Signifies required fields</span></td>
                    </tr>
                  </table></td>
                </tr>   
                
                <tr>
                  <td><table width="100%" border="0" cellpadding="3" cellspacing="3" >
                    <tr>
                      <td width="25%" align="right" valign="top" class="font10" >First Name <span class="title_red"> *</span> </td>
                      <td width="75%"><input name="firstname" type="text" class="black10 tb7"  id="firstname" size="25" value="<?php echo $billing_fname; ?>" /></td>
                    </tr>
                    <tr>
                      <td align="right" valign="top" class="font10" >Last Name  <span class="title_red"> *</span> </td>
                      <td><input name="lastname" type="text" class="black10 tb7"  id="lastname" size="25" value="<?php echo $billing_lname;?>" /></td>
                    </tr>
                    <tr>
                          <td align="right" valign="top" class="font10" >Date Of Birth  <span class="title_red">*</span> </td>
                          <td ><input name="dateofbirth" type="text" class="black10 tb7"  id="dateofbirth" size="25" value="<?php echo $billing_birthdate; ?>"></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" cellpadding="3" cellspacing="3" >
                   <tr>
                          <td width="25%" align="right" valign="top" class="font10" ><span class="title_red">*</span>Unit :</td>
                          <td><input type="text" name="unit" id="unit" class="black10" value="<?php echo $billing_unit; ?>"  /></td>
                        </tr>
                        <tr>

                          <td align="right" valign="top" class="font10" ><span class="title_red">*</span>Street : </td>
                          <td><input type="text" name="street" id="street" class="black10" value="<?php echo $billing_street; ?>"  /></td>
                        </tr>
                        <tr>
                          <td align="right" valign="top" class="font10" ><span class="title_red">*</span>Subburb :</td>
                          <td><input name="subburb" type="text" id="subburb" size="25" class="tb7 black10" value="<?php echo $billing_subburb; ?>"></td>
                        </tr>
                    <tr>
                      <td align="right" valign="top" class="font10" >Post Code <span class="title_red"> *</span> </td>
                      <td class="black10"><input name="pincode" type="text" class="black10 tb7"  id="pincode" value="<?php echo $billing_pincode;?>" size="20" onblur="matchpostcode()" />
                          <br /> <span id="errmatchpost" style="display:none" ><font color="#FF0000">Does not match Post Code!!!</font></span></td>
                    </tr>                  
                    <tr>
                      <td align="right" valign="top" class="font10" >State / Province  <span class="title_red"> *</span> </td>
                      <td><input name="state" type="text" class="black10"  id="state" size="25" value="<?php echo $billing_state;?>" /></td>
                    </tr>                    
                    <tr>
                      <td align="right" valign="top" class="font10" >Country <span class="title_red"> *</span> </td>
                      <td>Australia<input name="country" type="hidden" class="black10 tb7"  id="country" size="20" value="Australia"></td>
                    </tr>
                    <tr>
                      <td align="right" valign="top" class="font10" >Phone&nbsp;&nbsp;&nbsp;</td>
                      <td><input name="phone" type="text" class="black10 tb7"  id="phone" size="25" value="<?php echo $billing_phone;?>" /></td>
                      </tr>
                    <tr>
                      <td align="right" valign="top" class="font10" >Mobile <span class="title_red"> *</span></td>
                      <td><input name="mobile" type="text" class="black10 tb7"  id="mobile" size="25" value="<?php echo $billing_mobile;?>" /></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" cellpadding="3" cellspacing="3" >
                    <?php
					  if($_SESSION['loginuserid']=="")
					  {
					  ?>
                    <tr>
                      <td colspan="2" align="left" valign="top" class="font10" ><strong>You are a New Customer of Klassic Kids. Register your self with Klassic Kids.</strong></td>
                      </tr>
                      <?php
					  }
					  ?>
                    <tr>
                      <td width="25%" align="right" valign="top" class="font10" >Email Address <span class="title_red"> *</span> </td>
                      <td width="74%"><input name="email" type="text" class="black10 tb7"  id="email" size="40" value="<?php echo $billing_email;?>" onblur="validemail()">
                       <?php
					  if($_SESSION['loginuserid']=="")
					  {
					  ?>    <br /> <span id="errsameemail" style="display:none" ><font color="#FF0000">This Email address Already Exists!!!</font></span>
                       <?php
					  }
					  ?>
                      </td>
                      </tr>
                       <?php
					  if($_SESSION['loginuserid']=="")
					  {
					  ?>
                    <tr>
                      <td align="right" valign="top" class="font10" >Password <span class="title_red"> *</span></td>
                      <td><input name="password" type="password" class="black10 tb7"  size="20"></td>
                    </tr>
                    <tr>
                      <td align="right" valign="top" class="font10" >Retype Password  <span class="title_red"> *</span></td>
                      <td><input name="confirmpassword" type="password" class="black10 tb7"  size="20"></td>
                    </tr>
                    <?php
					  }
					  ?>
                    </table></td>
                </tr>               
            </table></td>
            
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
            
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#FFFFFF" class="titel">Shipping Address : <span class="font10"><input name="shipping" value="0" checked="checked" id="shipping" onclick="javascript:hideshipping()" type="radio">&nbsp;As Above<input name="shipping" id="shipping" onclick="javascript:showshipping();" value="1" type="radio">&nbsp;New Shipping address</span></td>
           
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
           
          </tr>
          <tr id="shippingaddress_tr" style="display:none;">
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="2" cellpadding="2">             
                <tr>
                  <td><table width="100%" border="0" cellpadding="5" cellspacing="0">
                    <tr>
                      <td class="green_fonts">Your Shipping Address</td>
                      <td align="right" class="red_black10" >&nbsp;<span class="title_red"> * Signifies required fields</span></td>
                    </tr>
                  </table></td>
                </tr>
              
                <tr>
                  <td><table width="100%" border="0" cellpadding="3" cellspacing="3" >
                    <tr>
                      <td width="25%" align="right" valign="top" class="font10" >First Name  <span class="title_red"> *</span> </td>
                      <td width="75%"><input name="shipping_firstname" type="text" class="black10 tb7"  id="shipping_firstname" size="25" /></td>
                    </tr>
                    <tr>
                      <td align="right" valign="top" class="font10" >Last Name <span class="title_red"> *</span> </td>
                      <td><input name="shipping_lastname" type="text" class="black10 tb7"  id="shipping_lastname" size="25" /></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" cellpadding="3" cellspacing="3" >
                    <tr>
                          <td width="25%" align="right" valign="top" class="font10" ><span class="title_red">*</span>Unit :</td>
                          <td><input type="text" name="shipping_unit" id="shipping_unit" class="black10" /></td>
                        </tr>
                        <tr>

                          <td align="right" valign="top" class="font10" ><span class="title_red">*</span>Street : </td>
                          <td><input type="text" name="shipping_street" id="shipping_street" class="black10" /></td>
                        </tr>
                        <tr>
                          <td align="right" valign="top" class="font10" ><span class="title_red">*</span>Subburb :</td>
                          <td><input name="shipping_subburb" type="text" id="shipping_subburb" size="25" class="tb7 black10"></td>
                        </tr>
                    <tr>
                      <td align="right" valign="top" class="font10" >State / Province <span class="title_red"> *</span> </td>
                      <td><input name="shipping_state" type="text" class="black10 tb7"  id="shipping_state" size="25" /></td>
                    </tr>
                    <tr>
                      <td align="right" valign="top" class="font10" >Post Code <span class="title_red"> *</span></td>
                      <td class="black10"><input name="shipping_pincode" type="text" class="black10 tb7"  id="shipping_pincode" size="20" /></td>
                    </tr>
                    <tr>
                      <td align="right" valign="top" class="font10" >Country</td>
                       <td class="black10">Australia<input name="shipping_country" type="hidden" id="shipping_country" size="20" value="Australia" class="tb7 black10">
                    
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" cellpadding="3" cellspacing="3" >
                    <tr>
                      <td width="25%" align="right" valign="top" class="font10" >Email Address <span class="title_red"> *</span> </td>
                      <td width="74%"><input name="shipping_email" type="text" class="black10"  id="shipping_email" size="40" /></td>
                      </tr>
                    <tr>
                      <td align="right" valign="top" class="font10" >Phone&nbsp;&nbsp;&nbsp;</td>
                      <td><input name="shipping_phone" type="text" class="black10 tb7"  id="shipping_phone" size="25" /></td>
                      </tr>
                    <tr>
                      <td align="right" valign="top" class="font10" >Mobile <span class="title_red"> *</span></td>
                      <td><input name="shipping_mobile" type="text" class="black10 tb7"  id="shipping_mobile" size="25" /></td>
                      </tr>
                    </table></td>
                </tr>
            
            
            </table></td>
          
          </tr>
          <tr id="erroralready" style="display:none;">
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" valign="top" bgcolor="#FFFFFF"><table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
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
                              <td class="red_black10" align="left"><strong> Error</strong></td>
                              </tr>
                            <tr>
                              <td class="red_black10" align="left"><div id="lblerror" class="normal_fonts10" align="left" style=" width:400px; margin-left:0px; color:#FF0000; border-color:#FF0000; visibility:hidden;" ></div></td>
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
          <tr>
            <td bgcolor="#FFFFFF"></td>
            <td align="center" valign="top" bgcolor="#FFFFFF" height="10"></td>
           
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" valign="top" bgcolor="#FFFFFF"><input type="image" src="images/confirmorder.png" width="186" height="39" border="0" onclick="return validation(this.form);" style="cursor:pointer;" /></td>
          
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"></td>
            <td align="center" valign="top" bgcolor="#FFFFFF" height="10"></td>
           
          </tr>
          <tr>
            <td width="5" height="5"><img src="images/table1_05.png" width="5" height="5" /></td>
            <td bgcolor="#FFFFFF"></td>
            
          </tr>
          </form>
        </table>
        </td>
       
      </tr>
      <tr>
        <td height="5" colspan="5"></td>
        </tr>
    </table></td>
  
  </tr>
 
</table>
