<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");


$now = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];


if($_SESSION['loginuserid']=="")
{
	$recordsetprofile = mysql_query("select * from register_master where register_user_email='".$_REQUEST["email"]."' ",$cn);
	
	if(mysql_num_rows($recordsetprofile)==0)
	{
	$dt1=explode("-",$_POST["dateofbirth"]);
	$dd1=$dt1[0];
	$mm1=$dt1[1];
	$yy1=$dt1[2];
	
	$birthdate=$yy1."-".$mm1."-".$dd1;
	
		$query="insert into register_master 
		(
		 register_user_first_name,
		 register_user_last_name,
		 register_user_birth_date,
		 register_user_unit,
		 register_user_street,
		 register_user_subburb,
		 register_user_state,
		 register_user_pincode,
		 register_user_country,
		 register_user_email,
		 register_user_password,
		 register_user_phone,
		 register_user_mobile,		
		 registration_date_time,
		 registration_IP
		 )
		values
		(
		 '".$_REQUEST["firstname"]."',
		 '".$_REQUEST["lastname"]."',
		  '".$birthdate."',
		 '".$_REQUEST["unit"]."',
		 '".$_REQUEST["street"]."',
		 '".$_REQUEST["subburb"]."',
		 '".$_REQUEST["state"]."',
		 '".$_REQUEST["pincode"]."',
		 '".$_REQUEST["country"]."',
		 '".$_REQUEST["email"]."',
		 '".base64_encode($_REQUEST["password"])."',	 
		 '".$_REQUEST["phone"]."',
		 '".$_REQUEST["mobile"]."',		
		 '".$now."',
		 '".$ip."'
		 )	
		";
		mysql_query($query);
		
						function u_SendMail($FromMail,$ToMail,$Data,$Subject)
						{
							$headers = "MIME-Version: 1.0\n"; 
							$headers .= "Content-type: text/html; charset=iso-8859-1\n";
							
							$headers .= "From: $FromMail\n";
						
							if(strpos($_SERVER['SERVER_NAME'],".com"))
							{
								$myresult=mail($ToMail, $Subject , $Data, $headers);
							}					
						}	
						
						$FromMail="Klassic Kids <info@klassickids.com>";
						$ToMail=$_REQUEST["email"];
											
						$Data= 'Cogratulations! '.$_REQUEST["firstname"].' '.$_REQUEST["lastname"].',<br /><br />
						
						You are now a registered member of Klassic Kids<br /><br />
                       						
						Your login details are given below.<br /><br />
						
						Email : '.$_REQUEST["email"].'<br />
						Password : '.$_REQUEST["password"].'<br /><br />						
						
						Regards,<br />
						Klassic Kids Team';						
													
						$Subject= "Registration @ Klassic Kids";						
							
						u_SendMail($FromMail,$ToMail,$Data,$Subject);
						
						
						$FromMail=$_REQUEST["firstname"].' '.$_REQUEST["lastname"]. "<".$_REQUEST["email"].">";
						$ToMail="info@klassickids.com";
											
						$Data= 'Dear Admin, <br /><br />
						
						New member registration on Klassic Kids<br /><br />
                       						
						Member details are below.<br /><br />
						
						Name : '.$_REQUEST["firstname"].' '.$_REQUEST["lastname"].'<br />
						Email : '.$_REQUEST["email"].'<br />
						Country : '.$_REQUEST["country"].'<br /><br />						
						
						Regards';
						
													
						$Subject= "New Registration @ Klassic Kids";						
							
						u_SendMail($FromMail,$ToMail,$Data,$Subject);
	}
}


function checkinvoicenumber($invoiceno)
{
	$recordsetbill = mysql_query("select * from bill_master where bill_invoice_no='".$invoiceno."'");

	if(mysql_num_rows($recordsetbill)==0)
	{
		$now = date("Y-m-d H:i:s");
		$ip=$_SERVER['REMOTE_ADDR'];

		$billingname=$_REQUEST["firstname"]." ".$_REQUEST["lastname"];
		$billingemail=$_REQUEST["email"];
		$query="insert into bill_master (bill_name_user,bill_email_id,bill_invoice_no,bill_datetime,bill_ip) values ('".$billingname."','".$billingemail."','".$invoiceno."','".$now."','".$ip."')";
		mysql_query($query);		
		$lastbillid=mysql_insert_id();
		return $lastbillid;
	}
	else
	{
		srand((double)microtime()*1000000);
		$invoiceno = rand(1000000000,9999999999);		
		checkinvoicenumber($invoiceno);
	}
}

srand((double)microtime()*1000000);
$invoiceno = rand(1000000000,9999999999);

$lastbillid=checkinvoicenumber($invoiceno);



$querybilling="insert into bill_billing_address 
(
 billing_user_first_name,
 billing_user_last_name,
 billing_user_unit,
 billing_user_street,
 billing_user_subburb,
 billing_user_state,
 billing_user_pincode,
 billing_user_country,
 billing_user_email,
 billing_user_phone,
 billing_user_mobile,
 billing_bill_master_ID
 )
values
(
 	'".$_REQUEST["firstname"]."',
	 '".$_REQUEST["lastname"]."',
	 '".$_REQUEST["unit"]."',
	 '".$_REQUEST["street"]."',
	 '".$_REQUEST["subburb"]."',
	 '".$_REQUEST["state"]."',
	 '".$_REQUEST["pincode"]."',
	 '".$_REQUEST["country"]."',
	 '".$_REQUEST["email"]."',	 
	 '".$_REQUEST["phone"]."',
	 '".$_REQUEST["mobile"]."',
	 '".$lastbillid."'
 )
";
mysql_query($querybilling);

if($_REQUEST["shipping"]==0)
{
				$queryshipping="insert into bill_shipping_address 
				(
				 shipping_user_first_name,
				 shipping_user_last_name,
				 shipping_user_unit,
				 shipping_user_street,
				 shipping_user_subburb,
				 shipping_user_state,
				 shipping_user_pincode,
				 shipping_user_country,
				 shipping_user_email,
				 shipping_user_phone,
				 shipping_user_mobile,
				 shipping_bill_master_ID
				 )
				values
				(
					'".$_REQUEST["firstname"]."',
					 '".$_REQUEST["lastname"]."',
					 '".$_REQUEST["unit"]."',
					 '".$_REQUEST["street"]."',
					 '".$_REQUEST["subburb"]."',
					 '".$_REQUEST["state"]."',
					 '".$_REQUEST["pincode"]."',
					 '".$_REQUEST["country"]."',
					 '".$_REQUEST["email"]."',	 
					 '".$_REQUEST["phone"]."',
					 '".$_REQUEST["mobile"]."',
					 '".$lastbillid."'
				 )
				";
				mysql_query($queryshipping);
				
				$shippingcountry=$_REQUEST["country"];
}
else
{
	$queryshipping="insert into bill_shipping_address 
				(
				 shipping_user_first_name,
				 shipping_user_last_name,
				 shipping_user_unit,
				 shipping_user_street,
				 shipping_user_subburb,
				 shipping_user_state,
				 shipping_user_pincode,
				 shipping_user_country,
				 shipping_user_email,
				 shipping_user_phone,
				 shipping_user_mobile,
				 shipping_bill_master_ID
				 )
				values
				(
					'".$_REQUEST["shipping_firstname"]."',
					 '".$_REQUEST["shipping_lastname"]."',
					 '".$_REQUEST["shipping_unit"]."',
					 '".$_REQUEST["shipping_street"]."',
					 '".$_REQUEST["shipping_subburb"]."',
					 '".$_REQUEST["shipping_state"]."',
					 '".$_REQUEST["shipping_pincode"]."',
					 '".$_REQUEST["shipping_country"]."',
					 '".$_REQUEST["shipping_email"]."',	 
					 '".$_REQUEST["shipping_phone"]."',
					 '".$_REQUEST["shipping_mobile"]."',
					 '".$lastbillid."'
				 )
				";
				mysql_query($queryshipping);
				
				$shippingcountry=$_REQUEST["shipping_country"];
	
}

					while(list($key,$proobj)=each($_SESSION['shopcart']))
					{
						$selectedproductid=$proobj['productid'];
						$selectedquantity=$proobj['quantity'];
						$selectedcolors=$proobj['avialable_colors'];	
						$qsize=mysql_query("select * from size_mast where size_id='".$proobj['avialable_size']."'");
						$rsize=mysql_fetch_array($qsize);
						$selectedsize=$rsize['size'];	
						$selectedprice=$proobj['price'];
						
						
						$recordsetproduct = mysql_query("select * from product_mast where Product_id='".$selectedproductid."'",$cn);
						 while($rowproduct = mysql_fetch_array($recordsetproduct,MYSQL_ASSOC))
						 {	
						 $c++;
						  $productamount=$rowproduct["Price"];
						  $saveoffername="";										
						  $offeramount="";
						  $discountamount="";
						
						 $recordsetproductoffer = mysql_query("select * from product_offer where Product_mast_id='".$rowproduct["Product_id"]."' and End_date >='".$now."'",$cn);
						 
						if(mysql_num_rows($recordsetproductoffer)!=0)
						 {
						 while($rowproductoffer = mysql_fetch_array($recordsetproductoffer,MYSQL_ASSOC))
						 {
							 $offeramount=$rowproductoffer["offer_amt"];
							 $offeramounttype=$rowproductoffer["offer_type_id"];
							 
							
							 $recordsetoffer = mysql_query("select * from offer_mast where offer_id ='".$rowproductoffer["offer_mast_id"]."'",$cn); 
							 $roffname = mysql_fetch_array($recordsetoffer,MYSQL_ASSOC);
							 $saveoffername=$roffname["offer_name"];
							 
							 if($offeramounttype==1)
							 {
								 $discountamount=($rowproduct["Price"]*$offeramount)/100;
								 
								 $amountafterdiscount=$rowproduct["Price"]-$discountamount;
							 	 $productfinalamount=$amountafterdiscount;
							 }
							 elseif($offeramounttype==2)
							 {
								 $discountamount=$offeramount;								 
								 $amountafterdiscount=$rowproduct["Price"]-$discountamount;
								 
								 $productfinalamount=$amountafterdiscount;
							 }
							 else
							 {
								 $productfinalamount=$rowproduct["Price"];	
							 }
						 }
						 }
						else
						{
								$productfinalamount=$rowproduct["Price"];
						}
						
						$qpostcode=mysql_query("select * from register_master where register_ID='".$_SESSION["loginuserid"]."'");
						$rowpostcode=mysql_fetch_array($qpostcode);
						$userpostcode=$rowpostcode["register_user_pincode"];
						
						$s_qpostcode=mysql_query("select * from shipping_charges where postcode='".$userpostcode."'");
						$s_rowpostcode=mysql_fetch_array($s_qpostcode);
						$shippingamt=$s_rowpostcode["incl_GST"];						
						 
						$productfinalamount=$productfinalamount+($shippingamt*$selectedquantity);
						 
						  $queryproduct="insert into bill_products 
						  (
							   bill_product_master_ID,
							   bill_product_MRP,
							   bill_product_discount,
							   bill_product_offer_title,
							   bill_product_offer_amount,
							   bill_product_shipping_amount,
							   bill_product_lastprice,
							   bill_product_qty,
							   bill_product_selected_color,
							   bill_product_selected_size,
							   Bill_Master_ID
						   ) values 
						  (
							   '".$selectedproductid."',
							   '".$productamount."',
							   '".$discountamount."',
							   '".$saveoffername."',
							   '".$offeramount."',
							   '".$shippingamt."',
							   '".$productfinalamount."',
							   '".$selectedquantity."',
							   '".$selectedcolors."',
							   '".$selectedsize."',
							   '".$lastbillid."'
						   ) ";
						  
						 
						 mysql_query($queryproduct);
						
						 $totalmrpamount=$totalmrpamount+$productamount;
						 $totaldiscount=$totaldiscount+$discountamount;
						
						$totalqty=$totalqty+$selectedquantity;
						
						$qpostcode=mysql_query("select * from register_master where register_ID='".$_SESSION["loginuserid"]."'");
						$rowpostcode=mysql_fetch_array($qpostcode);
						$userpostcode=$rowpostcode["register_user_pincode"];
						
						$s_qpostcode=mysql_query("select * from shipping_charges where postcode='".$userpostcode."'");
						$s_rowpostcode=mysql_fetch_array($s_qpostcode);
						$shippingamt=$s_rowpostcode["incl_GST"];
						$totalshippingamount=$totalshippingamount+($shippingamt*$selectedquantity);
						
						$totalfinalamount=$totalfinalamount+$productfinalamount+$totalshippingamount;
			}
	}
	
	
	 $queryupdate="update bill_master set 
	bill_total_amount='".$totalmrpamount."',
	bill_total_discount='".$totaldiscount."',
	bill_total_shipping='".$totalshippingamount."',
	bill_final_amount='".$totalfinalamount."'
	where
	bill_invoice_no='".$invoiceno."'
	";
	mysql_query($queryupdate);

header("Location:index.php?content=13&orderid=".base64_encode($invoiceno));
exit();
?>