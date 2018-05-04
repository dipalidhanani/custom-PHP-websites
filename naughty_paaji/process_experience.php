<?php session_start();
include("include/config.php");

if($_SESSION['user_reg_id'] == "")
	{
			//echo "Unauthorised Access !!!";die;
			echo "<script>location.href='login.php';</script>";
			exit();
	}
$userid=$_SESSION['user_reg_id'];
/////////// Insert  //////////
	
	
if($_REQUEST["submit"]=="Submit")
{
	$share_experience_id=$_POST["share_experience_id"];
	$experience_comment=$_POST["experience_comment"];
$user_reg_id=$_SESSION['user_reg_id'];
	$dt=date("Y-m-d H:i:s");
if($experience_comment!="")
	{
$query="insert into experience_detail(experience_mast_id,experience_comment,comment_from_id,comment_date_time,comment_active_status) values('".$share_experience_id."','".$experience_comment."','".$user_reg_id."','".$dt."',1)";
$result=mysql_query($query)
or die(mysql_error());
	}
		
header("location:index.php?page=21&share_experience_id=".$share_experience_id."&msg=1");
}
?>