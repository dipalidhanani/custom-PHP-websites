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
<title>Static Pages</title>
<link rel="stylesheet" href="css/css.css" type="text/css" />
</head>
<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border">
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF"><?php include("header.php");?></td>
      </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="10" cellpadding="0">
      <tr>
        <td class="normal_fonts14_black">Static Pages</td>
        <td width="35%" align="right">&nbsp;</td>
      </tr>  
      <?php
	  if($_REQUEST["action"]=="")
	  {
	  ?>
       <tr>
        <td colspan="2"><table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
          <tr class="normal_fonts10">
            <td align="left" bgcolor="#999999"><strong>Page Title</strong></td>
            <?php if($_REQUEST["level"]!=1) { ?><?php } ?>
            <td width="12%" bgcolor="#999999"><strong>Display Status</strong></td>
            <td width="10%" align="center" bgcolor="#999999"><strong>Action</strong></td>
            </tr>
            <?php 
			$recordsetpage = mysql_query("SELECT * FROM page_master order by page_ID");
			while($rowpage = mysql_fetch_array($recordsetpage,MYSQL_ASSOC))
			{
				$pageid=$rowpage["page_ID"];
				$pagetitle=$rowpage["page_title"];
				$pagecontent=$rowpage["page_content"];
				$pagestatus=$rowpage["page_content_active_status"];
			?>            
            <tr class="normal_fonts9">
            <td align="left" valign="top" bgcolor="<?php echo $bg;?>"><?php 			
			echo $pagetitle;
			?></td>
            <td align="center" valign="top" bgcolor="<?php echo $bg;?>"><?php 
			if($pagestatus==1)
			{
				echo "Yes";
			}
			else
			{
				echo "No";
			}
			?></td>
            <td align="center" valign="top" bgcolor="<?php echo $bg;?>"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                              <tr>
                                <td align="center">
                                <a href="pages.php?action=edit&pageid=<?php echo $pageid;?>"><img src="images/edit.png" border="0" /></a></td>                               
                              </tr>
                            </table></td>
            </tr>
           <?php
		   }
		   ?>
        </table></td>
      </tr>
      <?php
	  }
	  ?>
      <?php
	  if($_REQUEST["action"]=="edit")
	  {
	  ?>
       <tr>
        <td colspan="2"><table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
        <form name="healthtipsform" method="post" action="pageprocess.php" enctype="multipart/form-data">
          <?php
		  $recordsetpage = mysql_query("SELECT * FROM page_master where page_ID='".$_REQUEST["pageid"]."'");
		  while($rowpage = mysql_fetch_array($recordsetpage,MYSQL_ASSOC))
		  {
		  ?>
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Title</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><?php echo $rowpage["page_title"];?></td>
          </tr>
          <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9"> Description</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top"><?php echo full_editor_value("page_content",$rowpage["page_content"]);?></td>
          </tr>
          
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Display Status</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><input type="radio" name="displaystatus" value="1" <?php if($rowpage["page_content_active_status"]==1) { ?> checked="checked" <?php } ?> />&nbsp;Yes&nbsp;<input type="radio" name="displaystatus" value="0" <?php if($rowpage["page_content_active_status"]==0) { ?> checked="checked" <?php } ?>/>&nbsp;No</td>
          </tr>          
          <tr>
            <td align="right" valign="top" class="normal_fonts9">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top" class="normal_fonts9">            
            <input type="hidden" name="process" value="edit" />
            <input type="hidden" name="pageid" value="<?php echo $_REQUEST["pageid"];?>" />
            <input name="submit" type="submit" class="normal_fonts9" value="submit" /></td>
          </tr>
          <?php
		  }
		  ?>
          </form>
        </table></td>
      </tr> 
      <?php
	  }
	  ?>
    </table></td>
  </tr>
 </table></td>
  </tr>
  
  <tr>
        <td align="center" valign="middle">
        <?php  include("footer.php"); ?>
        </td>
  </tr>
</table>
</body>
</html>
