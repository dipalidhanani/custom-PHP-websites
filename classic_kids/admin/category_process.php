<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");

$cat_name=$_REQUEST["cat_name"];								
$parent_category=$_REQUEST["parent_category"];
$cat_status=$_REQUEST["cat_status"];
	
if($parent_category=="")
{
			$parent_category=0;
}		
if($_REQUEST["childcategory"]!="")
{
			$parent_category=$_REQUEST["childcategory"];
}
		
if($_REQUEST["process"]=="add")
{
										
		
		
		$query="insert into category_master (category_name,parent_category_ID,category_active_status,cat_display_order) values ('".$cat_name."','".$parent_category."','".$cat_status."','".$_REQUEST["cat_display_order"]."')";
		mysql_query($query);
		
		header("Location:category_add.php?msg=".urlencode("category added successfully"));
		exit();
}
if($_REQUEST["process"]=="edit")
{
	
	
				$query="update category_master set category_name='".$cat_name."',parent_category_ID='".$parent_category."',category_active_status='".$cat_status."',cat_display_order='".$_REQUEST["cat_display_order"]."' where category_ID='".$_REQUEST["catid"]."' ";
				
				mysql_query($query);	
					
					if($_REQUEST["StartFrom"]=="")
					{
						$link="Location:category_view.php?msg=".urlencode("category updated successfully");
					}
					else
					{
						$link="Location:category_view.php?StartFrom=".$_REQUEST["StartFrom"]."&msg=".urlencode("category updated successfully");
					}
					
					header($link);
					exit();	
}
if($_REQUEST["process"]=="remove")
{
			$query="delete from category_master where category_ID='".$_REQUEST["catid"]."'";
				mysql_query($query);
					
					if($_REQUEST["StartFrom"]=="")
					{
						$link="Location:category_view.php?msg=".urlencode("category removed successfully");
					}
					else
					{
						$link="Location:category_view.php?StartFrom=".$_REQUEST["StartFrom"]."&msg=".urlencode("category removed successfully");
					}
					
					header($link);
					exit();	
}
?>