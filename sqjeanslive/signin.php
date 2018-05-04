<script language="JavaScript" type="text/javascript">
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
function validation_login(sqjeansloginform)
{ 
	with(sqjeansloginform)
    {  		
		if(!IsEmpty(sqjeansemail, 'please enter your email address.'))
		{ 
			return false;
		}
		if(sqjeansemail.value!="")
		{
			if(EmailValidation(sqjeansemail.value)==false)
			{
				alert("please enter valid email address.");
				return false;
			}	
		}	
		if(sqjeanspassword.value=="Password")
		{
			alert("please enter your password.");
			return false;
		}
		if(!IsEmpty(sqjeanspassword, 'please enter your password.'))
		{ 
			return false;
		}
		
		
			return true;
    }
}
</script>
<link href="css/home.css" rel="stylesheet" type="text/css" />
<table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="195" align="left" valign="top">
                         <?php
						if($_SESSION['sqjeansloginuserid']=="")
						{
						?>
                        <table width="100%" border="0" cellspacing="0" cellpadding="5" background="images/login.jpg" class="border3">
                        <form name="sqjeansloginform" method="post" action="signinprocess.php">
                          <tr>
                            <td height="35">&nbsp;</td>
                          </tr>
                          <?php
						  if($_REQUEST["error"]=="invalid")
						  {
						  ?>
                          <tr>
                            <td align="center" valign="top" class="red_font9">Invalid email address and password.</td>
                          </tr>
                          <?php
						  }
						  ?>
                          <tr>
                            <td align="center" valign="top"><input name="sqjeansemail" type="text" class="fonts10"  id="sqjeansemail" onfocus="if(this.value == 'E-mail Address') {this.value = '';}" onblur="if (this.value == '') {this.value = 'E-mail Address';}"  value="E-mail Address" size="25" /></td>
                          </tr>
                          
                          <tr>
                            <td align="center" valign="top"><input name="sqjeanspassword" type="password" class="fonts10"  id="sqjeanspassword" onfocus="if(this.value == 'Passwords') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Passwords';}"  value="Passwords" size="25" /></td>
                          </tr>
                          
                          <tr>
                            <td align="center" valign="top"><label>
                            <?php
							$now = date("Y-m-d H:i:s");
							$ip = $_SERVER['REMOTE_ADDR'];
							
							
							function get_curPageURL() 
							{
								 $pageURL = 'http';
								 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
								 $pageURL .= "://";
										 if ($_SERVER["SERVER_PORT"] != "80") 
										 {
											 $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
										 } 
										 else 
										 {
											$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
										 }
								 return $pageURL;
							}
							
							$link=get_curPageURL();	
							?>
                              <input type="hidden" name="object" value="<?php echo $_REQUEST["object"]?>" />
                              <input type="hidden" name="lasturl" value="<?php echo $link;?>" />
                              <input name="button" type="submit" class="titel_1" id="button" value="Login" onClick="return validation_login(this.form);"/>
                            </label></td>
                          </tr>
                          
                          <tr>
                            <td align="center" valign="top" class="font10"><a href="index.php?object=21"><strong> Register Now</strong></a> | <a href="index.php?object=22"><strong>Forgot Password?</strong></a></td>
                          </tr>
                          </form>
                        </table>
                        <?php
						}
						else
						{
						?>
                        <table width="100%" border="0" cellspacing="0" cellpadding="5" background="images/login1.jpg" class="border3">
              <?php
			  
                 $recordsetmyprofile = mysql_query("select * from register_master where register_ID='".$_SESSION['sqjeansloginuserid']."' and register_user_email='".$_SESSION['sqjeansloginuseremail']."'",$cn);
				while($rowmyprofile = mysql_fetch_array($recordsetmyprofile,MYSQL_ASSOC))
				{
				?>
              <tr>
                <td valign="bottom" class="font10">&nbsp;</td>
                <td height="55" valign="bottom" class="titel_1"><strong>Welcome
                  <?php  echo $rowmyprofile["register_user_first_name"]." ".$rowmyprofile["register_user_last_name"];?>, 
                </strong></font></td>
              </tr>
               <tr>
                <td class="font10">&nbsp;</td>
                <td class="font10"><a href="index.php?object=9">My Profile</font></a></td>
              </tr>
              <tr>
                <td width="15%" class="font10">&nbsp;</td>
                <td class="font10"><a href="index.php?object=25">My Cart</font> (<?php $recordsetselected = mysql_query("select * from bill_selected_records
INNER JOIN bill_master ON bill_master.bill_master_ID=bill_selected_records.bill_master_ID							 
where 
bill_email_id='".$_SESSION['sqjeansloginuseremail']."' and
bill_payment_status!='Completed' and
bill_payment_status!='Pending'
",$cn);
echo mysql_num_rows($recordsetselected);
?>)</a></td>
              </tr>
              <tr>
                <td width="15%" class="font10">&nbsp;</td>
                <td class="font10"><a href="index.php?object=10">My Order History</font></a></td>
              </tr>             
              <tr>
                <td class="font10">&nbsp;</td>
                <td class="font10"><a href="logout.php">Logout</font></a></td>
              </tr>
              <?php
				}
				?>
            </table>
                        <?php
						}
						?>
                        </td>
                      </tr>
                      </table>
