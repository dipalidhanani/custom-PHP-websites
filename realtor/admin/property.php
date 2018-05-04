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
	var obj=document.getElementById('txtproperty');
  	var cname = frm.txtproperty.value;
  	var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Property Type is required!';
   		frm.txtproperty.focus();
  	}
  	else if (cname.length < 2) 
	{
    error="Property Name should be atleast 2 characters long";
  	}
  	else if (!p.test(cname))
	{
   error="Only letters are allowed";
  	}
  	if (error)
	{
   	frm.txtproperty.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkPdname(frm)
{
	var obj=document.getElementById('ddlptype1');
   var cname = frm.ddlptype.value;

  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddlptype.selectedIndex == '0') {
   		error='Select any one Property Category!';
   		frm.ddlptype.focus();
  	}
 
  if (error)
	{
   frm.ddlptype.focus();
   obj.innerHTML=error;
   return false;
  }
  return true;
}
function validate() 
 {
 	var form = document.forms['frm'];
 	var ary=[checkPdname,checkPname];
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
 <form action="propertyadd.php" method="post" name="frm" id="frm" onsubmit="return validate()">
			
<table width="100%" border="0" cellspacing="5" cellpadding="0">
               
                  <tr>
                    <td height="35" class="normal_fonts14_black">Add Property Type</td>
                    </tr>
                  <tr>
                    <td>
                   
                    <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
                      <tr>

                        <td width="300" align="right" class="normal_fonts9">Property Category</td>
                        <td width="10" align="center" class="normal_fonts9">:</td>
                        <td class="normal_fonts9">
                        	<select name="ddlptype" id="ddlptype" style="width:240px">
								<option value="--Select PropertyType--">Select PropertyCategory</option>
								<?php		 
		  							$qry="select * from property_type_master";
		  							$res=mysql_query($qry);
		 							 while($arr=mysql_fetch_array($res))
		  							{
		      							echo "<option value=".$arr['property_type_id'].">".$arr['property_type_name']."</option>";
		  							}
								?>
						</select>
					</td>
                        </tr>
                        <tr>
          				<td></td>
            			<td></td>
       					<td class="validationmsg" ><span id="ddlptype1" ></span></td>
         				</tr>
                        <td width="300" align="right" class="normal_fonts9">Property Type</td>
                        <td width="10" align="center" class="normal_fonts9">:</td>
                        <td class="normal_fonts9"><input type="text" name="txtproperty" class="normal_fonts9" size="40">
                        </td>
                        </tr>
                        <tr>
          				<td></td>
            			<td></td>
       					<td class="validationmsg" ><span id="txtproperty" ></span></td>
         				</tr>
                      <tr>
                        <td align="right" bgcolor="#FFFFFF" class="normal_fonts9">Active</td>
                        <td align="center" bgcolor="#FFFFFF" class="normal_fonts9">:</td>
                        <td bgcolor="#FFFFFF" class="normal_fonts9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="22" align="left" valign="middle"><input type="radio" name="status" id="radio" value="Yes" checked="checked"/></td>
                            <td width="40">Yes</td>
                            <td width="20" align="left"><input type="radio" name="status" id="radio2" value="radio" /></td>
                            <td width="30">No</td>
                            <td align="left">&nbsp;</td>
                            </tr>
                          </table></td>
                        </tr>
                      <tr>
                        <td height="10" colspan="3" align="right" class="normal_fonts9"></td>
                        </tr>
                        <tr>
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
                  </table>
                  </form>
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