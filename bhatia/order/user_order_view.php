<?php session_start();
	require_once("../admin/config.inc.php");
	require_once("../admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	$dd=mysql_query("select * from order_mst where Order_Id='".$_REQUEST['eid']."' and User_Id='".$_SESSION['buserid']."'");
	$k=mysql_fetch_array($dd);
	
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
                            <td class="title">User Order Details</td>
                            </tr>
                          </table></td>
                        <td width="5"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_04.jpg" width="5" height="41" /></td>
                        </tr>
                      </table></td>
                    </tr>
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
                      <tr>
                        <td align="left" valign="middle" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="10" cellpadding="0">
                          <tr>
                            <td><form action="#"  method="post" name="frmbrand" id="frmbrand">
                              <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                <tr>
                                  <td align="left" valign="middle"><table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
                                    <tr>
                                      <td align="left" valign="middle" class="title_10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="49%" align="left" valign="top" class="normal_fonts10">
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="0" align="left" cellpadding="8" cellspacing="0" class="border2">
      <tr>
        <td height="20" colspan="3" align="left" valign="middle" bgcolor="#CCCCCC" class="title_12">Order Detail</td>
      </tr>
      <tr>
        <td width="150" height="20" align="right" valign="middle" bgcolor="#f3f3f3">Customer Name</td>
        <td width="10" height="20" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
        <td height="20" align="left" valign="middle" bgcolor="#f3f3f3"><?php 
				$cust_qry=mysql_query("select * from user_mst where User_Id='".$k['User_Id']."'");
				$cust=mysql_fetch_array($cust_qry);
				echo $cust['First_Name']." ".$cust['Middle_Name']." ".$cust['Last_Name'];
				; ?></td>
      </tr>
      <tr>
        <td height="20" align="right" valign="middle">Order No</td>
        <td height="20" align="center" valign="middle">:</td>
        <td height="20" align="left" valign="middle"><?php echo $k['Order_No']; ?></td>
      </tr>
      <tr>
        <td height="20" align="right" valign="middle" bgcolor="#f3f3f3">Order Date</td>
        <td height="20" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
        <td height="20" align="left" valign="middle" bgcolor="#f3f3f3"><?php echo date('d/m/Y',strtotime($k['Order_Date'])); ?></td>
      </tr>
      <tr>
        <td height="20" align="right" valign="middle">Order Amount</td>
        <td height="20" align="center" valign="middle">:</td>
        <td height="20" align="left" valign="middle"><?php echo $k['Amount']; ?></td>
      </tr>
      <tr>
        <td height="20" align="right" valign="middle" bgcolor="#f3f3f3">Order Status</td>
        <td height="20" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
        <td height="20" align="left" valign="middle" bgcolor="#f3f3f3"><?php echo $k['Order_Status']; ?></td>
      </tr>
      <tr>
        <td height="20" align="right" valign="top">Description</td>
        <td height="20" align="center" valign="top">:</td>
        <td height="20" align="left" valign="top"><?php echo $k['Description']; ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" align="right" cellpadding="8" cellspacing="0" class="border2">
    <?php 					
	$cust=mysql_query("select * from bill_mst where Order_Id='".$_REQUEST['eid']."'");
	$c=mysql_fetch_array($cust);
							?>
      <tr>
        <td height="20" colspan="3" align="left" valign="middle" bgcolor="#CCCCCC" class="title_12">Shipping Detail</td>
      </tr>
      <tr>
        <td width="150" height="20" align="right" valign="middle" bgcolor="#f3f3f3">Name</td>
        <td width="10" height="20" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
        <td height="20" align="left" valign="middle" bgcolor="#f3f3f3">
		<?php 
			echo $c['Billing_Username'];
		?></td>
      </tr>
      <tr>
        <td width="150" height="20" align="right" valign="middle">Address</td>
        <td height="20" align="center" valign="middle">:</td>
        <td height="20" align="left" valign="middle"><?php 
								echo $c['Billing_Address'];
							?></td>
      </tr>
      <tr id="pgate2">
        <td width="150" height="20" align="right" valign="middle" bgcolor="#f3f3f3">Zipcode</td>
        <td height="20" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
        <td height="20" align="left" valign="middle" bgcolor="#f3f3f3"><?php 
								echo $c['Billing_Pincode'];
							?></td>
      </tr>
      <tr id="pdata2">
        <td width="150" height="20" align="right" valign="middle">Country</td>
        <td height="20" align="center" valign="middle">:</td>
        <td height="20" align="left" valign="middle"><?php 
								$cou=mysql_query("select * from country where Country_Id='".$c['Billing_Country']."'");	
								$co=mysql_fetch_array($cou);
								echo $co['Name'];
							?></td>
      </tr>
      <tr id="pcurrency2">
        <td width="150" height="20" align="right" valign="middle" bgcolor="#f3f3f3">State</td>
        <td height="20" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
        <td height="20" align="left" valign="middle" bgcolor="#f3f3f3"><?php 
								$st=mysql_query("select * from state where State_Id='".$c['Billing_State']."'");	
								$s=mysql_fetch_array($st);
								echo $s['Name'];	
							?></td>
      </tr>
      <tr id="ch_df2">
        <td width="150" height="20" align="right" valign="middle">City</td>
        <td height="20" align="center" valign="middle">:</td>
        <td height="20" align="left" valign="middle"><?php $new_city=mysql_query("select * from city_mst where city_id='".$c['Billing_City']."'");	
		$disp_city=mysql_fetch_array($new_city);
		echo $disp_city['city_name'];
		?></td>
      </tr>
      <tr id="ch_df_no2">
        <td width="150" height="20" align="right" valign="middle" bgcolor="#f3f3f3">E-Mail Address</td>
        <td height="20" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
        <td height="20" align="left" valign="middle" bgcolor="#f3f3f3"><?php 
								echo $c['Billing_User_email'];
							?></td>
      </tr>
      <tr id="ch_df_date2">
        <td width="150" height="20" align="right" valign="middle">Contact No</td>
        <td height="20" align="center" valign="middle">:</td>
        <td height="20" align="left" valign="middle"><?php 
								echo $c['Billing_Contact'];
							?></td>
      </tr>
      <tr id="ch_df_date2">
        <td width="150" height="20" align="right" valign="middle" bgcolor="#f3f3f3">Mobile No</td>
        <td height="20" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
        <td height="20" align="left" valign="middle" bgcolor="#f3f3f3"><?php 
								echo $c['Billing_mobile'];
							?></td>
      </tr>
    </table></td>
  </tr>
</table>

                                          </td>
                                          <td width="10" align="left" valign="top" class="normal_fonts10">&nbsp;</td>
                                          <td align="left" valign="top">
                                          <table width="100%" border="0" align="center" cellpadding="8" cellspacing="0" class="border2">
                                            <tr>
                                              <td height="20" colspan="3" align="left" valign="middle" bgcolor="#CCCCCC" class="title_12">Payment Detail</td>
                                              </tr>
                                            <tr>
                                              <td width="150" height="20" align="right" valign="middle" bgcolor="#f3f3f3">Payment Mode</td>
                                              <td width="10" height="20" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
                                              <td height="20" align="left" valign="middle" bgcolor="#f3f3f3"><?php echo $k['Pay_Mode']; ?></td>
                                              <input type="hidden" name="mode" value="<?php echo $k['Pay_Mode']; ?>" id="mode" />
                                            </tr>
                                            <tr>
                                              <td width="150" height="20" align="right" valign="middle">Payment Status</td>
                                              <td height="20" align="center" valign="middle">:</td>
                                              <td height="20" align="left" valign="middle"><?php echo $k['Payment_Status']; ?></td>
                                            </tr>
                                            <?php if($k['Pay_Mode']=='Online') { ?>
                                            <tr id="pgate">
                                              <td width="150" height="20" align="right" valign="middle" bgcolor="#f3f3f3">Payment Gateway</td>
                                              <td height="20" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
                                              <td height="20" align="left" valign="middle" bgcolor="#f3f3f3"><?php echo $k['Payment_Gateway']; ?></td>
                                            </tr>
                                            <tr id="pdata">
                                              <td width="150" height="20" align="right" valign="middle">Paid Amount</td>
                                              <td height="20" align="center" valign="middle">:</td>
                                              <td height="20" align="left" valign="middle"><?php echo $k['Pay_Data']; ?></td>
                                            </tr>
                                            <tr id="pcurrency">
                                              <td width="150" height="20" align="right" valign="middle" bgcolor="#f3f3f3">Currency</td>
                                              <td height="20" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
                                              <td height="20" align="left" valign="middle" bgcolor="#f3f3f3"><?php echo $k['Currency']; ?></td>
                                            </tr>
                                            <?php } else if($k['Pay_Mode']=='Offline') {  ?>
                                            <tr id="ch_df">
                                              <td width="150" height="20" align="right" valign="middle">Cheque or Draft</td>
                                              <td height="20" align="center" valign="middle">:</td>
                                              <td height="20" align="left" valign="middle"><?php echo $k['Ch_Draft']; ?></td>
                                            </tr>
                                            <tr id="ch_df_no">
                                              <td width="150" height="20" align="right" valign="middle" bgcolor="#f3f3f3">Cheque/Draft No</td>
                                              <td height="20" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
                                              <td height="20" align="left" valign="middle" bgcolor="#f3f3f3"><?php echo $k['Ch_No']; ?></td>
                                            </tr>
                                            <tr id="ch_df_date">
                                              <td width="150" height="20" align="right" valign="middle">Cheque/Draft Date</td>
                                              <td height="20" align="center" valign="middle">:</td>
                                              <td height="20" align="left" valign="middle"><?php echo $k['Ch_Date']; ?></td>
                                            </tr>
                                            <tr id="ch_df_bank">
                                              <td width="150" height="20" align="right" valign="middle" bgcolor="#f3f3f3">Bank Name</td>
                                              <td height="20" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
                                              <td height="20" align="left" valign="middle" bgcolor="#f3f3f3"><?php echo $k['Bank_Name']; ?></td>
                                            </tr>
                                            <?php } ?>
                                          </table>
                                          </td>
                                        </tr>
                                      </table></td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td height="10" align="left" valign="middle"></td>
                                </tr>
                                <tr>
                                  <td align="left" valign="middle"><table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" class="border2">
                                    <tr class="normal_fonts9">
                                      <td width="400" align="left" valign="middle" bgcolor="#CCCCCC"><span class="title_9"><strong>Product Detail</strong></span></td>
                                      <td width="25" align="left" valign="middle" bgcolor="#CCCCCC"><span class="title_9"><strong>Qty</strong></span></td>
                                      <td width="100" align="left" valign="middle" bgcolor="#CCCCCC"><span class="title_9"><strong>Price</strong></span></td>
                                      <td width="120" align="left" valign="middle" bgcolor="#CCCCCC" class="title_9"><strong>Shipping Price</strong></td>
                                     <?php if($k['Pay_Mode']=='Cash On Delivery') { ?>
                                      <td width="120" align="left" valign="middle" bgcolor="#CCCCCC" class="title_9"><strong>COD Price</strong></td>
                                   
                                   <?php } ?>   
                                      <td align="left" valign="middle" bgcolor="#CCCCCC" class="title_9"><strong> Offer Detail</strong></td>
                                    </tr>
                                    <?php
			  $query1="select * from prod_order_mst where Order_Id='".$_REQUEST['eid']."' order by Order_Id";
			  $result1=mysql_query($query1);
			  $i=1;
			  while($kk=mysql_fetch_array($result1))
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
                                    <tr bgcolor="<?php echo $color; ?>" class="normal_fonts10">
                                      <td align="left" valign="top"><span class="title_9">
                                      <?php
				$bdata=mysql_query("select * from prod_img where Prod_Id='".$kk['Prod_Id']."' order by Disp_Order limit 1");
				$j=mysql_fetch_array($bdata);
				 ?>
                                      </span>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td width="100" align="left" valign="top"><span class="title_9"><img src="<?php echo HTTP_BASE_URL; ?>product/<?php echo $j['Is_Image']; ?>" border="0" title="<?php echo $kk['Prod_Name']; ?>" alt="<?php echo $kk['Prod_Name']; ?>" /></span></td>
                                            <td align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="normal_fonts9">
                                              <?php
									$pro=mysql_query("select * from prod_mst where Prod_Id='".$kk['Prod_Id']."' order by Disp_Order");
									$pp=mysql_fetch_array($pro);
									?>
                                              <tr>
                                                <td width="100" align="right" valign="top"><span class="title_9">Product Name</span></td>
                                                <td width="10" align="center" valign="middle"><span class="title_9">:</span></td>
                                                <td align="left" valign="middle"><span class="title_9"><?php echo $pp['Prod_Name']; ?></span></td>
                                              </tr>
                                              <tr>
                                                <td align="right" valign="top"><span class="title_9">Product Code</span></td>
                                                <td width="10" align="center" valign="middle"><span class="title_9">:</span></td>
                                                <td align="left" valign="middle"><span class="title_9"><?php echo $pp['Prod_Code']; ?></span></td>
                                              </tr>
                                              <tr>
                                                <td align="right" valign="top"><span class="title_9">Selected Color</span></td>
                                                <td width="10" align="center" valign="middle"><span class="title_9">:</span></td>
                                                <td align="left" valign="middle"><span class="title_9"><?php echo $kk['Color']; ?></span></td>
                                              </tr>
                                              <tr>
                                                <td align="right" valign="top">&nbsp;</td>
                                                <td width="10" align="center" valign="middle">&nbsp;</td>
                                                <td align="left" valign="middle">&nbsp;</td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                        </table></td>
                                      <td align="left" valign="top"><span class="title_9"><?php echo $kk['Qty']; ?></span></td>
                                      <td align="left" valign="top"><span class="title_9"><?php echo $kk['Price']; ?> INR</span></td>
                                      <td align="left" valign="top"><span class="title_9"><?php echo $kk['Shipping_Price']; ?> INR</span></td>
                                      <?php if($k['Pay_Mode']=='Cash On Delivery') { ?>
                                      <td align="left" valign="top"><span class="title_9"><?php echo $kk['cod_price']; ?> INR</span></td>
                                      <?php } ?>
                                       <td align="left" valign="top"><span class="title_9">
									   <?php 
									   $qq=mysql_query("select * from gift_mst where Prod_order_Id='".$kk['Prod_order_Id']."' order by Gift_Id desc");
									   $row=mysql_affected_rows();
									   if($row==0)
									   {
										   echo "No Offer Apply";
									   }
									   else
									   {
										   $r=mysql_fetch_array($qq); ?>
                                           <table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td>&bull;&nbsp;<?php  echo $r['Offer']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;&nbsp;<?php  echo $r['Description']; ?></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
</table>
</td>
  </tr>
</table>

										  
									   <?php }    ?></span></td>
                                    </tr>
                                    <?php $i++; } ?>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td align="center" valign="middle">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align="center" valign="middle"><input name="back" type="button" class="title_12" value="Back"  onclick="javascript:history.go(-1);"/></td>
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