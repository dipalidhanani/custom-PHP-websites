<?php 
session_start();
include('admin/config.inc.php'); 
require("admin/Database.class.php");
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
$db->connect();
$is_product=$_REQUEST['is_product'];
?>

<?php
$img_first_query=mysql_query("SELECT * FROM prod_img WHERE Prod_Id='".$is_product."' and Disp_Order=1 LIMIT 1 ");
$fm=mysql_fetch_array($img_first_query);
?>

<img name="" src="<?php HTTP_BASE_URL; ?>product/<?php echo $fm['Is_Image']; ?>" title=""  border="0" />