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
<link rel="stylesheet" href="calendar/css1/jquery.ui.all.css">
<script src="calendar/js/jquery-1.4.3.js"></script> 
	<script src="calendar/js/jquery.ui.core.js"></script> 

	<script src="calendar/js/jquery.ui.datepicker.js"></script> 

	<script type="text/javascript"> 
	
	var $j = jQuery.noConflict();
	
	$j(function() {
		$j( "#expiry_date" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
	});
	
</script>
<link href="css/home.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function validation_insurance()
{
	with(document.insurance)
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
			if(city.value=='')
			{
				error=1;
				message=message + "\n" + "Please enter city";
			}	
			if(model.value=='')
			{
				error=1;
				message=message + "\n" + "Please enter model";
			}	
			if(vehicle.value=='')
			{
				error=1;
				message=message + "\n" + "Please enter vehicle";
			}	
			if(policy_no.value=='')
			{
				error=1;
				message=message + "\n" + "Please enter policy number";
			}
			if(existing_company_name.value=='')
			{
				error=1;
				message=message + "\n" + "Please enter name of existing finance company";
			}	
			if(primium_amount.value=='')
			{
				error=1;
				message=message + "\n" + "Please enter Primium Amount";
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

<body  style="font-size:62.5%;">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><?php include("header.php"); ?></td>
  </tr>
  <tr>
    <td> <form name="insurance" id="insurance" method="post" action="process_insurance.php" enctype="multipart/form-data"> 
    <table border="0" align="center" cellpadding="0" cellspacing="10" width="980">
      <tr>
        <td colspan="4"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
            <tr>
              <td height="25" class="title">Auto Insurance</td>
            </tr>
            <tr>
              <td height="5" class="title"></td>
            </tr>
          </table></td>
         </tr>         
       <tr>
        <td width="13">&nbsp;</td>
        <td colspan="2" class="black10" valign="top">
        <p align="justify">The company is having full-fledged division of  new  vehicles insurance  as well as renewal . The Company Associates has agencies at reputed companies including . </p>
 <p align="justify">A : Bajaj Alliance General  insurance  Co. Ltd.  </p>
 <p align="justify">B : HDFC Chubb  </p>
 <p align="justify">C : Future General Insurance  </p>
 <p align="justify">The company offer special discount rate for loyal customers.  </p>
 <p align="justify">Fill the following details for your insurance needs and  enjoy  the strategy  renewal  at one click of button.   </p>
 <p align="justify">Enjoy 10% Discount for all renewals through this site.  </p>
 

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
        <td height="32" class="black10"><strong>City : </strong></td>
        <td>
        <input name="city" type="text" class="blue"  id="city" style="width:250px; padding:4px; border:solid 1px #CCC;"/>
        </td>
        </tr>        
        <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Model : </strong></td>
        <td>
         <select name="model" class="blue" id="model" style="width:258px; padding:4px; border:solid 1px #CCC;">
            <option value="">Select Model</option>
             <?php $q=mysql_query("select * from model_mast order by Model"); 
			 while($rowq=mysql_fetch_array($q)){
			  ?>
              <option value="<?php echo $rowq['Model_id']; ?>" ><?php echo $rowq['Model']; ?></option>
              <?php } ?>
          </select>
        </td>
        </tr>
         <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Vehicle : </strong></td>
        <td>
         <select name="vehicle" class="blue" id="vehicle" style="width:258px; padding:4px; border:solid 1px #CCC;">
            <option value="">Select Vehicle</option>
             <?php $q=mysql_query("select * from bike_mast order by Bike_name"); 
			 while($rowq=mysql_fetch_array($q)){
			  ?>
              <option value="<?php echo $rowq['Bike_id']; ?>" ><?php echo $rowq['Bike_name']; ?></option>
              <?php } ?>
          </select>
        </td>
        </tr>  
        <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Policy Number : </strong></td>
        <td>
        <input name="policy_no" type="text" class="blue"  id="policy_no" style="width:250px; padding:4px; border:solid 1px #CCC;"/>
        </td>
        </tr>   
        <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Manufacturing Year : </strong></td>
        <td>
        <select name="manufacturing_year" class="blue" id="manufacturing_year" style="width:258px; padding:4px; border:solid 1px #CCC;">               
              <option value="1997" >1997</option>  
              <option value="1998" >1998</option> 
              <option value="2000" >2000</option> 
              <option value="2001" >2001</option> 
              <option value="2000" >2002</option> 
              <option value="2001" >2003</option> 
              <option value="2000" >2004</option> 
              <option value="2001" >2005</option> 
              <option value="2000" >2006</option> 
              <option value="2001" >2007</option> 
              <option value="2000" >2008</option> 
              <option value="2001" >2009</option>  
              <option value="2000" >2010</option> 
              <option value="2001" >2011</option> 
              <option value="2000" >2012</option>
          </select>       
        </td>
        </tr>
        
      <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Expiry Date : </strong></td>
        <td>
        <input name="expiry_date" type="text" class="blue"  id="expiry_date" style="width:250px; padding:4px; border:solid 1px #CCC;"/>
        </td>
        </tr>
        <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Name Of Existing Finance Company : </strong></td>
        <td>
        <input name="existing_company_name" type="text" class="blue"  id="existing_company_name" style="width:250px; padding:4px; border:solid 1px #CCC;"/>
        </td>
        </tr>
         <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Primium Amount : </strong></td>
        <td>
        <input name="primium_amount" type="text" class="blue"  id="primium_amount" style="width:250px; padding:4px; border:solid 1px #CCC;"/>
        </td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="center" valign="middle">&nbsp;
               
          
             </td>
        <td> 
          <input type="hidden" name="process" value="addinsurance" /> 
          <input name="submit" type="submit" class="normal_fonts9" value="Submit" onClick="return validation_insurance();" /></td>
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
