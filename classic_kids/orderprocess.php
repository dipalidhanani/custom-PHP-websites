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

if($_REQUEST["paymenttype"]==2)
{
	$paymentmethod="Cheque";
	$bankname=$_REQUEST["chequebankname"];
	$cddate=$_REQUEST["chequedate"];
	$cdnumber=$_REQUEST["chequenumber"];
}
elseif($_REQUEST["paymenttype"]==3)
{
	$paymentmethod="Cash on Delievery";
}

$message ="Thank you for your order on Klassic Kids";
		
		
$cddate=explode("-",$cddate);
$cddate=$cddate[2]."-".$cddate[1]."-".$cddate[0];

			$recordsetbill = mysql_query("select * from bill_master where bill_invoice_no='".$invoice."'",$cn);
			while($rowbill = mysql_fetch_array($recordsetbill,MYSQL_ASSOC))
            {
				$billmasterid=$rowbill["bill_master_ID"];
				$billname=$rowbill["bill_name_user"];
				$billemail=$rowbill["bill_email_id"];
				$billamount=$rowbill["bill_final_amount"];
				$checkpaymenttype=$rowbill["bill_payment_type"];
			}
			
			if(($checkpaymenttype==2) || ($checkpaymenttype==3))
			{
				session_destroy();
				echo "<script type=\"text/javascript\">document.location.href='index.php'; </script>\n";
			}		
		
		$queryupdate="update bill_master set bill_payment_status='Pending',bill_payment_transaction_recieve_datetime='".$currenttime."',bill_payment_recieve_IP='".$ip."',bill_payment_type='".$_REQUEST["paymenttype"]."',bill_payment_bank_name='".$bankname."',bill_payment_cheque_dd_number='".$cdnumber."',bill_payment_cheque_dd_date='".$cddate."' where bill_invoice_no='".$invoice."'";
		mysql_query($queryupdate);
	
					 
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
						$ToMail=$billemail;
											
						$Data= 'Dear '.$billname.',<br /><br />
						
						'.$message.'<br /><br />
                       						
						Your invoice number is : '.$invoice.'<br /><br />
						
						Billing Amount : '.$billamount.'<br /><br />
						
						Kindly save your invoice for further references.<br />
						
						Regards,<br />
						Klassic Kids
						';
						
													
						$Subject= "Your Order @ Klassic Kids";						
							
						u_SendMail($FromMail,$ToMail,$Data,$Subject);
						
						
						$FromMail=$billname. "<".$billemail.">";
						$ToMail="info@klassickids.com";
											
						$Data= 'Dear Admin, <br /><br />
						
						You have a new order on www.klassickids.com<br /><br />
                       						
						Order details are below.<br /><br />
						
						Client Name : '.$billname.',<br /><br />
						
						Amount : '.$billamount.'<br /><br />
						
						Invoice number : '.$invoice.'<br /><br />
						
						Payment Method : '.$paymentmethod.'<br /><br />
						
						Regards,<br/>
						Development Team
						';
						
													
						$Subject= "New Order @ Klassic Kids";						
							
						u_SendMail($FromMail,$ToMail,$Data,$Subject);
						


	unset($_SESSION['shopcart']);
	unset($_SESSION['cartno']);
	unset($_SESSION["totalamountorder"]);

echo "<script type=\"text/javascript\">document.location.href='index.php?content=5&msg=order'; </script>\n";
			
?>
