<?php
session_start();
include("include/config.php");

if($_SESSION['Admin_id'] == "")
	{
			//echo "Unauthorised Access !!!";die;
			echo "<script>location.href='login.php';</script>";
			exit();
	}


	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to VIP AUTO - Feature</title>
<link href="../css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../menu_style.css" type="text/css" />
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
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
      <tr>
        <td><table width="1000" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td bgcolor="#FFFFFF"> <?php include("headerAdmin.php");?></td>
          </tr>
          <tr>
            <td height="10" bgcolor="#FFFFFF"></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">
            
                <!-- main starts here  -->  
                <table width="100%" border="0" cellspacing="10" cellpadding="0">
      
         
      <?php
	  if($_REQUEST["action"]=="edit")
	  {
	  $recordsetcategory = mysql_query("SELECT * FROM  bike_specification_mast where Feature_ID='".$_REQUEST["categoryid"]."'");
	  while($rowcategory = mysql_fetch_array($recordsetcategory,MYSQL_ASSOC))
	  {
	  ?>
      <?php
	  }
	  }
	  ?>
      <tr>
        <td class="normal_fonts14_black">Features & Specifications</td>
       <td align="right" class="normal_fonts14_black"><table border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td><a href="feature.php?action=new"><img src="../images/add.png" width="20" height="20" border="0" /></a></td>
            <td class="normal_fonts12_black"><a href="feature.php?action=new">New Feature & Specifications</a>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <?php
	  if($_REQUEST["action"]=="")
	  {
	  ?>
      <tr>
        <td colspan="2"><table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
          <tr>
            <td width="5%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>No.</strong></td>
            <td align="left" bgcolor="#999999" class="normal_fonts10"><strong>Category Name</strong></td>
            <?php  if($_REQUEST["list"]=="sub") { ?><?php } ?>
            <td width="5%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Active</strong></td>
            <td width="10%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Action</strong></td>
          </tr>
          <?php
		  
		  $query="SELECT * FROM  bike_specification_mast where Parent_feature_ID=0 order by Feature_ID";
		  
		  $no=1;
		  $recordsetcategory = mysql_query($query);
		  while($rowcategory = mysql_fetch_array($recordsetcategory,MYSQL_ASSOC))
		  {
					$bg="#F3F3F3";
			 
			 ?>
          <tr>
            <td align="center" class="normal_fonts9" bgcolor="<?php echo $bg;?>"> <?php echo $no++;?> </td>
            <td class="normal_fonts9" bgcolor="<?php echo $bg;?>"><strong><?php echo $rowcategory["Feature_name"];?></strong></td>
            <?php  if($_REQUEST["list"]=="sub") { ?><?php } ?>
             <td align="center" class="normal_fonts9" bgcolor="<?php echo $bg;?>">
            <?php
			if($rowcategory["Feature_active_status"]==1)
			{
				echo "Yes";
			}
			else
			{
				echo "No";	
			}
			?>            </td>
           
            
             <td align="center" bgcolor="<?php echo $bg;?>"><table border="0" cellspacing="1" cellpadding="1">
                      <tr>
                        <td align="center" valign="top">
                       
                        <a href="feature.php?action=edit&parentcategory=<?php echo $_REQUEST["categoryid"];?>&categoryid=<?php echo $rowcategory["Feature_ID"];?>"><img src="../images/edit.png" border="0" /></a>
                        </td>
                      </tr>
                </table></td>
          </tr>
          
          
          <?php
		  $recordsetcategory1 = mysql_query("SELECT * FROM  bike_specification_mast where Parent_feature_ID='".$rowcategory["Feature_ID"]."'");
			  while($rowcategory1 = mysql_fetch_array($recordsetcategory1,MYSQL_ASSOC))
			  {  
			  
					$bg="#FFFFFF";
			 
		  ?>
          
                <tr>
            <td align="center" class="normal_fonts9" bgcolor="<?php echo $bg;?>"></td>
            <td class="normal_fonts9" bgcolor="<?php echo $bg;?>"><?php echo $rowcategory1["Feature_name"];?></td>
            
             <td align="center" class="normal_fonts9" bgcolor="<?php echo $bg;?>">
            <?php
			if($rowcategory1["Feature_active_status"]==1)
			{
				echo "Yes";
			}
			else
			{
				echo "No";	
			}
			?>            </td>
           
            
             <td align="center" bgcolor="<?php echo $bg;?>"><table border="0" cellspacing="1" cellpadding="1">
                      <tr>
                        <td align="center" valign="top">
                       
                        <a href="feature.php?action=edit&parentcategory=<?php echo $_REQUEST["categoryid"];?>&categoryid=<?php echo $rowcategory1["Feature_ID"];?>"><img src="../images/edit.png" border="0" /></a>
                        </td>
                      </tr>
                </table></td>
          </tr>
				<?php  
			  }
			 }
			 ?>
        </table></td>
      </tr>
     
      <?php
	  }
	  ?>
      <?php
	  if($_REQUEST["action"]=="new")
	  {
	  ?>
       <tr>
        <td colspan="2"><table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
        <form name="categoryform" method="post" action="processFeature.php" enctype="multipart/form-data">          
          <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Category Name</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top"><input name="categoryname" type="text" class="normal_fonts9" size="45" /></td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Parent Category</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">
            <select name="parentcategory" class="normal_fonts9">
            <option value="" >Select</option>
            		<?php
                      $recordsetcategory = mysql_query("SELECT * FROM  bike_specification_mast where Parent_feature_ID=0 order by Feature_ID");
                      while($rowcategory = mysql_fetch_array($recordsetcategory,MYSQL_ASSOC))
                      {
                      ?>
             <option value="<?php echo $rowcategory["Feature_ID"];?>"<?php print($rowcategory["Feature_ID"])==$_REQUEST["parentcategory"]?"Selected":"";?>><?php echo $rowcategory["Feature_name"];?></option>
             		<?php
					  }
					  ?>
            </select>
            </td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Category Active Status</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input type="radio" name="categorystatus" value="1" checked="checked" />&nbsp;Yes&nbsp;<input type="radio" name="categorystatus" value="0"/>&nbsp;No</td>
          </tr>
          
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">  
              <input type="hidden" name="process" value="addcategory" />          
              <input name="submit" type="submit" class="normal_fonts9" value="Submit" /></td>
          </tr>
          </form>
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
        <form name="categoryform" method="post" action="processFeature.php" enctype="multipart/form-data">
        <?php
		$recordsetcategory = mysql_query("SELECT * FROM  bike_specification_mast where Feature_ID='".$_REQUEST["categoryid"]."'");
	  while($rowcategory = mysql_fetch_array($recordsetcategory,MYSQL_ASSOC))
	  {
		  ?>
          <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Category Name</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top"><input name="categoryname" type="text" class="normal_fonts9" size="45" value="<?php echo $rowcategory["Feature_name"];?>" /></td>
          </tr>
          
         
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Parent Category</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><select name="parentcategory" class="normal_fonts9">
            <option value="0" >Select</option>
            		<?php
                      $recordsetparentcategory = mysql_query("SELECT * FROM  bike_specification_mast where Parent_feature_ID=0 order by Feature_ID");
                      while($rowparentcategory = mysql_fetch_array($recordsetparentcategory,MYSQL_ASSOC))
                      {
                      ?>
             <option value="<?php echo $rowparentcategory["Feature_ID"];?>"<?php print($rowparentcategory["Feature_ID"])==$rowcategory["Parent_feature_ID"]?"Selected":"";?>><?php echo $rowparentcategory["Feature_name"];?></option>
             		<?php
					  }
					  ?>
            </select></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Category Active Status</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input type="radio" name="categorystatus" value="1" <?php  if($rowcategory["Feature_active_status"]==1) { ?> checked="checked" <?php } ?>/>&nbsp;Yes&nbsp;<input type="radio" name="categorystatus" value="0" <?php  if($rowcategory["Feature_active_status"]==0) { ?> checked="checked" <?php } ?>/>&nbsp;No</td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"> 
              <input type="hidden" name="categoryid" value="<?php echo $_REQUEST["categoryid"];?>" />
              <input type="hidden" name="process" value="editcategory" />          
              <input name="submit" type="submit" class="normal_fonts9" value="Submit" /></td>
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
    </table> 
     <!-- main ends here  -->
            
         </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="10"></td>
      </tr>
      <tr>
        <td align="center" valign="middle">
        <?php  include("footer.php"); ?>
        
        </td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
