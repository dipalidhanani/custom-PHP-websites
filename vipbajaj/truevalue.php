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
function validation_exchange_bonanza()
{
	with(document.exchange_bonanza)
	{
			var error=0;
			var message;
			message="Please enter / correct folllowing errors to proceed further :";
			message=message+ "\n" + "--------------------------------------------------------------------";
			
			if(name.value=='')
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
			
			
			if(mobileno.value=='')
			{
				error=1;
				message=message + "\n" + "Please enter mobile number";
			}	
			if(vehicle_no.value=='')
			{
				error=1;
				message=message + "\n" + "Please enter vehicle number";
			}	
			if(model_name.value=='')
			{
				error=1;
				message=message + "\n" + "Please enter model name";
			}
			if(model_year.value=='')
			{
				error=1;
				message=message + "\n" + "Please enter model year";
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
    <td> <form name="exchange_bonanza" id="exchange_bonanza" method="post" action="process_exchange_bonanza.php" enctype="multipart/form-data"> 
    <table border="0" align="center" cellpadding="0" cellspacing="10" width="980">
      <tr>
        <td colspan="4"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
            <tr>
              <td height="25" class="title">Exchange Bonanza </td>
            </tr>
            <tr>
              <td height="5" class="title"></td>
            </tr>
          </table></td>
         </tr>         
     <tr>
        <td width="13">&nbsp;</td>
        <td colspan="2" class="black10" valign="top">
        <p align="justify">Get the best offer for your vehicle just walk in with your vehicle and walk out with brand new vehicle of your choice without paying anything rest will be supported by loan.</p>
 <p align="justify">Simply fill the details of below and enjoy the higher offer . </p>
        </td>
</tr>
       <tr>
        <td width="13">&nbsp;</td>
        <td width="283" height="32" class="black10"><strong>Name : </strong></td>
        <td width="644"><input name="name" type="text" class="blue"  id="name" style="width:250px; padding:4px; border:solid 1px #CCC;"  /></td>
        </tr>
       <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Mobile Number : </strong></td>
        <td><input name="mobileno" type="text" class="blue"  id="mobileno" style="width:250px; padding:4px; border:solid 1px #CCC;" /></td>
        </tr>
        <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Email Address : </strong></td>
        <td><input name="email" type="text" class="blue"  id="email" style="width:250px; padding:4px; border:solid 1px #CCC;"/></td>
        </tr>
        <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Vehicle No : </strong></td>
        <td><input name="vehicle_no" type="text" class="blue"  id="vehicle_no" style="width:250px; padding:4px; border:solid 1px #CCC;"/></td>
        </tr>
        <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Model Name : </strong></td>
        <td><input name="model_name" type="text" class="blue"  id="model_name" style="width:250px; padding:4px; border:solid 1px #CCC;"/></td>
        </tr>
        <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Model Year : </strong></td>
        <td><input name="model_year" type="text" class="blue"  id="model_year" style="width:250px; padding:4px; border:solid 1px #CCC;"/></td>
        </tr>
        <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Condition : </strong></td>
        <td class="black10">
        <input name="condition" type="radio" class="blue"  id="condition" value="Very Good" />&nbsp;Very Good
        <input name="condition" type="radio" class="blue"  id="condition" value="Good" />&nbsp;Good
        <input name="condition" type="radio" class="blue"  id="condition" value="Average"  />&nbsp;Average
        <input name="condition" type="radio" class="blue"  id="condition" value="Poor" />&nbsp;Poor
        </td>
        </tr>
        <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Expected Price : </strong></td>
        <td><input name="expected_price" type="text" class="blue"  id="expected_price" style="width:250px; padding:4px; border:solid 1px #CCC;"/></td>
        </tr>
        <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Which New Vehicle Interested: </strong></td>
        <td><input name="vehicle_interest" type="text" class="blue"  id="vehicle_interest" style="width:250px; padding:4px; border:solid 1px #CCC;"/></td>
        </tr>
     
      <tr>
        <td>&nbsp;</td>
        <td align="center" valign="middle">&nbsp;
               
          
             </td>
        <td> 
          <input type="hidden" name="process" value="addexchange_bonanza" /> 
          <input name="submit" type="image" class="normal_fonts9" value="" src="images/booknow.png" onClick="return validation_exchange_bonanza();" /></td>
      </tr>
    </table>
    </form></td>
  </tr>
  <tr>
    <td align="center" valign="top"><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>
