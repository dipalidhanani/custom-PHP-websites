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



<table width="99%" border="0" cellspacing="10" cellpadding="0" >

    <tr>
      
      <td align="left" class="normal_fonts14_black">My Details</td>
      
    </tr>

    <tr>

      <td><table width="99%" border="0" align="center" cellpadding="5" cellspacing="0" class="border">

        <?php

		   $recordsetreseller = mysql_query("select * from reseller_master where reseller_id ='".$_SESSION['sqjeansresellerlogin']."'",$cn);

			while($rowreseller = mysql_fetch_array($recordsetreseller,MYSQL_ASSOC))

            {

		
				?>

       <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Reseller Name</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["reseller_name"]; ?></td>
          </tr>
            <tr bgcolor="#F3F3F3">
            <td width="30%" align="right" valign="top" class="normal_fonts9">Reseller Emailid</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["reseller_emailid"]; ?></td>
          </tr>
           
            <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Contact No</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["reseller_contactno"]; ?></td>
          </tr>
            <tr bgcolor="#F3F3F3">
            <td width="30%" align="right" valign="top" class="normal_fonts9">Address</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["reseller_location"]; ?>
            </td>
          </tr>
          <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">City</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["reseller_city"]; ?></td>
          </tr>
           <tr bgcolor="#F3F3F3">
            <td width="30%" align="right" valign="top" class="normal_fonts9">State</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["reseller_state"]; ?></td>
          </tr>
           <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Country</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php echo $rowreseller["reseller_country"]; ?></td>
          </tr>


        <?php

		}

		?>

       

      </table></td>

    </tr>

      

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