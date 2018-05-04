<?php session_start();
require_once("admin/config.inc.php");
require_once("admin/Database.class.php");
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
$db->connect(); 

$_SESSION['txtname']=$_POST['name'];
$_SESSION['txtemail']=$_POST['email'];
$_SESSION['txtmobile']=$_POST['mobile'];
$_SESSION['txtdesc']=$_POST['desc'];
$_SESSION['txtcountry']=$_POST['country'];

if($_POST['txtcode']!=$_SESSION['security_code'])
{ ?>
<script language="javascript">
window.location='index.php?pageno=10&msg=no';
</script>
<?php exit; }

	$column=array("Name","Email","Mobile","Desc","Dt","Country");

	$name=$_POST['name'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$desc=$_POST['desc'];
	$country=$_POST['country'];
	$dt=date('Y-m-d');

$value=array($name,$email,$mobile,$desc,$dt,$country);


if($name!='' && $email!='' && $mobile!='' && $desc!='' && $country!='') 
{
		$db->insert("query",$column,$value);
		
		
	 $to=$email;
	 $subject="Your Enquiry to BHATIA Mobile";
	 $fromtitle="BHATIA Mobile";
	 $from="info@bhatiamobile.com";
	 $mailData="Dear ".$name.","."<br/><br/>";
	 $mailData=$mailData."Thank you for Submitting your Enquiry.Our Support Team will Reply you soon."."<br/><br/>";
	 $mailData=$mailData."Regards".","."<br/><br/>";
	 $mailData=$mailData."BHATIA Mobile"."<br/><br/>";
	 $headers = "MIME-Version: 1.0\n"; 
	 $headers .= "Content-type: text/html; charset=iso-8859-1\n";
	 $headers .= "From: ".$fromtitle." <" .$from."> \n";
	
	mail($to,$subject,$mailData,$headers);
	
	/*echo $to."<br/><br/>";
	echo $subject."<br/><br/>";
	echo $fromtitle."<br/><br/>";
	echo $from."<br/><br/>";
	echo $mailData."<br/><br/>";
	echo $headers."<br/><br/>";*/
	
	 $to='';$subject='';$fromtitle='';$from='';	$mailData='';	 	
	 $to="info@bhatiamobile.com";
	 $subject="New Enquiry - BHATIA Mobile.";
	 $fromtitle="BHATIA Mobile";
	 $from=$email;
	 $mailData1=$name." "." has submitted new enquiry with the folllowing details :"."<br/><br/>";
	 $mailData1=$mailData1."E-mail :".$email."<br/><br/>";
	 $mailData1=$mailData1."Mobile :".$mobile."<br/><br/>";
	 $mailData1=$mailData1."Country :".$country."<br/><br/>";
	 $mailData1=$mailData1."Message :".$desc."<br/><br/>";
	 $mailData1=$mailData1."Regards".","."<br/><br/>";
	 $mailData1=$mailData1."BHATIA Mobile"."<br/><br/>";
	 $headers = "MIME-Version: 1.0\n"; 
     $headers .= "Content-type: text/html; charset=iso-8859-1\n";
	 $headers .= "From: ".$fromtitle." <" .$from."> \n";
	
	mail($to,$subject,$mailData1,$headers);
	
	/*echo $to."<br/><br/>";
	echo $subject."<br/><br/>";
	echo $fromtitle."<br/><br/>";
	echo $from."<br/><br/>";
	echo $mailData1."<br/><br/>";
	echo $headers."<br/><br/>";
	exit;*/
	
unset($_SESSION['txtname']);
unset($_SESSION['txtemail']);
unset($_SESSION['txtmobile']);
unset($_SESSION['txtdesc']);
unset($_SESSION['txtcountry']);
	
?>		
<script language="javascript">
window.location='index.php?pageno=10&msg=yes';
</script>		
<?php exit; }
else
{ ?>
<script language="javascript">
window.location='index.php?pageno=10&req=yes';
</script>		
<?php exit; } ?>

