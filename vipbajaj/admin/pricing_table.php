<?php
session_start();
require_once("../include/config.php");
	 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>pricing</title>
<link rel="stylesheet" href="css/css.css" type="text/css" />
<script language="javascript">
function validation_pricing()
{
	with(document.pricingform)
	{
			var error=0;
			var message;
			message="Please enter / correct folllowing errors to proceed further";
			message=message+ "\n" + "--------------------------------------------------------------------";
			
			
			if(pricing_table.value=='')
			{
				error=1;
				message=message + "\n" + "Please Pick Pricing Table !";
			}
			if (error==1)
			{
				alert(message);
				return false;
			}
			else
			{
				return true;		
			}
	}
}
</script>
<script src="js/jquery/jquery.js" type="text/javascript"></script>
	<script src="js/jquery/ifx.js" type="text/javascript"></script>
	<script src="js/jquery/idrop.js" type="text/javascript"></script>
	<script src="js/jquery/idrag.js" type="text/javascript"></script>
	<script src="js/jquery/iutil.js" type="text/javascript"></script>
	<script src="js/jquery/islider.js" type="text/javascript"></script>

	<script src="js/jquery/color_picker/color_picker.js" type="text/javascript"></script>


	<link href="js/jquery/color_picker/color_picker.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0"  class="border">
      <tr>
        <td><table width="1000" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td bgcolor="#FFFFFF"> <?php include("headerAdmin.php");?></td>
          </tr>
          <tr>
            <td height="10" bgcolor="#FFFFFF"></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">
            
            <table width="100%" border="0" cellspacing="10" cellpadding="0">  
      <tr>
       <td align="left" class="normal_fonts14_black">Edit Pricing</td>      
      </tr>
     
       <tr>
        <td colspan="2">
        <form name="pricingform" id="pricingform" method="post" action="process_pricing.php" enctype="multipart/form-data">
        <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
      <?php
	 
	  $recordsetpricing = mysql_query("SELECT * FROM pricing_mast where pricing_id=1");
	  if($rowpricing = mysql_fetch_array($recordsetpricing,MYSQL_ASSOC))
	  {
	  ?>
            <tr>
              <td width="30%" align="right" valign="top" class="normal_fonts9">Pricing</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top">
                <?php
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
				 $code = $ckeditor->editor('pricing_table', $rowpricing["pricing_table"],$config);
				 echo $code;
				 ?>           
                </td>
            </tr>          
          <tr bgcolor="#F3F3F3">
            <td align="right" valign="top" class="normal_fonts9">&nbsp;</td>
            <td align="left" valign="top" >&nbsp;</td>
            <td align="left" valign="top" class="normal_fonts9">  
              <input type="hidden" name="process" value="editpricing" />          
              <input name="submit" type="submit" class="normal_fonts9" value="Submit" onclick="return validation_pricing();" />
              </td>
          </tr>
        <?php } ?>  
        </table></form></td>
      </tr>
       
     
      
      
    </table> </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="10"></td>
      </tr>
      <tr>
        <td align="center" valign="middle">
        <?php  include("footer.php"); ?>
        
        </td>
      </tr>
    </table></td>
  </tr>
</table>

</body>
</html>
