<link href="css/css.css" rel="stylesheet" type="text/css" />

<table width="220" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    <form name="ask_your_lawyerform" id="ask_your_lawyerform" method="post" action="index.php?page=1" enctype="multipart/form-data">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="200" align="left" valign="top" background="images/askyourlawyer.png" style="background-repeat:no-repeat;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="12" height="82">&nbsp;</td>
            <td>&nbsp;</td>
            <td width="17">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="27" align="center" valign="middle"><input name="name" type="text" class="blue"  id="name" onfocus="if(this.value == 'Name') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Name';}"  value="Name" style="width:173px; padding:0px; background:none; border:none;"/></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="8"></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="27" align="center" valign="middle"><input name="emailid" type="text" class="blue"  id="emailid" onfocus="if(this.value == 'E-mail') {this.value = '';}" onblur="if (this.value == '') {this.value = 'E-mail';}"  value="E-mail" style="width:173px; padding:0px; background:none; border:none;"/></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="10"></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>
            <input type="image" name="submit" src="images/submit.png" style="margin-left:18px;" />
           </td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table>
    </form>
    </td>
  </tr>
  <tr>
    <td height="10"></td>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="10" height="10"><img src="images/box1_01.png" width="10" height="10" /></td>
        <td background="images/box1_02.png" style="background-repeat:repeat-x;"></td>
        <td width="10" height="10"><img src="images/box1_03.png" width="10" height="10" /></td>
      </tr>
      <tr>
        <td background="images/box1_04.png" style="background-repeat:repeat-y;">&nbsp;</td>
        <td bgcolor="#D3C9B6"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="52" align="center" valign="top"><img src="images/share-your-experience-text.png" width="193" height="47" /></td>
          </tr>
          <?php // $queryexp=mysql_query("select * from share_experience order by share_experience_id desc limit 2"); 
		 // while($rowexp=mysql_fetch_array($queryexp))
		 // {
		  ?>
          <tr>
            <td class="black10">If you feel you have an experience worth sharing with all, post it now. 
			<?php // echo $rowexp["experience"]; ?>
            </td>
          </tr>
           <tr>
            <td height="8" align="center" valign="middle"></td>
          </tr>
          <?php // } ?>
         
          <tr>
            <td align="center" valign="middle"><a href="index.php?page=2"><img src="images/sharenow.png" alt="Share Now" title="Share Now" width="111" height="30" border="0" /></a></td>
          </tr>
        </table></td>
        <td background="images/box1_06.png" style="background-repeat:repeat-y;">&nbsp;</td>
      </tr>
      <tr>
        <td><img src="images/box1_07.png" width="10" height="10" /></td>
        <td background="images/box1_08.png" style="background-repeat:repeat-x;"></td>
        <td><img src="images/box1_09.png" width="10" height="10" /></td>
      </tr>
    </table></td>
  </tr>
  <tr><td height="10"></td></tr>
  <tr><td><div class="fb-like-box" data-href="http://www.facebook.com/pages/Naughty-Paa-Ji/269860203116880#!/pages/Naughty-Paa-Ji/269860203116880?fref=ts" data-width="220" data-colorscheme="light" data-show-faces="true" data-stream="true" data-header="true"></div></td></tr>
</table>