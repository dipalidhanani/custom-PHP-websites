<?php 								
									require_once("currency_class.php");
									$c = new JOJO_Currency_yahoo();
									$list = $c->getCurrencies();
									
									// Check any submitions
										$amount = "500"; // Your Amount
										// From
										$from = 'INR';
										$from_text = $list[$from];
										
									//////// Dollar Convert //////////////	
										// To
										$to = 'USD';
										$to_text = $list[$to];
										// Get rate
										$rate = $c->getRate($from,$to, true);
										// Total price (to 2 decemial points)
										$total = "<br>$".number_format(($rate*$amount),2);
									    echo $total." USD";											
									
?>
