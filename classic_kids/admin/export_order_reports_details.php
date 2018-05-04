<?php
session_start();
include("include/config.php");
require_once("include/function.php");
u_Connect("cn");

 ///////Company////////////////////////////

function escape_csv_value($value) {
	$value = str_replace('"', '""', $value); // First off escape all " and make them ""
	if(preg_match('/,/', $value) or preg_match("/\n/", $value) or preg_match('/"/', $value)) { // Check if I have any commas or new lines
		return '"'.$value.'"'; // If I have new lines or commas escape them
	} else {
		return $value; // If no new lines or commas just return the value
	}
}

$dt1=explode("-",$_REQUEST["orderstartdate"]);
	$dd1=$dt1[0];
	$mm1=$dt1[1];
	$yy1=$dt1[2];
$orderstartdate=$yy1."-".$mm1."-".$dd1;	
	
$dt2=explode("-",$_REQUEST["orderenddate"]);
	$dd2=$dt2[0];
	$mm2=$dt2[1];
	$yy2=$dt2[2];
$orderenddate=$yy2."-".$mm2."-".$dd2;


$query_member_details=mysql_query("select * from bill_master where date(bill_datetime) between '".$orderstartdate."' and '".$orderenddate."'") or die(mysql_error()); // Start our query of the database

$numberFields = count($query_member_details); // Find out how many fields we are fetching


if($numberFields) { // Check if we need to output anything
	for($i=0; $i<$numberFields; $i++) {
		///$keys[] = mysql_field_name($query3, $i); // Create array of the names for the loop of data below
$head[0]= 'Name';
$head[1]= 'Reference Name';
$head[2]= 'Payment Status';
$head[3]= 'Invoice No';
$head[4]= 'Total Amt';
$head[5]= 'Location';
$head[6]= 'Datetime';
$head[7]= 'Order Status';


// Create and escape the headers for each column, this is the field name in the database
	}
	
	$headers = join(',', $head)."\n"; // Make our first row in the CSV
	
	$data = '';
//	
//	$i=1;
//
//	$total_expense='';
	
	while($result_member_details=mysql_fetch_array($query_member_details))
	{

	
//			
//$qry_qarzan=mysql_query("select sum(jamaat_husain_payment_withdrawal_amount) as total_withdrawal from jamaat_husain_payment_withdrawal_master where jamaat_husain_payment_withdrawal_member ='".$result_member_details['jamaat_member_id']."' and jamaat_husain_payment_withdrawal_category='".$_REQUEST['sel_category']."' and jamaat_husain_payment_withdrawal_confirm=1") or die(mysql_error());
//
//
//$res_qarzan=mysql_fetch_array($qry_qarzan);
//
//
//
//	$query_commit_details=mysql_query("select sum(jamaat_category_commitment) as total_commitment from jamaat_category_commitment_master where jamaat_category_commitment_member='".$result_member_details['jamaat_member_id']."' and jamaat_category_commitment_category= '".$_REQUEST['sel_category']."' ") or die(mysql_error());
//	
//	
//	$result_commit_details=mysql_fetch_array($query_commit_details);
//	
//	
//	$query_pay_details=mysql_query("select sum(jamaat_category_transaction_payment) as total_pay from jamaat_category_transaction_master where jamaat_category_transaction_member='".$result_member_details['jamaat_member_id']."' and jamaat_category_transaction_category= '".$_REQUEST['sel_category']."' ") or die(mysql_error());
//	
//	
//	$result_pay_details=mysql_fetch_array($query_pay_details);
//	
//	$new_balance=$result_pay_details['total_pay'] - $res_qarzan['total_withdrawal'];
//
//	
//		 if(($result_commit_details['total_commitment']!=0) or ($result_pay_details['total_pay']!=0) or ($res_qarzan['total_withdrawal']!=0))
//		 {
	$datetime=$result_member_details["bill_datetime"];
	$datetime=explode(" ",$datetime);
	$date=$datetime[0];
	$date=explode("-",$date);
	$year=$date[0];
	$mon=$date[1];
	$day=$date[2];
	$date=$day."-".$mon."-".$year;
	$orderdatetime=$date." ".$datetime[1];
	
	if($result_member_details["bill_order_completed"]==0)
{
	$orderstatus="Pending";
}
elseif($result_member_details["bill_order_completed"]==1)
{
	$orderstatus="Completed";
}
elseif($result_member_details["bill_order_completed"]==2)
{
	$orderstatus="Cancelled";
}
elseif($result_member_details["bill_order_completed"]==3)
{
	$orderstatus="In Shipping";
}
$recordsetshipping = mysql_query("select * from bill_shipping_address where shipping_bill_master_ID='".$result_member_details["bill_master_ID"]."'");								
                                if($rowshipping = mysql_fetch_array($recordsetshipping))
                                {
									$shipping_location=$rowshipping["shipping_user_state"]."  ".$rowshipping["shipping_user_country"];
								}
				
							$row[0] = $result_member_details['bill_name_user'];
							$row[1] = $result_member_details['bill_reference_name'];
							$row[2] = $result_member_details['bill_payment_status'];
							$row[3] = $result_member_details['bill_invoice_no'];
							$row[4] = $result_member_details['bill_final_amount'];
							$row[5] = $shipping_location;
							$row[6] = $orderdatetime;
							$row[7] = $orderstatus;						
							
						$data .= join(',', $row)."\n"; // Create a new row of data and append it to the last row
						$row = ''; // Clear the contents of the $row variable to start a new row
						
	//	 }
						
		 
	}
			
		
	
	//$query_comp=mysql_query("select * from jamaat_company_master where jamaat_cmp_id='".$_SESSION["Comp_id"]."' ") or die(mysql_error());
//	
//	$result_comp=mysql_fetch_array($query_comp);
//	
//	$name=str_replace(" ","",$result_comp['jamaat_cmp_name']);

	// Start our output of the CSV

	
/*	header('Content-Description: File Transfer');
	header("Content-type: application/csv");
	header("Content-Disposition: attachment;filename=$name.csv");
	header("Expires: 0");
	echo $headers.$data;*/
	$name="Invoice/$_REQUEST[orderstartdate]/$_REQUEST[orderenddate]";
	
header('Content-Description: File Transfer');	
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename='."$name.csv");
header('Cache-Control: private');
header('Pragma: cache');
header('Expires: 0');
echo $headers.$data;
	
	
} 

?>