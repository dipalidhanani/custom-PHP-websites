<?php
	session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();	?>
    <?php
	$country=mysql_query("select * from order_mst where Order_Id='".$_REQUEST['eid']."'");
	$k=mysql_fetch_array($country);
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ADMIN_TITLE; ?></title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/menu_style.css" type="text/css" />
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
<script language="javascript">
	function forAllBrowserVisible(val)
	{		
		var dra=navigator.appName;
		if(dra=="Netscape")
		{
			document.getElementById(val).style.display="table";
			document.getElementById(val).style.visibility="visible";
		}
		else
		{
			document.getElementById(val).style.display="block";
			document.getElementById(val).style.visibility="visible";
		}
	}
	function forAllBrowserHide(val)
	{		
		var dra=navigator.appName;
		if(dra=="Netscape")
		{
			document.getElementById(val).style.display="none";
			document.getElementById(val).style.visibility="hidden";
		}
		else
		{
			document.getElementById(val).style.display="none";
			document.getElementById(val).style.visibility="hidden";
		}
	}
	
	function Disp(val)
	{		
		forAllBrowserVisible(val);	
		document.getElementById(val).style.width='100%';	
		document.getElementById(val).style.height='100%';	
	}
	function noDisp(val)
	{			
		forAllBrowserHide(val);		
	}
	function loadme()
	{
		if(document.getElementById('mode').value=='Offline')
		{
			noDisp('pgate');
			noDisp('pdata');
			noDisp('pcurrency');
			Disp('ch_df');
			Disp('ch_df_no');
			Disp('ch_df_date');
			Disp('ch_df_bank');
			
		}
		if(document.getElementById('mode').value=='Online')
		{
			Disp('pgate');
			Disp('pdata');
			Disp('pcurrency');
			noDisp('ch_df');
			noDisp('ch_df_no');
			noDisp('ch_df_date');
			noDisp('ch_df_bank');
		}
		
	}
	function call_me()
	{
		if(document.getElementById('ostatus').value=='In Shipping')
		{
			document.getElementById('descr').value='Tracking Code : ';
		}
	}
</script>
<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="125" align="left" valign="top" bgcolor="#FFFFFF"><?php include('header.php'); ?>
        </td>
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
            <td class="normal_fonts14_black"><a href="order.php">Order Details</a></td>
            </tr>
          <tr>
            <td>
            <form name="frmbrand"  method="post" action="order_process.php?is_edit=<?php echo $k['Order_Id']; ?>">
            <input type="hidden" name="txtid" value="<?php echo $k['Order_Id']; ?>" />
            <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" class="border">
              <tr>
                <td align="left" valign="middle"><table width="100%" border="0" cellpadding="5" cellspacing="0">
                  <tr>
                    <td align="left" valign="middle" class="normal_fonts9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="49%" align="left" valign="top" class="normal_fonts10">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="0" align="left" cellpadding="5" cellspacing="0" class="border">
      <tr>
        <td height="32" colspan="3" align="left" valign="middle" bgcolor="#CCCCCC" class="normal_fonts12_black">Order Detail</td>
      </tr>
      <tr>
        <td width="150" height="32" align="right" valign="middle" bgcolor="#f3f3f3">Customer Name</td>
        <td width="10" height="32" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
        <td height="32" align="left" valign="middle" bgcolor="#f3f3f3"><?php 
				$cust_qry=mysql_query("select * from user_mst where User_Id='".$k['User_Id']."'");
				$cust=mysql_fetch_array($cust_qry);
				echo $cust['First_Name']." ".$cust['Middle_Name']." ".$cust['Last_Name']; ?></td>
      </tr>
      <tr>
        <td height="32" align="right" valign="middle">Order No</td>
        <td height="32" align="center" valign="middle">:</td>
        <td height="32" align="left" valign="middle"><?php echo $k['Order_No']; ?></td>
      </tr>
      <tr>
        <td height="32" align="right" valign="middle" bgcolor="#f3f3f3">Order Date</td>
        <td height="32" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
        <td height="32" align="left" valign="middle" bgcolor="#f3f3f3"><?php echo date('d/m/Y',strtotime($k['Order_Date'])); ?></td>
      </tr>
      <tr>
        <td height="32" align="right" valign="middle">Amount</td>
        <td height="32" align="center" valign="middle">:</td>
        <td height="32" align="left" valign="middle"><?php echo $k['Amount']; ?> INR</td>
      </tr>
      <tr>
        <td height="32" align="right" valign="middle" bgcolor="#f3f3f3">IP Addres</td>
        <td height="32" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
        <td height="32" align="left" valign="middle" bgcolor="#f3f3f3"><?php echo $k['IP_Address']; ?></td>
      </tr>
      <tr>
        <td height="32" align="right" valign="middle" bgcolor="#FFFFFF">Order Status</td>
        <td height="32" align="center" valign="middle" bgcolor="#FFFFFF">:</td>
        <td height="32" align="left" valign="middle" bgcolor="#FFFFFF"><select name="ostatus" id="ostatus" onchange="call_me();">
          <option value="Pending" <?php if($k['Order_Status']=='Pending') { ?> selected="selected" <?php } ?>>Pending</option>
          <option value="Completed" <?php if($k['Order_Status']=='Completed') { ?> selected="selected" <?php } ?>>Completed</option>
          <option value="Cancelled" <?php if($k['Order_Status']=='Cancelled') { ?> selected="selected" <?php } ?>>Cancelled</option>
          <option value="In Shipping" <?php if($k['Order_Status']=='In Shipping') { ?> selected="selected" <?php } ?>>In Shipping</option>
        </select></td>
      </tr>
      <tr>
        <td height="32" align="right" valign="top" bgcolor="#f3f3f3">Description</td>
        <td height="32" align="center" valign="top" bgcolor="#f3f3f3">:</td>
        <td height="32" align="left" valign="top" bgcolor="#f3f3f3">
        <textarea name="descr" id="descr" cols="25" rows="5"><?php echo $k['Description']; ?></textarea></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" class="border">
						     <?php 
							$cust=mysql_query("select * from bill_mst where Order_Id='".$k['Order_Id']."'");
							$c=mysql_fetch_array($cust);
							?>
      <tr>
        <td height="32" colspan="3" align="left" valign="middle" bgcolor="#CCCCCC" class="normal_fonts12_black">Shipping Detail</td>
      </tr>
      <tr>
        <td width="150" height="32" align="right" valign="middle" bgcolor="#f3f3f3">Name</td>
        <td width="10" height="32" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
        <td height="32" align="left" valign="middle" bgcolor="#f3f3f3"><?php echo $c['Billing_Username']; ?></td>
      </tr>
      <tr>
        <td width="150" height="32" align="right" valign="middle">Address</td>
        <td height="32" align="center" valign="middle">:</td>
        <td height="32" align="left" valign="middle"><?php 	echo $c['Billing_Address']; ?></td>
      </tr>
      <tr id="pgate2">
        <td width="150" height="32" align="right" valign="middle" bgcolor="#f3f3f3">Zipcode</td>
        <td height="32" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
        <td height="32" align="left" valign="middle" bgcolor="#f3f3f3"><?php 
								echo $c['Billing_Pincode'];
							?></td>
      </tr>
      <tr id="pdata2">
        <td width="150" height="32" align="right" valign="middle">Country</td>
        <td height="32" align="center" valign="middle">:</td>
        <td height="32" align="left" valign="middle"><?php 
								$cou=mysql_query("select * from country where Country_Id='".$c['Billing_Country']."'");	
								$co=mysql_fetch_array($cou);
								echo $co['Name'];
							?></td>
      </tr>
      <tr id="pcurrency2">
        <td width="150" height="32" align="right" valign="middle" bgcolor="#f3f3f3">State</td>
        <td height="32" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
        <td height="32" align="left" valign="middle" bgcolor="#f3f3f3"><?php 
								$st=mysql_query("select * from state where State_Id='".$c['Billing_State']."'");	
								$s=mysql_fetch_array($st);
								echo $s['Name'];	
							?></td>
      </tr>
      <tr id="ch_df2">
        <td width="150" height="32" align="right" valign="middle">City</td>
        <td height="32" align="center" valign="middle">:</td>
        <td height="32" align="left" valign="middle"><?php $new_city=mysql_query("select * from city_mst where city_id='".$c['Billing_City']."'");	
		$disp_city=mysql_fetch_array($new_city);
		echo $disp_city['city_name'];
		?></td>
      </tr>
      <tr id="ch_df_no2">
        <td width="150" height="32" align="right" valign="middle" bgcolor="#f3f3f3">E-Mail Address</td>
        <td height="32" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
        <td height="32" align="left" valign="middle" bgcolor="#f3f3f3"><?php 
								echo $c['Billing_User_email'];
							?></td>
      </tr>
      <tr id="ch_df_date2">
        <td width="150" height="32" align="right" valign="middle">Contact No</td>
        <td height="32" align="center" valign="middle">:</td>
        <td height="32" align="left" valign="middle"><?php 
								echo $c['Billing_Contact'];
							?></td>
      </tr>
      <tr>
        <td height="32" align="right" valign="middle" bgcolor="#f3f3f3">Mobile No.</td>
        <td height="32" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
        <td height="32" align="left" valign="middle" bgcolor="#f3f3f3"><?php 
								echo $c['Billing_mobile'];
							?></td>
      </tr>
    </table></td>
  </tr>
</table>

                        </td>
                        <td  width="10" align="left" valign="top" class="normal_fonts10">&nbsp;</td>
                        <td align="left" valign="top">
                        <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" class="border">
                          <tr>
                            <td height="32" colspan="3" align="left" valign="middle" bgcolor="#CCCCCC" class="normal_fonts12_black">Payment Detail</td>
                            </tr>
                          <tr>
                            <td width="150" height="32" align="right" valign="middle" bgcolor="#f3f3f3">Payment Mode</td>
                            <td width="10" height="32" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
                            <td height="32" align="left" valign="middle" bgcolor="#f3f3f3"><?php echo $k['Pay_Mode']; ?></td>
                            <input type="hidden" name="mode" value="<?php echo $k['Pay_Mode']; ?>" id="mode" /> 
                          </tr>
                          <tr>
                            <td width="150" height="32" align="right" valign="middle">Payment Status</td>
                            <td height="32" align="center" valign="middle">:</td>
                            <td height="32" align="left" valign="middle"><select name="pstatus" id="pstatus">
                              <option value="Pending" <?php if($k['Payment_Status']=='Pending') { ?> selected="selected" <?php } ?>>Pending</option>
                              <option value="Completed" <?php if($k['Payment_Status']=='Completed') { ?> selected="selected" <?php } ?>>Completed</option>
                              <option value="Cancelled" <?php if($k['Payment_Status']=='Cancelled') { ?> selected="selected" <?php } ?>>Cancelled</option>
                              <option value="Failed" <?php if($k['Payment_Status']=='Failed') { ?> selected="selected" <?php } ?>>Failed</option>
                              <option value="Proceed to Payment" <?php if($k['Payment_Status']=='Proceed to Payment') { ?> selected="selected" <?php } ?>>Proceed to Payment</option>
                            </select></td>
                          </tr>
                          <?php if($k['Pay_Mode']=='Online') { ?>
                          <tr id="pgate">
                            <td width="150" height="32" align="right" valign="middle" bgcolor="#f3f3f3">Payment Gateway</td>
                            <td height="32" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
                            <td height="32" align="left" valign="middle" bgcolor="#f3f3f3"><?php echo $k['Payment_Gateway']; ?></td>
                          </tr>
                          <tr id="pdata">
                            <td width="150" height="32" align="right" valign="middle">Pay Data</td>
                            <td height="32" align="center" valign="middle">:</td>
                            <td height="32" align="left" valign="middle"><?php echo $k['Pay_Data']; ?></td>
                          </tr>
                          <tr id="pcurrency">
                            <td width="150" height="32" align="right" valign="middle" bgcolor="#f3f3f3">Currency</td>
                            <td height="32" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
                            <td height="32" align="left" valign="middle" bgcolor="#f3f3f3"><?php echo $k['Currency']; ?></td>
                          </tr>
                          <?php } else if($k['Pay_Mode']=='Offline') { ?>
                          <tr id="ch_df">
                            <td width="150" height="32" align="right" valign="middle">Cheque or Draft</td>
                            <td height="32" align="center" valign="middle">:</td>
                            <td height="32" align="left" valign="middle">
                            <!--<select name="ch" id="ch">
                            <option value="Cheque" <?php if($k['Ch_Draft']=='Cheque'){ ?> selected="selected" <?php } ?>>Cheque</option>
                            <option value="Draft" <?php if($k['Ch_Draft']=='Draft'){ ?> selected="selected" <?php } ?>>Draft</option>
                            </select>-->
                            <?php 
							if($k['Ch_Draft']=='Cheque'){ echo "Cheque"; }
							if($k['Ch_Draft']=='Draft'){ echo "Draft"; }
							?>
                            </td>
                          </tr>
                          <tr id="ch_df_no">
                            <td width="150" height="32" align="right" valign="middle" bgcolor="#f3f3f3">Cheque/Draft No</td>
                            <td height="32" align="center" valign="middle" bgcolor="#f3f3f3">:</td>
                            <td height="32" align="left" valign="middle" bgcolor="#f3f3f3"><input type="text" name="ch_no" id="ch_no"  value="<?php echo $k['Ch_No']; ?>"/></td>
                          </tr>
                          <tr id="ch_df_date">
                            <td width="150" height="32" align="right" valign="middle">Cheque/Draft Date</td>
                            <td height="32" align="center" valign="middle">:</td>
                            <td height="32" align="left" valign="middle"><input type="text" name="cdate" size="20" id="cdate" readonly="readonly" value="<?php echo $k['Ch_Date']; ?>" />
                <input type="button" value=".." name="btndate" id="btndate" />
                <script type="text/javascript">
	 var cal = Calendar.setup({
          onSelect: function(cal) { cal.hide() }
		   		  
      });
     
      cal.manageFields("btndate", "cdate", "%e/%B/%Y");
	  
        </script></td>
                          </tr>
                          <tr id="ch_df_bank">
                            <td width="150" height="32" align="right" valign="middle" bgcolor="#f3f3f3">Bank Name</td>
                            <td height="32" align="center" valign="middle" bgcolor="#f3f3f3">&nbsp;</td>
                            <td height="32" align="left" valign="middle" bgcolor="#f3f3f3"><input type="text" name="bank" id="bank"  value="<?php echo $k['Bank_Name']; ?>" /></td>
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
                <td align="left" valign="middle" height="10"></td>
              </tr>
              <tr>
                <td align="left" valign="middle">
                <table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" class="border">
              <tr class="normal_fonts9">
                <td width="350" align="left" valign="middle" bgcolor="#999999"><strong>Product Detail</strong></td>
                <td width="20" align="left" valign="middle" bgcolor="#999999"><strong>Qty</strong></td>
                <td width="110" align="left" valign="middle" bgcolor="#999999"><strong>Price</strong></td>
                <td width="110" align="left" valign="middle" bgcolor="#999999"><strong>Shipping Charge</strong></td>
                 <?php if($k['Pay_Mode']=='Cash On Delivery') { ?>
                <td width="110" align="left" valign="middle" bgcolor="#999999"><strong>COD Charge</strong></td>
                <?php } ?>
                <td width="300" align="left" valign="middle" bgcolor="#999999"><strong>Offer Detail</strong></td>
              </tr>
               <?php
			  $query="select * from prod_order_mst where Order_Id='".$_REQUEST['eid']."' order by Order_Id";
			  $result=mysql_query($query);
			  $i=1;
			  while($kk=mysql_fetch_array($result))
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
                <td align="left" valign="top"><?php
				$bdata=mysql_query("select * from prod_img where Prod_Id='".$kk['Prod_Id']."' order by Disp_Order limit 1");
				$j=mysql_fetch_array($bdata);
				 ?>
                 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="100" align="left" valign="top"><img src="../product/<?php echo $j['Is_Image']; ?>" border="0" /></td>
                                    <td align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="normal_fonts9">
                                    <?php
									$pro=mysql_query("select * from prod_mst where Prod_Id='".$kk['Prod_Id']."' order by Disp_Order");
									$pp=mysql_fetch_array($pro);
									?>
                                      <tr>
                                        <td width="100" align="right" valign="top">Product Name</td>
                                        <td width="10" align="center" valign="middle">:</td>
                                        <td align="left" valign="middle"><?php echo $pp['Prod_Name']; ?></td>
                                      </tr>
                                      <tr>
                                        <td align="right" valign="top">Product Code</td>
                                        <td width="10" align="center" valign="middle">:</td>
                                        <td align="left" valign="middle"><?php echo $pp['Prod_Code']; ?></td>
                                      </tr>
                                      <tr>
                                        <td align="right" valign="top">Selected Color</td>
                                        <td width="10" align="center" valign="middle">:</td>
                                        <td align="left" valign="middle"><?php echo $kk['Color']; ?></td>
                                      </tr>
                                      <tr>
                                        <td align="right" valign="top">&nbsp;</td>
                                        <td width="10" align="center" valign="middle">&nbsp;</td>
                                        <td align="left" valign="middle">&nbsp;</td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table>
                  </td>
                <td align="left" valign="top"><?php echo $kk['Qty']; ?></td>
                <td align="left" valign="top"><?php echo $kk['Price']; ?> INR</td>
                <td align="left" valign="top"><?php echo $kk['Shipping_Price']; ?> INR</td>
                <?php if($k['Pay_Mode']=='Cash On Delivery') { ?>
                <td align="left" valign="top"><?php echo $kk['cod_price']; ?> INR</td>
                <?php } ?>
                <td align="left" valign="top">
                <span class="title_9">
									   <?php 
									   $qq=mysql_query("select * from gift_mst where Prod_order_Id='".$kk['Prod_order_Id']."' order by Gift_Id desc");
									   $row=mysql_affected_rows();
									   if($row>0)
									   {
										   $r=mysql_fetch_array($qq); ?>
                                           <table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td>&bull;&nbsp;<?php  echo $r['Offer']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php  echo $r['Description']; ?></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top">&nbsp;</td>
  </tr>
</table>
</td>
  </tr>
</table>

										  
									   <?php }
									   else
									   {
										   echo "No Offer Apply";
									   }
									   ?></span>
                </td>
              </tr>
              <?php $i++; } ?> 
                </table>
                </td>
              </tr>
              <tr>
                <td align="center" valign="middle">
                <?php
				if($k['Order_Status']=='Pending') {
				?> 
                <input name="submit" type="submit" class="normal_fonts12_black" value="Submit" />
                <?php } ?>
                &nbsp;
                <input type="button" name="back" value="Back" onblur="javascript:history.go(-1)" class="normal_fonts12_black" />
                </td>
              </tr>
              <tr>
                <td align="left" valign="middle">&nbsp;</td>
              </tr>
            </table>
            </form>
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
