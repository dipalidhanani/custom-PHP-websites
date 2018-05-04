<?php

session_start();

require_once("include/config.php");

require_once("include/function.php");

u_Connect("cn");

?>

<link href="css/home.css" rel="stylesheet" type="text/css" />

<table width="100%" border="0" cellspacing="0" cellpadding="0">



  <tr>

    <td width="10">&nbsp;</td>

    <td align="left" valign="top">

    <table width="100%" border="0" cellspacing="0" cellpadding="5">

  <tr>

    <td class="titel_2"><strong>My Orders</strong></td>

  </tr>

  <tr>

    <td><table width="100%" border="0" background="images/pgbg02a.jpg"cellpadding="5" cellspacing="0" class="border3">

          <tr class="font10">

            <td width="25%" height="30" bgcolor="#E7AF78" ><strong>Billing Name</strong></td>

            <td width="15%" align="center" bgcolor="#E7AF78"><strong>Invoice No.</strong></td>

            <td width="15%" align="center" bgcolor="#E7AF78"><strong>Amount</strong></td>

            <td width="15%" align="center" bgcolor="#E7AF78"><strong>Payment Status</strong></td>

            <td width="24%" align="center" bgcolor="#E7AF78"><strong>Datetime</strong></td>

            <td width="6%" bgcolor="#E7AF78">&nbsp;</td>

          </tr>

          <?php

			$recordsetmyorders = mysql_query("select * from bill_master where bill_email_id='".$_SESSION['sqjeansloginuseremail']."' and  (bill_payment_status='Completed' or bill_payment_status='Pending') order by bill_master_ID desc ",$cn);

			 while($rowmyorders = mysql_fetch_array($recordsetmyorders,MYSQL_ASSOC))

			 {	

			?>

          <tr class="font9">

            <td class="font10" height="25"><?php  echo $rowmyorders["bill_name_user"];?></td>

            <td align="center"><?php echo $rowmyorders["bill_invoice_no"];?></td>

            <td align="center">$<?php echo $rowmyorders["bill_final_amount"];?></td>

            <td align="center"><?php echo $rowmyorders["bill_payment_status"];?></td>

            <td align="center"><?php 

							$datetime=$rowmyorders["bill_payment_transaction_recieve_datetime"];

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

            <td align="center"><a href="index.php?object=11&order=<?php echo base64_encode($rowmyorders["bill_invoice_no"])?>"><img src="images/view.png" width="20" height="20" border="0" /></a></td>

          </tr>

          <?php

			 }

			 ?>

        </table></td>

  </tr>

</table>



    </td>

    <td width="10">&nbsp;</td>

  </tr>



</table>