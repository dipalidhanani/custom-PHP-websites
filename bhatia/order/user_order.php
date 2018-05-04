<?php session_start();
	require_once("../admin/config.inc.php");
	require_once("../admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	require_once ('../pagination/pagination.php');
	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	$page = ($page == 0 ? 1 : $page);
	$perpage = 10;//limit in each page
	$startpoint = ($page * $perpage) - $perpage;
	if($_SESSION['buserid']=='')
	{?>
	<script language="javascript">
	window.location='<?php echo HTTP_BASE_URL; ?>index.php';
	</script>
	<?php }?>
<link href="<?php echo HTTP_BASE_URL_ORDER; ?>css/css1.css" rel="stylesheet" type="text/css" />
<link href="<?php echo HTTP_BASE_URL_ORDER; ?>pagination/style2.css" rel="stylesheet" type="text/css" />

<link href="css/home.css" rel="stylesheet" type="text/css" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="5"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_01.jpg" width="5" height="41" /></td>
                        <td align="left" valign="top" background="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_02.jpg" style="background-repeat:repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="6" colspan="2" align="left" valign="middle"></td>
                            </tr>
                          <tr>
                            <td width="30" align="left" valign="middle"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/Arrow.png" width="24" height="24" /></td>
                            <td class="title">User Orders</td>
                            </tr>
                          </table></td>
                        <td width="5"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_04.jpg" width="5" height="41" /></td>
                        </tr>
                      </table></td>
                    </tr>
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
                      <tr>
                        <td height="30" align="right" valign="bottom" bgcolor="#FFFFFF">
                       
                        <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" style="padding-left:10px;">
                          <tr>
                            <td align="left" valign="middle" class="title_11">
                              <table width="500" border="0" cellpadding="5" cellspacing="0" class="border2">
                                <tr>
                                  <td>
                                   <form action="<?php echo HTTP_BASE_URL_ORDER; ?>myaccount.php" method="get" name="frmsearch">
                                   <input type="hidden" name="pageno" value="2" />
                                  <table width="270" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="20">&nbsp;</td>
                                      <td class="title_10">Select Order Status</td>
                                      <td width="15" align="center">:</td>
                                      <td><select name="ostatus" class="title_10" id="ostatus" onchange="this.form.submit();">
                                        <option value="0">Select One</option>
                                        <option value="All">Select All</option>
                                        <option value="Pending" <?php if($k['Order_Status']=='Pending') { ?> selected="selected" <?php } ?>>Pending</option>
                                        <option value="Completed" <?php if($k['Order_Status']=='Completed') { ?> selected="selected" <?php } ?>>Completed</option>
                                        <option value="Cancelled" <?php if($k['Order_Status']=='Cancelled') { ?> selected="selected" <?php } ?>>Cancelled</option>
                                      </select></td>
                                    </tr>
                                  </table>
                                 </form>
                                  </td>
                                  <td><strong>OR</strong></td>
                                  <td>
                                  <form action="<?php echo HTTP_BASE_URL_ORDER; ?>myaccount.php?pageno=2" method="post" name="frmordersearch">
                                  <input type="hidden" name="pageno" value="2" />
                                  <table width="250" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td class="title_10">Order No.</td>
                                      <td width="20" align="center">:</td>
                                      <td><input  name="txtorderno" type="text" class="title_10" id="txtorderno" size="10"  /></td>
                                      <td><input type="submit" name="submit" value="Go" /></td>
                                    </tr>
                                  </table>
                                  </form>
                                  </td>
                                </tr>
                            </table></td>
                            <td width="200" align="right" valign="middle"><input type="button" name="back" value="&lt;&lt; Go Back" class="button" style="width:90px;" onclick="javascript:history.go(-1);"/>&nbsp;&nbsp;</td>
                          </tr>
                        </table>

                                                  </td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                          <tr>
                            <td><table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" style="padding:5px;">
                              <tr class="title_9">
                                <td height="30" align="left" valign="middle" bgcolor="#CCCCCC"><strong>Order No</strong></td>
                                <td align="left" valign="middle" bgcolor="#CCCCCC"><strong>Order Date</strong></td>
                                <td align="left" valign="middle" bgcolor="#CCCCCC"><strong>Amount</strong></td>
                                <td align="left" valign="middle" bgcolor="#CCCCCC"><strong>Pay Mode</strong></td>
                                <td align="left" valign="middle" bgcolor="#CCCCCC"><strong>Order Status</strong></td>
                                <td align="left" valign="middle" bgcolor="#CCCCCC"><strong>Payment Status</strong></td>
                                <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>Invoice</strong></td>
                                <td align="center" valign="middle" bgcolor="#CCCCCC"><strong>Receipt</strong></td>
                                <td align="left" valign="middle" bgcolor="#CCCCCC"><strong>View</strong></td>
                              </tr>
               <?php
			 if($_REQUEST['ostatus']=='Pending')
			 {
			 	$query="select * from order_mst where User_Id='".$_SESSION['buserid']."' and Order_Status='Pending' order by Order_Id desc";
			 }
			 else if($_REQUEST['ostatus']=='Completed')
			 {
				$query="select * from order_mst where User_Id='".$_SESSION['buserid']."' and Order_Status='Completed' order by Order_Id desc"; 
			 }
			 else if($_REQUEST['ostatus']=='Cancelled')
			 {
				$query="select * from order_mst where User_Id='".$_SESSION['buserid']."' and Order_Status='Cancelled' order by Order_Id desc"; 
			 }
			 else if($_REQUEST['ostatus']=='All')
			 {
				$query="select * from order_mst where User_Id='".$_SESSION['buserid']."' order by Order_Id desc"; 
			 }
			 else if($_REQUEST['submit']!='')
			 {
				$query="select * from order_mst where User_Id='".$_SESSION['buserid']."' and Order_No like '%".$_REQUEST['txtorderno']."%'  order by Order_Id desc"; 					 
			 }
			 else
			 {
				 $query="select * from order_mst where User_Id='".$_SESSION['buserid']."' order by Order_Id desc";
			 }
			  $i=1;
			  $result=$db->pagingLimit($query,$startpoint,$perpage);
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
                              <tr bgcolor="<?php echo $color; ?>" class="title_9">
                                <td><?php echo $k['Order_No']; ?></td>
                                <td><?php echo date('d/m/Y',strtotime($k['Order_Date'])); ?></td>
                                <td><?php echo $k['Amount']; ?></td>
                                <td><?php echo $k['Pay_Mode']; ?></td>
                                <td><?php echo $k['Order_Status']; ?></td>
                                <td><?php echo $k['Payment_Status']; ?></td>
                                <td align="center"><a href="myaccount.php?pageno=5&eid=<?php echo $k['Order_Id']; ?>"><img src="images/invoice.png" width="17" height="18"  border="0" /></a></td>
                                 <td align="center"><a href="invoice_print.php?eid=<?php echo $k['Order_Id']; ?>" target="_blank"><img src="images/print.png" width="20" height="20" border="0" /></a></td>
                                <td width="40"><table width="40" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td align="center"><a href="<?php echo HTTP_BASE_URL_ORDER; ?>myaccount.php?pageno=3&amp;eid=<?php echo $k['Order_Id']; ?>"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/zoom_in.png" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>
                                  </tr>
                                </table></td>
                              </tr>
                              <?php $i++; } ?>
                              <?php if(mysql_affected_rows()==0) { ?>
                              <tr bgcolor="<?php echo $color; ?>" class="title_9">
                                <td colspan="9" align="center" class="err_msg_10">No recored found</td>
                              </tr>
                              <?php } ?>
                            </table></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" bgcolor="#FFFFFF" height="2"></td>
                      </tr>
                      <tr>
                        <td align="center" valign="middle" bgcolor="#FFFFFF" class="title_10">
                         <?php
							$sql=$query;
							$query="SELECT COUNT(*) as num FROM order_mst ".substr($query,15,strlen($query)) ;
							echo pages_wherequery($query,$sql,$perpage,"myaccount.php?pageno=2"."&"); 
							?>
                        </td>
                      </tr>
                                            <tr>
                        <td align="left" valign="middle" bgcolor="#FFFFFF" height="5"></td>
                      </tr>

                    </table></td>
                    </tr>
                  </table></td>
              </tr>
              </table>