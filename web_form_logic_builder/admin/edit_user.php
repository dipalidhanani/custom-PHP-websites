<script language="javascript">
function cat_validate()
{
	with(document.catfrm)
	{
			var error=0;
			var message;
			message="Please enter / correct folllowing errors to proceed further :";
			message=message+ "\n" + "--------------------------------------------------------------------";
			
			if(user_fullname.value=='')
			{
				
				error=1;
				message=message + "\n" + "Please enter Full name!";
			}
			if(user_email.value=='')
			{
				
				error=1;
				message=message + "\n" + "Please enter Email!";
			}
			if(user_username.value=='')
			{
				
				error=1;
				message=message + "\n" + "Please enter Username!";
			}
			if(user_password.value=='')
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
<form action="process_user.php" name="catfrm" id="catfrm" method="post" onsubmit="return cat_validate();" enctype="multipart/form-data"> 
<?php $sel_query = mysql_query("select * from  user_master where user_id='".$_GET["user_id"]."'");
$data = mysql_fetch_array($sel_query);
?>
<table width="100%" border="0" cellpadding="2" cellspacing="2">
	 <tr>
		<td colspan="2" class="heading"><strong>Edit User</strong></td>
	 </tr>
	 <tr>
		<td colspan="2" align="center"><span class='error'><?php //if($_SESSION['SessionMessage'] != "") { echo $_SESSION['SessionMessage'];} ?></span></td>
	 </tr>
	 <tr>
	 	<td width="30%">&nbsp;</td>
	 </tr>
	 <tr>
	 	<td align="right">Full Name</td>
		<td width="70%" align="left">
		<input type="hidden" name="user_id" id="user_id" class="textbox" value="<?php echo $data["user_id"]; ?>">
		<input type="text" name="user_fullname" id="user_fullname" class="textbox" value="<?php echo $data["user_fullname"]; ?>">
		</td>
	</tr>
    <tr>
	 	<td align="right">Email Address</td>
		<td width="70%" align="left">		
		<input type="text" name="user_email" id="user_email" class="textbox" value="<?php echo $data["user_email"]; ?>">
		</td>
	</tr>
    <tr>
	 	<td align="right">Username</td>
		<td width="70%" align="left">		
		<input type="text" name="user_username" id="user_username" class="textbox" value="<?php echo $data["user_username"]; ?>">
		</td>
	</tr>
    <tr>
	 	<td align="right">Password</td>
		<td width="70%" align="left">		
		<input type="text" name="user_password" id="user_password" class="textbox" value="<?php echo $data["user_password"]; ?>">
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td align="left">
		<input type="hidden" name="process" value="edit"  />
		<input type="submit" name="submit" id="submit" value="Edit User">
		</td>
	</tr>  

</table>
	</form>