<?php 
session_start();
include("session_check.php");
require("config.inc.php"); 
require("Database.class.php"); 
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
$db->connect(); 


$is_edit=$_REQUEST['is_edit'];

 	$offtype=$_POST['offtype'];
	$offer=$_POST["offer"];
	$cdate=$_POST['cdate'];
	$cdate2=$_POST["cdate2"];
	$amttype=$_POST["amttype"];
	$amt=$_POST["amt"];
	$active=$_POST["active"];
	$descr=$_POST["descr"];
	

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

					$newheight1 =$height;

					

					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

	

					imagecopyresampled($tmp,$src,0,0,0,0,$width,$height,$width,$height);

					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);																							

					

					//$id=$db->dbselect1("select * from prod_mst order by Prod_Id desc limit 1");

					$pro=mysql_query("select * from offer order by OfferId desc limit 1");

					$rows=mysql_affected_rows();

					$id=mysql_fetch_array($pro);

					if($rows=='0'){

					$b=$id['OfferId'];									

					}

					else

					{

						$b=$_POST["txtid"];

					}

					$tfilename = "../gift/photo". $b . "." . $extension;

					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";

					$p="photo".$b . "." . $extension;		

					$ffilename = "../gift/ph". $p ;

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


	$txtid=$_POST['txtid'];
	$column=array("Offer","Is_Image","IsActive","Description");
	$value=array($offer,$image,$active,$descr);
	$db->update("offer","OfferId",$txtid,$column,$value);
	
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

					

					$newwidth1=$width;

					$newheight1 =$height;


					

					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

	

					imagecopyresampled($tmp,$src,0,0,0,0,$width,$height,$width,$height);

					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);																							

					


					$pro=mysql_query("select * from offer order by OfferId desc limit 1");

					$rows=mysql_affected_rows();

					$mid=mysql_fetch_array($pro);

					if($rows=='1'){

					$b=$mid['OfferId']+1;									

					}

					else

					{

						$b=1;

					}

					 $tfilename = "../gift/photo". $b . "." . $extension;

					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";

					$p="photo".$b . "." . $extension;		

					$ffilename = "../gift/ph". $p ;

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

		$column=array("Offer","Is_Image","IsActive","Description");
		$value=array($offer,$image,$active,$descr);
		
	$db->insert("offer",$column,$value);
	$txtid=mysql_insert_id();
}
mysql_query("update prod_mst set Offer_Id='0'") or die(mysql_error());
$maxval=count($_REQUEST['prod']);
//print_r($_REQUEST['prod']);
for($i=0;$i<=$maxval-1;$i++)
{
	foreach($ar=array($_REQUEST['prod']) as $val)
	{
		mysql_query("update prod_mst set Offer_Id='".$txtid."' where Prod_Id='".$val[$i]."'") or die(mysql_error());
	}
	
}

?>
<script type="text/javascript">
window.location ='offer.php';
</script>
