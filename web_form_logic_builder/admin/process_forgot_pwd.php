<?php
	    $sql = "select * from admin_master where admin_email = '".$_POST['your_email']."'";
		if ( rowCount($sql) == 0 ) {
			$_SESSION['SessionMessage'] = "<span class='error'>User is not registered with us.</span>";
			header("Location:index.php?page=forgot_pwd");
			exit();
		}
		
		$data = FetchData($sql);
	    $userid = $data['admin_id']; 

		
		$to =$data['admin_email'];
		$from ="dipali.aghadiinfotech@gmail.com" ;
		$subject = "Forgot Password to  ".$data['admin_name'];
		$message .="Dear ".$data['admin_name'].",<br>";
		$message .= "Your  Password is = ".$data['admin_password'];
		sendHTMLMail($to,$from,$subject,$message);
		$_SESSION['Session_forgot_pass'] = "<span class='error'  style='color:red; font-size:16px;'>Your  Password sent to your email-address</span>";
		ob_end_clean();
		header("Location:index.php?page=login");
		
		?>
		
	
	