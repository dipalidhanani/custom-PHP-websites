<?php 
session_start();
include('config.inc.php'); 
require("Database.class.php");
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
$db->connect();

$img=$_REQUEST['img'];
$_SESSION['img']=$img;
$order=$_REQUEST['file'];
$_SESSION['order']=$order;

echo "Image : ".$_SESSION['img'];
echo " | Disply Order : ".$_SESSION['order'];

?>



