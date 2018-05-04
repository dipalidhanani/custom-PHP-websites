<?php
$mysql_hostname = "localhost";
$mysql_user = "bhatiamo_dbuser";
$mysql_password = "mobiledb8587";
$mysql_database = "bhatiamo_db";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) 
or die("Opps some thing went wrong");
mysql_select_db($mysql_database, $bd) or die("Opps some thing went wrong");

?>