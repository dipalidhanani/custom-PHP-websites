<?php session_start();
include("../include/config.php");
if($_SESSION['Admin_id'] == "")
	{
			//echo "Unauthorised Access !!!";die;
			echo "<script>location.href='login.php';</script>";
			exit();
	}

 $share_experience_id=$_GET["share_experience_id"];
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


$query = "select * from share_experience where share_experience_id='".$share_experience_id."'";
   
   $result= mysql_query($query) 
   or die (mysql_error());
   
   if($row=mysql_fetch_array($result))
   {
	   	   
	?>     
  
<table width="100%" cellpadding="5" cellspacing="1" class="border">

<tr>
<td class="normal_fonts9"><b><?php echo substr($row["experience"],0,250); ?>...</b></td>
<td align="right" class="normal_fonts10" width="250"> 
Total comments :  
<?php $querycom=mysql_query("select * from experience_detail
				INNER JOIN share_experience ON share_experience.share_experience_id=experience_detail.experience_mast_id
				INNER JOIN user_registration ON user_registration.user_reg_id=experience_detail.comment_from_id
				where experience_mast_id='".$share_experience_id."' order by experience_detail_id DESC ");
$totcom=mysql_num_rows($querycom);
echo $totcom;
?>
</td>
</tr>
<tr>
  <td class="normal_fonts9" colspan="2"><?php echo $row["experience"]; ?></td>
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
             
			?>
            <tr class="normal_fonts9">
            <td><table width="100%" cellpadding="5" cellspacing="5" >
             
              <tr class="normal_fonts9">
                <td><table width="100%" cellpadding="0" cellspacing="0">
                  <tr class="normal_fonts9">
                    <td><?php
			echo $rescomment["experience_comment"]; ?></td>
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
                    <form method="post" name="discussionform" id="discussionform" action="process_experience.php" >
                      <table width="100%" border="0" cellspacing="10" cellpadding="0">
                        <tr>
                          <td><table width="100%" border="0" cellpadding="5" cellspacing="0">
                            <tr>
                              <td width="190" align="right" class="normal_fonts9">Comment Approval status</td>
                              <td width="10" align="center" class="normal_fonts9">:</td>
                              <td class="normal_fonts9" >
                                <input type="hidden" id="experienceid" name="experienceid" value="<?php echo $rescomment["experience_detail_id"]; ?>"/>
                                 <input type="hidden" id="experience_mast_id" name="experience_mast_id" value="<?php echo $rescomment["experience_mast_id"]; ?>"/>
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
                  
                  <a href="process_experience.php?experience_detail_id=<?php echo $rescomment["experience_detail_id"]; ?>&experience_mast_id=<?php echo $rescomment["experience_mast_id"]; ?>&processcomment=delcomment" onClick="return confirm('Do You Want to Remove Selected discussion board Comment ?')"><img src="../images/delete_on.gif" width="20" height="20" border="0" /></a>
                </td>
              </tr>
              
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

