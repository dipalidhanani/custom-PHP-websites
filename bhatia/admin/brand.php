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
        <td bgcolor="#FFFFFF"><table width="99%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>Brand  Details</td>
                <td width="150" align="left" valign="middle">Total Brand : <?php echo $db->numberofrows("brand_mst",""); ?> </td>
              </tr>
            </table></td>
            </tr>
          <tr>
            <td bgcolor="#CCCCCC">
            <form name="frmuser" method="post" action="#">
            <table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">
              <tr>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Brand Name</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Is Active</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Display Order</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Action</strong></td>
                </tr>
                 <?php
			  $query="select * from brand_mst order by Disp_Order";
			  $result=$db->pagingLimit($query,$startpoint,$perpage);	
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
                <td><a href="prod.php?eid=<?php echo $k['Brand_Id']; ?>&name=<?php echo $k['Name']; ?>"><?php echo $k['Name']; ?></a></td>
                <td><?php if($k['Is_Active']==1) { echo "Yes"; } else { echo "No"; } ?></td>
                <td><?php echo $k['Disp_Order']; ?></td>
                <td width="60"><table width="60" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center"><a href="brand_add.php?eid=<?php echo $k['Brand_Id']; ?>"><img src="images/edit.png" alt="Edit" width="20" height="20" border="0" title="Edit" /></a></td>
                    <td align="center"><a href="brand_delete.php?eid=<?php echo $k['Brand_Id']; ?>"><img src="images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>
                  </tr>
                </table></td>
                </tr>
                 <?php $i++; } ?> 
              </table>
            </form>
            </td>
          </tr>
          <tr>
            <td>
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="left" valign="middle"><table width="130" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="25" align="left"><a href="brand_add.php"><img src="images/add.png" alt="Add" width="20" height="20" border="0" title="Add"/></a></td>
                    <td align="left" class="normal_fonts9"><a href="brand_add.php">Add New Brand</a></td>
                  </tr>
                </table></td>
                <td width="300" align="right" valign="middle" class="normal_fonts10">
                <?php
			$sql=$query;
			$query="SELECT COUNT(*) as num FROM brand_mst ".substr($query,23,strlen($query)) ;
			echo pages_wherequery($query,$sql,$perpage,"brand.php?"); 
				?>
                </td>
              </tr>
            </table>
            </td>
          </tr>
          </table></td>
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
