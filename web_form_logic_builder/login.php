<?php //include("../config.php"); ?>
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

function login_validate()
{
	with(document.frm_login)
	{
			var error=0;
			var message;
			message="Please enter / correct folllowing errors to proceed further :";
			message=message+ "\n" + "--------------------------------------------------------------------";
			
			if(txtUsername.value=='')
			{				
				error=1;
				message=message + "\n" + "Please enter your Username!";
			}
			if(txtPassword.value=='')
			{				
				error=1;
				message=message + "\n" + "Please enter Password!";
			}			
		
			if (error==1)
			{			
				alert(message);
				return false;
			}
			else
			{				
				return true;		
			}
	}
}
</script>

<table width="100%" border="0" cellpadding="0" cellspacing="5">
<tr>
	<td align="center" class="error"><?php echo @$_SESSION['Session_forgot_pass']; @$_SESSION['Session_forgot_pass'] = ""; ?></td>
 </tr>
<form action="process_login.php" name="frm_login" id="frm_login" method="post" onSubmit="return login_validate();">
  <tr>
  <td>
<div class="form-inner">
<div class="form-row"> <label>Username</label>
<input type="text" name="txtUsername" id="txtUsername"  class="text"/>
</div>
<div class="form-row"> <label>Password</label>
<input type="password" name="txtPassword" id="txtPassword" class="text" />
</div>
<div class="form-row"> <label>&nbsp;</label>
	<input type="hidden" name="process" value="login"  />
	<input type="submit" name="submit" id="submit" value="Login" class="button1"/>
</div>
<div class="form-row"> <label>&nbsp;</label>
	<a href="index.php?page=forgot_pwd"> Forgot Password </a>
</div>
</div>
</td>
</tr>
<tr>
    <td style="color:#FF0000;">
    <?php if(isset($_SESSION["errormessage"])){echo $_SESSION["errormessage"];} ?>
	</td>
   </tr>
  </form>
</table>

