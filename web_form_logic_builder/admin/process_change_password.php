<?php session_start();
//include("../config.php");
//include("functions_mysql.php");
 //include("functions.php");
 
        $sql = "select * from admin_master where admin_password = '".$_POST['old_password']."' and  admin_id = '".$_SESSION['admin_id']."' ";
	    $sql1=mysql_query($sql);
	
		if ( mysql_num_rows($sql1) == 0 ) {
			$_SESSION['SessionMessage'] = "<span class='error'>Please Type Correct Password</span>";
			header("Location:index.php?page=change_password");
			
		}
		
      
			else{
		    	$sql_changepass=("update admin_master set admin_password='".$_POST['new_password']."' where admin_id=".$_SESSION['admin_id']);
				$sql_chage_password=mysql_query($sql_changepass); 
				$_SESSION['SessionMessage'] = "<span class='error'>Password successfully changed</span>";
				
				//ob_end_clean();
				header("Location:index.php?page=home");
			
		   
	  }

?>

