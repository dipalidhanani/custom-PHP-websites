<?php session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");

$is_edit=$_REQUEST['is_edit'];
$column=array("is_Image","disp_Order","page_Link");
 	$order=$_POST["order"];

	$link=$_POST["link"];
	 function getExtension($str) {

		 $i = strrpos($str,".");

		 if (!$i) { return ""; }

		 $l = strlen($str) - $i;

		 $ext = substr($str,$i+1,$l);
		 return $ext;
 }

if($is_edit==1)

{ 
	if($_FILES["image"]["name"]<>"" )
	 {
		
		$max_filesize = 9999999; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["image"]["name"] ;
		
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
				 	 echo $error="File size too large";	
					 exit;
				}					

					list($width,$height)=getimagesize($uploadedfile);

					$newwidth1= 849;
					$newheight1=289;
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
					
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);
					$pro=mysql_query("select * from slider_mst order by slider_Id desc limit 1");
					$rows=mysql_affected_rows();
					$id=mysql_fetch_array($pro);
					if($rows=='0'){
					$b=$id['slider_Id'];
					}
					else
					{
						$b=$_POST["txtid"];
					}
					$tfilename = "../slider_images/photo". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="photo".$b . "." . $extension;		

					//$ffilename = "../logo/ph". $p ;
					//echo $ffilename."<br>";			

					$image = $p;
					
					move_uploaded_file($_FILES['image']["tmp_name"],$tfilename);
					//move_uploaded_file($_FILES['image']["tmp_name"],$ffilename); 
					//imagejpeg($tmp1,$tfilename,100);
					
					imagedestroy($src);

					imagedestroy($tmp1);

			}
		}
	 }

		else

		{
		$image=$_REQUEST["existing_file_value"];
		}
		
		
/////////////  tab image///////////		


		
		if($_FILES["slider_tab_image"]["name"]<>"" )
	 {
		
		$max_filesize = 9999999; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["slider_tab_image"]["name"] ;
		
		$photo_title=$_FILES["slider_tab_image"]["name"];
	   // echo "asd";
		$uploadedfile = $_FILES['slider_tab_image']['tmp_name'];
		if ($photo_title) 
		{
			$filename = stripslashes($_FILES['slider_tab_image']['name']);
			$extension = getExtension($filename);
			$extension = strtolower($extension);
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{
				$error="Unkown Image Extension";	
			}		
			else
			{	
				if($_FILES["slider_tab_image"]["size"] >= $max_filesize)
				{		
				 	 $error="File size too large";
					 exit;

				}

				$size=filesize($_FILES['slider_tab_image']['tmp_name']);
				//echo "s=".$size; 
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['slider_tab_image']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);	
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['slider_tab_image']['tmp_name'];
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

					$newwidth1= 196;
					$newheight1=31;
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
					
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);
					$pro=mysql_query("select * from slider_mst order by slider_Id desc limit 1");
					$rows=mysql_affected_rows();
					$id=mysql_fetch_array($pro);
					if($rows=='0'){
					$b=$id['slider_Id'];
					}
					else
					{
						$b=$_POST["txtid"];
					}
					$tfilename = "../slider_images/tab". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="tab".$b . "." . $extension;		

					//$ffilename = "../logo/ph". $p ;
					//echo $ffilename."<br>";			

					$slider_tab_image = $p;
					
					move_uploaded_file($_FILES['slider_tab_image']["tmp_name"],$tfilename);
					//move_uploaded_file($_FILES['image']["tmp_name"],$ffilename); 
					//imagejpeg($tmp1,$tfilename,100);
					
					imagedestroy($src);

					imagedestroy($tmp1);

			}
		}
	 }

		else

		{
		$slider_tab_image=$_REQUEST["existing_tab_file_value"];
		}
		
		
////////// slider_tab_active_image ///////////////////////////////////////////
//
//if($_FILES["slider_tab_active_image"]["name"]<>"" )
//	 {
//		
//		$max_filesize = 9999999; // Maximum filesize in BYTES (currently 0.9MB).
//		$path=$_FILES["slider_tab_active_image"]["name"] ;
//		
//		$photo_title=$_FILES["slider_tab_active_image"]["name"];
//	   // echo "asd";
//		$uploadedfile = $_FILES['slider_tab_active_image']['tmp_name'];
//		if ($photo_title) 
//		{
//			$filename = stripslashes($_FILES['slider_tab_active_image']['name']);
//			$extension = getExtension($filename);
//			$extension = strtolower($extension);
//			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
//			{
//				$error="Unkown Image Extension";	
//			}		
//			else
//			{	
//				if($_FILES["slider_tab_active_image"]["size"] >= $max_filesize)
//				{		
//				 	 $error="File size too large";
//					 exit;
//
//				}
//
//				$size=filesize($_FILES['slider_tab_active_image']['tmp_name']);
//				//echo "s=".$size; 
//				if($extension=="jpg" || $extension=="jpeg" )
//				{
//					$uploadedfile = $_FILES['slider_tab_active_image']['tmp_name'];
//					$src = imagecreatefromjpeg($uploadedfile);	
//				}
//				else if($extension=="png")
//				{
//					$uploadedfile = $_FILES['slider_tab_active_image']['tmp_name'];
//					$src = imagecreatefrompng($uploadedfile);
//				}
//				else 
//				{
//					$src = imagecreatefromgif($uploadedfile);	
//				}
//
//				if($size >= $max_filesize)
//				{				  
//				 	 echo $error="File size too large";	
//					 exit;
//				}					
//
//					list($width,$height)=getimagesize($uploadedfile);
//
//					$newwidth1= 196;
//					$newheight1=31;
//					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
//					
//					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);
//					$pro=mysql_query("select * from slider_mst order by slider_Id desc limit 1");
//					$rows=mysql_affected_rows();
//					$id=mysql_fetch_array($pro);
//					if($rows=='0'){
//					$b=$id['slider_Id'];
//					}
//					else
//					{
//						$b=$_POST["txtid"];
//					}
//					$tfilename = "../slider_images/active_tab". $b . "." . $extension;
//					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
//					$p="active_tab".$b . "." . $extension;		
//
//					//$ffilename = "../logo/ph". $p ;
//					//echo $ffilename."<br>";			
//
//					$slider_tab_active_image = $p;
//					
//					move_uploaded_file($_FILES['slider_tab_active_image']["tmp_name"],$tfilename);
//					//move_uploaded_file($_FILES['image']["tmp_name"],$ffilename); 
//					//imagejpeg($tmp1,$tfilename,100);
//					
//					imagedestroy($src);
//
//					imagedestroy($tmp1);
//
//			}
//		}
//	 }
//
//		else
//
//		{
//		$slider_tab_active_image=$_REQUEST["existing_tab_active_file_value"];
//		}



	$txtid=$_POST['txtid'];


mysql_query("update slider_mst set is_Image='".$image."',disp_Order='".$order."',page_Link='".$link."' where slider_Id='".$txtid."'");
	//$db->update("slider_mst","slider_Id",$txtid,$column,$value);
}

else

{ 

	 if($_FILES["image"]["name"]<>"" )

	 {

		$max_filesize = 9999999; // Maximum filesize in BYTES (currently 0.9MB).



		$path=$_FILES["image"]["name"] ;


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

					$newwidth1=849;
					$newheight1=289;
					
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);
					$pro=mysql_query("select * from slider_mst order by slider_Id desc limit 1");
					$rows=mysql_affected_rows();

					$mid=mysql_fetch_array($pro);
					if($rows=='1'){

					$b=$mid['slider_Id']+1;									

					}
					else
					{
						$b=1;
					}
					$tfilename = "../slider_images/photo". $b . "." . $extension;
					//$_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="photo".$b . "." . $extension;		

					//$ffilename = "../logo/ph". $p ;
					//echo $ffilename."<br>";			

					$image = $p;
					move_uploaded_file($_FILES['image']["tmp_name"],$tfilename);
					//move_uploaded_file($_FILES['image']["tmp_name"],$ffilename); 
					//imagejpeg($tmp1,$tfilename,100);
				
					imagedestroy($src);
					
					imagedestroy($tmp1);
			}

		}

	 }
	 
	 ////////////slider_tab_active_image/////////////
	
	
	  if($_FILES["slider_tab_image"]["name"]<>"" )

	 {

		$max_filesize = 9999999; // Maximum filesize in BYTES (currently 0.9MB).

		$path=$_FILES["slider_tab_image"]["name"] ;

		

		$photo_title=$_FILES["slider_tab_image"]["name"];
	   // echo "asd";
		$uploadedfile = $_FILES['slider_tab_image']['tmp_name'];
		if ($photo_title) 

		{
			$filename = stripslashes($_FILES['slider_tab_image']['name']);
			$extension = getExtension($filename);
			$extension = strtolower($extension);
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				

				$error="Unkown Image Extension";	
			}		

			else

			{	

				if($_FILES["slider_tab_image"]["size"] >= $max_filesize)
				{	
				 	 echo $error="File size too large";		
					 exit;
				}

				$size=filesize($_FILES['slider_tab_image']['tmp_name']);
				//echo "s=".$size; 

				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['slider_tab_image']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);	
				}

				else if($extension=="png")
				{
					$uploadedfile = $_FILES['slider_tab_image']['tmp_name'];
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

					$newwidth1=196;
					$newheight1=31;
					
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);
					$pro=mysql_query("select * from slider_mst order by slider_Id desc limit 1");
					$rows=mysql_affected_rows();

					$mid=mysql_fetch_array($pro);
					if($rows=='1'){

					$b=$mid['slider_Id']+1;									

					}
					else
					{
						$b=1;
					}
					$tfilename = "../slider_images/tab". $b . "." . $extension;
					//$_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="tab".$b . "." . $extension;		

					//$ffilename = "../logo/ph". $p ;
					//echo $ffilename."<br>";			

					$slider_tab_image = $p;
					move_uploaded_file($_FILES['slider_tab_image']["tmp_name"],$tfilename);
					//move_uploaded_file($_FILES['image']["tmp_name"],$ffilename); 
					//imagejpeg($tmp1,$tfilename,100);
				
					imagedestroy($src);
					
					imagedestroy($tmp1);
			}

		}

	 }
	 
	////////////slider_tab_active_image/////////////
	
	//
//	  if($_FILES["slider_tab_active_image"]["name"]<>"" )
//
//	 {
//
//		$max_filesize = 9999999; // Maximum filesize in BYTES (currently 0.9MB).
//
//
//
//		$path=$_FILES["slider_tab_active_image"]["name"] ;
//
//
//
//		$photo_title=$_FILES["slider_tab_active_image"]["name"];
//	   // echo "asd";
//		$uploadedfile = $_FILES['slider_tab_active_image']['tmp_name'];
//		if ($photo_title) 
//
//		{
//			$filename = stripslashes($_FILES['slider_tab_active_image']['name']);
//			$extension = getExtension($filename);
//			$extension = strtolower($extension);
//			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
//			{				
//
//				$error="Unkown Image Extension";	
//			}		
//
//			else
//
//			{	
//
//				if($_FILES["slider_tab_active_image"]["size"] >= $max_filesize)
//				{	
//				 	 echo $error="File size too large";		
//					 exit;
//				}
//
//				$size=filesize($_FILES['slider_tab_active_image']['tmp_name']);
//				//echo "s=".$size; 
//
//				if($extension=="jpg" || $extension=="jpeg" )
//				{
//					$uploadedfile = $_FILES['slider_tab_active_image']['tmp_name'];
//					$src = imagecreatefromjpeg($uploadedfile);	
//				}
//
//				else if($extension=="png")
//				{
//					$uploadedfile = $_FILES['slider_tab_active_image']['tmp_name'];
//					$src = imagecreatefrompng($uploadedfile);
//				}
//
//				else 
//
//				{
//
//					$src = imagecreatefromgif($uploadedfile);	
//				}
//				if($size >= $max_filesize)
//				{				  
//
//				 	 $error="File size too large";		
//					 exit;
//
//				}	
//
//					list($width,$height)=getimagesize($uploadedfile);
//
//					$tmp=imagecreatetruecolor($width,$height);
//
//					$newwidth1=196;
//					$newheight1=31;
//					
//					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
//					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);
//					$pro=mysql_query("select * from slider_mst order by slider_Id desc limit 1");
//					$rows=mysql_affected_rows();
//
//					$mid=mysql_fetch_array($pro);
//					if($rows=='1'){
//
//					$b=$mid['slider_Id']+1;									
//
//					}
//					else
//					{
//						$b=1;
//					}
//					$tfilename = "../slider_images/active_tab". $b . "." . $extension;
//					//$_FILES['image']["tmp_name"]." ".$tfilename."<br>";
//					$p="active_tab".$b . "." . $extension;		
//
//					//$ffilename = "../logo/ph". $p ;
//					//echo $ffilename."<br>";			
//
//					$slider_tab_active_image = $p;
//					move_uploaded_file($_FILES['slider_tab_active_image']["tmp_name"],$tfilename);
//					//move_uploaded_file($_FILES['image']["tmp_name"],$ffilename); 
//					//imagejpeg($tmp1,$tfilename,100);
//				
//					imagedestroy($src);
//					
//					imagedestroy($tmp1);
//			}
//
//		}
//
//	 }

	
mysql_query("insert into slider_mst(is_Image,disp_Order,page_Link) values('".$image."','".$order."','".$link."')");
	//$db->insert("slider_mst",$column,$value);
}

?>

<script type="text/javascript">

window.location='slider.php';

</script>
