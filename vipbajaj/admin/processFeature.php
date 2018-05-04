<?php
session_start();
include("include/config.php");

if($_SESSION['Admin_id'] == "")
	{
			//echo "Unauthorised Access !!!";die;
			echo "<script>location.href='login.php';</script>";
			exit();
	}

?>
<?php
$now = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];

if($_REQUEST["process"]=="addcategory")
{
	$parentcategory=$_REQUEST["parentcategory"];	
		
	$query="insert into bike_specification_mast (Feature_name,Parent_feature_ID,Feature_active_status) values ('".$_REQUEST["categoryname"]."','".$parentcategory."','".$_REQUEST["categorystatus"]."')";
	mysql_query($query);
	
	header("Location:feature.php?categoryid=".$_REQUEST["parentcategory"]);
	exit();
}
if($_REQUEST["process"]=="editcategory")
{
		$parentcategory=$_REQUEST["parentcategory"];
		
	$query="update bike_specification_mast set Feature_name='".$_REQUEST["categoryname"]."',Parent_feature_ID='".$parentcategory."',Feature_active_status='".$_REQUEST["categorystatus"]."' where Feature_ID='".$_REQUEST["categoryid"]."'";
	
	
	mysql_query($query);

	header("Location:feature.php");
	exit();
}

?>

