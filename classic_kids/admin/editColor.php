<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Klassic Kids | Colors</title>
<link rel="stylesheet" href="css/css.css" type="text/css" />
<script src="jquery-validate/lib/jquery.js" type="text/javascript"></script>
<script src="jquery-validate/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery-validate/demo/multipart/js/jquery.maskedinput-1.0.js"></script>
<script type="text/javascript" src="jquery-validate/demo/multipart/js/ui.core.js"></script>
<script src="jquery-validate/lib/jquery.metadata.js" type="text/javascript"></script>

<script type="text/javascript" src="jquery-validate/demo/multipart/js/ui.accordion.js"></script>

<script type="text/javascript">

$().ready(function() {
	//$("#txtMobile").mask("9999999999");
$.metadata.setType("attr", "validate");
	// validate signup form on keyup and submit
	$("#ColorForm").validate({
		rules: {
			txtName: {required:true},
			
		},
		messages: {
			txtName: " Please enter Color"
		
		}
	});
	
	var newsletter = $("#newsletter");
	// newsletter topics are optional, hide at first
	var inital = newsletter.is(":checked");
	var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
	var topicInputs = topics.find("input").attr("disabled", !inital);
	// show when newsletter is checked
	newsletter.click(function() {
		topics[this.checked ? "removeClass" : "addClass"]("gray");
		topicInputs.attr("disabled", !this.checked);
	
	
	});
});
</script>

</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF"><?php include("header.php");?></td>
      </tr>
      
      
      <tr>
        <td bgcolor="#FFFFFF"><form id="ColorForm" method="post" action="processColor.php" enctype="multipart/form-data">

                
         <table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">Change Color Details</td>
          </tr>
          <tr>
            <td>
           <?php 

   $a=$_GET["Color_id"];
 

   $query = "select * from color_mast where Color_id='".$a."'";
   
   $result= mysql_query($query) 
   or die (mysql_error());
   
   if($row=mysql_fetch_array($result))
   {
	?>     
           <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
              <tr>
                <td width="375" align="right" class="normal_fonts9">Color</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9 err_validate">
                <input name="txtColor" type="text" id="txtColor" class="normal_fonts9" size="40" value="<?php echo $row["Color"]; ?>" />
                <input name="hdnColid" type="hidden" id="hdnColid" value="<?php echo $row["Color_id"]; ?>" />
                </td>
              </tr>
              <tr>
                <td width="375" align="right" bgcolor="#F3F3F3" class="normal_fonts9">Attach Color file</td>
                <td width="10" align="center" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9 err_validate">
              
<input type="file" class="normal_fonts8" name="changefile" id="changefile" >
<?php echo $row["Color_image"]; ?>
               </td></tr>
            </table>
            <?php } ?>
        </td>
                          </tr>
                          <tr><td>
                          <table width="100%" border="0" cellpadding="5" cellspacing="0">
                          <tr>
                            <td align="right" class="normal_fonts9" width="375">&nbsp;</td>
                            <td align="center" class="normal_fonts9" width="10">&nbsp;</td>
                            <td class="normal_fonts9" ><input type="hidden" name="process" value="Edit" />
                            <input class="submit" name="submit" type="submit" align="middle" style="width:80px; height:30px" id="submit" value="Save" /></td>
                          </tr>
                          
                          </table>
                          </td></tr>
 
          </table>
          
</form>
</td>
      </tr>
    </table></td>
  </tr>
</table>

</body>
</html>