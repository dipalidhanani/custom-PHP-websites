<?php session_start();

	require_once("config.inc.php");

	require_once("Database.class.php");

	require_once("session_check.php");

	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 

	$db->connect();	?>

    <?php

	$country=mysql_query("select * from bill_mst where Order_Id='".$_REQUEST['eid']."'");

	$k=mysql_fetch_array($country);

	?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo ADMIN_TITLE; ?></title>

<link href="css/css.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="css/menu_style.css" type="text/css" />

	<script src="calender/js/format1.js"></script>

    <script src="calender/js/format.js"></script>

	<link rel="stylesheet" type="text/css" href="calender/css/format.css" />

    <link rel="stylesheet" type="text/css" href="calender/css/border-radius.css" />

    <link rel="stylesheet" type="text/css" href="calender/steel/steel.css" />



<style type="text/css">

<!--

body {

	background-color: #E8E8E8;

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

-->

</style></head>

<body>

<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">

  <tr>

    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td height="125" align="left" valign="top" bgcolor="#FFFFFF"><?php include('header.php'); ?>

        </td>

      </tr>

      <tr>

        <td height="2" bgcolor="#000000"></td>

      </tr>

      <tr>

        <td bgcolor="#FFFFFF"><?php include('menu.php'); ?></td>

      </tr>

      <tr>

        <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="10" cellpadding="0">

          <tr>

            <td class="normal_fonts14_black"><a href="invoice.php">Invoice Details</a></td>

            </tr>

          <tr>

            <td>

            <form name="frmbrand"  method="post" action="#">

            <input type="hidden" name="txtid" value="<?php echo $k['Billing_Id']; ?>" />

            <table width="100%" border="0" cellspacing="1" cellpadding="1">

              <tr>

                <td align="left" valign="middle"><table width="100%" border="0" align="right" cellpadding="5" cellspacing="0">

                  <tr>

                    <td align="left" valign="middle" class="normal_fonts9">

                    <table width="100%" border="0" cellspacing="0" cellpadding="0">

                      <tr>

                        <td width="49%" align="left" valign="top" class="normal_fonts10">

                        <table width="100%" border="0" align="left" cellpadding="5" cellspacing="0" class="border">

                          <tr>

                            <td height="32" colspan="3" align="left" valign="middle" bgcolor="#CCCCCC" class="normal_fonts12_black">Payment Detail</td>

                            </tr>

                          <tr>

                            <td width="150" height="32" align="right" valign="middle" bgcolor="#f3f3f3">Invoice No</td>

                            <td width="10" height="32" align="center" valign="middle" bgcolor="#f3f3f3">:</td>

                            <td height="32" align="left" valign="middle" bgcolor="#f3f3f3">

                            <?php echo $k['Invoice_No']; ?>

                           </td>

                          </tr>

                          <tr>

                            <td height="32" align="right" valign="middle">Order No</td>

                            <td height="32" align="center" valign="middle">:</td>

                            <td height="32" align="left" valign="middle"><?php 

				$order_qry=mysql_query("select * from order_mst where Order_Id='".$k['Order_Id']."'");

				$o=mysql_fetch_array($order_qry);

				echo $o['Order_No'];

				; ?></td>

                          </tr>

                          <tr>

                            <td height="32" align="right" valign="middle" bgcolor="#f3f3f3">Billing Date</td>

                            <td height="32" align="center" valign="middle" bgcolor="#f3f3f3">:</td>

                            <td height="32" align="left" valign="middle" bgcolor="#f3f3f3"><?php echo date('d/m/Y',strtotime($k['Billing_Date'])); ?></td>

                          </tr>

                          <tr>

                            <td height="32" align="right" valign="middle">Bill Amount</td>

                            <td height="32" align="center" valign="middle">:</td>

                            <td height="32" align="left" valign="middle"><?php echo $k['Bill_Amount']; ?> INR</td>

                          </tr>

                          <tr>

                            <td height="32" align="right" valign="middle" bgcolor="#f3f3f3">Rmaining Amount</td>

                            <td height="32" align="center" valign="middle" bgcolor="#f3f3f3">:</td>

                            <td height="32" align="left" valign="middle" bgcolor="#f3f3f3"><?php echo $k['Remaing_Amount']; ?> INR</td>

                          </tr>

                          <tr>

                            <td height="32" align="right" valign="middle" bgcolor="#FFFFFF">Payment Status</td>

                            <td height="32" align="center" valign="middle" bgcolor="#FFFFFF">:</td>

                            <td height="32" align="left" valign="middle" bgcolor="#FFFFFF">

                            <?php echo $k['Status']; ?>

                            </td>

                          </tr>

                          <!--<tr>

                            <td height="32" align="right" valign="middle" bgcolor="#f3f3f3">Description</td>

                            <td height="32" align="center" valign="middle" bgcolor="#f3f3f3">:</td>

                            <td height="32" align="left" valign="middle" bgcolor="#f3f3f3"><?php echo $k['Description']; ?></td>

                          </tr>-->

                          <!--<tr>

                            <td height="32" align="right" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>

                            <td height="32" align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>

                            <td height="32" align="left" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>

                          </tr>-->

                        </table>

                        </td>

                         <td width="10" align="left" valign="top" class="normal_fonts10">&nbsp;</td>

                        <td align="left" valign="top">

                        <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" class="border">

                        <?php 

							$cust=mysql_query("select * from user_mst where User_Id='".$o['User_Id']."'");

							$c=mysql_fetch_array($cust);

							?>

                          <tr>

                            <td height="32" colspan="3" align="left" valign="middle" bgcolor="#CCCCCC" class="normal_fonts12_black">User Detail</td>

                            </tr>

                          <tr>

                            <td width="150" height="32" align="right" valign="middle" bgcolor="#f3f3f3">Name</td>

                            <td width="10" height="32" align="center" valign="middle" bgcolor="#f3f3f3">:</td>

                            <td height="32" align="left" valign="middle" bgcolor="#f3f3f3">

                            <?php echo $c['First_Name']." ".$c['Middle_Name']." ".$c['Last_Name']; ?>

							</td>

                          </tr>

                          <tr>

                            <td width="150" height="32" align="right" valign="middle">Address</td>

                            <td height="32" align="center" valign="middle">:</td>

                            <td height="32" align="left" valign="middle">

                             <?php 

									echo $c['Address1'];

							?>



                            </td>

                          </tr>

                          <tr id="pgate">

                            <td width="150" height="32" align="right" valign="middle" bgcolor="#f3f3f3">Zipcode</td>

                            <td height="32" align="center" valign="middle" bgcolor="#f3f3f3">:</td>

                            <td height="32" align="left" valign="middle" bgcolor="#f3f3f3">

                            <?php 

									echo $c['Pincode'];

							?>

                            </td>

                          </tr>

                          <tr id="pdata">

                            <td width="150" height="32" align="right" valign="middle">Country</td>

                            <td height="32" align="center" valign="middle">:</td>

                            <td height="32" align="left" valign="middle">

                            <?php 

									$cou=mysql_query("select * from country where Country_Id='".$c['Country_Id']."'");	

									$co=mysql_fetch_array($cou);

									echo $co['Name'];

							?>

                            </td>

                          </tr>

                          <tr id="pcurrency">

                            <td width="150" height="32" align="right" valign="middle" bgcolor="#f3f3f3">State</td>

                            <td height="32" align="center" valign="middle" bgcolor="#f3f3f3">:</td>

                            <td height="32" align="left" valign="middle" bgcolor="#f3f3f3">

                            <?php 

								$st=mysql_query("select * from state where State_Id='".$c['State_Id']."'");	

								$s=mysql_fetch_array($st);

								echo $s['Name'];

							?>

                            </td>

                          </tr>

                          <tr id="ch_df">

                            <td width="150" height="32" align="right" valign="middle">City</td>

                            <td height="32" align="center" valign="middle">:</td>

                            <td height="32" align="left" valign="middle">

                            <?php $new_city=mysql_query("select * from city_mst where city_id='".$c['City']."'");	
		$disp_city=mysql_fetch_array($new_city);
		echo $disp_city['city_name'];
		?>

                            </td>

                          </tr>

                          <tr id="ch_df_no">

                            <td width="150" height="32" align="right" valign="middle" bgcolor="#f3f3f3">E-Mail Address</td>

                            <td height="32" align="center" valign="middle" bgcolor="#f3f3f3">:</td>

                            <td height="32" align="left" valign="middle" bgcolor="#f3f3f3">

                            <?php 

									echo $c['Email_Address'];

							?>

                            </td>

                          </tr>

                          <tr id="ch_df_date">

                            <td width="150" height="32" align="right" valign="middle">Contact No.</td>

                            <td height="32" align="center" valign="middle">:</td>

                            <td height="32" align="left" valign="middle">

                            <?php 

									echo $c['Phone'];

							?>

</td>

                          </tr>

                          <tr>

                            <td height="32" align="right" valign="middle" bgcolor="#f3f3f3">Mobile No.</td>

                            <td height="32" align="center" valign="middle" bgcolor="#f3f3f3">:</td>

                            <td height="32" align="left" valign="middle" bgcolor="#f3f3f3"><?php 

									echo $c['Mobile'];

							?></td>

                          </tr>

                        </table>

                        </td>

                      </tr>

                    </table>

                    </td>

                    </tr>

                </table></td>

              </tr>

              <tr>

                <td align="center" valign="middle"><input name="back" type="button" class="normal_fonts12_black" value="Back" onclick="javascript:history.go(-1);" /></td>

              </tr>

              <tr>

                <td align="left" valign="middle">&nbsp;</td>

              </tr>

            </table>

            </form>

            </td>

          </tr>

          </table></td>

      </tr>

    </table></td>

  </tr>

</table>

<table width="100%" border="0" cellspacing="0" cellpadding="5">

  <tr>

    <td><?php include("footer.php"); ?></td>

  </tr>

</table>

</body>

</html>

