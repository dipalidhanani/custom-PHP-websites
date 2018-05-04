<?php session_start();
include("../include/config.php");
if($_SESSION['Admin_id'] == "")
	{
			//echo "Unauthorised Access !!!";die;
			echo "<script>location.href='login.php';</script>";
			exit();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Naughty Paaji - Admin Facility</title>
<script language="javascript">

function validation_frm()
{
	
		
	if(document.getElementById('discussion_topic').value=='')
	{
		
		document.getElementById('errdiscussion_topic').style.display='';
		return false;
			
	}
	

	
}

</script>
<script language="javascript">

function validation1(id)
{
	
	if(id==1)
	{
		if(document.getElementById('discussion_topic').value=='')
		{
			
			document.getElementById('errdiscussion_topic').style.display='';
			
		}
		else
		{
			document.getElementById('errdiscussion_topic').style.display='none';
		}
	}
	
		
}

</script>
</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>     
   <td><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
   <tr>
    <td><table width="1000" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF"><?php include("headerAdmin.php");?></td>
      </tr>
      
      
      <tr>
        <td bgcolor="#FFFFFF">
     
     <!--   main starts here-->
<form id="discussionform" name="discussionform" method="post" action="process_discussion.php" onsubmit="return validation_frm();">
<table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">Discussion Detail</td>
          </tr>
          <tr>
            <td>

<?php 
$a=$_GET["discussion_board_id"];

   $query = "select * from discussion_board where discussion_board_id='".$a."' ";
   
   $result= mysql_query($query) 
   or die (mysql_error());
   if($row=mysql_fetch_array($result))
   {
	?>   
  <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
  <tr>
    <td width="245" align="right" bgcolor="#F3F3F3" class="normal_fonts9" valign="top">Discussion topic : </td>
    <td width="715" bgcolor="#F3F3F3" class="normal_fonts9">
    <input name="discussion_topic" type="text" class="normal_fonts9" id="discussion_topic" value="<?php echo $row["discussion_topic"]; ?>" size="83" onblur="validation1(1)" />&nbsp;&nbsp;<span id="errdiscussion_topic" style="display:none" class="err_validate" >Please enter Topic</span>
    <input name="discussion_board_id" id="discussion_board_id" class="normal_fonts9" type="hidden" value="<?php echo $row["discussion_board_id"]; ?>" />
   
    </td>
  </tr>
  <tr>
    <td align="right" class="normal_fonts9" valign="top">Discussion description : </td>
    <td class="normal_fonts9"><?php
	   			 include_once 'ckeditor/ckeditor.php';
				 include_once 'ckfinder/ckfinder.php';
				 $ckeditor = new CKEditor();
				 $config['height']=150;
				 $config['width']=450;
				 $config['toolbar']="Basic";
								 
				 $ckeditor->basePath = 'ckeditor/';
				 $ckeditor->config['filebrowserBrowseUrl'] = 'ckfinder/ckfinder.html';
				 $ckeditor->config['filebrowserImageBrowseUrl'] = 'ckfinder/ckfinder.html?type=Images';
				 $ckeditor->config['filebrowserFlashBrowseUrl'] = 'ckfinder/ckfinder.html?type=Flash';
				 $ckeditor->config['filebrowserUploadUrl'] = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
				 $ckeditor->config['filebrowserImageUploadUrl'] = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
				 $ckeditor->config['filebrowserFlashUploadUrl'] = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
				 $code = $ckeditor->editor('discussion_description', $row["discussion_description"],$config);
				 echo $code;
				 ?>
    </td>
  </tr>
  
  
  
     
            </table>
            <?php } ?>
                </td>
                          </tr>
                          <tr><td>
                          <table width="100%" border="0" cellpadding="5" cellspacing="0">
                          <tr>
                            <td align="right" class="normal_fonts9" width="375">&nbsp;</td>
                           
                            <td class="normal_fonts9" >
                            <input type="hidden" name="process" value="Edit" />
                            <input class="submit" name="submit" type="submit" align="middle" style="width:80px; height:30px" id="submit" value="Save" />&nbsp;&nbsp;<input name="back" type="button" class="normal_fonts12_black" id="back" style="width:80px; height:30px" value="Back" onclick="history.go(-1)" /></td>
                          </tr>
                          
                          </table>
         </td></tr>
  </table>

  </form>
  <!--   main ends here-->

</td>
      </tr>
    </table></td>
  </tr>
  
  <tr>
        <td align="center" valign="middle">
        <?php  include("footer.php"); ?>
        </td>
  </tr>
</table>
 </td></tr></table>
</body>
</html>