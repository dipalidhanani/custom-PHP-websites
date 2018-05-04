<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");


$invoice=$_SESSION['currentpaidinvoice'];

$message ="Thank you for your order on SQ Jeans.";

if($_SESSION['currentpaidinvoice']!="")
{
?>
<link href="css/home.css" rel="stylesheet" type="text/css" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td width="10">&nbsp;</td>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td class="titel_2"><strong>Order Completed</strong></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" background="images/pgbg02a.jpg" class="border3" cellspacing="3" cellpadding="3">
              <tr>
                <td class="font10"><?php echo $message;?></td>
              </tr>
              <tr>
                <td class="font10">Your invoice number is : <?php echo $invoice;?></td>
              </tr>
              <tr>
                <td class="font10">We will update you once your payment has been cleared.</td>
              </tr>
              <tr>
                <td class="font10">Kindly save your invoice for further references.</td>
              </tr>
              <tr>
                <td class="font10">Thanks,</td>
              </tr>
              <tr>
                <td class="font10">SQ Jeans</td>
              </tr>
</table></td>
  </tr>
</table>

    </td>
    <td width="10">&nbsp;</td>
  </tr>

</table>
<?php
}
else
{
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td width="10">&nbsp;</td>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td class="titel_2">Sorry, Access Denied</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="3" cellpadding="3">
              <tr>
                <td class="font10">You have already completed this transaction..</td>
              </tr>
              <tr>
                <td class="font10">Thanks,</td>
              </tr>
              <tr>
                <td class="font10">SQ Jeans</td>
              </tr>
</table></td>
  </tr>
</table>

    </td>
    <td width="10">&nbsp;</td>
  </tr>

</table>
<?php
}
?>