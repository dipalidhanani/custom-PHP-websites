<style>
body{color:#000; font-size:13px;}
.tbl_width tr td, .tbl_width tr th
{
	text-align:center;
border:1px solid #666;
border-collapse:collapse;
}
.tbl_width tr th
{
	text-align:center;
	background-color:#CCC;
	color:white; 
}
</style>
<script type="text/javascript">
function del_data(uid) {
if(window.confirm('Are you sure you want to Delete Record?'))
{
	location.href='process_user.php?process=delete&user_id='+ uid;
	//window.location:index.php?page=css_viewreord;
}
}
</script>
<table cellpadding="0" cellspacing="0" width="100%">
<tr><td width="77%" align="left" class="heading_home"><strong>Users</strong></td>
<td width="6%" align="right"><img src="images/add.png" width="32" height="32" border="0" align="absmiddle" /></td>
<td width="17%" align="left"><a href="index.php?page=create_user">Create New User</a></td>
</tr>
<tr><td colspan="3">
<?php 
$sel_query_cat = mysql_query("select * from  user_master order by user_id desc");
$numrows_cat = mysql_num_rows($sel_query_cat);
if($numrows_cat > 0 ){
?>
<table border="0" width="100%" cellpadding="2" cellspacing="0" class="tbl_width" align="center">
	<tr>
    	<th width="4%">No.</th>
    	<th width="45%">Name</th>
        <th width="45%">Email Address</th>
        <th width="45%">Username</th>
        <th width="45%">Password</th>		
        <th width="6%">Action</th>
    </tr>
    <?php 
	$j=1;
	while($data = mysql_fetch_array($sel_query_cat)){ ?>
    	<tr>
        	<td><?php echo $j;?></td>
            <td><?php echo $data["user_fullname"]; ?></td>  
            <td><?php echo $data["user_email"]; ?></td>
             <td><?php echo $data["user_username"]; ?></td>
              <td><?php echo $data["user_password"]; ?></td>  			        
            <td><a href="index.php?page=edit_user&user_id=<?php echo $data["user_id"];?>" style="text-decoration:none"><img src='images/edit.png' border="0"></a>
            <a href="javascript:del_data('<?php echo $data["user_id"];?>');" style="text-decoration:none"><img src='images/delete.gif' border="0"></a>
            </td>
        </tr>
    <?php $j++;} ?>
</table>
<?php }else{ ?>
		<span class='error'><h4 style="color:#F00;" align="center">No Users Available</h4></span>
	<?php }?>

</td></tr></table>