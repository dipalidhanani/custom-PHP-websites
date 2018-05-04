<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="10" height="10"><img src="images/box2_01.png" width="10" height="10" /></td>
            <td background="images/box2_02.png" style="background-repeat:repeat-x;"></td>
            <td width="10" height="10"><img src="images/box2_03.png" width="10" height="10" /></td>
          </tr>
          <tr>
            <td background="images/box2_04.png" style="background-repeat:repeat-y;">&nbsp;</td>
            <td bgcolor="#E4DFD3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
            <td>
            <table width="100%">
            <tr>
              <td height="30" align="left" valign="middle" colspan="3" class="black10">
                <a href="index.php">Home</a> > Experience 
              </td>
            
              </tr>
              <tr>
                <td height="30" align="left" valign="middle"><h3 class="title">All Experiences</h3></td>
              </tr>
              </table></td>
              <td align="right" width="118"><a href="index.php?page=2"><img src="images/sharenow.png" alt="Share Now" title="Share Now" width="111" height="30" border="0" /></a></td>
              </tr>
              <tr><td class="black9" colspan="2">
             If you feel you have an experience worth sharing with all, post it now. 
              </td></tr>
              <tr><td class="black9" height="8" colspan="2">           
               </td></tr>
               
               <tr><td class="black9" bgcolor="#D3C9B6" height="1" colspan="2">               
               </td></tr>
               <tr><td class="black9" height="8" colspan="2">           
               </td></tr>
              
              <tr>
                <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="5">
                  <?php 

   $query = "select * from share_experience
   order by share_experience_id DESC";
   
   $result= mysql_query($query) 
   or die (mysql_error());
   $l=1;
   while($rescat=mysql_fetch_array($result))
   {   
	?>
    <tr>
        <td height="5"></td>
    </tr>
                  <tr>
                    <td ><table width="100%" border="0" cellpadding="0" cellspacing="0"  <?php if($l!=mysql_num_rows($result)){ ?> class="border-bottom" <?php } ?>>
                      <tr>
                        <td width="50" rowspan="3" align="center" valign="top"><img src="images/icon.png" width="39" height="33" /></td>
                        <td class="black9"><a href="index.php?page=21&share_experience_id=<?php echo $rescat["share_experience_id"]; ?>">
<strong><?php echo $rescat["experience"]; ?></strong></a></td>
                        </tr>
                     
                      <tr>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td class="red9" ></strong>Posts : <strong><?php
								    $qcomment=mysql_query("select * from experience_detail where experience_mast_id='".$rescat["share_experience_id"]."' and comment_active_status=2");
									$totcomment=mysql_num_rows($qcomment);
								   echo $totcomment; 
								   ?></strong> | By : <strong><?php echo $rescat["name"]; ?> </td>
                            <td height="20" align="right" valign="middle"><a href="index.php?page=21&share_experience_id=<?php echo $rescat["share_experience_id"]; ?>"><img src="images/post_comment.png" alt="Post Comment"  title="Post Comment"width="114" height="20" border="0" /></a></td>
                            </tr>
                          </table></td>
                        </tr>
                      <tr>
                        <td height="5" colspan="2" align="center" valign="top"></td>
                        </tr>
                      </table></td>
                    </tr>
                  
    <?php $l++; } ?>   
                  </table></td>
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