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
										
		
	function getExtension($str) {
				 $i = strrpos($str,".");
				 if (!$i) { return ""; }
				 $l = strlen($str) - $i;
				 $ext = substr($str,$i+1,$l);
				 return $ext;
		 }
		 
		 
//////////  Display image /////////////


if($_FILES["display_image"]["name"]<>"" )
{
		$max_filesize = 999999; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["display_image"]["name"] ;
	
	    $photo_title=$_FILES["display_image"]["name"];
	    // echo "asd";
		$uploadedfile = $_FILES['display_image']['tmp_name'];
		 
		if ($photo_title) 
		{
		
			$filename = stripslashes($_FILES['display_image']['name']);
	
			$extension = getExtension($filename);
			
			$extension = strtolower($extension);
			
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				
				$error="Unkown Image Extension";					
			}		
			else
			{	
				if($_FILES["display_image"]["size"] >= $max_filesize)
				{				  
				 	 $error="File size too large";				  				  
					 exit;
				}
				
				$size=filesize($_FILES['display_image']['tmp_name']);
				//echo "s=".$size; 
				
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['display_image']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);			
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['display_image']['tmp_name'];
					$src = imagecreatefrompng($uploadedfile);
				}
				else 
				{
					$src = imagecreatefromgif($uploadedfile);							
				}
				
				if($size >= $max_filesize)
				{				  
				 	 $error="File size too large";				  				 
					 exit;
				}					
										
					list($width,$height)=getimagesize($uploadedfile);
					
					$newwidth=220;
					$newheight=119;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					
	
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
																												
					
					$id=mysql_query("select * from category_master order by category_ID");
					$total=mysql_affected_rows();
					$b=$total+1;									

					$tfilename = "../category/display_image_". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="display_image_".$b . "." . $extension;		
						
					//echo $ffilename."<br>";			
					$category_display_image = $p;
					
																
					move_uploaded_file($_FILES['display_image']["tmp_name"],$tfilename);
					
					
					imagejpeg($tmp,$tfilename,100);
				
									
					imagedestroy($src);
					imagedestroy($tmp);
					
			}
		}
	}	
	
	
		$query="insert into category_master (category_name,category_display_image,parent_category_ID,category_display_order,category_active_status) values ('".$cat_name."','".$category_display_image."','".$parent_category."','".$_REQUEST["category_display_order"]."','".$cat_status."')";
		mysql_query($query);
		
		header("Location:category_add.php?msg=".urlencode("category added successfully"));
		exit();
}
if($_REQUEST["process"]=="edit")
{
	
	 function getExtension($str) {
				 $i = strrpos($str,".");
				 if (!$i) { return ""; }
				 $l = strlen($str) - $i;
				 $ext = substr($str,$i+1,$l);
				 return $ext;
		 }

////upladoing image file
	
if($_FILES["changeimage"]["name"]<>"" )
{
		$max_filesize = 999999; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["changeimage"]["name"] ;
	
	    $photo_title=$_FILES["changeimage"]["name"];
	    // echo "asd";
		$uploadedfile = $_FILES['changeimage']['tmp_name'];
		 
		if ($photo_title) 
		{
		
			$filename = stripslashes($_FILES['changeimage']['name']);
	
			$extension = getExtension($filename);
			
			$extension = strtolower($extension);
			
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				
				$error="Unkown Image Extension";					
			}		
			else
			{	
				if($_FILES["changeimage"]["size"] >= $max_filesize)
				{				  
				 	 $error="File size too large";				  				  
					 exit;
				}
				
				$size=filesize($_FILES['changeimage']['tmp_name']);
				//echo "s=".$size; 
				
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['changeimage']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);			
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['changeimage']['tmp_name'];
					$src = imagecreatefrompng($uploadedfile);
				}
				else 
				{
					$src = imagecreatefromgif($uploadedfile);							
				}
				
				if($size >= $max_filesize)
				{				  
				 	 $error="File size too large";				  				 
					 exit;
				}					
					
					
					list($width,$height)=getimagesize($uploadedfile);
					
					$newwidth=220;
					$newheight=119;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
						
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);					
					
					
					$b=$_REQUEST["catid"];									

					$tfilename = "../category/display_image_". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="display_image_".$b . "." . $extension;		
					
					//echo $ffilename."<br>";			
					$category_display_image = $p;
					
																
					move_uploaded_file($_FILES['changeimage']["tmp_name"],$tfilename);
					
					
					imagejpeg($tmp,$tfilename,100);
				
					
									
					imagedestroy($src);
					imagedestroy($tmp);
				
			}
		}
	}	
	else{
		$category_display_image =$_REQUEST["currentimage"];
		}
	
				$query="update category_master set category_name='".$cat_name."',category_display_image='".$category_display_image."',parent_category_ID='".$parent_category."',category_display_order='".$_REQUEST["category_display_order"]."',category_active_status='".$cat_status."' where category_ID='".$_REQUEST["catid"]."' ";
				
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