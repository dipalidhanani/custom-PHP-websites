<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>

<?php
$now = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];

$today = mktime(date("H"),date("i"),date("s"),date("m"),date("d")+15,date("Y"));
$after15days=date("Y-m-d H:i:s", $today);
							 
$recordsetproduct = mysql_query("select * from product_wishlist where wishlist_product_ID='".$_REQUEST["productid"]."' and wishlist_user_ID='".$_SESSION['loginuserid']."' and wishlist_datetime < '".$after15days."'",$cn);

if(mysql_num_rows($recordsetproduct)==0)
{
	$query="insert into product_wishlist (wishlist_product_ID,wishlist_user_ID,wishlist_datetime,wishlist_request_Ip) values ('".$_REQUEST["productid"]."','".$_SESSION['loginuserid']."','".$now."','".$ip."')";
	mysql_query($query);
}

						
?>   
<script language="javascript"> 
	location.href = 'index.php?content=2&type=<?php echo $_REQUEST["type"];?>&productid=<?php echo $_REQUEST["productid"];?>';
</script>