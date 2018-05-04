<?php session_start();
	include("include/config.php");
	if($_SESSION['user_reg_id'] == "")
	{
			//echo "Unauthorised Access !!!";die;
			echo "<script>location.href='login.php';</script>";
			exit();
	}
	$user_reg_id=$_SESSION['user_reg_id'];
	$email=$_SESSION['email'];
	$first_name=$_SESSION['first_name'];
	$last_name=$_SESSION['last_name'];
	$newpassword=$_POST['newpassword'];
	$confirmpass=$_POST['txtconfirmpass'];
	
	$clientname=$first_name." ".$last_name;
	
	 $query = "select * from user_registration where user_reg_id = '".$user_reg_id."'"; 
	 $res = mysql_query($query) or die(mysql_error());
	 $row = mysql_fetch_array($res);
	 $password = $row['password'];
//	 echo $password;
	 
	 if(isset($_POST['submit']))
	 {
	 if($password==$_POST['oldpassword'])
	 {
	 	$query = " update user_registration set password = '".$_POST['newpassword']."' where user_reg_id = '".$user_reg_id."'";
	 	   
			mysql_query($query) or die(mysql_error());
			echo "<script>location.href='index.php?page=13';</script>";
			exit();
	 }
	 else
	 {
	 	$error='incorrect password';
	 }
	 }

?>

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


  
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="10" height="10"><img src="images/box2_01.png" width="10" height="10" /></td>
            <td background="images/box2_02.png" style="background-repeat:repeat-x;"></td>
            <td width="10" height="10"><img src="images/box2_03.png" width="10" height="10" /></td>
          </tr>
          <tr>
            <td background="images/box2_04.png" style="background-repeat:repeat-y;">&nbsp;</td>
            <td bgcolor="#E4DFD3">         
                    
                    
<form name="frmchangepassword" id="frmchangepassword" class="cmxform" method="post" action=""> 
       <table width="100%" border="0" cellpadding="5" cellspacing="0" >
       <tr>
                <td height="30" align="left" valign="middle" colspan="3"><h3 class="title">Change Password</h3></td>
              </tr>
              <tr>
                <td width="150" align="right" class=" black10">Client Name</td>
                <td width="10" align="center" class=" black10">:</td>
                <td class="err_validate"><input name="clientname" type="text" class="black10 textcss" id="clientname" disabled value="<?php echo $clientname; ?>" size="40" /></td>
              </tr>
              <tr>
                <td align="right" class="black10">Old Password</td>
                <td align="center" class="black10">:</td>
                <td class="err_validate"><input name="oldpassword" type="password" class="black10 textcss" id="oldpassword" size="40" /><?php echo $error; ?></td>
              </tr>
			  <tr>
                <td align="right" class="black10">New Password</td>
                <td align="center" class="black10">:</td>
                <td class="err_validate"><input name="newpassword" type="password" class="black10 textcss" id="newpassword" size="40" /></td>
              </tr>
			  <tr>
                <td align="right" class="black10">Confirm Password</td>
                <td align="center" class="black10">:</td>
                <td class="err_validate"><input name="confirmpassword" type="password" class="black10 textcss" id="confirmpassword" size="40" /></td>
              </tr>
              <tr>
                <td height="10" colspan="3" align="right" class="fonts9"></td>
              </tr>
              <tr>
                <td align="right" class="black10">&nbsp;</td>
                <td align="center" class="black10">&nbsp;</td>
                <td class="black10"><input name="submit" type="submit" class="normal_fonts12_black" id="submit" style="height:30px" value="Change Password" /> <input name="reset" type="reset" class="normal_fonts12_black" id="reset" style="width:80px; height:30px" value="Cancel" onClick="return Clear();" /></td>
              </tr>
              <tr>
                <td height="10" colspan="3" align="right" class="black10"></td>
                </tr>
            </table>
</form>
 			</td>
            <td background="images/box2_06.png" style="background-repeat:repeat-y;">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="images/box2_07.png" width="10" height="10" /></td>
            <td background="images/box2_08.png" style="background-repeat:repeat-x;"></td>
            <td><img src="images/box2_09.png" width="10" height="10" /></td>
          </tr>
        </table>                    
                    
                    
                 