<?php 
	$time_set=86400;
	session_set_cookie_params ($time_set, '/', '.bhatiamobile.com',TRUE, FALSE);
	session_start();
	require_once("../admin/config.inc.php");
	require_once("../admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect(); 
	
	$username=$_POST['username'];
	$password=base64_encode($_POST['password']);
	if($username!='' && $password!='')
	{
		$qry="Select * from user_mst where User_Name='".$username."' and Password='".$password."' and Is_Active=1 order by User_Id";
		$user_data=mysql_query($qry);
		if(mysql_affected_rows()==1)
		{
			$k=mysql_fetch_array($user_data);
			setcookie("PHPSESSID", session_id(), 0, "/", ".bhatiamobile.com");	
			$_SESSION['buserid']=$k['User_Id'];
			$_SESSION['busername']=$k['User_Name'];
			
			$ip=$_SERVER['REMOTE_ADDR'];
			$status=1;
						mysql_query("INSERT INTO clienttracking(User_Id,Ip_Address,Login_DateTime,Status) values('".$_SESSION['buserid']."','$ip',NOW(),'$status')") or die(mysql_error()); ?>
                 
            	<?php if($_SESSION['url']=='') { ?>           
					<script language="javascript">
                	window.location='<?php echo HTTP_BASE_URL_ORDER; ?>myaccount.php';
                	</script>
                 <?php } else { ?>
                 	<script language="javascript">
                	window.location='<?php echo $_SESSION['url']; ?>';
                	</script>
                 <?php } ?>   
                
		<?php }
		else
		{ ?>
			<script language="javascript">
			window.location='<?php echo HTTP_BASE_URL_ORDER; ?>index.php?pageno=6&msg=yes';
			</script>
		<?php exit; }
	}
	else
	{ ?>
		<script language="javascript">
			window.location='<?php echo HTTP_BASE_URL_ORDER; ?>index.php?pageno=6&msg=yes';
			</script>
            
	<?php exit; } ?>
    
