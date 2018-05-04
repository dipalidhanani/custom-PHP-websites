<?php
function getImage($imageFolder,$Image,$display_inWidth,$display_inHeight,$class='',$border='',$showNoImage='') {
		$class = ( $class == "" ) ? "img" : $class;
		$ImagePath = $imageFolder."/".$Image;	
		if ( file_exists($ImagePath) && $Image != "" ) {
			list($ImageWidth, $ImageHeight) = getimagesize($ImagePath);
			if ( $ImageWidth > $display_inWidth ) {
				$ImageWidth = $display_inWidth;
			} 
			if ( $ImageHeight > $display_inHeight ) {
				$ImageHeight = $display_inHeight;
			}  
			$Image = "<img src=\"imgsize.php?&amp;constrain=1&amp;w=".$ImageWidth."&amp;h=".$ImageHeight."&amp;img=".$ImagePath."\" hspace=\"0\" vspace=\"0\" alt=\"\" class=\"".$class."\" border=\"0\" />";
		
			return $Image;
		} else {
			if ( $showNoImage != "" ) {
				$Image = getNoImage($imageFolder,$display_inWidth,$display_inHeight,$align = '');
				return $Image;
			} else 
				return;
		}
}

function getsafefilename($folder = '',$name = '') {
	if ( file_exists($folder."/".$name) ) {
		for($i=1;$i<=400;$i++ ) {
			list($ext,$na) = explode(".",strrev($name));
			$n = strrev($na)."(".$i.")".".".strrev($ext);
			if ( file_exists($folder."/".$n) ) {
				getsafefilename($folder,$n);
			} else {
				return $n;
				break;
			}
		}
	}  else {
		return $name;
	}
}
function UploadImage($tmpName,$UploadFolder,$newfilename) {
	$newfilename = getsafefilename($UploadFolder,$newfilename);
	$target_path = $UploadFolder."/".$newfilename;	
	if ( move_uploaded_file($tmpName, $target_path) ) {
		
		return $newfilename;
		//echo $newfilename;	
	} else 
		return false;
}
function sendHTMLMail($to,$from,$subject,$message) {
	$headers = "FROM:".$from."\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	mail($to,$subject,$message,$headers);
}
function sanitizeName($file_name)
{
	global $_SESSION;
	
	if($file_name == "")
	{
		return "";
	}
	
	$file_name = basename($file_name);
	$file_name = preg_replace("/[^a-zA-Z0-9\.]/", "_", $file_name);
	$file_name = preg_replace("/(_)+/", "_", $file_name);
	$file_name = time(). "_". $file_name;
	return $file_name;
}
function insertDate($date,$seperator){
	$newdate = explode($seperator,$date);
	$ins_date = $newdate[2]."-".$newdate[1]."-".$newdate[0]; 
	//$ins_date=date("Y-m-d",strtotime($date));
	return $ins_date;
}
function displayDate($date){
	if($date=="0000-00-00"){
		$dis_date = "0000/00/00";
	}else {
		$dis_date=date("d/m/Y",strtotime($date));
	}
	return $dis_date;
}
?>