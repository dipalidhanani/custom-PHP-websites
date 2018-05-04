<?php
session_start();
require_once("../admin/config.inc.php");
require_once("../admin/Database.class.php");
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
$db->connect();
	
$strMessage =  isset($_GET['message']) ? $_GET['message'] : '';
$strMTRCKID =  isset($_GET['ME_TX_ID']) ? $_GET['ME_TX_ID'] : '';
$result= isset($_GET['result']) ? $_GET['result'] : '';

$_SESSION["hdfc_payment_failed_message"]=$strMessage;
$_SESSION["hdfc_payment_failed_transactionid"]=$strMTRCKID;
$_SESSION["hdfc_payment_result"]=$result;

$userid=$_SESSION['buserid'];
				
			
$getorderid=mysql_query("select * from prod_order_mst where order_invoice_Id='".$strMTRCKID."'");
$oid=mysql_fetch_array($getorderid);
if(mysql_num_rows($getorderid)!=0)
{					
					$lastorderid=$oid['Order_Id'];

					$payment_st='Failed';
					
					$queryupdate="update order_mst set Payment_Status='".$payment_st."' where Order_Id='".$lastorderid."' ";
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
						 $subject="Order Transaction Failed";
						 $fromtitle="BHATIA Mobile";
						 $from="orders@bhatiamobile.com";
						 $mailData=$mailData."<font size='2' face='Arial'>";
						 $mailData=$mailData."Dear ".$username.","."<br/><br/>";
						 $mailData=$mailData."Your Order Transaction is failed because of ".$strMessage." with BHATIAMOBILE.COM."."<br/><br/>";
						 $mailData=$mailData."Your order number is : <b>".$order."</b><br/><br/>";
						 $mailData=$mailData."Your order transaction ID is : <b>".$strMTRCKID."</b><br/><br/>";
						 $mailData=$mailData."<a href='http://www.bhatiamobile.com/index.php?pageno=10'>Contact us</a>if you are enable to proceed to payment."."<br/><br/>";		
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
						 $subject="Order Transaction Failed";
						 $fromtitle="BHATIA Mobile";
						 $from=$email;
						  $mailData1=$mailData1."Dear Bhatia Team,"."<br/><br/>";
						 $mailData1=$mailData1." ".$username."'s order transaction is failed because of ".$strMessage." with BHATIAMOBILE.COM."."<br/><br/>";
						 $mailData1=$mailData1."<b>Order No</b> is : <b>".$order."</b><br/><br/>";
						 $mailData1=$mailData1."<b>Transaction ID</b> is : <b>".$strMTRCKID."</b><br/><br/>";
						 $mailData1=$mailData1."Regards,"."<br/><br/>";
						 $mailData1=$mailData1."BHATIA Mobile"."<br/><br/>";
						 $headers = "MIME-Version: 1.0\n"; 
						 $headers .= "Content-type: text/html; charset=iso-8859-1\n";
						 $headers .= "From: ".$fromtitle." <" .$from."> \n";
						
						 mail($to,$subject,$mailData1,$headers);
		}
}
echo "<script type=\"text/javascript\">document.location.href='index.php?pageno=27'; </script>\n";
exit();
?>
