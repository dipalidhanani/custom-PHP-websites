<?php 	
session_start();							
require_once("currency_class.php");
$c = new JOJO_Currency_yahoo();
$list = $c->getCurrencies();
									
	$amount = "1"; 
	$from = 'USD';
	$from_text = $list[$from];
	
	if($_REQUEST["currency"]=="usd")
	{
		$_SESSION["currentselectedcurrency"]="USD";
		$_SESSION["currentselectedcurrencyamount"]=1;
	}
	if($_REQUEST["currency"]=="inr")
	{
		$to = 'INR';
		$to_text = $list[$to];
		$rate = $c->getRate($from,$to, true);
		$total = number_format(($rate*$amount),2);	
		$_SESSION["currentselectedcurrency"]="INR";
		$_SESSION["currentselectedcurrencyamount"]=$total;											
    }
	if($_REQUEST["currency"]=="euro")
	{
		$to = 'EUR';
		$to_text = $list[$to];
		$rate = $c->getRate($from,$to, true);
		$total = number_format(($rate*$amount),2);
		$_SESSION["currentselectedcurrency"]="EUR";
		$_SESSION["currentselectedcurrencyamount"]=$total;										
    }
	
	echo "<script type=\"text/javascript\">javascript:window.history.go(-1);</script>\n";				
?>
