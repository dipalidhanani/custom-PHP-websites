<?php session_start();
include("include/config.php");

if($_SESSION['user_reg_id'] == "")
	{
			//echo "Unauthorised Access !!!";die;
			echo "<script>location.href='login.php';</script>";
			exit();
	}
$userid=$_SESSION['user_reg_id'];
/////////// Insert  //////////
	
	
if($_REQUEST["submit"]=="Submit")
{
	$discussion_board_id=$_POST["discussion_board_id"];
	$discussion_comment=$_POST["discussion_comment"];
$user_reg_id=$_SESSION['user_reg_id'];
	$dt=date("Y-m-d H:i:s");
if($discussion_comment!="")
	{
$query="insert into discussion_detail(discussion_board_mast_id,discussion_comment,comment_from_id,comment_date_time,comment_active_status,discussion_detail_mast_id) values('".$discussion_board_id."','".$discussion_comment."','".$user_reg_id."','".$dt."',1,0)";
$result=mysql_query($query)
or die(mysql_error());
	}
		
header("location:index.php?page=9&discussion_board_id=".$discussion_board_id."&msg=1");
}

/////////////// insert Quote /////////

if($_REQUEST["comment_submit"]=="Quote")
{
	
	$discussion_board_id=$_POST["discussion_board_id"];
	$quote_msg=$_POST["quote_msg"];
$user_reg_id=$_SESSION['user_reg_id'];
	$msg_id=$_POST["msg_id"];
	$dt=date("Y-m-d H:i:s");
	if($quote_msg!="")
	{
	$query="insert into discussion_detail(discussion_board_mast_id,discussion_comment,comment_from_id,comment_date_time,comment_active_status,discussion_detail_mast_id) values('".$discussion_board_id."','".$quote_msg."','".$user_reg_id."','".$dt."',1,'".$msg_id."')";
	
$result=mysql_query($query)
or die(mysql_error());
	}
	
	header("location:index.php?page=9&discussion_board_id=".$discussion_board_id."");
	}
	
////////////////// insert Quote /////////
 
 if($_REQUEST["query_submit"]=="Submit")
{
	$first_name=$_SESSION['first_name'];
	$last_name=$_SESSION['last_name'];
	$email=$_SESSION["email"];
	$username=$first_name." ".$last_name;
	$discussion_board_id=$_POST["discussion_board_id"];
	$reason=$_POST["reason"];
	$message=$_POST["message"];
	$discussion_detail_id=$_POST["hdnDisid"];
	$ipaddress=$_SERVER['REMOTE_ADDR'];
	
	if($message!="")
	{
	$query="insert into abuse_report(discussion_detail_id,reason,message,ipaddress,report_from_id) values('".$discussion_detail_id."','".$reason."','".$message."','".$ipaddress."','".$userid."')";
	
$result=mysql_query($query)
or die(mysql_error());
$id=mysql_insert_id();
	}
//////////// Send mail to admin /////////////////

$qumastadmin=mysql_query("select * from admin_mast where is_master_admin=1");
	$resMastad=mysql_fetch_array($qumastadmin);
	  $adnm=$resMastad["admin_name"];
	  $ademail=$resMastad["email_id"];
	  
	  function u_SendMail($FromMail,$ToMail,$Data,$Subject)
						{
							$headers = "MIME-Version: 1.0\n"; 
							$headers .= "Content-type: text/html; charset=iso-8859-1\n";
							
							$headers .= "From: $FromMail\n";
						
							if(strpos($_SERVER['SERVER_NAME'],".com"))
							{
								$myresult=mail($ToMail, $Subject , $Data, $headers);
							}					
						}
$FromMail=$username." - User <".$email.">";
$qres=mysql_query("select * from abuse_report
				 INNER JOIN discussion_detail ON discussion_detail.discussion_detail_id=abuse_report.discussion_detail_id
				 INNER JOIN discussion_board ON discussion_board.discussion_board_id=discussion_detail.discussion_board_mast_id
				 INNER JOIN user_registration ON user_registration.user_reg_id=discussion_detail.comment_from_id
				 where abuse_report_id='".$id."'");
if($res=mysql_fetch_array($qres))
{
	$comment_from=$res["first_name"]." ".$res["last_name"];
	$dt1=explode("-",$res["comment_date_time"]);
                                                                $yy1=$dt1[0];
                                                                $mm1=$dt1[1];
                                                                $dd1=$dt1[2];
																
                                                             $tm=explode(" ",$dd1);
															     $dt=$tm[0];
																 $tim=$tm[1];
                                                            $rdate=$dt."-".$mm1."-".$yy1;
                                                          
$Data='<table>
<tr>
<td>Dear Admin,</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr><td>'.$username.' has reported post on the basis of : '.$res["reason"].'.</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td>Personal Message : '.$res["message"].'</td>
</tr>

<tr>
<td>Discussion Topic: '.$res["discussion_topic"].'</td>
</tr>
<tr>
<td>Original Message :</td>
</tr>
<tr>
<td>Posted by '.$comment_from.' on '.$rdate.' at '.$tim.'</td>
</tr>
<tr><td>
'.$res["discussion_comment"].'
</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>Report Abuse Request from : '.$res["ipaddress"].' </td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>Regards,</td></tr>
<tr><td>V3+ Admin</td></tr>
</table>';

						 
		$devnm=$resu["Developer_name"];
		$devemail=$resu["Email_id"];
						
							
						$ToMail=$adnm." - Admin <".$ademail.">";   
						
						u_SendMail($FromMail,$ToMail,$Data,$Subject);

}

	
	header("location:index.php?page=9&discussion_board_id=".$discussion_board_id."");
	}
?>