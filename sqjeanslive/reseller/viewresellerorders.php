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

<link href="css/css.css" rel="stylesheet" type="text/css" />

<?php

require_once("include/files.php");

?>

</head>

<body>

<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td align="left" valign="top" bgcolor="#FFFFFF"><?php include("header.php");?></td>

      </tr>

      

      

     


<tr>
  <td bgcolor="#FFFFFF">



<table width="980" border="0" cellspacing="10" cellpadding="0" >

    <tr>
      
      <td align="left" class="normal_fonts14_black" colspan="2">Reseller Order Details</td>
      
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

      <td width="490" valign="top"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" class="border">

        
          <tr>
            <td width="33%" align="right" valign="top" class="normal_fonts9">Order Date</td>
            <td width="3%" align="left" valign="top">:</td>
            <td width="64%" align="left" valign="top" class="normal_fonts9" ><?php echo $reseller_order_date; ?></td>
          </tr>
          
          <tr bgcolor="#F3F3F3">
            <td width="33%" align="right" valign="top" class="normal_fonts9">Customer Name</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9" width="64%"><?php echo $rowreseller["customer_name"]; ?></td>
          </tr>
            <tr>
            <td width="33%" align="right" valign="top" class="normal_fonts9">Order For</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9" width="64%"><?php echo $rowreseller["reseller_order_for"]; ?></td>
          </tr>
           <tr  bgcolor="#F3F3F3">
            <td width="33%" align="right" valign="top" class="normal_fonts9">Fabric</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9" width="64%"><?php echo $rowreseller["fabric"]; ?></td>
          </tr>
        
          <tr>
            <td width="33%" align="right" valign="top" class="normal_fonts9">Wash Treatment</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9" width="64%"><?php echo $rowreseller["wash_treatment"]; ?></td>
          </tr>
            <tr bgcolor="#F3F3F3">
            <td width="33%" align="right" valign="top" class="normal_fonts9">Special Wash</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9" width="64%"><?php echo $rowreseller["special_wash"]; ?>
            </td>
          </tr>
          <tr>
            <td width="33%" align="right" valign="top" class="normal_fonts9">Rise</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9" width="64%"><?php echo $rowreseller["rise"]; ?></td>
          </tr>
           <tr bgcolor="#F3F3F3">
            <td width="33%" align="right" valign="top" class="normal_fonts9">Fitting Style</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9" width="64%"><?php echo $rowreseller["fitting_style"]; ?></td>
          </tr>
           <tr>
            <td width="33%" align="right" valign="top" class="normal_fonts9">Leg Style</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9" width="64%"><?php echo $rowreseller["leg_style"]; ?></td>
          </tr>
           <tr  bgcolor="#F3F3F3">
            <td width="33%" align="right" valign="top" class="normal_fonts9">Thread Color (Primary)</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9" width="64%"><?php echo $rowreseller["thread_primary"]; ?></td>
          </tr>
           <tr>
            <td width="33%" align="right" valign="top" class="normal_fonts9">Thread Color (Secondary)</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9" width="64%"><?php echo $rowreseller["thread_secondary"]; ?></td>
          </tr>
           <tr  bgcolor="#F3F3F3">
            <td width="33%" align="right" valign="top" class="normal_fonts9">Fly Style</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9" width="64%"><?php echo $rowreseller["fly_style"]; ?></td>
          </tr>
           <tr>
            <td width="33%" align="right" valign="top" class="normal_fonts9">Front Pocket Style</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9" width="64%"><?php echo $rowreseller["frontpocket_style"]; ?></td>
          </tr>
           <tr bgcolor="#F3F3F3">
            <td width="33%" align="right" valign="top" class="normal_fonts9">Back Pocket Style</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9" width="64%"><?php echo $rowreseller["backpocket_style"]; ?></td>
          </tr>
           <tr>
            <td width="33%" align="right" valign="top" class="normal_fonts9">Buttons & Rivets Style</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9" width="64%"><?php echo $rowreseller["buttonrivets_style"]; ?></td>
          </tr>
           <tr bgcolor="#F3F3F3">
            <td width="33%" align="right" valign="top" class="normal_fonts9">Belt Style</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9" width="64%"><?php echo $rowreseller["belt_style"]; ?></td>
          </tr>
           <tr>
            <td width="33%" align="right" valign="top" class="normal_fonts9">Loops Style</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9" width="64%"><?php echo $rowreseller["loops_style"]; ?></td>
          </tr>
           <tr bgcolor="#F3F3F3">
            <td width="33%" align="right" valign="top" class="normal_fonts9">Embroidery Style</td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9" width="64%"><?php echo $rowreseller["embroidery_style"]; ?></td>
          </tr>
           
        

      </table></td>
        <td width="490" valign="top"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" class="border">

           <tr>
            <td width="130" align="right" valign="top" class="normal_fonts9">Full Length</td>
            <td width="3" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["full_length"]; ?></td>
          </tr>
           <tr bgcolor="#F3F3F3">
            <td width="130" align="right" valign="top" class="normal_fonts9">Inside Length</td>
            <td width="3" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9" width="310"><?php echo $rowreseller["inside_length"]; ?></td>
          </tr>
           <tr>
            <td width="130" align="right" valign="top" class="normal_fonts9">Seat</td>
            <td width="3" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["seat"]; ?></td>
          </tr>
           <tr bgcolor="#F3F3F3">
            <td width="130" align="right" valign="top" class="normal_fonts9">Waist</td>
            <td width="3" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["waist"]; ?></td>
          </tr>
           <tr>
            <td width="130" align="right" valign="top" class="normal_fonts9">Front Rise </td>
            <td width="3" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["front_rise"]; ?></td>
          </tr>
           <tr bgcolor="#F3F3F3">
            <td width="130" align="right" valign="top" class="normal_fonts9">Front Low </td>
            <td width="3" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["front_low"]; ?></td>
          </tr>
           <tr>
            <td width="130" align="right" valign="top" class="normal_fonts9">Back Rise </td>
            <td width="3" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["back_rise"]; ?></td>
          </tr>
           <tr bgcolor="#F3F3F3">
            <td width="130" align="right" valign="top" class="normal_fonts9">Full U-Crotch </td>
            <td width="3" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["full_ucrotch"]; ?></td>
          </tr>
           <tr>
            <td width="130" align="right" valign="top" class="normal_fonts9">Thighs On 1 </td>
            <td width="3" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["thighs_on1"]; ?></td>
          </tr>
            <tr bgcolor="#F3F3F3">
            <td width="130" align="right" valign="top" class="normal_fonts9">Thighs On 6 </td>
            <td width="3" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["thighs_on6"]; ?></td>
          </tr>
            <tr>
            <td width="130" align="right" valign="top" class="normal_fonts9">Knee </td>
            <td width="3" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["knee"]; ?></td>
          </tr>
            <tr bgcolor="#F3F3F3">
            <td width="130" align="right" valign="top" class="normal_fonts9">Bottom </td>
            <td width="3" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["bottom"]; ?></td>
          </tr>
            <tr>
            <td width="130" align="right" valign="top" class="normal_fonts9">Order Details</td>
            <td width="3" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"  width="310"><?php echo $rowreseller["order_details1"]; ?></td>
          </tr>
            <tr>
            <td width="130" align="right" valign="top" class="normal_fonts9">&nbsp;</td>
            <td width="3" align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top" class="normal_fonts9"  width="310"><?php echo $rowreseller["order_details2"]; ?></td>
          </tr>
          

      </table></td>

    </tr>

       <?php

		}

		?>

</table>

</td></tr>

    </table></td>

  </tr>

  <tr>

    <td><?php include("footer.php");?></td>

  </tr>

</table>

 

</body>

</html>