<?php
session_start();
include("../include/config.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Naughty Paaji - Admin Facility</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" />

<script src="jquery-validate/lib/jquery.js" type="text/javascript"></script>
<script src="jquery-validate/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery-validate/demo/multipart/js/jquery.maskedinput-1.0.js"></script>
<script type="text/javascript" src="jquery-validate/demo/multipart/js/ui.core.js"></script>
<script src="jquery-validate/lib/jquery.metadata.js" type="text/javascript"></script>

<script type="text/javascript" src="jquery-validate/demo/multipart/js/ui.accordion.js"></script>

<script type="text/javascript">
$.validator.setDefaults({
	
});
	
$.metadata.setType("attr", "validate");



$(document).ready(function() {
	$("#txtMobile").mask("9999999999");

	// validate signup form on keyup and submit
	$("#adminForm").validate({
		rules: {
			txtName: {required:true},
			
			txtPass: {
				required: true,
				minlength: 5
			},
			txtConPass: {
				required: true,
				minlength: 5,
				equalTo: "#txtPass"
			},
			txtEmail: {
				required: true,
				email: true
			},
			
			txtMobile: {required:true}

			
		},
		messages: {
			txtName: "Please enter your name",
			
			txtPass: {
				required: " Please provide a password",
				minlength: " Your password must be at least 5 characters long"
			},
			txtConPass: {
				required: " Please provide a password",
				minlength: " Your password must be at least 5 characters long",
				equalTo: " Please enter the same password as above"
			},
			txtEmail: " Please enter a valid email address",
			txtMobile: " Please enter Mobile no"

		}
	});
	
	var newsletter = $("#newsletter");
	// newsletter topics are optional, hide at first
	var inital = newsletter.is(":checked");
	var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
	var topicInputs = topics.find("input").attr("disabled", !inital);
	// show when newsletter is checked
	newsletter.click(function() {
		topics[this.checked ? "removeClass" : "addClass"]("gray");
		topicInputs.attr("disabled", !this.checked);
	
	
	});
});
</script>

</head>

<body>
<form id="adminForm" class="cmxform" method="post" action="processAdmin.php">
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
      <tr>
        <td><table width="1000" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td bgcolor="#FFFFFF"> <?php include("headerAdmin.php");?></td>
          </tr>
          <tr>
            <td height="10" bgcolor="#FFFFFF"></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">
            
                <!-- main starts here  -->   
                
         <table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">Admin Detail</td>
          </tr>
          <tr>
            <td>
            <?php 
 if($_SESSION['Admin_id'] == "")
	{
			//echo "Unauthorised Access !!!";die;
			echo "<script>location.href='login.php';</script>";
			exit();
	}
	
 
 
 $a=$_GET["Admin_id"];
 
   $query = "select * from admin_mast where admin_id='".$a."'";
   
   $result= mysql_query($query) 
   or die (mysql_error());
   
   if($row=mysql_fetch_array($result))
   {
	?>     
           <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
              <tr>
                <td width="375" align="right" class="normal_fonts9">Admin name</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9 err_validate">
                <input name="txtName" type="text" id="txtName" class="normal_fonts9" size="40" value="<?php echo $row["admin_name"]; ?>" />
                <input name="hdnAdid" type="hidden" id="hdnAdid" value="<?php echo $row["admin_id"]; ?>" />
                </td>
              </tr>
              <tr>
                <td align="right" bgcolor="#F3F3F3" class="normal_fonts9">Email Address</td>
                <td align="center" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9 err_validate">
                <input name="txtEmail" type="text" id="txtEmail" class="normal_fonts9" size="40"  value="<?php echo $row["email_id"]; ?>" />
                </td>
                </tr>
              <tr>
                <td align="right"  class="normal_fonts9">Username</td>
                <td align="center"  class="normal_fonts9">:</td>
                <td  class="normal_fonts9 err_validate">
                <input name="txtUser" type="text" id="txtUser" class="normal_fonts9" size="40" value="<?php echo $row["username"]; ?>" />
                </td>
              </tr>
              <tr>
                <td align="right" bgcolor="#F3F3F3" class="normal_fonts9">Password</td>
                <td align="center" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9 err_validate">
                <input name="txtPass" type="password" id="txtPass" class="normal_fonts9" size="40" value="<?php echo $row["password"]; ?>" /></td>
              </tr>
              <tr>
                <td align="right"  class="normal_fonts9">Mobile no</td>
                <td align="center"  class="normal_fonts9">:</td>
                <td class="normal_fonts9 err_validate" >
                <input name="txtMobile" id="txtMobile" type="text" class="normal_fonts9" size="40" value="<?php echo $row["mobileno"]; ?>" /></td>
              </tr>
               <tr>
                    
            </table>
            <?php } ?>
                </td>
                          </tr>
                          <tr><td>
                          <table width="100%" border="0" cellpadding="5" cellspacing="0">
                          <tr>
                            <td align="right" class="normal_fonts9" width="375">&nbsp;</td>
                            <td align="center" class="normal_fonts9" width="10">&nbsp;</td>
                            <td class="normal_fonts9" ><input type="hidden" name="process" value="Edit" />
                            <input class="submit" name="submit" type="submit" align="middle" style="width:80px; height:30px" id="submit" value="Save" />&nbsp;&nbsp;<input name="back" type="button" class="normal_fonts12_black" id="back" style="width:80px; height:30px" value="Back" onclick="history.go(-1)" /></td>
                          </tr>
                          
                          </table>
                          </td></tr>
 
          </table>
                
                
                 <!-- main ends here  -->
            
         </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="10"></td>
      </tr>
      <tr>
        <td align="center" valign="middle">
        <?php  include("footer.php"); ?>
        
        </td>
      </tr>
    </table></td>
  </tr>
</table>
</form>
</body>
</html>