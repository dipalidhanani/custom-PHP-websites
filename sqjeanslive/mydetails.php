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
    <table width="100%" border="0"  cellspacing="0" cellpadding="5">
  <tr>
    <td class="titel_2"><strong>My Details</strong></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <?php
                 $recordsetmyprofile = mysql_query("select * from register_master where register_ID='".$_SESSION['sqjeansloginuserid']."' and register_user_email='".$_SESSION['sqjeansloginuseremail']."'",$cn);
				while($rowmyprofile = mysql_fetch_array($recordsetmyprofile,MYSQL_ASSOC))
				{
				?>
              <tr>
                <td><table width="100%" border="0"  background="images/pgbg02a.jpg" cellpadding="5" cellspacing="0" class="border3" >
                  <tr>
                    <td width="29%" align="right" valign="top" class="font10" ><strong>Name </strong></td>
                    <td width="1%"class="font9"><strong>:</strong></td>
                    <td width="70%"class="font9"><strong>
                      <?php  echo $rowmyprofile["register_user_first_name"];?>
                       <?php  echo $rowmyprofile["register_user_last_name"];?>
                    </strong></td>
                    </tr>
                  <tr>
                    <td width="29%" align="right" valign="top" class="font10" >Address </td>
                    <td class="font9">:</td>
                    <td class="font9"><?php  echo $rowmyprofile["register_user_address"];?></td>
                  </tr>
                  <tr>
                    <td align="right" valign="top" class="font10" >&nbsp;</td>
                    <td class="font9">:</td>
                    <td class="font9"><?php  echo $rowmyprofile["register_user_address_2"];?></td>
                    </tr>
                  <tr>
                    <td align="right" valign="top" class="font10" >City &amp; Post Code</td>
                    <td class="font9">:</td>
                    <td class="font9"><?php  echo $rowmyprofile["register_user_city"];?> <?php  echo $rowmyprofile["register_user_pincode"];?></td>
                    </tr>
                  <tr>
                    <td align="right" valign="top" class="font10" >State</td>
                    <td class="font9">:</td>
                    <td class="font9"><?php  echo $rowmyprofile["register_user_state"];?></td>
                  </tr>
                  <tr>
                    <td align="right" valign="top" class="font10" >Country </td>
                    <td class="font9">:</td>
                    <td class="font9"><?php echo $rowmyprofile["register_user_country"]; ?></td>
                    </tr>
                    <tr>
                    <td width="29%" align="right" valign="top" class="font10" >Email Address </td>
                    <td width="1%" class="font9">:</td>
                    <td width="70%" class="font9"><?php  echo $rowmyprofile["register_user_email"];?></td>
                    </tr>
                  <tr>
                    <td height="28" align="right" valign="top" class="font10" >Phone / Mobile</td>
                    <td class="font9">:</td>
                    <td class="font9"><?php  echo $rowmyprofile["register_user_phone"];?> <?php  echo $rowmyprofile["register_user_mobile"];?></td>
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