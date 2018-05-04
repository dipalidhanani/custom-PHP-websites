<?php
session_start();
require_once("../admin/config.inc.php");
require_once("../admin/Database.class.php");
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
$db->connect();
/*
*****************************************************************
			* COMPANY    - FSS Pvt. Ltd.
*****************************************************************

Name of the Program : Hosted UMI Sample Pages
Page Description    : Allows Merchant to connect Payment Gateway and send request
Request parameters  : TranporatID,TranportalPassword,Action,Amount,Currency,Merchant 
                      Response/Error URL & TrackID,Language,UDF1-UDF5
Response parameters : Payment Id, Pay Page URL, Error
Values from Session : No 
Values to Session   : No
Created by          : FSS Payment Gateway Team
Created On          : 13-06-2011
Version             : Version 2.0
					
*****************************************************************
NOTE - 
This sample pages are developed and tested on below platform

PHP  Version     - 5.3.5
Web/App Server   - Apache 2.2.17
Operating System - Windows 7
*****************************************************************

Disclaimer:- Important Note in Sample Pages
- This is a sample demonstration page only ment for demonstration, this page 
should not be used in production
- Transaction data should only be accepted once from a browser at the point 
of input, and then kept in a way that does not allow others to modify it 
(example server session, database  etc.)
- Any transaction information displayed to a customer, such as amount, should 
be passed only as display information and the actual transactional data should 
be retrieved from the secure source last thing at the point of processing the transaction.
- Any information passed through the customer's browser can potentially be 
modified/edited/changed/deleted by the customer, or even by third parties to 
fraudulently alter the transaction data/information. Therefore, all transaction 
information should not be passed through the browser to Payment Gateway in a way
that could potentially be modified (example hidden form fields). 
*****************************************************************
*/

/* 
IMPORTANT INFORMATION
This document is provided by Financial Software and System Pvt Ltd on the basis 
that you will treat it as private and confidential.

Data used in examples and sample data files are intended to be fictional and any 
resemblance to real persons or entities is entirely coincidental.

This example assumes that a form has been sent to this example with the required 
fields. The example then processes the command and displays the receipt or error 
to a HTML page in the users web browser.
*/
/*  sign "&" is mandatory to mention with in the end of passed value, in below section this 
to make the string     Merchant can use their on logic of creating the string with required 
inputs, below is just a basic method on how to create a request string and pass the values 
to Payment Gateway */	

/*Getting Transaction Amount and Merchant TrackID from Initial HTML page
Since this sample page for demonstration, values from HTML page are directly
taken from browser and used for transaction processing. Merchants SHOULD NOT
follow this practice in production environment. */
$TranTrackid=$_SESSION["bhatia_order_invoice"];
$TranAmount=$_SESSION["hdfc_order_amount"];

unset($_SESSION["hdfc_order_amount"]);
unset($_SESSION["bhatia_order_invoice"]);

$recordsetorder = mysql_query("select * from prod_order_mst
 where 
 prod_order_mst.order_invoice_Id='".$TranTrackid."' 
 ");


if($TranTrackid=="")
{
		echo "<script type=\"text/javascript\">document.location.href='http://order.bhatiamobile.com/FailedTRAN.php?message=ERROR IN PROCESSING PAYMENT(ILLEGAL ACCESS)'; </script>\n";
		exit();
}
if($TranAmount=="")
{
		echo "<script type=\"text/javascript\">document.location.href='http://order.bhatiamobile.com/FailedTRAN.php?message=ERROR IN PROCESSING PAYMENT(ILLEGAL ACCESS)'; </script>\n";
		exit();
}
if(mysql_num_rows($recordsetorder)==0)
{
		echo "<script type=\"text/javascript\">document.location.href='http://order.bhatiamobile.com/FailedTRAN.php?message=ERROR IN PROCESSING PAYMENT(ILLEGAL ACCESS)'; </script>\n";
		exit();
}




				$userid=$_SESSION['buserid'];
				
			
				$column=array("Order_Date","Amount","User_Id","Pay_Mode","Payment_Gateway","Pay_Data","Accept_Time","Currency","Order_No","Paid_Amount","Remain_Amount","IP_Address","Payment_Status");
						
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
				$paymode='Online';
				$accepttime='NOW()';
								
				$ip=$_SERVER['REMOTE_ADDR'];
				$ptype="HDFC";
				$amt=$TranAmount;
				$remain_amt=$TranAmount;
				$payment_st='Proceed to Payment';
				
				$value=array($orderdate,$amt,$userid,$paymode,$ptype,$amt,$accepttime,"INR",$order,$amt,$remain_amt,$ip,$payment_st);
					
				
				$db->insert("order_mst",$column,$value);
				$lastorderid=mysql_insert_id();
				
					mysql_query("update prod_order_mst set Order_Id='".$lastorderid."' where Temp=1 and order_invoice_Id='".$TranTrackid."'");
					mysql_query("update prod_order_mst set Temp=0 where order_invoice_Id='".$TranTrackid."' and Order_Id='".$lastorderid."'");
				
				$billingdate='NOW()';
				$paymentmethod='Online';
				$cust=$_POST['cust'];
				
				/////////user info /////////
				if($_POST['cust']==1)
				{
					$username=$_POST['username'];
					$add=$_POST['add'];
					$pincode=$_POST['pincode'];
					$countryid=$_POST['countryid'];
					$state=$_POST['state'];
					$city=$_POST['city'];
					$mail=$_POST['mail'];
					$contact=$_POST['contact'];
					$mobile=$_POST['mobile'];
				}
				else
				{
					$user_data=mysql_query("select * from user_mst where User_Id='".$userid."'");
					$ud=mysql_fetch_array($user_data);
					
					$username=$ud['First_Name']." ".$ud['Middle_Name']." ".$ud['Last_Name'];
					$add=$ud['Address1'];
					$pincode=$ud['Pincode'];
					$countryid=$ud['Country_Id'];
					$state=$ud['State_Id'];
					$city=$ud['City'];
					$mail=$ud['Email_Address'];
					$contact=$ud['Phone'];
					$mobile=$ud['Mobile'];
				}
				
				
					$billcolumn=array("User_Id","Order_Id","Invoice_No","Billing_Date","Bill_Amount","Remaing_Amount","PayMent_Method","Cust_Data","Billing_Username","Billing_Address","Billing_Pincode","Billing_Country","Billing_State","Billing_City","Billing_User_email","Billing_Contact","Status","Billing_mobile");
				
				$billvalue=array($userid,$lastorderid,$ino,$billingdate,$amt,$remain_amt,$paymentmethod,$cust,$username,$add,$pincode,$countryid,$state,$city,$mail,$contact,$payment_st,$mobile);
					
				
					
				$db->insert("bill_mst",$billcolumn,$billvalue);


/* to pass Tranportal ID provided by the bank to merchant. Tranportal ID is sensitive information
of merchant from the bank, merchant MUST ensure that Tranportal ID is never passed to customer 
browser by any means. Merchant MUST ensure that Tranportal ID is stored in secure environment & 
securely at merchant end. Tranportal Id is referred as id. Tranportal ID for test and production will be 
different, please contact bank for test and production Tranportal ID*/
$id="id=90002379";

/* to pass Tranportal password provided by the bank to merchant. Tranportal password is sensitive 
information of merchant from the bank, merchant MUST ensure that Tranportal password is never passed 
to customer browser by any means. Merchant MUST ensure that Tranportal password is stored in secure 
environment & securely at merchant end. Tranportal password is referred as password. Tranportal 
password for test and production will be different, please contact bank for test and production
Tranportal password */
$password="password=password1";

/* Action Code of the transaction, this refers to type of transaction. Action Code 1 stands of 
Purchase transaction and action code 4 stands for Authorization (pre-auth). Merchant should 
confirm from Bank action code enabled for the merchant by the bank*/ 
$action="action=1";

/* Transaction language, THIS MUST BE ALWAYS USA. */
$langid="langid=USA";

/* Currency code of the transaction. By default INR i.e. 356 is configured. If merchant wishes 
to do multiple currency code transaction, merchant needs to check with bank team on the available 
currency code */
$currencycode="currencycode=356";

/* Transaction Amount that will be send to payment gateway by merchant for processing
NOTE - Merchant MUST ensure amount is sent from merchant back-end system like database
and not from customer browser. In below sample AMT is hard-coded, merchant to pass 
trasnaction amount here. */
$amt="amt=".$TranAmount;

/* Response URL where Payment gateway will send response once transaction processing is completed 
Merchant MUST esure that below points in Response URL
1- Response URL must start with http://
2- the Response URL SHOULD NOT have any additional paramteres or query string */ 
$responseURL="responseURL=https://order.bhatiamobile.com/GetHandleRES.php";

/* Error URL where Payment gateway will send response in case any issues while processing the transaction 
Merchant MUST esure that below points in ErrorURL 
1- error url must start with http://
2- the error url SHOULD NOT have any additional paramteres or query string
*/ 
$errorURL="errorURL=https://order.bhatiamobile.com/FailedTRAN.php";

/* To pass the merchant track id, in below sample merchant track id is hard-coded. Merchant
MUST pass his transaction ID (track ID) in this parameter. Track Id passed here should be 
from merchant backend system like database and not from customer browser*/
$trackid="trackid=".$TranTrackid;

/* User Defined Fileds as per Merchant or bank requirment. Merchant MUST ensure merchant 
merchant is not passing junk values OR CRLF in any of the UDF. In below sample UDF values 
are not utilized */
$udf1=$_SESSION["payment_udf_productname"];
$udf2=$_SESSION["payment_udf_email"];
$udf3=$_SESSION["payment_udf_mobile"];
$udf4=$_SESSION["payment_udf_name"];
$udf5=$TranTrackid;

/*
ME should now do the validations on the amount value set like - 
a) Transaction Amount should not be blank and should be only numeric
b) Language should always be USA
c) Action Code should not be blank
d) UDF values should not have junk values and CRLF (line terminating parameters)
*/

/* Now merchant sets all the inputs in one string for passing to the Payment Gateway URL */		
$param=$id."&".$password."&".$action."&".$langid."&".$currencycode."&".$amt."&".$responseURL."&".$errorURL."&".$trackid."&".$udf1."&".$udf2."&".$udf3."&".$udf4."&".$udf5;

/* This is Payment Gateway Test URL where merchant sends request. This is test enviornment URL, 
production URL will be different and will be shared by Bank during production movement */
$url = "https://securepgtest.fssnet.co.in/pgway/servlet/PaymentInitHTTPServlet";

/* 
Log the complete request in the log file for future reference
Now creating a connection and sending request
Note - In PHP CURL function is used for sending TCPIP request
*/
$ch = curl_init() or die(curl_error()); 
curl_setopt($ch, CURLOPT_POST,1); 
curl_setopt($ch, CURLOPT_POSTFIELDS,$param); 
curl_setopt($ch, CURLOPT_PORT, 443); // port 443
curl_setopt($ch, CURLOPT_URL,$url);// here the request is sent to payment gateway 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0); //create a SSL connection object server-to-server
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0); 
$data1=curl_exec($ch) or die(curl_error());

curl_close($ch); 

$response = $data1;
            try
			{
				
				
				$index=strpos($response,"!-");
				$ErrorCheck=substr($response, 1, $index-1);//This line will find Error Keyword in response
				if($ErrorCheck == 'ERROR')//This block will check for Error in response
				{
					$failedurl = 'https://order.bhatiamobile.com/FailedTRAN.php?message=PAYMENT FAILED ('.$response.' )&ME_TX_ID='.$TranTrackid;
					header("location:". $failedurl );
				}
				else
				{
					//echo $response;
					// If Payment Gateway response has Payment ID & Pay page URL		
					$i =  strpos($response,":");
					// Merchant MUST map (update) the Payment ID received with the merchant Track Id in his database at this place.
					$paymentId = substr($response, 0, $i);
					$paymentPage = substr( $response, $i + 1);
					
					
					mysql_query("update prod_order_mst set order_payment_ID='".$paymentId."' where order_invoice_Id='".$TranTrackid."' and Order_Id='".$lastorderid."'");
					
					// here redirecting the customer browser from ME site to Payment Gateway Page with the Payment ID
					$r = $paymentPage . "?PaymentID=" . $paymentId;
					header("location:". $r );
				}
				
							
			}
			catch(Exception $e)
			{
				var_dump($e->getMessage());
			}
?>
