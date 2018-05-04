<?php 
session_start();
include("session_check.php");
require("config.inc.php"); 
require("Database.class.php"); 
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
$db->connect(); 

$is_edit=$_REQUEST['is_edit'];

$column=array("Name","Branch","Address1","Area","City","Pincode","Email_Address","Demo_No","Mobile","Register_Date","Is_Active","Is_Image","Disp_Order");
 
	$fname=$_POST["fname"];
	$barnch=$_POST["barnch"];
	$add1=$_POST["add1"];
	//$add2=$_POST["add2"];
	$area=$_POST["area"];
	$zipcode=$_POST["zipcode"];
	//$country=$_POST["countryid"];
	//$state=$_POST["state"];
	$city=$_POST["city"];
	$email=$_POST["email"];
	$demo_no=$_POST["demo_no"];
	$mobile=$_POST["mobile"];
    $rdate=date('Y-m-d H:i:s');
	$active=$_POST['active'];
	$disp_order=$_POST['disp_order'];
	
	
if($is_edit==1)
{ 
		if($_FILES["image"]["name"]<>"" )

	 {

		$max_filesize = 99999999; // Maximum filesize in BYTES (currently 0.9MB).

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

					

					//$id=$db->dbselect1("select * from prod_mst order by Prod_Id desc limit 1");

					$pro=mysql_query("select * from franchise_mst order by Franchise_Id desc limit 1");

					$rows=mysql_affected_rows();

					$id=mysql_fetch_array($pro);

					if($rows=='0'){

					$b=$id['Franchise_Id'];									

					}

					else

					{

						$b=$_POST["txtid"];

					}

					$tfilename = "../franchisee/photo". $b . "." . $extension;

					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";

					$p="photo".$b . "." . $extension;		

					//$ffilename = "../product/ph". $p ;

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



	$txtid=$_POST['txtid'];
	$value=array($fname,$barnch,$add1,$area,$city,$zipcode,$email,$demo_no,$mobile,$rdate,$active,$image,$disp_order);
	$db->update("franchise_mst","Franchise_Id",$txtid,$column,$value);
	
}
else
{ 
	
	 if($_FILES["image"]["name"]<>"" )
	 {
		$max_filesize = 99999999; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["image"]["name"] ;
		 function getExtension($str) {
				 $i = strrpos($str,".");
				 if (!$i) { return ""; }
				 $l = strlen($str) - $i;
				 $ext = substr($str,$i+1,$l);
				 return $ext;
		 }
		$photo_title=$_FILES["image"]["name"];
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
						$newheight1=$height;
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
					imagecopyresampled($tmp,$src,0,0,0,0,$width,$height,$width,$height);
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);																							
					$pro=mysql_query("select * from franchise_mst order by Franchise_Id desc limit 1");
					$rows=mysql_affected_rows();
					$mid=mysql_fetch_array($pro);
					if($rows=='1'){
					$b=$mid['Franchise_Id']+1;									
					}
					else
					{
						$b=1;
					}
					$tfilename = "../franchisee/photo". $b . "." . $extension;
					$p="photo".$b . "." . $extension;		
					//$ffilename = "../franchisee/ph". $p ;
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

	$value=array($fname,$barnch,$add1,$area,$city,$zipcode,$email,$demo_no,$mobile,$rdate,$active,$image,$disp_order);
	$db->insert("franchise_mst",$column,$value);
}
?>
<script type="text/javascript">
window.location ='franchise.php';
</script>
