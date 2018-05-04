
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="10" height="10"><img src="images/box2_01.png" width="10" height="10" /></td>
            <td background="images/box2_02.png" style="background-repeat:repeat-x;"></td>
            <td width="10" height="10"><img src="images/box2_03.png" width="10" height="10" /></td>
          </tr>
          <tr>
            <td background="images/box2_04.png" style="background-repeat:repeat-y;">&nbsp;</td>
            <td bgcolor="#E4DFD3"> 
        <form name="pass" method="post" action="process_forgot.php">
        <?php $emailerr=$_GET["emailerr"];   $err=$_GET["err"]; ?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
                <td height="30" align="left" valign="middle" colspan="2"><h3 class="title">Forgot Password?</h3></td>
          </tr>
          <tr>
            <td height="10" colspan="2"></td>
          </tr>
          <tr><td colspan="2" class="err_validate">Please enter your email address to retrieve your password.</td></tr>
          <tr>
            <td height="10" colspan="2"></td>
            </tr>
          <tr><td class="black10" width="150">Your Email Address :</td><td> <input type="text" name="email" id="email" size="35" class="textcss" ></td></tr>
         
          <tr><td colspan="2" height="10"></td></tr>
          <?php if(($err!="") || ($emailerr!=""))
		        {
		  ?>
           <tr><td height="10" align="center" class="err_validate"></td>
            <td height="10" class="err_validate">
			<?php echo $err;
			echo $emailerr;
			
			?></td>
            <tr><td height="10" align="center" class="err_validate"></td>
            </tr>
            <?php } ?>
          <tr><td class="black10" width="150">&nbsp;</td><td class="fonts9"><input type="submit" name="submit" id="submit" value="Submit" ></td></tr>
        </table>
        </form>
       </td>
            <td background="images/box2_06.png" style="background-repeat:repeat-y;">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="images/box2_07.png" width="10" height="10" /></td>
            <td background="images/box2_08.png" style="background-repeat:repeat-x;"></td>
            <td><img src="images/box2_09.png" width="10" height="10" /></td>
          </tr>
        </table>
   
