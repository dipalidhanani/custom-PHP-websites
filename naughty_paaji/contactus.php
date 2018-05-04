<script language="javascript">
function validation_contact()
{
	with(document.contactform)
	{
			var error=0;
			var message;
			message="Please enter / correct folllowing errors to proceed further :";
			message=message+ "\n" + "--------------------------------------------------------------------";
			
			if(name.value=='')
			{
				
				error=1;
				message=message + "\n" + "Please enter your name";
			}
			
			if(emailid.value=='')
			{
				error=1;
				message=message + "\n" + "Please enter your emailid";
			}
			if(check_valid_email(emailid.value)==false)
			{
				error=1;
				message=message + "\n" + "Please enter valid emailid";
			}
			
			
			if(contactmessage.value=='')
			{
				error=1;
				message=message + "\n" + "Please enter your message";
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
        
<table border="0" cellspacing="0" cellpadding="0" width="100%">
          <tr>
            <td width="10" height="10"><img src="images/box2_01.png" width="10" height="10" /></td>
            <td background="images/box2_02.png" style="background-repeat:repeat-x;"></td>
            <td width="10" height="10"><img src="images/box2_03.png" width="10" height="10" /></td>
          </tr>
          <tr>
            <td background="images/box2_04.png" style="background-repeat:repeat-y;">&nbsp;</td>
            <td bgcolor="#E4DFD3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="17%" height="30" align="left" valign="middle"><h3 class="title">Contact Us</h3> </td>
                <td width="89%" align="left" class="black10">or write to us info@naughtypaaji.com</td>
              </tr>
              <tr>
                <td colspan="2">
                <form name="contactform" id="contactform" method="post" action="process_contactus.php">
                <table border="0" align="center" cellpadding="0" cellspacing="10" width="100%">
      
      <tr>
       <td width="10">&nbsp;</td>
        <td width="120" height="32" class="black10"><strong>Name<span style="color:#F00">*</span> : </strong></td>
        <td>
         <input type="text" name="name" id="name" class="textcss" size="39">  
        </td>
       
      </tr>
     
      <tr>
       <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Email Address<span style="color:#F00">*</span> : </strong></td>
        <td class="black10"> <input type="text" name="emailid" id="emailid" class="textcss" size="39"></td>
        </tr>
       <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Mobile Number : </strong></td>
        <td><input type="text" name="mobileno" class="textcss" size="39"></td>
        </tr>
       <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>City : </strong></td>
        <td><input type="text" name="city" class="textcss" size="39"></td>
        </tr>
       <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Message/ Query<span style="color:#F00">*</span> : </strong></td>
        <td><textarea name="contactmessage" id="contactmessage" rows="5" cols="30" class="textcss"></textarea></td>
       </tr>
       
      <tr>
        <td>&nbsp;</td>
        <td align="center" valign="middle">&nbsp;
               
          
             </td>
        <td>
          <input name="submit" type="submit" class="normal_fonts9" value="Submit" onClick="return validation_contact();" style="cursor:pointer;" /></td>
      </tr>
    </table>
                </form>
                </td>
              </tr>
              </table></td>
            <td background="images/box2_06.png" style="background-repeat:repeat-y;">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="images/box2_07.png" width="10" height="10" /></td>
            <td background="images/box2_08.png" style="background-repeat:repeat-x;"></td>
            <td><img src="images/box2_09.png" width="10" height="10" /></td>
          </tr>
        </table>
        
      