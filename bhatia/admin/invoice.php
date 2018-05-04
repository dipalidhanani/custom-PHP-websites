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
            <td class="normal_fonts14_black">Invoice Details</td>
            </tr>
          <tr>
            <td bgcolor="#CCCCCC">
            <form name="frmuser" method="post" action="#">
            <table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">
              <tr>
		        <td align="left" valign="middle" bgcolor="#999999"><strong>Invoice No</strong></td>      
		        <td align="left" valign="middle" bgcolor="#999999"><strong>Order No</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Billing Date</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Bill Amount</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Remaining Amount</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Payment Status</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Print Page</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Action</strong></td>
                </tr>
                 <?php
			  $query="select * from bill_mst order by  Billing_Id desc";
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
              	<td><?php echo $k['Invoice_No']; ?></td>
                <td><?php 
				$order=mysql_query("select * from order_mst where Order_Id='".$k['Order_Id']."'");
				$rows=mysql_num_rows($order);
				$or=mysql_fetch_array($order);
				echo $or['Order_No'];
				 ?></td>
                <td><?php echo $k['Billing_Date']; ?></td>
                <td><?php echo $k['Bill_Amount']; ?></td>
                <td><?php echo $k['Remaing_Amount']; ?></td>
                <td><?php echo $k['Status']; ?></td>
                <td align="left" valign="middle"><a href="invoice_print.php?eid=<?php echo $k['Billing_Id']; ?>" target="_blank">Print Page</a></td>
                <td width="80"><table width="80" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                  <td align="center"><a href="invoice_add.php?eid=<?php echo $k['Billing_Id']; ?>"><img src="images/zoom_in.png" alt="Edit" width="20" height="20" border="0" title="Edit" /></a></td>
                    <td align="center"><a href="invoice_view.php?eid=<?php echo $k['Billing_Id']; ?>"><img src="images/edit.png" alt="Edit" width="20" height="20" border="0" title="Edit" /></a></td>
                    <!--<td align="center"><a href="invoice_delete.php?eid=<?php echo $k['Billing_Id']; ?>"><img src="images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>-->
                  </tr>
                </table></td>
                </tr>
                <?php $i++; } ?> 
                <?php if($rows==0) { ?>
              <tr>
                <td colspan="8" align="center" valign="middle" bgcolor="#FFFFFF" class="normal_fonts12">No Record(s) Found</td>
                </tr>
               <?php } ?> 
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
                    <td width="25" align="left"><a href="#"></a></td>
                    <td align="left" class="normal_fonts9"><a href="#"></a></td>
                  </tr>
                </table></td>
                <td width="300" align="right" valign="middle" class="normal_fonts10">
                <?php
			$sql=$query;
			$query="SELECT COUNT(*) as num FROM bill_mst ".substr($query,23,strlen($query)) ;
			echo pages_wherequery($query,$sql,$perpage,"invoice.php?"); 
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
