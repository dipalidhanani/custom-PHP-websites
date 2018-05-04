<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>
<link href="css/home.css" rel="stylesheet" type="text/css" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td width="10">&nbsp;</td>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td class="titel_2"><strong>My Profile</strong></td>
  </tr>
  <tr>
    <td><table width="100%" border="0"  background="images/pgbg02a.jpg" class="border3" cellspacing="2" cellpadding="5">
              <?php
			  
                 $recordsetmyprofile = mysql_query("select * from register_master where register_ID='".$_SESSION['sqjeansloginuserid']."' and register_user_email='".$_SESSION['sqjeansloginuseremail']."'",$cn);
				while($rowmyprofile = mysql_fetch_array($recordsetmyprofile,MYSQL_ASSOC))
				{
				?>
              <tr>
                <td colspan="2" class="font10"><strong>Welcome
                  <?php  echo $rowmyprofile["register_user_first_name"]." ".$rowmyprofile["register_user_last_name"];?>
                </strong></td>
                </tr>
              <tr>
                <td width="1%" class="font10">&nbsp;</td>
                <td class="font10"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
                  <tr>
                    <td width="15"><img src="images/5.gif" width="14" height="13" /></td>
                    <td width="3">&nbsp;</td>
                    <td height="25"><a href="mydetails.html">My Details</a></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td class="font10">&nbsp;</td>
                <td class="font10"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
                  <tr>
                    <td width="15"><img src="images/5.gif" width="14" height="13" /></td>
                    <td width="3">&nbsp;</td>
                    <td height="25"><a href="updateprofile.html">Update Profile</a></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td class="font10">&nbsp;</td>
                <td class="font10"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
                  <tr>
                    <td width="15"><img src="images/5.gif" width="14" height="13" /></td>
                    <td width="3">&nbsp;</td>
                    <td height="25"><a href="mycart.html">My Cart</a> (<?php $recordsetselected = mysql_query("select * from bill_selected_records
INNER JOIN bill_master ON bill_master.bill_master_ID=bill_selected_records.bill_master_ID							 
where 
bill_email_id='".$_SESSION['sqjeansloginuseremail']."' and
bill_payment_status!='Completed' and
bill_payment_status!='Pending'
",$cn);
echo mysql_num_rows($recordsetselected);
?>)</td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td class="font10">&nbsp;</td>
                <td class="font10"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
                  <tr>
                    <td width="15"><img src="images/5.gif" width="14" height="13" /></td>
                    <td width="3">&nbsp;</td>
                    <td height="25"><a href="myorders.html">My Order History</a></td>
                  </tr>
                </table></td>
              </tr>
              
              <tr>
                <td class="font10">&nbsp;</td>
                <td class="font10"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
                  <tr>
                    <td width="15"><img src="images/5.gif" width="14" height="13" /></td>
                    <td width="3">&nbsp;</td>
                    <td height="25"><a href="changepassword.html">Change Password</a></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td class="font10">&nbsp;</td>
                <td class="font10"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
                  <tr>
                    <td width="15"><img src="images/5.gif" width="14" height="13" /></td>
                    <td width="3">&nbsp;</td>
                    <td height="25"><a href="logout.html">Logout</a></td>
                  </tr>
                </table></td>
              </tr>
              <?php
				}
				?>
          </table></td>
  </tr>
</table>

    </td>
    <td width="10">&nbsp;</td>
  </tr>

</table>