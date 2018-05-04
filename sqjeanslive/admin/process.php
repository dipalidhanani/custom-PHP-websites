<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>
<?php
$now = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];

if($_REQUEST["process"]=="newmaterial")
{
	
	/*if($_FILES['materialimage']['tmp_name']!="")
	{
		
				if (($_FILES["materialimage"]["type"] == "image/gif")
				|| ($_FILES["materialimage"]["type"] == "image/png")
				|| ($_FILES["materialimage"]["type"] == "image/jpeg")
				|| ($_FILES["materialimage"]["type"] == "image/pjpeg"))				
				{
						$materialimage=time()."_".$_FILES['materialimage']['name'];														
						copy($_FILES['materialimage']['tmp_name'],"../images/materials/".$materialimage);					
				}
				
				if($_FILES["materialimage"]["type"]=='image/jpg' ||$_FILES["materialimage"]["type"]=='image/jpeg')
				{
					$image = imagecreatefromjpeg("../images/materials/".$materialimage);
				}
				else if($_FILES["materialimage"]["type"]=='image/gif')
				{
					$image = imagecreatefromgif("../images/materials/".$materialimage);
				}
				else if($_FILES["materialimage"]["type"]=='image/png')
				{
					$image = imagecreatefrompng("../images/materials/".$materialimage);
				}
				
				$width = imagesx($image);
				$height = imagesy($image);
		
				$twidth = 100;
				$theight = 100;
				
				$im = imagecreatetruecolor($twidth,$theight);
				imagecopyresampled($im,$image,0,0,0,0,$twidth,$theight,imagesx($image),imagesy($image));
	
				if($_FILES["materialimage"]["type"]=='image/jpg' ||$_FILES["materialimage"]["type"]=='image/jpeg')
				{
					imagejpeg($im,"../images/materials/"."m".$materialimage);
				}
				else if($_FILES["materialimage"]["type"]=='image/gif')
				{
					imagegif($im,"../images/materials/"."m".$materialimage);
				}
				else if($_FILES["materialimage"]["type"]=='image/png')
				{
					imagepng($im,"../images/materials/"."m".$materialimage);
				}
								
	}*/
	
	$query="insert into material_master (material_name,fabric_for,material_desc,material_available) values ('".$_REQUEST["materialname"]."','".$_REQUEST["fabric_for"]."','".$_REQUEST["materialdetails"]."','".$_REQUEST["materialavailable"]."')";
	mysql_query($query);

	header("Location:materials.php");
	exit();
}
if($_REQUEST["process"]=="editmaterial")
{		
	$query="update material_master set material_name='".$_REQUEST["materialname"]."',fabric_for='".$_REQUEST["fabric_for"]."',material_desc='".$_REQUEST["materialdetails"]."',material_available='".$_REQUEST["materialavailable"]."' where material_ID='".$_REQUEST["materialid"]."' ";
	mysql_query($query);

	header("Location:materials.php");
	exit();
}	
if($_REQUEST["process"]=="removematerial")
{
		$query="delete from material_master where material_ID='".$_REQUEST["materialid"]."'";
		mysql_query($query);
		
		header("Location:materials.php");
		exit();
}	
if($_REQUEST["process"]=="Change Order Men")
{
		
			$i=1;
			 $query="SELECT * FROM material_master order by material_name";			
			 $recordsetmaterial = mysql_query($query);
			 while($rowmaterial = mysql_fetch_array($recordsetmaterial,MYSQL_ASSOC))
			 {		
				 $queryupdate="update material_master set material_display_order_men='".$_REQUEST["materialdisplayordermen".$i]."' where material_ID='".$_REQUEST["materialdisplayorderid".$i]."'";
					mysql_query($queryupdate);
					$i++;
			}
		
		
		
		header("Location:materials.php");
		exit();
}
if($_REQUEST["process"]=="Change Order Women")
{
	
			$i=1;
			 $query="SELECT * FROM material_master order by material_name";			
			 $recordsetmaterial = mysql_query($query);
			 while($rowmaterial = mysql_fetch_array($recordsetmaterial,MYSQL_ASSOC))
			 {		
					$queryupdate="update material_master set material_display_order_women='".$_REQUEST["materialdisplayorderwomen".$i]."' where material_ID='".$_REQUEST["materialdisplayorderid".$i]."'";
					mysql_query($queryupdate);
					$i++;
			}
		
		
		
		header("Location:materials.php");
		exit();
}
if($_REQUEST["process"]=="newpocketstyle")
{
	
	if($_FILES['pocketstyle_image']['tmp_name']!="")
	{
		
				if (($_FILES["pocketstyle_image"]["type"] == "image/gif")
				|| ($_FILES["pocketstyle_image"]["type"] == "image/png")
				|| ($_FILES["pocketstyle_image"]["type"] == "image/jpeg")
				|| ($_FILES["pocketstyle_image"]["type"] == "image/pjpeg"))				
				{
						$pocketstyle_image=time()."_".$_FILES['pocketstyle_image']['name'];														
						copy($_FILES['pocketstyle_image']['tmp_name'],"../images/pocketstyles/".$pocketstyle_image);					
				}
				
				if($_FILES["pocketstyle_image"]["type"]=='image/jpg' ||$_FILES["pocketstyle_image"]["type"]=='image/jpeg')
				{
					$image = imagecreatefromjpeg("../images/pocketstyles/".$pocketstyle_image);
				}
				else if($_FILES["pocketstyle_image"]["type"]=='image/gif')
				{
					$image = imagecreatefromgif("../images/pocketstyles/".$pocketstyle_image);
				}
				else if($_FILES["pocketstyle_image"]["type"]=='image/png')
				{
					$image = imagecreatefrompng("../images/pocketstyles/".$pocketstyle_image);
				}
				
				$width = imagesx($image);
				$height = imagesy($image);
		
				$twidth = 100;
				$theight = 100;
				
				$im = imagecreatetruecolor($twidth,$theight);
				imagecopyresampled($im,$image,0,0,0,0,$twidth,$theight,imagesx($image),imagesy($image));
	
				if($_FILES["pocketstyle_image"]["type"]=='image/jpg' ||$_FILES["pocketstyle_image"]["type"]=='image/jpeg')
				{
					imagejpeg($im,"../images/pocketstyles/"."p".$pocketstyle_image);
				}
				else if($_FILES["pocketstyle_image"]["type"]=='image/gif')
				{
					imagegif($im,"../images/pocketstyles/"."p".$pocketstyle_image);
				}
				else if($_FILES["pocketstyle_image"]["type"]=='image/png')
				{
					imagepng($im,"../images/pocketstyles/"."p".$pocketstyle_image);
				}
								
	}
	
	$query="insert into pocket_style_master (pocket_style_name,pocket_style_desc,pocket_style_image,pocket_style_additional_charge,pocket_style_available,pocket_style_type) values ('".$_REQUEST["pocketstyle_name"]."','".$_REQUEST["pocketstyle_details"]."','".$pocketstyle_image."','".$_REQUEST["pocket_addtional_price"]."','".$_REQUEST["pocketstyle_available"]."','".$_REQUEST["type"]."')";
	mysql_query($query);

	header("Location:pocketstyles.php?type=".$_REQUEST["type"]);
	exit();
}
if($_REQUEST["process"]=="editpocketstyle")
{
	
	if($_FILES['pocketstyle_image']['tmp_name']!="")
	{
		
				if (($_FILES["pocketstyle_image"]["type"] == "image/gif")
				|| ($_FILES["pocketstyle_image"]["type"] == "image/png")
				|| ($_FILES["pocketstyle_image"]["type"] == "image/jpeg")
				|| ($_FILES["pocketstyle_image"]["type"] == "image/pjpeg"))				
				{
						$pocketstyle_image=time()."_".$_FILES['pocketstyle_image']['name'];														
						copy($_FILES['pocketstyle_image']['tmp_name'],"../images/pocketstyles/".$pocketstyle_image);					
				}
				
				if($_FILES["pocketstyle_image"]["type"]=='image/jpg' ||$_FILES["pocketstyle_image"]["type"]=='image/jpeg')
				{
					$image = imagecreatefromjpeg("../images/pocketstyles/".$pocketstyle_image);
				}
				else if($_FILES["pocketstyle_image"]["type"]=='image/gif')
				{
					$image = imagecreatefromgif("../images/pocketstyles/".$pocketstyle_image);
				}
				else if($_FILES["pocketstyle_image"]["type"]=='image/png')
				{
					$image = imagecreatefrompng("../images/pocketstyles/".$pocketstyle_image);
				}
				
				$width = imagesx($image);
				$height = imagesy($image);
		
				$twidth = 100;
				$theight = 100;
				
				$im = imagecreatetruecolor($twidth,$theight);
				imagecopyresampled($im,$image,0,0,0,0,$twidth,$theight,imagesx($image),imagesy($image));
	
				if($_FILES["pocketstyle_image"]["type"]=='image/jpg' ||$_FILES["pocketstyle_image"]["type"]=='image/jpeg')
				{
					imagejpeg($im,"../images/pocketstyles/"."p".$pocketstyle_image);
				}
				else if($_FILES["pocketstyle_image"]["type"]=='image/gif')
				{
					imagegif($im,"../images/pocketstyles/"."p".$pocketstyle_image);
				}
				else if($_FILES["pocketstyle_image"]["type"]=='image/png')
				{
					imagepng($im,"../images/pocketstyles/"."p".$pocketstyle_image);
				}
								
	}
	else
	{
		$pocketstyle_image=$_REQUEST["pocketstyle_imagemain"];
	}
	
	$query="update pocket_style_master set pocket_style_name='".$_REQUEST["pocketstyle_name"]."',pocket_style_desc='".$_REQUEST["pocketstyle_details"]."',pocket_style_image='".$pocketstyle_image."',pocket_style_additional_charge='".$_REQUEST["pocket_addtional_price"]."',pocket_style_available='".$_REQUEST["pocketstyle_available"]."',pocket_style_type='".$_REQUEST["type"]."' where pocket_style_ID='".$_REQUEST["pocketstyleid"]."'";
	mysql_query($query);

	header("Location:pocketstyles.php?type=".$_REQUEST["type"]);
	exit();
}
if($_REQUEST["process"]=="removepocketstyle")
{

	$query="delete from pocket_style_master where pocket_style_ID='".$_REQUEST["pocketstyleid"]."'";
	mysql_query($query);
	header("Location:pocketstyles.php?type=".$_REQUEST["type"]);
	exit();	
}
if($_REQUEST["process"]=="pocketstyleorder")
{

			$i=1;
			 $query="SELECT * FROM pocket_style_master where pocket_style_type='".$_REQUEST["type"]."'order by pocket_style_name";			
			 $recordsetpocket_style = mysql_query($query);
			 while($rowpocket_style = mysql_fetch_array($recordsetpocket_style,MYSQL_ASSOC))
			 {
			 	$queryupdate="update pocket_style_master set pocket_style_display_order='".$_REQUEST["pocketstyledisplayorder".$i]."' where pocket_style_ID='".$_REQUEST["pocketstyledisplayorderid".$i]."'";
				mysql_query($queryupdate);
				$i++;
			 }
	header("Location:pocketstyles.php?type=".$_REQUEST["type"]);
	exit();
}
if($_REQUEST["process"]=="newthread")
{
	
	if($_FILES['threadimage']['tmp_name']!="")
	{
		
				if (($_FILES["threadimage"]["type"] == "image/gif")
				|| ($_FILES["threadimage"]["type"] == "image/png")
				|| ($_FILES["threadimage"]["type"] == "image/jpeg")
				|| ($_FILES["threadimage"]["type"] == "image/pjpeg"))				
				{
						$threadimage=time()."_".$_FILES['threadimage']['name'];														
						copy($_FILES['threadimage']['tmp_name'],"../images/threads/".$threadimage);					
				}
				
				if($_FILES["threadimage"]["type"]=='image/jpg' ||$_FILES["threadimage"]["type"]=='image/jpeg')
				{
					$image = imagecreatefromjpeg("../images/threads/".$threadimage);
				}
				else if($_FILES["threadimage"]["type"]=='image/gif')
				{
					$image = imagecreatefromgif("../images/threads/".$threadimage);
				}
				else if($_FILES["threadimage"]["type"]=='image/png')
				{
					$image = imagecreatefrompng("../images/threads/".$threadimage);
				}
				
				$width = imagesx($image);
				$height = imagesy($image);
		
				$twidth = 100;
				$theight = 100;
				
				$im = imagecreatetruecolor($twidth,$theight);
				imagecopyresampled($im,$image,0,0,0,0,$twidth,$theight,imagesx($image),imagesy($image));
	
				if($_FILES["threadimage"]["type"]=='image/jpg' ||$_FILES["threadimage"]["type"]=='image/jpeg')
				{
					imagejpeg($im,"../images/threads/"."t".$threadimage);
				}
				else if($_FILES["threadimage"]["type"]=='image/gif')
				{
					imagegif($im,"../images/threads/"."t".$threadimage);
				}
				else if($_FILES["threadimage"]["type"]=='image/png')
				{
					imagepng($im,"../images/threads/"."t".$threadimage);
				}
								
	}
	
	$query="insert into thread_master (thread_name,thread_desc,thread_image,thread_available) values ('".$_REQUEST["threadname"]."','".$_REQUEST["threaddetails"]."','".$threadimage."','".$_REQUEST["threadavailable"]."')";
	mysql_query($query);

	header("Location:threads.php");
	exit();
}
if($_REQUEST["process"]=="editthread")
{
	if($_FILES['threadimage']['tmp_name']!="")
	{
		
				if (($_FILES["threadimage"]["type"] == "image/gif")
				|| ($_FILES["threadimage"]["type"] == "image/png")
				|| ($_FILES["threadimage"]["type"] == "image/jpeg")
				|| ($_FILES["threadimage"]["type"] == "image/pjpeg"))				
				{
						$threadimage=time()."_".$_FILES['threadimage']['name'];														
						copy($_FILES['threadimage']['tmp_name'],"../images/threads/".$threadimage);					
				}
				
				if($_FILES["threadimage"]["type"]=='image/jpg' ||$_FILES["threadimage"]["type"]=='image/jpeg')
				{
					$image = imagecreatefromjpeg("../images/threads/".$threadimage);
				}
				else if($_FILES["threadimage"]["type"]=='image/gif')
				{
					$image = imagecreatefromgif("../images/threads/".$threadimage);
				}
				else if($_FILES["threadimage"]["type"]=='image/png')
				{
					$image = imagecreatefrompng("../images/threads/".$threadimage);
				}
				
				$width = imagesx($image);
				$height = imagesy($image);
		
				$twidth = 100;
				$theight = 100;
				
				$im = imagecreatetruecolor($twidth,$theight);
				imagecopyresampled($im,$image,0,0,0,0,$twidth,$theight,imagesx($image),imagesy($image));
	
				if($_FILES["threadimage"]["type"]=='image/jpg' ||$_FILES["threadimage"]["type"]=='image/jpeg')
				{
					imagejpeg($im,"../images/threads/"."t".$threadimage);
				}
				else if($_FILES["threadimage"]["type"]=='image/gif')
				{
					imagegif($im,"../images/threads/"."t".$threadimage);
				}
				else if($_FILES["threadimage"]["type"]=='image/png')
				{
					imagepng($im,"../images/threads/"."t".$threadimage);
				}								
	}
	else
	{
			$threadimage=$_REQUEST["threadimage_main"];
	}
	
	$query="update thread_master set thread_name='".$_REQUEST["threadname"]."',thread_desc='".$_REQUEST["threaddetails"]."',thread_image='".$threadimage."',thread_available='".$_REQUEST["threadavailable"]."' where thread_ID='".$_REQUEST["threadid"]."' ";
	mysql_query($query);

	header("Location:threads.php");
	exit();
}	
if($_REQUEST["process"]=="removethread")
{
		$query="delete from thread_master where thread_ID='".$_REQUEST["threadid"]."'";
		mysql_query($query);
		
		header("Location:threads.php");
		exit();
}
if($_REQUEST["process"]=="threadorder")
{
		
			$i=1;
			 $query="SELECT * FROM thread_master order by thread_name";			
			 $recordsetthread = mysql_query($query);
			 while($rowthread = mysql_fetch_array($recordsetthread,MYSQL_ASSOC))
			 {		
					$queryupdate="update thread_master set thread_display_order='".$_REQUEST["threaddisplayorder".$i]."' where thread_ID='".$_REQUEST["threaddisplayorderid".$i]."'";
					mysql_query($queryupdate);
					$i++;
			}
		
		
		
		header("Location:threads.php");
		exit();
}
if($_REQUEST["process"]=="newspecialwash")
{
	
	if($_FILES['specialwash_image']['tmp_name']!="")
	{
		
				if (($_FILES["specialwash_image"]["type"] == "image/gif")
				|| ($_FILES["specialwash_image"]["type"] == "image/png")
				|| ($_FILES["specialwash_image"]["type"] == "image/jpeg")
				|| ($_FILES["specialwash_image"]["type"] == "image/pjpeg"))				
				{
						$specialwash_image=time()."_".$_FILES['specialwash_image']['name'];														
						copy($_FILES['specialwash_image']['tmp_name'],"../images/specialwash/".$specialwash_image);					
				}
				
				if($_FILES["specialwash_image"]["type"]=='image/jpg' ||$_FILES["specialwash_image"]["type"]=='image/jpeg')
				{
					$image = imagecreatefromjpeg("../images/specialwash/".$specialwash_image);
				}
				else if($_FILES["specialwash_image"]["type"]=='image/gif')
				{
					$image = imagecreatefromgif("../images/specialwash/".$specialwash_image);
				}
				else if($_FILES["specialwash_image"]["type"]=='image/png')
				{
					$image = imagecreatefrompng("../images/specialwash/".$specialwash_image);
				}
				
				$width = imagesx($image);
				$height = imagesy($image);
		
				$twidth = 100;
				$theight = 100;
				
				$im = imagecreatetruecolor($twidth,$theight);
				imagecopyresampled($im,$image,0,0,0,0,$twidth,$theight,imagesx($image),imagesy($image));
	
				if($_FILES["specialwash_image"]["type"]=='image/jpg' ||$_FILES["specialwash_image"]["type"]=='image/jpeg')
				{
					imagejpeg($im,"../images/specialwash/"."p".$specialwash_image);
				}
				else if($_FILES["specialwash_image"]["type"]=='image/gif')
				{
					imagegif($im,"../images/specialwash/"."p".$specialwash_image);
				}
				else if($_FILES["specialwash_image"]["type"]=='image/png')
				{
					imagepng($im,"../images/specialwash/"."p".$specialwash_image);
				}
								
	}
	
	$query="insert into special_wash_master (special_wash_name,special_wash_desc,special_wash_image,special_wash_additional_charge,special_wash_available) values ('".$_REQUEST["specialwash_name"]."','".$_REQUEST["specialwash_details"]."','".$specialwash_image."','".$_REQUEST["specialwash_addtional_price"]."','".$_REQUEST["specialwash_available"]."')";
	mysql_query($query);

	header("Location:specialwash.php");
	exit();
}
if($_REQUEST["process"]=="editspecialwash")
{
	
	if($_FILES['specialwash_image']['tmp_name']!="")
	{
		
				if (($_FILES["specialwash_image"]["type"] == "image/gif")
				|| ($_FILES["specialwash_image"]["type"] == "image/png")
				|| ($_FILES["specialwash_image"]["type"] == "image/jpeg")
				|| ($_FILES["specialwash_image"]["type"] == "image/pjpeg"))				
				{
						$specialwash_image=time()."_".$_FILES['specialwash_image']['name'];														
						copy($_FILES['specialwash_image']['tmp_name'],"../images/specialwash/".$specialwash_image);					
				}
				
				if($_FILES["specialwash_image"]["type"]=='image/jpg' ||$_FILES["specialwash_image"]["type"]=='image/jpeg')
				{
					$image = imagecreatefromjpeg("../images/specialwash/".$specialwash_image);
				}
				else if($_FILES["specialwash_image"]["type"]=='image/gif')
				{
					$image = imagecreatefromgif("../images/specialwash/".$specialwash_image);
				}
				else if($_FILES["specialwash_image"]["type"]=='image/png')
				{
					$image = imagecreatefrompng("../images/specialwash/".$specialwash_image);
				}
				
				$width = imagesx($image);
				$height = imagesy($image);
		
				$twidth = 100;
				$theight = 100;
				
				$im = imagecreatetruecolor($twidth,$theight);
				imagecopyresampled($im,$image,0,0,0,0,$twidth,$theight,imagesx($image),imagesy($image));
	
				if($_FILES["specialwash_image"]["type"]=='image/jpg' ||$_FILES["specialwash_image"]["type"]=='image/jpeg')
				{
					imagejpeg($im,"../images/specialwash/"."p".$specialwash_image);
				}
				else if($_FILES["specialwash_image"]["type"]=='image/gif')
				{
					imagegif($im,"../images/specialwash/"."p".$specialwash_image);
				}
				else if($_FILES["specialwash_image"]["type"]=='image/png')
				{
					imagepng($im,"../images/specialwash/"."p".$specialwash_image);
				}
								
	}
	else
	{
		$specialwash_image=$_REQUEST["specialwash_imagemain"];
	}
	
	$query="update special_wash_master set special_wash_name='".$_REQUEST["specialwash_name"]."',special_wash_desc='".$_REQUEST["specialwash_details"]."',special_wash_image='".$specialwash_image."',special_wash_additional_charge='".$_REQUEST["specialwash_addtional_price"]."',special_wash_available='".$_REQUEST["specialwash_available"]."' where special_wash_ID='".$_REQUEST["specialwashid"]."'";
	mysql_query($query);

	header("Location:specialwash.php");
	exit();
}
if($_REQUEST["process"]=="removespecialwash")
{

	$query="delete from special_wash_master where special_wash_ID='".$_REQUEST["specialwashid"]."'";
	mysql_query($query);
	header("Location:specialwash.php");
	exit();	
}
if($_REQUEST["process"]=="specialwashorder")
{
	
	 $i=1;
	 $query="SELECT * FROM special_wash_master order by special_wash_name";			
	 $recordsetspecial_wash = mysql_query($query);
	 while($rowspecial_wash = mysql_fetch_array($recordsetspecial_wash,MYSQL_ASSOC))
	 { 	
		
		$queryupdate="update special_wash_master set special_wash_display_order='".$_REQUEST["specialwashdisplayorder".$i]."' where special_wash_ID='".$_REQUEST["specialwashdisplayorderid".$i]."'";
		mysql_query($queryupdate);
		
		$i++;
	 }
	
	header("Location:specialwash.php");
	exit();	
}
if($_REQUEST["process"]=="newflystyle")
{
	
	if($_FILES['flystyle_image']['tmp_name']!="")
	{
		
				if (($_FILES["flystyle_image"]["type"] == "image/gif")
				|| ($_FILES["flystyle_image"]["type"] == "image/png")
				|| ($_FILES["flystyle_image"]["type"] == "image/jpeg")
				|| ($_FILES["flystyle_image"]["type"] == "image/pjpeg"))				
				{
						$flystyle_image=time()."_".$_FILES['flystyle_image']['name'];														
						copy($_FILES['flystyle_image']['tmp_name'],"../images/flystyles/".$flystyle_image);					
				}
				
				if($_FILES["flystyle_image"]["type"]=='image/jpg' ||$_FILES["flystyle_image"]["type"]=='image/jpeg')
				{
					$image = imagecreatefromjpeg("../images/flystyles/".$flystyle_image);
				}
				else if($_FILES["flystyle_image"]["type"]=='image/gif')
				{
					$image = imagecreatefromgif("../images/flystyles/".$flystyle_image);
				}
				else if($_FILES["flystyle_image"]["type"]=='image/png')
				{
					$image = imagecreatefrompng("../images/flystyles/".$flystyle_image);
				}
				
				$width = imagesx($image);
				$height = imagesy($image);
		
				$twidth = 100;
				$theight = 100;
				
				$im = imagecreatetruecolor($twidth,$theight);
				imagecopyresampled($im,$image,0,0,0,0,$twidth,$theight,imagesx($image),imagesy($image));
	
				if($_FILES["flystyle_image"]["type"]=='image/jpg' ||$_FILES["flystyle_image"]["type"]=='image/jpeg')
				{
					imagejpeg($im,"../images/flystyles/"."p".$flystyle_image);
				}
				else if($_FILES["flystyle_image"]["type"]=='image/gif')
				{
					imagegif($im,"../images/flystyles/"."p".$flystyle_image);
				}
				else if($_FILES["flystyle_image"]["type"]=='image/png')
				{
					imagepng($im,"../images/flystyles/"."p".$flystyle_image);
				}
								
	}
	
	$query="insert into fly_style_master (fly_style_name,fly_style_desc,fly_style_image,fly_style_additional_charge,fly_style_available) values ('".$_REQUEST["flystyle_name"]."','".$_REQUEST["flystyle_details"]."','".$flystyle_image."','".$_REQUEST["fly_addtional_price"]."','".$_REQUEST["flystyle_available"]."')";
	mysql_query($query);

	header("Location:flystyles.php");
	exit();
}
if($_REQUEST["process"]=="editflystyle")
{
	
	if($_FILES['flystyle_image']['tmp_name']!="")
	{
		
				if (($_FILES["flystyle_image"]["type"] == "image/gif")
				|| ($_FILES["flystyle_image"]["type"] == "image/png")
				|| ($_FILES["flystyle_image"]["type"] == "image/jpeg")
				|| ($_FILES["flystyle_image"]["type"] == "image/pjpeg"))				
				{
						$flystyle_image=time()."_".$_FILES['flystyle_image']['name'];														
						copy($_FILES['flystyle_image']['tmp_name'],"../images/flystyles/".$flystyle_image);					
				}
				
				if($_FILES["flystyle_image"]["type"]=='image/jpg' ||$_FILES["flystyle_image"]["type"]=='image/jpeg')
				{
					$image = imagecreatefromjpeg("../images/flystyles/".$flystyle_image);
				}
				else if($_FILES["flystyle_image"]["type"]=='image/gif')
				{
					$image = imagecreatefromgif("../images/flystyles/".$flystyle_image);
				}
				else if($_FILES["flystyle_image"]["type"]=='image/png')
				{
					$image = imagecreatefrompng("../images/flystyles/".$flystyle_image);
				}
				
				$width = imagesx($image);
				$height = imagesy($image);
		
				$twidth = 100;
				$theight = 100;
				
				$im = imagecreatetruecolor($twidth,$theight);
				imagecopyresampled($im,$image,0,0,0,0,$twidth,$theight,imagesx($image),imagesy($image));
	
				if($_FILES["flystyle_image"]["type"]=='image/jpg' ||$_FILES["flystyle_image"]["type"]=='image/jpeg')
				{
					imagejpeg($im,"../images/flystyles/"."p".$flystyle_image);
				}
				else if($_FILES["flystyle_image"]["type"]=='image/gif')
				{
					imagegif($im,"../images/flystyles/"."p".$flystyle_image);
				}
				else if($_FILES["flystyle_image"]["type"]=='image/png')
				{
					imagepng($im,"../images/flystyles/"."p".$flystyle_image);
				}
								
	}
	else
	{
		$flystyle_image=$_REQUEST["flystyle_imagemain"];
	}
	
	$query="update fly_style_master set fly_style_name='".$_REQUEST["flystyle_name"]."',fly_style_desc='".$_REQUEST["flystyle_details"]."',fly_style_image='".$flystyle_image."',fly_style_additional_charge='".$_REQUEST["fly_addtional_price"]."',fly_style_available='".$_REQUEST["flystyle_available"]."' where fly_style_ID='".$_REQUEST["flystyleid"]."'";
	mysql_query($query);

	header("Location:flystyles.php");
	exit();
}
if($_POST["flystyledefaultset"]=="Set Default")
{
	$query1="update fly_style_master set 
	fly_style_default=0";
	mysql_query($query1);
	
	
	 $queryupdate="update fly_style_master set 
	fly_style_default=1	
	where fly_style_ID='".$_REQUEST["flystyledefaultid"]."'";
		mysql_query($queryupdate);
		
	
	header("Location:flystyles.php");
	exit();
	}

if($_REQUEST["process"]=="removeflystyle")
{

	$query="delete from fly_style_master where fly_style_ID='".$_REQUEST["flystyleid"]."'";
	mysql_query($query);
	header("Location:flystyles.php");
	exit();	
}
if($_POST["flystyleorder"]=="Change Order")
{

	$i=1;
	$query="SELECT * FROM fly_style_master order by fly_style_name";			
	$recordsetfly_style = mysql_query($query);
	while($rowfly_style = mysql_fetch_array($recordsetfly_style,MYSQL_ASSOC))
	{
		$queryupdate="update fly_style_master set fly_style_order='".$_REQUEST["flystyledisplayorder".$i]."' where fly_style_ID='".$_REQUEST["flystyledisplayorderid".$i]."'";
		mysql_query($queryupdate);
		$i++;
    }
	
	header("Location:flystyles.php");
	exit();	
}
// belt style starts
if($_REQUEST["process"]=="newbeltstyle")
{
	
	if($_FILES['beltstyle_image']['tmp_name']!="")
	{
		
				if (($_FILES["beltstyle_image"]["type"] == "image/gif")
				|| ($_FILES["beltstyle_image"]["type"] == "image/png")
				|| ($_FILES["beltstyle_image"]["type"] == "image/jpeg")
				|| ($_FILES["beltstyle_image"]["type"] == "image/pjpeg"))				
				{
						$beltstyle_image=time()."_".$_FILES['beltstyle_image']['name'];														
						copy($_FILES['beltstyle_image']['tmp_name'],"../images/beltstyles/".$beltstyle_image);					
				}
				
				if($_FILES["beltstyle_image"]["type"]=='image/jpg' ||$_FILES["beltstyle_image"]["type"]=='image/jpeg')
				{
					$image = imagecreatefromjpeg("../images/beltstyles/".$beltstyle_image);
				}
				else if($_FILES["beltstyle_image"]["type"]=='image/gif')
				{
					$image = imagecreatefromgif("../images/beltstyles/".$beltstyle_image);
				}
				else if($_FILES["beltstyle_image"]["type"]=='image/png')
				{
					$image = imagecreatefrompng("../images/beltstyles/".$beltstyle_image);
				}
				
				$width = imagesx($image);
				$height = imagesy($image);
		
				$twidth = 100;
				$theight = 100;
				
				$im = imagecreatetruecolor($twidth,$theight);
				imagecopyresampled($im,$image,0,0,0,0,$twidth,$theight,imagesx($image),imagesy($image));
	
				if($_FILES["beltstyle_image"]["type"]=='image/jpg' ||$_FILES["beltstyle_image"]["type"]=='image/jpeg')
				{
					imagejpeg($im,"../images/beltstyles/"."p".$beltstyle_image);
				}
				else if($_FILES["beltstyle_image"]["type"]=='image/gif')
				{
					imagegif($im,"../images/beltstyles/"."p".$beltstyle_image);
				}
				else if($_FILES["beltstyle_image"]["type"]=='image/png')
				{
					imagepng($im,"../images/beltstyles/"."p".$beltstyle_image);
				}
								
	}
	
	$query="insert into belt_style_master (belt_style_name,belt_style_desc,belt_style_image,belt_style_additional_charge,belt_style_available) values ('".$_REQUEST["beltstyle_name"]."','".$_REQUEST["beltstyle_details"]."','".$beltstyle_image."','".$_REQUEST["belt_addtional_price"]."','".$_REQUEST["beltstyle_available"]."')";
	mysql_query($query);

	header("Location:beltstyles.php");
	exit();
}
if($_REQUEST["process"]=="editbeltstyle")
{
	
	if($_FILES['beltstyle_image']['tmp_name']!="")
	{
		
				if (($_FILES["beltstyle_image"]["type"] == "image/gif")
				|| ($_FILES["beltstyle_image"]["type"] == "image/png")
				|| ($_FILES["beltstyle_image"]["type"] == "image/jpeg")
				|| ($_FILES["beltstyle_image"]["type"] == "image/pjpeg"))				
				{
						$beltstyle_image=time()."_".$_FILES['beltstyle_image']['name'];														
						copy($_FILES['beltstyle_image']['tmp_name'],"../images/beltstyles/".$beltstyle_image);					
				}
				
				if($_FILES["beltstyle_image"]["type"]=='image/jpg' ||$_FILES["beltstyle_image"]["type"]=='image/jpeg')
				{
					$image = imagecreatefromjpeg("../images/beltstyles/".$beltstyle_image);
				}
				else if($_FILES["beltstyle_image"]["type"]=='image/gif')
				{
					$image = imagecreatefromgif("../images/beltstyles/".$beltstyle_image);
				}
				else if($_FILES["beltstyle_image"]["type"]=='image/png')
				{
					$image = imagecreatefrompng("../images/beltstyles/".$beltstyle_image);
				}
				
				$width = imagesx($image);
				$height = imagesy($image);
		
				$twidth = 100;
				$theight = 100;
				
				$im = imagecreatetruecolor($twidth,$theight);
				imagecopyresampled($im,$image,0,0,0,0,$twidth,$theight,imagesx($image),imagesy($image));
	
				if($_FILES["beltstyle_image"]["type"]=='image/jpg' ||$_FILES["beltstyle_image"]["type"]=='image/jpeg')
				{
					imagejpeg($im,"../images/beltstyles/"."p".$beltstyle_image);
				}
				else if($_FILES["beltstyle_image"]["type"]=='image/gif')
				{
					imagegif($im,"../images/beltstyles/"."p".$beltstyle_image);
				}
				else if($_FILES["beltstyle_image"]["type"]=='image/png')
				{
					imagepng($im,"../images/beltstyles/"."p".$beltstyle_image);
				}
								
	}
	else
	{
		$beltstyle_image=$_REQUEST["beltstyle_imagemain"];
	}
	
	$query="update belt_style_master set belt_style_name='".$_REQUEST["beltstyle_name"]."',belt_style_desc='".$_REQUEST["beltstyle_details"]."',belt_style_image='".$beltstyle_image."',belt_style_additional_charge='".$_REQUEST["belt_addtional_price"]."',belt_style_available='".$_REQUEST["beltstyle_available"]."' where belt_style_ID='".$_REQUEST["beltstyleid"]."'";
	mysql_query($query);

	header("Location:beltstyles.php");
	exit();
}
if($_POST["beltstyledefaultset"]=="Set Default")
{
	$query1="update belt_style_master set 
	belt_style_default=0";
	mysql_query($query1);
	
	
	 $queryupdate="update belt_style_master set 
	belt_style_default=1	
	where belt_style_ID='".$_REQUEST["beltstyledefaultid"]."'";
		mysql_query($queryupdate);
		
	
	header("Location:beltstyles.php");
	exit();
	}
if($_REQUEST["process"]=="removebeltstyle")
{

	$query="delete from belt_style_master where belt_style_ID='".$_REQUEST["beltstyleid"]."'";
	mysql_query($query);
	header("Location:beltstyles.php");
	exit();	
}
if($_POST["beltstyleorder"]=="Change Order")
{

	$i=1;
	$query="SELECT * FROM belt_style_master order by belt_style_name";			
	$recordsetbelt_style = mysql_query($query);
	while($rowbelt_style = mysql_fetch_array($recordsetbelt_style,MYSQL_ASSOC))
	{
		$queryupdate="update belt_style_master set belt_style_order='".$_REQUEST["beltstyledisplayorder".$i]."' where belt_style_ID='".$_REQUEST["beltstyledisplayorderid".$i]."'";
		mysql_query($queryupdate);
		$i++;
    }
	
	header("Location:beltstyles.php");
	exit();	
}

//belt style enda

// loops style starts

if($_REQUEST["process"]=="newloopsstyle")
{
	
	if($_FILES['loopsstyle_image']['tmp_name']!="")
	{
		
				if (($_FILES["loopsstyle_image"]["type"] == "image/gif")
				|| ($_FILES["loopsstyle_image"]["type"] == "image/png")
				|| ($_FILES["loopsstyle_image"]["type"] == "image/jpeg")
				|| ($_FILES["loopsstyle_image"]["type"] == "image/pjpeg"))				
				{
						$loopsstyle_image=time()."_".$_FILES['loopsstyle_image']['name'];														
						copy($_FILES['loopsstyle_image']['tmp_name'],"../images/loopsstyles/".$loopsstyle_image);					
				}
				
				if($_FILES["loopsstyle_image"]["type"]=='image/jpg' ||$_FILES["loopsstyle_image"]["type"]=='image/jpeg')
				{
					$image = imagecreatefromjpeg("../images/loopsstyles/".$loopsstyle_image);
				}
				else if($_FILES["loopsstyle_image"]["type"]=='image/gif')
				{
					$image = imagecreatefromgif("../images/loopsstyles/".$loopsstyle_image);
				}
				else if($_FILES["loopsstyle_image"]["type"]=='image/png')
				{
					$image = imagecreatefrompng("../images/loopsstyles/".$loopsstyle_image);
				}
				
				$width = imagesx($image);
				$height = imagesy($image);
		
				$twidth = 100;
				$theight = 100;
				
				$im = imagecreatetruecolor($twidth,$theight);
				imagecopyresampled($im,$image,0,0,0,0,$twidth,$theight,imagesx($image),imagesy($image));
	
				if($_FILES["loopsstyle_image"]["type"]=='image/jpg' ||$_FILES["loopsstyle_image"]["type"]=='image/jpeg')
				{
					imagejpeg($im,"../images/loopsstyles/"."p".$loopsstyle_image);
				}
				else if($_FILES["loopsstyle_image"]["type"]=='image/gif')
				{
					imagegif($im,"../images/loopsstyles/"."p".$loopsstyle_image);
				}
				else if($_FILES["loopsstyle_image"]["type"]=='image/png')
				{
					imagepng($im,"../images/loopsstyles/"."p".$loopsstyle_image);
				}
								
	}
	
	$query="insert into loops_style_master (loops_style_name,loops_style_desc,loops_style_image,loops_style_additional_charge,loops_style_available) values ('".$_REQUEST["loopsstyle_name"]."','".$_REQUEST["loopsstyle_details"]."','".$loopsstyle_image."','".$_REQUEST["loops_addtional_price"]."','".$_REQUEST["loopsstyle_available"]."')";
	mysql_query($query);

	header("Location:loopsstyles.php");
	exit();
}
if($_REQUEST["process"]=="editloopsstyle")
{
	
	if($_FILES['loopsstyle_image']['tmp_name']!="")
	{
		
				if (($_FILES["loopsstyle_image"]["type"] == "image/gif")
				|| ($_FILES["loopsstyle_image"]["type"] == "image/png")
				|| ($_FILES["loopsstyle_image"]["type"] == "image/jpeg")
				|| ($_FILES["loopsstyle_image"]["type"] == "image/pjpeg"))				
				{
						$loopsstyle_image=time()."_".$_FILES['loopsstyle_image']['name'];														
						copy($_FILES['loopsstyle_image']['tmp_name'],"../images/loopsstyles/".$loopsstyle_image);					
				}
				
				if($_FILES["loopsstyle_image"]["type"]=='image/jpg' ||$_FILES["loopsstyle_image"]["type"]=='image/jpeg')
				{
					$image = imagecreatefromjpeg("../images/loopsstyles/".$loopsstyle_image);
				}
				else if($_FILES["loopsstyle_image"]["type"]=='image/gif')
				{
					$image = imagecreatefromgif("../images/loopsstyles/".$loopsstyle_image);
				}
				else if($_FILES["loopsstyle_image"]["type"]=='image/png')
				{
					$image = imagecreatefrompng("../images/loopsstyles/".$loopsstyle_image);
				}
				
				$width = imagesx($image);
				$height = imagesy($image);
		
				$twidth = 100;
				$theight = 100;
				
				$im = imagecreatetruecolor($twidth,$theight);
				imagecopyresampled($im,$image,0,0,0,0,$twidth,$theight,imagesx($image),imagesy($image));
	
				if($_FILES["loopsstyle_image"]["type"]=='image/jpg' ||$_FILES["loopsstyle_image"]["type"]=='image/jpeg')
				{
					imagejpeg($im,"../images/loopsstyles/"."p".$loopsstyle_image);
				}
				else if($_FILES["loopsstyle_image"]["type"]=='image/gif')
				{
					imagegif($im,"../images/loopsstyles/"."p".$loopsstyle_image);
				}
				else if($_FILES["loopsstyle_image"]["type"]=='image/png')
				{
					imagepng($im,"../images/loopsstyles/"."p".$loopsstyle_image);
				}
								
	}
	else
	{
		$loopsstyle_image=$_REQUEST["loopsstyle_imagemain"];
	}
	
	$query="update loops_style_master set loops_style_name='".$_REQUEST["loopsstyle_name"]."',loops_style_desc='".$_REQUEST["loopsstyle_details"]."',loops_style_image='".$loopsstyle_image."',loops_style_additional_charge='".$_REQUEST["loops_addtional_price"]."',loops_style_available='".$_REQUEST["loopsstyle_available"]."' where loops_style_ID='".$_REQUEST["loopsstyleid"]."'";
	mysql_query($query);

	header("Location:loopsstyles.php");
	exit();
}
if($_POST["loopsstyledefaultset"]=="Set Default")
{
	$query1="update loops_style_master set 
	loops_style_default=0";
	mysql_query($query1);
	
	
	 $queryupdate="update loops_style_master set 
	loops_style_default=1	
	where loops_style_ID='".$_REQUEST["loopsstyledefaultid"]."'";
		mysql_query($queryupdate);
		
	
	header("Location:loopsstyles.php");
	exit();
	}
if($_REQUEST["process"]=="removeloopsstyle")
{

	$query="delete from loops_style_master where loops_style_ID='".$_REQUEST["loopsstyleid"]."'";
	mysql_query($query);
	header("Location:loopsstyles.php");
	exit();	
}
if($_POST["loopsstyleorder"]=="Change Order")
{

	$i=1;
	$query="SELECT * FROM loops_style_master order by loops_style_name";			
	$recordsetloops_style = mysql_query($query);
	while($rowloops_style = mysql_fetch_array($recordsetloops_style,MYSQL_ASSOC))
	{
		$queryupdate="update loops_style_master set loops_style_order='".$_REQUEST["loopsstyledisplayorder".$i]."' where loops_style_ID='".$_REQUEST["loopsstyledisplayorderid".$i]."'";
		mysql_query($queryupdate);
		$i++;
    }
	
	header("Location:loopsstyles.php");
	exit();	
}
// loops style ends
// embroidery style starts

if($_REQUEST["process"]=="newembroiderystyle")
{
	
	if($_FILES['embroiderystyle_image']['tmp_name']!="")
	{
		
				if (($_FILES["embroiderystyle_image"]["type"] == "image/gif")
				|| ($_FILES["embroiderystyle_image"]["type"] == "image/png")
				|| ($_FILES["embroiderystyle_image"]["type"] == "image/jpeg")
				|| ($_FILES["embroiderystyle_image"]["type"] == "image/pjpeg"))				
				{
						$embroiderystyle_image=time()."_".$_FILES['embroiderystyle_image']['name'];														
						copy($_FILES['embroiderystyle_image']['tmp_name'],"../images/embroiderystyles/".$embroiderystyle_image);					
				}
				
				if($_FILES["embroiderystyle_image"]["type"]=='image/jpg' ||$_FILES["embroiderystyle_image"]["type"]=='image/jpeg')
				{
					$image = imagecreatefromjpeg("../images/embroiderystyles/".$embroiderystyle_image);
				}
				else if($_FILES["embroiderystyle_image"]["type"]=='image/gif')
				{
					$image = imagecreatefromgif("../images/embroiderystyles/".$embroiderystyle_image);
				}
				else if($_FILES["embroiderystyle_image"]["type"]=='image/png')
				{
					$image = imagecreatefrompng("../images/embroiderystyles/".$embroiderystyle_image);
				}
				
				$width = imagesx($image);
				$height = imagesy($image);
		
				$twidth = 100;
				$theight = 100;
				
				$im = imagecreatetruecolor($twidth,$theight);
				imagecopyresampled($im,$image,0,0,0,0,$twidth,$theight,imagesx($image),imagesy($image));
	
				if($_FILES["embroiderystyle_image"]["type"]=='image/jpg' ||$_FILES["embroiderystyle_image"]["type"]=='image/jpeg')
				{
					imagejpeg($im,"../images/embroiderystyles/"."p".$embroiderystyle_image);
				}
				else if($_FILES["embroiderystyle_image"]["type"]=='image/gif')
				{
					imagegif($im,"../images/embroiderystyles/"."p".$embroiderystyle_image);
				}
				else if($_FILES["embroiderystyle_image"]["type"]=='image/png')
				{
					imagepng($im,"../images/embroiderystyles/"."p".$embroiderystyle_image);
				}
								
	}
	
	$query="insert into embroidery_style_master (embroidery_style_name,embroidery_style_desc,embroidery_style_image,embroidery_style_additional_charge,embroidery_style_available) values ('".$_REQUEST["embroiderystyle_name"]."','".$_REQUEST["embroiderystyle_details"]."','".$embroiderystyle_image."','".$_REQUEST["embroidery_addtional_price"]."','".$_REQUEST["embroiderystyle_available"]."')";
	mysql_query($query);

	header("Location:embroiderystyles.php");
	exit();
}
if($_REQUEST["process"]=="editembroiderystyle")
{
	
	if($_FILES['embroiderystyle_image']['tmp_name']!="")
	{
		
				if (($_FILES["embroiderystyle_image"]["type"] == "image/gif")
				|| ($_FILES["embroiderystyle_image"]["type"] == "image/png")
				|| ($_FILES["embroiderystyle_image"]["type"] == "image/jpeg")
				|| ($_FILES["embroiderystyle_image"]["type"] == "image/pjpeg"))				
				{
						$embroiderystyle_image=time()."_".$_FILES['embroiderystyle_image']['name'];														
						copy($_FILES['embroiderystyle_image']['tmp_name'],"../images/embroiderystyles/".$embroiderystyle_image);					
				}
				
				if($_FILES["embroiderystyle_image"]["type"]=='image/jpg' ||$_FILES["embroiderystyle_image"]["type"]=='image/jpeg')
				{
					$image = imagecreatefromjpeg("../images/embroiderystyles/".$embroiderystyle_image);
				}
				else if($_FILES["embroiderystyle_image"]["type"]=='image/gif')
				{
					$image = imagecreatefromgif("../images/embroiderystyles/".$embroiderystyle_image);
				}
				else if($_FILES["embroiderystyle_image"]["type"]=='image/png')
				{
					$image = imagecreatefrompng("../images/embroiderystyles/".$embroiderystyle_image);
				}
				
				$width = imagesx($image);
				$height = imagesy($image);
		
				$twidth = 100;
				$theight = 100;
				
				$im = imagecreatetruecolor($twidth,$theight);
				imagecopyresampled($im,$image,0,0,0,0,$twidth,$theight,imagesx($image),imagesy($image));
	
				if($_FILES["embroiderystyle_image"]["type"]=='image/jpg' ||$_FILES["embroiderystyle_image"]["type"]=='image/jpeg')
				{
					imagejpeg($im,"../images/embroiderystyles/"."p".$embroiderystyle_image);
				}
				else if($_FILES["embroiderystyle_image"]["type"]=='image/gif')
				{
					imagegif($im,"../images/embroiderystyles/"."p".$embroiderystyle_image);
				}
				else if($_FILES["embroiderystyle_image"]["type"]=='image/png')
				{
					imagepng($im,"../images/embroiderystyles/"."p".$embroiderystyle_image);
				}
								
	}
	else
	{
		$embroiderystyle_image=$_REQUEST["embroiderystyle_imagemain"];
	}
	
	$query="update embroidery_style_master set embroidery_style_name='".$_REQUEST["embroiderystyle_name"]."',embroidery_style_desc='".$_REQUEST["embroiderystyle_details"]."',embroidery_style_image='".$embroiderystyle_image."',embroidery_style_additional_charge='".$_REQUEST["embroidery_addtional_price"]."',embroidery_style_available='".$_REQUEST["embroiderystyle_available"]."' where embroidery_style_ID='".$_REQUEST["embroiderystyleid"]."'";
	mysql_query($query);

	header("Location:embroiderystyles.php");
	exit();
}
if($_POST["embroiderystyledefaultset"]=="Set Defaul")
{
	$query1="update embroidery_style_master set 
	embroidery_style_default=0";
	mysql_query($query1);
	
	
	 $queryupdate="update embroidery_style_master set 
	embroidery_style_default=1	
	where embroidery_style_ID='".$_REQUEST["embroiderystyledefaultid"]."'";
		mysql_query($queryupdate);
		
	
	header("Location:embroiderystyles.php");
	exit();
	}
if($_REQUEST["process"]=="removeembroiderystyle")
{

	$query="delete from embroidery_style_master where embroidery_style_ID='".$_REQUEST["embroiderystyleid"]."'";
	mysql_query($query);
	header("Location:embroiderystyles.php");
	exit();	
}
if($_POST["embroiderystyleorder"]=="Change Order")
{

	$i=1;
	$query="SELECT * FROM embroidery_style_master order by embroidery_style_name";			
	$recordsetembroidery_style = mysql_query($query);
	while($rowembroidery_style = mysql_fetch_array($recordsetembroidery_style,MYSQL_ASSOC))
	{
		$queryupdate="update embroidery_style_master set embroidery_style_order='".$_REQUEST["embroiderystyledisplayorder".$i]."' where embroidery_style_ID='".$_REQUEST["embroiderystyledisplayorderid".$i]."'";
		mysql_query($queryupdate);
		$i++;
    }
	
	header("Location:embroiderystyles.php");
	exit();	
}

// embroidery style ends

if($_REQUEST["process"]=="newwashtreatment")
{
	
	if($_FILES['washtreatment_image']['tmp_name']!="")
	{
		
				if (($_FILES["washtreatment_image"]["type"] == "image/gif")
				|| ($_FILES["washtreatment_image"]["type"] == "image/png")
				|| ($_FILES["washtreatment_image"]["type"] == "image/jpeg")
				|| ($_FILES["washtreatment_image"]["type"] == "image/pjpeg"))				
				{
						$washtreatment_image=time()."_".$_FILES['washtreatment_image']['name'];														
						copy($_FILES['washtreatment_image']['tmp_name'],"../images/washtreatments/".$washtreatment_image);					
				}
				
				if($_FILES["washtreatment_image"]["type"]=='image/jpg' ||$_FILES["washtreatment_image"]["type"]=='image/jpeg')
				{
					$image = imagecreatefromjpeg("../images/washtreatments/".$washtreatment_image);
				}
				else if($_FILES["washtreatment_image"]["type"]=='image/gif')
				{
					$image = imagecreatefromgif("../images/washtreatments/".$washtreatment_image);
				}
				else if($_FILES["washtreatment_image"]["type"]=='image/png')
				{
					$image = imagecreatefrompng("../images/washtreatments/".$washtreatment_image);
				}
				
				$width = imagesx($image);
				$height = imagesy($image);
		
				$twidth = 100;
				$theight = 100;
				
				$im = imagecreatetruecolor($twidth,$theight);
				imagecopyresampled($im,$image,0,0,0,0,$twidth,$theight,imagesx($image),imagesy($image));
	
				if($_FILES["washtreatment_image"]["type"]=='image/jpg' ||$_FILES["washtreatment_image"]["type"]=='image/jpeg')
				{
					imagejpeg($im,"../images/washtreatments/"."wt".$washtreatment_image);
				}
				else if($_FILES["washtreatment_image"]["type"]=='image/gif')
				{
					imagegif($im,"../images/washtreatments/"."wt".$washtreatment_image);
				}
				else if($_FILES["washtreatment_image"]["type"]=='image/png')
				{
					imagepng($im,"../images/washtreatments/"."wt".$washtreatment_image);
				}
								
	}
	
	$query="insert into material_wash_treatment_relation (material_master_ID,wash_treatment_master_ID,wash_treatment_description,wash_treatment_image,wash_treatment_price,wash_treatment_available) values ('".$_REQUEST["materialid"]."','".$_REQUEST["washtreatment"]."','".$_REQUEST["washtreatment_details"]."','".$washtreatment_image."','".$_REQUEST["washtreatment_price"]."','".$_REQUEST["washtreatment_available"]."')";
	mysql_query($query);

	header("Location:washtreatment.php?materialid=".$_REQUEST["materialid"]);
	exit();
}
if($_REQUEST["process"]=="editwashtreatment")
{
	
	if($_FILES['washtreatment_image']['tmp_name']!="")
	{
		
				if (($_FILES["washtreatment_image"]["type"] == "image/gif")
				|| ($_FILES["washtreatment_image"]["type"] == "image/png")
				|| ($_FILES["washtreatment_image"]["type"] == "image/jpeg")
				|| ($_FILES["washtreatment_image"]["type"] == "image/pjpeg"))				
				{
						$washtreatment_image=time()."_".$_FILES['washtreatment_image']['name'];														
						copy($_FILES['washtreatment_image']['tmp_name'],"../images/washtreatments/".$washtreatment_image);					
				}
				
				if($_FILES["washtreatment_image"]["type"]=='image/jpg' ||$_FILES["washtreatment_image"]["type"]=='image/jpeg')
				{
					$image = imagecreatefromjpeg("../images/washtreatments/".$washtreatment_image);
				}
				else if($_FILES["washtreatment_image"]["type"]=='image/gif')
				{
					$image = imagecreatefromgif("../images/washtreatments/".$washtreatment_image);
				}
				else if($_FILES["washtreatment_image"]["type"]=='image/png')
				{
					$image = imagecreatefrompng("../images/washtreatments/".$washtreatment_image);
				}
				
				$width = imagesx($image);
				$height = imagesy($image);
		
				$twidth = 100;
				$theight = 100;
				
				$im = imagecreatetruecolor($twidth,$theight);
				imagecopyresampled($im,$image,0,0,0,0,$twidth,$theight,imagesx($image),imagesy($image));
	
				if($_FILES["washtreatment_image"]["type"]=='image/jpg' ||$_FILES["washtreatment_image"]["type"]=='image/jpeg')
				{
					imagejpeg($im,"../images/washtreatments/"."wt".$washtreatment_image);
				}
				else if($_FILES["washtreatment_image"]["type"]=='image/gif')
				{
					imagegif($im,"../images/washtreatments/"."wt".$washtreatment_image);
				}
				else if($_FILES["washtreatment_image"]["type"]=='image/png')
				{
					imagepng($im,"../images/washtreatments/"."wt".$washtreatment_image);
				}
								
	}
	else
	{
		$washtreatment_image=$_REQUEST["washtreatment_imagemain"];
	}
	
	$query="update material_wash_treatment_relation set material_master_ID='".$_REQUEST["materialid"]."',wash_treatment_master_ID='".$_REQUEST["washtreatment"]."',wash_treatment_description='".$_REQUEST["washtreatment_details"]."',wash_treatment_image='".$washtreatment_image."',wash_treatment_price='".$_REQUEST["washtreatment_price"]."',wash_treatment_available='".$_REQUEST["washtreatment_available"]."' where mw_realtion_ID='".$_REQUEST["washtreatmentid"]."'";
	mysql_query($query);

	header("Location:washtreatment.php?materialid=".$_REQUEST["materialid"]);
	exit();
}
if($_REQUEST["process"]=="removewashtreatment")
{

	$query="delete from material_wash_treatment_relation where mw_realtion_ID='".$_REQUEST["washtreatmentid"]."'";
	mysql_query($query);
	header("Location:washtreatment.php?materialid=".$_REQUEST["materialid"]);
	exit();	
}
if($_REQUEST["process"]=="newmeasurement")
{
	
	if($_FILES['measurementimage']['tmp_name']!="")
	{
		
				if (($_FILES["measurementimage"]["type"] == "image/gif")
				|| ($_FILES["measurementimage"]["type"] == "image/png")
				|| ($_FILES["measurementimage"]["type"] == "image/jpeg")
				|| ($_FILES["measurementimage"]["type"] == "image/pjpeg"))				
				{
						$measurementimage=time()."_".$_FILES['measurementimage']['name'];														
						copy($_FILES['measurementimage']['tmp_name'],"../images/measurement/makemyjeans/".$measurementimage);					
				}
				
				if($_FILES["measurementimage"]["type"]=='image/jpg' ||$_FILES["measurementimage"]["type"]=='image/jpeg')
				{
					$image = imagecreatefromjpeg("../images/measurement/makemyjeans/".$measurementimage);
				}
				else if($_FILES["measurementimage"]["type"]=='image/gif')
				{
					$image = imagecreatefromgif("../images/measurement/makemyjeans/".$measurementimage);
				}
				else if($_FILES["measurementimage"]["type"]=='image/png')
				{
					$image = imagecreatefrompng("../images/measurement/makemyjeans/".$measurementimage);
				}
				
				$width = imagesx($image);
				$height = imagesy($image);
		
				$twidth = 100;
				$theight = 100;
				
				$im = imagecreatetruecolor($twidth,$theight);
				imagecopyresampled($im,$image,0,0,0,0,$twidth,$theight,imagesx($image),imagesy($image));
	
				if($_FILES["measurementimage"]["type"]=='image/jpg' ||$_FILES["measurementimage"]["type"]=='image/jpeg')
				{
					imagejpeg($im,"../images/measurement/makemyjeans/"."m".$measurementimage);
				}
				else if($_FILES["measurementimage"]["type"]=='image/gif')
				{
					imagegif($im,"../images/measurement/makemyjeans/"."m".$measurementimage);
				}
				else if($_FILES["measurementimage"]["type"]=='image/png')
				{
					imagepng($im,"../images/measurement/makemyjeans/"."m".$measurementimage);
				}								
	}
	
	if($_FILES['copy_measurementimage']['tmp_name']!="")
	{
		
				if (($_FILES["copy_measurementimage"]["type"] == "image/gif")
				|| ($_FILES["copy_measurementimage"]["type"] == "image/png")
				|| ($_FILES["copy_measurementimage"]["type"] == "image/jpeg")
				|| ($_FILES["copy_measurementimage"]["type"] == "image/pjpeg"))				
				{
						$copy_measurementimage=time()."_".$_FILES['copy_measurementimage']['name'];														
						copy($_FILES['copy_measurementimage']['tmp_name'],"../images/measurement/copyajeans/".$copy_measurementimage);					
				}
				
				if($_FILES["copy_measurementimage"]["type"]=='image/jpg' ||$_FILES["copy_measurementimage"]["type"]=='image/jpeg')
				{
					$image = imagecreatefromjpeg("../images/measurement/copyajeans/".$copy_measurementimage);
				}
				else if($_FILES["copy_measurementimage"]["type"]=='image/gif')
				{
					$image = imagecreatefromgif("../images/measurement/copyajeans/".$copy_measurementimage);
				}
				else if($_FILES["copy_measurementimage"]["type"]=='image/png')
				{
					$image = imagecreatefrompng("../images/measurement/copyajeans/".$copy_measurementimage);
				}
				
				$width = imagesx($image);
				$height = imagesy($image);
		
				$twidth = 100;
				$theight = 100;
				
				$im = imagecreatetruecolor($twidth,$theight);
				imagecopyresampled($im,$image,0,0,0,0,$twidth,$theight,imagesx($image),imagesy($image));
	
				if($_FILES["copy_measurementimage"]["type"]=='image/jpg' ||$_FILES["copy_measurementimage"]["type"]=='image/jpeg')
				{
					imagejpeg($im,"../images/measurement/copyajeans/"."m".$copy_measurementimage);
				}
				else if($_FILES["copy_measurementimage"]["type"]=='image/gif')
				{
					imagegif($im,"../images/measurement/copyajeans/"."m".$copy_measurementimage);
				}
				else if($_FILES["copy_measurementimage"]["type"]=='image/png')
				{
					imagepng($im,"../images/measurement/copyajeans/"."m".$copy_measurementimage);
				}								
	}
	
	$query="insert into measurement_master (measurement_name,measurement_make_desc,measurement_make_image,measurement_copy_desc,measurement_copy_image,measurement_available) values ('".$_REQUEST["measurementname"]."','".$_REQUEST["measurementdetails"]."','".$measurementimage."','".$_REQUEST["copy_measurementdetails"]."','".$copy_measurementimage."','".$_REQUEST["measurementavailable"]."')";
	mysql_query($query);

	header("Location:measurement.php");
	exit();
}
if($_REQUEST["process"]=="editmeasurement")
{		
	
		if($_FILES['measurementimage']['tmp_name']!="")
	{
		
				if (($_FILES["measurementimage"]["type"] == "image/gif")
				|| ($_FILES["measurementimage"]["type"] == "image/png")
				|| ($_FILES["measurementimage"]["type"] == "image/jpeg")
				|| ($_FILES["measurementimage"]["type"] == "image/pjpeg"))				
				{
						$measurementimage=time()."_".$_FILES['measurementimage']['name'];														
						copy($_FILES['measurementimage']['tmp_name'],"../images/measurement/makemyjeans/".$measurementimage);					
				}
				
				if($_FILES["measurementimage"]["type"]=='image/jpg' ||$_FILES["measurementimage"]["type"]=='image/jpeg')
				{
					$image = imagecreatefromjpeg("../images/measurement/makemyjeans/".$measurementimage);
				}
				else if($_FILES["measurementimage"]["type"]=='image/gif')
				{
					$image = imagecreatefromgif("../images/measurement/makemyjeans/".$measurementimage);
				}
				else if($_FILES["measurementimage"]["type"]=='image/png')
				{
					$image = imagecreatefrompng("../images/measurement/makemyjeans/".$measurementimage);
				}
				
				$width = imagesx($image);
				$height = imagesy($image);
		
				$twidth = 100;
				$theight = 100;
				
				$im = imagecreatetruecolor($twidth,$theight);
				imagecopyresampled($im,$image,0,0,0,0,$twidth,$theight,imagesx($image),imagesy($image));
	
				if($_FILES["measurementimage"]["type"]=='image/jpg' ||$_FILES["measurementimage"]["type"]=='image/jpeg')
				{
					imagejpeg($im,"../images/measurement/makemyjeans/"."m".$measurementimage);
				}
				else if($_FILES["measurementimage"]["type"]=='image/gif')
				{
					imagegif($im,"../images/measurement/makemyjeans/"."m".$measurementimage);
				}
				else if($_FILES["measurementimage"]["type"]=='image/png')
				{
					imagepng($im,"../images/measurement/makemyjeans/"."m".$measurementimage);
				}								
	}
	else
	{
			$measurementimage=$_REQUEST["measurementimage_main"];
	}
	
	if($_FILES['copy_measurementimage']['tmp_name']!="")
	{
		
				if (($_FILES["copy_measurementimage"]["type"] == "image/gif")
				|| ($_FILES["copy_measurementimage"]["type"] == "image/png")
				|| ($_FILES["copy_measurementimage"]["type"] == "image/jpeg")
				|| ($_FILES["copy_measurementimage"]["type"] == "image/pjpeg"))				
				{
						$copy_measurementimage=time()."_".$_FILES['copy_measurementimage']['name'];														
						copy($_FILES['copy_measurementimage']['tmp_name'],"../images/measurement/copyajeans/".$copy_measurementimage);					
				}
				
				if($_FILES["copy_measurementimage"]["type"]=='image/jpg' ||$_FILES["copy_measurementimage"]["type"]=='image/jpeg')
				{
					$image = imagecreatefromjpeg("../images/measurement/copyajeans/".$copy_measurementimage);
				}
				else if($_FILES["copy_measurementimage"]["type"]=='image/gif')
				{
					$image = imagecreatefromgif("../images/measurement/copyajeans/".$copy_measurementimage);
				}
				else if($_FILES["copy_measurementimage"]["type"]=='image/png')
				{
					$image = imagecreatefrompng("../images/measurement/copyajeans/".$copy_measurementimage);
				}
				
				$width = imagesx($image);
				$height = imagesy($image);
		
				$twidth = 100;
				$theight = 100;
				
				$im = imagecreatetruecolor($twidth,$theight);
				imagecopyresampled($im,$image,0,0,0,0,$twidth,$theight,imagesx($image),imagesy($image));
	
				if($_FILES["copy_measurementimage"]["type"]=='image/jpg' ||$_FILES["copy_measurementimage"]["type"]=='image/jpeg')
				{
					imagejpeg($im,"../images/measurement/copyajeans/"."m".$copy_measurementimage);
				}
				else if($_FILES["copy_measurementimage"]["type"]=='image/gif')
				{
					imagegif($im,"../images/measurement/copyajeans/"."m".$copy_measurementimage);
				}
				else if($_FILES["copy_measurementimage"]["type"]=='image/png')
				{
					imagepng($im,"../images/measurement/copyajeans/"."m".$copy_measurementimage);
				}								
	}
	else
	{
			$copy_measurementimage=$_REQUEST["copy_measurementimage_main"];
	}
	
	$query="update measurement_master 
	set 
	measurement_name='".$_REQUEST["measurementname"]."',
	measurement_make_desc='".$_REQUEST["measurementdetails"]."',
	measurement_make_image='".$measurementimage."',
	measurement_copy_desc='".$_REQUEST["copy_measurementdetails"]."',
	measurement_copy_image='".$copy_measurementimage."',
	measurement_available='".$_REQUEST["measurementavailable"]."' 
	where 
	measurement_ID='".$_REQUEST["measurementid"]."' ";
	mysql_query($query);

	header("Location:measurement.php");
	exit();
}	
if($_REQUEST["process"]=="removemeasurement")
{
		$query="delete from measurement_master where measurement_ID='".$_REQUEST["measurementid"]."'";
		mysql_query($query);
		
		header("Location:measurement.php");
		exit();
}
if($_REQUEST["process"]=="changepassword")
{
		$query="update admin_master set admin_password='".base64_encode($_REQUEST["newpassword"])."' where admin_ID='".$_SESSION['sqjeansadminlogin']."'";
		mysql_query($query);
		
		header("Location:changepassword.php?msg=change");
		exit();
}
if($_REQUEST["process"]=="newshipping")
{
		$query="insert into shipping_charges 
		(
		shipping_country,
		shipping_one_kg,
		shipping_two_kg,
		shipping_three_kg,
		shipping_four_kg,
		shipping_five_kg,
		shipping_six_kg,
		shipping_seven_kg,
		shipping_eight_kg,
		shipping_nine_kg,
		shipping_ten_kg,			
		shipping_is_avail
		) 
		values 
		(
		'".$_REQUEST["shipping_country"]."',
		'".$_REQUEST["onekgprice"]."',
		'".$_REQUEST["twokgprice"]."',
		'".$_REQUEST["threekgprice"]."',
		'".$_REQUEST["fourkgprice"]."',
		'".$_REQUEST["fivekgprice"]."',
		'".$_REQUEST["sixkgprice"]."',
		'".$_REQUEST["sevenkgprice"]."',
		'".$_REQUEST["eightkgprice"]."',
		'".$_REQUEST["ninekgprice"]."',
		'".$_REQUEST["tenkgprice"]."',
		'".$_REQUEST["shippingavailable"]."'
		)
		";
		mysql_query($query);
		
		header("Location:shipping.php");
		exit();
}
if($_REQUEST["process"]=="editshipping")
{
		$query="update shipping_charges set
		shipping_country='".$_REQUEST["shipping_country"]."',
		shipping_one_kg='".$_REQUEST["onekgprice"]."',
		shipping_two_kg='".$_REQUEST["twokgprice"]."',
		shipping_three_kg='".$_REQUEST["threekgprice"]."',
		shipping_four_kg='".$_REQUEST["fourkgprice"]."',
		shipping_five_kg='".$_REQUEST["fivekgprice"]."',
		shipping_six_kg='".$_REQUEST["sixkgprice"]."',
		shipping_seven_kg='".$_REQUEST["sevenkgprice"]."',
		shipping_eight_kg='".$_REQUEST["eightkgprice"]."',
		shipping_nine_kg='".$_REQUEST["ninekgprice"]."',
		shipping_ten_kg='".$_REQUEST["tenkgprice"]."',
		shipping_is_avail='".$_REQUEST["shippingavailable"]."'
		where shipping_charge_ID='".$_REQUEST["shippingid"]."'
		";
		mysql_query($query);
		
		header("Location:shipping.php");
		exit();
}
if($_REQUEST["process"]=="removeshipping")
{
	$query="delete from shipping_charges where shipping_charge_ID='".$_REQUEST["shippingid"]."'";
	mysql_query($query);
		
		header("Location:shipping.php");
		exit();
}
if($_REQUEST["process"]=="newdiscount")
{

		function checkdiscountcode($discountcode)
		{
			$recordsetdiscount = mysql_query("select * from discount_master where discount_code='".$discountcode."'");
		
			if(mysql_num_rows($recordsetdiscount)==0)
			{
				$now = date("Y-m-d H:i:s");
				$ip=$_SERVER['REMOTE_ADDR'];
				$codeupto=$_REQUEST["discountvalidupto"];
				$datetime=explode(" ",$codeupto);
				$date=$datetime[0];
				$date=explode("-",$date);
				$year=$date[2];
				$mon=$date[1];
				$day=$date[0];
				$codeuptodate=$year."-".$mon."-".$day." 00:00:00";
				$query="insert into discount_master 
				(
					discount_code,
					discount_amount,
					discount_amount_type,
					discount_amount_generated,
					discount_amount_generated_from,
					discount_code_upto,
					discount_code_active
				) 
				values
				(
					'".$discountcode."',
					'".$_REQUEST["discountamount"]."',
					'".$_REQUEST["discountamounttype"]."',
					'".$now."',
					'".$ip."',
					'".$codeuptodate."',
					0
				)";
				mysql_query($query);
			}
			else
			{
				$length=10;
			   $vowels = 'aeuy';
				$consonants = 'bdghjmnpqrstvz';
				if ($strength & 1) {
					$consonants .= 'BDGHJLMNPQRSTVWXZ';
				}
				if ($strength & 2) {
					$vowels .= "AEUY";
				}
				if ($strength & 4) {
					$consonants .= '23456789';
				}
				if ($strength & 8) {
					$consonants .= '@#$%';
				}
			 
				$activationkey = '';
				$alt = time() % 2;
				for ($i = 0; $i < $length; $i++) {
					if ($alt == 1) {
						$discountcode .= $consonants[(rand() % strlen($consonants))];
						$alt = 0;
					} else {
						$discountcode .= $vowels[(rand() % strlen($vowels))];
						$alt = 1;
					}
				}		
					$discountcode=strtoupper($discountcode);
					checkdiscountcode($discountcode);
			}
		}

	    $length=10;
	    $vowels = 'aeuy';
		$consonants = 'bdghjmnpqrstvz';
		if ($strength & 1) {
			$consonants .= 'BDGHJLMNPQRSTVWXZ';
		}
		if ($strength & 2) {
			$vowels .= "AEUY";
		}
		if ($strength & 4) {
			$consonants .= '23456789';
		}
		if ($strength & 8) {
			$consonants .= '@#$%';
		}
	 
		$activationkey = '';
		$alt = time() % 2;
		for ($i = 0; $i < $length; $i++) {
			if ($alt == 1) {
				$discountcode .= $consonants[(rand() % strlen($consonants))];
				$alt = 0;
			} else {
				$discountcode .= $vowels[(rand() % strlen($vowels))];
				$alt = 1;
			}
		}
	
	$discountcode=strtoupper($discountcode);
	checkdiscountcode($discountcode);
	
	header("Location:discount.php");
	exit();
}
if($_REQUEST["process"]=="removediscount")
{
	$query="delete from discount_master where discount_ID='".$_REQUEST["discountid"]."'";
	mysql_query($query);
		
		header("Location:discount.php");
		exit();
}
if($_REQUEST["process"]=="newgallery")
{
	
	if($_FILES['galleryimage']['tmp_name']!="")
	{
		
				if (($_FILES["galleryimage"]["type"] == "image/gif")
				|| ($_FILES["galleryimage"]["type"] == "image/png")
				|| ($_FILES["galleryimage"]["type"] == "image/jpeg")
				|| ($_FILES["galleryimage"]["type"] == "image/pjpeg"))				
				{
						$galleryimage=time()."_".$_FILES['galleryimage']['name'];														
						copy($_FILES['galleryimage']['tmp_name'],"../images/gallery/".$galleryimage);					
				}
				
				if($_FILES["galleryimage"]["type"]=='image/jpg' ||$_FILES["galleryimage"]["type"]=='image/jpeg')
				{
					$image = imagecreatefromjpeg("../images/gallery/".$galleryimage);
				}
				else if($_FILES["galleryimage"]["type"]=='image/gif')
				{
					$image = imagecreatefromgif("../images/gallery/".$galleryimage);
				}
				else if($_FILES["galleryimage"]["type"]=='image/png')
				{
					$image = imagecreatefrompng("../images/gallery/".$galleryimage);
				}
				
				$width = imagesx($image);
				$height = imagesy($image);
		
				$twidth = 150;
				$theight = ($height * 150) / $width;
				
				$im = imagecreatetruecolor($twidth,$theight);
				imagecopyresampled($im,$image,0,0,0,0,$twidth,$theight,imagesx($image),imagesy($image));
	
				if($_FILES["galleryimage"]["type"]=='image/jpg' ||$_FILES["galleryimage"]["type"]=='image/jpeg')
				{
					imagejpeg($im,"../images/gallery/"."g".$galleryimage);
				}
				else if($_FILES["galleryimage"]["type"]=='image/gif')
				{
					imagegif($im,"../images/gallery/"."g".$galleryimage);
				}
				else if($_FILES["galleryimage"]["type"]=='image/png')
				{
					imagepng($im,"../images/gallery/"."g".$galleryimage);
				}
								
	}
	
	$query="insert into gallery_master (gallery_name,gallery_image,gallery_description,gallery_available) values ('".$_REQUEST["galleryname"]."','".$galleryimage."','".$_REQUEST["galleryimage_details"]."','".$_REQUEST["galleryavailable"]."')";
	mysql_query($query);

	header("Location:gallery.php");
	exit();
}
if($_REQUEST["process"]=="editgallery")
{
	if($_FILES['galleryimage']['tmp_name']!="")
	{
		
				if (($_FILES["galleryimage"]["type"] == "image/gif")
				|| ($_FILES["galleryimage"]["type"] == "image/png")
				|| ($_FILES["galleryimage"]["type"] == "image/jpeg")
				|| ($_FILES["galleryimage"]["type"] == "image/pjpeg"))				
				{
						$galleryimage=time()."_".$_FILES['galleryimage']['name'];														
						copy($_FILES['galleryimage']['tmp_name'],"../images/gallery/".$galleryimage);					
				}
				
				if($_FILES["galleryimage"]["type"]=='image/jpg' ||$_FILES["galleryimage"]["type"]=='image/jpeg')
				{
					$image = imagecreatefromjpeg("../images/gallery/".$galleryimage);
				}
				else if($_FILES["galleryimage"]["type"]=='image/gif')
				{
					$image = imagecreatefromgif("../images/gallery/".$galleryimage);
				}
				else if($_FILES["galleryimage"]["type"]=='image/png')
				{
					$image = imagecreatefrompng("../images/gallery/".$galleryimage);
				}
				
				$width = imagesx($image);
				$height = imagesy($image);
		
				$twidth = 150;
				$theight = ($height * 150) / $width;
				
				$im = imagecreatetruecolor($twidth,$theight);
				imagecopyresampled($im,$image,0,0,0,0,$twidth,$theight,imagesx($image),imagesy($image));
	
				if($_FILES["galleryimage"]["type"]=='image/jpg' ||$_FILES["galleryimage"]["type"]=='image/jpeg')
				{
					imagejpeg($im,"../images/gallery/"."g".$galleryimage);
				}
				else if($_FILES["galleryimage"]["type"]=='image/gif')
				{
					imagegif($im,"../images/gallery/"."g".$galleryimage);
				}
				else if($_FILES["galleryimage"]["type"]=='image/png')
				{
					imagepng($im,"../images/gallery/"."g".$galleryimage);
				}								
	}
	else
	{
			$galleryimage=$_REQUEST["galleryimage_main"];
	}
	
	$query="update gallery_master set gallery_name='".$_REQUEST["galleryname"]."',gallery_image='".$galleryimage."',gallery_description='".$_REQUEST["galleryimage_details"]."',gallery_available='".$_REQUEST["galleryavailable"]."' where gallery_ID='".$_REQUEST["galleryid"]."' ";
	mysql_query($query);

	header("Location:gallery.php");
	exit();
}	
if($_REQUEST["process"]=="removegallery")
{
		$query="delete from gallery_master where gallery_ID='".$_REQUEST["galleryid"]."'";
		mysql_query($query);
		
		header("Location:gallery.php");
		exit();
}
if($_REQUEST["process"]=="removeinquiry")
{
		$query="delete from contactus_request where request_id='".$_REQUEST["inquiryid"]."'";
		mysql_query($query);
		
		header("Location:inquiry.php");
		exit();
}
if($_REQUEST["process"]=="newbuttonrivets")
{
	
	if($_FILES['buttonrivets_image']['tmp_name']!="")
	{
		
				if (($_FILES["buttonrivets_image"]["type"] == "image/gif")
				|| ($_FILES["buttonrivets_image"]["type"] == "image/png")
				|| ($_FILES["buttonrivets_image"]["type"] == "image/jpeg")
				|| ($_FILES["buttonrivets_image"]["type"] == "image/pjpeg"))				
				{
						$buttonrivets_image=time()."_".$_FILES['buttonrivets_image']['name'];														
						copy($_FILES['buttonrivets_image']['tmp_name'],"../images/buttonrivets/".$buttonrivets_image);					
				}
				
				if($_FILES["buttonrivets_image"]["type"]=='image/jpg' ||$_FILES["buttonrivets_image"]["type"]=='image/jpeg')
				{
					$image = imagecreatefromjpeg("../images/buttonrivets/".$buttonrivets_image);
				}
				else if($_FILES["buttonrivets_image"]["type"]=='image/gif')
				{
					$image = imagecreatefromgif("../images/buttonrivets/".$buttonrivets_image);
				}
				else if($_FILES["buttonrivets_image"]["type"]=='image/png')
				{
					$image = imagecreatefrompng("../images/buttonrivets/".$buttonrivets_image);
				}
				
				$width = imagesx($image);
				$height = imagesy($image);
		
				$twidth = 100;
				$theight = 100;
				
				$im = imagecreatetruecolor($twidth,$theight);
				imagecopyresampled($im,$image,0,0,0,0,$twidth,$theight,imagesx($image),imagesy($image));
	
				if($_FILES["buttonrivets_image"]["type"]=='image/jpg' ||$_FILES["buttonrivets_image"]["type"]=='image/jpeg')
				{
					imagejpeg($im,"../images/buttonrivets/"."p".$buttonrivets_image);
				}
				else if($_FILES["buttonrivets_image"]["type"]=='image/gif')
				{
					imagegif($im,"../images/buttonrivets/"."p".$buttonrivets_image);
				}
				else if($_FILES["buttonrivets_image"]["type"]=='image/png')
				{
					imagepng($im,"../images/buttonrivets/"."p".$buttonrivets_image);
				}
								
	}
	
	$query="insert into buttonrivets_master (buttonrivets_name,buttonrivets_desc,buttonrivets_image,buttonrivets_additional_charge,buttonrivets_available) values ('".$_REQUEST["buttonrivets_name"]."','".$_REQUEST["buttonrivets_details"]."','".$buttonrivets_image."','".$_REQUEST["buttonrivets_addtional_price"]."','".$_REQUEST["buttonrivets_available"]."')";
	mysql_query($query);

	header("Location:buttonrivets.php");
	exit();
}
if($_REQUEST["process"]=="editbuttonrivets")
{
	
	if($_FILES['buttonrivets_image']['tmp_name']!="")
	{
		
				if (($_FILES["buttonrivets_image"]["type"] == "image/gif")
				|| ($_FILES["buttonrivets_image"]["type"] == "image/png")
				|| ($_FILES["buttonrivets_image"]["type"] == "image/jpeg")
				|| ($_FILES["buttonrivets_image"]["type"] == "image/pjpeg"))				
				{
						$buttonrivets_image=time()."_".$_FILES['buttonrivets_image']['name'];														
						copy($_FILES['buttonrivets_image']['tmp_name'],"../images/buttonrivets/".$buttonrivets_image);					
				}
				
				if($_FILES["buttonrivets_image"]["type"]=='image/jpg' ||$_FILES["buttonrivets_image"]["type"]=='image/jpeg')
				{
					$image = imagecreatefromjpeg("../images/buttonrivets/".$buttonrivets_image);
				}
				else if($_FILES["buttonrivets_image"]["type"]=='image/gif')
				{
					$image = imagecreatefromgif("../images/buttonrivets/".$buttonrivets_image);
				}
				else if($_FILES["buttonrivets_image"]["type"]=='image/png')
				{
					$image = imagecreatefrompng("../images/buttonrivets/".$buttonrivets_image);
				}
				
				$width = imagesx($image);
				$height = imagesy($image);
		
				$twidth = 100;
				$theight = 100;
				
				$im = imagecreatetruecolor($twidth,$theight);
				imagecopyresampled($im,$image,0,0,0,0,$twidth,$theight,imagesx($image),imagesy($image));
	
				if($_FILES["buttonrivets_image"]["type"]=='image/jpg' ||$_FILES["buttonrivets_image"]["type"]=='image/jpeg')
				{
					imagejpeg($im,"../images/buttonrivets/"."p".$buttonrivets_image);
				}
				else if($_FILES["buttonrivets_image"]["type"]=='image/gif')
				{
					imagegif($im,"../images/buttonrivets/"."p".$buttonrivets_image);
				}
				else if($_FILES["buttonrivets_image"]["type"]=='image/png')
				{
					imagepng($im,"../images/buttonrivets/"."p".$buttonrivets_image);
				}
								
	}
	else
	{
		$buttonrivets_image=$_REQUEST["buttonrivets_imagemain"];
	}
	
	$query="update buttonrivets_master set buttonrivets_name='".$_REQUEST["buttonrivets_name"]."',buttonrivets_desc='".$_REQUEST["buttonrivets_details"]."',buttonrivets_image='".$buttonrivets_image."',buttonrivets_additional_charge='".$_REQUEST["buttonrivets_addtional_price"]."',buttonrivets_available='".$_REQUEST["buttonrivets_available"]."' where buttonrivets_ID='".$_REQUEST["buttonrivetsid"]."'";
	mysql_query($query);

	header("Location:buttonrivets.php");
	exit();
}
if($_POST["buttonrivetsstyledefaultset"]=="Set Defaul")
{
	$query1="update buttonrivets_master set 
	buttonrivets_default=0";
	mysql_query($query1);
	
	
	 $queryupdate="update buttonrivets_master set 
	buttonrivets_default=1	
	where buttonrivets_ID='".$_REQUEST["buttonrivetsdefaultid"]."'";
		mysql_query($queryupdate);
		
	
	header("Location:buttonrivets.php");
	exit();
	}
if($_REQUEST["process"]=="removebuttonrivets")
{

	$query="delete from buttonrivets_master where buttonrivets_ID='".$_REQUEST["buttonrivetsid"]."'";
	mysql_query($query);
	header("Location:buttonrivets.php");
	exit();	
}
if($_POST["buttonrivetsorder"]=="Change Order")
{

	$i=1;
	$query="SELECT * FROM buttonrivets_master order by buttonrivets_name";			
	$recordsetbuttonrivets_style = mysql_query($query);
	while($rowbuttonrivets_style = mysql_fetch_array($recordsetbuttonrivets_style,MYSQL_ASSOC))
	{
		$queryupdate="update buttonrivets_master set buttonrivets_order='".$_REQUEST["buttonrivetsdisplayorder".$i]."' where buttonrivets_ID='".$_REQUEST["buttonrivetsdisplayorderid".$i]."'";
		mysql_query($queryupdate);
		$i++;
    }
	
	header("Location:buttonrivets.php");
	exit();	
}

// Reseller account starts

if($_REQUEST["process"]=="newreseller")
{
	
	
	$query="insert into reseller_master (reseller_name,reseller_contactno,reseller_emailid,reseller_password,reseller_location,reseller_city,reseller_state,reseller_country) values ('".$_REQUEST["resellername"]."','".$_REQUEST["resellercontact"]."','".$_REQUEST["reselleremail"]."','".base64_encode($_REQUEST["resellerpassword"])."','".$_REQUEST["reselleraddress"]."','".$_REQUEST["resellercity"]."','".$_REQUEST["resellerstate"]."','".$_REQUEST["resellercountry"]."')";
	mysql_query($query);
	
	//////// send Mail to  Developer ////////////////
	
$adid=$_SESSION["sqjeansadminlogin"];
$qu2=mysql_query("select * from admin_master where admin_ID ='".$adid."'");
$resAde=mysql_fetch_array($qu2);

$adname=$resAde["admin_name"];


function u_SendMail($FromMail,$ToMail,$Data,$Subject)
						{
							$headers = "MIME-Version: 1.0\n"; 
							$headers .= "Content-type: text/html; charset=iso-8859-1\n";
							
							$headers .= "From: $FromMail\n";
						
							if(strpos($_SERVER['SERVER_NAME'],".com"))
							{
								$myresult=mail($ToMail, $Subject , $Data, $headers);
							}					
						}
						
						$Subject= "Reseller Detail";
						$FromMail=$adname." - Admin <info@sqjeans.com>";
					



	   $devemail=$_REQUEST["reselleremail"];
	 $devPass=base64_decode($_REQUEST["resellerpassword"]);
	   $devnm=$_REQUEST["resellername"];
	 
	   
$Data='<table width="100%" border="0" cellspacing="0" cellpadding="5">
<tr>
<td valign="top"><font size="2" face="Arial">Reseller name</font></td>
<td valign="top"><font size="2" face="Arial">'.$devnm.'</font></td>
</tr>
<tr>

<td valign="top"><font size="2" face="Arial">User name(Email id) :</font></td>
<td valign="top"><font size="2" face="Arial">'.$devemail.'</font></td>
</tr>
<tr>
<td valign="top"><font size="2" face="Arial">Password :</font></td>
<td valign="top"><font size="2" face="Arial">'.$devPass.'</font></td></tr>
<tr>
<td valign="top"><font size="2" face="Arial">Login Url :</font></td>
<td valign="top"><font size="2" face="Arial">
<a href="www.sqjeans.com/reseller" >Click here </a> to login your account</font></td></tr>
</table>';

						
		
				$ToMail=$devnm."(Reseller) <".$devemail.">";			
						u_SendMail($FromMail,$ToMail,$Data,$Subject);



	header("Location:resellers.php");
	exit();
}
if($_REQUEST["process"]=="editreseller")
{
	
	
	$query="update reseller_master set reseller_name='".$_REQUEST["resellername"]."',reseller_contactno='".$_REQUEST["resellercontact"]."',reseller_emailid='".$_REQUEST["reselleremail"]."',reseller_password='".base64_encode($_REQUEST["resellerpassword"])."',reseller_location='".$_REQUEST["reselleraddress"]."',reseller_city='".$_REQUEST["resellercity"]."',reseller_state='".$_REQUEST["resellerstate"]."',reseller_country='".$_REQUEST["resellercountry"]."' where reseller_id='".$_REQUEST["resellerid"]."'";
	mysql_query($query);

	header("Location:resellers.php");
	exit();
}
if($_REQUEST["process"]=="removereseller")
{

	$query="delete from reseller_master where reseller_id='".$_GET["resellerid"]."'";
	mysql_query($query);
	header("Location:resellers.php");
	exit();	
}

// ends Reseller account 

?>

