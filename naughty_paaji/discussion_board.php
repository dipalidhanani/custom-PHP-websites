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
              <td height="30" align="left" valign="middle" colspan="3" class="black10">
                <a href="index.php">Home</a> > Discussion Board 
              </td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle"><h3 class="title">Discussion Board</h3></td>
              </tr>
              <tr><td class="black9" colspan="2">
             Here you have a forum where you can discuss issues that affect you or your friends / close ones. Start discussing now.
              </td></tr>
              <tr><td class="black9" height="8" colspan="2">           
               </td></tr>
               
               <tr><td class="black9" bgcolor="#D3C9B6" height="1" colspan="2">               
               </td></tr>
               <tr><td class="black9" height="8" colspan="2">           
               </td></tr>
              
              <tr>
                <td><table width="100%" border="0" cellpadding="0" cellspacing="5">
                  <?php 

   $query = "select * from discussion_board
   order by discussion_board_id DESC";
   
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
                        <td width="50" rowspan="14" align="center" valign="top"><img src="images/icon.png" width="39" height="33" /></td>
                        <td class="black9"><a href="index.php?page=9&discussion_board_id=<?php echo $rescat["discussion_board_id"]; ?>">
<strong><?php echo $rescat["discussion_topic"]; ?></strong></a></td>
                        </tr>
                      <tr>
                        <td class="black9" ><div align="justify"><?php echo $rescat["discussion_description"]; ?></div></td>
                        </tr>
                      <tr>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td class="red9" >Hits : <strong><?php echo $rescat["hits"]; ?> </strong> |  Posts : <strong><?php
								    $qcomment=mysql_query("select * from discussion_detail where discussion_board_mast_id='".$rescat["discussion_board_id"]."' and comment_active_status=2");
									$totcomment=mysql_num_rows($qcomment);
								   echo $totcomment; 
								   ?></strong></td>
                            <td height="20" align="right" valign="middle"><a href="index.php?page=9&discussion_board_id=<?php echo $rescat["discussion_board_id"]; ?>"><img src="images/joindiscussion.png" alt="Join Discussion"  title="Join Discussion"width="114" height="20" border="0" /></a></td>
                            </tr>
                          </table></td>
                        </tr>
                        
                      <tr>
                        <td height="5" colspan="2" align="center" valign="top"></td>
                        </tr>
         <?php 
		 $querycom=mysql_query("select * from discussion_detail
				INNER JOIN discussion_board ON discussion_board.discussion_board_id=discussion_detail.discussion_board_mast_id
				INNER JOIN user_registration ON user_registration.user_reg_id=discussion_detail.comment_from_id
				where discussion_board_mast_id='".$rescat["discussion_board_id"]."' and comment_active_status=2 order by discussion_detail_id DESC limit 5");
$totcom=mysql_num_rows($querycom);
if($totcom>0){
		 ?>
                        <tr>                        
                        <td class="title" colspan="2" style="padding-left:10px;"><strong>Recent Comments</strong></td>
                        </tr>
                          <?php 
			while($rescomment=mysql_fetch_array($querycom))
			   {
				 $disid=$rescomment["discussion_detail_mast_id"]; 
				 $m=$rescomment["discussion_detail_id"];
  
	?>
<tr>
<td style="padding-left:5px;">
<table width="100%" cellpadding="0" cellspacing="5">
<tr><td class="black10">

            <strong><?php
			echo $rescomment["discussion_comment"]; ?></strong>
            </td></tr>
            <tr><td class="normal_fonts9"><span class="red9">Posted by 
			<?php
            echo $rescomment["first_name"]." ".$rescomment["last_name"]; ?> on
                                <?php  $dt1=explode("-",$rescomment["comment_date_time"]);
                                                                $yy1=$dt1[0];
                                                                $mm1=$dt1[1];
                                                                $dd1=$dt1[2];
																
                                                             $tm=explode(" ",$dd1);
															     $dt=$tm[0];
																 $tim=$tm[1];
                                                            $rdate=$dt."-".$mm1."-".$yy1;
                                                            
                                                            echo $rdate." at ".$tim;
															 ?>
            </span></td>
</tr>

</table>

</td>
</tr>
 <tr>
                        <td height="5" colspan="2" align="center" valign="top"></td>
                        </tr>
                        <?php } } ?>
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