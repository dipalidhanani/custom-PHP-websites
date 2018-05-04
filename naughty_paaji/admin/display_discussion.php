<?php session_start();
include("../include/config.php");
if($_SESSION['Admin_id'] == "")
	{
			//echo "Unauthorised Access !!!";die;
			echo "<script>location.href='login.php';</script>";
			exit();
	}
$userid=$_SESSION['user_reg_id'];

$a=$_GET["discussion_board_id"];

?>

<html>
<head>

<link rel="stylesheet" type="text/css" media="screen" href="../css/css.css" />
<title>Naughty Paaji - Admin Facility</title>
<script type="text/javascript" src="popup/p_flies/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="popup/p_flies/highslide.css" />
<script type="text/javascript">
	hs.graphicsDir = 'popup/p_flies/graphics/';
	hs.outlineType = 'rounded-white';
	hs.showCredits = false;
	hs.wrapperClassName = 'draggable-header';
</script>
</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1000"><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
      <tr>
        <td><table width="1000" border="0" cellpadding="0" cellspacing="0" >
          <tr>
            <td bgcolor="#FFFFFF"> <?php include("headerAdmin.php");?></td>
          </tr>
          <tr>
            <td height="10" bgcolor="#FFFFFF"></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">      
     
     <!--   main starts here-->
<table width="100%" cellpadding="5" cellspacing="5" >
<tr><td>
<?php 

 $a=$_GET["discussion_board_id"];
 $query = "select * from discussion_board where discussion_board_id='".$a."'";
   
   $result= mysql_query($query) 
   or die (mysql_error());
   
   if($row=mysql_fetch_array($result))
   {
	   	   
	?>     
  
<table width="100%" cellpadding="5" cellspacing="1" class="border">

<tr>
<td class="normal_fonts9"><b><?php echo $row["discussion_topic"]; ?></b></td>
<td align="right" class="normal_fonts10" width="250">viewed <?php echo $row["hits"]; ?> times | 
Total comments :  
<?php $querycom=mysql_query("select * from discussion_detail
				INNER JOIN discussion_board ON discussion_board.discussion_board_id=discussion_detail.discussion_board_mast_id
				INNER JOIN user_registration ON user_registration.user_reg_id=discussion_detail.comment_from_id
				where discussion_board_mast_id='".$a."'  order by discussion_detail_id DESC ");
$totcom=mysql_num_rows($querycom);
echo $totcom;
?>
</td>
</tr>
<tr>
  <td class="normal_fonts9" colspan="2"><?php echo $row["discussion_description"]; ?></td>
</tr>
</table>
	 </td>
          </tr>
          <tr class="normal_fonts9">
            <td>
            <table width="100%" cellpadding="5" cellspacing="1" class="border" >
<tr class="normal_fonts9"><td height="30" colspan="2" >
  
  <strong>All Comments </strong></td>
            </tr>
           
          
            <?php
			
			$i=1;
			
			
			   while($rescomment=mysql_fetch_array($querycom))
			   {
				 $disid=$rescomment["discussion_detail_mast_id"]; 
				 $m=$rescomment["discussion_detail_id"]; 
              
			?>
            <tr class="normal_fonts9">
            <td><table width="100%" cellpadding="5" cellspacing="5" >
              <?php 
		
		if($rescomment["discussion_detail_mast_id"]!=0)
{
	
	$q=mysql_query("select * from discussion_detail
				INNER JOIN discussion_board ON discussion_board.discussion_board_id=discussion_detail.discussion_board_mast_id
				INNER JOIN user_registration ON user_registration.user_reg_id=discussion_detail.comment_from_id
				where discussion_detail_id='".$disid."' order by discussion_detail_mast_id DESC ");
	$resq=mysql_fetch_array($q);
?>
              <tr class="normal_fonts9">
                <td bgcolor="#F3F3F3"><table cellspacing="0">
                  <tr class="normal_fonts9">
                    <td ><strong><i>Original comment</i></strong></td>
                  </tr>
                  <tr class="normal_fonts9">
                    <td ><i><?php echo $resq["discussion_comment"]; ?></i></td>
                  </tr>
                  <tr class="normal_fonts9">
                    <td ><i>Posted by
                      <?php
            echo $resq["first_name"]." ".$resq["last_name"]; ?>
                      on
                      <?php  $dt1=explode("-",$resq["comment_date_time"]);
                                                                $yy1=$dt1[0];
                                                                $mm1=$dt1[1];
                                                                $dd1=$dt1[2];
																
                                                             $tm=explode(" ",$dd1);
															     $dt=$tm[0];
																 $tim=$tm[1];
                                                            $rdate=$dt."-".$mm1."-".$yy1;
                                                            
                                                            echo $rdate." at ".$tim;
															 ?>
                    </i></td>
                  </tr>
                </table></td>
                <td width="50" align="center" valign="middle"></td>
              </tr>
              <?php 
$msg_id=$resq["discussion_detail_id"];
				   
				$selectquote=mysql_query("select * from discussion_detail
				INNER JOIN discussion_board ON discussion_board.discussion_board_id=discussion_detail.discussion_board_mast_id
				INNER JOIN user_registration ON user_registration.user_reg_id=discussion_detail.comment_from_id
				where discussion_detail_mast_id='".$msg_id."' order by discussion_detail_mast_id DESC ");
                   $totquote=mysql_num_rows($selectquote);
while($resquote=mysql_fetch_array($selectquote))
{
?>
              <tr class="normal_fonts9">
                <td><table width="100%" cellpadding="0" cellspacing="0">
                  <tr class="normal_fonts9">
                    <td ><?php
			echo $resquote["discussion_comment"]; ?></td>
                  </tr>
                  <tr class="normal_fonts9">
                    <td >Posted by
                      <?php
            echo $resquote["first_name"]." ".$resquote["last_name"]; ?>
                      on
                      <?php  $dt1=explode("-",$resquote["comment_date_time"]);
                                                                $yy1=$dt1[0];
                                                                $mm1=$dt1[1];
                                                                $dd1=$dt1[2];
																
                                                             $tm=explode(" ",$dd1);
															     $dt=$tm[0];
																 $tim=$tm[1];
                                                            $rdate=$dt."-".$mm1."-".$yy1;
                                                            
                                                            echo $rdate." at ".$tim;
															 ?></td>
                  </tr>
                </table></td>
                <td align="center" valign="middle">
                
                <a onClick="return hs.htmlExpand(this, { headingText: 'Comment Status' })"><img src="../images/comment_edit.gif" width="20" height="20" border="0" alt="Edit Comment Status" /></a>
                  <div class="highslide-maincontent" >
                    <form method="post" name="discussionform" id="discussionform" action="process_discussion.php" >
                      <table width="100%" border="0" cellspacing="10" cellpadding="0">
                        <tr>
                          <td><table width="100%" border="0" cellpadding="5" cellspacing="0">
                            <tr>
                              <td width="190" align="right" class="normal_fonts9">Comment Approval status</td>
                              <td width="10" align="center" class="normal_fonts9">:</td>
                              <td class="normal_fonts9" >
                                <input type="hidden" id="hdnCommentid" name="hdnCommentid" value="<?php echo $rescomment["discussion_detail_id"]; ?>"/>
                                <input type="hidden" id="discussionboardid" name="discussionboardid" value="<?php echo $rescomment["discussion_board_mast_id"]; ?>"/>
                                <input name="rdoStatus" id="rdoStatus" value="1" <?php if($rescomment["comment_active_status"]==1)
                    { echo "checked"; }?> type="radio"/>
                                Pending
                                <input name="rdoStatus" id="rdoStatus" value="2" <?php if($rescomment["comment_active_status"]==2)
                    { echo "checked"; }?> type="radio"/>
                                Approve
                                <input name="rdoStatus" id="rdoStatus" value="3" <?php if($rescomment["comment_active_status"]==3)
                    { echo "checked"; }?> type="radio"/>
                                Cancel </td>
                            </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td><table width="100%" border="0" cellpadding="5" cellspacing="0">
                            <tr>
                              <td align="right" class="normal_fonts9" width="100">&nbsp;</td>
                              <td align="center" class="normal_fonts9">&nbsp;</td>
                              <td class="normal_fonts9" ><input type="hidden" name="process" value="Editcommentstatus" />
                                <input class="submit" name="submit" type="submit" align="middle" style="width:80px; height:30px" id="submit" value="Update" /></td>
                            </tr>
                          </table></td>
                        </tr>
                      </table>
                    </form>
                  </div>
                 
                    <a href="process_discussion.php?discussion_id=<?php echo $rescomment["discussion_detail_id"]; ?>&discussion_board_mast_id=<?php echo $rescomment["discussion_board_mast_id"]; ?>&processcomment=delcomment" onClick="return confirm('Do You Want to Remove Selected discussion board Comment ?')"><img src="../images/delete_on.gif" width="20" height="20" border="0" /></a>
                  </td>
              </tr>
              <?php } }
else { ?>
              <tr class="normal_fonts9">
                <td><table width="100%" cellpadding="0" cellspacing="0">
                  <tr class="normal_fonts9">
                    <td><?php
			echo $rescomment["discussion_comment"]; ?></td>
                  </tr>
                  <tr class="normal_fonts9">
                    <td >Posted by
                      <?php
            echo $rescomment["first_name"]." ".$rescomment["last_name"]; ?>
                      on
                      <?php  $dt1=explode("-",$rescomment["comment_date_time"]);
                                                                $yy1=$dt1[0];
                                                                $mm1=$dt1[1];
                                                                $dd1=$dt1[2];
																
                                                             $tm=explode(" ",$dd1);
															     $dt=$tm[0];
																 $tim=$tm[1];
                                                            $rdate=$dt."-".$mm1."-".$yy1;
                                                            
                                                            echo $rdate." at ".$tim;
															 ?></td>
                  </tr>
                </table></td>
                <td width="50" align="center" valign="middle">
                  <a onClick="return hs.htmlExpand(this, { headingText: 'Comment Status' })"><img src="../images/comment_edit.gif" width="20" height="20" border="0" alt="Edit Comment Status" /></a>
                  <div class="highslide-maincontent">
                    <form method="post" name="discussionform" id="discussionform" action="process_discussion.php" >
                      <table width="100%" border="0" cellspacing="10" cellpadding="0">
                        <tr>
                          <td><table width="100%" border="0" cellpadding="5" cellspacing="0">
                            <tr>
                              <td width="190" align="right" class="normal_fonts9">Comment Approval status</td>
                              <td width="10" align="center" class="normal_fonts9">:</td>
                              <td class="normal_fonts9" ><input type="hidden" id="hdnCommentid" name="hdnCommentid" value="<?php echo $rescomment["discussion_detail_id"]; ?>"/>
                                <input type="hidden" id="discussionboardid" name="discussionboardid" value="<?php echo $rescomment["discussion_board_mast_id"]; ?>"/>
                                <input name="rdoStatus" id="rdoStatus" value="1" <?php if($rescomment["comment_active_status"]==1)
                    { echo "checked"; }?> type="radio"/>
                                Pending
                                <input name="rdoStatus" id="rdoStatus" value="2" <?php if($rescomment["comment_active_status"]==2)
                    { echo "checked"; }?> type="radio"/>
                                Approve
                                <input name="rdoStatus" id="rdoStatus" value="3" <?php if($rescomment["comment_active_status"]==3)
                    { echo "checked"; }?> type="radio"/>
                                Cancel </td>
                            </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td><table width="100%" border="0" cellpadding="5" cellspacing="0">
                            <tr>
                              <td align="right" class="normal_fonts9" width="100">&nbsp;</td>
                              <td align="center" class="normal_fonts9">&nbsp;</td>
                              <td class="normal_fonts9" ><input type="hidden" name="process" value="Editcommentstatus" />
                                <input class="submit" name="submit" type="submit" align="middle" style="width:80px; height:30px" id="submit" value="Update" /></td>
                            </tr>
                          </table>
                         </td>
                        </tr>
                      </table>
                    </form>
                  </div>
                  
                  <a href="process_discussion.php?discussion_id=<?php echo $rescomment["discussion_detail_id"]; ?>&discussion_board_mast_id=<?php echo $rescomment["discussion_board_mast_id"]; ?>&processcomment=delcomment" onClick="return confirm('Do You Want to Remove Selected discussion board Comment ?')"><img src="../images/delete_on.gif" width="20" height="20" border="0" /></a>
                </td>
              </tr>
              <?php }  ?>
            </table></td>
           
            </tr>
             <?php  } ?>
        <tr><td>&nbsp;&nbsp;<input name="back" type="button" class="normal_fonts12_black" id="back" style="width:80px; height:30px" value="Back" onClick="history.go(-1)" /></td></tr>
          </table>
</td>

</tr>
<?php } ?>
</table>


<!--   main ends here-->
  </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="10"></td>
      </tr>
      <tr>
        <td align="center" valign="middle">
        <?php  include("footer.php"); ?>
        
        </td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>

