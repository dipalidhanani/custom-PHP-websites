<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");



	                  /////////// Insert  //////////
	
	
if($_REQUEST["process"]=="Add")
{
	$trackdir=opendir("../images/colors");
	$dir_exists_flag=0;
	while($file=readdir($trackdir))
	{
		if($file=="."||$file==".."){}
		else{
		
		if(is_dir("../images/colors|".$file))
		{
			if((strcmp(trim($file))==0))
			{
				$docf1=time()."_".$_FILES['colorfile']['name'];
				move_uploaded_file($_FILES["colorfile"]["tmp_name"],"../images/colors"."/".$docf1);
				$dir_exists_flag=1;
				//echo "file added to directory";
			}
		}
		
		}
		}
		closedir($trackdir);
		if($dir_exists_flag==0)
		{
			    $docf1=time()."_".$_FILES['colorfile']['name'];				
				move_uploaded_file($_FILES["colorfile"]["tmp_name"],"../images/colors"."/".$docf1);
				//echo "created";
			
			
		}
	$color=$_POST["txtColor"];
	$colorfile=time()."_".$_FILES["colorfile"]["name"];


$query="insert into color_mast(Color,Color_image) values('".$color."','".$colorfile."')";
$result=mysql_query($query)
or die(mysql_error());
header("location:disColor.php");
}

                       ////////// Edit /////////////


if($_REQUEST["process"]=="Edit")
{
	$trackdir=opendir("../images/colors");
	$dir_exists_flag=0;
	while($file=readdir($trackdir))
	{
		if($file=="."||$file==".."){}
		else{
		
		if(is_dir("../images/colors|".$file))
		{
			if((strcmp(trim($file))==0))
			{
				$docf1=time()."_".$_FILES['changefile']['name'];
				move_uploaded_file($_FILES["changefile"]["tmp_name"],"../images/colors"."/".$docf1);
				$dir_exists_flag=1;
				//echo "file added to directory";
			}
		}
		
		}
		}
		closedir($trackdir);
		if($dir_exists_flag==0)
		{
			    $docf1=time()."_".$_FILES['changefile']['name'];				
				move_uploaded_file($_FILES["changefile"]["tmp_name"],"../images/colors"."/".$docf1);
				//echo "created";
			
			
		}
		
	$colid=$_POST["hdnColid"];
$color=$_POST["txtColor"];
$f1=time()."_".$_FILES["changefile"]["name"];

if(($_FILES["changefile"]["name"])!="")  
{
$query="update color_mast set Color='".$color."',Color_image='".$f1."' where Color_id='".$colid."'";

$result=mysql_query($query)
or die(mysql_error());
}
else
{
	$query="update color_mast set Color='".$color."' where Color_id='".$colid."'";
	$result=mysql_query($query)
	or die(mysql_error());
}

header("location:disColor.php");


}

                       ///////////  Delete  //////////
					   

if($_REQUEST["process"]=="delete")
{
	$colid=$_GET["Color_id"];

$query="delete from color_mast where Color_id='".$colid."'";

$result=mysql_query($query)
or die(mysql_error());
header("location:disColor.php");


}
?>