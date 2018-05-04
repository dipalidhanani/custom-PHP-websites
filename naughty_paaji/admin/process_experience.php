<?php 
include("../include/config.php");

///////////  Delete  //////////
					   

if($_REQUEST["processcomment"]=="delcomment")
{

$experience_detail_id =$_GET["experience_detail_id"];
$experience_mast_id=$_GET["experience_mast_id"];
$query="delete from experience_detail where experience_detail_id='".$experience_detail_id."'";

$result=mysql_query($query)
or die(mysql_error());

//$query1="delete from discussion_detail where discussion_detail_mast_id='".$discussion_id."'";
//
//$result1=mysql_query($query1)
//or die(mysql_error());
//

header("location:display_experience.php?share_experience_id=".$experience_mast_id."");

}

///////////  Edit Comments  //////////
					   

if($_REQUEST["process"]=="Editcommentstatus")
{

$experience_mast_id  =$_POST['experience_mast_id']; 
$experience_detail_id =$_POST['experienceid']; 
	
$status =$_POST['rdoStatus'];


mysql_query("update experience_detail set comment_active_status ='$status' where experience_detail_id=".$experience_detail_id);

echo "<script> location.href='display_experience.php?share_experience_id=".$experience_mast_id."'; </script>";

}

?>