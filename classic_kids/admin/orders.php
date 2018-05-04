<?php
session_start();
include("include/config.php");
require_once("include/function.php");
u_Connect("cn");

if(($_REQUEST["paymentmethod"]=="")||($_REQUEST["paymentmethod"]==1))
{
	$paymentmethodtitle="Paypal";
}
elseif($_REQUEST["paymentmethod"]==2)
{
	$paymentmethodtitle="Cheque / Demand Draft";
}
elseif($_REQUEST["paymentmethod"]==3)
{
	$paymentmethodtitle="Cash on Delivery";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Klassic Kids - Orders</title>
<link rel="stylesheet" href="css/css.css" type="text/css" />
<link type="text/css" rel="stylesheet" href="calendar/calendar.css" media="screen"></link>
<script language="javascript" type="text/javascript" src="calendar/calendar.js"></script>

</head>

<body>

      
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border">
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF"><?php include("header.php");?></td>
      </tr>
      
      
      <tr>
        <td bgcolor="#FFFFFF">         
<table width="100%" border="0" cellpadding="0">

<tr><td bgcolor="#FFFFFF">

<table width="99%" border="0" cellspacing="10" cellpadding="0" >
    
    <tr>
            <td class="normal_fonts14_black"><?php echo $paymentmethodtitle;?> Orders</td>
    </tr>
     <tr>
       <td align="center" class="normal_fonts12_black"><table border="0" cellspacing="5" cellpadding="0" class="border">
         <form action="orders.php" method="get" name="orderform" id="orderform2">
           <tr>
             <td align="left">Search by Invoice :</td>
             <td align="left"><input type="text" name="invoice" value="<?php echo $_REQUEST["invoice"];?>" class="normal_fonts9"/></td>
             <td align="left"><input type="hidden" name="paymentmethod2" value="<?php echo $_REQUEST["paymentmethod"]?>" />
               <input type="submit" name="submit2" value="Submit" /></td>
           </tr>
         </form>
       </table></td>
     </tr>
     <tr>
       <td align="center" class="normal_fonts12_black">OR</td>
     </tr>
     <tr>
       <td align="center" class="normal_fonts12_black"><table border="0" cellspacing="5" cellpadding="0" class="border">
         <form action="orders.php" method="get" name="orderform" id="orderform">
           <tr>
             <td align="left">Search by Order Status:</td>
             <td align="left" class="normal_fonts10"><table width="100%" border="0" cellspacing="5" cellpadding="0">
               <tr>
                 <td align="left">
                 <input name="orderstatus" type="radio" value="0" <?php if($_REQUEST["orderstatus"]!="") { if($_REQUEST["orderstatus"]==0) { ?> checked="checked" <?php } }?> />
                 </td>
                 <td align="left">Pending</td>
                 <td align="left"><input name="orderstatus" type="radio" value="1" <?php if($_REQUEST["orderstatus"]==1) { ?> checked="checked" <?php } ?>/></td>
                 <td align="left">Completed</td>
                 <td align="left"><input name="orderstatus" type="radio" value="2" <?php if($_REQUEST["orderstatus"]==2) { ?> checked="checked" <?php } ?>/></td>
                 <td align="left">Cancelled</td>
                 <td align="left"><input name="orderstatus" type="radio" value="3" <?php if($_REQUEST["orderstatus"]==3) { ?> checked="checked" <?php } ?>/></td>
                 <td align="left">In Shipping</td>
               </tr>
             </table></td>
             <td align="left"><input type="hidden" name="paymentmethod" value="<?php echo $_REQUEST["paymentmethod"]?>" />
               <input type="submit" name="submit" value="Submit" /></td>
           </tr>
         </form>
       </table></td>
     </tr>
     <tr>
       <td align="center" class="normal_fonts12_black">OR</td>
     </tr>
     <tr>
       <td align="center" class="normal_fonts12_black"><table border="0" cellspacing="5" cellpadding="0" class="border">
         <form action="orders.php" method="get" name="orderform" id="orderform">
           <tr>
             <td align="left">Search by Payment Status:</td>
             <td align="left" class="normal_fonts10"><table width="100%" border="0" cellspacing="5" cellpadding="0">
               <tr>
                 <td align="left"><input name="paymentstatus" type="radio" value="Completed" <?php if($_REQUEST["paymentstatus"]!="") { if($_REQUEST["paymentstatus"]=="Completed") { ?> checked="checked" <?php } }?> /></td>
                 <td align="left">Completed</td>
                 <td align="left"><input name="paymentstatus" type="radio" value="Pending" <?php if($_REQUEST["paymentstatus"]=="Pending") { ?> checked="checked" <?php } ?>/></td>
                 <td align="left">Pending</td>
                 <td align="left"><input name="paymentstatus" type="radio" value="Pending" <?php if($_REQUEST["paymentstatus"]=="Cancelled") { ?> checked="checked" <?php } ?>/></td>
                 <td align="left">Cancelled</td>
                 <td align="left"><input name="paymentstatus" type="radio" value="Failed" <?php if($_REQUEST["paymentstatus"]=="Failed") { ?> checked="checked" <?php } ?>/></td>
                 <td align="left">Failed</td>
                 <td align="left"><input name="paymentstatus" type="radio" value="Denied" <?php if($_REQUEST["paymentstatus"]=="Denied") { ?> checked="checked" <?php } ?>/></td>
                 <td align="left">Denied</td>
                 
                 <td align="left"><input name="paymentstatus" type="radio" value="Refund" <?php if($_REQUEST["paymentstatus"]=="Refund") { ?> checked="checked" <?php } ?>/></td>
                 <td align="left">Refund</td>
               </tr>
             </table></td>
             <td align="left"><input type="hidden" name="paymentmethod" value="<?php echo $_REQUEST["paymentmethod"]?>" />
               <input type="submit" name="submit" value="Submit" /></td>
           </tr>
         </form>
       </table></td>
     </tr>
     <script language="javascript">
function select_orderdate()
{
	with(document.orderdateform)
	{
			var error=0;
			var message;
			message="Please enter / correct folllowing errors to proceed further :";
			message=message+ "\n" + "--------------------------------------------------------------------";
			
			if((document.getElementById("orderstartdate").value=='') || (document.getElementById("orderenddate").value==''))
			{
				
				error=1;
				message=message + "\n" + "Please enter both date";
			}
			if (error==1)
			{
			
				alert(message);
				return false;
			}
			else
			{
				
				return true;		
			}
	}
}
</script>
     <tr>
       <td align="center" class="normal_fonts12_black"><table border="0" cellspacing="5" cellpadding="0" class="border">
         <form action="export_order_reports_details.php" method="post" name="orderdateform" id="orderdateform">
           <tr>
             <td align="left">Export Report :</td>
             <td align="left" class="normal_fonts10"><table width="100%" border="0" cellspacing="5" cellpadding="0">
               <tr>
                 <td align="left"><input name="orderstartdate" type="text" id="orderstartdate" class="normal_fonts9" onFocus="displayCalendar(orderstartdate,'dd-mm-yyyy',this)" /></td>
                 <td align="left"><input name="orderenddate" type="text" id="orderenddate" class="normal_fonts9" onFocus="displayCalendar(orderenddate,'dd-mm-yyyy',this)"  /></td>
               </tr>
             </table></td>
             <td align="left"><input type="hidden" name="paymentmethod" value="<?php echo $_REQUEST["paymentmethod"]; ?>" />
               <input type="submit" name="submit" value="Export Report" onclick="return select_orderdate();" /></td>
           </tr>
         </form>
       </table></td>
     </tr>
     <tr>
       <td bgcolor="#CCCCCC">
  <?php 
if($_REQUEST["paymentmethod"]=="")
{
	$paymentmethod=0;
}  
else
{
	$paymentmethod=$_REQUEST["paymentmethod"];
}
$ps="";
if(($_REQUEST["invoice"]=="")&&($_REQUEST["orderstatus"]==""))
{	
	$query="select * from bill_master where bill_payment_type='".$paymentmethod."' and bill_payment_status!='".$ps."'  order by bill_master_ID desc ";
}
if($_REQUEST["orderstatus"]!="")
{
	$query="select * from bill_master where bill_payment_type='".$paymentmethod."' and bill_order_completed='".$_REQUEST["orderstatus"]."' and  bill_payment_status!='".$ps."' order by bill_master_ID desc ";
}
if($_REQUEST["invoice"]!="")
{
	$query="select * from bill_master where bill_payment_type='".$paymentmethod."' and bill_invoice_no='".$_REQUEST["invoice"]."' and  bill_payment_status!='".$ps."' order by bill_master_ID desc ";
}
if($_REQUEST["paymentstatus"]!="")
{
	$query="select * from bill_master where bill_payment_type='".$paymentmethod."' and bill_payment_status='".$_REQUEST["paymentstatus"]."' order by bill_master_ID desc ";
}
//$dt1=explode("-",$_REQUEST["orderstartdate"]);
//	$dd1=$dt1[0];
//	$mm1=$dt1[1];
//	$yy1=$dt1[2];
//$orderstartdate=$yy1."-".$mm1."-".$dd1;	
//	
//$dt2=explode("-",$_REQUEST["orderenddate"]);
//	$dd2=$dt2[0];
//	$mm2=$dt2[1];
//	$yy2=$dt2[2];
//$orderenddate=$yy2."-".$mm2."-".$dd2;
//
//
//if(($_REQUEST["orderstartdate"]!="") && ($_REQUEST["orderenddate"]!=""))
//{
//	$query="select * from bill_master where date(bill_datetime) between '".$orderstartdate."' and '".$orderenddate."' ";
//}


if($_REQUEST["pagenum"]=="")
					{
						$pagenum = 1;
					}
					else
					{
						$pagenum=$_REQUEST["pagenum"];
					}
					
					$data = mysql_query($query);
    				$rows1 = mysql_num_rows($data);	
					
				
				       
											
					$page_rows = 10;
   
					$last = ceil($rows1/$page_rows);
				  
					if ($pagenum < 1)
					{
					$pagenum = 1;
					}
					elseif ($pagenum > $last)
					{
					$pagenum = $last;
					}
				
				   if($rows1!="")
				   {
					$max = 'limit ' .($pagenum - 1) * $page_rows .',' .$page_rows; 
				   }
					
					$qmax=$query.$max;
					
					$res = mysql_query($qmax) or die(mysql_error());	

?>
<table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">
<tr>
  <td width="5%" align="center" valign="middle" bgcolor="#999999"><strong>No.</strong></td>
<td align="left" valign="middle" bgcolor="#999999"><strong>Name</strong></td>
<td width="12%" align="center" valign="middle" bgcolor="#999999"><strong>Reference Name</strong></td>
                <td width="12%" align="center" valign="middle" bgcolor="#999999"><strong>Payment Status</strong></td>
                <td width="10%" align="center" valign="middle" bgcolor="#999999"><strong>Invoice No</strong></td>
                <td width="10%" align="center" valign="middle" bgcolor="#999999"><strong>Total Amt</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Location</strong></td>
                <td width="12%" align="center" valign="middle" bgcolor="#999999"><strong>Datetime</strong></td>
                <td width="10%" align="center" valign="middle" bgcolor="#999999"><strong>Order Status</strong></td>
                <td width="10%" align="center" valign="middle" bgcolor="#999999"><strong>Action</strong></td>
</tr>
<?php 
$i=1;

if($rows1>0)
{
while($row=mysql_fetch_array($res))
{
 if($i%2!=0)
{
	$bg="#FFFFFF";
}
else 
{
	$bg="#F3F3F3";
} 
		
?>
<tr>
  <td align="center" bgcolor="<?php echo $bg;?>"><?php echo $i;?></td>
<td bgcolor="<?php echo $bg;?>"><?php  echo $row["bill_name_user"]."<br/>".$row["bill_email_id"];?></td>
<td align="center" bgcolor="<?php echo $bg;?>"><?php echo $row["bill_reference_name"];?></td>
<td align="center" bgcolor="<?php echo $bg;?>"><?php echo $row["bill_payment_status"];?></td>
<td align="center" bgcolor="<?php echo $bg;?>"><?php echo $row["bill_invoice_no"];?></td>
<td align="center" bgcolor="<?php echo $bg;?>"><?php echo $row["bill_final_amount"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php
$recordsetshipping = mysql_query("select * from bill_shipping_address where shipping_bill_master_ID='".$row["bill_master_ID"]."'");								
                                while($rowshipping = mysql_fetch_array($recordsetshipping))
                                {
									echo $rowshipping["shipping_user_state"].", ".$rowshipping["shipping_user_country"];
								}
								?></td>
<td align="center" bgcolor="<?php echo $bg;?>"><?php 
	$datetime=$row["bill_datetime"];
	$datetime=explode(" ",$datetime);
	$date=$datetime[0];
	$date=explode("-",$date);
	$year=$date[0];
	$mon=$date[1];
	$day=$date[2];
	$date=$day."-".$mon."-".$year;
	$datetime=$date." ".$datetime[1];
	echo $datetime;?></td>
<td width="80" align="center" bgcolor="<?php echo $bg;?>">
<?php
if($row["bill_order_completed"]==0)
{
	echo "Pending";
}
elseif($row["bill_order_completed"]==1)
{
	echo "Completed";
}
elseif($row["bill_order_completed"]==2)
{
	echo "Cancelled";
}
elseif($row["bill_order_completed"]==3)
{
	echo "In Shipping";
}

?></td>
<td bgcolor="<?php echo $bg;?>" width="80"> 
  <table width="80" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="center"><a href="orderdetails.php?invoice=<?php echo $row["bill_invoice_no"]; ?>"><img src="images/zoom_in.png" alt="View" width="20" height="20" border="0" title="View" /></a></td>
      <td align="center"><a href="orderstatus.php?invoice=<?php echo $row["bill_invoice_no"]; ?>"><img src="images/edit.png" alt="Edit" width="20" height="20" border="0" title="Edit" /></a></td>
      </tr>
  </table></td>
</tr>

<?php
		  $i++; }
		  
		   }
				else
				{
					$err="No Record Found";
				?>
				<tr>
					<td colspan="18" align="center" bgcolor="#FFFFFF"><?php echo $err; ?></td>
				</tr>
				<?php
				}
		  
		  ?>
</table></td></tr>
<tr><td>
<table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">
<tr>
  <td align="center" class="normal_fonts9">
    <?php 
if($rows1!=0)
{
if ($pagenum == 1)
{
}
else
{
?>
    <a href='orders.php?pagenum=1&paymentmethod=<?php echo $_REQUEST["paymentmethod"];?>' > << first      </a>
    <a href='orders.php?pagenum=<?php echo $pagenum-1; ?>&paymentmethod=<?php echo $_REQUEST["paymentmethod"];?>'>Previous      </a>	
    <?php
}
if ($pagenum == $last) 
				{
					if($pagenum ==1)
					{
						$pagenum=1;
					}
					else
					{
					
					if($last-10>10)
					{
						$v=$last-10;						
					}
					else
					{
						$v=1;
					}
												
					for($i=$v;$i<=$last;$i++)
				{				
				?>				
    <a href='orders.php?pagenum=<?php echo $i; ?>&paymentmethod=<?php echo $_REQUEST["paymentmethod"];?>'><?php echo $i; ?></a> | 
    <?php
				}		
				}		
				}
				else 
				{	
					if($pagenum<10)
					{
					    if($last>10)
						{
							$pageupto=10;
						}
						else
						{
							$pageupto=$last;
						}
						
						for($i=1;$i<=$pageupto;$i++)
						{				
						?>				
    <a href='orders.php?pagenum=<?php echo $i; ?>&paymentmethod=<?php echo $_REQUEST["paymentmethod"];?>'><?php echo $i; ?></a> |
    <?php
						}		
					}
					else
					{
					
						for($i=$pagenum-5;$i<=$pagenum+5;$i++)
						{
						if($i<=$last)
						{				
						?>				
    <a href='orders.php?pagenum=<?php echo $i; ?>&paymentmethod=<?php echo $_REQUEST["paymentmethod"];?>'><?php echo $i; ?></a> |
    <?php
						}
						}
					}
				 }
				 
			   ?>
    <?php
				if ($pagenum == $last)
				{
				}
				else
				{
			?>
    <a href='orders.php?pagenum=<?php echo $pagenum+1; ?>&paymentmethod=<?php echo $_REQUEST["paymentmethod"];?>'>Next</a>&nbsp;&nbsp;
    <a href='orders.php?pagenum=<?php echo $last; ?>&paymentmethod=<?php echo $_REQUEST["paymentmethod"];?>'>Last >> </a>	
    <?php
				}
			}
				?>    </td>
</tr> 
    </table></td></tr>       
</table>
</td></tr></table>		</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><?php include("footer.php");?></td>
  </tr>
</table>
 
</body>
</html>