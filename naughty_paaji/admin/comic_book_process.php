<?php 
session_start();
include("../include/config.php");
$is_edit=$_REQUEST['is_edit'];
ini_set('max_file_uploads', "50");
if($is_edit==1)
{
	
	 function getExtension($str) {
				 $i = strrpos($str,".");
				 if (!$i) { return ""; }
				 $l = strlen($str) - $i;
				 $ext = substr($str,$i+1,$l);
				 return $ext;
		 }
	if($_FILES["book_cover_image"]["name"]<>"" )
	 {
		
		$max_filesize = 9999999; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["book_cover_image"]["name"] ;
		
		$photo_title=$_FILES["book_cover_image"]["name"];
	   // echo "asd";
		$uploadedfile = $_FILES['book_cover_image']['tmp_name'];
		if ($photo_title) 
		{
			$filename = stripslashes($_FILES['book_cover_image']['name']);
			$extension = getExtension($filename);
			$extension = strtolower($extension);
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{
				$error="Unkown Image Extension";	
			}		
			else
			{	
				if($_FILES["book_cover_image"]["size"] >= $max_filesize)
				{		
				 	 $error="File size too large";
					 exit;

				}

				$size=filesize($_FILES['book_cover_image']['tmp_name']);
				//echo "s=".$size; 
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['book_cover_image']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);	
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['book_cover_image']['tmp_name'];
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
					$newwidth1=$width;
					$newheight1=$height;
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
					imagecopyresampled($tmp,$src,0,0,0,0,$width,$height,$width,$height);
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);
					$pro=mysql_query("select * from comic_book_mast order by book_id desc limit 1");
					$rows=mysql_affected_rows();
					$id=mysql_fetch_array($pro);
					if($rows=='0'){
					$b=$id['book_id'];
					}
					else
					{
						$b=$_POST["txtid"];
					}
					$tfilename = "../books_images/book_cover_image". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="book_cover_image".$b . "." . $extension;		

					//$ffilename = "../logo/ph". $p ;
					//echo $ffilename."<br>";			

					$book_cover_image = $p;
					
					move_uploaded_file($_FILES['book_cover_image']["tmp_name"],$tfilename);
					//move_uploaded_file($_FILES['image']["tmp_name"],$ffilename); 
					imagejpeg($tmp1,$tfilename,100);						

					//imagejpeg($tmp,$ffilename,100);
					if(is_uploaded_file($_FILES["book_cover_image"]["tmp_name"]))
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
		$book_cover_image=$_REQUEST["existing_book_cover_image"];
		}

$txtid=$_POST['txtid'];


mysql_query("update comic_book_mast set 
			book_title='".$_REQUEST["book_title"]."',
			book_description='".$_REQUEST["book_description"]."',
			book_author_name='".$_REQUEST["book_author_name"]."',
			book_cover_image='".$book_cover_image."'
			where book_id='".$txtid."'");





for($i=1;$i<=30;$i++){
	

//////////  1  ///////////

if($_REQUEST["book_detail_id".$i]!="" && $_FILES["book_image".$i]["name"]=="" && $_REQUEST["existing_book_image".$i]=="" && $_REQUEST["advertisement".$i]=="")
{
mysql_query("delete from comic_book_detail where book_detail_id='".$_REQUEST["book_detail_id".$i]."'");
}




$qdetail=mysql_query("update comic_book_detail set display_order='".$_REQUEST["display_order".$i]."' where book_detail_id ='".$_REQUEST["book_detail_id".$i]."'") or die(mysql_error());

if($_REQUEST["book_type".$i]==1){

if($_FILES["book_image".$i]["name"]!="" && $_REQUEST["existing_book_image".$i]=="" && $_REQUEST["book_detail_id".$i]=="")

	 {

		$max_filesize = 9999999; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["book_image".$i]["name"] ;
		
		$photo_title=$_FILES["book_image".$i]["name"];
	   // echo "asd";
		$uploadedfile = $_FILES['book_image'.$i]['tmp_name'];
		if ($photo_title) 
		{
			$filename = stripslashes($_FILES['book_image'.$i]['name']);
			$extension = getExtension($filename);
			$extension = strtolower($extension);
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{
				$error="Unkown Image Extension";	
			}		
			else
			{	
				if($_FILES["book_image".$i]["size"] >= $max_filesize)
				{		
				 	 $error="File size too large";
					 exit;

				}

				$size=filesize($_FILES['book_image'.$i]['tmp_name']);
				//echo "s=".$size; 
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['book_image'.$i]['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);	
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['book_image'.$i]['tmp_name'];
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

					$newheight1=$height;
					$newwidth1=$width;
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
					imagecopyresampled($tmp,$src,0,0,0,0,$width,$height,$width,$height);
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);
					$pro=mysql_query("select * from comic_book_detail where book_mast_id='".$txtid."'");
					$rows=mysql_affected_rows();

					$mid=mysql_fetch_array($pro);
					
					$b=$rows+1;									

					
					$tfilename = "../books_images/book_image_".$txtid."_". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="book_image_".$txtid."_".$b . "." . $extension;		

					//$ffilename = "../logo/ph". $p ;
					//echo $ffilename."<br>";			

					$book_image = $p;
					
					move_uploaded_file($_FILES['book_image'.$i]["tmp_name"],$tfilename);
					//move_uploaded_file($_FILES['image']["tmp_name"],$ffilename); 
					imagejpeg($tmp1,$tfilename,100);						

					//imagejpeg($tmp,$ffilename,100);
					if(is_uploaded_file($_FILES["book_image".$i]["tmp_name"]))
					{
						//copy($_FILES['image']['tmp_name'], $ffilename);
						//copy($_FILES['image']['tmp_name'], $tfilename);
					}

					imagedestroy($src);

					imagedestroy($tmp);

					imagedestroy($tmp1);

			}
		}
	
		$qdetail=mysql_query("insert into comic_book_detail
			(book_mast_id,
			 book_type,
			 book_image,
			 display_order)
			 values('".$txtid."',
			'".$_REQUEST["book_type".$i]."',
			'".$book_image."',
			'".$_REQUEST["display_order".$i]."')") or die(mysql_error());
	 }

	 if($_FILES["book_image".$i]["name"]!="" && $_REQUEST["book_detail_id".$i]!="")

	 {

		$max_filesize = 9999999; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["book_image".$i]["name"] ;
		
		$photo_title=$_FILES["book_image".$i]["name"];
	   // echo "asd";
		$uploadedfile = $_FILES['book_image'.$i]['tmp_name'];
		if ($photo_title) 
		{
			$filename = stripslashes($_FILES['book_image'.$i]['name']);
			$extension = getExtension($filename);
			$extension = strtolower($extension);
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{
				$error="Unkown Image Extension";	
			}		
			else
			{	
				if($_FILES["book_image".$i]["size"] >= $max_filesize)
				{		
				 	 $error="File size too large";
					 exit;

				}

				$size=filesize($_FILES['book_image'.$i]['tmp_name']);
				//echo "s=".$size; 
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['book_image'.$i]['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);	
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['book_image'.$i]['tmp_name'];
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

					$newheight1=$height;
					$newwidth1=$width;
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
					imagecopyresampled($tmp,$src,0,0,0,0,$width,$height,$width,$height);
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);
					$pro=mysql_query("select * from comic_book_detail where book_mast_id='".$txtid."' and book_detail_id='".$_REQUEST["book_detail_id".$i]."'");
					$rows=mysql_affected_rows();

					$mid=mysql_fetch_array($pro);					

					$b=$i;
					
					$tfilename = "../books_images/book_image_".$txtid."_". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="book_image_".$txtid."_".$b . "." . $extension;		

					//$ffilename = "../logo/ph". $p ;
					//echo $ffilename."<br>";			

					$book_image = $p;
					
					move_uploaded_file($_FILES['book_image'.$i]["tmp_name"],$tfilename);
					//move_uploaded_file($_FILES['image']["tmp_name"],$ffilename); 
					imagejpeg($tmp1,$tfilename,100);						

					//imagejpeg($tmp,$ffilename,100);
					if(is_uploaded_file($_FILES["book_image".$i]["tmp_name"]))
					{
						//copy($_FILES['image']['tmp_name'], $ffilename);
						//copy($_FILES['image']['tmp_name'], $tfilename);
					}

					imagedestroy($src);

					imagedestroy($tmp);

					imagedestroy($tmp1);

			}
		}
		
		$qdetail=mysql_query("update comic_book_detail set book_type='".$_REQUEST["book_type".$i]."',book_image='".$book_image."',advertisement='' where book_detail_id ='".$_REQUEST["book_detail_id".$i]."'") or die(mysql_error());
	 }
	
}

if($_REQUEST["book_type".$i]==2){


	
	if($_REQUEST["advertisement".$i]!="" && $_REQUEST["book_detail_id".$i]==""){
	$qdetail=mysql_query("insert into comic_book_detail
			(book_mast_id,
			 book_type,
			 advertisement,
			 display_order)
			 values('".$txtid."',
			'".$_REQUEST["book_type".$i]."',
			'".$_REQUEST["advertisement".$i]."',
			'".$_REQUEST["display_order".$i]."')");
	}
	
	if($_REQUEST["advertisement".$i]!="" && $_REQUEST["book_detail_id".$i]!=""){
		
		$qdetail=mysql_query("update comic_book_detail set book_type='".$_REQUEST["book_type".$i]."',		
			 advertisement='".$_REQUEST["advertisement".$i]."'  where book_detail_id ='".$_REQUEST["book_detail_id".$i]."'") or die(mysql_error());
	}
	

}



}
	
}

else

{ 
 function getExtension($str) {

				 $i = strrpos($str,".");

				 if (!$i) { return ""; }

				 $l = strlen($str) - $i;

				 $ext = substr($str,$i+1,$l);
				 return $ext;
		 }
	 if($_FILES["book_cover_image"]["name"]<>"" )

	 {

		$max_filesize = 9999999; // Maximum filesize in BYTES (currently 0.9MB).



		$path=$_FILES["book_cover_image"]["name"] ;



		

		$photo_title=$_FILES["book_cover_image"]["name"];
	   // echo "asd";
		$uploadedfile = $_FILES['book_cover_image']['tmp_name'];
		if ($photo_title) 
		{
			$filename = stripslashes($_FILES['book_cover_image']['name']);
			$extension = getExtension($filename);
			$extension = strtolower($extension);
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				

				$error="Unknown Image Extension";	
			}		

			else

			{	

				if($_FILES["book_cover_image"]["size"] >= $max_filesize)
				{	
				 	 echo $error="File size too large";		
					 exit;
				}

				$size=filesize($_FILES['book_cover_image']['tmp_name']);
				//echo "s=".$size; 

				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['book_cover_image']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);	
				}

				else if($extension=="png")
				{
					$uploadedfile = $_FILES['book_cover_image']['tmp_name'];
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

					$newheight1=$height;
					$newwidth1=$width;
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
					imagecopyresampled($tmp,$src,0,0,0,0,$width,$height,$width,$height);
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);
					$pro=mysql_query("select * from comic_book_mast order by book_id desc limit 1");
					$rows=mysql_affected_rows();

					$mid=mysql_fetch_array($pro);
					if($rows=='1'){

					$b=$mid['book_id']+1;									

					}
					else
					{
						$b=1;
					}
					$tfilename = "../books_images/book_cover_image". $b . "." . $extension;
					//$_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="book_cover_image".$b . "." . $extension;		

					//$ffilename = "../logo/ph". $p ;
					//echo $ffilename."<br>";			

					$book_cover_image = $p;
					move_uploaded_file($_FILES['book_cover_image']["tmp_name"],$tfilename);
					//move_uploaded_file($_FILES['image']["tmp_name"],$ffilename); 
					imagejpeg($tmp1,$tfilename,100);						

					//imagejpeg($tmp,$ffilename,100);
					if(is_uploaded_file($_FILES["book_cover_image"]["tmp_name"]))
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


	

	
	$qmast=mysql_query("insert into comic_book_mast
			(book_title,
			 book_description,
			 book_author_name,
			 book_cover_image)
			 values('".$_REQUEST["book_title"]."',
			'".$_REQUEST["book_description"]."',
			'".$_REQUEST["book_author_name"]."',
			'".$book_cover_image."')") or die(mysql_error());
	
	$book_id=mysql_insert_id();
	
	
for($i=1;$i<=30;$i++){
	
	//////////  1  ///////////

if($_FILES["book_image".$i]["name"]<>"" )

	 {

		$max_filesize = 9999999; // Maximum filesize in BYTES (currently 0.9MB).



		$path=$_FILES["book_image".$i]["name"] ;



		 

		$photo_title=$_FILES["book_image".$i]["name"];
	   // echo "asd";
		$uploadedfile = $_FILES['book_image'.$i]['tmp_name'];
		if ($photo_title) 
		{
			$filename = stripslashes($_FILES['book_image'.$i]['name']);
			$extension = getExtension($filename);
			$extension = strtolower($extension);
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				

				$error="Unkown Image Extension";	
			}		

			else

			{	

				if($_FILES["book_image".$i]["size"] >= $max_filesize)
				{	
				 	 echo $error="File size too large";		
					 exit;
				}

				$size=filesize($_FILES['book_image'.$i]['tmp_name']);
				//echo "s=".$size; 

				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['book_image'.$i]['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);	
				}

				else if($extension=="png")
				{
					$uploadedfile = $_FILES['book_image'.$i]['tmp_name'];
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

					$newheight1=$height;
					$newwidth1=$width;
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
					imagecopyresampled($tmp,$src,0,0,0,0,$width,$height,$width,$height);
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);
					$pro=mysql_query("select * from comic_book_detail where book_mast_id='".$book_id."'");
					$rows=mysql_affected_rows();

					$mid=mysql_fetch_array($pro);
					
						$b=$rows+1;
					
					$tfilename = "../books_images/book_image_".$book_id."_".$b . "." . $extension;
					//$_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="book_image_".$book_id."_".$b . "." . $extension;		

					//$ffilename = "../logo/ph". $p ;
					//echo $ffilename."<br>";			

					$book_image = $p;
					move_uploaded_file($_FILES['book_image'.$i]["tmp_name"],$tfilename);
					//move_uploaded_file($_FILES['image']["tmp_name"],$ffilename); 
					imagejpeg($tmp1,$tfilename,100);						

					//imagejpeg($tmp,$ffilename,100);
					if(is_uploaded_file($_FILES["book_image".$i]["tmp_name"]))
					{
						//copy($_FILES['image']['tmp_name'], $ffilename);
						//copy($_FILES['image']['tmp_name'], $tfilename);
					}
					imagedestroy($src);
					imagedestroy($tmp);
					imagedestroy($tmp1);
			}

		}

$qdetail=mysql_query("insert into comic_book_detail
			(book_mast_id,
			 book_type,
			 book_image,
			 display_order)
			 values('".$book_id."',
			'".$_REQUEST["book_type".$i]."',
			'".$book_image."',
			'".$_REQUEST["display_order".$i]."')") or die(mysql_error());
	 }
	 
	if($_REQUEST["advertisement".$i]!=""){
	$qdetail=mysql_query("insert into comic_book_detail
			(book_mast_id,
			 book_type,
			 advertisement,
			 display_order)
			 values('".$book_id."',
			'".$_REQUEST["book_type".$i]."',
			'".$_REQUEST["advertisement".$i]."',
			'".$_REQUEST["display_order".$i]."')") or die(mysql_error());
	}
		
} 
}
//header("location:comic_book.php");
?>
<script type="text/javascript">

window.location='comic_book.php';

</script>