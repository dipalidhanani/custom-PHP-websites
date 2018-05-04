<?php session_start();

	require_once("config.inc.php");

	require_once("Database.class.php");

	require_once("session_check.php");

	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 

	$db->connect();	?>

    <?php

	$r=mysql_query("select * from review_mst where Review_Id='".$_REQUEST['eid']."'");

	$k=mysql_fetch_array($r);

	?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo ADMIN_TITLE; ?></title>

<link href="css/css.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="css/menu_style.css" type="text/css" />

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

            <td class="normal_fonts14_black"><a href="review.php">Product Review Details</a></td>

            </tr>

          <tr>

            <td>

            <form name="frmcountry"  method="post" action="#">

            <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">

              <tr>

                <td width="300" align="right" bgcolor="#f3f3f3" class="normal_fonts9">Product Name</td>

                <td width="10" align="center" bgcolor="#f3f3f3" class="normal_fonts9">:</td>

                <td bgcolor="#f3f3f3" class="normal_fonts9">

                <?php 

			   $prod=mysql_query("select * from prod_mst where Is_Active=1 and Prod_Id='".$k['Prod_Id']."'");

			   $p=mysql_fetch_array($prod);

			   echo $p['Prod_Name'];

			    ?>

                </td>

              </tr>

              <tr>

                <td align="right" bgcolor="#FFFFFF" class="normal_fonts9">Review By</td>

                <td align="center" bgcolor="#FFFFFF" class="normal_fonts9">:</td>

                <td bgcolor="#FFFFFF" class="normal_fonts9"><?php echo $k['Name'];?></td>

              </tr>
              <tr>
                <td align="right" bgcolor="#f3f3f3" class="normal_fonts9">E-Mail Address</td>
                <td align="center" bgcolor="#f3f3f3" class="normal_fonts9">:</td>
                <td bgcolor="#f3f3f3" class="normal_fonts9"><?php echo $k['review_email_address'];?></td>
              </tr>

              <tr>

                <td align="right" class="normal_fonts9">Date</td>

                <td align="center" class="normal_fonts9">:</td>

                <td class="normal_fonts9"><?php echo $k['Dt']; ?></td>

              </tr>

              <tr>

                <td align="right" bgcolor="#f3f3f3" class="normal_fonts9">Is Approved by Admin</td>

                <td align="center" bgcolor="#f3f3f3" class="normal_fonts9">:</td>

                <td bgcolor="#f3f3f3" class="normal_fonts9"><?php if($k['Is_Approve']=='0') { echo "Not Approved"; } else { echo "Approved"; } ?></td>

              </tr>

              <tr>

                <td align="right" valign="top" class="normal_fonts9">Description</td>

                <td align="left" valign="top" class="normal_fonts9">:</td>

                <td align="left" valign="top" class="normal_fonts9" style="text-align:justify;"><?php echo $k['Description']; ?></td>

              </tr>

              <tr>

                <td height="10" colspan="3" align="right" class="normal_fonts9"></td>

              </tr>

              <tr>

                <td align="right" bgcolor="#F3F3F3" class="normal_fonts9">&nbsp;</td>

                <td align="center" bgcolor="#F3F3F3" class="normal_fonts9">&nbsp;</td>

                <td bgcolor="#F3F3F3" class="normal_fonts9"><input name="button4" type="button" class="normal_fonts12_black" id="button4" style="width:80px; height:30px" value="Back" onclick="javascript:history.go(-1);" /></td>

              </tr>

              <tr>

                <td height="10" colspan="3" align="right" class="normal_fonts9"></td>

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

</body>

</html>

