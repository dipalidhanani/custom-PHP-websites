<?php
session_start();
require_once("../include/config.php");

if($_SESSION['Admin_id'] == "")
	{
			//echo "Unauthorised Access !!!";die;
			echo "<script>location.href='login.php';</script>";
			exit();
	}
	
?>

<html>
<head>
<title>Naughty Paaji - Admin Facility</title>
<script language="JavaScript">
            loadcountryid=new Array();
            loadstateid=new Array();
            loadstatename=new Array();

		     <?php
		$recordsetstate = mysql_query("select * from state_mast order by state_name");
	    while($rowstate = mysql_fetch_array($recordsetstate,MYSQL_ASSOC))
	    {
		?>
                        loadstateid.push(<?php echo $rowstate["state_id"]; ?>);
                        loadstatename.push("<?php echo $rowstate["state_name"]; ?>");
					    loadcountryid.push(<?php echo $rowstate["country_mast_id"]; ?>);
       <?php
	    }
	   ?>
            function dis_state()
            {
                with(document.userform)
                {
                    selectcountryid=cmbCountry.options[cmbCountry.selectedIndex].value;
				
					
					cmbState.options.length=0;					
					cmbCity.options.length=0;
					
				    checkcount1=1;
					
					cmbState.options[0]=new Option("-Select-","",false);								
					cmbCity.options[0]=new Option("-Select-","",false);
                    
					for(i=0;i< loadstateid.length;i++)
                    {
					   if(selectcountryid==loadcountryid[i])
                        {
                            cmbState.options.length=checkcount1+1;
                            cmbState.options[checkcount1]=new Option(loadstatename[i],loadstateid[i],false);							
							
                            checkcount1++;
                        }
                    }
                }
            }
</script>


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
<form method="post" name="userform" action="process_user.php" >

<?php 
	
	 $a=$_GET["user_reg_id"];
	   
   $query = "select * from user_registration where user_reg_id='".$a."'";
   
   $result= mysql_query($query) 
   or die (mysql_error());
   
   if($row=mysql_fetch_array($result))
   {
	
	   
	   $cont=explode("-",$row["contact_no"]);
	   $a=$cont[0];
	   $b=$cont[1];
	   
	   
	?>     
   <table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black"> Edit user details</td>
          </tr>
          <tr>
            <td>
<table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
 
<tr  bgcolor="#F3F3F3">
<td width="375" align="right" class="normal_fonts9">First name</td>
  <td width="10" align="center" class="normal_fonts9">:</td>
 <td class="normal_fonts9">
 <input name="first_name" type="text" class="normal_fonts9" value="<?php  echo $row["first_name"];?>" size="40" >
 <input name="hdnUserid" type="hidden" id="hdnUserid" value="<?php echo $row["user_reg_id"]; ?>" />
 </td>
 </tr>
 <tr>
<td  align="right" class="normal_fonts9">Last name</td>
  <td  align="center" class="normal_fonts9" >:</td>
 <td class="normal_fonts9" >
 <input name="last_name" type="text" class="normal_fonts9" value="<?php  echo $row["last_name"];?>" size="40" > 
 </td>
 </tr>
<tr>
 <td align="right" class="normal_fonts9" bgcolor="#F3F3F3">Country</td>
 <td align="center" class="normal_fonts9" bgcolor="#F3F3F3">:</td>
 <td class="normal_fonts9" bgcolor="#F3F3F3">
 <select id="cmbCountry" name="cmbCountry" onChange="dis_state()" class="normal_fonts9" >			
			<?php		
			         
						 
					 $recordsetcountry = mysql_query("select * from country_mast") or die(mysql_error());
					 while($rowcountry = mysql_fetch_array($recordsetcountry))
					 {
					 ?>
                     <option value="<?php echo $rowcountry["country_id"]; ?>"
					 <?php if($row["country_mast_id"]==$rowcountry["country_id"])echo "Selected";?> > 
					 <?php echo $rowcountry["country_name"]; ?> </option>
                     <?php
					 }
					 ?> 
		</select></td></tr>
 <tr>
 <td align="right" class="normal_fonts9">State</td>
 <td align="center" class="normal_fonts9">:</td>
 <td class="normal_fonts9">
 <select id="cmbState" name="cmbState" onChange="dis_city()" class="normal_fonts9" >
			<?php	
						 
					$countrymastid=$row["country_mast_id"];
						 
					 $recordsetstate = mysql_query("select * from state_mast where country_mast_id='".$countrymastid."'") or die(mysql_error());
					 while($rowstate = mysql_fetch_array($recordsetstate))
					 {
					 ?>
                     <option value="<?php echo $rowstate["state_id"]; ?>"<?php if($row["state_mast_id"]==$rowstate["state_id"])echo "Selected";?> > <?php echo $rowstate["state_name"]; ?> </option>
                     <?php
					 }
					 ?> 
		</select></td></tr>
 <tr>
 <td align="right" class="normal_fonts9" bgcolor="#F3F3F3">City</td>
 <td align="center" class="normal_fonts9" bgcolor="#F3F3F3">:</td>
 <td class="normal_fonts9" bgcolor="#F3F3F3">
 <input name="city" class="normal_fonts9" type="text" value="<?php  echo $row["city"]; ?>" size="21" >
 </td></tr>
<tr>
<td align="right" class="normal_fonts9">Address</td>
<td align="center" class="normal_fonts9">:</td>
<td class="normal_fonts9">
<textarea name="address" cols="50" rows="5" class="normal_fonts9" id="address" ><?php  echo $row["address"];?></textarea>
</td></tr>

<tr>
<td align="right" class="normal_fonts9" bgcolor="#F3F3F3">Pincode</td>
<td align="center" class="normal_fonts9" bgcolor="#F3F3F3">:</td>
<td class="normal_fonts9" bgcolor="#F3F3F3"><input name="pincode" class="normal_fonts9" type="text" value="<?php  echo $row["pincode"];?>" size="21" ></td>
</tr>


<tr>
<td align="right" class="normal_fonts9">contact no </td>
<td align="center" class="normal_fonts9">:</td>
<td class="normal_fonts9"><input name="code" id="code" type="text" class="normal_fonts9" size="4" value="<?php echo $a; ?>" /> - <input name="contact_no" id="contact_no" class="normal_fonts9" type="text" size="15" value="<?php echo $b; ?>" />
</td>
</tr>
<tr>
<td align="right" class="normal_fonts9" bgcolor="#F3F3F3">Mobile no</td>
<td align="center" class="normal_fonts9" bgcolor="#F3F3F3">:</td>
<td class="normal_fonts9" bgcolor="#F3F3F3"><input type="text" name="mobile_no" class="normal_fonts9" value="<?php  echo $row["mobile_no"];?>" ></td>
</tr>
 </table>
            <?php } ?>
                </td>
                          </tr>
                          <tr><td>
                          <table width="100%" border="0" cellpadding="5" cellspacing="0">
                          <tr>
                            <td align="right" class="normal_fonts9" width="375">&nbsp;</td>
                            <td width="10" align="center" class="normal_fonts9">&nbsp;</td>
                             <td class="normal_fonts9" >
    <input type="hidden" name="process" value="Edit" />
    <input class="submit" name="submit" type="submit" align="middle" style="width:80px; height:30px" id="submit" value="Save"
    />
  
  </td>
 </tr>
                          
                          </table>
                          </td></tr>
 
          </table>

</form>
 <!-- main ends here  -->
            
         </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="10"></td>
      </tr>
      <tr>
        <td align="center" valign="middle">
        <?php  include("footer.php"); ?>
        
        </td>
      </tr>
    </table></td>
  </tr>
</table>


</body>
</html>