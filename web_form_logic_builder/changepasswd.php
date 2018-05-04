<script language="javascript">
$(document).ready(function(){
	 $("#ChangePasswordFrm").validate({
	  rules: {
		password: "required",
		confpass: {
		  equalTo: "#newpass"
		}
	  }
	});
		
  });
</script>
<script language="javascript">

function password_validate()
{
	with(document.ChangePasswordFrm)
	{
			var error=0;
			var message;
			message="Please enter / correct folllowing errors to proceed further :";
			message=message+ "\n" + "--------------------------------------------------------------------";
			
	
			if(oldpasswd.value=='')
			{
				
				error=1;
				message=message + "\n" + "Please enter Old Password!";
			}
			if(newpass.value=='')
			{
				
				error=1;
				message=message + "\n" + "Please enter New Password!";
			}
			if(confpass.value != newpass.value)
			{				
				error=1;
				message=message + "\n" + "Please enter Confirm Password same as New Password!";
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
<link href="style.css" rel="stylesheet" type="text/css" />
<form action="process_changepassword.php" name="ChangePasswordFrm" id="ChangePasswordFrm" method="post" onsubmit="return password_validate();">
<div class="form-inner">
<div class="heading"><strong>Change Password</strong></div>
<div class="form-row"> <label><?php echo $_SESSION['SessionMessage'];$_SESSION['SessionMessage'] = ""; ?></label></div>

<div class="form-row"> 
<label>Old Password :</label>
<input type="password" name="oldpasswd" id="oldpasswd" class="text"/>
</div>
<div class="form-row"> <label>New Password :</label>
<input type="password" name="newpass" id="newpass" class="text"/></div>
<div class="form-row"> <label>Confirm Password :</label>
<input type="password" name="confpass" id="confpass" class="text"/></div>
<div class="form-row"> <label>&nbsp;</label>
<input type="submit" name="submit" value="Submit" class="button1"></div>
</div>
</form>	