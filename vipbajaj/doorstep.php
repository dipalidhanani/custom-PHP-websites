<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>VIP AUTO</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<link href="css/home.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function validation_doorstep()
{
	with(document.doorstepform)
	{
			var error=0;
			var message;
			message="Please enter / correct folllowing errors to proceed further :";
			message=message+ "\n" + "--------------------------------------------------------------------";
			
			if(person_name.value=='')
			{
				
				error=1;
				message=message + "\n" + "Please enter your name";
			}
			
			if(email.value=='')
			{
				error=1;
				message=message + "\n" + "Please enter your emailid";
			}
			if(check_valid_email(email.value)==false)
			{
				error=1;
				message=message + "\n" + "Please enter valid emailid";
			}
			
			
			if(phone_number.value=='')
			{
				error=1;
				message=message + "\n" + "Please enter phone number";
			}	
			if(address.value=='')
			{
				error=1;
				message=message + "\n" + "Please enter address";
			}	
			
			if (error==1)
			{
			
				alert(message);
				return false;
			}
			else
			{
				
				return true;		
			}
	}
}
</script>

</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><?php include("header.php"); ?></td>
  </tr>
  <tr>
    <td align="center" valign="top">
     <form name="doorstepform" id="doorstepform" method="post" action="processDoor_step.php" enctype="multipart/form-data">
    <table width="980" border="0" align="center" cellpadding="0" cellspacing="10">
      <tr>
        <td colspan="4"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
            <tr>
              <td height="25" class="title">Door Step</td>
            </tr>
            <tr>
              <td height="5" class="title"></td>
            </tr>
          </table></td>
         </tr>
      <tr>
       <td width="80">&nbsp;</td>
        <td width="150" height="32" class="black10"><strong>Vehicle : </strong></td>
        <td>
          <select name="bike_name" class="blue" id="bike_name" style="width:258px; padding:4px; border:solid 1px #CCC;">
              <option value="" style="color:#000; font-weight:bold;" selected="selected">Please Select</option>
            <option value="" style="color:#000; font-weight:bold;">Select Two Wheelers</option>
             <?php $q=mysql_query("select * from bike_mast where type=0 order by Bike_name"); 
			 while($rowq=mysql_fetch_array($q)){
			  ?>
              <option value="<?php echo $rowq['Bike_id']; ?>" <?php if($rowq['Bike_id']==$_POST["bike_name"]){echo "selected";} ?>><?php echo $rowq['Bike_name']; ?></option>
              <?php } ?>
               <option value="" style="color:#000; font-weight:bold;">Select Three Wheelers</option>
             <?php $q=mysql_query("select * from bike_mast where type=1 order by Bike_name"); 
			 while($rowq=mysql_fetch_array($q)){
			  ?>
              <option value="<?php echo $rowq['Bike_id']; ?>" <?php if($rowq['Bike_id']==$_POST["bike_name"]){echo "selected";} ?>><?php echo $rowq['Bike_name']; ?></option>
              <?php } ?>
          </select>
        </td>
       
      </tr>     
      
       <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Person Name : </strong></td>
        <td><input name="person_name" type="text" class="blue"  id="person_name" style="width:250px; padding:4px; border:solid 1px #CCC;"/></td>
        </tr>
       <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Address : </strong></td>
        <td><input name="address" type="text" class="blue"  id="address" style="width:250px; padding:4px; border:solid 1px #CCC;"/></td>
        </tr>
         <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Phone Number : </strong></td>
        <td><input name="phone_number" type="text" class="blue"  id="phone_number" style="width:250px; padding:4px; border:solid 1px #CCC;"/></td>
        </tr> 
         <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Email Address : </strong></td>
        <td><input name="email" type="text" class="blue"  id="email" style="width:250px; padding:4px; border:solid 1px #CCC;"/></td>
        </tr>       
       <tr>
       <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Service Type: </strong></td>
        <td class="black10"><input name="service_type" type="radio" class="blue"  id="service_type" value="Sale"/>
          Sale
<input name="service_type" type="radio" class="blue"  id="service_type" value="Service"/>
          Service
        </td>
        </tr>
    
      <tr>
        <td>&nbsp;</td>
        <td align="center" valign="middle">&nbsp;
               
          
             </td>
        <td><input type="hidden" name="process" value="adddoorstepe" /> 
          <input name="submit" type="submit" class="normal_fonts9" value="Submit"  onClick="return validation_doorstep();" /></td>
      </tr>
    </table>
    </form> </td>
  </tr>
  <tr>
    <td align="center" valign="top"><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>
