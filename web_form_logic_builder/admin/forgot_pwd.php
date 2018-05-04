<script language="javascript">

function chk_email(){
	if(document.getElementById("your_email").value == ""){
		alert("Please enter Your Email");
		return false;
	}
	return true;
}
</script>
<table width="100%" border="0" cellpadding="0" cellspacing="5">
 <tr><td align="left" class="heading_home" colspan="2"><strong>Forgot Password</strong></td>
</tr>
 <tr>
 <td>&nbsp; </td>
	<td align="center" class="error"><?php echo @$_SESSION['SessionMessage']; @$_SESSION['SessionMessage'] = ""; ?></td>
 </tr>
 
<form action="index.php?page=process_forgot_pwd" name="forgot_pwd" id="forgot_pwd" method="post" onsubmit="return chk_email();" >
  
  <tr>
    <td width="14%">Your Email</td>
    <td width="86%"><input type="text" name="your_email" id="your_email" /></td>
  </tr>

   <tr>
    <td>&nbsp;</td>
    <td>
	
	<input type="submit" name="submit" id="submit" value="Submit" />
	</td>
  </tr>
  </form>
</table>