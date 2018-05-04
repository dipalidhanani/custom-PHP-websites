<?php 
session_start();
include("include/config.php");
require_once("include/function.php");
u_Connect("cn");
if($_SESSION['kidsadminlogin'] == "")
	{
			//echo "Unauthorised Access !!!";die;
			echo "<script>location.href='login.php';</script>";
			exit();
	}


?>

<html>
<head>
<title>Admin Facility</title>
<link rel="stylesheet" href="css/css.css" type="text/css" />
<script language="javascript">
function validation_admin()
{
	with(document.adminForm)
	{
			var error=0;
			var message;
			message="Please enter / correct folllowing errors to proceed further";
			message=message+ "\n" + "--------------------------------------------------------------------";
			
			if(txtName.value=='')
			{
				error=1;
				message=message + "\n" + "Please Enter Name !";
			}
			if(txtUser.value=='')
			{
				error=1;
				message=message + "\n" + "Please Enter Username !";
			}
			if(txtPass.value=='')
			{
				error=1;
				message=message + "\n" + "Please Enter Password !";
			}
			else
			{
				if(txtConPass.value=='')
				{
					error=1;
					message=message + "\n" + "Please Re-Enter Password !";
				}
			}
			if(txtPass.value!='' && txtConPass.value!='')
			{
				if(txtPass.value != txtConPass.value)
				{
					error=1;
					message=message + "\n" + "Please Enter Same Password !";
				}	
			}
			if(txtMobile.value=='')
			{
				error=1;
				message=message + "\n" + "Please Enter Mobile Number !";
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
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border">
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF"><?php include("header.php");?></td>
      </tr>
       <tr>
            <td bgcolor="#FFFFFF">
<form class="cmxform" id="adminForm" name="adminForm" method="post" action="processAdmin.php">

                
         <table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">Admin Detail</td>
          </tr>
          <tr>
            <td>
           <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
              <tr bgcolor="#F3F3F3" >
                <td width="375" align="right" class="normal_fonts9">Admin name</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9 err_validate" >
                <input name="txtName" type="text" id="txtName" class="normal_fonts9" size="40" /></td>
              </tr>
              <tr>
                <td align="right"  class="normal_fonts9">Username</td>
                <td align="center"  class="normal_fonts9">:</td>
                <td  class="normal_fonts9 err_validate">
                <input name="txtUser" type="text" id="txtUser" class="normal_fonts9" size="40" />
                </td>
              </tr>
              <tr>
                <td align="right" bgcolor="#F3F3F3" class="normal_fonts9">Password</td>
                <td align="center" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9 err_validate">
                <input name="txtPass" type="password" id="txtPass" class="normal_fonts9" size="40" /></td>
              </tr>
              <tr>
                <td align="right"  class="normal_fonts9">Confirm Password</td>
                <td align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9 err_validate" >
                <input name="txtConPass" type="password" id="txtConPass" class="normal_fonts9" size="40" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#F3F3F3" class="normal_fonts9">Mobile no</td>
                <td align="center" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9 err_validate" >
                <input name="txtMobile" id="txtMobile" type="text" class="normal_fonts9" size="40" /></td>
              </tr>
                      
            </table>
                </td>
                          </tr>
                          <tr><td>
                          <table width="100%" border="0" cellpadding="5" cellspacing="0">
                          <tr>
                            <td align="right" class="normal_fonts9" width="375">&nbsp;</td>
                            <td align="center" class="normal_fonts9" width="10">&nbsp;</td>
                            <td class="normal_fonts9" ><input type="hidden" name="process" value="Add" />
                            <input class="submit" name="submit" type="submit" align="middle" style="width:80px; height:30px" id="submit" value="Submit" onclick="return validation_admin()" />&nbsp;&nbsp;<input name="back" type="button" class="normal_fonts12_black" id="back" style="width:80px; height:30px" value="Back" onClick="history.go(-1)" /></td>
                          </tr>
                          
                          </table>
                          </td></tr>
 
          </table>                
                
                
</form>
</td></tr>
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
