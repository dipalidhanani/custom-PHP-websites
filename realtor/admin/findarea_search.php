<?php 
include("../include/config.php");
?>
<select name="areaid" class="normal_fonts9" id="ddlarea" style="width:160px; padding:2px; border:1px solid #ddd;" onchange="getAreacode(this.value)">
<option value="" selected="selected">Please Select Street</option>

<?php
$cityid=$_REQUEST['ddlcity'];
$result=mysql_query("select * from rm_area_master where rm_city_mast_id='$cityid'");
while($row=mysql_fetch_assoc($result)) {
$value=$row['rm_area_id'];
$area=$row['rm_area_title'];
echo "<option value=\"$value\">$area</option>";
}?>
</select>