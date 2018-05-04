<table width="100%" border="0" cellspacing="0" cellpadding="0">
     
     <tr>
        <td height="5"></td>
      </tr> 
      <?php $querycom=mysql_query("select * from discussion_detail
				INNER JOIN discussion_board ON discussion_board.discussion_board_id=discussion_detail.discussion_board_mast_id
				INNER JOIN user_registration ON user_registration.user_reg_id=discussion_detail.comment_from_id
				where discussion_board_mast_id='".$a."' and comment_active_status=2 order by discussion_detail_id DESC ");
$totcom=mysql_num_rows($querycom);
if($totcom>0){
while($rescomment=mysql_fetch_array($querycom))
			   {
				 $disid=$rescomment["discussion_detail_mast_id"]; 
				 $m=$rescomment["discussion_detail_id"];
  
	?>
      <tr>
        <td align="left" valign="top">
        <table width="100%" cellpadding="0" cellspacing="5" class="border1"  >
            
        <?php 
		
		if($rescomment["discussion_detail_mast_id"]!=0)
{
	
	$q=mysql_query("select * from discussion_detail
				INNER JOIN discussion_board ON discussion_board.discussion_board_id=discussion_detail.discussion_board_mast_id
				INNER JOIN user_registration ON user_registration.user_reg_id=discussion_detail.comment_from_id
				where discussion_detail_id='".$disid."' and comment_active_status=2 order by discussion_detail_mast_id DESC ");
	if($resq=mysql_fetch_array($q))
	{
?>  
<tr><td bgcolor="#D3C9B6">
<table cellpadding="0" cellspacing="5">
<tr>
  <td class="normal_fonts14">
<i class="normal_fonts14_black">Original comment</i>
</td>
</tr>
            <tr><td class="black10">
            <i><strong><?php echo $resq["discussion_comment"]; ?></strong></i>
            </td></tr>
            <tr><td class="normal_fonts9"><i class="red9">Posted by 
			<?php
            echo $resq["first_name"]." ".$resq["last_name"]; ?> on
                                <?php  $dt1=explode("-",$resq["comment_date_time"]);
                                                                $yy1=$dt1[0];
                                                                $mm1=$dt1[1];
                                                                $dd1=$dt1[2];
																
                                                             $tm=explode(" ",$dd1);
															     $dt=$tm[0];
																 $tim=$tm[1];
                                                            $rdate=$dt."-".$mm1."-".$yy1;
                                                            
                                                            echo $rdate." at ".$tim;
															 ?></i>
</td>

</tr>
</table></td></tr>
<?php 
$msg_id=$resq["discussion_detail_id"];

				$selectquote=mysql_query("select * from discussion_detail
				INNER JOIN discussion_board ON discussion_board.discussion_board_id=discussion_detail.discussion_board_mast_id
				INNER JOIN user_registration ON user_registration.user_reg_id=discussion_detail.comment_from_id
				where discussion_detail_mast_id='".$msg_id."' and comment_active_status=2 order by discussion_detail_mast_id DESC ");
                   $totquote=mysql_num_rows($selectquote);
while($resquote=mysql_fetch_array($selectquote))
{
?>
<tr>
<td>
<table width="100%" cellpadding="0" cellspacing="5">
<tr><td class="black10">

            <strong><?php
			echo $resquote["discussion_comment"]; ?></strong>
            </td></tr>
            <tr><td height="24" class="normal_fonts9"><span class="red9">Posted by 
			<?php
            echo $resquote["first_name"]." ".$resquote["last_name"]; ?> on
                                <?php  $dt1=explode("-",$resquote["comment_date_time"]);
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
<?php } } }
else { ?>
<tr>
<td>
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

<?php } ?>
<?php if($userid!="") { ?>
<tr>
<td align="right" >

<input name="<?php echo $m; ?>" class="comment_button" id="<?php echo $m; ?>" src="images/quote.png" type="image" align="middle" style="width:52px; height:20px" value="Quote" />

<input name="abuse" id="abuse" class="comment_button" src="images/report_abuse.png"  type="image" align="middle" onClick="return hs.htmlExpand(this, { headingText: 'Report Abuse' })" style="cursor:pointer;width:93px; height:20px" value="Report Abuse"  />

<div class="highslide-maincontent" >
<form name="form1" id="form1" action="process_discussion.php" method="post" >
<table>

  <tr>
    <td class="normal_fonts12_black"> <strong>Select Reason : </strong> </td>
  </tr>
  <tr>
    <td class="black10">
    <input name="discussion_board_id" id="discussion_board_id" type="hidden" value="<?php echo $a; ?>" >
    <input type="hidden" name="hdnDisid" id="hdnDisid" value="<?php echo $m; ?>" > 
    <input type="radio" name="reason" id="community" value="community security" checked > 
    community security
    </td>
  </tr>
  <tr>
    <td class="black10">
    <input type="radio" name="reason" id="nudity" value="nudity / sexual content" > 
    nudity / sexual content
    </td>
  </tr>
  <tr>
    <td class="black10">
    <input type="radio" name="reason" id="spam" value="spam / virus" > 
    spam / virus
    </td>
  </tr>
  <tr>
    <td class="black10">
    <input type="radio" name="reason" id="illegal" value="illegal activity" > 
    illegal activity
    </td>
  </tr>
  <tr>
    <td class="black10">
    <input type="radio" name="reason" id="hate" value="hate / violence" > 
    hate / violence
    </td>
  </tr>
  <tr>
    <td class="normal_fonts12_black">
      <strong>Your message :</strong></td>
  </tr>
<tr>
    <td class="black10">
    <textarea name="message" id="message" cols="30" rows="6"  ></textarea>
    </td>
  </tr>
  <tr><td height="5"></td></tr>
  <tr>
    <td class="black10">
    <input type="submit" name="query_submit" id="query_submit" style="width:70px; height:26px" value="Submit" >
    </td>
  </tr>
</table>
</form>
</div> 


</td>
</tr>

<tr><td align="center">
      <div class='panel' id="slidepanel<?php echo $m; ?>" >
     <form name="frm" action="process_discussion.php" method="post">
     <table width="100%">
     <tr><td>
     
     <input name="discussion_board_id" id="discussion_board_id" type="hidden" value="<?php echo $a; ?>" >
     <input name="msg_id" id="msg_id" type="hidden" value="<?php echo $m; ?>" >
     <textarea name="quote_msg" id="quote_msg" cols="30" rows="5" class="textcss" ></textarea>
     </td></tr>
     <tr><td height="5"></td></tr>
     <tr><td>
     <input name="comment_submit" id="comment_submit"  type="submit" align="middle" style="width:70px; height:26px" value="Quote"
    />
    </td></tr>
    </table>
   </form>
      </div>      
      
</td>

</tr>  
   <?php } ?>       
            
        </table> </td>
            </tr>
             <?php } }else{ ?>
             <tr><td class="black10">No Comments !!! </td></tr>

             <?php } ?>
        <tr><td height="5"></td></tr>
        
           <tr><td align="center">
          
      <form name="disform" id="disform" method="post" action="process_discussion.php" >    
<table>
             <?php if($userid!="") { ?> 
<tr><td>
<textarea name="discussion_comment" id="discussion_comment" cols="50" rows="5" class="textcss" ></textarea>
<input name="discussion_board_id" id="discussion_board_id" type="hidden" value="<?php echo $a;?>" >
</td></tr>

<tr><td>
    <input name="submit" type="submit" align="middle" style="width:80px; height:26px" id="submit" value="Submit" />
</td></tr>
    <?php } ?>
</table>
</form>

</td></tr></table>
