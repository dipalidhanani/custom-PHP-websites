<table width="100%" border="0" cellpadding="0" cellspacing="5">
 <tr><td align="left" class="heading_home" colspan="2"><strong>Change Password</strong></td>
</tr>
 <tr>
 <td>&nbsp; </td>
	<td align="center" class="error"><?php echo @$_SESSION['SessionMessage']; @$_SESSION['SessionMessage'] = ""; ?></td>
 </tr>
 
<form action="index.php?page=process_change_password" name="change_password" id="change_password" method="post" >
 
  <tr>
    <td width="14%">Old Password</td>
    <td width="86%"><input type="password" name="old_password" id="old_password" /></td>
  </tr>
  <tr>
    <td>NewPassword</td>
    <td><input type="password" name="new_password" id="new_password" /></td>
  </tr> 
   
   <tr>
    <td>&nbsp;</td>
    <td>
	
	<input type="submit" name="submit" id="submit" value="Submit" />
	</td>
  </tr>
  </form>
</table>