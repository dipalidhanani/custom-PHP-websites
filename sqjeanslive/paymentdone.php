<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>

<?php
$invoice=$_REQUEST["invoiceno"];

$currenttime = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];

if($_REQUEST["paymenttype"]==1)
{
	$paymentmethod="Net Banking";
	$bankname=$_REQUEST["netbankingname"];
}
elseif($_REQUEST["paymenttype"]==2)
{
	$paymentmethod="Cheque";
	$bankname=$_REQUEST["chequebankname"];
	$cddate=$_REQUEST["chequedate"];
	$cdnumber=$_REQUEST["chequenumber"];
}
elseif($_REQUEST["paymenttype"]==3)
{
	$paymentmethod="Cash";
}
elseif($_REQUEST["paymenttype"]==4)
{
	$paymentmethod="Demand Draft";
	$bankname=$_REQUEST["demanddraftbankname"];
	$cddate=$_REQUEST["demanddraftdate"];
	$cdnumber=$_REQUEST["demanddraftnumber"];
}
	$message ="Thank you for your order on SQ Jeans.";
		
		
$cddate=explode("-",$cddate);
$cddate=$cddate[2]."-".$cddate[1]."-".$cddate[0];

			$recordsetbill = mysql_query("select * from bill_master where bill_invoice_no='".$invoice."'",$cn);
			while($rowbill = mysql_fetch_array($recordsetbill,MYSQL_ASSOC))
            {
				$billmasterid=$rowbill["bill_master_ID"];
				$billname=$rowbill["bill_name_user"];
				$billemail=$rowbill["bill_email_id"];
				$billamount=$rowbill["bill_final_amount"];
				$useddiscountcode=$rowbill["bill_used_discount_code"];
				$checkpaymenttype=$rowbill["bill_payment_type"];
			}
			
			if($checkpaymenttype!=0)
			{
				session_destroy();
				echo "<script type=\"text/javascript\">document.location.href='offlinepaymentdone.html'; </script>\n";
			}		
		
		$queryupdate="update bill_master set bill_payment_status='Pending',bill_payment_transaction_recieve_datetime='".$currenttime."',bill_payment_recieve_IP='".$ip."',bill_payment_type='".$_REQUEST["paymenttype"]."',bill_payment_bank_name='".$bankname."',bill_payment_cheque_dd_number='".$cdnumber."',bill_payment_cheque_dd_date='".$cddate."' where bill_invoice_no='".$invoice."'";
		mysql_query($queryupdate);
	
	
	 		
			
			$querycode="update discount_master set discount_code_active=1 where discount_code='".$useddiscountcode."'";
			mysql_query($querycode);
			
						
			
				 
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
						
						$FromMail="SQ Jeans <info@sqjeans.com>";
						$ToMail=$billemail;
											
						$Data= 'Dear '.$billname.',<br /><br />
						
						'.$message.'<br /><br />
                       						
						Your invoice number is : '.$invoice.'<br /><br />
						
						Billing Amount : '.$billamount.'<br /><br />
						
						We will update you once your payment has been cleared.<br />
						
						Kindly save your invoice for further references.<br />
						
						Regards,<br />
						SQ Jeans
						';
						
													
						$Subject= "Your Order @ SQ Jeans";						
							
						u_SendMail($FromMail,$ToMail,$Data,$Subject);
						
						
						$FromMail=$billname. "<".$billemail.">";
						$ToMail="info@sqjeans.com";
											
						$Data= 'Dear Admin, <br /><br />
						
						You have a new order on www.sqjeans.com<br /><br />
                       						
						Order details are below.<br /><br />
						
						Client Name : '.$billname.',<br /><br />
						
						Amount : '.$billamount.'<br /><br />
						
						Invoice number : '.$invoice.'<br /><br />
						
						Payment Method : '.$paymentmethod.'<br /><br />
						
						Regards,<br/>
						Development Team
						';
						
													
						$Subject= "New Order @ SQ Jeans";						
							
						u_SendMail($FromMail,$ToMail,$Data,$Subject);
						


	unset($_SESSION['sqjeanscart']);
	unset($_SESSION['cartno']);
	unset($_SESSION['selectedmaterialid']);
	unset($_SESSION['selectedspecialwash']);
	unset($_SESSION['selectedthread_main']);
	unset($_SESSION['selectedthread_second']);
	unset($_SESSION['selectedprocketstyle']);
	unset($_SESSION['selectedprocketstyle_back']);
	unset($_SESSION['selectedflystyle']);

$_SESSION['currentpaidinvoice']=$invoice;



echo "<script type=\"text/javascript\">document.location.href='offlinepaymentdone.html'; </script>\n";
			
?>
