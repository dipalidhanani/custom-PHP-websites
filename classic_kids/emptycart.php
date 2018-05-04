<?php
session_start();

unset($_SESSION['shopcart']);
unset($_SESSION['cartno']);
unset($_SESSION["totalamountorder"]);
header("Location:index.php?content=3");
exit();
?>