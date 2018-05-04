<?php
session_start();
require_once("include/config.php");

	                  /////////// Insert  //////////
	
	
if($_REQUEST["process"]=="Add")
{
	
$news_title=$_POST["txtnews"];
$news_desc=$_POST["txtnews_desc"];
$query="insert into news_mast(news_title,news_desc) values('".$news_title."','".$news_desc."')";
$result=mysql_query($query)
or die(mysql_error());
header("location:news.php");
}

                       ////////// Edit /////////////


if($_REQUEST["process"]=="Edit")
{	
	$newsid=$_POST["hdnnewsid"];
	$news_title=$_POST["txtnews"];
$news_desc=$_POST["txtnews_desc"];
	$query="update news_mast set news_title='".$news_title."',news_desc='".$news_desc."' where news_id='".$newsid."'";
	$result=mysql_query($query)
	or die(mysql_error());
header("location:news.php");
}

                       ///////////  Delete  //////////
					   

if($_REQUEST["process"]=="delete")
{
$newsid=$_GET["news_id"];

$query="delete from news_mast where news_id='".$newsid."'";

$result=mysql_query($query)
or die(mysql_error());
header("location:news.php");


}
?>