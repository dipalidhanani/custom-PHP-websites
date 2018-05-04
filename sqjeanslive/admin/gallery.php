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
<title>Welcome to SQ Jeans - Admin Panel</title>
<link rel="stylesheet" href="css/css.css" type="text/css" />
<?php
require_once("include/files.php");
?>
</head>
<body>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF"><?php include("header.php");?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="10" cellpadding="0">
      <?php
	  if($_REQUEST["action"]=="")
	  {
	  ?>
      <tr>
        <td align="right"><table border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td><a href="gallery.php?action=new"><img src="images/add.png" width="20" height="20" border="0" /></a></td>
            <td class="normal_fonts12_black"><a href="gallery.php?action=new">New Photo</a>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left"><table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
          <tr class="normal_fonts10">
            <td align="left" bgcolor="#999999"><strong>Title</strong></td>
            <td width="20%" align="center" bgcolor="#999999"><strong>Image</strong></td>
            <td width="15%" align="center" bgcolor="#999999"><strong>Display</strong></td>
            <td width="10%" align="center" bgcolor="#999999"><strong>Action</strong></td>
            </tr>
            <?php
			 $i=1;
			 $query="SELECT * FROM gallery_master order by gallery_name";			
			 $recordsetgallery = mysql_query($query);
			 while($rowgallery = mysql_fetch_array($recordsetgallery,MYSQL_ASSOC))
			 {	
			    if($i%2!=0)
				{
					$bg="#FFFFFF";
				}
				else 
				{
					$bg="#F3F3F3";
				}	
			?>
          <tr class="normal_fonts9">
            <td align="left" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $rowgallery["gallery_name"];?></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><a href="../images/gallery/<?php echo $rowgallery["gallery_image"];?>" rel="lightbox" title="<?php echo $rowgallery["gallery_name"];?>"><img src="../images/gallery/g<?php echo $rowgallery["gallery_image"];?>" alt="<?php echo $rowgallery["gallery_name"];?>" title="<?php echo $rowgallery["gallery_name"];?>" border="0" /></a></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>">
            <?php
			if($rowgallery["gallery_available"]==1)
			{
				echo "Yes";
			}
			else
			{
				echo "No";
			}
			?>            </td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                              <tr>
                                <td align="center"><a href="gallery.php?action=edit&galleryid=<?php echo $rowgallery["gallery_ID"];?>"><img src="images/edit.png" width="20" height="20" border="0" /></a></td>
                                <td align="center"><a href="process.php?process=removegallery&galleryid=<?php echo $rowgallery["gallery_ID"];?>" onClick="return confirm('Do you want to delete selected photo?')"><img src="images/delete_on.gif" width="20" height="20" border="0" /></a></td>
                              </tr>
                </table></td>
            </tr>
            <?php
			$i++;
			 }
			 ?>
        </table></td>
      </tr>
      <?php
	  }
	  if($_REQUEST["action"]=="new")
	  {
	  ?>
      <tr>
        <td align="left">
        <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">         
          <tr class="normal_fonts10">
            <td align="left" bgcolor="#999999"><strong>New Photo</strong></td>
            </tr>
            <tr class="normal_fonts9">
            <td align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
            <form name="galleryform" method="post" action="process.php" enctype="multipart/form-data">
          <tr>
            <td width="30%" align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Title</td>
            <td width="1%" align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><input name="galleryname" type="text" class="normal_fonts9" size="70" /></td>
          </tr>
          
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Photo Image</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="galleryimage" type="file" class="normal_fonts8" /></td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Description</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">
            <?php
            echo small_editor("galleryimage_details");
			?>
            </td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Display</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="radio" name="galleryavailable" value="1" checked="checked"/>
            &nbsp;Yes
            <input type="radio" name="galleryavailable" value="0"/>
            &nbsp;No</td>
          </tr>
          

          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">
            <input type="hidden" name="process" value="newgallery" />
            <input name="submit" type="submit" class="normal_fonts9" value="submit" /></td>
          </tr>
          </form>
            </table>            </td>
            </tr>
          </table>        </td>
      </tr>
      <?php
	  }
	  if($_REQUEST["action"]=="edit")
	  {
	  ?>
      <tr>
        <td align="left">
        <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">         
          <tr class="normal_fonts10">
            <td align="left" bgcolor="#999999"><strong>Change  Photo Details</strong></td>
            </tr>
            <tr class="normal_fonts9">
            <td align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
            <form name="galleryform" method="post" action="process.php" enctype="multipart/form-data">
           <?php
		   $query="SELECT * FROM gallery_master where gallery_ID='".$_REQUEST["galleryid"]."'";			
			 $recordsetgallery = mysql_query($query);
			 while($rowgallery = mysql_fetch_array($recordsetgallery,MYSQL_ASSOC))
			 {
			 ?>
           <tr>
            <td width="30%" align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Title</td>
            <td width="1%" align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><input name="galleryname" type="text" class="normal_fonts9" size="70" value="<?php echo $rowgallery["gallery_name"];?>" /></td>
          </tr>
          
          <tr>
            <td align="right" valign="top" class="normal_fonts9"> Image</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><img src="../images/gallery/g<?php echo $rowgallery["gallery_image"];?>" alt="<?php echo $rowgallery["gallery_name"];?>" title="<?php echo $rowgallery["gallery_name"];?>" /></td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Change  Image</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><input name="galleryimage" type="file" class="normal_fonts8" /></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Description</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><?php
            echo small_editor_value("galleryimage_details",$rowgallery["gallery_description"]);
			?></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Display</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="radio" name="galleryavailable" value="1" <?php if($rowgallery["gallery_available"]==1) { ?> checked="checked" <?php } ?>/>
            &nbsp;Yes
            <input type="radio" name="galleryavailable" value="0" <?php if($rowgallery["gallery_available"]==0) { ?> checked="checked" <?php } ?>/>
            &nbsp;No</td>
          </tr>
          

          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">  
            <input type="hidden" name="galleryimage_main" value="<?php echo $rowgallery["gallery_image"];?>" /> 
            <input type="hidden" name="galleryid" value="<?php echo $_REQUEST["galleryid"];?>" />
            <input type="hidden" name="process" value="editgallery" />
            <input name="submit" type="submit" class="normal_fonts9" value="submit" /></td>
          </tr>
          <?php
		  }
		  ?>
          </form>
            </table>            </td>
            </tr>
          </table>        </td>
      </tr>
      <?php
	  }
	  ?>
    </table></td>
  </tr>
  <tr>
    <td><?php include("footer.php");?></td>
  </tr>
</table>

</body>
</html>
