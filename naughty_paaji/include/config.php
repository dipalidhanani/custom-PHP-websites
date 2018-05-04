<?php 
$cnn=mysql_connect("localhost","root","")
or die("could not connect mysql server");

$selectdb=mysql_select_db("naughtypaaji_db") 
or
die("could not connect task database");

?>