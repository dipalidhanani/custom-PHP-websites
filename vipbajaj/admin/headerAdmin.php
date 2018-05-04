<?php
session_start();
include("include/config.php");
	if($_SESSION['Admin_id'] == "")
	{
			echo "<script>location.href='login.php';</script>";
			exit();
	}
	else
	{
	$query = "select * from admin_mast where Admin_name = '".$_SESSION['Admin_name']."'";
	$rs = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($rs);
	$a = $row['Admin_name'];
	$ad = $row['Is_master_admin'];
	}

?>
<link href="../css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../menu_style.css" type="text/css" />
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
</style>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="125" align="left" valign="top" bgcolor="#FFFFFF">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="125" valign="middle"><img src="../images/v3 logo .png" width="125" height="125" /></td>
            <td>&nbsp;</td>
            <td width="250" align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="normal_fonts14_black"><strong>Welcome   		<?php echo $a; ?></strong></td>
              </tr>
              <tr>
                <td height="10"></td>
              </tr>
              <tr>
                <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="10">&nbsp;</td>
                    <td class="normal_fonts12_black"><a href="logout.php">Logout</a> |
                    <a href="changepassword.php" class="normal_fonts10">ChangePassword</a>
                    </td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="2" bgcolor="#000000"></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><div class="menu">
          <ul>
            <li><a href="welcomeAdmin.php" >Home</a></li>           
            <li><a href="model.php">Model</a></li> 
            <li><a href="feature.php">Features & Specifications</a></li>
            <li><a href="#">Vehicle</a>
            <ul>
            <li><a href="bike.php">Bike</a></li>
            <li><a href="auto.php">Auto</a></li>
            </ul>
            </li>
            <li><a href="#">Inquiry</a>
            <ul>
                <li><a href="book_test_drive.php">Book Test Drive</a></li>
                <li><a href="book_service.php">Book Service</a></li>
                <li><a href="bike_inquiry.php">Bike Inquiry</a></li>
                <li><a href="exchange_bonanza.php">Exchange Bonanza</a></li>
                <li><a href="finance.php">Finance</a></li>
             </ul>
             </li>
              <li><a href="door_step.php">Door Step</a></li>
              <li><a href="color.php">Color</a></li>
              <li><a href="news.php">News</a></li>
              <li><a href="event.php">Events</a></li>
               <li><a href="pricing_table.php">Pricing</a></li>
            </ul>
          </div></td>
      </tr>
       
          </table>
          </td>
      </tr>
    </table></td>
  </tr>
</table>
