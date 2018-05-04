<?php
session_start();
require("config.inc.php"); 
require("Database.class.php"); 
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
$db->connect(); 

$query=$_SESSION['query'];
$result=mysql_query($query);
$header="<table border='1'>

<tr><td colspan=20 align=center><H3>Bhatia Order Report</H3></td></tr>

<tr>
<th>Order No</th>
<th>Client Name</th>
<th>Order Date</th>
<th>Amount</th>
<th>Order Status</th>
<th>Payment Mode</th>
<th>Payment Status</th>
<th>Check Or Draft</th>
<th>Check or Draft No</th>
<th>Check or Draft Date</th>
<th>Bank Name</th>
<th>Payment Gateway</th>
<th>Pay Data</th>
<th>Currency</th>
</tr>";
while($row = mysql_fetch_array($result))
{
  $header.= "<tr>";
  $header.= "<td>" . $row['Order_No'] . "</td>";
  
  $cl_query=mysql_query("SELECT * FROM user_mst WHERE User_Id='".$row['User_Id']."'");
  $uu=mysql_fetch_array($cl_query);
  $header.= "<td>" . $uu['First_Name']." ".$uu['Middle_Name']." ".$uu['Last_Name']. "</td>";
  $dx=split("-",$row['Order_Date']);
  $month=$dx[0];
  $date=$dx[1];
  $year=$dx[2];
  $final=$year."/".$date."/".$month;
  $header.= "<td>". $final . "</td>";
  $header.= "<td>" . number_format($row['Amount'],2) . "</td>";
  $header.= "<td>" . $row['Order_Status'] . "</td>";
  $header.= "<td>" . $row['Pay_Mode'] . "</td>";
  $header.= "<td>" . $row['Payment_Status'] . "</td>";
  if($row['Pay_Mode']=='Online')
  {
	  $chd=" ";
  }
  else
  {
	  $chd=$row['Ch_Draft'];
  }
  	$header.= "<td>" . $chd . "</td>";
	
  $header.= "<td>" . $row['Ch_No'] . "</td>";
  $header.= "<td>" . $row['Ch_Date'] . "</td>";
  $header.= "<td>" . $row['Bank_Name'] . "</td>";
  $header.= "<td>" . $row['Payment_Gateway'] . "</td>";
  $header.= "<td>" . $row['Pay_Data'] . "</td>";
  $header.= "<td>" . $row['Currency'] . "</td>";
  $header.= "</tr>";
  
}
$header.= "</table>";
$file_name="Bhatia_Order_".date('Y-m-d');
header("Content-type: application/msexcel");
header("Content-Disposition: attachment; filename=".$file_name.".xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$data";
//unset($_SESSION['query']);

?>