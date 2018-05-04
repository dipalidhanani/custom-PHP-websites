<table width="960" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0" class="border1">
                    <tr>
                        <td bgcolor="#FFFFFF">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
       <tr>
                                <td height="35" bgcolor="#727272" style="background:url(images/tag_bg.jpg) repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="10">&nbsp;</td>
                                        <td align="left" valign="middle" class="title_black"><span class="title_white"><?php
	  if(($_REQUEST["msg"]=="already_subscribe") || ($_REQUEST["msg"]=="forgot"))
	  {?>	Message <?php } else { ?>Thank you, <?php } ?></span></td>
                                       
                                        <td width="10">&nbsp;</td>
                                    </tr>
                                </table></td>
       </tr>
      <tr>       
        <td bgcolor="#FFFFFF" class="black10">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
      
      <?php
	  if($_REQUEST["value"]=="register")
	  {
	  ?>
      <tr>
        <td width="5" bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td class="titel">Thank you,</td>
          </tr>
          <tr>
            <td class="font10"><strong>Your account has been created successfully on Klassic Kids.</strong></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          </table></td>
        
      </tr>
      <?php
	  }
	  ?>
       <?php
		if($_REQUEST["msg"]=="order")
		{
		?>
                    <tr>
                     <td width="5" bgcolor="#FFFFFF">&nbsp;</td>
                      <td><table width="100%" border="0" cellspacing="0" cellpadding="5">
                        <tr>
                          <td class="font10" ><strong>Thank you for your order on Klassic Kids</strong></td>
                        </tr>
                        <tr>
                          <td class="font10" ><strong>Your Order Transaction ID : <?php echo base64_decode($_SESSION["orderid"]);?></strong></td>
                        </tr>
                         <tr>
                          <td class="font10" ><strong>Our Support Team will analyze your order and contact you as soon as possible.</strong></td>
                        </tr>
                        <tr>
                          <td class="font10" ><strong>Kindly save your transaction id for future reference.</strong></td>
                        </tr>
                        <tr>
                          <td class="font10" ><strong>Thanks,</strong></td>
                        </tr>
                        <tr>
                          <td class="font10" ><strong>Klassic Kids</strong></td>
                        </tr>
                      </table></td>
                    </tr>
		<?php
        }
        ?>
       <?php
	  if($_REQUEST["msg"]=="newsletter")
	  {
	  ?>
      <tr>
        <td width="5" bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td class="titel">Thank you,</td>
          </tr>
          <tr>
            <td class="font10"><strong>Thank you for newsletter subscription on Klassic Kids.</strong></td>
          </tr>         
          <tr>
            <td class="font10">&nbsp;</td>
          </tr>
          </table></td>
      
      </tr>
      <?php
	  }
	  ?>
       <?php
	  if($_REQUEST["msg"]=="already_subscribe")
	  {
	  ?>
      <tr>
        <td width="5" bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td class="titel"></td>
          </tr>
          <tr>
            <td class="font10"><strong>This Email Address is already exist in our subscription list!</strong></td>
          </tr>         
          <tr>
            <td class="font10">&nbsp;</td>
          </tr>
          </table></td>
      
      </tr>
      <?php
	  }
	  ?>
       <?php
	  if($_REQUEST["msg"]=="forgot")
	  {
	  ?>
      <tr>
        <td width="5" bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td class="titel"></td>
          </tr>
          <tr>
            <td class="font10"><strong>An Email With Your Account Password Has Been Sent To Your Mail.</strong></td>
          </tr>         
          <tr>
            <td class="font10">&nbsp;</td>
          </tr>
          </table></td>
      
      </tr>
      <?php
	  }
	  ?>
       <?php
	  if($_REQUEST["msg"]=="contact")
	  {
	  ?>
      <tr>
        <td width="5" bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td class="titel">Thank you,</td>
          </tr>
          <tr>
            <td class="font10"><strong>Thank you for your inquiry, we will contact you soon.</strong></td>
          </tr>         
          <tr>
            <td class="font10">&nbsp;</td>
          </tr>
          </table></td>
      
      </tr>
      <?php
	  }
	  ?>
     <tr> 
     <td width="5" bgcolor="#FFFFFF">&nbsp;</td>
     <td bgcolor="#FFFFFF">
      <table width="100%" border="0" cellspacing="2" cellpadding="2">
      <tr>
     <td class="black10" ><span class="link"><a href="index.php"><u><strong>Redirect To Home Page</strong></u></a></span></td></tr>
     </table></td></tr>
      <tr>
            <td class="font10">&nbsp;</td>
          </tr>
     
    </table>
    
    </td>
      
      </tr>
      
    </table>
    </td>
                    </tr>
                </table>
                </td></tr></table>