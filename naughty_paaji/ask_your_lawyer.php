<script language="javascript">
function validation_ask()
{
	with(document.ask_your_lawyerform)
	{
			var error=0;
			var message;
			message="Please enter / correct folllowing errors to proceed further !";
			message=message+ "\n" + "--------------------------------------------------------------------";
			
			if(name1.value=='')
			{
				
				error=1;
				message=message + "\n" + "Please enter your Name !";
			}
			
			if(emailid1.value=='')
			{
				error=1;
				message=message + "\n" + "Please enter your Email Address !";
			}
			if(check_valid_email(emailid1.value)==false)
			{
				if(emailid1.value!='')
			{
				error=1;
				message=message + "\n" + "Please enter valid Email Address !";
			}
			}
			
			
			if(question.value=='')
			{
				error=1;
				message=message + "\n" + "Please enter your Question !";
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
                <td height="30" align="left" valign="middle" colspan="2"><h3 class="title">Ask your lawyer</h3></td>
              </tr>
              <tr><td class="black9" colspan="2">
              Meet your lawyer
              </td></tr>
              <tr><td class="black9" height="8" colspan="2">           
               </td></tr>
               
               <tr><td class="black9" bgcolor="#D3C9B6" height="1" colspan="2">               
               </td></tr>
               <tr><td class="black9" height="8" colspan="2">           
               </td></tr>
               <tr>
               <td width="170"><img src="images/shonu_pic.jpg" border="0" align="absmiddle" width="163" height="180" /></td>
               <td class="black9" valign="top" align="justify">
               <strong>Adv. (Mrs.) Sonali Ray</strong><br />
               <strong>L.L.B., M.A.(History</strong>)<br /><br />
Sonali is the lead author and legal content developer for the website. A law graduate from B.R. Ambedkar University, Agra, she has also received Post Graduate Diploma in Intellectual Property Rights Law from National Law School, Bangalore. She also holds a Post graduate degree in Master of Arts (History). In the past she has been associated with 'The Law Associates', wherein she had worked upon cases in the Supreme Court of India, Delhi High Court, Sessions courts in Delhi and Consumer Forums as Counsel. 
</td></tr>
<tr><td class="black9" height="8" colspan="2">           
               </td></tr>
<tr><td class="black9" bgcolor="#D3C9B6" height="1" colspan="2">               
               </td></tr>
               <tr><td height="5"></td></tr>
               <tr><td class="black9" height="8" colspan="2">        
               If you have any queries pertaining to any of the fundamental rights or duties, ask your question now.   
               </td></tr>
              <tr>
                <td colspan="2">
                <form name="ask_your_lawyerform" id="ask_your_lawyerform" method="post" action="process_ask_your_lawyer.php">
                <table border="0" align="center" cellpadding="0" cellspacing="10" width="100%">
      
      <tr>
       <td width="10">&nbsp;</td>
        <td width="120" height="32" class="black10"><strong>Name<span style="color:#F00">*</span> : </strong></td>
        <td>
         <input type="text" name="name1" id="name1" size="39" class="textcss" value="<?php if($_POST["name"]!="Name"){echo $_POST["name"]; } ?>"> 
        </td>
       
      </tr>
     
      <tr>
       <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Email Address<span style="color:#F00">*</span> : </strong></td>
        <td> <input type="text" name="emailid1" id="emailid1" size="39" class="textcss" value="<?php if($_POST["emailid"]!="E-mail"){echo $_POST["emailid"]; } ?>"> </td>
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
        <td height="32" class="black10"><strong>Question<span style="color:#F00">*</span> : </strong></td>
        <td><textarea name="question" id="question" rows="8" cols="55" class="textcss"></textarea></td>
       </tr>
       
      <tr>
        <td>&nbsp;</td>
        <td align="center" valign="middle">&nbsp;
               
          
             </td>
        <td><input type="hidden" name="process" value="addquestion" /> 
          <input name="submit" type="submit" class="normal_fonts9" value="Submit" onClick="return validation_ask();" style="cursor:pointer;" /></td>
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
        
       