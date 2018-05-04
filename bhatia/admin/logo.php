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
	
	$brand=mysql_query("select * from prod_mst where Prod_Id='".$_REQUEST['eid']."'") or die(mysql_error());
	$b=mysql_fetch_array($brand);
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
        <td height="125" align="left" valign="top" bgcolor="#FFFFFF"><?php include('header.php'); ?></td>
      </tr>
      <tr>
        <td height="2" bgcolor="#000000"></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><?php include('menu.php'); ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">Barnd Logo Details</td>
            </tr>
          <tr>
            <td bgcolor="#CCCCCC">
            <form name="frmprod"  method="post" action="#">
            <table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">
              <tr>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Image</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Display Order</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Action</strong></td>
              </tr>
               <?php
			   if($_REQUEST['eid']!='')
			   {
			  		$query="select * from logo_mst where Logo_Id='".$_REQUEST['eid']."' order by Disp_Order";
			   }
			   else
			   {
				   $query="select * from logo_mst order by Disp_Order";
			   }
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
              <tr>
                <td bgcolor="#FFFFFF"><img src="../logo/<?php echo $k['Is_Image']; ?>" height="40"  border="0" /></td>
                <td bgcolor="#FFFFFF"><?php echo $k['Disp_Order']; ?></td>
                <td width="40" bgcolor="#FFFFFF"><table width="40" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center"><a href="logo_add.php?eid=<?php echo $k['Logo_Id']; ?>&pid=<?php echo $j['Prod_Id']; ?>"><img src="images/edit.png" alt="Edit" width="20" height="20" border="0" title="Edit" /></a></td>
                    <td align="center"><a href="logo_delete.php?eid=<?php echo $k['Logo_Id']; ?>"><img src="images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>
                  </tr>
                </table></td>
              </tr>
              <?php $i++; } ?> 
              </table>
            </form>
            </td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="25" align="right" valign="middle"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="left" valign="middle"><table width="130" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="25" align="left"><a href="logo_add.php?pid=<?php echo $_REQUEST['eid'] ?>"><img src="images/add.png" alt="Add" width="20" height="20" border="0" title="Add"/></a></td>
                        <td align="left" class="normal_fonts9"><a href="logo_add.php?pid=<?php echo $_REQUEST['eid'] ?>">Add New Logos</a></td>
                      </tr>
                    </table></td>
                    <td width="300" align="right" valign="middle" class="normal_fonts10"><?php
			$sql=$query;
			$query="SELECT COUNT(*) as num FROM logo_mst ".substr($query,23,strlen($query)) ;
			echo pages_wherequery($query,$sql,$perpage,"logo.php?"); 
				?></td>
                  </tr>
                </table></td>
                </tr>
            </table></td>
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
