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
<title>Welcome to SQ Jeans - Reseller Panel</title>
<link rel="stylesheet" href="css/css.css" type="text/css" />
<?php
require_once("include/files.php");
?>
</head>
<body>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF"><?php include("header.php");?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="10" cellpadding="0">
     
      
      <tr>
        <td align="left" bgcolor="#ccc"><table width="100%" border="0" cellpadding="5" cellspacing="1">
      
          <tr class="normal_fonts10">
            <td width="4%" align="left" bgcolor="#999999"><strong>No.</strong></td>
            <td width="14%" align="left" bgcolor="#999999"><strong>Date</strong></td>
            <td width="18%" align="left" bgcolor="#999999"><strong>Customer name</strong></td>
             <td width="18%" align="left" bgcolor="#999999"><strong>Order For</strong></td>
             <td width="13%" align="left" bgcolor="#999999"><strong>Order Amount</strong></td>
             <td width="12%" align="left" bgcolor="#999999"><strong>Order Status</strong></td>
              <td width="13%" align="left" bgcolor="#999999"><strong>Payment Status</strong></td>
            <td width="8%" align="center" bgcolor="#999999"><strong>View</strong></td>
            </tr>
            <?php
			 $i=1;
			 $query="SELECT * FROM reseller_order_master where reseller_mast_id='".$_SESSION['sqjeansresellerlogin']."' order by reseller_order_ID desc";			
			 $recordsetresellerorder = mysql_query($query);
			  $totrecords=mysql_num_rows($recordsetresellerorder);
			 while($rowresellerorder = mysql_fetch_array($recordsetresellerorder,MYSQL_ASSOC))
			 {	
			    if($i%2!=0)
				{
					$bg="#FFFFFF";
				}
				else 
				{
					$bg="#F3F3F3";
				}	
				
		$dt=explode("-",$rowresellerorder["reseller_order_date"]);
	   $yy1=$dt[0];
	   $mm1=$dt[1];
	   $dd1=$dt[2];
	   $reseller_order_date=$dd1."-".$mm1."-".$yy1;
			?>
          <tr class="normal_fonts9">
           <td align="left" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $totrecords;?></td>
            <td align="left" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $reseller_order_date;?></td>
             <td align="left" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $rowresellerorder["customer_name"];?></td>
             <td align="left" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $rowresellerorder["reseller_order_for"];?></td>
              <td align="left" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $rowresellerorder["order_amount"];?></td>
            <td align="left" valign="middle" bgcolor="<?php echo $bg;?>">
			
			<?php if($rowresellerorder["order_completed_status"]==0) { echo "Pending"; }
			
			if($rowresellerorder["order_completed_status"]==1) { echo "Completed"; }
			if($rowresellerorder["order_completed_status"]==2) { echo "Canceled"; }
			
			?>
            
            </td>
            <td align="left" valign="middle" bgcolor="<?php echo $bg;?>">
			
			<?php if($rowresellerorder["order_payment_status"]==0) { echo "Pending"; }
			
			if($rowresellerorder["order_payment_status"]==1) { echo "Completed"; }
			if($rowresellerorder["order_payment_status"]==2) { echo "Canceled"; }
			
			?>
            
            </td>
           
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                              <tr>
                                <td align="center"><a href="viewresellerorders.php?resellerorderid=<?php echo $rowresellerorder["reseller_order_ID"];?>"><img src="images/zoom.png" width="20" height="20" border="0" /></a></td>
                               
                              </tr>
                </table></td>
            </tr>         
            <?php
			$totrecords--; $i++;
			 }
			 ?>
           
           
        </table></td>
      </tr>
     
    </table></td>
  </tr>
  <tr>
    <td><?php include("footer.php");?></td>
  </tr>
</table>

</body>
</html>
