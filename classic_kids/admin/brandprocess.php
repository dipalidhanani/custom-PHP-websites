<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");


	                  /////////// Insert  //////////
	
	
if($_REQUEST["process"]=="Add")
{
	 function getExtension($str) {
				 $i = strrpos($str,".");
				 if (!$i) { return ""; }
				 $l = strlen($str) - $i;
				 $ext = substr($str,$i+1,$l);
				 return $ext;
		 }

////upladoing image file

if($_FILES["brand_image"]["name"]<>"" )
{
		 
		 
		$max_filesize = 999999; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["brand_image"]["name"] ;
	
	
		
		$photo_title=$_FILES["brand_image"]["name"];
	    // echo "asd";
		$uploadedfile = $_FILES['brand_image']['tmp_name'];
		 
		if ($photo_title) 
		{
		
			$filename = stripslashes($_FILES['brand_image']['name']);
	
			$extension = getExtension($filename);
			
			$extension = strtolower($extension);
			
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				
				$error="Unkown Image Extension";					
			}		
			else
			{	
				if($_FILES["brand_image"]["size"] >= $max_filesize)
				{				  
				 	 $error="File size too large";				  				  
					 exit;
				}
				
				$size=filesize($_FILES['brand_image']['tmp_name']);
				//echo "s=".$size; 
				
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['brand_image']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);			
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['brand_image']['tmp_name'];
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
					
					$newwidth=318;
					$newheight=318;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					//$newwidth1=190;
					//$newheight1=200;//($height/$width)*$newwidth1;
					$newwidth1=98;
					$newheight1=98;//($height/$width)*$newwidth1;
					
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
	
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);																							
					
					$id=mysql_query("select * from kid_brand_mast order by kid_brand_id");
					$total=mysql_affected_rows();
					$b=$total+1;									

					$tfilename = "../brands/t". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="t".$b . "." . $extension;		
					$ffilename = "../brands/f". $b . "." . $extension ;
					$q="f".$b . "." . $extension;	
					//echo $ffilename."<br>";			
					$brand_thumb_photo = $p;
					$brand_big_photo = $q;
																
					move_uploaded_file($_FILES['brand_image']["tmp_name"],$tfilename);
					move_uploaded_file($_FILES['brand_image']["tmp_name"],$ffilename); 
					
					imagejpeg($tmp1,$tfilename,100);						
					imagejpeg($tmp,$ffilename,100);
					
					
									
					imagedestroy($src);
					imagedestroy($tmp);
					imagedestroy($tmp1);
			}
		}
	}	


	

	
	$qmast=mysql_query("insert into kid_brand_mast
			(kid_brand_name,
			 kid_main_brand_cover_image,
			 kid_brand_logo_image,
			 kid_brand_active_status)
			 values('".$_REQUEST["kid_brand_name"]."',
			'".$brand_big_photo."',
			'".$brand_thumb_photo."',
			'".$_REQUEST["kid_brand_active_status"]."')");
header("location:brand.php");
}

                       ////////// Edit /////////////


if($_REQUEST["process"]=="Edit")
{
function getExtension($str) {
				 $i = strrpos($str,".");
				 if (!$i) { return ""; }
				 $l = strlen($str) - $i;
				 $ext = substr($str,$i+1,$l);
				 return $ext;
		 }

////upladoing image file
	 if($_FILES["brand_image"]["name"]<>"" )
{
	$del=mysql_query("select * from kid_brand_mast where kid_brand_id='".$_REQUEST['kid_brand_id']."'");

	$d=mysql_fetch_array($del);

	$fileisthumb=$d['kid_brand_logo_image'];

	$paththumb='../brands/'.$fileisthumb;

	unlink($paththumb);
	$fileisfull=$d['kid_main_brand_cover_image'];

	$pathfull='../brands/'.$fileisfull;

	unlink($pathfull);
	
	
		$max_filesize = 999999; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["brand_image"]["name"] ;
	
	
		
		$photo_title=$_FILES["brand_image"]["name"];
	    // echo "asd";
		$uploadedfile = $_FILES['brand_image']['tmp_name'];
		 
		if ($photo_title) 
		{
		
			$filename = stripslashes($_FILES['brand_image']['name']);
	
			$extension = getExtension($filename);
			
			$extension = strtolower($extension);
			
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				
				$error="Unkown Image Extension";					
			}		
			else
			{	
				if($_FILES["brand_image"]["size"] >= $max_filesize)
				{				  
				 	 $error="File size too large";				  				  
					 exit;
				}
				
				$size=filesize($_FILES['brand_image']['tmp_name']);
				//echo "s=".$size; 
				
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['brand_image']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);			
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['brand_image']['tmp_name'];
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
					
					$newwidth=318;
					$newheight=318;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					//$newwidth1=190;
					//$newheight1=200;//($height/$width)*$newwidth1;
					$newwidth1=98;
					$newheight1=98;//($height/$width)*$newwidth1;
					
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
	
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);																							
					
					$id=mysql_query("select * from kid_brand_mast where kid_brand_id='".$_REQUEST["kid_brand_id"]."' order by kid_brand_id");
					$rowid=mysql_fetch_array($id);
					$b=$rowid["kid_brand_id"];									

					$tfilename = "../brands/t". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$brand_thumb_image="t".$b . "." . $extension;		
					$ffilename = "../brands/f". $b . "." . $extension ;
					$brand_full_image="f".$b . "." . $extension;	
					//echo $ffilename."<br>";			
					
																
					move_uploaded_file($_FILES['brand_image']["tmp_name"],$tfilename);
					move_uploaded_file($_FILES['brand_image']["tmp_name"],$ffilename); 
					
					imagejpeg($tmp1,$tfilename,100);						
					imagejpeg($tmp,$ffilename,100);
					
					
								
					imagedestroy($src);
					imagedestroy($tmp);
					imagedestroy($tmp1);
			}
		}
	}	
	

if(($_FILES["brand_image"]["name"])!="")  
{
	
	
$query="update kid_brand_mast set kid_brand_name='".$_REQUEST["kid_brand_name"]."',kid_main_brand_cover_image='".$brand_full_image."' ,kid_brand_logo_image='".$brand_thumb_image."',kid_brand_active_status='".$_REQUEST["kid_brand_active_status"]."' where kid_brand_id='".$_REQUEST["kid_brand_id"]."'";

$result=mysql_query($query)
or die(mysql_error());
}
else
{
	$query="update kid_brand_mast set kid_brand_name='".$_REQUEST["kid_brand_name"]."',kid_brand_active_status='".$_REQUEST["kid_brand_active_status"]."' where kid_brand_id='".$_REQUEST["kid_brand_id"]."'";
	$result=mysql_query($query)
	or die(mysql_error());
}

header("location:brand.php");


}

                       ///////////  Delete  //////////
					   

if($_REQUEST["process"]=="delete")
{
	$del=mysql_query("select * from kid_brand_mast where kid_brand_id='".$_GET['kid_brand_id']."'");

	$d=mysql_fetch_array($del);

	$fileisthumb=$d['kid_brand_logo_image'];

	$paththumb='../brands/'.$fileisthumb;

	unlink($paththumb);
	
	$fileisfull=$d['kid_main_brand_cover_image'];

	$pathfull='../brands/'.$fileisfull;

	unlink($pathfull);
	
	mysql_query("delete from kid_brand_mast where kid_brand_id='".$_GET['kid_brand_id']."'") or die(mysql_error());

header("location:brand.php");


}
?>