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
                            <td class="title">User Invoice</td>
                            </tr>
                          </table></td>
                        <td width="5"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_04.jpg" width="5" height="41" /></td>
                        </tr>
                      </table></td>
                    </tr>
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
                      <tr>
                        <td height="35" align="right" valign="middle" bgcolor="#FFFFFF"><input type="button" name="back" value="<< Go Back" class="button" style="width:90px;" onclick="javascript:history.go(-1);"/>&nbsp;&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                          <tr>
                            <td><table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" style="padding:5px;">
                              <tr>
                                <td height="30" align="left" valign="middle" bgcolor="#CCCCCC"><span class="title_9"><strong>Invoice No</strong></span></td>
                                <td align="left" valign="middle" bgcolor="#CCCCCC"><span class="title_9"><strong>Order No</strong></span></td>
                                <td align="left" valign="middle" bgcolor="#CCCCCC"><span class="title_9"><strong>Billing Date</strong></span></td>
                                <td align="left" valign="middle" bgcolor="#CCCCCC"><span class="title_9"><strong>Bill Amount</strong></span></td>
                                <td align="left" valign="middle" bgcolor="#CCCCCC"><span class="title_9"><strong>Remaining Amount</strong></span></td>
                                <td align="left" valign="middle" bgcolor="#CCCCCC"><span class="title_9"><strong>Payment Status</strong></span></td>
                                 <td align="left" valign="middle" bgcolor="#CCCCCC"><span class="title_9"><strong>Invoice Print</strong></span></td>
                                <td align="left" valign="middle" bgcolor="#CCCCCC"><span class="title_9"><strong>Action</strong></span></td>
                              </tr>
                              <?php
			  $query="select * from bill_mst where User_Id='".$_SESSION['buserid']."' order by  Billing_Id desc";
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
                                <td><span class="title_9"><?php echo $k['Invoice_No']; ?></span></td>
                                <td><span class="title_9">
                                  <?php 
				$order=mysql_query("select * from order_mst where Order_Id='".$k['Order_Id']."'");
				$or=mysql_fetch_array($order);
				echo $or['Order_No'];
				 ?>
                                </span></td>
                                <td><span class="title_9"><?php echo $k['Billing_Date']; ?></span></td>
                                <td><span class="title_9"><?php echo $k['Bill_Amount']; ?></span></td>
                                <td><span class="title_9"><?php echo $k['Remaing_Amount']; ?></span></td>
                                <td><span class="title_9"><?php echo $k['Status']; ?></span></td>
                                 <td><span><a href="invoice_print.php?eid=<?php echo $k['Billing_Id']; ?>" target="_blank" class="title_9">Print Invoice</a></span></td>
                                <td width="40"><table width="40" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td align="center"><span class="title_9"><a href="<?php echo HTTP_BASE_URL_ORDER; ?>myaccount.php?pageno=5&amp;eid=<?php echo $k['Billing_Id']; ?>"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/zoom_in.png" alt="Edit" width="20" height="20" border="0" title="Edit" /></a></span></td>
                                  </tr>
                                </table></td>
                              </tr>
                              <?php $i++; } ?>
                            </table></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" bgcolor="#FFFFFF" height="5"></td>
                      </tr>
                      <tr>
                        <td align="center" valign="middle" bgcolor="#FFFFFF" class="title_10">
                         <?php
							$sql=$query;
							$query="SELECT COUNT(*) as num FROM bill_mst ".substr($query,15,strlen($query)) ;
							echo pages_wherequery($query,$sql,$perpage,"myaccount.php?pageno=4"."&"); 
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