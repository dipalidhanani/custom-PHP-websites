<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Klassic Kids - Order Status</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
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
            <td class="normal_fonts14_black">Change Order Status</td>
    </tr>
    <tr>
      <td class="normal_fonts10"><table border="0" align="center" cellpadding="5" cellspacing="0" class="border">
                  <form name="orderform" action="orderprocess.php" method="post">
                    <?php
				    $recordsetbill = mysql_query("select * from bill_master where bill_invoice_no='".$_REQUEST["invoice"]."'",$cn);
					while($rowbill = mysql_fetch_array($recordsetbill,MYSQL_ASSOC))
					{				
					if($rowbill["bill_payment_type"]!=0)
					{
					?>
                    <?php
					}					
					?>
                    <tr>
                      <td align="right" valign="top"><strong>Payment Status :</strong></td>
                      <td align="left" valign="top"><table border="0" cellspacing="0" cellpadding="5">
                        <tr>
                          <td align="left"><input name="paymentstatus" type="radio" value="Pending" <?php if($rowbill["bill_payment_status"]=="Pending") { ?> checked="checked" <?php } ?> /></td>
                          <td align="left">Pending</td>
                          <td align="left"><input name="paymentstatus" type="radio" value="Completed" <?php if($rowbill["bill_payment_status"]=="Completed") { ?> checked="checked" <?php } ?>/></td>
                          <td align="left">Completed</td>
                          <td align="left"><input name="paymentstatus" type="radio" value="Cancelled" <?php if($rowbill["bill_payment_status"]=="Cancelled") { ?> checked="checked" <?php } ?>/></td>
                          <td align="left">Cancelled</td>
                          <td align="left"><input name="paymentstatus" type="radio" value="Failed" <?php if($_REQUEST["paymentstatus"]=="Failed") { ?> checked="checked" <?php } ?>/></td>
                 <td align="left">Failed</td>
                 <td align="left"><input name="paymentstatus" type="radio" value="Denied" <?php if($_REQUEST["paymentstatus"]=="Denied") { ?> checked="checked" <?php } ?>/></td>
                 <td align="left">Denied</td>
                 <td align="left"><input name="paymentstatus" type="radio" value="Failed" <?php if($_REQUEST["paymentstatus"]=="Failed") { ?> checked="checked" <?php } ?>/></td>
                 <td align="left">Failed</td>
                 <td align="left"><input name="paymentstatus" type="radio" value="Refund" <?php if($_REQUEST["paymentstatus"]=="Refund") { ?> checked="checked" <?php } ?>/></td>
                 <td align="left">Refund</td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td align="right" valign="top"><strong>Change Order Status :</strong></td>
                      <td align="left" valign="top"><table border="0" cellspacing="0" cellpadding="5">
                        <tr>
                          <td align="left"><input name="orderstatus" type="radio" value="0" <?php if($rowbill["bill_order_completed"]==0) { ?> checked="checked" <?php } ?> /></td>
                          <td align="left">Pending</td>
                          <td align="left"><input name="orderstatus" type="radio" value="3" <?php if($rowbill["bill_order_completed"]==3) { ?> checked="checked" <?php } ?>/></td>
                          <td align="left">In Shipping</td>
                          <td align="left"><input name="orderstatus" type="radio" value="1" <?php if($rowbill["bill_order_completed"]==1) { ?> checked="checked" <?php } ?>/></td>
                          <td align="left">Completed</td>
                          <td align="left"><input name="orderstatus" type="radio" value="2" <?php if($rowbill["bill_order_completed"]==2) { ?> checked="checked" <?php } ?>/></td>
                          <td align="left">Cancelled</td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                    <td align="right" valign="top"><strong>Note :</strong></td>
                    <td align="left" valign="top"><textarea name="orderstatusnote" cols="60" rows="5" class="normal_fonts9"><?php echo $rowbill["bill_order_status_note"];?></textarea></td>
                  </tr>
                  <?php
				  if($rowbill["bill_order_status_updated_datetime"]!="0000-00-00 00:00:00")
				  {
				  ?>
                  <tr>
                    <td height="30" align="right" valign="middle"><strong>Status Updated On :</strong></td>
                    <td height="30" align="left" valign="middle"><?php
							$datetime=$rowbill["bill_order_status_updated_datetime"];
							$datetime=explode(" ",$datetime);
							$date=$datetime[0];
							$date=explode("-",$date);
							$year=$date[0];
							$mon=$date[1];
							$day=$date[2];
							$date=$day."-".$mon."-".$year;
							$datetime=$date." ".$datetime[1];
							echo $datetime;
						?></td>
                  </tr>
                  <tr>
                    <td height="30" align="right" valign="middle"><strong>Status Updated from :</strong></td>
                    <td height="30" align="left" valign="middle"><?php echo $rowbill["bill_order_status_updated_ip"];?></td>
                  </tr>
                  <?php
				  }
				  ?>
                  <tr>
                    <td height="30" colspan="2" align="center" valign="middle">
                    <input type="hidden" name="invoice" value="<?php echo $_REQUEST["invoice"];?>" />
                    <input type="submit" name="submit" value="Change Order Status" /></td>
                    </tr>
                    <?php
					}
					?>
                 </form>   
                </table></td>
    </tr>
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