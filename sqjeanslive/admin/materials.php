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
            <td><a href="materials.php?action=new"><img src="images/add.png" width="20" height="20" border="0" /></a></td>
            <td class="normal_fonts12_black"><a href="materials.php?action=new">New Fabric</a>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left"><table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
          <form name="materialform" action="process.php" method="post">
          <tr class="normal_fonts10">
            <td width="10%" align="left" bgcolor="#999999"><strong>Name</strong></td>
             <td align="left" bgcolor="#999999" width="15%"><strong>Fabric For</strong></td>
            <td width="10%" align="center" bgcolor="#999999"><strong>Available</strong></td>
            <td width="6%" align="center" bgcolor="#999999"><strong>Details</strong></td>
            <td width="14%" align="center" bgcolor="#999999"><strong>Wash Treatment</strong></td>
            <td width="17%" align="center" bgcolor="#999999"><strong>Display Order For Men</strong></td>
            <td width="18%" align="center" bgcolor="#999999"><strong>Display Order For Women</strong></td>
            <td width="10%" align="center" bgcolor="#999999"><strong>Action</strong></td>
            </tr>
            <?php
			 $i=1;
			 $query="SELECT * FROM material_master order by material_name";			
			 $recordsetmaterial = mysql_query($query);
			 while($rowmaterial = mysql_fetch_array($recordsetmaterial,MYSQL_ASSOC))
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
            <td align="left" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $rowmaterial["material_name"];?></td>
              <td align="left" valign="middle" bgcolor="<?php echo $bg;?>">
               <?php
			if($rowmaterial["fabric_for"]==1)
			{
				echo "For Men Only";
			}
			else if($rowmaterial["fabric_for"]==2)
			{
				echo "For Women Only";
			}
			else if($rowmaterial["fabric_for"]==3)
			{
				echo "For Men & Women Both";
			}
			?>   
              </td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>">
            <?php
			if($rowmaterial["material_available"]==1)
			{
				echo "Yes";
			}
			else if($rowmaterial["material_available"]==0)
			{
				echo "No";
			}
			else if($rowmaterial["material_available"]==2)
			{
				echo "For Resellers";
			}
			?>            </td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>">
            <img src="images/zoom.png" width="20" height="20" onclick="return hs.htmlExpand(this, { headingText: 'Fabric Details' })" style="cursor:pointer;"/>
            <div class="highslide-maincontent">
            <?php
			if($rowmaterial["fabric_for"]==1)
			{
				echo "For Men Only";
			}
			else if($rowmaterial["fabric_for"]==2)
			{
				echo "For Women Only";
			}
			else if($rowmaterial["fabric_for"]==3)
			{
				echo "For Men & Women Both";
			}
			displayeditorvalue($rowmaterial["material_desc"]);
			?>
            </div>            </td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><a href="washtreatment.php?materialid=<?php echo $rowmaterial["material_ID"];?>"><img src="images/zoom.png" width="20" height="20" border="0" /></a></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>">
            <input type="hidden" name="materialdisplayorderid<?php echo $i;?>" value="<?php echo $rowmaterial["material_ID"];?>" />
            
            <input name="materialdisplayordermen<?php echo $i;?>" type="text" value="<?php echo $rowmaterial["material_display_order_men"];?>" size="5" /> 
            
            </td>
             <td align="center" valign="middle" bgcolor="<?php echo $bg;?>">
           
            <input name="materialdisplayorderwomen<?php echo $i;?>" type="text" value="<?php echo $rowmaterial["material_display_order_women"];?>" size="5" /> 
            
            </td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                              <tr>
                                <td align="center"><a href="materials.php?action=edit&materialid=<?php echo $rowmaterial["material_ID"];?>"><img src="images/edit.png" width="20" height="20" border="0" /></a></td>
                                <td align="center"><a href="process.php?process=removematerial&materialid=<?php echo $rowmaterial["material_ID"];?>" onClick="return confirm('Do you want to delete selected material?')"><img src="images/delete_on.gif" width="20" height="20" border="0" /></a></td>
                              </tr>
                </table></td>
            </tr>
          
            <?php
			$i++;
			 }
			 ?>
            <tr class="normal_fonts9">
            <td align="left" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">
           
            <input name="process" type="submit" class="normal_fonts8" value="Change Order Men" />
            </td>
             <td align="center" valign="middle">
          
            <input name="process" type="submit" class="normal_fonts8" value="Change Order Women" />
            </td>
            <td align="center" valign="middle">&nbsp;</td>
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
            <td align="left" bgcolor="#999999"><strong>New Fabric</strong></td>
            </tr>
            <tr class="normal_fonts9">
            <td align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
            <form name="materialform" method="post" action="process.php" enctype="multipart/form-data">
          <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Name</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="materialname" type="text" class="normal_fonts9" size="70" /></td>
          </tr>
           <tr  bgcolor="#F3F3F3">
            <td align="right" valign="top" class="normal_fonts9">Fabric For</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="radio" name="fabric_for" id="fabric_for" value="1" />
            &nbsp;Men
            <input type="radio" name="fabric_for" id="fabric_for" value="2"/>
            &nbsp;Women
             <input type="radio" name="fabric_for" id="fabric_for" value="3"/>
            &nbsp;Both
            </td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Details</td>
            <td align="left" valign="top" >:</td>
            <td align="left" valign="top" class="normal_fonts9">
			<?php
            echo small_editor("materialdetails");
			?></td>
          </tr>
          
          <tr  bgcolor="#F3F3F3">
            <td align="right" valign="top" class="normal_fonts9">Available</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="radio" name="materialavailable" value="1" checked="checked"/>
            &nbsp;Yes
            <input type="radio" name="materialavailable" value="0"/>
            &nbsp;No
              <input type="radio" name="materialavailable" value="2" />
            &nbsp;For Resellers
            </td>
          </tr>
          

          <tr>
            <td align="right" valign="top" class="normal_fonts9">&nbsp;</td>
            <td align="left" valign="top" >&nbsp;</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="hidden" name="process" value="newmaterial" />
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
            <td align="left" bgcolor="#999999"><strong>Change  Fabric Details</strong></td>
            </tr>
            <tr class="normal_fonts9">
            <td align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
            <form name="materialform" method="post" action="process.php" enctype="multipart/form-data">
           <?php
		     $query="SELECT * FROM material_master where material_ID='".$_REQUEST["materialid"]."'";			
			 $recordsetmaterial = mysql_query($query);
			 while($rowmaterial = mysql_fetch_array($recordsetmaterial,MYSQL_ASSOC))
			 {
			 ?>
           <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Name</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="materialname" type="text" class="normal_fonts9" size="70" value="<?php echo $rowmaterial["material_name"];?>" /></td>
          </tr>
           <tr>
            <td align="right" valign="top" class="normal_fonts9" bgcolor="#F3F3F3">Fabric For</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" class="normal_fonts9" bgcolor="#F3F3F3">
            <input type="radio" name="fabric_for" value="1" <?php if($rowmaterial["fabric_for"]==1) { ?> checked="checked" <?php } ?>/>
            &nbsp;Men
            <input type="radio" name="fabric_for" value="2" <?php if($rowmaterial["fabric_for"]==2) { ?> checked="checked" <?php } ?>/>
            &nbsp;Women
             <input type="radio" name="fabric_for" value="3" <?php if($rowmaterial["fabric_for"]==3) { ?> checked="checked" <?php } ?>/>
            &nbsp;Both
            </td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Details</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
			<?php
            echo small_editor_value("materialdetails",$rowmaterial["material_desc"]);
			?></td>
          </tr>
          <tr bgcolor="#F3F3F3">
            <td align="right" valign="top" class="normal_fonts9">Available</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="radio" name="materialavailable" value="1" <?php if($rowmaterial["material_available"]==1) { ?> checked="checked" <?php } ?>/>
            &nbsp;Yes
            <input type="radio" name="materialavailable" value="0" <?php if($rowmaterial["material_available"]==0) { ?> checked="checked" <?php } ?>/>
            &nbsp;No
             <input type="radio" name="materialavailable" value="2" <?php if($rowmaterial["material_available"]==2) { ?> checked="checked" <?php } ?>/>
            &nbsp;For Resellers
            </td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">&nbsp;</td>
            <td align="left" valign="top" >&nbsp;</td>
            <td align="left" valign="top" class="normal_fonts9">  
            <input type="hidden" name="materialid" value="<?php echo $_REQUEST["materialid"];?>" />
            <input type="hidden" name="process" value="editmaterial" />
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
