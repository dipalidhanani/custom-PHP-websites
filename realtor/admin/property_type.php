<?php
session_start();
require_once("../include/config.php");

if($_SESSION['rm_admin_id']=="")
{
	echo "<script type=\"text/javascript\">document.location.href='login.php'; </script>\n";
	exit();
}
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
<script type="text/javascript" >
function checkPname(frm)
{
	var obj=document.getElementById('txtproptype');
  	var cname = frm.txtproptype.value;
  	var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Property Category is required!';
   		frm.txtproptype.focus();
  	}
  	else if (cname.length < 2) 
	{
    error="Country Name should be atleast 2 characters long";
  	}
  	else if (!p.test(cname))
	{
   error="Only letters are allowed";
  	}
  	if (error)
	{
   	frm.txtproptype.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function validate() 
 {
 	var form = document.forms['frm'];
 	var ary=[checkPname];
 	var rtn=true;
 	var z0=0;
 	for (var z0=0;z0<ary.length;z0++)
	{
  		if (!ary[z0](form))
  		{
    		rtn=false;
  		}
 	}
 	return rtn;
}
</script>
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
                 <table width="100%" border="0" cellpadding="0">
     
      <tr>
        <td bgcolor="#FFFFFF">
<form action="propertytypeadd.php" method="post" name="frm" id="frm" onSubmit="return validate()">
<table width="100%" border="0" cellspacing="5" cellpadding="0">
				
                  <tr>
                    <td height="35" class="normal_fonts14_black">Add Property Category</td>
                    </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
                     <tr>
             		<td colspan="3" align="center" class="normal_fonts14">
                 	<!-- start display message -->
						<?php
							if (isset($_SESSION['already'])) 
							{ 
  								echo $_SESSION['already']; 
  								unset($_SESSION['already']); 
							}  
						?>
                    <!-- end display message  -->
                 </td>
         		 </tr>
                      <tr>

                        <td width="300" align="right" class="normal_fonts9">Property Category</td>
                        <td width="10" align="center" class="normal_fonts9">:</td>
                        <td class="normal_fonts9"><input name="txtproptype" type="text" class="normal_fonts9" id="textfield5" size="40" /></td>
                        </tr>
                        <tr>
          				<td></td>
            			<td></td>
       					<td class="validationmsg" ><span id="txtproptype" ></span></td>
         				</tr>
                      <tr>
                        <td align="right" class="normal_fonts9">&nbsp;</td>
                        <td align="center" class="normal_fonts9">&nbsp;</td>
                        <td class="normal_fonts9"><input name="Add" type="submit" class="normal_fonts12_black" id="button4" style="width:80px; height:30px" value="Add" />
                         </td>
                        </tr>
                      <tr>
                        <td height="10" colspan="3" align="right" class="normal_fonts9"></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table></form>
                  </td></tr></table>
                  
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