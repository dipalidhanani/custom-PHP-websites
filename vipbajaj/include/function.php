<?php

function uploadimages_fixedheightwidth($filename,$filename_tmpname,$filename_type,$uploadpath,$uploadwidth,$uploadheight)
{
	if($filename_tmpname!="")
	{
		
				if (($filename_type == "image/gif")
				|| ($filename_type == "image/png")
				|| ($filename_type == "image/jpeg")
				|| ($filename_type == "image/pjpeg"))				
				{
						$saveuploadedimage=time()."_".$filename;														
						copy($filename_tmpname,$uploadpath.$saveuploadedimage);					
				}
				
				if($filename_type=='image/jpg' ||$filename_type=='image/jpeg')
				{
					$image = imagecreatefromjpeg($uploadpath.$saveuploadedimage);
				}
				else if($filename_type=='image/gif')
				{
					$image = imagecreatefromgif($uploadpath.$saveuploadedimage);
				}
				else if($filename_type=='image/png')
				{
					$image = imagecreatefrompng($uploadpath.$saveuploadedimage);
				}
				
				$width = imagesx($image);
				$height = imagesy($image);
		
				$twidth = $uploadwidth;
				$theight = $uploadheight;
				
				$im = imagecreatetruecolor($twidth,$theight);
				imagecopyresampled($im,$image,0,0,0,0,$twidth,$theight,imagesx($image),imagesy($image));
	
				if($filename_type=='image/jpg' ||$filename_type=='image/jpeg')
				{
					imagejpeg($im,$uploadpath."vipbajaj_".$saveuploadedimage);
				}
				else if($filename_type=='image/gif')
				{
					imagegif($im,$uploadpath."vipbajaj_".$saveuploadedimage);
				}
				else if($filename_type=='image/png')
				{
					imagepng($im,$uploadpath."vipbajaj_".$saveuploadedimage);
				}							
	}
	else
	{
		$saveuploadedimage="dipyfashion_category.jpg";
	}
	
	return $saveuploadedimage;
}

?>