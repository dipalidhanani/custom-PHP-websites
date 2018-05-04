<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect(); 
	require_once ('pagination/pagination.php');
	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	$page = ($page == 0 ? 1 : $page);
	$perpage = PAGE_LIMIT;//limit in each page
	$startpoint = ($page * $perpage) - $perpage;
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ADMIN_TITLE; ?></title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/menu_style.css" type="text/css" />
<link rel="stylesheet" href="pagination/style2.css" type="text/css" />

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
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="125" align="left" valign="top" bgcolor="#FFFFFF"><?php include('header.php');  ?></td>
      </tr>
      <tr>
        <td height="2" bgcolor="#000000"></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><?php include('menu.php'); ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF">
         <?php if($_REQUEST['eid']!='') { ?>
            <form name="frmcat" method="post" action="cat_title_process.php?is_edit=1">
            <?php } else { ?>
            <form name="frmcat" method="post" action="cat_title_process.php">
            <?php } ?>
        
        <table width="99%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black"><a href="cat_title.php">Product Specification Category Title Details</a></td>
            </tr>
          <tr>
            <td bgcolor="#CCCCCC">
            <table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">
              <tr>
                <td width="250" align="left" valign="middle" bgcolor="#999999"><strong>Product Specification Category</strong></td>
                <td width="150" align="left" valign="middle" bgcolor="#999999"><strong>Title</strong></td>
                <td width="150" align="left" valign="middle" bgcolor="#999999"><strong>Dispaly Order</strong></td>
                <td width="350" align="left" valign="middle" bgcolor="#999999"><strong>Description</strong></td>
                </tr>
              <?php
			  if($_REQUEST['eid']!='') {
			  $query="select * from prod_title order by Disp_Order";
			  $result=mysql_query($query);
			  $i=1;
			  while($k=mysql_fetch_array($result))
			  {
				  if($i%2==0)
				  {
					  $color='#FFFFFF';
				  }
				  else
				  {
					  $color='#F3F3F3';
				  }
				  
			  ?>
              <tr bgcolor="<?php echo $color; ?>">
               <td align="left" valign="middle">
               <select  name="cat_<?php echo $i; ?>" style="width:150px;">
               <option>Select One</option>
               <?php $cat_detail=mysql_query("select * from prod_desc_cat order by Disp_Order");
			   while($ct=mysql_fetch_array($cat_detail)) { ?>
               <option value="<?php echo $ct['Prod_Desc_Cat_Id']; ?>" <?php if($ct['Prod_Desc_Cat_Id']==$k['Prod_Desc_Cat_Id']) { ?> selected="selected" <?php } ?>><?php echo $ct['Category']; ?></option>
               <?php } ?>
               </select>
               </td>
               <td align="left" valign="middle"><input name="title_<?php echo $i; ?>" type="text" value="<?php echo $k['Title']; ?>" size="30" /></td>
               <td align="left" valign="middle"><input name="dispo_<?php echo $i; ?>" type="text" value="<?php echo $k['Disp_Order']; ?>" size="30" /></td>
               <td align="left" valign="middle"><input name="desc_<?php echo $i; ?>" type="text" value="<?php echo $k['Description']; ?>" size="50" /></td>
                </tr>
                 <?php $i++; } } else { ?> 
                   <tr>
    	           <td align="left" valign="middle" bgcolor="#FFFFFF">
                   <select  name="cat" style="width:150px;">
               <option>Select One</option>
               <?php $cat_detail=mysql_query("select * from prod_desc_cat order by Disp_Order");
			   while($ct=mysql_fetch_array($cat_detail)) { ?>
               <option value="<?php echo $ct['Prod_Desc_Cat_Id']; ?>"><?php echo $ct['Category']; ?></option>
               <?php } ?>
               </select>
                   </td>
	               <td align="left" valign="middle" bgcolor="#FFFFFF"><input type="text" name="title" value="" /></td>
                   <td align="left" valign="middle" bgcolor="#FFFFFF"><input type="text" name="disp_order" value="" /></td>
                    <td align="left" valign="middle" bgcolor="#FFFFFF"><input type="text" name="desc" value="" size="40" /></td>
                </tr>
                 <?php } ?>
              </table>
           
            </td>
          </tr>
          <tr>
            <td align="center" valign="middle" class="normal_fonts10"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr><td align="center" valign="middle"><input type="submit" name="Submit" value="Submit" class="normal_fonts14_black" /></td></tr>
            </table>
            
            </td>
          </tr>
          </table>
          
           </form>
          </td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>
