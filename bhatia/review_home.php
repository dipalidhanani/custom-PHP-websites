<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="5"><img src="<?php echo HTTP_BASE_URL; ?>images/box_01.jpg" width="5" height="41" /></td>
                            <td align="left" valign="top" background="<?php echo HTTP_BASE_URL; ?>images/box_02.jpg" style="background-repeat:repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td height="6" colspan="2" align="left" valign="middle"></td>
                              </tr>
                              <tr>
                                <td width="30" align="left" valign="middle"><img src="<?php echo HTTP_BASE_URL; ?>images/Arrow.png" width="24" height="24" /></td>
                                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td class="title"><span class="title_red">Mobile</span> Reviews</td>
                                    <td align="right" valign="middle">&nbsp;</td>
                                  </tr>
                                </table></td>
                              </tr>
                            </table></td>
                            <td width="5"><img src="<?php echo HTTP_BASE_URL; ?>images/box_04.jpg" width="5" height="41" /></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" bgcolor="#FFFFFF" ><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1" style="padding:5px;">
                        <?php
$r_query=mysql_query("SELECT * FROM review_mst WHERE Is_Approve=1 ORDER BY Review_Id desc LIMIT 3");
$rows=mysql_affected_rows();
$count=1;
while($di=mysql_fetch_array($r_query))
{
 ?>
 <?php
		  $prod_img=mysql_query("SELECT * FROM prod_img WHERE Prod_Id='".$di['Prod_Id']."' ORDER BY Disp_Order LIMIT 1");
		  $pi=mysql_fetch_array($prod_img);
		  ?>
                          <tr>
                            <td>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" <?php if($count!=$rows) { ?> class="border_bottom" <?php } ?>>
  <tr>
    <td colspan="2" align="center" valign="top" height="5"></td>
    </tr>
  <tr>
    <td width="100" align="center" valign="top"><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=17&eid=<?php echo $di['Prod_Id']; ?>" class="title_10" title="View related reviews"><img src="<?php echo HTTP_BASE_URL; ?>product/<?php echo $pi['Is_Image']; ?>" width="80" height="100" border="0" /></a></td>
    <td valign="top"><table width="100%" border="0" cellpadding="2" cellspacing="0">
      <tr>
        <td class="title_10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
          <?php
		  $prod_dd=mysql_query("SELECT * FROM prod_mst WHERE Prod_Id='".$di['Prod_Id']."'");
		  $pp=mysql_fetch_array($prod_dd);
		  ?>
            <td align="left" valign="middle"><strong><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=17&eid=<?php echo $di['Prod_Id']; ?>&rid=<?php echo $di['Review_Id']; ?>" class="title_10" title="View related reviews"><?php echo $pp['Prod_Name']; ?></a></strong>&nbsp;</td>
            <td align="right" valign="middle">&nbsp;</td>
          </tr>
        </table>		</td>
      </tr>
      <tr>
        <td valign="top" style="text-align:justify" class="title_9">
		<?php 
		$no_of_char=strlen($di['Description']);
		$daa=substr($di['Description'],0,200);
		if($no_of_char>=200)
		{
			echo $daa."...";
		}
		else
		{
			echo $daa;
		}
	
		?>
        &nbsp;
        <?php if($no_of_char>=200) { ?>
        <a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=18&eid=<?php echo $di['Prod_Id']; ?>&rid=<?php echo $di['Review_Id']; ?>" class="fonts8" style="text-decoration:underline;" >Read More...</a>
        <?php } ?>
        </td>
      </tr>
      <tr>
        <td valign="top" style="text-align:justify" class="fonts8">By  <?php echo $di['Name']; ?> on <?php $dx=split(" ",$di['Dt']);
		$date=$dx[0];
		$time=$dx[1];
		$d=split("-",$date);
		echo $final_date=$d[2]."/".$d[1]."/".$d[0]." ".$time;
		?></td>
      </tr>
      <?php if($no_of_char>=200)  {  ?>
     <?php } ?>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="top" height="5"></td>
    </tr>
 
                            </table>

</td>
                          </tr>
                           <tr>
        <td height="2"></td>
      </tr>
                          <?php $count++; } ?>
                          <tr>
        <td align="right" valign="middle"><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=16" class="title_10">More reviews...</a></td>
      </tr>
                        </table></td>
                      </tr>
                      
                </table>