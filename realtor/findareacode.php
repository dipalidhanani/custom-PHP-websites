<?php 
require_once("include/config.php");

$areaid=$_GET['area'];
$result=mysql_query("select * from rm_area_master where rm_area_id='$areaid'");
while($row=mysql_fetch_assoc($result)) {
$value=$row['rm_area_title'];
$code=$row['rm_area_code'];
echo $code;
}?>
