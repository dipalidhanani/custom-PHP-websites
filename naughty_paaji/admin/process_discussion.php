<?php 
include("../include/config.php");

/////////// Insert  //////////
	
	
if($_REQUEST["process"]=="Add")
{
	$discussion_topic=$_POST["discussion_topic"];
	$discussion_description=$_POST["discussion_description"];
$status=$_POST["status"];
	$dt=date("Y-m-d H:i:s");

$query="insert into discussion_board(discussion_topic,discussion_description,discussion_date_time,hits) values('".$discussion_topic."','".$discussion_description."','".$dt."',0)";
$result=mysql_query($query)
or die(mysql_error());


		
header("location:dis_discussion.php");
}

 ////////// Edit /////////////
 
if($_REQUEST["process"]=="Edit")
{
	$discussion_topic=$_POST["discussion_topic"];
	$discussion_description=$_POST["discussion_description"];

$discussion_board_id=$_POST["discussion_board_id"];


$query="update discussion_board set discussion_topic='".$discussion_topic."',discussion_description='".$discussion_description."' where discussion_board_id='".$discussion_board_id."' ";
$result=mysql_query($query)
or die(mysql_error());



header("location:dis_discussion.php?discussion_board_id=".$discussion_board_id."");
}

 ///////////  Delete  //////////
					   

if($_REQUEST["process"]=="delete")
{

$discussion_board_id=$_GET["discussion_board_id"];

$query="delete from discussion_board where discussion_board_id='".$discussion_board_id."'";

$result=mysql_query($query)
or die(mysql_error());


header("location:dis_discussion.php");

}

///////////  Delete  //////////
					   

if($_REQUEST["processcomment"]=="delcomment")
{

$discussion_id=$_GET["discussion_id"];
$discussion_board_mast_id=$_GET["discussion_board_mast_id"];
$query="delete from discussion_detail where discussion_detail_id='".$discussion_id."'";

$result=mysql_query($query)
or die(mysql_error());

//$query1="delete from discussion_detail where discussion_detail_mast_id='".$discussion_id."'";
//
//$result1=mysql_query($query1)
//or die(mysql_error());
//

header("location:display_discussion.php?discussion_board_id=".$discussion_board_mast_id."");

}

///////////  Delete  //////////
					   

if($_REQUEST["processabuse"]=="delabuse")
{

$abuse_report_id=$_GET["abuse_report_id"];
$discussion_board_id=$_GET["discussion_board_mast_id"];
$query="delete from abuse_report where abuse_report_id='".$abuse_report_id."'";

$result=mysql_query($query)
or die(mysql_error());


header("location:view_abuse_report.php?discussion_board_id=".$discussion_board_id."");

}
///////////  Edit Comments  //////////
					   

if($_REQUEST["process"]=="Editcommentstatus")
{

$discussionboardid =$_POST['discussionboardid']; 
$discussion_detail_id =$_POST['hdnCommentid']; 
	
$status =$_POST['rdoStatus'];


mysql_query("update discussion_detail set comment_active_status ='$status' where discussion_detail_id =".$discussion_detail_id);

echo "<script> location.href='display_discussion.php?discussion_board_id=".$discussionboardid."'; </script>";

}

?>