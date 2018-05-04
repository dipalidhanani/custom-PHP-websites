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
<title>Welcome to SQ Jeans - Admin Panel</title>
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
      <?php
	  if($_REQUEST["action"]=="")
	  {
	  ?>
      <tr>
        <td align="right"><table border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td><a href="resellers.php?action=new"><img src="images/add.png" width="20" height="20" border="0" /></a></td>
            <td class="normal_fonts12_black"><a href="resellers.php?action=new">New Reseller</a>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left" bgcolor="#ccc"><table width="100%" border="0" cellpadding="5" cellspacing="1" >
        <form name="reseller" action="process.php" method="post">
          <tr class="normal_fonts10">
            <td align="left" bgcolor="#999999" width="9%"><strong>Name</strong></td>
            <td width="11%" align="left" bgcolor="#999999"><strong>Emailid</strong></td>
            <td width="11%" align="left" bgcolor="#999999"><strong>Password</strong></td>
            <td width="9%" align="left" bgcolor="#999999"><strong>Contact No</strong></td>
            <td width="14%" align="left" bgcolor="#999999"><strong>Location</strong></td>
             <td width="8%" align="left" bgcolor="#999999"><strong>City</strong></td>
              <td width="8%" align="left" bgcolor="#999999"><strong>State</strong></td>
               <td width="8%" align="left" bgcolor="#999999"><strong>Country</strong></td>
                <td width="13%" align="center" bgcolor="#999999"><strong>View Orders</strong></td>
            <td width="9%" align="center" bgcolor="#999999"><strong>Action</strong></td>
            </tr>
            <?php
			 $i=1;
			 $query="SELECT * FROM reseller_master order by reseller_name";			
			 $recordsetreseller = mysql_query($query);
			 while($rowreseller = mysql_fetch_array($recordsetreseller,MYSQL_ASSOC))
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
          <tr class="normal_fonts9">
            <td align="left" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $rowreseller["reseller_name"];?></td>
           
           <td align="left" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $rowreseller["reseller_emailid"];?></td>
           <td align="left" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo base64_decode($rowreseller["reseller_password"]);?></td>
           <td align="left" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $rowreseller["reseller_contactno"];?></td>
           <td align="left" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $rowreseller["reseller_location"];?></td>
           <td align="left" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $rowreseller["reseller_city"];?></td>
           <td align="left" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $rowreseller["reseller_state"];?></td>
           <td align="left" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $rowreseller["reseller_country"];?></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>">
            
            <a href="resellers.php?action=view_orders&resellerid=<?php echo $rowreseller["reseller_id"];?>"><img src="images/zoom.png" width="20" height="20" border="0" /></a>
            </td>
          
           
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                              <tr>
                                <td align="center"><a href="resellers.php?action=edit&resellerid=<?php echo $rowreseller["reseller_id"];?>"><img src="images/edit.png" width="20" height="20" border="0" /></a></td>
                                <td align="center"><a href="process.php?process=removereseller&resellerid=<?php echo $rowreseller["reseller_id"];?>" onClick="return confirm('Do you want to delete selected Reseller?')"><img src="images/delete_on.gif" width="20" height="20" border="0" /></a></td>
                              </tr>
                </table></td>
            </tr>         
            <?php
			$i++;
			 }
			 ?>
           
            </form>
        </table></td>
      </tr>
      <?php
	  }
	  if($_REQUEST["action"]=="new")
	  {
	  ?>
      <tr>
        <td align="left">
        <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">         
          <tr class="normal_fonts10">
            <td align="left" bgcolor="#999999"><strong>New Reseller</strong></td>
            </tr>
            <tr class="normal_fonts9">
            <td align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
            <form name="resellerform" method="post" action="process.php" enctype="multipart/form-data">
          <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Reseller Name</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="resellername" type="text" class="normal_fonts9" size="50" /></td>
          </tr>
            <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Reseller Emailid</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="reselleremail" type="text" class="normal_fonts9" size="50" /></td>
          </tr>
            <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Reseller Password</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="resellerpassword" type="text" class="normal_fonts9" size="50" /></td>
          </tr>
            <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Contact No</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="resellercontact" type="text" class="normal_fonts9" size="50" /></td>
          </tr>
            <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Address</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <textarea name="reselleraddress" id="reselleraddress" rows="5" cols="46" class="normal_fonts9" ></textarea>
            </td>
          </tr>
          <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">City</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="resellercity" type="text" class="normal_fonts9" size="50" /></td>
          </tr>
           <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">State</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="resellerstate" type="text" class="normal_fonts9" size="50" /></td>
          </tr>
           <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Country</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="resellercountry" type="text" class="normal_fonts9" size="50" /></td>
          </tr>
         <tr>
            <td align="right" valign="top" class="normal_fonts9">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="hidden" name="process" value="newreseller" />
            <input name="submit" type="submit" class="normal_fonts9" value="submit" /></td>
          </tr>
          </form>
            </table>            </td>
            </tr>
          </table>        </td>
      </tr>
      <?php
	  }
	  if($_REQUEST["action"]=="edit")
	  {
	  ?>
      <tr>
        <td align="left">
        <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">         
          <tr class="normal_fonts10">
            <td align="left" bgcolor="#999999"><strong>Change Reseller Details</strong></td>
            </tr>
            <tr class="normal_fonts9">
            <td align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
            <form name="resellerform" method="post" action="process.php" enctype="multipart/form-data">
           <?php
		   $query="SELECT * FROM reseller_master where reseller_id='".$_GET["resellerid"]."'";			
			 $recordsetreseller = mysql_query($query);
			 while($rowreseller = mysql_fetch_array($recordsetreseller,MYSQL_ASSOC))
			 {
			 ?>
            <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Reseller Name</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="resellername" type="text" class="normal_fonts9" size="50" value="<?php echo $rowreseller["reseller_name"]; ?>" /></td>
          </tr>
            <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Reseller Emailid</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="reselleremail" type="text" class="normal_fonts9" size="50" value="<?php echo $rowreseller["reseller_emailid"]; ?>"/></td>
          </tr>
            <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Reseller Password</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="resellerpassword" type="text" class="normal_fonts9" size="50" value="<?php echo base64_decode($rowreseller["reseller_password"]); ?>" /></td>
          </tr>
            <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Contact No</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="resellercontact" type="text" class="normal_fonts9" size="50" value="<?php echo $rowreseller["reseller_contactno"]; ?>" /></td>
          </tr>
            <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Address</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
			 <textarea name="reselleraddress" id="reselleraddress" rows="5" cols="46" class="normal_fonts9" ><?php echo $rowreseller["reseller_location"]; ?></textarea>
            </td>
          </tr>
          <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">City</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="resellercity" type="text" class="normal_fonts9" size="50" value="<?php echo $rowreseller["reseller_city"]; ?>" /></td>
          </tr>
           <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">State</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="resellerstate" type="text" class="normal_fonts9" size="50" value="<?php echo $rowreseller["reseller_state"]; ?>" /></td>
          </tr>
           <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Country</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="resellercountry" type="text" class="normal_fonts9" size="50" value="<?php echo $rowreseller["reseller_country"]; ?>" /></td>
          </tr>

          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">             
            <input type="hidden" name="resellerid" value="<?php echo $_GET["resellerid"];?>" />
            <input type="hidden" name="process" value="editreseller" />
            <input name="submit" type="submit" class="normal_fonts9" value="submit" /></td>
          </tr>
          <?php
		  }
		  ?>
          </form>
            </table>            </td>
            </tr>
          </table>        </td>
      </tr>
      <?php
	  }
	  
	  if($_REQUEST["action"]=="view_orders")
	  {
	  ?>
       <tr>
        <td align="left">
        
         <table width="100%" border="0" cellpadding="0" cellspacing="5" >         
          <tr class="normal_fonts10">
            <td align="left"><strong>Reseller Orders</strong></td>
            </tr>
            <tr class="normal_fonts9">
            <td align="left" valign="top" bgcolor="#ccc">
        <table width="100%" border="0" cellpadding="5" cellspacing="1" >
        <form name="reseller" action="process.php" method="post">
          <tr class="normal_fonts10">
            <td align="left" bgcolor="#999999" width="5%"><strong>No.</strong></td>
            <td align="left" bgcolor="#999999" width="13%"><strong>Order Date</strong></td>
            <td width="15%" align="left" bgcolor="#999999"><strong>Reseller Name</strong></td>
            <td width="18%" align="left" bgcolor="#999999"><strong>Customer Name</strong></td>
            <td width="15%" align="left" bgcolor="#999999"><strong>Order Amount</strong></td>
             <td width="12%" align="left" bgcolor="#999999"><strong>Order Status</strong></td>
              <td width="13%" align="left" bgcolor="#999999"><strong>Payment Status</strong></td>
           
            <td width="9%" align="center" bgcolor="#999999"><strong>Action</strong></td>
            </tr>
            <?php
			$resellerid=$_GET["resellerid"];
			 $i=1;
			 $query="SELECT * FROM reseller_order_master 
			 INNER JOIN reseller_master ON reseller_master.reseller_id =reseller_order_master.reseller_mast_id 
			 where reseller_mast_id ='".$resellerid."' order by reseller_order_ID desc";			
			 $recordsetreseller = mysql_query($query);
			 $totrecords=mysql_num_rows($recordsetreseller);
			 while($rowreseller = mysql_fetch_array($recordsetreseller,MYSQL_ASSOC))
			 {	
			 $dt=explode("-",$rowreseller["reseller_order_date"]);
	   $yy1=$dt[0];
	   $mm1=$dt[1];
	   $dd1=$dt[2];
	   $reseller_order_date=$dd1."-".$mm1."-".$yy1;
			    if($i%2!=0)
				{
					$bg="#FFFFFF";
				}
				else 
				{
					$bg="#F3F3F3";
				}	
			?>
          <tr class="normal_fonts9">
            <td align="left" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $totrecords;?></td>
            <td align="left" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $reseller_order_date;?></td>
            <td align="left" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $rowreseller["reseller_name"];?></td>
           
           <td align="left" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $rowreseller["customer_name"];?></td>
           <td align="left" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $rowreseller["order_amount"];?></td>
            <td align="left" valign="middle" bgcolor="<?php echo $bg;?>">
			
			<?php if($rowreseller["order_completed_status"]==0) { echo "Pending"; }
			
			if($rowreseller["order_completed_status"]==1) { echo "Completed"; }
			if($rowreseller["order_completed_status"]==2) { echo "Canceled"; }
			
			?>
            
            </td>
            <td align="left" valign="middle" bgcolor="<?php echo $bg;?>">
			
			<?php if($rowreseller["order_payment_status"]==0) { echo "Pending"; }
			
			if($rowreseller["order_payment_status"]==1) { echo "Completed"; }
			if($rowreseller["order_payment_status"]==2) { echo "Canceled"; }
			
			?>
            
            </td>
           
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                              <tr>
                                <td align="center"><a href="resellers.php?action=viewreselellrorder&resellerorderid=<?php echo $rowreseller["reseller_order_ID"];?>"><img src="images/zoom.png" width="20" height="20" border="0" /></a></td>
                                <td align="center"><a href="orderstatus_reseller.php?resellerorderid=<?php echo $rowreseller["reseller_order_ID"];?>"><img src="images/edit.png" width="20" height="20" border="0" /></a></td>
                               <?php /*?> <td align="center"><a href="process.php?process=removereseller&resellerid=<?php echo $rowreseller["reseller_id"];?>" onClick="return confirm('Do you want to delete selected Reseller?')"><img src="images/delete_on.gif" width="20" height="20" border="0" /></a></td><?php */?>
                              </tr>
                </table></td>
            </tr>         
            <?php
			$totrecords--; $i++;
			 }
			 ?>
           
            </form>
        </table>
        </td></tr></table>
        </td>
      </tr>
      <?php
	  }
	  if($_REQUEST["action"]=="viewreselellrorder")
	  {
	  ?>
      
      
      <tr>
  <td bgcolor="#FFFFFF">



<table width="100%" border="0" cellspacing="10" cellpadding="0" >

    <tr>
      
      <td align="left" class="normal_fonts14_black" >Reseller Order Details</td>
       <td align="right" class="normal_fonts9"><a href="javascript:history.go(-1)"><img src="images/back_icon.jpg" alt="Back" width="20" height="20" border="0" /></a></td>
      
    </tr>
<?php

		   $recordsetreseller = mysql_query("select * from reseller_order_master where reseller_order_ID ='".$_GET['resellerorderid']."'",$cn);

			while($rowreseller = mysql_fetch_array($recordsetreseller,MYSQL_ASSOC))

            {
	$dt=explode("-",$rowreseller["reseller_order_date"]);
	   $yy1=$dt[0];
	   $mm1=$dt[1];
	   $dd1=$dt[2];
	   $reseller_order_date=$dd1."-".$mm1."-".$yy1;
		
				?>
    <tr>

      <td width="50%" valign="top"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" class="border">

        
          <tr>
            <td width="33%" align="right" valign="top" class="normal_fonts9">Order Date</td>
            <td width="3%" align="left" valign="top">:</td>
            <td width="64%" align="left" valign="top" class="normal_fonts9"><?php echo $reseller_order_date; ?></td>
          </tr>
          <tr bgcolor="#F3F3F3">
            <td width="33%" align="right" valign="top" class="normal_fonts9">Customer Name</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["customer_name"]; ?></td>
          </tr>
           <tr>
            <td width="33%" align="right" valign="top" class="normal_fonts9">Order For</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["reseller_order_for"]; ?></td>
          </tr>
            <tr bgcolor="#F3F3F3">
            <td width="33%" align="right" valign="top" class="normal_fonts9">Fabric</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["fabric"]; ?></td>
          </tr>
           
          <tr>
            <td width="33%" align="right" valign="top" class="normal_fonts9">Wash Treatment</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["wash_treatment"]; ?></td>
          </tr>
            <tr bgcolor="#F3F3F3">
            <td width="33%" align="right" valign="top" class="normal_fonts9">Special Wash</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["special_wash"]; ?>
            </td>
          </tr>
          <tr>
            <td width="33%" align="right" valign="top" class="normal_fonts9">Rise</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["rise"]; ?></td>
          </tr>
           <tr bgcolor="#F3F3F3">
            <td width="33%" align="right" valign="top" class="normal_fonts9">Fitting Style</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["fitting_style"]; ?></td>
          </tr>
           <tr>
            <td width="33%" align="right" valign="top" class="normal_fonts9">Leg Style</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["leg_style"]; ?></td>
          </tr>
           <tr  bgcolor="#F3F3F3">
            <td width="33%" align="right" valign="top" class="normal_fonts9">Thread Color (Primary)</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["thread_primary"]; ?></td>
          </tr>
           <tr>
            <td width="33%" align="right" valign="top" class="normal_fonts9">Thread Color (Secondary)</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["thread_secondary"]; ?></td>
          </tr>
           <tr  bgcolor="#F3F3F3">
            <td width="33%" align="right" valign="top" class="normal_fonts9">Fly Style</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["fly_style"]; ?></td>
          </tr>
           <tr>
            <td width="33%" align="right" valign="top" class="normal_fonts9">Front Pocket Style</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["frontpocket_style"]; ?></td>
          </tr>
           <tr bgcolor="#F3F3F3">
            <td width="33%" align="right" valign="top" class="normal_fonts9">Back Pocket Style</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["backpocket_style"]; ?></td>
          </tr>
           <tr>
            <td width="33%" align="right" valign="top" class="normal_fonts9">Buttons & Rivets Style</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["buttonrivets_style"]; ?></td>
          </tr>
           <tr bgcolor="#F3F3F3">
            <td width="33%" align="right" valign="top" class="normal_fonts9">Belt Style</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["belt_style"]; ?></td>
          </tr>
           <tr>
            <td width="33%" align="right" valign="top" class="normal_fonts9">Loops Style</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["loops_style"]; ?></td>
          </tr>
           <tr bgcolor="#F3F3F3">
            <td width="33%" align="right" valign="top" class="normal_fonts9">Embroidery Style</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["embroidery_style"]; ?></td>
          </tr>
           
        

      </table></td>
        <td width="50%" valign="top"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" class="border">

           <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Full Length</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["full_length"]; ?></td>
          </tr>
           <tr bgcolor="#F3F3F3">
            <td width="30%" align="right" valign="top" class="normal_fonts9">Inside Length</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["inside_length"]; ?></td>
          </tr>
           <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Seat</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["seat"]; ?></td>
          </tr>
           <tr bgcolor="#F3F3F3">
            <td width="30%" align="right" valign="top" class="normal_fonts9">Waist</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["waist"]; ?></td>
          </tr>
           <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Front Rise </td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["front_rise"]; ?></td>
          </tr>
           <tr bgcolor="#F3F3F3">
            <td width="30%" align="right" valign="top" class="normal_fonts9">Front Low </td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["front_low"]; ?></td>
          </tr>
           <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Back Rise </td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["back_rise"]; ?></td>
          </tr>
           <tr bgcolor="#F3F3F3">
            <td width="30%" align="right" valign="top" class="normal_fonts9">Full U-Crotch </td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["full_ucrotch"]; ?></td>
          </tr>
           <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Thighs On 1 </td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["thighs_on1"]; ?></td>
          </tr>
            <tr bgcolor="#F3F3F3">
            <td width="30%" align="right" valign="top" class="normal_fonts9">Thighs On 6 </td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["thighs_on6"]; ?></td>
          </tr>
            <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Knee </td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["knee"]; ?></td>
          </tr>
            <tr bgcolor="#F3F3F3">
            <td width="30%" align="right" valign="top" class="normal_fonts9">Bottom </td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["bottom"]; ?></td>
          </tr>
            <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Order Details</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["order_details1"]; ?></td>
          </tr>
            <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">&nbsp;</td>
            <td width="1%" align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["order_details2"]; ?></td>
          </tr>
          


       

       

      </table></td>

    </tr>

       <?php

		}

		?>

</table>

</td></tr>


 <?php
	  }
	  ?>

    </table></td>
  </tr>
  <tr>
    <td><?php include("footer.php");?></td>
  </tr>
</table>

</body>
</html>
