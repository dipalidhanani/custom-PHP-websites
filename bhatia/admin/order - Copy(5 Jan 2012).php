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
	$today=date('Y-m-d');
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ADMIN_TITLE; ?></title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/menu_style.css" type="text/css" />
<link rel="stylesheet" href="pagination/style2.css" type="text/css" />
<script src="calender/js/format1.js"></script>
    <script src="calender/js/format.js"></script>
    <link rel="stylesheet" type="text/css" href="calender/css/format.css" />
    <link rel="stylesheet" type="text/css" href="calender/css/border-radius.css" />
    <link rel="stylesheet" type="text/css" href="calender/steel/steel.css" />
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
            <td class="normal_fonts14_black">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
            
              <tr>
                <td width="250" height="35" align="left" valign="middle">Order Details</td>
                <td width="150" align="left" valign="middle">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3" align="center"><table width="630" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="right" valign="middle"><form action="order.php" method="get"  name="txtordernosearch" id="txtordernosearch">
                      <table width="300" border="0" align="center" cellpadding="3" cellspacing="0" class="border">
                        <tr>
                          <td class="normal_fonts10">Search By :</td>
                          <td align="center" valign="middle"><span class="normal_fonts10">Order No.</span></td>
                          <td><input name="txtfindorder" type="text" id="txtfindorder" size="10" /></td>
                          <td><input name="find" type="submit" class="normal_fonts10" value="GO" /></td>
                        </tr>
                      </table>
                    </form></td>
                    <td class="normal_fonts10"><strong>&nbsp;OR&nbsp;&nbsp;</strong></td>
                    <td><form id="form2" name="form1" method="post" action="#">
                      <table width="270" border="0" cellpadding="3" cellspacing="0" class="border">
                        <tr>
                          <td align="right" class="normal_fonts10"> Payment Status </td>
                          <td align="center" valign="middle" class="normal_fonts10">:</td>
                          <td><select name="ostatus2" class="normal_fonts10" id="ostatus2" onchange="this.form.submit();">
                            <option value="0">Select One</option>
                            <option value="All">Select All</option>
                            <option value="Pending" <?php if($k['Payment_Status']=='Pending') { ?> selected="selected" <?php } ?>>Pending</option>
                            <option value="Completed" <?php if($k['Payment_Status']=='Completed') { ?> selected="selected" <?php } ?>>Completed</option>
                            <option value="Cancelled" <?php if($k['Payment_Status']=='Cancelled') { ?> selected="selected" <?php } ?>>Cancelled</option>
                            <option value="Failed" <?php if($k['Payment_Status']=='Failed') { ?> selected="selected" <?php } ?>>Failed</option>
                            <option value="Proceed to Payment" <?php if($k['Payment_Status']=='Proceed to Payment') { ?> selected="selected" <?php } ?>>Proceed to Payment</option>
                          </select></td>
                        </tr>
                      </table>
                    </form></td>
                    <td>&nbsp;</td>
                    <td align="left" valign="middle" class="normal_fonts10">&nbsp;</td>
                  </tr>
                </table></td>
                </tr>
              <tr>
                <td align="left" valign="middle">&nbsp;</td>
                <td align="left" valign="middle">&nbsp;</td>
                <td align="right" valign="middle" class="normal_fonts12_black">&nbsp;</td>
              </tr>
                
              <tr>
                <td colspan="3" align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center"><form id="form1" name="form1" method="post" action="#">
                      <table width="200" border="0" cellpadding="3" cellspacing="0" class="border">
                        <tr>
                          <td align="right" class="normal_fonts10"> Order Status </td>
                          <td align="center" valign="middle" class="normal_fonts10">:</td>
                          <td><select name="ostatus" class="normal_fonts10" id="ostatus" onchange="this.form.submit();">
                            <option value="0">Select One</option>
                            <option value="All">Select All</option>
                            <option value="Pending" <?php if($k['Order_Status']=='Pending') { ?> selected="selected" <?php } ?>>Pending</option>
                            <option value="Completed" <?php if($k['Order_Status']=='Completed') { ?> selected="selected" <?php } ?>>Completed</option>
                            <option value="Cancelled" <?php if($k['Order_Status']=='Cancelled') { ?> selected="selected" <?php } ?>>Cancelled</option>
                             <option value="In Shipping" <?php if($k['Order_Status']=='In Shipping') { ?> selected="selected" <?php } ?>>In Shipping</option>
                          </select></td>
                        </tr>
                      </table>
                    </form></td>
                    <td align="center" class="normal_fonts10"><strong>OR</strong></td>
                    <td align="center">
                    <form name="frmonlydate" method="get" action="order.php">
                    <table width="240" border="0" cellpadding="3" cellspacing="0" class="border">
                      <tr class="normal_fonts10">
                        <td>Select Date</td>
                        <td>:</td>
                        <td>
                        <input name="only_date" type="text" class="normal_fonts10" id="only_date" size="12" value="<?php echo $_REQUEST['only_date']; ?>" />
                            <script type="text/javascript">

      var cal = Calendar.setup({
          onSelect: function(cal) { cal.hide() }
      });
     
      cal.manageFields("only_date", "only_date", "%e/%B/%Y");
     
                      </script>
                        </td>
                        <td><input type="submit" name="search" value="Go" /></td>
                      </tr>
                    </table>
                    </form>
                    </td>
                    <td align="center" class="normal_fonts10"><strong>OR</strong></td>
                    <td align="center"><form action="order.php" method="get" name="frmsearch" id="frmsearch">
                      <table width="400" border="0" cellpadding="3" cellspacing="0" class="border">
                        <tr>
                          <td align="right" class="normal_fonts9">From Date </td>
                          <td>&nbsp;
                            <input name="date1" type="text" class="normal_fonts10" id="fdate" size="12" value="<?php echo $_REQUEST['date1']; ?>" />
                            <script type="text/javascript">

      var cal = Calendar.setup({
          onSelect: function(cal) { cal.hide() }
      });
     
      cal.manageFields("fdate", "fdate", "%e/%B/%Y");
     
                      </script></td>
                          <td align="center" class="normal_fonts9">To Date</td>
                          <td><input name="date2" type="text" class="normal_fonts10"  id="tdate" size="12"  value="<?php echo $_REQUEST['date2']; ?>"/>
                            <script type="text/javascript">

      var cal = Calendar.setup({
          onSelect: function(cal) { cal.hide() }
      });
     
      cal.manageFields("tdate", "tdate", "%e/%B/%Y");
     
                      </script></td>
                          <td align="left">&nbsp;
                            <input name="go" type="submit" class="button" value="Go" id="go" /></td>
                          <td></td>
                        </tr>
                      </table>
                    </form></td>
                    <td width="50" align="right">
                    <a href="export_order_excel.php" title="Export to Excel"><img src="images/excel.png" width="28" height="28" border="0" /></a>
                    </td>
                  </tr>
                </table></td>
                </tr>
            </table>
          
            </td>
            </tr>
          <tr>
            <td bgcolor="#CCCCCC">
            <form name="frmuser" method="post" action="#">
            <table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">
              <tr>
		        <td align="left" valign="middle" bgcolor="#999999"><strong>Cust Name</strong></td>      
		        <td align="left" valign="middle" bgcolor="#999999"><strong>Order No</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Order Date</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Amount</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Pay Mode</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Order Status</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Payment Status</strong></td>
                <td width="60" align="left" valign="middle" bgcolor="#999999"><strong>Invoice</strong></td>
                <td width="60" align="left" valign="middle" bgcolor="#999999"><strong>Receipt</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Action</strong></td>
                </tr>
               <?php
			   if($_REQUEST['ostatus']=='Pending')
			   {
			  		$query="select * from order_mst where Order_Status='Pending' order by  Order_Id desc";
			   }
			   else if($_REQUEST['ostatus']=='Completed')
			   {
			  		$query="select * from order_mst where Order_Status='Completed' order by  Order_Id desc";
			   }
			   else if($_REQUEST['ostatus']=='Cancelled')
			   {
			  		$query="select * from order_mst where Order_Status='Cancelled' order by  Order_Id desc";
			   }
			   else if($_REQUEST['ostatus2']=='Pending')
			   {
			  		$query="select * from order_mst where Payment_Status='Pending' order by  Order_Id desc";
			   }
			   else if($_REQUEST['ostatus2']=='Completed')
			   {
			  		$query="select * from order_mst where Payment_Status='Completed' order by  Order_Id desc";
			   }
			   else if($_REQUEST['ostatus2']=='Failed')
			   {
			  		$query="select * from order_mst where Payment_Status='Failed' order by  Order_Id desc";
			   }
			   else if($_REQUEST['ostatus2']=='Proceed to Payment')
			   {
			  		$query="select * from order_mst where Payment_Status='Proceed to Payment' order by  Order_Id desc";
			   }
			   else if($_REQUEST['ostatus2']=='Cancelled')
			   {
			  		$query="select * from order_mst where Payment_Status='Cancelled' order by  Order_Id desc";
			   }
			   else if($_REQUEST['ostatus']=='In Shipping')
			   {
			  		$query="select * from order_mst where Order_Status='In Shipping' order by  Order_Id desc";
			   }
			   else if($_REQUEST['ostatus']=='All')
			   {
			  		$query="select * from order_mst order by  Order_Id desc";
			   }
			   else if($_REQUEST['ostatus2']=='All')
			   {
			  		$query="select * from order_mst order by  Order_Id desc";
			   }
			   else if($_REQUEST['st']=='1')
			   {
			  		$query="select * from order_mst where Order_Date='".$today."' order by Order_Id Desc";
			   }
			   else if($_REQUEST['st']=='2')
			   {
			  		$query="select * from order_mst where Order_Date='".$today."' and Order_Status='Pending' order by Order_Id Desc";
			   }
			   else if($_REQUEST['st']=='3')
			   {
			  		$query="select * from order_mst where Order_Date='".$today."' and Order_Status='Completed' order by Order_Id Desc";
			   }
			   else if($_REQUEST['st']=='4')
			   {
			  		$query="select * from order_mst where Order_Date='".$today."' and Is_Cancelled='1' order by Order_Id Desc";
			   }
			   else if($_REQUEST['go']!='')
			   {
					$today1=date('Y-m-d');
					$fdate=split("/",$_REQUEST['date1']);
					$r=$fdate[2]."-".$fdate[1]."-".$fdate[0];
					$tdate=split("/",$_REQUEST['date2']);
					$t=$tdate[2]."-".$tdate[1]."-".$tdate[0];
					$query="select * from order_mst where Order_Date between '".$r."' and '".$t."' and Is_Cancelled='0' order by Order_Id Desc";
					
			   }
			   else if($_REQUEST['search']!='')
			   {
				   $search_date=split("/",$_REQUEST['only_date']);
				   $searchdate=$search_date[2]."-".$search_date[1]."-".$search_date[0];
				   $query="select * from order_mst where Order_Date='".$searchdate."' and Is_Cancelled='0' order by Order_Id Desc";
				   
			   }
			   else if($_GET['find']!='')
			   {
				    $query="select * from order_mst where Order_No like'%".$_GET['txtfindorder']."%' and Is_Cancelled='0' order by Order_Id Desc";
			   }
			   else
			   {
				   $query="select * from order_mst order by  Order_Id desc";
			   }
			 // echo $query; 
			 $_SESSION['query']=$query;
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
              	<td><?php 
				$cust_qry=mysql_query("select * from user_mst where User_Id='".$k['User_Id']."'");
				$rows=mysql_num_rows($cust_qry);
				$cust=mysql_fetch_array($cust_qry);
				echo $cust['First_Name']." ".$cust['Middle_Name']." ".$cust['Last_Name'];
				; ?></td>
                <td><?php echo $k['Order_No']; ?></td>
                <td><?php echo date('d/m/Y',strtotime($k['Order_Date'])); ?></td>
                <td><?php echo $k['Amount']; ?></td>
                <td><?php echo $k['Pay_Mode']; ?></td>
                <td><?php echo $k['Order_Status']; ?></td>
                <td><?php echo $k['Payment_Status']; ?></td>
                <td align="center"><a href="invoice_add.php?eid=<?php echo $k['Order_Id']; ?>"><img src="images/invoice.png" width="17" height="18"  border="0" /></a></td>
                 <td align="center"><a href="invoice_print.php?eid=<?php echo $k['Order_Id']; ?>" target="_blank"><img src="images/print.png" width="20" height="20" border="0" /></a></td>
                <td width="60"><table width="60" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center"><a href="order_add.php?eid=<?php echo $k['Order_Id']; ?>"><img src="images/edit.png" alt="Edit" width="20" height="20" border="0" title="Edit" /></a></td>
                    <!--<td align="center"><a href="order_delete.php?eid=<?php echo $k['Order_Id']; ?>"><img src="images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>-->
                  </tr>
                </table></td>
                </tr>
                 <?php $i++; } ?> 
               <?php if($rows==0) { ?>  
              <tr>
                <td colspan="10" align="center" valign="middle" bgcolor="#FFFFFF" class="normal_fonts12">No Record(s) Found</td>
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
			$query="SELECT COUNT(*) as num FROM order_mst ".substr($query,23,strlen($query)) ;
			if($_REQUEST['osstatus']!='')
			{
				echo pages_wherequery($query,$sql,$perpage,"order.php?ostatus=".$_REQUEST['ostatus']."&"); 
			}
			if($_REQUEST['osstatus2']!='')
			{
				echo pages_wherequery($query,$sql,$perpage,"order.php?ostatus2=".$_REQUEST['ostatus2']."&"); 
			}
			else if($_REQUEST['st']!='')
			{
				echo pages_wherequery($query,$sql,$perpage,"order.php?st=".$_REQUEST['st']."&"); 
			}
			else if($_REQUEST['go']!='')
			{
				echo pages_wherequery($query,$sql,$perpage,"order.php?date1=".$_REQUEST['date1']."&date2=".$_REQUEST['date2']."&go=".$_REQUEST['go']."&"); 
			}
			else if($_REQUEST['search']!='')
			{
				echo pages_wherequery($query,$sql,$perpage,"order.php?only_date=".$_REQUEST['only_date']."&search=".$_REQUEST['search']."&"); 
			}
			else
			{
				echo pages_wherequery($query,$sql,$perpage,"order.php?");
			}
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
