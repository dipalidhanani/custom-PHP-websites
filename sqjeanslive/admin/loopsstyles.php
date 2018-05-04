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
            <td><a href="loopsstyles.php?action=new"><img src="images/add.png" width="20" height="20" border="0" /></a></td>
            <td class="normal_fonts12_black"><a href="loopsstyles.php?action=new">New loops Style</a>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left"><table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
        <form name="loopsstyle" action="process.php" method="post">
          <tr class="normal_fonts10">
            <td align="left" bgcolor="#999999"><strong>Name</strong></td>
            <td width="20%" align="center" bgcolor="#999999"><strong>Image</strong></td>
            <td width="15%" align="center" bgcolor="#999999"><strong>Additional Price</strong></td>
            <td width="10%" align="center" bgcolor="#999999"><strong>Available</strong></td>
            <td width="10%" align="center" bgcolor="#999999"><strong>Details</strong></td>
            <td width="12%" align="center" bgcolor="#999999"><strong>Display Order</strong></td>
            <td width="12%" align="center" bgcolor="#999999"><strong>Set Default</strong></td>
            <td width="10%" align="center" bgcolor="#999999"><strong>Action</strong></td>
            </tr>
            <?php
			 $i=1;
			 $query="SELECT * FROM loops_style_master order by loops_style_name";			
			 $recordsetloops_style = mysql_query($query);
			 while($rowloops_style = mysql_fetch_array($recordsetloops_style,MYSQL_ASSOC))
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
            <td align="left" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $rowloops_style["loops_style_name"];?></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>">
            <a href="../images/loopsstyles/<?php echo $rowloops_style["loops_style_image"];?>" rel="lightbox" title="<?php echo $rowloops_style["loops_style_name"];?>"><img src="../images/loopsstyles/p<?php echo $rowloops_style["loops_style_image"];?>" alt="<?php echo $rowloops_style["loops_style_name"];?>" title="<?php echo $rowloops_style["loops_style_name"];?>" border="0" /></a></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $rowloops_style["loops_style_additional_charge"];?></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>">
            <?php
			if($rowloops_style["loops_style_available"]==1)
			{
				echo "Yes";
			}
			else if($rowloops_style["loops_style_available"]==0)
			{
				echo "No";
			}
			else if($rowloops_style["loops_style_available"]==2)
			{
				echo "For Resellers";
			}
			?>            </td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>">
            <img src="images/zoom.png" width="20" height="20" onclick="return hs.htmlExpand(this, { headingText: '<?php echo $rowloops_style["loops_style_name"];?>' })" style="cursor:pointer;"/>
            <div class="highslide-maincontent">
            <?php
			displayeditorvalue($rowloops_style["loops_style_desc"]);
			?>
            </div>            </td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>">
            <input type="hidden" name="loopsstyledisplayorderid<?php echo $i;?>" value="<?php echo $rowloops_style["loops_style_ID"];?>" />
            <input name="loopsstyledisplayorder<?php echo $i;?>" type="text" value="<?php echo $rowloops_style["loops_style_order"];?>" size="5" />
            </td>
            <td align="center" class="normal_fonts9" bgcolor="<?php echo $bg;?>">
           
           <input type="radio" name="loopsstyledefaultid" id="loopsstyledefaultid" value="<?php echo $rowloops_style["loops_style_ID"];?>" <?php if($rowloops_style["loops_style_default"]==1){echo "checked";} ?> />
            </td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                              <tr>
                                <td align="center"><a href="loopsstyles.php?action=edit&loopsstyleid=<?php echo $rowloops_style["loops_style_ID"];?>"><img src="images/edit.png" width="20" height="20" border="0" /></a></td>
                                <td align="center"><a href="process.php?process=removeloopsstyle&loopsstyleid=<?php echo $rowloops_style["loops_style_ID"];?>" onClick="return confirm('Do you want to delete selected loops style?')"><img src="images/delete_on.gif" width="20" height="20" border="0" /></a></td>
                              </tr>
                </table></td>
            </tr>
          
            <?php
			$i++;
			 }
			 ?>
             <tr class="normal_fonts9">
            <td align="left" valign="middle" bgcolor="<?php echo $bg;?>">&nbsp;</td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>">&nbsp;</td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>">&nbsp;</td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>">&nbsp;</td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>">&nbsp;</td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>">
           
            <input name="loopsstyleorder" type="submit" class="normal_fonts8" value="Change Order" /></td>
             <td align="center" valign="middle" bgcolor="<?php echo $bg;?>">
           
            <input name="loopsstyledefaultset" type="submit" class="normal_fonts8" value="Set Default" />
            </td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>">&nbsp;</td>
          </tr>
          </form>
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
            <td align="left" bgcolor="#999999"><strong>New loops Style</strong></td>
            </tr>
            <tr class="normal_fonts9">
            <td align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
            <form name="loops_styleform" method="post" action="process.php" enctype="multipart/form-data">
          <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Name</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="loopsstyle_name" type="text" class="normal_fonts9" size="70" /></td>
          </tr>
          
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Details</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">
			<?php
            echo small_editor("loopsstyle_details");
			?></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">loops Style Image</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="loopsstyle_image" type="file" class="normal_fonts8" />
              (W 400 px x H 400 px)</td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Addtional Price</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><input name="loops_addtional_price" type="text" class="normal_fonts9" size="10" value="0.00" /></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Available</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="radio" name="loopsstyle_available" value="1" checked="checked"/>
            &nbsp;Yes
            <input type="radio" name="loopsstyle_available" value="0"/>
            &nbsp;No
             <input type="radio" name="loopsstyle_available" value="2" />
            &nbsp;For Resellers
            </td>
          </tr>
          

          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">
            <input type="hidden" name="process" value="newloopsstyle" />
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
            <td align="left" bgcolor="#999999"><strong>Change  loops Style Details</strong></td>
            </tr>
            <tr class="normal_fonts9">
            <td align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
            <form name="loops_styleform" method="post" action="process.php" enctype="multipart/form-data">
           <?php
		   $query="SELECT * FROM loops_style_master where loops_style_ID='".$_REQUEST["loopsstyleid"]."'";			
			 $recordsetloops_style = mysql_query($query);
			 while($rowloops_style = mysql_fetch_array($recordsetloops_style,MYSQL_ASSOC))
			 {
			 ?>
           <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Name</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="loopsstyle_name" type="text" class="normal_fonts9" size="70" value="<?php echo $rowloops_style["loops_style_name"];?>" /></td>
          </tr>
          
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Details</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">
			<?php
            echo small_editor_value("loopsstyle_details",$rowloops_style["loops_style_desc"]);
			?></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">loops Style Image</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><img src="../images/loopsstyles/p<?php echo $rowloops_style["loops_style_image"];?>" alt="<?php echo $rowloops_style["loops_style_name"];?>" title="<?php echo $rowloops_style["loops_style_name"];?>" /></td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">loops Style Image</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><input name="loopsstyle_image" type="file" class="normal_fonts8" />
              (W 300 px x H 225 px)</td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Additional Price</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="loops_addtional_price" type="text" class="normal_fonts9" size="10" value="<?php echo $rowloops_style["loops_style_additional_charge"];?>" /></td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Available</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">
            <input type="radio" name="loopsstyle_available" value="1" <?php if($rowloops_style["loops_style_available"]==1) { ?> checked="checked" <?php } ?>/>
            &nbsp;Yes
            <input type="radio" name="loopsstyle_available" value="0" <?php if($rowloops_style["loops_style_available"]==0) { ?> checked="checked" <?php } ?>/>
            &nbsp;No
            <input type="radio" name="loopsstyle_available" value="2" <?php if($rowloops_style["loops_style_available"]==2) { ?> checked="checked" <?php } ?>/>
            &nbsp;For Resellers
            </td>
          </tr>
          

          <tr>
            <td align="right" valign="top" class="normal_fonts9">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top" class="normal_fonts9">  
            <input type="hidden" name="loopsstyle_imagemain" value="<?php echo $rowloops_style["loops_style_image"];?>" /> 
            <input type="hidden" name="loopsstyleid" value="<?php echo $_REQUEST["loopsstyleid"];?>" />
            <input type="hidden" name="process" value="editloopsstyle" />
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
