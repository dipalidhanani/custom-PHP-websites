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
<title>Admin Panel</title>
<link rel="stylesheet" href="css/css.css" type="text/css" />
<script type="text/javascript" src="ajax/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="ajax/highslide.css" />
<script type="text/javascript">
hs.graphicsDir = 'ajax/graphics/';
hs.outlineType = 'rounded-white';
hs.showCredits = false;
hs.wrapperClassName = 'draggable-header';
</script>
<script language="javascript">

function load1(test1)
{

document.getElementById("txttest").style.display = '';

document.getElementById("testadd").style.visibility="visible";
}



function load2(test2)
{
	

 document.getElementById("txttest").style.display = 'none';
 

}

</script>
</head>
<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border">
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF"><?php include("header.php");?></td>
      </tr>
      
      
      <tr>
      <td  bgcolor="#FFFFFF">
      <table width="1000" border="0" cellspacing="5" cellpadding="0">
      <tr>
        <td valign="top">        
        <table width="100%" border="0" cellspacing="5" cellpadding="0">
         <tr><td class="normal_fonts14_black" colspan="10" >Latest Orders</td></tr>
      <tr>
        <td align="center" bgcolor="#cccccc">
        
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
$query="select * from bill_master where bill_payment_status='Completed' order by bill_master_ID desc limit 5";
$data = mysql_query($query);
$rows1 = mysql_num_rows($data);	
$i=1;
if($rows1>0)
{
while($row=mysql_fetch_array($data))
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
	$datetime=$row["bill_payment_transaction_recieve_datetime"];
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
   <td align="center"><a href="orderdetails.php?invoice=<?php echo $row["bill_invoice_no"]; ?>"><img src="images/zoom_in.png" alt="View" width="20" height="20" border="0" title="View" /></a>
   </td>  
  </tr>
 </table>
 </td>
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
</table>




        </td>
      </tr>
       </table>
        </td>        
      </tr>
       <tr>
        <td valign="top">        
        <table width="100%" border="0" cellspacing="5" cellpadding="0">
        
       <tr><td class="normal_fonts14_black" colspan="10" >Latest Registered Users</td></tr>
      <tr>
      <td bgcolor="#cccccc">
        <table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">
         
<tr>
<td align="left" valign="middle" bgcolor="#999999"><strong>Name</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Email</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Password</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Location</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Mobile no</strong></td>
                <td align="center" valign="middle" bgcolor="#999999"><strong>Action</strong></td>
</tr>
<?php 


$query="select * from register_master order by register_ID desc limit 5 ";

					
					$data = mysql_query($query);
    				$rows1 = mysql_num_rows($data);	
					
	
$i=1;

if($rows1>0)
{
while($row=mysql_fetch_array($data))
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
<td bgcolor="<?php echo $bg;?>"><?php  echo $row["register_user_first_name"]." ".$row["register_user_last_name"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php echo $row["register_user_email"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php echo base64_decode($row["register_user_password"]);?></td>
<td bgcolor="<?php echo $bg;?>"><?php echo $row["register_user_state"].", ".$row["register_user_country"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php echo $row["register_user_mobile"];?></td>
<td bgcolor="<?php echo $bg;?>" width="80"> 
  <table width="80" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="center"><img src="images/zoom.png" alt="View" width="20" height="20" border="0" title="View" onclick="return hs.htmlExpand(this, { headingText: '<?php  echo $row["register_user_first_name"]." ".$row["register_user_last_name"];?>' })" style="cursor:pointer;"/>
      <div class="highslide-maincontent">
        <table width="100%" border="0" cellpadding="5" cellspacing="0">
              
              <tr>

                          <td width="30%" align="right" valign="top" class="normal_fonts9" >Name   </td>
                          <td class="normal_fonts9">:</td>
                          <td width="69%" class="normal_fonts9"><?php  echo $row["register_user_first_name"]." ".$row["register_user_last_name"];?></td>
                        </tr>
                        
                        <tr>
                          <td align="right" valign="top" class="normal_fonts9" >Address  </td>
                          <td class="normal_fonts9">:</td>
                          <td class="normal_fonts9"><?php  echo $row["register_user_address"];?></td>
                        </tr> 
                        <?php if($row["register_user_address_2"]!=""){ ?>
                         <tr>
                          <td align="right" valign="top" class="normal_fonts9" ></td>
                          <td class="normal_fonts9"></td>
                          <td class="normal_fonts9"><?php  echo $row["register_user_address_2"];?></td>
                        </tr>
                        <?php } ?>                        
                        <tr>
                          <td align="right" valign="top" class="normal_fonts9" >City  </td>
                          <td class="normal_fonts9">:</td>
                          <td class="normal_fonts9"><?php  echo $row["register_user_city"];?></td>
                        </tr>

                        <tr>
                          <td align="right" valign="top" class="normal_fonts9" >State / Province   </td>
                          <td class="normal_fonts9">:</td>
                          <td class="normal_fonts9"><?php  echo $row["register_user_state"];?></td>
                        </tr>
                        <tr>
                          <td align="right" valign="top" class="normal_fonts9" >Post Code </td>
                          <td class="normal_fonts9">:</td>
                          <td class="normal_fonts9"><?php  echo $row["register_user_pincode"];?></td>
                        </tr>

                        <tr>
                          <td align="right" valign="top" class="normal_fonts9" >Country  </td>
                          <td class="normal_fonts9">:</td>
                        <td class="normal_fonts9"><?php  echo $row["register_user_country"];?></td>
                        </tr>
                        <tr>
                          <td align="right" valign="top" class="normal_fonts9" >Email Address  </td>
                          <td width="1%" class="normal_fonts9">:</td>
                          <td class="normal_fonts9"><?php  echo $row["register_user_email"];?></td>
                        </tr>
                        <tr>
                          <td align="right" valign="top" class="normal_fonts9" >Phone&nbsp;</td>
                          <td class="normal_fonts9">:</td>
                          <td class="normal_fonts9"><?php  echo $row["register_user_phone"];?></td>
                        </tr>
                        <tr>
                          <td align="right" valign="top" class="normal_fonts9" >Mobile </td>
                          <td class="normal_fonts9">:</td>
                          <td class="normal_fonts9"><?php  echo $row["register_user_mobile"];?></td>
                        </tr>
                         <tr>
                          <td align="right" valign="top" class="normal_fonts9" >Password  </td>
                          <td class="normal_fonts9">:</td>
                          <td class="normal_fonts9"><?php  echo base64_decode($row["register_user_password"]);?></td>
                        </tr>
                        
              <tr>
                <td height="10" colspan="4" align="right" class="normal_fonts9"></td>
              </tr>
            </table>    
      </div>      </td>
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
					<td colspan="14" align="center" bgcolor="#FFFFFF"><?php echo $err; ?></td>
				</tr>
				<?php
				}
		  
		  ?>
</table>
      </td>
      </tr>
      </table></td></tr>
      <tr>
        <td valign="top">        
        <table width="100%" border="0" cellspacing="5" cellpadding="0">
        
       <tr><td class="normal_fonts14_black" colspan="10" >Latest Contact Inquiry</td></tr>
      <tr>
      <td bgcolor="#cccccc">
        <table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">
<tr>
  <td align="left" valign="middle" bgcolor="#999999"><strong>Name</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Email</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Mobile No</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Country</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Query / Message</strong></td>
                <td align="center" valign="middle" bgcolor="#999999"><strong>Datetime</strong></td>
                </tr>
<?php 
$i=1;

$query="select * from contactus_inquiry order by inquiry_id desc limit 5 ";
$data = mysql_query($query);
$rows1 = mysql_num_rows($data);	
if($rows1>0)
{
while($row=mysql_fetch_array($data))
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
  <td bgcolor="<?php echo $bg;?>"><?php  echo $row["inquiry_by_name"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php echo $row["inquiry_by_email"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php echo $row["inquiry_by_mobile"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php echo $row["inquiry_by_country"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php echo $row["inquiry_by_query"];?></td>
<td align="center" bgcolor="<?php echo $bg;?>"><?php echo explodedate($row["inquiry_on_datetime"]);?></td>
</tr>

<?php
		  $i++; }
		  
		   }
				else
				{
					$err="No Record Found";
				?>
				<tr>
					<td colspan="14" align="center" bgcolor="#FFFFFF"><?php echo $err; ?></td>
				</tr>
				<?php
				}
		  
		  ?>
</table>
      </td>
      </tr>
      </table></td></tr>
      
        <tr>
        <td valign="top">     
          <form name="frmnews" id="frmnews" method="post" action="process_newsletter.php" >   
        <table width="100%" border="0" cellspacing="5" cellpadding="0">
        
       <tr><td class="normal_fonts14_black" colspan="10" >Birthday News Letter</td></tr>
      <tr>
      <td>
        <table width="100%" border="0" cellspacing="1" cellpadding="0" class="normal_fonts8">
     
        <tr>
          <td>
        <table width="100%">
        <tr>
                    <td width="116" align="right" class="normal_fonts9">  <input name="rdoSend" id="rdoSend" type="radio" value="0" onClick="load2('test2')" />Send to All Client
                        </td>
                    <td width="15">&nbsp;</td>
                    <td width="823"  align="left"  class="normal_fonts9">&nbsp;<input name="rdoSend" id="rdoSend" type="radio"  value="1" onClick="load1('test1')" checked="checked"/>Send to Specific Client
                                       
                    </td>
        </tr>
        </table>
        
        </td></tr>
           <tr><td height="5"></td></tr>   
<tr id="txttest"  >
<td  bgcolor="#cccccc">
<div id="testadd" >
<table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8" bgcolor="#CCCCCC">
<tr>
<td align="center" valign="middle" bgcolor="#999999" width="10"><strong></strong></td>
   <td align="center" valign="middle" bgcolor="#999999" width="100"><strong>Kids Name</strong></td>
    <td align="center" valign="middle" bgcolor="#999999" width="250"><strong>Kids Address</strong></td>
    <td align="center" valign="middle" bgcolor="#999999" width="91"><strong>Kids Birth Date</strong></td> 
     <td align="center" valign="middle" bgcolor="#999999" width="50"><strong>News Letter</strong></td>       
                </tr>
<?php 
$i=1;
$todaymonth=date("m");
	

	$query7=mysql_query("select * from register_master where month(register_user_birth_date)='".$todaymonth."'");
	$totrecords2=mysql_num_rows($query7);
	if($totrecords2>0){
	while($row7=mysql_fetch_array($query7))
	{
	$dt=explode("-",$row7["register_user_birth_date"]);
	   $yy1=$dt[0];
	   $mm1=$dt[1];
	   $dd1=$dt[2];
	   $kidsbirthdate=$dd1."-".$mm1."-".$yy1;

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
 <td bgcolor="<?php echo $bg;?>" align="center">
 <input type="hidden" name="hdnemail<?php echo $i; ?>" id="hdnemail<?php echo $i; ?>" value="<?php  echo $row7["register_user_email"]; ?>" />
 <input type="checkbox" name="chknews<?php echo $i; ?>" id="chknews<?php echo $i; ?>" value="1" /></td>
  <td bgcolor="<?php echo $bg;?>"><?php  echo $row7["register_user_first_name"]." ".$row7["register_user_last_name"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php echo $row7["register_user_address"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php echo $kidsbirthdate;?></td>
 <td bgcolor="<?php echo $bg;?>" align="center"><img src="images/zoom.png" alt="View" width="20" height="20" border="0" title="View" style="cursor:pointer;"/>
 </tr>

<?php
		  $i++; }
		  
		   }
				else
				{
					$err="No Record Found";
				?>
				<tr>
					<td colspan="14" align="center" bgcolor="#FFFFFF"><?php echo $err; ?></td>
				</tr>
				<?php
				}
		  
		  ?>

 </table>
  </div>

</td>
</tr>
 <tr>
    <td>
    

        <table width="100%" border="0" cellpadding="5" cellspacing="0">
              
                                    
                        <tr>
                          <td width="6%" align="right" valign="middle" class="normal_fonts9" >Message  </td>
                          <td width="2%" class="normal_fonts9">:</td>
                          <td width="92%" class="normal_fonts9"><textarea rows="5" cols="30" name="message" style="border:1px solid #ccc;" ></textarea></td>
                        </tr>                         
                         <tr>
                          <td align="right" valign="top" class="normal_fonts9" >&nbsp;</td>
                          <td class="normal_fonts9">&nbsp;</td>
                          <td class="normal_fonts9">
                          <input type="hidden" name="process" value="send_message" />
                          <input type="submit" value="Send" name="submit" style="width:80px; height:30px"  /></td>
                        </tr>
                        
              <tr>
                <td height="10" colspan="4" align="right" class="normal_fonts9"></td>
              </tr>
            </table>    
           
    
    </td>
  </tr>
  

          </table>
     </td></tr>    
          
          
</table>
  </form>
      </td>
      </tr>
      </table></td></tr>
      </table></td></tr>
      
      
    </table></td>
  </tr>
  
  <tr>
        <td align="center" valign="middle">
        <?php  include("footer.php"); ?>
        </td>
  </tr>
</table>
 </td></tr></table>

</body>
</html>
