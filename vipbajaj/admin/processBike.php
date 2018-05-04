<?php
session_start();
include("include/config.php");

if($_SESSION['Admin_id'] == "")
	{
			//echo "Unauthorised Access !!!";die;
			echo "<script>location.href='login.php';</script>";
			exit();
	}

?>
<?php
$now = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];

if($_REQUEST["process"]=="addbike")
{
	
	 function getExtension($str) {
				 $i = strrpos($str,".");
				 if (!$i) { return ""; }
				 $l = strlen($str) - $i;
				 $ext = substr($str,$i+1,$l);
				 return $ext;
		 }

////upladoing image file

if($_FILES["bike_photo"]["name"]<>"" )
{
		 
		 
		$max_filesize = 999999; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["bike_photo"]["name"] ;
	
	
		
		$photo_title=$_FILES["bike_photo"]["name"];
	    // echo "asd";
		$uploadedfile = $_FILES['bike_photo']['tmp_name'];
		 
		if ($photo_title) 
		{
		
			$filename = stripslashes($_FILES['bike_photo']['name']);
	
			$extension = getExtension($filename);
			
			$extension = strtolower($extension);
			
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				
				$error="Unkown Image Extension";					
			}		
			else
			{	
				if($_FILES["bike_photo"]["size"] >= $max_filesize)
				{				  
				 	 $error="File size too large";				  				  
					 exit;
				}
				
				$size=filesize($_FILES['bike_photo']['tmp_name']);
				//echo "s=".$size; 
				
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['bike_photo']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);			
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['bike_photo']['tmp_name'];
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
					
					$newwidth=470;
					$newheight=276;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					//$newwidth1=190;
					//$newheight1=200;//($height/$width)*$newwidth1;
					$newwidth1=98;
					$newheight1=56;//($height/$width)*$newwidth1;
					
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
	
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);																							
					
					$id=mysql_query("select * from bike_mast order by Bike_id");
					$total=mysql_affected_rows();
					$b=$total+1;									

					$tfilename = "../bike_photos/t". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="t".$b . "." . $extension;		
					$ffilename = "../bike_photos/f". $b . "." . $extension ;
					$q="f".$b . "." . $extension;	
					//echo $ffilename."<br>";			
					$bike_thumb_photo = $p;
					$bike_big_photo = $q;
																
					move_uploaded_file($_FILES['bike_photo']["tmp_name"],$tfilename);
					move_uploaded_file($_FILES['bike_photo']["tmp_name"],$ffilename); 
					
					imagejpeg($tmp1,$tfilename,100);						
					imagejpeg($tmp,$ffilename,100);
					
					
									
					imagedestroy($src);
					imagedestroy($tmp);
					imagedestroy($tmp1);
			}
		}
	}	

////upladoing additional image 1

if($_FILES["additional_bike_photo1"]["name"]<>"" )
{
		
		 
		$max_filesize = 999999; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["additional_bike_photo1"]["name"] ;
	
	
		
		 $photo_title=$_FILES["additional_bike_photo1"]["name"];
	    // echo "asd";
	     $uploadedfile = $_FILES['additional_bike_photo1']['tmp_name'];
		 
		if ($photo_title) 
		{
		
			$filename = stripslashes($_FILES['additional_bike_photo1']['name']);
	
			$extension = getExtension($filename);
			
			$extension = strtolower($extension);
			
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				
				$error="Unkown Image Extension";					
			}		
			else
			{	
				if($_FILES["additional_bike_photo1"]["size"] >= $max_filesize)
				{				  
				 	 $error="File size too large";				  				  
					 exit;
				}
				
				$size=filesize($_FILES['additional_bike_photo1']['tmp_name']);
				//echo "s=".$size; 
				
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['additional_bike_photo1']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);			
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['additional_bike_photo1']['tmp_name'];
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
					
					$newwidth=470;
					$newheight=276;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					//$newwidth1=190;
					//$newheight1=200;//($height/$width)*$newwidth1;
					$newwidth1=98;
					$newheight1=56;//($height/$width)*$newwidth1;
					
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
	
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);																							
					
					$id=mysql_query("select * from bike_mast order by Bike_id");
					$total=mysql_affected_rows();
					$b=$total+1;									

					$tfilename = "../bike_photos/tadditional1". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="tadditional1".$b . "." . $extension;		
					$ffilename = "../bike_photos/fadditional1". $b . "." . $extension ;
					$q="fadditional1".$b . "." . $extension;	
					//echo $ffilename."<br>";			
					$additional_bike_thumb_photo1 = $p;
					$additional_bike_big_photo1 = $q;
																
					move_uploaded_file($_FILES['additional_bike_photo1']["tmp_name"],$tfilename);
					move_uploaded_file($_FILES['additional_bike_photo1']["tmp_name"],$ffilename); 
					
					imagejpeg($tmp1,$tfilename,100);						
					imagejpeg($tmp,$ffilename,100);
					
					
									
					imagedestroy($src);
					imagedestroy($tmp);
					imagedestroy($tmp1);
			}
		}
	}	
	
////upladoing additional image 2

if($_FILES["additional_bike_photo2"]["name"]<>"" )
{
		 
		 
		$max_filesize = 999999; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["additional_bike_photo2"]["name"] ;
	
	
		
		$photo_title=$_FILES["additional_bike_photo2"]["name"];
	    // echo "asd";
		$uploadedfile = $_FILES['additional_bike_photo2']['tmp_name'];
		 
		if ($photo_title) 
		{
		
			$filename = stripslashes($_FILES['additional_bike_photo2']['name']);
	
			$extension = getExtension($filename);
			
			$extension = strtolower($extension);
			
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				
				$error="Unkown Image Extension";					
			}		
			else
			{	
				if($_FILES["additional_bike_photo2"]["size"] >= $max_filesize)
				{				  
				 	 $error="File size too large";				  				  
					 exit;
				}
				
				$size=filesize($_FILES['additional_bike_photo2']['tmp_name']);
				//echo "s=".$size; 
				
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['additional_bike_photo2']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);			
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['additional_bike_photo2']['tmp_name'];
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
					
					$newwidth=470;
					$newheight=276;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					//$newwidth1=190;
					//$newheight1=200;//($height/$width)*$newwidth1;
					$newwidth1=98;
					$newheight1=56;//($height/$width)*$newwidth1;
					
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
	
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);																							
					
					$id=mysql_query("select * from bike_mast order by Bike_id");
					$total=mysql_affected_rows();
					$b=$total+1;									

					$tfilename = "../bike_photos/tadditional2". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="tadditional2".$b . "." . $extension;		
					$ffilename = "../bike_photos/fadditional2". $b . "." . $extension ;
					$q="fadditional2".$b . "." . $extension;	
					//echo $ffilename."<br>";			
					$additional_bike_thumb_photo2 = $p;
					$additional_bike_big_photo2 = $q;
																
					move_uploaded_file($_FILES['additional_bike_photo2']["tmp_name"],$tfilename);
					move_uploaded_file($_FILES['additional_bike_photo2']["tmp_name"],$ffilename); 
					
					imagejpeg($tmp1,$tfilename,100);						
					imagejpeg($tmp,$ffilename,100);
					
					
									
					imagedestroy($src);
					imagedestroy($tmp);
					imagedestroy($tmp1);
			}
		}
	}	
	
////upladoing additional image 3 

if($_FILES["additional_bike_photo3"]["name"]<>"" )
{
		 
		 
		$max_filesize = 999999; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["additional_bike_photo3"]["name"] ;
	
	
		
		$photo_title=$_FILES["additional_bike_photo3"]["name"];
	    // echo "asd";
		$uploadedfile = $_FILES['additional_bike_photo3']['tmp_name'];
		 
		if ($photo_title) 
		{
		
			$filename = stripslashes($_FILES['additional_bike_photo3']['name']);
	
			$extension = getExtension($filename);
			
			$extension = strtolower($extension);
			
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				
				$error="Unkown Image Extension";					
			}		
			else
			{	
				if($_FILES["additional_bike_photo3"]["size"] >= $max_filesize)
				{				  
				 	 $error="File size too large";				  				  
					 exit;
				}
				
				$size=filesize($_FILES['additional_bike_photo3']['tmp_name']);
				//echo "s=".$size; 
				
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['additional_bike_photo3']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);			
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['additional_bike_photo3']['tmp_name'];
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
					
					$newwidth=470;
					$newheight=276;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					//$newwidth1=190;
					//$newheight1=200;//($height/$width)*$newwidth1;
					$newwidth1=98;
					$newheight1=56;//($height/$width)*$newwidth1;
					
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
	
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);																							
					
					$id=mysql_query("select * from bike_mast order by Bike_id");
					$total=mysql_affected_rows();
					$b=$total+1;									

					$tfilename = "../bike_photos/tadditional3". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="tadditional3".$b . "." . $extension;		
					$ffilename = "../bike_photos/fadditional3". $b . "." . $extension ;
					$q="fadditional3".$b . "." . $extension;	
					//echo $ffilename."<br>";			
					$additional_bike_thumb_photo3 = $p;
					$additional_bike_big_photo3 = $q;
																
					move_uploaded_file($_FILES['additional_bike_photo3']["tmp_name"],$tfilename);
					move_uploaded_file($_FILES['additional_bike_photo3']["tmp_name"],$ffilename); 
					
					imagejpeg($tmp1,$tfilename,100);						
					imagejpeg($tmp,$ffilename,100);
					
					
									
					imagedestroy($src);
					imagedestroy($tmp);
					imagedestroy($tmp1);
			}
		}
	}	
	
	
	if($_FILES["key_features"]["name"]<>"" )
{
		 
		$trackdir=opendir("../features");
	$dir_exists_flag=0;
	while($file=readdir($trackdir))
	{
		if($file=="."||$file==".."){}
		else{
		
		if(is_dir("features|".$file))
		{
			if((strcmp(trim($file))==0))
			{
				$docf1=time()."_".$_FILES['key_features']['name'];				
				move_uploaded_file($_FILES["key_features"]["tmp_name"],"../features"."/".$docf1);
				
				$dir_exists_flag=1;
				//echo "file added to directory";
			}
		}
		
		}
		}
		closedir($trackdir);
		if($dir_exists_flag==0)
		{
			    $docf1=time()."_".$_FILES['key_features']['name'];				
				move_uploaded_file($_FILES["key_features"]["tmp_name"],"../features"."/".$docf1);
				
				//echo "created";
			
			
		}
		$key_features=time()."_".$_FILES["key_features"]["name"];
	}
	
	

$dt1=explode("-",$_REQUEST["coming_soon_date"]);
	$dd1=$dt1[0];
	$mm1=$dt1[1];
	$yy1=$dt1[2];
$coming_soon_date=$yy1."-".$mm1."-".$dd1;

 $query=
"insert into bike_mast 
(Model_mast_id,
 Bike_name,
 Bike_thumb_photo,
 Bike_big_photo,
 Additional_bike_thumb_photo1,
 Additional_bike_big_photo1,
 Additional_bike_thumb_photo2,
 Additional_bike_big_photo2,
 Additional_bike_thumb_photo3,
 Additional_bike_big_photo3,
 Bike_price,
 Available_in_market,
 Coming_soon,
 Coming_soon_date,
 free_service,
 key_features,
 type
 ) values (
 '".$_REQUEST["model"]."',
 '".$_REQUEST["bike_name"]."',
 '".$bike_thumb_photo."',
 '".$bike_big_photo."',
 '".$additional_bike_thumb_photo1."',
 '".$additional_bike_big_photo1."',
 '".$additional_bike_thumb_photo2."',
 '".$additional_bike_big_photo2."',
 '".$additional_bike_thumb_photo3."',
 '".$additional_bike_big_photo3."',
 '".$_REQUEST["bike_price"]."',
 '".$_REQUEST["available_in_market"]."'
 ,'".$_REQUEST["coming_soon"]."',
 '".$coming_soon_date."',
 '".$_REQUEST["free_service"]."',
 '".$key_features."',
 '".$_GET["type"]."')";

	mysql_query($query);
	$insertedid=mysql_insert_id();
	
	if($_REQUEST["selectedcolors"]!="")
	{
		foreach($_REQUEST["selectedcolors"] as $selectedcolors) 
		{
			$colorid[$c]=$selectedcolors;
			
			$querycolor="insert into bike_colors (bike_mast_id,color_mast_id) values ('".$insertedid."','".$colorid[$c]."')";
			mysql_query($querycolor);
		}		
	}
		
		
	 $totDes = count($_POST["featureid"]);

for($i=0; $i<$totDes; $i++)
{
	$featureid = $_POST["featureid"][$i];
	$feature_value = $_POST["feature_value"][$i];	
	if($feature_value!=''){
			$queryDev="insert into bike_specification_detail(Bike_mast_id,Feature_mast_id,Feature_value) values('".$insertedid."','".$featureid."','".$feature_value."')";
$resultDev=mysql_query($queryDev)
or die(mysql_error());
	}
}
	
	
if($_GET["type"]==0){
	header("Location:bike.php");
}
if($_GET["type"]==1){
	header("Location:auto.php");
}

	exit();
}
if($_REQUEST["process"]=="editbike")
{
	
	 function getExtension($str) {
				 $i = strrpos($str,".");
				 if (!$i) { return ""; }
				 $l = strlen($str) - $i;
				 $ext = substr($str,$i+1,$l);
				 return $ext;
		 }

////upladoing image file
	 if($_FILES["bike_photo"]["name"]<>"" )
{
		$max_filesize = 999999; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["bike_photo"]["name"] ;
	
	
		
		$photo_title=$_FILES["bike_photo"]["name"];
	    // echo "asd";
		$uploadedfile = $_FILES['bike_photo']['tmp_name'];
		 
		if ($photo_title) 
		{
		
			$filename = stripslashes($_FILES['bike_photo']['name']);
	
			$extension = getExtension($filename);
			
			$extension = strtolower($extension);
			
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				
				$error="Unkown Image Extension";					
			}		
			else
			{	
				if($_FILES["bike_photo"]["size"] >= $max_filesize)
				{				  
				 	 $error="File size too large";				  				  
					 exit;
				}
				
				$size=filesize($_FILES['bike_photo']['tmp_name']);
				//echo "s=".$size; 
				
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['bike_photo']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);			
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['bike_photo']['tmp_name'];
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
					
					$newwidth=470;
					$newheight=276;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					//$newwidth1=190;
					//$newheight1=200;//($height/$width)*$newwidth1;
					$newwidth1=98;
					$newheight1=56;//($height/$width)*$newwidth1;
					
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
	
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);																							
					
					$id=mysql_query("select * from bike_mast where Bike_id='".$_REQUEST["bikeid"]."'");
					$totalid=mysql_fetch_array($id);
					$b=$totalid["Bike_id"];									

					$tfilename = "../bike_photos/t". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="t".$b . "." . $extension;		
					$ffilename = "../bike_photos/f". $b . "." . $extension ;
					$q="f".$b . "." . $extension;	
					//echo $ffilename."<br>";			
					$thumb_photo = $p;
					$big_photo = $q;
																
					move_uploaded_file($_FILES['bike_photo']["tmp_name"],$tfilename);
					move_uploaded_file($_FILES['bike_photo']["tmp_name"],$ffilename); 
					
					imagejpeg($tmp1,$tfilename,100);						
					imagejpeg($tmp,$ffilename,100);
					
					
								
					imagedestroy($src);
					imagedestroy($tmp);
					imagedestroy($tmp1);
			}
		}
	}	
	
	////upladoing additional image 1

if($_FILES["additional_bike_photo1"]["name"]<>"" )
{
		
		 
		$max_filesize = 999999; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["additional_bike_photo1"]["name"] ;
	
	
		
		 $photo_title=$_FILES["additional_bike_photo1"]["name"];
	    // echo "asd";
	     $uploadedfile = $_FILES['additional_bike_photo1']['tmp_name'];
		 
		if ($photo_title) 
		{
		
			$filename = stripslashes($_FILES['additional_bike_photo1']['name']);
	
			$extension = getExtension($filename);
			
			$extension = strtolower($extension);
			
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				
				$error="Unkown Image Extension";					
			}		
			else
			{	
				if($_FILES["additional_bike_photo1"]["size"] >= $max_filesize)
				{				  
				 	 $error="File size too large";				  				  
					 exit;
				}
				
				$size=filesize($_FILES['additional_bike_photo1']['tmp_name']);
				//echo "s=".$size; 
				
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['additional_bike_photo1']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);			
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['additional_bike_photo1']['tmp_name'];
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
					
					$newwidth=470;
					$newheight=276;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					//$newwidth1=190;
					//$newheight1=200;//($height/$width)*$newwidth1;
					$newwidth1=98;
					$newheight1=56;//($height/$width)*$newwidth1;
					
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
	
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);																							
					
					$id=mysql_query("select * from bike_mast where Bike_id='".$_REQUEST["bikeid"]."'");
					$totalid=mysql_fetch_array($id);
					$b=$totalid["Bike_id"];										

					$tfilename = "../bike_photos/tadditional1". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="tadditional1".$b . "." . $extension;		
					$ffilename = "../bike_photos/fadditional1". $b . "." . $extension ;
					$q="fadditional1".$b . "." . $extension;	
					//echo $ffilename."<br>";			
					$thumb_photo1 = $p;
					$big_photo1 = $q;
																
					move_uploaded_file($_FILES['additional_bike_photo1']["tmp_name"],$tfilename);
					move_uploaded_file($_FILES['additional_bike_photo1']["tmp_name"],$ffilename); 
					
					imagejpeg($tmp1,$tfilename,100);						
					imagejpeg($tmp,$ffilename,100);
					
					
									
					imagedestroy($src);
					imagedestroy($tmp);
					imagedestroy($tmp1);
			}
		}
	}	
	
////upladoing additional image 2

if($_FILES["additional_bike_photo2"]["name"]<>"" )
{
		 
		 
		$max_filesize = 999999; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["additional_bike_photo2"]["name"] ;
	
	
		
		$photo_title=$_FILES["additional_bike_photo2"]["name"];
	    // echo "asd";
		$uploadedfile = $_FILES['additional_bike_photo2']['tmp_name'];
		 
		if ($photo_title) 
		{
		
			$filename = stripslashes($_FILES['additional_bike_photo2']['name']);
	
			$extension = getExtension($filename);
			
			$extension = strtolower($extension);
			
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				
				$error="Unkown Image Extension";					
			}		
			else
			{	
				if($_FILES["additional_bike_photo2"]["size"] >= $max_filesize)
				{				  
				 	 $error="File size too large";				  				  
					 exit;
				}
				
				$size=filesize($_FILES['additional_bike_photo2']['tmp_name']);
				//echo "s=".$size; 
				
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['additional_bike_photo2']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);			
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['additional_bike_photo2']['tmp_name'];
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
					
					$newwidth=470;
					$newheight=276;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					//$newwidth1=190;
					//$newheight1=200;//($height/$width)*$newwidth1;
					$newwidth1=98;
					$newheight1=56;//($height/$width)*$newwidth1;
					
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
	
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);																							
					
					$id=mysql_query("select * from bike_mast where Bike_id='".$_REQUEST["bikeid"]."'");
					$totalid=mysql_fetch_array($id);
					$b=$totalid["Bike_id"];										

					$tfilename = "../bike_photos/tadditional2". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="tadditional2".$b . "." . $extension;		
					$ffilename = "../bike_photos/fadditional2". $b . "." . $extension ;
					$q="fadditional2".$b . "." . $extension;	
					//echo $ffilename."<br>";			
					$thumb_photo2 = $p;
					$big_photo2 = $q;
																
					move_uploaded_file($_FILES['additional_bike_photo2']["tmp_name"],$tfilename);
					move_uploaded_file($_FILES['additional_bike_photo2']["tmp_name"],$ffilename); 
					
					imagejpeg($tmp1,$tfilename,100);						
					imagejpeg($tmp,$ffilename,100);
					
					
									
					imagedestroy($src);
					imagedestroy($tmp);
					imagedestroy($tmp1);
			}
		}
	}	
	
////upladoing additional image 3 

if($_FILES["additional_bike_photo3"]["name"]<>"" )
{
		 
		 
		$max_filesize = 999999; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["additional_bike_photo3"]["name"] ;
	
	
		
		$photo_title=$_FILES["additional_bike_photo3"]["name"];
	    // echo "asd";
		$uploadedfile = $_FILES['additional_bike_photo3']['tmp_name'];
		 
		if ($photo_title) 
		{
		
			$filename = stripslashes($_FILES['additional_bike_photo3']['name']);
	
			$extension = getExtension($filename);
			
			$extension = strtolower($extension);
			
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				
				$error="Unkown Image Extension";					
			}		
			else
			{	
				if($_FILES["additional_bike_photo3"]["size"] >= $max_filesize)
				{				  
				 	 $error="File size too large";				  				  
					 exit;
				}
				
				$size=filesize($_FILES['additional_bike_photo3']['tmp_name']);
				//echo "s=".$size; 
				
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['additional_bike_photo3']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);			
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['additional_bike_photo3']['tmp_name'];
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
					
					$newwidth=470;
					$newheight=276;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					//$newwidth1=190;
					//$newheight1=200;//($height/$width)*$newwidth1;
					$newwidth1=98;
					$newheight1=56;//($height/$width)*$newwidth1;
					
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
	
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);																							
					
					$id=mysql_query("select * from bike_mast where Bike_id='".$_REQUEST["bikeid"]."'");
					$totalid=mysql_fetch_array($id);
					$b=$totalid["Bike_id"];									

					$tfilename = "../bike_photos/tadditional3". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="tadditional3".$b . "." . $extension;		
					$ffilename = "../bike_photos/fadditional3". $b . "." . $extension ;
					$q="fadditional3".$b . "." . $extension;	
					//echo $ffilename."<br>";			
					$thumb_photo3 = $p;
					$big_photo3 = $q;
																
					move_uploaded_file($_FILES['additional_bike_photo3']["tmp_name"],$tfilename);
					move_uploaded_file($_FILES['additional_bike_photo3']["tmp_name"],$ffilename); 
					
					imagejpeg($tmp1,$tfilename,100);						
					imagejpeg($tmp,$ffilename,100);
					
					
									
					imagedestroy($src);
					imagedestroy($tmp);
					imagedestroy($tmp1);
			}
		}
	}
	
	 if($_FILES["key_features"]["name"]<>"" )
{
		$trackdir=opendir("../features");
	$dir_exists_flag=0;
	while($file=readdir($trackdir))
	{
		if($file=="."||$file==".."){}
		else{
		
		if(is_dir("features|".$file))
		{
			if((strcmp(trim($file))==0))
			{
				$docf1=time()."_".$_FILES['key_features']['name'];
				
				move_uploaded_file($_FILES["key_features"]["tmp_name"],"../features"."/".$docf1);
				
				$dir_exists_flag=1;
				//echo "file added to directory";
			}
		}
		
		}
		}
		closedir($trackdir);
		if($dir_exists_flag==0)
		{
			
			    $docf1=time()."_".$_FILES['key_features']['name'];
				
				move_uploaded_file($_FILES["key_features"]["tmp_name"],"../features"."/".$docf1);
				
				//echo "created";
			
			
		}
	}	
	
	
		
		if($_FILES["bike_photo"]["tmp_name"]!="")
	{
	$bike_thumb_photo = $thumb_photo;
	$bike_big_photo = $big_photo;
	
	}
	else{
		$bike_thumb_photo = $_REQUEST["currentbike_thumbphoto"];
	$bike_big_photo = $_REQUEST["currentbike_bigphoto"];
		
	
	}
	
		if($_FILES["additional_bike_photo1"]["tmp_name"]!="")
	{
	$additional_bike_thumb_photo1 = $thumb_photo1;
	$additional_bike_big_photo1 = $big_photo1;
	
	}
	else{
		$additional_bike_thumb_photo1 = $_REQUEST["add_currentbike_thumbphoto1"];
	$additional_bike_big_photo1 = $_REQUEST["add_currentbike_bigphoto1"];
		
	
	}
	
		if($_FILES["additional_bike_photo2"]["tmp_name"]!="")
	{
	$additional_bike_thumb_photo2 = $thumb_photo2;
	$additional_bike_big_photo2 = $big_photo2;
	
	}
	else{
		$additional_bike_thumb_photo2 = $_REQUEST["add_currentbike_thumbphoto2"];
	$additional_bike_big_photo2 = $_REQUEST["add_currentbike_bigphoto2"];
		
	
	}
	
		if($_FILES["additional_bike_photo3"]["tmp_name"]!="")
	{
	$additional_bike_thumb_photo3 = $thumb_photo3;
	$additional_bike_big_photo3 = $big_photo3;
	
	}
	else{
		$additional_bike_thumb_photo3 = $_REQUEST["add_currentbike_thumbphoto3"];
	$additional_bike_big_photo3 = $_REQUEST["add_currentbike_bigphoto3"];
		
	
	}
	
	if($_FILES["key_features"]["tmp_name"]!="")
	{
		$key_features = time()."_".$_FILES["key_features"]["name"];;
	}
	else
	{
		$key_features = $_REQUEST["current_key_features"];	
	}
	
	$dt1=explode("-",$_REQUEST["coming_soon_date"]);
	$dd1=$dt1[0];
	$mm1=$dt1[1];
	$yy1=$dt1[2];
$coming_soon_date=$yy1."-".$mm1."-".$dd1;	
		
 $query="update bike_mast set 
	Model_mast_id='".$_REQUEST["model"]."',
	Bike_name ='".$_REQUEST["bike_name"]."',
	Bike_thumb_photo='".$bike_thumb_photo."',
	Bike_big_photo='".$bike_big_photo."',
	Additional_bike_thumb_photo1='".$additional_bike_thumb_photo1."',
	Additional_bike_big_photo1='".$additional_bike_big_photo1."',
	Additional_bike_thumb_photo2='".$additional_bike_thumb_photo2."',
	Additional_bike_big_photo2='".$additional_bike_big_photo2."',
	Additional_bike_thumb_photo3='".$additional_bike_thumb_photo3."',
	Additional_bike_big_photo3='".$additional_bike_big_photo3."',
	Bike_price='".$_REQUEST["bike_price"]."',
	Available_in_market='".$_REQUEST["available_in_market"]."',
	Coming_soon='".$_REQUEST["coming_soon"]."',
	Coming_soon_date='".$coming_soon_date."',
	free_service='".$_REQUEST["free_service"]."',
	key_features='".$key_features."' where Bike_id='".$_REQUEST["bikeid"]."'";
	
	
	mysql_query($query);
	$query="delete from bike_colors where bike_mast_id='".$_REQUEST["bikeid"]."' ";
	mysql_query($query);
	if($_REQUEST["selectedcolors"]!="")
	{
		foreach($_REQUEST["selectedcolors"] as $selectedcolors) 
		{
			$colorid[$c]=$selectedcolors;
			
			$query="insert into bike_colors (bike_mast_id,color_mast_id) values ('".$_REQUEST["bikeid"]."','".$colorid[$c]."')";
			mysql_query($query);
		}		
	}
	
	$querydel=mysql_query("delete from bike_specification_detail where Bike_mast_id='".$_REQUEST["bikeid"]."'");
	 $totDes = count($_POST["featureid"]);

		for($i=0; $i<$totDes; $i++)
		{
			$featureid = $_POST["featureid"][$i];
			$feature_value = $_POST["feature_value"][$i];	
			
			if($feature_value!=''){
					$queryDev="insert into bike_specification_detail(Bike_mast_id,Feature_mast_id,Feature_value) values('".$_REQUEST["bikeid"]."','".$featureid."','".$feature_value."')";
		$resultDev=mysql_query($queryDev)
		or die(mysql_error());
			}
		}
if($_GET["type"]==0){
	header("Location:bike.php");
}
if($_GET["type"]==1){
	header("Location:auto.php");
}
	exit();
}

?>

