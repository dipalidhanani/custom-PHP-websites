<?php @session_start();
include("config.php");
	    $sql = mysql_query("select * from  user_master where user_email = '".$_POST['your_email']."'");
		if ( mysql_num_rows($sql) == 0 ) {
			$_SESSION['SessionMessage'] = "<span class='error'>User is not registered with us.</span>";
			header("Location:index.php?page=forgot_pwd");
			exit();
		}
		
		$data = mysql_fetch_array($sql);
	    $userid = $data['user_id']; 
	
		$to =$data['user_email'];
		$from ="dipali.aghadiinfotech@gmail.com" ;
		$subject = "Forgot Password to  ".$data['user_fullname'];
		$message .="Dear ".$data['user_fullname'].",";
		$message .= "Your Password is = ".$data['user_password'];
		mail($to,$subject,$message);
		$_SESSION['Session_forgot_pass'] = "<span class='error'  style='color:red; font-size:16px;'>Your Password sent to your email-address. Please check email.</span>";
		ob_end_clean();
		header("Location:index.php?page=login");		
		?>
		
	
	