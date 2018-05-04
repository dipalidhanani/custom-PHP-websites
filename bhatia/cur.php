<?php
$from = "USD";
$to = "GBP";
$amount = 12.50;
$url = "http://www.exchangerate-api.com/".$from."/".$to."/".$amount."?k=API_KEY";
$result = file_get_contents($url);
echo $result;
?>