<?php 
	$time_set=86400;
	session_set_cookie_params ($time_set, '/', '.bhatiamobile.com',TRUE, FALSE);
	session_start();
	require_once("../admin/config.inc.php");
	require_once("../admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	
	
	$_SESSION['fname']=$_POST['fname'];
	$_SESSION['mname']=$_POST['mname'];
	$_SESSION['lname']=$_POST['lname'];
	$_SESSION['bdate']=$_POST['bdate'];
	$_SESSION['bmonth']=$_POST['bmonth'];
	$_SESSION['byear']=$_POST['byear'];
	$_SESSION['gender']=$_POST['gender'];
	$_SESSION['add1']=$_POST['add1'];
	$_SESSION['add2']=$_POST['add2'];
	$_SESSION['countryid']=$_POST['countryid'];
	$_SESSION['state']=$_POST['state'];
	$_SESSION['city']=$_POST['city'];
	$_SESSION['area']=$_POST['area'];
	$_SESSION['zipcode']=$_POST['zipcode'];
	$_SESSION['email']=$_POST['email'];
	$_SESSION['phone']=$_POST['phone'];
	$_SESSION['mobile']=$_POST['mobile'];
	
	
	$code=$_POST['code'];
	if($_SESSION['security_code']!=$code)
	{ ?>
	<script language="javascript">
	window.location='<?php echo HTTP_BASE_URL_ORDER; ?>index.php?pageno=1&code=1';
	</script>
	<?php exit; }
	
	if($_POST['username']!='')
	{ 
		$user=mysql_query("SELECT User_Name FROM user_mst where User_Name='".$_POST['username']."'");
		$rows=mysql_affected_rows();
		if($rows>=1)
		{ ?>
		<script language="javascript">
		window.location='<?php echo HTTP_BASE_URL_ORDER; ?>index.php?pageno=1&user=yes';
		</script>	
		<?php exit;}
		
	}
	
	if($_POST['email']!='')
	{ 
		$user=mysql_query("SELECT Email_Address FROM user_mst where Email_Address='".$_POST['email']."'");
		$rows=mysql_affected_rows();
		if($rows>=1)
		{ ?>
		<script language="javascript">
		window.location='<?php echo HTTP_BASE_URL_ORDER; ?>index.php?pageno=1&mail=yes';
		</script>	
		<?php exit;}
		
	}
	
	
	$column=array("User_Name","Password","First_Name","Middle_Name","Last_Name","Address1","Address2","Area","City","Pincode","Country_Id","State_Id","Birthdate","Email_Address","Phone","Mobile","Gender","Register_Date");
	
	$fname=$_POST['fname'];
	$mname=$_POST['mname'];
	$lname=$_POST['lname'];
	$birthdate=$_POST['bdate']."/".$_POST['bmonth']."/".$_POST['byear'];
	$gender=$_POST['gender'];
	$add1=$_POST['add1'];
	$add2=$_POST['add2'];
	$countryid=$_POST['countryid'];
	$state=$_POST['state'];
	$city=$_POST['city'];
	$area=$_POST['area'];
	$zipcode=$_POST['zipcode'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$mobile=$_POST['mobile'];
	$username=$_POST['username'];
	$password=base64_encode($_POST['pass1']);
	$con_pass=$_POST['con_pass'];
	$rdate=date('Y-m-d H:i:s');
	
	$value=array($username,$password,$fname,$mname,$lname,$add1,$add2,$area,$city,$zipcode,$countryid,$state,$birthdate,$email,$phone,$mobile,$gender,$rdate);
	
	$db->insert("user_mst",$column,$value);
	$last_id=mysql_insert_id();
	
	
	
	/////////////// Client Mail ///////////
		 $pass_data=$_POST['pass1'];	
		 $to=$email;
		 $subject="User Registration";
		 $fromtitle="BHATIA Mobile";
		 $from="info@bhatiamobile.com";
		 $mailData=$mailData."<table width='700' border='0' align='center' cellpadding='3' cellspacing='0' style='border:2px solid #F00'>
  <tr>
    <td bgcolor='#FF0000' class='title_w_10' height='25' style='color:#FFFFFF'>&nbsp;<strong>User Registration</strong></td>
  </tr>
  <tr>
    <td><table width=100% border='0' cellspacing='7' cellpadding='7' style='text-align:justify'>
      <tr>
        <td width='5'>&nbsp;</td>
        <td class='title_10'>Dear, <strong>$fname</strong></td>
        <td width='10'>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td class='title_10'>Welcome to Bhatia Mobile and thank you for registering with us.</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td class='title_10'>Your personal account details are :</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td class='title_10'><strong>Username : $username</strong></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td class='title_10'><strong>Password : $pass_data</strong></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td class='title_10'>Use this password along with your Bhatia Mobile Username every time you shop at <strong>bhatiamobile.com</strong> for fast and easy checkout. Log on to <strong>www.bhatiamobile.com</strong> to get the full range of products.</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td class='title_10'>We look forward to delivering flawless shopping experience for you.</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td class='title_10'>Thank you once again and enjoy shopping.</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td class='title_10'><strong>Regards,</strong></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td class='title_10'><strong>Bhatia Mobile</strong></td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>";	
		 $headers = "MIME-Version: 1.0\n"; 
		 $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		 $headers .= "From: ".$fromtitle." <" .$from."> \n";
		 
		 
		 
		
		mail($to,$subject,$mailData,$headers);
		
		/*echo $to."<br/><br/>";
		echo $subject."<br/><br/>";
		echo $fromtitle."<br/><br/>";
		echo $from."<br/><br/>";
		echo $mailData."<br/><br/>";
		echo $headers."<br/><br/>";
		exit;*/
		
		//exit;
		
		/////////////////admin mail send Process //////////////////////
		
		
		/////////////// Client Mail ///////////
		 $to="info@bhatiamobile.com";
		 $subject="New User Registration- BHATIA Mobile";
		 $fromtitle="Bhatia Mobile";
		 $from=$email;
		 $mailData1=$mailData1."Dear Bhatia Team,"."<br/><br/>";
		 $mailData1=$mailData1."New User have completed Registration with following details,"."<br/><br/>";
		 $mailData1=$mailData1."Full Name : ".$_POST['fname']." ".$_POST['mname']." ".$_POST['lname']."<br/><br/>";
		 $mailData1=$mailData1."City : ".$_POST['city']."<br/><br/>";
		 $mailData1=$mailData1."E-Mail Address : ".$_POST['email']."<br/><br/>";
		 $mailData1=$mailData1."Mobile No. : ".$_POST['mobile']."<br/><br/>";
		 
		 $mailData1=$mailData1."Regards,"."<br/><br/>";
		 $mailData1=$mailData1."Bhatia Mobile"."<br/><br/>";
		 $headers = "MIME-Version: 1.0\n"; 
		 $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		 $headers .= "From: ".$fromtitle." <" .$from."> \n";
		
		mail($to,$subject,$mailData1,$headers);
		
		/*echo $to."<br/><br/>";
		echo $subject."<br/><br/>";
		echo $fromtitle."<br/><br/>";
		echo $from."<br/><br/>";
		echo $mailData."<br/><br/>";
		echo $headers."<br/><br/>";
		exit;*/
		
	setcookie("PHPSESSID", session_id(), 0, "/", ".bhatiamobile.com");	
	$_SESSION['buserid']='';	
	$_SESSION['buserid']=$last_id;
	$_SESSION['busername']=$username;
	$ip=$_SERVER['REMOTE_ADDR'];

	$status='1';

		mysql_query("INSERT INTO clienttracking(User_Id,Ip_Address,Login_DateTime,Status) values('".$_SESSION['buserid']."','$ip',NOW(),'$status')") or die(mysql_error());
	
	
	$_SESSION['fname']='';
	$_SESSION['mname']='';
	$_SESSION['lname']='';
	$_SESSION['bdate']='';
	$_SESSION['bmonth']='';
	$_SESSION['byear']='';
	$_SESSION['gender']='';
	$_SESSION['add1']='';
	$_SESSION['add2']='';
	$_SESSION['countryid']='';
	$_SESSION['state']='';
	$_SESSION['city']='';
	$_SESSION['area']='';
	$_SESSION['zipcode']='';
	$_SESSION['email']='';
	$_SESSION['phone']='';
	$_SESSION['mobile']='';
	?>
<?php 
if($_SESSION['url']!='') { ?>    
<script language="javascript">
window.location='<?php echo $_SESSION['url']; ?>';
</script>
<?php 
exit; } else { ?>
<script language="javascript">
window.location='<?php echo HTTP_BASE_URL_ORDER; ?>index.php?pageno=4';
</script>
<?php exit; } ?>