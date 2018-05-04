<?php session_start(); ?>
<script language="javascript" type="text/javascript" src="admin/dropdown.js"></script>


<script type="text/javascript" >
function checkPno(frm)
{
	var obj=document.getElementById('txtpropno1');
  	var cname = frm.txtpropno.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Property no. is required!';		
   		frm.txtpropno.focus();
  	}
  	if (error)
	{
   	frm.txtpropno.focus();
   	obj.innerHTML=error;
   	return false;
  	}
	
  	return true;
 }
 function checkPname(frm)
{
	var obj=document.getElementById('txtpropname1');
  	var cname = frm.txtpropname.value;
	//var p = "_!@#$%^&*()+=-[]\';,./{}|\":<>?";
//  	var p =/^[a-z0-9]+[_.-]?[a-z0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Property name is required!';
   		frm.txtpropname.focus();
  	}  	
  	if (error)
	{
   	frm.txtpropname.focus();
   	obj.innerHTML=error;
   	return false;
  	}	
  	return true;
 }
 function checkPadd(frm)
{
	var obj=document.getElementById('txtpropadd1');
  	var cname = frm.txtpropname.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Property address is required!';
   		frm.txtpropadd.focus();
  	}
  	
   	if (error)
	{
   	frm.txtpropadd.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkProname(frm)
{
	var obj=document.getElementById('txtprojname1');
  	var cname = frm.txtprojname.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Project name is required!';
   		frm.txtprojname.focus();
  	}  	
  	if (error)
	{
   	frm.txtprojname.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkProdes(frm)
{
	var obj=document.getElementById('txtprojdesc1');
  	var cname = frm.txtprojdesc.value;
  //	var p = /^[a-z0-9]+[_.-]?[a-z0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Project description is required!';
   		frm.txtprojdesc.focus();
  	}
  	
  	if (error)
	{
   	frm.txtprojdesc.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 //function checkProurl(frm)
//{
//	var obj=document.getElementById('txtprojurl1');
//  	var cname = frm.txtprojurl.value;
//  //	var p = /^[a-z0-9]+[_.-]?[a-z0-9]+$/i;
//  	var error=false;
//  	obj.innerHTML='';
//  	if (cname == '') 
//	{
//   		error='Project URL is required!';
//   		frm.txtprojurl.focus();
//  	}
//  	
//  	if (error)
//	{
//   	frm.txtprojurl.focus();
//   	obj.innerHTML=error;
//   	return false;
//  	}
//  	return true;
// }
 function checkPername(frm)
{
	var obj=document.getElementById('txtpname1');
  	var cname = frm.txtpname.value;
  //var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Person name is required!';
   		frm.txtpname.focus();
  	}
  	if (error)
	{
   	frm.txtpname.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkCname(frm)
{
	var obj=document.getElementById('txtcname1');
  	var cname = frm.txtcname.value;  	
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Company name is required!';
   		frm.txtcname.focus();
  	}
  	if (error)
	{
   	frm.txtcname.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkCity(frm)
{
	var obj=document.getElementById('txtcity1');
  	var cname = frm.txtcity.value;
  	var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='City name is required!';
   		frm.txtcity.focus();
  	}
	else if (!p.test(cname))
	{
   error="Only letters are allowed";
  	}
  	
  	if (error)
	{
   	frm.txtcity.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkCadd(frm)
{
	var obj=document.getElementById('txtcadd1');
  	var cname = frm.txtcadd.value;
  //	var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Company address is required!';
   		frm.txtcadd.focus();
  	}
  	if (error)
	{
   	frm.txtcadd.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkCno(frm)
{
	var obj=document.getElementById('txtcontactno1');
  	var cname = frm.txtcontactno.value;
  	var p = /^[a-z0-9]+[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Company contact no is required!';
   		frm.txtcontactno.focus();
  	}
	else if (!p.test(cname))
	{
   		error="Only digits are allowed";
  	}
	else if (cname.length != 10) 
	{
    error="Contact should be 10 digits long";
  	}
  	if (error)
	{
   	frm.txtcontactno.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function validate() 
 {
 	var form = document.forms['frm'];
 	var ary=[checkPno,checkPname,checkPadd,checkProname,checkProdes,checkPername,checkCname,checkCity,checkCadd,checkCno];
 	var rtn=true;
 	var z0=0;
 	for (var z0=0;z0<ary.length;z0++)
	{
  		if (!ary[z0](form))
  		{
    		rtn=false;
  		}
 	}
 	return rtn;
}
</script>
<?php
$_SESSION['ddlcity'] = $_POST['ddlcity'];
	$_SESSION['ddlarea'] = $_POST['ddlarea'];
	$_SESSION['areacode'] = $_POST['areacode'];
	$_SESSION['ddlpost'] = $_POST['ddlpost'];
	$_SESSION['ddlptype'] = $_POST['ddlptype'];
	$_SESSION['ddlprop'] = $_POST['ddlprop'];
	$_SESSION['txtcovfrom'] = $_POST['txtcovfrom'];
	$_SESSION['txtcovto'] = $_POST['txtcovto'];
	$_SESSION['txtplotfrom'] = $_POST['txtplotfrom'];
	$_SESSION['txtplotto'] = $_POST['txtplotto'];
	$_SESSION['txtcarpetfrom'] = $_POST['txtcarpetfrom'];
	$_SESSION['txtcarpetto'] = $_POST['txtcarpetto'];
	$_SESSION['txtbudgetmin'] = $_POST['txtbudgetmin'];
	$_SESSION['txtbudgetmax'] = $_POST['txtbudgetmax'];
	$_SESSION['ddllocality'] = $_POST['ddllocality'];
	$_SESSION['txtamt'] = $_POST['txtamt'];
	$_SESSION['txtexrent'] = $_POST['txtexrent'];
	$_SESSION['txtexprice'] = $_POST['txtexprice'];
	$_SESSION['txttrent'] = $_POST['txttrent'];
	$_SESSION['txtprent'] = $_POST['txtprent'];
	$_SESSION['txtsreason'] = $_POST['txtsreason'];
	$_SESSION['ddltypeseller'] = $_POST['ddltypeseller'];
	$_SESSION['ddlbpurpose'] = $_POST['ddlbpurpose'];
	$_SESSION['txtuprop'] = $_POST['txtuprop'];
	$_SESSION['ddlbuytime'] = $_POST['ddlbuytime'];
	$_SESSION['ddlserbuy'] = $_POST['ddlserbuy'];
	$_SESSION['ddltransaction'] = $_POST['ddltransaction'];
	$_SESSION['ddlownership'] = $_POST['ddlownership'];
	$_SESSION['ddlpossession'] = $_POST['ddlpossession'];
	$_SESSION['ddlage'] = $_POST['ddlage'];
	$_SESSION['txtbedroom'] = $_POST['txtbedroom'];
	$_SESSION['txtbathroom'] = $_POST['txtbathroom'];
	$_SESSION['txtbalcony'] = $_POST['txtbalcony'];
	$_SESSION['txtfloorfrom'] = $_POST['txtfloorfrom'];
	$_SESSION['txtfloorto'] = $_POST['txtfloorto'];
	$_SESSION['txtbuilding'] = $_POST['txtbuilding'];
	$_SESSION['ddlffeature'] = $_POST['ddlffeature'];
	$_SESSION['ddlfloring'] = $_POST['ddlfloring'];
	$_SESSION['ddldfacing'] = $_POST['ddldfacing'];
	$_SESSION['ddlfacing'] = $_POST['ddlfacing'];
	$_SESSION['radio1'] = $_POST['radio1'];
	$_SESSION['ddlfurniture'] = $_POST['ddlfurniture'];
	$_SESSION['txtdisthigh'] = $_POST['txtdisthigh'];
	
	$_SESSION['room']=$_POST['room'];
	$_SESSION['ch']=$_POST['ch'];
	$_SESSION['txtprice']=$_POST['txtprice'];
	$_SESSION['txtcovrate']=$_POST['txtcovrate'];
	$_SESSION['txtcovamt']=$_POST['txtcovamt'];
	$_SESSION['txtplotrate']=$_POST['txtplotrate'];
	$_SESSION['txtplotamt']=$_POST['txtplotamt'];
	$_SESSION['txtcarpetrate']=$_POST['txtcarpetrate'];
	$_SESSION['txtcarpetamt']=$_POST['txtcarpetamt'];
	$_SESSION['ddltime']=$_POST['ddltime'];
	$_SESSION['ddldistance']=$_POST['ddldistance'];
	
	
	
	//for cover area radio button
	if($_POST['covarea'] == "SQ FT")
	{
		$_SESSION['radiocovarea'] = "SQ FT";
	}
	else if($_POST['covarea'] == "VAAR")
	{
		$_SESSION['radiocovarea'] = "VAAR";
	}
	else if($_POST['covarea'] == "VIGHA")
	{
		$_SESSION['radiocovarea'] = "VIGHA";
	}
	else if($_POST['covarea'] == "ACRE")
	{
		$_SESSION['radiocovarea'] = "ACRE";
	}
	else if($_POST['covarea'] == "SQ MT")
	{
		$_SESSION['radiocovarea'] = "SQ MT";
	}
	
	//for land area radio button
	if($_POST['plotarea'] == "SQ FT")
	{
		$_SESSION['radioplotarea'] = "SQ FT";
	}
	else if($_POST['plotarea'] == "VAAR")
	{
		$_SESSION['radioplotarea'] = "VAAR";
	}
	else if($_POST['plotarea'] == "VIGHA")
	{
		$_SESSION['radioplotarea'] = "VIGHA";
	}
	else if($_POST['plotarea'] == "ACRE")
	{
		$_SESSION['radioplotarea'] = "ACRE";
	}
	else if($_POST['plotarea'] == "SQ MT")
	{
		$_SESSION['radioplotarea'] = "SQ MT";
	}
	
	//for carpet area radio button
	if($_POST['carpetarea'] == "SQ FT")
	{
		$_SESSION['radiocarpetarea'] = "SQ FT";
	}
	else if($_POST['carpetarea'] == "VAAR")
	{
		$_SESSION['radiocarpetarea'] = "VAAR";
	}
	else if($_POST['carpetarea'] == "VIGHA")
	{
		$_SESSION['radiocarpetarea'] = "VIGHA";
	}
	else if($_POST['carpetarea'] == "ACRE")
	{
		$_SESSION['radiocarpetarea'] = "ACRE";
	}
	else if($_POST['carpetarea'] == "SQ MT")
	{
		$_SESSION['radiocarpetarea'] = "SQ MT";
	}
	
function getExtension($str) {
				 $i = strrpos($str,".");
				 if (!$i) { return ""; }
				 $l = strlen($str) - $i;
				 $ext = substr($str,$i+1,$l);
				 return $ext;
		 }	
	//for upload image...
	
if($_FILES["image"]["name"]<>"" )
{
		 
		 
		$max_filesize = 2097152; // Maximum filesize in BYTES (currently 0.9MB).
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
				 	 $error="File size too large";				  				 
					 exit;
				}					
					
					
					list($width,$height)=getimagesize($uploadedfile);
					
					$newwidth=500;
					$newheight=500;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
																									
					
					$id=mysql_query("select * from property_propertydetail_master order by property_propertydetail_id");
					$total=mysql_affected_rows();
					$b=$total+1;									

					$tfilename = "admin/uploadimages/property/add_p1_". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="add_p1_".$b . "." . $extension;		
					
					
					$_SESSION['image'] = $p;
					
																
					move_uploaded_file($_FILES['image']["tmp_name"],$tfilename);
					
					imagejpeg($tmp,$tfilename,100);
					
					imagedestroy($src);
					imagedestroy($tmp);
					
			}
		}
	}	
	
	
		
if($_FILES["image2"]["name"]<>"" )
{
		 
		 
		$max_filesize = 2097152; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["image2"]["name"] ;
	
	
		
		$photo_title=$_FILES["image2"]["name"];
	    // echo "asd";
		$uploadedfile = $_FILES['image2']['tmp_name'];
		 
		if ($photo_title) 
		{
		
			$filename = stripslashes($_FILES['image2']['name']);
	
			$extension = getExtension($filename);
			
			$extension = strtolower($extension);
			
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				
				$error="Unkown Image Extension";					
			}		
			else
			{	
				if($_FILES["image2"]["size"] >= $max_filesize)
				{				  
				 	 $error="File size too large";				  				  
					 exit;
				}
				
				$size=filesize($_FILES['image2']['tmp_name']);
				//echo "s=".$size; 
				
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['image2']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);			
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['image2']['tmp_name'];
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
					
					$newwidth=500;
					$newheight=500;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
																									
					
					$id=mysql_query("select * from property_propertydetail_master order by property_propertydetail_id");
					$total=mysql_affected_rows();
					$b=$total+1;									

					$tfilename = "admin/uploadimages/property/add_p2_". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="add_p2_".$b . "." . $extension;		
					
					
					$_SESSION['image2'] = $p;
					
																
					move_uploaded_file($_FILES['image2']["tmp_name"],$tfilename);
					
					imagejpeg($tmp,$tfilename,100);
					
					imagedestroy($src);
					imagedestroy($tmp);
					
			}
		}
	}	


		
if($_FILES["image3"]["name"]<>"" )
{
		 
		 
		$max_filesize = 2097152; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["image3"]["name"] ;
	
	
		
		$photo_title=$_FILES["image3"]["name"];
	    // echo "asd";
		$uploadedfile = $_FILES['image3']['tmp_name'];
		 
		if ($photo_title) 
		{
		
			$filename = stripslashes($_FILES['image3']['name']);
	
			$extension = getExtension($filename);
			
			$extension = strtolower($extension);
			
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				
				$error="Unkown Image Extension";					
			}		
			else
			{	
				if($_FILES["image3"]["size"] >= $max_filesize)
				{				  
				 	 $error="File size too large";				  				  
					 exit;
				}
				
				$size=filesize($_FILES['image3']['tmp_name']);
				//echo "s=".$size; 
				
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['image3']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);			
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['image3']['tmp_name'];
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
					
					$newwidth=500;
					$newheight=500;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
																									
					
					$id=mysql_query("select * from property_propertydetail_master order by property_propertydetail_id");
					$total=mysql_affected_rows();
					$b=$total+1;									

					$tfilename = "admin/uploadimages/property/add_p3_". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="add_p3_".$b . "." . $extension;		
					
					
					$_SESSION['image3'] = $p;
					
																
					move_uploaded_file($_FILES['image3']["tmp_name"],$tfilename);
					
					imagejpeg($tmp,$tfilename,100);
					
					imagedestroy($src);
					imagedestroy($tmp);
					
			}
		}
	}	



			
if($_FILES["image4"]["name"]<>"" )
{
		 
		 
		$max_filesize = 2097152; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["image4"]["name"] ;
	
	
		
		$photo_title=$_FILES["image4"]["name"];
	    // echo "asd";
		$uploadedfile = $_FILES['image4']['tmp_name'];
		 
		if ($photo_title) 
		{
		
			$filename = stripslashes($_FILES['image4']['name']);
	
			$extension = getExtension($filename);
			
			$extension = strtolower($extension);
			
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				
				$error="Unkown Image Extension";					
			}		
			else
			{	
				if($_FILES["image4"]["size"] >= $max_filesize)
				{				  
				 	 $error="File size too large";				  				  
					 exit;
				}
				
				$size=filesize($_FILES['image4']['tmp_name']);
				//echo "s=".$size; 
				
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['image4']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);			
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['image4']['tmp_name'];
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
					
					$newwidth=500;
					$newheight=500;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
																									
					
					$id=mysql_query("select * from property_propertydetail_master order by property_propertydetail_id");
					$total=mysql_affected_rows();
					$b=$total+1;									

					$tfilename = "admin/uploadimages/property/add_p4_". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="add_p4_".$b . "." . $extension;		
					
					
					$_SESSION['image4'] = $p;
					
																
					move_uploaded_file($_FILES['image4']["tmp_name"],$tfilename);
					
					imagejpeg($tmp,$tfilename,100);
					
					imagedestroy($src);
					imagedestroy($tmp);
					
			}
		}
	}	



			
if($_FILES["image5"]["name"]<>"" )
{
		 
		 
		$max_filesize = 2097152; // Maximum filesize in BYTES (currently 0.9MB).
		$path=$_FILES["image5"]["name"] ;
	
	
		
		$photo_title=$_FILES["image5"]["name"];
	    // echo "asd";
		$uploadedfile = $_FILES['image5']['tmp_name'];
		 
		if ($photo_title) 
		{
		
			$filename = stripslashes($_FILES['image5']['name']);
	
			$extension = getExtension($filename);
			
			$extension = strtolower($extension);
			
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{				
				$error="Unkown Image Extension";					
			}		
			else
			{	
				if($_FILES["image5"]["size"] >= $max_filesize)
				{				  
				 	 $error="File size too large";				  				  
					 exit;
				}
				
				$size=filesize($_FILES['image5']['tmp_name']);
				//echo "s=".$size; 
				
				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['image5']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);			
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['image5']['tmp_name'];
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
					
					$newwidth=500;
					$newheight=500;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
																									
					
					$id=mysql_query("select * from property_propertydetail_master order by property_propertydetail_id");
					$total=mysql_affected_rows();
					$b=$total+1;									

					$tfilename = "admin/uploadimages/property/add_p5_". $b . "." . $extension;
					//echo $_FILES['image']["tmp_name"]." ".$tfilename."<br>";
					$p="add_p5_".$b . "." . $extension;		
					
					
					$_SESSION['image5'] = $p;
					
																
					move_uploaded_file($_FILES['image5']["tmp_name"],$tfilename);
					
					imagejpeg($tmp,$tfilename,100);
					
					imagedestroy($src);
					imagedestroy($tmp);
					
			}
		}
	}	


?>

                 <table width="100%" border="0" cellpadding="0">
     
      <tr>
        <td bgcolor="#FFFFFF">
        
<form action="property_process.php" method="post" name="frm" id="frm" onsubmit="return validate();">
<?php
	$page = "Add";
						
?>
<table width="100%" border="0" cellspacing="5" cellpadding="0">
	<tr>
                            <td width="25%" class="title_red"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="25"><img src="images/arrow1.png" width="19" height="18"></td>
                                    <td class="title_red"><strong>Property Details</strong></td>
                                    </tr>
                                </table></td>            
                              
                                  
   </tr>
    <tr>
        <td>
        	<table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
          
          <tr>
          	<td colspan="3" class="black11">
            	<a href="home.php?pageno=24" class="black10" ><label name="step1" class="title_red" style="color:#666"><strong> Step 1 ||</strong></label></a>
                <a href="home.php?pageno=25" class="black10" ><label name="step2" class="title_red"> <strong>Step 2</strong></label></a>
            </td>
          </tr>
         
          <tr>
          	<td colspan="3" class="black11" align="left"><strong>Property/Project Details</strong></td>
          </tr>
         
        <tr>
           <td width="200" align="right" class="black9">Property No </td>
           <td width="10" align="center" class="black9">:</td>
           <td class="black9">
           		<input type="text" name="txtpropno" class="black9" size="40">             
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtpropno1" ></span></td>
        </tr>
        <tr>
           <td width="200" align="right" class="black9">Property Name </td>
           <td width="10" align="center" class="black9">:</td>
           <td class="black9">
           		<input type="text" name="txtpropname" class="black9" size="40" >              
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtpropname1"></span></td>
        </tr>
        <tr>
           <td width="200" align="right" class="black9">Property Address </td>
           <td width="10" align="center" class="black9">:</td>
           <td class="black9">
           		<textarea class="black9"  name="txtpropadd" rows="3" cols="37"> <?php echo $padd; ?></textarea>          
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtpropadd1"></span></td>
        </tr>
        <tr>
           <td width="200" align="right" class="black9">Project Name</td>
           <td width="10" align="center" class="black9">:</td>
           <td class="black9">
           		<input type="text" name="txtprojname" class="black9" size="40" >            
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtprojname1"></span></td>
        </tr>
        <tr>
           <td width="200" align="right" class="black9">Project Description </td>
           <td width="10" align="center" class="black9">:</td>
           <td class="black9">
           		<textarea class="black9"  name="txtprojdesc" rows="3" cols="37"><?php echo $pdes;?> </textarea>        
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtprojdesc1"></span></td>
        </tr>
        
         <tr>
           <td width="200" align="right" class="black9">Project Url </td>
           <td width="10" align="center" class="black9">:</td>
           <td class="black9">
           		<input type="text" name="txtprojurl" class="black9" size="40" >                 
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtprojurl1"></span></td>
        </tr>
       
        <tr>
          	<td colspan="3" class="black11" align="left"><strong>Contact Details</strong></td>
          </tr>
         
        <tr>
           <td width="200" align="right" class="black9">Person Name </td>
           <td width="10" align="center" class="black9">:</td>
           <td class="black9">
           		<input type="text" name="txtpname" class="black9" size="40" >             
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtpname1" ></span></td>
        </tr>
        <tr>
           <td width="200" align="right" class="black9">Company Name </td>
           <td width="10" align="center" class="black9">:</td>
           <td class="black9">
           		<input type="text" name="txtcname" class="black9" size="40">              
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtcname1"></span></td>
        </tr>
        <tr>
           <td width="200" align="right" class="black9">City</td>
           <td width="10" align="center" class="black9">:</td>
           <td class="black9">
           		<input type="text" name="txtcity" class="black9" size="40" >            
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtcity1"></span></td>
        </tr>
        <tr>
           <td width="200" align="right" class="black9">Company Address </td>
           <td width="10" align="center" class="black9">:</td>
           <td class="black9">
           		<textarea class="black9" name="txtcadd" rows="3" cols="37"> <?php echo $cadd; ?> </textarea>          
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtcadd1"></span></td>
        </tr>
        
        
        
         <tr>
           <td width="200" align="right" class="black9">Contact No </td>
           <td width="10" align="center" class="black9">:</td>
           <td class="black9">
           		<input type="text" name="txtcontactno" class="black9" size="40" maxlength="10">                 
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtcontactno1"></span></td>
        </tr>
              
        
   		<tr>
     		<td height="10" colspan="3" align="right" class="black9"></td>
        </tr>
     	<tr></tr>
   		<tr>
 			<td align="right" class="black9">&nbsp;</td>
      		<td align="center" class="black9">&nbsp;</td>
        	<td class="black9">
                <input name="add" type="submit" class="normal_fonts12_black" id="button4" style="width:80px; height:30px" value="Add" />
                            <a href="home.php?pageno=24"><input name="back" type="button" class="normal_fonts12_black" id="button4" style="width:80px; height:30px" value="Back" /></a>
            			
         
         
            </td>
       </tr>
       	<tr>
       		<td height="10" colspan="3" align="right" class="black9"></td>
   		</tr>
      </table>
     </td>
   </tr>
</table>
</form>
</td></tr></table>