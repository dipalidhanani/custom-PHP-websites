<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();  
	
	$is_edit=$_REQUEST['is_edit'];

	$ostatus=$_POST['ostatus'];
	$pstatus=$_POST['pstatus'];
	$ch=$_POST['ch'];
	$ch_no=$_POST['ch_no'];
	$cdate=$_POST['cdate'];
	$bank=$_POST['bank'];
	$mode=$_POST['mode'];
	
	
	if($mode=='Offline')
	{
		mysql_query("update order_mst set Order_Status='".$ostatus."',Ch_No='".$ch_no."',Ch_Date='".$cdate."',Bank_Name='".$bank."',Description='".$_POST['descr']."',Payment_Status='".$pstatus."' where Order_Id='".$is_edit."'") or die(mysql_error());
	}
	else
	{
		mysql_query("update order_mst set Order_Status='".$ostatus."',Description='".$_POST['descr']."',Payment_Status='".$pstatus."' where Order_Id='".$is_edit."'") or die(mysql_error());
	}
	
	mysql_query("update bill_mst set Status='".$pstatus."' where Order_Id='".$_REQUEST['is_edit']."'");
	
	$order=mysql_query("select * from order_mst where Order_Id='".$_REQUEST['is_edit']."'");
	$or=mysql_fetch_array($order);
	$user_is=$or['User_Id'];
	
	$cust_info=mysql_query("select * from user_mst where User_Id='".$user_is."' and Is_Active=1");
	$cu=mysql_fetch_array($cust_info);
	$email=$cu['Email_Address'];
	
	if($ostatus=='Completed')
	{
	
		 $to=$email;
		 $subject="Order Completion - BHATIA Mobile";
		 $fromtitle="BHATIA Mobile";
		 $from="orders@bhatiamobile.com";
		 $mailData=$mailData."Dear ".$cu['First_Name'].","."<br/><br/>";
		 $mailData=$mailData."Your order number : <strong>".$or['Order_No']."</strong> is completed with the following details."."<br/><br/>";
		 $mailData=$mailData."Message :".$_POST['descr']."<br/><br/>";
		 $mailData=$mailData."Payment Mode : <strong>".$or['Pay_Mode']."</strong>"."<br/><br/>";
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
		echo $headers."<br/><br/>";
		exit;*/
		
		
		//////////////// To Admin    //////////////
		
		 $to='';$subject='';$fromtitle='';$from='';	$mailData='';	 	
		 $to='orders@bhatiamobile.com';
		 $subject="Order Completion - BHATIA Mobile";
		 $fromtitle="BHATIA Mobile";
		 $from=$email;
		 $mailData=$mailData."Dear BHATIA Team,"."<br/><br/>";
		 $mailData=$mailData."Order number : <strong>".$or['Order_No']."</strong> is completed with the follwing details."."<br/><br/>";
		 $mailData=$mailData."Customer Name : ".$cu['First_Name']." "."<br/><br/>";
		 $mailData=$mailData."Message :".$_POST['descr']."<br/><br/>";
		 $mailData=$mailData."Payment Mode : <strong>".$or['Pay_Mode']."</strong>"."<br/><br/>";
		 $mailData=$mailData."Regards,"."<br/><br/>";
		 $mailData=$mailData."BHATIA Mobile"."<br/><br/>";
		 $headers = "MIME-Version: 1.0\n"; 
		 $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		 $headers .= "From: ".$fromtitle." <" .$from."> \n";
		
		mail($to,$subject,$mailData,$headers);
		
		
		
		
	}
	if($ostatus=='Cancelled')
	{
		
		 $to=$email;
		 $subject="Order Cancellation - BHATIA Mobile";
		 $fromtitle="BHATIA Mobile";
		 $from="orders@bhatiamobile.com";
		 $mailData=$mailData."Dear ".$cu['First_Name'].","."<br/><br/>";
		 $mailData=$mailData."Your order number : <strong>".$or['Order_No']."</strong> is Cancelled."."<br/><br/>";
		 $mailData=$mailData."Payment Mode : <strong>".$or['Pay_Mode']."</strong>"."<br/><br/>";
		 $mailData=$mailData."Reason :".$_POST['descr']."<br/><br/>";
		 $mailData=$mailData."Regards,"."<br/><br/>";
		 $mailData=$mailData."BHATIA Mobile"."<br/><br/>";
		 $headers = "MIME-Version: 1.0\n"; 
		 $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		 $headers .= "From: ".$fromtitle." <" .$from."> \n";
		
		mail($to,$subject,$mailData,$headers);
		
		////////////////// Admin Mail //////////////////////
		
		 $to='';$subject='';$fromtitle='';$from='';	$mailData='';	
		 $to='orders@bhatiamobile.com';
		 $subject="Order Cancellation - BHATIA Mobile";
		 $fromtitle="BHATIA Mobile";
		 $from=$email;
		 $mailData=$mailData."Dear BHATIA Team,"."<br/><br/>";
		 $mailData=$mailData."Order number : <strong>".$or['Order_No']."</strong> is Cancelled.Order details are as follows,"."<br/><br/>";
		 $mailData=$mailData."Customer Name : ".$cu['First_Name']." "."<br/><br/>";
		 $mailData=$mailData."Payment Mode : <strong>".$or['Pay_Mode']."</strong>"."<br/><br/>";
		 $mailData=$mailData."Reason :".$_POST['descr']."<br/><br/>";
		 $mailData=$mailData."Regards,"."<br/><br/>";
		 $mailData=$mailData."BHATIA Mobile"."<br/><br/>";
		 $headers = "MIME-Version: 1.0\n"; 
		 $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		 $headers .= "From: ".$fromtitle." <" .$from."> \n";
		
		mail($to,$subject,$mailData,$headers);
		
		
	}
	
	if($ostatus=='In Shipping')
	{
		
		 $to=$email;
		 $subject="Your order with BHATIA Mobile has been shipped";
		 $fromtitle="BHATIA Mobile";
		 $from="orders@bhatiamobile.com";
		 $mailData=$mailData."Dear ".$cu['First_Name'].","."<br/><br/>";
		 $mailData=$mailData."Your order with BHATIA Mobile has been processed and shipped.Here are the tracking details:"."<br/><br/>";
		 $mailData=$mailData."Your order number : <strong>".$or['Order_No']."</strong>"."<br/><br/>";
		 $mailData=$mailData."Payment Mode : <strong>".$or['Pay_Mode']."</strong>"."<br/><br/>";
		 $mailData=$mailData.$_POST['descr']."<br/><br/>";
		 $mailData=$mailData."Regards,"."<br/><br/>";
		 $mailData=$mailData."BHATIA Mobile"."<br/><br/>";
		 $headers = "MIME-Version: 1.0\n"; 
		 $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		 $headers .= "From: ".$fromtitle." <" .$from."> \n";
		
		mail($to,$subject,$mailData,$headers);
		
		////////////////// Admin Mail //////////////////////
		
		 $to='';$subject='';$fromtitle='';$from='';	$mailData='';	
		 $to='orders@bhatiamobile.com';
		 $subject="Order shipped - BHATIA Mobile";
		 $fromtitle="BHATIA Mobile";
		 $from=$email;
		 $mailData=$mailData."Dear BHATIA Team,"."<br/><br/>";
		 $mailData=$mailData."Order number : <strong>".$or['Order_No']."</strong> is shipped.Order details are as follows,"."<br/><br/>";
		 $mailData=$mailData."Customer Name : ".$cu['First_Name']." "."<br/><br/>";
		 $mailData=$mailData."Payment Mode : <strong>".$or['Pay_Mode']."</strong>"."<br/><br/>";
		 $mailData=$mailData.$_POST['descr']."<br/><br/>";
		 $mailData=$mailData."Regards,"."<br/><br/>";
		 $mailData=$mailData."BHATIA Mobile"."<br/><br/>";
		 $headers = "MIME-Version: 1.0\n"; 
		 $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		 $headers .= "From: ".$fromtitle." <" .$from."> \n";
		
		mail($to,$subject,$mailData,$headers);
		
		
	}
		
		
		
		
	
	
	
?>	
<script language="javascript">
window.location='order.php';
</script>