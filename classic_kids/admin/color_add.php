<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>

<html>
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
	$("#frmColor").validate({
		rules: {
			txtColor: {required:true},
			
		},
		messages: {
			txtColor: " Please enter Color"
		
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
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>     
   <td><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
   <tr>
    <td><table width="1000" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF"><?php include("header.php");?></td>
      </tr>
      
      
      <tr>
        <td bgcolor="#FFFFFF">
     
     <!--   main starts here-->
     
     <form class="cmxform" id="frmColor" name="frmColor" method="post" action="processColor.php" enctype="multipart/form-data">
  
                
         <table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">Add New Color</td>
          </tr>
          <tr>
            <td>
           <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
              <tr>
                <td width="375" align="right" class="normal_fonts9">Color</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9 err_validate">
                <input name="txtColor" type="text" id="txtColor" class="normal_fonts9" size="40" /></td>
              </tr>
              <tr>
                <td width="375" align="right" bgcolor="#F3F3F3" class="normal_fonts9">Attach color image</td>
                <td width="10" align="center" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9 err_validate">
                <input name="colorfile" type="file" id="colorfile" class="normal_fonts9" size="40" /></td>
              </tr>
              
                       
            </table>
            </td>
          </tr>
                          <tr><td>
                          <table width="100%" border="0" cellpadding="5" cellspacing="0">
                          <tr>
                            <td align="right" class="normal_fonts9" width="375">&nbsp;</td>
                            <td align="center" class="normal_fonts9" width="10">&nbsp;</td>
                            <td class="normal_fonts9" >
                            <input type="hidden" name="process" value="Add" />
                            <input class="submit" name="submit" type="submit" align="middle" style="width:80px; height:30px" id="submit" value="Submit" /></td>
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
