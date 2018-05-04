<?php session_start();
require("../admin/config.inc.php"); 
require("../admin/Database.class.php"); 
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
$db->connect(); 
?>
<?php
	$email=$_POST['email'];
	$pa=mysql_query("select * from user_mst where Email_Address='".$email."' and Is_Active=1");
	$rows=mysql_affected_rows();
	if($rows=='1')
	{
		$k=mysql_fetch_array($pa);
		$password=base64_decode($k['Password']);	
		$username=$k['User_Name'];
		$email=$k['Email_Address'];
		//$value=array($password);
		//$db->update("usermaster","EmailAddress",$email,$column,$value);

		/////////////// Client Mail ///////////
	
		 $to=$email;
		 $subject="Bhatia Mobile - Login Information";
		 $fromtitle="Bhatia Mobile";
		 $from="info@bhatiamobile.com";
		 $mailData=$mailData."Following is the requested Login Information,."."<br/><br/>";
		 $mailData=$mailData."Username : ".$username."<br/><br/>";
		 $mailData=$mailData."Password : ".$password."<br/><br/>";
		 $mailData=$mailData."Regards,"."<br/><br/>";
		 $mailData=$mailData."Bhatia Mobile"."<br/><br/>";
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
		exit;
		*/
		//exit;


?>
<script type="text/javascript">
window.location = "index.php?pageno=12&msg=yes"
 </script>
<?php 	
 exit;	}
	else
	{?>
    <script language="javascript">
	window.location="index.php?pageno=12&msg=no";
	</script>
	<?php 	
  exit;	}
	?>
