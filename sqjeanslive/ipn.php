<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");


$invoice=$_REQUEST["invoice"];

$currenttime = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];

/*$qry="INSERT INTO paypal_table (payer_id,payment_date,txn_id,first_name,last_name,payer_email,payer_status,payment_type,memo,item_name,invoice,quantity,mc_gross,mc_currency,address_name,address_street,address_city,address_state,address_zip,address_country,address_status,payer_business_name,payment_status,pending_reason,reason_code,txn_type) VALUES 
('".$_REQUEST["payer_id"]."','".$_REQUEST["payment_date"]."', '".$_REQUEST["txn_id"]."', '".$_REQUEST["first_name"]."', '".$_REQUEST["last_name"]."', '".$_REQUEST["payer_email"]."', '".$_REQUEST["payer_status"]."', '".$_REQUEST["payment_type"]."', '".$_REQUEST["memo"]."', '".$_REQUEST["item_name"]."', '".$_REQUEST["invoice"]."', '".$_REQUEST["quantity"]."', '".$_REQUEST["mc_gross"]."', '".$_REQUEST["mc_currency"]."', '".$_REQUEST["address_name"]."', '".$_REQUEST["address_street"]."', '".$_REQUEST["address_city"]."', '".$_REQUEST["address_state"]."', '".$_REQUEST["address_zip"]."', '".$_REQUEST["address_country"]."', '".$_REQUEST["address_status"]."', '".$_REQUEST["payer_business_name"]."', '".$_REQUEST["payment_status"]."', '".$_REQUEST["pending_reason"]."', '".$_REQUEST["reason_code"]."', '".$_REQUEST["txn_type"]."')";

mysql_query($qry);

	if ($_REQUEST['payment_status']=="Completed")
	{
		$message ="Your payment is completed for your order SQ Jeans.";
		
		$queryupdate="update bill_master set bill_payment_status='".$_REQUEST["payment_status"]."',bill_payment_transaction_recieve_datetime='".$currenttime."',bill_payment_recieve_IP='".$ip."' where bill_invoice_no='".$invoice."'";
		mysql_query($queryupdate);
	}
	if ($_REQUEST['payment_status']=="Pending")
	{
		$message ="Your payment is pending for your order SQ Jeans.";
		$queryupdate="update bill_master set bill_payment_status='".$_REQUEST["payment_status"]."',bill_payment_transaction_recieve_datetime='".$currenttime."',bill_payment_recieve_IP='".$ip."' where bill_invoice_no='".$invoice."'";
		mysql_query($queryupdate);
	}
	if ($_REQUEST['payment_status']=="Failed")
	{
		$message ="Your payment transaction is failed for your order SQ Jeans.";
		$queryupdate="update bill_master set bill_payment_status='".$_REQUEST["payment_status"]."',bill_payment_transaction_recieve_datetime='".$currenttime."',bill_payment_recieve_IP='".$ip."' where bill_invoice_no='".$invoice."'";
		mysql_query($queryupdate);
	}	
	if ($_REQUEST['payment_status']=="Canceled")
	{
		$message ="Your payment transaction is canceled for your order SQ Jeans.";
		$queryupdate="update bill_master set bill_payment_status='".$_REQUEST["payment_status"]."',bill_payment_transaction_recieve_datetime='".$currenttime."',bill_payment_recieve_IP='".$ip."' where bill_invoice_no='".$invoice."'";
		mysql_query($queryupdate);
	}
	if ($_REQUEST['payment_status']=="Denied")
	{
		$message ="Your payment transaction is denied for your order SQ Jeans.";
		$queryupdate="update bill_master set bill_payment_status='".$_REQUEST["payment_status"]."',bill_payment_transaction_recieve_datetime='".$currenttime."',bill_payment_recieve_IP='".$ip."' where bill_invoice_no='".$invoice."'";
		mysql_query($queryupdate);
	}
	
	
	 		$recordsetbill = mysql_query("select * from bill_master where bill_invoice_no='".$invoice."'",$cn);
			while($rowbill = mysql_fetch_array($recordsetbill,MYSQL_ASSOC))
            {
				$billmasterid=$rowbill["bill_master_ID"];
				$billname=$rowbill["bill_name_user"];
				$billemail=$rowbill["bill_email_id"];
				$billamount=$rowbill["bill_final_amount"];
				$useddiscountcode=$rowbill["bill_used_discount_code"];
			}
			
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
						
						Payment Status : Check your Paypal<br /><br />
						
						Regards,<br/>
						Development Team
						';
						
													
						$Subject= "New Order @ SQ Jeans";						
							
						u_SendMail($FromMail,$ToMail,$Data,$Subject);*/


	unset($_SESSION['sqjeanscart']);
	unset($_SESSION['cartno']);
	unset($_SESSION['selectedmaterialid']);
	unset($_SESSION['selectedspecialwash']);
	unset($_SESSION['selectedthread_main']);
	unset($_SESSION['selectedthread_second']);
	unset($_SESSION['selectedprocketstyle']);
	unset($_SESSION['selectedprocketstyle_back']);
	unset($_SESSION['selectedflystyle']);

if($_REQUEST["txn_id"]!="")
{
	if ($_REQUEST['payment_status']=="Completed")
	{
		$message ="Your payment is completed for your order on SQ Jeans.";
	}
	if ($_REQUEST['payment_status']=="Pending")
	{
		$message ="Your payment is pending for your order on SQ Jeans.";		
	}
	if ($_REQUEST['payment_status']=="Failed")
	{
		$message ="Your payment transaction is failed for your order on SQ Jeans.";		
	}	
	if ($_REQUEST['payment_status']=="Canceled")
	{
		$message ="Your payment transaction is canceled for your order on SQ Jeans.";
	}
	if ($_REQUEST['payment_status']=="Denied")
	{
		$message ="Your payment transaction is denied for your order on SQ Jeans.";		
	}
	
?>
<link href="css/home.css" rel="stylesheet" type="text/css" />
<table width="100%" border="0"  background="images/pgbg02a.jpg" background="repeat;" cellspacing="0" cellpadding="0">

  <tr>
    <td width="10">&nbsp;</td>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td class="titel_2"><strong>Order Completed</strong></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="3" cellpadding="3">
              <tr>
                <td class="font10"><?php echo $message;?></td>
              </tr>
              <tr>
                <td class="font10">Your invoice number is : <?php echo $invoice;?></td>
              </tr>
              <tr>
                <td class="font10">Kindly save your invoice for further references.</td>
              </tr>
              <tr>
                <td class="font10">Thanks,</td>
              </tr>
              <tr>
                <td class="font10">SQ Jeans</td>
              </tr>
</table></td>
  </tr>
</table>

    </td>
    <td width="10">&nbsp;</td>
  </tr>

</table>
<?php
$alreadyloginid=$_SESSION['sqjeansloginuserid'];
$alreadyloginemail=$_SESSION['sqjeansloginuseremail'];
}
else
{
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td width="10">&nbsp;</td>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td class="titel_2">Sorry, Access Denied</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="3" cellpadding="3">
              <tr>
                <td class="font10">You are trying to entering in secured area.</td>
              </tr>
              <tr>
                <td class="font10">Thanks,</td>
              </tr>
              <tr>
                <td class="font10">SQ Jeans</td>
              </tr>
</table></td>
  </tr>
</table>

    </td>
    <td width="10">&nbsp;</td>
  </tr>

</table>
<?php
}
?>