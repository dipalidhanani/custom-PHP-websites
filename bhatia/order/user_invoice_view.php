<?php session_start();
	require_once("../admin/config.inc.php");
	require_once("../admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	$in=mysql_query("select * from bill_mst where Order_Id='".$_REQUEST['eid']."'");
	$k=mysql_fetch_array($in);
	if($_SESSION['buserid']=='')
	{?>
	<script language="javascript">
	window.location='<?php echo HTTP_BASE_URL; ?>index.php';
	</script>
	<?php }?>
<link href="<?php echo HTTP_BASE_URL_ORDER; ?>css/css1.css" rel="stylesheet" type="text/css" />
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
                            <td class="title">User Invoice Details</td>
                            </tr>
                          </table></td>
                        <td width="5"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_04.jpg" width="5" height="41" /></td>
                        </tr>
                      </table></td>
                    </tr>
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
                      <tr>
                        <td align="left" valign="middle" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                          <tr>
                            <td><form action="#"  method="post" name="frmbrand" id="frmbrand">
                              <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                <tr>
                                  <td align="left" valign="middle"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
                                    <tr>
                                      <td align="left" valign="top" class="normal_fonts9"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="title_10">
                                        <tr>
                                          <td width="49%" align="left" valign="top" class="normal_fonts10">
                                          <table width="100%" border="0" align="left" cellpadding="8" cellspacing="0" class="border2">
                                            <tr>
                                              <td height="20" colspan="3" align="left" valign="middle" bgcolor="#CCCCCC" class="title_12">Payment Detail</td>
                                              </tr>
                                            <tr>
                                              <td width="150" height="20" align="right" valign="middle" bgcolor="#f3f3f3">Invoice No</td>
                                              <td width="10" height="20" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
                                              <td height="20" align="left" valign="middle" bgcolor="#f3f3f3"><?php echo $k['Invoice_No']; ?></td>
                                            </tr>
                                            <tr>
                                              <td height="20" align="right" valign="middle">Order No</td>
                                              <td height="20" align="center" valign="middle">:</td>
                                              <td height="20" align="left" valign="middle"><?php 
				$order_qry=mysql_query("select * from order_mst where Order_Id='".$k['Order_Id']."'");
				$o=mysql_fetch_array($order_qry);
				echo $o['Order_No'];
				; ?></td>
                                            </tr>
                                            <tr>
                                              <td height="20" align="right" valign="middle" bgcolor="#f3f3f3">Billing Date</td>
                                              <td height="20" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
                                              <td height="20" align="left" valign="middle" bgcolor="#f3f3f3">
											  <?php echo date('d/m/Y',strtotime($k['Billing_Date'])); ?></td>
                                            </tr>
                                            <tr>
                                              <td height="20" align="right" valign="middle">Bill Amount</td>
                                              <td height="20" align="center" valign="middle">:</td>
                                              <td height="20" align="left" valign="middle"><?php echo $k['Bill_Amount']; ?> INR</td>
                                            </tr>
                                            <tr>
                                              <td height="20" align="right" valign="middle" bgcolor="#f3f3f3">Remaining Amount</td>
                                              <td height="20" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
                                              <td height="20" align="left" valign="middle" bgcolor="#f3f3f3"><?php echo $k['Remaing_Amount']; ?> INR</td>
                                            </tr>
                                            <tr>
                                              <td height="20" align="right" valign="middle" bgcolor="#FFFFFF">Payment Status</td>
                                              <td height="20" align="center" valign="middle" bgcolor="#FFFFFF">:</td>
                                              <td height="20" align="left" valign="middle" bgcolor="#FFFFFF"><?php echo $k['Status']; ?></td>
                                            </tr>
                                          </table>
                                          </td>
                                          <td width="10" align="left" valign="top" class="normal_fonts10">&nbsp;</td>
                                          <td align="left" valign="top">
                                          <table width="100%" border="0" align="right" cellpadding="8" cellspacing="0" class="border2">
                             <?php              
							$cust=mysql_query("select * from user_mst where User_Id='".$_SESSION['buserid']."'");
							$c=mysql_fetch_array($cust);
							?>
                                            <tr>
                                              <td height="20" colspan="3" align="left" valign="middle" bgcolor="#CCCCCC" class="title_12">User Detail</td>
                                              </tr>
                                            <tr>
                                              <td width="150" height="20" align="right" valign="middle" bgcolor="#f3f3f3">Name</td>
                                              <td width="10" height="20" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
                                              <td height="20" align="left" valign="middle" bgcolor="#f3f3f3"><?php 
									echo $c['First_Name']." ".$c['Middle_Name']." ".$c['Last_Name'];
							?></td>
                                            </tr>
                                            <tr>
                                              <td width="150" height="20" align="right" valign="middle">Address</td>
                                              <td height="20" align="center" valign="middle">:</td>
                                              <td height="20" align="left" valign="middle"><?php 
									echo $c['Address1'];
							?></td>
                                            </tr>
                                            <tr id="pgate">
                                              <td width="150" height="20" align="right" valign="middle" bgcolor="#f3f3f3">Zipcode</td>
                                              <td height="20" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
                                              <td height="20" align="left" valign="middle" bgcolor="#f3f3f3"><?php 
									echo $c['Pincode'];
							?></td>
                                            </tr>
                                            <tr id="pdata">
                                              <td width="150" height="20" align="right" valign="middle">Country</td>
                                              <td height="20" align="center" valign="middle">:</td>
                                              <td height="20" align="left" valign="middle"><?php 
									$cou=mysql_query("select * from country where Country_Id='".$c['Country_Id']."'");	
									$co=mysql_fetch_array($cou);
									echo $co['Name'];
							?></td>
                                            </tr>
                                            <tr id="pcurrency">
                                              <td width="150" height="20" align="right" valign="middle" bgcolor="#f3f3f3">State</td>
                                              <td height="20" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
                                              <td height="20" align="left" valign="middle" bgcolor="#f3f3f3"><?php 
								$st=mysql_query("select * from state where State_Id='".$c['State_Id']."'");	
								$s=mysql_fetch_array($st);
								echo $s['Name'];
							?></td>
                                            </tr>
                                            <tr id="ch_df">
                                              <td width="150" height="20" align="right" valign="middle">City</td>
                                              <td height="20" align="center" valign="middle">:</td>
                                              <td height="20" align="left" valign="middle">
                                              <?php 
								$ct=mysql_query("select * from city_mst where city_id='".$c['City']."'");	
								$cc=mysql_fetch_array($ct);
								echo $cc['city_name'];
							?>
                                              </td>
                                            </tr>
                                            <tr id="ch_df_no">
                                              <td width="150" height="20" align="right" valign="middle" bgcolor="#f3f3f3">E-Mail Address</td>
                                              <td height="20" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
                                              <td height="20" align="left" valign="middle" bgcolor="#f3f3f3"><?php 
									echo $c['Email_Address'];
							?></td>
                                            </tr>
                                            <tr id="ch_df_date">
                                              <td width="150" height="20" align="right" valign="middle">Contact No</td>
                                              <td height="20" align="center" valign="middle">:</td>
                                              <td height="20" align="left" valign="middle"><?php 
									echo $c['Phone'];
							?></td>
                                            </tr>
                                            <tr id="ch_df_date">
                                              <td width="150" height="20" align="right" valign="middle" bgcolor="#f3f3f3">Contact No</td>
                                              <td height="20" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
                                              <td height="20" align="left" valign="middle" bgcolor="#f3f3f3"><?php 
									echo $c['Mobile'];
							?></td>
                                            </tr>
                                          </table>
                                          </td>
                                        </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td align="left" valign="middle" class="normal_fonts9"><table width="100%" border="0" cellspacing="0" cellpadding="5">
                                      </table></td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td align="center" valign="middle"><input name="back" type="button" class="title_11" value="Back" onclick="javascript:history.go(-1);" /></td>
                                </tr>
                              </table>
                            </form></td>
                          </tr>
                        </table></td>
                      </tr>
                      </table></td>
                    </tr>
                  </table></td>
              </tr>
              </table>