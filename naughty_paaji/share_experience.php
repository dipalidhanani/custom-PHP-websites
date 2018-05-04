<script language="javascript">
function validation_share()
{
	with(document.share_your_experienceform)
	{
			var error=0;
			var message;
			message="Please enter / correct folllowing errors to proceed further !";
			message=message+ "\n" + "--------------------------------------------------------------------";
			
			if(name.value=='')
			{
				
				error=1;
				message=message + "\n" + "Please enter your Name !";
			}
			
			if(emailid.value=='')
			{
				error=1;
				message=message + "\n" + "Please enter your Email address !";
			}
			if(check_valid_email(emailid.value)==false)
			{
				if(emailid.value!='')
			{
				error=1;
				message=message + "\n" + "Please enter valid Email address !";
			}
			}
			
			
			if(experience.value=='')
			{
				error=1;
				message=message + "\n" + "Please enter your Experience !";
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
                <td height="30" align="left" valign="middle"><h3 class="title">Share Your Experience</h3></td>
              </tr>
              <tr><td class="black9">
              If you feel you have an experience worth sharing with all, post it now.
              </td></tr>
              <tr><td class="black9" height="8">           
               </td></tr>
               <tr><td class="black9" bgcolor="#D3C9B6" height="1">               
               </td></tr>
              <tr>
                <td>
                <form name="share_your_experienceform" id="share_your_experienceform" method="post" action="process_share_experience.php">
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
        <td> <input type="text" name="emailid" id="emailid" class="textcss" size="39"> </td>
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
        <td height="32" class="black10"><strong>Experience<span style="color:#F00">*</span> : </strong></td>
        <td><textarea name="experience" id="experience" rows="8" cols="55" class="textcss"></textarea></td>
       </tr>
       
      <tr>
        <td>&nbsp;</td>
        <td align="center" valign="middle">&nbsp;
               
          
             </td>
        <td>
          <input name="submit" type="submit" class="normal_fonts9" value="Submit" onClick="return validation_share();" style="cursor:pointer;" /></td>
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
        
      