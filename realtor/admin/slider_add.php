<?php session_start();
	include("include/config.php");
	require_once("include/function.php");
u_Connect("cn");
	$slider=mysql_query("select * from slider_mst where slider_Id='".$_REQUEST['eid']."'");
	$k=mysql_fetch_array($slider);
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Slider Management</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/menu_style.css" type="text/css" />
<style type="text/css">
<!--
body {
	background-color: #E8E8E8;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border">
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF"><?php include("header.php");?></td>
      </tr>
          <tr>
            <td bgcolor="#FFFFFF">
                <!-- main starts here  -->   
                <table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black"><a href="slider.php">Slider Details</a></td>
            </tr>
          <tr>
            <td>
            <?php if($_REQUEST['eid']=='') { ?>
            <form name="frmbrand"  method="post" action="slider_process.php" enctype="multipart/form-data">
            <?php } else { ?>
            <form name="frmbrand"  method="post" action="slider_process.php?is_edit=1" enctype="multipart/form-data">
            <input type="hidden" name="txtid" value="<?php echo $k['slider_Id']; ?>" />
            <?php } ?>
            <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
              <tr>
                <td align="right" bgcolor="#f3f3f3" class="normal_fonts9">Image</td>
                <td align="center" bgcolor="#f3f3f3" class="normal_fonts9">:</td>
                <td bgcolor="#f3f3f3" class="normal_fonts9">
                <input name="image" id="image" type="file" />
			    <input name="hidden" type="hidden" value="1" />
			    <input type="hidden" name="existing_file_value" value="<?php echo $k['is_Image']; ?>" /><?php echo $k['is_Image']; ?>
    			(Width: 500px  Height: 400px)
                </td>
              </tr>
              <tr>
                <td align="right" class="normal_fonts9">Display Order</td>
                <td align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9"><input name="order" type="text" class="normal_fonts9" id="order" size="10" value="<?php echo $k['disp_Order']; ?>" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#f3f3f3" class="normal_fonts9">Select Category</td>
                <td align="center" bgcolor="#f3f3f3" class="normal_fonts9">:</td>
                <td bgcolor="#f3f3f3" class="normal_fonts9">
                <select name="category_link" id="category_link">
                <option value="">Select</option>
                <?php
				$recordsetcat = mysql_query("select * from category_master where parent_category_ID=0 order by category_name ",$cn);
				$catc=1;
				while($rowcat1 = mysql_fetch_array($recordsetcat,MYSQL_ASSOC))
				{
                ?>                                   
                <option value="<?php echo $rowcat1["category_ID"]; ?>" <?php if($rowcat1["category_ID"]==$k["category_link_id"]){echo "selected";} ?> ><?php echo $rowcat1["category_name"]; ?></option>                
                <?php } ?>
                </select>
                </td>
              </tr>
              <tr>
                <td height="10" colspan="3" align="right" class="normal_fonts9"></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#FFFFFF" class="normal_fonts9">&nbsp;</td>
                <td align="center" bgcolor="#FFFFFF" class="normal_fonts9">&nbsp;</td>
                <td bgcolor="#FFFFFF" class="normal_fonts9"><input name="button4" type="submit" class="normal_fonts12_black" id="button4" style="width:80px; height:30px" value="Submit" />&nbsp;&nbsp;<input name="back" type="button" class="normal_fonts12_black" id="back" style="width:80px; height:30px" value="Back" onclick="history.go(-1)" /></td>
              </tr>
              <tr>
                <td height="10" colspan="3" align="right" class="normal_fonts9"></td>
                </tr>
            </table>
            </form>
            </td>
          </tr>
          </table>
          
           <!-- main ends here  -->
            
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
