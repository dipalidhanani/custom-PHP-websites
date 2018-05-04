<link href="css/home.css" rel="stylesheet" type="text/css" />
<style type="text/css">

ul.mk-mynt-nav {
    border-bottom: 1px solid #D6D6D6;
    margin-bottom: 15px;
	margin:5px 0;
}
td.mk-mynt-nav-td{padding:0;}
ul.mk-mynt-nav {
    border: 0 none;
    display: inline-block;
    font-size: 14px;
   padding-bottom: 0;
    padding-left: 0;
    text-align: center;
}

ul.mk-mynt-nav li {
    margin-left: 0;
}
ul.mk-mynt-nav li {
    display: inline;
  
}
ul.mk-mynt-nav li a {
    background: none repeat scroll 0 0 #E6E6E6;
    border-bottom: 1px solid #D6D6D6;
    border-radius: 2px 2px 2px 2px;
    color: #000000;
    display: inline-block;
    height: 20px;
    padding: 8px 3px 2px;
    text-decoration: none;
    width: 106px;
	
}
ul.mk-mynt-nav li a:hover, ul.mk-mynt-nav li a.active {
    background: none repeat scroll 0 0 #000000;
    border-bottom: 1px solid #000000;
    color: #FFFFFF;
}
</style>
<table width="960" border="0" cellspacing="0" cellpadding="0" id="t">  
  <tr> 
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">    
      <tr>
      
      
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border1">
      <tr>
                <td colspan="2" height="35" align="left" valign="middle" bgcolor="#727272" style="background:url(images/tag_bg.jpg) repeat-x;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                   <td width="10"> </td>
                    <td align="left" valign="middle" class="title_black"><span class="title_white">My Profile</span></td>
                  </tr>
                </table>
                </td>
              </tr>         
      <tr>
       
        <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="7" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="2" cellpadding="5">
             
                    
              <?php
			  
                 $recordsetmyprofile = mysql_query("select * from register_master where register_ID='".$_SESSION['loginuserid']."' and register_user_email='".$_SESSION['loginusername']."'",$cn);
				if($rowmyprofile = mysql_fetch_array($recordsetmyprofile,MYSQL_ASSOC))
				{
				?>
  
              <tr>
                <td class="black10">Welcome
                  <?php  echo $rowmyprofile["register_user_first_name"]." ".$rowmyprofile["register_user_last_name"];?></td>
              </tr>
              <tr>
                <td class="mk-mynt-nav-td">
<ul class="mk-mynt-nav">          
			 <li><a href="index.php?content=7&view=profiledetails#t" <?php if($_REQUEST["view"]=="profiledetails"){ ?>  class="active" <?php } ?>>My Details</a></li>
             <li><a href="index.php?content=7&view=updateprofile#t" <?php if($_REQUEST["view"]=="updateprofile"){ ?>  class="active" <?php } ?>>Update Profile</a></li>
             <li><a href="index.php?content=7&view=myorder#t" <?php if(($_REQUEST["view"]=="myorder") || ($_REQUEST["view"]=="orderdetails")){ ?>  class="active" <?php } ?>>My Order History</a></li>
             <li><a href="index.php?content=7&view=mywishlist#t" <?php if($_REQUEST["view"]=="mywishlist"){ ?>  class="active" <?php } ?>>My Wishlist</a></li>
             <li><a href="index.php?content=7&view=changepassword#t" <?php if($_REQUEST["view"]=="changepassword"){ ?>  class="active" <?php } ?>>Change&nbsp;Password</a></li>
             <li><a href="logout.php">Logout</a></li>             
</ul>
</td></tr>
              <?php
				}
				?>
              
            </table></td>
          </tr>
 <?php if($_REQUEST["view"]=="updateprofile"){ ?>         
          
 <script language="JavaScript">
function IsNumeric(strString) //  check for valid numeric strings
{
	if(!/\D/.test(strString)) return true;//IF NUMBER
	//else if(/^\d+\.\d+$/.test(strString)) return true;//IF A DECIMAL NUMBER HAVING AN INTEGER ON EITHER SIDE OF THE DOT(.)
	else
	return false;
}
function EmailValidation(emailval)
{
	if(emailval=="")
	{
		return true;
	}
	else
	{
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		if(reg.test(emailval) == false)
		{
			 return false;
		}
		else
		{
			return true;
		}
	}
}

function validation(updateprofileform)
{
	with(document.updateprofileform)
    {
    	var errmsg="";
	    
		var illegalChars = /\W/; // allow letters, numbers, and underscores
 
		
		if(firstname.value=="")
		{
			errmsg="Please enter your firstname.";
		}
		if(lastname.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your lastname.";
		}
		if(document.getElementById('unit').value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your unit.";
		}		
		if(street.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your street.";
		}
		if(subburb.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your subburb.";
		}
		if(state.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your state/province.";
		}
		if(pincode.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your pincode.";
		}
		if(country.value=="")
		{
			errmsg=errmsg +'<br>' + "Please select your country.";
		}
		
		if(mobile.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your mobile number.";
		}
		if(mobile.value!="")
		{
			if(IsNumeric(mobile.value)==false ||mobile.value.length != 10)
			{
					errmsg=errmsg +'<br>' + "Please enter valid mobile number.";
			}
		}
		if(phone.value!="")
		{
			if(IsNumeric(phone.value)==false ||phone.value.length < 7)
			{
					errmsg=errmsg +'<br>' + "Please enter valid phone number.";
			}
		}
			
		if(errmsg=="")
		{
		  return true;
		}
		else
		{			
			document.getElementById("erroralready").style.display= '';			
			document.getElementById("lblerror").style.visibility= "visible";
			document.getElementById("lblerror").innerHTML = errmsg;
			return false;
		}
    }
}

function matchpostcode(){
	
<?php 
$selectemail=mysql_query("select postcode from shipping_charges");
	while($r=mysql_fetch_array($selectemail))
	{ ?>
	var postcode="<?php echo $r["postcode"]; ?>";
	//alert(document.getElementById('pincode').value);
	if(postcode==document.getElementById('pincode').value)
	{
	 document.getElementById('errmatchpost').style.display='none';
	  return false;
	}
	else
	{
		 document.getElementById('errmatchpost').style.display='';
	
		
	}
	
	
	<?php
	}	
	?>
}


</script>
</script>
        <tr>
       
        <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="2" cellpadding="2">
                  <form name="updateprofileform" id="updateprofileform" method="get" action="process.php">
                 <?php
                 $recordsetmyprofile = mysql_query("select * from register_master where register_ID='".$_SESSION['loginuserid']."' and register_user_email='".$_SESSION['loginusername']."'",$cn);
				while($rowmyprofile = mysql_fetch_array($recordsetmyprofile,MYSQL_ASSOC))
				{
				?>
                  <tr>

                    <td><table width="100%" border="0" cellpadding="3" cellspacing="3" >
                        <tr>

                          <td width="25%" align="right" valign="top" class="black10" >First Name <span class="title_red">*</span> </td>
                          <td width="75%"><input name="firstname" type="text" class="black10 tb7"  id="firstname" size="25" value="<?php  echo $rowmyprofile["register_user_first_name"];?>"></td>
                        </tr>
                        <tr>
                          <td align="right" valign="top" class="black10" >Last Name <span class="title_red">*</span> </td>
                          <td><input name="lastname" type="text" class="black10 tb7"  id="lastname" size="25" value="<?php  echo $rowmyprofile["register_user_last_name"];?>"></td>
                        </tr>
                    </table></td>

                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="3" cellspacing="3" >
                        <tr>
                         <td width="25%" align="right" valign="top" class="black10" >Unit <span class="title_red">*</span> </td>
                         <td class="black10"><input type="text" name="unit" id="unit" class="black10 tb7" value="<?php  echo $rowmyprofile["register_user_unit"];?>" /></td>
                        </tr>
                        <tr>
                         <td align="right" valign="top" class="black10" >Street <span class="title_red">*</span></td>
                         <td class="black10"><input type="text" name="street" class="black10 tb7" value="<?php  echo $rowmyprofile["register_user_street"];?>" /></td>
                        </tr>
                        <tr>
                         <td align="right" valign="top" class="black10" >Subburb <span class="title_red">*</span> </td>
                         <td><input name="subburb" type="text" class="black10 tb7"  id="subburb" size="25" value="<?php  echo $rowmyprofile["register_user_subburb"];?>"></td>
                        </tr>

                        <tr>
                         <td align="right" valign="top" class="black10" >State / Province <span class="title_red">*</span> </td>
                         <td><input name="state" type="text" class="black10 tb7"  id="state" size="25" value="<?php  echo $rowmyprofile["register_user_state"];?>"></td>
                        </tr>
                        <tr>
                         <td align="right" valign="top" class="black10" >Post Code <span class="title_red">*</span></td>
                         <td class="black10"><input name="pincode" type="text" class="black10 tb7"  id="pincode" value="<?php  echo $rowmyprofile["register_user_pincode"];?>" size="20"  onblur="matchpostcode()">
                          <br /> <span id="errmatchpost" style="display:none" ><font color="#FF0000">Does not match Post Code!!!</font></span></td>
                        </tr>

                        <tr>
                         <td align="right" valign="top" class="black10" >Country </td>
                           <td class="black10">Australia<input name="country" type="hidden" id="country" size="20" value="Australia" class="tb7 black10">                       
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    
                    <td><table width="100%" border="0" cellpadding="3" cellspacing="3" >
                      <tr>
                        <td width="25%" align="right" valign="top" class="black10" >Email Address <span class="title_red">*</span> </td>
                        <td width="74%" class="black10"><?php  echo $rowmyprofile["register_user_email"];?></td>
                        </tr>
                        <?php if($rowmyprofile["register_user_phone"]!=''){ ?>
                      <tr>
                        <td align="right" valign="top" class="black10" >Phone&nbsp;&nbsp;&nbsp;</td>
                        <td><input name="phone" type="text" class="black10 tb7phone"  id="phone" size="25" value="<?php  echo $rowmyprofile["register_user_phone"];?>"></td>
                        
                        </tr>
                        <?php } ?>
                      <tr>
                        <td align="right" valign="top" class="black10" >Mobile <span class="title_red">*</span></td>
                        <td><input name="mobile" type="text" class="black10 tb7phone"  id="mobile" size="25" value="<?php  echo $rowmyprofile["register_user_mobile"];?>"></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="3" cellspacing="3" >                    
                    
                      <tr>
                        <td align="center">
                        <input type="hidden" name="process" value="updateprofile" />
                        <input type="submit" value="Update" onclick="return validation(this.form);" style="cursor:pointer;" >
                          &nbsp;</td>
                        </tr>
                      </table></td>
                    
                    
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr id="erroralready" style="display:none;">
                    <td><table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
                              <tr>
                                <td width="10" height="10"><img src="images/red_tab_01.png" width="10" height="10" /></td>
                                <td background="images/red_tab_03.png" style="background-repeat:repeat-x"></td>
                                <td width="10" height="10"><img src="images/red_tab_04.png" width="10" height="10" /></td>
                              </tr>
                              <tr>
                                <td background="images/red_tab_05.png" style="background-repeat:repeat-y">&nbsp;</td>
                                <td bgcolor="#FFD3D3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="65" valign="top"><img src="images/red_tab_06.png" width="65" height="58" /></td>
                                    <td width="5" valign="top">&nbsp;</td>
                                    <td valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">
                                      <tr>
                                        <td class="title_red" align="left"><strong> Error</strong></td>
                                      </tr>
                                      <tr>
                                        <td class="title_red" align="left">
                                        <div id="lblerror" class="black10" align="left" style=" width:400px; margin-left:0px; color:#FF0000; border-color:#FF0000; visibility:hidden;" ></div>
                                        </td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table></td>
                                <td background="images/red_tab_08.png" style="background-repeat:repeat-y">&nbsp;</td>
                              </tr>
                              <tr>
                                <td><img src="images/red_tab_12.png" width="10" height="10" /></td>
                                <td background="images/red_tab_14.png" style="background-repeat:repeat-x"></td>
                                <td><img src="images/red_tab_15.png" width="10" height="10" /></td>
                              </tr>
</table></td>
                  </tr>
                  <?php
					}
					?>
                  </form>
                </table></td>
     
      </tr>    
    <?php } ?> 
    <?php if($_REQUEST["view"]=="profiledetails"){ ?>     
    
    <tr>
            <td><table width="100%" border="0" cellpadding="2" cellspacing="2">
              <?php
                 $recordsetmyprofile = mysql_query("select * from register_master where register_ID='".$_SESSION['loginuserid']."' and register_user_email='".$_SESSION['loginusername']."'",$cn);
				while($rowmyprofile = mysql_fetch_array($recordsetmyprofile,MYSQL_ASSOC))
				{
				?>
              <tr>
                <td><table width="100%" border="0" cellpadding="3" cellspacing="3" >
                  <tr>
                    <td width="25%" align="right" valign="top" class="black10" >First Name : </td>
                    <td width="75%" class="black10"><?php  echo $rowmyprofile["register_user_first_name"];?></td>
                    </tr>
                  <tr>
                    <td align="right" valign="top" class="black10" >Last Name : </td>
                    <td class="black10"><?php  echo $rowmyprofile["register_user_last_name"];?></td>
                    </tr>
                  <tr>
                    <td width="25%" align="right" valign="top" class="black10" >Unit : </td>
                    <td class="black10"><?php  echo $rowmyprofile["register_user_unit"];?></td>
                    </tr>
                  <tr>
                    <td align="right" valign="top" class="black10" >Street : </td>
                    <td class="black10"><?php  echo $rowmyprofile["register_user_street"];?></td>
                    </tr>
                  <tr>
                    <td align="right" valign="top" class="black10" >Subburb : </td>
                    <td class="black10"><?php  echo $rowmyprofile["register_user_subburb"];?></td>
                    </tr>
                  <tr>
                    <td align="right" valign="top" class="black10" >State / Province : </td>
                    <td class="black10"><?php  echo $rowmyprofile["register_user_state"];?></td>
                    </tr>
                  <tr>
                    <td align="right" valign="top" class="black10" >Post Code : </td>
                    <td class="black10"><?php  echo $rowmyprofile["register_user_pincode"];?></td>
                    </tr>
                  <tr>
                    <td align="right" valign="top" class="black10" >Country : </td>
                    <td class="black10"><?php echo $rowmyprofile["register_user_country"]; ?></td>
                    </tr>
                    <tr>
                    <td width="25%" align="right" valign="top" class="black10" >Email Address : </td>
                    <td width="74%" class="black10"><?php  echo $rowmyprofile["register_user_email"];?></td>
                    </tr>
                    <?php if($rowmyprofile["register_user_phone"]!=''){ ?>
                  <tr>
                    <td align="right" valign="top" class="black10" >Phone&nbsp; :</td>
                    <td class="black10"><?php  echo $rowmyprofile["register_user_phone"];?></td>
                    </tr>
                    <?php } ?>
                  <tr>
                    <td align="right" valign="top" class="black10" >Mobile : </td>
                    <td class="black10"><?php  echo $rowmyprofile["register_user_mobile"];?></td>
                    </tr>                    
                  </table></td>
              </tr>
             
              
              <?php
					}
					?>
            </table></td>
          </tr>
          <?php	}	?> 
     <?php if($_REQUEST["view"]=="myorder"){ ?>  
       <tr>       
        <td bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="2" cellspacing="2" class="border">
          <tr class="black10">
            <td height="30" bgcolor="#CCCCCC" ><strong>Billing Name</strong></td>
            <td width="15%" align="center" bgcolor="#CCCCCC"><strong>Invoice No.</strong></td>
            <td width="15%" align="center" bgcolor="#CCCCCC"><strong>Amount</strong></td>
            <td width="18%" align="center" bgcolor="#CCCCCC"><strong>Payment Status</strong></td>
            <td width="20%" align="center" bgcolor="#CCCCCC"><strong>Datetime</strong></td>
            <td width="5%" bgcolor="#CCCCCC">&nbsp;</td>
          </tr>
          <?php
			$recordsetmyorders = mysql_query("select * from bill_master where bill_email_id='".$_SESSION['loginusername']."' and  (bill_payment_status='Completed' or bill_payment_status='Pending') order by bill_master_ID desc ",$cn);
			 while($rowmyorders = mysql_fetch_array($recordsetmyorders,MYSQL_ASSOC))
			 {	
			?>
          <tr class="black10">
            <td class="black10" height="25"><?php  echo $rowmyorders["bill_name_user"];?></td>
            <td align="center"><?php echo $rowmyorders["bill_invoice_no"];?></td>
            <td align="center">$<?php echo $rowmyorders["bill_final_amount"];?></td>
            <td align="center"><?php echo $rowmyorders["bill_payment_status"];?></td>
            <td align="center"><?php 
							$datetime=$rowmyorders["bill_payment_transaction_recieve_datetime"];
							$datetime=explode(" ",$datetime);
							$date=$datetime[0];
							$date=explode("-",$date);
							$year=$date[0];
							$mon=$date[1];
							$day=$date[2];
							$date=$day."-".$mon."-".$year;
							$datetime=$date." ".$datetime[1];
							echo $datetime;
							?></td>
            <td align="center"><a href="index.php?content=7&view=orderdetails&order=<?php echo base64_encode($rowmyorders["bill_invoice_no"])?>#t"><img src="images/hader_16.png" width="20" height="20" border="0" /></a></td>
          </tr>
          <?php
			 }
			 ?>
        </table></td>     
      </tr>
        <?php	}	?> 
          <?php if($_REQUEST["view"]=="orderdetails"){ ?>  
        <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="2" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
               
                <td bgcolor="#FFFFFF" class="green_fonts">Order Details</td>
                </tr>
              </table></td>          
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
                <td><table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" class="border">
                  <?php
		   $recordsetbill = mysql_query("select * from bill_master where bill_invoice_no='".base64_decode($_REQUEST["order"])."' and bill_email_id='".$_SESSION['loginusername']."'",$cn);
			while($rowbill = mysql_fetch_array($recordsetbill,MYSQL_ASSOC))
            {
				?>
                  <tr>
                    <td width="20%" align="left"  class="black10">Name :</td>
                    <td width="30%" align="left" class="black10"><?php echo $rowbill["bill_name_user"];?></td>
                    <td width="30%" align="right" class="black10">Date :</td>
                    <td width="20%" align="left" class="black10"><?php
							$datetime=$rowbill["bill_datetime"];
							$datetime=explode(" ",$datetime);
							$date=$datetime[0];
							$date=explode("-",$date);
							$year=$date[0];
							$mon=$date[1];
							$day=$date[2];
							$date=$day."-".$mon."-".$year;
							$datetime=$date." ".$datetime[1];
							echo $datetime;
						?></td>
                    </tr>
                  <tr>
                    <td align="left" class="black10">Invoice No :</td>
                    <td align="left" class="black10"><?php echo $rowbill["bill_invoice_no"];?></td>
                    <td align="right" class="black10">Amount :</td>
                    <td align="left" class="black10">$<?php echo $rowbill["bill_final_amount"];?></td>
                    </tr>
                  <tr>
                    <td align="left" class="black10">Payment Status:</td>
                    <td align="left" class="black10"><?php echo $rowbill["bill_payment_status"];?></td>
                    <td align="right" class="black10">Order Status :</td>
                    <td align="left" class="black10"><?php 
					if($rowbill["bill_order_completed"]==0)
					{
						echo "In Progress";
					}
					elseif($rowbill["bill_order_completed"]==1)
					{
						echo "Completed";
					}
					elseif($rowbill["bill_order_completed"]==2)
					{
						echo "Cancel";
					}
					?></td>
                    </tr>
                  <?php
			}
			?>
                  </table></td>
                </tr>
              <tr>
                <td bgcolor="#E4E4E4"><table width="100%" border="0" cellspacing="2" cellpadding="3">
                  <tr>
                    <td bgcolor="#F0F0F0" class="black10"><strong>Products</strong></td>
                    <td width="30" align="center" valign="middle" bgcolor="#F0F0F0" class="black10"><strong>Qty</strong></td>
                    <td width="65" align="center" valign="middle" bgcolor="#F0F0F0" class="black10"><strong>Price</strong></td>
                    <td width="70" align="center" valign="middle" bgcolor="#F0F0F0" class="black10"><strong>Shipping</strong></td>
                    <td width="70" align="center" valign="middle" bgcolor="#F0F0F0" class="black10"><strong>Amount</strong></td>
                    </tr>
                  <?php			
                  	$recordsetbillproducts = mysql_query("select * from bill_products
					INNER JOIN bill_master ON bill_master.bill_master_ID=bill_products.Bill_Master_ID
					where bill_master.bill_invoice_no='".base64_decode($_REQUEST["order"])."' and bill_email_id='".$_SESSION['loginusername']."'",$cn);
						 while($rowbillproduct = mysql_fetch_array($recordsetbillproducts,MYSQL_ASSOC))
						 {
							 
						$selectedproductid=$rowbillproduct["bill_product_master_ID"];
						$selectedquantity=$rowbillproduct["bill_product_qty"];
													
						$selectedprice=$rowbillproduct["bill_product_MRP"];
						$discountamount=$rowbillproduct["bill_product_discount"];
						$amountafterdiscount=$rowbillproduct["bill_product_lastprice"];
						
						if($selectedprice==$amountafterdiscount)
						{
							$payableamount=$selectedprice;
						}
						else
						{
							$payableamount=$amountafterdiscount;
						}
						
						$recordsetproduct = mysql_query("select * from product_mast where Product_id='".$selectedproductid."'
						",$cn);
						 while($rowproduct = mysql_fetch_array($recordsetproduct,MYSQL_ASSOC))
						 {	
						 $c++;
						 
						 
                    ?>
                  <tr>
                    <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="145" valign="top"><table width="145" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="190" align="center" valign="middle"><img src="photo/<?php echo $rowproduct["Product_display_medium_image"];?>" width="135" height="180" border="0" alt="<?php echo $rowproduct["Product_title"];?>" title="<?php echo $rowproduct["Product_title"];?>" /></td>
                            </tr>
                          </table></td>
                        <td width="5">&nbsp;</td>
                        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                          <tr>
                            <td class="black10"><strong><?php echo $rowproduct["Product_title"];?></strong></td>
                            </tr>
                          <tr>
                            <td height="5"></td>
                            </tr>
                          <tr>
                            <td><table width="100%" border="0" cellpadding="1" cellspacing="1" class="botm">
                              <tr>
                                <td><table border="0" cellpadding="3" cellspacing="0">
                                  <tr>
                                    <td align="left" valign="top" class="black10">Code</td>
                                    <td valign="top" class="black10">:</td>
                                    <td align="left" valign="top" class="black10"><?php echo $rowproduct["Product_code"];?></td>
                                    </tr>
                                  <tr>
                                    <td align="left" valign="top" class="black10">MRP Price</td>
                                    <td valign="top" class="black10">:</td>
                                    <td align="left" valign="top" class="black10">$<?php 									
									printf("%.2f",$selectedprice);?></td>
                                    </tr>
                                  <?php
									if($discountamount!=0.00)
									{
									?>
                                  <tr>
                                    <td align="left" valign="top" class="black10">Discount</td>
                                    <td valign="top" class="black10">:</td>
                                    <td align="left" valign="top" class="black10">$<?php									
									printf("%.2f",$discountamount);?></td>
                                    </tr>
                                  <tr>
                                    <td align="left" valign="top" class="black10">Price</td>
                                    <td valign="top" class="black10">:</td>
                                    <td align="left" valign="top" class="black10">$<?php printf("%.2f",$amountafterdiscount);?></td>
                                    </tr>
                                  <?php
									}
									?>
                                
                                  <tr>
                                    <td align="left" valign="top" class="black10">Shipping</td>
                                    <td valign="top" class="black10">:</td>
                                    <td align="left" valign="top" class="black10"><?php 
									$shippingamt=$rowbillproduct["bill_total_shipping"];
									echo $shippingamt;
									?></td>
                                    </tr>
                                  </table></td>
                                </tr>
                              </table></td>
                            </tr>
                          </table></td>
                        </tr>
                      </table></td>
                    <td align="center" valign="top" bgcolor="#FFFFFF" class="black10"><?php echo $selectedquantity;?></td>
                    <td align="right" valign="top" bgcolor="#FFFFFF" class="black10">$<?php printf("%.2f",$selectedprice*$selectedquantity);?></td>
                    <td align="right" valign="top" bgcolor="#FFFFFF" class="black10">$<?php printf("%.2f",$shippingamt*$selectedquantity);?>
                      
                      
                      
                    </td>
                    <td align="right" valign="top" bgcolor="#FFFFFF" class="black10">
                      <span class="black10">
                        <?php
					$totalmrpprice=$totalmrpprice+($selectedprice*$selectedquantity);

					$totaldiscountamount=$totaldiscountamount+($discountamount*$selectedquantity);
										
					$totalshippingamt=$totalshippingamt+($shippingamt*$selectedquantity);
										
					$totalamountproduct=($payableamount*$selectedquantity)+($shippingamt*$selectedquantity);
					$totalamountorder=$totalamountorder+$totalamountproduct;
					?>$
                        <?php printf("%.2f",$totalamountproduct);?>
                        </span></td>
                    </tr>
                  <?php
					    $amountafterdiscount=0;
			 			$discountamount=0;
						$totalamountproduct=0;
						$shippingamt=0;
                        }
                        }
                        ?>
                  <tr>
                    <td bgcolor="#FFFFFF">&nbsp;</td>
                    <td align="right" valign="middle" bgcolor="#FFFFFF" class="black10">&nbsp;</td>
                    <td align="right" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
                    <td align="right" valign="middle" bgcolor="#FFFFFF" class="black10">&nbsp;</td>
                    <td align="right" valign="middle" bgcolor="#FFFFFF" class="normal_fonts12_black"><strong>$<strong><?php printf("%.2f",$totalamountorder);?></strong></strong></td>
                    </tr>
                  </table></td>
                </tr>
              <!--<tr>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="5" colspan="5" ></td>
                    </tr>
                  <tr>
                    <td width="90" class="black10">Discount Code </td>
                    <td width="8" class="black10">:</td>
                    <td width="20"><input name="textfield" type="text" class="black10" id="textfield" size="15" style="height:15px" /></td>
                    <td width="5">&nbsp;</td>
                    <td><a href="#"><img src="images/update1.png" width="68" height="20" border="0" /></a></td>
                  </tr>
                </table></td>
              </tr>-->
              <tr>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                  <tr class="black10">
                    <td colspan="3" align="right"> </td>
                    <td width="2" align="center">&nbsp;</td>
                    <td width="5" align="center">&nbsp;</td>
                    <td width="60" align="right"><strong>&nbsp;</strong></td>
                    </tr>
                  <!--<tr class="black10">
                    <td colspan="3" align="right">Discount Code </td>
                    <td align="center">&nbsp;</td>
                    <td align="center">:</td>
                    <td align="right" class="link"> $ 000.00</td>
                  </tr>-->
                  <tr class="black10">
                    <td align="right">&nbsp;</td>
                    <td width="8" align="center">&nbsp;</td>
                    <td width="150" align="right">Total Amount (MRP)</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="right">$<?php printf("%.2f",$totalmrpprice);?></td>
                    </tr>
                  <tr class="black10">
                    <td align="right">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="right">Total Shipping</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">+</td>
                    <td align="right">$<?php printf("%.2f",$totalshippingamt);?>&nbsp;</td>
                  </tr>
                  <tr class="black10">
                    <td align="right">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="right">Total Discount</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">-</td>
                    <td align="right">$<?php printf("%.2f",$totaldiscountamount);?></td>
                    </tr>
                  <tr class="black10">
                    <td align="right">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="right"><strong>Final Total</strong></td>
                    <td align="center">&nbsp;</td>
                    <td align="center">=</td>
                    <td align="right"><strong>$<?php printf("%.2f",$totalamountorder);?></strong></td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
         
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>           
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">
             <tr>
               <td width="50%" valign="top"><table width="100%" border="0" cellpadding="2" cellspacing="2" class="border">
                 
                 <tr>
                   <td><table width="100%" border="0" cellpadding="5" cellspacing="5">
                     <tr>
                       <td class="black10" ><strong>Billing Address</strong></td>
                       </tr>
                     </table></td>
                   </tr>
                 <tr>
                   <td><table width="100%" border="0" cellpadding="5" cellspacing="0">
                     <?php
                                $recordsetbilling = mysql_query("select * from bill_billing_address
								INNER JOIN bill_master ON bill_master.bill_master_ID=bill_billing_address.billing_bill_master_ID							 
								where bill_master.bill_invoice_no='".base64_decode($_REQUEST["order"])."' and bill_email_id='".$_SESSION['loginusername']."'",$cn);
								$catc=1;
                                while($rowbilling = mysql_fetch_array($recordsetbilling,MYSQL_ASSOC))
                                {
                                ?>
                     <tr>
                       <td width="35%" align="right" valign="top" class="black10" >First Name </td>
                       <td class="black10">:</td>
                       <td width="64%" align="left" class="black10"><?php  echo $rowbilling["billing_user_first_name"];?></td>
                       </tr>
                     <tr>
                       <td align="right" valign="top"  class="black10" >Last Name </td>
                       <td  class="black10">:</td>
                       <td align="left"  class="black10"><?php  echo $rowbilling["billing_user_last_name"];?></td>
                       </tr>
                     <tr>
                       <td align="right" valign="top" class="black10" >Unit </td>
                       <td class="black10">:</td>
                       <td align="left" class="black10"><?php  echo $rowbilling["billing_user_unit"];?></td>
                       </tr>
                     <tr>
                       <td align="right" valign="top"  class="black10" >Street </td>
                       <td  class="black10">:</td>
                       <td align="left"  class="black10"><?php  echo $rowbilling["billing_user_street"];?></td>
                       </tr>
                     <tr>
                       <td align="right" valign="top" class="black10" >Subburb </td>
                       <td class="black10">:</td>
                       <td align="left" class="black10"><?php  echo $rowbilling["billing_user_subburb"];?></td>
                       </tr>
                     <tr>
                       <td align="right" valign="top"  class="black10" >State / Province </td>
                       <td  class="black10">:</td>
                       <td align="left"  class="black10"><?php  echo $rowbilling["billing_user_state"];?></td>
                       </tr>
                     <tr>
                       <td align="right" valign="top" class="black10" >Post Code </td>
                       <td class="black10">:</td>
                       <td align="left" class="black10"><?php  echo $rowbilling["billing_user_pincode"];?></td>
                       </tr>
                     <tr>
                       <td align="right" valign="top"  class="black10" >Country </td>
                       <td  class="black10">:</td>
                       <td align="left"  class="black10"><?php  echo $rowbilling["billing_user_country"];?></td>
                       </tr>
                     <tr>
                       <td align="right" valign="top" class="black10" >Email Address </td>
                       <td width="1%" class="black10">:</td>
                       <td align="left" class="black10"><?php  echo $rowbilling["billing_user_email"];?></td>
                       </tr>
                          <?php if($rowbilling["billing_user_phone"]!=''){ ?>
                     <tr>
                       <td align="right" valign="top"  class="black10" >Phone&nbsp;</td>
                       <td  class="black10">:</td>
                       <td align="left"  class="black10"><?php  echo $rowbilling["billing_user_phone"];?></td>
                       </tr>
                          <?php } ?>
                     <tr>
                       <td align="right" valign="top" class="black10" >Mobile </td>
                       <td class="black10">:</td>
                       <td align="left" class="black10"><?php  echo $rowbilling["billing_user_mobile"];?></td>
                       </tr>
                     <tr>
                       <td height="10" colspan="4" align="right" class="black10"></td>
                       </tr>
                     <?php
				}
				?>
                     </table></td>
                   </tr>                   
                 </table></td>
               <td valign="top"><table width="100%" border="0" cellpadding="2" cellspacing="2" class="border">
                 <tr>
                   <td><table width="100%" border="0" cellpadding="5" cellspacing="5">
                     <tr>
                       <td class="black10" ><strong>Shipping Address</strong></td>
                       </tr>
                     </table></td>
                   </tr>
                 <tr>
                   <td><table width="100%" border="0" cellpadding="5" cellspacing="0">
                     <?php
                                $recordsetshipping = mysql_query("select * from bill_shipping_address
								INNER JOIN bill_master ON bill_master.bill_master_ID=bill_shipping_address.shipping_bill_master_ID							 
								where bill_master.bill_invoice_no='".base64_decode($_REQUEST["order"])."' and bill_email_id='".$_SESSION['loginusername']."'",$cn);
								$catc=1;
                                while($rowshipping = mysql_fetch_array($recordsetshipping,MYSQL_ASSOC))
                                {
                                ?>
                     <tr>
                       <td width="35%" align="right" valign="top" class="black10" >First Name </td>
                       <td class="black10">:</td>
                       <td width="64%" align="left" class="black10"><?php  echo $rowshipping["shipping_user_first_name"];?></td>
                       </tr>
                     <tr>
                       <td align="right" valign="top"  class="black10" >Last Name </td>
                       <td  class="black10">:</td>
                       <td align="left"  class="black10"><?php  echo $rowshipping["shipping_user_last_name"];?></td>
                       </tr>
                     <tr>
                       <td align="right" valign="top" class="black10" >Unit </td>
                       <td class="black10">:</td>
                       <td align="left" class="black10"><?php  echo $rowshipping["shipping_user_unit"];?></td>
                       </tr>
                     <tr>
                       <td align="right" valign="top"  class="black10" >Street </td>
                       <td  class="black10">:</td>
                       <td align="left"  class="black10"><?php  echo $rowshipping["shipping_user_street"];?></td>
                       </tr>
                     <tr>
                       <td align="right" valign="top" class="black10" >Subburb </td>
                       <td class="black10">:</td>
                       <td align="left" class="black10"><?php  echo $rowshipping["shipping_user_subburb"];?></td>
                       </tr>
                     <tr>
                       <td align="right" valign="top"  class="black10" >State / Province </td>
                       <td  class="black10">:</td>
                       <td align="left"  class="black10"><?php  echo $rowshipping["shipping_user_state"];?></td>
                       </tr>
                     <tr>
                       <td align="right" valign="top" class="black10" >Post Code </td>
                       <td class="black10">:</td>
                       <td align="left" class="black10"><?php  echo $rowshipping["shipping_user_pincode"];?></td>
                       </tr>
                     <tr>
                       <td align="right" valign="top"  class="black10" >Country </td>
                       <td  class="black10">:</td>
                       <td align="left"  class="black10"><?php  echo $rowshipping["shipping_user_country"];?></td>
                       </tr>
                     <tr>
                       <td align="right" valign="top" class="black10" >Email Address </td>
                       <td width="1%" class="black10">:</td>
                       <td align="left" class="black10"><?php  echo $rowshipping["shipping_user_email"];?></td>
                       </tr>
                        <?php if($rowshipping["shipping_user_phone"]!=''){ ?>
                     <tr>
                       <td align="right" valign="top"  class="black10" >Phone&nbsp;</td>
                       <td  class="black10">:</td>
                       <td align="left"  class="black10"><?php  echo $rowshipping["shipping_user_phone"];?></td>
                       </tr>
                       <?php } ?>
                     <tr>
                       <td align="right" valign="top" class="black10" >Mobile </td>
                       <td class="black10">:</td>
                       <td align="left" class="black10"><?php  echo $rowshipping["shipping_user_mobile"];?></td>
                       </tr>
                     <tr>
                       <td height="10" colspan="4" align="right" class="black10"></td>
                       </tr>
                     <?php
				}
				?>
                     </table></td>
                   </tr>
                 </table></td>
               </tr>
             </table></td>
           
          </tr>
         
        </table></td>
        </tr> 
         <?php	}	?>  
           <?php if($_REQUEST["view"]=="mywishlist"){ ?>  
           <?php
$today = mktime(date("H"),date("i"),date("s"),date("m"),date("d")+15,date("Y"));
						$after15days=date("Y-m-d H:i:s", $today);

						$queryproduct="select * from product_mast 
						INNER JOIN product_category ON product_category.Product_mast_id=product_mast.Product_id
						INNER JOIN product_colors ON product_colors.product_master_ID=product_mast.Product_id
						INNER JOIN product_wishlist ON product_wishlist.wishlist_product_ID=product_mast.Product_id
						where Product_active_status=1 and Product_quantity > 0 and wishlist_user_ID='".$_SESSION['loginuserid']."' and wishlist_datetime < '".$after15days."' ";
						
						$queryproduct=$queryproduct." group by product_mast.Product_id";
						
						$recordsetproduct = mysql_query($queryproduct,$cn);
						?>
                        <script type="text/javascript">
checked=false;
function checkedAll (viewcartform) {
	var aa= document.getElementById('viewcartform');
	 if (checked == false)
          {
           checked = true
          }
        else
          {
          checked = false
          }
	for (var i =0; i < aa.elements.length; i++) 
	{
	 aa.elements[i].checked = checked;
	}
      }
</script>
           <tr><td>
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
     
      <tr>
       
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">    
        <tr>
                               
                <td align="right" class="black10">
                <?php
				if(mysql_num_rows($recordsetproduct)!=0)
				{
				?>
                <span class="link"><a href="removewishlist.php?remove=empty" onClick="return confirm('Do you want to make your wishlist empty?');">Empty Wishlist</a></span>
                <?php
				}
				?>
                </td>
                  <td width="10"> </td>
              </tr>   
         
            </table></td>
          
          </tr>
     
          <tr>
            <td bgcolor="#FFFFFF" height="10"></td>
        
          
          </tr>
            <?php
				if(mysql_num_rows($recordsetproduct)!=0)
				{
				?>
          <tr>
          
            <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="15" valign="top">&nbsp;</td>
                <td valign="top"><table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <?php
						$c=1;
						$discountamount=0;
						
						 while($rowproduct = mysql_fetch_array($recordsetproduct,MYSQL_ASSOC))
						 {	
						 $c++;
						 
						 $recordsetproductoffer = mysql_query("select * from product_offer where Product_mast_id='".$rowproduct["Product_id"]."' and End_date >='".$now."'",$cn);
						 while($rowproductoffer = mysql_fetch_array($recordsetproductoffer,MYSQL_ASSOC))
						 {
							 $offeramount=$rowproductoffer["Offer_amt"];
							 $offeramounttype=$rowproductoffer["Offer_type_id"];
							 
							 if($offeramounttype==1)
							 {
								 $discountamount=($rowproduct["Price"]*$offeramount)/100;
								 
								 $amountafterdiscount=$rowproduct["Price"]-$discountamount;
							 }
						 }
						 
						?>
                    <td align="left" valign="top" width="230"><table width="230" border="0" cellpadding="0" cellspacing="0" <?php
						  if(($c%3)!=1)
						  {
						  ?> class="right-border" <?php } ?>>
                      <tr>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0" >
                          <tr>
                            <td height="190" align="center" valign="middle"><a href="index.php?content=2&amp;productid=<?php echo $rowproduct["Product_id"];?>"><img src="photo/<?php echo $rowproduct["Product_display_medium_image"];?>" width="135" height="180" border="0" alt="<?php echo $rowproduct["Product_title"];?>" title="<?php echo $rowproduct["Product_title"];?>" /></a></td>
                            </tr>
                          <tr>
                            <td height="5"></td>
                            </tr>
                          <tr>
                            <td class="black10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                 <tr><td align="center" class="black9"><strong><?php echo $rowproduct["Product_title"];?></strong></td></tr>
                                 <tr><td height="5"></td></tr>
                                  <tr>                                   
                                    <td width="5" align="center" class="title_pink">
                                  <strong>  <?php
									if($discountamount!=0)
									{
									?>
                                    <del>$<?php echo $rowproduct["Price"];?></del>
                                    $<?php printf("%.2f",$amountafterdiscount);?>
                                    <?php 
									}
									else
									{
									?>
                                    $<?php echo $rowproduct["Price"];?>
                                    <?php
									}
									?></strong>
									
                                    </td>                                    
                                    </tr>
                                    <tr><td height="5"></td></tr>
                                    <tr>
                            <td colspan="3" align="center" class="black10">
                              <input type="hidden" name="productid" value="<?php echo $rowproduct["Product_id"];?>" />
                              <input type="hidden" name="mrpprice" value="<?php echo $rowproduct["Price"];?>" />
                              <input type="hidden" name="discount" value="<?php echo $discountamount;?>" />
                              <input type="hidden" name="amountafterdiscount" value="<?php echo $amountafterdiscount;?>" />
                              <?php $recordsetproductcolor = mysql_query("select * from product_colors
																 INNER JOIN color_mast ON color_mast.Color_id=product_colors.color_master_ID
																 where product_master_ID ='".$rowproduct["Product_id"]."' order by product_color_ID desc limit 1");
							  $rowrecordsetproductcolor=mysql_fetch_array($recordsetproductcolor);
							  ?>
                              <a href="addtocart.php?productid=<?php echo $rowproduct["Product_id"];?>&quantity=1&avialable_colors=<?php echo $rowrecordsetproductcolor["Color"]; ?>">
                              <img src="images/add_to_cart.png" width="150" height="29" border="0" /></a></td>
                             </tr>
                          
                                  </table></td>
                            </tr>
                          <tr>
                            <td height="5"></td>
                            </tr>
                          
                        </table></td>
                      </tr>
                    </table></td>
                    <td width="20" align="center" valign="top">&nbsp;</td>
                    <?php
						  if(($c%3)==1)
						  {
						  ?>
                  </tr>
                  <tr>
                    <td align="center" valign="top">&nbsp;</td>
                    <td align="center" valign="top">&nbsp;</td>
                  </tr>
                  <?php
						  }
						  $amountafterdiscount=0;
						  $discountamount=0;
						 }
						  ?>
                </table></td>
              </tr>
            </table></td>
           
          </tr>
          <?php
				}
				else
				{
				?>
          <tr>
          
            <td align="left" valign="top" bgcolor="#FFFFFF" class="black10">
            <table width="100%" border="0" cellspacing="5" cellpadding="5">
              <tr>
                <td><strong>Your Wishlist is empty. <span class="link"><a href="index.php">Click here</a></span> to add products in your wishlist.</strong></td>
              </tr>
            </table>
            </td>
          
          </tr>
          <?php
				}
				?>
          
          
                
        </table>
           </td></tr>
               <?php	}	?>   
                <?php if($_REQUEST["view"]=="changepassword"){ ?>  
                <tr><td>
                <table width="100%" border="0" cellspacing="2" cellpadding="2">
              
                  <tr>
                    
                    <td><form name="passwordform" id="passwordform" action="process.php" method="post">
                      <table width="100%" border="0" cellspacing="5" cellpadding="5">                      
                      <?php
					  if($_REQUEST["msg"]!="")
					  {
						   if($_REQUEST["msg"]=="no")
						   {
							   $msg="Please enter the valid current password";
						   }
						   elseif($_REQUEST["msg"]=="yes")
						   {
							   $msg="password changed successfully";
						   }
						   
					  ?>
                      <tr>
                        <td colspan="2" align="center" valign="top" class="title_red"><?php echo $msg;?></td>
                        </tr>
                        <?php
					  }
					  ?>
                      <tr>
                        <td width="45%" align="right" valign="top" class="black10">Old Password :</td>
                        <td align="left" valign="top"><input type="password" name="oldpassword" class="black8 tb7"/></td>
                      </tr>
                      <tr>
                        <td align="right" valign="top" class="black10">New Password :</td>
                        <td align="left" valign="top"><input type="password" name="newpassword" class="black8 tb7"/></td>
                      </tr>
                      <tr>
                        <td align="right" valign="top" class="black10">Confirm Password :</td>
                        <td align="left" valign="top"><input type="password" name="confirmpassword" class="black8 tb7"/></td>
                      </tr>
                      <tr id="submitbuttontr">
                        <td colspan="2" align="center">                        
                        <input type="hidden" name="process" value="changepassword" />
                        <input type="submit" name="submit" value="Change Password" class="black10" onclick="return validation(this.form);" style="cursor:pointer;"/></td>
                        </tr>                        
                      </table>
                      </form></td>
                    
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr id="erroralready" style="display:none;">
                    <td><table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
                              <tr>
                                <td width="10" height="10"><img src="images/red_tab_01.png" width="10" height="10" /></td>
                                <td background="images/red_tab_03.png" style="background-repeat:repeat-x"></td>
                                <td width="10" height="10"><img src="images/red_tab_04.png" width="10" height="10" /></td>
                              </tr>
                              <tr>
                                <td background="images/red_tab_05.png" style="background-repeat:repeat-y">&nbsp;</td>
                                <td bgcolor="#FFD3D3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="65" valign="top"><img src="images/red_tab_06.png" width="65" height="58" /></td>
                                    <td width="5" valign="top">&nbsp;</td>
                                    <td valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">
                                      <tr>
                                        <td class="title_red" align="left"><strong> Error</strong></td>
                                      </tr>
                                      <tr>
                                        <td class="title_red" align="left">
                                        <div id="lblerror" class="title_red" align="left" style=" width:300px; margin-left:0px; color:#FF0000; border-color:#FF0000; visibility:hidden;" ></div>
                                        </td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table></td>
                                <td background="images/red_tab_08.png" style="background-repeat:repeat-y">&nbsp;</td>
                              </tr>
                              <tr>
                                <td><img src="images/red_tab_12.png" width="10" height="10" /></td>
                                <td background="images/red_tab_14.png" style="background-repeat:repeat-x"></td>
                                <td><img src="images/red_tab_15.png" width="10" height="10" /></td>
                              </tr>
</table></td>
                  </tr>
                 
                </table>
                </td></tr>
               <?php	}	?>  
                  
        </table></td>
       
      </tr>
     
    </table></td>
    <td width="10">&nbsp;</td>
        <td width="200" align="left" valign="top"><?php include("right.php"); ?></td>
        
      </tr>
   
    </table></td> 
  </tr>
 
</table>
