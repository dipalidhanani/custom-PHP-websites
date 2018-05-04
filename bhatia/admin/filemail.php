<?php
session_start();
require_once("config.inc.php");
require_once("Database.class.php");
require_once("session_check.php");
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
$db->connect();  

include('Mail.php'); 
include('Mail/mime.php'); 
include('Mail/mail.php');

$subject=$_POST['subject'];
$msg=$_POST['msg'];
$mailfile=$_POST['mailfile'];

	if($_FILES['mailfile']['tmp_name']!="")
	{
	$mailfile=time()."_".$_FILES['mailfile']['name'];
	copy($_FILES['mailfile']['tmp_name'],"../data/".$mailfile);												
	}
	
	mysql_query("insert into mailbox_data values('NULL','$mailfile')") or die(mysql_error());

$select_file=mysql_query("select * from mailbox_data order by Mailbox_Data_Id desc Limit 1");
$st=mysql_fetch_array($select_file);

if($_POST['maildata'])
	{
		$checkbox=$_POST['checkbox'];
		for($i=0;$i<count($checkbox);$i++)
		{
			$id = $checkbox[$i];
			$mquery="select * from  franchise_mst where Franchise_Id='".$id."'";
			$md=mysql_query($mquery);
			$k=mysql_fetch_array($md);
			$franchisee_mailid=$k['Email_Address'];
			
			
	$data='';
	$data .= $msg;

	$text = $subject; 
	$html = $data; 
	$file = '../data/'.$st['File_Name']; 
	$crlf = "\n"; 
	$hdrs = array( 
				  'From'    => 'Bhatia Mobile <franchisee@bhatiamobile.com>', 
				  'Subject' => $subject
				  ); 
	
	$mime = new Mail_mime($crlf); 
	
	$mime->setTXTBody($text); 
	$mime->setHTMLBody($html); 
	$mime->addAttachment($file, 'text/plain'); 
	
	//do not ever try to call these lines in reverse order 
	$body = $mime->get(); 
	$hdrs = $mime->headers($hdrs); 
	$to=$franchisee_mailid;
	$mail =& Mail::factory('mail','-f franchisee@bhatiamobile.com');   // add the fifth parameter for the PHP mail() function 
	$mail->send($to, $hdrs, $body); 
}
	}
	
mysql_query('truncate mailbox_data');	
unlink($file);

?>

<script language="javascript">
window.location='franchise.php?msg=yes';
</script>