<link href="css/css-home.css" rel="stylesheet" type="text/css">
<script language="javascript">
 function check_valid_email(emailval)
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

function validation_newsletter()
{ 
	with(document.newsletterform)
	{
			var error=0;
			var message;
			
			if(newsletter.value=='Email Address')
			{
				error=1;
				message="Please Enter Email Address!";
				
			}
			if(check_valid_email(newsletter.value)==false)
			{
				error=1;
				message="Please Enter Valid Email Address!";
			}
			
			if (error==1)
			{
				alert(message);
				return false;
			}
			else
			{
				return true;		
			}
	}
}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td height="7" style="background:url(images/footer-top.png) repeat-x center top;"></td>
    </tr>
    <tr>
        <td align="center" valign="top" bgcolor="#4994DD"><table width="960" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>&nbsp;</td>
                <td width="10">&nbsp;</td>
                <td>&nbsp;</td>
                <td width="10">&nbsp;</td>
                <td>&nbsp;</td>
                <td width="10">&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="20" align="left" valign="top"><img src="images/categoies.png" width="16" height="132" /></td>
                        <td align="left" valign="top"><table width="100%" border="0" cellpadding="2" cellspacing="0" class="white8">
                          <?php
						  $qcat=mysql_query("select * from category_master order by category_ID desc limit 11") or die(mysql_error());
						  while($rowcat=mysql_fetch_array($qcat)){
						  ?>
                            <tr>
                                <td><?php echo $rowcat["category_name"]; ?></td>
                            </tr>
                            
                            <?php } ?>
                        </table></td>
                    </tr>
                </table></td>
                <td>&nbsp;</td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="20" align="left" valign="top"><img src="images/company-info.png" width="16" height="155" /></td>
                        <td align="left" valign="top">
                        <table width="100%" border="0" cellpadding="2" cellspacing="0" class="white8">
                        <?php $qcomp=mysql_query("select * from page_master where page_content_active_status = 1"); 
						while($rowcomp=mysql_fetch_array($qcomp)){
						?>
                            <tr>
                                <td><a href="index.php?content=26&pageid=<?php echo $rowcomp["page_ID"]; ?>"><?php echo $rowcomp["page_title"]; ?></a></td>
                            </tr>
                         <?php } ?>   
                        </table></td>
                    </tr>
                </table></td>
                <td>&nbsp;</td>
                <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td height="23" align="left" valign="top"><img src="images/subscribe-today.png" width="193" height="15" /></td>
                    </tr>
                    <form action="newsletter_process.php" method="post" name="newsletterform" id="newsletterform">
                    <tr>
                        <td height="43">
                        
                            <input name="newsletter" type="text" class="text9"  id="newsletter" onfocus="if(this.value == 'Email Address') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Email Address';}"  value="Email Address" style="width:200px; padding:5px; border:none;"/></td>
                    </tr>
                   
                    <tr>
                        <td><input type="image" name="submit" id="submit" src="images/submit.png" onclick="return validation_newsletter();"/></td>
                    </tr>
                     </form>
                    <tr>
                        <td height="30">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="left" valign="middle"><img src="images/follows-us-on.png" width="166" height="15" /></td>
                    </tr>
                    <tr>
                        <td height="10"></td>
                    </tr>
                    <tr>
                        <td><table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="55" align="center" valign="middle"><a href="#"><img src="images/f-icon.png" alt="Facebook" title="Facebook" width="48" height="48" border="0" /></a></td>
                                <td width="55" align="center" valign="middle"><a href="#"><img src="images/t-icon.png" alt="twitter" title="twitter" width="48" height="48" border="0" /></a></td>
                            </tr>
                        </table></td>
                    </tr>
                </table></td>
                <td>&nbsp;</td>
                <td width="310" align="right" valign="top"><table width="309" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="left" valign="top" bgcolor="#58A2EB"><table width="100%" border="0" cellspacing="8" cellpadding="0">
                            <tr>
                                <td align="left" valign="top"><?php include("testimonials.php"); ?></td>
                            </tr>
                        </table></td>
                        <td width="78" align="right"><img src="images/girl-holding.png" width="78" height="210" /></td>
                    </tr>
                </table></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </table></td>
    </tr>
</table>

