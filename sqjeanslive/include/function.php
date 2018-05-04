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

function small_editor($editorname)
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
}
function full_editor($editorname)
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
function small_editor_value($editorname,$value)
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
}
function full_editor_value($editorname,$value)
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
		$value=str_replace("<p>\r\n",'',$value);
		echo $value;
}

function pagetitle()
{
 if($_REQUEST["object"]=="")
 {
  $pagetile="SQ Jeans | Custom Jeans Shop Online | Best Tailor Made Jeans";
 }
 elseif($_REQUEST["object"]==1)
 {
  $pagetile="SQ Jeans | About Us";
 }
  elseif($_REQUEST["object"]==2)
 {
	  if(($_REQUEST["object"]==2) && ($_REQUEST["step"]==2)){
  $pagetile="SQ Jeans | Custom Jeans | Step2";
	 }
	 else if(($_REQUEST["object"]==2) && ($_REQUEST["step"]==3)){
  $pagetile="SQ Jeans | Custom Jeans | Step3";
	 }
	 else if(($_REQUEST["object"]==2) && ($_REQUEST["step"]==4)){
  $pagetile="SQ Jeans | Custom Jeans | Step4";
	 }
	 else { $pagetile="SQ Jeans | Custom Jeans | Step1";}
 
 }
  elseif($_REQUEST["object"]==213)
 {
  $pagetile="SQ Jeans | Custom Jeans";
 }
  elseif($_REQUEST["object"]==3)
 {
  $pagetile="SQ Jeans | How To Order";
 }
  elseif($_REQUEST["object"]==4)
 {
  $pagetile="SQ Jeans | Contact Us";
 }
  elseif($_REQUEST["object"]==5)
 {
  $pagetile="SQ Jeans | Return Policy";
 }
  elseif($_REQUEST["object"]==6)
 {
  $pagetile="SQ Jeans | Terms & Conditions";
 }
  elseif($_REQUEST["object"]==7)
 {
  $pagetile="SQ Jeans | Payment";
 }
  elseif($_REQUEST["object"]==9)
 {
  $pagetile="SQ Jeans | My Profile";
 }
  elseif($_REQUEST["object"]==10)
 {
  $pagetile="SQ Jeans | My Orders";
 }
  elseif($_REQUEST["object"]==11)
 {
  $pagetile="SQ Jeans | My Order Details";
 }
  elseif($_REQUEST["object"]==12)
 {
  $pagetile="SQ Jeans | Change Jeans";
 }
  elseif($_REQUEST["object"]==13)
 {
  $pagetile="SQ Jeans | Photo Gallery";
 }
  elseif($_REQUEST["object"]==14)
 {
  $pagetile="SQ Jeans | My Details";
 }
  elseif($_REQUEST["object"]==15)
 {
  $pagetile="SQ Jeans | Update Profile";
 }
  elseif($_REQUEST["object"]==16)
 {
  $pagetile="SQ Jeans | Change Password";
 }
  elseif($_REQUEST["object"]==17)
 {
  $pagetile="SQ Jeans | Shipping";
 }
  elseif($_REQUEST["object"]==18)
 {
  $pagetile="SQ Jeans | Cancellation Or Modification Of Order";
 }
  elseif($_REQUEST["object"]==19)
 {
  $pagetile="SQ Jeans | Privacy & Policy";
 }
  elseif($_REQUEST["object"]==20)
 {
  $pagetile="SQ Jeans | Offline Payment";
 }
 elseif($_REQUEST["object"]==21)
 {
  $pagetile="SQ Jeans | Register";
 }
 elseif($_REQUEST["object"]==22)
 {
  $pagetile="SQ Jeans | Forgot Password";
 }
  elseif($_REQUEST["object"]==24)
 {
  $pagetile="SQ Jeans | Checkout";
 }
   elseif($_REQUEST["object"]==25)
 {
  $pagetile="SQ Jeans | My Cart";
 }
   elseif($_REQUEST["object"]==27)
 {
  $pagetile="SQ Jeans | Change My Cart Jeans";
 }
   elseif($_REQUEST["object"]==29)
 {
  $pagetile="SQ Jeans | Shipping Rates";
 }
   elseif($_REQUEST["object"]==30)
 {
  $pagetile="SQ Jeans | Bank Account";
 }
   elseif($_REQUEST["object"]==32)
 {
  $pagetile="SQ Jeans | New Offer";
 }
   elseif($_REQUEST["object"]==33)
 {
  $pagetile="SQ Jeans | Testimonials";
 }
   elseif($_REQUEST["object"]==34)
 {
  $pagetile="SQ Jeans | Our Concept";
 }
   elseif($_REQUEST["object"]==35)
 {
  $pagetile="SQ Jeans | Partner";
 }
   elseif($_REQUEST["object"]==41)
 {
  $pagetile="SQ Jeans | Inquiry";
 }
 return $pagetile;
}

?>