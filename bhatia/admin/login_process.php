<?php
	session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect(); 
	$username=$_POST['username'];
	$password=base64_encode($_POST['password']);
	$mst=mysql_query("select * from mst_pwd");
	$m=mysql_fetch_array($mst);
	
		$query = "SELECT * from admin_mst where User_Name='$username' and Password='$password' and Is_Active=1";
		$result=mysql_query($query) or die(mysql_error());
		$aff_rows=mysql_affected_rows();
		if($aff_rows>0)
		{
			if($k=mysql_fetch_array($result))
			{ 
				if($m['Mstpwd']==$password && $k['User_Name']==$username)
				{
				$_SESSION['bhatia_id']=$k['Admin_Id'];
				$ip=$_SERVER['REMOTE_ADDR'];
				$status=1;
					mysql_query("delete from admintracking where Admin_Id='".$_SESSION['bhatia_id']."' and status=0");
					mysql_query("INSERT INTO admintracking(Admin_Id,Ip_Address,Login_DateTime,Status) values('".$_SESSION['bhatia_id']."','$ip',NOW(),'$status')") or die(mysql_error());
					
					echo "<script>location.href ='home.php'</script>";	
				}
				else
				{
					if(($k['User_Name']==$username) && ($k['Password'] == $password) )		
					{	
						$_SESSION['bhatia_id']=$k['Admin_Id'];
						$ip=$_SERVER['REMOTE_ADDR'];
						$status=1; //echo "here"; exit;
						
						///////////To manage login member histry////////////////
						
						$query2="insert into login_history (Login_Id,Admin_Id,Ip_Address,Login_DateTime,Status)";
						$query2=$query2 . " values(NULL,'" . $k["Admin_Id"] . "','".$ip."',NOW(),'" . $status . "')";
						$result2=mysql_query($query2)  or die(mysql_error());
						/////////////To manage login status of admin member///////////////
						
						//mysql_query("delete from admintracking where Admin_Id='".$_SESSION['adminid']."' and status=0 ");
						mysql_query("INSERT INTO admintracking(Admin_Id,Ip_Address,Login_DateTime,Status) values('".$_SESSION['bhatia_id']."','$ip',NOW(),'$status')") or die(mysql_error());
						
									echo "<script>location.href ='home.php'</script>";	
					}
					else
					{
						header("Location:login.php?msg=1");
					}
				}
					
			}
			else
			{
					header("Location: login.php?msg=1");
			}
		}
		else
		{
				header("Location: login.php?msg=1");
		}
?>