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
function validation_contactus()
{
	with(document.contactusform)
	{
			var error=0;
			var message;
			message="Please enter / correct folllowing errors to proceed further!";
			message=message+ "\n" + "--------------------------------------------------------------------";
			
			if(name.value=='')
			{
				error=1;
				message=message + "\n" + "Please Enter Name!";
			}
			
			if(email.value=='')
			{
				error=1;
				message=message + "\n" + "Please Enter Email Address!";
			}
			if(check_valid_email(email.value)==false)
			{
				error=1;
				message=message + "\n" + "Please Enter valid Email Address!";
			}
			
			if(query.value=='')
			{
				error=1;
				message=message + "\n" + "Please Enter Query / Message!";
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
<table width="960" border="0" cellspacing="0" cellpadding="10" bgcolor="#FFFFFF" class="border1">
              <?php $qtype=mysql_query("select * from page_master where page_ID='".$_GET["pageid"]."'");
							  $rowtype=mysql_fetch_array($qtype)
			  ?>               
               <tr>
                <td colspan="2" height="35" align="left" valign="middle" bgcolor="#727272" style="background:url(images/tag_bg.jpg) repeat-x; padding: 0;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                   <td width="10"> </td>
                    <td align="left" valign="middle" class="title_black"><span class="title_white"><?php echo $rowtype["page_title"]; ?></span></td>
                  </tr>
                </table>
                </td>
              </tr>
                             
                                <tr>                                  
                                  <td valign="top"><?php echo $rowtype["page_content"]; ?></td>                              
                                </tr>
                            
                             
                            </table>