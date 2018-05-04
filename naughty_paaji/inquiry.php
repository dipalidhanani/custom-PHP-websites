<script language="javascript">

function validation_inquiry()
{
	with(document.inquiryform)
	{
			var error=0;
			var message;
			message="Please enter / correct folllowing errors to proceed further !";
			message=message+ "\n" + "--------------------------------------------------------------------";
			
			if(inquiry_name.value=='Name*')
			{
				
				error=1;
				message=message + "\n" + "Please enter your Name !";
			}
			
			if(inquiry_email.value=='E-mail*')
			{
				error=1;
				message=message + "\n" + "Please enter your E-mail !";
			}
			if(check_valid_email(inquiry_email.value)==false)
			{
				if(inquiry_email.value!='E-mail*')
			{
				error=1;
				message=message + "\n" + "Please enter valid E-mail !";
			}
			}
			
			
			if(inquiry_message.value=='Message*')
			{
				error=1;
				message=message + "\n" + "Please enter your Message !";
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

<table width="100%" border="0" cellspacing="10" cellpadding="0">
                          <form id="inquiryform" name="inquiryform" action="process_inquiry.php" method="post">
                            <tr>
                              <td height="25" align="left"><h3 class="title">Place Your Enquiry</h3></td>
                            </tr>
                          
              <tr><td class="black9">
              Send your inquiry below
              </td></tr>
              
               <tr><td class="black9" bgcolor="#D3C9B6" height="1">               
               </td></tr>
                             
                            <tr>
                              <td><input name="inquiry_name" type="text" class="black10 textcss"  id="inquiry_name" style="width:200px;" onFocus="if(this.value == 'Name*') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Name*';}"  value="Name*" /></td>
                            </tr>
                            <tr>
                              <td><input name="inquiry_contact" type="text" class="black10 textcss" id="inquiry_contact" style="width:200px;" onFocus="if(this.value == 'Contact') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Contact';}"  value="Contact" /></td>
                            </tr>
                            <tr>
                              <td><input name="inquiry_email" type="text" class="black10 textcss" id="inquiry_email" style="width:200px;" onFocus="if(this.value == 'E-mail*') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'E-mail*';}"  value="E-mail*" /></td>
                            </tr>
                            <tr>
                              <td><textarea name="inquiry_message" class="black10 textcss" id="inquiry_message"  style="width:200px; height:85px;" onFocus="if(this.value == 'Message*') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Message*';}">Message*</textarea></td>
                            </tr>
                            <tr>
                              <td align="center">
                              <input type="image" name="submit" id="submit" src="images/submit.png" onClick="return validation_inquiry();" style="cursor:pointer;"  />
                             </td>
                            </tr>
                            <tr>
                              <td align="center" class="black8">* All Fields are Mandatory</td>
                            </tr>
                            </form>
                          </table>