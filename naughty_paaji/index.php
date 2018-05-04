<?php session_start();
include("include/config.php"); 
require_once("include/function.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo pagetitle();?></title>
<style type="text/css">
<!--
body {
	-webkit-user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
-o-user-select: none;
user-select: none;
	background-image: url(images/bg.jpg);
	background-repeat: repeat-x;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #DDD9C0;

}
-->
</style>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language=JavaScript>
<!--

//Disable right mouse click Script
//By Maximus (maximus@nsimail.com) w/ mods by DynamicDrive
//For full source code, visit http://www.dynamicdrive.com

var message="Function Disabled!";

///////////////////////////////////
function clickIE4(){
if (event.button==2){
alert(message);
return false;
}
}

function clickNS4(e){
if (document.layers||document.getElementById&&!document.all){
if (e.which==2||e.which==3){
//alert(message);
return false;
}
}
}

if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById){
document.onmousedown=clickIE4;
}

document.oncontextmenu=new Function("return false")

// --> 
</script>
</head>

<body  onselectstart='return false;'>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=305445802858917";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
  <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="900" style="background:url(images/bg1_01.png)no-repeat right top;">&nbsp;</td>
      <td width="980" align="left" valign="top" style="background:url(images/bg1_02.png) no-repeat 0px top;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="top"><?php include("header.php"); ?></td>
        </tr>
        <tr>
          <td height="10">
          
          
          
          <table width="100%" border="0" cellspacing="10" cellpadding="0">
            <tr>
              <td width="220" align="left" valign="top"><?php include("left.php"); ?>
</td>
<td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("slider.php"); ?></td>
  </tr>
  <tr>
    <td height="10"></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top">
		<?php
                             $content=$_GET['page'];
                             switch($content)
                             {
                                    case 1:
                                        include("ask_your_lawyer.php"); 
                                    break;	
									case 2:
                                        include("share_experience.php"); 
                                    break;
                                    case 3:
                                        include("thanks_ask_share.php"); 
                                    break;
									case 4:
                                        include("contactus.php"); 
                                    break;
									case 5:
                                        include("user_register.php"); 
                                    break;
									case 6:
                                        include("login.php"); 
                                    break;
									case 7:
                                        include("logout.php"); 
                                    break;
									case 8:
                                        include("forgotpassword.php"); 
                                    break;								
									case 9:
                                        include("display_discussion.php"); 
                                    break;
									case 10:
                                        include("know_rights.php"); 
                                    break;
									case 11:
                                        include("about_naughtypaaji.php"); 
                                    break;
									case 12:
                                        include("discussion_board.php"); 
                                    break;
									case 13:
                                        include("changepassword.php"); 
                                    break;
									case 14:
                                        include("know_duties.php"); 
                                    break;
									case 15:
                                        include("rights_type.php"); 
                                    break;
									case 16:
                                        include("duties_type.php"); 
                                    break;
									case 17:
                                        include("disclaimer.php"); 
                                    break;
									case 18:
                                        include("privacy_policy.php"); 
                                    break;
									case 19:
                                        include("terms_of_use.php"); 
                                    break;	
									case 20:
                                        include("share_experience_all.php"); 
                                    break;
									
									case 21:
                                        include("display_experience.php"); 
                                    break;
									
									case 22:
                                        include("press.php"); 
                                    break;
									
                                    default:
                                        include("discussion_board.php"); 
                                    break;
                              }		 	
                         ?>		
        
        </td>
        <?php if($_GET['page']==""){ ?>
        <td width="10">&nbsp;</td>
        <td width="220" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>
              <?php include("latest_comic_book.php"); ?>
            </td>
          </tr>
          <tr><td height="10"></td></tr>
          <tr>
            <td bgcolor="#f6ecd2">
              <?php include("inquiry.php"); ?>
            </td>
          </tr>
          
        </table></td>
        <?php } ?>
      </tr>
    </table></td>
  </tr>
</table></td>
</tr>
</table>



</td>
</tr>

<tr>
<td valign="top"><?php include("footer.php"); ?></td>
</tr>
        
</table>
</td>
<td>&nbsp;</td>
</tr>
</table>
</td>
</tr>
<tr>
  <td>&nbsp;</td>
</tr>
</table>
</body>
</html>
