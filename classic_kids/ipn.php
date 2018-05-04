<?php session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");

$invoice=$_REQUEST["invoice"];

$currenttime = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];

$qry="INSERT INTO paypal_table (payer_id,payment_date,txn_id,first_name,last_name,payer_email,payer_status,payment_type,memo,item_name,invoice,quantity,mc_gross,mc_currency,address_name,address_street,address_city,address_state,address_zip,address_country,address_status,payer_business_name,payment_status,pending_reason,reason_code,txn_type) VALUES 
('".$_REQUEST["payer_id"]."','".$_REQUEST["payment_date"]."', '".$_REQUEST["txn_id"]."', '".$_REQUEST["first_name"]."', '".$_REQUEST["last_name"]."', '".$_REQUEST["payer_email"]."', '".$_REQUEST["payer_status"]."', '".$_REQUEST["payment_type"]."', '".$_REQUEST["memo"]."', '".$_REQUEST["item_name"]."', '".$_REQUEST["invoice"]."', '".$_REQUEST["quantity"]."', '".$_REQUEST["mc_gross"]."', '".$_REQUEST["mc_currency"]."', '".$_REQUEST["address_name"]."', '".$_REQUEST["address_street"]."', '".$_REQUEST["address_city"]."', '".$_REQUEST["address_state"]."', '".$_REQUEST["address_zip"]."', '".$_REQUEST["address_country"]."', '".$_REQUEST["address_status"]."', '".$_REQUEST["payer_business_name"]."', '".$_REQUEST["payment_status"]."', '".$_REQUEST["pending_reason"]."', '".$_REQUEST["reason_code"]."', '".$_REQUEST["txn_type"]."')";

mysql_query($qry);

if($_REQUEST["txn_id"]!="")
{
	if ($_REQUEST['payment_status']=="Completed")
	{
		$message ="your payment is completed for online shopping on Klassic Kids.";
		
		$queryupdate="update bill_master set bill_payment_status='".$_REQUEST["payment_status"]."',bill_payment_transaction_recieve_datetime='".$currenttime."',bill_payment_recieve_IP='".$ip."' where bill_invoice_no='".$invoice."'";
		mysql_query($queryupdate);
	}
	if ($_REQUEST['payment_status']=="Pending")
	{
		$message ="your payment is pending for online shopping on Klassic Kids.";
		$queryupdate="update bill_master set bill_payment_status='".$_REQUEST["payment_status"]."',bill_payment_transaction_recieve_datetime='".$currenttime."',bill_payment_recieve_IP='".$ip."' where bill_invoice_no='".$invoice."'";
		mysql_query($queryupdate);
	}
	if ($_REQUEST['payment_status']=="Failed")
	{
		$message ="your payment is transaction failed for online shopping on Klassic Kids.";
		$queryupdate="update bill_master set bill_payment_status='".$_REQUEST["payment_status"]."',bill_payment_transaction_recieve_datetime='".$currenttime."',bill_payment_recieve_IP='".$ip."' where bill_invoice_no='".$invoice."'";
		mysql_query($queryupdate);
	}	
	if ($_REQUEST['payment_status']=="Canceled")
	{
		$message ="your payment transaction is canceled for online shopping on Klassic Kids.";
		$queryupdate="update bill_master set bill_payment_status='".$_REQUEST["payment_status"]."',bill_payment_transaction_recieve_datetime='".$currenttime."',bill_payment_recieve_IP='".$ip."' where bill_invoice_no='".$invoice."'";
		mysql_query($queryupdate);
	}
	if ($_REQUEST['payment_status']=="Denied")
	{
		$message ="your payment transaction is denied for online shopping on Klassic Kids.";
		$queryupdate="update bill_master set bill_payment_status='".$_REQUEST["payment_status"]."',bill_payment_transaction_recieve_datetime='".$currenttime."',bill_payment_recieve_IP='".$ip."' where bill_invoice_no='".$invoice."'";
		mysql_query($queryupdate);
	}
	
	
	 $recordsetbill = mysql_query("select * from bill_master where bill_invoice_no='".$invoice."'",$cn);
			while($rowbill = mysql_fetch_array($recordsetbill,MYSQL_ASSOC))
            {
				$billname=$rowbill["bill_name_user"];
				$billemail=$rowbill["bill_email_id"];
				$billamount=$rowbill["bill_total_amount"];
			}
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
                       						
						Your invoice number is : '.$invoice.'.<br /><br />
						
						Billing Amount : '.$billamount.'.<br /><br />
						
						Kindly save your invoice for further references.<br />
						
						Regards,<br />
						Klassic Kids Team';
						
													
						$Subject= "Your Order @ Klassic Kids";						
							
						u_SendMail($FromMail,$ToMail,$Data,$Subject);
						
						
						$FromMail=$billname. "<".$billemail.">";
						$ToMail="info@klassickids.com";
											
						$Data= 'Dear Admin, <br /><br />
						
						New Order on Klassic Kids<br /><br />
                       						
						Order details are below.<br /><br />
						
						Name : '.$billname.',<br /><br />
						
						Payment Status : '.$_REQUEST["payment_status"].'<br /><br />
                       						
						Invoice number : '.$invoice.'.<br /><br />
						
						Billing Amount : '.$billamount.'.<br /><br />					
						
						Regards';
						
													
						$Subject= "New Order @ Klassic Kids";						
							
						u_SendMail($FromMail,$ToMail,$Data,$Subject);
?>
<link href="css/home.css" rel="stylesheet" type="text/css" />
<table width="960" border="0" cellspacing="0" cellpadding="0">  
  <tr>   
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="5" colspan="5"></td>
        </tr>
      <tr>      
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border1">
         <tr>
             <td colspan="2" height="35" align="left" valign="middle" bgcolor="#727272" style="background:url(images/tag_bg.jpg) repeat-x;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                   <td width="10"> </td>
                    <td align="left" valign="middle" class="title_black"><span class="title_white">Transaction Completed</span></td>
                  </tr>
                </table>
             </td>
          </tr>
         
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="3" cellpadding="3">
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
                <td class="font10">Klassic Kids</td>
              </tr>
            </table></td>
           
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>         
          </tr>        
         
        </table></td>     
      </tr>
      <tr>
        <td height="5" colspan="5"></td>
        </tr>
    </table></td>    
  </tr> 
</table>
<?php
unset($_SESSION['shopcart']);
unset($_SESSION['cartno']);
unset($_SESSION["totalamountorder"]);
}
else
{
echo "Sorry, Access Denied.";
}
?>