<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>

<?php

if(!is_array($_SESSION['shopcart'])) $_SESSION['shopcart']=array();

$proobj['productid']=$_REQUEST['productid'];
$proobj['quantity']=$_REQUEST['quantity'];
$proobj['avialable_colors']=$_REQUEST['avialable_colors'];
$proobj['avialable_size']=$_REQUEST['avialable_size'];


		$y="";
		
		if($_SESSION['cartno']==$y)
		{
			$count=1;	   		
			$_SESSION['cartno']=1;
		}
		else
		{
			$count=$_SESSION['cartno'];
			$count++;
			$_SESSION['cartno']=$count;
		}

$_SESSION['shopcart'][]=$proobj; 

while(list($key,$proobj)=each($_SESSION['shopcart']))
					{
						$selectedproductid=$proobj['productid'];
						$selectedquantity=$proobj['quantity'];
						$selectedcolors=$proobj['avialable_colors'];
						$selectedsize=$proobj['avialable_size'];
						$selectedprice=$proobj['price'];						
												
						$recordsetproduct = mysql_query("select * from product_mast where Product_id='".$selectedproductid."'",$cn);
						 while($rowproduct = mysql_fetch_array($recordsetproduct,MYSQL_ASSOC))
						 {	
						 $c++;
						 
						 
								
						 $recordsetproductoffer = mysql_query("select * from product_offer where Product_mast_id='".$rowproduct["Product_id"]."' and End_date >='".$now."'",$cn);
						
						if(mysql_num_rows($recordsetproductoffer)!=0)
						 {
						
						while($rowproductoffer = mysql_fetch_array($recordsetproductoffer,MYSQL_ASSOC))
						 {
							 $offeramount=$rowproductoffer["offer_amt"];
							 $offeramounttype=$rowproductoffer["offer_type_id"];
							 
							 if($offeramounttype==1)
							 {
								 $discountamount=($rowproduct["Price"]*$offeramount)/100;
								 
								 $amountafterdiscount=$rowproduct["Price"]-$discountamount;
							 	 $payableamount=$amountafterdiscount;
							 }
							 elseif($offeramounttype==2)
							 {
								 $discountamount=$offeramount;								 
								 $amountafterdiscount=$rowproduct["Price"]-$discountamount;
								 
								 $payableamount=$amountafterdiscount;
							 }
							 else
							 {
								 $payableamount=$rowproduct["Price"];	
							 }
						 }
						 }
						else
						{
								$payableamount=$rowproduct["Price"];
						}
						
						$totalmrpprice=$totalmrpprice+($rowproduct["Price"]*$selectedquantity);

					$totaldiscountamount=$totaldiscountamount+($discountamount*$selectedquantity);
					
									
					$totalamountproduct=($payableamount*$selectedquantity);
					$totalamountorder=$totalamountorder+$totalamountproduct;
					
					    $amountafterdiscount=0;
			 			$discountamount=0;
						$totalamountproduct=0;
                        }
                        }
						
						   $_SESSION["totalamountorder"]=$totalamountorder;

?>   
<script language="javascript"> 
	location.href = 'index.php?content=3';
</script>