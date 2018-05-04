<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");

	if($_SESSION['kidsadminlogin'] == "")
	{
			//echo "Unauthorised Access !!!";die;
			echo "<script>location.href='login.php';</script>";
			exit();
	}

	$adminid=$_SESSION['kidsadminlogin'];
	
	$newpassword=$_POST['newpassword'];
	$confirmpass=$_POST['txtconfirmpass'];
	
	$query = "select * from kid_admin_mast where kid_admin_id = '".$adminid."'"; 
	 $res = mysql_query($query) or die(mysql_error());
	 $row = mysql_fetch_array($res);
	 $password = $row['kid_password'];
	 $adminname=$row['kid_admin_name'];
//	 echo $password;
	 
	 if(isset($_POST['submit']))
	 {
	 if($password==$_POST['oldpassword'])
	 {
	 	$query = "update kid_admin_mast set kid_password = '".$_POST['newpassword']."' where kid_admin_id = '".$adminid."'";
	 	   
			mysql_query($query) or die(mysql_error());
			echo "<script>location.href='main.php';</script>";
			exit();
	 }
	 else
	 {
	 	$error='Incorrect Password';
	 }
	 }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
<script src="jquery-validate/lib/jquery.js" type="text/javascript"></script>
<script src="jquery-validate/jquery.validate.js" type="text/javascript"></script>

<script type="text/javascript">
/*$.validator.setDefaults({
	submitHandler: function() { alert("submitted!"); }
});
*/
$().ready(function() {
	
	// validate signup form on keyup and submit
	$("#frmchangepassword").validate({
		rules: {
			oldpassword: {
				required: true
			},
			newpassword: {
				required: true
			},
			confirmpassword: {
				required: true,
				equalTo: "#newpassword"
			}
			
		},
		messages: {
			oldpassword: {
				required: "Please provide a password"
			},
			newpassword: {
				required: "Please provide a newpassword"
							},
			confirmpassword: {
				required: "Please provide a password",
				equalTo: "Please enter the same password as above"
			}
			
		}
	});
	
	
	
	//code to hide topic selection, disable for demo
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
<script language="javascript">
function Clear()
{
	document.getElementById('newpassword').value='';
	document.getElementById('confirmpassword').value='';
}
</script>
<style type="text/css">
.block { display: block; }
form.cmxform label.error { display: none; }	
</style>
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
<link href="css/css.css" rel="stylesheet" type="text/css" />
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
            
                <!-- main starts here  -->   
                <form name="frmchangepassword" id="frmchangepassword" class="cmxform" method="post" action=""> 
        <table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">Change Password</td>
            </tr>
          <tr>
            <td><table width="100%" border="0" cellpadding="5" cellspacing="0" >
              <tr>
                <td width="300" align="right" class="normal_fonts9">Admin Name</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="errormsg"><input name="adminname" type="text" class="normal_fonts9" id="adminname" disabled value="<?php echo $adminname; ?>" size="40" /></td>
              </tr>
              <tr>
                <td align="right" class="normal_fonts9">Old Password</td>
                <td align="center" class="normal_fonts9">:</td>
                <td class="errormsg"><input name="oldpassword" type="password" class="normal_fonts9" id="oldpassword"  size="40" />
               <?php if($error!=""){ ?>
                &nbsp;&nbsp;<span class="err_validate"><?php echo $error; ?></span>
                <?php } ?>
                </td>
              </tr>
			  <tr>
                <td align="right" class="normal_fonts9">New Password</td>
                <td align="center" class="normal_fonts9">:</td>
                <td class="errormsg"><input name="newpassword" type="password" class="normal_fonts9" id="newpassword" size="40" /></td>
              </tr>
			  <tr>
                <td align="right" class="normal_fonts9">Confirm Password</td>
                <td align="center" class="normal_fonts9">:</td>
                <td class="err_validate"><input name="confirmpassword" type="password" class="normal_fonts9" id="confirmpassword" size="40" /></td>
              </tr>
              <tr>
                <td height="10" colspan="3" align="right" class="normal_fonts9"></td>
              </tr>
              <tr>
                <td align="right" class="normal_fonts9">&nbsp;</td>
                <td align="center" class="normal_fonts9">&nbsp;</td>
                <td class="normal_fonts9"><input name="submit" type="submit" class="normal_fonts12_black" id="submit" style="height:30px" value="Change Password" /> <input name="reset" type="reset" class="normal_fonts12_black" id="reset" style="width:80px; height:30px" value="Cancel" onclick="return Clear();" /></td>
              </tr>
              <tr>
                <td height="10" colspan="3" align="right" class="normal_fonts9"></td>
                </tr>
            </table></td>
          </tr>
          </table>
</form>
</td>
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

