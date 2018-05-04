<table width="100%" border="0" cellspacing="0" cellpadding="0">
     
     <tr>
        <td height="5"></td>
      </tr> 
      <?php 
	
	  $querycom=mysql_query("select * from experience_detail
				INNER JOIN share_experience ON share_experience.share_experience_id=experience_detail.experience_mast_id			
				where experience_mast_id='".$a."' and comment_active_status=2 order by experience_detail_id DESC ");
$totcom=mysql_num_rows($querycom);
if($totcom>0){
while($rescomment=mysql_fetch_array($querycom))
			   {
				
				 $m=$rescomment["experience_detail_id"];
  
	?>
      <tr>
        <td align="left" valign="top">
        <table width="100%" cellpadding="0" cellspacing="5" class="border1"  >
            
       
<tr>
<td>
<table width="100%" cellpadding="0" cellspacing="5">
<tr><td class="black10">

            <strong><?php
			echo $rescomment["experience_comment"]; ?></strong>
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


        </table> </td>
            </tr>
            
   <?php } } else {  ?>
<tr><td class="black10">No Comments !!! </td></tr>
<?php } ?>         
           
        <tr><td height="5"></td></tr>
        
           <tr><td align="center">
          
      <form name="disform" id="disform" method="post" action="process_experience.php" >    
<table>
             <?php if($userid!="") { ?> 
<tr><td>
<textarea name="experience_comment" id="experience_comment" cols="50" rows="5" class="textcss" ></textarea>
<input name="share_experience_id" id="share_experience_id" type="hidden" value="<?php echo $a;?>" >
</td></tr>

<tr><td>
    <input name="submit" type="submit" align="middle" style="width:80px; height:26px" id="submit" value="Submit" />
</td></tr>
    <?php } ?>
</table>
</form>

</td></tr></table>
