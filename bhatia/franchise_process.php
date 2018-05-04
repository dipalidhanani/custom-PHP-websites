<?php session_start();
	require_once("admin/config.inc.php");
	require_once("admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	
	
	$_SESSION['fname']=$_POST['fname'];
	$_SESSION['add1']=$_POST['add1'];
	$_SESSION['city']=$_POST['city'];
	$_SESSION['area']=$_POST['area'];
	$_SESSION['zipcode']=$_POST['zipcode'];
	$_SESSION['email']=$_POST['email'];
	$_SESSION['mobile']=$_POST['mobile'];
	$_SESSION['branch']=$_POST['branch'];
	$_SESSION['demo_no']=$_POST['demo_no'];
	
	
	$code=$_POST['code'];
	if($_SESSION['security_code']!=$code)
	{ ?>
	<script language="javascript">
	window.location='index.php?pageno=11&code=1';
	</script>
	<?php exit; }
	
	
	$column=array("Name","Address1","Area","City","Pincode","Email_Address","Mobile","Register_Date","Branch","Demo_No");
	
	$fname=$_POST['fname'];
	$add1=$_POST['add1'];
	$city=$_POST['city'];
	$area=$_POST['area'];
	$zipcode=$_POST['zipcode'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$rdate=date('Y-m-d H:i:s');
	$branch=$_POST['branch'];
	$demo_no=$_POST['demo_no'];
	
	$value=array($fname,$add1,$area,$city,$zipcode,$email,$mobile,$rdate,$branch,$demo_no);
	
	$db->insert("franchise_mst",$column,$value);
	$last_id=mysql_insert_id();
	
	
	/////////////// Client Mail ///////////
	
		 $to=$email;
		 $subject="Franchisee Registration Done";
		 $fromtitle="BHATIA Mobile";
		 $from="franchisee@bhatiamobile.com";
		 $mailData=$mailData."Your Registration has been completed successfully.Your details is below,."."<br/><br/>";
		 $mailData=$mailData."Franchise Name :".$fname."<br/><br/>";
		 $mailData=$mailData."City :".$city."<br/><br/>";
		 $mailData=$mailData."Regards,"."<br/><br/>";
		 $mailData=$mailData."BHATIA'S Mobile"."<br/><br/>";
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
		
		 $to='';$subject='';$fromtitle='';$from='';	$mailData='';	
		 $to='franchisee@bhatiamobile.com';
		 $subject="New franchisee registration done";
		 $fromtitle="BHATIA Mobile";
		 $from="franchisee@bhatiamobile.com";
		 $mailData=$mailData."New franchisee registration has been completed successfully.Franchisee details is below,."."<br/><br/>";
		 $mailData=$mailData."Franchise Name :".$fname."<br/><br/>";
		 $mailData=$mailData."City :".$city."<br/><br/>";
		 $mailData=$mailData."Regards,"."<br/><br/>";
		 $mailData=$mailData."BHATIA'S Mobile"."<br/><br/>";
		 $headers = "MIME-Version: 1.0\n"; 
		 $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		 $headers .= "From: ".$fromtitle." <" .$from."> \n";
		
		mail($to,$subject,$mailData,$headers);
		
		
		//exit;
		
	
	unset($_SESSION['fname']);
	unset($_SESSION['add1']);
	unset($_SESSION['city']);
	unset($_SESSION['area']);
	unset($_SESSION['zipcode']);
	unset($_SESSION['email']);
	unset($_SESSION['mobile']);
	unset($_SESSION['branch']);
	unset($_SESSION['demo_no']);
		
		
	?>
<script language="javascript">
window.location='index.php?pageno=11&msg=yes';
</script>
