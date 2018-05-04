<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();  
	
	if($_POST['mail'])
	{
		$checkbox=$_POST['checkbox'];
		for($i=0;$i<count($checkbox);$i++)
		{
			$id = $checkbox[$i];
			$mquery="select * from  franchise_mst where Franchise_Id='".$id."'";
			$md=mysql_query($mquery);
			$k=mysql_fetch_array($md);
			$franchisee_mailid=$k['Email_Address'];
			mysql_query("insert into mailbox values('NULL','".$franchisee_mailid."')") or die(mysql_error());
		}
	}
?>    
<script language="javascript">
window.location='franchise.php';
</script>