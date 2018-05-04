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

if($_REQUEST["process"]=="addservice")
{
	$dt1=explode("-",$_REQUEST["service_date"]);
	$dd1=$dt1[0];
	$mm1=$dt1[1];
	$yy1=$dt1[2];
$service_date=$yy1."-".$mm1."-".$dd1;

	
	 $query="insert into bike_book_service (Bike_mast_id,Book_service_date,Book_service_currentdatetime,Person_name,Person_address,phone_number,Bike_number,Service_type,Door_step) values ('".$_REQUEST["bike_name"]."','".$service_date."','".$now."','".$_REQUEST["person_name"]."','".$_REQUEST["address"]."','".$_REQUEST["phone_number"]."','".$_REQUEST["bike_number"]."','".$_REQUEST["service_type"]."','".$_REQUEST["door_step"]."')";
	mysql_query($query);
	
	header("Location:book_service.php");
	exit();
}

if($_REQUEST["process"]=="delete")
{
	$query=mysql_query("delete from bike_book_service where Bike_book_service_id='".$_GET['book_serviceid']."'");
	
header("Location:book_service.php");
exit();
	}
?>

