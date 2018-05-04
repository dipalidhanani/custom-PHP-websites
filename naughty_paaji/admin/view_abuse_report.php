<?php
session_start();
include("../include/config.php");
?>

<html>
<head>
<title>Naughty Paaji - Admin Facility</title>
<script>
function confirmdel(frm,pk)
{
	with(frm)
	{
	var flg = false;
		for(i=0;i<pk.length;i++)
		{
			if(pk[i].checked)
			{
				flg=true;
				break;
			}
		}
		if(!flg)
		{
			alert("please select the records....")
			return false;
		}
		
		}
}
</script>
</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>     
   <td><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
   <tr>
    <td><table width="1000" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF"><?php include("headerAdmin.php");?></td>
      </tr>
      
      
      
     
     <!--   main starts here-->
<form method="post" name="discussionform" action="" >

<?php 
if($_SESSION['Admin_id'] == "")
	{
			//echo "Unauthorised Access !!!";die;
			echo "<script>location.href='login.php';</script>";
			exit();
	}
	
	
	 $a=$_GET["discussion_board_id"];
   
   $query = "select * from abuse_report
				 INNER JOIN discussion_detail ON discussion_detail.discussion_detail_id=abuse_report.discussion_detail_id
				 INNER JOIN discussion_board ON discussion_board.discussion_board_id=discussion_detail.discussion_board_mast_id
				 INNER JOIN user_registration ON user_registration.user_reg_id=discussion_detail.comment_from_id
				 where discussion_board_id='".$a."'";
   
   $result= mysql_query($query) 
   or die (mysql_error());
   
   while($res=mysql_fetch_array($result))
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
		
	   $queryrep = mysql_query("select * from abuse_report
				 INNER JOIN user_registration ON user_registration.user_reg_id=abuse_report.report_from_id
				 INNER JOIN discussion_detail ON discussion_detail.discussion_detail_id=abuse_report.discussion_detail_id
				 INNER JOIN discussion_board ON discussion_board.discussion_board_id=discussion_detail.discussion_board_mast_id
				 where abuse_report_id='".$res["abuse_report_id"]."'");	
	   if($res1=mysql_fetch_array($queryrep))
   {
	   $report_from=$res1["first_name"]." ".$res1["last_name"];
  
	?>  
    <tr>
        <td bgcolor="#FFFFFF">   
   <table width="100%" border="0" cellspacing="10" cellpadding="0">
          
          <tr>
            <td>
<table width="100%" cellpadding="5" cellspacing="0" class="border">
<tr><td class="normal_fonts10"><?php echo $report_from; ?> has reported post on the basis of : <?php echo $res["reason"]; ?>.</td>
</tr>
<tr>
<td class="normal_fonts10">Personal Message : <?php echo $res["message"]; ?></td>
</tr>
<tr>
<td class="normal_fonts10">Discussion Topic: <?php echo $res["discussion_topic"]; ?></td>
</tr>
<tr>
<td class="normal_fonts10">Original Message Posted by <?php echo $comment_from; ?> on <?php echo $rdate; ?> at <?php echo $tim; ?></td>
</tr>
<tr><td class="normal_fonts10">
<?php echo $res["discussion_comment"]; ?>
</td></tr>
<tr><td class="normal_fonts10">Report Abuse Request from : <?php echo $res["ipaddress"]; ?></td></tr>

<tr><td>&nbsp;&nbsp;<input name="back" type="button" class="normal_fonts12_black" id="back" style="width:80px; height:30px" value="Back" onClick="history.go(-1)" /></td></tr>

</table>	 </td>
          </tr>
          
</table>
</td>
      </tr>
<?php  } } ?>
</form>
<!--   main ends here-->



    </table></td>
  </tr>
  
  <tr>
        <td align="center" valign="middle">
        <?php  include("footer.php"); ?>
        </td>
  </tr>
</table>
 </td></tr></table>
</body>
</html>