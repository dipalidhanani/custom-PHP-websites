<?php
function u_Connect($link = 'db_link',$database = DB_DATABASE, $username = DB_SERVER_USERNAME, $password = DB_SERVER_PASSWORD,$server = DB_SERVER)
 {
    global $$link;
    if (USE_CONNECT == 'true') {
      $$link = mysql_connect($server, $username, $password);
	  //echo $$link;
    }
    if ($$link) mysql_select_db($database);
	return $$link;
  }

function u_Close($link = 'db_link') 
{
    global $$link;
    return mysql_close($$link);
}
function curPageURL() 
{
	 $pageURL = 'http';
	 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	 $pageURL .= "://";
	 if ($_SERVER["SERVER_PORT"] != "80") 
	 {
	  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	 } 
	 else 
	 {
	  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	 }
	 return $pageURL;
}

/*function small_editor($editorname)
{
				 include_once '../ckeditor/ckeditor.php';
				 include_once '../ckfinder/ckfinder.php';
				 $ckeditor = new CKEditor();
				 $config['height']=150;
				 $config['width']=600;
				 $config['toolbar']="Basic";
								 
				 $ckeditor->basePath = '../ckeditor/';
				 $ckeditor->config['filebrowserBrowseUrl'] = '../ckfinder/ckfinder.html';
				 $ckeditor->config['filebrowserImageBrowseUrl'] = '../ckfinder/ckfinder.html?type=Images';
				 $ckeditor->config['filebrowserFlashBrowseUrl'] = '../ckfinder/ckfinder.html?type=Flash';
				 $ckeditor->config['filebrowserUploadUrl'] = '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
				 $ckeditor->config['filebrowserImageUploadUrl'] = '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
				 $ckeditor->config['filebrowserFlashUploadUrl'] = '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
				 $code = $ckeditor->editor($editorname, '',$config);
				 echo $code;
}*/
function small_editor($editorname)
{
				 include_once '../ckeditor/ckeditor.php';
				 include_once '../ckfinder/ckfinder.php';
				 $ckeditor = new CKEditor();
				 $config['height']=350;
				 $config['width']=600;				 
								 
				 $ckeditor->basePath = '../ckeditor/';
				 $ckeditor->config['filebrowserBrowseUrl'] = '../ckfinder/ckfinder.html';
				 $ckeditor->config['filebrowserImageBrowseUrl'] = '../ckfinder/ckfinder.html?type=Images';
				 $ckeditor->config['filebrowserFlashBrowseUrl'] = '../ckfinder/ckfinder.html?type=Flash';
				 $ckeditor->config['filebrowserUploadUrl'] = '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
				 $ckeditor->config['filebrowserImageUploadUrl'] = '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
				 $ckeditor->config['filebrowserFlashUploadUrl'] = '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
				 $code = $ckeditor->editor($editorname, '',$config);
				 echo $code;
}
/*function small_editor_value($editorname,$value)
{
				 include_once '../ckeditor/ckeditor.php';
				 include_once '../ckfinder/ckfinder.php';
				 $ckeditor = new CKEditor();
				 $config['height']=250;
				 $config['width']=600;
				 $config['toolbar']="Basic";
								 
				 $ckeditor->basePath = '../ckeditor/';
				 $ckeditor->config['filebrowserBrowseUrl'] = '../ckfinder/ckfinder.html';
				 $ckeditor->config['filebrowserImageBrowseUrl'] = '../ckfinder/ckfinder.html?type=Images';
				 $ckeditor->config['filebrowserFlashBrowseUrl'] = '../ckfinder/ckfinder.html?type=Flash';
				 $ckeditor->config['filebrowserUploadUrl'] = '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
				 $ckeditor->config['filebrowserImageUploadUrl'] = '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
				 $ckeditor->config['filebrowserFlashUploadUrl'] = '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
				 $code = $ckeditor->editor($editorname, $value,$config);
				 echo $code;
}*/
function small_editor_value($editorname,$value)
{
				 include_once '../ckeditor/ckeditor.php';
				 include_once '../ckfinder/ckfinder.php';
				 $ckeditor = new CKEditor();
				 $config['height']=250;
				 $config['width']=600;				 
								 
				 $ckeditor->basePath = '../ckeditor/';
				 $ckeditor->config['filebrowserBrowseUrl'] = '../ckfinder/ckfinder.html';
				 $ckeditor->config['filebrowserImageBrowseUrl'] = '../ckfinder/ckfinder.html?type=Images';
				 $ckeditor->config['filebrowserFlashBrowseUrl'] = '../ckfinder/ckfinder.html?type=Flash';
				 $ckeditor->config['filebrowserUploadUrl'] = '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
				 $ckeditor->config['filebrowserImageUploadUrl'] = '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
				 $ckeditor->config['filebrowserFlashUploadUrl'] = '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
				 $code = $ckeditor->editor($editorname, $value,$config);
				 echo $code;
}
function explodedate($datetime)
{
	$datetime=explode(" ",$datetime);
	$date=$datetime[0];
	$date=explode("-",$date);
	$year=$date[0];
	$mon=$date[1];
	$day=$date[2];
	$date=$day."-".$mon."-".$year;
	$datetime=$date." ".$datetime[1];
	return $datetime; 
}
function explodedobdate($date)
{
	$date=explode("-",$date);
	$year=$date[0];
	$mon=$date[1];
	$day=$date[2];
	$date=$day."-".$mon."-".$year;
	return $date; 
}
function displaymaterialname($materialid)
{
			$query="SELECT * FROM material_master where material_ID='".$materialid."'";			
			 $recordsetmaterial = mysql_query($query);
			 while($rowmaterial = mysql_fetch_array($recordsetmaterial))
			 {
			 		echo $rowmaterial["material_name"];
			 }
}
function displayeditorvalue($value)
{
		//$value=str_replace("<p>\r\n",'',$value);
		echo $value;
}
?>