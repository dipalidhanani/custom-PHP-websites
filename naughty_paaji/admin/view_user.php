<?php
session_start();
require_once("../include/config.php");

?>

<html>
<head>
<title>Naughty Paaji - Admin Facility</title>
</head>

<body>

<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1000"><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
      <tr>
        <td><table width="1000" border="0" cellpadding="0" cellspacing="0" >
          <tr>
            <td bgcolor="#FFFFFF"> <?php include("headerAdmin.php");?></td>
          </tr>
          <tr>
            <td height="10" bgcolor="#FFFFFF"></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">
            
                <!-- main starts here  --> 

<form method="post" name="userform" action="" >

<?php 
if($_SESSION['Admin_id'] == "")
	{
			//echo "Unauthorised Access !!!";die;
			echo "<script>location.href='login.php';</script>";
			exit();
	}
	
	
	 $a=$_REQUEST["user_reg_id"];
   
   $query = "select * from user_registration  where user_registration.user_reg_id='".$a."'";
   
   $result= mysql_query($query) 
   or die (mysql_error());
   
   if($row=mysql_fetch_array($result))
   {
	   $dt=explode("-",$row["birth_date"]);
	   $yy1=$dt[0];
	   $mm1=$dt[1];
	   $dd1=$dt[2];
	   $birth=$dd1."-".$mm1."-".$yy1;
	   
	   
	    $query_country = mysql_query("select * from   country_mast  where country_id='".$row["country_mast_id"]."'") or die(mysql_error());
	   
	   $result_country=mysql_fetch_array($query_country);
	   
	   
	   $query_state = mysql_query("select * from  state_mast  where state_id='".$row["state_mast_id"]."'") or die(mysql_error());
	   
	   $result_state=mysql_fetch_array($query_state);
	   
	?>     
   <table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">User details</td>
          </tr>
          <tr>
            <td>
<table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
 
<tr>
<td width="120" align="right" class="normal_fonts9">User name</td>
  <td width="10" align="center" class="normal_fonts9">:</td>
 <td class="normal_fonts9"><?php  echo $row["first_name"]." ".$row["last_name"];?>
 <input name="hdnProid" type="hidden" id="hdnProid" value="<?php echo $row["user_reg_id"]; ?>" />
 </td></tr>
<tr>
<td align="right"  class="normal_fonts9" bgcolor="#F3F3F3">Email address </td>
  <td align="center" class="normal_fonts9" bgcolor="#F3F3F3">:</td>
<td class="normal_fonts9" bgcolor="#F3F3F3"><?php echo $row["email"]; ?></td>
</tr>
<tr>
 <td align="right" class="normal_fonts9">Password </td>
  <td align="right" class="normal_fonts9">:</td>
 <td class="normal_fonts9"><?php echo $row["password"]; ?></td>
</tr>

<tr bgcolor="#F3F3F3">
 <td align="right" class="normal_fonts9">Country</td>
 <td align="center" class="normal_fonts9">:</td>
 <td class="normal_fonts9" ><?php echo $result_country["country_name"]; ?></td></tr>
<tr>
 <td align="right" class="normal_fonts9">State</td>
 <td align="center" class="normal_fonts9">:</td>
 <td class="normal_fonts9"><?php echo $result_state["state_name"]; ?></td></tr>
<tr bgcolor="#F3F3F3">
 <td align="right" class="normal_fonts9" >City</td>
 <td align="center" class="normal_fonts9">:</td>
 <td class="normal_fonts9" ><?php echo $row["city"]; ?></td></tr>


<tr bgcolor="#F3F3F3">
<td align="right" class="normal_fonts9">Pincode</td>
<td align="center" class="normal_fonts9" >:</td>
<td class="normal_fonts9" ><?php	echo $row["pincode"]; ?></td>
</tr>

<tr>
<td align="right" class="normal_fonts9">Mobile no</td>
<td align="center" class="normal_fonts9">:</td>
<td class="normal_fonts9"><?php	echo $row["mobile_no"]; ?></td>
</tr>
<tr bgcolor="#F3F3F3">
<td align="right" class="normal_fonts9">Contact no </td>
<td align="center" class="normal_fonts9" >:</td>
<td class="normal_fonts9" ><?php echo $row["contact_no"]; ?></td>
</tr>

</table>	 </td>
          </tr>
       
      <tr><td align="center"><input name="back" type="button" class="normal_fonts12_black" id="back" style="width:80px; height:30px" value="Back" onClick="history.go(-1)" /></td></tr>
 
</table>
<?php   } ?>
</form>
 <!-- main ends here  -->
            
         </td>
          </tr>
          
          
          
        </table></td>
      </tr>
      
      
         <tr>
        <td height="5"></td>
      </tr>
      
      
      <tr>
        <td align="center" valign="middle"><?php  include("footer.php"); ?> </td>
      </tr>
    </table></td>
  </tr>
</table>


</body>
</html>