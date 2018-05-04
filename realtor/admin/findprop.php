<?php 
require_once("../include/config.php");
?>
<select name="ddlprop" id="ddlprop" style="width:230px" class="normal_fonts10" onchange="loadPropName(this.value)">
<option value="" selected="selected">Please Select Property</option>

<?php
$propid=$_REQUEST['ddlptype'];
$result=mysql_query("select * from property_master where property_type_id='$propid'");
while($row=mysql_fetch_assoc($result)) {
$value=$row['property_id'];
$prop=$row['property_name'];
echo "<option value=\"$value\">$prop</option>";
}?>
</select>