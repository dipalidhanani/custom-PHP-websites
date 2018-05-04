<?php 
session_start();
require("config.inc.php"); 
require("Database.class.php"); 
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
$db->connect(); 
if($_POST['btn'])
{
	if($data=$_POST['data']!='' and $subj=$_POST['subject']!='')
	{
	$data=$_POST['data']; 
	$subj=$_POST['subject'];
	
		$query="select * from user_mst where Is_Active=1 order by User_Id";
		$result=mysql_query($query) or die(mysql_error());
			while($a=mysql_fetch_array($result))
			{
			$uname = $a['Email_Address'];
			$headers = "From: Bhatia mobile <info@bhatiamobile.com> \r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			mail($a["Email_Address"],$subj,$data,$headers);
			}  	?>
           <script language="javascript"> 
			location.href='user.php?sent=1' 
    		</script>  
		<?php 	
		}
 }

else
{
?>
	<script language="javascript"> 
	location.href='user_mail.php?err=yes' 
    </script>
	<?php
}?>
