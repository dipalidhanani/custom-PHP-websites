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

if($_REQUEST["process"]=="addtestdrive")
{

	$book_test_drive_date=date("Y-m-d H:i:s");
	$query="insert into bike_book_test_drive (Bike_mast_id,Name,Contactno,Book_test_drive_date) values ('".$_REQUEST["bike_name"]."','".$_REQUEST["name"]."','".$_REQUEST["contactno"]."','".$book_test_drive_date."')";
	mysql_query($query);
	
	header("Location:book_test_drive.php");
	exit();
}
//if($_REQUEST["process"]=="edittestdrive")
//{
//			
//		
//	$query="update bike_book_test_drive set Bike_mast_id ='".$_REQUEST["bike_name"]."',Name ='".$_REQUEST["bike_color"]."',Contactno='".$bike_photo."' where Bike_book_test_drive_id ='".$_REQUEST["bike_book_test_drive_id"]."'";
//	
//	
//	mysql_query($query);
//	
//	header("Location:book_test_drive.php");
//	exit();
//}
if($_REQUEST["process"]=="delete")
{
	$query=mysql_query("delete from bike_book_test_drive where Bike_book_test_drive_id='".$_GET['book_test_driveid']."'");
	
header("Location:book_test_drive.php");
exit();
	}
?>

