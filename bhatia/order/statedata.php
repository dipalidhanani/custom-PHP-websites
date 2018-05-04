<?php 

session_start();

include('../admin/config.inc.php'); 

require("../admin/Database.class.php");

$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 

$db->connect();?>

							  <select name="city" id="city">
                              <option value="0">Select One</option>
                              <?php $city_data=mysql_query("SELECT * FROM city_mst WHERE state_id='".$_REQUEST['q']."' ORDER BY city_name");
							  while($ct=mysql_fetch_array($city_data))
							  {
							  ?>
                              <option value="<?php echo $ct['city_id']; ?>"><?php echo $ct['city_name']; ?></option>
                              <?php } ?>
                              </select>