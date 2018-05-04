<?php
session_start();
include('admin/config.inc.php'); 
require("admin/Database.class.php"); 	
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
$db->connect(); 


$currenttime = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];
$qry="INSERT INTO paypal_records (payer_id,payment_date,txn_id,first_name,last_name,payer_email,payer_status,payment_type,memo,item_name,invoice,quantity,mc_gross,mc_currency,address_name,address_street,address_city,address_state,address_zip,address_country,address_status,payer_business_name,payment_status,pending_reason,reason_code,txn_type) VALUES 
('".$_REQUEST["payer_id"]."','".$_REQUEST["payment_date"]."', '".$_REQUEST["txn_id"]."', '".$_REQUEST["first_name"]."', '".$_REQUEST["last_name"]."', '".$_REQUEST["payer_email"]."', '".$_REQUEST["payer_status"]."', '".$_REQUEST["payment_type"]."', '".$_REQUEST["memo"]."', '".$_REQUEST["item_name"]."', '".$_REQUEST["invoice"]."', '".$_REQUEST["quantity"]."', '".$_REQUEST["mc_gross"]."', '".$_REQUEST["mc_currency"]."', '".$_REQUEST["address_name"]."', '".$_REQUEST["address_street"]."', '".$_REQUEST["address_city"]."', '".$_REQUEST["address_state"]."', '".$_REQUEST["address_zip"]."', '".$_REQUEST["address_country"]."', '".$_REQUEST["address_status"]."', '".$_REQUEST["payer_business_name"]."', '".$_REQUEST["payment_status"]."', '".$_REQUEST["pending_reason"]."', '".$_REQUEST["reason_code"]."', '".$_REQUEST["txn_type"]."')";

mysql_query($qry) or die(mysql_error());

	 
			
				$userid=$_REQUEST['userid'];
				
			
				$column=array("Order_Date","Amount","User_Id","Pay_Mode","Payment_Gateway","Pay_Data","Accept_Time","Currency","Order_No","Paid_Amount","Remain_Amount","IP_Address");
						
				$r=mysql_fetch_array(mysql_query("select Order_No from order_mst order by Order_No DESC LIMIT 1"));
				$count=mysql_affected_rows();
				
				if($count<=0 || $r['Order_No']=="")
				{ 
					$order=100000;
				}
				else
				{	
					$order=$r['Order_No']+1;						
				}

				$invoiceno=mysql_fetch_array(mysql_query("select Invoice_No from bill_mst order by Invoice_No DESC LIMIT 1"));
				$countno=mysql_affected_rows();
				if($countno<=0 || $invoiceno['Invoice_No']=="")
				{ 
					$ino=100000;
				}
				else
				{	
					$ino=$invoiceno['Invoice_No']+1;						
				}	
				
				$now='NOW()';
				$orderdate=$now;
				$paymode='Offline';
				$accepttime='NOW()';
								
				$ip=$_SERVER['REMOTE_ADDR'];
				$ptype="Paypal";
				$amt=$_REQUEST['amount'];
				$remain_amt='0.00';
				
				
				$value=array($orderdate,$_REQUEST["mc_gross"],$userid,$paymode,$ptype,$_REQUEST["mc_gross"],$accepttime,$_REQUEST['mc_currency'],$order,$amt,$remain_amt,$ip);
					
				
				$db->insert("order_mst",$column,$value);
				$lastorderid=mysql_insert_id();
				
					mysql_query("update prod_order_mst set Order_Id='".$lastorderid."' where Temp=1 and order_invoice_Id='".$_REQUEST["invoice"]."'");
					mysql_query("update prod_order_mst set Temp=0 where order_invoice_Id='".$_REQUEST["invoice"]."' and Order_Id='".$lastorderid."'");
				
				$billingdate='NOW()';
				$paymentmethod='Online';
				$cust=$_POST['cust'];
				
				/////////user info /////////
				
				$username=$_POST['username'];
				$add=$_POST['add'];
				$pincode=$_POST['pincode'];
				$countryid=$_POST['countryid'];
				$state=$_POST['state'];
				$city=$_POST['city'];
				$mail=$_POST['mail'];
				$contact=$_POST['contact'];
				
				
				if($cust==0)
				{
					$billcolumn=array("User_Id","Order_Id","Invoice_No","Billing_Date","Bill_Amount","Remaing_Amount","PayMent_Method","Cust_Data");
				
				$billvalue=array($userid,$lastorderid,$ino,$billingdate,$_REQUEST["mc_gross"],$_REQUEST["mc_gross"],$paymentmethod,$cust);
					
				}
				else
				{
					$billcolumn=array("User_Id","Order_Id","Invoice_No","Billing_Date","Bill_Amount","Remaing_Amount","PayMent_Method","Cust_Data","Billing_Username","Billing_Address","Billing_Pincode","Billing_Country","Billing_State","Billing_City","Billing_User_email","Billing_Contact");
				
				$billvalue=array($userid,$lastorderid,$ino,$billingdate,$_REQUEST["mc_gross"],$_REQUEST["mc_gross"],$paymentmethod,$cust,$username,$add,$pincode,$countryid,$state,$city,$mail,$contact);
					
				}
				
					
				$db->insert("bill_mst",$billcolumn,$billvalue);	
				
				
				//////////////////////////// Order Confirmmation Mail  /////////////////////////////
				
				$today=date('Y-m-d');
				$orderno=mysql_fetch_array(mysql_query("select * from order_mst where User_Id='".$userid."' and Order_Date='".$today."' and Order_Id='".$lastorderid."' order by Order_No Desc limit 1")) or die(mysql_error()); 
							if(mysql_affected_rows()>0)
							$orderno['Order_No'];
				
				
				 /////////////// Client Mail ///////////
						  
			$ct=mysql_query("select * from user_mst where User_Id='".$orderno['User_Id']."'");			  
			$c=mysql_fetch_array($ct);
			$email=$c['Email_Address'];
			$username=$c['First_Name']." ".$c['Last_Name'];
			$order=$orderno['Order_No'];
			
		 $to=$email;
		 $subject="Order Confirmation Mail";
		 $fromtitle="BHATIA Mobile";
		 $from="orders@bhatiamobile.com";
		 $mailData=$mailData."Dear ".$username.","."<br/><br/>";
		 $mailData=$mailData."Thank you for placing an order with BHATIAMOBILE.COM."."<br/><br/>";
		 $mailData=$mailData."Your <b>Order No</b> is :<b>".$order."</b><br/><br/>";
		 $mailData=$mailData."Our Order department will review and process the order manually within next 6 to 24 hours. Once processed, we will then send the order for dispatch. The whole process can take anywhere from 4 to 12 days."."<br/><br/>";
		 $mailData=$mailData."Regards,"."<br/><br/>";
		 $mailData=$mailData."BHATIA Mobile"."<br/><br/>";
		 $headers = "MIME-Version: 1.0\n"; 
		 $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		 $headers .= "From: ".$fromtitle." <" .$from."> \n";
		
		mail($to,$subject,$mailData,$headers);
		
	
		/////////////admin mail send Processing ///////////////////////////
		
		 $to='';$subject='';$fromtitle='';$from='';	$mailData='';	 
		 $to='orders@bhatiamobile.com';
		 $subject="Order Confirmation Mail";
		 $fromtitle="BHATIA Mobile";
		 $from=$email;
		 $mailData1=$mailData1."Dear Bhatia Team,"."<br/><br/>";
		 $mailData1=$mailData1." ".$username." have successfully completed the order with the following details."."<br/><br/>";
		 $mailData1=$mailData1."His/Her <b>Order No</b> is :<b>".$order."</b><br/><br/>";
		 $mailData1=$mailData1."Order Date :".$orderdate."</b><br/><br/>";
		 $mailData1=$mailData1."Payment Mode :".$paymode."</b><br/><br/>";
		 $mailData1=$mailData1."Regards,"."<br/><br/>";
		 $mailData1=$mailData1."BHATIA Mobile"."<br/><br/>";
		 $headers = "MIME-Version: 1.0\n"; 
		 $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		 $headers .= "From: ".$fromtitle." <" .$from."> \n";
		
		mail($to,$subject,$mailData1,$headers);
		

		
		$_SESSION['shopcart']='';
		$_SESSION['cartno']='';
?>


