<?php
session_start();
require_once("../include/config.php");

if($_SESSION['rm_admin_id']=="")
{
	echo "<script type=\"text/javascript\">document.location.href='login.php'; </script>\n";
	exit();
}

$ptid=$_GET['ptid'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RM Realtor - Admin Facility</title>
<link rel="stylesheet" href="css/css.css" type="text/css" />
<link rel="stylesheet" href="menu_style.css" type="text/css" />
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

</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1000"><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
      <tr>
        <td><table width="1000" border="0" cellpadding="0" cellspacing="0" >
          <tr>
            <td bgcolor="#FFFFFF"> <?php include("header.php");?></td>
          </tr>
          <tr>
            <td height="10" bgcolor="#FFFFFF"></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">
            
                <!-- main starts here  --> 
               
<table width="100%" border="0" cellspacing="5" cellpadding="0">
                  <tr>
                    <td height="35"><span class="normal_fonts14_black">View PropertyType Details</span></td>
                    </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
                    <input type="hidden" name="ptid" value= "<?php echo $ptid ?>" >
                    	<?php
						
						$query=mysql_query("select * from property_type_master where property_type_id=$ptid");
						while($row=mysql_fetch_array($query))
						{
						?>

                      <tr>
                        <td width="150" align="right" bgcolor="#FFFFFF" class="normal_fonts9">Property Type</td>
                        <td width="10" align="center" bgcolor="#FFFFFF" class="normal_fonts9">:</td>
                        <td bgcolor="#FFFFFF" class="normal_fonts9"><?php echo $row['property_type_name']; ?> </td>
                        </tr>
                      
                  <?php
						}
						?>
                      
       </table>
   </td>
</tr>
<tr height="10px"></tr>
<tr>
	<td align="left">
    	<a href="property_typelist.php"><input type="button" name="Back" value="Back" class="normal_fonts12_black"></a>
 	</td>
</tr>
</table>
 <!-- main ends here  -->
            
         </td>
          </tr>
        </table></td>
      </tr>
    
    </table></td>
  </tr>
    <tr>
        <td align="center" valign="middle">
        <?php  include("footer.php"); ?>
        
        </td>
      </tr>
</table>

</body>
</html> 