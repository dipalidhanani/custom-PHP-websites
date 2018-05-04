<?php session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>

<?php
if($_REQUEST["remove"]=="product")
{
	$query="delete from product_wishlist where  wishlist_product_ID='".$_REQUEST["productid"]."' and wishlist_user_ID='".$_SESSION['loginuserid']."' ";
	mysql_query($query);
?>
<script language="javascript"> 
	location.href = 'index.php?content=2&type=<?php echo $_REQUEST["type"];?>&productid=<?php echo $_REQUEST["productid"];?>';
</script>
<?php
}
if($_REQUEST["remove"]=="empty")
{
	$query="delete from product_wishlist where wishlist_user_ID='".$_SESSION['loginuserid']."' ";
	mysql_query($query);
?>
<script language="javascript"> 
	location.href = 'index.php?content=7&view=mywishlist#t';
</script>
<?php
}
?>   
