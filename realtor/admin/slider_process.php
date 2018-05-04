<?php 
session_start();
include("include/config.php");
require_once("include/function.php");
u_Connect("cn");
$is_edit=$_REQUEST['is_edit'];
$column=array("is_Image","disp_Order","page_Link");
 	$order=$_POST["order"];

	$category_link=$_POST["category_link"];

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

					$tmp=imagecreatetruecolor($width,$height);
					$newwidth1=$width;
					$newheight1=$height;
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
					imagecopyresampled($tmp,$src,0,0,0,0,$width,$height,$width,$height);
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
					imagejpeg($tmp1,$tfilename,100);						

					//imagejpeg($tmp,$ffilename,100);
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


	$value=array($image,$order,$link);

	$txtid=$_POST['txtid'];


mysql_query("update slider_mst set is_Image='".$image."',disp_Order='".$order."',category_link_id='".$category_link."' where slider_Id='".$txtid."'");
	//$db->update("slider_mst","slider_Id",$txtid,$column,$value);
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

					$newheight1=$height;
					$newwidth1=$width;
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
					imagecopyresampled($tmp,$src,0,0,0,0,$width,$height,$width,$height);
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
					imagejpeg($tmp1,$tfilename,100);						

					//imagejpeg($tmp,$ffilename,100);
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

	$value=array($image,$order,$link);
	//echo "insert into slider_mst(is_Image,disp_Order,page_Link) values('".$image."','".$order."','".$link."')";
	
	mysql_query("insert into slider_mst(is_Image,disp_Order,category_link_id) values('".$image."','".$order."','".$category_link."')");
	//$db->insert("slider_mst",$column,$value);
}

?>

<script type="text/javascript">

window.location='slider.php';

</script>
