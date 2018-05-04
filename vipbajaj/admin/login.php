<?php
session_start();
include("include/config.php");

$errormsg ="";

		$info = mysql_query("select * from admin_mast");
		$data = mysql_fetch_array($info);

if($_POST["submit"]=="Sign In")
{
	
	if($_POST["txtUser"]=="" || $_POST["txtPass"]=="")
	{
		$errormsg = "Please enter Username or Password";
		
	}
	else
	{
		$username =  $_POST["txtUser"];
		$password =  $_POST["txtPass"];
		
		$info = mysql_query("select * from admin_mast where Username ='".$username."' and Password='".$password."'") or die(mysql_error());
		
		if($a = mysql_fetch_array($info))
		{ 
			$_SESSION["Admin_id"] = $a["Admin_id"];
			$_SESSION["Admin_name"] = $a["Admin_name"];
			$_SESSION["Email_id"] = $a["Email_id"];
			$_SESSION["Username"] = $a["Username"];
			$_SESSION['Is_master_admin']=$a['Is_master_admin'];			
			echo "<script>location.href='welcomeAdmin.php';</script>";
		}
		else
		{
			$errormsg = "Invalid Username or Password";
		}
		
		
	}

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin Panel</title>

<link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" />

<script src="jquery-validate/lib/jquery.js" type="text/javascript"></script>
<script src="jquery-validate/jquery.validate.js" type="text/javascript"></script>

<script type="text/javascript">

/*$.validator.setDefaults({
	submitHandler: function() { alert("submitted!"); }
});
*/
$().ready(function() {
	
	// validate signup form on keyup and submit
	$("#frmadminlogin").validate({
		rules: {
			//txtEmail: "required",
//			txtPass: "required",
//			
		},
		messages: {
			//txtEmail: "Please enter your email id",
//			txtPass: "Please enter your password",
			
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
<link href="../css/css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-color: #E8E8E8;
}
-->
</style>

</head>
<body>
 <form method="post" name="frmadminlogin" id="frmadminlogin" >
<table width="355" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:100px;">
  <tr>
    <td height="260" align="right" valign="top" background="../images/login1.png" style="background-repeat:no-repeat; background-position:top"><table width="80%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="12" height="12" background="../images/box_bg_02.jpg"></td>
        <td height="25" background="../images/box_bg_02.jpg"></td>
        </tr>
      <tr>
        <td background="images/box_bg_04.jpg">&nbsp;</td>
        <td style="background-repeat:repeat-x">
        <table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <td align="left" class="normal_fonts12_black" >Username</td>
          </tr>
          <tr>
            <td align="left" >
              <input name="txtUser" type="text" id="txtUser" />
              </td>
            </tr>
          <tr>
            <td height="5" align="left"></td>
            </tr>
          <tr>
            <td align="left" class="normal_fonts12_black">Password</td>
            </tr>
          <tr>
            <td align="left"><input name="txtPass" type="password" id="txtPass" /></td>
            </tr>
        </table></td>
        </tr>
      <tr>
        <td height="53" valign="bottom">&nbsp;</td>
        <td align="left" valign="middle" background="../images/box_bg_05.jpg" style="background-repeat:repeat-x">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr></tr>
            <tr>
              <td height="8"></td>
              </tr>
            <tr>
              <td><span class="border_style1">
                <input name="submit" type="submit" class="input" value="Sign In" />
                </span></td>
              </tr>
            <tr>
              <td height="20" align="right" valign="bottom">&nbsp;</td>
              </tr>
           
            <?php
            	if($errormsg!="")
				{
			?>
            <tr>
                 <td class="err_validate" colspan="2" height="20" align="center" valign="bottom"><?php echo $errormsg; ?></td>
            </tr>
             <?php
				}
			 ?>
            <tr>
              <td height="20" align="center" valign="bottom" class="hyper_link_10">&nbsp;</td>
              </tr>
            <tr>
              <td height="20" align="center" valign="bottom">&nbsp;</td>
              </tr>
            <tr>
              <td height="10" align="center" valign="bottom" ></td>
              </tr>
            <tr>
              <td height="20" align="center" valign="bottom">&nbsp;</td>
              </tr>
            <tr>
              <td height="10" align="center" valign="bottom"></td>
            </tr>
            <tr>
              <td height="20" align="left" valign="top" class="normal_fonts8">Developed by : <a href="http://www.indoushosting.com/" target="_blank">V3+ Web Solutions 2010-2011</a></td>
            </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
</table>

       </form>

</body>
</html>
