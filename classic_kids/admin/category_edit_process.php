<?php
session_start();
require_once("../include/config.php");
require_once("../include/function.php");
u_Connect("cn");
$username=$_SESSION['shopuname'];
if($username=="")
{
	header("Location:login.php");
	exit();	
}
else
{	
/*
$recordset = mysql_query("select * from jos_topdoc_management_users where email='".$username."'",$cn);

while($row = mysql_fetch_array($recordset,MYSQL_ASSOC))
{
						  $bname=$row["full_name"];
						  $shop_admin_access=$row["shop_admin_access"];
						  $isadmin=$row["is_admin"];
						  
}*/
	$recordset = mysql_query("select * from jos_topdoc_management_users 
INNER JOIN jos_topdoc_management_user_types_relation ON jos_topdoc_management_user_types_relation.relation_user_ID=jos_topdoc_management_users.management_user_id 	
where jos_topdoc_management_users.email='".$username."' and jos_topdoc_management_users.is_active=1 and jos_topdoc_management_user_types_relation.relation_types_ID=3 ",$cn);
					$shop_admin_access=mysql_num_rows($recordset);				
if($shop_admin_access==1)
{

				$cat_name=$_REQUEST["cat_name"];
				$cat_desc=$_REQUEST["cat_desc"];				
				$parent_category=$_REQUEST["parent_category"];
				$cat_status=$_REQUEST["cat_status"];
				
if($_FILES['cat_image']['tmp_name']!="")
{
				
		if ((($_FILES["cat_image"]["type"] == "image/gif")
		|| ($_FILES["cat_image"]["type"] == "image/png")
		|| ($_FILES["cat_image"]["type"] == "image/jpeg")
		|| ($_FILES["cat_image"]["type"] == "image/pjpeg"))
		&& ($_FILES["cat_image"]["size"] < 999999))
		{
			if ($_FILES["cat_image"]["error"] > 0)
			{
						header("Location:category_mst_add.php?msg=".urlencode("Error Occured while uplaoding file.<br/> Plaese Try Again."));
						exit();	
			}
			else
			{
				$upladimg=time()."_".$_FILES['cat_image']['name'];
				copy($_FILES['cat_image']['tmp_name'],"../../shopimages/".$upladimg);
				
				$parentCat=$_POST['cat'];
				$subCat=$_REQUEST['childcategory'];
				if($subCat<>"")
					$parent_category=$subCat;
				else
					$parent_category=$parentCat;
				//echo $parent_category."<br/>";			
				$query="update jos_shop_category_mast set category_name='".$cat_name."',category_description='".$cat_desc."',category_image_path='".$upladimg."',parent_category_id='".$parent_category."',category_active_status='".$cat_status."' where category_id='".$_REQUEST["catid"]."' ";
				
				mysql_query($query);		
				
				if($_REQUEST["StartFrom"]=="")
			    {
					$link="Location:view_category.php?msg=".urlencode("category updated successfully");
			    }
				else
				{
					$link="Location:view_category.php?StartFrom=".$_REQUEST["StartFrom"]."&msg=".urlencode("category updated successfully");
				}
				
				header($link);
				exit();			
										
			}
		}
		else
		{
			header("Location:category_mst_add.php?msg=".urlencode("Invalid File.<br/>Please Upload Jpeg/Jpg/Pjpeg, Png or Gif Files of maximum 999 KB."));
			exit();	
		}
				
}
else
{

						$parentCat=$_POST['cat'];
						$subCat=$_REQUEST['childcategory'];
						if($subCat<>"")
							$parent_category=$subCat;
						else
							$parent_category=$parentCat;
						//echo $parent_category; 
						$query="update jos_shop_category_mast set category_name='".$cat_name."',category_description='".$cat_desc."',parent_category_id='".$parent_category."',category_active_status='".$cat_status."' where category_id='".$_REQUEST["catid"]."' ";
						//echo $query; exit;
						mysql_query($query);

					if($_REQUEST["StartFrom"]=="")
					{
						$link="Location:view_category.php?msg=".urlencode("category updated successfully");
					}
					else
					{
						$link="Location:view_category.php?StartFrom=".$_REQUEST["StartFrom"]."&msg=".urlencode("category updated successfully");
					}
					
					header($link);
					exit();					
}
				
				
		
}
else
{
echo "sorry you dont have permission";
}


}
?>