<?php session_start();
require_once("../include/config.php");

$recordset = mysql_query("select * from rm_admin_master where rm_admin_id='".$_SESSION['rm_admin_id']."'");
		
while($row = mysql_fetch_array($recordset,MYSQL_ASSOC))
{
	$currentpassword=$row["rm_admin_password"];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Eva Rankin - Change Password</title>
<link rel="stylesheet" href="css/css.css" type="text/css" />
<script language="JavaScript">
function validation(changepasswordform)
{
	with(document.changepasswordform)
    {
    	var errmsg="";
	    
		var illegalChars = /\W/; // allow letters, numbers, and underscores
 
		
		if(currentpassword.value=="")
		{
			errmsg="Please enter your current password.";
		}
		if(currentpassword.value!="")
		{
			var current="<?php echo base64_decode($currentpassword);?>";
			if(currentpassword.value!=current)
			{
				errmsg=errmsg +'<br>' + "Your Current Password does not matched.";
			}
		}			
		if(newpassword.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your new password.";
		}
		if(confirmpassword.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your confirm password.";
		}
		if(newpassword.value!=confirmpassword.value)
		{
			errmsg=errmsg +'<br>' + "new password and confirmation does not matched.";
		}
		
		
				
		if(errmsg=="")
		{
		  return true;
		}
		else
		{			
			document.getElementById("lblerror").style.visibility= "visible";
			document.getElementById("lblerror").innerHTML = errmsg;
			return false;
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
            <td bgcolor="#FFFFFF"> <?php include("header.php");?></td>
          </tr>
          <tr>
            <td height="10" bgcolor="#FFFFFF"></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="10" cellpadding="0">
      <tr>
        <td class="normal_fonts14_black">Change Password</td>
      </tr>
      <tr>
        <td>
        <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
        <form name="changepasswordform" method="post" action="process.php">
          <?php
		  if($_REQUEST["msg"]!="")
		  {
			  			   if($_REQUEST["msg"]=="change")
						   {
							   $msg="password changed successfully";
						   }						  					  
		  ?>
          <tr>
            <td colspan="3" align="center" bgcolor="#F3F3F3" class="warning_fonts9"><?php echo $msg;?></td>
            </tr>
            <?php
		  }
		  ?>
          
          <tr>
            <td width="40%" align="right" valign="top" class="normal_fonts9">Current Password</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top"><input name="currentpassword" type="password" class="normal_fonts9" size="35" /></td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">New Password</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3"><input name="newpassword" type="password" class="normal_fonts9" size="35" /></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Confirm Password</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top"><input name="confirmpassword" type="password" class="normal_fonts9" size="35" /></td>
          </tr>
          
          
          <tr>
            <td align="right" bgcolor="#F3F3F3" class="normal_fonts9">&nbsp;</td>
            <td align="left" bgcolor="#F3F3F3">&nbsp;</td>
            <td align="left" bgcolor="#F3F3F3" class="normal_fonts9">  
              <input type="hidden" name="process" value="changepassword" />            
              <input name="submit" type="submit" class="normal_fonts9" value="Submit" onclick="return validation(this.form);" style="cursor:pointer;"/></td>
          </tr>
          <tr>
            <td align="right" class="normal_fonts9">&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td align="left" class="normal_fonts9">
            <div id="lblerror" align="left" style=" width:350px; margin-left:0px; color:#FF0000; border-color:#FF0000; visibility:hidden;" ></div>
            </td>
          </tr>
          </form>
        </table></td>
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
