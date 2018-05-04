<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Product Images</title>
</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border">
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF"><?php include("header.php");?></td>
      </tr>
      
      
      <tr>
        <td bgcolor="#FFFFFF">
     
     <!--   main starts here-->
<form name="productimageform" id="productimageform" action="processProduct.php" method="post" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">Add More Images</td>
          </tr>
          <tr>
            <td>
           <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">

<?php 

   $a=$_GET["Product_id"];
 $type=$_GET["type"];
 

   $query = mysql_query("select * from product_image where Product_mast_id='".$a."'");
   
  
   $totalfiles=mysql_num_rows($query);
  
	   
	?>
    <?php if($totalfiles!=5)
{  $j=1;
	for($f=1;$f<=5-$totalfiles;$f++)
	{
	
?>    

    <tr>
      <td align="right" class="normal_fonts9" >&nbsp;</td>
      <td align="right" class="normal_fonts9" > Image<?php echo $j;?> : Larger :&nbsp;</td>
      <td align="center" class="normal_fonts9" ><input type="file" class="normal_fonts9" name="larger[]" id="larger[]"  /></td>
      <td align="left" class="normal_fonts9" >Any Size (Display in Zooming Frame)
        <input type="hidden" name="hdnProductid" value="<?php echo $a;?>"  />
        <input type="hidden" name="hdnType" value="<?php echo $type;?>"  /></td>
        
    </tr>
  
    
    <?php $j++; } } ?>
     
    
 </table>
  </td></tr>
  
                          <tr><td>
                          <table width="100%" border="0" cellpadding="5" cellspacing="0">
                          <tr>
                            <td align="right" class="normal_fonts9" width="375">&nbsp;</td>
                            <td align="center" class="normal_fonts9" width="10">&nbsp;</td>
                            <td class="normal_fonts9" >
                            <input type="hidden" name="process" value="addimage" />
                <input class="submit" name="submit" type="submit" align="middle" style="width:80px; height:30px" id="submit" value="Add" /></td>
                          </tr>
                          
                          </table>
  </td></tr></table>
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