<?php
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

if($_FILES["larger1"]["name"]<>"" )
{
		 
		 
		$max_filesize = 2097152; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["larger1"]["name"] ;
	
	
		
		$photo_title=$_FILES["larger1"]["name"];
	    // echo "asd";
		$uploadedfile = $_FILES['larger1']['tmp_name'];
		 
		if ($photo_title) 
		{
		
			$filename = stripslashes($_FILES['larger1']['name']);
	
			$extension = getExtension($filename);
			
			$extension = strtolower($extension);
			
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				
				$error="Unkown Image Extension";					
			}		
			else
			{	
				if($_FILES["larger1"]["size"] >= $max_filesize)
				{				  
				 	 $error="File size too large";				  				  
					 exit;
				}
				
				$size=filesize($_FILES['larger1']['tmp_name']);
				//echo "s=".$size; 
				
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['larger1']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);			
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['larger1']['tmp_name'];
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
					
					$newwidth=365;
					$newheight=381;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					//$newwidth1=190;
					//$newheight1=200;//($height/$width)*$newwidth1;
					$newwidth1=72;
					$newheight1=72;//($height/$width)*$newwidth1;
					
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
	
					$tmp2=imagecreatetruecolor($width,$height);
	
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);
					imagecopyresampled($tmp2,$src,0,0,0,0,$width,$height,$width,$height);																								
					
					$id=mysql_query("select * from product_mast order by Product_id");
					$total=mysql_affected_rows();
					$b=$total+1;									

					$tfilename = "../photo/add_t1_". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="add_t1_".$b . "." . $extension;		
					$mfilename = "../photo/add_m1_". $b . "." . $extension ;
					$q="add_m1_".$b . "." . $extension;	
					$ffilename = "../photo/add_f1_". $b . "." . $extension ;
					$r="add_f1_".$b . "." . $extension;	
					//echo $ffilename."<br>";			
					$additional_thumb_photo1 = $p;
					$additional_medium_photo1 = $q;
					$additional_full_photo1 = $r;
																
					move_uploaded_file($_FILES['larger1']["tmp_name"],$tfilename);
					move_uploaded_file($_FILES['larger1']["tmp_name"],$mfilename); 
					move_uploaded_file($_FILES['larger1']["tmp_name"],$ffilename); 
					
					imagejpeg($tmp1,$tfilename,100);
					imagejpeg($tmp,$mfilename,100);
					imagejpeg($tmp2,$ffilename,100);
									
					imagedestroy($src);
					imagedestroy($tmp);
					imagedestroy($tmp1);
					imagedestroy($tmp2);
			}
		}
	}	
	
/////////  Larger2 ///////

if($_FILES["larger2"]["name"]<>"" )
{
		 
		 
		$max_filesize = 2097152; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["larger2"]["name"] ;
	
	
		
		$photo_title=$_FILES["larger2"]["name"];
	    // echo "asd";
		$uploadedfile = $_FILES['larger2']['tmp_name'];
		 
		if ($photo_title) 
		{
		
			$filename = stripslashes($_FILES['larger2']['name']);
	
			$extension = getExtension($filename);
			
			$extension = strtolower($extension);
			
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				
				$error="Unkown Image Extension";					
			}		
			else
			{	
				if($_FILES["larger2"]["size"] >= $max_filesize)
				{				  
				 	 $error="File size too large";				  				  
					 exit;
				}
				
				$size=filesize($_FILES['larger2']['tmp_name']);
				//echo "s=".$size; 
				
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['larger2']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);			
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['larger2']['tmp_name'];
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
					
					$newwidth=365;
					$newheight=381;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					//$newwidth1=190;
					//$newheight1=200;//($height/$width)*$newwidth1;
					$newwidth1=72;
					$newheight1=72;//($height/$width)*$newwidth1;
					
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
	
					$tmp2=imagecreatetruecolor($width,$height);
	
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);
					imagecopyresampled($tmp2,$src,0,0,0,0,$width,$height,$width,$height);	
					
					$id=mysql_query("select * from product_mast order by Product_id");
					$total=mysql_affected_rows();
					$b=$total+1;									

					$tfilename = "../photo/add_t2_". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="add_t2_".$b . "." . $extension;		
					$mfilename = "../photo/add_m2_". $b . "." . $extension ;
					$q="add_m2_".$b . "." . $extension;	
					$ffilename = "../photo/add_f2_". $b . "." . $extension ;
					$r="add_f2_".$b . "." . $extension;	
					//echo $ffilename."<br>";			
					$additional_thumb_photo2 = $p;
					$additional_medium_photo2 = $q;
					$additional_full_photo2 = $r;
																
					move_uploaded_file($_FILES['larger2']["tmp_name"],$tfilename);
					move_uploaded_file($_FILES['larger2']["tmp_name"],$mfilename); 
					move_uploaded_file($_FILES['larger2']["tmp_name"],$ffilename); 
					
					imagejpeg($tmp1,$tfilename,100);
					imagejpeg($tmp,$mfilename,100);
					imagejpeg($tmp2,$ffilename,100);
									
					imagedestroy($src);
					imagedestroy($tmp);
					imagedestroy($tmp1);
					imagedestroy($tmp2);
			}
		}
	}	
	
////////////   larger3   ////////////////

if($_FILES["larger3"]["name"]<>"")
{
		 
		 
		$max_filesize = 2097152; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["larger3"]["name"] ;
	
	
		
		$photo_title=$_FILES["larger3"]["name"];
	    // echo "asd";
		$uploadedfile = $_FILES['larger3']['tmp_name'];
		 
		if ($photo_title) 
		{
		
			$filename = stripslashes($_FILES['larger3']['name']);
	
			$extension = getExtension($filename);
			
			$extension = strtolower($extension);
			
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				
				$error="Unkown Image Extension";					
			}		
			else
			{	
				if($_FILES["larger3"]["size"] >= $max_filesize)
				{				  
				 	 $error="File size too large";				  				  
					 exit;
				}
				
				$size=filesize($_FILES['larger3']['tmp_name']);
				//echo "s=".$size; 
				
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['larger3']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);			
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['larger3']['tmp_name'];
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
					
					$newwidth=365;
					$newheight=381;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					//$newwidth1=190;
					//$newheight1=200;//($height/$width)*$newwidth1;
					$newwidth1=72;
					$newheight1=72;//($height/$width)*$newwidth1;
					
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
	
					$tmp2=imagecreatetruecolor($width,$height);
	
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);
					imagecopyresampled($tmp2,$src,0,0,0,0,$width,$height,$width,$height);																								
					
					$id=mysql_query("select * from product_mast order by Product_id");
					$total=mysql_affected_rows();
					$b=$total+1;									

					$tfilename = "../photo/add_t3_". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="add_t3_".$b . "." . $extension;		
					$mfilename = "../photo/add_m3_". $b . "." . $extension ;
					$q="add_m3_".$b . "." . $extension;	
					$ffilename = "../photo/add_f3_". $b . "." . $extension ;
					$r="add_f3_".$b . "." . $extension;	
					//echo $ffilename."<br>";			
					$additional_thumb_photo3 = $p;
					$additional_medium_photo3 = $q;
					$additional_full_photo3 = $r;
																
					move_uploaded_file($_FILES['larger3']["tmp_name"],$tfilename);
					move_uploaded_file($_FILES['larger3']["tmp_name"],$mfilename); 
					move_uploaded_file($_FILES['larger3']["tmp_name"],$ffilename); 
					
					imagejpeg($tmp1,$tfilename,100);
					imagejpeg($tmp,$mfilename,100);
					imagejpeg($tmp2,$ffilename,100);
									
					imagedestroy($src);
					imagedestroy($tmp);
					imagedestroy($tmp1);
					imagedestroy($tmp2);
			}
		}
	}
	
//////////  larger 4 /////////////


if($_FILES["larger4"]["name"]<>"" )
{
		 
		 
		$max_filesize = 2097152; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["larger4"]["name"] ;
	
	
		
		$photo_title=$_FILES["larger4"]["name"];
	    // echo "asd";
		$uploadedfile = $_FILES['larger4']['tmp_name'];
		 
		if ($photo_title) 
		{
		
			$filename = stripslashes($_FILES['larger4']['name']);
	
			$extension = getExtension($filename);
			
			$extension = strtolower($extension);
			
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				
				$error="Unkown Image Extension";					
			}		
			else
			{	
				if($_FILES["larger4"]["size"] >= $max_filesize)
				{				  
				 	 $error="File size too large";				  				  
					 exit;
				}
				
				$size=filesize($_FILES['larger4']['tmp_name']);
				//echo "s=".$size; 
				
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['larger4']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);			
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['larger4']['tmp_name'];
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
					
					$newwidth=365;
					$newheight=381;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					//$newwidth1=190;
					//$newheight1=200;//($height/$width)*$newwidth1;
					$newwidth1=72;
					$newheight1=72;//($height/$width)*$newwidth1;
					
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
	
					$tmp2=imagecreatetruecolor($width,$height);
	
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);
					imagecopyresampled($tmp2,$src,0,0,0,0,$width,$height,$width,$height);																								
					
					$id=mysql_query("select * from product_mast order by Product_id");
					$total=mysql_affected_rows();
					$b=$total+1;									

					$tfilename = "../photo/add_t4_". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="add_t4_".$b . "." . $extension;		
					$mfilename = "../photo/add_m4_". $b . "." . $extension ;
					$q="add_m4_".$b . "." . $extension;	
					$ffilename = "../photo/add_f4_". $b . "." . $extension ;
					$r="add_f4_".$b . "." . $extension;	
					//echo $ffilename."<br>";			
					$additional_thumb_photo4 = $p;
					$additional_medium_photo4 = $q;
					$additional_full_photo4 = $r;
																
					move_uploaded_file($_FILES['larger4']["tmp_name"],$tfilename);
					move_uploaded_file($_FILES['larger4']["tmp_name"],$mfilename); 
					move_uploaded_file($_FILES['larger4']["tmp_name"],$ffilename); 
					
					imagejpeg($tmp1,$tfilename,100);
					imagejpeg($tmp,$mfilename,100);
					imagejpeg($tmp2,$ffilename,100);
									
					imagedestroy($src);
					imagedestroy($tmp);
					imagedestroy($tmp1);
					imagedestroy($tmp2);
			}
		}
	}	
	
	//////////  larger 5 /////////////


if($_FILES["larger5"]["name"]<>"" )
{
		 
		 
		$max_filesize = 2097152; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["larger5"]["name"] ;
	
	
		
		$photo_title=$_FILES["larger5"]["name"];
	    // echo "asd";
		$uploadedfile = $_FILES['larger5']['tmp_name'];
		 
		if ($photo_title) 
		{
		
			$filename = stripslashes($_FILES['larger5']['name']);
	
			$extension = getExtension($filename);
			
			$extension = strtolower($extension);
			
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				
				$error="Unkown Image Extension";					
			}		
			else
			{	
				if($_FILES["larger5"]["size"] >= $max_filesize)
				{				  
				 	 $error="File size too large";				  				  
					 exit;
				}
				
				$size=filesize($_FILES['larger5']['tmp_name']);
				//echo "s=".$size; 
				
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['larger5']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);			
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['larger5']['tmp_name'];
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
					
					$newwidth=365;
					$newheight=381;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					//$newwidth1=190;
					//$newheight1=200;//($height/$width)*$newwidth1;
					$newwidth1=72;
					$newheight1=72;//($height/$width)*$newwidth1;
					
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
	
					$tmp2=imagecreatetruecolor($width,$height);
	
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);
					imagecopyresampled($tmp2,$src,0,0,0,0,$width,$height,$width,$height);																								
					
					$id=mysql_query("select * from product_mast order by Product_id");
					$total=mysql_affected_rows();
					$b=$total+1;									

					$tfilename = "../photo/add_t5_". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="add_t5_".$b . "." . $extension;		
					$mfilename = "../photo/add_m5_". $b . "." . $extension ;
					$q="add_m5_".$b . "." . $extension;	
					$ffilename = "../photo/add_f5_". $b . "." . $extension ;
					$r="add_f5_".$b . "." . $extension;	
					//echo $ffilename."<br>";			
					$additional_thumb_photo5 = $p;
					$additional_medium_photo5 = $q;
					$additional_full_photo5 = $r;
																
					move_uploaded_file($_FILES['larger5']["tmp_name"],$tfilename);
					move_uploaded_file($_FILES['larger5']["tmp_name"],$mfilename); 
					move_uploaded_file($_FILES['larger5']["tmp_name"],$ffilename); 
					
					imagejpeg($tmp1,$tfilename,100);
					imagejpeg($tmp,$mfilename,100);
					imagejpeg($tmp2,$ffilename,100);
									
					imagedestroy($src);
					imagedestroy($tmp);
					imagedestroy($tmp1);
					imagedestroy($tmp2);
			}
		}
	}	
	



//////////  Display image /////////////


if($_FILES["display_image"]["name"]<>"" )
{
		$max_filesize = 2097152; // Maximum filesize in BYTES (currently 0.9MB).
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
					
					$newwidth=365;
					$newheight=381;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					//$newwidth1=190;
					//$newheight1=200;//($height/$width)*$newwidth1;
					$newwidth1=72;
					$newheight1=72;//($height/$width)*$newwidth1;
					
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
					
					$tmp2=imagecreatetruecolor($width,$height);
	
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);
					imagecopyresampled($tmp2,$src,0,0,0,0,$width,$height,$width,$height);																								
					
					$id=mysql_query("select * from product_mast order by Product_id");
					$total=mysql_affected_rows();
					$b=$total+1;									

					$tfilename = "../photo/display_t_image_". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="display_t_image_".$b . "." . $extension;		
					$mfilename = "../photo/display_m_image_". $b . "." . $extension ;
					$q="display_m_image_".$b . "." . $extension;	
					$ffilename = "../photo/display_f_image_". $b . "." . $extension ;
					$r="display_f_image_".$b . "." . $extension;	
					//echo $ffilename."<br>";			
					$display_t_image = $p;
					$display_m_image = $q;
					$display_f_image = $r;
																
					move_uploaded_file($_FILES['display_image']["tmp_name"],$tfilename);
					move_uploaded_file($_FILES['display_image']["tmp_name"],$mfilename); 
					move_uploaded_file($_FILES['display_image']["tmp_name"],$ffilename); 
					
					imagejpeg($tmp1,$tfilename,100);
					imagejpeg($tmp,$mfilename,100);
					imagejpeg($tmp2,$ffilename,100);
									
					imagedestroy($src);
					imagedestroy($tmp);
					imagedestroy($tmp1);
					imagedestroy($tmp2);
			}
		}
	}	
	
	
	
	
	
	
	$product=$_POST["product_title"];
	$code=$_POST["product_code"];
	$desc=$_POST["product_desc"];
	$price=$_POST["product_mrp"];	
	
	$status=$_POST["rdoStatus"];	
	$gender=$_POST["gender"];
	$brandid=$_POST["brand"];	
	$qty=$_POST["product_qty"];
	
	
$query="insert into product_mast(Product_title,Product_code,Product_description,Product_display_thumb_image,Product_display_medium_image,Product_display_full_image,Price,Brand_mast_id,product_clothes_fabric,gender,Product_quantity,Product_active_status) values('".$product."','".$code."','".$desc."','".$display_t_image."','".$display_m_image."','".$display_f_image."','".$price."','".$brandid."','".$_REQUEST["product_clothes_fabric"]."','".$gender."','".$qty."','".$status."')";
$result=mysql_query($query) or die(mysql_error());

$productid=mysql_insert_id();
/////////////////////// Insert into Product_Size  ///////////////////////////


if($_REQUEST["chksize"]!="")
	{
		foreach($_REQUEST["chksize"] as $selectedsize) 
		{ 
			$psize[$s]=$selectedsize;
			
			$querysize="insert into product_size (product_mast_id,size_mast_id) values ('".$productid."','".$psize[$s]."')";
			mysql_query($querysize);
		}		
	}
///////////////////////   Insert into Product_category   //////////////////

$child=$_POST["childcategory"];

	$q=mysql_query("SELECT * from category_master where category_ID = '".$child."'");
     $row=mysql_fetch_array($q);
	
		$i=1;
		 $catid[$i]=$row["category_ID"];
		
	 $parent[$i]=$row["parent_category_ID"];
	
		while($parent[$i]!=0)
		{					
				$recordsetcat = mysql_query("SELECT * from category_master where category_ID='".$parent[$i]."'");
				 $rowcat = mysql_fetch_array($recordsetcat);
				
				 $qins="insert into product_category(Product_mast_id,Category_mast_id) values('".$productid."','".$catid[$i]."')";
				 $myq=mysql_query($qins) or mysql_error();
				 
				 $i++;
				 $parent[$i]=$rowcat["parent_category_ID"];
				
				 $catid[$i]=$rowcat["category_ID"];
				
		}
		
		$parid=$_POST["parent_category"];
		
		if($parid != '')
		{
			$qins1=mysql_query("insert into product_category(Product_mast_id,Category_mast_id) values('".$productid."','".$parid."')");
		}
	
///////////////////// insert into Product Offer //////////
if($_POST['offer_name']!='')
{
$dt1=explode("-",$_POST["txtSdate"]);
	$dd1=$dt1[0];
	$mm1=$dt1[1];
	$yy1=$dt1[2];
	
	
$dt2=explode("-",$_POST["txtEdate"]);
	$dd2=$dt2[0];
	$mm2=$dt2[1];
	$yy2=$dt2[2];

$offerid=$_POST['offer_name'];
$sdate=$yy1."-".$mm1."-".$dd1;
$edate=$yy2."-".$mm2."-".$dd2;
$amt=$_POST['txtAmount'];
$type=$_POST['rdoType'];

$queryOffer="insert into product_offer(Product_mast_id,offer_mast_id,Start_date,End_date,offer_amt,offer_type_id) values('".$productid."','".$offerid."','".$sdate."','".$edate."','".$amt."','".$type."')";
$resultOffer=mysql_query($queryOffer)
or die(mysql_error());
}
//////////////  insert into product_image  //////////////


if((($_FILES["larger1"]["name"])!=""))  
{
$queryImage1="insert into product_image(Product_mast_id,Large_image,Medium_image,Thumb_image) values('".$productid."','".$additional_full_photo1."','".$additional_medium_photo1."','".$additional_thumb_photo1."')";
$resultImage1=mysql_query($queryImage1)
or die(mysql_error());
}


if((($_FILES["larger2"]["name"])!=""))  
{
$queryImage2="insert into product_image(Product_mast_id,Large_image,Medium_image,Thumb_image) values('".$productid."','".$additional_full_photo2."','".$additional_medium_photo2."','".$additional_thumb_photo2."')";
$resultImage2=mysql_query($queryImage2)
or die(mysql_error());
}



if((($_FILES["larger3"]["name"])!=""))  
{
$queryImage3="insert into product_image(Product_mast_id,Large_image,Medium_image,Thumb_image) values('".$productid."','".$additional_full_photo3."','".$additional_medium_photo3."','".$additional_thumb_photo3."')";
$resultImage3=mysql_query($queryImage3)
or die(mysql_error());
}



if((($_FILES["larger4"]["name"])!=""))  
{
$queryImage4="insert into product_image(Product_mast_id,Large_image,Medium_image,Thumb_image) values('".$productid."','".$additional_full_photo4."','".$additional_medium_photo4."','".$additional_thumb_photo4."')";
$resultImage4=mysql_query($queryImage4)
or die(mysql_error());
}


if((($_FILES["larger5"]["name"])!=""))  
{
$queryImage5="insert into product_image(Product_mast_id,Large_image,Medium_image,Thumb_image) values('".$productid."','".$additional_full_photo5."','".$additional_medium_photo5."','".$additional_thumb_photo5."')";
$resultImage5=mysql_query($queryImage5)
or die(mysql_error());
}

if($_REQUEST["selectedcolors"]!="")
	{
		foreach($_REQUEST["selectedcolors"] as $selectedcolors) 
		{
			$colorid[$c]=$selectedcolors;
			
			$querycolor="insert into product_colors (product_master_ID,color_master_ID) values ('".$productid."','".$colorid[$c]."')";
			mysql_query($querycolor);
		}		
	}

header("location:disProduct.php");
exit;
}

                       ////////// Edit Product_mast /////////////


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
	
if($_FILES["changeimage"]["name"]<>"" )
{
		$max_filesize = 2097152; // Maximum filesize in BYTES (currently 0.9MB).
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
					
					$newwidth=365;
					$newheight=381;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					
					//$newwidth1=190;
					//$newheight1=200;//($height/$width)*$newwidth1;
					$newwidth1=72;
					$newheight1=72;//($height/$width)*$newwidth1;
					
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
					
					$tmp2=imagecreatetruecolor($width,$height);
	
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);
					imagecopyresampled($tmp2,$src,0,0,0,0,$width,$height,$width,$height);	
					
					
					$b=$_POST["hdnProduct"];									

					$tfilename = "../photo/display_t_image_". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="display_t_image_".$b . "." . $extension;		
					$mfilename = "../photo/display_m_image_". $b . "." . $extension ;
					$q="display_m_image_".$b . "." . $extension;	
					$ffilename = "../photo/display_f_image_". $b . "." . $extension ;
					$r="display_f_image_".$b . "." . $extension;	
					//echo $ffilename."<br>";			
					$display_t_image = $p;
					$display_m_image = $q;
					$display_f_image = $r;
																
					move_uploaded_file($_FILES['changeimage']["tmp_name"],$tfilename);
					move_uploaded_file($_FILES['changeimage']["tmp_name"],$mfilename); 
					move_uploaded_file($_FILES['changeimage']["tmp_name"],$ffilename); 
					
					imagejpeg($tmp1,$tfilename,100);
					imagejpeg($tmp,$mfilename,100);
					imagejpeg($tmp2,$ffilename,100);
					
									
					imagedestroy($src);
					imagedestroy($tmp);
					imagedestroy($tmp1);
					imagedestroy($tmp2);
			}
		}
	}	
		
	
		
	$product=$_POST["product_title"];
	$code=$_POST["product_code"];
	$desc=$_POST["product_desc"];
	$detail=$_POST["product_details"];
	$price=$_POST["product_mrp"];
	
	
	$status=$_POST["rdoStatus"];	
	$gender=$_POST["gender"];
	$brandid=$_POST["brand"];
	
	
	$qty=$_POST["product_qty"];
	$productid=$_POST["hdnProduct"];
	
	$product_clothes_fabric=$_REQUEST["product_clothes_fabric"];	
	
if(($_FILES["changeimage"]["name"])!="")  
{
$queryImage1="update product_mast set Product_display_thumb_image='".$display_t_image."',Product_display_medium_image='".$display_m_image."',Product_display_full_image='".$display_f_image."' where Product_id='".$productid."'";

$resultImage1=mysql_query($queryImage1)
or die(mysql_error());
}
	
$queryProd="update product_mast set Product_title='".$product."',Product_code='".$code."',Product_description='".$desc."',Price='".$price."',Brand_mast_id='".$brandid."',Product_quantity='".$qty."',product_clothes_fabric='".$_REQUEST["product_clothes_fabric"]."',gender='".$gender."',Product_active_status='".$status."' where Product_id='".$productid."'";

$resultProd=mysql_query($queryProd)
or die(mysql_error());

//////////////////Edit Colors //////////////
$query="delete from product_colors where product_master_ID='".$productid."' ";
	mysql_query($query);
if($_REQUEST["selectedcolors"]!="")
	{
		foreach($_REQUEST["selectedcolors"] as $selectedcolors) 
		{
			$colorid[$c]=$selectedcolors;
			
			$querycolor="insert into product_colors (product_master_ID,color_master_ID) values ('".$productid."','".$colorid[$c]."')";
			mysql_query($querycolor);
		}		
	}

/////////////////////// edit Product_Size  ///////////////////////////

$query="delete from product_size where product_mast_id='".$productid."' ";
	mysql_query($query);
if($_REQUEST["chksize"]!="")
	{
		foreach($_REQUEST["chksize"] as $selectedsize) 
		{
			$size[$s]=$selectedsize;
			
			$querysize="insert into product_size (product_mast_id,size_mast_id) values ('".$productid."','".$size[$s]."')";
			mysql_query($querysize);
		}		
	}
	
////////////////   Edit Category   ////////////////////

if($_POST["childcategory"]=='')
{
	$DelCat=mysql_query("delete from product_category where Product_mast_id='".$productid."'");
	$child=$_POST["hdnCatid"];

	$q=mysql_query("SELECT * from category_master where category_ID= '".$child."'");
     $row=mysql_fetch_array($q);
	
		$i=1;
		 $catid[$i]=$row["category_ID"];
		
	 $parent[$i]=$row["parent_category_ID"];
	
		while($parent[$i]!=0)
		{					
				$recordsetcat = mysql_query("SELECT * from category_master where category_ID='".$parent[$i]."'");
				 $rowcat = mysql_fetch_array($recordsetcat);
				
				 $qins="insert into product_category(Product_mast_id,Category_mast_id) values('".$productid."','".$catid[$i]."')";
				 $myq=mysql_query($qins) or mysql_error();
				 
				 $i++;
				 $parent[$i]=$rowcat["parent_category_ID"];
				
				 $catid[$i]=$rowcat["category_ID"];
				
		}
		
		$parid=$_POST["parent_category"];
		
		if($parid != '')
		{
			$qins1=mysql_query("insert into product_category(Product_mast_id,Category_mast_id) values('".$productid."','".$parid."')");
		}
}
else
{
$DelCat=mysql_query("delete from product_category where Product_mast_id='".$productid."'");

$child=$_POST["childcategory"];

	$q=mysql_query("SELECT * from category_master where category_ID= '".$child."'");
     $row=mysql_fetch_array($q);
	
		$i=1;
		 $catid[$i]=$row["category_ID"];
		
	 $parent[$i]=$row["parent_category_ID"];
	
		while($parent[$i]!=0)
		{					
				$recordsetcat = mysql_query("SELECT * from category_master where category_ID='".$parent[$i]."'");
				 $rowcat = mysql_fetch_array($recordsetcat);
				
				 $qins="insert into product_category(Product_mast_id,Category_mast_id) values('".$productid."','".$catid[$i]."')";
				 $myq=mysql_query($qins) or mysql_error();
				 
				 $i++;
				 $parent[$i]=$rowcat["parent_category_ID"];
				
				 $catid[$i]=$rowcat["category_ID"];
				
		}
		
		$parid=$_POST["parent_category"];
		
		if($parid != '')
		{
			$qins1=mysql_query("insert into product_category(Product_mast_id,Category_mast_id) values('".$productid."','".$parid."')");
		}
		
}
////////////////   Edit Offer   ///////////////////////

if($_POST["offer_name"]!="")
{
	$qselectOffer=mysql_query("select * from product_offer where Product_mast_id='".$productid."'");
$totalOffer=mysql_num_rows($qselectOffer); 


if($totalOffer==0)
{
$dt1=explode("-",$_POST["txtSdate"]);
	$dd1=$dt1[0];
	$mm1=$dt1[1];
	$yy1=$dt1[2];
	
	
$dt2=explode("-",$_POST["txtEdate"]);
	$dd2=$dt2[0];
	$mm2=$dt2[1];
	$yy2=$dt2[2];

$offerid=$_POST['offer_name'];
$sdate=$yy1."-".$mm1."-".$dd1;
$edate=$yy2."-".$mm2."-".$dd2;
$amt=$_POST['txtAmount'];
$type=$_POST['rdoType'];

$queryOffer="insert into product_offer(Product_mast_id,offer_mast_id,Start_date,End_date,offer_amt,offer_type_id) values('".$productid."','".$offerid."','".$sdate."','".$edate."','".$amt."','".$type."')";
$resultOffer=mysql_query($queryOffer)
or die(mysql_error());
}
else
{
$dt1=explode("-",$_POST["txtSdate"]);
	$dd1=$dt1[0];
	$mm1=$dt1[1];
	$yy1=$dt1[2];
	
	
$dt2=explode("-",$_POST["txtEdate"]);
	$dd2=$dt2[0];
	$mm2=$dt2[1];
	$yy2=$dt2[2];

$offerid=$_POST['offer_name'];
$sdate=$yy1."-".$mm1."-".$dd1;
$edate=$yy2."-".$mm2."-".$dd2;
$amt=$_POST['txtAmount'];
$type=$_POST['rdoType'];

$editOff="update product_offer set offer_mast_id='".$offerid."',Start_date='".$sdate."',End_date='".$edate."',offer_amt='".$amt."',offer_type_id='".$type."' where Product_mast_id='".$productid."' ";
$resEditoff=mysql_query($editOff)
or die(mysql_error());
}
	
}
header("location:disProduct.php");


}

//////////////////////////  Delete  ///////////////////
					   

if($_REQUEST["process"]=="delete")
{
	$productid=$_GET["Product_id"];

$query="delete from product_mast where Product_id='".$productid."'";

$result=mysql_query($query)
or die(mysql_error());
header("location:disProduct.php");


}

////////////////// Add more Product_image ////////////////

if($_POST["hdnType"]=='1') 
{	
if($_REQUEST["process"]=="addimage")
{
	$productid=$_POST["hdnProductid"];
		
	$query = mysql_query("select * from product_image where Product_mast_id='".$productid."'");
   
   function getExtension($str) {
				 $i = strrpos($str,".");
				 if (!$i) { return ""; }
				 $l = strlen($str) - $i;
				 $ext = substr($str,$i+1,$l);
				 return $ext;
		 }
		 
   $totImage=mysql_num_rows($query);
	for($i=0; $i<5-$totImage; $i++)
{

	
	
	
	////upladoing image file

if($_FILES["larger"]["name"][$i]<>"" )
{
		 
		 
		$max_filesize = 2097152; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["larger"]["name"][$i];
	
	
		
		$photo_title=$_FILES["larger"]["name"][$i];
	    // echo "asd";
		$uploadedfile = $_FILES['larger']['tmp_name'][$i];
		 
		if ($photo_title) 
		{
		
			$filename = stripslashes($_FILES['larger']['name'][$i]);
	
			$extension = getExtension($filename);
			
			$extension = strtolower($extension);
			
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				
				$error="Unkown Image Extension";					
			}		
			else
			{	
				if($_FILES["larger"]["size"][$i] >= $max_filesize)
				{				  
				 	 $error="File size too large";				  				  
					 exit;
				}
				
				$size=filesize($_FILES['larger']['tmp_name'][$i]);
				//echo "s=".$size; 
				
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['larger']['tmp_name'][$i];
					$src = imagecreatefromjpeg($uploadedfile);			
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['larger']['tmp_name'][$i];
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
					
					$newwidth=365;
					$newheight=381;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					//$newwidth1=190;
					//$newheight1=200;//($height/$width)*$newwidth1;
					$newwidth1=72;
					$newheight1=72;//($height/$width)*$newwidth1;
					
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
	
					$tmp2=imagecreatetruecolor($width,$height);
	
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);
					imagecopyresampled($tmp2,$src,0,0,0,0,$width,$height,$width,$height);																							
					
					$b=$productid;
					
					$id=mysql_query("select * from product_image where Product_mast_id='".$productid."'");
					$total=mysql_affected_rows();
					$imid=$total+1;			

					$tfilename = "../photo/add_t".$imid."_". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="add_t".$imid."_".$b . "." . $extension;		
					$mfilename = "../photo/add_m".$imid."_". $b . "." . $extension ;
					$q="add_m".$imid."_".$b . "." . $extension;	
					$ffilename = "../photo/add_f".$imid."_". $b . "." . $extension ;
					$r="add_f".$imid."_".$b . "." . $extension;	
					//echo $ffilename."<br>";			
					$additional_thumb_photo = $p;
					$additional_medium_photo = $q;
					$additional_full_photo = $r;
																
					move_uploaded_file($_FILES['larger']["tmp_name"][$i],$tfilename);
					move_uploaded_file($_FILES['larger']["tmp_name"][$i],$mfilename); 
					move_uploaded_file($_FILES['larger']["tmp_name"][$i],$ffilename); 
					
					imagejpeg($tmp1,$tfilename,100);
					imagejpeg($tmp,$mfilename,100);
					imagejpeg($tmp2,$ffilename,100);
									
					imagedestroy($src);
					imagedestroy($tmp);
					imagedestroy($tmp1);
					imagedestroy($tmp2);
			}
		}
	}	



if((($_FILES["larger"]["name"][$i])!=""))  
{
$queryImage1="insert into product_image(Product_mast_id,Large_image,Medium_image,Thumb_image) values('".$productid."','".$additional_full_photo."','".$additional_medium_photo."','".$additional_thumb_photo."')";
$resultImage1=mysql_query($queryImage1)
or die(mysql_error());
}

}
}
$image=$_POST["chkImage"];

for($i=0;$i< count($image);$i++)
{
	
	if($image[$i]!="")
	{
    $queryDel="delete from product_image where Image_id='".$image[$i]."'";
$resultDet=mysql_query($queryDel)
or die(mysql_error());
    }
}

header("location:disProduct.php");

}

///////////////  edit Product_image   ///////////////

if($_REQUEST["process"]=="editimage")
{

	$productid=$_POST["hdnProductid"];
	$imageid=$_POST["hdnImageid"];
	
 function getExtension($str) {
				 $i = strrpos($str,".");
				 if (!$i) { return ""; }
				 $l = strlen($str) - $i;
				 $ext = substr($str,$i+1,$l);
				 return $ext;
		 }
		 
if($_FILES["larger"]["name"]<>"" )
{
		 
		 
		$max_filesize = 2097152; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["larger"]["name"];
	
	
		
		$photo_title=$_FILES["larger"]["name"];
	    // echo "asd";
		$uploadedfile = $_FILES['larger']['tmp_name'];
		 
		if ($photo_title) 
		{
		
			$filename = stripslashes($_FILES['larger']['name']);
	
			$extension = getExtension($filename);
			
			$extension = strtolower($extension);
			
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				
				$error="Unkown Image Extension";					
			}		
			else
			{	
				if($_FILES["larger"]["size"] >= $max_filesize)
				{				  
				 	 $error="File size too large";				  				  
					 exit;
				}
				
				$size=filesize($_FILES['larger']['tmp_name']);
				//echo "s=".$size; 
				
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['larger']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);			
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['larger']['tmp_name'];
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
					
					$newwidth=365;
					$newheight=381;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					//$newwidth1=190;
					//$newheight1=200;//($height/$width)*$newwidth1;
					$newwidth1=72;
					$newheight1=72;//($height/$width)*$newwidth1;
					
					$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
	
					$tmp2=imagecreatetruecolor($width,$height);
	
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
					imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);
					imagecopyresampled($tmp2,$src,0,0,0,0,$width,$height,$width,$height);																								
					
					$b=$productid;
					
					$id=mysql_query("select * from product_image where Product_mast_id='".$productid."' and Image_id='".$imageid."'");
					$rowp=mysql_fetch_array($id);


					$f=explode(".", $rowp["Large_image"]);	
					$fid = $f[0];
					$m=explode(".", $rowp["Medium_image"]);	
					$mid = $m[0];
					$t=explode(".", $rowp["Thumb_image"]);	
					$tid = $t[0];
					

					$tfilename = "../photo/".$tid. "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p=$tid. "." . $extension;		
					$mfilename = "../photo/".$mid. "." . $extension ;
					$q=$mid. "." . $extension;	
					$ffilename = "../photo/".$fid. "." . $extension ;
					$r=$fid. "." . $extension;	
					//echo $ffilename."<br>";			
					$additional_thumb_photo = $p;
					$additional_medium_photo = $q;
					$additional_full_photo = $r;
																
					move_uploaded_file($_FILES['larger']["tmp_name"],$tfilename);
					move_uploaded_file($_FILES['larger']["tmp_name"],$mfilename); 
					move_uploaded_file($_FILES['larger']["tmp_name"],$ffilename); 
					
					imagejpeg($tmp1,$tfilename,100);
					imagejpeg($tmp,$mfilename,100);
					imagejpeg($tmp2,$ffilename,100);
									
					imagedestroy($src);
					imagedestroy($tmp);
					imagedestroy($tmp1);
					imagedestroy($tmp2);
			}
		}
	}	


if(($_FILES["larger"]["name"])!="")  
{
 $queryImage1="update product_image set Large_image='".$additional_full_photo."',Medium_image='".$additional_medium_photo."',Thumb_image='".$additional_thumb_photo."' where Image_id='".$imageid."'";
$resultImage1=mysql_query($queryImage1)
or die(mysql_error());
}

header("location:disProduct.php");
}
//////////////////////////  Delete  ///////////////////
					   

if($_REQUEST["process1"]=="delete1")
{
	$imageid=$_GET["Image_id"];
$productid=$_GET["Product_id"];
$query=mysql_query("delete from  product_image where Image_id='".$imageid."'");

header("location:viewProductImage.php?Product_id=".$productid."");
}

?>