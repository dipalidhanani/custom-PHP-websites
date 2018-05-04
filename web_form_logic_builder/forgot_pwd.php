<script language="javascript">

function chk_email()
{
	with(document.forgot_pwd)
	{
			var error=0;
			var message;
			message="";			
			if(your_email.value=='')
			{
				
				error=1;
				message=message + "\n" + "Please enter Your Email!";
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
<div class="form-inner">
<div class="heading"><strong>Forgot Password</strong></div>
<div class="form-row"> <label><?php echo $_SESSION['SessionMessage'];$_SESSION['SessionMessage'] = ""; ?></label></div>
<form action="process_forgot_pwd.php" name="forgot_pwd" id="forgot_pwd" method="post" onsubmit="return chk_email();" >
<div class="form-row"> 
<label>Your Email</label>
<input type="text" name="your_email" id="your_email" class="text" /></div>
<div class="form-row"> 
<label>&nbsp;</label>
<input type="submit" name="submit" id="submit" value="Submit" class="button1"/>
</div>
  </form>
</div>