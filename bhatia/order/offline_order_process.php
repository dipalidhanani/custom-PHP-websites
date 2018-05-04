<?php
session_start();
include('../admin/config.inc.php'); 
require("../admin/Database.class.php"); 	
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
$db->connect(); 
date_default_timezone_set('Asia/Calcutta');
if($_SESSION['buserid']=='')
{ ?>
<script language="javascript">
window.location='<?php echo HTTP_BASE_URL; ?>index.php';
</script>
<?php exit; }

				$userid=$_SESSION['buserid'];
				$chequeno=$_POST['chequeno'];
				$cdate=$_POST['cdate'];
				$bankname=$_POST['bankname'];
				$paymode=$_REQUEST['paymode'];
				if($paymode==1)
				{
					$paymode='Offline';
				}
				else if($paymode==2)
				{
					$paymode='online';
				}
				else if($paymode==3)
				{
					$paymode='Cash On Delivery';
				}
				
				
			if($paymode!='')	
			{
				$column=array("Order_Date","Amount","User_Id","Pay_Mode","Ch_Draft","Ch_No","Ch_Date","Bank_Name","Order_No","Paid_Amount","Remain_Amount","IP_Address");
						
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
				
								
				$ip=$_SERVER['REMOTE_ADDR'];
				$remain_amt=$_POST['amt'];
				$amt='0.00';
				$color=$_REQUEST['color'];
				$qty=$_REQUEST['qty'];
				$cdd=$_POST['cdd'];
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
				
				$value=array($orderdate,$remain_amt,$userid,$paymode,$cdd,$chequeno,$cdate,$bankname,$order,$amt,$remain_amt,$ip);
					
				
				$db->insert("order_mst",$column,$value);
				$lastorderid=mysql_insert_id();
				
				mysql_query("update prod_order_mst set Order_Id='".$lastorderid."' where Temp=1 and User_Id='".$userid."'");
				mysql_query("update prod_order_mst set Temp=0 where User_Id='".$userid."' and Order_Id='".$lastorderid."'");				
				
				$gettxnid=mysql_query("SELECT * FROM prod_order_mst WHERE Order_Id='".$lastorderid."'");
				$txnid=mysql_fetch_array($gettxnid);
				$txnidis=$txnid['order_invoice_Id'];
				
				$billingdate='NOW()';
				$paymentmethod=$paymode;
				
					$billcolumn=array("User_Id","Order_Id","Invoice_No","Billing_Date","Bill_Amount","Remaing_Amount","PayMent_Method","Billing_Username","Billing_Address","Billing_Pincode","Billing_Country","Billing_State","Billing_City","Billing_User_email","Billing_Contact","Cust_Data","Billing_mobile");
					$billvalue=array($userid,$lastorderid,$ino,$billingdate,$remain_amt,$remain_amt,$paymentmethod,$username,$add,$pincode,$countryid,$state,$city,$mail,$contact,$cust,$mobile);
					
					
				
				$db->insert("bill_mst",$billcolumn,$billvalue);	
				
				
				//////////////////////////// Order Completion Mail  /////////////////////////////
				
				$today=date('Y-m-d');
				$orderno=mysql_fetch_array(mysql_query("select * from order_mst where User_Id='".$userid."' and Order_Date='".$today."' and Order_Id='".$lastorderid."' order by Order_No Desc,Order_Date desc limit 1")); 
							if(mysql_affected_rows()>0)
							$orderno['Order_No'];
				
				
				 /////////////// Client Mail ///////////
			if($lastorderid!='')
			{
			$ct=mysql_query("select * from user_mst where User_Id='".$orderno['User_Id']."'");			  
			$c=mysql_fetch_array($ct);
			$email=$c['Email_Address'];
			$username=$c['First_Name']." ".$c['Last_Name'];
			$order=$orderno['Order_No'];
			
		 $to=$email;
		 $subject="Order Confirmation - BHATIA Mobile";
		 $fromtitle="BHATIA Mobile";
		 $from="orders@bhatiamobile.com";
		 $mailData=$mailData."Dear ".$username.","."<br/><br/>";
		 $mailData=$mailData."Thank you for placing an order with BHATIAMOBILE.COM."."<br/><br/>";
		 $mailData=$mailData."Your <b>Order No</b> is :<b>".$order."</b><br/><br/>";
		 $mailData=$mailData."Our Order department will review and process the order manually within next 6 to 24 hours. Once processed, we will then send the order for dispatch."."<br/><br/>";
		 $mailData=$mailData."The whole process can take anywhere from 4 to 12 days."."<br/><br/>";
		 $mailData=$mailData."Please check our <a href='http://www.bhatiamobile.com/index.php?pageno=22'>Shipping Policy</a> for more information."."<br/><br/>";
		 $mailData=$mailData."Regards,"."<br/><br/>";
		 $mailData=$mailData."BHATIA Mobile"."<br/><br/>";
		 $headers = "MIME-Version: 1.0\n"; 
		 $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		 $headers .= "From: ".$fromtitle." <" .$from."> \n";
		
		mail($to,$subject,$mailData,$headers);
		
		/*echo $to."<br/><br/>";
		echo $subject."<br/><br/>";
		echo $fromtitle."<br/><br/>";
		echo $from."<br/><br/>";
		echo $mailData."<br/><br/>";
		echo $headers."<br/><br/>";*/
		//exit;
		
	//exit;
		
					/////////////admin mail send Processing ///////////////////////////
		
		 $to='';$subject='';$fromtitle='';$from='';	$mailData='';
		 $to='orders@bhatiamobile.com';
		 $subject="Order Confirmation - BHATIA Mobile";
		 $fromtitle="BHATIA Mobile";
		 $from=$email;
		 $mailData1=$mailData1."Dear BHATIA Team,"."<br/><br/>";
		 $mailData1=$mailData1." ".$username." have successfully completed the order with the following details."."<br/><br/>";
		 $mailData1=$mailData1."His/Her <b>Order No</b> is :<b>".$order."</b><br/><br/>";
		 $mailData1=$mailData1."<b>Transaction ID</b> is : <b>".$txnidis."</b><br/><br/>";
		 $mailData1=$mailData1."<b>Payment Mode</b> is  : <b>".$paymode."</b><br/><br/>";
		 $mailData1=$mailData1."Regards,"."<br/><br/>";
		 $mailData1=$mailData1."BHATIA Mobile"."<br/><br/>";
		 $headers = "MIME-Version: 1.0\n"; 
		 $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		 $headers .= "From: ".$fromtitle." <" .$from."> \n";
		
		mail($to,$subject,$mailData1,$headers);
		
		
		/*echo $to."<br/><br/>";
		echo $subject."<br/><br/>";
		echo $fromtitle."<br/><br/>";
		echo $from."<br/><br/>";
		echo $mailData1."<br/><br/>";
		echo $headers."<br/><br/>";
		exit; */ 
?>
<script language="javascript">
window.location='<?php echo HTTP_BASE_URL_ORDER; ?>index.php?pageno=9';
</script>
<?php } } else { ?>
<script language="javascript">
window.location='<?php echo HTTP_BASE_URL_ORDER; ?>index.php?pageno=7&pay=yes&msg=no';
</script>
<?php }?>

