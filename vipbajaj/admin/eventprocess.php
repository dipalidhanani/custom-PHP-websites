<?php
session_start();
require_once("include/config.php");



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

if($_FILES["eventfile"]["name"]<>"" )
{
		 
		 
		$max_filesize = 2097152; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["eventfile"]["name"] ;
	
	
		
		$photo_title=$_FILES["eventfile"]["name"];
	    // echo "asd";
		$uploadedfile = $_FILES['eventfile']['tmp_name'];
		 
		if ($photo_title) 
		{
		
			$filename = stripslashes($_FILES['eventfile']['name']);
	
			$extension = getExtension($filename);
			
			$extension = strtolower($extension);
			
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				
				$error="Unkown Image Extension";					
			}		
			else
			{	
				if($_FILES["eventfile"]["size"] >= $max_filesize)
				{				  
				 	 $error="File size too large";				  				  
					 exit;
				}
				
				$size=filesize($_FILES['eventfile']['tmp_name']);
				//echo "s=".$size; 
				
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['eventfile']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);			
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['eventfile']['tmp_name'];
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
					
					$newwidth=180;
					$newheight=180;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
				
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
																									
					
					$id=mysql_query("select * from event_mast order by event_id");
					$total=mysql_affected_rows();
					$b=$total+1;									

					$tfilename = "../events/event_". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="event_".$b . "." . $extension;		
					
					$eventfile = $p;
					
																
					move_uploaded_file($_FILES['eventfile']["tmp_name"],$tfilename);
					
				
					imagejpeg($tmp,$tfilename,100);
				
									
					imagedestroy($src);
					imagedestroy($tmp);
					
			}
		}
	}	
	
	$event_title=$_POST["txtevent_title"];


$query="insert into event_mast(event_title,event_desc,event_photo,event_video) values('".$event_title."','".$_REQUEST["txtevent_desc"]."','".$eventfile."','".$_REQUEST["event_video"]."')";
$result=mysql_query($query)
or die(mysql_error());
header("location:event.php");
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
	if($_FILES["changefile"]["name"]<>"" )
{
		 
		 
		$max_filesize = 2097152; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["changefile"]["name"] ;
	
	
		
		$photo_title=$_FILES["changefile"]["name"];
	    // echo "asd";
		$uploadedfile = $_FILES['changefile']['tmp_name'];
		 
		if ($photo_title) 
		{
		
			$filename = stripslashes($_FILES['changefile']['name']);
	
			$extension = getExtension($filename);
			
			$extension = strtolower($extension);
			
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				
				$error="Unkown Image Extension";					
			}		
			else
			{	
				if($_FILES["changefile"]["size"] >= $max_filesize)
				{				  
				 	 $error="File size too large";				  				  
					 exit;
				}
				
				$size=filesize($_FILES['changefile']['tmp_name']);
				//echo "s=".$size; 
				
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['changefile']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);			
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['changefile']['tmp_name'];
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
					
					$newwidth=180;
					$newheight=180;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
				
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
																									
					
					$id=mysql_query("select * from event_mast where event_id='".$_POST["hdnColid"]."'");
					$revent=mysql_fetch_array($id);
					$b=$revent["event_id"];									

					$tfilename = "../events/event_". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="event_".$b . "." . $extension;		
					
					$eventfile = $p;
					
																
					move_uploaded_file($_FILES['changefile']["tmp_name"],$tfilename);
					
				
					imagejpeg($tmp,$tfilename,100);
				
									
					imagedestroy($src);
					imagedestroy($tmp);
					
			}
		}
	}
	else{
		$eventfile=$_REQUEST["event_ex_photo"];
		}
		
	$colid=$_POST["hdnColid"];
$event_title=$_POST["txtevent_title"];

$query="update event_mast set event_title='".$event_title."',event_desc='".$_REQUEST["txtevent_desc"]."',event_photo='".$eventfile."',event_video='".$_REQUEST["txtevent_video"]."' where event_id='".$colid."'";

$result=mysql_query($query)
or die(mysql_error());

header("location:event.php");


}

                       ///////////  Delete  //////////
					   

if($_REQUEST["process"]=="delete")
{
	$colid=$_GET["event_id"];

$query="delete from event_mast where event_id='".$colid."'";

$result=mysql_query($query)
or die(mysql_error());
header("location:event.php");


}
?>