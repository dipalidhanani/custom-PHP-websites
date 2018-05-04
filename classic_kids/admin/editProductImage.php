<?php 
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Product Image</title>
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
     

<form name="productimageform" id="productimageform" action="processProduct.php" method="post" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="10" width="100%">
<tr>
            <td class="normal_fonts14_black">Image Detail</td>
</tr>
<?php 

   $a=$_GET["Image_id"];
 $productid=$_GET["Product_id"];

   $query = mysql_query("select * from product_image where Image_id='".$a."'");
   if($row=mysql_fetch_array($query))
   {
	?>
   
    <tr>
      <td width="329" align="right" class="normal_fonts9">Image :</td>
      <td align="left" class="normal_fonts9">  Larger :&nbsp;
      <input name="doc1" type="hidden" value="<?php echo $row["Large_image"]; ?>" />
        <input type="file" name="larger" id="larger"  /><?php echo $row["Large_image"];?>
        <input type="hidden" name="hdnProductid" value="<?php echo $productid;?>"  />
        <input type="text" name="hdnImageid" value="<?php echo $a;?>" />
    </tr>
    
    
    <?php } ?>
     
    <tr>
    <td></td>
    <td class="normal_fonts9" ><input type="hidden" name="process" value="editimage" />
                <input class="submit" name="submit" type="submit" align="middle" style="width:80px; height:30px" id="submit" value="Change" />
    </td>
    </tr>
  </table>
</form>

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