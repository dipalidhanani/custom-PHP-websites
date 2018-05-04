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
        <td align="right"><!--<table border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td><a href="measurement.php?action=new"><img src="images/add.png" width="20" height="20" border="0" /></a></td>
            <td class="normal_fonts12_black"><a href="measurement.php?action=new">New Measurement</a>&nbsp;</td>
          </tr>
        </table>--></td>
      </tr>
      <tr>
        <td align="left"><table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
          <tr class="normal_fonts10">
            <td align="left" bgcolor="#999999"><strong>Name</strong></td>
            <td width="15%" align="center" bgcolor="#999999"><strong>Make My Jeans</strong></td>
            <td width="5%" align="center" bgcolor="#999999"><strong>Details</strong></td>
            <td width="15%" align="center" bgcolor="#999999"><strong>Copy a Jeans</strong></td>
            <td width="5%" align="center" bgcolor="#999999"><strong>Details</strong></td>
            <td width="10%" align="center" bgcolor="#999999"><strong>Display</strong></td>
            
            <td width="10%" align="center" bgcolor="#999999"><strong>Action</strong></td>
            </tr>
            <?php
			 $i=1;
			 $query="SELECT * FROM measurement_master order by measurement_ID";			
			 $recordsetmeasurement = mysql_query($query);
			 while($rowmeasurement = mysql_fetch_array($recordsetmeasurement,MYSQL_ASSOC))
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
            <td align="left" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $rowmeasurement["measurement_name"];?></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>">
            <a href="../images/measurement/makemyjeans/<?php echo $rowmeasurement["measurement_make_image"];?>" rel="lightbox" title="<?php echo $rowmeasurement["measurement_name"];?> - Make My Jeans">
            <img src="../images/measurement/makemyjeans/m<?php echo $rowmeasurement["measurement_make_image"];?>" alt="<?php echo $rowmeasurement["measurement_name"];?>" title="<?php echo $rowmeasurement["measurement_name"];?>" border="0" /></a>            </td>
            
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>">
            <img src="images/zoom.png" width="20" height="20" onclick="return hs.htmlExpand(this, { headingText: '<?php echo $rowmeasurement["measurement_name"];?> - Make My Jeans' })" style="cursor:pointer;"/>
            <div class="highslide-maincontent">
            <?php
			displayeditorvalue($rowmeasurement["measurement_make_desc"]);
			?>
            </div>            </td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><a href="../images/measurement/copyajeans/<?php echo $rowmeasurement["measurement_copy_image"];?>" rel="lightbox" title="<?php echo $rowmeasurement["measurement_name"];?> - Copy A Jeans">
            <img src="../images/measurement/copyajeans/m<?php echo $rowmeasurement["measurement_copy_image"];?>" alt="<?php echo $rowmeasurement["measurement_name"];?>" title="<?php echo $rowmeasurement["measurement_name"];?>" border="0" /></a></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><img src="images/zoom.png" width="20" height="20" onclick="return hs.htmlExpand(this, { headingText: '<?php echo $rowmeasurement["measurement_name"];?> - Copy A Jeans' })" style="cursor:pointer;"/>
            <div class="highslide-maincontent">
            <?php
			displayeditorvalue($rowmeasurement["measurement_copy_desc"]);
			?>
            </div></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>">
            <?php
			if($rowmeasurement["measurement_available"]==1)
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
                                <td align="center"><a href="measurement.php?action=edit&measurementid=<?php echo $rowmeasurement["measurement_ID"];?>"><img src="images/edit.png" width="20" height="20" border="0" /></a></td>
                                <td align="center"><a href="process.php?process=removemeasurement&measurementid=<?php echo $rowmeasurement["measurement_ID"];?>" onClick="return confirm('Do you want to delete selected measurement?')"><img src="images/delete_on.gif" width="20" height="20" border="0" /></a></td>
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
            <td align="left" bgcolor="#999999"><strong>New Measurement</strong></td>
            </tr>
            <tr class="normal_fonts9">
            <td align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
            <form name="measurementform" method="post" action="process.php" enctype="multipart/form-data">
          <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Name</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="measurementname" type="text" class="normal_fonts9" size="70" /></td>
          </tr>
          
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Make My Jeans Details</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">
			<?php
            echo small_editor("measurementdetails");
			?></td>
          </tr>
          
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Make My Jeans Image</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="measurementimage" type="file" class="normal_fonts8" />
              (W 400 px x H 400 px)</td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Copy A  Jeans Details</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">
			<?php
            echo small_editor("copy_measurementdetails");
			?></td>
          </tr>
          
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Copy A Jeans Image</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="copy_measurementimage" type="file" class="normal_fonts8" />
              (W 400 px x H 400 px)</td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Display</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">
            <input type="radio" name="measurementavailable" value="1" checked="checked"/>
            &nbsp;Yes
            <input type="radio" name="measurementavailable" value="0"/>
            &nbsp;No</td>
          </tr>
          

          <tr>
            <td align="right" valign="top" class="normal_fonts9">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="hidden" name="process" value="newmeasurement" />
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
            <td align="left" bgcolor="#999999"><strong>Change  Measurement Details</strong></td>
            </tr>
            <tr class="normal_fonts9">
            <td align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
            <form name="measurementform" method="post" action="process.php" enctype="multipart/form-data">
           <?php
		     $query="SELECT * FROM measurement_master where measurement_ID='".$_REQUEST["measurementid"]."'";			
			 $recordsetmeasurement = mysql_query($query);
			 while($rowmeasurement = mysql_fetch_array($recordsetmeasurement,MYSQL_ASSOC))
			 {
			 ?>
           <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Name</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="measurementname" type="text" class="normal_fonts9" size="70" value="<?php echo $rowmeasurement["measurement_name"];?>" /></td>
          </tr>
          
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Make My Jeans Details</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">
			<?php
            	echo small_editor_value("measurementdetails",$rowmeasurement["measurement_make_desc"]);
			?></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Make My Jeans Image</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><img src="../images/measurement/makemyjeans/m<?php echo $rowmeasurement["measurement_make_image"];?>" alt="<?php echo $rowmeasurement["measurement_name"];?>" title="<?php echo $rowmeasurement["measurement_name"];?>" /></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Change Make My Jeans Image</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="measurementimage" type="file" class="normal_fonts8" />
              (W 400 px x H 300 px)</td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Copy A  Jeans Details</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">
			<?php
            	echo small_editor_value("copy_measurementdetails",$rowmeasurement["measurement_copy_desc"]);
			?></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Copy A  Jeans Image</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><img src="../images/measurement/copyajeans/m<?php echo $rowmeasurement["measurement_copy_image"];?>" alt="<?php echo $rowmeasurement["measurement_name"];?>" title="<?php echo $rowmeasurement["measurement_name"];?>" /></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Change Copy A Jeans Image</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="copy_measurementimage" type="file" class="normal_fonts8" />
              (W 400 px x H 300 px)</td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Display</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="radio" name="measurementavailable" value="1" <?php if($rowmeasurement["measurement_available"]==1) { ?> checked="checked" <?php } ?>/>
            &nbsp;Yes
            <input type="radio" name="measurementavailable" value="0" <?php if($rowmeasurement["measurement_available"]==0) { ?> checked="checked" <?php } ?>/>
            &nbsp;No</td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"> 
          <input type="hidden" name="measurementimage_main" value="<?php echo $rowmeasurement["measurement_make_image"];?>" /> 
          <input type="hidden" name="copy_measurementimage_main" value="<?php echo $rowmeasurement["measurement_copy_image"];?>" />          <input type="hidden" name="measurementid" value="<?php echo $_REQUEST["measurementid"];?>" />
          <input type="hidden" name="process" value="editmeasurement" />
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

<!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=7213366; 
var sc_invisible=1; 
var sc_security="329c0566"; 
</script>
<script type="text/javascript"
src="http://www.statcounter.com/counter/counter.js"></script>
<noscript><div class="statcounter"><a title="visit tracker
on tumblr" href="http://statcounter.com/tumblr/"
target="_blank"><img class="statcounter"
src="http://c.statcounter.com/7213366/0/329c0566/1/"
alt="visit tracker on tumblr"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->

</body>
</html>
