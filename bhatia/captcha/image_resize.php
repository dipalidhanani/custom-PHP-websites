<?php
	header("Content-Type: image/jpeg");
	$target_path="../images/" .$_GET['path'];
	list($width, $height) = getimagesize($target_path);
	//echo($width."-".$height."--");
	$newwidth=$width;
	$newheight=$height;
	if($width > 125)
	{
		$newheight=($height*125)/$width;
		$newwidth=125;
	}
	//echo($newwidth."-".$newheight."--");
	$w=$newwidth;
	$h=$newheight;
	if($newheight > 125)
	{
		$w=($newwidth*125)/$newheight;
		$h=125;
	}
	//echo($w."-".$h);
	$thumb = imagecreatetruecolor($w, $h);
	$source = imagecreatefromjpeg($target_path);
	imagecopyresized($thumb, $source, 0, 0, 0, 0, $w, $h, $width, $height);
	imagejpeg($thumb);
?>