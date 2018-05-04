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
<script language="javascript">
function validation_finance()
{
	with(document.finance)
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
<link href="css/home.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><?php include("header.php"); ?></td>
  </tr>
  <tr>
    <td> <form name="finance" id="finance" method="post" action="process_finance.php" enctype="multipart/form-data"> 
    <table border="0" align="center" cellpadding="0" cellspacing="10" width="980">
      <tr>
        <td colspan="4"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
            <tr>
              <td height="25" class="title">Auto Finance</td>
            </tr>
            <tr>
              <td height="5" class="title"></td>
            </tr>
          </table></td>
         </tr>         
       <tr>
        <td width="13">&nbsp;</td>
        <td height="32" colspan="2" class="black10">
          <p align="justify">SBI Finance :</p>
          <p align="justify">Enjoy the exclusive advantage of  SBI  SRTO finance for commercial  vehicle  :</p>
          <p align="justify">MAS Finance :</p>
          <p align="justify">MAS finance for trouble free spot approval scheme. </p>
          <p align="justify">Enjoy the loyalty customer  benefit scheme and save huge money by special rates  of interest  spot  delivery.</p>
          <p align="justify">Purpose of loan :</p>
          <p align="justify">Two –Three  Wheel  Auto Finance, Housing, Car</p>
          <p align="justify">Other -  CV, Consumer Developer,  Education</p>
          
         
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
        <td height="32" class="black10"><strong>Finance Required Emails : </strong></td>
        <td><input name="finance_required_emails" type="text" class="blue"  id="finance_required_emails" style="width:250px; padding:4px; border:solid 1px #CCC;"/></td>
        </tr>
        <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Purpose Of Loan : </strong></td>
        <td><textarea name="purpose_of_loan" class="blue"  id="purpose_of_loan" style="width:250px; padding:4px; border:solid 1px #CCC;"></textarea></td>
        </tr>
        
       
     
      <tr>
        <td>&nbsp;</td>
        <td align="center" valign="middle">&nbsp;
               
          
             </td>
        <td> 
          <input type="hidden" name="process" value="addfinance" /> 
          <input name="submit" type="submit" class="normal_fonts9" value="Submit" onClick="return validation_finance();" /></td>
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
