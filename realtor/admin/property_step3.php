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

<script language="javascript" type="text/javascript" src="dropdown.js"></script>
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
<form action="" method="post" name="frm" id="frm" onsubmit="return validate()">
<table width="100%" border="0" cellspacing="5" cellpadding="0">
	<tr>
    	<td height="35" class="normal_fonts14_black">Property Detail</td>
    </tr>
    <tr>
        <td>
        	<table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
            <tr>
             	<td colspan="3" align="center" class="normal_fonts14">
                 	<!-- start display message -->
						<?php /*?><?php
							if (isset($_SESSION['already'])) 
							{ 
  								echo $_SESSION['already']; 
  								unset($_SESSION['already']); 
							}  
						?><?php */?>
                    <!-- end display message  -->
                 </td>
          </tr>
          <tr>
          	<td colspan="3" class="normal_fonts14" bgcolor="#FDFAD6" align="center">Property/Project Details</td>
          </tr>
         
        <tr>
           <td width="200" align="right" class="normal_fonts9">Property No </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtpropno" class="normal_fonts9" size="40">             
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtpropno" ></span></td>
        </tr>
        <tr>
           <td width="200" align="right" class="normal_fonts9">Property Name </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtpropname" class="normal_fonts9" size="40">              
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtpropname"></span></td>
        </tr>
        <tr>
           <td width="200" align="right" class="normal_fonts9">Property Address </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<textarea class="normal_fonts9"  name="txtpropadd" rows="3" cols="37"> </textarea>          
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtpropadd"></span></td>
        </tr>
        <tr>
           <td width="200" align="right" class="normal_fonts9">Project Name</td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtprojname" class="normal_fonts9" size="40">            
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtprojname"></span></td>
        </tr>
        <tr>
           <td width="200" align="right" class="normal_fonts9">Project Description </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<textarea class="normal_fonts9"  name="txtprojdesc" rows="3" cols="37"> </textarea>        
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtprojdesc"></span></td>
        </tr>
        
         <tr>
           <td width="200" align="right" class="normal_fonts9">Project Url </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtprojurl" class="normal_fonts9" size="40">                 
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtprojurl"></span></td>
        </tr>
        
        <tr>
          	<td colspan="3" class="normal_fonts14" bgcolor="#FDFAD6" align="center">Contact Details</td>
          </tr>
         
        <tr>
           <td width="200" align="right" class="normal_fonts9">Person Name </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtpname" class="normal_fonts9" size="40">             
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtpname" ></span></td>
        </tr>
        <tr>
           <td width="200" align="right" class="normal_fonts9">Company Name </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtcname" class="normal_fonts9" size="40">              
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtcname"></span></td>
        </tr>
        <tr>
           <td width="200" align="right" class="normal_fonts9">City</td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtcity" class="normal_fonts9" size="40">            
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtcity"></span></td>
        </tr>
        <tr>
           <td width="200" align="right" class="normal_fonts9">Company Address </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<textarea class="normal_fonts9" name="txtcadd" rows="3" cols="37"> </textarea>          
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtcadd"></span></td>
        </tr>
        
        
        
         <tr>
           <td width="200" align="right" class="normal_fonts9">Contact No </td>
           <td width="10" align="center" class="normal_fonts9">:</td>
           <td class="normal_fonts9">
           		<input type="text" name="txtcontactno" class="normal_fonts9" size="40">                 
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtcontactno"></span></td>
        </tr>
        
        
        
   		<tr>
     		<td height="10" colspan="3" align="right" class="normal_fonts9"></td>
        </tr>
     	<tr></tr>
   		<tr>
 			<td align="right" class="normal_fonts9">&nbsp;</td>
      		<td align="center" class="normal_fonts9">&nbsp;</td>
        	<td class="normal_fonts9"><input name="Submit" type="submit" class="normal_fonts12_black" id="button4" style="width:80px; height:30px" value="Submit" />
            </td>
       </tr>
       	<tr>
       		<td height="10" colspan="3" align="right" class="normal_fonts9"></td>
   		</tr>
      </table>
     </td>
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