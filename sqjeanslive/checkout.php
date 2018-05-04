<link href="css/home.css" rel="stylesheet" type="text/css" />

<?php

require_once("include/files.php");

?>

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



function validation(nextstepform)

{

	with(document.nextstepform)

    {

    	var errmsg="";

	    

		var illegalChars = /\W/; 

 			

		if(firstname.value=="")

		{

			errmsg="Please enter your firstname in billing address.";

		}

		if(lastname.value=="")

		{

			errmsg=errmsg +'<br>' + "Please enter your lastname in billing address.";

		}

		if(address.value=="")

		{

			errmsg=errmsg +'<br>' + "Please enter your address in billing address.";

		}		

		if(city.value=="")

		{

			errmsg=errmsg +'<br>' + "Please enter your city in billing address.";

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

			if(IsNumeric(mobile.value)==false)

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

		    if($_SESSION['sqjeansloginuserid']=="")

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

		

		for (i=0; i<document.nextstepform.shipping.length; i++)

		{

			if (document.nextstepform.shipping[i].checked==true)

			{

					checkp1 =document.nextstepform.shipping[i].value;

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

				if(shipping_address.value=="")

				{

					errmsg=errmsg +'<br>' + "Please enter your address in shipping address.";

				}		

				if(shipping_city.value=="")

				{

					errmsg=errmsg +'<br>' + "Please enter your city in shipping address.";

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

				alert(shipping_mobilenumber.value);

				if(shipping_mobilenumber.value=="")

				{

					errmsg=errmsg +'<br>' + "Please enter your mobile number in shipping address.";

				}				

				if(shipping_mobilenumber.value!="")

				{

					if(IsNumeric(shipping_mobilenumber.value)==false)

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

</script>

<script type="text/javascript">

function login_setFocus()

{

     document.getElementById("sqjeansemail").focus();

}

</script>

<?php

                 $recordsetregister = mysql_query("select * from register_master where register_ID='".$_SESSION['sqjeansloginuserid']."'",$cn);

				$catc=1;

                while($rowregister = mysql_fetch_array($recordsetregister,MYSQL_ASSOC))

                {

					$billing_fname=$rowregister["register_user_first_name"];

					$billing_lname=$rowregister["register_user_last_name"];

					$billing_address=$rowregister["register_user_address"];

					$billing_address_2=$rowregister["register_user_address_2"];

					$billing_city=$rowregister["register_user_city"];

					$billing_state=$rowregister["register_user_state"];

					$billing_pincode=$rowregister["register_user_pincode"];

					$billing_country=$rowregister["register_user_country"];

					$billing_email=$rowregister["register_user_email"];

					$billing_phone=$rowregister["register_user_phone"];

					$billing_mobile=$rowregister["register_user_mobile"];

				}				

                ?>

                <?php

				  if($_REQUEST["discountcode"]=="invalid")

				  {

				  	$billing_fname= $_SESSION["invalid_firstname"];

					$billing_lname=$_SESSION["invalid_lastname"];

					$billing_address=$_SESSION["invalid_address"];

					$billing_address_2=$_SESSION["invalid_address2"];

					$billing_city=$_SESSION["invalid_city"];

					$billing_state=$_SESSION["invalid_state"];

					$billing_pincode=$_SESSION["invalid_pincode"];

					$billing_country=$_SESSION["invalid_country"];

					$billing_email= $_SESSION["invalid_email"];

					$billing_phone=$_SESSION["invalid_phone"];

					$billing_mobile=$_SESSION["invalid_mobile"];

				  }

			 	 ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td width="10">&nbsp;</td>

    <td align="left" valign="top">

    <table width="100%" border="0" cellspacing="0" cellpadding="0">

    <form name="nextstepform" method="get" action="orderprocess.php">

        <tr>

          <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr>

                <td class="titel_2"><strong>Checkout</strong></td>

              </tr>

              <tr>

                <td height="10"></td>

              </tr>

              <?php

			  if($_REQUEST["discountcode"]=="invalid")

			  {

			  ?>

              <tr>

                <td align="center" class="titel" ><font color="#FF0000">Invalid Discount Code</font></td>

              </tr>

              <tr>

                <td height="10"></td>

              </tr>

              <?php

			  }

			  ?>

              

            </table></td>

        </tr>

        <tr>

          <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">

            

              <?php

			  if($_SESSION['sqjeansloginuserid']=="")

			  {

			  ?>

              <tr>

                <td height="35" valign="middle" ><span class="titel"><font color="#FF0000"><strong>Returning Customer of SQJeans? <a onclick="login_setFocus()" style="cursor:pointer;"><font color="#000000">Click here</font></a> to login.</strong></font></span></td>

              </tr>

              <?php

			  }

			  ?>

              <tr>

                <td><table width="100%" background="images/pgbg02a.jpg" border="0" cellpadding="1" cellspacing="0" class="border3">

                 <?php

					  if($_SESSION['sqjeansloginuserid']=="")

					  {

					  ?>

                  <tr>

                    <td colspan="2" align="left" valign="top" class="titel" ><strong>New Customer of SQJeans? Register Here.</strong></td>

                  </tr>

                  <tr>

                    <td colspan="2" align="left" valign="top" class="font10" height="10" ></td>

                  </tr>

                  <?php

					  }

					  ?>

                  <tr>

                    <td width="30%" align="right" valign="top" class="font10" ><br>Email Address <span class="font8_red">*</span></td>

                    <td width="70%"><br><input name="email" type="text" class="font9"  id="email" size="40" value="<?php echo $billing_email;?>" /></td>

                  </tr>

                  <?php

					  if($_SESSION['sqjeansloginuserid']=="")

					  {

					  ?>

                  <tr>

                    <td align="right" valign="top" class="font10" >Password <span class="font8_red">*</span></td>

                    <td><input name="password" type="password" class="font9"  size="20" /></td>

                  </tr>

                  <tr>

                    <td align="right" valign="top" class="font10" >Retype Password <span class="font8_red">*</span></td>

                    <td><input name="confirmpassword" type="password" class="font9"  size="20" /></td>

                  </tr>

                  <?php

					  }

					  ?>

                  

                 <tr>

                    <td colspan="2" align="left" valign="top" class="font10" height="10" ></td>

                  </tr>

                  <tr>

                    <td class="font10" ><strong>Your Billing Address<br><br></strong></td>

                    <td align="right" class="font8_red" >&nbsp;* Signifies required fields</td>

                  </tr>

                  <tr>

                    <td width="30%" align="right" valign="top" class="font10" >First Name <span class="font8_red">*</span></td>

                    <td width="70%"><input name="firstname" type="text" class="font9"  id="firstname" size="25" value="<?php echo $billing_fname?>" /></td>

                  </tr>

                  <tr>

                    <td align="right" valign="top" class="font10" >Last Name <span class="font8_red">*</span></td>

                    <td><input name="lastname" type="text" class="font9"  id="lastname" size="25" value="<?php echo $billing_lname;?>" /></td>

                  </tr>

                  <tr>

                    <td align="right" valign="top" class="font10" >Date Of Birth <span class="font8_red">*</span></td>

                    <td><select name="day" class="font9">

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

                    <td class="font9"><table border="0" cellspacing="0" cellpadding="5">

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

                    <td><textarea name="address" cols="35"  rows="3" class="font9"><?php echo $billing_address;?></textarea></td>

                  </tr>

                  <tr>

                    <td align="right" valign="top" class="font10" >Address (Cntd.) </td>

                    <td><textarea name="address2" cols="35"  rows="3" class="font9"><?php echo $billing_address_2;?></textarea></td>

                  </tr>

                  <tr>

                    <td align="right" valign="top" class="font10" >Post Code <span class="font8_red">*</span></td>

                    <td class="font9"><input name="pincode" type="text" class="font9"  id="pincode" value="<?php echo $billing_pincode;?>" size="20" /></td>

                  </tr>

                  <tr>

                    <td align="right" valign="top" class="font10" >City <span class="font8_red">*</span></td>

                    <td><input name="city" type="text" class="font9"  id="city" size="25" value="<?php echo $billing_city;?>" /></td>

                  </tr>

                  <tr>

                    <td align="right" valign="top" class="font10" >State / Province <span class="font8_red">*</span></td>

                    <td><input name="state" type="text" class="font9"  id="state" size="25" value="<?php echo $billing_state;?>" /></td>

                  </tr>

                  <tr>

                    <td align="right" valign="top" class="font10" >Country <span class="font8_red">*</span></td>

                    <td><select name="country" class="font9" style="width:150px;">

                     <?php

                     $query="SELECT * FROM shipping_charges  where shipping_is_avail=1 order by shipping_country";			

                     $recordsetshipping = mysql_query($query);

                     while($rowshipping = mysql_fetch_array($recordsetshipping,MYSQL_ASSOC))

                     {

					 ?>	

                      <option value="<?php echo $rowshipping["shipping_country"];?>"<?php print($billing_country)==$rowshipping["shipping_country"]?"Selected":"";?>><?php echo $rowshipping["shipping_country"];?></option>

                     <?php

					 }

					 ?>

                      

                    </select></td>

                  </tr>

                  <tr>

                    <td align="right" valign="top" class="font10" >Phone&nbsp;&nbsp;</td>

                    <td><input name="phone" type="text" class="font9"  id="phone" size="25" value="<?php echo $billing_phone;?>" /></td>

                  </tr>

                  <tr>

                    <td align="right" valign="top" class="font10" >Mobile <span class="font8_red">*</span></td>

                    <td><input name="mobile" type="text" class="font9"  id="mobile" size="25" value="<?php echo $billing_mobile;?>" /></td>

                  </tr>

                  

                </table></td>

              </tr>

              <tr>

                <td><span class="font10"><span class="titel"><br />Shipping Address :</span>

                    <input name="shipping" value="0" checked="checked" id="shipping" onclick="javascript:hideshipping()" type="radio" />

                    &nbsp;As Above

                    <input name="shipping" id="shipping" onclick="javascript:showshipping();" value="1" type="radio" />

                  &nbsp;New Shipping address<br /></span></td>

              </tr>

              <tr id="shippingaddress_tr" style="display:none;">

                <td><table width="100%" background="images/pgbg02a.jpg" border="0" cellpadding="0" cellspacing="0" class="border3">

                  <tr>

                    <td class="font10" ><strong><br>Your Shipping Address<br><br></strong></td>

                    <td align="right" class="font8_red" >&nbsp;* Signifies required fields</td>

                  </tr>

                  <tr>

                    <td width="30%" align="right" valign="top" class="font10" >First Name <span class="font8_red">*</span></td>

                    <td width="70%"><input name="shipping_firstname" type="text" class="font9"  id="shipping_firstname" size="25" /></td>

                  </tr>

                  <tr>

                    <td align="right" valign="top" class="font10" >Last Name <span class="font8_red">*</span></td>

                    <td><input name="shipping_lastname" type="text" class="font9"  id="shipping_lastname" size="25" /></td>

                  </tr>

                  <tr>

                    <td width="30%" align="right" valign="top" class="font10" >Address <span class="font8_red">*</span></td>

                    <td><textarea name="shipping_address" cols="35"  rows="3" class="font9"></textarea></td>

                  </tr>

                  <tr>

                    <td align="right" valign="top" class="font10" >Address (Cntd.) </td>

                    <td><textarea name="shipping_address2" cols="35"  rows="3" class="font9"></textarea></td>

                  </tr>

                  <tr>

                    <td align="right" valign="top" class="font10" >City <span class="font8_red">*</span></td>

                    <td><input name="shipping_city" type="text" class="font9"  id="shipping_city" size="25" /></td>

                  </tr>

                  <tr>

                    <td align="right" valign="top" class="font10" >State / Province <span class="font8_red">*</span></td>

                    <td><input name="shipping_state" type="text" class="font9"  id="shipping_state" size="25" /></td>

                  </tr>

                  <tr>

                    <td align="right" valign="top" class="font10" >Post Code <span class="font8_red">*</span></td>

                    <td class="font9"><input name="shipping_pincode" type="text" class="font9"  id="shipping_pincode" size="20" /></td>

                  </tr>

                  <tr>

                    <td align="right" valign="top" class="font10" >Country <span class="font8_red">*</span></td>

                    <td><select name="shipping_country" class="font9">

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

                    <td width="30%" align="right" valign="top" class="font10" >Email Address <span class="font8_red">*</span></td>

                    <td width="70%"><input name="shipping_email" type="text" class="font9"  id="shipping_email" size="40" /></td>

                  </tr>

                  <tr>

                    <td align="right" valign="top" class="font10" >Phone&nbsp;&nbsp;</td>

                    <td><input name="shipping_phone" type="text" class="font9"  id="shipping_phone" size="25" /></td>

                  </tr>

                  <tr>

                    <td align="right" valign="top" class="font10" >Mobile <span class="font8_red">*</span></td>

                    <td><input name="shipping_mobilenumber" type="text" class="font9"  id="shipping_mobilenumber" size="25" /></td>

                  </tr>

                </table></td>

              </tr>

            </table></td>

        </tr>



        

 	   <tr>

          <td height="10" colspan="2" align="right"></td>

        </tr>

        <tr>

         

          <td colspan="2" align="left" class="titel">If you have any discount code:</td>

        </tr>

        <tr>

          <td height="10" colspan="2" align="right"></td>

        </tr>

        <tr>

          <td width="30%" align="right" class="font10">Enter Your Discount Code : </td>

          <td width="70%" align="left" class="titel">&nbsp;<input name="discountcode" type="text" class="font9"  id="shipping_mobile" size="25" /></td>

        </tr>

        <tr>

          <td height="10" colspan="2" align="right"></td>

        </tr>

        <tr>

          <td colspan="2" align="right"> 

          <table width="100%" border="0" cellspacing="0" cellpadding="5">

              <tr>

                <td width="50%" align="left">&nbsp;</td>

                <td align="right" >  

                  <input type="hidden" name="method" value="<?php echo $_REQUEST["method"];?>" /> 

				  <input name="button" type="submit" class="titel" id="button" value="Proceed to Payment" onclick="return validation(this.form);" style="cursor:pointer;"/></td>

              </tr>

        	</table>

          </td>

        </tr>

        <tr>

          <td height="5" colspan="2" align="left"></td>

        </tr>

        <tr id="erroralready" style="display:none;">

          <td colspan="2" align="left"><table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">

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

                              <td class="titel_2" align="left"><strong><font color="#FF0000">Error</font></strong></td>

                              </tr>

                            <tr>

                              <td class="red_font9" align="left"><div id="lblerror" class="font10" align="left" style=" width:400px; margin-left:0px; color:#FF0000; border-color:#FF0000; visibility:hidden;" ></div></td>

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

    <td width="10">&nbsp;</td>

  </tr>

</table>