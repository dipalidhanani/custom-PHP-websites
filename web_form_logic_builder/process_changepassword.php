<?php @session_start();
include("config.php");
$quserchangepwd = mysql_query("select * from user_master where user_id = '".$_SESSION["user_id"]."'");
$userdata = mysql_fetch_array($quserchangepwd);
			if($userdata['user_password'] == $_POST['oldpasswd']) { 
				$sql_changepass=mysql_query("update user_master set user_password='".$_POST['newpass']."' where user_id=".$_SESSION['user_id']);
				$_SESSION['SessionMessage'] = "<span class='message success'>Password successfully changed</span>";
				ob_end_clean();
				header("Location:index.php?page=changepasswd");
			} else { 
				$_SESSION['SessionMessage'] = "<span class='message error'>Old password is not match</span>";
				ob_end_clean();
				header("Location:index.php?page=changepasswd");
			}
?>