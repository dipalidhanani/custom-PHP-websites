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
function validation_carrers()
{
	with(document.carrersform)
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
			
			
			if(contact_number.value=='')
			{
				error=1;
				message=message + "\n" + "Please enter contact number";
			}	
			if(address.value=='')
			{
				error=1;
				message=message + "\n" + "Please enter address";
			}	
			if(education.value=='')
			{
				error=1;
				message=message + "\n" + "Please enter education";
			}	
			if(experience.value=='')
			{
				error=1;
				message=message + "\n" + "Please enter experience";
			}	
			if(field_in_interest.value=='')
			{
				error=1;
				message=message + "\n" + "Please enter your interest";
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
     <form name="carrersform" id="carrersform" method="post" action="process_carrers.php" enctype="multipart/form-data">
    <table width="980" border="0" align="center" cellpadding="0" cellspacing="10">
      <tr>
        <td colspan="4"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
            <tr>
              <td height="25" class="title">Carrers</td>
            </tr>
            <tr>
              <td height="5" class="title"></td>
            </tr>
          </table></td>
         </tr>     
      
       <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Name : </strong></td>
        <td><input name="name" type="text" class="blue"  id="name" style="width:250px; padding:4px; border:solid 1px #CCC;"/></td>
        </tr>
       <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Address : </strong></td>
        <td><input name="address" type="text" class="blue"  id="address" style="width:250px; padding:4px; border:solid 1px #CCC;"/></td>
        </tr>
         <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Contact Number : </strong></td>
        <td><input name="contact_number" type="text" class="blue"  id="contact_number" style="width:250px; padding:4px; border:solid 1px #CCC;"/></td>
        </tr> 
        <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Email Address : </strong></td>
        <td><input name="email" type="text" class="blue"  id="email" style="width:250px; padding:4px; border:solid 1px #CCC;"/></td>
        </tr>       
        <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Education : </strong></td>
        <td><input name="education" type="text" class="blue"  id="education" style="width:250px; padding:4px; border:solid 1px #CCC;"/></td>
        </tr> 
        <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Experience : </strong></td>
        <td><input name="experience" type="text" class="blue"  id="experience" style="width:250px; padding:4px; border:solid 1px #CCC;"/></td>
        </tr> 
        <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Field In Interest : </strong></td>
        <td><input name="field_in_interest" type="text" class="blue"  id="field_in_interest" style="width:250px; padding:4px; border:solid 1px #CCC;"/></td>
        </tr> 
    
      <tr>
        <td>&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
        <td>
        <input type="hidden" name="process" value="addcarrers" /> 
        <input name="submit" type="submit" class="normal_fonts9" value="Submit"  onClick="return validation_carrers();" /></td>
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
