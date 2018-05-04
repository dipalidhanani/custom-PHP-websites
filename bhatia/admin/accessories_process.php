<?php 
session_start();
include("session_check.php");
require("config.inc.php"); 
require("Database.class.php"); 
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
$db->connect(); 

$is_edit=$_REQUEST['is_edit'];

$column=array("Name","Code","Srno","Dillar_Price","Bhatia_Price","Final_Price","Disp_Order","Description","Is_Image");

	$name=$_POST['name'];
	$code=$_POST['code'];
	$srno=$_POST['srno'];
	$dprice=$_POST['dprice'];
	$bmprice=$_POST['bmprice'];
	$fprice=$_POST['fprice'];
	$descr=$_POST['descr'];
	$order=$_POST["order"];


if($is_edit==1)
{ 
	if($_FILES["image"]["name"]<>"" )
	 {
		$max_filesize = 9999999; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["image"]["name"] ;
		 function getExtension($str) {
				 $i = strrpos($str,".");
				 if (!$i) { return ""; }
				 $l = strlen($str) - $i;
				 $ext = substr($str,$i+1,$l);
				 return $ext;
		 }
		$photo_title=$_FILES["image"]["name"];
	   // echo "asd";
		$uploadedfile = $_FILES['image']['tmp_name'];
		if ($photo_title) 
		{
			$filename = stripslashes($_FILES['image']['name']);
			$extension = getExtension($filename);
			$extension = strtolower($extension);
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				
				$error="Unkown Image Extension";					
			}		
			else
			{	
				if($_FILES["image"]["size"] >= $max_filesize)
				{				  
				 	 $error="File size too large";				  				  
					 exit;
				}
				$size=filesize($_FILES['image']['tmp_name']);
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['image']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);			
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['image']['tmp_name'];
					$src = imagecreatefrompng($uploadedfile);
				}
				else 
				{
					$src = imagecreatefromgif($uploadedfile);							
				}
				if($size >= $max_filesize)
				{				  
				 	 echo $error="File size too large";				  				 
					 exit;
				}					
					list($width,$height)=getimagesize($uploadedfile);
					$tmp=imagecreatetruecolor($width,$height);
					//$newwidth1=190;
					//$newheight1=200;//($height/$width)*$newwidth1;
					$newwidth1=$width;
					$newheight1 = ($height * $width) / $width;
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
					imagecopyresampled($tmp,$src,0,0,0,0,$width,$height,$width,$height);
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);																							
					$b=$_FILES['image']['name'];
					$tfilename = "../accessories/photo_". $b;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="photo_".$b;		
					$ffilename = "../accessories/ph_". $p;
					//echo $ffilename."<br>";			
					$image = $p;
					move_uploaded_file($_FILES['image']["tmp_name"],$tfilename);
					move_uploaded_file($_FILES['image']["tmp_name"],$ffilename); 
					imagejpeg($tmp1,$tfilename,100);						
					imagejpeg($tmp,$ffilename,100);
					if(is_uploaded_file($_FILES["image"]["tmp_name"]))
					{
						//copy($_FILES['image']['tmp_name'], $ffilename);
						//copy($_FILES['image']['tmp_name'], $tfilename);
					}
					imagedestroy($src);
					imagedestroy($tmp);
					imagedestroy($tmp1);
			}
		}
	 }
		else
		{
		$image=$_REQUEST["existing_file_value"];
		}
	$value=array($name,$code,$srno,$dprice,$bmprice,$fprice,$order,$descr,$image);
	$txtid=$_POST['txtid'];
	$db->update("accessories","Ass_Id",$txtid,$column,$value);
}
else
{ 
	 if($_FILES["image"]["name"]<>"" )
	 {

		$max_filesize = 9999999; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["image"]["name"] ;
		 function getExtension($str) {
				 $i = strrpos($str,".");
				 if (!$i) { return ""; }
				 $l = strlen($str) - $i;
				 $ext = substr($str,$i+1,$l);
				 return $ext;
		 }
		$photo_title=$_FILES["image"]["name"];
	   // echo "asd";
		$uploadedfile = $_FILES['image']['tmp_name'];
		if ($photo_title) 
		{
			$filename = stripslashes($_FILES['image']['name']);
			$extension = getExtension($filename);
			$extension = strtolower($extension);
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				
				$error="Unkown Image Extension";					
			}		
			else
			{	
				if($_FILES["image"]["size"] >= $max_filesize)
				{				  

				 	 echo $error="File size too large";				  				  
					 exit;
				}
				$size=filesize($_FILES['image']['tmp_name']);
				//echo "s=".$size; 
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['image']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);			
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['image']['tmp_name'];
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
					$tmp=imagecreatetruecolor($width,$height);
					//$newwidth1=190;
					//$newheight1=200;//($height/$width)*$newwidth1;
					$newwidth1=$width;
					$newheight1 = ($height * $width) / $width;
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
					imagecopyresampled($tmp,$src,0,0,0,0,$width,$height,$width,$height);
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);																							
					$b=$_FILES['image']['name'];
					$tfilename = "../accessories/photo_". $b;
					//$_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="photo_".$b;		
					$ffilename = "../accessories/ph_". $p;
					//echo $ffilename."<br>";			
					$image = $p;
					move_uploaded_file($_FILES['image']["tmp_name"],$tfilename);
					move_uploaded_file($_FILES['image']["tmp_name"],$ffilename); 
					imagejpeg($tmp1,$tfilename,100);						
					imagejpeg($tmp,$ffilename,100);
					if(is_uploaded_file($_FILES["image"]["tmp_name"]))
					{
						//copy($_FILES['image']['tmp_name'], $ffilename);
						//copy($_FILES['image']['tmp_name'], $tfilename);
					}
					imagedestroy($src);
					imagedestroy($tmp);
					imagedestroy($tmp1);
			}
		}
	 }
	$value=array($name,$code,$srno,$dprice,$bmprice,$fprice,$order,$descr,$image);
	$db->insert("accessories",$column,$value);
}

?>
<script type="text/javascript">
window.location='accessories.php';
</script>
