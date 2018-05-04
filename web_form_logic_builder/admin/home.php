<table>
<tr>
 <td>&nbsp; </td>
	<td align="center" class="error"><?php echo @$_SESSION['SessionMessage']; @$_SESSION['SessionMessage'] = ""; ?></td>
 </tr>
 </table>
<?php echo "Welcome ".$_SESSION["admin_name"]; ?>
