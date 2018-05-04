<table width="170" border="0" cellpadding="0" cellspacing="0" align="left">
<?php  if (@$_SESSION['user_id'] != "" ) { ?> 
	
	<tr>
		<td class="leftlinks"><span class="heading_home"><a href="index.php?page=home">Home</a></span></td>
	</tr>
	<tr>
		<td class="leftlinks"><span class="heading_home"><a href="index.php?page=users">Users</a></span></td>
	</tr>    	
	<tr>
		<td class="leftlinks"><span class="heading_home"><a href="index.php?page=change_password">Change Password</a></span></td>
	</tr>	
    <tr>
		<td class="leftlinks"><span class="heading_home"><a href="logout.php">Logout</a></span></td>
	</tr>
<?php } else { ?>
	<tr>
		<td class="leftlinks"><span class="heading_home"><a href="index.php?page=login">Login</a></span></td>
	</tr>
<?php } ?>	
</table>