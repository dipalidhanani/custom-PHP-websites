<?php 
	session_start();
	require_once("../admin/config.inc.php");
	require_once("../admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect(); 
?>
	<link href="<?php echo HTTP_BASE_URL_ORDER; ?>css/css1.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo HTTP_BASE_URL_ORDER; ?>calender/js/format1.js"></script>
    <script src="<?php echo HTTP_BASE_URL_ORDER; ?>calender/js/format.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo HTTP_BASE_URL_ORDER; ?>calender/css/format.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP_BASE_URL_ORDER; ?>calender/css/border-radius.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP_BASE_URL_ORDER; ?>calender/steel/steel.css" />

<script type="text/javascript">
 checked = false;
      function checkedAll () {
        if (checked == false){checked = true}else{checked = false}
	for (var i = 0; i < document.getElementById('myform').elements.length; i++) {
	  document.getElementById('myform').elements[i].checked = checked;
	}
      }
	  function valid_date()
	{
		var today = new Date();
		var thedays = today.getDate();
		if(thedays=='1') { thedays='01' } 
		if(thedays=='2') { thedays='02' } 
		if(thedays=='3') { thedays='03' } 
		if(thedays=='4') { thedays='04' } 
		if(thedays=='5') { thedays='05' } 
		if(thedays=='6') { thedays='06' } 
		if(thedays=='7') { thedays='07' } 
		if(thedays=='8') { thedays='08' } 
		if(thedays=='9') { thedays='09' } 
		var themonth = today.getMonth();
		if(themonth=='0') { themonth='01' } 
		if(themonth=='1') { themonth='02' } 
		if(themonth=='2') { themonth='03' } 
		if(themonth=='3') { themonth='04' } 
		if(themonth=='4') { themonth='05' } 
		if(themonth=='5') { themonth='06' } 
		if(themonth=='6') { themonth='07' } 
		if(themonth=='7') { themonth='08' } 
		if(themonth=='8') { themonth='09' }
		if(themonth=='9') { themonth='10' }
		if(themonth=='10') { themonth='11' }
		if(themonth=='11') { themonth='12' }
		var theyear = today.getFullYear();
		var finaldate=thedays+"/"+themonth+"/"+theyear;		
		var nextdate=document.getElementById('cdate').value;
		var str1 = finaldate;
		var str2 = nextdate;
		var dt1  = parseInt(str1.substring(0,2),10); 
		var mon1 = parseInt(str1.substring(3,5),10);
		var yr1  = parseInt(str1.substring(6,10),10); 
		var dt2  = parseInt(str2.substring(0,2),10); 
		var mon2 = parseInt(str2.substring(3,5),10); 
		var yr2  = parseInt(str2.substring(6,10),10); 
		var date1 = new Date(yr1, mon1, dt1); 
		var date2 = new Date(yr2, mon2, dt2); 
			if(date2<date1)
			{
				alert('Please select valid date!!');
				document.getElementById('btndate').focus();
				return false;
			}
			else
			{
				return true;
			}
	}
</script>
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
	function checkfordisp()
	{
		if(document.getElementById('paymodeonline2').value==1)
		{
			document.getElementById('tblCon').style.visibility="visible";
			document.getElementById('tblCon').style.display="table";
		}
	}
	function checkfordispbtn()
	{
		if(document.getElementById('paymodeonline').value==2)
		{
			document.getElementById('tblCon').style.visibility="hidden";
			document.getElementById('tblCon').style.display="none";
		}
	}
	function checkfordisp_cash()
	{
		if(document.getElementById('paymodeonline3').value==3)
		{
			document.getElementById('tblCon').style.visibility="visible";
			document.getElementById('tblCon').style.display="table";
		}
	}
	
	function validation()
	{
		var flag=0
		var msg
		msg="Please Enter the folllowing Values "
		msg=msg+ "\n" + "------------------------------------------"
		for (i=0; i<document.frmorder.paymode.length; i++)
		{		
			if (document.frmorder.paymode[i].checked==true)
			{
					regfor=document.frmorder.paymode[i].value;
					//alert(regfor);
		if(regfor==1)
		{
			if(document.getElementById('chequeno').value=='')	
			{
				flag=1
				msg=msg+ "\n" + "Please enter cheque no."
			}
			if(document.getElementById('cdate').value=='')	
			{
				flag=1
				msg=msg+ "\n" + "Please enter cheque date"
			}
			if(document.getElementById('bankname').value=='')	
			{
				flag=1
				msg=msg+ "\n" + "Please enter bankname"
			}
			if(document.getElementById('custenter').checked==true)
			{
				if(document.getElementById('custname').value=='')	
				{
					flag=1
					msg=msg+ "\n" + "Please enter customer name"
				}
				if(document.getElementById('add').value=='')	
				{
					flag=1
					msg=msg+ "\n" + "Please enter an address"
				}
				if(document.getElementById('pincode').value=='')	
				{
					flag=1
					msg=msg+ "\n" + "Please enter pincode"
				}
				if(document.getElementById('state').value=='')	
				{
					flag=1
					msg=msg+ "\n" + "Please select state"
				}
				if(document.getElementById('city').value=='')	
				{
					flag=1
					msg=msg+ "\n" + "Please enter city"
				}
				if(document.getElementById('mail').value=='')	
				{
					flag=1
					msg=msg+ "\n" + "Please enter an email address"
				}
				if(document.getElementById('mail').value!='')
				{
					var x=document.getElementById('mail').value;
					var atpos=x.indexOf("@");
					var dotpos=x.lastIndexOf(".");
					if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
				   {
  						flag=1
						msg=msg+ "\n" + "Not a valid email address"
				   }
				}
				if(document.getElementById('mobile').value=='')	
				{
					flag=1
					msg=msg+ "\n" + "Please enter mobile no"
				}
			}
		}
		if(regfor==2)
		{
			isf(document.getElementById('paymentType').value=='select')	
			{
				flag=1
				msg=msg+ "\n" + "Please select payment option"
			}			
		}
		if (flag==1)
		{
			alert(msg)
			return false;
		}
		else
		{
			return true;		
		}	
			}
		}
	}
	

	
</script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript">
$(document).ready(function(){
$('#tr_total_second').hide();						   
$('#delete').click(function(){
		if($("input:checked").length<=1)
		{
			if($("input:checked").length<=1)
			{
				alert('please select one or more item(s) to continue');
				return false;
			}
			else
			{
				return true;
			}
		}
		else
		{
			return confirm('Do you want to remove selected items from cart?');
			 
		}
});
$("td[id^=td_cod]").hide();
$("tr[id^=tr_cod]").hide();
$('#paymodeonline3').click(function(){
if(document.getElementById('paymodeonline3').checked==true)
{
	$("td[id^=td_cod]").show();
	$("tr[id^=tr_cod]").show();
	$('#tr_total_second').show();
	$('#tr_total_first').hide();
	document.getElementById('amt').value=document.getElementById('with_cod').value;
	window.scroll(0,0);
}
});
$('#paymodeonline2').click(function(){
$("td[id^=td_cod]").hide();
$("tr[id^=tr_cod]").hide();	
if(document.getElementById('paymodeonline2').checked==true)
{
	$("td[id^=td_cod]").hide();
	$("tr[id^=tr_cod]").hide();
	$('#tr_total_second').hide();
	$('#tr_total_first').show();
	document.getElementById('amt').value=document.getElementById('without_cod').value;
}
});
$('#paymodeonline').click(function(){
if(document.getElementById('paymodeonline').checked==true)
{
	alert('else');
	$("td[id^=td_cod]").hide();
	$("tr[id^=tr_cod]").hide();
	$('#tr_total_second').hide();
	$('#tr_total_first').show();
	document.getElementById('amt').value=document.getElementById('without_cod').value;
}   
$("td[id^=td_cod]").hide();
$("tr[id^=tr_cod]").hide();					
});

});
</script>
<script language="javascript">
var xmlHttp
function showState(str)
{
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  }
var url="statedata.php";
url=url+"?q="+str;
//url=url+"&sid="+Math.random();
//alert(url);
xmlHttp.onreadystatechange=stateChanged;
xmlHttp.open("POST",url,true);
xmlHttp.send(null);
}
function stateChanged()
{
if (xmlHttp.readyState==4)
{
document.getElementById("txtHint").innerHTML="";
document.getElementById("txtHint").innerHTML=xmlHttp.responseText;
document.getElementById('state').focus();
}
}
function GetXmlHttpObject()
{
var xmlHttp=null;
try
  {
  // Firefox, Opera 8.0+, Safari
  xmlHttp=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
return xmlHttp;
}
</script>
<link href="css/home.css" rel="stylesheet" type="text/css" />
<link href="css/css1.css" rel="stylesheet" type="text/css" />
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
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
                                <td class="title"><strong>Shopping Cart</strong></td>
                              </tr>
                            </table></td>
                            <td width="5"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_04.jpg" width="5" height="41" /></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
                          <tr>
                            <td><form name="myform" method="post" action="<?php echo HTTP_BASE_URL_ORDER; ?>cart_delete_process.php" id="myform">
                              <table width="100%" border="0" cellpadding="0" cellspacing="10">
                              <?php if($_SESSION['shopcart']=='') { ?>
                              <tr>
                                  <td background="<?php echo HTTP_BASE_URL_ORDER; ?>images/bg1.jpg" bgcolor="#E0E0E0" class="err_msg_10" style="background-repeat:repeat-x; background-position:top;">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td height="30" align="center" valign="middle" background="<?php echo HTTP_BASE_URL_ORDER; ?>images/bg1.jpg" bgcolor="#E0E0E0" class="err_msg_10" style="background-repeat:repeat-x; background-position:top;">Your cart is empty, <a href="<?php echo HTTP_BASE_URL; ?>index.php" class="err_msg_10">click here</a> to continue shopping.</td>
                                </tr>
                                <?php } ?>
                                <?php if($_SESSION['shopcart']!='') { ?>
                                <tr>
                                  <td bgcolor="#E0E0E0" background="<?php echo HTTP_BASE_URL_ORDER; ?>images/bg1.jpg" style="background-repeat:repeat-x; background-position:top;"><table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" class="title_11" bgcolor="#CCCCCC" style="padding:2px;">
                                    <tr class="title_10">
                                      <td width="15" height="30" align="left" valign="middle" bgcolor="#f3f3f3"><span style="text-align:center">
                                        <input type="checkbox" name="chk" id="chk" title="Check or Uncheck all Checkbox" onclick='checkedAll();' />
                                      </span></td>
                                      <td width="250" align="left" valign="middle" bgcolor="#f3f3f3">&nbsp;<strong>Product Detail</strong></td>
                                      <td width="30" align="left" valign="middle" bgcolor="#f3f3f3"><strong>&nbsp;Qty</strong></td>
                                      <td width="90" align="center" valign="middle" bgcolor="#f3f3f3">&nbsp;<strong>Amount</strong></td>
                                     <td width="100" align="center" valign="middle" bgcolor="#f3f3f3">&nbsp;<strong>Total Amount</strong></td>
                                       <?php if($_REQUEST['pay']=='yes') { ?>
                                      <td width="70" align="center" valign="middle" bgcolor="#f3f3f3"><strong>Shipping Charge</strong></td>
                                      <td width="70" align="center" valign="middle" bgcolor="#f3f3f3" id="td_cod_1"><strong>COD Charge</strong></td>
                                      <?php } ?>
                                    </tr>
                                    <?php 
							//print_r($_SESSION['shopcart']);		
							$pc=1;
							if($_SESSION['shopcart']!='')
							{
								$cod_final_amt=0;
								$total_chrg1=0;
								while(list($key,$proobj)=each($_SESSION['shopcart']))
								{
								 $selectedproductid=$proobj['item'];
								 $selectedquantity=$proobj['qty'];
								 $selectedcolors=$proobj['color'];
								 $price=$proobj['price'];
								 $selected_cod_amt=$proobj['cod_amt'];
								  ?>
                                  <?php if(($selectedquantity!='0' || $selectedquantity!='') && ($price!='0.00' || $price!='0' || $price!='')) { ?>
                                    <tr bgcolor="#FFFFFF" class="fonts9">
                                      <td align="left" valign="top"><input type="checkbox" name="checkbox[]" id="checkbox" value="<?php echo $key; ?>"/></td>
                                      <input type="hidden" name="hi[]" id="hi" value="<?php echo $selectedquantity; ?>"/>
                                      <td height="25" align="left" valign="top"><?php
								$pi=mysql_query("select * from prod_img where Prod_Id='".$selectedproductid."' order by Disp_Order Limit 1");
								$im=mysql_fetch_array($pi);
								?>
                                <?php $pqry="select * from prod_mst where Is_Active=1 and Prod_Id='".$selectedproductid."' order by Disp_Order"; 
   $dd=mysql_query($pqry);
   $pd=mysql_fetch_array($dd); ?>
                                        <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                          <tr>
                                            <td width="80" align="left" valign="top"><img src="<?php echo HTTP_BASE_URL; ?>product/<?php echo $im['Is_Image']; ?>" border="0" title="<?php echo $pd['Prod_Name']; ?>" alt="<?php echo $pd['Prod_Name']; ?>"  style="cursor:pointer;" /></td>
                                            <td align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="fonts9">
                                              <?php
									$pro=mysql_query("select * from prod_mst where Prod_Id='".$selectedproductid."' order by Disp_Order");
									$pp=mysql_fetch_array($pro);
									?>
                                              <tr>
                                                <td width="130" align="right" valign="top">Product Name</td>
                                                <td width="10" align="center" valign="middle">:</td>
                                                <td width="150" align="left" valign="middle"><?php
											$productname_udfpayment=$productname_udfpayment.$pp['Prod_Name'];
											if($pc!=count($_SESSION['shopcart']))
											{											
													$productname_udfpayment=$productname_udfpayment." / "; 
											}
											$pc++;
											echo $pp['Prod_Name']; ?></td>
                                              </tr>
                                              <tr>
                                                <td align="right" valign="top">Product Code</td>
                                                <td width="10" align="center" valign="middle">:</td>
                                                <td align="left" valign="middle"><?php echo $pp['Prod_Code']; ?></td>
                                              </tr>
                                              <tr>
                                                <td align="right" valign="top">Selected Color</td>
                                                <td width="10" align="center" valign="middle">:</td>
                                                <td align="left" valign="middle"><?php echo $selectedcolors; ?></td>
                                              </tr>
                                              <tr>
                                                <td align="right" valign="top">&nbsp;</td>
                                                <td width="10" align="center" valign="middle">&nbsp;</td>
                                                <td align="left" valign="middle">&nbsp;</td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                        </table></td>
                                      <td align="left" valign="top">&nbsp;<?php echo $qy=$selectedquantity; $qqty=$qqty+$qy ?></td>
                                      <td align="left" valign="top">
                                    <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
                                          <tr>
                                            <td align="right" valign="middle"><?php echo number_format($pp['Final_Price'],2); $famount=$pp['Final_Price']; $pprice=$pprice+$famount; ?></td>
                                            <td width="5" align="left" valign="middle">&nbsp;</td>
                                            <td align="left" valign="middle">INR</td>
                                      </tr>
                                          
                                      </table></td>
                                      <td align="left" valign="top">
                                        <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                          <tr>
                                            <td align="right"><?php $amt=$qy*$famount;  echo number_format($amt,2); $aamt=$aamt+$amt; ?></td>
                                            <td width="5">&nbsp;</td>
                                            <td align="left">INR</td>
                                          </tr>
                                      </table></td>
                                      <?php if($_REQUEST['pay']=='yes') { ?> 
                                      <?php
									  $findu=mysql_query("select * from user_mst where User_Id='".$_SESSION['buserid']."' order by User_Id");
									  $fu=mysql_fetch_array($findu);
									  $st_id=$fu['State_Id'];
									  $chr=mysql_query("select * from shipping_mst where State_Id='".$st_id."'");
									  $ch=mysql_fetch_array($chr);
									  $charge=$ch['Charge']*$qy;
									  ?> 
                                      <?php $_SESSION['total_chrg']=$charge;  ?>
                                      <td align="right" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                                        <tr>
                                          <td align="right"><?php echo $charge;  ?></td>
                                          <td width="5">&nbsp;</td>
                                          <td align="left">INR</td>
                                        </tr>
                                      </table></td>
                                      <td align="right" valign="top" id="td_cod_2"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                                      
                                        <tr>
                                          <td align="right"><?php echo $selected_cod_amt=$selected_cod_amt*$qy; ?></td>
                                          <td width="5">&nbsp;</td>
                                          <td align="left">INR</td>
                                        </tr>
                                      </table></td>
                                      <?php } ?> 
                                    </tr>
                                    <?php } ?>
                                    <?php 
									$total_chrg1=$total_chrg1+$charge;
									$cod_final_amt=$cod_final_amt+$selected_cod_amt; ?>
                                    <?php }  } 
									?>
                                    <tr bgcolor="#FFFFFF" class="fonts10">
                                      <td align="left" valign="top">&nbsp;</td>
                                      <td height="25" align="left" valign="top"><strong>Final Amount</strong></td>
                                      <td align="left" valign="top">&nbsp;<strong><?php echo $qqty; ?></strong></td>
                                      <td align="left" valign="top">
                                        <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
                                          <tr>
                                            <td align="right" valign="middle"><strong><?php echo $pprice=number_format($pprice,2); ?></strong></td>
                                            <td width="5" align="left" valign="middle">&nbsp;</td>
                                            <td align="left" valign="middle">INR</td>
                                          </tr>
                                      </table></td>
                                      <td align="left" valign="top">
                                                                            <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                          <tr>
                                            <td align="right" valign="middle"><strong><?php 
											$amountforhdfc=$aamt;
											echo $aamt=number_format($aamt,2); ?></strong></td>
                                            <td width="5">&nbsp;</td>
                                            <td align="left" valign="middle">INR</td>
                                          </tr>
                                      </table></td>
                                      <?php if($_REQUEST['pay']=='yes') { ?>
                                      <td align="right" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                                        <tr>
                                          <td align="right" valign="middle"><?php echo $total_chrg1; ?></td>
                                          <td width="5">&nbsp;</td>
                                          <td align="left" valign="middle">INR</td>
                                        </tr>
                                      </table></td>
                                      <td align="right" valign="top" id="td_cod_3"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                                        <tr>
                                        
                                          <td align="right" valign="middle"><?php echo $cod_final_amt; ?></td>
                                          <td width="5">&nbsp;</td>
                                          <td align="left" valign="middle">INR</td>
                                        </tr>
                                      </table></td>
                                      <?php } ?>
                                    </tr>
                                  </table></td>
                                </tr>
                                <?php }?>
                                <?php if($_REQUEST['pay']!='yes') { ?>
                                	<?php if($_SESSION['shopcart']!='') { ?>
                                <tr>
                                  <td bgcolor="#E0E0E0" background="<?php echo HTTP_BASE_URL_ORDER; ?>images/bg1.jpg" style="background-repeat:repeat-x; background-position:top;">&nbsp;
                                    <input name="delete" type="submit" class="button" value="Delete Selected" id="delete" />
                                    &nbsp;
                                    <input name="empty"  type="submit" class="button" value="Empty Cart"  onclick="return confirm('Do you want to delete all items from cart?');"/></td>
                                </tr>
                                <?php } ?>
                                <?php } ?>
                                <?php if($_REQUEST['pay']=='yes') { ?>
                                <tr>
                                  <td align="right" valign="top" background="<?php echo HTTP_BASE_URL_ORDER; ?>images/bg1.jpg" bgcolor="#E0E0E0" style="background-repeat:repeat-x; background-position:top;"><table width="250" border="0" align="right" cellpadding="1" cellspacing="1" class="border2">
                                    <tr>
                                      <td width="100" align="right" valign="middle"><span class="title_10">Total Amount</span></td>
                                      <td width="10" align="center" valign="middle"><span class="title_10">:</span></td>
                                      <td width="100" align="left" valign="middle"><span class="title_10"><?php echo number_format($amountforhdfc,2); ?> INR</span></td>
                                    </tr>
                                    <tr>
                                      <td align="right" valign="middle"><span class="title_10">Shipping Charge</span></td>
                                      <td align="center" valign="middle"><span class="title_10">:</span></td>
                                      <td align="left" valign="middle"><span class="title_10"><?php echo number_format($total_chrg1,2); ?> INR</span></td>
                                    </tr>
                                    <tr id="tr_cod_1">
                                      <td align="right" valign="middle" class="title_10">COD Charge</td>
                                      <td align="center" valign="middle">:</td>
                                      <td align="left" valign="middle" class="title_10"><span class="title_10"><?php echo number_format($cod_final_amt,2); ?></span> INR</td>
                                    </tr>
                                    <tr>
                                      <td colspan="3" align="right" valign="middle" style="border-bottom:1px dotted #333;"  height="1"></td>
                                    </tr>
                                    <tr id="tr_total_second">
                                      <td align="right" valign="middle"><span class="title_10"><strong>Pay Amount</strong></span></td>
                                      <td align="center" valign="middle"><span class="title_10">:</span></td>
                                      <td align="left" valign="middle"><span class="title_10">
                                      <strong>
									  <?php 
										    $payamt=$amountforhdfc+$total_chrg1+$cod_final_amt;
											echo number_format($payamt,2);
											$amountforhdfc=$payamt;
										?>
                                        <input type="hidden" name="with_cod" id="with_cod" value="<?php  echo $payamt; ?>" />
                                        </strong><strong>INR</strong></span></td>
                                    </tr>
                                    <tr id="tr_total_first">
                                      <td align="right" valign="middle"><span class="title_10"><strong>Pay Amount</strong></span></td>
                                      <td align="center" valign="middle"><span class="title_10">:</span></td>
                                      <td align="left" valign="middle"><span class="title_10">
                                      <strong>
									  <?php 
										    $payamt=$amountforhdfc;
											$payamt=$payamt-$cod_final_amt;
											echo number_format($payamt,2);
											$amountforhdfc=$payamt;
										?>
                                        <input type="hidden" name="without_cod" id="without_cod" value="<?php  echo $payamt; ?>" />
                                        </strong><strong>INR</strong></span></td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                  <td align="right" valign="top" background="<?php echo HTTP_BASE_URL_ORDER; ?>images/bg1.jpg" bgcolor="#E0E0E0" style="background-repeat:repeat-x; background-position:top;">&nbsp;</td>
                                </tr>
                                 <?php if($_REQUEST['pay']!='yes' && $aamt!='0.00' && $_SESSION['shopcart']!='') { ?>
                                <tr align="right" valign="middle">
                                  <td background="<?php echo HTTP_BASE_URL_ORDER; ?>images/bg1.jpg" bgcolor="#E0E0E0" style="background-repeat:repeat-x; background-position:top;"><a href="<?php echo HTTP_BASE_URL; ?>index.php" style="cursor:pointer"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/continueshopping.jpg" width="144" height="25" border="0" /></a>&nbsp;&nbsp;<img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/checkout.jpg" height="25" border="0" style="cursor:pointer;" onclick="javascript:window.location='<?php echo HTTP_BASE_URL_ORDER; ?>checkout.php'"  />&nbsp;&nbsp;</td>
                                </tr>
                                <tr align="right" valign="middle">
                                  <td align="center" valign="middle" background="<?php echo HTTP_BASE_URL_ORDER; ?>images/bg1.jpg" bgcolor="#E0E0E0" style="background-repeat:repeat-x; background-position:top;"><img src="images/hdfc_banner.jpg" alt="HDFC reward point" width="710" height="280" border="0" usemap="#Map" /></td>
                                </tr>
                                <?php } ?>
                              </table>
                            </form></td>
                          </tr>
                          <?php if($_REQUEST['msg']=='no') { ?>
         <tr>
          <td  align="center" valign="middle" bgcolor="#FFFFFF" class="err_msg_10">Fill required information.</td>
        </tr>
		<?php } ?>
                          <tr>
                            <td> <?php if($_REQUEST['pay']=='yes') { ?>
      <table width="100%" border="0" cellpadding="0" cellspacing="10">
        <tr>
          <td align="left" valign="middle">
          <form name="frmorder" method="post" action="<?php echo HTTP_BASE_URL_ORDER; ?>offline_order_process.php" onsubmit="return validation();">
          <input type="hidden" name="amt" value="<?php echo $payamt; ?>"  id="amt"/>
          <input type="hidden" name="qty" value="<?php echo $qqty; ?>" />
          <input type="hidden" name="color" value="<?php echo $selectedcolors; ?>" />  
          <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td align="left" valign="middle">
      <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" class="border2">
      
        <?php 
		$user_d=mysql_query("select * from user_mst where User_Id='".$_SESSION['buserid']."' and Is_Active=1");
		$u=mysql_fetch_array($user_d);
		?>
        <tr>
          <td colspan="3" align="left" valign="middle" bgcolor="#CCCCCC" class="heading_msg_11">Customer Information </td>
          </tr>
        <tr>
          <td width="250" height="25" align="right" valign="middle" bgcolor="#f3f3f3"><span class="title_10">Name</span></td>
          <td width="10" height="25" align="center" valign="middle" bgcolor="#f3f3f3"><span class="title_10">:</span></td>
          <td height="25" align="left" valign="middle" bgcolor="#f3f3f3"><span class="title_10"><?php 
		  $name_udfpayment=$u['First_Name']." ".$u['Middle_Name']." ".$u['Last_Name'];
		  echo $u['First_Name']." ".$u['Middle_Name']." ".$u['Last_Name']; ?></span></td>
          </tr>
        <tr>
          <td height="25" align="right" valign="middle"><span class="title_10">Addres</span></td>
          <td height="25" align="center" valign="middle"><span class="title_10">:</span></td>
          <td height="25" align="left" valign="middle"><span class="title_10"><?php echo $u['Address1']; ?></span></td>
          </tr>
        <tr>
          <td height="25" align="right" valign="middle" bgcolor="#f3f3f3"><span class="title_10">Pincode</span></td>
          <td height="25" align="center" valign="middle" bgcolor="#f3f3f3"><span class="title_10">:</span></td>
          <td height="25" align="left" valign="middle" bgcolor="#f3f3f3"><span class="title_10"><?php echo $u['Pincode']; ?></span></td>
          </tr>
        <tr>
          <td height="25" align="right" valign="middle"><span class="title_10">Country </span></td>
          <td height="25" align="center" valign="middle"><span class="title_10">:</span></td>
          <td height="25" align="left" valign="middle"><span class="title_10"><?php 
		  $cou=mysql_query("select * from country where Country_Id='".$u['Country_Id']."'");
		  $co=mysql_fetch_array($cou);
		  echo $co['Name'];
		   ?></span></td>
          </tr>
        <tr>
          <td height="25" align="right" valign="middle" bgcolor="#f3f3f3"><span class="title_10">State</span></td>
          <td height="25" align="center" valign="middle" bgcolor="#f3f3f3"><span class="title_10">:</span></td>
          <td height="25" align="left" valign="middle" bgcolor="#f3f3f3"><span class="title_10">
          <?php 
		  $cou1=mysql_query("select * from state where state_Id='".$u['State_Id']."'");
		  $co1=mysql_fetch_array($cou1);
		  echo $co1['Name'];
		   ?>
          </span></td>
          </tr>
        <tr>
          <td height="25" align="right" valign="middle"><span class="title_10">City</span></td>
          <td height="25" align="center" valign="middle"><span class="title_10">:</span></td>
          <td height="25" align="left" valign="middle"><span class="title_10"><?php 
		  $city=mysql_query("select * from city_mst where city_id='".$u['City']."'");
		  $ct=mysql_fetch_array($city);
		  echo $ct['city_name'];
		   ?></span></td>
          </tr>
        <tr>
          <td height="25" align="right" valign="middle" bgcolor="#f3f3f3"><span class="title_10">E-Mail Adress</span></td>
          <td height="25" align="center" valign="middle" bgcolor="#f3f3f3"><span class="title_10">:</span></td>
          <td height="25" align="left" valign="middle" bgcolor="#f3f3f3"><span class="title_10"><?php 
		  $email_udfpayment=$u['Email_Address'];
		  echo $u['Email_Address']; ?></span></td>
          </tr>
        <tr>
          <td height="25" align="right" valign="middle"><span class="title_10">Contact No</span></td>
          <td height="25" align="center" valign="middle"><span class="title_10">:</span></td>
          <td height="25" align="left" valign="middle"><span class="title_10"><?php echo $u['Phone']; ?></span></td>
          </tr>
        <tr>
          <td height="25" align="right" valign="middle" class="title_10">Mobile No</td>
          <td height="25" align="center" valign="middle">:</td>
          <td height="25" align="left" valign="middle"><span class="title_10"><?php 
		  $mobile_udfpayment=$u['Mobile'];
		  echo $u['Mobile']; ?></span></td>
        </tr>
        </table>
      </td>
  </tr>
  <tr>
    <td align="left" valign="middle">
      <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" class="border2">
        <tr>
          <td colspan="3" align="left" valign="middle" bgcolor="#CCCCCC" class="heading_msg_11">Shipping Address </td>
          </tr>
        <tr class="title_10">
          <td width="200" height="25" align="right" valign="middle" bgcolor="#f3f3f3">&nbsp;</td>
          <td height="25" colspan="2" align="left" valign="middle" bgcolor="#f3f3f3">
            <input type="radio" name="cust" id="cust" value="0" checked="checked" onclick="noDisp('hidetr');" />
            As Above
            <input type="radio" name="cust" id="custenter"  value="1"  onclick="Disp('hidetr');"/>
            Enter           </td>
          </tr>
        <tr>
          <td colspan="3" align="left" valign="middle" width="250">
            <table width="100%"  border="0" align="center" cellpadding="3"  cellspacing="0" class="title_10" id="hidetr" style="visibility:hidden;display:none;">
              <tr>
                <td width="250" align="right" class="hyper_link_10"> Name </td>
                <td width="10" align="center" valign="middle" class="hyper_link_10">:</td>
                <td align="left" class="hyper_link_10"><input type="text" name="username"  id="custname"/></td>
                </tr>
              <tr>
                <td align="right" valign="top" bgcolor="#f3f3f3" class="hyper_link_10">Address</td>
                <td align="center" valign="top" bgcolor="#f3f3f3" class="hyper_link_10">:</td>
                <td align="left" valign="top" bgcolor="#f3f3f3" class="hyper_link_10"><textarea name="add" id="add" cols="30" rows="4" class="title_10"></textarea></td>
                </tr>
              <tr>
                <td align="right" class="hyper_link_10">Pincode</td>
                <td align="center" valign="middle" class="hyper_link_10">:</td>
                <td align="left" class="hyper_link_10"><input type="text" name="pincode" id="pincode"  /></td>
                </tr>
              <tr>
                <td align="right" bgcolor="#f3f3f3" class="hyper_link_10">Country </td>
                <td align="center" valign="middle" bgcolor="#f3f3f3" class="hyper_link_10">:</td>
                <td align="left" bgcolor="#f3f3f3" class="hyper_link_10"><span class="normal_fonts9">
                  <select name="countryid" class="title_10" id="countryid">
                    <option value="1">India</option>
                    </select>
                  </span></td>
                </tr>
              <tr>
                <td align="right" class="hyper_link_10">State </td>
                <td align="center" valign="middle" class="hyper_link_10">:</td>
                <td align="left" class="hyper_link_10">
                  <select name="state" id="state" onchange="showState(this.value)">
                    <option value="">Select One</option>
                    <?php 
					$state_data=mysql_query("select * from state ORDER BY Name");
 					while($disp=mysql_fetch_array($state_data))
  					{
  					?>
                    <option value="<?php echo $disp['State_Id']; ?>"<?php if($k['State_Id']==$disp["State_Id"]){ ?> selected="selected" <?php }  ?>><?php echo $disp['Name']; ?></option>
                    <?php } ?>
                    </select>
                  </td>
                </tr>
              <tr>
                <td align="right" bgcolor="#f3f3f3" class="hyper_link_10">City </td>
                <td align="center" valign="middle" bgcolor="#f3f3f3"><span class="hyper_link_10">:</span></td>
                <td bgcolor="#f3f3f3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="21%">
                    <div id="txtHint">
                              <select name="city" id="city">
                              <option value="0">Select One</option>
                              <?php $city_data=mysql_query("SELECT * FROM city_mst ORDER BY city_name");
							  while($ct=mysql_fetch_array($city_data))
							  {
							  ?>
                              <option value="<?php echo $ct['city_id']; ?>" <?php if($ct['city_id']==$_SESSION['city']) {  ?> selected="selected" <?php } ?>><?php echo $ct['city_name']; ?></option>
                              <?php } ?>
                              </select> 
                              </div>
                    </td>
                    </tr>
                  </table></td>
                </tr>
              <tr>
                <td align="right" class="hyper_link_10">E-Mail Address</td>
                <td align="center" valign="middle" class="hyper_link_10">:</td>
                <td align="left" class="hyper_link_10"><input type="text" name="mail" id="mail"  /></td>
                </tr>
              <tr>
                <td align="right" bgcolor="#f3f3f3" class="hyper_link_10">Contact No </td>
                <td align="center" valign="middle" bgcolor="#f3f3f3" class="hyper_link_10">:</td>
                <td align="left" bgcolor="#f3f3f3" class="hyper_link_10"><input type="text" name="contact"  id="contact" /></td>
                </tr>
 			<tr>
                <td align="right" bgcolor="#f3f3f3" class="hyper_link_10">Mobile No </td>
                <td align="center" valign="middle" bgcolor="#f3f3f3" class="hyper_link_10">:</td>
                <td align="left" bgcolor="#f3f3f3" class="hyper_link_10"><input type="text" name="mobile"  id="mobile" /></td>
                </tr>               
              </table>
            </td>
          </tr>
        </table>
      </td>
  </tr>
  <tr>
    <td align="left" valign="middle">
      <table width="100%" align="center" cellpadding="1" cellspacing="1" class="border2">
        <tr>
          <td><table border="0" cellpadding="3" cellspacing="0" align="center" width="100%" >
            <tr>
              <td colspan="3" align="left" valign="middle" bgcolor="#CCCCCC" class="heading_msg_11">Complete the Order </td>
              </tr>
            <tr class="title_10">
              <td width="250" height="25"  align="right" bgcolor="#f3f3f3" class="title_10" >Pay Mode</td>
              <td width="10"  align="center" bgcolor="#f3f3f3">:</td>
              <td bgcolor="#f3f3f3"><input checked="checked" name="paymode" value="2" type="radio" id="paymodeonline" onClick="javascript:;noDisp('checkdraft');Disp('tblOnline');checkfordispbtn();"/>
                Online
                <input name="paymode" value="1" id="paymodeonline2" type="radio" onClick="javascript:;checkfordisp();Disp('checkdraft');noDisp('tblOnline');noDisp('tbl1');"/>
                Offline
                <input name="paymode" value="3" id="paymodeonline3" type="radio" onClick="javascript:checkfordisp_cash();noDisp('checkdraft');noDisp('tblOnline');"/>
                Cash On Delivery
                </td>
              </tr>
            </table></td>
          </tr>
        <tr>
          <td><table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" class="title_10"  id="checkdraft" style="visibility:hidden;display:none;">
            <tr>
              <td width="250" height="30" align="left" class="hyper_link_10">&nbsp;</td>
              <td width="10" height="30" align="center" class="hyper_link_10">&nbsp;</td>
              <td height="30" align="left" class="hyper_link_10"><input name="cdd" id="cdd" checked="checked" value="Cheque" type="radio" />
                Through Cheque
                <input name="cdd" id="cdd1" value="Draft" type="radio" />
                Through Demand Draft </td>
              <td align="center" class="hyper_link_10">&nbsp;</td>
              </tr>
            <tr>
              <td height="30" align="right" bgcolor="#f3f3f3" class="hyper_link_10">Cheque / DD No</td>
              <td height="30" align="center" bgcolor="#f3f3f3" class="hyper_link_10">:</td>
              <td height="30" colspan="2" bgcolor="#f3f3f3" ><input name="chequeno" class="hyper_link_10" id="chequeno" size="20" type="text" />
                <strong> *</strong></td>
              </tr>
            <tr>
              <td height="30"  align="right" class="hyper_link_10">Cheque / DD Date</td>
              <td height="30" align="center" class="hyper_link_10" >:</td>
              <td height="30" colspan="2"><input type="text" name="cdate" size="20" id="cdate" readonly="readonly" />
                <input type="button" value=".." name="btndate" id="btndate" />
                <strong>* </strong>
                <script type="text/javascript">
	 var cal = Calendar.setup({
          onSelect: function(cal) { cal.hide() }
		   		  
      });
     
      cal.manageFields("btndate", "cdate", "%e/%B/%Y");
	  
        </script></td>
              </tr>
            <tr>
              <td height="30" align="right" bgcolor="#f3f3f3" class="hyper_link_10" >Bank Name</td>
              <td height="30"  align="center" bgcolor="#f3f3f3" class="hyper_link_10">:</td>
              <td height="30" bgcolor="#f3f3f3" colspan="2" ><input name="bankname" class="hyper_link_10" type="text" id="bankname" size="20" onfocus="return valid_date();"  />
                <strong>*</strong></td>
              </tr>
            </table></td>
          </tr>
        <tr>
          <td><table width="100%" id="tblCon" border="0"  cellpadding="0" cellspacing="0" style="display:none;visibility:hidden;">
                <tr>
                  <td align="center">
                    <input name="con" type="submit" class="button" id="con" value="Order Now" />
                    </td>
                  </tr>
                </table></td>
        </tr>
        </table>
      </td>
  </tr>
</table>

          </form> 
          </td>
        </tr>
        <tr>
          <td align="left" valign="middle">
          <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF" id="tblOnline">
                          <tr>
                            <td align="center" valign="middle">
                            <table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td align="center">
    <?php
	$_SESSION["payment_udf_name"]=$name_udfpayment;
	$_SESSION["payment_udf_email"]=$email_udfpayment;
	$_SESSION["payment_udf_mobile"]=$mobile_udfpayment;
	$_SESSION["payment_udf_productname"]=$productname_udfpayment;
	$_SESSION["hdfc_order_amount"]=$amountforhdfc;
	?>
    <form name="form" action="SendPerformREQ.php" method="post">      
    <input type="image" src="images/hdfc.jpeg" />
    </form>                            </td>
    </tr>
</table>

                            </td>
                          </tr>
                          <tr><td height="10"></td></tr>
                        </table>
          </td>
        </tr>
        <!--<tr>
          <td align="left" valign="middle">&nbsp;</td>
        </tr>-->
      </table>
    <?php } ?></td>
                          </tr>
                        </table></td>
        </tr>
                    </table></td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>


<map name="Map" id="Map">
  <area shape="rect" coords="605,258,709,278" href="http://www.hdfcbanksmartbuy.com/content.aspx?pgid=35711" target="_blank" alt="HDFC reward point" />
</map>
