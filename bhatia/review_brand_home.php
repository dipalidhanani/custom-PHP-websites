<?php 
session_start();
include('admin/config.inc.php'); 
require("admin/Database.class.php");
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
$db->connect();
$is_brand=$_REQUEST['is_brand_home'];
?>

	<select name="sel_product_home" id="sel_product_home"  style="width:170px;" >
    <option value="">Select One</option> 
    <?php 
	$first_product=mysql_query("SELECT * FROM prod_mst WHERE Brand_Id='".$is_brand."' and Is_Active=1 ORDER BY Prod_Name");
	while($ff=mysql_fetch_array($first_product))
	{
	?> 
    <option value="<?php echo $ff['Prod_Id']; ?>"><?php echo $ff['Prod_Name']; ?></option>
    <?php } ?>
	</select>
