<link href="css/home.css" rel="stylesheet" type="text/css" />
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="122" valign="top" background="images/index_01.jpg" onclick="window.location.href='index.php'" ><table width="100%" border="0" cellspacing="10" cellpadding="0">
      <tr>
          <td width="18%" height="25" align="right">&nbsp;</td>
          <?php	if($_SESSION['user_reg_id']!=""){ $width="30%"; } else { $width="46%"; } ?>
          <td width="<?php echo $width; ?>" align="right"><a href="index.php"></a></td>
          <td class="white-text"><a href="#"></a>
              <table width="100%" border="0" cellspacing="5" cellpadding="0">
                  <tr>
                      <td width="45" class="white9"><a href="index.php">HOME</a></td>
                      <td width="5" class="white9" align="center">|</td>
                      <td class="white9" width="83"><a href="home.php?pageno=22">CONTACT&nbsp;US</a></td>
                      <td width="14" class="white9" align="center">|</td>
                      <td class="white9" width="85"><a href="home.php?pageno=28">TESTIMONIALS</a></td>
                       <?php					
						if($_SESSION['user_reg_id']=="")
						{
						?>
                      <td width="14" class="white9" align="center">|</td>
                      <td width="54" class="white9"><a href="home.php?pageno=16">SIGN&nbsp;UP</a></td>
                       <?php
						}
						if($_SESSION['user_reg_id']!="")
						{
						?>
						<td width="14" class="white9" align="center">|</td>
                      <td width="72" class="white9"> <a href="home.php?pageno=33&view=profiledetails#t">MY&nbsp;PROFILE</a> </td>				
						<?php } ?>
                      <td width="14" class="white9" align="center">|</td>
                        <?php					
						if($_SESSION['user_reg_id']!="")
						{
						?>
						
                      <td width="288" class="white9"> <a href="home.php?pageno=24">ADD PROPERTY</a> </td>
                      <td width="16" class="white9" align="center">|</td>				
						<?php } ?>
                      <td width="83" class="white9">
                       <?php					
						if($_SESSION['user_reg_id']=="")
						{
						?>
                      <a href="home.php?pageno=18">SIGN&nbsp;IN</a>
                      <?php } else {  ?>
                       <a href="logout.php">LOG&nbsp;OUT</a>
                      <?php } ?> 
                      </td>
                  </tr>
              </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><img src="images/index_02.jpg" width="1000" height="194" alt=""></td>
  </tr>
  <tr>
    <td><?php include("menu.php"); ?></td>
  </tr>
</table>
<map name="Map" id="Map">
  <area shape="rect" coords="40,9,341,112" href="index.php" />
</map>