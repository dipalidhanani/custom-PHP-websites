<?php
$cnn=mysql_connect("localhost","root","")
or die("could not connect mysql server");

$selectdb=mysql_select_db("vipbajaj_db") 
or
die("could not connect vipbajaj_db database");

?>