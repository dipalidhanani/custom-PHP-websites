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
        <td align="left" class="normal_fonts14_black"><?php displaymaterialname($_REQUEST["materialid"]);?></td>
        <td width="35%" align="right"><table border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td><a href="washtreatment.php?action=new&materialid=<?php echo $_REQUEST["materialid"];?>"><img src="images/add.png" width="20" height="20" border="0" /></a></td>
            <td class="normal_fonts12_black"><a href="washtreatment.php?action=new&materialid=<?php echo $_REQUEST["materialid"];?>">New Wash Treatment</a>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td colspan="2" align="left"><table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
          <tr class="normal_fonts10">
            <td align="left" bgcolor="#999999"><strong>Name</strong></td>
            <td width="20%" align="center" bgcolor="#999999"><strong>Image</strong></td>
            <td width="15%" align="center" bgcolor="#999999"><strong>Price</strong></td>
            <td width="10%" align="center" bgcolor="#999999"><strong>Available</strong></td>
            <td width="10%" align="center" bgcolor="#999999"><strong>Details</strong></td>
            <td width="10%" align="center" bgcolor="#999999"><strong>Action</strong></td>
            </tr>
            <?php
			 $i=1;
			 $query="SELECT * FROM material_wash_treatment_relation
			 INNER JOIN wash_treatment_master ON 
			 wash_treatment_master.wash_treatment_ID=material_wash_treatment_relation.wash_treatment_master_ID
			 where material_master_ID='".$_REQUEST["materialid"]."'
			  order by wash_treatment_master.wash_treatment_ID";			
			 $recordsetwash_treatment = mysql_query($query);
			 while($rowwash_treatment = mysql_fetch_array($recordsetwash_treatment,MYSQL_ASSOC))
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
            <td align="left" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $rowwash_treatment["wash_treatment_name"];?></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><a href="../images/washtreatments/<?php echo $rowwash_treatment["wash_treatment_image"];?>" rel="lightbox" title="<?php echo $rowwash_treatment["wash_treatment_name"];?>"><img src="../images/washtreatments/wt<?php echo $rowwash_treatment["wash_treatment_image"];?>" alt="<?php echo $rowwash_treatment["wash_treatment_name"];?>" title="<?php echo $rowwash_treatment["wash_treatment_name"];?>" border="0" /></a></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $rowwash_treatment["wash_treatment_price"];?></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>">
            <?php
			if($rowwash_treatment["wash_treatment_available"]==1)
			{
				echo "Yes";
			}
			else 
			{
				echo "No";
			}
			
			?>            </td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>">
            <img src="images/zoom.png" width="20" height="20" onclick="return hs.htmlExpand(this, { headingText: '<?php echo $rowwash_treatment["wash_treatment_name"];?>' })" style="cursor:pointer;"/>
            <div class="highslide-maincontent">
            <?php
			displayeditorvalue($rowwash_treatment["wash_treatment_description"]);
			?>
            </div>
            </td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                              <tr>
                                <td align="center"><a href="washtreatment.php?action=edit&washtreatmentid=<?php echo $rowwash_treatment["mw_realtion_ID"];?>"><img src="images/edit.png" width="20" height="20" border="0" /></a></td>
                                <td align="center"><a href="process.php?process=removewashtreatment&washtreatmentid=<?php echo $rowwash_treatment["mw_realtion_ID"];?>&materialid=<?php echo $_REQUEST["materialid"];?>" onClick="return confirm('Do you want to delete selected wash treatment?')"><img src="images/delete_on.gif" width="20" height="20" border="0" /></a></td>
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
        <td colspan="2" align="left">
        <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">         
          <tr class="normal_fonts10">
            <td align="left" bgcolor="#999999"><strong>New Wash Treatment - <?php displaymaterialname($_REQUEST["materialid"]);?></strong></td>
            </tr>
            <tr class="normal_fonts9">
            <td align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
            <form name="wash_treatmentform" method="post" action="process.php" enctype="multipart/form-data">
          <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Name</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <select name="washtreatment" class="normal_fonts9">
            <?php
			 $recordsetwashtreatment_types = mysql_query("select * from wash_treatment_master where wash_treatment_active_status=1 order by wash_treatment_ID");
			 while($rowwashtreatment_types = mysql_fetch_array($recordsetwashtreatment_types,MYSQL_ASSOC))
			 {
			 ?>
            <option value="<?php echo $rowwashtreatment_types["wash_treatment_ID"];?>"><?php echo $rowwashtreatment_types["wash_treatment_name"];?></option>
             <?php
			 }
			 ?>
            </select>
            </td>
          </tr>
          
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Details</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">
			<?php
            echo small_editor("washtreatment_details");
			?></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Wash Treatment Image</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="washtreatment_image" type="file" class="normal_fonts8" /> 
            (W 400 px x H 400 px)</td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Price</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><input name="washtreatment_price" type="text" class="normal_fonts9" size="10" /></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Available</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="radio" name="washtreatment_available" value="1" checked="checked"/>
            &nbsp;Yes
            <input type="radio" name="washtreatment_available" value="0"/>
            &nbsp;No
             </td>
          </tr>
          

          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">
            <input type="hidden" name="materialid" value="<?php echo $_REQUEST["materialid"];?>" />
            <input type="hidden" name="process" value="newwashtreatment" />
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
        <td colspan="2" align="left">
        <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">         
          <tr class="normal_fonts10">
            <td align="left" bgcolor="#999999"><strong>Change  Wash Treatment Details</strong></td>
            </tr>
            <tr class="normal_fonts9">
            <td align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
            <form name="wash_treatmentform" method="post" action="process.php" enctype="multipart/form-data">
           <?php
		   $query="SELECT * FROM material_wash_treatment_relation
			 INNER JOIN wash_treatment_master ON 
			 wash_treatment_master.wash_treatment_ID=material_wash_treatment_relation.wash_treatment_master_ID		   
		     where mw_realtion_ID='".$_REQUEST["washtreatmentid"]."'";			
			 $recordsetwash_treatment = mysql_query($query);
			 while($rowwash_treatment = mysql_fetch_array($recordsetwash_treatment,MYSQL_ASSOC))
			 {
			 ?>
           <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Name</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <select name="washtreatment" class="normal_fonts9">
            <?php
			 $recordsetwashtreatment_types = mysql_query("select * from wash_treatment_master where wash_treatment_active_status=1 order by wash_treatment_ID");
			 while($rowwashtreatment_types = mysql_fetch_array($recordsetwashtreatment_types,MYSQL_ASSOC))
			 {
			 ?>
            <option value="<?php echo $rowwashtreatment_types["wash_treatment_ID"];?>"<?php print($rowwashtreatment_types["wash_treatment_ID"])==$rowwash_treatment["wash_treatment_master_ID"]?"Selected":"";?>><?php echo $rowwashtreatment_types["wash_treatment_name"];?></option>
             <?php
			 }
			 ?>
            </select></td>
          </tr>
          
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Details</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">
			<?php
            echo small_editor_value("washtreatment_details",$rowwash_treatment["wash_treatment_description"]);
			?></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Wash Treatment Image</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><img src="../images/washtreatments/wt<?php echo $rowwash_treatment["wash_treatment_image"];?>" alt="<?php echo $rowwash_treatment["wash_treatment_name"];?>" title="<?php echo $rowwash_treatment["wash_treatment_name"];?>" /></td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Wash Treatment Image</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><input name="washtreatment_image" type="file" class="normal_fonts8" />
              (W 300 px x H 225 px)</td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Price</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="washtreatment_price" type="text" class="normal_fonts9" size="10" value="<?php echo $rowwash_treatment["wash_treatment_price"];?>" /></td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Available</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">
            <input type="radio" name="washtreatment_available" value="1" <?php if($rowwash_treatment["wash_treatment_available"]==1) { ?> checked="checked" <?php } ?>/>
            &nbsp;Yes
            <input type="radio" name="washtreatment_available" value="0" <?php if($rowwash_treatment["wash_treatment_available"]==0) { ?> checked="checked" <?php } ?>/>
            &nbsp;No            
            </td>
          </tr>
          

          <tr>
            <td align="right" valign="top" class="normal_fonts9">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top" class="normal_fonts9">  
            <input type="hidden" name="washtreatment_imagemain" value="<?php echo $rowwash_treatment["wash_treatment_image"];?>" />			            <input type="hidden" name="materialid" value="<?php echo $rowwash_treatment["material_master_ID"];?>" />            
            <input type="hidden" name="washtreatmentid" value="<?php echo $_REQUEST["washtreatmentid"];?>" />
            <input type="hidden" name="process" value="editwashtreatment" />
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
