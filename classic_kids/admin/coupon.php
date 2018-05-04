<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");

	  $recordsetcoupon = mysql_query("SELECT * FROM kid_voucher_coupon");
	  while($rowcoupon = mysql_fetch_array($recordsetcoupon,MYSQL_ASSOC))
	  {
	  		$selectedcouponname=$rowcoupon["kid_coupon_name"];
	  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Coupon</title>
<link rel="stylesheet" href="css/css.css" type="text/css" />
<script language="javascript">
function display_subcategory(d_n, f_n, fm) 
{
	f=fm;
	l=f.elements.length;
	m="";
	i=0;
		
	m +=f.elements['parentcategory'].name+"="+f.elements['parentcategory'].value;
	
	getoutput(f_n+'?'+m,d_n)
	
	return false;
}

function getoutput(url,resultpan)
{
	var xmlchat = initxmlhttp() ;
	var m = document.getElementById(resultpan);
	m.innerHTML = "<div id='loading'>Loading...</div>";
	xmlchat.open( "GET", url, true ) ;
	xmlchat.onreadystatechange=function()
	{
		//alert("hi");
		if (xmlchat.readyState==4)
		{
			var m = document.getElementById(resultpan);
			m.innerHTML = xmlchat.responseText;
			
			var str = xmlchat.responseText;			
		}
		
	}
	xmlchat.send(null) ;
//	xmlchat.close();
//	var temp = setTimeout("xmlpull()",) ;
}
function initxmlhttp()

{
		var xmlhttp ;
 	    if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
           //    xmlHttpReq.overrideMimeType('text/xml');
        }
        // IE
        else if (window.ActiveXObject) {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
		return xmlhttp ;
}
</script>
<link type="text/css" rel="stylesheet" href="calendar/calendar.css" media="screen"></link>
<script language="javascript" type="text/javascript" src="calendar/calendar.js"></script>

</head>
<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border">
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF"><?php include("header.php");?></td>
      </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="10" cellpadding="0">
      
         
      <?php
	  if($_REQUEST["action"]=="edit")
	  {
	  $recordsetcoupon = mysql_query("SELECT * FROM kid_voucher_coupon where kid_coupon_active_status=1");
	  while($rowcoupon = mysql_fetch_array($recordsetcoupon,MYSQL_ASSOC))
	  {
	  ?>
      <?php
	  }
	  }
	  ?>
      <tr>
       <td align="right" class="normal_fonts14_black"><table border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td><a href="coupon.php?action=new"><img src="images/add.png" width="20" height="20" border="0" /></a></td>
            <td class="normal_fonts12_black"><a href="coupon.php?action=new">New Voucher Coupon</a>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <?php
	  if($_REQUEST["action"]=="")
	  {
	  ?>
      <tr>
        <td colspan="2"><table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
          <tr>
            <td width="4%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>No.</strong></td>
            <td width="15%" align="left" bgcolor="#999999" class="normal_fonts10"><strong>Coupon Name</strong></td>
            <td width="15%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Coupon Amount</strong></td>
             <td width="12%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Minimum Purchase Value</strong></td>
            <td width="11%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Expiration Date</strong></td>
          
            <td width="12%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Maximum Time Coupon Can Be Used</strong></td>
            <td width="5%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Edit</strong></td>
          </tr>
          <?php
		  
		  $query="SELECT * FROM kid_voucher_coupon order by kid_coupon_id";
		  
		  $no=1;
		  $recordsetcoupon = mysql_query($query);
		  $totcoupon=mysql_num_rows($recordsetcoupon);
		  if($totcoupon>0){
		  while($rowcoupon = mysql_fetch_array($recordsetcoupon,MYSQL_ASSOC))
		  {
		  
		 
		  
			  if(($no%2)==1)
			  {
					$bg="#FFFFFF";
			  }
			  else
			  {
					$bg="#F3F3F3";
			  }
			 
		  ?>
          <tr>
            <td align="center" class="normal_fonts9" bgcolor="<?php echo $bg;?>"><?php echo $no++;?></td>
            <td class="normal_fonts9" bgcolor="<?php echo $bg;?>"><?php echo $rowcoupon["kid_coupon_name"];?></td>
            <td class="normal_fonts9" bgcolor="<?php echo $bg;?>" align="center">
             <?php echo $rowcoupon["kid_coupon_amount"];?>
            </td>
            <td align="center" bgcolor="<?php echo $bg;?>">                       
             <?php echo $rowcoupon["kid_minimum_purchase_value"];?>       
            </td>
                        
            <td align="center" class="normal_fonts9" bgcolor="<?php echo $bg;?>">
             <?php echo $rowcoupon["kid_expiration_from_date"]." To ".$rowcoupon["kid_expiration_to_date"];?>         
            </td>
           
             <td align="center" class="normal_fonts9" bgcolor="<?php echo $bg;?>">
               <?php echo $rowcoupon["kid_maximum_time_coupon_can_be_used"];?> 
             </td>
             <td align="center" bgcolor="<?php echo $bg;?>"><table border="0" cellspacing="1" cellpadding="1">
                      <tr>
                        <td align="center" valign="top">
                        <?php
						if($permission_dataentry_edit==1)
						{
						?>
                         <a href="coupon.php?action=editcoupon&couponid=<?php echo $rowcoupon["coupon_id"];?>">
                         <img src="images/edit.png" border="0" /></a>
                        <?php
						}
						else
						{
						?>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <?php
						}
						?>                        
                        </td>
                     
                      </tr>
                </table></td>
          </tr>
          <?php } }else { ?>
          <tr>
            <td align="center" class="normal_fonts9" bgcolor="<?php echo $bg;?>" colspan="7" >No Records Found</td>            
          </tr>
          <?php
		  }
			 ?>
        </table></td>
      </tr>
      <?php
	  }
	  ?>
      <?php
	  if($_REQUEST["action"]=="new")
	  {
	  ?>
       <tr>
        <td colspan="2">
        <form name="couponform" id="couponform" method="post" action="process_coupon.php" enctype="multipart/form-data">
        <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
                  
          <tr bgcolor="#F3F3F3">
            <td width="30%" align="right" valign="top" class="normal_fonts9">Coupon Name</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top"><input name="coupon_name" type="text" class="normal_fonts9" size="45" /></td>
          </tr>
          <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Coupon Amount</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top"><input name="coupon_amount" type="text" class="normal_fonts9" size="16" />
            </td>
          </tr>
          <tr bgcolor="#F3F3F3">
               <td align="right" class="normal_fonts9">Minimum Purchase Value</td>
               <td align="left">:</td>
               <td align="left" class="normal_fonts8"><input name="minimum_purchase_value" type="text" class="normal_fonts9" size="16" />
               </td>
             </tr>
             <tr>
               <td align="right" class="normal_fonts9">Expiration Date</td>
               <td align="left" >:</td>
               <td align="left" class="normal_fonts8">
               <input name="expiration_date_from" id="expiration_date_from" type="text" class="normal_fonts9" size="16" onFocus="displayCalendar(expiration_date_from,'dd-mm-yyyy',this)"/>&nbsp;To &nbsp;
               <input name="expiration_date_to" id="expiration_date_to" type="text" class="normal_fonts9" size="16" onFocus="displayCalendar(expiration_date_to,'dd-mm-yyyy',this)" />
               </td>
             </tr>
               <tr>
               <td align="right" bgcolor="#F3F3F3" class="normal_fonts9">Maximum Time Coupon Can Be Used</td>
               <td align="left" bgcolor="#F3F3F3">:</td>
               <td align="left" bgcolor="#F3F3F3" class="normal_fonts8">
               <input name="maximum_time_coupon_can_be_used" type="text" class="normal_fonts9" size="16" />
               </td>
             </tr>
             
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Coupon Active Status</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="radio" name="coupon_status" value="1" checked="checked" />&nbsp;Yes&nbsp;<input type="radio" name="coupon_status" value="0"/>&nbsp;No</td>
          </tr>
          
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">  
              <input type="hidden" name="process" value="addcoupon" />          
              <input name="submit" type="submit" class="normal_fonts9" value="Submit" /></td>
          </tr>
          
        </table></form></td>
      </tr>
       
      <?php
	  }
	  ?>
       <?php
	  if($_REQUEST["action"]=="editcoupon")
	  {
	  ?>
       <tr>
        <td colspan="2">
        <form name="couponform" id="couponform" method="post" action="process_coupon.php" enctype="multipart/form-data">
        <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
      <?php
		
		$recordsetcoupon = mysql_query("SELECT * FROM  coupon_master where coupon_id='".$_REQUEST["couponid"]."'");
	  if($rowcoupon = mysql_fetch_array($recordsetcoupon,MYSQL_ASSOC))
	  {
		  ?>     
          <tr bgcolor="#F3F3F3">
            <td width="30%" align="right" valign="top" class="normal_fonts9">Coupon Name</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top">
            <input name="coupon_id" type="hidden" value="<?php echo $rowcoupon["coupon_id"];?>" />
            <input name="coupon_name" type="text" class="normal_fonts9" size="45" />
            </td>
          </tr>
          <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Coupon Amount</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top"><input name="coupon_amount" type="text" class="normal_fonts9" size="16" />
            </td>
          </tr>
           <tr>
               <td align="right" bgcolor="#F3F3F3" class="normal_fonts9">Minimum Purchase Value</td>
               <td align="left" bgcolor="#F3F3F3">:</td>
               <td align="left" bgcolor="#F3F3F3" class="normal_fonts8"><input name="minimum_purchase_value" type="text" class="normal_fonts9" size="16" /></td>
             </tr>
             <tr>
               <td align="right" class="normal_fonts9">Expiration Date</td>
               <td align="left">:</td>
               <td align="left" class="normal_fonts8">
               <input name="expiration_date_from" type="text" id="expiration_date_from" class="normal_fonts9" size="16" onFocus="displayCalendar(expiration_date_from,'dd-mm-yyyy',this)" />&nbsp;To &nbsp;
               <input name="expiration_date_to" type="text" id="expiration_date_to" class="normal_fonts9" size="16" onFocus="displayCalendar(expiration_date_to,'dd-mm-yyyy',this)" />
               </td>
             </tr>
             <tr>
               <td align="right" bgcolor="#F3F3F3" class="normal_fonts9">Maximum Time Coupon Can Be Used</td>
               <td align="left" bgcolor="#F3F3F3">:</td>
               <td align="left" bgcolor="#F3F3F3" class="normal_fonts8">
               <input name="maximum_time_coupon_can_be_used" type="text" class="normal_fonts9" size="16" />
               </td>
             </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Coupon Active Status</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input type="radio" name="coupon_status" value="1" <?php if($rowcoupon["coupon_active_status"]==1){echo "checked";} ?> />&nbsp;Yes&nbsp;<input type="radio" name="coupon_status" value="0" <?php if($rowcoupon["coupon_active_status"]==0){echo "checked";} ?>/>&nbsp;No</td>
          </tr>
          
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">  
              <input type="hidden" name="process" value="editcoupon" />          
              <input name="submit" type="submit" class="normal_fonts9" value="Submit" /></td>
          </tr>
        <?php } ?>  
        </table></form></td>
      </tr>
       
      <?php
	  }
	  ?>
      
      
    </table></td>
  </tr>
  
  </table></td>
  </tr>
  
  <tr>
        <td align="center" valign="middle">
        <?php  include("footer.php"); ?>
        </td>
  </tr>
</table>
 </td></tr></table>

</body>
</html>
