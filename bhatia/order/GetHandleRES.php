<?php
session_start();
require_once("../admin/config.inc.php");
require_once("../admin/Database.class.php");
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
$db->connect();
/*
******************************************************************
			* COMPANY    - FSS Pvt. Ltd.
*****************************************************************

Name of the Program : Hosted UMI Sample Pages
Page Description    : Receives response from Payment Gateway and handles the same
Response parameters : Result,Ref,Transaction id, Payment id,Auth Code, Track ID,
                      Amount, UDF1-UDF5
Values from Session : No
Values to Session   : No
Created by          : FSS Payment Gateway Team
Created On          : 19-04-2011
Version             : Version 2.0

***************************************************************** 
*/
/* Disclaimer:- Important Note in Sample Pages
- This is a sample demonstration page only ment for demonstration, this page should not be used in production
- Transaction data should only be accepted once from a browser at the point of input, and then kept in a way that does not allow others to modify it (example server session, database  etc.)
- Any transaction information displayed to a customer, such as amount, should be passed only as display information and the actual transactional data should be retrieved from the secure source last thing at the point of processing the transaction.
- Any information passed through the customer's browser can potentially be modified/edited/changed/deleted by the customer, or even by third parties to fraudulently alter the transaction data/information. Therefore, all transaction information should not be passed through the browser to Payment Gateway in a way that could potentially be modified (example hidden form fields). 
*/

/* Capture the IP Address from where the response has been received */
$strResponseIPAdd = getenv('REMOTE_ADDR');

/* Check whether the IP Address from where response is received is PG IP */
if($strResponseIPAdd == "221.134.101.174" || $strResponseIPAdd == "221.134.101.169" || $strResponseIPAdd == "198.64.129.10" || $strResponseIPAdd == "198.64.133.213")
{

	$ErrorTx = isset($_POST['Error']) ? $_POST['Error'] : '';               //Error Number
	$ErrorResult = isset($_POST['ErrorText']) ? $_POST['ErrorText'] : '';   //Error message
	$payID = isset($_POST['paymentid']) ? $_POST['paymentid'] : '';			//Payment Id
	$METRANID = isset($_POST['trackid'])?$_POST['trackid']:'';              //Merchant Track ID

	$recordsetchecktransid = mysql_query("select * from prod_order_mst 
	INNER JOIN order_mst ON order_mst.Order_Id=prod_order_mst.Order_Id
	where order_invoice_Id='".$METRANID."' and order_payment_ID='".$payID."'");
	
	
	while($rowgetamount = mysql_fetch_array($recordsetchecktransid,MYSQL_ASSOC))
	{
	 		$thisorderamount=$rowgetamount['Amount'];
	}
	
	
	if(mysql_num_rows($recordsetchecktransid)==0)
	{
			$REDIRECT = 'REDIRECT=https://order.bhatiamobile.com/FailedTRAN.php?message=ERROR IN PROCESSING PAYMENT ('.$ErrorResult.' )&ME_TX_ID='.$METRANID.'&result='.$getTxnResult;
			echo $REDIRECT;
	}
		
	/* Merchant (ME) checks, if error number is NOT present, then create Dual Verification 
	request, send to Paymnent Gateway. ME SHOULD ONLY USE PAYMENT GATEWAY TRAN ID FOR DUAL
	VERIFICATION */
    /* NOTE - MERCHANT MUST LOG THE RESPONSE RECEIVED IN LOGS AS PER BEST PRACTICE */

	if ($ErrorTx == '')
		{
			//To collect transaction result
			$txmessage = isset($_POST['result']) ? $_POST['result'] : '';

            //To collect Payment Gateway Transaction ID, this value will be used in dual verification request
			$pgtxnid = isset($_POST['tranid']) ? $_POST['tranid'] : '';     

			//To collect Merchant Track ID
			$txmeid = isset($_POST['trackid']) ? $_POST['trackid'] : '';

			//To collect amount from response
			$txamount = isset($_POST['amt'])?$_POST['amt']:'';   
		
			if($txamount!=$thisorderamount)
			{
					$REDIRECT = 'REDIRECT=https://order.bhatiamobile.com/FailedTRAN.php?message=ERROR IN PROCESSING PAYMENT ('.$ErrorResult.' )&ME_TX_ID='.$METRANID.'&result='.$getTxnResult.'&orderamount='.$thisorderamount.'&paidamount='.$txamount;
					echo $REDIRECT;
							
			}           
            
			//check result is captured or approved i.e. successful
			if ($txmessage == 'CAPTURED' || $txmessage == 'APPROVED')
			{
			   //result is successful, hence create dual verification request

			   //ID given by bank to Merchant (Tranportal ID), same iD that was passed in initial request
			   $TranportalID = "<id>90002379</id>";

			   //Password given by bank to merchant (Tranportal Password), same password that was passed in initial request
               $TranportalPWD = "<password>password1</password>";

			   // Pass DUAL VERIFICATION action code, always pass "8" for DUAL VERIFICATION
			   $straction = "<action>8</action>";

			   //Pass PG Transaction ID for Dual Verification
			   $reqpgtxnid = "<transid>".$pgtxnid."</transid>";
			
			   //create string for request of input parameters
			   $ReqString = $TranportalID.$TranportalPWD.$straction.$reqpgtxnid;
			   
			   //DUAL VERIFIACTION URL, this is test environment URL, contact bank for production DUAL Verification URL
			   $DualReqURL = "https://securepgtest.fssnet.co.in/pgway/servlet/TranPortalXMLServlet";
			   
			   //PHP FUNCTION for connection and posting the request ..starts here
			   $dvreq = curl_init() or die(curl_error()); 
			   curl_setopt($dvreq, CURLOPT_POST,1); 
			   curl_setopt($dvreq, CURLOPT_POSTFIELDS,$ReqString); 
			   curl_setopt($dvreq, CURLOPT_URL,$DualReqURL); 
			   curl_setopt($dvreq, CURLOPT_PORT, 443);
			   curl_setopt($dvreq, CURLOPT_RETURNTRANSFER, 1); 
			   curl_setopt($dvreq, CURLOPT_SSL_VERIFYHOST,0); 
			   curl_setopt($dvreq, CURLOPT_SSL_VERIFYPEER,0); 
			   $dataret=curl_exec($dvreq) or die(curl_error());
			   curl_close($dvreq); 
  			   //PHP FUNCTION for connection and posting the request ..ends here

			   //XML response received for DUAL VERIFICATION.
			   /* 
			   NOTE - MERCHANT MUST LOG THE RESPONSE RECEIVED IN LOGS AS PER BEST PRACTICE
			   */
			   $DVresponse = $dataret;
			   //print_r $DVresponse;
			   $GEnXMLForm="<xmltg>".$DVresponse."</xmltg>";
			   $xmlSTR = simplexml_load_string( $GEnXMLForm,null,true);
               
			   //Collect DUAL VERIFICATION RESULT
			   $getTxnResult = $xmlSTR-> result;
               
			   //If DUAL VERIFICATION RESULT is CAPTURED or APPROVED
			   if ($getTxnResult == 'CAPTURED' || $getTxnResult == 'APPROVED')
				{
				  //collecting all mandatory parameters to update merchant database
				  $getTxnResult = $xmlSTR->result; //It will give Inquiry Result.
				  $getTxnAvr = $xmlSTR->avr; //It will give AVR value.
                  $getTxnPostDate = $xmlSTR->postdate; //It will give transaction date.

			      $getTxnAuthCode = $xmlSTR->auth; //It will give Auth Code.
                  $getTxnTrackID=$xmlSTR->trackid; //It will give Merchant TrackID/Merchant Reference NO
                  $getTxnTranid=$xmlSTR->tranid; //It will give TransactionID
                  $getTxnAmt=$xmlSTR->amt; //It will give Transaction Amount
			      $getTxnPaymentId=$xmlSTR->paymentid; //It will give PaymentID
			      $getTxnRefID = $xmlSTR->ref; //It will give Ref.NO.
                  $getUDF1 = $xmlSTR->udf1;    //It will give udf1
			      $getUDF1 = $xmlSTR->udf2;    //It will give udf2
			      $getUDF1 = $xmlSTR->udf3;	   //It will give udf3
			      $getUDF1 = $xmlSTR->udf4;	   //It will give udf4
			      $getUDF1 = $xmlSTR->udf5;	   //It will give udf5
				  /*
				  IMPORTANT NOTE - MERCHANT DOES RESPONSE HANDLING AND VALIDATIONS OF 
				  TRACK ID, AMOUNT AT THIS PLACE. THEN ONLY MERCHANT SHOULD UPDATE 
				  TRANACTION PAYMENT STATUS IN MERCHANT DATABASE AT THIS POSITION 
				  AND THEN REDIRECT CUSTOMER ON RESULT PAGE
				  */

				  
		/* !!IMPORTANT INFORMATION!!
        During redirection, ME can pass the values as per ME requirement.
		NOTE: NO PROCESSING should be done on the RESULT PAGE basis of values passed in the RESULT PAGE from this page. 
		ME does all validations on the responseURL page and then redirects the customer to RESULT 
		PAGE ONLY FOR RECEIPT PRESENTATION/TRANSACTION STATUS CONFIRMATION
		For demonstration purpose the result and track id are passed to Result page
		*/
				 $recordsetorder = mysql_query("select * from prod_order_mst where order_invoice_Id='".$txmeid."'");
					 while($roworder = mysql_fetch_array($recordsetorder,MYSQL_ASSOC))
					 {
					 		$lastorderid=$roworder['Order_Id'];
							$userid=$roworder['User_Id'];
					 }				

					$remain_amt=0.00;
					$payment_st='Completed';
					
					$queryupdate="update order_mst set Remain_Amount='".$remain_amt."',Payment_Status='".$payment_st."',Payment_Provider_Response_Status='".$getTxnResult."' where Order_Id='".$lastorderid."' ";
					mysql_query($queryupdate);
				
				
					
				//////////////////////////// Order Confirmmation Mail  /////////////////////////////
				
				$today=date('Y-m-d');

				$orderno=mysql_fetch_array(mysql_query("select * from order_mst where User_Id='".$userid."' and Order_Date='".$today."' and Order_Id='".$lastorderid."' order by Order_No Desc limit 1")) or die(mysql_error()); 
				if(mysql_affected_rows()>0)
				{
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
						 $mailData=$mailData."<font size='2' face='Arial'>";
						 $mailData=$mailData."Dear ".$username.","."<br/><br/>";
						 $mailData=$mailData."Thank you for placing an order with BHATIAMOBILE.COM."."<br/><br/>";
						 $mailData=$mailData."Your order number is : <b>".$order."</b><br/><br/>";
						 $mailData=$mailData."Your order transaction ID is : <b>".$txmeid."</b><br/><br/>";
						 $mailData=$mailData."Our Order department will review and process the order manually within next 6 to 24 hours. Once processed, we will then send the order for dispatch."."<br/><br/>";
						 $mailData=$mailData."The whole process can take anywhere from 4 to 12 days."."<br/><br/>";
						  $mailData=$mailData."Please check our <a href='http://www.bhatiamobile.com/index.php?pageno=22'>Shipping Policy</a> for more information."."<br/><br/>";
						 $mailData=$mailData."Regards,"."<br/><br/>";
						 $mailData=$mailData."BHATIA Mobile"."<br/><br/>";
						 $mailData=$mailData."</font>";
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
						 $mailData1=$mailData1." ".$username." have successfully completed order payment."."<br/><br/>";
						 $mailData1=$mailData1."<b>Order No</b> is : <b>".$order."</b><br/><br/>";
						 $mailData1=$mailData1."<b>Transaction ID</b> is : <b>".$txmeid."</b><br/><br/>";
						 $mailData1=$mailData1."<b>Payment Mode </b> is : <b>Online (HDFC)</b><br/><br/>";
						 $mailData1=$mailData1."Regards,"."<br/><br/>";
						 $mailData1=$mailData1."BHATIA Mobile"."<br/><br/>";
						 $headers = "MIME-Version: 1.0\n"; 
						 $headers .= "Content-type: text/html; charset=iso-8859-1\n";
						 $headers .= "From: ".$fromtitle." <" .$from."> \n";
		
		          mail($to,$subject,$mailData1,$headers);
				}
		          $REDIRECT = 'REDIRECT=https://order.bhatiamobile.com/StatusTRAN.php?message=PAYMENT SUCESSFUL'.'&ME_TX_ID='.$getTxnTrackID.'&result='.$getTxnResult;
			      echo $REDIRECT;
				  
				}
				else
				{
				  /*
				  IMPORTANT NOTE - MERCHANT SHOULD UPDATE 
				  TRANACTION PAYMENT STATUS IN MERCHANT DATABASE AT THIS POSITION 
				  AND THEN REDIRECT CUSTOMER ON RESULT PAGE
				  */
					$REDIRECT = 'REDIRECT=https://order.bhatiamobile.com/FailedTRAN.php?message=ERROR - PAYMENT FAILED IN DUAL VERIFICATION ('.$getTxnResult.' )&ME_TX_ID='.$txmeid.'&result='.$getTxnResult;
					echo $REDIRECT;
				
				}

			}
			else
			{

				/*
				IMPORTANT NOTE - MERCHANT SHOULD UPDATE 
				TRANACTION PAYMENT STATUS IN MERCHANT DATABASE AT THIS POSITION 
				AND THEN REDIRECT CUSTOMER ON RESULT PAGE
				*/
				$REDIRECT = 'REDIRECT=https://order.bhatiamobile.com/FailedTRAN.php?message=PAYMENT FAILED ('.$txmessage.' )&ME_TX_ID='.$txmeid.'&result='.$getTxnResult;
				echo $REDIRECT;
				
			}



		//echo $REDIRECT;
	}
	else 
	{
				/*
				ERROR IN TRANSACTION PROCESSING
				IMPORTANT NOTE - MERCHANT SHOULD UPDATE 
				TRANACTION PAYMENT STATUS IN MERCHANT DATABASE AT THIS POSITION 
				AND THEN REDIRECT CUSTOMER ON RESULT PAGE
				*/ 

				$REDIRECT = 'REDIRECT=https://order.bhatiamobile.com/FailedTRAN.php?message=ERROR IN PROCESSING PAYMENT ('.$ErrorResult.' )&ME_TX_ID='.$METRANID.'&result='.$getTxnResult;
				echo $REDIRECT;
	}


}


else //IF ip address recevied is not Payment Gateway IP Address
{
			/*
			IMPORTAN NOTE - IF IP ADDRESS MISMATCHES, ME LOGS DETAILS IN LOGS,
			UPDATES MERCHANT DATABASE WITH PAYMENT FAILURE, REDIRECTS CUSTOMER 
			ON FAILURE PAGE WITH RESPECTIVE MESSAGE
			*/
			header("Location:https://order.bhatiamobile.com/FailedTRAN.php?message=IP ADDRESS MISMATCH&result=".$getTxnResult);
			exit();
}

/*
<!-- 
to get the IP Address in case of proxy server used
function getIPfromXForwarded() { 
$ipString=@getenv("HTTP_X_FORWARDED_FOR"); 
$addr = explode(",",$ipString); 
return $addr[sizeof($addr)-1]; 
} 
 
*/
?>


